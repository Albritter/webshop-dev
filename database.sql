-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema db_webshop
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_webshop
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_webshop` DEFAULT CHARACTER SET latin1 ;
USE `db_webshop` ;

-- -----------------------------------------------------
-- Table `db_webshop`.`article`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_webshop`.`article` ;

CREATE TABLE IF NOT EXISTS `db_webshop`.`article` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `name` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL COMMENT '',
  `descshort` VARCHAR(255) CHARACTER SET 'utf8' NULL DEFAULT NULL COMMENT '',
  `price` VARCHAR(45) CHARACTER SET 'utf8' NULL DEFAULT NULL COMMENT '',
  `img` VARCHAR(255) CHARACTER SET 'utf8' NULL DEFAULT NULL COMMENT '',
  `created` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
  `desclong` TEXT CHARACTER SET 'utf8' NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id`, `name`)  COMMENT '')
  ENGINE = InnoDB
  AUTO_INCREMENT = 45
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `db_webshop`.`artikel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_webshop`.`artikel` ;

CREATE TABLE IF NOT EXISTS `db_webshop`.`artikel` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `name` VARCHAR(255) NOT NULL COMMENT '',
  `preis` DOUBLE NOT NULL COMMENT '',
  `bild` VARCHAR(255) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `db_webshop`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_webshop`.`user` ;

CREATE TABLE IF NOT EXISTS `db_webshop`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `name` VARCHAR(45) NOT NULL COMMENT '',
  `password` VARCHAR(60) NOT NULL COMMENT '',
  `lastlogin` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '',
  `lastloginsource` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `name_UNIQUE` (`name` ASC)  COMMENT '')
  ENGINE = InnoDB
  AUTO_INCREMENT = 5
  DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `db_webshop`.`sessions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_webshop`.`sessions` ;

CREATE TABLE IF NOT EXISTS `db_webshop`.`sessions` (
  `idsession` VARCHAR(64) NOT NULL COMMENT '',
  `user` INT(11) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`idsession`)  COMMENT '',
  INDEX `iduser_idx` (`user` ASC)  COMMENT '',
  CONSTRAINT `iduser`
  FOREIGN KEY (`user`)
  REFERENCES `db_webshop`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_webshop`.`chart`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_webshop`.`chart` ;

CREATE TABLE IF NOT EXISTS `db_webshop`.`chart` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `idsession` VARCHAR(45) NOT NULL COMMENT '',
  `idarticle` INT(11) NOT NULL COMMENT '',
  `count` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `id_session_idx` (`idsession` ASC)  COMMENT '',
  INDEX `id_article_idx` (`idarticle` ASC)  COMMENT '',
  CONSTRAINT `id_article`
  FOREIGN KEY (`idarticle`)
  REFERENCES `db_webshop`.`article` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_session`
  FOREIGN KEY (`idsession`)
  REFERENCES `db_webshop`.`sessions` (`idsession`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
  ENGINE = InnoDB
  AUTO_INCREMENT = 177
  DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_webshop`.`test`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_webshop`.`test` ;

CREATE TABLE IF NOT EXISTS `db_webshop`.`test` (
  `id` INT(11) NOT NULL COMMENT '',
  `text` VARCHAR(255) NOT NULL COMMENT '',
  `text2` VARCHAR(255) NOT NULL COMMENT '',
  `text3` TEXT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
