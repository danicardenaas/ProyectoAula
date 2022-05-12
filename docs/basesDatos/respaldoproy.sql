-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: proyectoaula
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `actividad`
--

DROP TABLE IF EXISTS `actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actividad` (
  `ID_actividad` int(11) NOT NULL AUTO_INCREMENT,
  `tema` char(100) NOT NULL,
  `calif` decimal(3,1) NOT NULL,
  `indicaciones` text NOT NULL,
  `archivos` varchar(1000) DEFAULT NULL,
  `fecha_pub` datetime NOT NULL,
  `fecha_entr` datetime NOT NULL,
  PRIMARY KEY (`ID_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad`
--

LOCK TABLES `actividad` WRITE;
/*!40000 ALTER TABLE `actividad` DISABLE KEYS */;
/*!40000 ALTER TABLE `actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `duda`
--

DROP TABLE IF EXISTS `duda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `duda` (
  `ID_duda` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `fecha_pub` datetime NOT NULL,
  PRIMARY KEY (`ID_duda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `duda`
--

LOCK TABLES `duda` WRITE;
/*!40000 ALTER TABLE `duda` DISABLE KEYS */;
/*!40000 ALTER TABLE `duda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `ID_evento` int(11) NOT NULL AUTO_INCREMENT,
  `ID_tipoevento` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`ID_evento`),
  KEY `ID_tipoevento` (`ID_tipoevento`),
  CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`ID_tipoevento`) REFERENCES `tipoevento` (`ID_tipoevento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo` (
  `ID_grupo` tinyint(4) NOT NULL,
  `archivo` varchar(1000) DEFAULT NULL,
  `ID_seccion` int(11) NOT NULL,
  `ID_materia` int(11) NOT NULL,
  PRIMARY KEY (`ID_grupo`),
  KEY `ID_seccion` (`ID_seccion`),
  KEY `ID_materia` (`ID_materia`),
  CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`ID_seccion`) REFERENCES `seccion` (`ID_seccion`),
  CONSTRAINT `grupo_ibfk_2` FOREIGN KEY (`ID_materia`) REFERENCES `materia` (`ID_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juego`
--

DROP TABLE IF EXISTS `juego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juego` (
  `ID_juego` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`ID_juego`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juego`
--

LOCK TABLES `juego` WRITE;
/*!40000 ALTER TABLE `juego` DISABLE KEYS */;
/*!40000 ALTER TABLE `juego` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia` (
  `ID_materia` int(11) NOT NULL,
  `nombre` char(100) NOT NULL,
  `ID_contenido` int(11) DEFAULT NULL,
  `ID_juego` int(11) DEFAULT NULL,
  `ID_actividad` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_materia`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `ID_contenido` (`ID_contenido`),
  KEY `ID_juego` (`ID_juego`),
  KEY `ID_actividad` (`ID_actividad`),
  CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`ID_contenido`) REFERENCES `materialestudio` (`ID_contenido`),
  CONSTRAINT `materia_ibfk_2` FOREIGN KEY (`ID_juego`) REFERENCES `juego` (`ID_juego`),
  CONSTRAINT `materia_ibfk_3` FOREIGN KEY (`ID_actividad`) REFERENCES `actividad` (`ID_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materialestudio`
--

DROP TABLE IF EXISTS `materialestudio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materialestudio` (
  `ID_contenido` int(11) NOT NULL AUTO_INCREMENT,
  `ID_tipomaterial` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_contenido`),
  KEY `ID_tipomaterial` (`ID_tipomaterial`),
  CONSTRAINT `materialestudio_ibfk_1` FOREIGN KEY (`ID_tipomaterial`) REFERENCES `tipomaterial` (`ID_tipomaterial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materialestudio`
--

LOCK TABLES `materialestudio` WRITE;
/*!40000 ALTER TABLE `materialestudio` DISABLE KEYS */;
/*!40000 ALTER TABLE `materialestudio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seccion`
--

DROP TABLE IF EXISTS `seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seccion` (
  `ID_seccion` int(11) NOT NULL,
  `letra` char(5) NOT NULL,
  PRIMARY KEY (`ID_seccion`),
  UNIQUE KEY `letra` (`letra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seccion`
--

LOCK TABLES `seccion` WRITE;
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `seccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoevento`
--

DROP TABLE IF EXISTS `tipoevento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoevento` (
  `ID_tipoevento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(50) NOT NULL,
  PRIMARY KEY (`ID_tipoevento`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoevento`
--

LOCK TABLES `tipoevento` WRITE;
/*!40000 ALTER TABLE `tipoevento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipoevento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipomaterial`
--

DROP TABLE IF EXISTS `tipomaterial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipomaterial` (
  `ID_tipomaterial` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` char(50) NOT NULL,
  PRIMARY KEY (`ID_tipomaterial`),
  UNIQUE KEY `tipo` (`tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipomaterial`
--

LOCK TABLES `tipomaterial` WRITE;
/*!40000 ALTER TABLE `tipomaterial` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipomaterial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipousuario` (
  `ID_tipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_us` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_tipousuario`),
  UNIQUE KEY `nombre_us` (`nombre_us`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `ID_usuario` varchar(20) NOT NULL,
  `nombre` char(100) NOT NULL,
  `apellidos` char(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(128) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `fecha_nac` datetime NOT NULL,
  `telefono` int(11) NOT NULL,
  `archivo` varchar(1000) DEFAULT NULL,
  `ID_tipousuario` int(11) NOT NULL,
  `ID_grupo` tinyint(4) NOT NULL,
  `ID_duda` int(11) DEFAULT NULL,
  `ID_evento` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_usuario`),
  UNIQUE KEY `correo` (`correo`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `telefono` (`telefono`),
  UNIQUE KEY `archivo` (`archivo`) USING HASH,
  KEY `ID_tipousuario` (`ID_tipousuario`),
  KEY `ID_grupo` (`ID_grupo`),
  KEY `ID_duda` (`ID_duda`),
  KEY `ID_evento` (`ID_evento`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_tipousuario`) REFERENCES `tipousuario` (`ID_tipousuario`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`ID_grupo`) REFERENCES `grupo` (`ID_grupo`),
  CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`ID_duda`) REFERENCES `duda` (`ID_duda`),
  CONSTRAINT `usuario_ibfk_4` FOREIGN KEY (`ID_evento`) REFERENCES `evento` (`ID_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-12  1:28:34
