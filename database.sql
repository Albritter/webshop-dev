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
CREATE SCHEMA IF NOT EXISTS `db_webshop` DEFAULT CHARACTER SET utf8 ;
USE `db_webshop` ;

-- -----------------------------------------------------
-- Table `db_webshop`.`article`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_webshop`.`article` ;

CREATE TABLE IF NOT EXISTS `db_webshop`.`article` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `descshort` VARCHAR(255) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `price` VARCHAR(45) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `img` VARCHAR(255) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `created` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `desclong` TEXT CHARACTER SET 'utf8' NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `name`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `db_webshop`.`session`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_webshop`.`session` ;

CREATE TABLE IF NOT EXISTS `db_webshop`.`session` (
  `idsession` VARCHAR(64) NOT NULL,
  `expires` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idsession`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_webshop`.`chart`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_webshop`.`chart` ;

CREATE TABLE IF NOT EXISTS `db_webshop`.`chart` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idsession` VARCHAR(45) NOT NULL,
  `idarticle` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_session_idx` (`idsession` ASC),
  INDEX `id_article_idx` (`idarticle` ASC),
  CONSTRAINT `id_article`
    FOREIGN KEY (`idarticle`)
    REFERENCES `db_webshop`.`article` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_session`
    FOREIGN KEY (`idsession`)
    REFERENCES `db_webshop`.`session` (`idsession`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));