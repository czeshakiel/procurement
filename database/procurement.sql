-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: procurement
-- ------------------------------------------------------
-- Server version	8.0.42

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
-- Table structure for table `division_unit`
--

DROP TABLE IF EXISTS `division_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `division_unit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `division_unit`
--

LOCK TABLES `division_unit` WRITE;
/*!40000 ALTER TABLE `division_unit` DISABLE KEYS */;
INSERT INTO `division_unit` VALUES (2,'Electrical Supplies'),(3,'Plumbing Supplies'),(5,'General Supplies'),(6,'Construction Supplies');
/*!40000 ALTER TABLE `division_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issuance`
--

DROP TABLE IF EXISTS `issuance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issuance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `issuance_id` varchar(100) DEFAULT NULL,
  `rrno` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `description` text,
  `quantity` int DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `project_id` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'pending',
  `issued_date` date DEFAULT NULL,
  `issued_time` time DEFAULT NULL,
  `issued_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issuance`
--

LOCK TABLES `issuance` WRITE;
/*!40000 ALTER TABLE `issuance` DISABLE KEYS */;
INSERT INTO `issuance` VALUES (25,'IS-20260602092543','RRNO-20260602-0001','20260522134146','Round Bars 6mm',10,'2026-06-02','09:25:52','Eczekiel Aboy','1','issued','2026-06-02','09:26:09','Eczekiel Aboy'),(26,'IS-20260602092543','RRNO-20260602-0001','20260522134427','Plywood 6mm',10,'2026-06-02','09:25:57','Eczekiel Aboy','1','issued','2026-06-02','09:26:09','Eczekiel Aboy'),(27,'IS-20260602092543','RRNO-20260602-0001','20260522134508','Plywood 12mm',10,'2026-06-02','09:26:05','Eczekiel Aboy','1','issued','2026-06-02','09:26:09','Eczekiel Aboy');
/*!40000 ALTER TABLE `issuance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issuancedetails`
--

DROP TABLE IF EXISTS `issuancedetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issuancedetails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int DEFAULT NULL,
  `issuance_id` varchar(100) DEFAULT NULL,
  `date_requested` date DEFAULT NULL,
  `requested_by` varchar(100) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'pending',
  `date_issued` date DEFAULT NULL,
  `issued_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issuancedetails`
--

LOCK TABLES `issuancedetails` WRITE;
/*!40000 ALTER TABLE `issuancedetails` DISABLE KEYS */;
INSERT INTO `issuancedetails` VALUES (2,1,'IS-20260602092543','2026-03-02','Inhouse Contractor','issued','2026-06-02',NULL);
/*!40000 ALTER TABLE `issuancedetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `other_request`
--

DROP TABLE IF EXISTS `other_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `other_request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int DEFAULT NULL,
  `description` text,
  `amount` double DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `status` varchar(45) DEFAULT 'pending',
  `updated_date` date DEFAULT NULL,
  `update_time` time DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `other_request`
--

LOCK TABLES `other_request` WRITE;
/*!40000 ALTER TABLE `other_request` DISABLE KEYS */;
INSERT INTO `other_request` VALUES (1,1,'Labor',30000,'2026-01-15','08:49:21','issued','2026-05-29','09:34:28','Eczekiel Aboy'),(2,1,'Labor',20000,'2026-01-14','10:10:24','issued','2026-06-02','10:11:52','Eczekiel Aboy');
/*!40000 ALTER TABLE `other_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `podetails`
--

DROP TABLE IF EXISTS `podetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `podetails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pono` varchar(100) DEFAULT NULL,
  `date_requested` date DEFAULT NULL,
  `requested_by` varchar(100) DEFAULT NULL,
  `project_id` int DEFAULT NULL,
  `trantype` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'pending',
  `date_received` date DEFAULT NULL,
  `received_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `podetails`
--

LOCK TABLES `podetails` WRITE;
/*!40000 ALTER TABLE `podetails` DISABLE KEYS */;
INSERT INTO `podetails` VALUES (2,'PR-20260528100815','2026-01-15','Eczekiel Aboy',1,'charge','received','2026-06-02','Eczekiel Aboy'),(3,'PR-20260528102329','2026-03-11','Eczekiel Aboy',1,'charge','cancelled','2026-05-28','Eczekiel Aboy'),(5,'PR-20260529093903','2026-02-18','Eczekiel Aboy',1,'charge','cancelled','2026-05-29','Eczekiel Aboy'),(6,'PR-20260602101531','2026-01-28','Eczekiel Aboy',1,'cash','received','2026-01-30','Eczekiel Aboy');
/*!40000 ALTER TABLE `podetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project` (
  `id` int NOT NULL AUTO_INCREMENT,
  `projectname` varchar(100) DEFAULT NULL,
  `contractor` varchar(100) DEFAULT NULL,
  `amount_approved` double DEFAULT NULL,
  `date_started` date DEFAULT NULL,
  `date_ended` date DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,'RDU Extension','Inhouse',12000000,'2026-02-01','2026-07-30','2026-05-21','pending'),(2,'Kitchen Renovation','Inhouse',5000000,'2026-03-01','2026-08-31','2026-05-23','pending'),(3,'NS 2 Expansion','Inhouse',2000000,'2026-03-02','2026-08-20','2026-05-23','pending');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchaseorder`
--

DROP TABLE IF EXISTS `purchaseorder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchaseorder` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rrno` varchar(100) DEFAULT NULL,
  `pono` varchar(100) DEFAULT NULL,
  `invno` varchar(45) DEFAULT NULL,
  `suppliercode` varchar(100) DEFAULT NULL,
  `suppliername` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `description` text,
  `quantity` int DEFAULT NULL,
  `unitcost` double DEFAULT NULL,
  `project_id` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `date_requested` date DEFAULT NULL,
  `time_requested` time DEFAULT NULL,
  `requested_by` varchar(100) DEFAULT NULL,
  `date_received` date DEFAULT NULL,
  `time_received` time DEFAULT NULL,
  `received_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchaseorder`
--

LOCK TABLES `purchaseorder` WRITE;
/*!40000 ALTER TABLE `purchaseorder` DISABLE KEYS */;
INSERT INTO `purchaseorder` VALUES (15,'RRNO-20260602-0001','PR-20260528100815',NULL,'20260522112333','Citi Hardware Kidapawan','20260522134146','Round Bars 6mm',30,45,'1','received','2026-06-02','09:22:18','Eczekiel Aboy','2026-06-02','09:24:01','Eczekiel Aboy'),(16,'RRNO-20260602-0001','PR-20260528100815',NULL,'20260528103034','2NA Construction Supply','20260522134427','Plywood 6mm',20,145,'1','received','2026-06-02','09:22:34','Eczekiel Aboy','2026-06-02','09:24:01','Eczekiel Aboy'),(17,'RRNO-20260602-0001','PR-20260528100815',NULL,'20260528103034','2NA Construction Supply','20260522134508','Plywood 12mm',30,135,'1','received','2026-06-02','09:22:47','Eczekiel Aboy','2026-06-02','09:24:01','Eczekiel Aboy'),(18,'RRNO-20260602-0002','PR-20260528100815',NULL,'20260522112333','Citi Hardware Kidapawan','20260522134146','Round Bars 6mm',10,45,'1','received','2026-06-02','09:24:01','Eczekiel Aboy','2026-06-02','09:24:35','Eczekiel Aboy'),(19,'RRNO-20260602-0002','PR-20260528100815',NULL,'20260528103034','2NA Construction Supply','20260522134427','Plywood 6mm',20,145,'1','received','2026-06-02','09:24:01','Eczekiel Aboy','2026-06-02','09:24:35','Eczekiel Aboy'),(20,'RRNO-20260602-0002','PR-20260528100815',NULL,'20260528103034','2NA Construction Supply','20260522134508','Plywood 12mm',10,135,'1','received','2026-06-02','09:24:01','Eczekiel Aboy','2026-06-02','09:24:35','Eczekiel Aboy'),(21,'RRNO-20260602-0003','PR-20260528100815',NULL,'20260522112333','Citi Hardware Kidapawan','20260522134146','Round Bars 6mm',10,45,'1','received','2026-06-02','09:24:35','Eczekiel Aboy','2026-06-02','09:24:49','Eczekiel Aboy'),(22,'RRNO-20260602-0004','PR-20260602101531','21341','20260522112333','Citi Hardware Kidapawan','20260522133642','Tiles 20x20 White Pearl',30,64,'1','received','2026-06-02','10:15:47','Eczekiel Aboy','2026-01-30','10:25:53','Eczekiel Aboy');
/*!40000 ALTER TABLE `purchaseorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stocks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `description` text,
  `unit` varchar(100) DEFAULT NULL,
  `loc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks`
--

LOCK TABLES `stocks` WRITE;
/*!40000 ALTER TABLE `stocks` DISABLE KEYS */;
INSERT INTO `stocks` VALUES (1,'20260522133642','Tiles 20x20 White Pearl','Construction Supplies',NULL),(2,'20260522134146','Round Bars 6mm','Construction Supplies',NULL),(3,'20260522134427','Plywood 6mm','Construction Supplies',NULL),(4,'20260522134508','Plywood 12mm','Construction Supplies',NULL);
/*!40000 ALTER TABLE `stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stocktable`
--

DROP TABLE IF EXISTS `stocktable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stocktable` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rrno` varchar(100) DEFAULT NULL,
  `suppliercode` varchar(100) DEFAULT NULL,
  `suppliername` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `description` text,
  `unitcost` double DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `project_id` varchar(45) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocktable`
--

LOCK TABLES `stocktable` WRITE;
/*!40000 ALTER TABLE `stocktable` DISABLE KEYS */;
INSERT INTO `stocktable` VALUES (34,'RRNO-20260602-0001','20260522112333','Citi Hardware Kidapawan','20260522134146','Round Bars 6mm',45,30,'1','2026-06-02','09:24:01'),(35,'RRNO-20260602-0001','20260528103034','2NA Construction Supply','20260522134427','Plywood 6mm',145,20,'1','2026-06-02','09:24:01'),(36,'RRNO-20260602-0001','20260528103034','2NA Construction Supply','20260522134508','Plywood 12mm',135,30,'1','2026-06-02','09:24:01'),(37,'RRNO-20260602-0002','20260522112333','Citi Hardware Kidapawan','20260522134146','Round Bars 6mm',45,10,'1','2026-06-02','09:24:35'),(38,'RRNO-20260602-0002','20260528103034','2NA Construction Supply','20260522134427','Plywood 6mm',145,20,'1','2026-06-02','09:24:35'),(39,'RRNO-20260602-0002','20260528103034','2NA Construction Supply','20260522134508','Plywood 12mm',135,10,'1','2026-06-02','09:24:35'),(40,'RRNO-20260602-0003','20260522112333','Citi Hardware Kidapawan','20260522134146','Round Bars 6mm',45,10,'1','2026-06-02','09:24:49'),(41,'RRNO-20260602-0001','20260522112333','Citi Hardware Kidapawan','20260522134146','Round Bars 6mm',45,-10,'1','2026-06-02','09:26:09'),(42,'RRNO-20260602-0001','20260528103034','2NA Construction Supply','20260522134427','Plywood 6mm',145,-10,'1','2026-06-02','09:26:09'),(43,'RRNO-20260602-0001','20260528103034','2NA Construction Supply','20260522134508','Plywood 12mm',135,-10,'1','2026-06-02','09:26:09'),(44,'RRNO-20260602-0004','20260522112333','Citi Hardware Kidapawan','20260522133642','Tiles 20x20 White Pearl',64,30,'1','2026-01-30','10:25:53');
/*!40000 ALTER TABLE `stocktable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suppliers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `suppliercode` varchar(100) DEFAULT NULL,
  `suppliername` text,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (4,'20260522112333','Citi Hardware Kidapawan','Active'),(5,'20260528103034','2NA Construction Supply','Active');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','1234','Administrator'),(3,'shakiel17','1234','Eczekiel Aboy');
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

-- Dump completed on 2026-06-02 10:34:45
