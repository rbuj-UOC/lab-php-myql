-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: estudis
-- ------------------------------------------------------
-- Server version	8.0.36

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
-- Current Database: `estudis`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `estudis` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `estudis`;

--
-- Table structure for table `estudi`
--

DROP TABLE IF EXISTS `estudi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudi` (
  `id_estudi` int NOT NULL,
  `nom_estudi` varchar(50) NOT NULL,
  `tipus` varchar(50) NOT NULL,
  PRIMARY KEY (`id_estudi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudi`
--

LOCK TABLES `estudi` WRITE;
/*!40000 ALTER TABLE `estudi` DISABLE KEYS */;
INSERT INTO `estudi` VALUES (1,'Multimèdia','Grau'),(2,'Informàtica','Grau'),(3,'Nutrició i Salut','Màster');
/*!40000 ALTER TABLE `estudi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiant`
--

DROP TABLE IF EXISTS `estudiant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudiant` (
  `id_estudiant` int NOT NULL AUTO_INCREMENT,
  `DNI` char(9) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `edat` int DEFAULT NULL,
  `id_estudi` int DEFAULT NULL,
  PRIMARY KEY (`id_estudiant`),
  KEY `id_estudi` (`id_estudi`),
  CONSTRAINT `estudiant_ibfk_1` FOREIGN KEY (`id_estudi`) REFERENCES `estudi` (`id_estudi`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiant`
--

LOCK TABLES `estudiant` WRITE;
/*!40000 ALTER TABLE `estudiant` DISABLE KEYS */;
INSERT INTO `estudiant` VALUES (1,'52111111A','Pere Pons Grau',21,1),(2,'52222222B','Joana Sauler Giménez',22,1),(3,'52333333C','Jaume Marinas Frías',24,2),(4,'52444444D','Laura Dot Aguilar',23,2),(5,'52555555E','Ricard Blanco Llobet',21,3);
/*!40000 ALTER TABLE `estudiant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `bdprova`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `bdprova` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `bdprova`;

--
-- Table structure for table `assignatura`
--

DROP TABLE IF EXISTS `assignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignatura` (
  `codi` char(5) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `credits` int DEFAULT NULL,
  PRIMARY KEY (`codi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignatura`
--

LOCK TABLES `assignatura` WRITE;
/*!40000 ALTER TABLE `assignatura` DISABLE KEYS */;
/*!40000 ALTER TABLE `assignatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursa`
--

DROP TABLE IF EXISTS `cursa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cursa` (
  `DNI` char(9) NOT NULL,
  `codi_assig` char(5) NOT NULL,
  `edat` int DEFAULT NULL,
  `id_estudi` int DEFAULT NULL,
  PRIMARY KEY (`DNI`,`codi_assig`),
  KEY `codi_assig` (`codi_assig`),
  CONSTRAINT `cursa_ibfk_1` FOREIGN KEY (`DNI`) REFERENCES `estudiant` (`DNI`),
  CONSTRAINT `cursa_ibfk_2` FOREIGN KEY (`codi_assig`) REFERENCES `assignatura` (`codi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursa`
--

LOCK TABLES `cursa` WRITE;
/*!40000 ALTER TABLE `cursa` DISABLE KEYS */;
/*!40000 ALTER TABLE `cursa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiant`
--

DROP TABLE IF EXISTS `estudiant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudiant` (
  `DNI` char(9) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `edat` int DEFAULT NULL,
  PRIMARY KEY (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiant`
--

LOCK TABLES `estudiant` WRITE;
/*!40000 ALTER TABLE `estudiant` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiant` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-22  9:40:29

CREATE USER IF NOT EXISTS 'uoc'@'%' IDENTIFIED BY 'password';
GRANT SELECT, INSERT, DELETE, UPDATE ON estudis.* TO 'uoc'@'%';
GRANT SELECT, INSERT, DELETE, UPDATE ON bdprova.* TO 'uoc'@'%';
