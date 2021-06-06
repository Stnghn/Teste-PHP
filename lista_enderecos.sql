-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Jun-2021 às 01:01
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
-- Banco de dados: `endereco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_enderecos`
--

CREATE TABLE `lista_enderecos` (
  `id_enderecos` int(11) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `rua` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `uf` varchar(3) NOT NULL,
  `ddd` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lista_enderecos`
--

INSERT INTO `lista_enderecos` (`id_enderecos`, `cep`, `rua`, `bairro`, `cidade`, `uf`, `ddd`) VALUES
(7, '81050001', 'Avenida República Argentina', 'Novo Mundo', 'Curitiba', 'PR', 41),
(18, '80420010', 'Avenida Vicente Machado', 'Centro', 'Curitiba', 'PR', 41),
(19, '88015710', 'Avenida Osvaldo Rodrigues Cabr', 'Centro', 'Florianópolis', 'SC', 48),
(20, '88915970', 'Avenida Nossa Senhora Da Conce', 'Vila Beatriz', 'Maracajá', 'SC', 48),
(22, '88010000', 'Rua Felipe Schmidt', 'Centro', 'Florianópolis', 'SC', 48),
(23, '88070100', 'Rua Santos Saraiva', 'Estreito', 'Florianópolis', 'SC', 48);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `lista_enderecos`
--
ALTER TABLE `lista_enderecos`
  ADD PRIMARY KEY (`id_enderecos`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `lista_enderecos`
--
ALTER TABLE `lista_enderecos`
  MODIFY `id_enderecos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
