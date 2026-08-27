<?php
// Inclui a conexão com o banco de dados
include_once("php-proc/conexao.php");

// Query para buscar produtos
$sql = "SELECT * FROM products";

// Execução tratada para MySQLi ou PDO (se usou mysqli no seu arquivo):
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - MercadoPreso</title>
    
    <!-- Fontes e CSS Padrão da Aplicação -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index-style.css">
</head>
<body>

    <!-- Cabeçalho com Busca e Botão de Voltar -->
    <header class="navbar">
        <div class="header-container">
            <div class="search-box">
                <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="text" placeholder="Buscar no catálogo..." aria-label="Buscar produtos">
            </div>
            
            <a href="index.php" class="btn btn-secondary">
                &#8592; Voltar ao Início
            </a>
        </div>
    </header>

    <!-- Listagem Principal de Produtos -->
    <main class="main-content">
        <section class="container">
            <h1 class="section-title">Todos os Produtos</h1>

            <!-- Grid Responsiva de Cards -->
            <div class="carousel-track" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem;">
                
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        
                        <div class="product-card">
                            <!-- Placeholder ou Imagem do Produto -->
                            <div class="card-image-placeholder">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                                <span><?php echo htmlspecialchars($row['name']); ?></span>
                            </div>

                            <!-- Corpo do Card -->
                            <div class="card-body">
                                <h3 class="product-name">
                                    <?php echo htmlspecialchars($row['name']); ?>
                                </h3>
                                
                                <p class="product-price">
                                    R$ <?php echo number_format($row['price'], 2, ',', '.'); ?>
                                </p>
                                
                                <a href="cadastro.php?id=<?php echo $row['id']; ?>" class="btn btn-cart">
                                    Add to Cart
                                </a>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php else: ?>
                    <p style="grid-column: 1 / -1; text-align: center; color: var(--text-muted); padding: 2rem 0;">
                        Nenhum produto cadastrado no momento.
                    </p>
                <?php endif; ?>

            </div>
        </section>
    </main>

    <!-- Rodapé -->
    <footer class="footer">
        <div class="container footer-content">
            <p>&copy; 2026 MercadoPreso Inc. Todos os direitos reservados.</p>
            <p class="footer-legal">Aviso Legal: Preços e produtos meramente ilustrativos para ambiente de testes.</p>
        </div>
    </footer>

    <?php 
    // Fecha a conexão com o banco
    if (isset($conn)) {
        $conn->close(); 
    }
    ?>
</body>
</html>