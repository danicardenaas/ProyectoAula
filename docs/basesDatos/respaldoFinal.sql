-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: dudadani
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
  `fecha_entr` datetime NOT NULL,
  `ID_usuario` int(11) NOT NULL,
  `coment_alumno` text DEFAULT NULL,
  `coment_profe` text DEFAULT NULL,
  PRIMARY KEY (`ID_act_entrega`),
  KEY `ID_actividad` (`ID_actividad`),
  KEY `ID_usuario` (`ID_usuario`),
  CONSTRAINT `act_entrega_ibfk_1` FOREIGN KEY (`ID_actividad`) REFERENCES `actividad` (`ID_actividad`),
  CONSTRAINT `act_entrega_ibfk_2` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `act_entrega`
--

LOCK TABLES `act_entrega` WRITE;
/*!40000 ALTER TABLE `act_entrega` DISABLE KEYS */;
INSERT INTO `act_entrega` VALUES (81,5,1.0,'2022-06-07 12:03:47',21,NULL,'hola'),(82,5,NULL,'2022-06-07 12:03:57',21,NULL,NULL),(83,5,NULL,'2022-06-07 12:04:34',21,NULL,NULL),(84,5,NULL,'2022-06-07 12:04:51',21,NULL,NULL),(87,6,NULL,'2022-06-07 12:12:59',21,NULL,NULL),(97,1,10.0,'2022-06-07 12:48:49',21,NULL,'bien'),(99,2,8.0,'2022-06-07 12:50:01',21,'https://www.google.com/search?q=saber+si+una+cadena+contiene+una+palabra+javascript&rlz=1C1ONGR_esMX1008MX1008&oq=saber+si+una+cadna&aqs=chrome.3.69i57j0i13j0i13i30l4j0i22i30l4.5297j0j4&sourceid=chrome&ie=UTF-8','comentario'),(100,13,10.0,'2022-06-07 22:19:09',21,'unu','nuevo'),(101,6,NULL,'2022-06-09 11:57:56',20,'hola',NULL),(102,10,NULL,'2022-06-09 11:58:37',20,'hola',NULL),(107,13,10.0,'2022-06-09 12:12:35',20,'jaj','Bien'),(108,12,1.0,'2022-06-09 12:46:19',20,NULL,NULL),(109,12,10.0,'2022-06-09 12:47:34',20,NULL,NULL),(110,12,10.0,'2022-06-09 13:02:21',20,NULL,NULL),(111,12,0.0,'2022-06-09 13:02:43',20,NULL,NULL),(112,12,10.0,'2022-06-09 13:04:58',20,NULL,NULL);
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
  `fecha_pub` datetime NOT NULL,
  `ID_materia` int(11) NOT NULL,
  `ID_entrega` int(11) NOT NULL,
  `ruta_rubrica` varchar(1000) DEFAULT NULL,
  `ID_juego` int(11) DEFAULT NULL,
  `rubrica` text DEFAULT NULL,
  `fecha_limite` datetime DEFAULT NULL,
  `puntaje` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_actividad`),
  KEY `ID_materia` (`ID_materia`),
  KEY `ID_entrega` (`ID_entrega`),
  KEY `ID_juego` (`ID_juego`),
  CONSTRAINT `ID_juego` FOREIGN KEY (`ID_juego`) REFERENCES `juego` (`ID_juego`),
  CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`ID_materia`) REFERENCES `materia` (`ID_materia`),
  CONSTRAINT `actividad_ibfk_2` FOREIGN KEY (`ID_entrega`) REFERENCES `tipoactividad` (`ID_entrega`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad`
--

