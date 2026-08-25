<?php
session_start();
include_once("conexao.php");

// Trava de Segurança
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $query = "DELETE FROM vendedores WHERE vend_id = $id";
    if (mysqli_query($conn, $query)) {
        header("Location: ../admin-vendedores.php?msg=excluido");
    } else {
        echo "Erro ao excluir: " . mysqli_error($conn);
    }
} else {
    header("Location: ../admin-vendedores.php");
}
?>
