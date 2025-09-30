@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Dashboard do Administrador</h1>

    {{-- Botão cadastrar frentista --}}
    <p>
        <a href="{{ route('users.create') }}">
            <button type="button">+ Cadastrar Frentista</button>
        </a>
    </p>

    {{-- Mensagem de sucesso --}}
    @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Produtos vendidos --}}
    <h2>Produtos Vendidos</h2>
    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <thead>
            <tr style="background-color:#ddd;">
                <th>Produto</th>
                <th>Preço Unitário (R$)</th>
                <th>Quantidade Vendida</th>
                <th>Valor Bruto (R$)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productsSales as $item)
            <tr>
                <td>{{ $item->product?->name ?? '—' }}</td>
                <td>{{ number_format($item->product?->price ?? 0, 2, ',', '.') }}</td>
                <td>{{ $item->total_quantity }}</td>
                <td>{{ number_format($item->total_value, 2, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Nenhuma venda registrada ainda.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Ranking de frentistas --}}
    <h2>Ranking de Frentistas</h2>
    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <thead style="background-color:#ddd;">
            <tr>
                <th>Frentista</th>
                <th>Quantidade Vendida</th>
                <th>Valor Bruto</th>
            </tr>
        </thead>
        <tbody>
            @forelse($usersTotals as $u)
            <tr>
                <td>{{ $u->name }}</td>
                <td>{{ $u->total_quantity }}</td>
                <td>{{ number_format($u->total_value, 2, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3">Nenhuma venda registrada ainda.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Top vendedor --}}
    <h2>Top Vendedor</h2>
    @if($topSeller)
        <p><strong>{{ $topSeller->name }}</strong> — {{ $topSeller->total_quantity }} itens vendidos</p>
    @else
        <p>Nenhuma venda registrada ainda.</p>
    @endif

    {{-- Total vendido por mês --}}
    <h2>Total Vendido por Mês</h2>
    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <thead style="background-color:#ddd;">
            <tr>
                <th>Ano</th>
                <th>Mês</th>
                <th>Total Bruto (R$)</th>
                <th>Total Itens</th>
            </tr>
        </thead>
        <tbody>
            @forelse($monthly as $m)
            <tr>
                <td>{{ $m->year }}</td>
                <td>{{ $m->month }}</td>
                <td>{{ number_format($m->total_bruto, 2, ',', '.') }}</td>
                <td>{{ $m->total_items }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Nenhuma venda registrada ainda.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <p style="margin-top: 15px;"><a href="{{ route('products.index') }}">Ver produtos</a></p>
</div>
@endsection