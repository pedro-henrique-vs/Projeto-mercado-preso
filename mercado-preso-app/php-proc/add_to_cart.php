<?php
session_start();
include_once ("conexao.php");


// Verificar se o ID do produto está presente
if (isset($_GET['id'])) {
    $productId = intval($_GET['id']);
    
    // Buscar informações do produto
    $sql = "SELECT * FROM products WHERE id = $productId";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
    
    if ($product) {
        // Adicionar produto ao carrinho
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        
        $cart = &$_SESSION['cart'];
        
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            $cart[$productId] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => 1
            ];
        }
        
        echo "Produto adicionado ao carrinho!";
    } else {
        echo "Produto não encontrado.";
    }
}

$conn->close();
?>
<br>
<a href="products.php">Voltar aos Produtos</a>
<br>
<a href="view_cart.php">Ver Produtos</a>


