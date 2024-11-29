-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: tever
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionarios` (
  `cod_fun` int NOT NULL AUTO_INCREMENT,
  `nome_fun` varchar(45) NOT NULL,
  `cpf_fun` varchar(11) NOT NULL,
  `usuario_fun` varchar(45) NOT NULL,
  `senha_fun` varchar(45) NOT NULL,
  `telefone_fun` varchar(11) NOT NULL,
  `salario_fun` decimal(9,2) NOT NULL,
  `endereco_fun` varchar(45) NOT NULL,
  `data_nasc_fun` varchar(45) NOT NULL,
  `email_fun` varchar(45) NOT NULL,
  `status_fun` varchar(45) NOT NULL,
  `funcao_fun` varchar(45) NOT NULL,
  PRIMARY KEY (`cod_fun`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionarios`
--

LOCK TABLES `funcionarios` WRITE;
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
INSERT INTO `funcionarios` VALUES (1,'matheus','11122233344','admin','1','11988880000',7000.50,'Rua do Cachorro','03/08/2000','matheus@example.com','ativo','administrador'),(2,'bruno','11122233355','brune','1','11998880000',1500.50,'Rua do Cavalo','2024-11-04','bruno@example.com','inativo','estoquista'),(3,'ana','11122233366','ana','1','11988888000',1600.21,'Rua da Onça','2024-11-05','ana@example.com','ativo','vendedor'),(4,'lais','00968458130','lala','1','61985951557',2050.00,'Rua Avião','2024-11-13','lais@example.com','ativo','estoquista'),(5,'urso','65877411237','urse','1','61985951558',5000.00,'Rua Trufa','2024-11-06','urso@example.com','ativo','vendedor');
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `televisores`
--

DROP TABLE IF EXISTS `televisores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `televisores` (
  `cod_tel` int NOT NULL AUTO_INCREMENT,
  `marca_tel` varchar(45) NOT NULL,
  `modelo_tel` varchar(45) NOT NULL,
  `preco_tel` decimal(9,2) NOT NULL,
  `resolucao_tel` varchar(10) NOT NULL,
  `conectividade_tel` varchar(45) NOT NULL,
  `streaming_tel` char(1) NOT NULL,
  `fila_compra_tel` char(1) NOT NULL,
  `vendas_cod_venda` int NOT NULL,
  PRIMARY KEY (`cod_tel`),
  KEY `fk_televisores_vendas1_idx` (`vendas_cod_venda`),
  CONSTRAINT `fk_televisores_vendas1` FOREIGN KEY (`vendas_cod_venda`) REFERENCES `vendas` (`cod_venda`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `televisores`
--

LOCK TABLES `televisores` WRITE;
/*!40000 ALTER TABLE `televisores` DISABLE KEYS */;
INSERT INTO `televisores` VALUES (3,'Semp','Smart TV 50',1976.50,'4K UHD','Wi-Fi','S','N',1),(4,'TCL','Smart TV 32\"',1044.00,'Full HD','Wi-Fi - Bluetooth','S','S',14),(5,'Philco','TV Digital 24\"',930.00,'HD','Não','N','N',1),(6,'LG','Smart TV 32\"',1253.66,'HD LED','Wi-Fi - Bluetooth','S','N',1),(7,'Samsung','Smart TV 50\"',2280.00,'4K UHD','Wi-Fi','S','N',1),(9,'Samsung','Smart TV 58',2649.00,'4K UHD','Wi-Fi - Bluetooth','S','S',14);
/*!40000 ALTER TABLE `televisores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendas`
--

DROP TABLE IF EXISTS `vendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendas` (
  `cod_venda` int NOT NULL AUTO_INCREMENT,
  `data_venda` varchar(45) NOT NULL,
  `funcionarios_cod_fun` int NOT NULL,
  PRIMARY KEY (`cod_venda`),
  KEY `fk_vendas_funcionarios_idx` (`funcionarios_cod_fun`),
  CONSTRAINT `fk_vendas_funcionarios` FOREIGN KEY (`funcionarios_cod_fun`) REFERENCES `funcionarios` (`cod_fun`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendas`
--

LOCK TABLES `vendas` WRITE;
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
INSERT INTO `vendas` VALUES (1,'00-00-0000',1),(2,'29/11/2024',1),(3,'29/11/2024',1),(4,'29/11/2024',1),(5,'29/11/2024',1),(6,'29/11/2024',1),(7,'29/11/2024',1),(8,'29/11/2024',1),(9,'29/11/2024',1),(10,'29/11/2024',1),(11,'29/11/2024',1),(12,'29/11/2024',1),(13,'29/11/2024',1),(14,'29/11/2024',1);
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-29  0:28:57
