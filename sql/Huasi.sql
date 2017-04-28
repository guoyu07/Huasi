
/*Crear la base de datos*/
CREATE DATABASE Huasi;

/*Usar Huasi*/
use Huasi;


/*Crear la tabla para los usuario*/
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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

/*Creara la tabla para las empresas*/

DROP TABLE IF EXISTS `Corps`;
CREATE TABLE `Corps` (
  `corpId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `corpName` varchar(250) NOT NULL DEFAULT '',
  `corpMail` varchar(250) NOT NULL DEFAULT '',
  `corpPassword` varchar(200) NOT NULL DEFAULT '',
  `corpPhone` int(11) NOT NULL,
  `corpAddress` varchar(250) NOT NULL DEFAULT '',
  `corpLogo` varchar(250) NOT NULL DEFAULT '',
  `corpZone` varchar(250) NOT NULL DEFAULT '',
  `corpRepre` int(11) NOT NULL,
  PRIMARY KEY (`corpId`),
  UNIQUE KEY `corpName` (`corpName`),
  UNIQUE KEY `corpMail` (`corpMail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
