<!DOCTYPE html>
<html>
<head>
    <title>Registrar Venda</title>
</head>
<body>
    <h1>Registrar Venda</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('sales.store') }}" method="POST">
        @csrf

        @foreach($products as $product)
            <div style="margin-bottom:10px;">
                <label>
                    {{ $product->name }} (R$ {{ $product->price }})
                </label><br>
                <input type="number" name="products[{{ $product->id }}]" min="0" placeholder="Quantidade">
            </div>
        @endforeach

        <button type="submit">Salvar Venda</button>
    </form>
</body>
</html>