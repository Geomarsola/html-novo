<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Criar Usuário</title>
</head>
<body>
    <h1>Criar Usuário</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div>
            <label>Nome:</label><br>
            <input type="text" name="name" placeholder="Nome" required>
        </div>

        <div>
            <label>Email:</label><br>
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div>
            <label>Senha:</label><br>
            <input type="password" name="password" placeholder="Senha" required>
        </div>

        <div>
            <label>Confirmar Senha:</label><br>
            <input type="password" name="password_confirmation" placeholder="Confirme a senha" required>
        </div>

        <div>
            <label>Função:</label><br>
            <select name="role" required>
                <option value="frentista">Frentista</option>
                <option value="admin">Administrador</option>
            </select>
        </div>

        <button type="submit">Criar Usuário</button>
    </form>
</body>
</html>