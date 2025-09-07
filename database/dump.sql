CREATE DATABASE  IF NOT EXISTS `db_biblio` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_biblio`;
-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: localhost    Database: db_biblio
-- ------------------------------------------------------
-- Server version	8.0.43

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_lendo`
--

DROP TABLE IF EXISTS `tbl_lendo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_lendo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `total_paginas` int NOT NULL,
  `pagina_atual` int DEFAULT '0',
  `progresso` decimal(5,2) DEFAULT '0.00',
  `capa` varchar(255) DEFAULT NULL,
  `comentario` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lendo`
--

LOCK TABLES `tbl_lendo` WRITE;
/*!40000 ALTER TABLE `tbl_lendo` DISABLE KEYS */;
INSERT INTO `tbl_lendo` VALUES (4,'Colegas de Quarto','Marina Basso','Romance',525,410,78.00,'../assets/uploads/capas/68a52f169838b_colegasdequarto.jpg','Um livro de romance perfeito para quem gosta de clichê.\r\nIncrível para quem gosta do famoso \"enemies to lovers\".');
/*!40000 ALTER TABLE `tbl_lendo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lido`
--

DROP TABLE IF EXISTS `tbl_lido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_lido` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `avaliacao` int DEFAULT NULL,
  `comentario` text,
  `capa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `tbl_lido_chk_1` CHECK (((`avaliacao` >= 0) and (`avaliacao` <= 5)))
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lido`
--

LOCK TABLES `tbl_lido` WRITE;
/*!40000 ALTER TABLE `tbl_lido` DISABLE KEYS */;
INSERT INTO `tbl_lido` VALUES (6,'O Código da Vinci','Dan Brown','Crime',5,'Um ótimo livro de suspense, crime, investigação, perfeito para quem gosta de mistério.\r\nA história se desenvolve bem sem problemas algum.','../assets/uploads/capas/68a52ed64acaf_ocodigodavinci.jpg'),(7,'Percy Jackson e o Ladrão de Raios','Rick Riordan','Fantasia',4,'Um bom livro de fantasia e ficção. Contém uma história original capaz de te fazer imaginar mundos malucos.','../assets/uploads/capas/68a52f951727d_PercyJackson1-TESTE.jpg');
/*!40000 ALTER TABLE `tbl_lido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_queroler`
--

DROP TABLE IF EXISTS `tbl_queroler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_queroler` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `capa` varchar(255) DEFAULT NULL,
  `comentario` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_queroler`
--

LOCK TABLES `tbl_queroler` WRITE;
/*!40000 ALTER TABLE `tbl_queroler` DISABLE KEYS */;
INSERT INTO `tbl_queroler` VALUES (3,'O Homem de Giz','C. J. Tudor','Terror','../assets/uploads/capas/68a52f54308d7_ohomem_de_giz.jpg','Me falaram que é um livro de terro/suspense muito bom, que te prende do começo ao fim.\r\nEspero gostar desse livro, confesso que minhas expectativas estão altas.'),(4,'Dom Casmurro','Machado de Assis','Romance/Ficção/História','../assets/uploads/capas/68a52fe79437e_domcasmurro.jpg','Um clássico que todos dizem que devo ler.\r\nSinto que será um pouco diferente por ser um livro antigo, mas estou ansiosa mesmo assim para saber como vai ser.');
/*!40000 ALTER TABLE `tbl_queroler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuarios`
--

LOCK TABLES `tbl_usuarios` WRITE;
/*!40000 ALTER TABLE `tbl_usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_biblio'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-07 20:41:12
