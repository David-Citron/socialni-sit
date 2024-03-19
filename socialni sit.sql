-- MySQL Script generated by MySQL Workbench
-- Tue Mar 19 21:44:42 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`uzivatel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`uzivatel` ;

CREATE TABLE IF NOT EXISTS `mydb`.`uzivatel` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `uzivatelske_jmeno` VARCHAR(255) NOT NULL,
  `heslo` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `datum_narozeni` DATE NOT NULL,
  `admin` TINYINT NOT NULL DEFAULT 0,
  `obrazek` VARCHAR(255) NULL,
  `popis` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`prispevek`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`prispevek` ;

CREATE TABLE IF NOT EXISTS `mydb`.`prispevek` (
  `id` INT NOT NULL,
  `text` VARCHAR(255) NOT NULL,
  `obrazek` VARCHAR(255) NOT NULL,
  `pocet_lajku` INT NOT NULL,
  `pocet_komentaru` INT NOT NULL,
  `pridano` DATETIME NOT NULL,
  `uzivatel_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_prispevek_uzivatel_idx` (`uzivatel_id` ASC)  ,
  CONSTRAINT `fk_prispevek_uzivatel`
    FOREIGN KEY (`uzivatel_id`)
    REFERENCES `mydb`.`uzivatel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`komentar`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`komentar` ;

CREATE TABLE IF NOT EXISTS `mydb`.`komentar` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `text` VARCHAR(255) NOT NULL,
  `pridano` DATETIME NOT NULL,
  `prispevek_id` INT NOT NULL,
  `uzivatel_id` INT NOT NULL,
  PRIMARY KEY (`id`, `prispevek_id`, `uzivatel_id`),
  INDEX `fk_komentar_prispevek1_idx` (`prispevek_id` ASC)  ,
  INDEX `fk_komentar_uzivatel1_idx` (`uzivatel_id` ASC)  ,
  CONSTRAINT `fk_komentar_prispevek1`
    FOREIGN KEY (`prispevek_id`)
    REFERENCES `mydb`.`prispevek` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_komentar_uzivatel1`
    FOREIGN KEY (`uzivatel_id`)
    REFERENCES `mydb`.`uzivatel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`palec_nahoru`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`palec_nahoru` ;

CREATE TABLE IF NOT EXISTS `mydb`.`palec_nahoru` (
  `prispevek_id` INT NOT NULL,
  `uzivatel_id` INT NOT NULL,
  PRIMARY KEY (`prispevek_id`, `uzivatel_id`),
  INDEX `fk_lajk_uzivatel1_idx` (`uzivatel_id` ASC)  ,
  INDEX `fk_lajk_prispevek1_idx` (`prispevek_id` ASC)  ,
  CONSTRAINT `fk_lajk_uzivatel1`
    FOREIGN KEY (`uzivatel_id`)
    REFERENCES `mydb`.`uzivatel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_lajk_prispevek1`
    FOREIGN KEY (`prispevek_id`)
    REFERENCES `mydb`.`prispevek` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`palec_dolu`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`palec_dolu` ;

CREATE TABLE IF NOT EXISTS `mydb`.`palec_dolu` (
  `prispevek_id` INT NOT NULL,
  `uzivatel_id` INT NOT NULL,
  PRIMARY KEY (`prispevek_id`, `uzivatel_id`),
  INDEX `fk_prispevek_has_uzivatel_uzivatel1_idx` (`uzivatel_id` ASC)  ,
  INDEX `fk_prispevek_has_uzivatel_prispevek1_idx` (`prispevek_id` ASC)  ,
  CONSTRAINT `fk_prispevek_has_uzivatel_prispevek1`
    FOREIGN KEY (`prispevek_id`)
    REFERENCES `mydb`.`prispevek` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prispevek_has_uzivatel_uzivatel1`
    FOREIGN KEY (`uzivatel_id`)
    REFERENCES `mydb`.`uzivatel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
