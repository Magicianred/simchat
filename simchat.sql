CREATE DATABASE `simchat`;
USE `simchat`;

DROP TABLE IF EXISTS `board`;

CREATE TABLE `board` (
  `code` int(5) NOT NULL,
  `username` char(100) NOT NULL,
  `password` char(100) NOT NULL,
  `contents` text NOT NULL,
  `date` date NOT NULL,
  `numlike` int(5) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `board` WRITE;
INSERT INTO `board` VALUES (0,'Anonymous','1234','SimChat Project by Antibiotics','2021-02-04',0);
UNLOCK TABLES;

DROP TABLE IF EXISTS `numlike`;

CREATE TABLE `numlike` (
  `no` int(100) NOT NULL,
  `ip` char(100) NOT NULL,
  `code` int(5) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `numlike` WRITE;
INSERT INTO `numlike` VALUES (0,'0.0.0.0', 0);
UNLOCK TABLES;

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `userid` char(100) NOT NULL,
  `password` char(100) NOT NULL,
  `theme` int(2) NOT NULL,
  `avatar` text NOT NULL,
  `signupdate` date NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;