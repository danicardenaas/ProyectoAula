-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: prueba1
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
-- Table structure for table `act_entrega`
--

DROP TABLE IF EXISTS `act_entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `act_entrega` (
  `ID_act_entrega` int(11) NOT NULL AUTO_INCREMENT,
  `ID_actividad` int(11) NOT NULL,
  `calif` decimal(3,1) DEFAULT NULL,
  `ruta_archivos` varchar(1000) DEFAULT NULL,
  `ruta_links` varchar(1000) DEFAULT NULL,
  `texto_tarea` text DEFAULT NULL,
  `fecha_entr` datetime NOT NULL,
  `ID_usuario` int(11) NOT NULL,
  PRIMARY KEY (`ID_act_entrega`),
  KEY `ID_actividad` (`ID_actividad`),
  KEY `ID_usuario` (`ID_usuario`),
  CONSTRAINT `act_entrega_ibfk_1` FOREIGN KEY (`ID_actividad`) REFERENCES `actividad` (`ID_actividad`),
  CONSTRAINT `act_entrega_ibfk_2` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `act_entrega`
--

LOCK TABLES `act_entrega` WRITE;
/*!40000 ALTER TABLE `act_entrega` DISABLE KEYS */;
/*!40000 ALTER TABLE `act_entrega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actividad`
--

DROP TABLE IF EXISTS `actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actividad` (
  `ID_actividad` int(11) NOT NULL AUTO_INCREMENT,
  `tema` char(100) NOT NULL,
  `nombre` char(100) NOT NULL,
  `indicaciones` text NOT NULL,
  `ruta_archivos` varchar(1000) DEFAULT NULL,
  `texto_tarea` text DEFAULT NULL,
  `fecha_pub` datetime NOT NULL,
  `ID_materia` int(11) NOT NULL,
  `ID_entrega` int(11) NOT NULL,
  `ruta_rubrica` varchar(1000) DEFAULT NULL,
  `ID_juego` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_actividad`),
  KEY `ID_materia` (`ID_materia`),
  KEY `ID_entrega` (`ID_entrega`),
  KEY `ID_juego` (`ID_juego`),
  CONSTRAINT `ID_juego` FOREIGN KEY (`ID_juego`) REFERENCES `juego` (`ID_juego`),
  CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`ID_materia`) REFERENCES `materia` (`ID_materia`),
  CONSTRAINT `actividad_ibfk_2` FOREIGN KEY (`ID_entrega`) REFERENCES `tipoactividad` (`ID_entrega`)
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
-- Table structure for table `anuncio`
--

