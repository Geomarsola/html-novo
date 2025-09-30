@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h1>Bem-vindo ao Auto Posto Savegnago</h1>
    <p>Controle de vendas e produtos do posto.</p>
    <a href="{{ route('login.form') }}" class="btn btn-primary mt-3">Entrar</a>
</div>
@endsection
