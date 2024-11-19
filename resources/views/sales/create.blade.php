@extends('layouts.app')

@section('title', 'Criar Venda')

@section('content')
    <h1>Criar Nova Venda</h1>

    <form action="{{ route('sales.store') }}" method="POST" id="sale-form">
        @csrf

        <label for="customer_id">Cliente:</label><br>
        <select name="customer_id" id="customer_id" required>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select><br><br>

        <h3>Itens da Venda:</h3>
        <div id="items-container">
            <div class="item-row">
                <label for="items[0][disc_id]">Disco:</label><br>
                <select name="items[0][disc_id]" class="disc-select" data-index="0" onchange="updatePrice(this)" required>
                    <option value="" data-price="0">Selecione um disco</option>
                    @foreach($discs as $disc)
                        <option value="{{ $disc->id }}" data-price="{{ $disc->price }}">{{ $disc->title }}</option>
                    @endforeach
                </select><br><br>

                <label>Preço Unitário:</label><br>
                <input type="text" class="item-price" id="price-0" value="0.00" readonly><br><br>

                <label for="items[0][quantity]">Quantidade:</label><br>
                <input type="number" name="items[0][quantity]" class="item-quantity" data-index="0" min="1" value="1" required oninput="updateTotal()"><br><br>
            </div>
        </div>

        <p><strong>Total da Venda (R$):</strong> <span id="total-price">0.00</span></p>

        <button type="button" id="add-item-btn">Adicionar Item</button><br><br>

        <button type="submit" class="action-button save">Salvar Venda</button>
    </form>

    <br>
    <a href="{{ route('sales.index') }}" class="action-button">Voltar à Lista</a>

    <script>
        let itemIndex = 1;

        document.getElementById('add-item-btn').addEventListener('click', addItem);

        function addItem() {
            const container = document.getElementById('items-container');
            const newItem = `
                <div class="item-row">
                    <label for="items[${itemIndex}][disc_id]">Disco:</label><br>
                    <select name="items[${itemIndex}][disc_id]" class="disc-select" data-index="${itemIndex}" onchange="updatePrice(this)" required>
                        <option value="" data-price="0">Selecione um disco</option>
                        @foreach($discs as $disc)
                            <option value="{{ $disc->id }}" data-price="{{ $disc->price }}">{{ $disc->title }}</option>
                        @endforeach
                    </select><br><br>

                    <label>Preço Unitário:</label><br>
                    <input type="text" class="item-price" id="price-${itemIndex}" value="0.00" readonly><br><br>

                    <label for="items[${itemIndex}][quantity]">Quantidade:</label><br>
                    <input type="number" name="items[${itemIndex}][quantity]" class="item-quantity" data-index="${itemIndex}" min="1" value="1" required oninput="updateTotal()"><br><br>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', newItem);
            itemIndex++;
        }

        function updatePrice(select) {
            const index = select.getAttribute('data-index');
            const selectedOption = select.options[select.selectedIndex];
            const price = selectedOption.getAttribute('data-price') || 0;
            document.getElementById(`price-${index}`).value = parseFloat(price).toFixed(2);
            updateTotal();
        }

        function updateTotal() {
            let total = 0;
            const rows = document.querySelectorAll('.item-row');
            rows.forEach((row, index) => {
                const price = parseFloat(document.getElementById(`price-${index}`).value) || 0;
                const quantity = parseInt(row.querySelector('.item-quantity').value) || 0;
                total += price * quantity;
            });
            document.getElementById('total-price').textContent = total.toFixed(2);
        }
    </script>
@endsection
