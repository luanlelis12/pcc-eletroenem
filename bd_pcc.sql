-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Ago-2021 às 01:34
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_pcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `altC` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `dificil` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `question`
--

INSERT INTO `question` (`id`, `imagem`, `altC`, `dificil`) VALUES
(1, 'questao001.png', 'a', 0),
(2, 'questao002.png', 'd', 0),
(3, 'questao003.png', 'c', 0),
(4, 'questao004.png', 'b', 0),
(5, 'questao005.png', 'c', 0),
(6, 'questao006.png', 'e', 0),
(7, 'questao007.png', 'b', 0),
(8, 'questao008.png', 'e', 0),
(9, 'questao009.png', 'b', 0),
(10, 'questao010.png', 'b', 0),
(11, 'questao011.png', 'd', 0),
(12, 'questao012.png', 'c', 0),
(13, 'questao013.png', 'd', 0),
(14, 'questao014.png', 'd', 0),
(15, 'questao015.png', 'c', 0),
(16, 'questao016.png', 'b', 0),
(17, 'questao017.png', 'a', 1),
(18, 'questao018.png', 'c', 1),
(19, 'questao019.png', 'e', 1),
(20, 'questao020.png', 'c', 1),
(21, 'questao021.png', 'b', 1),
(22, 'questao022.png', 'b', 1),
(23, 'questao023.png', 'e', 1),
(25, 'questao024.png', 'd', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pontuacao` float NOT NULL,
  `tempo` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `verified`, `token`, `password`, `pontuacao`, `tempo`) VALUES
(1, 'Luan Alves Lélis Costa', 'luanlelis09@gmail.com', 1, '1368b8e0c2241eb5f96c606cda16b5697186fd5c5102532f9a0c719f75ca16c9a2ab08d1f8219e8524038be11eaa386be806', '$2y$10$K7Ni7kNhqw0J7FVIL9HhmulQrhguEmxE2F4nU/wh3LoiUpZrzQrLG', 400, '00:00:16'),
(13, 'teste1', 'teste1@gmail.com', 0, '8df53223c37eb94c0c722400290c8f8c2b61448b03d854ea4017e872830407cc4d1f75264e1d21255cc10d35288d9ee8063a', '$2y$10$HVuooBFvXhbDITVyPyKXqO7bE1/O5VNbtl1e00DTODpb4Vw8vIFFW', 351, '00:01:26'),
(14, 'teste2', 'teste2@gmail.com', 0, '42da592ac6cff27fa66001b680ca8e864e042971879a82b487006cc6363ea1f7ae380c6604deb51f251fc002337e579dfad2', '$2y$10$3qA.300XlJ4vnYvHMUaVcecnPjWZXVNSCabOOGM0AVx.SoRruWwIe', 400, '00:00:34'),
(15, 'teste3', 'teste3@gmail.com', 0, '88258c4c44baef870bfe1862d0992b2a0bafc565347078f559ad07ce2265005d7051a9fdfab1fb2f20f14660c3e01fa9c583', '$2y$10$G1oM7k5P6yCcllnKNCBg1u/ORrkgOj6yJGxsIfjp1R.A/ouLd7fX.', 400, '00:00:58'),
(16, 'teste4', 'teste4@gmail.com', 0, 'd78724d2ccc2c0c2b6f83ec7ef0788e971e37f57a6b1bafc691b24dc550139f4dce4dd86fd0f5f4bdd4fa4b76188b1f22005', '$2y$10$.6JPteO1TtBSAdhomx1jqu.BzT3BpWtVzPlLNHR/K09vTjwob701e', 350, '00:00:49'),
(17, 'teste5', 'teste5@gmail.com', 0, '86f01ae696d3e0801bb29e8b40e67d52a0963fb6abb2130ef6bd755c5e83fef93c12fdd07deb1c002b40043010040d4cb638', '$2y$10$7NxvbeS/X4UrrIh5RvcPb.jR3zvLrFeKk1.w4yghSC7yaLJV97JSm', 0, '00:00:00'),
(18, 'teste6', 'teste6@gmail.com', 0, '7b90a9e78cbd9d9b3a38f234418976b19908f4290a43cc3fadbb8fb79c3f87edf42a0a65501cbccca44bfdb0a4fd8408b13b', '$2y$10$xkybulKGp4prXbVaRVUhqO1v2gDTYON4O02zhudxFZd92CNgjaOCu', 0, '00:00:00'),
(19, 'teste7', 'teste7@gmail.com', 0, 'a653b76dbc5ece03ae8ad6d3b74a92d6ccf6f01a2d74ae1a7c3aef7f5f657d8194ee758b8ffd27bbcd0407cb61dc5d18dbbf', '$2y$10$EvDyednn2iKvPRBYukhpKepj/bgwaiJFuowSG6kTSaIX5Zq2pIwBO', 0, '00:00:00'),
(20, 'teste8', 'teste8@gmail.com', 0, 'd915062643eca0d44bb0cdab1e4fc9148dcd00c236ed82337bf840acee97e6085cdea7bffa57a28c08562b791b637c5c5bdd', '$2y$10$RCBJEMo2bKA8dCQUH9u6fOcE5FyvUuuzXqQWkJDLzGNHLb7EfuxQe', 0, '00:00:00'),
(21, 'teste9', 'teste9@gmail.com', 0, '5bf9d7407cef1c640dd24d852d6a9de519fcb92a7c541cd48a40bfaf8a17e775aea7e196313e7d4181dfc232536e7a543647', '$2y$10$eo9s68qfJkjdX5hSRUZaP.H0WaB.8WP2VGJV6wMMZBpUOrS0wUKQu', 0, '00:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
