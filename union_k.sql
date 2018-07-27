CREATE DATABASE  IF NOT EXISTS `union_k` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `union_k`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: union_k
-- ------------------------------------------------------
-- Server version	5.6.17-log

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
-- Table structure for table `rede_contador`
--

DROP TABLE IF EXISTS `rede_contador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rede_contador` (
  `id_contador` int(11) NOT NULL AUTO_INCREMENT,
  `contador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_contador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rede_contador`
--

LOCK TABLES `rede_contador` WRITE;
/*!40000 ALTER TABLE `rede_contador` DISABLE KEYS */;
INSERT INTO `rede_contador` VALUES (1,0);
/*!40000 ALTER TABLE `rede_contador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rede_publicacao_tipo`
--

DROP TABLE IF EXISTS `rede_publicacao_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rede_publicacao_tipo` (
  `id_publicacao_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `descricao` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_publicacao_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rede_publicacao_tipo`
--

LOCK TABLES `rede_publicacao_tipo` WRITE;
/*!40000 ALTER TABLE `rede_publicacao_tipo` DISABLE KEYS */;
INSERT INTO `rede_publicacao_tipo` VALUES (1,'VÍDEO',NULL),(2,'IMAGENS',NULL),(3,'SONS',NULL),(4,'LINKS',NULL),(5,'TEXTO',NULL),(6,'ARQUIVOS',NULL);
/*!40000 ALTER TABLE `rede_publicacao_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rede_publicacoes`
--

DROP TABLE IF EXISTS `rede_publicacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rede_publicacoes` (
  `id_publicacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_publicacao_tipo` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `titulo` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `descricao` text COLLATE latin1_general_ci,
  `tamanho` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `url` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `contador` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `arquivo` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_publicacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rede_publicacoes`
--

LOCK TABLES `rede_publicacoes` WRITE;
/*!40000 ALTER TABLE `rede_publicacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `rede_publicacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rede_usuarios`
--

DROP TABLE IF EXISTS `rede_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rede_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `celular` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `senha` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `lembrete_senha` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rede_usuarios`
--

LOCK TABLES `rede_usuarios` WRITE;
/*!40000 ALTER TABLE `rede_usuarios` DISABLE KEYS */;
INSERT INTO `rede_usuarios` VALUES (3,'admin','admin@admin',NULL,'d033e22ae348aeb5660fc2140aec35850c4da997',2,'admin');
/*!40000 ALTER TABLE `rede_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-26 23:02:00
