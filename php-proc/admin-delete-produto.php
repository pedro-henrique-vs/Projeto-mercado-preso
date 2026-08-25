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
    // Delete associated sales first (foreign key constraint might not be set up but it's good practice, or not if we want to keep sales records, but in a simple system we might just delete it)
    $query = "DELETE FROM products WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        header("Location: ../admin-produtos.php?msg=excluido");
    } else {
        echo "Erro ao excluir: " . mysqli_error($conn);
    }
} else {
    header("Location: ../admin-produtos.php");
}
?>
