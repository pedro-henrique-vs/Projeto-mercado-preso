-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Ago-2024 às 20:01
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sales_module`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`) VALUES
(1, 'Camiseta Estampada', '29.90', 'Camiseta 100% algodão com estampa divertida. Disponível em várias cores.'),
(2, 'Tênis Esportivo', '199.90', 'Tênis esportivo com tecnologia de amortecimento. Ideal para corrida e atividades físicas.'),
(3, 'Relógio Digital', '89.90', 'Relógio digital com cronômetro e alarme. Design moderno e resistente à água.'),
(4, 'Mochila Casual', '149.90', 'Mochila casual com vários compartimentos. Ideal para o dia a dia e viagens curtas.'),
(5, 'Fone de Ouvido Bluetooth', '129.90', 'Fone de ouvido Bluetooth com cancelamento de ruído e bateria de longa duração.'),
(6, 'Óculos de Sol', '79.90', 'Óculos de sol com proteção UV e design estiloso. Disponível em várias cores de lente.'),
(7, 'Jaqueta de Couro', '299.90', 'Jaqueta de couro legítimo, ideal para o inverno. Disponível em tamanhos diversos.'),
(8, 'Capacete de Bicicleta', '119.90', 'Capacete de bicicleta com sistema de ventilação e ajuste para maior conforto e segurança.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `sale_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `quantity`, `total`, `sale_date`) VALUES
(1, 1, 2, '59.80', '2024-08-26 17:28:45'),
(2, 4, 1, '149.90', '2024-08-26 17:28:45'),
(3, 8, 2, '239.80', '2024-08-26 17:28:45'),
(4, 5, 1, '129.90', '2024-08-26 17:28:45'),
(5, 5, 1, '129.90', '2024-08-26 17:38:14'),
(6, 1, 1, '29.90', '2024-08-26 17:38:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
