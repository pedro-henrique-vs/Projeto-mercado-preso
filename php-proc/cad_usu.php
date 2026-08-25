<?php
session_start();
include_once("conexao.php");

//nome
$nome = $_POST['nome'];

//email do usuario 
$email = $_POST['email'];

//senha 
$senha = $_POST['senha'];

$sql = "INSERT INTO usuarios (
    usu_nome,
    usu_email,
    usu_senha
) 
VALUES (
    '$nome',
    '$email',
    '$senha'
)";

$result = mysqli_query($conn, $sql);

if ($result) {
    $id_cadastrado = mysqli_insert_id($conn);

    header("Location: ../index.php");
    exit();
}
else{
    echo "<h1 class=''>Erro ao cadastrar usuario no banco</h1>";
    echo "<a href='singin.php'><button class=''>voltar</button></a>";
}

?>