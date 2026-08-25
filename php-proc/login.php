<?php
session_start();
include_once("conexao.php");

//email de login
$email = $_POST['email'];

//senha de login
$senha = $_POST['senha'];

//credenciais do admin
$email_admin = "alinario@host";
$senha_admin = "123";

if ($email == $email_admin and $senha == $senha_admin ){
    $_SESSION['tipo_usuario'] = "admin";
    $_SESSION['nome_usuario'] = "administrador";
    $_SESSION['id_cadastrado'] = '1';

    header("Location: ../painel-admin.php");
    exit();
}

$sql = "SELECT usu_email, usu_senha FROM usuarios WHERE usu_email = '$email' and usu_senha = '$senha'";

$result = mysqli_query($conn, $sql);

if ($result){
    $id_cadastrado = mysqli_fetch_assoc($conn);

    header("Location: ../index.php");
    exit();
}
else{
    echo "<h1 class=''>Erro ao encontrar usuario no banco</h1>";
    echo "<a href='singun.php'><button class=''>voltar</button></a>";
}

?>