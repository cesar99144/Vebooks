-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30-Nov-2020 às 02:36
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vebooksnew`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int NOT NULL,
  `nome` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Direito'),
(2, 'Gerais'),
(3, 'Programação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `listadedesejos`
--

CREATE TABLE `listadedesejos` (
  `id` int NOT NULL,
  `idLivro` int NOT NULL,
  `idCliente` int NOT NULL,
  `idAutor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `listadedesejos`
--

INSERT INTO `listadedesejos` (`id`, `idLivro`, `idCliente`, `idAutor`) VALUES
(1, 2, 1, 3),
(4, 4, 1, 3),
(5, 4, 5, 3),
(6, 6, 7, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `preco` float NOT NULL,
  `imagem` varchar(130) NOT NULL,
  `autor` int NOT NULL,
  `categoria` int NOT NULL,
  `slug` varchar(500) NOT NULL,
  `ativo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `titulo`, `descricao`, `preco`, `imagem`, `autor`, `categoria`, `slug`, `ativo`) VALUES
(2, 'Uma dama perigosa', 'Uma dama perigosa obra de Elizabeth em breve', 70, '5fa8398191268.png', 3, 2, 'uma-dama-perigosa', 'S'),
(4, 'Direito do trabalho', 'E-book dedicado ao direito do trabalho. Por Henrique Correia', 85, '5fbb17724180f.png', 3, 1, 'direito-do-trabalho', 'S'),
(5, 'Where End', 'Where end & you begin', 42, '5fbb1d8e04a83.png', 3, 2, 'where-end', 'N'),
(6, 'Teste', 'gsssssssssss', 23, '5fc2ed823e0b2.png', 3, 2, 'teste', 'S'),
(7, 'Pesquisa aplicada & inovação', 'Ideias e inovação aplicado a inovação', 100, '5fc44367212b9.png', 4, 2, 'pesquisa-aplicada-inovacao', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `userperfil`
--

CREATE TABLE `userperfil` (
  `id` int NOT NULL,
  `nome` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `userperfil`
--

INSERT INTO `userperfil` (`id`, `nome`) VALUES
(1, 'Administrador'),
(2, 'Cliente'),
(3, 'Editora');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(150) NOT NULL,
  `senha` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(254) NOT NULL,
  `perfil` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `email`, `perfil`) VALUES
(1, 'Fulano de tal', '$2y$10$2mhXlYR4FMJEMJsD1Gkd9u2zNZHzm4FiAn1jRGDz9MP2nTRPuXd2e', 'Fulano@gmail.com', 2),
(2, 'César', '$2y$10$4L3lX58S4gU.ySeDcNr0duz2p2kSFAmaiPL2F5XGDue9AIZDqppY2', 'cesar@gmail.com', 1),
(3, 'Saraiva', '$2y$10$sNh6DBA7vXW84BrDBZyxseyi3m48chk1xiVjfHFqHPMqO0.x1ro9.', 'saraiva@gmail.com', 3),
(4, 'fernanda', '$2y$10$zoHfW5jzojUBZxbU5mxULeZG1jIMiT20lB0cY0QHoqfjhIffgVsym', 'fernanda@gmail.com', 3),
(5, 'Luana', '$2y$10$4fL1lNAUcSJCDke1rWnREOng7H.2Vb.RjY2nn2tnDVcMPHBPjkrju', 'luana@gmail.com', 2),
(6, 'Cicrano', '$2y$10$XpdRF0OVEANln9vV1b6oY.f9ahYVcoWnhqTMwFylcUR/7vzBwSMlS', 'cicrano@gmail.com', 3),
(7, 'Laura', '$2y$10$vKOkVaq1TXoy5UzPyebFj.nA8wZ3ORXE1thT4Fhv8SgqN.y8k7Oti', 'laura@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int NOT NULL,
  `idAutor` int NOT NULL,
  `idLivro` int NOT NULL,
  `Cliente` varchar(200) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `idAutor`, `idLivro`, `Cliente`, `valor`) VALUES
(8, 3, 4, 'Fulano de tal', 85),
(12, 3, 4, 'Fulano de tal', 85),
(13, 3, 2, 'Fulano de tal', 70),
(14, 3, 4, 'Luana', 85),
(15, 4, 7, 'Laura', 100),
(16, 3, 6, 'Laura', 23);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `listadedesejos`
--
ALTER TABLE `listadedesejos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idLivro` (`idLivro`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `autor` (`autor`),
  ADD KEY `categoria` (`categoria`);

--
-- Índices para tabela `userperfil`
--
ALTER TABLE `userperfil`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `perfil` (`perfil`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAutor` (`idAutor`),
  ADD KEY `idLivro` (`idLivro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `listadedesejos`
--
ALTER TABLE `listadedesejos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `userperfil`
--
ALTER TABLE `userperfil`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `listadedesejos`
--
ALTER TABLE `listadedesejos`
  ADD CONSTRAINT `listadedesejos_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `listadedesejos_ibfk_2` FOREIGN KEY (`idLivro`) REFERENCES `livros` (`id`);

--
-- Limitadores para a tabela `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `livros_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `livros_ibfk_2` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil`) REFERENCES `userperfil` (`id`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `vendas_ibfk_2` FOREIGN KEY (`idLivro`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
