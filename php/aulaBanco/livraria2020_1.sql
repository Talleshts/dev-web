-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Out-2020 às 13:30
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livraria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autores`
--

CREATE TABLE `autores` (
  `autor_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dt_nasc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `autores`
--

INSERT INTO `autores` (`autor_id`, `nome`, `email`, `dt_nasc`) VALUES
(1, 'Edson Gonçalves', 'edson@integrator.com.br', '1979-04-11'),
(17, 'André Gonçalves 2', 'andre@integrator.com.br', '1983-11-11'),
(40, 'Edna Gonçalves', 'edna@integrator.com.br', '1980-03-30'),
(41, 'Mark W. Baker', 'makbak@makbak.com', '1965-01-01'),
(42, 'Laurie Beth Jones', 'lauriebj@lauriebj.com', '1952-03-30'),
(44, 'Zig Ziglar', 'zigziglar@zigziglar.com', '1960-04-11'),
(45, 'Jonas Jacobi', 'jonasj@jonasj.com', '1977-01-01'),
(46, 'John R. Fallows', 'john@jrfallows.com', '1976-01-01'),
(47, 'Giuliano', 'gp@com.br', '1976-04-11'),
(48, 'teste', 'teste', '2011-11-11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `cpf` varchar(12) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `logradouro` varchar(100) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(20) NOT NULL,
  `senha` varchar(12) NOT NULL,
  `rg` varchar(13) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`cpf`, `nome`, `logradouro`, `cidade`, `estado`, `cep`, `data_nascimento`, `email`, `senha`, `rg`, `tipo`) VALUES
('111111', 'GIULIANO PRADO DE MORAIS GIGLIO', 'Rua A', 'Alegre', 'ES', '4445577', '2008-01-01', 'giu@email', '1234', 'M-78890', '1'),
('8888', 'Paulo', 'rua 1', 'alegre', 'mg', '888', '1998-02-11', 'p@', '111', '8888xxxx', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cupons`
--

CREATE TABLE `cupons` (
  `codigo` varchar(10) NOT NULL,
  `desconto` int(11) NOT NULL,
  `dataValidade` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cupons`
--

INSERT INTO `cupons` (`codigo`, `desconto`, `dataValidade`) VALUES
('oferta20', 10, '2019-09-12'),
('promo2019', 15, '2019-10-01'),
('passado01', 10, '2019-04-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE `editora` (
  `editora_id` int(10) UNSIGNED NOT NULL,
  `editora_nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `editora`
--

INSERT INTO `editora` (`editora_id`, `editora_nome`) VALUES
(1, 'Bookman x'),
(2, 'Ciencia Moderna'),
(3, 'Campus'),
(4, 'Cultura');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `id_item` int(11) NOT NULL,
  `id_publicacao` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valorTotal` float NOT NULL,
  `id_venda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`id_item`, `id_publicacao`, `quantidade`, `valorTotal`, `id_venda`) VALUES
(1, 1, 1, 54, 1),
(2, 2, 1, 170, 1),
(3, 1, 1, 54, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `isbn` varchar(13) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `edicao_num` int(10) UNSIGNED DEFAULT NULL,
  `ano_publicacao` int(11) DEFAULT NULL,
  `descricao` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`isbn`, `titulo`, `edicao_num`, `ano_publicacao`, `descricao`) VALUES
('1-59059-580-7', 'Pro JSF and Ajax', 1, 0, 'Teste 2x FULL '),
('85-7393-436-0', 'Dominando o JBuilder X', 1, 0, ''),
('85-7393-486-7', 'Dominando Eclipse', 1, 0, 'Desenvolva Java usando a Plata'),
('85-7393-494-8', 'OpenOffice.org 2.0 Writer', 1, 0, 'OpenOffice.org 2.0 Writer - Co'),
('85-7393-504-9', 'OpenOffice.org 2.0 Calc', 1, 0, ''),
('85-7393-505-7', 'OpenOffice.org 2.0 Draw', 1, 0, ''),
('85-7393-519-7', 'Dominando NetBeans', 1, 0, 'Domine você também o NetBeans'),
('85-7393-531-6', 'CorelDRAW X3', 1, 0, ''),
('85-7393-536-7', 'Tomcat: Guia Rápido do Administrador', 1, 0, ''),
('85-7393-543-X', 'Dominando AJAX', 2, 0, 'Domine o desenvolvimento de Ja');

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacao`
--

CREATE TABLE `publicacao` (
  `publicacao_id` int(11) NOT NULL,
  `isbn` char(13) DEFAULT NULL,
  `autor_id` int(10) UNSIGNED DEFAULT NULL,
  `editora_id` int(10) UNSIGNED DEFAULT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `publicacao`
--

INSERT INTO `publicacao` (`publicacao_id`, `isbn`, `autor_id`, `editora_id`, `preco`) VALUES
(1, '85-7393-486-7', 1, 2, 54),
(2, '85-7393-536-7', 41, 2, 170),
(3, '85-7393-519-7', 1, 1, 105),
(4, '85-7393-494-8', 44, 3, 37),
(5, '85-7393-543-X', 46, 1, 65),
(6, '85-7393-436-0', 40, 2, 76),
(7, '1-59059-580-7', 42, 1, 95),
(8, '85-7393-504-9', 44, 3, 50),
(9, '85-7393-505-7', 44, 3, 50),
(10, '85-7393-536-7', 45, 3, 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(7) DEFAULT NULL,
  `senha` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `senha`) VALUES
(1, 'admin', 'admin01'),
(2, 'cliente', 'cliente02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_venda` int(11) NOT NULL,
  `cpf_cliente` varchar(13) NOT NULL,
  `dataVenda` date NOT NULL,
  `valorTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_venda`, `cpf_cliente`, `dataVenda`, `valorTotal`) VALUES
(1, '8888', '2019-07-02', 224),
(2, '111111', '2019-07-08', 510),
(3, '111111', '2019-07-08', 394.8),
(4, '111111', '2019-07-09', 200.34);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`autor_id`);

--
-- Indexes for table `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`editora_id`);

--
-- Indexes for table `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_venda` (`id_venda`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `publicacao`
--
ALTER TABLE `publicacao`
  ADD PRIMARY KEY (`publicacao_id`),
  ADD KEY `fk_pub` (`isbn`),
  ADD KEY `fk_pub2` (`editora_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_venda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autores`
--
ALTER TABLE `autores`
  MODIFY `autor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `editora`
--
ALTER TABLE `editora`
  MODIFY `editora_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `publicacao`
--
ALTER TABLE `publicacao`
  MODIFY `publicacao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `itens`
--
ALTER TABLE `itens`
  ADD CONSTRAINT `itens_ibfk_1` FOREIGN KEY (`id_venda`) REFERENCES `vendas` (`id_venda`);

--
-- Limitadores para a tabela `publicacao`
--
ALTER TABLE `publicacao`
  ADD CONSTRAINT `fk_pub` FOREIGN KEY (`isbn`) REFERENCES `livros` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pub2` FOREIGN KEY (`editora_id`) REFERENCES `editora` (`editora_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
