CREATE DATABASE Huasi;

use Huasi;


# Volcado de tabla Amenities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Amenities`;

CREATE TABLE `Amenities` (
  `amenitieId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`amenitieId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla Coments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Coments`;

CREATE TABLE `Coments` (
  `comentId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hostId` int(11) unsigned NOT NULL,
  `userId` int(11) unsigned NOT NULL,
  `comentText` text NOT NULL,
  `comentDate` datetime NOT NULL,
  PRIMARY KEY (`comentId`),
  KEY `fk_hostId` (`hostId`),
  KEY `fk_userId` (`userId`),
  CONSTRAINT `fk_hostId` FOREIGN KEY (`hostId`) REFERENCES `Hosts` (`hostId`),
  CONSTRAINT `fk_userId` FOREIGN KEY (`userId`) REFERENCES `Users` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla Corps
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Corps`;

CREATE TABLE `Corps` (
  `corpId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `corpName` varchar(250) NOT NULL DEFAULT '',
  `corpMail` varchar(250) NOT NULL DEFAULT '',
  `corpPassword` varchar(200) NOT NULL DEFAULT '',
  `corpPhone` int(11) NOT NULL,
  `corpAddress` varchar(250) NOT NULL DEFAULT '',
  `corpLogo` varchar(250) NOT NULL DEFAULT '',
  `corpRepre` varchar(250) NOT NULL DEFAULT '',
  `corpDescription` text NOT NULL,
  `corpFirstLogin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`corpId`),
  UNIQUE KEY `corpName` (`corpName`),
  UNIQUE KEY `corpMail` (`corpMail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla Hosts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Hosts`;

CREATE TABLE `Hosts` (
  `hostId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `corpId` int(11) unsigned NOT NULL,
  `hostName` varchar(250) NOT NULL DEFAULT '',
  `HostType` varchar(200) NOT NULL DEFAULT '',
  `HostNum` int(11) NOT NULL,
  `HostAddress` varchar(250) NOT NULL DEFAULT '',
  `hostZone` varchar(200) NOT NULL,
  `hostPrice` float NOT NULL,
  `hostImagePath` varchar(250) NOT NULL DEFAULT '',
  `hostDescription` text NOT NULL,
  PRIMARY KEY (`hostId`),
  KEY `fk_corpId` (`corpId`),
  CONSTRAINT `fk_corpId` FOREIGN KEY (`corpId`) REFERENCES `Corps` (`corpId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla HostsImg
# ------------------------------------------------------------

DROP TABLE IF EXISTS `HostsImg`;

CREATE TABLE `HostsImg` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla Reserve
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Reserve`;

CREATE TABLE `Reserve` (
  `reserveId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) unsigned NOT NULL,
  `hostId` int(11) unsigned NOT NULL,
  `reserveComing` date NOT NULL,
  `reserveLeaving` date NOT NULL,
  `reserveMake` datetime NOT NULL,
  PRIMARY KEY (`reserveId`),
  KEY `fk_userId` (`userId`),
  KEY `fk_hostId` (`hostId`),
  CONSTRAINT `reserve_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `Users` (`userId`),
  CONSTRAINT `reserve_ibfk_1` FOREIGN KEY (`hostId`) REFERENCES `Hosts` (`hostId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla Users
# ------------------------------------------------------------

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
  `userLogMonth` int(11) NOT NULL,
  `userLogYear` int(11) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `Unique_Mail` (`userMail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla WishList
# ------------------------------------------------------------

DROP TABLE IF EXISTS `WishList`;

CREATE TABLE `WishList` (
  `wishId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hostId` int(11) unsigned NOT NULL,
  `userId` int(11) unsigned NOT NULL,
  `wishDate` datetime NOT NULL,
  PRIMARY KEY (`wishId`),
  KEY `fk_hostId` (`hostId`),
  KEY `fk_userId` (`userId`),
  CONSTRAINT `hostId` FOREIGN KEY (`hostId`) REFERENCES `Hosts` (`hostId`),
  CONSTRAINT `userId` FOREIGN KEY (`userId`) REFERENCES `Users` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
