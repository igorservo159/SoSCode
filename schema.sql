-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 15/11/2023 às 22:51
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_sos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_responses`
--

CREATE TABLE `tb_responses` (
  `id` int(11) NOT NULL,
  `response` text DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `id_ticket` int(11) DEFAULT NULL,
  `id_owner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_responses`
--

INSERT INTO `tb_responses` (`id`, `response`, `status`, `id_ticket`, `id_owner`) VALUES
(1, 'testando resposta', 1, 7, 7),
(2, 'teste resposta', 1, 10, 7),
(3, 'Teste resposta', 2, 17, 7),
(4, 'Eu mesmo respondendo', 1, 17, 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_status`
--

CREATE TABLE `tb_status` (
  `id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_status`
--

INSERT INTO `tb_status` (`id`, `status`) VALUES
(1, 'pendente'),
(2, 'finalizado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_tickets`
--

CREATE TABLE `tb_tickets` (
  `id` int(11) NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT 1,
  `id_user` int(11) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `category` varchar(25) NOT NULL,
  `description` text DEFAULT NULL,
  `registered_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_tickets`
--

INSERT INTO `tb_tickets` (`id`, `id_status`, `id_user`, `title`, `category`, `description`, `registered_date`) VALUES
(7, 1, NULL, 'teste1', 'frontend', 'teste1', '2023-10-29 00:52:47'),
(8, 1, NULL, 'teste2', 'frontend', 'teste2', '2023-10-29 00:52:54'),
(9, 1, NULL, 'teste3', 'frontend', 'teste3', '2023-10-29 00:53:00'),
(10, 1, 6, 'TESTELOGIN', 'devops', 'TESTEANDO TICKET POR ID_USER', '2023-10-30 09:34:02'),
(11, 1, 6, 'teste25', 'frontend', 'teste25', '2023-10-30 09:57:58'),
(12, 1, NULL, 'testando ticket', 'teste categoria', 'teste descrição', '2023-10-30 10:10:43'),
(13, 1, NULL, 'testando algo', 'frontend', '1234', '2023-10-30 10:14:08'),
(14, 2, 7, 'testando novamente', 'categoria 50', 'teste descrição', '2023-10-30 10:17:52'),
(17, 1, 7, 'TESTE200000001', 'frontend', 'teste200040', '2023-10-30 19:59:09'),
(18, 1, 9, 'Mudando título', 'testado categoria', 'Alguma Coisa', '2023-11-14 10:31:10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `registered_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_users`
--

INSERT INTO `tb_users` (`id`, `name`, `email`, `pass`, `registered_date`) VALUES
(1, 'testeIgor', 'meuteste@testetesteigor', '$2y$10$jYNgQrkZQLVo5HUzAoFk5eoJ8RWDYxWnbYHhTesN23rlkrKeI8536', '2023-10-26 01:37:32'),
(2, 'teste2', 'igor@igor', '$2y$10$ODcfDl76kaw4j1dD14PMXebT2qr5Key5sf7wbfRBAWtPxHQyE6iT2', '2023-10-26 09:35:00'),
(3, 'teste', 'teste@teste123', '$2y$10$SLhzdO4M62ynzY6NZouTx.Qfp234jOcWL8ZANET9RAAWVrIEDoPsy', '2023-10-26 11:35:24'),
(5, 'igorramos', 'ramos@ramos22', '$2y$10$NzHr8mURxRTs5UZGc5hYFuLCK7ugveQZjfgRoJ8IOoz4UVK64VGNu', '2023-10-26 17:01:57'),
(6, 'TESTELOGIN', 'testelogin@testelogin', '$2y$10$vB79OK1NSk5guBRVVYww2ebWc2IzkFaxk//9wyvECfPI6vXsRjYtC', '2023-10-26 19:39:32'),
(7, 'outroteste', 'outroteste@outroteste', '$2y$10$SBNbv6ZBcWwwanGaPloufeCTSGWLB8mjBzcK1v0X7dFIZflJEHDW2', '2023-10-30 10:10:02'),
(8, 'Jonatas Campos', 'jonatas@campos', '$2y$10$mYdmhjAvnCPTnK8ENM3fv.tasJM1r9eOpkSAcuProUXMA3n5RNZey', '2023-10-30 16:13:19'),
(9, 'Minael', 'Minael@minael', '$2y$10$/Ahm9FuPeFnE1Lw18spyMucP7x.gZ736IA44xsS7VQsTy7W0csrkG', '2023-11-14 10:29:33');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_responses`
--
ALTER TABLE `tb_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ticket` (`id_ticket`),
  ADD KEY `id_owner` (`id_owner`);

--
-- Índices de tabela `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_tickets`
--
ALTER TABLE `tb_tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_status` (`id_status`);

--
-- Índices de tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_responses`
--
ALTER TABLE `tb_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_tickets`
--
ALTER TABLE `tb_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_responses`
--
ALTER TABLE `tb_responses`
  ADD CONSTRAINT `tb_responses_ibfk_1` FOREIGN KEY (`id_ticket`) REFERENCES `tb_tickets` (`id`),
  ADD CONSTRAINT `tb_responses_ibfk_2` FOREIGN KEY (`id_owner`) REFERENCES `tb_users` (`id`);

--
-- Restrições para tabelas `tb_tickets`
--
ALTER TABLE `tb_tickets`
  ADD CONSTRAINT `tb_tickets_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id`),
  ADD CONSTRAINT `tb_tickets_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `tb_status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

