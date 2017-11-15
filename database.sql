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
DROP SCHEMA IF EXISTS `db_webshop` ;

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
AUTO_INCREMENT = 45
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `db_webshop`.`artikel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_webshop`.`artikel` ;

CREATE TABLE IF NOT EXISTS `db_webshop`.`artikel` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `preis` DOUBLE NOT NULL,
  `bild` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `db_webshop`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_webshop`.`user` ;

CREATE TABLE IF NOT EXISTS `db_webshop`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `password` VARCHAR(60) NOT NULL,
  `lastlogin` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lastloginsource` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `db_webshop`.`sessions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_webshop`.`sessions` ;

CREATE TABLE IF NOT EXISTS `db_webshop`.`sessions` (
  `idsession` VARCHAR(64) NOT NULL,
  `user` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idsession`),
  INDEX `iduser_idx` (`user` ASC),
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
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idsession` VARCHAR(45) NOT NULL,
  `idarticle` INT(11) NOT NULL,
  `count` INT(11) NOT NULL,
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
    REFERENCES `db_webshop`.`sessions` (`idsession`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 184
DEFAULT CHARACTER SET = utf8;




USE `db_webshop` ;

-- -----------------------------------------------------
-- procedure add_article_to_chart
-- -----------------------------------------------------

USE `db_webshop`;
DROP procedure IF EXISTS `db_webshop`.`add_article_to_chart`;

DELIMITER $$
USE `db_webshop`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_article_to_chart`(IN sessionid varchar(45),IN article INT(11))
BEGIN

set @c = (SELECT count(*) from chart where idsession = sessionid AND idarticle = article);

if(IFNULL(@c,0) >= 1) THEN 
	UPDATE chart set count = count +1 where idsession = sessionid AND idarticle = article ;
ELSE INSERT INTO chart (idsession,idarticle,count) values(sessionid,article,1) ;
END IF; 
END$$

DELIMITER ;

USE `db_webshop` ;


-- -----------------------------------------------------
-- procedure updateChart
-- -----------------------------------------------------

USE `db_webshop`;
DELIMITER $$


CREATE DEFINER=`root`@`localhost` PROCEDURE `updateChart`(IN artid int(11),IN anzahl int(11),IN sessionid varchar(45))
BEGIN
	IF(anzahl = 0)THEN DELETE FROM chart 
		WHERE idsession=sessionid and idarticle = artid; 
	ELSE
    UPDATE chart c set c.count = anzahl WHERE idsession=sessionid and idarticle = artid;
    END IF;
END$$
DELIMITER;
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
