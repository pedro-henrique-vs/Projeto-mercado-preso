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

$query_cli = "SELECT COUNT(*) as total_clientes FROM usuarios";
$result_cli = mysqli_query($conn, $query_cli);
$row_cli = mysqli_fetch_assoc($result_cli);
$total_clientes = $row_cli['total_clientes'];
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
        }
        .navbar {
            background-color: #1e293b;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 40px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .navbar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffffff;
            text-decoration: none;
        }
        .navbar .logo span {
            color: #4f46e5;
        }
        .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }
        .nav-links a {
            color: #cbd5e1;
            text-decoration: none;
            font-size: 1rem;
            padding: 8px 12px;
            border-radius: 8px;
            transition: background-color 0.2s, color 0.2s;
        }
        .nav-links a:hover, .nav-links a.active {
            background-color: rgba(79, 70, 229, 0.2);
            color: #818cf8;
        }
        .logout-btn {
            background-color: #ef4444;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.2s;
        }
        .logout-btn:hover {
            background-color: #dc2626;
        }
        .main-content {
            padding: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }
        header {
            margin-bottom: 40px;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 20px;
        }
        header h1 {
            color: #1e293b;
        }
        .cards-container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        .card {
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            flex: 1;
            min-width: 250px;
            text-align: center;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0,0,0,0.1);
        }
        .card h3 {
            color: #64748b;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }
        .card p {
            font-size: 2.5rem;
            font-weight: bold;
            color: #4f46e5;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="index.php" class="logo">Mercado<span>Preso</span></a>
        <ul class="nav-links">
            <li><a href="painel-admin.php" class="active">Dashboard Inicial</a></li>
            <li><a href="admin-clientes.php">Gerenciar Clientes</a></li>
            <li><a href="admin-vendedores.php">Gerenciar Vendedores</a></li>
            <li><a href="admin-produtos.php">Catálogo Global</a></li>
            <li><a href="admin-relatorios.php">Relatórios</a></li>
        </ul>
        <a href="php-proc/logout.php" class="logout-btn">Sair</a>
    </nav>

    <main class="main-content">
        <header>
            <h1>Painel Administrativo</h1>
        </header>

        <div class="cards-container">
            <div class="card">
                <h3>Vendedores Cadastrados</h3>
                <p><?= $total_vendedores ?></p>
            </div>
            <div class="card">
                <h3>Clientes Cadastrados</h3>
                <p><?= $total_clientes ?></p>
            </div>
            <div class="card">
                <h3>Produtos no Sistema</h3>
                <p><?= $total_produtos ?></p>
            </div>
        </div>
    </main>

</body>
</html>
