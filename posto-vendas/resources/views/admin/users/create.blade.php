<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cadastrar Frentista</title>
</head>
<body>
    <h1>Cadastrar Frentista</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <label>Nome:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Confirmar Senha:</label><br>
        <input type="password" name="password_confirmation" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <p><a href="{{ route('admin.dashboard') }}">Voltar para Dashboard</a></p>
</body>
</html>