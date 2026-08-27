-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/08/2026 às 01:38
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sales_module`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`) VALUES
(1, 'Camiseta Estampada', 29.90, 'Camiseta 100% algodão com estampa divertida. Disponível em várias cores.'),
(2, 'Tênis Esportivo', 199.90, 'Tênis esportivo com tecnologia de amortecimento. Ideal para corrida e atividades físicas.'),
(3, 'Relógio Digital', 89.90, 'Relógio digital com cronômetro e alarme. Design moderno e resistente à água.'),
(4, 'Mochila Casual', 149.90, 'Mochila casual com vários compartimentos. Ideal para o dia a dia e viagens curtas.'),
(5, 'Fone de Ouvido Bluetooth', 129.90, 'Fone de ouvido Bluetooth com cancelamento de ruído e bateria de longa duração.'),
(6, 'Óculos de Sol', 79.90, 'Óculos de sol com proteção UV e design estiloso. Disponível em várias cores de lente.'),
(7, 'Jaqueta de Couro', 299.90, 'Jaqueta de couro legítimo, ideal para o inverno. Disponível em tamanhos diversos.'),
(8, 'Capacete de Bicicleta', 119.90, 'Capacete de bicicleta com sistema de ventilação e ajuste para maior conforto e segurança.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `sale_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `quantity`, `total`, `sale_date`) VALUES
(1, 1, 2, 59.80, '2024-08-26 17:28:45'),
(2, 4, 1, 149.90, '2024-08-26 17:28:45'),
(3, 8, 2, 239.80, '2024-08-26 17:28:45'),
(4, 5, 1, 129.90, '2024-08-26 17:28:45'),
(5, 5, 1, 129.90, '2024-08-26 17:38:14'),
(6, 1, 1, 29.90, '2024-08-26 17:38:14');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_nome` varchar(250) DEFAULT NULL,
  `usu_email` varchar(100) DEFAULT NULL,
  `usu_senha` varchar(255) DEFAULT NULL,
  `usu_cpf` varchar(11) DEFAULT NULL,
  `usu_telefone` varchar(11) DEFAULT NULL,
  `usu_data_nasc` date DEFAULT NULL,
  `usu_cadastro_completo` int(1) DEFAULT 0,
  `usu_data_criacao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_nome`, `usu_email`, `usu_senha`, `usu_cpf`, `usu_telefone`, `usu_data_nasc`, `usu_cadastro_completo`, `usu_data_criacao`) VALUES
(1, 'Pedro Admin', 'alinario@host', '123', NULL, NULL, NULL, 0, '2026-08-26 19:31:23'),
(2, 'Jo├úo Silva', 'joao.silva@gmail.com', 'senha123', '01234567890', '11987654321', '1992-01-10', 1, '2026-08-26 20:09:42'),
(3, 'Ana Souza', 'ana.souza@hotmail.com', 'senha123', '12345678901', '11976543210', '1994-03-25', 1, '2026-08-26 20:09:42'),
(4, 'Pedro Santos', 'pedro.santos@yahoo.com', 'senha123', '23456789012', '11965432109', '1988-07-14', 1, '2026-08-26 20:09:42'),
(5, 'Fernanda Lima', 'fernanda.lima@outlook.com', 'senha123', '34567890123', '11954321098', '1990-12-05', 1, '2026-08-26 20:09:42'),
(6, 'Roberto Oliveira', 'roberto.oliveira@gmail.com', 'senha123', '45678901234', '11943210987', '1985-09-30', 1, '2026-08-26 20:09:42'),
(7, 'Juliana Alves', 'juliana.alves@hotmail.com', 'senha123', '56789012345', '11932109876', '1995-11-20', 1, '2026-08-26 20:09:42'),
(8, 'Marcos Rodrigues', 'marcos.rodrigues@yahoo.com', 'senha123', '67890123456', '11921098765', '1993-02-18', 1, '2026-08-26 20:09:42'),
(9, 'Camila Fernandes', 'camila.fernandes@outlook.com', 'senha123', '78901234567', '11910987654', '1989-06-08', 1, '2026-08-26 20:09:42'),
(10, 'Rafael Costa', 'rafael.costa@gmail.com', 'senha123', '89012345678', '11909876543', '1987-04-12', 1, '2026-08-26 20:09:42'),
(11, 'Beatriz Martins', 'beatriz.martins@hotmail.com', 'senha123', '90123456789', '11898765432', '1991-10-28', 1, '2026-08-26 20:09:42');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendedores`
--

CREATE TABLE `vendedores` (
  `vend_id` int(11) NOT NULL,
  `vend_nome` varchar(100) DEFAULT NULL,
  `vend_email` varchar(255) DEFAULT NULL,
  `vend_senha` varchar(255) NOT NULL,
  `vend_dtnasc` date DEFAULT NULL,
  `vend_razao_social` varchar(255) DEFAULT NULL,
  `vend_nomefantasia` varchar(255) DEFAULT NULL,
  `vend_inscricao_estadual` varchar(30) DEFAULT NULL,
  `vend_cep` varchar(9) DEFAULT NULL,
  `vend_numero` varchar(20) DEFAULT NULL,
  `vend_logradouro` varchar(150) DEFAULT NULL,
  `vend_bairro` varchar(150) DEFAULT NULL,
  `tipo_pessoa` varchar(2) DEFAULT NULL,
  `vend_cpf` varchar(14) DEFAULT NULL,
  `vend_cnpj` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vendedores`
--

INSERT INTO `vendedores` (`vend_id`, `vend_nome`, `vend_email`, `vend_senha`, `vend_dtnasc`, `vend_razao_social`, `vend_nomefantasia`, `vend_inscricao_estadual`, `vend_cep`, `vend_numero`, `vend_logradouro`, `vend_bairro`, `tipo_pessoa`, `vend_cpf`, `vend_cnpj`) VALUES
(9, 'Lucas Almeida', 'lucas.almeida@gmail.com', 'senha123', '1990-05-15', NULL, NULL, NULL, '01001-000', '100', 'Pra├ºa da S├®', 'S├®', 'PF', '111.222.333-44', NULL),
(10, NULL, 'contato@techstore.com.br', '', NULL, 'Tech Store Comercio Eletronico LTDA', 'TechStore', '123456789', '02002-000', '200', 'Rua Volunt├írios da P├ítria', 'Santana', 'PJ', NULL, '11.222.333/0001-44'),
(11, 'Mariana Costa', 'mariana.costa@hotmail.com', '', '1985-08-22', NULL, NULL, NULL, '03003-000', '300', 'Avenida Paulista', 'Bela Vista', 'PF', '555.666.777-88', NULL),
(12, NULL, 'vendas@modafit.com.br', '', NULL, 'Moda Fit Vestuarios SA', 'ModaFit', '987654321', '04004-000', '400', 'Rua Funchal', 'Vila Ol├¡mpia', 'PJ', NULL, '55.666.777/0001-88'),
(13, 'Carlos Pereira', 'carlos.pereira5@yahoo.com', '', '1978-11-30', NULL, NULL, NULL, '05005-000', '500', 'Avenida Brigadeiro Faria Lima', 'Pinheiros', 'PF', '999.000.111-22', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`),
  ADD UNIQUE KEY `usu_cpf` (`usu_cpf`);

--
-- Índices de tabela `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`vend_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `vend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
