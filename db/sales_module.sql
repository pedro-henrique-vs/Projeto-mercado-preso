-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/08/2026 às 21:35
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

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendedores`
--

CREATE TABLE `vendedores` (
  `vend_id` int(11) NOT NULL,
  `vend_nome` varchar(100) DEFAULT NULL,
  `vend_email` varchar(255) DEFAULT NULL,
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
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `vend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