DROP TABLE IF EXISTS `anuncio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anuncio` (
  `ID_evento` int(11) NOT NULL AUTO_INCREMENT,
  `ruta_imagen` varchar(1000) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `descripcion` text NOT NULL,
  `ID_comunidad` int(11) NOT NULL,
  `ID_usuario` int(11) NOT NULL,
  PRIMARY KEY (`ID_evento`),
  KEY `ID_comunidad` (`ID_comunidad`),
  KEY `ID_usuario` (`ID_usuario`),
  CONSTRAINT `anuncio_ibfk_1` FOREIGN KEY (`ID_comunidad`) REFERENCES `tipocomunidad` (`ID_comunidad`),
  CONSTRAINT `anuncio_ibfk_2` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anuncio`
--

LOCK TABLES `anuncio` WRITE;
/*!40000 ALTER TABLE `anuncio` DISABLE KEYS */;
/*!40000 ALTER TABLE `anuncio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clasificaciones`
--

DROP TABLE IF EXISTS `clasificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clasificaciones` (
  `ID_clasificacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_clasificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clasificaciones`
--

LOCK TABLES `clasificaciones` WRITE;
/*!40000 ALTER TABLE `clasificaciones` DISABLE KEYS */;
INSERT INTO `clasificaciones` VALUES (1,'Lengua española'),(2,'Literatura Universal'),(3,'Matematicas'),(4,'Biología'),(5,'Historia Universal');
/*!40000 ALTER TABLE `clasificaciones` ENABLE KEYS */;
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
  `ID_usuario` int(11) NOT NULL,
  PRIMARY KEY (`ID_duda`),
  KEY `ID_usuario` (`ID_usuario`),
  CONSTRAINT `duda_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`)
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
-- Table structure for table `dudaresp`
--

DROP TABLE IF EXISTS `dudaresp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dudaresp` (
  `ID_dudaresp` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `fecha_pub` datetime NOT NULL,
  `ID_usuario` int(11) NOT NULL,
  `ID_duda` int(11) NOT NULL,
  PRIMARY KEY (`ID_dudaresp`),
  KEY `ID_usuario` (`ID_usuario`),
  KEY `ID_duda` (`ID_duda`),
  CONSTRAINT `dudaresp_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`),
  CONSTRAINT `dudaresp_ibfk_2` FOREIGN KEY (`ID_duda`) REFERENCES `duda` (`ID_duda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dudaresp`
--

LOCK TABLES `dudaresp` WRITE;
/*!40000 ALTER TABLE `dudaresp` DISABLE KEYS */;
/*!40000 ALTER TABLE `dudaresp` ENABLE KEYS */;
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
  `ruta_imagen` varchar(300) DEFAULT NULL,
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
-- Table structure for table `ghm`
--

DROP TABLE IF EXISTS `ghm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ghm` (
  `ID_GHM` tinyint(4) NOT NULL,
  `ID_grupo` int(11) NOT NULL,
  `ID_materia` int(11) NOT NULL,
  PRIMARY KEY (`ID_GHM`),
  KEY `ID_grupo` (`ID_grupo`),
  KEY `ID_materia` (`ID_materia`),
  CONSTRAINT `ghm_ibfk_1` FOREIGN KEY (`ID_grupo`) REFERENCES `grupo` (`ID_grupo`),
  CONSTRAINT `ghm_ibfk_2` FOREIGN KEY (`ID_materia`) REFERENCES `materia` (`ID_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ghm`
--



--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo` (
  `ID_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `seccion` char(5) DEFAULT NULL,
  `grupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `juego`
--

DROP TABLE IF EXISTS `juego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juego` (
  `ID_juego` int(11) NOT NULL AUTO_INCREMENT,
  `ID_pregunta` int(11) DEFAULT NULL,
  `ruta_imagen` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`ID_juego`),
  KEY `ID_pregunta` (`ID_pregunta`),
  CONSTRAINT `juego_ibfk_1` FOREIGN KEY (`ID_pregunta`) REFERENCES `preguntas` (`ID_pregunta`)
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
  `ID_materia` int(11) NOT NULL AUTO_INCREMENT,
  `nombreMateria` char(100) DEFAULT NULL,
  `ruta_imagen` varchar(1000) DEFAULT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_materia`),
  UNIQUE KEY `nombre` (`nombreMateria`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `mhc`
--

DROP TABLE IF EXISTS `mhc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mhc` (
  `ID_mhc` int(11) NOT NULL AUTO_INCREMENT,
  `ID_clasificacion` int(11) DEFAULT NULL,
  `ID_materia` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_mhc`),
  KEY `ID_clasificacion` (`ID_clasificacion`),
  KEY `ID_materia` (`ID_materia`),
  CONSTRAINT `mhc_ibfk_1` FOREIGN KEY (`ID_clasificacion`) REFERENCES `clasificaciones` (`ID_clasificacion`),
  CONSTRAINT `mhc_ibfk_2` FOREIGN KEY (`ID_materia`) REFERENCES `materia` (`ID_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `phc`
--

DROP TABLE IF EXISTS `phc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phc` (
  `ID_PHC` int(11) NOT NULL AUTO_INCREMENT,
  `ID_usuario` int(11) NOT NULL,
  `ID_materia` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PHC`),
  KEY `ID_usuario` (`ID_usuario`),
  KEY `ID_materia` (`ID_materia`),
  CONSTRAINT `phc_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`),
  CONSTRAINT `phc_ibfk_2` FOREIGN KEY (`ID_materia`) REFERENCES `materia` (`ID_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntas` (
  `ID_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` text NOT NULL,
  `ruta_imagen` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`ID_pregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas`
--

LOCK TABLES `preguntas` WRITE;
/*!40000 ALTER TABLE `preguntas` DISABLE KEYS */;
/*!40000 ALTER TABLE `preguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuestas` (
  `ID_respuestas` int(11) NOT NULL AUTO_INCREMENT,
  `ID_pregunta` int(11) NOT NULL,
  `verificador` tinyint(1) DEFAULT NULL,
  `respuesta` text DEFAULT NULL,
  PRIMARY KEY (`ID_respuestas`),
  KEY `ID_pregunta` (`ID_pregunta`),
  CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`ID_pregunta`) REFERENCES `preguntas` (`ID_pregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuestas`
--

LOCK TABLES `respuestas` WRITE;
/*!40000 ALTER TABLE `respuestas` DISABLE KEYS */;
/*!40000 ALTER TABLE `respuestas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoactividad`
--

DROP TABLE IF EXISTS `tipoactividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoactividad` (
  `ID_entrega` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` char(50) NOT NULL,
  PRIMARY KEY (`ID_entrega`),
  UNIQUE KEY `tipo` (`tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoactividad`
--

LOCK TABLES `tipoactividad` WRITE;
/*!40000 ALTER TABLE `tipoactividad` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipoactividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipocomunidad`
--

DROP TABLE IF EXISTS `tipocomunidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipocomunidad` (
  `ID_comunidad` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` char(100) NOT NULL,
  PRIMARY KEY (`ID_comunidad`),
  UNIQUE KEY `tipo` (`tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocomunidad`
--

LOCK TABLES `tipocomunidad` WRITE;
/*!40000 ALTER TABLE `tipocomunidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipocomunidad` ENABLE KEYS */;
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
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipousuario` (
  `ID_tipousuario` tinyint(4) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_tipousuario`),
  UNIQUE KEY `tipo_usuario` (`tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` VALUES (1,'estudiante'),(2,'profesor');
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uhg`
--

DROP TABLE IF EXISTS `uhg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uhg` (
  `ID_UHG` int(11) NOT NULL AUTO_INCREMENT,
  `Archivo` varchar(1000) DEFAULT NULL,
  `ID_usuario` int(11) NOT NULL,
  `ID_grupo` int(11) NOT NULL,
  PRIMARY KEY (`ID_UHG`),
  KEY `ID_usuario` (`ID_usuario`),
  KEY `ID_grupo` (`ID_grupo`),
  CONSTRAINT `uhg_ibfk_2` FOREIGN KEY (`ID_grupo`) REFERENCES `grupo` (`ID_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uhg`
--


--
-- Table structure for table `uhm`
--

DROP TABLE IF EXISTS `uhm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uhm` (
  `ID_UHM` int(11) NOT NULL AUTO_INCREMENT,
  `ID_usuario` int(11) DEFAULT NULL,
  `ID_materia` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_UHM`),
  KEY `ID_usuario` (`ID_usuario`),
  KEY `ID_materia` (`ID_materia`),
  CONSTRAINT `uhm_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`),
  CONSTRAINT `uhm_ibfk_2` FOREIGN KEY (`ID_materia`) REFERENCES `materia` (`ID_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `ID_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(100) NOT NULL,
  `apellidos` char(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(128) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `ID_tipousuario` tinyint(4) NOT NULL,
  `Archivo` varchar(500) DEFAULT NULL,
  `cuenta` varchar(100) NOT NULL,
  `sal` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_usuario`),
  UNIQUE KEY `correo` (`correo`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `telefono` (`telefono`),
  UNIQUE KEY `cuenta` (`cuenta`),
  KEY `ID_tipousuario` (`ID_tipousuario`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_tipousuario`) REFERENCES `tipousuario` (`ID_tipousuario`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `usuariohasevento`
--

DROP TABLE IF EXISTS `usuariohasevento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuariohasevento` (
  `ID_UHE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_evento` int(11) NOT NULL,
  `ID_usuario` int(11) NOT NULL,
  PRIMARY KEY (`ID_UHE`),
  KEY `ID_evento` (`ID_evento`),
  KEY `ID_usuario` (`ID_usuario`),
  CONSTRAINT `usuariohasevento_ibfk_1` FOREIGN KEY (`ID_evento`) REFERENCES `evento` (`ID_evento`),
  CONSTRAINT `usuariohasevento_ibfk_2` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariohasevento`
--

LOCK TABLES `usuariohasevento` WRITE;
/*!40000 ALTER TABLE `usuariohasevento` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuariohasevento` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-04  2:34:52
