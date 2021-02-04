-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: test_db
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Profile`
--

DROP TABLE IF EXISTS `Profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Profile` (
  `profileid` int NOT NULL AUTO_INCREMENT,
  `company` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `about_me` varchar(500) DEFAULT NULL,
  `photo` blob,
  `userid` int DEFAULT NULL,
  PRIMARY KEY (`profileid`),
  KEY `userid` (`userid`),
  CONSTRAINT `Profile_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `Users` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Profile`
--

LOCK TABLES `Profile` WRITE;
/*!40000 ALTER TABLE `Profile` DISABLE KEYS */;
INSERT INTO `Profile` VALUES (10,'Albedo','Student','ljlkjhkl;h\';k  hljkhouiagdhkasjgdasjdlgasiufay  a87d',_binary 'public/img/users/3683.jpg',23),(11,'~!!@#$%^&*(','~!!@#$%^&*(','~!!@#$%^&*(',NULL,25),(12,'asdasdsads$^^(&&(*&&^^%%$^!~@!#$%^&*()*^%$^$','','',NULL,26),(13,'','','',NULL,27);
/*!40000 ALTER TABLE `Profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Users` (
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `report_subject` varchar(255) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phone_number` bigint DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `userid` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES ('Bogdan','Kogdan','2021-01-09','asdsadasd asds asdgcxbx asdklsa hasd has dhlashdjah lkh asdjlh oi ','AS',14444444444,'log.lohuha@gmail.com',23),('maxlengthmaxlength','asdsad','2021-02-01','maxlengthmaxlengthmaxlengthmaxlengthmaxlengthmaxlengthmaxlengthmaxlengthmaxlengthmaxlengthmaxlengthmaxlemaxlengthmaxlengthmaxlengthmaxlengthmaxlengthmaxlengthmaxlengthmaxlengthmaxlengthmaxlengthmaxlengthmaxlengthmaxlengthmaxlen','AZ',23222222222,'sdawe@qwe.com',24),('asd','sdsd','2021-02-01','asdasdasdasdasdasdasdasdasdasdasdas/.=-/*-+<>?!@#$%%^^&*()__=```~~~~','AT',12313134123,'qwe@qwe.com',25),('asdasdsadasd','sadsadsad','2021-02-01','sadsadw12312sadsadsadsadsadsadsadsadsadsadsadsadsadsadsadsadsadsadsadsadsadsadsadsad~!@#&^*~&*%*%^*%&%*&^$$%$%$**%(())&*)_/*/*--+++++','AW',11111111111,'qwe@qwe.com',26),('dsadsadsadsdsacxcxc','dsasa','2021-02-03','asdasdsadsadasdsadsadsadsa235235353252535352 332 5 523 532 5 235 253 32552332 5 55223 523#######','AW',33333333333,'qwe@qwe.com',27);
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-04 14:04:04
