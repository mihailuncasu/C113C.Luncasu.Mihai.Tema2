-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: localhost    Database: fishing_store
-- ------------------------------------------------------
-- Server version	8.0.13

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
-- Table structure for table `adm_products`
--

DROP TABLE IF EXISTS `adm_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `adm_products` (
  `id` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `images` text,
  `description` text,
  `name` varchar(45) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `promotion` int(11) DEFAULT NULL,
  `img_count` int(11) DEFAULT NULL,
  `sale_percentage` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_products`
--

LOCK TABLES `adm_products` WRITE;
/*!40000 ALTER TABLE `adm_products` DISABLE KEYS */;
INSERT INTO `adm_products` VALUES (1,100,3,'undita_carbon/','Undita din carbon super fiabila si alt text random adsadada ad asd asd aad sssssssssssssssssssssssssssssss       sssssssssssssss sssssssssssssssssssd ddddddddddddddddddda aaaaaaaaaaaaaaaaaaa s','Undita carbon','2',1,4,15),(2,200,4,'undita_fibra/','Undita din carbon super fiabila si alt text random adsadada ad asd asd aad sssssssssssssssssssssssssssssss       sssssssssssssss sssssssssssssssssssd ddddddddddddddddddda aaaaaaaaaaaaaaaaaaa s','Undita fibra','1',1,5,13),(3,150,6,'undita_faina/','Undita din carbon super fiabila si alt text random adsadada ad asd asd aad sssssssssssssssssssssssssssssss       sssssssssssssss sssssssssssssssssssd ddddddddddddddddddda aaaaaaaaaaaaaaaaaaa s','Undita faina','1',1,3,13),(4,230,6,'undita_mulineta/','Undita din carbon super fiabila si alt text random adsadada ad asd asd aad sssssssssssssssssssssssssssssss       sssssssssssssss sssssssssssssssssssd ddddddddddddddddddda aaaaaaaaaaaaaaaaaaa s','Undita mulineta','2',1,3,13),(5,430,5,'undita_pluta/','Undita din carbon super fiabila si alt text random adsadada ad asd asd aad sssssssssssssssssssssssssssssss       sssssssssssssss sssssssssssssssssssd ddddddddddddddddddda aaaaaaaaaaaaaaaaaaa s','Undita pluta','2',1,3,13),(6,179,3,'undita_lanseta/','Undita din carbon super fiabila si alt text random adsadada ad asd asd aad sssssssssssssssssssssssssssssss       sssssssssssssss sssssssssssssssssssd ddddddddddddddddddda aaaaaaaaaaaaaaaaaaa s','Undita lasneta','1',1,3,0),(7,160,8,'undita_cu_schema/','Undita din carbon super fiabila si alt text random adsadada ad asd asd aad sssssssssssssssssssssssssssssss       sssssssssssssss sssssssssssssssssssd ddddddddddddddddddda aaaaaaaaaaaaaaaaaaa s','Undita cu schema','2',1,3,13),(8,150,7,'undita_flexibila/','Undita din carbon super fiabila si alt text random adsadada ad asd asd aad sssssssssssssssssssssssssssssss       sssssssssssssss sssssssssssssssssssd ddddddddddddddddddda aaaaaaaaaaaaaaaaaaa s','Undita flexibila','2',1,3,13),(9,145,9,'momeala_ton/','Momeala ton si mult text random','Momeala ton','3',1,1,10);
/*!40000 ALTER TABLE `adm_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_users`
--

DROP TABLE IF EXISTS `adm_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `adm_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` longtext NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `active` int(11) DEFAULT NULL,
  `token` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_users`
--

LOCK TABLES `adm_users` WRITE;
/*!40000 ALTER TABLE `adm_users` DISABLE KEYS */;
INSERT INTO `adm_users` VALUES (1,'admin','admin','admin','admin@gmail.com',1,'12345','admin'),(32,'$2y$10$oIWF2jMfbTXSO6WJpySBEeo9yjA0ns.eV.Zr6U435tVNSt/XivsSe','Luncasu','Mihai','mihai.luncasu.liviu@gmail.com',1,'1089704031','admin'),(33,'$2y$10$v28haLLkLV28o9Zl3wyq6O9ODm7871BGr8osTmkaGgpLdNit8EIMS','aaaaaa','aaaaaaa','mindpalm.ml@gmail.com',1,'1057356656','power_user');
/*!40000 ALTER TABLE `adm_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shp_shopping_cart`
--

DROP TABLE IF EXISTS `shp_shopping_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `shp_shopping_cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `products` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shp_shopping_cart`
--

LOCK TABLES `shp_shopping_cart` WRITE;
/*!40000 ALTER TABLE `shp_shopping_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `shp_shopping_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shp_transactions`
--

DROP TABLE IF EXISTS `shp_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `shp_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shp_transactions`
--

LOCK TABLES `shp_transactions` WRITE;
/*!40000 ALTER TABLE `shp_transactions` DISABLE KEYS */;
INSERT INTO `shp_transactions` VALUES (1,32,1,1),(2,32,2,1),(3,32,3,1),(4,32,1,1),(5,32,2,1),(6,32,1,1);
/*!40000 ALTER TABLE `shp_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_ads`
--

DROP TABLE IF EXISTS `sys_ads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sys_ads` (
  `id` int(11) NOT NULL,
  `path` text NOT NULL,
  `description` varchar(45) NOT NULL,
  `alt` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_ads`
--

LOCK TABLES `sys_ads` WRITE;
/*!40000 ALTER TABLE `sys_ads` DISABLE KEYS */;
INSERT INTO `sys_ads` VALUES (1,'assets/images/mainPageAds/1.png','Some description regarding the first ad','first ad'),(2,'assets/images/mainPageAds/2.png','Some description regarding the second ad','second ad'),(3,'assets/images/mainPageAds/3.png','Blah blah another random description','third ad'),(4,'assets/images/mainPageAds/4.png','Another boring and random description','fourth ad');
/*!40000 ALTER TABLE `sys_ads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_menu_items`
--

DROP TABLE IF EXISTS `sys_menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sys_menu_items` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `link` varchar(45) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `dropdown` int(11) DEFAULT NULL,
  `dropdown_items` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_menu_items`
--

LOCK TABLES `sys_menu_items` WRITE;
/*!40000 ALTER TABLE `sys_menu_items` DISABLE KEYS */;
INSERT INTO `sys_menu_items` VALUES (1,'Promotii','#','nav-top',0,NULL),(2,'Nou in stoc','#','nav-top',0,NULL),(3,'Brands','#','nav-top',0,NULL),(4,'Vouchere','#','nav-top',1,'[\n   {\n     \"description\": \"Lansete\",\n     \"href\": \"lansete\"\n   },\n   {\n     \"description\": \"Undite flexibile\",\n     \"href\": \"flexibile\"\n   }\n ]'),(5,'Undite','#','nav-side',1,'[\n   {\n     \"description\": \"Lansete\",\n     \"href\": 1\n     },\n   {\n     \"description\": \"Undite flexibile\",\n     \"href\": 2\n   }\n ]'),(6,'Momeala','#','nav-side',1,'[\r     {\r       \"description\": \"Ton\",\r       \"href\": 3\r     }  ]'),(7,'Categorie_unu','#','nav-side',0,'[\n  {\n    \"description\": \"Submeniu 1\",\n    \"href\": \"#\"\n  },\n  {\n    \"description\": \"Submeniu 2\",\n    \"href\": \"#\"\n  },\n  {\n    \"description\": \"Submeniu 3\",\n    \"href\": \"#\"\n  },\n  {\n    \"description\": \"Submeniu 4\",\n    \"href\": \"#\"\n  }\n]'),(8,'Categorie_doi','#','nav-side',1,'[\n  {\n    \"description\": \"Submeniu 1\",\n    \"href\": \"#\"\n  },\n  {\n    \"description\": \"Submeniu 2\",\n    \"href\": \"#\"\n  },\n  {\n    \"description\": \"Submeniu 3\",\n    \"href\": \"#\"\n  },\n  {\n    \"description\": \"Submeniu 4\",\n    \"href\": \"#\"\n  }\n]'),(9,'Categorie_trei','#','nav-side',1,'[\n  {\n    \"description\": \"Submeniu 1\",\n    \"href\": \"#\"\n  },\n  {\n    \"description\": \"Submeniu 2\",\n    \"href\": \"#\"\n  },\n  {\n    \"description\": \"Submeniu 3\",\n    \"href\": \"#\"\n  },\n  {\n    \"description\": \"Submeniu 4\",\n    \"href\": \"#\"\n  }\n]'),(10,'Categorie_patru','#','nav-side',1,'[\n  {\n    \"description\": \"Submeniu 1\",\n    \"href\": \"#\"\n  },\n  {\n    \"description\": \"Submeniu 2\",\n    \"href\": \"#\"\n  },\n  {\n    \"description\": \"Submeniu 3\",\n    \"href\": \"#\"\n  },\n  {\n    \"description\": \"Submeniu 4\",\n    \"href\": \"#\"\n  }\n]');
/*!40000 ALTER TABLE `sys_menu_items` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-26 23:39:57
