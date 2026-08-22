<?php
session_start();
include_once ("conexao.php");

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    
    foreach ($cart as $productId => $item) {
        $total = $item['price'] * $item['quantity'];
        
        // Inserir venda
        $stmt = $conn->prepare("INSERT INTO sales (product_id, quantity, total) VALUES (?, ?, ?)");
        $stmt->bind_param("iid", $productId, $item['quantity'], $total);
        $stmt->execute();
        $stmt->close();
    }
    
    // Limpar o carrinho
    $_SESSION['cart'] = [];
    
    echo "Compra finalizada com sucesso!";
} else {
    echo "O carrinho está vazio.";
}

$conn->close();
?>
<a href="products.php">Continuar Comprando</a>
