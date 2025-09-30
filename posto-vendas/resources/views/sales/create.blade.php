@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Registrar Venda</h1>

    @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="color: red; margin-bottom: 15px;">
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
        <div class="mb-3">
            <label>{{ $product->name }} (R$ {{ number_format($product->price, 2, ',', '.') }})</label>
            <input type="number" name="products[{{ $product->id }}]" class="form-control" min="0" placeholder="Quantidade">
        </div>
        @endforeach

        <button type="submit" class="btn btn-success">Registrar Venda</button>
    </form>
</div>
@endsection