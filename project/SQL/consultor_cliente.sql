-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 30-Dez-2020 às 11:16
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdai`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultor_cliente`
--

CREATE TABLE `consultor_cliente` (
  `consultor_utilizador_id` int(11) NOT NULL,
  `cliente_utilizador_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `consultor_cliente`
--

INSERT INTO `consultor_cliente` (`consultor_utilizador_id`, `cliente_utilizador_id`) VALUES
(1, 3),
(4, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `consultor_cliente`
--
ALTER TABLE `consultor_cliente`
  ADD PRIMARY KEY (`consultor_utilizador_id`,`cliente_utilizador_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
