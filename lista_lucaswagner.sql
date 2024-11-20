-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/11/2024 às 03:34
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lista_lucaswagner`
--
CREATE DATABASE IF NOT EXISTS `lista_lucaswagner` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `lista_lucaswagner`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome_fornecedor` varchar(150) NOT NULL,
  `cnpj_fornecedor` varchar(18) NOT NULL,
  `tel_fornecedor` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome_fornecedor`, `cnpj_fornecedor`, `tel_fornecedor`) VALUES
(1, 'Distribuidora Silva Ltda.', '12.345.678/0001-90', '+55 11 91234-5678'),
(2, 'Comércio de Materiais Oliveira S.A.', '23.456.789/0001-01', '+55 21 98765-4321'),
(3, 'Soluções Logísticas Rocha Ltda.', '34.567.890/0001-12', '+55 31 99876-5432'),
(4, 'Produtos Industriais Costa S.A.', '45.678.901/0001-23', '+55 41 97654-3210'),
(5, 'Importadora Lima Ltda.', '56.789.012/0001-34', '+55 51 96543-2109'),
(6, 'Importadora Lima Ltda.', '56.789.012/0001-34', '+55 51 96543-2109');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `num_pedido` int(11) NOT NULL,
  `data_pedido` date NOT NULL,
  `cliente` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `num_pedido`, `data_pedido`, `cliente`) VALUES
(1, 110, '2024-11-01', 'João Silva'),
(2, 120, '2024-11-05', 'Maria Oliveira'),
(3, 130, '2024-11-10', 'Carlos Souza'),
(4, 140, '2024-11-12', 'Ana Costa'),
(5, 150, '2024-11-15', 'Roberto Lima');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
