-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Mar-2018 às 17:06
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cfp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acao_formacao`
--

CREATE TABLE `acao_formacao` (
  `id_acao_formacao` int(11) NOT NULL,
  `id_area_formacao` int(11) DEFAULT NULL,
  `id_modalidade` int(11) DEFAULT NULL,
  `data_acreditacao` date DEFAULT NULL,
  `data_proposta` date DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `avaliacao` varchar(300) DEFAULT NULL,
  `observacoes` varchar(300) DEFAULT NULL,
  `creditos` decimal(10,0) DEFAULT NULL,
  `data_validade` date DEFAULT NULL,
  `subnome` varchar(150) DEFAULT NULL,
  `reg_acreditacao` varchar(45) DEFAULT NULL,
  `horas_pre` int(11) DEFAULT NULL,
  `horas_nao_pre` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agrupamento`
--

CREATE TABLE `agrupamento` (
  `id_agrupamento` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `id_cfp` int(11) DEFAULT NULL,
  `morada` varchar(200) DEFAULT NULL,
  `contacto` varchar(200) DEFAULT NULL,
  `email` varchar(9) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `area_formacao`
--

CREATE TABLE `area_formacao` (
  `id_area_formacao` int(11) NOT NULL,
  `nome` varchar(300) DEFAULT NULL,
  `codigo` varchar(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `artigo`
--

CREATE TABLE `artigo` (
  `id_artigo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cfp`
--

CREATE TABLE `cfp` (
  `id_cfp` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `morada` varchar(200) DEFAULT NULL,
  `contacto` varchar(9) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dominio_formacacao_formador`
--

CREATE TABLE `dominio_formacacao_formador` (
  `id_dominio_formacao` int(11) NOT NULL,
  `id_formador` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `edicao_formacao`
--

CREATE TABLE `edicao_formacao` (
  `id_edicao` int(11) NOT NULL,
  `id_acao_formacao` int(11) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `edicao_formador`
--

CREATE TABLE `edicao_formador` (
  `id_formador` int(11) NOT NULL,
  `id_edicao` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escalao`
--

CREATE TABLE `escalao` (
  `id_escalao` int(11) NOT NULL,
  `indice` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola`
--

CREATE TABLE `escola` (
  `id_escola` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `id_agrupamento` int(11) DEFAULT NULL,
  `contacto` varchar(9) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `morada` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formador_acao_formacao`
--

CREATE TABLE `formador_acao_formacao` (
  `id_formador` int(11) NOT NULL,
  `id_acao_formacao` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formando`
--

CREATE TABLE `formando` (
  `id_formando` int(11) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `id_escola` int(11) DEFAULT NULL,
  `telemovel` varchar(9) DEFAULT NULL,
  `id_habilitacao` int(11) DEFAULT NULL,
  `id_escalao` int(11) DEFAULT NULL,
  `morada` varchar(100) DEFAULT NULL,
  `cod_postal` varchar(45) DEFAULT NULL,
  `anos_servico` int(11) DEFAULT NULL,
  `e_mail` varchar(100) DEFAULT NULL,
  `cc` varchar(45) DEFAULT NULL,
  `contribuinte` varchar(45) DEFAULT NULL,
  `horas` int(11) DEFAULT NULL,
  `genero` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formando_grupo`
--

CREATE TABLE `formando_grupo` (
  `id_formando` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE `grupos` (
  `id_grupos` int(11) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nome` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `habilitacao`
--

CREATE TABLE `habilitacao` (
  `id_habilitacao` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidade`
--

CREATE TABLE `modalidade` (
  `id_modalidade` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `releva`
--

CREATE TABLE `releva` (
  `id_acao_formacao` int(11) NOT NULL,
  `id_artigo` int(11) NOT NULL,
  `id_grupos` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int(11) NOT NULL,
  `id_formando` int(11) NOT NULL,
  `id_edicao_formacao` int(11) DEFAULT NULL,
  `nota` decimal(10,0) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acao_formacao`
--
ALTER TABLE `acao_formacao`
  ADD PRIMARY KEY (`id_acao_formacao`),
  ADD KEY `id_area_formacao_idx` (`id_area_formacao`),
  ADD KEY `id_tipo_formacao_idx` (`id_modalidade`);

--
-- Indexes for table `agrupamento`
--
ALTER TABLE `agrupamento`
  ADD PRIMARY KEY (`id_agrupamento`),
  ADD KEY `id_cfp_idx` (`id_cfp`);

--
-- Indexes for table `area_formacao`
--
ALTER TABLE `area_formacao`
  ADD PRIMARY KEY (`id_area_formacao`);

--
-- Indexes for table `artigo`
--
ALTER TABLE `artigo`
  ADD PRIMARY KEY (`id_artigo`);

--
-- Indexes for table `cfp`
--
ALTER TABLE `cfp`
  ADD PRIMARY KEY (`id_cfp`);

--
-- Indexes for table `dominio_formacacao_formador`
--
ALTER TABLE `dominio_formacacao_formador`
  ADD PRIMARY KEY (`id_dominio_formacao`,`id_formador`),
  ADD KEY `id_formador_idx` (`id_formador`),
  ADD KEY `id_dominio_formacao_idx` (`id_dominio_formacao`);

--
-- Indexes for table `edicao_formacao`
--
ALTER TABLE `edicao_formacao`
  ADD PRIMARY KEY (`id_edicao`),
  ADD KEY `id_acao_formacao_idx` (`id_acao_formacao`);

--
-- Indexes for table `edicao_formador`
--
ALTER TABLE `edicao_formador`
  ADD PRIMARY KEY (`id_formador`,`id_edicao`),
  ADD KEY `id_edicao_idx` (`id_edicao`),
  ADD KEY `id_formador_idx` (`id_formador`);

--
-- Indexes for table `escalao`
--
ALTER TABLE `escalao`
  ADD PRIMARY KEY (`id_escalao`);

--
-- Indexes for table `escola`
--
ALTER TABLE `escola`
  ADD PRIMARY KEY (`id_escola`),
  ADD KEY `id_agrupamento` (`id_agrupamento`);

--
-- Indexes for table `formador_acao_formacao`
--
ALTER TABLE `formador_acao_formacao`
  ADD PRIMARY KEY (`id_formador`,`id_acao_formacao`),
  ADD KEY `id_acao_formador_idx` (`id_acao_formacao`),
  ADD KEY `id_formador_idx` (`id_formador`);

--
-- Indexes for table `formando`
--
ALTER TABLE `formando`
  ADD PRIMARY KEY (`id_formando`),
  ADD KEY `id_escola_idx` (`id_escola`),
  ADD KEY `id_hablitacao_idx` (`id_habilitacao`),
  ADD KEY `id_escalao_idx` (`id_escalao`);

--
-- Indexes for table `formando_grupo`
--
ALTER TABLE `formando_grupo`
  ADD PRIMARY KEY (`id_formando`,`id_grupo`),
  ADD KEY `id_formando_idx` (`id_formando`),
  ADD KEY `id_grupo_idx` (`id_grupo`);

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupos`);

--
-- Indexes for table `habilitacao`
--
ALTER TABLE `habilitacao`
  ADD PRIMARY KEY (`id_habilitacao`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `modalidade`
--
ALTER TABLE `modalidade`
  ADD PRIMARY KEY (`id_modalidade`);

--
-- Indexes for table `releva`
--
ALTER TABLE `releva`
  ADD PRIMARY KEY (`id_artigo`,`id_acao_formacao`,`id_grupos`),
  ADD KEY `id_acao_formacao_idx` (`id_acao_formacao`),
  ADD KEY `id_artigo5_idx` (`id_artigo`),
  ADD KEY `id_areas_idx` (`id_grupos`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`,`id_formando`),
  ADD KEY `id_formando_idx` (`id_formando`),
  ADD KEY `id_acao_formacao_idx` (`id_edicao_formacao`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acao_formacao`
--
ALTER TABLE `acao_formacao`
  MODIFY `id_acao_formacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agrupamento`
--
ALTER TABLE `agrupamento`
  MODIFY `id_agrupamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `area_formacao`
--
ALTER TABLE `area_formacao`
  MODIFY `id_area_formacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cfp`
--
ALTER TABLE `cfp`
  MODIFY `id_cfp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `escola`
--
ALTER TABLE `escola`
  MODIFY `id_escola` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formando`
--
ALTER TABLE `formando`
  MODIFY `id_formando` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `habilitacao`
--
ALTER TABLE `habilitacao`
  MODIFY `id_habilitacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modalidade`
--
ALTER TABLE `modalidade`
  MODIFY `id_modalidade` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
