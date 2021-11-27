-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Nov-2021 às 18:34
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
-- Banco de dados: `sistema_monitoria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_eventomonitoria`
--

CREATE TABLE `aluno_eventomonitoria` (
  `id` int(11) NOT NULL,
  `eventomonitoria_id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `presente` int(11) DEFAULT NULL,
  `inativo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventomonitoria`
--

CREATE TABLE `eventomonitoria` (
  `id` int(11) NOT NULL,
  `monitoria_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `relatorio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `monitoria`
--

CREATE TABLE `monitoria` (
  `id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `monitor_monitoria`
--

CREATE TABLE `monitor_monitoria` (
  `id` int(11) NOT NULL,
  `monitoria_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `inativo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Professor'),
(3, 'Aluno'),
(4, 'Monitor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `tipousuario_id` int(11) NOT NULL,
  `nome` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `matricula` int(11) DEFAULT NULL,
  `senha` varchar(45) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno_eventomonitoria`
--
ALTER TABLE `aluno_eventomonitoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aluno_eventomonitoria` (`aluno_id`),
  ADD KEY `fk_eventomonitoria_aluno` (`eventomonitoria_id`);

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `eventomonitoria`
--
ALTER TABLE `eventomonitoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_eventomonitoria_monitoria` (`monitoria_id`);

--
-- Índices para tabela `monitoria`
--
ALTER TABLE `monitoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_monitoria_usuario` (`professor_id`),
  ADD KEY `fk_monitoria_disciplina` (`disciplina_id`);

--
-- Índices para tabela `monitor_monitoria`
--
ALTER TABLE `monitor_monitoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_monitor_monitoria` (`usuario_id`),
  ADD KEY `fk_monitoria_monitor` (`monitoria_id`);

--
-- Índices para tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_tipousuario` (`tipousuario_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno_eventomonitoria`
--
ALTER TABLE `aluno_eventomonitoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `eventomonitoria`
--
ALTER TABLE `eventomonitoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `monitoria`
--
ALTER TABLE `monitoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `monitor_monitoria`
--
ALTER TABLE `monitor_monitoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno_eventomonitoria`
--
ALTER TABLE `aluno_eventomonitoria`
  ADD CONSTRAINT `fk_aluno_eventomonitoria` FOREIGN KEY (`aluno_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `fk_eventomonitoria_aluno` FOREIGN KEY (`eventomonitoria_id`) REFERENCES `eventomonitoria` (`id`);

--
-- Limitadores para a tabela `eventomonitoria`
--
ALTER TABLE `eventomonitoria`
  ADD CONSTRAINT `fk_eventomonitoria_monitoria` FOREIGN KEY (`monitoria_id`) REFERENCES `monitoria` (`id`);

--
-- Limitadores para a tabela `monitoria`
--
ALTER TABLE `monitoria`
  ADD CONSTRAINT `fk_monitoria_disciplina` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplina` (`id`),
  ADD CONSTRAINT `fk_monitoria_usuario` FOREIGN KEY (`professor_id`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `monitor_monitoria`
--
ALTER TABLE `monitor_monitoria`
  ADD CONSTRAINT `fk_monitor_monitoria` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `fk_monitoria_monitor` FOREIGN KEY (`monitoria_id`) REFERENCES `monitoria` (`id`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_tipousuario` FOREIGN KEY (`tipousuario_id`) REFERENCES `tipousuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
