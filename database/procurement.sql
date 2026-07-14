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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issuance`
--

LOCK TABLES `issuance` WRITE;
/*!40000 ALTER TABLE `issuance` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issuancedetails`
--

LOCK TABLES `issuancedetails` WRITE;
/*!40000 ALTER TABLE `issuancedetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `issuancedetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `description` text,
  `quantity` int DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  `unitcost` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materials`
--

LOCK TABLES `materials` WRITE;
/*!40000 ALTER TABLE `materials` DISABLE KEYS */;
/*!40000 ALTER TABLE `materials` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `other_request`
--

LOCK TABLES `other_request` WRITE;
/*!40000 ALTER TABLE `other_request` DISABLE KEYS */;
INSERT INTO `other_request` VALUES (1,1,'Labor',20000,'2026-07-10','11:51:05','issued','2026-07-10','11:51:26','Administrator');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `podetails`
--

LOCK TABLES `podetails` WRITE;
/*!40000 ALTER TABLE `podetails` DISABLE KEYS */;
INSERT INTO `podetails` VALUES (1,'PR-20260710114029','2026-07-10','Administrator',1,'cash','received','2026-07-10','Administrator');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,'ER Expansion','ALICNA',1900000,'2026-08-01','2027-02-01','2026-07-10','pending');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchaseorder`
--

LOCK TABLES `purchaseorder` WRITE;
/*!40000 ALTER TABLE `purchaseorder` DISABLE KEYS */;
INSERT INTO `purchaseorder` VALUES (1,'RRNO-20260710-0001','PR-20260710114029','23345465764','20260522112333','Citi Hardware Kidapawan','20260522134427','Plywood 6mm',10,1980,'1','received','2026-07-10','11:43:56','Administrator','2026-07-10','11:54:07','Administrator'),(3,'RRNO-20260710-0001','PR-20260710114029','23345465764','20260522112333','Citi Hardware Kidapawan','20260522133642','Tiles 20x20 White Pearl',30,116,'1','received','2026-07-10','11:45:16','Administrator','2026-07-10','11:54:07','Administrator');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks`
--

LOCK TABLES `stocks` WRITE;
/*!40000 ALTER TABLE `stocks` DISABLE KEYS */;
INSERT INTO `stocks` VALUES (1,'20260522133642','Tiles 20x20 White Pearl','Construction Supplies',NULL),(2,'20260522134146','Round Bars 6mm','Construction Supplies',NULL),(3,'20260522134427','Plywood 6mm','Construction Supplies',NULL),(4,'20260522134508','Plywood 12mm','Construction Supplies',NULL),(5,'20260709214622','Firefly 10W bulb','Electrical Supplies',NULL),(6,'20260709214657','Electrical Tape Black 1/2 in','Electrical Supplies',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocktable`
--

LOCK TABLES `stocktable` WRITE;
/*!40000 ALTER TABLE `stocktable` DISABLE KEYS */;
INSERT INTO `stocktable` VALUES (1,'RRNO-20260710-0001','20260522112333','Citi Hardware Kidapawan','20260522134427','Plywood 6mm',1980,10,'1','2026-07-10','11:54:07'),(2,'RRNO-20260710-0001','20260522112333','Citi Hardware Kidapawan','20260522133642','Tiles 20x20 White Pearl',116,30,'1','2026-07-10','11:54:07');
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

-- Dump completed on 2026-07-14  9:06:00
