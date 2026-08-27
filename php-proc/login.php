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

$sql_usu = "SELECT usu_id as id, usu_nome as nome, usu_email as email, 'cliente' as tipo FROM usuarios WHERE usu_email = '$email' AND usu_senha = '$senha'";
$result_usu = mysqli_query($conn, $sql_usu);

if ($result_usu && mysqli_num_rows($result_usu) > 0){
    $usuario = mysqli_fetch_assoc($result_usu);
    $_SESSION['tipo_usuario'] = $usuario['tipo'];
    $_SESSION['nome_usuario'] = $usuario['nome'];
    $_SESSION['id_cadastrado'] = $usuario['id'];
    header("Location: ../painel-cliente.php");
    exit();
}

$sql_vend = "SELECT vend_id as id, IFNULL(vend_nome, vend_razao_social) as nome, vend_email as email, 'vendedor' as tipo FROM vendedores WHERE vend_email = '$email' AND vend_senha = '$senha'";
$result_vend = mysqli_query($conn, $sql_vend);

if ($result_vend && mysqli_num_rows($result_vend) > 0){
    $vendedor = mysqli_fetch_assoc($result_vend);
    $_SESSION['tipo_usuario'] = $vendedor['tipo'];
    $_SESSION['nome_usuario'] = $vendedor['nome'];
    $_SESSION['id_cadastrado'] = $vendedor['id'];
    header("Location: ../painel-vendedor.php");
    exit();
}

echo "<h1 class=''>Erro ao encontrar usuario no banco</h1>";
echo "<a href='../login.php'><button class=''>voltar</button></a>";

?>