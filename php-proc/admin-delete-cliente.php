<?php
session_start();
include_once("conexao.php");

// Trava de Segurança
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM usuarios WHERE usu_id = '$id'";
    mysqli_query($conn, $query);
}

header("Location: ../admin-clientes.php");
exit();
?>
