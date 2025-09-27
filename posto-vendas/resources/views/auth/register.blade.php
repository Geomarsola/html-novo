<!DOCTYPE html>
<html>
<head>
    <title>Registrar Usuário</title>
</head>
<body>
    <h1>Registrar Usuário</h1>

    <!-- Exibir erros de validação -->
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <label>Nome:</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required><br><br>

        <label>E-mail:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Confirmar Senha:</label><br>
        <input type="password" name="password_confirmation" required><br><br>

        <!-- Para registro admin opcional (pode esconder se só for frentista) -->
        <!-- <label>Role:</label>
        <select name="role">
            <option value="frentista" selected>Frentista</option>
            <option value="admin">Administrador</option>
        </select><br><br> -->

        <button type="submit">Registrar</button>
    </form>

    <p>Já tem conta? <a href="{{ route('login.form') }}">Entrar</a></p>
</body>
</html>