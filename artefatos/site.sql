-- MySQL Script generated by MySQL Workbench
-- 06/01/21 21:48:21
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema sistema_padrao
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `contato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contato` (
  `idcontato` INT NOT NULL,
  `ip` VARCHAR(100) NULL,
  `data` DATETIME NULL,
  `nome` VARCHAR(100) NULL,
  `email` VARCHAR(100) NULL,
  `telefone` VARCHAR(100) NULL,
  `empresa` VARCHAR(100) NULL,
  `mensagem` BLOB NULL,
  `ativo` CHAR(1) NULL,
  PRIMARY KEY (`idcontato`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interesse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `interesse` (
  `idinteresse` INT NOT NULL,
  `ip` VARCHAR(100) NULL,
  `data` DATETIME NULL,
  `nome` VARCHAR(100) NULL,
  `email` VARCHAR(100) NULL,
  `telefone` VARCHAR(100) NULL,
  `empresa` VARCHAR(100) NULL,
  `dia` DATE NULL,
  `hora` VARCHAR(100) NULL,
  `mensagem` BLOB NULL,
  `ativo` CHAR(1) NULL,
  PRIMARY KEY (`idinteresse`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `newsletter`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `newsletter` (
  `idnewsletter` INT NOT NULL AUTO_INCREMENT,
  `ip` VARCHAR(100) NULL,
  `data` DATETIME NULL,
  `nome` VARCHAR(100) NULL,
  `email` VARCHAR(100) NULL,
  `ativo` CHAR(1) NULL,
  PRIMARY KEY (`idnewsletter`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
