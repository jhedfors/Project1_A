-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: belt_exam
-- ------------------------------------------------------
-- Server version	5.5.41-log

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
-- Table structure for table `destinations`
--

DROP TABLE IF EXISTS `destinations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destinations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destination` varchar(45) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `user_planner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_destinations_users1_idx` (`user_planner_id`),
  CONSTRAINT `fk_destinations_users1` FOREIGN KEY (`user_planner_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destinations`
--

LOCK TABLES `destinations` WRITE;
/*!40000 ALTER TABLE `destinations` DISABLE KEYS */;
INSERT INTO `destinations` VALUES (1,'Tokyo, Japan','Take a tour of Temples','2016-06-30 00:00:00','2016-07-06 00:00:00','2016-04-22 10:01:57','2016-04-22 10:01:57',1),(2,'London, England','Tour Thames','2016-06-30 00:00:00','2016-07-06 00:00:00','2016-04-22 15:39:01','2016-04-22 15:39:01',1),(3,'Nagasaki, Japan','Site seeing','2016-06-30 00:00:00','2016-07-06 00:00:00','2016-04-22 16:23:40','2016-04-22 16:23:40',1),(4,'Anahiem, CA','Amusement park','2016-05-30 00:00:00','2016-06-06 00:00:00','2016-04-23 06:12:45','2016-04-23 06:12:45',2),(5,'Mountain View, CA','Tour Google campus','2016-05-10 00:00:00','2016-05-11 00:00:00','2016-04-23 06:19:57','2016-04-23 06:19:57',2),(7,'Cancun','Relax at an all-inclusive resort','2016-04-23 00:00:00','2016-04-30 00:00:00','2016-04-23 17:36:40','2016-04-23 17:36:40',17),(8,'Seaside, OR','Go to the beach!','2016-04-30 00:00:00','2016-04-23 00:00:00','2016-04-23 19:00:46','2016-04-23 19:00:46',1),(9,'San Diego','Fun in the sun!','2016-05-07 00:00:00','2016-04-30 00:00:00','2016-04-23 19:02:44','2016-04-23 19:02:44',1),(10,'ajsdlfjl','asdfasdf','2016-04-30 00:00:00','2016-04-29 00:00:00','2016-04-23 19:06:34','2016-04-23 19:06:34',1),(11,'asdf','asdf','2016-04-30 00:00:00','2016-04-29 00:00:00','2016-04-23 19:37:28','2016-04-23 19:37:28',1);
/*!40000 ALTER TABLE `destinations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_schedules_users1_idx` (`user_id`),
  KEY `fk_schedules_destinations1_idx` (`destination_id`),
  CONSTRAINT `fk_schedules_destinations1` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_schedules_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` VALUES (35,16,2),(36,17,2),(37,17,3),(38,17,5),(39,1,7),(40,17,9),(41,2,9);
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jeff Hedfors','jhedfors','a642a77abd7d4f51bf9226ceaf891fcbb5b299b8','2016-04-22 09:53:11','2016-04-22 09:53:11'),(2,'Kazu Hedfors','khedfors','a642a77abd7d4f51bf9226ceaf891fcbb5b299b8','2016-04-22 10:08:01','2016-04-22 10:08:01'),(12,'Jayden Hedfors','jkhedfors','a642a77abd7d4f51bf9226ceaf891fcbb5b299b8','2016-04-23 11:23:07','2016-04-23 11:23:07'),(13,'Keefer Hedfors','kshedfors','a642a77abd7d4f51bf9226ceaf891fcbb5b299b8','2016-04-23 11:24:50','2016-04-23 11:24:50'),(14,'Linda Goebel','linda38','a642a77abd7d4f51bf9226ceaf891fcbb5b299b8','2016-04-23 11:25:55','2016-04-23 11:25:55'),(15,'l','','','2016-04-23 11:50:31','2016-04-23 11:50:31'),(16,'Jim Hedford','jhedford','a642a77abd7d4f51bf9226ceaf891fcbb5b299b8','2016-04-23 12:19:52','2016-04-23 12:19:52'),(17,'Shane Medberry','smedberry','a642a77abd7d4f51bf9226ceaf891fcbb5b299b8','2016-04-23 12:22:35','2016-04-23 12:22:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-23 21:09:03
