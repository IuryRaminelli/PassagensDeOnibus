-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/07/2024 às 14:53
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
-- Banco de dados: `onibus`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `assentos`
--

CREATE TABLE `assentos` (
  `idAssento` int(11) NOT NULL,
  `fkOnibus` int(11) NOT NULL,
  `fkUser` int(11) NOT NULL,
  `numAssento` int(11) NOT NULL,
  `tipoAssento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `assentos`
--

INSERT INTO `assentos` (`idAssento`, `fkOnibus`, `fkUser`, `numAssento`, `tipoAssento`) VALUES
(81, 7, 5, 1, 'disponivel'),
(82, 7, 5, 2, 'disponivel'),
(83, 7, 5, 3, 'disponivel'),
(84, 7, 5, 4, 'disponivel'),
(85, 7, 5, 5, 'disponivel'),
(86, 7, 5, 6, 'disponivel'),
(87, 7, 5, 7, 'disponivel'),
(88, 7, 5, 8, 'disponivel'),
(89, 7, 5, 9, 'disponivel'),
(90, 7, 5, 10, 'disponivel'),
(91, 7, 5, 11, 'disponivel'),
(92, 7, 5, 12, 'disponivel'),
(93, 7, 5, 13, 'disponivel'),
(94, 7, 5, 14, 'disponivel'),
(95, 7, 5, 15, 'disponivel'),
(96, 7, 5, 16, 'disponivel'),
(97, 7, 5, 17, 'disponivel'),
(98, 7, 5, 18, 'disponivel'),
(99, 7, 5, 19, 'disponivel'),
(100, 7, 5, 20, 'disponivel'),
(101, 7, 5, 21, 'ocupado'),
(102, 7, 5, 22, 'disponivel'),
(103, 7, 5, 23, 'disponivel'),
(104, 7, 5, 24, 'disponivel'),
(105, 7, 5, 25, 'ocupado'),
(106, 7, 5, 26, 'disponivel'),
(107, 7, 5, 27, 'disponivel'),
(108, 7, 5, 28, 'disponivel'),
(109, 7, 5, 29, 'disponivel'),
(110, 7, 5, 30, 'disponivel'),
(111, 7, 5, 31, 'ocupado'),
(112, 7, 5, 32, 'ocupado'),
(113, 7, 5, 33, 'disponivel'),
(114, 7, 5, 34, 'disponivel'),
(115, 7, 5, 35, 'disponivel'),
(116, 7, 5, 36, 'disponivel'),
(117, 7, 5, 37, 'disponivel'),
(118, 7, 5, 38, 'disponivel'),
(119, 7, 5, 39, 'disponivel'),
(120, 7, 5, 40, 'disponivel'),
(121, 8, 5, 1, 'disponivel'),
(122, 8, 5, 2, 'disponivel'),
(123, 8, 5, 3, 'disponivel'),
(124, 8, 1, 4, 'ocupado'),
(125, 8, 5, 5, 'disponivel'),
(126, 8, 5, 6, 'disponivel'),
(127, 8, 5, 7, 'disponivel'),
(128, 8, 1, 8, 'ocupado'),
(129, 8, 5, 9, 'disponivel'),
(130, 8, 5, 10, 'disponivel'),
(131, 8, 5, 11, 'disponivel'),
(132, 8, 1, 12, 'ocupado'),
(133, 8, 5, 13, 'disponivel'),
(134, 8, 1, 14, 'ocupado'),
(135, 8, 1, 15, 'ocupado'),
(136, 8, 1, 16, 'ocupado'),
(137, 8, 5, 17, 'disponivel'),
(138, 8, 5, 18, 'disponivel'),
(139, 8, 1, 19, 'ocupado'),
(140, 8, 1, 20, 'ocupado'),
(141, 8, 5, 21, 'disponivel'),
(142, 8, 1, 22, 'ocupado'),
(143, 8, 5, 23, 'disponivel'),
(144, 8, 1, 24, 'ocupado'),
(145, 8, 5, 25, 'disponivel'),
(146, 8, 5, 26, 'disponivel'),
(147, 8, 1, 27, 'ocupado'),
(148, 8, 1, 28, 'ocupado'),
(149, 8, 5, 29, 'disponivel'),
(150, 8, 5, 30, 'disponivel'),
(151, 8, 1, 31, 'ocupado'),
(152, 8, 1, 32, 'ocupado'),
(153, 8, 5, 33, 'disponivel'),
(154, 8, 5, 34, 'disponivel'),
(155, 8, 5, 35, 'disponivel'),
(156, 8, 5, 36, 'disponivel'),
(157, 8, 5, 37, 'disponivel'),
(158, 8, 5, 38, 'disponivel'),
(159, 8, 5, 39, 'disponivel'),
(160, 8, 1, 40, 'ocupado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `companhiaonibus`
--

CREATE TABLE `companhiaonibus` (
  `idCIA` int(11) NOT NULL,
  `nomeCIA` varchar(255) NOT NULL,
  `localCIA` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `companhiaonibus`
--

INSERT INTO `companhiaonibus` (`idCIA`, `nomeCIA`, `localCIA`, `telefone`, `email`, `logo`) VALUES
(1, 'Planalto', 'Segredo', '1212', 'raminelliiury4@gmail.com', 'Logo/logo_PLANALTO_sem_slogan.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `onibus`
--

CREATE TABLE `onibus` (
  `idOnibus` int(11) NOT NULL,
  `fkCIA` int(11) NOT NULL,
  `numOnibus` varchar(20) NOT NULL,
  `localOrigem` varchar(255) NOT NULL,
  `localDestino` varchar(255) NOT NULL,
  `tipoOnibus` varchar(255) NOT NULL,
  `dia` date NOT NULL,
  `dataHoraSaida` time NOT NULL,
  `dataHoraPrevisao` time NOT NULL,
  `preco` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `onibus`
--

INSERT INTO `onibus` (`idOnibus`, `fkCIA`, `numOnibus`, `localOrigem`, `localDestino`, `tipoOnibus`, `dia`, `dataHoraSaida`, `dataHoraPrevisao`, `preco`) VALUES
(1, 1, '32', 'Segredo', 'São Vicente do Sul', 'Direto', '2024-07-04', '15:23:00', '22:18:00', 130),
(2, 1, '69', 'Santa Maria', 'Sobradinho', 'Direto', '2024-07-05', '10:34:00', '14:34:00', 50),
(3, 1, '1', 'Lagoão', 'Segredo', 'Direto', '2024-07-09', '12:30:00', '13:30:00', 21),
(4, 1, '777', 'Panambi', 'Cruz Alta', 'Direto', '2024-07-10', '11:26:00', '15:26:00', 59),
(5, 1, '666', 'São Pedro do Sul', 'Sobradinho', 'Direto', '2024-07-11', '14:28:00', '16:28:00', 49),
(7, 1, '133', 'Teste', 'Vixi', 'Direto', '2024-07-12', '09:30:00', '12:30:00', 27),
(8, 1, '222', 'Teste2', 'Valaaa', 'Direto', '2024-07-12', '12:10:00', '15:10:00', 12);

-- --------------------------------------------------------

--
-- Estrutura para tabela `passagemcompra`
--

CREATE TABLE `passagemcompra` (
  `idPass` int(11) NOT NULL,
  `fkOnibus` int(11) NOT NULL,
  `fkUser` int(11) NOT NULL,
  `preco` double NOT NULL,
  `formaPag` varchar(255) NOT NULL,
  `dataHoraComprada` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `passagemcompra`
--

INSERT INTO `passagemcompra` (`idPass`, `fkOnibus`, `fkUser`, `preco`, `formaPag`, `dataHoraComprada`) VALUES
(2, 8, 1, 24, 'pix', '2024-07-15 10:11:00'),
(4, 8, 1, 36, 'credtio', '2024-07-15 10:21:00'),
(5, 8, 1, 24, 'dinheiro', '2024-07-15 10:23:00'),
(6, 8, 1, 36, 'pix', '2024-07-16 08:24:00'),
(7, 8, 1, 36, 'pix', '2024-07-16 08:24:00'),
(8, 8, 1, 12, 'debito', '2024-07-16 08:25:00'),
(9, 8, 1, 12, 'debito', '2024-07-16 08:25:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `CPF` varchar(20) NOT NULL,
  `Telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`idUser`, `apelido`, `nome`, `senha`, `CPF`, `Telefone`) VALUES
