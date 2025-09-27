<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registrar Venda</title>
</head>
<body>
    <h1>Registrar Venda</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sales.store') }}" method="POST">
        @csrf

        @foreach($products as $product)
            <div style="margin-bottom:10px;">
                <label>
                    {{ $product->name }} — R$ {{ number_format($product->price,2,',','.') }}
                    (estoque: {{ $product->stock }})
                </label><br>

                <!-- campo simples: products[ID] = quantidade -->
                <input type="number" name="products[{{ $product->id }}]" min="0" placeholder="Quantidade">
            </div>
        @endforeach

        <button type="submit">Salvar Venda</button>
    </form>

    <p><a href="{{ route('products.index') }}">Voltar à lista de produtos</a></p>
</body>
</html>