LOCK TABLES `actividad` WRITE;
/*!40000 ALTER TABLE `actividad` DISABLE KEYS */;
INSERT INTO `actividad` VALUES (1,'tema1','act1','indicacion1','2022-06-06 23:24:41',25,1,NULL,NULL,'rubrica1','2022-06-08 00:00:00',100),(2,'tema','titulo2','indicanci','2022-06-06 23:33:51',25,1,'',NULL,'','0000-00-00 00:00:00',10),(3,'tema','titulo2','indicanci','2022-06-06 23:33:56',25,1,'',NULL,'','0000-00-00 00:00:00',10),(4,'tema','titulo2','indicanci','2022-06-06 23:35:20',25,1,NULL,NULL,NULL,'0000-00-00 00:00:00',10),(5,'tema','titulo2','indicanci','2022-06-06 23:35:46',25,1,NULL,NULL,NULL,'2022-06-08 20:27:00',10),(6,'1','tiulo','1','2022-06-07 00:53:01',25,1,'../Imgs/actividad/rubrica/2022-06-02_tiulo_rubrica.png',NULL,'rub','2022-06-02 17:55:00',1),(7,'tema','act10','Yo quiero ','0000-00-00 00:00:00',25,1,'',NULL,'hola.jpj','2022-06-07 12:57:26',100),(8,'tema','act10','Yo quiero ','0000-00-00 00:00:00',25,1,'',NULL,'hola.jpj','2022-06-07 12:57:26',100),(9,'tema','act10','Yo quiero ','0000-00-00 00:00:00',25,1,'',NULL,'hola.jpj','2022-06-07 12:57:40',100),(10,'tema','act10','Yo quiero ','2022-06-07 12:59:07',25,1,'',NULL,'hola.jpj','2022-06-22 00:00:00',100),(11,'tema','act10','Yo quiero ','2022-06-07 12:59:09',25,1,'',NULL,'hola.jpj','2022-06-22 00:00:00',100),(12,'tema','act10','Yo quiero ','2022-06-07 13:00:40',25,1,'',NULL,'hola.jpj','2022-06-22 00:00:00',100),(13,'tema','act10','Yo quiero ','2022-06-07 13:01:01',25,1,'../Imgs/actividad/rubrica/2022-06-22_act10_rubrica.png',NULL,'hola.jpj','2022-06-22 00:00:00',100),(18,'','jajja','','2022-06-09 11:19:06',25,2,NULL,5,NULL,'2022-06-28 00:00:00',NULL),(19,'','Jueguin','','2022-06-09 11:21:32',25,2,NULL,6,NULL,'0010-01-01 00:00:00',NULL),(20,'','holis','','2022-06-09 11:22:01',25,2,NULL,7,NULL,'1111-10-10 00:00:00',NULL),(21,'','78','','2022-06-09 12:40:56',25,2,NULL,8,NULL,'0777-07-07 00:00:00',NULL),(22,'','78','','2022-06-09 12:40:56',25,2,NULL,9,NULL,'0777-07-07 00:00:00',NULL),(23,'','jj','','2022-06-09 12:41:51',25,2,NULL,10,NULL,'2022-07-06 00:00:00',NULL),(24,'','Juego','','2022-06-09 12:42:13',25,2,NULL,11,NULL,'2022-07-06 00:00:00',NULL),(25,'','Julieta','','2022-06-09 12:42:42',25,2,NULL,12,NULL,'2022-06-30 00:00:00',NULL);
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
-- Table structure for table `archivos`
--

