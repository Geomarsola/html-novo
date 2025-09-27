<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos - Posto Savegnago</title>
</head>
<body>
    <header>
        <h1>Lista de Produtos</h1>
    </header>

    <main>
        <section>
            <h2>Selecione o produto que você vendeu</h2>
            <p>Gerencie seus produtos vendidos e faça o lançamento dos mesmos.</p>
        </section>

        <form action="{{ route('sales.store') }}" method="POST">
            @csrf

            @foreach($products as $product)
                <section>
                    <h2>{{ $product->name }}</h2>
                    <label>
                        <input type="checkbox" name="produtos[{{ $product->id }}][check]">
                        {{ $product->name }} — R$ {{ number_format($product->price, 2, ',', '.') }}
                    </label><br>
                    <input type="number" name="produtos[{{ $product->id }}][qtd]" min="0" placeholder="Quantidade">
                </section>
                <hr>
            @endforeach

            <section>
                <button type="submit">Enviar os Produtos</button>
            </section>
        </form>
    </main>

    <footer>
        <p>&copy; AUTO POSTO SAVEGNAGO. Todos os direitos reservados</p>
    </footer>
</body>
</html>