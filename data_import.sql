DROP DATABASE IF EXISTS `cdapi`;
CREATE DATABASE  IF NOT EXISTS `cdapi`;
USE `cdapi`;
-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cdapi
-- ------------------------------------------------------
-- Server version	8.0.25

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


-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: cdapi
-- ------------------------------------------------------
-- Server version	8.0.25

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
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `language` (
                            `id` int NOT NULL AUTO_INCREMENT,
                            `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                            PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` VALUES (1,'C'),(2,'C++'),(3,'C#'),(4,'Java'),(5,'Angular'),(6,'Python'),(7,'Javascript'),(8,'Go'),(9,'Thymeleaf'),(10,'Spring'),(11,'Php'),(12,'Symfony'),(13,'React'),(14,'Vue'),(15,'Dessin'),(16,'Mind map'),(17,'UML'),(18,'Dart'),(19,'Flutter'),(20,'Symfony');
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-20 10:20:33

-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: cdapi
-- ------------------------------------------------------
-- Server version	8.0.25

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
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student` (
                           `id` int NOT NULL AUTO_INCREMENT,
                           `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                           `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                           `nicknames` json DEFAULT NULL,
                           `age` int NOT NULL,
                           `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
                           `power` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                           `strengths` json DEFAULT NULL,
                           `weaknesses` json DEFAULT NULL,
                           PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (2,'Ludovic','Dieudonné','[\"Ludo\"]',36,'img/profils/150x150/ludo.jpg','Répand son cynisme dans une zone de 5 mètres autour le lui, moral -20','[]','[\"Il n’aime rien, c’est un nihiliste\", \"Tarte aux citron\", \"Salade Cesar\"]'),(3,'Mahaury','Tran Eyraud','[\"Mahau\", \"Le chinois (pardon Mahaury)\"]',36,'img/profils/150x150/maho.jpg','Déstabilise les bar mans en leur demandant des crazy-bombs','[\"Connais tous les animé existant\"]','[\"Est instantanément distrait par les waifus\", \"Ne peut finir sa phrase sans dire ‘et tout’\", \"Prend toujours chère dans les garticphones\"]'),(4,'Maxime','Rouffaud','[\"Max la menace\", \"Maxime.dev\", \"Maxime.js\", \"Maxime.dart\"]',25,'img/profils/150x150/maxime.jpg','Déstabilise ses adversaires avec ses tours de magie','[\"Connait tous les framwork js\"]','[\"Ne se nourrit que de mini saucissons\", \"Parle trop de jesuisundev\"]'),(5,'Romuald','Caplier','[\"Roro\", \"Romu\", \"Anarchiste\"]',32,'img/profils/150x150/romuald.jpg','Sa grande gueule peut assourdir les gens sauf Jordan','[\"Grand négociateur\"]','[\"Manque de talc\"]'),(6,'Rémi','Audibert','[\"Hitrem\", \"Raudibert\"]',31,'img/profils/150x150/remia.jpg','','[\"Possède un pass sanitaire\"]','[\"Toujours une bonne excuse pour arriver 10 à 15 minutes en retard\"]'),(7,'Rémi','Bonnabaud','[\"Le roi\", \"Rémi Bonnamoche\"]',23,'img/profils/150x150/remib.jpg','La superficie de ses terres augmentent sans cesse','[\"Possède un chateau\", \"Très bon dev front\", \"Ressources financière illimitées grâce aux impôts et taxes qu’il perçoit\"]','[\"S’irrite rapidement dès qu’on parle de Java ou d’angular\"]'),(8,'Frank','Dugour','[\"Franky Vincent\", \"Un p\'tit zip\"]',43,'img/profils/150x150/franck.jpg','Etourdi ses ennemis avec ses questions','[\"Possède une énorme collection de .zip\", \"Créatif\"]','[\"Ne peut survivre sans un apport régulier en .zip\"]'),(9,'Emmanuel','Val Da Silva','[\"Manu\", \"Briseur de pierre\"]',29,'img/profils/150x150/manu.jpg','Culture générale extraordinaire','[\"Brise la pierre à main nue\", \"Robuste\", \"Potentiel colossale\"]','[\"Trop robuste\", \"A tendance a casser ses claviers en codant\"]'),(10,'Dimitri','Gruyer','[\"Dimitri (avec accent russe)\"]',36,'img/profils/150x150/dimitri.jpg','Toute personne invitée dans son garage n\'en revient jamais','[\"Aucun germe ne lui résiste\", \"Travailleur acharné\", \"Possède une trotinette électrique extrêmement rapide\"]','[\"Manque de flexibilité\", \"Peut s\'énerver très rapidement\", \"Parle plus vite que la vitesse du son, les gens ne le comprennent pas toujours\"]'),(11,'Guillaume','Perrot','[\"Le vegan\", \"Php Lord\", \"Gugu\", \"Leguman\"]',25,'img/profils/150x150/guillaume.jpg','Toute personne invitée dans son garage n\'en revient jamais','[\"Vegan\"]','[\"Vegan\", \"Manque de B12\"]'),(12,'Benoit','Crozemarie','[\"Beubeu\"]',29,'img/profils/150x150/benoit.jpg','Aveugle définitivement ses ennemis grâce à ses gifs','[\"Ambassadeur des potamochere\", \"Horloge parlante\"]','[\"Parle trop le matin (enfin non tout le temps en fait)\", \"Ses conversations n\'ont souvent aucun sens\", \"Facile à cambrioler\"]'),(13,'Jordan','Kraria','[\"Jojok\", \"Djordan\"]',24,'img/profils/150x150/jordan.jpg','Rend fou les adversaires en les faisant répéter 30 fois leurs phrases.','[\"Conduite sportive\", \"Dessins\", \"Mind maps\"]','[\"N\'entend pas très bien\", \"Feed sur league of legend\"]');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-20 10:20:34

-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: cdapi
-- ------------------------------------------------------
-- Server version	8.0.25

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
-- Table structure for table `language_student`
--

DROP TABLE IF EXISTS `language_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `language_student` (
                                    `language_id` int NOT NULL,
                                    `student_id` int NOT NULL,
                                    PRIMARY KEY (`language_id`,`student_id`),
                                    KEY `IDX_13EE786782F1BAF4` (`language_id`),
                                    KEY `IDX_13EE7867CB944F1A` (`student_id`),
                                    CONSTRAINT `FK_13EE786782F1BAF4` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE CASCADE,
                                    CONSTRAINT `FK_13EE7867CB944F1A` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language_student`
--

LOCK TABLES `language_student` WRITE;
/*!40000 ALTER TABLE `language_student` DISABLE KEYS */;
INSERT INTO `language_student` VALUES (3,3),(4,5),(4,7),(4,9),(4,10),(4,12),(5,5),(5,7),(5,10),(6,11),(7,4),(7,6),(8,5),(11,2),(11,4),(11,8),(16,13),(17,8),(17,13),(18,4),(19,4),(20,4);
/*!40000 ALTER TABLE `language_student` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-20 10:20:33
