<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
use App\Models\Disc;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Sale::query()->with('customer');

    // Filtro por cliente
    if ($request->filled('customer_id')) {
        $query->where('customer_id', $request->input('customer_id'));
    }

    // Filtro por período
    if ($request->filled('start_date') && $request->filled('end_date')) {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Inclui o dia inteiro do end_date (até 23:59:59)
        $query->whereBetween('created_at', [
            $startDate,
            \Carbon\Carbon::parse($endDate)->endOfDay(),
        ]);
    }

    $sales = $query->get();

    $customers = \App\Models\Customer::all();

    return view('sales.index', compact('sales', 'customers'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all(); // Lista de clientes
        $discs = Disc::all(); // Lista de discos

        return view('sales.create', compact('customers', 'discs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'items' => 'required|array', // Deve conter os itens da venda
            'items.*.disc_id' => 'required|exists:discs,id', // Cada item deve ter um disco válido
            'items.*.quantity' => 'required|integer|min:1', // Cada item deve ter uma quantidade válida
        ]);

        // Calcula o preço total
        $totalPrice = 0;
        foreach ($validatedData['items'] as $item) {
            $disc = Disc::find($item['disc_id']);
            $totalPrice += $disc->price * $item['quantity'];
        }

        // Cria a venda
        $sale = Sale::create([
            'customer_id' => $validatedData['customer_id'],
            'total_price' => $totalPrice,
        ]);

        // Adiciona os itens da venda
        foreach ($validatedData['items'] as $item) {
            $disc = Disc::find($item['disc_id']);
            SaleItem::create([
                'sale_id' => $sale->id,
                'disc_id' => $disc->id,
                'quantity' => $item['quantity'],
                'price' => $disc->price,
            ]);
        }

        return redirect()->route('sales.index')->with('success', 'Venda criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        $sale->load(['customer', 'items.disc']); // Carrega o cliente e os itens com os discos associados
        return view('sales.show', compact('sale'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        $sale->delete(); // Exclui a venda e seus itens automaticamente devido ao onDelete('cascade')

        return redirect()->route('sales.index')->with('success', 'Venda excluída com sucesso!');
    }
}
