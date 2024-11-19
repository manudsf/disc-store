<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all(); // Obtém todos os clientes
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create'); // Retorna a view para criar cliente
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email', // Valida e-mail único
            'phone' => 'nullable|string|max:15',
        ]);

        Customer::create($validatedData); // Cria o cliente com os dados validados

        return redirect()->route('customers.index')->with('success', 'Cliente criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer')); // Exibe os detalhes de um cliente
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer')); // Retorna a view para editar cliente
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id, // Permite o mesmo e-mail do cliente atual
            'phone' => 'nullable|string|max:15',
        ]);

        $customer->update($validatedData); // Atualiza o cliente com os dados validados

        return redirect()->route('customers.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete(); // Exclui o cliente

        return redirect()->route('customers.index')->with('success', 'Cliente excluído com sucesso!');
    }
}
