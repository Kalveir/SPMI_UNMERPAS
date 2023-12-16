CREATE TABLE `jabatan` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `fakultas` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `program_studi` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `fakultas_id` int(3) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_program_studi_fakultas` (`fakultas_id`),
  CONSTRAINT `fk_program_studi_fakultas` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`)
);

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
);

CREATE TABLE `standard` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `pegawai_id` int(6) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_standard_pegawai` (`pegawai_id`),
  CONSTRAINT `fk_standard_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`)
);

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
);

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
);

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
);

CREATE TABLE `jenis` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `indikator_jenis` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `jenis_id` int(3) DEFAULT NULL,
  `indikator_id` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_indikator` (`indikator_id`),
  KEY `fk_jenis` (`jenis_id`),
  CONSTRAINT `fk_indikator` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`),
  CONSTRAINT `fk_jenis` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`)
);

CREATE TABLE `nilai` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `indikator_id` int(6) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `nilai` int(3) DEFAULT 0,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nilai_indikator` (`indikator_id`),
  CONSTRAINT `fk_nilai_indikator` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`)
);

CREATE TABLE `bookdocs` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `standard_id` int(3) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_book_standard` (`standard_id`),
  CONSTRAINT `fk_book_standard` FOREIGN KEY (`standard_id`) REFERENCES `standard` (`id`)
);

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
);

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
  KEY `fk_indikator_id`(`indikator_id`),
  CONSTRAINT `fk_pengisian_berkas_pegawai` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`),
  CONSTRAINT `fk_pengisian_berkas_pindikator` FOREIGN KEY (`pengisian_id`) REFERENCES `indikator` (`id`),
  CONSTRAINT `fk_program_studi` FOREIGN KEY (`program_studi_id`) REFERENCES `program_studi` (`id`),
  CONSTRAINT `fk_indikator_id` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`)
);