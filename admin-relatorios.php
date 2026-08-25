<?php
session_start();
include_once("php-proc/conexao.php");

// Trava de Segurança
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$query = "
    SELECT s.id, s.quantity, s.total, s.sale_date, p.name as product_name
    FROM sales s
    LEFT JOIN products p ON s.product_id = p.id
    ORDER BY s.sale_date DESC
";
$result = mysqli_query($conn, $query);

$query_total = "SELECT SUM(total) as receita_total, COUNT(id) as vendas_totais FROM sales";
$result_total = mysqli_query($conn, $query_total);
$row_total = mysqli_fetch_assoc($result_total);
$receita_total = $row_total['receita_total'] ?? 0;
$vendas_totais = $row_total['vendas_totais'] ?? 0;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios - Painel Admin</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
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
        .sidebar h2 { font-size: 1.5rem; margin-bottom: 30px; text-align: center; }
        .sidebar h2 span { color: #4f46e5; }
        .nav-links { list-style: none; display: flex; flex-direction: column; gap: 15px; }
        .nav-links a {
            color: #cbd5e1; text-decoration: none; font-size: 1rem; padding: 10px; border-radius: 8px; transition: background-color 0.2s;
        }
        .nav-links a:hover, .nav-links a.active { background-color: #4f46e5; color: #ffffff; }
        
        .main-content { flex: 1; padding: 40px; display: flex; flex-direction: column; }
        header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; border-bottom: 2px solid #e2e8f0; padding-bottom: 20px; }
        header h1 { color: #1e293b; }
        .logout-btn { background-color: #ef4444; color: white; padding: 10px 20px; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.2s; }
        .logout-btn:hover { background-color: #dc2626; }
        
        .cards-container { display: flex; gap: 20px; margin-bottom: 30px; }
        .card { background-color: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); flex: 1; text-align: center; }
        .card h3 { color: #64748b; margin-bottom: 10px; font-size: 1.1rem; }
        .card p { font-size: 2rem; font-weight: bold; color: #10b981; }
        .card p.blue { color: #3b82f6; }
        
        .table-container { background-color: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); padding: 20px; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #e2e8f0; }
        th { background-color: #f8fafc; color: #64748b; font-weight: 600; }
        tr:hover { background-color: #f1f5f9; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <h2>Mercado<span>Preso</span></h2>
        <ul class="nav-links">
            <li><a href="painel-admin.php">Dashboard Inicial</a></li>
            <li><a href="admin-vendedores.php">Gerenciar Vendedores</a></li>
            <li><a href="admin-produtos.php">Catálogo Global</a></li>
            <li><a href="admin-relatorios.php" class="active">Relatórios</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <header>
            <h1>Relatórios e Vendas</h1>
            <a href="php-proc/logout.php" class="logout-btn">Sair</a>
        </header>

        <div class="cards-container">
            <div class="card">
                <h3>Total de Vendas (Qtd)</h3>
                <p class="blue"><?= $vendas_totais ?></p>
            </div>
            <div class="card">
                <h3>Receita Total</h3>
                <p>R$ <?= number_format($receita_total, 2, ',', '.') ?></p>
            </div>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID Venda</th>
                        <th>Data/Hora</th>
                        <th>Produto</th>
                        <th>Qtd.</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($result) > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td>#<?= $row['id'] ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($row['sale_date'])) ?></td>
                                <td><?= htmlspecialchars($row['product_name'] ?? 'Produto Removido') ?></td>
                                <td><?= $row['quantity'] ?></td>
                                <td>R$ <?= number_format($row['total'], 2, ',', '.') ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align: center;">Nenhuma venda registrada.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>
