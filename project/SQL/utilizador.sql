-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 30-Dez-2020 às 11:17
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
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `id` int(11) NOT NULL,
  `primeiro_nome` varchar(512) NOT NULL,
  `ultimo_nome` varchar(512) NOT NULL,
  `email` varchar(512) NOT NULL,
  `password` varchar(512) NOT NULL,
  `telemovel` bigint(20) NOT NULL,
  `cargo` varchar(512) NOT NULL,
  `data_registo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `foto_perfil` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id`, `primeiro_nome`, `ultimo_nome`, `email`, `password`, `telemovel`, `cargo`, `data_registo`, `foto_perfil`) VALUES
(1, 'David', 'Pontes', 'edsondavidpontes@gmail.com', 'david', 911932684, 'Consultor', '2020-12-30 09:09:23', 'photos/WhatsApp Image 2020-12-30 at 09.08.14.jpeg'),
(2, 'Pedro', 'Rocha', 'pedro@gmail.com', 'pedro', 999999999, 'Cliente', '2020-12-26 18:57:30', 'photos/no_profile_picture.jpg'),
(3, 'Mafalda', 'Ferreira', 'mafalda@gmail.com', 'mafalda', 926590223, 'Cliente', '2020-12-30 05:16:05', 'photos/133693404_427485805052313_151762506017944221_n.jpg'),
(4, 'Edson', 'Pontes', 'edson@edson.edson', 'edson', 988777666, 'Consultor', '2020-12-30 09:12:28', 'photos/WhatsApp Image 2020-12-30 at 09.11.41.jpeg'),
(5, 'Joana', 'Pereira', 'joana@gmail.com', 'joana', 988777665, 'Cliente', '2020-12-28 09:37:43', 'photos/no_profile_picture.jpg'),
(6, 'Admin', 'Admin', 'admin@admin.admin', 'admin', 922222222, 'Administrador', '2020-12-30 01:22:27', 'photos/no_profile_picture.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
