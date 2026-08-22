<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/singin-singup-style.css">
</head>
<body>
    <form action="" method="POST">
        <h1>Entrar</h1>

        <!-- Campo de Login / Email -->
        <label for="login-email">Login</label><br>
        <input 
            type="email" 
            id="login-email" 
            name="email" 
            placeholder="insira seu email" 
            required
        >
        <br><br>

        <!-- Campo de Senha -->
        <label for="login-senha">Senha</label><br>
        <input 
            type="password" 
            id="login-senha" 
            name="senha" 
            placeholder="Insira sua senha" 
            required
        >
        <br><br>

        <!-- Botão de submissão do formulário -->
        <button type="submit">Entrar</button>
        <br><br>

        <!-- Links de Navegação -->
        <a href="singin.php">Ainda não tem conta? Cadastre-se</a><br>
        <a href="/recuperar-senha">Esqueceu sua senha?</a>
    </form>
</body>
</html>