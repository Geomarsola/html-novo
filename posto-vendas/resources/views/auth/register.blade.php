<!DOCTYPE html>
<html>
<head>
    <title>Registrar Usuário</title>
</head>
<body>
    <h1>Registrar Usuário</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label for="name">Nome:</label><br>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus><br><br>

        <label for="email">E-mail:</label><br>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required><br><br>

        <label for="password">Senha:</label><br>
        <input id="password" type="password" name="password" required><br><br>

        <label for="password_confirmation">Confirmar Senha:</label><br>
        <input id="password_confirmation" type="password" name="password_confirmation" required><br><br>

        <button type="submit">Registrar</button>
    </form>

    <p>Já tem conta? <a href="{{ route('login') }}">Entrar</a></p>
</body>
</html>