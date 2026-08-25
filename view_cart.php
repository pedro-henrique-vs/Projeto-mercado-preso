<?php
session_start();

// Verificar se o carrinho existe
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "O carrinho está vazio.";
    echo '<br><a href="products.php">Voltar aos Produtos</a>';
    exit;
}

$cart = $_SESSION['cart'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Carrinho</title>
</head>
<body>
    <h1>Carrinho de Compras</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nome do Produto</th>
                <th>Quantidade</th>
                <th>Preço Unitário</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $grandTotal = 0.00;
            foreach ($cart as $productId => $item):
                $total = $item['price'] * $item['quantity'];
                $grandTotal += $total;
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                    <td>R$ <?php echo number_format($item['price'], 2, ',', '.'); ?></td>
                    <td>R$ <?php echo number_format($total, 2, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Total: R$ <?php echo number_format($grandTotal, 2, ',', '.'); ?></h2>
    
    <form action="checkout.php" method="post">
        <button type="submit">Finalizar Compra</button>
    </form>
    
    <br>
    <a href="products.php">Voltar aos Produtos</a>
</body>
</html>
