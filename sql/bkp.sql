-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Set-2021 às 15:27
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `primazia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `CLIENTE_ID` int(11) NOT NULL,
  `CLIENTE_NOME` varchar(100) NOT NULL,
  `CLIENTE_CPF` varchar(14) NOT NULL,
  `CLIENTE_EMAIL` varchar(100) NOT NULL,
  `CLIENTE_TELEFONE` varchar(15) NOT NULL,
  `CLIENTE_CEP` int(9) NOT NULL,
  `CLIENTE_FOTO` varchar(200) NOT NULL,
  `CLIENTE_SENHA` varchar(100) NOT NULL,
  `CLIENTE_UF` varchar(2) NOT NULL,
  `CLIENTE_CIDADE` varchar(100) NOT NULL,
  `CLIENTE_LOGRADOURO` varchar(100) NOT NULL,
  `CLIENTE_BAIRRO` varchar(100) NOT NULL,
  `CLIENTE_COMPLEMENTO` varchar(100) NOT NULL,
  `CLIENTE_OPCAO` varchar(2) NOT NULL,
  `CLIENTE_RAZAO` varchar(100) NOT NULL,
  `CLIENTE_NUM` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`CLIENTE_ID`, `CLIENTE_NOME`, `CLIENTE_CPF`, `CLIENTE_EMAIL`, `CLIENTE_TELEFONE`, `CLIENTE_CEP`, `CLIENTE_FOTO`, `CLIENTE_SENHA`, `CLIENTE_UF`, `CLIENTE_CIDADE`, `CLIENTE_LOGRADOURO`, `CLIENTE_BAIRRO`, `CLIENTE_COMPLEMENTO`, `CLIENTE_OPCAO`, `CLIENTE_RAZAO`, `CLIENTE_NUM`) VALUES
(14, 'Rhuan', '053.893.142-63', 'rhuan.v@progride.com.br', '(92) 99999-9999', 69, '', '202cb962ac59075b964b07152d234b70', 'AM', 'Manaus', 'Rua Hannibal Porto', 'Santa Luzia', 'casa 01', 'F', '', '285');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `pedido_id` int(11) NOT NULL,
  `pedido_nome` varchar(100) NOT NULL,
  `pedido_telefone` varchar(14) NOT NULL,
  `pedido_email` varchar(100) NOT NULL,
  `pedido_cpf` varchar(14) NOT NULL,
  `pedido_cep` varchar(9) NOT NULL,
  `pedido_data` datetime NOT NULL,
  `pedido_descricao` longtext CHARACTER SET utf8 NOT NULL,
  `pedido_uf` varchar(2) NOT NULL,
  `pedido_cidade` varchar(100) NOT NULL,
  `pedido_logradouro` varchar(100) NOT NULL,
  `pedido_bairro` varchar(100) NOT NULL,
  `pedido_complemento` varchar(100) NOT NULL,
  `pedido_protocolo` varchar(100) NOT NULL,
  `pedido_numero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`pedido_id`, `pedido_nome`, `pedido_telefone`, `pedido_email`, `pedido_cpf`, `pedido_cep`, `pedido_data`, `pedido_descricao`, `pedido_uf`, `pedido_cidade`, `pedido_logradouro`, `pedido_bairro`, `pedido_complemento`, `pedido_protocolo`, `pedido_numero`) VALUES
(19, 'Rhuan', '(92) 99999-999', 'rhuan.v@progride.com.br', '053.893.142-63', '69', '2021-09-10 03:00:32', '{\"tpservico\":\"Artífice (Pedreiro,Pintor e Hidráulico)\",\"categoria\":[\"hidraulica\",\"eletrica\"],\"descricao\":\"Me faça uma breve descrição do serviço a ser realizado\"}', 'AM', 'Manaus', '', 'Santa Luzia', 'casa 01', '2361 030032100921', '285'),
(20, 'Rhuan', '(92) 99999-999', 'rhuan.v@progride.com.br', '053.893.142-63', '69', '2021-09-10 03:08:03', '{\"tpservico\":\"Artífice (Pedreiro,Pintor e Hidráulico)\",\"categoria\":[\"hidraulica\",\"eletrica\",\"gesso\"],\"descricao\":\"Me faça uma breve descrição do serviço a ser realizado\"}', 'AM', 'Manaus', 'Rua Hannibal Porto', 'Santa Luzia', 'casa 01', '7685 030803100921', '285'),
(21, 'Rhuan', '(92) 99999-999', 'rhuan.v@progride.com.br', '053.893.142-63', '69', '2021-09-10 03:13:14', '{\"tpservico\":\"Artífice (Pedreiro,Pintor e Hidráulico)\",\"categoria\":[\"hidraulica\",\"eletrica\"],\"descricao\":\"Me faça uma breve descrição do serviço a ser realizado\"}', 'AM', 'Manaus', 'Rua Hannibal Porto', 'Santa Luzia', 'casa 01', '9616 031314100921', '285');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CLIENTE_ID`),
  ADD UNIQUE KEY `CLIENTE_CPF` (`CLIENTE_CPF`),
  ADD UNIQUE KEY `CLIENTE_EMAIL` (`CLIENTE_EMAIL`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`pedido_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `CLIENTE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `pedido_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
