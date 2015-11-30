CREATE DATABASE  IF NOT EXISTS `throckmorton_finalproject` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `throckmorton_finalproject`;
-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: throckmorton_finalproject
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Table structure for table `beer`
--

DROP TABLE IF EXISTS `beer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beer` (
  `beer_id` int(11) NOT NULL AUTO_INCREMENT,
  `beverage_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `brewery` text,
  PRIMARY KEY (`beer_id`),
  KEY `beverage_id` (`beverage_id`),
  KEY `type_id` (`type_id`),
  CONSTRAINT `beer_ibfk_1` FOREIGN KEY (`beverage_id`) REFERENCES `beverages` (`beverage_id`),
  CONSTRAINT `beer_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `beverage_type_exp` (`beverage_exp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beer`
--

LOCK TABLES `beer` WRITE;
/*!40000 ALTER TABLE `beer` DISABLE KEYS */;
/*!40000 ALTER TABLE `beer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beverage_comments`
--

DROP TABLE IF EXISTS `beverage_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beverage_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `beverage_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_descrip` text NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `user_id` (`user_id`),
  KEY `beverage_id` (`beverage_id`),
  CONSTRAINT `beverage_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `beverage_comments_ibfk_2` FOREIGN KEY (`beverage_id`) REFERENCES `beverages` (`beverage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beverage_comments`
--

LOCK TABLES `beverage_comments` WRITE;
/*!40000 ALTER TABLE `beverage_comments` DISABLE KEYS */;
INSERT INTO `beverage_comments` VALUES (1,2,2,'Only beer I drink. Ever.');
/*!40000 ALTER TABLE `beverage_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beverage_ratings`
--

DROP TABLE IF EXISTS `beverage_ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beverage_ratings` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `beverage_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`rating_id`),
  KEY `user_id` (`user_id`),
  KEY `beverage_id` (`beverage_id`),
  CONSTRAINT `beverage_ratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `beverage_ratings_ibfk_2` FOREIGN KEY (`beverage_id`) REFERENCES `beverages` (`beverage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beverage_ratings`
--

LOCK TABLES `beverage_ratings` WRITE;
/*!40000 ALTER TABLE `beverage_ratings` DISABLE KEYS */;
INSERT INTO `beverage_ratings` VALUES (1,1,1,4),(2,2,2,5),(3,1,2,3);
/*!40000 ALTER TABLE `beverage_ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beverage_type`
--

DROP TABLE IF EXISTS `beverage_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beverage_type` (
  `beverage_id` int(11) NOT NULL AUTO_INCREMENT,
  `beverage_name` text NOT NULL,
  PRIMARY KEY (`beverage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beverage_type`
--

LOCK TABLES `beverage_type` WRITE;
/*!40000 ALTER TABLE `beverage_type` DISABLE KEYS */;
INSERT INTO `beverage_type` VALUES (1,'Wine'),(2,'Beer'),(3,'Mixed Drink');
/*!40000 ALTER TABLE `beverage_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beverage_type_exp`
--

DROP TABLE IF EXISTS `beverage_type_exp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beverage_type_exp` (
  `beverage_exp_id` int(11) NOT NULL AUTO_INCREMENT,
  `beverage_id` int(11) NOT NULL,
  `beverage_type` text NOT NULL,
  PRIMARY KEY (`beverage_exp_id`),
  KEY `beverage_id` (`beverage_id`),
  CONSTRAINT `beverage_type_exp_ibfk_1` FOREIGN KEY (`beverage_id`) REFERENCES `beverage_type` (`beverage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beverage_type_exp`
--

LOCK TABLES `beverage_type_exp` WRITE;
/*!40000 ALTER TABLE `beverage_type_exp` DISABLE KEYS */;
/*!40000 ALTER TABLE `beverage_type_exp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beverages`
--

DROP TABLE IF EXISTS `beverages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beverages` (
  `beverage_id` int(11) NOT NULL AUTO_INCREMENT,
  `beverage_type` int(11) NOT NULL,
  `beverage_name` text NOT NULL,
  `beverage_descrip` text NOT NULL,
  PRIMARY KEY (`beverage_id`),
  KEY `beverage_type` (`beverage_type`),
  CONSTRAINT `beverages_ibfk_1` FOREIGN KEY (`beverage_type`) REFERENCES `beverage_type` (`beverage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beverages`
--

LOCK TABLES `beverages` WRITE;
/*!40000 ALTER TABLE `beverages` DISABLE KEYS */;
INSERT INTO `beverages` VALUES (1,2,'Sam Adams','What else?'),(2,2,'Corona Light','Best light beer in the world.');
/*!40000 ALTER TABLE `beverages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mixed_drink`
--

DROP TABLE IF EXISTS `mixed_drink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mixed_drink` (
  `drink_id` int(11) NOT NULL AUTO_INCREMENT,
  `beverage_id` int(11) NOT NULL,
  `ingredients` text NOT NULL,
  PRIMARY KEY (`drink_id`),
  KEY `beverage_id` (`beverage_id`),
  CONSTRAINT `mixed_drink_ibfk_1` FOREIGN KEY (`beverage_id`) REFERENCES `beverages` (`beverage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mixed_drink`
--

LOCK TABLES `mixed_drink` WRITE;
/*!40000 ALTER TABLE `mixed_drink` DISABLE KEYS */;
/*!40000 ALTER TABLE `mixed_drink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` text NOT NULL,
  `user_mname` text,
  `user_lname` text NOT NULL,
  `user_email` text NOT NULL,
  `user_phone` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Tyler','Martin','Throckmorton','tylerthrock95@gmail.com','5139673116'),(2,'Robin',NULL,'Throckmorton','robin@strategichrinc.com','5136979855');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wine`
--

DROP TABLE IF EXISTS `wine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wine` (
  `wine_id` int(11) NOT NULL AUTO_INCREMENT,
  `beverage_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `vintage` int(11) DEFAULT NULL,
  `vinery` text,
  PRIMARY KEY (`wine_id`),
  KEY `beverage_id` (`beverage_id`),
  KEY `color_id` (`color_id`),
  KEY `type_id` (`type_id`),
  CONSTRAINT `wine_ibfk_1` FOREIGN KEY (`beverage_id`) REFERENCES `beverages` (`beverage_id`),
  CONSTRAINT `wine_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `wine_color` (`wine_id`),
  CONSTRAINT `wine_ibfk_3` FOREIGN KEY (`type_id`) REFERENCES `beverage_type_exp` (`beverage_exp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wine`
--

LOCK TABLES `wine` WRITE;
/*!40000 ALTER TABLE `wine` DISABLE KEYS */;
/*!40000 ALTER TABLE `wine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wine_color`
--

DROP TABLE IF EXISTS `wine_color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wine_color` (
  `wine_id` int(11) NOT NULL AUTO_INCREMENT,
  `color` text NOT NULL,
  PRIMARY KEY (`wine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wine_color`
--

LOCK TABLES `wine_color` WRITE;
/*!40000 ALTER TABLE `wine_color` DISABLE KEYS */;
/*!40000 ALTER TABLE `wine_color` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-24 15:25:55
