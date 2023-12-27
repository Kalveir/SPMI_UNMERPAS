-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: spmi
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bookdocs`
--

DROP TABLE IF EXISTS `bookdocs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookdocs` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `standard_id` int(3) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_book_standard` (`standard_id`),
  CONSTRAINT `fk_book_standard` FOREIGN KEY (`standard_id`) REFERENCES `standard` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookdocs`
--

LOCK TABLES `bookdocs` WRITE;
/*!40000 ALTER TABLE `bookdocs` DISABLE KEYS */;
/*!40000 ALTER TABLE `bookdocs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookmanual`
--

DROP TABLE IF EXISTS `bookmanual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookmanual` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `standard_id` int(3) DEFAULT NULL,
  `pegawai_id` int(6) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `visi_misi` text DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `ruanglingkup` text DEFAULT NULL,
  `definisi_istilah` text DEFAULT NULL,
  `tahapan` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bookmanual_pegawai` (`pegawai_id`),
  KEY `fk_bookmanual_standard` (`standard_id`),
  CONSTRAINT `fk_bookmanual_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`),
  CONSTRAINT `fk_bookmanual_standard` FOREIGN KEY (`standard_id`) REFERENCES `standard` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookmanual`
--

LOCK TABLES `bookmanual` WRITE;
/*!40000 ALTER TABLE `bookmanual` DISABLE KEYS */;
/*!40000 ALTER TABLE `bookmanual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookstandard`
--

DROP TABLE IF EXISTS `bookstandard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookstandard` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `standard_id` int(3) DEFAULT NULL,
  `pegawai_id` int(6) DEFAULT NULL,
  `visi_misi` text DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `rasional` text DEFAULT NULL,
  `subjek` text DEFAULT NULL,
  `definisi_istilah` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bookstandard_standard` (`standard_id`),
  KEY `fk_bookstandard_pegawai` (`pegawai_id`),
  CONSTRAINT `fk_bookstandard_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`),
  CONSTRAINT `fk_bookstandard_standard` FOREIGN KEY (`standard_id`) REFERENCES `standard` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookstandard`
--

LOCK TABLES `bookstandard` WRITE;
/*!40000 ALTER TABLE `bookstandard` DISABLE KEYS */;
/*!40000 ALTER TABLE `bookstandard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fakultas`
--

DROP TABLE IF EXISTS `fakultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fakultas` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fakultas`
--

