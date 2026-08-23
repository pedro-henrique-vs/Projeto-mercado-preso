<?php
session_start();
include_once("php-proc/conexao.php");

$usu_logado = null;

if (isset($_SESSION['id_cadastrado'])){
  $id_logado = $_SESSION['id_cadastrado'];


  $sql = "SELECT vend_id AS id, vend_nome AS nome, 'vendedor' AS tipo FROM vendedores WHERE vend_id = '$id_logado' UNION SELECT usu_id AS id, usu_nome AS nome, 'cliente' AS tipo FROM usuarios WHERE usu_id = '$id_logado'";

  $result = $conn->query($sql);

  if ($result && $result->num_rows > 0){
    $usu_logado = $result->fetch_assoc();
    $result->free();
  }
}

$sql_products = "SELECT * FROM products LIMIT 10";

$result_products = $conn->query($sql_products);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loja Virtual - Vitrine de Produtos</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/index-style.css">
</head>
<body>

  <!-- Cabeçalho Limpo -->
  <header class="navbar">
    <div class="header-container">
      <div class="search-box">
        <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <input type="text" placeholder="Buscar produtos..." aria-label="Buscar produtos">
      </div>
      <a href="singin.php" class="btn btn-primary">Cadastre-se</a>
    </div>
  </header>

  <!-- Corpo Principal -->
  <main class="main-content">
    <section class="products-section container">
      <h2 class="section-title">Produtos em Destaque</h2>
      
      <!-- Container do Carrossel (Máximo 3 itens por vez) -->
      <div class="carousel-wrapper">
        <button class="carousel-btn prev-btn" id="prevBtn" aria-label="Anterior">&#10094;</button>

        <div class="carousel-viewport">
          <div class="carousel-track" id="carouselTrack">
            
          <?php //while ($prod = $result_products->fetch_assoc()): ?>
            <!-- Card 1 -->
            <div class="product-card">
              <div class="card-image-placeholder">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                  <circle cx="8.5" cy="8.5" r="1.5"></circle>
                  <polyline points="21 15 16 10 5 21"></polyline>
                </svg>
                <span>Sua Imagem Aqui</span>
              </div>
              <div class="card-body">
                <h3 class="product-name">Teclado Mecânico RGB</h3>
                <p class="product-price">R$ 299,90</p>
                <a href="singin.php" class="btn btn-cart">Add to Cart</a>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="product-card">
              <div class="card-image-placeholder">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                  <circle cx="8.5" cy="8.5" r="1.5"></circle>
                  <polyline points="21 15 16 10 5 21"></polyline>
                </svg>
                <span>Sua Imagem Aqui</span>
              </div>
              <div class="card-body">
                <h3 class="product-name">Mouse Gamer Wireless</h3>
                <p class="product-price">R$ 189,00</p>
                <a href="singin.php" class="btn btn-cart">Add to Cart</a>
              </div>
            </div>

            <!-- Card 3 -->
            <div class="product-card">
              <div class="card-image-placeholder">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                  <circle cx="8.5" cy="8.5" r="1.5"></circle>
                  <polyline points="21 15 16 10 5 21"></polyline>
                </svg>
                <span>Sua Imagem Aqui</span>
              </div>
              <div class="card-body">
                <h3 class="product-name">Headset Surround 7.1</h3>
                <p class="product-price">R$ 349,50</p>
                <a href="singin.php" class="btn btn-cart">Add to Cart</a>
              </div>
            </div>

            <!-- Card 4 -->
            <div class="product-card">
              <div class="card-image-placeholder">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                  <circle cx="8.5" cy="8.5" r="1.5"></circle>
                  <polyline points="21 15 16 10 5 21"></polyline>
                </svg>
                <span>Sua Imagem Aqui</span>
              </div>
              <div class="card-body">
                <h3 class="product-name">Monitor 24" Full HD 144Hz</h3>
                <p class="product-price">R$ 899,00</p>
                <a href="singin.php" class="btn btn-cart">Add to Cart</a>
              </div>
            </div>

            <!-- Card 5 -->
            <div class="product-card">
              <div class="card-image-placeholder">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                  <circle cx="8.5" cy="8.5" r="1.5"></circle>
                  <polyline points="21 15 16 10 5 21"></polyline>
                </svg>
                <span>Sua Imagem Aqui</span>
              </div>
              <div class="card-body">
                <h3 class="product-name">Cadeira Gamer Ergonômica</h3>
                <p class="product-price">R$ 749,90</p>
                <a href="singin.php" class="btn btn-cart">Add to Cart</a>
              </div>
            </div>

            <!-- Card 6 -->
            <div class="product-card">
              <div class="card-image-placeholder">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                  <circle cx="8.5" cy="8.5" r="1.5"></circle>
                  <polyline points="21 15 16 10 5 21"></polyline>
                </svg>
                <span>Sua Imagem Aqui</span>
              </div>
              <div class="card-body">
                <h3 class="product-name">Webcam Full HD 1080p</h3>
                <p class="product-price">R$ 220,00</p>
                <a href="singin.php" class="btn btn-cart">Add to Cart</a>
              </div>
            </div>

          </div>
        </div>

        <button class="carousel-btn next-btn" id="nextBtn" aria-label="Próximo">&#10095;</button>
      </div>

      <!-- Indicadores de Navegação -->
      <div class="carousel-dots" id="carouselDots"></div>

      <!-- Botão Centralizado Ver Tudo -->
      <div class="view-all-container">
        <a href="products.php" class="btn btn-secondary btn-lg">Ver Tudo</a>
      </div>
    </section>
  </main>

  <!-- Rodapé -->
  <footer class="footer">
    <div class="container footer-content">
      <p>&copy; 2026 Loja Virtual Software Inc. Todos os direitos reservados.</p>
      <p class="footer-legal">Aviso Legal: Este é um projeto de demonstração front-end. Preços e produtos são meramente ilustrativos.</p>
    </div>
  </footer>

  <script src="scripts/script-carrossel.js"></script>
</body>
</html>