-- MySQL Script generated by MySQL Workbench
-- Wed Feb 14 18:50:16 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema db_cfp
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_cfp
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_cfp` DEFAULT CHARACTER SET utf8 ;
USE `db_cfp` ;

-- -----------------------------------------------------
-- Table `db_cfp`.`cfp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cfp`.`cfp` (
  `id_cfp` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(200) NULL,
  `morada` VARCHAR(200) NULL,
  `contacto` VARCHAR(9) NULL,
  `email` VARCHAR(200) NULL,
  PRIMARY KEY (`id_cfp`))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `db_cfp`.`agrupamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cfp`.`agrupamento` (
  `id_agrupamento` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  `id_cfp` INT NULL,
  `morada` VARCHAR(200) NULL,
  `contacto` VARCHAR(200) NULL,
  `email` VARCHAR(9) NULL,
  PRIMARY KEY (`id_agrupamento`),
  INDEX `id_cfp_idx` (`id_cfp` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `db_cfp`.`escola`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cfp`.`escola` (
  `id_escola` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  `id_agrupamento` INT NULL,
  `contacto` VARCHAR(9) NULL,
  `email` VARCHAR(200) NULL,
  `morada` VARCHAR(200) NULL,
  PRIMARY KEY (`id_escola`),
  INDEX `id_agrupamento` (`id_agrupamento` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `db_cfp`.`habilitacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cfp`.`habilitacao` (
  `id_habilitacao` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  PRIMARY KEY (`id_habilitacao`))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `db_cfp`.`escalao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cfp`.`escalao` (
  `id_escalao` INT NOT NULL,
  `indice` INT NULL,
  PRIMARY KEY (`id_escalao`))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `db_cfp`.`formando`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cfp`.`formando` (
  `id_formando` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NULL,
  `id_escola` INT NULL,
  `telemovel` VARCHAR(9) NULL,
  `id_habilitacao` INT NULL,
  `id_escalao` INT NULL,
  `morada` VARCHAR(100) NULL,
  `cod_postal` VARCHAR(45) NULL,
  `anos_servico` INT NULL,
  `e_mail` VARCHAR(100) NULL,
  `cc` VARCHAR(45) NULL,
  `contribuinte` VARCHAR(45) NULL,
  `horas` INT NULL,
  `genero` TINYINT(1) NULL,
  PRIMARY KEY (`id_formando`),
  INDEX `id_escola_idx` (`id_escola` ASC),
  INDEX `id_hablitacao_idx` (`id_habilitacao` ASC),
  INDEX `id_escalao_idx` (`id_escalao` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `db_cfp`.`area_formacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cfp`.`area_formacao` (
  `id_area_formacao` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(300) NULL,
  `codigo` VARCHAR(4) NULL,
  PRIMARY KEY (`id_area_formacao`))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `db_cfp`.`modalidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cfp`.`modalidade` (
  `id_modalidade` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  PRIMARY KEY (`id_modalidade`))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `db_cfp`.`acao_formacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cfp`.`acao_formacao` (
  `id_acao_formacao` INT NOT NULL AUTO_INCREMENT,
  `id_area_formacao` INT NULL,
  `id_modalidade` INT NULL,
  `data_acreditacao` DATE NULL,
  `data_proposta` DATE NULL,
  `codigo` VARCHAR(45) NULL,
  `nome` VARCHAR(45) NULL,
  `avaliacao` VARCHAR(300) NULL,
  `observacoes` VARCHAR(300) NULL,
  `creditos` DECIMAL NULL,
  `data_validade` DATE NULL,
  `subnome` VARCHAR(150) NULL,
  `reg_acreditacao` VARCHAR(45) NULL,
  `horas_pre` INT NULL,
  `horas_nao_pre` INT NULL,
  PRIMARY KEY (`id_acao_formacao`),
  INDEX `id_area_formacao_idx` (`id_area_formacao` ASC),
  INDEX `id_tipo_formacao_idx` (`id_modalidade` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `db_cfp`.`edicao_formacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cfp`.`edicao_formacao` (
  `id_edicao` INT NOT NULL,
  `id_acao_formacao` INT NULL,
  `data_inicio` DATE NULL,
  `data_fim` DATE NULL,
  PRIMARY KEY (`id_edicao`),
  INDEX `id_acao_formacao_idx` (`id_acao_formacao` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `db_cfp`.`edicao_formador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cfp`.`edicao_formador` (
  `id_edicao_formador` INT NOT NULL AUTO_INCREMENT,
  `id_formador` INT NULL,
  `id_edicao` INT NULL,
  PRIMARY KEY (`id_edicao_formador`),
  INDEX `id_edicao_idx` (`id_edicao` ASC),
  INDEX `id_formador_idx` (`id_formador` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `db_cfp`.`formador_acao_formacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cfp`.`formador_acao_formacao` (
  `id_formador_acao_formacao` INT NOT NULL,
  `id_formador` INT NOT NULL,
  `id_acao_formacao` INT NULL,
  PRIMARY KEY (`id_formador_acao_formacao`, `id_formador`),
  INDEX `id_acao_formador_idx` (`id_acao_formacao` ASC),
  INDEX `id_formador_idx` (`id_formador` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `db_cfp`.`turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cfp`.`turma` (
  `id_turma` INT NOT NULL,
  `id_formando` INT NOT NULL,
  `id_edicao_formacao` INT NULL,
  `nota` DECIMAL NULL,
  PRIMARY KEY (`id_turma`, `id_formando`),
  INDEX `id_formando_idx` (`id_formando` ASC),
  INDEX `id_acao_formacao_idx` (`id_edicao_formacao` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `db_cfp`.`dominio_formacacao_formador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cfp`.`dominio_formacacao_formador` (
  `id_d_f_f` INT NOT NULL,
  `id_dominio_formacao` INT NOT NULL,
  `id_formador` INT NOT NULL,
  PRIMARY KEY (`id_d_f_f`, `id_dominio_formacao`, `id_formador`),
  INDEX `id_formador_idx` (`id_formador` ASC),
  INDEX `id_dominio_formacao_idx` (`id_dominio_formacao` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `db_cfp`.`login`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cfp`.`login` (
  `id_login` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  PRIMARY KEY (`id_login`))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `db_cfp`.`artigo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cfp`.`artigo` (
  `id_artigo` INT NOT NULL,
  PRIMARY KEY (`id_artigo`))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `db_cfp`.`grupos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cfp`.`grupos` (
  `id_grupos` INT NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(45) NULL,
  `nome` VARCHAR(300) NULL,
  PRIMARY KEY (`id_grupos`))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `db_cfp`.`releva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cfp`.`releva` (
  `id_revela` INT NOT NULL,
  `id_acao_formacao` INT NOT NULL,
  `id_artigo` INT NOT NULL,
  `id_grupos` INT NOT NULL,
  PRIMARY KEY (`id_revela`, `id_artigo`, `id_acao_formacao`, `id_grupos`),
  INDEX `id_acao_formacao_idx` (`id_acao_formacao` ASC),
  INDEX `id_artigo5_idx` (`id_artigo` ASC),
  INDEX `id_areas_idx` (`id_grupos` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `db_cfp`.`formando_grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cfp`.`formando_grupo` (
  `id_formando_grupo` INT NOT NULL,
  `id_formando` INT NOT NULL,
  `id_grupo` INT NULL,
  PRIMARY KEY (`id_formando_grupo`, `id_formando`),
  INDEX `id_formando_idx` (`id_formando` ASC),
  INDEX `id_grupo_idx` (`id_grupo` ASC))
ENGINE = MyISAM;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
