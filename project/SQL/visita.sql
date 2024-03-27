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
-- Estrutura da tabela `visita`
--

CREATE TABLE `visita` (
  `data_registo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_visita` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cliente_utilizador_id` int(11) NOT NULL,
  `imoveis_referencia` int(11) NOT NULL,
  `cliente_utilizador_id1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `visita`
--

INSERT INTO `visita` (`data_registo`, `data_visita`, `cliente_utilizador_id`, `imoveis_referencia`, `cliente_utilizador_id1`) VALUES
('2020-12-30 00:36:53', '2021-01-06 00:36:53', 3, 3, 3),
('2020-12-30 10:02:55', '2021-01-06 10:02:55', 3, 8, 3),
('2020-12-30 07:39:13', '2021-01-06 07:39:13', 3, 15, 3),
('2020-12-30 09:43:40', '2021-01-06 09:43:40', 3, 18, 3),
('2020-12-30 07:39:34', '2021-01-06 07:39:34', 3, 22, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`cliente_utilizador_id`,`imoveis_referencia`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `visita_fk1` FOREIGN KEY (`cliente_utilizador_id`) REFERENCES `cliente` (`utilizador_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
