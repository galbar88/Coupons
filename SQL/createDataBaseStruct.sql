CREATE DATABASE  IF NOT EXISTS `Coupons` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `Coupons`;
-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: Coupons
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Admin`
--

DROP TABLE IF EXISTS `Admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Admin` (
  `adminID` int(11) NOT NULL,
  PRIMARY KEY (`adminID`),
  CONSTRAINT `fk_Admin_1` FOREIGN KEY (`adminID`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Business`
--

DROP TABLE IF EXISTS `Business`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_longtitude` double NOT NULL COMMENT '					',
  `location_lotitude` double NOT NULL,
  `category` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(45) NOT NULL,
  `managerID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_Business_1` FOREIGN KEY (`id`) REFERENCES `Client` (`clientID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Client`
--

DROP TABLE IF EXISTS `Client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Client` (
  `clientID` int(11) NOT NULL,
  `birthDay` date DEFAULT NULL,
  `gender` binary(1) DEFAULT NULL,
  PRIMARY KEY (`clientID`),
  CONSTRAINT `fk_Client_1` FOREIGN KEY (`clientID`) REFERENCES `User` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Client_Interests`
--

DROP TABLE IF EXISTS `Client_Interests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Client_Interests` (
  `clientID` int(11) NOT NULL,
  `interest` varchar(45) NOT NULL,
  PRIMARY KEY (`clientID`,`interest`),
  CONSTRAINT `fk_Client_Interests_1` FOREIGN KEY (`clientID`) REFERENCES `Client` (`clientID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Client_Preferences`
--

DROP TABLE IF EXISTS `Client_Preferences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Client_Preferences` (
  `clientId` int(11) NOT NULL,
  `preference` varchar(45) NOT NULL,
  PRIMARY KEY (`clientId`,`preference`),
  CONSTRAINT `fk_Client_Preferences_1` FOREIGN KEY (`clientId`) REFERENCES `Client` (`clientID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Coupon`
--

DROP TABLE IF EXISTS `Coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Coupon` (
  `couponID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `category` varchar(45) NOT NULL,
  `offeredQuantity` int(11) NOT NULL,
  `quantitySold` int(10) unsigned zerofill NOT NULL,
  `discountPrice` double NOT NULL,
  `oroginalPrice` double NOT NULL,
  `experationDate` date NOT NULL,
  `rating` double unsigned zerofill NOT NULL,
  `numOfRatings` int(10) unsigned zerofill NOT NULL,
  `businessID` int(11) NOT NULL,
  PRIMARY KEY (`couponID`),
  KEY `fk_Coupon_Business_idx` (`businessID`),
  CONSTRAINT `fk_Coupon_Business` FOREIGN KEY (`businessID`) REFERENCES `Business` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Deal`
--

DROP TABLE IF EXISTS `Deal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Deal` (
  `serialNumber` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `isRealized` bit(1) NOT NULL,
  `couponID` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  PRIMARY KEY (`serialNumber`),
  KEY `fk_Deal_Client_idx` (`clientID`),
  KEY `fk_Deal_Coupon_idx` (`couponID`),
  CONSTRAINT `fk_Deal_Client` FOREIGN KEY (`clientID`) REFERENCES `Client` (`clientID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Deal_Coupon` FOREIGN KEY (`couponID`) REFERENCES `Coupon` (`couponID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phoneNumber` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-12 12:20:15
