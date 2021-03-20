CREATE SCHEMA `check24` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
CREATE TABLE `check24`.`users` (
  `id` INT(20) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) NULL,
  `email` VARCHAR(191) NULL,
  `password` VARCHAR(191) NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `check24`.`articles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` DATETIME NULL,
  `title` VARCHAR(45) NULL,
  `author` INT(20) NULL,
  `picture` VARCHAR(255) NULL,
  `content`  TEXT NULL,
  PRIMARY KEY (`id`));

  CREATE TABLE `check24`.`comments` (
  `id` INT(20) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) NULL,
  `email` VARCHAR(45) NULL,
  `url` VARCHAR(191) NULL,
  `comment` TEXT NULL,
  `datetime` DATETIME NULL,
  PRIMARY KEY (`id`));

ALTER TABLE `check24`.`comments` 
ADD COLUMN `id_articles` INT(20) NULL AFTER `datetime`;

ALTER TABLE `check24`.`comments` 
ADD INDEX `fk_comments_1_idx` (`id_articles` ASC);
ALTER TABLE `check24`.`comments` 
ADD CONSTRAINT `fk_comments_1`
  FOREIGN KEY (`id_articles`)
  REFERENCES `check24`.`articles` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
