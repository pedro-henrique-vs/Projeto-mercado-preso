document.addEventListener('DOMContentLoaded', () => {
  const track = document.getElementById('carouselTrack');
  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');
  const dotsContainer = document.getElementById('carouselDots');
  const cards = Array.from(track.children);

  let currentIndex = 0;

  // Ajusta dinamicamente a quantidade de cards conforme o tamanho de tela
  function getCardsPerPage() {
    if (window.innerWidth <= 640) return 1;
    if (window.innerWidth <= 992) return 2;
    return 3; // Máximo de 3 itens conforme solicitado
  }

  function getTotalPages() {
    return Math.ceil(cards.length / getCardsPerPage());
  }

  function createDots() {
    dotsContainer.innerHTML = '';
    const totalPages = getTotalPages();
    
    for (let i = 0; i < totalPages; i++) {
      const dot = document.createElement('div');
      dot.classList.add('dot');
      if (i === currentIndex) dot.classList.add('active');
      dot.addEventListener('click', () => goToPage(i));
      dotsContainer.appendChild(dot);
    }
  }

  function updateCarousel() {
    const cardsPerPage = getCardsPerPage();
    const totalPages = getTotalPages();

    if (currentIndex >= totalPages) {
      currentIndex = totalPages - 1;
    }

    const cardWidth = cards[0].getBoundingClientRect().width;
    const gap = 24; // 1.5rem
    const moveAmount = (cardWidth * cardsPerPage + gap * cardsPerPage) * currentIndex;

    track.style.transform = `translateX(-${moveAmount}px)`;

    prevBtn.disabled = currentIndex === 0;
    nextBtn.disabled = currentIndex === totalPages - 1;

    const dots = Array.from(dotsContainer.children);
    dots.forEach((dot, index) => {
      dot.classList.toggle('active', index === currentIndex);
    });
  }

  function goToPage(pageIndex) {
    currentIndex = pageIndex;
    updateCarousel();
  }

  prevBtn.addEventListener('click', () => {
    if (currentIndex > 0) {
      currentIndex--;
      updateCarousel();
    }
  });

  nextBtn.addEventListener('click', () => {
    if (currentIndex < getTotalPages() - 1) {// Aguarda o navegador carregar todo o HTML (DOM) antes de executar o script.
// Isso evita erros de tentar buscar elementos na tela que ainda não foram renderizados.
document.addEventListener('DOMContentLoaded', () => {

  // --- SELEÇÃO DOS ELEMENTOS DO DOM ---
  
  // Seleciona o contêiner interno (trilho) que guarda todos os cards e que será movimentado com CSS.
  const track = document.getElementById('carouselTrack');
  
  // Seleciona o botão de navegação para a esquerda (anterior).
  const prevBtn = document.getElementById('prevBtn');
  
  // Seleciona o botão de navegação para a direita (próximo).
  const nextBtn = document.getElementById('nextBtn');
  
  // Seleciona o contêiner onde os pontos/indicadores (dots) de navegação serão inseridos dinamicamente.
  const dotsContainer = document.getElementById('carouselDots');
  
  // Captura todos os elementos filhos do 'track' (os cards) e transforma a HTMLCollection em um Array JavaScript real.
  // Isso permite usar métodos de array como .length, .forEach, etc.
  const cards = Array.from(track.children);


  // --- ESTADO DA APLICAÇÃO ---
  
  // Variável de controle que guarda o índice da página/slide atual. Começa na primeira página (índice 0).
  let currentIndex = 0;


  // --- FUNÇÕES AUXILIARES DE CÁLCULO ---

  /**
   * Calcula quantos cards devem ser exibidos por vez na tela com base na largura atual da janela (viewport).
   * @returns {number} Quantidade de cards por página.
   */
  function getCardsPerPage() {
    // Se a largura da tela for menor ou igual a 640px (ex: celulares), mostra apenas 1 card por vez.
    if (window.innerWidth <= 640) return 1;
    
    // Se for entre 641px e 992px (ex: tablets e telas médias), mostra 2 cards.
    if (window.innerWidth <= 992) return 2;
    
    // Para telas maiores que 992px (desktops), mostra o limite máximo de 3 cards.
    return 3;
  }

  /**
   * Calcula o número total de páginas/grupos necessários para exibir todos os cards.
   * @returns {number} Número total de páginas.
   */
  function getTotalPages() {
    // Math.ceil arredonda o resultado para cima. Ex: 7 cards / 3 por página = 2.33 -> Arredonda para 3 páginas.
    return Math.ceil(cards.length / getCardsPerPage());
  }


  // --- FUNÇÕES DE INTERFACE E RENDERIZAÇÃO ---

  /**
   * Cria os pontos (dots) de navegação na tela de acordo com o número total de páginas.
   */
  function createDots() {
    // Limpa o conteúdo do contêiner para não duplicar os pontos ao recriá-los (ex: ao redimensionar a tela).
    dotsContainer.innerHTML = '';
    
    // Obtém a quantidade atual de páginas necessárias.
    const totalPages = getTotalPages();
    
    // Cria um ponto para cada página disponível.
    for (let i = 0; i < totalPages; i++) {
      // Cria um elemento HTML <div> na memória.
      const dot = document.createElement('div');
      
      // Adiciona a classe CSS 'dot' ao elemento recém-criado para estilização.
      dot.classList.add('dot');
      
      // Se o índice deste ponto for igual ao índice da página atual, adiciona a classe 'active'.
      if (i === currentIndex) dot.classList.add('active');
      
      // Adiciona um evento de clique no ponto: ao clicar, navega diretamente para a página correspondente (índice 'i').
      dot.addEventListener('click', () => goToPage(i));
      
      // Insere o ponto criado dentro do contêiner 'carouselDots' no HTML.
      dotsContainer.appendChild(dot);
    }
  }

  /**
   * Atualiza a posição do trilho (track), o estado dos botões e os pontos ativos na tela.
   */
  function updateCarousel() {
    // Reobtém a quantidade de cards por página e o total de páginas atuais.
    const cardsPerPage = getCardsPerPage();
    const totalPages = getTotalPages();

    // Garante que o índice atual não fique fora dos limites caso o número de páginas diminua (ex: ao aumentar a tela).
    if (currentIndex >= totalPages) {
      currentIndex = totalPages - 1; // Ajusta para a última página válida.
    }

    // Pega a largura exata do primeiro card em pixels (considerando padding/borders renderizados).
    const cardWidth = cards[0].getBoundingClientRect().width;
    
    // Define o espaçamento (gap) em pixels que existe entre os cards via CSS (ex: 1.5rem = 24px).
    const gap = 24;
    
    // Calcula a distância exata em pixels que o trilho precisa se deslocar para a esquerda.
    // Fórmula: (largura dos cards visíveis + espaço entre eles) * número da página atual.
    const moveAmount = (cardWidth * cardsPerPage + gap * cardsPerPage) * currentIndex;

    // Aplica a transformação CSS no trilho para movê-lo no eixo X (horizontal) para a esquerda (valor negativo).
    track.style.transform = `translateX(-${moveAmount}px)`;

    // Desabilita o botão 'Anterior' se estivermos na primeira página (índice 0).
    prevBtn.disabled = currentIndex === 0;
    
    // Desabilita o botão 'Próximo' se estivermos na última página.
    nextBtn.disabled = currentIndex === totalPages - 1;

    // Atualiza a classe 'active' nos pontos de navegação.
    const dots = Array.from(dotsContainer.children);
    dots.forEach((dot, index) => {
      // O método .toggle adiciona a classe se a condição for true e remove se for false.
      dot.classList.toggle('active', index === currentIndex);
    });
  }

  /**
   * Muda o carrossel diretamente para uma página específica.
   * @param {number} pageIndex - O índice da página para a qual se deseja ir.
   */
  function goToPage(pageIndex) {
    currentIndex = pageIndex; // Atualiza a página atual.
    updateCarousel();         // Reposiciona o carrossel na tela.
  }


  // --- EVENT LISTENERS (INTERAÇÕES DO USUÁRIO) ---

  // Evento de clique no botão "Anterior"
  prevBtn.addEventListener('click', () => {
    // Só recua se não estiver na primeira página
    if (currentIndex > 0) {
      currentIndex--;    // Decrementa o índice da página em 1
      updateCarousel();  // Atualiza a interface
    }
  });

  // Evento de clique no botão "Próximo"
  nextBtn.addEventListener('click', () => {
    // Só avança se não estiver na última página
    if (currentIndex < getTotalPages() - 1) {
      currentIndex++;    // Incrementa o índice da página em 1
      updateCarousel();  // Atualiza a interface
    }
  });

  // Evento disparado sempre que o usuário redimensiona a janela do navegador (resize)
  window.addEventListener('resize', () => {
    // Recria os pontos, pois a quantidade de páginas pode ter mudado (ex: passou de mobile para desktop)
    createDots();
    
    // Recalcula as larguras e move o carrossel para a posição correta
    updateCarousel();
  });


  // --- INICIALIZAÇÃO ---
  
  // Executa a criação inicial dos pontos ao carregar a página.
  createDots();
  
  // Ajusta a posição inicial do carrossel e o estado dos botões ao carregar a página.
  updateCarousel();
});
      currentIndex++;
      updateCarousel();
    }
  });

  window.addEventListener('resize', () => {
    createDots();
    updateCarousel();
  });

  createDots();
  updateCarousel();
});