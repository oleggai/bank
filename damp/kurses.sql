-- =============================================================================
-- Diagram Name: kurses
-- Created on: 07.10.2014 11:56:04
-- Diagram Version:
-- =============================================================================
SET FOREIGN_KEY_CHECKS=0;

-- Drop table bank
DROP TABLE IF EXISTS `bank`;

CREATE TABLE `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `icon` varchar(50),
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY(`id`)
)
ENGINE=INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci ;

-- Drop table currency
DROP TABLE IF EXISTS `currency`;

CREATE TABLE `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci,
  `icon` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci,
  PRIMARY KEY(`id`)
)
ENGINE=INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci ;

-- Drop table bank_address
DROP TABLE IF EXISTS `bank_address`;

CREATE TABLE `bank_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank` int(11) NOT NULL,
  `city` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci,
  `working_hours` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci,
  `phones` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci,
  `latitude` decimal(10,8),
  `longitude` decimal(11,8),
  PRIMARY KEY(`id`),
  CONSTRAINT `bank_addr` FOREIGN KEY (`bank`)
    REFERENCES `bank`(`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
ENGINE=INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci ;

-- Drop table currency_info
DROP TABLE IF EXISTS `currency_info`;

CREATE TABLE `currency_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency` int(11) NOT NULL,
  `bank` int(11) NOT NULL,
  `ask` double(15,4),
  `ask_change` double(15,4),
  `bid` double(15,4),
  `bid_change` double(15,4),
  `updated` timestamp,
  PRIMARY KEY(`id`),
  CONSTRAINT `curr_info` FOREIGN KEY (`currency`)
    REFERENCES `currency`(`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `bank_curr` FOREIGN KEY (`bank`)
    REFERENCES `bank`(`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
ENGINE=INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci ;

SET FOREIGN_KEY_CHECKS=1;