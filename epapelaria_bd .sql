-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Nov-2022 às 04:49
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `epapelaria_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `pes_id` int(11) NOT NULL,
  `pes_nome` varchar(60) NOT NULL,
  `pes_cpf` char(11) NOT NULL,
  `pes_email` varchar(60) NOT NULL,
  `pes_senha` varchar(30) NOT NULL,
  `pes_cepEnder` varchar(9) NOT NULL,
  `pes_estadoEnder` varchar(60) NOT NULL,
  `pes_cidadeEnder` varchar(60) NOT NULL,
  `pes_bairroEnder` varchar(60) NOT NULL,
  `pes_logradouroEnder` varchar(60) NOT NULL,
  `pes_numeroEnder` varchar(11) NOT NULL,
  `pes_tip_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`pes_id`, `pes_nome`, `pes_cpf`, `pes_email`, `pes_senha`, `pes_cepEnder`, `pes_estadoEnder`, `pes_cidadeEnder`, `pes_bairroEnder`, `pes_logradouroEnder`, `pes_numeroEnder`, `pes_tip_id`) VALUES
(1, 'Gustavo Nunes', '49112342882', 'gustavo@gmail.com', '1234', '08474215', 'São Paulo', 'Cidade Tiradentes', 'Castro Alves', 'Travessa Estrada do Sol', '60', 2),
(1, 'João Pedro', '49112342882', 'jpgertto.1204fernadesz@gmail.com', '1234', '08474215', 'São Paulo', 'Cidade Tiradentes', 'Castro Alves', 'Travessa Estrada do Sol', '60', 2)
(2, 'Matheus', '52934230880', 'matheus@gmail.com', '1234', '08474215', 'São Paulo', 'Mogi das Cruzes', 'Alto Ipiranga', 'Travessa estrada da Lua', '65', 1),
(4, 'Matheus', '52934230880', 'matheus2@gmail.com', '1234', '08474-215', 'SP', 'São Paulo', 'Conjunto Habitacional Castro Alves', 'Travessa Estrada do Sol', '60', 1),
(6, 'Nathan', '49119812380', 'nathan@gmail.com', '1234', '08474-215', 'SP', 'São Paulo', 'Conjunto Habitacional Castro Alves', 'Travessa Estrada do Sol', '60', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_tipos`
--

CREATE TABLE `pessoa_tipos` (
  `pes_tip_id` int(11) NOT NULL,
  `pes_tip_desc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoa_tipos`
--

INSERT INTO `pessoa_tipos` (`pes_tip_id`, `pes_tip_desc`) VALUES
(1, 'Usuario'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `prod_id` int(11) NOT NULL,
  `prod_nome` varchar(50) NOT NULL,
  `prod_desc` varchar(100) NOT NULL,
  `prod_preco` decimal(10,2) NOT NULL,
  `prod_url` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`prod_id`, `prod_nome`, `prod_desc`, `prod_preco`, `prod_url`) VALUES
(5, 'Regua transparente', 'Material utilizado para medir e desenho.\r\n                        ', '6.00', '2022.11.26-04.41.55Regua transparente.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`pes_id`),
  ADD KEY `pes_tipo_id` (`pes_tip_id`);

--
-- Índices para tabela `pessoa_tipos`
--
ALTER TABLE `pessoa_tipos`
  ADD PRIMARY KEY (`pes_tip_id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `pes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `pessoa_tipos`
--
ALTER TABLE `pessoa_tipos`
  MODIFY `pes_tip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD CONSTRAINT `Pessoas_ibfk_1` FOREIGN KEY (`pes_tip_id`) REFERENCES `pessoa_tipos` (`pes_tip_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
