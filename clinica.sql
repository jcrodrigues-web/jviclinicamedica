-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Maio-2020 às 23:20
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clinica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(220) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'Jairo / Dra. Raquel', '#FFD700', '2019-05-21 15:00:00', '2019-05-21 16:00:00'),
(2, 'Tutorial FullCalendar editar detalhes do evento', '#0071c5', '2019-05-30 15:00:00', '2019-05-30 00:00:00'),
(3, 'Marcio / Dra. Raquel', '#FFD700', '2019-05-23 15:00:00', '2019-05-23 16:00:00'),
(4, 'Reuniao 3', '#40e0d0', '2019-05-17 17:00:00', '2019-05-17 18:00:00'),
(5, 'Reuniao 4', '#0071c5', '2019-05-17 15:00:00', '2019-05-17 16:00:00'),
(6, 'Reuniao 5', '#FFD700', '2019-05-17 13:00:00', '2019-05-17 14:00:00'),
(7, 'Reuniao 6', '#0071c5', '2019-05-17 11:00:00', '2019-05-17 12:00:00'),
(8, 'Reuniao 7', '#40e0d0', '2019-05-17 09:00:00', '2019-05-17 10:00:00'),
(9, 'Jaime / Dr. Bruno', '#228B22', '2019-09-12 00:00:00', '2019-09-13 00:00:00'),
(10, 'Amilton / Dr. Bruno', NULL, '2019-09-13 15:10:10', '2019-09-13 17:15:15'),
(11, 'Aline / Dra. Raquel', NULL, '2019-10-09 15:30:00', '2019-10-09 17:00:00'),
(12, 'Júlio / Dr. Antônio', '#8B0000', '2020-03-31 00:00:00', '2020-04-01 00:00:00'),
(13, 'Julia Maria / Dr. Pedro', '#228B22', '2020-05-13 09:00:00', '2020-05-13 09:30:00'),
(14, 'Paula Fernanda / Dr. Bruno', '#228B22', '2020-05-15 10:00:00', '2020-05-15 11:00:00'),
(15, 'Elizangela / Dr Mauricio', '#228B22', '2020-05-18 14:00:00', '2020-05-18 14:30:00'),
(16, 'Marcio / Dra. Raquel', '', '2020-05-05 00:00:00', '2020-05-06 00:00:00'),
(17, 'Julia Maria / Dr. Pedro', '#228B22', '2020-05-20 09:00:00', '2020-05-20 09:30:00'),
(18, 'Julia Maria / Dr. Pedro', '#FFD700', '2020-05-27 09:00:00', '2020-05-27 09:30:00'),
(19, 'Julia Maria / Dr. Pedro', '#FFD700', '2020-05-24 09:00:00', '2020-05-24 09:30:00'),
(20, 'Julia Maria / Dr. Pedro', '#228B22', '2019-05-30 14:00:00', '2019-05-30 15:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exame`
--

CREATE TABLE `exame` (
  `id` int(11) NOT NULL,
  `nomePacienteExame` varchar(100) CHARACTER SET utf8 NOT NULL,
  `dataNascPacienteExame` varchar(15) CHARACTER SET utf8 NOT NULL,
  `convenioPacienteExame` varchar(50) CHARACTER SET utf8 NOT NULL,
  `medicoPacienteExame` varchar(50) CHARACTER SET utf8 NOT NULL,
  `crmPacienteExame` varchar(15) CHARACTER SET utf8 NOT NULL,
  `dataPacienteExame` varchar(15) CHARACTER SET utf8 NOT NULL,
  `solicitacaoPacienteExame` varchar(500) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `exame`
--

INSERT INTO `exame` (`id`, `nomePacienteExame`, `dataNascPacienteExame`, `convenioPacienteExame`, `medicoPacienteExame`, `crmPacienteExame`, `dataPacienteExame`, `solicitacaoPacienteExame`) VALUES
(1, 'Maria Aparecida', '1981-02-20', 'Amil', 'Luciana Braga', '3451', '2000-02-02', 'Raio X                          '),
(2, 'Geraldo Magela', '', '', '', '', '', 'Raio X'),
(3, 'Tatiana Gomes', '', '', '', '', '', 'Ultrassonografia'),
(4, 'Ana Beatriz Moreira', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nomeFuncionario` varchar(50) CHARACTER SET utf8 NOT NULL,
  `cpfFuncionario` varchar(20) CHARACTER SET utf8 NOT NULL,
  `dataNascFuncionario` varchar(20) CHARACTER SET utf8 NOT NULL,
  `funcaoFuncionario` varchar(50) CHARACTER SET utf8 NOT NULL,
  `telResFuncionario` varchar(20) CHARACTER SET utf8 NOT NULL,
  `celularFuncionario` varchar(20) CHARACTER SET utf8 NOT NULL,
  `emailFuncionario` varchar(50) CHARACTER SET utf8 NOT NULL,
  `enderecoFuncionario` varchar(50) CHARACTER SET utf8 NOT NULL,
  `bairroFuncionario` varchar(50) CHARACTER SET utf8 NOT NULL,
  `cidadeFuncionario` varchar(50) CHARACTER SET utf8 NOT NULL,
  `estadoFuncionario` varchar(50) CHARACTER SET utf8 NOT NULL,
  `paisFuncionario` varchar(50) CHARACTER SET utf8 NOT NULL,
  `cepFuncionario` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nomeFuncionario`, `cpfFuncionario`, `dataNascFuncionario`, `funcaoFuncionario`, `telResFuncionario`, `celularFuncionario`, `emailFuncionario`, `enderecoFuncionario`, `bairroFuncionario`, `cidadeFuncionario`, `estadoFuncionario`, `paisFuncionario`, `cepFuncionario`) VALUES
(1, 'Lucas Martins Ribeiro', '234.567.899-99', '2002-03-12', '02-Médico', '(31)3455-6678', '(31)98799-0888', 'lucas@yahoo.com.br', 'Rua Inglaterra', 'Centro', 'Sabara', 'Minas Gerais', 'Brasil', '34.567-788'),
(3, 'Paula Maria', '234.567.876-33', '1990-03-21', '03-Secretária', '(31)3671-8907', '(31)98754-6789', 'paula@jviclinicamedica.com', 'Rua Rio de Janeiro, 13', 'Centro', 'Belo Horizonte', 'Minas Gerais', 'Brasil', '35.000-000'),
(6, 'Marcelo Santos Soares', '234.678.908-75', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'Ana Maria Ribeiro', '445.678.909-88', '', '', '99999999999999999', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `nomeHistPaciente` varchar(50) NOT NULL,
  `convenioHistPaciente` varchar(50) NOT NULL,
  `medicoHistPaciente` varchar(50) NOT NULL,
  `dataHistPaciente` varchar(20) NOT NULL,
  `exameHistPaciente` varchar(50) NOT NULL,
  `medicamentoHistPaciente` varchar(50) NOT NULL,
  `resultadoHistPaciente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `nomeHistPaciente`, `convenioHistPaciente`, `medicoHistPaciente`, `dataHistPaciente`, `exameHistPaciente`, `medicamentoHistPaciente`, `resultadoHistPaciente`) VALUES
(1, 'Kelly Silva', '01-Bradesco', '4343242424234', '2018-12-22', '9999999999', 'An dd', 'fgfsgsgfsg'),
(2, 'Alan Moreira', '', '', '', '', '', ''),
(3, 'Roberto Vasconcelos', '', '', '', '', '', ''),
(5, 'Ivanise Albergaria', 'Unimed', 'Bruno Fernandes', '2020-05-04', 'Exames de Sangue', 'Alegra', 'Nenhum tipo de alteração.             ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicamento`
--

CREATE TABLE `medicamento` (
  `id` int(11) NOT NULL,
  `nomeMedicamento` varchar(50) NOT NULL,
  `genericoMedicamento` varchar(20) NOT NULL,
  `fabricanteMedicamento` varchar(50) NOT NULL,
  `tipoMedicamento` varchar(50) NOT NULL,
  `nomeGenMedicamento` varchar(50) NOT NULL,
  `nomeFabMedicamento` varchar(50) NOT NULL,
  `observacoesMedicamento` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `medicamento`
--

INSERT INTO `medicamento` (`id`, `nomeMedicamento`, `genericoMedicamento`, `fabricanteMedicamento`, `tipoMedicamento`, `nomeGenMedicamento`, `nomeFabMedicamento`, `observacoesMedicamento`) VALUES
(2, 'Amoxicilina', '2', 'farmacia', 'genÃ©rico', 'NOme Gen', 'fabricante', 'ggggggggggg'),
(4, 'Budesonida', '4', 'farmacia', 'genÃ©rico', 'NOme Gen', 'fabricante', ''),
(5, 'Ibuprofeno', '5', '', '', '', '', ''),
(6, 'Paracetamol', 'Sim', 'Medquimica', 'Analgesico', 'Paracetamol', 'Cimed', 'Para a redução da febre e o alívio temporário de dores.                            ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_acessos`
--

CREATE TABLE `nivel_acessos` (
  `id` int(11) NOT NULL,
  `nome_nivel` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nivel_acessos`
--

INSERT INTO `nivel_acessos` (`id`, `nome_nivel`, `created`, `modified`) VALUES
(1, 'Administrador', '2019-02-14 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `nomePaciente` varchar(50) NOT NULL,
  `cpfPaciente` varchar(20) NOT NULL,
  `dataNascPaciente` varchar(15) NOT NULL,
  `convenioPaciente` varchar(50) NOT NULL,
  `telResPaciente` varchar(20) NOT NULL,
  `celularPaciente` varchar(20) NOT NULL,
  `emailPaciente` varchar(50) NOT NULL,
  `enderecoPaciente` varchar(50) NOT NULL,
  `bairroPaciente` varchar(50) NOT NULL,
  `cidadePaciente` varchar(50) NOT NULL,
  `estadoPaciente` varchar(50) NOT NULL,
  `paisPaciente` varchar(50) NOT NULL,
  `cepPaciente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id`, `nomePaciente`, `cpfPaciente`, `dataNascPaciente`, `convenioPaciente`, `telResPaciente`, `celularPaciente`, `emailPaciente`, `enderecoPaciente`, `bairroPaciente`, `cidadePaciente`, `estadoPaciente`, `paisPaciente`, `cepPaciente`) VALUES
(3, 'Joaquim Santos', '344.555.667-77', '2016-05-03', 'CEMIG Saúde', '(31)3567-7777', '(31)97654-4433', 'joaquimsa@gmail.com', 'Rua Nove', 'Bernardo de Souza', 'Vespasiano', 'Minas Gerais', 'Brasil', '34.555-000'),
(9, 'Ana Paula', '345.678.907-99', '1981-07-04', 'Bradesco Saúde', '', '', '', '', '', '', '', '', ''),
(10, 'Ivanise Albergaria', '590.765.545-54', '1980-12-25', 'Unimed', '(31)3671-8909', '(31)98767-8954', 'ivanise@gmail.com', 'Rua Nove', 'Centro', 'Sabará', 'Minas Gerais', 'Brasil', '34.567-000'),
(11, 'Lidiane Ribeiro de Almeida', '223.459.077-77', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginacao`
--

CREATE TABLE `paginacao` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `paginacao`
--

INSERT INTO `paginacao` (`id`, `nome`, `email`, `created`, `modified`) VALUES
(1, 'Cesar', 'cesar@celke.com.br', '2017-11-12 22:35:47', NULL),
(2, 'Cesar1', 'cesar1@celke.com.br', '2017-11-12 22:37:15', NULL),
(3, 'Cesar2', 'cesar2@celke.com.br', '2017-11-12 22:39:14', NULL),
(4, 'Cesar4', 'cesar4@celke.com.br', '2017-11-12 22:41:21', NULL),
(5, 'Cesar5', 'cesar5@celke.com.br', '2017-11-12 22:42:49', NULL),
(6, 'Cesar6', 'cesar6@celke.com.br', '2017-11-12 22:48:27', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

CREATE TABLE `receita` (
  `id` int(11) NOT NULL,
  `cpfPaciente` varchar(20) NOT NULL,
  `nomePacienteReceita` varchar(50) NOT NULL,
  `idadePacienteReceita` varchar(10) NOT NULL,
  `dataNascPacienteReceita` varchar(20) NOT NULL,
  `convenioPacienteReceita` varchar(50) NOT NULL,
  `medicoPacienteReceita` varchar(50) NOT NULL,
  `crmPacienteReceita` varchar(20) NOT NULL,
  `dataPacienteReceita` varchar(20) NOT NULL,
  `receituarioPacienteReceita` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `receita`
--

INSERT INTO `receita` (`id`, `cpfPaciente`, `nomePacienteReceita`, `idadePacienteReceita`, `dataNascPacienteReceita`, `convenioPacienteReceita`, `medicoPacienteReceita`, `crmPacienteReceita`, `dataPacienteReceita`, `receituarioPacienteReceita`) VALUES
(3, '344.555.667-77', 'Jessica Nascimento', '34', '2011-06-14', 'Unimed', 'Paulo', '34456', '2020-04-23', '                  Xarope 3 x dia \r\n\r\n                                                                                                              '),
(8, '590.765.545-54', 'Ivanise Albergaria', '40', '1980-12-25', 'Unimed', 'Bruno Fernandes', '23456', '2020-05-05', 'Alegra 2 x ao dia.'),
(18, '345.678.907-86', 'Ana Paula', '33', '', '', '', '', '', ''),
(19, '546.788.923-34', 'Maria Fernanda', '', '2020-05-06', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nivel_acesso_id` int(11) NOT NULL,
  `creat` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `login`, `senha`, `nivel_acesso_id`, `creat`, `modified`) VALUES
(7, 'Administrador', 'admin@jviclinicamedica.com', 'admin', 'Julio@2020', 1, '0000-00-00 00:00:00', NULL),
(8, 'Atendimento', 'atendimento@jvi.com.br', 'atendimento', 'Julio@2020', 2, '0000-00-00 00:00:00', NULL),
(9, 'Medico', 'medico@jviclinicamedica.com', 'medico', 'Julio@2020', 3, '0000-00-00 00:00:00', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `exame`
--
ALTER TABLE `exame`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `nivel_acessos`
--
ALTER TABLE `nivel_acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `paginacao`
--
ALTER TABLE `paginacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `receita`
--
ALTER TABLE `receita`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `exame`
--
ALTER TABLE `exame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `nivel_acessos`
--
ALTER TABLE `nivel_acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `paginacao`
--
ALTER TABLE `paginacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `receita`
--
ALTER TABLE `receita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
