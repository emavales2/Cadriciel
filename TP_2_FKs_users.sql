-- MySQL Workbench Synchronization
-- Generated: 2024-01-22 06:46
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Erika Ampudia-Vales

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER TABLE `maisonneuve`.`users`
ADD CONSTRAINT `users_name_foreign`
  FOREIGN KEY (`name`)
  REFERENCES `maisonneuve`.`maisonn_etudiants` (`name`)
  ON DELETE RESTRICT
  ON UPDATE RESTRICT,
ADD INDEX `idx_users_name` (`name`);

ALTER TABLE `maisonneuve`.`users`
ADD CONSTRAINT `users_email_foreign`
  FOREIGN KEY (`email`)
  REFERENCES `maisonneuve`.`maisonn_etudiants` (`email`)
  ON DELETE RESTRICT
  ON UPDATE RESTRICT,
ADD INDEX `idx_users_email` (`email`);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
