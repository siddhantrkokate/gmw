-- MySQL dump 10.13  Distrib 8.0.39, for Win64 (x86_64)
--
-- Host: localhost    Database: gmw
-- ------------------------------------------------------
-- Server version	8.0.39

drop database if exists gmw;

create database gmw;

use gmw;

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
-- Table structure for table `2841c1f4-3778`
--

DROP TABLE IF EXISTS `2841c1f4-3778`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `2841c1f4-3778` (
  `topicID` varchar(255) NOT NULL,
  `topicName` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `2841c1f4-3778`
--

LOCK TABLES `2841c1f4-3778` WRITE;
/*!40000 ALTER TABLE `2841c1f4-3778` DISABLE KEYS */;
/*!40000 ALTER TABLE `2841c1f4-3778` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `60125c7d-7547`
--

DROP TABLE IF EXISTS `60125c7d-7547`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `60125c7d-7547` (
  `topicID` varchar(255) NOT NULL,
  `topicName` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `60125c7d-7547`
--

LOCK TABLES `60125c7d-7547` WRITE;
/*!40000 ALTER TABLE `60125c7d-7547` DISABLE KEYS */;
INSERT INTO `60125c7d-7547` VALUES ('75571531-4939','Basics of Satellite Navigation','75571531-4939.pdf','');
/*!40000 ALTER TABLE `60125c7d-7547` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `62c3cfa0-9976`
--

DROP TABLE IF EXISTS `62c3cfa0-9976`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `62c3cfa0-9976` (
  `moduleID` text NOT NULL,
  `moduleName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `62c3cfa0-9976`
--

LOCK TABLES `62c3cfa0-9976` WRITE;
/*!40000 ALTER TABLE `62c3cfa0-9976` DISABLE KEYS */;
INSERT INTO `62c3cfa0-9976` VALUES ('8df94986-2697','Satellite Communication Systems'),('2841c1f4-3778','Earth Observation Satellites'),('60125c7d-7547','Satellite Navigation Systems'),('b2a1c122-2196','Satellite Propulsion and Power Systems');
/*!40000 ALTER TABLE `62c3cfa0-9976` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `8df94986-2697`
--

DROP TABLE IF EXISTS `8df94986-2697`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `8df94986-2697` (
  `topicID` varchar(255) NOT NULL,
  `topicName` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `8df94986-2697`
--

LOCK TABLES `8df94986-2697` WRITE;
/*!40000 ALTER TABLE `8df94986-2697` DISABLE KEYS */;
INSERT INTO `8df94986-2697` VALUES ('a446c34d-4330','Principles of Satellite Communication','a446c34d-4330.pdf','https://www.youtube.com/watch?v=hXa3bTcIGPU'),('d3faf202-5655','Satellite Orbits and Coverage','d3faf202-5655.pdf','https://www.youtube.com/watch?v=H-gaSnxP60A'),('00b41743-2455','Challenges in Satellite Communication','00b41743-2455.pdf','https://www.youtube.com/watch?v=6shTSs6teiY');
/*!40000 ALTER TABLE `8df94986-2697` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b2a1c122-2196`
--

DROP TABLE IF EXISTS `b2a1c122-2196`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `b2a1c122-2196` (
  `topicID` varchar(255) NOT NULL,
  `topicName` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b2a1c122-2196`
--

LOCK TABLES `b2a1c122-2196` WRITE;
/*!40000 ALTER TABLE `b2a1c122-2196` DISABLE KEYS */;
/*!40000 ALTER TABLE `b2a1c122-2196` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `content` (
  `content_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `likes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `learnmode`
--

DROP TABLE IF EXISTS `learnmode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `learnmode` (
  `contentID` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `userID` int NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contentLike` int NOT NULL,
  `contentViews` int NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `learnmode`
--

LOCK TABLES `learnmode` WRITE;
/*!40000 ALTER TABLE `learnmode` DISABLE KEYS */;
INSERT INTO `learnmode` VALUES ('62c3cfa0-9976',1,'Fundamentals of Satellite Technology','This mode provides a comprehensive overview of satellite technology, covering everything from basic concepts to advanced applications. It is designed for students and professionals interested in understanding how satellites work and their various uses in communication.','05:19','2024-08-26',0,1,'Public');
/*!40000 ALTER TABLE `learnmode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `likes` (
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contentID` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quickread`
--

DROP TABLE IF EXISTS `quickread`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quickread` (
  `contentID` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `userID` int NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contentLike` int NOT NULL,
  `contentViews` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quickread`
--

LOCK TABLES `quickread` WRITE;
/*!40000 ALTER TABLE `quickread` DISABLE KEYS */;
INSERT INTO `quickread` VALUES ('da1a4a6d-3358',1,'Impact of AI on Healthcare','Artificial Intelligence (AI) is significantly transforming the healthcare sector by providing enhanced diagnostic tools, personalized treatment plans, and efficient management systems','da1a4a6d-3358.pdf','https://www.youtube.com/watch?v=HPOpDq_yiLQ','05:16','2024-08-26','Public',0,5),('3ddfdcda-1358',1,'Blockchain Basics and Uses','Blockchain technology offers a decentralized, transparent, and secure method of recording transactions across various industries. By eliminating the need for intermediaries and enhancing security, blockchain is driving innovations in finance, supply chain management, and data integrity','3ddfdcda-1358.pdf','','05:19','2024-08-26','Public',0,0);
/*!40000 ALTER TABLE `quickread` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `report` (
  `reportID` int NOT NULL AUTO_INCREMENT,
  `contentID` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `complaint` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`reportID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reset`
--

DROP TABLE IF EXISTS `reset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reset` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reset`
--

LOCK TABLES `reset` WRITE;
/*!40000 ALTER TABLE `reset` DISABLE KEYS */;
INSERT INTO `reset` VALUES (1,'siddhantrkokate@gmail.com','255102');
/*!40000 ALTER TABLE `reset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `save`
--

DROP TABLE IF EXISTS `save`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `save` (
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contentID` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `save`
--

LOCK TABLES `save` WRITE;
/*!40000 ALTER TABLE `save` DISABLE KEYS */;
/*!40000 ALTER TABLE `save` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unified`
--

DROP TABLE IF EXISTS `unified`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unified` (
  `id` int NOT NULL AUTO_INCREMENT,
  `contentID` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unified`
--

LOCK TABLES `unified` WRITE;
/*!40000 ALTER TABLE `unified` DISABLE KEYS */;
INSERT INTO `unified` VALUES (20,'da1a4a6d-3358','quick'),(21,'3ddfdcda-1358','quick'),(22,'62c3cfa0-9976','learn');
/*!40000 ALTER TABLE `unified` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'siddhantrkokate@gmail.com','1234567890'),(2,'siddhantrkokate12@gmail.com','1234567890');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-26  5:26:55
