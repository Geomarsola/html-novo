<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard Administrador</title>
</head>
<body>
    <h1>Dashboard do Administrador</h1>

    {{-- Mensagem de sucesso --}}
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- Botão cadastrar frentista --}}
    <p>
        <a href="{{ route('users.create') }}">
            <button type="button">+ Cadastrar Frentista</button>
        </a>
    </p>

    <h2>Produtos Vendidos</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Preço Unitário (R$)</th>
                <th>Quantidade Vendida</th>
                <th>Valor Bruto (R$)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productsSales as $item)
            <tr>
                <td>{{ $item->product ? $item->product->name : '—' }}</td>
                <td>{{ number_format($item->product ? $item->product->price : 0, 2, ',', '.') }}</td>
                <td>{{ $item->total_quantity }}</td>
                <td>R$ {{ number_format($item->total_value, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Ranking de Frentistas</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Frentista</th>
                <th>Quantidade Vendida</th>
                <th>Valor Bruto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usersTotals as $u)
            <tr>
                <td>{{ $u->name }}</td>
                <td>{{ $u->total_quantity }}</td>
                <td>R$ {{ number_format($u->total_value, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Top vendedor</h2>
    @if($topSeller)
        <p><strong>{{ $topSeller->name }}</strong> — {{ $topSeller->total_quantity }} itens vendidos</p>
    @else
        <p>Nenhuma venda registrada ainda.</p>
    @endif

    <h2>Total vendido por mês</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Ano</th>
                <th>Mês</th>
                <th>Total Bruto (R$)</th>
                <th>Total Itens</th>
            </tr>
        </thead>
        <tbody>
            @foreach($monthly as $m)
            <tr>
                <td>{{ $m->year }}</td>
                <td>{{ $m->month }}</td>
                <td>R$ {{ number_format($m->total_bruto, 2, ',', '.') }}</td>
                <td>{{ $m->total_items }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p><a href="{{ route('products.index') }}">Ver produtos</a></p>
</body>
</html>