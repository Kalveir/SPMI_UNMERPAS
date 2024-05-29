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
-- Table structure for table `bobot`
--

DROP TABLE IF EXISTS `bobot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bobot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indikator_id` int(11) DEFAULT NULL,
  `bobot` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_bobot_indikator` (`indikator_id`),
  CONSTRAINT `fk_bobot_indikator` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bobot`
--

LOCK TABLES `bobot` WRITE;
/*!40000 ALTER TABLE `bobot` DISABLE KEYS */;
INSERT INTO `bobot` VALUES (1,1,20),(2,2,20),(3,3,25),(4,4,25),(5,5,10),(6,6,20),(7,7,20),(8,8,30),(9,9,30),(10,10,30),(11,11,15),(12,12,30),(13,13,25),(14,14,40),(15,15,20),(16,16,40),(17,17,25),(18,18,30),(19,19,30),(20,20,15),(21,21,30),(22,22,30),(23,23,20),(24,24,20),(25,25,40),(26,26,20),(27,27,20),(28,28,20),(29,29,30),(30,30,30),(31,31,20),(32,32,20),(33,33,20),(34,34,30),(35,35,20),(36,36,20),(37,37,60),(38,38,40),(39,39,25),(40,40,25),(41,41,25),(42,42,25),(43,43,60),(44,44,40),(45,45,60),(46,46,40),(47,47,60),(48,48,40),(49,49,40),(50,50,40),(51,51,20),(52,52,50),(53,53,50),(54,54,60),(55,55,40),(56,56,60),(57,57,40),(58,58,25),(59,59,25),(60,60,25),(61,61,25),(62,62,60),(63,63,40),(64,64,60),(65,65,40),(66,66,50),(67,67,50),(68,68,30),(69,69,40),(70,70,30),(71,71,60),(72,72,40);
/*!40000 ALTER TABLE `bobot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookdocs`
--

DROP TABLE IF EXISTS `bookdocs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookdocs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `standard_id` int(11) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis_file` varchar(255) DEFAULT NULL,
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `standard_id` int(11) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `visi_misi` text DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `ruanglingkup` text DEFAULT NULL,
  `definisi_istilah` text DEFAULT NULL,
  `tahapan` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `standard_id` int(11) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `visi_misi` text DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `rasional` text DEFAULT NULL,
  `subjek` text DEFAULT NULL,
  `definisi_istilah` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fakultas`
--

LOCK TABLES `fakultas` WRITE;
/*!40000 ALTER TABLE `fakultas` DISABLE KEYS */;
INSERT INTO `fakultas` VALUES (1,'Teknologi Informasi'),(3,'Ekonomi'),(4,'Hukum'),(5,'Pertanian');
/*!40000 ALTER TABLE `fakultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indikator`
--

DROP TABLE IF EXISTS `indikator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indikator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `standard_id` int(11) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `strategi` varchar(255) DEFAULT NULL,
  `indikator` varchar(255) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `target` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_indikator_standard` (`standard_id`),
  KEY `fk_indikator_pegawai` (`pegawai_id`),
  CONSTRAINT `fk_indikator_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`),
  CONSTRAINT `fk_indikator_standard` FOREIGN KEY (`standard_id`) REFERENCES `standard` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indikator`
--

LOCK TABLES `indikator` WRITE;
/*!40000 ALTER TABLE `indikator` DISABLE KEYS */;
INSERT INTO `indikator` VALUES (1,1,1,'Kaprodi menyusun profil lulusan yang menjadi acuan dalam menyusun CP program studi.','Dekan dan Ketua Jurusan/Program Studi perlu membina hubungan dengan organisasi profesi, alumni, pemerintah, dan dunia usaha.','Profile lulusan yang menjadi acuan dalam menyusun CP program studi','%',50,1),(2,1,1,'Kaprodi menghasilkan lulusan yang cepat bekerja','Menyelenggarakan pelatihan yang berkaitan dengan proses pembelajaran bagi dosen.','Masa tunggu lulusan sampai dengan mendapatkan pekerjaan','%',50,1),(3,1,1,'Kaprodi menghasilkan lulusan yang bekerja dengan gaji yang memadai.','Ketua program studi mensosialisasikan pelaksanaan proses belajar mengajar sesuai kurikulum dan silabus masing- masing mata kuliah kepada seluruh komponen yang terlibat dalam proses pembelajaran Dosen, Tenaga Pendidik dan Mahasiswa).','Besar gaji yang diterima para lulusan pada awal bekerja','%',50,1),(4,1,1,'Kaprodi menghasilkan lulusan yang bekerja pada bidang yang sesuai dengan bidang keilmuannya.','BAU menjelaskan pada mahasiswa tentang kewajiban keuangan.','Kesesuaian bidang kerja lulusan dengan bidang ilmu Pendidikan','%',50,1),(5,1,1,'Kaprodi menghasilkan lulusan yang bekerja pada pekerjaan yang sesuai dengan tingkat pendidikannya','Dosen wali menjelaskan tentang persyaratan nilai minimal untuk kelulusan','Keselarasan vertikal antara beban pekerjaan dengan tingkat pendidipan para alumni','%',50,1),(6,2,1,'Kaprodi menyusun kurikulum perguruan tinggi (KPT) sebagai pedoman pelaksanaan pembelajaran di program studi','Perencanaan proses pembelajaran','Kurikulum perguruan tinggi (KPT) program studi','%',50,1),(7,2,1,'Kaprodi menyusun CP lulusan sesuai dengan profil lulusan yang sudah ditetapkan','Pelaksanaan proses pembelajaran','CP lulusan/CP program studi','%',50,1),(8,2,1,'Kaprodi menyusun Bahan kajian sebagai tindak lanjut dari CP lulusan yang telah ditetapkan','Pengawasan proses pembelajaran','Penyusunan bahan kajian','%',50,1),(9,2,1,'Kaprodi menyusun mata kuliah mengakomodasi bahan kajian yang telah ditetapkan','Evaluasi Proses Pembelajaran','Penyusunan mata kuliah','%',50,1),(10,3,1,'Kaprodi menyiapkan dokumen administrasi pembelajaran untuk semester berjalan','Pimpinan universitas menyelenggarakan tersedianya sarana dan prasarana pendukung proses pembelajaran yang kondusif ditingkat Universitas','Dokumen administrasi pembelajaran','%',50,1),(11,3,1,'Dosen PA mendampingi mahasiswa memprogram kegiatan kegiatan pembelajaran yang akan ditempuh pada semester berjalan','Dekan, ketua program studi menyelenggarakan koordinasi dengan dosen dan perwakilan mahasiswa untuk perencanaan, pelaksanaan dan evaluasi kegiatan pendukung proses pembelajaran yang kondusif\r\nditingkat Fakultas dan program studi','Beban pembelajaran mahasiswa pada semester berjalan','%',50,1),(12,3,1,'Dosen menyiapkan RPS dan kontrak kuliah untuk kegiatan pembelajaran yang akan diampu pada semester berjalan','Menyelenggarakan pelatihan yang berkaitan dengan proses pembelajaran bagi dosen','Dokumen/instrument persiapan pembelajaran','%',50,1),(13,3,1,'Dosen melaksanakan proses pembelajaran sesuai dengan yang terprogram dalam RPS dan kontrak kuliah.','Ketua program studi mensosialisasikan pelaksanaan proses belajar mengajar sesuai kurikulum dan silabus masing-masing mata kuliah kepada seluruh komponen yang terlibat dalam proses pembelajaran Dosen, Tenaga Pendidik dan Mahasiswa).','Proses Pembelajaran','%',50,1),(14,4,1,'Kaprodi menetapkan Teknik penilaian pembelajaran sebagai berikut: observasi, partisipasi, unjuk kerja, tes tertulis, tes lisan, angket)','Pimpinan universitas menyelenggarakan koordinasi dengan para pembantu dekan bidang akademik secara berkala.','Teknik penilaian pembelajaran','%',50,1),(15,4,1,'Kaprodi melaporkan hasil penilaian pembelajaran sesuai dengan sistem administrasi akademik.','Dekan, ketua program studi menyelenggarakan\r\nSosialisasi dan pelatihan untuk dosen yang berkaitan dengan metode dan mekanisme penilaian, prosedur penilaian, dan instrument penilaian.','Pelaporan hasil penilaian pembelajaran','%',50,1),(16,4,1,'Kaprodi menetapkan persyaratan kelulusan mahasiswa untuk dapat dinyatakan lulus dalam yudisium;','Mengintegrasikan data hasil penilaian kedalam Sistem Informasi Akademik universitas.','Persyaratan kelulusan yudisium mahasiswa','%',50,1),(17,5,1,'Kaprodi menjamin jumlah dosen tetap program studi mencukupi untuk kebutuhan pengembangan program studi;','Mendorong dan membuka kesempatan seluas-luasnya bagi Dosen dan tenaga kependidikan untuk melanjutkan pendidikan hingga jenjang doktor melalui program beasiswa internal maupun eksternal.','Jumlah dosen tetap program studi yang ber-NIDN','%',50,1),(18,5,1,'Kaprodi menjamin kualifikasi akademik (Pendidikan) dosen tetap program studi memenuhi persyaratan dalam pengembangan program studi;','Membuat blue print pembinaan karier dosen dan tenaga kependidikan dalam jangka panjang.','Jumlah dosen tetap program studi yang berijazah doctor linier dengan bidang studi','%',50,1),(19,5,1,'Kaprodi menjamin kualifikasi jabatan akademik fungsional dosen tetap program studi memenuhi peresyaratan dalam\r\npengembangan program studi;','Menyelenggarakan pelatihan secara periodic bagi dosen\r\ndan tenaga kependidikan untuk peningkatan kompetensi yang dibutuhkan.','Jumlah dosen tetap program studi yang berjabatan fungsional dosen lektor kepala atau professor','%',50,1),(20,5,1,'Kaprodi memberikan tugas pelaksanaan tridharma perguruan tinggi kepada dosen teap program studi untuk pengembangan karirnya;','.','Besar tugas/beban dosen dalam melaksanakan tridharma perguruan tinggi','%',50,1),(21,6,1,'Program studi menjamin tersedianya sarana prasarana pembelajaran yaitu ruang kelas, laboratorium, perpustakaan, ruang interaksi di luar perkuliahan, ruang seminar, ruang lobi, Kerjasama dengan mitra terkait pemenuhan sarana dan prasarana pembelajaran','Pimpinan universitas menyelenggarakan koordinasi dengan para dekan secara berkala','Ketersediaan sarana dan prasarana pembelajaran','%',50,1),(22,6,1,'Program studi menjamin kemudahan akses terhadap sarana dan prasarana pembelajaran','Pimpinan universitas dan fakultas membentuk tim pengelola aset untuk ditugasi merancang, membangun dan memelihara sarana dan prasarana sesuai dengan standar yang ditentukan.','Kemudahan akses sarana dan prasarana pembelajaran','%',50,1),(23,6,1,'Program studi menjamin ketercukupan kebutuhan sarana dan prasarana pembelajaran;','Pimpinan universitas dan fakultas bekerjasama dengan pihak ketiga atau lembaga donor dalam penyediaan sarana dan prasarana yang kebutuhannya mendesak dan belum teralokasi anggaran dari pemerintah.','Ketercukupan sarana dan prasarana pembelajaran','%',50,1),(24,6,1,'Program studi menjamin keberlanjutan ketersedian sarana dan prasarana pembelajaran','.','Keberlanjutan sarana dan prasara pembelajaran','%',50,1),(25,7,1,'Kaprodi	menyediakan	panduan	pelaksanaan pembelajaran di lingkungan program studi','Pimpinan universitas menyelenggarakan koordinasi dengan pimpinan unit di bawahnya secara berkala untuk menjamin bahwa semua kegiatan berjalan sesuai dengan standard yang ditentukan.','Ketersediaan	panduan	pelaksanaan	pembelajaran	di lingkungan program studi','%',50,1),(26,7,1,'Kaprodi melaksanakan perencanaan pembelajaran di lingkungan program studi','Pimpinan    universitas     menyelenggarakan     pelatihan, penyegaran untuk menjaga kesetiakawanan, kerjasama dan toleransi diantara para pimpinan fakultas, program studi.','Persiapan pelaksanaan pembelajaran di awal semester','%',50,1),(27,7,1,'Kaprodi	melaksanakan	monitoring	pelaksanaan pembelajaran di lingkungan program studi','.','Monitoring pembelajaran	dilakukan pada pertengahan semester (minggu ke 8/minggu UTS)','%',50,1),(28,7,1,'Kaprodi	melaksakan	evaluasi	terhadap	pelaksanaan pembelajaran di lingkungan program studi','.','Evaluasi pelaksanaan pembelajaran','%',50,1),(29,8,1,'Kaprodi menjamin adanya anggaran untuk menunjang pelaksanaan pembelajaran,','Pimpinan universitas menyelenggarakan koordinasi yang baik dengan seluruh fakultas, lembaga dan unit-unit yang ada dalam hal perencanaan, pengelolaan dan pertanggung jawaban seluruh penerimaan dan pengeluaran dana yang ada.','Ketersediaan anggaran untuk menunjang pelaksanaan pembelajaran','%',50,1),(30,8,1,'Kaprodi menjamin lancarnya realisasi anggaran untuk menunjang pelaksanaan pembelajaran','Pimpinan universitas melalui satuan pengawas internal (SPI) secara periodik dan berkelanjutan melakukan fungsi pengawasan dan audit internal keuangan.','Kelancaran realisasi anggaran untuk menunjang pelaksanaan pembelajaran','%',50,1),(31,8,1,'Kaprodi menjamin ketercukupinya angggaran untuk menunjang pelaksanaan pembelajaran;','Dalam rangka pemenuhan standar pembiayaan, diperlukan langkah efisiensi pengeluaran dan optimalisasi penerimaan.','Ketercukupan anggaran untuk menunjang pelaksanaan pembelajaran','%',50,1),(32,8,1,'Kaprodi menjamin keberlanjutan anggaran untuk menunjang pelaksanaan pembelajaran','.','Keberlanjutan anggaran untuk menunjang pelaksanaan pembelajaran','%',50,1),(33,9,1,'Dosen mengimplementasikan hasil penelitian dalam pengayaan materi pembelajaran dan pkm','Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang penelitian.','Hasil penelelitian dosen diimplementasikan dalam pembelajaran dan pkm','%',50,1),(34,9,1,'Dosen mempublikasikan hasil penelitian pada journa/pertemuan ilmiah internasional','Menyediakan	alokasi	dana	yang	jelas,	adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.','Hasil penelitian dosen yang dipublikasikan dalam jurnal/pertemuan internasional','%',50,1),(35,9,1,'Dosen mempublikasikan hasil penelitian pada journal/pertemuan nasional','Melakukan pelatihan atau membekali sivitas akademika untuk menigkatkan kemampuan dalam melakukan kegiatan penelitian.','Hasil penelitian dosen yang dipublikasikan dalam jurnal/pertemuan nasional','%',50,1),(36,9,1,'Dosen mematenkan hasil penelitian untuk melindungi hak kekayaan intelektual','Melakukan kerja sama baik dengan lembaga eksternal seperti Perguruan Tinggi lain, Pemerintah Daerah, Industri maupun lembaga lain untuk melakukan penelitian.','Hasil penelitian dosen yang diajukan hak paten dan atau hak cipta','%',50,1),(37,10,1,'Dosen menyusun materi penelitian mengacu roadmap penelitian nasional dan roadmap institusi','Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang penelitian.','Kesesuaian materi penelitian dosen dengan roadmap research nasional dan institusi','%',50,1),(38,10,1,'Dosen	menyusun	materi	penelitian	dalam	roadmap pribadi/kelompk dosen dan dilaksanakan secara konsisten','Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.','Konsistensi dosen terhadap materi peneltian yang dilakukan','%',50,1),(39,11,1,'Dosen menyusun proposal sebagai acuan pelaksanaan penelitian','Melakukan sosialiasai Pedoman Penelitian dan Pengabdian Kepada Masyarakat Universitas Merdeka Pasuruan kepada seluruh sivitas akademika, sehingga seluruh sivitas akademika','Proposal penelitian dosen','%',50,1),(40,11,1,'Dosen menyeminarkan hasil penelitian untuk penyempurnaan laporan dan penyusunan luaran','LPPM menyusun kalender kegiatan penelitian dan mensosialisasikan kepada sivitas akademika sehingga pelaksana dapat menyusun rencana kegiatan sesuai dengan kalender kegiatan LPPM.','Seminar hasil penelitian dosen','%',50,1),(41,11,1,'Dosen menyusun luaran hasil penelitian','Melakukan pelatihan atau Workshop untuk meningkatkan kempampuan sivitas akademika dalam melakukan proses kegiatan penelitian.','Penyusunan luaran hasil penelitian dosen','%',50,1),(42,11,1,'Dosen mempertanggungjawabkan pelaksanaan penelitian baik secara materi maupun anggaran','Universitas merdeka Pasuruan menciptakan iklim yang kondusif agar dosen dan mahasiswa secara kreatif dan inovatif menyediaka peran dan fungsinya sehingga pelaku utama penelitian yang bermutu dan terencana.','Pertanggungjawaban pelaksanaan penelitian dosen','%',50,1),(43,12,1,'Kaprodi	melakukan	monitoring	dan	evaluasi	pelaksanaan penelitian dosen','Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang penelitian.','Kegiatan	monitoring dan evaluasi pelaksanaan penelitian dosen','%',50,1),(44,12,1,'Kaprodi melaporkan hasil evaluasi pelaksanaan penelitian pada rapat pleno program studi','Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.','Laporan hasil evaluasi pelaksanaan penelitian dosen','%',50,1),(45,13,1,'Dosen berusaha mempunyai rekam jejak sebagai gambaran kompetensi sebagai peneliti','Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang penelitian.','Rekam jejak dosen sebagai peneliti','%',50,1),(46,13,1,'Dosen memiliki sertifikasi kompetensi atau rekognisi dibidang penelitian','Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.','Kepemilikan sertifikat kompetensi atau rekognisi di bidang penelitian','%',50,1),(47,14,1,'Kaprodi menjamin tersedianya sarana dan prasara pelaksanaan penelitian','Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang penelitian.','Ketersediaan sarana dan prasarana penelitian','%',50,1),(48,14,1,'Kaprodi menjamin kemudahan akses sarana dan prasarana\r\npelaksanaan penelitian','Menyediakan	alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari Universitas.','Kemudahan akses sarana dan prasarana penelitian','%',50,1),(49,15,1,'Kaprodi menyusun rencana induk pengembangan penelitian sebagai acuan bagi dosen dalam pelaksanaan penelitian','Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang penelitian.','Keberadaan rencana induk penelitian prodi','%',50,1),(50,15,1,'Kaprodi mengusahakan adanya pedoman pelaksanaan penelitian bagi dosen.','Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari Universitas.','Keberadaan pedoman pelaksanaan penelitian dosen','%',50,1),(51,15,1,'Kaprodi	melakukan	evaluasi	pelaksanaan	penelitian	di lingkungan prodi','Melakukan pelatihan atau membekali sivitas akademika untuk meningkatkan kemampuan dalam melakukan kegiatan penelitian.','Kaprodi melakukan evaluasi atas ketercapaian roadmap penelitian prodi','%',50,1),(52,16,1,'Kaprodi   menjamin	tersedianya	pembiayaan	penelitian	di lingkungan prodi','Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang penelitian.','Ketersediaan dana penelitian bagi dosen','%',50,1),(53,16,1,'Kaprodi menjamin kemudahan akses pembiayaan penelitian di lingkungan prodi','Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari Universitas.','Kemuadahan akses pembiayaan penelitian dosen','%',50,1),(54,17,1,'Dosen mengimplementasikan hasil pkm dalam pengayaan materi pembelajaran dan penelitian','Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang Pengabdian Kepada Masyarakat.','Hasil pkm dosen diimplementasikan dalam pembelajaran dan pkm','%',50,1),(55,17,1,'Dosen mempublikasikan hasil pkm pada journal/pertemuan nasional','Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.','Hasil pkm dosen yang dipublikasikan dalam jurnal/pertemuan nasional','%',50,1),(56,18,1,'Dosen menyusun materi pkm mengacu roadmap pkm nasional dan roadmap institusi','Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang Pengabdian Kepada Masyarakat.','Kesesuaian materi pkm dosen dengan roadmap pkm institusi','%',50,1),(57,18,1,'Dosen menyusun materi pkm dalam roadmap pribadi/kelompok dosen dan dilaksanakan secara konsisten','Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.','Konsistensi dosen terhadap materi pkm yang dilakukan','%',50,1),(58,19,1,'Dosen menyusun proposal sebagai acuan pelaksanaan pkm','Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang Pengabdian Kepada Masyarakat.','Proposal pkm dosen','%',50,1),(59,19,1,'Dosen menyeminarkan hasil pkm untuk penyempurnaan laporan dan penyusunan luaran;','Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.','Seminar hasil pkm dosen','%',50,1),(60,19,1,'Dosen menyusun luaran hasil pkm','Melakukan pelatihan atau membekali sivitas akademika untuk menigkatkan kemampuan dalam melakukan kegiatan Pengabdian Kepada Masyarakat.','Penyusunan luaran hasil pkm dosen','%',50,1),(61,19,1,'Dosen mempertanggungjawabkan pelaksanaan pkm baik secara materi maupun anggaran','Melakukan kerja sama baik dengan lembaga eksternal seperti Perguruan Tinggi lain, Pemerintah Daerah, Industri maupun lembaga lain untuk melakukan Pengabdian Kepada Masyarakat.','Pertanggungjawaban pelaksanaan pkm dosen','%',50,1),(62,20,1,'Kaprodi melakukan monitoring dan evaluasi pelaksanaan pkm dosen','Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang Pengabdian Kepada Masyarakat.','Kegiatan monitoring dan evaluasi pelaksanaan pkm dosen','%',50,1),(63,20,1,'Kaprodi melaporkan hasil evaluasi pelaksanaan pkm pada rapat pleno program studi','Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.','Laporan hasil evaluasi pelaksanaan pkm dosen','%',50,1),(64,21,1,'Dosen berusaha mempunyai rekam jejak sebagai gambaran kompetensi sebagai peneliti','Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang Pengabdian Kepada Masyarakat.','Rekam jejak dosen sebagai pelaksana pkm','%',50,1),(65,21,1,'Dosen memiliki sertifikasi kompetensi atau rekognisi dibidang Pkm','Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.','Kepemilikan sertifikat kompetensi atau rekognisi di bidang pkm','%',50,1),(66,22,1,'Kaprodi menjamin tersedianya sarana dan prasara pelaksanaan pkm','Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang Pengabdian Kepada Masyarakat.','Ketersediaan sarana dan prasarana pkm','%',50,1),(67,22,1,'Kaprodi menjamin kemudahan akses sarana dan prasarana pelasanaan pkm','Menyediakan alokasi dana yang jelas, untuk pengembangan sarana dan prasarana Pengabdian Kepada Masyarakat yang juga dapat digunakan untuk proses pembelajaran dan kegiatan\r\npenelitian.','Kemudahan akses sarana dan prasarana pkm','%',50,1),(68,23,1,'Kaprodi menyusun rencana induk pengembangan pkm sebagai acuan bagi dosen dalam pelaksanaan pkm','Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang Pengabdian Kepada Masyarakat.','Keberadaan rencana induk pkm prodi','%',50,1),(69,23,1,'Kaprodi mengusahakan adanya pedoman pelaksanaan pkm bagi dosen','Menyediakan alokasi   dana   yang   jelas,   adanya   kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.','Keberadaan pedoman pelaksanaan pkm dosen','%',50,1),(70,23,1,'Kaprodi melakukan evaluasi pelaksanaan pkm di lingkungan Prodi','Melakukan pelatihan atau membekali sivitas akademika untuk menigkatkan kemampuan dalam melakukan kegiatan Pengabdian Kepada Masyarakat.','Kaprodi melakukan evaluasi atas ketercapaian roadmap pkm prodi','%',50,1),(71,24,1,'Kaprodi menjamin tersedianya pembiayaan pkm di lingkungan prodi','Membuat perencanaan, berupa roadmap serta rencana jangka panjang, menengah dan pendek dibidang Pengabdian Kepada Masyarakat.','Ketersediaan dana pkm bagi dosen','%',50,1),(72,24,1,'Kaprodi menjamin kemudahan akses pembiayaan pkm di lingkungan prodi','Menyediakan alokasi dana yang jelas, adanya kegiatan monitoring terhadap kegiatan yang sedang berlangsung serta adanya dukungan dari universitas.','Kemudahan akses pembiayaan pkm dosen','%',50,1);
/*!40000 ALTER TABLE `indikator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indikator_jenis`
--

DROP TABLE IF EXISTS `indikator_jenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indikator_jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_id` int(11) DEFAULT NULL,
  `indikator_id` int(11) DEFAULT NULL,
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
-- Table structure for table `jenis`
--

DROP TABLE IF EXISTS `jenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_12_14_000001_create_personal_access_tokens_table',1),(2,'2023_12_26_031641_create_permission_tables',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(6,'App\\Models\\User',4),(11,'App\\Models\\User',3),(12,'App\\Models\\User',2),(12,'App\\Models\\User',5),(13,'App\\Models\\User',4);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nilai`
--

DROP TABLE IF EXISTS `nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indikator_id` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `nilai` int(11) DEFAULT 0,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nilai_indikator` (`indikator_id`),
  CONSTRAINT `fk_nilai_indikator` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=289 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nilai`
--

LOCK TABLES `nilai` WRITE;
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
INSERT INTO `nilai` VALUES (1,1,'Bila profile disusun mengacu pada visi, misi, dan kebutuhan stake holder',4,1),(2,1,'Bila profile disusun mengacu pada visi dan misi atau pada kebutuhan stake holder',3,1),(3,1,'Bila profile disusun tanpa acuan yang jelas',2,1),(4,1,'Bila tidak ada profile lulusan',1,1),(5,2,'Bila masa tunggu lulusan < 3 bulan',4,1),(6,2,'Bila masa tunggu lulusan > 3 – 6 bulan',3,1),(7,2,'Bila masa tunggu lulusan > 6 – 9 bulan',2,1),(8,2,'Bila masa tunggu lulusan > 9 bulan',1,1),(9,3,'Bila gaji awal > 2 UMR',4,1),(10,3,'Bila gaji awal >1,5-2 UMR',3,1),(11,3,'Bila gaji awal > 1-1,5 UMR',2,1),(12,3,'Bila gaji awal ≤ UMR',1,1),(13,4,'Bila yang erat dan sangat erat >80%',4,1),(14,4,'Bila yang erat dan sangat erat > 60 – 80%',3,1),(15,4,'Bila yang erat dan sangat erat >40 – 60%',2,1),(16,4,'Bila yang erat dan sangat erat >20 – 40%',1,1),(17,5,'Bila yang setingkat atau sama >80%',4,1),(18,5,'Bila yang setingkat atau sama > 60 – 80%',3,1),(19,5,'Bila yang setingkat atau sama >40 – 60%',2,1),(20,5,'Bila yang setingkat atau sama >20 – 40%',1,1),(21,6,'Bila penyusunan KPT mengacu pada KKNI dan melibatkan stakeholder internal dan eksternal',4,1),(22,6,'Bila penyusunan KPT mengacu pada KKNI hanya melibatkan stakeholder internal',3,1),(23,6,'Bila penyusunan KPT hanya melibatkan stakeholder internal',2,1),(24,6,'Bila penyusunan KPT tidak melibatkan pihak lain',1,1),(25,7,'Bila CP lulusan mengacu hasil kesepakatan asosiasi prodi yang sudah disahkan Menteri dan\r\nkarakteristik institusi',4,1),(26,7,'Bila CP lulusan mengacu pada kesepakatan prodi sejenis dan karakteristik institusi',3,1),(27,7,'Bila CP lulusan menjabarkan sendiri dari kebutuhan pasar dan karakteristik institusi',2,1),(28,7,'Bila CP lulusan disusun tanpa acuan yang jelas',1,1),(29,8,'Bila semua CP lulusan secara sistematik telah ditentukan bahan kajiannya',4,1),(30,8,'Bila semua CP lulusan telah ditentukan bahan kajiannya',3,1),(31,8,'Bila baru 75% CP lulusan telah ditentukan bahan kajiannya',2,1),(32,8,'Bila baru sebagian CP lulusan telah ditentukan bahan kajiannya',1,1),(33,9,'Bila semua BK secara sistematik telah diakomodasi dalam mata kuliah',4,1),(34,9,'Bila semua BK lulusan telah diakomodasi dalam mata kuliah',3,1),(35,9,'Bila baru 75% BK lulusan telah diakomodasi mata kuliahnya',2,1),(36,9,'Bila penyusunan mata kuliah tidak memperhatikan BK',1,1),(37,10,'Bila pada awal semester telah disiapkan pedoman akademik, kalender akademik dan jadwal perkuliahan',4,1),(38,10,'Bila pada awal semester telah disiapkan dua diantara pedoman akademik, kalender akademik dan jadwal perkuliahan',3,1),(39,10,'Bila pada awal semester telah disiapkan satu diantara pedoman akademik, kalender akademik dan jadwal perkuliahan',2,1),(40,10,'Bila tidak ada tiga-tiganya',1,1),(41,11,'Semua mahasiswa aktif memrogram KRS tepat waktu, dengan beban sks sesuai dengan ketentuan',4,1),(42,11,'Bila semua mahasiswa aktif memrogram KRS tidak tepat waktu, dengan beban sks sesuai dengan ketentuan',3,1),(43,11,'Bila semua mahasiswa aktif memrogram KRS tidak tepat waktu, dengan beban sks ada maksimum 10% mahasiswa tidak sesuai dengan ketentuan',2,1),(44,11,'Bila semua mahasiswa aktif memrogram KRS tidak tepat waktu, dengan beban sks lebih dari 10% mahasiswa tidak sesuai dengan ketentuan',1,1),(45,12,'Bila seluruh dosen mengupdate RPS dan kontrak kuliah pada awal semester',4,1),(46,12,'Bila seluruh dosen menyiapkan RPS dan kontrak kuliah namun sebagian tidak diupdate\r\npada awal semester',3,1),(47,12,'Bila sebagaian dosen (≤ 25%) tidak ada RPS dan kontrak kuliah pada awal semester',2,1),(48,12,'Bila sebagian dosen (> 25%) tidak ada RPS dan kontrak kuliah pada awal semester',1,1),(49,13,'Bila proses pembelajaran menerapkan semua bentuk pembelajaran (diskusi, praktek kerja,\r\npraktikum, magang, project research, demonstrasi, dan kuliah)',4,1),(50,13,'Bila proses pembelajaran menerapkan 5 bentuk pembelajaran (diskusi, praktek kerja,\r\npraktikum, magang, project research, demonstrasi, dan kuliah)',3,1),(51,13,'Bila proses pembelajaran menerapkan 3 bentuk pembelajaran (diskusi, praktek kerja, praktikum, magang, project research, demonstrasi, dan kuliah)',2,1),(52,13,'Bila proses pembelajaran menerapkan hanya satu bentuk pembelajaran (diskusi, praktek kerja, praktikum, magang, project research, demonstrasi, dan kuliah)',1,1),(53,14,'Bila > 75% dosen menggunakan sedikitnya 3 teknik penilaian pembelajaran',4,1),(54,14,'Bila > 50-75% dosen menggunakan sedikitnya 3 teknik penilaian pembelajaran;',3,1),(55,14,'Bila > 25-50% dosen menggunakan sedikitnya 3 teknik penilaian pembelajaran;',2,1),(56,14,'Bila ≤ 25% dosen menggunakan sedikitnya 3 teknik penilaian pembelajaran;',1,1),(57,15,'Bila entry nilai oleh dosen, penerbitan KHS dan penerbitan transkrip nilai lulusan sudah terintegrasi dilakukan secara on line;',4,1),(58,15,'Bila baru dua diantara entry nilai oleh dosen, penerbitan KHS dan penerbitan transkrip nilai lulusan sudah terintegrasi dilakukan secara on line;',3,1),(59,15,'Bila entry nilai oleh dosen, penerbitan KHS dan penerbitan transkrip nilai lulusan belum terintegrasi namun sudah secara on line;',2,1),(60,15,'Bila entry nilai oleh staf akademik, penerbitan KHS dan penerbitan transkrip nilai lulusan masih manual;',1,1),(61,16,'Bila persyaratan lulus yudisim mahasiswa IPK ≥ 2,75, tidak ada nilai D dan E;',4,1),(62,16,'Bila persyaratan lulus yudisim mahasiswa IPK ≥ 2,5 tidak ada nilai D dan E',3,1),(63,16,'Bila persyaratan lulus yudisim mahasiswa IPK ≥ 2,0, tidak ada nilai D dan E',2,1),(64,16,'Bila persyaratan lulus yudisim mahasiswa IPK ≥ 2,0, tidak ada E, dan masih ada toleransi adanya nilai D;',1,1),(65,17,'Bila jumlah DTPS > 10 dan rasio dengan mahasiswa 15-25',4,1),(66,17,'Bila jumlah DTPS > 7-10 dan rasio dengan mahasiswa 10-15 atau 25-35',3,1),(67,17,'Bila jumlah DTPS ≥ 5-7 dan rasio dengan mahasiswa 5-10 atau 35-45',2,1),(68,17,'Bila jumlah DTPS <5 dan rasio dengan mahasiswa <5 atau >45',1,1),(69,18,'Bila jumlah Dosen doktor > 60% DTPS',4,1),(70,18,'Bila jumlah Dosen doktor >30-60% DTPS',3,1),(71,18,'Bila jumlah Dosen doktor >0 -30% DTPS',2,1),(72,18,'Bila jumlah Dosen doctor = 0% DTPS',1,1),(73,19,'Bila jumlah LK dan professor > 60% DTPS',4,1),(74,19,'Bila jumlah LK dan professor >30-60% DTPS',3,1),(75,19,'Bila jumlah LK dan professor >0-30% DTPS',2,1),(76,19,'Bila jumlah LK dan professor = 0% DTPS',1,1),(77,20,'Bila tugas dosen 10-14 sks EWMP',4,1),(78,20,'Bila tugas dosen .>14-17 atau <10-7 sks EWMP',3,1),(79,20,'Bila tugas dosen >17 -20 atau <7 -4 sks EWMP',2,1),(80,20,'Bila tugas dosen >20 atau <4 sks EWMP',1,1),(81,21,'Bila ketersediaan jenis sarana dan prasarana pembelajaran >80-100% dari yang dibutuhkan',4,1),(82,21,'Bila ketersediaan jenis sarana dan prasarana pembelajaran >60-80% dari yang dibutuhkan tersedia',3,1),(83,21,'bila ketersediaan jenis sarana dan prasarana pembelajaran >40-60% yang dibutuhkan tersedia',2,1),(84,21,'Bila ketersediaan jenis sarana dan prasarana pembelajaran ≤ 40% dari yang dibutuhkan',1,1),(85,22,'Bila tersedia prosedur penggunaan sarana dan prasarana pembelajaran yang mudah dan sederhana;',4,1),(86,22,'Bila tersedia prosedur penggunaan sarana dan prasarana pembelajaran yang kurang fleksibel sehingga kadang dapat menganggu\r\npelaksanaan pembelajaran',3,1),(87,22,'Bila tersedia prosedur penggunaan sarana dan prasarana pembelajaran tidak konsisten sehingga sering menganggu pelaksanaan pembelajaran',2,1),(88,22,'Bila tidak ada prosedur baku dalam penggunaan sarana dan parasarana',1,1),(89,23,'Bila sarana dan prasarana dalam jumlah >80-100% mencukupi dan dalam keadaan baik siap untuk digunakan',4,1),(90,23,'Bila sarana dan prasarana dalam jumlah >60- 80% mencukupi dan dalam keadaan baik siap untuk digunakan',3,1),(91,23,'Bila sarana dan prasarana dalam jumlah >40- 60% mencukupi dan dalam keadaan baik siap untuk digunakan',2,1),(92,23,'Bila sarana dan prasarana dalam jumlah ≤ 40% mencukupi dan dalam keadaan baik siap untuk digunakan',1,1),(93,24,'Bila ada perawatan rutin dan rencana investasi pengembangan sarana dan parasarana',4,1),(94,24,'Bila ada perawatan rutin dan pengembangan tergantung hibah/bantuan eksternal',3,1),(95,24,'Bila ada perawatan rutin,  namun tidak ada pengembangan',2,1),(96,24,'Bila tidak ada perawatan rutin dan tidak ada pengembangan',1,1),(97,25,'Bila panduan pelaksanaan pembelajarandi program studi memuat semua aspek pembelajaran tersedia sebelum pembelajaran semester dimulai,',4,1),(98,25,'Bila panduan pelaksanaan pembelajaran program studi memuat sebagian besar aspek pembelajaran tersedia sebelum pembelajaran semester dimulai,',3,1),(99,25,'Bila Panduan pelaksanaan pembelajaran parsial tersedia pada saat kegiatan pembelajaran akan dimulai',2,1),(100,25,'Bila tidak ada panduan pembelajaran',1,1),(101,26,'Bila ploting dosen pengampu dan jadwal kuliah sudah disosialisasikan sebelum masa program KRS;',4,1),(102,26,'Bila ploting dosen pengampu dan jadwal kuliah baru disosialisasikan pada masa program KRS;',3,1),(103,26,'Bila ploting dosen pengampu dan jadwal kuliah tidak pernah disosialisasikan',2,1),(104,26,'Bila ploting dosen pengampu dan jadwal kuliah masih	berubah-ubah sampai pembelajaran dimulai;',1,1),(105,27,'Bila jumlah tatap muka dosen 100% dan pelaksanaan pembelajaran sesuai RPS',4,1),(106,27,'Bila jumlah tatap muka dosen 100% dan pelaksanaan pembelajaran ada yang tidak sesuai RPS',3,1),(107,27,'Bila jumlah tatap muka dosen <100% dan pelaksanaan pembelajaran ada yang tidak sesuai RPS',2,1),(108,27,'Bila tidak dilakukan monitoring pelaksanaan pembelajaran',1,1),(109,28,'Bila pembelajaran telah dievaluasi (dengan angket), data telah dianalisis dan rata-rata skor dosen > 3,60',4,1),(110,28,'Bila pembelajaran telah dievaluasi (dengan angket), data telah dianalisis dan rata-rata skor dosen 3,00 - 3,60',3,1),(111,28,'Bila pembelajaran telah dievaluasi (dengan angket) namun data belum dianalisis atau telah dianalisis rata-rata skor dosen < 3,00',2,1),(112,28,'Bila pembelajaran tidak dilakukan evaluasi dengan angket, atau tidak dilakukan evaluasi sama sekali',1,1),(113,29,'Bila dana untuk pelaksanaan pembelajaran sudah masuk dalam agenda kerja tahunan dan telah mempunyai mata anggaran yang tetap (baku)',4,1),(114,29,'Bila dana untuk pelaksanaan pembelajaran sudah masuk dalam agenda kerja tahunan dan masuk dalam mata anggaran tentatif',3,1),(115,29,'Bila dana untuk pelaksanaan pembelajaran belum masuk dalam agenda kerja tahunan dan belum mempunyai mata anggaran tersendiri',2,1),(116,29,'Bila anggaran untuk pelaksanaan pembelajaran tidak masuk dalam perencanaan kegiatan institusi',1,1),(117,30,'Bila tersedia prosedur pencairan anggaran pembelajaran yang mudah dan sederhana;',4,1),(118,30,'Bila tersedia prosedur pencairan anggaran pembelajaran yang kurang fleksibel sehingga kadang dapat menganggu pelaksanaan pembelajaran',3,1),(119,30,'Bila tersedia prosedur pencairan anggaran pembelajaran tidak konsisten sehingga sering menganggu pelaksanaan pembelajaran',2,1),(120,30,'Bila tidak ada prosedur baku dalam pencairan anggaran pembelajaran sehingga pelaksanaan pembelajaran terganggu',1,1),(121,31,'Bila >80-100% kebutuhan anggaran yang diusulkan disetujui dan direalisasikan',4,1),(122,31,'Bila > 60-80% kebutuhan anggaran yang diusulkan disetujui dan direalisasikan',3,1),(123,31,'Bila >40- 60% kebutuhan anggaran yang diusulkan disetujui dan direalisasikan',2,1),(124,31,'Bila ≤ 40% kebutuhan anggaran yang diusulkan disetujui dan direalisasikan',1,1),(125,32,'Bila ada usaha pengembangan sumber pendanaan dari kegiatan pembelajaran dan bersumber selain dari mahasiswa;',4,1),(126,32,'Bila ada usaha pengembangan sumber pendanaan yang bersumber selain dari mahasiswa;',3,1),(127,32,'bila sumber pendanaan anggaran program studi selama 5 tahun terakhir stabil tidak pewrnah defisit;',2,1),(128,32,'Bila sumber pendanaan tidak stabil tidak bisa menjamin terpenuhinya dana yang sudah dianggarkan',1,1),(129,33,'Bila > 75 % hasil penelelitian dosen diimplementasikan dalam pembelajaran dan pkm',4,1),(130,33,'Bila > 50-75% hasil penelelitian dosen diimplementasikan dalam pembelajaran dan pkm',3,1),(131,33,'Bila > 25 -50% hasil penelelitian dosen diimplementasikan dalam pembelajaran dan pkm',2,1),(132,33,'Bila ≤ 25% hasil penelelitian dosen diimplementasikan dalam pembelajaran dan pkm',1,1),(133,34,'Bila > 75% hasil penelitian dipublikasikan dalam jurnal/pertemuan internasional',4,1),(134,34,'Bila > 50-75% hasil penelitian dipublikasikan dalam jurnal/pertemuan internasional',3,1),(135,34,'Bila > 25-50% hasil penelitian dipublikasikan dalam jurnal/pertemuan internasional',2,1),(136,1,'Bila ≤ 25% hasil penelitian dipublikasikan dalam jurnal/pertemuan internasional',1,1),(137,35,'Bila > 75% hasil penelitian dipublikasikan dalam jurnal/pertemuan nasional',4,1),(138,35,'Bila > 50-75% hasil penelitian dipublikasikan dalam jurnal/pertemuan nasional',3,1),(139,35,'Bila > 25-50% hasil penelitian dipublikasikan dalam jurnal/pertemuan nasional',2,1),(140,35,'Bila ≤ 25% hasil penelitian dipublikasikan dalam jurnal/pertemuan nasional',1,1),(141,36,'Bila > 75% hasil penelitian diajukan hak paten dan atau hak cipta',4,1),(142,36,'Bila > 50-75% hasil penelitian diajukan hak paten dan atau hak cipta',3,1),(143,36,'Bila > 25-50% hasil penelitian diajukan hak paten dan atau hak cipta',2,1),(144,36,'Bila ≤ 25% hasil penelitian diajukan hak paten dan atau hak cipta',1,1),(145,37,'Bila materi penelitian >75% sesuai dengan roadmap research nasional dan institusi',4,1),(146,37,'Bila materi penelitian >50-75% sesuai dengan roadmap research nasional dan institusi',3,1),(147,37,'Bila materi penelitian > 25-50% sesuai dengan roadmap research nasional dan institusi',2,1),(148,37,'Bila materi penelitian ≤25% sesuai dengan roadmap research nasional dan institusi',1,1),(149,38,'Bila >75% penelitian dosen sesuai/konsisten dengan roadmap penelitian dosen yang bersangkutan;',4,1),(150,38,'Bila >50-75% penelitian dosen sesuai/konsisten dengan roadmap penelitian dosen yang bersangkutan',3,1),(151,38,'Bila >25-50% penelitian dosen sesuai/konsisten dengan roadmap penelitian dosen yang bersangkutan',2,1),(152,38,'Bila ≤25% penelitian dosen sesuai/konsisten dengan roadmap penelitian dosen yang bersangkutan',1,1),(153,39,'Bila setiap akan melakukan penelitian proposal disetujui program studi dan diseminarkan untuk mencari masukan dan sinkronisasi dengan program institusi',4,1),(154,39,'Bila setiap akan melakukan penelitian proposal disetujui program studi namun tidak harus diseminarkan untuk mencari masukan dan sinkronisasi dengan program institusi',3,1),(155,39,'Bila setiap akan melakukan proposal disetujui program studi	namun	tidak	diseminarkan	untuk	mencari masukan dan sinkronisasi dengan program institusi',2,1),(156,39,'Bila setiap akan melakukan penelitian proposal tidak dikoordinasikan dengan program studi',1,1),(157,40,'Bila >75% hasil penelitian diseminarkan untuk mendapatkan masukan dan koreksi',4,1),(158,40,'Bila > 50-75% hasil penelitian diseminarkan untuk mendapatkan masukan dan koreksi',3,1),(159,40,'Bila >25-50% hasil penelitian diseminarkan untuk mendapatkan masukan dan koreksi',2,1),(160,40,'Bila ≤25% hasil penelitian diseminarkan untuk mendapatkan masukan dan koreksi',1,1),(161,41,'Bila >75% penelitian ada luarannya (publikasi, TTG,HaKi dll)',4,1),(162,41,'Bila >50-75% penelitian ada luarannya (publikasi, TTG,HaKi dll)',3,1),(163,41,'Bila >25-50% penelitian ada luarannya (publikasi, TTG, HaKi dll)',2,1),(164,41,'Bila ≤25% penelitian ada luarannya (publikasi, TTG,HaKi dll)',1,1),(165,42,'Bila >75% penelitian dosen ada laporan pelaksanaan penelitian	dan pertanggungjawaban	anggaran penelitian.',4,1),(166,42,'Bila >50-75% penelitian dosen ada laporan pelaksanaan penelitian dan pertanggungjawaban anggaran penelitian',3,1),(167,42,'Bila >25-50% penelitian dosen ada laporan pelaksanaan penelitian dan pertanggungjawaban anggaran penelitian',2,1),(168,42,'Bila ≤25% penelitian dosen ada laporan pelaksanaan penelitian dan pertanggungjawaban anggaran penelitian',1,1),(169,43,'Bila	>75% penelitian dosen hasil monev oleh prodi/reviewer dinyatakan memadai/layak',4,1),(170,43,'Bila >50-75% penelitian dosen hasil monev oleh prodi/reviewer dinyatakan memadai/layak',3,1),(171,43,'Bila >25-50% penelitian dosen hasil monev oleh prodi/reviewer dinyatakan memadai/layak',2,1),(172,43,'Bila ≤25% penelitian dosen hasil monev oleh prodi/reviewer dinyatakan memadai/layak',1,1),(173,44,'Bila hasil monev penelitian diumumkan dan ditindaklanjuti untuk perbaikan penelitian yang akan datang;',4,1),(174,44,'Bila hasil monev penelitian diumumkan dan tindak lanjutnya tidak dimonitor;',3,1),(175,44,'Bila hasil monev penelitian tidak diumumkan kepada peneliti;',2,1),(176,44,'Bila monev penelitian tidak jelas',1,1),(177,45,'Bila dosen mempunyai publikasi hasil penelitian dalam jurnal/buku referensi/monograf/hak paten rata- rata ≥3',4,1),(178,45,'Bila dosen mempunyai publikasi hasil penelitian dalam jurnal/buku referensi/monograf/hak paten rata- rata ≥2',3,1),(179,45,'Bila dosen mempunyai publikasi hasil penelitian dalam jurnal/buku referensi/monograf/hak paten rata- rata ≥1',2,1),(180,45,'bila dosen mempunyai publikasi hasil penelitian dalam jurnal/buku referensi/monograf/hak paten rata-rata <1',1,1),(181,46,'Bila >50% dosen mempunyai sertifikat kompetensi dan pernah diundang sebagai narasumber dalam pelaksanaan penelitian',4,1),(182,46,'Bila >50% dosen mempunyai sertifikat kompetensi atau pernah diundang sebagai narasumber dalam pelaksanaan penelitian',3,1),(183,46,'Bila ada dosen yang mempunyai sertifikat kompetensi atau pernah diundang sebagai narasumber dalam pelaksanaan penelitian',2,1),(184,46,'Bila tidak ada dosen yang mempunyai sertifikat kompetensi atau pernah diundang sebagai narasumber dalam pelaksanaan penelitian.',1,1),(185,47,'Bila ketersediaan jenis sarana dan prasarana penelitian >80-100% dari yang dibutuhkan',4,1),(186,47,'Bila ketersediaan jenis sarana dan prasarana penelitian >60-80% dari yang dibutuhkan tersedia',3,1),(187,47,'Bila ketersediaan jenis sarana dan prasarana penelitian >40-60% yang dibutuhkan tersedia',2,1),(188,47,'Bila ketersediaan jenis sarana dan prasarana penelitian ≤ 40% dari yang dibutuhkan',1,1),(189,48,'Bila tersedia prosedur penggunaan sarana dan prasarana penelitian yang mudah dan sederhana;',4,1),(190,48,'Bila tersedia prosedur penggunaan sarana dan prasarana penelitian yang kurang fleksibel sehingga kadang dapat menganggu pelaksanaan penelitian',3,1),(191,48,'Bila tersedia prosedur penggunaan sarana dan prasarana penelitian tidak konsisten sehingga sering menganggu pelaksanaan penelitian',2,1),(192,48,'Bila tidak ada prosedur baku dalam penggunaan sarana dan parasarana',1,1),(193,49,'Bila telah disusun rencana induk penelitian prodi, disahkan (dituangkan dalam SK) dan disosialisasikan kepada seluruh dosen;',4,1),(194,49,'Bila telah disusun rencana induk penelitian prodi, tidak disahkan (dituangkan dalam SK) dan disosialisasikan kepada seluruh dosen',3,1),(195,49,'Bila telah disusun rencana induk penelitian prodi, tidak disahkan (dituangkan dalam SK) dan tidak disosialisasikan kepada',2,1),(196,49,'Bila belum disusun rencana induk penelitian prodi',1,1),(197,50,'Bila telah disusun pedoman pelaksanaan penelitian prodi, disahkan (dituangkan dalam SK) dan disosialisasikan kepada seluruh dosen;',4,1),(198,50,'Bila telah disusun pedoman pelaksanaan penelitian prodi, tidak disahkan (dituangkan dalam SK) dan disosialisasikan kepada seluruh dosen',3,1),(199,50,'Bila telah disusun pedoman pelaksanaan penelitian prodi, tidak disahkan (dituangkan dalam SK) dan tidak disosialisasikan kepada dosen',2,1),(200,50,'Bila belum disusun pedoman pelaksanaan penelitian prodi',1,1),(201,51,'Bila hasil evaluasi ketercapaian roapmap penelitian prodi diumumkan dan ditindaklanjuti ;',4,1),(202,51,'Bila hasil evaluasi ketercapaian roapmap penelitian prodi diumumkan namun tindak lanjutnya tidak jelas',3,1),(203,51,'Bila hasil evaluasi ketercapaian roapmap penelitian prodi tidak diumumkan',2,1),(204,51,'Bila evaluasi ketercapaian roapmap penelitian prodi tidak dilakukan;',1,1),(205,52,'Bila >75% pendanaan penelitian dosen berasal dari eksternal Unmer Pasuruan',4,1),(206,52,'Bila > 50-75% pendanaan penelitian dosen berasal dari eksternal Unmer Pasuruan',3,1),(207,52,'Bila >25-50% pendanaan penelitian dosen berasal dari eksternal Unmer Pasuruan',2,1),(208,52,'Bila ≤25% pendanaan penelitian dosen berasal dari eksternal Unmer Pasuruan',1,1),(209,53,'Bila ada sosialisasi panduan dan Lembaga memfasilitasi untuk akses pendanaan eksternal dengan menyediakan dana pendamping',4,1),(210,53,'Bila ada sosialisasi panduan dan Lembaga memfasilitasi untuk akses pendanaan eksternal namun tidak menyediakan dana pendamping.',3,1),(211,53,'Bila hanya ada sosialisasi panduan akses dana eksternal (misalnya hibah)',2,1),(212,53,'Bila tidak pernah ada sosialisasi panduan akses dana eksternal',1,1),(213,54,'Bila > 75 % hasil pkm dosen diimplementasikan dalam pembelajaran dan penelitian',4,1),(214,54,'Bila > 50-75% hasil pkm dosen diimplementasikan dalam pembelajaran dan penelitian',3,1),(215,54,'Bila > 25 -50% hasil pkm dosen diimplementasikan dalam pembelajaran dan penelitian',2,1),(216,54,'Bila ≤ 25% hasil pkm dosen diimplementasikan dalam pembelajaran dan penelitian',1,1),(217,55,'Bila > 75% hasil pkm dipublikasikan dalam jurnal/pertemuan nasional',4,1),(218,55,'Bila > 50-75% hasil pkm dipublikasikan dalam jurnal/pertemuan nasional',3,1),(219,55,'Bila > 25-50% hasil pkm dipublikasikan dalam jurnal/pertemuan nasional',2,1),(220,55,'Bila ≤ 25% hasil pkm dipublikasikan dalam jurnal/pertemuan nasional',1,1),(221,56,'Bila materi pkm >75% sesuai dengan roadmap pkm institusi',4,1),(222,56,'Bila materi pkm >50-75% sesuai dengan roadmap pkm institusi',3,1),(223,56,'Bila materi pkm > 25-50% sesuai dengan roadmap pkm institusi',2,1),(224,56,'Bila materi pkm ≤25% sesuai dengan roadmap pkm institusi',1,1),(225,57,'Bila >75% pkm dosen sesuai/konsisten dengan roadmap pkm dosen yang bersangkutan;',4,1),(226,57,'Bila >50-75% pkm dosen sesuai/konsisten dengan roadmap pkm dosen yang bersangkutan',3,1),(227,57,'Bila >25-50% pkm dosen sesuai/konsisten dengan roadmap pkm dosen yang bersangkutan',2,1),(228,57,'Bila ≤25% pkm dosen sesuai/konsisten dengan roadmap pkm dosen yang bersangkutan',1,1),(229,58,'Bila setiap akan melakukan pkm proposal disetujui program studi dan diseminarkan untuk mencari masukan dan sinkronisasi dengan program institusi',4,1),(230,58,'Bila setiap akan melakukan pkm proposal disetujui program studi namun tidak harus diseminarkan untuk mencari masukan dan sinkronisasi dengan program institusi',3,1),(231,58,'Bila setiap akan melakukan proposal disetujui program studi namun tidak diseminarkan untuk mencari masukan dan sinkronisasi dengan program institusi',2,1),(232,58,'Bila setiap akan melakukan pkm proposal tidak dikoordinasikan dengan program studi',1,1),(233,59,'Bila >75% hasil pkm diseminarkan untuk mendapatkan masukan dan koreksi',4,1),(234,59,'Bila > 50-75% hasil pkm diseminarkan untuk mendapatkan masukan dan koreksi',3,1),(235,59,'Bila >25-50% hasil pkm diseminarkan untuk mendapatkan masukan dan koreksi',2,1),(236,59,'Bila ≤25% hasil pkm diseminarkan untuk mendapatkan masukan dan koreksi',1,1),(237,60,'Bila >75% pkm ada luarannya (publikasi, TTG,HaKi dll)',4,1),(238,60,'Bila >50-75% pkm ada luarannya (publikasi, TTG, HaKi dll)',3,1),(239,60,'Bila >25-50% pkm ada luarannya (publikasi, TTG, HaKi dll)',2,1),(240,60,'Bila ≤25% pkm ada luarannya (publikasi, TTG, HaKi dll)',1,1),(241,61,'Bila >75% pkm dosen ada laporan pelaksanaan pkm dan pertanggungjawaban anggaran pkm',4,1),(242,61,'Bila >50-75% pkm dosen ada laporan pelaksanaan pkm dan pertanggungjawaban anggaran pkm',3,1),(243,61,'Bila >25-50% pkm dosen ada laporan pelaksanaan pkm dan pertanggungjawaban anggaran pkm',2,1),(244,61,'Bila ≤25% pkm dosen ada laporan pelaksanaan pkm dan pertanggungjawaban anggaran pkm',1,1),(245,62,'Bila >75% pkm dosen hasil monev oleh prodi/reviewer dinyatakan memadai/layak',4,1),(246,62,'Bila	>50-75%	pkm	dosen hasil monev oleh prodi/reviewer dinyatakan memadai/layak',3,1),(247,62,'Bila	>25-50%	pkm	dosen hasil monev	oleh prodi/reviewer dinyatakan memadai/layak',2,1),(248,62,'Bila ≤25% pkm dosen hasil monev oleh prodi/reviewer dinyatakan memadai/layak',1,1),(249,63,'Bila hasil monev pkm diumumkan dan ditindaklanjuti untuk perbaikan pkm yang akan datang;',4,1),(250,63,'Bila hasil monev pkm diumumkan dan tindak lanjutnya tidak dimonitor;',3,1),(251,63,'Bila hasil monev pkm tidak diumumkan kepada dosen;',2,1),(252,63,'Bila monev pkm tidak jelas',1,1),(253,64,'Bila dosen mempunyai publikasi hasil pkm dalam jurnal/buku referensi/monograf/hak paten rata-rata ≥3',4,1),(254,64,'Bila dosen mempunyai publikasi hasil pkm dalam jurnal/buku referensi/monograf/hak paten rata-rata ≥2',3,1),(255,64,'Bila dosen mempunyai publikasi hasil pkm dalam jurnal/buku referensi/monograf/hak paten rata-rata ≥1',2,1),(256,64,'Bila dosen mempunyai publikasi hasil pkm dalam jurnal/buku referensi/monograf/hak paten rata-rata <1',1,1),(257,65,'Bila >50% dosen mempunyai sertifikat kompetensi dan pernah diundang sebagai narasumber dalam pelaksanaan pkm',4,1),(258,65,'Bila >50% dosen mempunyai sertifikat kompetensi atau pernah diundang sebagai narasumber dalam pelaksanaan pkm',3,1),(259,65,'Bila ada dosen yang mempunyai sertifikat kompetensi atau pernah diundang sebagai narasumber dalam pelaksanaan pkm',2,1),(260,65,'Bila tidak ada dosen yang mempunyai sertifikat kompetensi atau pernah diundang sebagai narasumber dalam pelaksanaan pkm',1,1),(261,66,'Bila ketersediaan jenis sarana dan prasarana pkm >80- 100% dari yang dibutuhkan',4,1),(262,66,'Bila ketersediaan jenis sarana dan prasarana pkm >60- 80% dari yang dibutuhkan tersedia',3,1),(263,66,'Bila ketersediaan jenis sarana dan prasarana pkm >40- 60% yang dibutuhkan tersedia',2,1),(264,66,'Bila ketersediaan jenis sarana dan prasarana pkm ≤ 40% dari yang dibutuhkan',1,1),(265,67,'Bila tersedia prosedur penggunaan sarana dan prasarana pkm yang mudah dan sederhana;',4,1),(266,67,'Bila tersedia prosedur penggunaan sarana dan prasarana pkm yang kurang fleksibel sehingga kadang dapat menganggu pelaksanaan pkm',3,1),(267,67,'Bila tersedia prosedur penggunaan sarana dan prasarana pkm tidak konsisten sehingga sering menganggu pelaksanaan pkm',2,1),(268,67,'Bila tidak ada prosedur baku dalam penggunaan sarana dan parasarana',1,1),(269,68,'Bila telah disusun rencana induk pkm prodi, disahkan (dituangkan dalam SK) dan disosialisasikan kepada seluruh dosen;',4,1),(270,68,'Bila telah disusun rencana induk pkm prodi, tidak disahkan (dituangkan dalam SK) dan disosialisasikan kepada seluruh dosen',3,1),(271,68,'Bila telah disusun rencana induk pkm prodi, tidak disahkan (dituangkan dalam SK) dan tidak disosialisasikan kepada',2,1),(272,68,'Bila belum disusun rencana induk pkm prodi',1,1),(273,69,'Bila telah disusun pedoman pelaksanaan pkm prodi, disahkan (dituangkan dalam SK) dan disosialisasikan kepada seluruh dosen;',4,1),(274,69,'Bila telah disusun pedoman pelaksanaan pkm prodi, tidak disahkan (dituangkan dalam SK) dan disosialisasikan kepada seluruh dosen',3,1),(275,69,'Bila telah disusun pedoman pelaksanaan pkm prodi, tidak disahkan (dituangkan dalam SK) dan tidak disosialisasikan kepada dosen',2,1),(276,69,'Bila belum disusun pedoman pelaksanaan pkm prodi',1,1),(277,70,'Bila hasil evaluasi ketercapaian roapmap pkm prodi diumumkan dan ditindaklanjuti ;',4,1),(278,70,'Bila hasil evaluasi ketercapaian roapmap pkm prodi diumumkan namun tindaklanjutnya tidak jelas',3,1),(279,70,'Bila hasil evaluasi ketercapaian roapmap pkm prodi tidak diumumkan',2,1),(280,70,'Bila evaluasi ketercapaian roapmap pkm prodi tidak dilakukan;',1,1),(281,71,'Bila >75% pendanaan pkm dosen berasal dari eksternal Unmer Pasuruan',4,1),(282,71,'Bila > 50-75% pendanaan pkm dosen berasal dari eksternal Unmer Pasuruan',3,1),(283,71,'Bila >25-50% pendanaan pkm dosen berasal dari eksternal Unmer Pasuruan',2,1),(284,71,'Bila ≤25% pendanaan pkm dosen berasal dari eksternal Unmer Pasuruan',1,1),(285,72,'Bila ada sosialisasi panduan dan Lembaga memfasilitasi untuk akses pendanaan eksternal dengan menyediakan dana pendamping',4,1),(286,72,'Bila ada sosialisasi panduan dan Lembaga memfasilitasi untuk akses pendanaan eksternal namun tidak menyediakan dana pendamping.',3,1),(287,72,'Bila hanya ada sosialisasi panduan akses dana eksternal (misalnya hibah)',2,1),(288,72,'Bila tidak pernah ada sosialisasi panduan akses dana eksternal',1,1);
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prodi_id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pegawai_prodi` (`prodi_id`),
  CONSTRAINT `fk_pegawai_prodi` FOREIGN KEY (`prodi_id`) REFERENCES `program_studi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES (1,1,'Wijaya','wijaya@gmail.com','$2y$12$DS0DYkp7cp7BJVtjjX2DIOSBwC0EOWzZpOZ5iJq.xA/h1PgyL/Ehy',1,NULL,NULL),(2,1,'Widia','widia@gmail.com','$2y$12$180z3WcOvD2wv5eyN.lOuO7FJ22bAqqdndupRruHNuDfulm7nt/WS',1,NULL,NULL),(3,1,'Rendi','rendi@gmail.com','$2y$12$KDcJtBiD/4UtAySHsMyTZ.r4fV5FYb2oGpvbYOgWzVSgyiKG.u2cO',1,NULL,NULL),(4,1,'Rudi','rudi@gmail.com','$2y$12$VuR3lF5vzx3gYnIufBCkGOi5/LXf0hjsXRl922eBVVnViLWCmJTSK',1,NULL,NULL),(5,3,'Puput','puput@gmail.com','$2y$12$GHkBgRMmyNwV54P5nc8Xue9kwPU5DMmAUTck2h4brFLPP1N6v82EW',1,NULL,NULL);
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengisian`
--

DROP TABLE IF EXISTS `pengisian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengisian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indikator_id` int(11) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `program_studi` int(11) DEFAULT NULL,
  `audhitor` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `komentar` varchar(255) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `tanggal` varchar(15) DEFAULT NULL,
  `aksi_code` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pengisian_indikator` (`indikator_id`),
  KEY `fk_pengisian_pegawai` (`pegawai_id`),
  KEY `fk_pengisian_audhitor` (`audhitor`),
  KEY `program_studi` (`program_studi`),
  CONSTRAINT `fk_pengisian_audhitor` FOREIGN KEY (`audhitor`) REFERENCES `pegawai` (`id`),
  CONSTRAINT `fk_pengisian_indikator` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`),
  CONSTRAINT `fk_pengisian_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`),
  CONSTRAINT `pengisian_fk_prodi` FOREIGN KEY (`program_studi`) REFERENCES `program_studi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengisian`
--

LOCK TABLES `pengisian` WRITE;
/*!40000 ALTER TABLE `pengisian` DISABLE KEYS */;
INSERT INTO `pengisian` VALUES (1,1,2,1,NULL,65,NULL,2024,NULL,2),(2,2,2,1,NULL,60,NULL,2024,NULL,2),(3,3,2,1,NULL,65,NULL,2024,NULL,2),(4,4,2,1,NULL,65,NULL,2024,NULL,2),(5,5,2,1,NULL,65,NULL,2024,NULL,2),(6,6,2,1,NULL,34,NULL,2024,NULL,2),(7,7,2,1,NULL,65,NULL,2024,NULL,2),(8,8,2,1,NULL,65,NULL,2024,NULL,2),(9,9,2,1,NULL,65,NULL,2024,NULL,2),(10,10,2,1,NULL,65,NULL,2024,NULL,2),(11,11,2,1,NULL,65,NULL,2024,NULL,2),(12,12,2,1,NULL,65,NULL,2024,NULL,2),(13,13,2,1,NULL,65,NULL,2024,NULL,2),(14,14,2,1,NULL,65,NULL,2024,NULL,2),(15,15,2,1,NULL,65,NULL,2024,NULL,2),(16,16,2,1,NULL,65,NULL,2024,NULL,2),(17,17,2,1,NULL,65,NULL,2024,NULL,2),(18,18,2,1,NULL,65,NULL,2024,NULL,2),(19,19,2,1,NULL,65,NULL,2024,NULL,2),(20,20,2,1,NULL,65,NULL,2024,NULL,2),(21,21,2,1,NULL,65,NULL,2024,NULL,2),(22,22,2,1,NULL,65,NULL,2024,NULL,2),(23,23,2,1,NULL,65,NULL,2024,NULL,2),(24,24,2,1,NULL,65,NULL,2024,NULL,2),(25,25,2,1,NULL,65,NULL,2024,NULL,2),(26,26,2,1,NULL,65,NULL,2024,NULL,2),(27,27,2,1,NULL,65,NULL,2024,NULL,2),(28,28,2,1,NULL,65,NULL,2024,NULL,2),(29,29,2,1,NULL,65,NULL,2024,NULL,2),(30,30,2,1,NULL,65,NULL,2024,NULL,2),(31,31,2,1,NULL,65,NULL,2024,NULL,2),(32,32,2,1,NULL,65,NULL,2024,NULL,2),(33,33,2,1,NULL,65,NULL,2024,NULL,2),(34,34,2,1,NULL,65,NULL,2024,NULL,2),(35,35,2,1,NULL,65,NULL,2024,NULL,2),(36,36,2,1,NULL,65,NULL,2024,NULL,2),(37,37,2,1,NULL,65,NULL,2024,NULL,2),(38,38,2,1,NULL,65,NULL,2024,NULL,2),(39,39,2,1,NULL,65,NULL,2024,NULL,2),(40,40,2,1,NULL,65,NULL,2024,NULL,2),(41,41,2,1,NULL,65,NULL,2024,NULL,2),(42,42,2,1,NULL,65,NULL,2024,NULL,2),(43,43,2,1,NULL,65,NULL,2024,NULL,2),(44,44,2,1,NULL,65,NULL,2024,NULL,2),(45,45,2,1,NULL,65,NULL,2024,NULL,2),(46,46,2,1,NULL,65,NULL,2024,NULL,2),(47,47,2,1,NULL,65,NULL,2024,NULL,2),(48,48,2,1,NULL,65,NULL,2024,NULL,2),(49,49,2,1,NULL,65,NULL,2024,NULL,2),(50,50,2,1,NULL,65,NULL,2024,NULL,2),(51,51,2,1,NULL,65,NULL,2024,NULL,2),(52,52,2,1,NULL,65,NULL,2024,NULL,2),(53,53,2,1,NULL,65,NULL,2024,NULL,2),(54,54,2,1,NULL,65,NULL,2024,NULL,2),(55,55,2,1,NULL,65,NULL,2024,NULL,2),(56,56,2,1,NULL,65,NULL,2024,NULL,2),(57,57,2,1,NULL,65,NULL,2024,NULL,2),(58,58,2,1,NULL,65,NULL,2024,NULL,2),(59,59,2,1,NULL,65,NULL,2024,NULL,2),(60,60,2,1,NULL,65,NULL,2024,NULL,2),(61,61,2,1,NULL,65,NULL,2024,NULL,2),(62,62,2,1,NULL,65,NULL,2024,NULL,2),(63,63,2,1,NULL,65,NULL,2024,NULL,2),(64,64,2,1,NULL,65,NULL,2024,NULL,2),(65,65,2,1,NULL,65,NULL,2024,NULL,2),(66,66,2,1,NULL,65,NULL,2024,NULL,2),(67,67,2,1,NULL,65,NULL,2024,NULL,2),(68,68,2,1,NULL,65,NULL,2024,NULL,2),(69,69,2,1,NULL,65,NULL,2024,NULL,2),(70,70,2,1,NULL,65,NULL,2024,NULL,2),(71,71,2,1,NULL,65,NULL,2024,NULL,2),(72,72,2,1,NULL,65,NULL,2024,NULL,2),(73,1,5,3,NULL,NULL,NULL,2024,NULL,0),(74,2,5,3,NULL,NULL,NULL,2024,NULL,0),(75,3,5,3,NULL,NULL,NULL,2024,NULL,0),(77,5,5,3,NULL,NULL,NULL,2024,NULL,1),(78,4,5,3,NULL,NULL,NULL,2024,NULL,0);
/*!40000 ALTER TABLE `pengisian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengisian_berkas`
--

DROP TABLE IF EXISTS `pengisian_berkas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengisian_berkas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indikator_id` int(11) DEFAULT NULL,
  `pengisian_id` int(11) DEFAULT NULL,
  `program_studi_id` int(11) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pengisian_berkas_pegawai` (`pegawai_id`),
  KEY `fk_program_studi_id` (`program_studi_id`),
  KEY `fk_indikator_id` (`indikator_id`),
  CONSTRAINT `fk_indikator_id` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`),
  CONSTRAINT `fk_pengisian_berkas_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`),
  CONSTRAINT `fk_program_studi` FOREIGN KEY (`program_studi_id`) REFERENCES `program_studi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengisian_berkas`
--

LOCK TABLES `pengisian_berkas` WRITE;
/*!40000 ALTER TABLE `pengisian_berkas` DISABLE KEYS */;
INSERT INTO `pengisian_berkas` VALUES (1,5,77,3,5,'Penetapan','<p>kontooo</p>','177dcfc53be71f230cdc84a799e21588.lock'),(2,5,77,3,5,'Penetapan','<p>kontooo</p>','b646f5a69b7251d99fc43c13cd0e758e.txt'),(3,5,77,3,5,'Pelaksanaan','<p>najjj</p>','eb8074e521e339d01df30698241f6aed.lock');
/*!40000 ALTER TABLE `pengisian_berkas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'kelola fakultas','web','2023-12-25 20:34:01','2023-12-25 20:34:01'),(2,'kelola prodi','web','2023-12-25 21:53:25','2023-12-25 21:53:25'),(3,'kelola pegawai','web','2023-12-25 21:53:33','2023-12-25 21:53:33'),(4,'kelola jabatan','web','2023-12-25 22:51:53','2023-12-25 22:51:53'),(5,'kelola standard','web','2023-12-26 17:14:06','2023-12-26 17:14:06'),(6,'kelola bookmanual','web','2023-12-26 17:17:14','2023-12-26 17:17:14'),(7,'kelola bookstandard','web','2023-12-26 17:17:30','2023-12-26 17:17:30'),(8,'kelola bookdocs','web','2023-12-26 17:17:49','2023-12-26 17:17:49'),(9,'kelola indikator','web','2023-12-26 17:18:05','2023-12-26 17:18:05'),(11,'kelola nilai','web','2023-12-26 17:18:38','2023-12-26 17:18:38'),(12,'kelola berkas','web','2023-12-26 17:18:58','2023-12-26 17:18:58'),(14,'kelola bobot','web','2024-02-07 06:48:50','2024-02-07 06:48:50'),(15,'kelola statistik','web','2024-02-14 07:08:16','2024-02-14 07:08:16');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_studi`
--

DROP TABLE IF EXISTS `program_studi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `program_studi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fakultas_id` int(11) DEFAULT NULL,
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
INSERT INTO `program_studi` VALUES (1,1,'Teknik Informatika'),(2,1,'Rekayasa Perangkat Lunak'),(3,3,'Manajemen'),(4,4,'Hukum'),(5,5,'Agroteknologi');
/*!40000 ALTER TABLE `program_studi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(5,11),(6,1),(6,11),(7,1),(7,11),(8,1),(8,11),(9,1),(9,11),(11,1),(11,11),(12,1),(12,12),(14,1),(14,11),(15,1),(15,11);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','web','2023-12-25 20:32:45','2023-12-26 00:58:52'),(6,'Auditor Informatika','web','2024-01-06 20:24:49','2024-01-15 03:27:12'),(7,'Auditor RPL','web','2024-01-06 20:24:49','2024-01-15 03:27:24'),(8,'Auditor Manajemen','web','2024-01-06 20:24:50','2024-01-15 03:27:34'),(9,'Auditor Hukum','web','2024-01-06 20:24:50','2024-01-15 03:27:44'),(10,'Auditor Agroteknologi','web','2024-01-06 20:24:50','2024-01-15 03:27:54'),(11,'PPM','web','2024-01-17 07:32:39','2024-01-17 07:32:39'),(12,'Ketua Program Studi','web','2024-01-17 07:33:01','2024-01-17 07:33:01'),(13,'Dosen','web','2024-01-30 21:04:12','2024-01-30 21:04:12');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `standard`
--

DROP TABLE IF EXISTS `standard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `standard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pegawai_id` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_standard_pegawai` (`pegawai_id`),
  CONSTRAINT `fk_standard_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `standard`
--

LOCK TABLES `standard` WRITE;
/*!40000 ALTER TABLE `standard` DISABLE KEYS */;
INSERT INTO `standard` VALUES (1,1,'Standar Kompetensi Lulusan',1),(2,1,'Standar Isi Pembelajaran',1),(3,1,'Standar Proses Pembelajaran',1),(4,1,'Standar Penilaian Pembelajaran',1),(5,1,'Standar Dosen dan Tenaga Kependidikan',1),(6,1,'Standar Sarana Prasarana Pembelajaran',1),(7,1,'Standar Pengelolaan Pembelajaran',1),(8,1,'Standar Pembiayaan Pembelajaran',1),(9,1,'Standar Hasil Penelitian',1),(10,1,'Standar Isi Penelitian',1),(11,1,'Standar Proses Penelitian',1),(12,1,'Standar Penilaian Penelitian',1),(13,1,'Standar Peneliti',1),(14,1,'Standar Sarana Dan Prasarana Penelitian',1),(15,1,'Standar Pengelolaan Penelitian',1),(16,1,'Standar Pendanaan Dan Pembiayaan Penelitian',1),(17,1,'Standar Hasil Pengabdian Kepada Masyarakat',1),(18,1,'Standar Isi Pengabdian Kepada Masyarakat',1),(19,1,'Standar Proses Pengabdian Kepada Masyarakat',1),(20,1,'Standar Penilaian Pengabdian Kepada Masyarakat',1),(21,1,'Standar Pelaksana Pengabdian Kepada Masyarakat',1),(22,1,'Standar Sarana Dan Prasarana Pengabdian Kepada Masyarakat',1),(23,1,'Standar Pengelolaan Pengabdian Kepada Masyarakat',1),(24,1,'Standar Pendanaan Dan Pembiayaan Pengabdian Kepada Masyarakat',1);
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

-- Dump completed on 2024-02-28 12:50:37
