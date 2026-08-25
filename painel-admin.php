<?php
session_start();
include_once("php-proc/conexao.php");

// Trava de Segurança
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: index.php");
    exit();
}

// Queries for Dashboard
$query_vend = "SELECT COUNT(*) as total_vendedores FROM vendedores";
$result_vend = mysqli_query($conn, $query_vend);
$row_vend = mysqli_fetch_assoc($result_vend);
$total_vendedores = $row_vend['total_vendedores'];

$query_prod = "SELECT COUNT(*) as total_produtos FROM products";
$result_prod = mysqli_query($conn, $query_prod);
$row_prod = mysqli_fetch_assoc($result_prod);
$total_produtos = $row_prod['total_produtos'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - MercadoPreso</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f4f6f9;
            color: #333333;
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #1e293b;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .sidebar h2 {
            font-size: 1.5rem;
            margin-bottom: 30px;
            text-align: center;
        }
        .sidebar h2 span {
            color: #4f46e5;
        }
        .nav-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .nav-links a {
            color: #cbd5e1;
            text-decoration: none;
            font-size: 1rem;
            padding: 10px;
            border-radius: 8px;
            transition: background-color 0.2s;
        }
        .nav-links a:hover, .nav-links a.active {
            background-color: #4f46e5;
            color: #ffffff;
        }
        .main-content {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 20px;
        }
        header h1 {
            color: #1e293b;
        }
        .logout-btn {
            background-color: #ef4444;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.2s;
        }
        .logout-btn:hover {
            background-color: #dc2626;
        }
        .cards-container {
            display: flex;
            gap: 20px;
        }
        .card {
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            flex: 1;
            text-align: center;
        }
        .card h3 {
            color: #64748b;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }
        .card p {
            font-size: 2rem;
            font-weight: bold;
            color: #4f46e5;
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <h2>Mercado<span>Preso</span></h2>
        <ul class="nav-links">
            <li><a href="painel-admin.php" class="active">Dashboard Inicial</a></li>
            <li><a href="admin-vendedores.php">Gerenciar Vendedores</a></li>
            <li><a href="admin-produtos.php">Catálogo Global</a></li>
            <li><a href="admin-relatorios.php">Relatórios</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <header>
            <h1>Painel Administrativo</h1>
            <a href="php-proc/logout.php" class="logout-btn">Sair</a>
        </header>

        <div class="cards-container">
            <div class="card">
                <h3>Vendedores Cadastrados</h3>
                <p><?= $total_vendedores ?></p>
            </div>
            <div class="card">
                <h3>Produtos no Sistema</h3>
                <p><?= $total_produtos ?></p>
            </div>
        </div>
    </main>

</body>
</html>