(1, 'iury', 'Iury Raminelli', '@Raminelli22', '039.194.110-05', '51 998754368'),
(2, 'thiago', 'Thiago Ryan', '@teste123', '111.111.111-11', '55 998899865'),
(3, 'thiago', 'Thiago Ryan', '@teste123', '111.111.111-11', '55 998899865'),
(4, 'teste1', 'Teste Gagag', '@teste123', '222.222.222-22', '55 998893265'),
(5, 'adm', 'ADMINSTSADSA', '@ADMIN22', '111.111.121-11', '55 998549865');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `assentos`
--
ALTER TABLE `assentos`
  ADD PRIMARY KEY (`idAssento`),
  ADD KEY `fkonibusAss` (`fkOnibus`),
  ADD KEY `fkuserAss` (`fkUser`);

--
-- Índices de tabela `companhiaonibus`
--
ALTER TABLE `companhiaonibus`
  ADD PRIMARY KEY (`idCIA`);

--
-- Índices de tabela `onibus`
--
ALTER TABLE `onibus`
  ADD PRIMARY KEY (`idOnibus`),
  ADD KEY `fkCIAOnibus` (`fkCIA`);

--
-- Índices de tabela `passagemcompra`
--
ALTER TABLE `passagemcompra`
  ADD PRIMARY KEY (`idPass`),
  ADD KEY `fkonibusPass` (`fkOnibus`),
  ADD KEY `fkuserPass` (`fkUser`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `assentos`
--
ALTER TABLE `assentos`
  MODIFY `idAssento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT de tabela `companhiaonibus`
--
ALTER TABLE `companhiaonibus`
  MODIFY `idCIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `onibus`
--
ALTER TABLE `onibus`
  MODIFY `idOnibus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `passagemcompra`
--
ALTER TABLE `passagemcompra`
  MODIFY `idPass` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `assentos`
--
ALTER TABLE `assentos`
  ADD CONSTRAINT `fkonibusAss` FOREIGN KEY (`fkOnibus`) REFERENCES `onibus` (`idOnibus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkuserAss` FOREIGN KEY (`fkUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `onibus`
--
ALTER TABLE `onibus`
  ADD CONSTRAINT `fkCIAOnibus` FOREIGN KEY (`fkCIA`) REFERENCES `companhiaonibus` (`idCIA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `passagemcompra`
--
ALTER TABLE `passagemcompra`
  ADD CONSTRAINT `fkonibusPass` FOREIGN KEY (`fkOnibus`) REFERENCES `onibus` (`idOnibus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkuserPass` FOREIGN KEY (`fkUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
