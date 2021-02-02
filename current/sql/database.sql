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
  `about_me` varchar(255) DEFAULT NULL,
  `photo` blob,
  `userid` int DEFAULT NULL,
  PRIMARY KEY (`profileid`),
  KEY `userid` (`userid`),
  CONSTRAINT `Profile_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `Users` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Profile`
--

LOCK TABLES `Profile` WRITE;
/*!40000 ALTER TABLE `Profile` DISABLE KEYS */;
INSERT INTO `Profile` VALUES (1,'sad','asd','asd',NULL,1),(2,'','','',NULL,5),(3,'sdf','sdf','sdf',_binary 'public/img/users/3683.jpg',12),(4,'dsad','asd','asd',_binary 'public/img/users/3683.jpg',14),(5,'','','',NULL,17),(6,'','','',NULL,19),(7,'asd','asd','asd',_binary 'public/img/users/3683.jpg',20),(8,'asd','asd','asd',NULL,21),(9,'asd','sad','asd',NULL,22);
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
  `report_subject` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phone_number` int DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `userid` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES ('sad','asd','2021-02-16','asd','asd',4123,'sdawe@qwe.com',1),('sadsa','asdas','2021-02-17','asd','asd',324123,'qwe@qwe.com',2),('sdasd','asd','2021-02-25','asd','asd',123,'sdawe@qwe.com',3),('sss','sss','2021-02-18','ff','ff',3424,'sdawe@qwe.com',4),('asd','asd','2021-02-10','asd','asd',23123112,'qwe@qwe.com',5),('sd','asd','2021-02-16','asd','zxcx',34234,'sdawe@qwe.com',6),('asd','asd','2021-02-26','asd','qwe',34213,'qwe@qwe.com',7),('asd','zxc','2021-02-17','asd','asd',34232,'qwe@qwe.com',8),('sad','sad','2021-02-16','hgfd','gfh',564,'qwe@qwe.com',9),('asd','asd','2021-02-25','asd','sad',3432,'sdawe@qwe.com',10),('hgjh','hgj','2021-02-14','hj','ghj',456544,'sdawe@qwe.com',11),('asd','vxc','2021-02-15','dsf','sdf',3423,'qwe@qwe.com',12),('asd','sad','2021-02-25','sad','saxc',123,'sdawe@qwe.com',13),('asd','asd','2021-02-19','sdf','aqwsd',234,'sdawe@qwe.com',14),('fd','xcvxc','2021-02-18','xcv','cxv',343234,'sdawe@qwe.com',15),('sadsad','zxcxzc','2021-02-17','asd','asasd',432432,'sdawe@qwe.com',16),('asd','asad','2021-02-06','sad','asd',324234,'qwe@qwe.com',17),('sad','xzczc','2021-02-17','asd','sad',324324,'sdawe@qwe.com',18),('czxcxzc','zxczxc','2021-02-12','zxc','ZXZ',34324234,'sdawe@qwe.com',19),('sad','xzczxc','2021-02-18','asdasd','adsa',343242,'sdawe@qwe.com',20),('asd','sad','2021-02-18','sdf','sdf',342432,'qwe@qwe.com',21),('asd','asd','2021-02-15','asd','sad',32432,'sdawe@qwe.com',22);
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

-- Dump completed on 2021-02-02 10:58:39
