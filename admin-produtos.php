<?php
session_start();
include_once("php-proc/conexao.php");

// Trava de Segurança
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$query = "SELECT * FROM products ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo Global de Produtos - Painel Admin</title>
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
        
        .table-container { background-color: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); padding: 20px; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #e2e8f0; }
        th { background-color: #f8fafc; color: #64748b; font-weight: 600; }
        tr:hover { background-color: #f1f5f9; }
        
        .action-links a { padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 0.85rem; font-weight: 600; }
        .delete-link { background-color: #ef4444; color: white; }
        .delete-link:hover { background-color: #dc2626; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <h2>Mercado<span>Preso</span></h2>
        <ul class="nav-links">
            <li><a href="painel-admin.php">Dashboard Inicial</a></li>
            <li><a href="admin-vendedores.php">Gerenciar Vendedores</a></li>
            <li><a href="admin-produtos.php" class="active">Catálogo Global</a></li>
            <li><a href="admin-relatorios.php">Relatórios</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <header>
            <h1>Catálogo Global de Produtos</h1>
            <a href="php-proc/logout.php" class="logout-btn">Sair</a>
        </header>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Produto</th>
                        <th>Preço</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($result) > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td>R$ <?= number_format($row['price'], 2, ',', '.') ?></td>
                                <td><?= htmlspecialchars(substr($row['description'], 0, 50)) ?>...</td>
                                <td class="action-links">
                                    <a href="php-proc/admin-delete-produto.php?id=<?= $row['id'] ?>" class="delete-link" onclick="return confirm('Tem certeza que deseja excluir este produto?');">Excluir</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align: center;">Nenhum produto encontrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>
