CREATE DATABASE  IF NOT EXISTS `reunioncs` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `reunioncs`;
-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: localhost    Database: reunioncs
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `academias`
--

DROP TABLE IF EXISTS `academias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `academias` (
  `id_academia` int(11) NOT NULL,
  `academiascol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_academia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academias`
--

LOCK TABLES `academias` WRITE;
/*!40000 ALTER TABLE `academias` DISABLE KEYS */;
INSERT INTO `academias` VALUES (1,'Ciencias sociales');
/*!40000 ALTER TABLE `academias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estatus_reunion`
--

DROP TABLE IF EXISTS `estatus_reunion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `estatus_reunion` (
  `id_estatus_reunion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_estatus_reunion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estatus_reunion`
--

LOCK TABLES `estatus_reunion` WRITE;
/*!40000 ALTER TABLE `estatus_reunion` DISABLE KEYS */;
INSERT INTO `estatus_reunion` VALUES (1,'Activa'),(2,'Cancelada');
/*!40000 ALTER TABLE `estatus_reunion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jefes_academia`
--

DROP TABLE IF EXISTS `jefes_academia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `jefes_academia` (
  `id_jefe_academia` int(11) NOT NULL AUTO_INCREMENT,
  `fk_maestro` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jefe_academia`),
  KEY `fk_jefes_academia_maestros1_idx` (`fk_maestro`),
  CONSTRAINT `fk_jefes_academia_maestros1` FOREIGN KEY (`fk_maestro`) REFERENCES `maestros` (`id_maestro`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jefes_academia`
--

LOCK TABLES `jefes_academia` WRITE;
/*!40000 ALTER TABLE `jefes_academia` DISABLE KEYS */;
INSERT INTO `jefes_academia` VALUES (1,1);
/*!40000 ALTER TABLE `jefes_academia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lugar`
--

DROP TABLE IF EXISTS `lugar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `lugar` (
  `lugar_id` int(11) NOT NULL,
  `lugar_nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`lugar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lugar`
--

LOCK TABLES `lugar` WRITE;
/*!40000 ALTER TABLE `lugar` DISABLE KEYS */;
INSERT INTO `lugar` VALUES (1,'Sala 14 \"Eduardo Torrijos\"');
/*!40000 ALTER TABLE `lugar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maestros`
--

DROP TABLE IF EXISTS `maestros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `maestros` (
  `id_maestro` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `fk_academia` int(11) NOT NULL,
  `correo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_maestro`),
  KEY `fk_maestros_academias1_idx` (`fk_academia`),
  CONSTRAINT `fk_maestros_academias1` FOREIGN KEY (`fk_academia`) REFERENCES `academias` (`id_academia`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maestros`
--

LOCK TABLES `maestros` WRITE;
/*!40000 ALTER TABLE `maestros` DISABLE KEYS */;
INSERT INTO `maestros` VALUES (1,'Honorato Perez',1,'rodolpotter@gmail.com');
/*!40000 ALTER TABLE `maestros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reunion`
--

DROP TABLE IF EXISTS `reunion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `reunion` (
  `id_reunion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `fk_tipo` int(11) DEFAULT NULL,
  `fk_estatus` int(11) DEFAULT NULL,
  `fk_academia` int(11) DEFAULT NULL,
  `fk_lugar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_reunion`),
  KEY `fk_reunion_tipo_reunion1_idx` (`fk_tipo`),
  KEY `fk_reunion_estatus_reunion1_idx` (`fk_estatus`),
  KEY `fk_reunion_academias1_idx` (`fk_academia`),
  KEY `fk_reunion_lugar_idx` (`fk_lugar`),
  CONSTRAINT `fk_reunion_academias1` FOREIGN KEY (`fk_academia`) REFERENCES `academias` (`id_academia`) ON UPDATE CASCADE,
  CONSTRAINT `fk_reunion_estatus_reunion1` FOREIGN KEY (`fk_estatus`) REFERENCES `estatus_reunion` (`id_estatus_reunion`) ON UPDATE CASCADE,
  CONSTRAINT `fk_reunion_lugar` FOREIGN KEY (`fk_lugar`) REFERENCES `lugar` (`lugar_id`),
  CONSTRAINT `fk_reunion_tipo_reunion1` FOREIGN KEY (`fk_tipo`) REFERENCES `tipo_reunion` (`id_tipo_reunion`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reunion`
--

LOCK TABLES `reunion` WRITE;
/*!40000 ALTER TABLE `reunion` DISABLE KEYS */;
INSERT INTO `reunion` VALUES (1,'2019-06-12 09:25:00',1,1,1,1),(2,'2019-05-30 18:10:00',1,2,1,1),(3,'2019-06-27 13:00:00',1,2,1,1),(4,'2019-06-11 13:00:00',1,1,1,1),(5,'2019-05-30 13:00:00',1,1,1,1),(6,'2019-06-17 14:00:00',2,1,1,1),(7,'2019-06-12 14:30:00',2,1,1,1);
/*!40000 ALTER TABLE `reunion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reunion_has_maestros`
--

DROP TABLE IF EXISTS `reunion_has_maestros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `reunion_has_maestros` (
  `reunion_has_maestros_id` int(11) NOT NULL AUTO_INCREMENT,
  `reunion_id_reunion` int(11) DEFAULT NULL,
  `maestros_id_maestro` int(11) DEFAULT NULL,
  PRIMARY KEY (`reunion_has_maestros_id`),
  KEY `fk_reunion_has_maestros_maestros1_idx` (`maestros_id_maestro`),
  KEY `fk_reunion_has_maestros_reunion_idx` (`reunion_id_reunion`),
  CONSTRAINT `fk_reunion_has_maestros_maestros1` FOREIGN KEY (`maestros_id_maestro`) REFERENCES `maestros` (`id_maestro`) ON UPDATE CASCADE,
  CONSTRAINT `fk_reunion_has_maestros_reunion` FOREIGN KEY (`reunion_id_reunion`) REFERENCES `reunion` (`id_reunion`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reunion_has_maestros`
--

LOCK TABLES `reunion_has_maestros` WRITE;
/*!40000 ALTER TABLE `reunion_has_maestros` DISABLE KEYS */;
INSERT INTO `reunion_has_maestros` VALUES (1,1,1);
/*!40000 ALTER TABLE `reunion_has_maestros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_reunion`
--

DROP TABLE IF EXISTS `tipo_reunion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tipo_reunion` (
  `id_tipo_reunion` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_reunion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_reunion`
--

LOCK TABLES `tipo_reunion` WRITE;
/*!40000 ALTER TABLE `tipo_reunion` DISABLE KEYS */;
INSERT INTO `tipo_reunion` VALUES (1,'Ordinaria'),(2,'Extraordinaria');
/*!40000 ALTER TABLE `tipo_reunion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-31 20:20:06
