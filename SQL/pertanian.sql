/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : pertanian

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2021-07-25 11:40:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `doc_serah_terima`
-- ----------------------------
DROP TABLE IF EXISTS `doc_serah_terima`;
CREATE TABLE `doc_serah_terima` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pengajuan_id` int(11) DEFAULT NULL,
  `filename` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of doc_serah_terima
-- ----------------------------
INSERT INTO `doc_serah_terima` VALUES ('1', '2107120001', '210714012910_dst_2107120001.jpeg');
INSERT INTO `doc_serah_terima` VALUES ('2', '2107120001', '210714012922_dst_2107120001.jpeg');
INSERT INTO `doc_serah_terima` VALUES ('3', '2107120001', '210714020312_dst_2107120001.jpeg');
INSERT INTO `doc_serah_terima` VALUES ('4', '2107140001', '210725111426_dst_2107140001.png');
INSERT INTO `doc_serah_terima` VALUES ('5', '2107140001', '210725111429_dst_2107140001.png');

-- ----------------------------
-- Table structure for `hasil_panen`
-- ----------------------------
DROP TABLE IF EXISTS `hasil_panen`;
CREATE TABLE `hasil_panen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_panen` int(11) DEFAULT NULL,
  `tgl_panen` date DEFAULT NULL,
  `jumlah_panen` double DEFAULT NULL,
  `jenis_panen` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hasil_panen
-- ----------------------------
INSERT INTO `hasil_panen` VALUES ('1', '7', '2021-07-22', '500', 'Berhasil');
INSERT INTO `hasil_panen` VALUES ('2', '7', '2021-07-22', '500', 'Gagal');
INSERT INTO `hasil_panen` VALUES ('3', '10', '2021-07-31', '500', 'Berhasil');
INSERT INTO `hasil_panen` VALUES ('4', '10', '2021-07-31', '500', 'Gagal');

-- ----------------------------
-- Table structure for `item`
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `nama_item` varchar(128) DEFAULT NULL,
  `id_vendor` int(11) DEFAULT NULL,
  `keterangan` varchar(258) DEFAULT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of item
-- ----------------------------
INSERT INTO `item` VALUES ('1', 'Pacul', '1', 'Pacul full besi');

-- ----------------------------
-- Table structure for `item_pengajuan`
-- ----------------------------
DROP TABLE IF EXISTS `item_pengajuan`;
CREATE TABLE `item_pengajuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pengajuan_id` int(11) NOT NULL,
  `item` varchar(64) NOT NULL,
  `qty` int(5) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of item_pengajuan
-- ----------------------------
INSERT INTO `item_pengajuan` VALUES ('2', '2107120001', 'item', '2', 'xxx', '1');
INSERT INTO `item_pengajuan` VALUES ('3', '2107140001', '1', '2', '1xx', '1');

-- ----------------------------
-- Table structure for `jenis`
-- ----------------------------
DROP TABLE IF EXISTS `jenis`;
CREATE TABLE `jenis` (
  `jenis_id` int(11) NOT NULL AUTO_INCREMENT,
  `kebutuhan` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`jenis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of jenis
-- ----------------------------
INSERT INTO `jenis` VALUES ('1', 'Alat Bajak Sawah', '2021-07-03 23:33:51', null);
INSERT INTO `jenis` VALUES ('2', 'Alat Pemotong', '2021-07-03 23:34:37', null);
INSERT INTO `jenis` VALUES ('3', 'Mesin Pompa', '2021-07-03 23:35:33', null);
INSERT INTO `jenis` VALUES ('4', 'Pupuk Tanaman', '2021-07-03 23:35:50', null);
INSERT INTO `jenis` VALUES ('5', 'Bibit Tanaman', '2021-07-03 23:36:11', null);
INSERT INTO `jenis` VALUES ('6', 'Alat Siram Tanaman', '2021-07-03 23:37:32', null);

