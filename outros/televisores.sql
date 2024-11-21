-- MySQL Script generated by MySQL Workbench
-- Wed Nov 13 23:50:10 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema televisores
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema televisores
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `televisores` DEFAULT CHARACTER SET utf8 ;
USE `televisores` ;

-- -----------------------------------------------------
-- Table `televisores`.`funcionarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `televisores`.`funcionarios` (
  `cod_fun` INT NOT NULL,
  `nome_fun` VARCHAR(45) NOT NULL,
  `cpf_fun` VARCHAR(11) NOT NULL,
  `usuario_fun` VARCHAR(45) NOT NULL,
  `senha_fun` VARCHAR(45) NOT NULL,
  `telefone_fun` VARCHAR(11) NOT NULL,
  `salario_fun` DECIMAL NOT NULL,
  `endereco_fun` VARCHAR(45) NOT NULL,
  `data_nasc_fun` DATETIME NOT NULL,
  `email_fun` VARCHAR(45) NOT NULL,
  `status_fun` VARCHAR(45) NOT NULL,
  `funcao_fun` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cod_fun`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `televisores`.`vendas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `televisores`.`vendas` (
  `cod_venda` INT NOT NULL,
  `data_venda` DATETIME NOT NULL,
  `funcionarios_cod_fun` INT NOT NULL,
  PRIMARY KEY (`cod_venda`),
  INDEX `fk_vendas_funcionarios_idx` (`funcionarios_cod_fun` ASC) VISIBLE,
  CONSTRAINT `fk_vendas_funcionarios`
    FOREIGN KEY (`funcionarios_cod_fun`)
    REFERENCES `televisores`.`funcionarios` (`cod_fun`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `televisores`.`televisores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `televisores`.`televisores` (
  `cod_tel` INT NOT NULL,
  `marca_tel` VARCHAR(45) NOT NULL,
  `modelo_tel` VARCHAR(45) NOT NULL,
  `preco_tel` DECIMAL NOT NULL,
  `resolucao_tel` VARCHAR(10) NOT NULL,
  `conectividade_tel` VARCHAR(45) NOT NULL,
  `streaming_tel` TINYINT NOT NULL,
  `fila_compra_tel` CHAR(1) NOT NULL,
  `vendas_cod_venda` INT NOT NULL,
  PRIMARY KEY (`cod_tel`),
  INDEX `fk_televisores_vendas1_idx` (`vendas_cod_venda` ASC) VISIBLE,
  CONSTRAINT `fk_televisores_vendas1`
    FOREIGN KEY (`vendas_cod_venda`)
    REFERENCES `televisores`.`vendas` (`cod_venda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;