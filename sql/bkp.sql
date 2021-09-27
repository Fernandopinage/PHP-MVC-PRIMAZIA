-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Set-2021 às 17:20
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
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nome` varchar(100) NOT NULL,
  `admin_senha` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nome`, `admin_senha`, `admin_email`, `admin_foto`) VALUES
(4, 'luiz fernando pinage coutinho', '63a9f0ea7bb98050796b649e85481845', 'luiz.c@progride.com.br', 'pp.jpg'),
(5, 'aa', '63a9f0ea7bb98050796b649e85481845', 'luiz@email.com.br', '');

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
(14, 'Rhuan', '053.893.142-63', 'rhuan.v@progride.com.br', '(92) 99999-9999', 69006262, '', '202cb962ac59075b964b07152d234b70', 'AM', 'Manaus', 'Rua Hannibal Porto', 'Santa Luzia', 'casa 01', 'F', '', '285'),
(15, 'luiz fernando pinage', '004.963.342-20', 'luiz.c@progride.com.br', '(92) 99999-9999', 69006262, 'pp.jpg', '63a9f0ea7bb98050796b649e85481845', 'AM', 'Manaus', 'Rua Pio IX', 'Monte das Oliveiras', 'proximo ao manoa', 'F', '', '034'),
(16, 'aaa', '0045999559595', 'luizfernandoluck@hotmail.com', '(92) 99999-9999', 69006262, '', '63a9f0ea7bb98050796b649e85481845', 'AM', 'Manaus', 'Rua 11 de Agosto', 'Gilberto Mestrinho', 'complemt', 'F', '', '034'),
(17, 'luiz', '011155245225', 'luiz@homail.com', '(92) 99999-9999', 69006262, '', '202cb962ac59075b964b07152d234b70', 'AM', 'Manaus', 'Rua 11 de Agosto', 'Gilberto Mestrinho', 'complemento', 'F', '', ''),
(18, 'aaaaaa', '004966655555', 'luiz2@gmail.com', '(92) 99999-9999', 69006262, '', '63a9f0ea7bb98050796b649e85481845', 'am', 'manaus', 'aaaaaaa', 'terra nov 1', 'complemento', 'J', 'aaaaaaa', '0626');

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
  `pedido_data` date NOT NULL,
  `pedido_descricao` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`pedido_descricao`)),
  `pedido_uf` varchar(2) NOT NULL,
  `pedido_cidade` varchar(100) NOT NULL,
  `pedido_logradouro` varchar(100) NOT NULL,
  `pedido_bairro` varchar(100) NOT NULL,
  `pedido_complemento` varchar(100) NOT NULL,
  `pedido_protocolo` varchar(100) NOT NULL,
  `pedido_numero` varchar(50) NOT NULL,
  `pedido_status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`pedido_id`, `pedido_nome`, `pedido_telefone`, `pedido_email`, `pedido_cpf`, `pedido_cep`, `pedido_data`, `pedido_descricao`, `pedido_uf`, `pedido_cidade`, `pedido_logradouro`, `pedido_bairro`, `pedido_complemento`, `pedido_protocolo`, `pedido_numero`, `pedido_status`) VALUES
(51, 'luiz fernando pinage', '(92) 99999-999', 'luiz.c@progride.com.br', '004.963.342-20', '69093', '2021-09-24', '{\"tpservico\":\"Lavanderia\",\"categoria\":[\"Bolsas\",\"Sapatos\"],\"descricao\":false,\"quantidade\":[]}', 'AM', 'Manaus', 'Rua Pio IX', 'Monte das Oliveiras', 'proximo ao manoa', '2250 070002240921', '034', 'E'),
(52, 'luiz fernando pinage', '(92) 99999-999', 'luiz.c@progride.com.br', '004.963.342-20', '69093', '2021-09-24', '{\"tpservico\":\"Lavanderia\",\"categoria\":[\"Bolsas\",\"Sapatos\"],\"descricao\":false,\"quantidade\":[]}', 'AM', 'Manaus', 'Rua Pio IX', 'Monte das Oliveiras', 'proximo ao manoa', '3789 070743240921', '034', 'F'),
(57, 'luiz fernando pinage', '(92) 99999-999', 'luiz.c@progride.com.br', '004.963.342-20', '69006262', '2021-09-25', '{\"tpservico\":\"Artífice (Pedreiro,Pintor e Hidráulico)\",\"categoria\":[\"hidraulica\",\"eletrica\"],\"descricao\":\"text\"}', 'AM', 'Manaus', 'Rua Pio IX', 'Monte das Oliveiras', 'proximo ao manoa', '4144 050940250921', '034', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `profissional`
--

CREATE TABLE `profissional` (
  `profissional_id` int(11) NOT NULL,
  `profissional_nome` varchar(100) NOT NULL,
  `profissional_option` varchar(1) NOT NULL,
  `profissional_razao` varchar(100) NOT NULL,
  `profissional_email` varchar(100) NOT NULL,
  `profissional_cpf` varchar(14) NOT NULL,
  `profissional_telefone` varchar(15) NOT NULL,
  `profissional_cep` varchar(9) NOT NULL,
  `profissional_uf` varchar(2) NOT NULL,
  `profissional_logradouro` varchar(100) NOT NULL,
  `profissional_num` varchar(6) NOT NULL,
  `profissional_cidade` varchar(100) NOT NULL,
  `profissional_bairro` varchar(100) NOT NULL,
  `profissional_complemento` varchar(100) NOT NULL,
  `profissional_foto` longtext NOT NULL,
  `profissional_senha` varchar(100) NOT NULL,
  `profissional_servico` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `profissional`
--

INSERT INTO `profissional` (`profissional_id`, `profissional_nome`, `profissional_option`, `profissional_razao`, `profissional_email`, `profissional_cpf`, `profissional_telefone`, `profissional_cep`, `profissional_uf`, `profissional_logradouro`, `profissional_num`, `profissional_cidade`, `profissional_bairro`, `profissional_complemento`, `profissional_foto`, `profissional_senha`, `profissional_servico`) VALUES
(14, 'rhuan mendin', 'J', 'medin', 'luiz.c@progride.com.br', '004.963.342-20', '(92) 99999-9999', '69006262', 'AM', 'Rua 11 de Agosto', '034', 'Manaus', 'Gilberto Mestrinho', 'complemento', '', '63a9f0ea7bb98050796b649e85481845', 'Lavanderia'),
(15, 'Orismar ', 'J', 'Orismar', 'luizfernandoluck@hotmail.com', '123456789', '(92) 99999-9999', '69006262', 'AM', 'Rua 11 de Agosto', '034', 'Manaus', 'Gilberto Mestrinho', 'complemento', '', '63a9f0ea7bb98050796b649e85481845', 'Lavanderia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategoria`
--

CREATE TABLE `subcategoria` (
  `subcategoria_id` int(11) NOT NULL,
  `subcategoria_cnpj` varchar(100) NOT NULL,
  `subcategoria_descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `subcategoria`
--

INSERT INTO `subcategoria` (`subcategoria_id`, `subcategoria_cnpj`, `subcategoria_descricao`) VALUES
(40, '004.963.342-20', 'Bolsas'),
(41, '004.963.342-20', 'Sapatos'),
(42, '004.963.342-20', 'Outros'),
(43, '004.963.342-20', 'sofá '),
(44, '123456789', 'Bolsas'),
(45, '123456789', 'Sapatos');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

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
-- Índices para tabela `profissional`
--
ALTER TABLE `profissional`
  ADD PRIMARY KEY (`profissional_id`),
  ADD UNIQUE KEY `profissional_email` (`profissional_email`),
  ADD UNIQUE KEY `profissional_cpf` (`profissional_cpf`);

--
-- Índices para tabela `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`subcategoria_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `CLIENTE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `pedido_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de tabela `profissional`
--
ALTER TABLE `profissional`
  MODIFY `profissional_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `subcategoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
