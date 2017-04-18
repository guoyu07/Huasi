

CREATE DATABASE Huasi;
# Volcado de tabla Users
# ------------------------------------------------------------

use Huasi;

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users` (
  `userId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userMail` varchar(250) NOT NULL,
  `userName` varchar(250) NOT NULL DEFAULT '',
  `userLastName` varchar(250) NOT NULL DEFAULT '',
  `userDay` int(11) NOT NULL,
  `userMonth` varchar(200) NOT NULL DEFAULT '',
  `userYear` int(11) NOT NULL,
  `userSex` varchar(200) NOT NULL,
  `userDescription` text NOT NULL,
  `userPhoneNumber` int(11) NOT NULL,
  `userCountry` varchar(200) NOT NULL,
  `userCity` varchar(200) NOT NULL DEFAULT '',
  `userPassword` varchar(200) NOT NULL DEFAULT '',
  `userImagePath` varchar(200) NOT NULL DEFAULT '',
  `userFirstLogin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userId`),
  UNIQUE KEY `Unique_Mail` (`userMail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
