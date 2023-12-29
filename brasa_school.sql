-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Dez-2023 às 23:37
-- Versão do servidor: 10.4.11-MariaDB
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
-- Banco de dados: `brasa_school`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `subject` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `candidate`
--

INSERT INTO `candidate` (`id`, `name`, `birth`, `state`, `city`, `email`, `whatsapp`, `subject`) VALUES
(1, 'ddddddddd', '2023-12-28', 'asdasdas', 'asdasdsa', 'leo@libersistemas.com.br', NULL, NULL),
(2, 'rrrrrrrrr', '2023-12-28', 'asdasdas', 'asdasdsa', 'leo@libersistemas.com.br', NULL, NULL),
(3, 'teste', '2023-12-06', 'teste', 'teste', 'leo_joao69@hotmail.com', NULL, NULL),
(4, 'teste abc 123', '2023-12-09', 'teste 123', 'teste 111', 'leo@libersistemas.com.br', '123456', NULL),
(5, 'teste e3333', '2023-12-20', 'teste3333', 'teste3333', 'leo@libersistemas.com.br', '123456', NULL),
(6, 'teste 555555', '2023-12-09', 'teste 123555', 'teste55555', 'leo@libersistemas.com.br', '123456', 3),
(7, 'yyyyyyyyyyyyy', '2023-12-07', 'yyyyyyy', 'yyyyyyyyy', 'leo@libersistemas.com.br', '565555', NULL),
(8, 'iiiiiiiiiiiiiiiiii', '2023-12-16', 'iiiiiiiiii', 'iiiiiiii', 'leo@libersistemas.com.br', '12312321', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` int(11) DEFAULT NULL,
  `receiver` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `teacher_answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `messages`
--

INSERT INTO `messages` (`id`, `sender`, `receiver`, `content`, `teacher_answer`) VALUES
(1, 1, 5, 'Professor, para quando é a tarefa mesmo?', 'É para o dia 30 agora'),
(2, 2, 5, 'Quando vai ser a prova?', 'Semana que vem'),
(3, 3, 6, 'As notas já foram lançadas no portal?', 'Ainda não, mas vão ser lançadas ainda essa semana'),
(4, 1, 6, 'Estou doente, vou levar atestado para refazer a atividade de hoje', 'Ok'),
(5, 4, 7, 'Professor, me dá 0,5 na média, por favor nunca te pedi nada', 'Não posso, seria injusto com quem se esforçou mais'),
(6, 5, 7, 'Até que dia vão as aulas?', 'As aulas vão até o dia 31/12'),
(7, 1, 6, 'Minha mãe está doente', 'Que peninha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-12-28-173154', 'App\\Database\\Migrations\\Mensagens', 'default', 'App', 1703784928, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `students`
--

INSERT INTO `students` (`id`, `name`) VALUES
(1, 'João Souza Filho'),
(2, 'Brendo Silvino'),
(3, 'Jeisa Stall'),
(4, 'Alberta Francis'),
(5, 'Rober José'),
(6, 'Chico Bento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `subjects`
--

INSERT INTO `subjects` (`id`, `description`) VALUES
(1, 'Matemática'),
(2, 'História'),
(3, 'Geografia'),
(4, 'Inglês'),
(5, 'Português'),
(6, 'Química');

-- --------------------------------------------------------

--
-- Estrutura da tabela `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `subject` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `teachers`
--

INSERT INTO `teachers` (`id`, `login`, `pass`, `name`, `birth`, `city`, `state`, `email`, `whatsapp`, `subject`) VALUES
(5, 'admin', '$2y$10$5y2ijzT/ZNfSkJsIyyOnQej17AGs5uYnSvHlD//jgOQPD/WJLM4F.', 'Administrador', '0000-00-00', '', '', '', '', 4),
(6, 'maria', '$2y$10$Yv68/YcVZB1Of56DK5SxIuUNxE0oVI4JBsUtbZhcujpEUvsBwVUiu', 'Maria da Silva', '1992-05-10', 'Corupá', 'Santa Catarina', 'maria@silva.com', '47999998888', 1),
(7, 'jose', '$2y$10$qyRKj5k1TJMFYnRT.HvZ2eOI62EinK6FFMECorrvq8ZV2sLqF8t6O', 'José Boares', '1990-02-22', 'Pelotas', 'Rio Grande do Sul', 'jose@boares.com', '47991915555', 2),
(8, 'pedro', '$2y$10$Jzm05hmx.OAd4NeThoiV1OZ603P9qLG1aqOgGL8ObDesdLGm5cKBm', 'Pedro Silvano', '1984-10-16', 'Indaiatuba', 'São Paulo', 'pedro@silvano.com', '47992924444', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject`);

--
-- Índices para tabela `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`subject`) REFERENCES `subjects` (`id`);

--
-- Limitadores para a tabela `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `teachers` (`id`);

--
-- Limitadores para a tabela `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`subject`) REFERENCES `subjects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