LOCK TABLES `fakultas` WRITE;
/*!40000 ALTER TABLE `fakultas` DISABLE KEYS */;
INSERT INTO `fakultas` VALUES (1,'Teknologi Informasi'),(2,'Ekonomi'),(3,'Hukum'),(4,'Pertanian');
/*!40000 ALTER TABLE `fakultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indikator`
--

DROP TABLE IF EXISTS `indikator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indikator` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `standard_id` int(3) DEFAULT NULL,
  `pegawai_id` int(6) DEFAULT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `strategi` varchar(255) DEFAULT NULL,
  `indikator` varchar(255) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `target` int(6) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_indikator_standard` (`standard_id`),
  KEY `fk_indikator_pegawai` (`pegawai_id`),
  CONSTRAINT `fk_indikator_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`),
  CONSTRAINT `fk_indikator_standard` FOREIGN KEY (`standard_id`) REFERENCES `standard` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indikator`
--

LOCK TABLES `indikator` WRITE;
/*!40000 ALTER TABLE `indikator` DISABLE KEYS */;
/*!40000 ALTER TABLE `indikator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indikator_jenis`
--

DROP TABLE IF EXISTS `indikator_jenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indikator_jenis` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `jenis_id` int(3) DEFAULT NULL,
  `indikator_id` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_indikator` (`indikator_id`),
  KEY `fk_jenis` (`jenis_id`),
  CONSTRAINT `fk_indikator` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`),
  CONSTRAINT `fk_jenis` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indikator_jenis`
--

LOCK TABLES `indikator_jenis` WRITE;
/*!40000 ALTER TABLE `indikator_jenis` DISABLE KEYS */;
/*!40000 ALTER TABLE `indikator_jenis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jabatan` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan`
--

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` VALUES (1,'Admin',NULL),(2,'LPPM',NULL),(3,'Audithor',NULL);
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis`
--

DROP TABLE IF EXISTS `jenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis`
--

LOCK TABLES `jenis` WRITE;
/*!40000 ALTER TABLE `jenis` DISABLE KEYS */;
/*!40000 ALTER TABLE `jenis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nilai`
--

DROP TABLE IF EXISTS `nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nilai` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `indikator_id` int(6) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `nilai` int(3) DEFAULT 0,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nilai_indikator` (`indikator_id`),
  CONSTRAINT `fk_nilai_indikator` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nilai`
--

LOCK TABLES `nilai` WRITE;
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pegawai` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `jabatan_id` int(3) NOT NULL,
  `prodi_id` int(3) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pegawai_jabatan` (`jabatan_id`),
  KEY `fk_pegawai_prodi` (`prodi_id`),
  CONSTRAINT `fk_pegawai_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`),
  CONSTRAINT `fk_pegawai_prodi` FOREIGN KEY (`prodi_id`) REFERENCES `program_studi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES (1,1,1,'Wijaya','wijaya@gmail.com','$2y$12$DS0DYkp7cp7BJVtjjX2DIOSBwC0EOWzZpOZ5iJq.xA/h1PgyL/Ehy',1,NULL,NULL),(2,1,1,'Wijaya','wijaya@gmail.com','$2y$12$DS0DYkp7cp7BJVtjjX2DIOSBwC0EOWzZpOZ5iJq.xA/h1PgyL/Ehy',1,NULL,NULL);
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengisian`
--

DROP TABLE IF EXISTS `pengisian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengisian` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `indikator_id` int(6) DEFAULT NULL,
  `pegawai_id` int(6) DEFAULT NULL,
  `program_studi` int(3) DEFAULT NULL,
  `nilai` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pengisian_indikator` (`indikator_id`),
  KEY `fk_pengisian_pegawai` (`pegawai_id`),
  KEY `program_studi` (`program_studi`),
  CONSTRAINT `fk_pengisian_indikator` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`),
  CONSTRAINT `fk_pengisian_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`),
  CONSTRAINT `pengisian_fk_prodi` FOREIGN KEY (`program_studi`) REFERENCES `program_studi` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengisian`
--

LOCK TABLES `pengisian` WRITE;
/*!40000 ALTER TABLE `pengisian` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengisian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengisian_berkas`
--

DROP TABLE IF EXISTS `pengisian_berkas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengisian_berkas` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `indikator_id` int(6) DEFAULT NULL,
  `pengisian_id` int(3) DEFAULT NULL,
  `program_studi_id` int(4) DEFAULT NULL,
  `pegawai_id` int(4) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pengisian_berkas_pegawai` (`pegawai_id`),
  KEY `fk_program_studi_id` (`program_studi_id`),
  KEY `fk_indikator_id` (`indikator_id`),
  KEY `fk_pengisian_berkas_pindikator` (`pengisian_id`),
  CONSTRAINT `fk_indikator_id` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`),
  CONSTRAINT `fk_pengisian_berkas_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`),
  CONSTRAINT `fk_pengisian_berkas_pindikator` FOREIGN KEY (`pengisian_id`) REFERENCES `indikator` (`id`),
  CONSTRAINT `fk_program_studi` FOREIGN KEY (`program_studi_id`) REFERENCES `program_studi` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengisian_berkas`
--

LOCK TABLES `pengisian_berkas` WRITE;
/*!40000 ALTER TABLE `pengisian_berkas` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengisian_berkas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_studi`
--

DROP TABLE IF EXISTS `program_studi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `program_studi` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `fakultas_id` int(3) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_program_studi_fakultas` (`fakultas_id`),
  CONSTRAINT `fk_program_studi_fakultas` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_studi`
--

LOCK TABLES `program_studi` WRITE;
/*!40000 ALTER TABLE `program_studi` DISABLE KEYS */;
INSERT INTO `program_studi` VALUES (1,1,'Teknik Informatika'),(2,1,'Rekayasa Perangkat Lunak'),(3,2,'Manajemen'),(4,3,'Hukum'),(5,4,'Argoteknologi');
/*!40000 ALTER TABLE `program_studi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `standard`
--

DROP TABLE IF EXISTS `standard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `standard` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `pegawai_id` int(6) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_standard_pegawai` (`pegawai_id`),
  CONSTRAINT `fk_standard_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `standard`
--

LOCK TABLES `standard` WRITE;
/*!40000 ALTER TABLE `standard` DISABLE KEYS */;
/*!40000 ALTER TABLE `standard` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-16 15:44:00
