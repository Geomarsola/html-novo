@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Login</h1>

    <form action="{{ route('login') }}" method="POST">
    @csrf
    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <label>Senha:</label>
    <input type="password" name="password" required><br><br>

    <button type="submit">Entrar</button>
</form>
</div>
@endsection