-- ----------------------------
-- Table structure for `koperasi`
-- ----------------------------
DROP TABLE IF EXISTS `koperasi`;
CREATE TABLE `koperasi` (
  `koperasi_id` int(11) NOT NULL AUTO_INCREMENT,
  `koperasi` varchar(50) NOT NULL,
  `ketua` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telpon` varchar(16) NOT NULL,
  `foto` varchar(64) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `update` datetime DEFAULT NULL,
  `nip` varchar(64) DEFAULT NULL,
  `jabatan` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`koperasi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of koperasi
-- ----------------------------
INSERT INTO `koperasi` VALUES ('1', 'KP. BAHAGIA SLALUx', 'sandix', 'porisx', '08381111', '210725103855_1.png', '1', '2021-07-07 22:52:45', '2021-07-25 10:42:58', null, null);
INSERT INTO `koperasi` VALUES ('3', 'Dinas', 'rudi', 'jl', '0812', null, '3', '2021-07-07 22:53:59', null, null, null);
INSERT INTO `koperasi` VALUES ('15', 'Admin', '3', '3', '3', '210725070736_15.png', '17', '2021-07-25 06:43:00', '2021-07-25 10:25:57', '3', '3');

-- ----------------------------
-- Table structure for `penanaman`
-- ----------------------------
DROP TABLE IF EXISTS `penanaman`;
CREATE TABLE `penanaman` (
  `penanaman_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(20) NOT NULL,
  `deskripsi` varchar(40) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`penanaman_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4010 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of penanaman
-- ----------------------------
INSERT INTO `penanaman` VALUES ('4001', 'Tanaman Pangan', 'Padi, jagung, ketela pohon', '2021-06-26 23:42:58', '2021-06-28 21:44:53', '40029');
INSERT INTO `penanaman` VALUES ('4002', 'Kebun', 'Buah-buahan, sayuran, dan bunga-bungaan', '2021-06-26 23:42:58', '0000-00-00 00:00:00', '40029');
INSERT INTO `penanaman` VALUES ('4006', 'Padi Aceh 4', 'Padi 12', '2021-06-27 22:01:34', null, '40029');
INSERT INTO `penanaman` VALUES ('4007', 'Jalan', 'jalan aja', '2021-06-28 20:50:50', '2021-06-28 21:44:24', '40029');
INSERT INTO `penanaman` VALUES ('4008', 'Jalan belok Kanan', 'Jalan belok kanan kiri', '2021-06-28 20:52:09', '2021-06-28 20:55:34', '40029');
INSERT INTO `penanaman` VALUES ('4009', 'Padi Aceh 3', 'cara Pembuatan', '2021-06-30 10:52:30', null, '40029');

-- ----------------------------
-- Table structure for `pengajuan`
-- ----------------------------
DROP TABLE IF EXISTS `pengajuan`;
CREATE TABLE `pengajuan` (
  `pengajuan_id` int(11) NOT NULL,
  `koperasi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_proposal` date NOT NULL,
  `perihal_proposal` varchar(255) NOT NULL,
  `jenis_id` int(10) DEFAULT NULL,
  `dokumen_proposal` varchar(100) NOT NULL,
  `status_proposal` varchar(25) NOT NULL COMMENT '1:proses,2:review,3:persetujuan',
  `keterangan` varchar(128) DEFAULT NULL,
  `ket_kembali_admin` varchar(128) DEFAULT NULL,
  `push_pengajuan` int(1) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `dokumen_biaya_admin` varchar(100) DEFAULT NULL,
  `id_user_verifikasi` int(11) DEFAULT NULL,
  `tgl_verifikasi` datetime DEFAULT NULL,
  `push_admin` int(1) DEFAULT NULL,
  `keterangan_bupati` varchar(128) DEFAULT NULL,
  `dokumen_biaya_bupati` varchar(100) DEFAULT NULL,
  `id_user_verifikasi_dinas` int(11) DEFAULT NULL,
  `tgl_verifikasi_dinas` datetime DEFAULT NULL,
  `push_bupati` int(1) DEFAULT NULL,
  `tgl_seminar_kirim_bantuan` date DEFAULT NULL,
  `ket_seminar_kirim_bantuan` varchar(128) DEFAULT NULL,
  `push_seminar_kirim_bantuan` int(1) DEFAULT NULL,
  `tgl_terima_bantuan` datetime DEFAULT NULL,
  `jml_doc` double DEFAULT NULL,
  PRIMARY KEY (`pengajuan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of pengajuan
-- ----------------------------
INSERT INTO `pengajuan` VALUES ('2107120001', '1', '1', '2021-07-12', 'xxxxxx', '3', '210712113408_2107120001.jpeg', 'Done pengajuan', null, null, '1', '2021-07-12 23:32:45', '2021-07-13 00:30:37', '210713123056_bb_2107120001.jpeg', '1', '2021-07-13 00:30:56', '1', null, '210713123119_bbb_2107120001.jpeg', '1', '2021-07-14 11:59:24', '1', '2021-07-14', 'xxxx', '1', null, '3');
INSERT INTO `pengajuan` VALUES ('2107140001', '1', '1', '2021-07-14', 'xx', '4', '210725105129_2107140001.png', 'Done pengajuan', null, null, '1', '2021-07-14 21:01:38', '2021-07-25 10:52:43', '210725110327_bb_2107140001.pdf', '17', '2021-07-25 11:03:27', '1', null, '210725111304_bbb_2107140001.pdf', '3', '2021-07-25 11:13:09', '1', '2021-07-20', '', '1', null, '2');
INSERT INTO `pengajuan` VALUES ('2107210001', '1', '1', '2021-07-21', '', '3', '210725110440_2107210001.pdf', 'Proses Pengajuan', null, null, null, '2021-07-21 10:00:31', '2021-07-25 11:04:40', null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `petani`
-- ----------------------------
DROP TABLE IF EXISTS `petani`;
CREATE TABLE `petani` (
  `petani_id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1:aktive,2:tidak',
  `no_hp` varchar(16) NOT NULL,
  `koperasi_id` int(11) NOT NULL,
  `penanaman_id` int(11) NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`petani_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of petani
-- ----------------------------
INSERT INTO `petani` VALUES ('1', '32373061708900013', 'Zaelani Muhtadin Ina', 'Jalan Karang Anyar Banten', '0', '0876666', '1', '4006', '2021-07-03 09:47:30');
INSERT INTO `petani` VALUES ('2', '3274061706900013', 'Rizal Manto angin', 'Banten Maja', '0', '08566777', '1', '4001', '0000-00-00 00:00:00');
INSERT INTO `petani` VALUES ('3', '1', 'a2', 'a2', '0', '1', '1', '4009', '2021-07-06 19:47:16');
INSERT INTO `petani` VALUES ('5', '244', 'd', 'd', '0', '42', '1', '4002', '0000-00-00 00:00:00');
INSERT INTO `petani` VALUES ('7', '2', '2', '2', '0', '2', '1', '4006', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `petani_pengajuan`
-- ----------------------------
DROP TABLE IF EXISTS `petani_pengajuan`;
CREATE TABLE `petani_pengajuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `petani_id` int(11) NOT NULL,
  `pengajuan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of petani_pengajuan
-- ----------------------------
INSERT INTO `petani_pengajuan` VALUES ('5', '7', '2107120001');
INSERT INTO `petani_pengajuan` VALUES ('6', '3', '2107140001');

-- ----------------------------
-- Table structure for `tanam`
-- ----------------------------
DROP TABLE IF EXISTS `tanam`;
CREATE TABLE `tanam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pengajuan_id` int(11) DEFAULT NULL,
  `alamat_kebun` varchar(128) DEFAULT NULL,
  `total_tanam` double DEFAULT NULL,
  `tgl_tanam` date DEFAULT NULL,
  `tgl_perkiraan_panen` date DEFAULT NULL,
  `status_tanam` varchar(64) DEFAULT NULL,
  `push_tanam` int(1) DEFAULT NULL,
  `push_panen` int(1) DEFAULT NULL,
  `flag_panen` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tanam
-- ----------------------------
INSERT INTO `tanam` VALUES ('7', '2107120001', 'jl', '1000', '2021-07-01', '2021-07-31', 'Selesai Panen', '1', '1', '1');
INSERT INTO `tanam` VALUES ('11', '2107140001', 'jl.xx', '100', '2021-07-01', '2021-07-31', 'Proses Panen', '1', null, null);

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:Dinas,2:Koperasi,3:Admin',
  `status` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `update` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'sandi@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2', '1', '2021-07-07 22:52:45', '2021-07-25 10:29:56');
INSERT INTO `user` VALUES ('3', 'dinas@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '1', '1', '2021-07-07 22:53:59', '2021-07-08 00:41:20');
INSERT INTO `user` VALUES ('17', 'admin@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '3', '1', '2021-07-25 06:43:00', '2021-07-25 10:25:57');

-- ----------------------------
-- Table structure for `vendor`
-- ----------------------------
DROP TABLE IF EXISTS `vendor`;
CREATE TABLE `vendor` (
  `id_vendor` int(15) NOT NULL,
  `nama_vendor` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_vendor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vendor
-- ----------------------------
INSERT INTO `vendor` VALUES ('0', 'x');
INSERT INTO `vendor` VALUES ('1', 'PT Prabot');
