-- MySQL Workbench Synchronization
-- Generated: 2024-01-22 20:43
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Erika Ampudia-Vales

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER TABLE `maisonneuve`.`users` 
DROP FOREIGN KEY `users_name_foreign`,
DROP FOREIGN KEY `users_id_foreign`,
DROP FOREIGN KEY `users_email_foreign`;

ALTER TABLE `maisonneuve`.`maisonn_etudiants` 
DROP COLUMN `id`,
ADD COLUMN `user_id` INT(11) NOT NULL FIRST,
CHANGE COLUMN `email` `email` VARCHAR(45) NOT NULL AFTER `name`,
CHANGE COLUMN `phone` `phone` VARCHAR(25) NOT NULL AFTER `email`,
ADD INDEX `etudiants_email_foreign_idx` (`email` ASC),
ADD UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
ADD INDEX `fk_maisonn_etudiants_users1_idx1` (`user_id` ASC),
DROP INDEX `etudiants_email_unique` ,
DROP PRIMARY KEY;
;

ALTER TABLE `maisonneuve`.`users` 
DROP COLUMN `name`,
CHANGE COLUMN `id` `id` INT(11) NOT NULL ,
ADD PRIMARY KEY (`id`),
ADD UNIQUE INDEX `email_UNIQUE` (`email` ASC),
DROP INDEX `users_email_foreign_idx` ,
DROP INDEX `users_name_foreign_idx` ,
DROP INDEX `users_id_foreign` ;
;

CREATE TABLE IF NOT EXISTS `maisonneuve`.`article` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) UNSIGNED NOT NULL,
  `date` DATETIME GENERATED ALWAYS AS (),
  PRIMARY KEY (`id`),
  INDEX `fk_article_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_article_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `maisonneuve`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

CREATE TABLE IF NOT EXISTS `maisonneuve`.`lang` (
  `id` INT(11) NULL DEFAULT NULL AUTO_INCREMENT,
  `language` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

CREATE TABLE IF NOT EXISTS `maisonneuve`.`article_has_lang` (
  `article_id` INT(11) NOT NULL,
  `lang_id` INT(10) UNSIGNED NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `art_body` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`lang_id`, `article_id`),
  INDEX `fk_article_has_lang_lang1_idx` (`lang_id` ASC),
  INDEX `fk_article_has_lang_article1_idx` (`article_id` ASC),
  CONSTRAINT `fk_article_has_lang_article1`
    FOREIGN KEY (`article_id`)
    REFERENCES `maisonneuve`.`article` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_article_has_lang_lang1`
    FOREIGN KEY (`lang_id`)
    REFERENCES `maisonneuve`.`lang` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

ALTER TABLE `maisonneuve`.`maisonn_etudiants` 
ADD CONSTRAINT `etudiants_email_foreign`
  FOREIGN KEY (`email`)
  REFERENCES `maisonneuve`.`users` (`email`)
  ON DELETE RESTRICT
  ON UPDATE RESTRICT,
ADD CONSTRAINT `fk_maisonn_etudiants_users1`
  FOREIGN KEY (`user_id`)
  REFERENCES `maisonneuve`.`users` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
