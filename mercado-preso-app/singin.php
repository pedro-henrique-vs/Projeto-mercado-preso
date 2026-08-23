<?php
session_start();
include_once("php-proc/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/singin-singup-style.css">
    <title>Cadastro</title>
</head>
<body>
    <form action="php-proc/cad_usu.php" method="POST">
        <h1>Cadastre-se</h1>

        <!-- Campo de Login / Email -->
        <label for="usuario-email">Nome</label><br>
        <input 
            type="text" 
            id="usuario-nome" 
            name="nome" 
            placeholder="insira um nome de usuário" 
            required
        >
        <br><br>

        <!-- Campo de Login / Email -->
        <label for="usuario-email">Login</label><br>
        <input 
            type="email" 
            id="usuario-email" 
            name="email" 
            placeholder="insira um email" 
            required
        >
        <br><br>

        <!-- Campo de Senha -->
        <label for="usuario-senha">Senha</label><br>
        <input 
            type="password" 
            id="usuario-senha" 
            name="senha" 
            placeholder="Insira uma senha forte" 
            required
        >
        <br><br>

        <!-- Campo de Confirmação de Senha (Adicionado para segurança) -->
        <label for="confirmar-senha">Confirmar Senha</label><br>
        <input 
            type="password" 
            id="confirmar-senha" 
            name="confirmar_senha" 
            placeholder="Repita a sua senha" 
            required
        >
        <br><br>

        <!-- Botão de submissão do formulário -->
        <button type="submit">Cadastrar</button>
        <br><br>

        <!-- Links de Navegação -->
        <a href="singup.php">Já possui uma conta? Faça login</a><br>
        <a href="singin-vendedor.php">Faça parte da equipe</a>
    </form>
</body>
</html>