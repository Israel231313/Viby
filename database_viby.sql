-- MySQL dump 10.13  Distrib 8.0.46, for Win64 (x86_64)
--
-- Host: localhost    Database: viby
-- ------------------------------------------------------
-- Server version	8.0.46

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
-- Table structure for table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agenda` (
  `id_agenda` int NOT NULL AUTO_INCREMENT,
  `id_estabelecimento` int NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `descricao` text,
  `data_evento` date NOT NULL,
  `horario_inicio` time DEFAULT NULL,
  `horario_fim` time DEFAULT NULL,
  PRIMARY KEY (`id_agenda`),
  KEY `id_estabelecimento` (`id_estabelecimento`),
  CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_estabelecimento`) REFERENCES `estabelecimento` (`id_estabelecimento`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda`
--

LOCK TABLES `agenda` WRITE;
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` VALUES (1,1,'Noite do Rock','Noite com clássicos do rock e música ao vivo.','2026-12-05','20:00:00','02:00:00'),(2,2,'Sábado de Pagode','Roda de pagode com música ao vivo.','2026-12-05','18:00:00','23:00:00'),(3,3,'Samba no Boteco','Tarde de samba e descontração.','2026-12-06','15:00:00','21:00:00'),(4,4,'Café Especial','Experiência com cafés especiais e degustação.','2026-12-08','14:00:00','17:00:00'),(5,5,'Reggae Night','Noite temática com música reggae.','2026-12-11','20:00:00','01:00:00'),(6,6,'Festival de Sabores','Evento gastronômico com pratos especiais.','2026-12-12','19:00:00','23:00:00'),(7,7,'Burger em Dobro','Promoção especial de hambúrgueres.','2026-12-13','18:00:00','22:00:00'),(8,8,'Noite Eletrônica','Festa com DJs e música eletrônica.','2026-12-19','22:00:00','04:00:00'),(9,9,'Funk na Monkey','Noite de funk com DJs convidados.','2026-12-20','22:00:00','04:00:00');
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caracteristica`
--

DROP TABLE IF EXISTS `caracteristica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `caracteristica` (
  `id_caracteristica` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` text,
  PRIMARY KEY (`id_caracteristica`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caracteristica`
--

LOCK TABLES `caracteristica` WRITE;
/*!40000 ALTER TABLE `caracteristica` DISABLE KEYS */;
INSERT INTO `caracteristica` VALUES (1,'Área de fumante','Espaço destinado a fumantes'),(2,'Estacionamento','Possui estacionamento'),(3,'Ar-condicionado','Ambiente climatizado'),(4,'Área externa','Possui espaço ao ar livre'),(5,'Espaço kids','Espaço destinado às crianças'),(6,'Aceita pets','Permite a entrada de animais de estimação'),(7,'Wi-Fi','Disponibiliza internet sem fio'),(8,'Acessibilidade','Possui estrutura acessível'),(9,'Espaço reservado','Possui ambiente reservado'),(10,'Vista panorâmica','Oferece vista panorâmica'),(11,'Vista para pôr do sol','Oferece uma vista privilegiada para apreciar o pôr do sol'),(12,'Música ao vivo',NULL);
/*!40000 ALTER TABLE `caracteristica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cardapio`
--

DROP TABLE IF EXISTS `cardapio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cardapio` (
  `id_cardapio` int NOT NULL AUTO_INCREMENT,
  `id_estabelecimento` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text,
  PRIMARY KEY (`id_cardapio`),
  KEY `id_estabelecimento` (`id_estabelecimento`),
  CONSTRAINT `cardapio_ibfk_1` FOREIGN KEY (`id_estabelecimento`) REFERENCES `estabelecimento` (`id_estabelecimento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cardapio`
--

LOCK TABLES `cardapio` WRITE;
/*!40000 ALTER TABLE `cardapio` DISABLE KEYS */;
/*!40000 ALTER TABLE `cardapio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` text,
  PRIMARY KEY (`id_categoria`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Bar','Estabelecimento que serve bebidas e petiscos'),(2,'Boteco','Ambiente descontraído com bebidas e comidas'),(3,'Restaurante','Estabelecimento especializado em refeições'),(4,'Hamburgueria','Especializado em hambúrgueres'),(5,'Pizzaria','Especializado em pizzas'),(6,'Cafeteria','Especializado em cafés e acompanhamentos'),(7,'Padaria','Venda de pães e produtos de panificação'),(8,'Balada','Estabelecimento voltado ao entretenimento noturno'),(9,'Casa noturna','Espaço de entretenimento e música'),(10,'Lounge','Ambiente de convivência e relaxamento');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `endereco` (
  `id_endereco` int NOT NULL AUTO_INCREMENT,
  `id_estabelecimento` int NOT NULL,
  `rua` varchar(150) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  PRIMARY KEY (`id_endereco`),
  KEY `id_estabelecimento` (`id_estabelecimento`),
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_estabelecimento`) REFERENCES `estabelecimento` (`id_estabelecimento`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,1,'Rua Balduíno Taques','1408','Centro','Ponta Grossa','Paraná',NULL,NULL,NULL),(2,2,'Rua Ermelino de Leão','1565','Olarias','Ponta Grossa','Paraná',NULL,NULL,NULL),(3,3,'Rua Visconde de Sinimbú','383','Órfãs','Ponta Grossa','Paraná',NULL,NULL,NULL),(4,4,'Rua Doutor Paula Xavier','977',NULL,'Ponta Grossa','Paraná',NULL,NULL,NULL),(5,5,'Rua Júlio de Castilhos','755','Centro','Ponta Grossa','Paraná',NULL,NULL,NULL),(6,6,'Rua Comendador Airton Plaisant','607','Centro','Ponta Grossa','Paraná',NULL,NULL,NULL),(7,7,'Rua Marechal Floriano Peixoto','34','Centro','Ponta Grossa','Paraná',NULL,NULL,NULL),(8,8,'Avenida Bonifácio Vilela','547','Centro','Ponta Grossa','Paraná',NULL,NULL,NULL),(9,9,'Avenida Bonifácio Vilela','546','Centro','Ponta Grossa','Paraná',NULL,NULL,NULL);
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estabelecimento`
--

DROP TABLE IF EXISTS `estabelecimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estabelecimento` (
  `id_estabelecimento` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `descricao` text,
  `email` varchar(150) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id_estabelecimento`),
  UNIQUE KEY `cnpj` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estabelecimento`
--

LOCK TABLES `estabelecimento` WRITE;
/*!40000 ALTER TABLE `estabelecimento` DISABLE KEYS */;
INSERT INTO `estabelecimento` VALUES (1,'Hangar 48','Estabelecimento de entretenimento com música, bebidas e eventos.',NULL,NULL,NULL,''),(2,'Boteco da Estação','Boteco descontraído com bebidas, petiscos e ambiente de convivência.',NULL,NULL,NULL,''),(3,'Boteco da Visconde','Boteco com ambiente descontraído e opções de bebidas e comidas.',NULL,NULL,NULL,''),(4,'Padá Padoca','Padaria com produtos de panificação, cafés e acompanhamentos.',NULL,NULL,NULL,''),(5,'Tabacabeça','Estabelecimento com ambiente de convivência e entretenimento.',NULL,NULL,NULL,''),(6,'Baiacu-Bö','Estabelecimento gastronômico com ambiente descontraído.',NULL,NULL,NULL,''),(7,'Letts Burger','Hamburgueria especializada em hambúrgueres e acompanhamentos.',NULL,NULL,NULL,''),(8,'CAVAN77','Estabelecimento de entretenimento com música, bebidas e gastronomia.',NULL,NULL,NULL,''),(9,'Monkey','Estabelecimento de entretenimento e convivência com bebidas e música.');
/*!40000 ALTER TABLE `estabelecimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estabelecimento_caracteristica`
--

DROP TABLE IF EXISTS `estabelecimento_caracteristica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estabelecimento_caracteristica` (
  `id_estabelecimento` int NOT NULL,
  `id_caracteristica` int NOT NULL,
  PRIMARY KEY (`id_estabelecimento`,`id_caracteristica`),
  KEY `id_caracteristica` (`id_caracteristica`),
  CONSTRAINT `estabelecimento_caracteristica_ibfk_1` FOREIGN KEY (`id_estabelecimento`) REFERENCES `estabelecimento` (`id_estabelecimento`),
  CONSTRAINT `estabelecimento_caracteristica_ibfk_2` FOREIGN KEY (`id_caracteristica`) REFERENCES `caracteristica` (`id_caracteristica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estabelecimento_caracteristica`
--

LOCK TABLES `estabelecimento_caracteristica` WRITE;
/*!40000 ALTER TABLE `estabelecimento_caracteristica` DISABLE KEYS */;
INSERT INTO `estabelecimento_caracteristica` VALUES (1,1),(2,1),(5,1),(8,1),(9,1),(7,2),(1,3),(6,3),(7,3),(8,3),(9,3),(2,4),(3,4),(4,4),(5,4),(7,5),(4,6),(1,7),(2,7),(3,7),(4,7),(5,7),(6,7),(7,7),(8,7),(9,7),(7,8),(1,9),(5,9),(6,9),(8,9),(9,9),(4,10),(4,11);
/*!40000 ALTER TABLE `estabelecimento_caracteristica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estabelecimento_categoria`
--

DROP TABLE IF EXISTS `estabelecimento_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estabelecimento_categoria` (
  `id_estabelecimento` int NOT NULL,
  `id_categoria` int NOT NULL,
  PRIMARY KEY (`id_estabelecimento`,`id_categoria`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `estabelecimento_categoria_ibfk_1` FOREIGN KEY (`id_estabelecimento`) REFERENCES `estabelecimento` (`id_estabelecimento`),
  CONSTRAINT `estabelecimento_categoria_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estabelecimento_categoria`
--

LOCK TABLES `estabelecimento_categoria` WRITE;
/*!40000 ALTER TABLE `estabelecimento_categoria` DISABLE KEYS */;
INSERT INTO `estabelecimento_categoria` VALUES (1,1),(5,1),(8,1),(9,1),(2,2),(3,2),(6,3),(7,4),(4,7),(8,8),(9,8),(8,9),(9,9);
/*!40000 ALTER TABLE `estabelecimento_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estabelecimento_estilo`
--

DROP TABLE IF EXISTS `estabelecimento_estilo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estabelecimento_estilo` (
  `id_estabelecimento` int NOT NULL,
  `id_estilo` int NOT NULL,
  PRIMARY KEY (`id_estabelecimento`,`id_estilo`),
  KEY `id_estilo` (`id_estilo`),
  CONSTRAINT `estabelecimento_estilo_ibfk_1` FOREIGN KEY (`id_estabelecimento`) REFERENCES `estabelecimento` (`id_estabelecimento`),
  CONSTRAINT `estabelecimento_estilo_ibfk_2` FOREIGN KEY (`id_estilo`) REFERENCES `estilo` (`id_estilo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estabelecimento_estilo`
--

LOCK TABLES `estabelecimento_estilo` WRITE;
/*!40000 ALTER TABLE `estabelecimento_estilo` DISABLE KEYS */;
INSERT INTO `estabelecimento_estilo` VALUES (1,1),(6,4),(8,4),(6,5),(9,5),(3,6),(1,7),(5,7),(6,7),(8,7),(4,8),(2,9),(3,9),(4,9),(7,9),(4,10),(3,11),(1,12),(8,12),(5,13),(2,14),(7,14),(2,15),(5,18),(7,18);
/*!40000 ALTER TABLE `estabelecimento_estilo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estilo`
--

DROP TABLE IF EXISTS `estilo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estilo` (
  `id_estilo` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `descricao` text,
  PRIMARY KEY (`id_estilo`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estilo`
--

LOCK TABLES `estilo` WRITE;
/*!40000 ALTER TABLE `estilo` DISABLE KEYS */;
INSERT INTO `estilo` VALUES (1,'Rock','Identidade musical e temática rock'),(2,'Sertanejo','Identidade musical sertaneja'),(3,'Pagode','Identidade musical voltada ao pagode'),(4,'Eletrônico','Identidade musical voltada à música eletrônica'),(5,'Funk','Identidade musical voltada ao funk'),(6,'Retrô','Decoração e atmosfera retrô'),(7,'Alternativo','Ambiente com proposta alternativa'),(8,'Sofisticado','Ambiente elegante e refinado'),(9,'Familiar','Ambiente voltado para famílias'),(10,'Romântico','Atmosfera romântica'),(11,'Rústico','Decoração e ambiente rústico'),(12,'Industrial','Decoração com estilo industrial'),(13,'Praiano','Atmosfera inspirada no litoral'),(14,'Pub','Ambiente característico de pub'),(15,'Universitário','Ambiente com identidade universitária'),(16,'Lounge','Ambiente descontraído e reservado'),(17,'Gastrobar','Combinação de gastronomia e bebidas'),(18,'Temático','Estabelecimento com temática própria'),(19,'Pop',NULL),(20,'Blues',NULL);
/*!40000 ALTER TABLE `estilo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_cardapio`
--

DROP TABLE IF EXISTS `item_cardapio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item_cardapio` (
  `id_item` int NOT NULL AUTO_INCREMENT,
  `id_cardapio` int NOT NULL,
  `nome` varchar(120) NOT NULL,
  `descricao` text,
  `preco` decimal(10,2) NOT NULL,
  `categoria` varchar(80) DEFAULT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `disponivel` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_item`),
  KEY `id_cardapio` (`id_cardapio`),
  CONSTRAINT `item_cardapio_ibfk_1` FOREIGN KEY (`id_cardapio`) REFERENCES `cardapio` (`id_cardapio`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_cardapio`
--

LOCK TABLES `item_cardapio` WRITE;
/*!40000 ALTER TABLE `item_cardapio` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_cardapio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
-- Dados da tabela usuario omitidos para proteger dados pessoais e credenciais.
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

-- Dump completed on 2026-11-25 16:38:59
