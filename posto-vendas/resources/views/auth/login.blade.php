<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label for="email">E-mail:</label><br>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus><br><br>

        <label for="password">Senha:</label><br>
        <input id="password" type="password" name="password" required><br><br>

        <button type="submit">Entrar</button>
    </form>

    <p>Não tem conta? <a href="{{ route('register') }}">Registrar</a></p>
</body>
</html>