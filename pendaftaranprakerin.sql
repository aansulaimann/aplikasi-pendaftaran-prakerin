# Host: localhost  (Version 5.5.5-10.3.16-MariaDB)
# Date: 2022-06-08 18:22:09
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "tb_jurusan"
#

DROP TABLE IF EXISTS `tb_jurusan`;
CREATE TABLE `tb_jurusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(255) DEFAULT NULL,
  `singkatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_jurusan"
#

INSERT INTO `tb_jurusan` VALUES (1,'Rekayasa Perangkat Lunak','RPL');

#
# Structure for table "tb_lowongan"
#

DROP TABLE IF EXISTS `tb_lowongan`;
CREATE TABLE `tb_lowongan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lowongan` varchar(255) DEFAULT NULL,
  `kualifikasi` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_lowongan"
#

INSERT INTO `tb_lowongan` VALUES (1,'Junior Mobile Apps','bisa nogoding');

#
# Structure for table "tb_menyetujui"
#

DROP TABLE IF EXISTS `tb_menyetujui`;
CREATE TABLE `tb_menyetujui` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `pengirim_email` varchar(255) DEFAULT NULL,
  `isi_email` text DEFAULT NULL,
  `subjek` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_menyetujui"
#


#
# Structure for table "tb_siswa"
#

DROP TABLE IF EXISTS `tb_siswa`;
CREATE TABLE `tb_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `nisn` char(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `no_telp` char(13) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `asal_sekolah` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `prestasi` text DEFAULT NULL,
  `sertifikat` varchar(255) DEFAULT NULL,
  `pilihan_lowongan` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_siswa"
#

INSERT INTO `tb_siswa` VALUES (1,'Aan Sulaiman','098765432','aan@mail.com','Rekayasa prangkat lunak','098765432','2022-06-08','SMK NEGRI JAKARTA','','mobile apps competition','','Junior video editor','2022-06-08',1);

#
# Structure for table "tb_user"
#

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_user"
#

INSERT INTO `tb_user` VALUES (1,'aan@mail.com','aan123','$2y$10$KdwounlSRWSxJU09B6KfvuSyiqt1givKvJFF27Ifm3TnuEeTVQHSW','user'),(2,'admin@admin.com','aan123','$2y$10$KdwounlSRWSxJU09B6KfvuSyiqt1givKvJFF27Ifm3TnuEeTVQHSW','admin');
