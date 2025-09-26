<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Auto Posto Savegnago</title>
</head>
<body>
    <header>
        <h1>Bem-vindo ao Auto Posto Savegnago</h1>
    </header>

    <main>
        <section>
            <p>Este é um sistema de controle de vendas bem básico, feito para gerenciar produtos e vendas do posto.</p>
        </section>

        <section>
            <h2>Acesse o sistema</h2>
            <ul>
                <!-- Redireciona direto para /products -->
                <li><a href="{{ url('/products') }}">Entrar</a></li>
                <li><a href="{{ url('/register') }}">Cadastrar</a></li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; Auto Posto Savegnago. Todos os direitos reservados.</p>
    </footer>
</body>
</html>