DROP TABLE IF EXISTS `archivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivos` (
  `ID_archivo` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(100) DEFAULT NULL,
  `ID_actividad` int(11) DEFAULT NULL,
  `ID_tipoArch` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_archivo`),
  KEY `ID_actividad` (`ID_actividad`),
  KEY `ID_tipoArch` (`ID_tipoArch`),
  CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`ID_actividad`) REFERENCES `actividad` (`ID_actividad`),
  CONSTRAINT `archivos_ibfk_2` FOREIGN KEY (`ID_tipoArch`) REFERENCES `tipoarch` (`ID_tipoArch`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivos`
--

LOCK TABLES `archivos` WRITE;
/*!40000 ALTER TABLE `archivos` DISABLE KEYS */;
INSERT INTO `archivos` VALUES (1,'view-source:http://localhost/proyectoaula/templates/clase.php#',7,1),(2,'../Imgs/actividad/material/2022-06-22_act10_tema.pdf',7,2),(3,'view-source:http://localhost/proyectoaula/templates/clase.php#',8,1),(4,'../Imgs/actividad/material/2022-06-22_act10_tema.pdf',8,2),(5,'view-source:http://localhost/proyectoaula/templates/clase.php#',9,1),(6,'../Imgs/actividad/material/2022-06-22_act10_tema.pdf',9,2),(7,'view-source:http://localhost/proyectoaula/templates/clase.php#',10,1),(8,'../Imgs/actividad/material/2022-06-22_act10_tema.pdf',10,2),(9,'view-source:http://localhost/proyectoaula/templates/clase.php#',11,1),(10,'../Imgs/actividad/material/2022-06-22_act10_tema.pdf',11,2),(11,'view-source:http://localhost/proyectoaula/templates/clase.php#',12,1),(12,'../Imgs/actividad/material/2022-06-22_act10_tema.pdf',12,2),(13,'view-source:http://localhost/proyectoaula/templates/clase.php#',13,1),(14,'../Imgs/actividad/material/2022-06-22_act10_tema.pdf',13,2);
/*!40000 ALTER TABLE `archivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivos_entrega`
--

DROP TABLE IF EXISTS `archivos_entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivos_entrega` (
  `ID_Archivo_entrega` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(300) DEFAULT NULL,
  `ID_act_entrega` int(11) DEFAULT NULL,
  `ID_tipoarch` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_Archivo_entrega`),
  KEY `ID_act_entrega` (`ID_act_entrega`),
  KEY `ID_tipoarch` (`ID_tipoarch`),
  CONSTRAINT `archivos_entrega_ibfk_1` FOREIGN KEY (`ID_act_entrega`) REFERENCES `act_entrega` (`ID_act_entrega`),
  CONSTRAINT `archivos_entrega_ibfk_2` FOREIGN KEY (`ID_tipoarch`) REFERENCES `tipoarch` (`ID_tipoArch`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivos_entrega`
--

LOCK TABLES `archivos_entrega` WRITE;
/*!40000 ALTER TABLE `archivos_entrega` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivos_entrega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivostablon`
--

DROP TABLE IF EXISTS `archivostablon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivostablon` (
  `ID_archivosTablon` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(300) DEFAULT NULL,
  `ID_material` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_archivosTablon`),
  KEY `ID_material` (`ID_material`),
  CONSTRAINT `archivostablon_ibfk_1` FOREIGN KEY (`ID_material`) REFERENCES `material` (`ID_material`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivostablon`
--

LOCK TABLES `archivostablon` WRITE;
/*!40000 ALTER TABLE `archivostablon` DISABLE KEYS */;
INSERT INTO `archivostablon` VALUES (3,'../Imgs/tablon/_211400_tema.pdf',5),(4,'../Imgs/tablon/_211400_tema.pdf',6),(5,'../Imgs/tablon/_211400_tema.pdf',7),(6,'../Imgs/tablon/_211400_tema.pdf',8),(7,'../Imgs/tablon/_211400_tema.pdf',9),(8,'../Imgs/tablon/_211400_tema.docx',10),(9,'../Imgs/tablon/_211400_tema.pdf',10),(11,'../Imgs/tablon/_211400_Reinscripción.pdf',12);
/*!40000 ALTER TABLE `archivostablon` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=1610 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clasificaciones`
--

LOCK TABLES `clasificaciones` WRITE;
/*!40000 ALTER TABLE `clasificaciones` DISABLE KEYS */;
INSERT INTO `clasificaciones` VALUES (1,'Lengua española'),(2,'Literatura Universal'),(3,'Matematicas'),(4,'Biología'),(5,'Historia Universal'),(1400,'Matemáticas IV'),(1401,'Física III'),(1402,'Lengua Española'),(1403,'Historia Universal'),(1404,'Lógica'),(1405,'Geografía'),(1406,'Dibujo II'),(1407,'Lengua Extranjera Inglés IV'),(1408,'Lengua Extranjera Francés IV'),(1409,'Estética'),(1410,'Educación Física IV'),(1411,'Orientación Educativa IV'),(1412,'Informática'),(1500,'Matemáticas V'),(1501,'Química III'),(1502,'Biología IV'),(1503,'Educación para la Salud'),(1504,'Historia de México II'),(1505,'Etimologías Grecolatinas'),(1506,'Lengua Extranjera Inglés V'),(1507,'Lengua Extranjera Francés V'),(1508,'Lengua Extranjera Italiano I'),(1509,'Lengua Extranjera Alemán I'),(1510,'Lengua Extranjera Inglés I'),(1511,'Lengua Extranjera Francés I'),(1512,'Ética'),(1513,'Educación Física V'),(1514,'Estética'),(1515,'Orientación Educativa V'),(1516,'Literatura Universal'),(1601,'Derecho'),(1602,'Literatura Mex. e Iberoam.'),(1603,'Inglés VI'),(1604,'Francés VI'),(1605,'Alemán II'),(1606,'Italiano II'),(1607,'Inglés II'),(1608,'Francés II'),(1609,'Psicología');
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
  `ruta_img` varchar(300) DEFAULT NULL,
  `ID_tipoduda` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_duda`),
  KEY `ID_usuario` (`ID_usuario`),
  KEY `ID_tipoduda` (`ID_tipoduda`),
  CONSTRAINT `duda_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`),
  CONSTRAINT `duda_ibfk_2` FOREIGN KEY (`ID_tipoduda`) REFERENCES `tipoduda` (`ID_tipoduda`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `duda`
--

LOCK TABLES `duda` WRITE;
/*!40000 ALTER TABLE `duda` DISABLE KEYS */;
INSERT INTO `duda` VALUES (34,'holaa90','2022-06-09 10:14:48',21,'',1),(35,'10','2022-06-09 09:53:39',21,'',1),(36,'1','2022-06-09 03:05:32',21,'',1),(37,'1','2022-06-09 03:05:32',21,'',1),(38,'hola','2022-06-09 03:09:25',21,'',1),(39,'qq','2022-06-09 03:11:16',21,'',1),(40,'hola','2022-06-09 11:06:43',20,'',1),(41,'DUDA FRECUENTE ','2022-06-09 13:28:38',22,'',2);
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
  `ruta_img` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`ID_dudaresp`),
  KEY `ID_usuario` (`ID_usuario`),
  KEY `ID_duda` (`ID_duda`),
  CONSTRAINT `dudaresp_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`),
  CONSTRAINT `dudaresp_ibfk_2` FOREIGN KEY (`ID_duda`) REFERENCES `duda` (`ID_duda`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dudaresp`
--

LOCK TABLES `dudaresp` WRITE;
/*!40000 ALTER TABLE `dudaresp` DISABLE KEYS */;
INSERT INTO `dudaresp` VALUES (8,'siis000','2022-06-09 10:17:38',21,34,''),(9,'adios','2022-06-09 11:29:02',20,34,''),(10,'Frecuente','2022-06-09 13:28:47',22,41,'');
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
  `fecha` date DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `ruta_imagen` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`ID_evento`),
  KEY `ID_tipoevento` (`ID_tipoevento`),
  CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`ID_tipoevento`) REFERENCES `tipoevento` (`ID_tipoevento`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (1,1,'2022-07-01','es hoy',''),(14,1,'2022-06-07','MAÑANA',''),(15,1,'2022-06-10','Presentacion','');
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ghm`
--

DROP TABLE IF EXISTS `ghm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ghm` (
  `ID_GHM` int(11) NOT NULL AUTO_INCREMENT,
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

LOCK TABLES `ghm` WRITE;
/*!40000 ALTER TABLE `ghm` DISABLE KEYS */;
/*!40000 ALTER TABLE `ghm` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` VALUES (8,'A',401),(9,'B',401);
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
  `ruta_imagen` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`ID_juego`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juego`
--

LOCK TABLES `juego` WRITE;
/*!40000 ALTER TABLE `juego` DISABLE KEYS */;
INSERT INTO `juego` VALUES (1,'../Imgs/juegos/fondo.png'),(2,'../Imgs/juegos/fondo.png'),(3,'../Imgs/juegos/fondo.png'),(4,'../Imgs/juegos/fondo.png'),(5,'../Imgs/juegos/fondo.png'),(6,'../Imgs/juegos/fondo.png'),(7,'../Imgs/juegos/fondo.png'),(8,'../Imgs/juegos/fondo.png'),(9,'../Imgs/juegos/fondo.png'),(10,'../Imgs/juegos/fondo.png'),(11,'../Imgs/juegos/fondo.png'),(12,'../Imgs/juegos/fondo.png');
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` VALUES (25,'clasePrueba','../Imgs/ENP6.jpg',NULL),(26,'sipis','../Imgs/ENP6.jpg',NULL),(27,'sipis8','../Imgs/ENP6.jpg',NULL);
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `ID_material` int(11) NOT NULL AUTO_INCREMENT,
  `ID_usuario` int(11) DEFAULT NULL,
  `Likes` int(11) DEFAULT NULL,
  `ID_tipoMaterial` int(11) DEFAULT NULL,
  `ID_clasificacion` int(11) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Tema` varchar(100) DEFAULT NULL,
  `Unidad` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `reportado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_material`),
  KEY `ID_usuario` (`ID_usuario`),
  KEY `ID_tipoMaterial` (`ID_tipoMaterial`),
  KEY `ID_clasificacion` (`ID_clasificacion`),
  CONSTRAINT `material_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`),
  CONSTRAINT `material_ibfk_2` FOREIGN KEY (`ID_tipoMaterial`) REFERENCES `tipocontenido` (`ID_tipoMaterial`),
  CONSTRAINT `material_ibfk_3` FOREIGN KEY (`ID_clasificacion`) REFERENCES `clasificaciones` (`ID_clasificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES (1,21,0,1,1400,'g','tema',6,'2022-06-07 20:00:19',NULL),(2,21,0,1,1400,'g','tema',6,'2022-06-07 20:00:38',NULL),(3,21,0,1,1400,'g','tema',6,'2022-06-07 20:04:36',NULL),(4,21,0,1,1400,'g','tema',6,'2022-06-07 20:04:38',NULL),(5,21,0,1,1400,'g','tema',6,'2022-06-07 20:05:49',NULL),(6,21,0,1,1400,'g','tema',6,'2022-06-07 20:05:51',NULL),(7,21,0,1,1400,'g','tema',6,'2022-06-07 20:05:51',NULL),(8,21,0,1,1400,'g','tema',6,'2022-06-07 20:05:51',NULL),(9,21,0,1,1400,'g','tema',6,'2022-06-07 20:05:52',NULL),(10,21,0,1,1400,'g','tema',6,'2022-06-07 20:06:06',NULL),(12,21,1,1,1400,'Manual de reinscripción','Reinscripción',1,'2022-06-09 13:32:09',0);
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mhc`
--

LOCK TABLES `mhc` WRITE;
/*!40000 ALTER TABLE `mhc` DISABLE KEYS */;
INSERT INTO `mhc` VALUES (20,1,25),(21,1,26),(22,1,27);
/*!40000 ALTER TABLE `mhc` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phc`
--

LOCK TABLES `phc` WRITE;
/*!40000 ALTER TABLE `phc` DISABLE KEYS */;
INSERT INTO `phc` VALUES (23,20,25),(24,20,26),(25,20,27);
/*!40000 ALTER TABLE `phc` ENABLE KEYS */;
UNLOCK TABLES;

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
  `ID_juego` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_pregunta`),
  KEY `ID_juego` (`ID_juego`),
  CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`ID_juego`) REFERENCES `juego` (`ID_juego`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas`
--

LOCK TABLES `preguntas` WRITE;
/*!40000 ALTER TABLE `preguntas` DISABLE KEYS */;
INSERT INTO `preguntas` VALUES (1,'holaa','../Imgs/juegos/predeterminada.png',1),(2,'holaa','../Imgs/juegos/predeterminada.png',2),(3,'aa','../Imgs/juegos/predeterminada.png',4),(4,'aa','../Imgs/juegos/predeterminada.png',5),(5,'Que eres','../Imgs/juegos/predeterminada.png',6),(6,'Holiss','../Imgs/juegos/predeterminada.png',7),(7,'Hola?','../Imgs/juegos/predeterminada.png',11),(8,'Hola','../Imgs/juegos/predeterminada.png',12);
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuestas`
--

LOCK TABLES `respuestas` WRITE;
/*!40000 ALTER TABLE `respuestas` DISABLE KEYS */;
INSERT INTO `respuestas` VALUES (1,1,1,' '),(2,1,0,''),(3,1,0,' '),(4,2,1,' '),(5,2,0,''),(6,2,0,' '),(7,3,1,'aa '),(8,3,0,''),(9,3,0,' '),(10,4,1,'aa '),(11,4,0,''),(12,4,0,' '),(13,5,1,'no '),(14,5,0,'si'),(15,5,0,'duh '),(16,6,1,'Hola '),(17,6,0,''),(18,6,0,' '),(19,7,1,'si '),(20,7,0,'menos'),(21,7,0,'no '),(22,8,1,'Soy '),(23,8,0,'No'),(24,8,0,'Hoa ');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoactividad`
--

LOCK TABLES `tipoactividad` WRITE;
/*!40000 ALTER TABLE `tipoactividad` DISABLE KEYS */;
INSERT INTO `tipoactividad` VALUES (2,'juego'),(1,'Tarea');
/*!40000 ALTER TABLE `tipoactividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoarch`
--

DROP TABLE IF EXISTS `tipoarch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoarch` (
  `ID_tipoArch` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_tipoArch`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoarch`
--

LOCK TABLES `tipoarch` WRITE;
/*!40000 ALTER TABLE `tipoarch` DISABLE KEYS */;
INSERT INTO `tipoarch` VALUES (1,'link'),(2,'archivo');
/*!40000 ALTER TABLE `tipoarch` ENABLE KEYS */;
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
-- Table structure for table `tipocontenido`
--

DROP TABLE IF EXISTS `tipocontenido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipocontenido` (
  `ID_tipoMaterial` int(11) NOT NULL AUTO_INCREMENT,
  `nombreMat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_tipoMaterial`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocontenido`
--

LOCK TABLES `tipocontenido` WRITE;
/*!40000 ALTER TABLE `tipocontenido` DISABLE KEYS */;
INSERT INTO `tipocontenido` VALUES (1,'Apunte'),(2,'Libro'),(3,'Material de consulta'),(4,'Ensayo/Reporte'),(5,'Otro');
/*!40000 ALTER TABLE `tipocontenido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoduda`
--

DROP TABLE IF EXISTS `tipoduda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoduda` (
  `ID_tipoduda` int(11) NOT NULL,
  `nombre` char(50) NOT NULL,
  PRIMARY KEY (`ID_tipoduda`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoduda`
--

LOCK TABLES `tipoduda` WRITE;
/*!40000 ALTER TABLE `tipoduda` DISABLE KEYS */;
INSERT INTO `tipoduda` VALUES (2,'frecuente'),(1,'normal');
/*!40000 ALTER TABLE `tipoduda` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoevento`
--

LOCK TABLES `tipoevento` WRITE;
/*!40000 ALTER TABLE `tipoevento` DISABLE KEYS */;
INSERT INTO `tipoevento` VALUES (2,'ACADEMICO'),(1,'SOCIAL');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` VALUES (3,'administrador'),(1,'estudiante'),(4,'moderador'),(2,'profesor');
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uhg`
--

LOCK TABLES `uhg` WRITE;
/*!40000 ALTER TABLE `uhg` DISABLE KEYS */;
INSERT INTO `uhg` VALUES (18,NULL,20,8),(19,NULL,21,8);
/*!40000 ALTER TABLE `uhg` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uhm`
--

LOCK TABLES `uhm` WRITE;
/*!40000 ALTER TABLE `uhm` DISABLE KEYS */;
INSERT INTO `uhm` VALUES (49,20,25),(50,21,25),(51,20,26),(52,20,27);
/*!40000 ALTER TABLE `uhm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ulikesmaterial`
--

DROP TABLE IF EXISTS `ulikesmaterial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ulikesmaterial` (
  `ID_ULikesMaterial` int(11) NOT NULL AUTO_INCREMENT,
  `ID_usuario` int(11) NOT NULL,
  `ID_material` int(11) NOT NULL,
  PRIMARY KEY (`ID_ULikesMaterial`),
  KEY `ID_usuario` (`ID_usuario`),
  KEY `ID_material` (`ID_material`),
  CONSTRAINT `ulikesmaterial_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`),
  CONSTRAINT `ulikesmaterial_ibfk_2` FOREIGN KEY (`ID_material`) REFERENCES `material` (`ID_material`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ulikesmaterial`
--

LOCK TABLES `ulikesmaterial` WRITE;
/*!40000 ALTER TABLE `ulikesmaterial` DISABLE KEYS */;
INSERT INTO `ulikesmaterial` VALUES (1,21,12);
/*!40000 ALTER TABLE `ulikesmaterial` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (20,'Julieta Melina','Flores Morán','julietanilem@gmail.com9','f7451a35d1e83c02fff61af512c33caec8b215a2609d6efafba7a9f6413c51bd','Julieta','1010-10-10',4455667788,1,'../Imgs/usuario/desconocido.png','321088642','629e6eb62fe5e'),(21,'Julieta Melina','Flores Morán','julietanilem@gmail.com9A','7b91a4d6dde3ba1140edeb5ec87eb951c67f97d336c18d5e8987d1bbc983e2f2','A','2022-06-22',5554198424,3,'../Imgs/usuario/desconocido.png','321088641','629e91675791f'),(22,'Julieta Melina','Flores Morán','julietanilem@gmail.com978','054d8a0c035aaf31d25699caaabaf64d90ce5db7b200ad7e57170a21211edc35','MOD','0000-00-00',3209900933,4,'../Imgs/usuario/desconocido.png','','62a23a32def79');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariohasevento`
--

LOCK TABLES `usuariohasevento` WRITE;
/*!40000 ALTER TABLE `usuariohasevento` DISABLE KEYS */;
INSERT INTO `usuariohasevento` VALUES (1,1,21),(2,1,20),(3,1,21),(25,14,21),(26,14,20),(27,15,21),(28,15,20);
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

-- Dump completed on 2022-06-09 13:53:07
