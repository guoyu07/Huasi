# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.42)
# Base de datos: Huasi
# Tiempo de Generación: 2017-04-17 02:35:59 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


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
  PRIMARY KEY (`userId`),
  UNIQUE KEY `Unique_Mail` (`userMail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
