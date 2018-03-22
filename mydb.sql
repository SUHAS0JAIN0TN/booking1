-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `facility`
--

DROP TABLE IF EXISTS `facility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facility` (
  `hid` int(11) NOT NULL,
  `faci` char(1) NOT NULL,
  KEY `hid` (`hid`),
  CONSTRAINT `facility_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `hotel` (`hid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility`
--

LOCK TABLES `facility` WRITE;
/*!40000 ALTER TABLE `facility` DISABLE KEYS */;
INSERT INTO `facility` VALUES (1,'s'),(1,'f'),(1,'b'),(1,'w'),(3,'f'),(3,'w'),(5,'w'),(6,'w'),(2,'s'),(4,'s'),(4,'b'),(7,'b'),(7,'w'),(7,'s'),(8,'f'),(9,'f'),(10,'w'),(10,'f'),(10,'s'),(11,'s'),(11,'w'),(12,'w'),(12,'s'),(12,'f'),(12,'b'),(13,'s'),(13,'f'),(13,'b'),(13,'w'),(14,'f'),(14,'w'),(15,'w'),(16,'w'),(17,'s'),(18,'s'),(18,'b'),(19,'b'),(19,'w'),(19,'s'),(20,'f'),(21,'f'),(22,'w'),(22,'f'),(22,'s'),(23,'s'),(23,'w'),(24,'w'),(24,'s'),(24,'f'),(24,'b'),(25,'f'),(25,'w'),(26,'w'),(27,'w'),(28,'s'),(29,'s'),(29,'b'),(30,'b'),(30,'w'),(30,'s'),(31,'f'),(32,'f'),(33,'w'),(33,'f'),(33,'s'),(34,'s'),(34,'w');
/*!40000 ALTER TABLE `facility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel` (
  `hid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `place` varchar(20) NOT NULL,
  `rating` double NOT NULL,
  `distance` double NOT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`hid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel`
--

LOCK TABLES `hotel` WRITE;
/*!40000 ALTER TABLE `hotel` DISABLE KEYS */;
INSERT INTO `hotel` VALUES (1,'hotel fabpark','bangalore',9.1,21.3,'Stage 3, Indiranagar'),(2,'hotel blu atria','bangalore',7.7,20,'No. 1, Palace Road, Bengaluru'),(3,'hotel hyatt','bangalore',5.9,4,'Bengaluru city center'),(4,'hotel Keys Select','bangalore',0.9,7,'Hosur Road,Opposite Live 100 Hospital'),(5,'hotel Ibis','bangalore',6.9,12,'26/1 Near Central Silk Board'),(6,'hotel Ramada','bangalore',6.9,11,'11,Park Road,Near Indian Express Signal'),(7,'hotel Treebo Cartier','bangalore',2.5,9.6,'Marathahalli'),(8,'hotel Krishinton Suites','bangalore',4.5,19.6,'M.S.Ramaiah Main Road,yashwanthpur'),(9,'hotel Oakwood','bangalore',6.5,12.6,'Vittal Mallya Road UB City'),(10,'hotel shiva','bangalore',3.4,3.6,'chikkabanavara,hesaragatta main road'),(11,'Country Inn','mysore',0.4,3.6,'Plot No. 345/A Hebbal Electronic City'),(12,'Treebo Komfort','mysore',3.4,3.6,'Yadavgiri, Mysore'),(13,'Grand Mercure','mysore',6.5,12.6,'Sayyaji Rao Road Nelson Mandela Circle'),(14,'JP Palace','mysore',0.9,7,'3, Abba Road Nazarbad'),(15,'The Quorum','mysore',6.9,12,'2257 / 1, Vinobha Road'),(16,'Hotel MB International','mysore',6.9,11,'3147 Convent Road, Lashkar Mohalla'),(17,'Aishwarya Residency','mysore',2.5,9.6,'2932/A, Off Bangalore-Nilgiri Road'),(18,'Viceroy Comforts','mysore',4.5,19.6,'No.770/5 F-25, Ramanuja Road'),(19,'Silent Shores Resort','mysore',6.5,12.6,'KRS Road,Hootagalli Off Hunsur Road'),(20,'Olive Residency','mysore',3.4,3.6,'229/4 Mahajana Layout, Abhishek Road'),(21,'FabHotel Galaxy','mumbai',9.1,21.4,'Plot Z-1, Bhawani nagar'),(22,'hotel Treebo','mumbai',7.7,20,'Juhu Beach'),(23,'The wesin mumbai','mumbai',5.9,4,'International Business Park, 400063'),(24,'The leela  mumbai','mumbai',0.9,7,'Sahar, 400 059'),(25,'hotel cosmo','mumbai',6.9,12,'Seepz Pocket Cross Road,400059'),(26,'The Gordon House','mumbai',6.9,11,'5,Battery Street Apollo Bunder,Colaba'),(27,'Trident Nariman Point','mumbai',2.5,9.6,'Nariman Point, 400021'),(28,'Treebo Amber','new delhi',9.1,21.3,'98, Sukhdev Vihar, Okhla'),(29,'The Metropolitan','new delhi',4.5,19.6,'Bangla Sahib Road, 110001'),(30,'The Grand New Delhi','new delhi',6.5,12.6,'Vasant Kunj-PhaseII,Nelson Mandela Road'),(31,'The Park New Delhi','new delhi',3.4,3.6,'15, Parliament Street, Connaught Place'),(32,'Delhi Aerocity','new delhi',6.9,9.6,'104/2, M. R. Complex, Rangpuri'),(33,'B Continental','new delhi',2.5,19.6,'14 Abdul Aziz Road, Karol Bagh'),(34,'Royal Castle Grand','new delhi',8.5,1.6,'D-616, Chitaranjan Park'),(101,'hotel kumar','bangalore',0.4,3.6,'somewhere in bangalore 4');
/*!40000 ALTER TABLE `hotel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type` (
  `hid` int(11) NOT NULL,
  `type` char(1) NOT NULL,
  `price` int(11) NOT NULL,
  KEY `hid` (`hid`),
  CONSTRAINT `type_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `hotel` (`hid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,'s',2000),(1,'d',3000),(1,'f',4000),(2,'f',900),(2,'d',600),(3,'d',2500),(4,'s',2500),(5,'d',2500),(6,'s',500),(4,'f',3500),(4,'d',4000),(6,'d',900),(6,'f',900),(5,'f',2000),(3,'f',2900),(7,'f',2900),(7,'s',1900),(8,'d',1900),(8,'f',3900),(9,'d',4900),(9,'s',2900),(10,'s',5900),(11,'d',7900),(12,'f',6900),(13,'s',2000),(13,'d',3000),(13,'f',4000),(14,'f',900),(14,'d',600),(15,'d',2500),(16,'s',2500),(17,'d',2500),(18,'s',500),(16,'f',3500),(16,'d',4000),(18,'d',900),(18,'f',900),(17,'f',2000),(15,'f',2900),(19,'f',2900),(19,'s',1900),(20,'d',1900),(20,'f',3900),(21,'d',4900),(21,'s',2900),(22,'s',5900),(23,'d',7900),(24,'f',6900),(25,'s',2000),(25,'d',3000),(25,'f',4000),(26,'f',900),(26,'d',600),(27,'d',2500),(28,'s',2500),(29,'d',2500),(30,'s',500),(28,'f',3500),(28,'d',4000),(30,'d',900),(30,'f',900),(29,'f',2000),(27,'f',2900),(31,'f',2900),(31,'s',1900),(32,'d',1900),(32,'f',3900),(33,'d',4900),(33,'s',2900),(34,'s',5900),(34,'d',7900);
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `name` varchar(30) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('','','',''),('SS','QQ','AASA','cc7af62bb9669408d66642da7fc486cb7d72b255'),('s','A','AS','801c34269f74ed383fc97de33604b8a905adb635'),('jaaa','sdfsdf','asdsd@vbf.com','d33fef58bedd39dc1c2d38f16305b10010e9058e'),('aa','dd','asj','b821103a5881b0d768dd9f697df6b0b7951110b2'),('puni','nT','puni@gmail.com','38d0f91a99c57d189416439ce377ccdcd92639d0'),('ss','dd','sa','4452d71687b6bc2c9389c3349fdc17fbd73b833b'),('ska','ncskj','sdjn','bfc896e1ecd35d326871e60c70649a1e99571ffa'),('vish','M','vishwas@gmail.com','38d0f91a99c57d189416439ce377ccdcd92639d0');
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

-- Dump completed on 2018-03-22 12:20:35
