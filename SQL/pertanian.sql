/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : pertanian

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2021-08-08 15:58:30
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
  `created` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of doc_serah_terima
-- ----------------------------
INSERT INTO `doc_serah_terima` VALUES ('1', '2107120001', '210714012910_dst_2107120001.jpeg', null);
INSERT INTO `doc_serah_terima` VALUES ('2', '2107120001', '210714012922_dst_2107120001.jpeg', null);
INSERT INTO `doc_serah_terima` VALUES ('3', '2107120001', '210714020312_dst_2107120001.jpeg', null);
INSERT INTO `doc_serah_terima` VALUES ('4', '2107140001', '210725111426_dst_2107140001.png', null);
INSERT INTO `doc_serah_terima` VALUES ('5', '2107140001', '210725111429_dst_2107140001.png', null);
INSERT INTO `doc_serah_terima` VALUES ('6', '2107210001', '210802014225_dst_2107210001.png', null);
INSERT INTO `doc_serah_terima` VALUES ('7', '2108040002', '210804091838_dst_2108040002.jpg', null);
INSERT INTO `doc_serah_terima` VALUES ('8', '2108040002', '210804091844_dst_2108040002.pdf', null);
INSERT INTO `doc_serah_terima` VALUES ('9', '2107210001', '210804094717_dst_2107210001.pdf', null);
INSERT INTO `doc_serah_terima` VALUES ('10', '2107210001', '210804094822_dst_2107210001.jpg', '2021-08-04 21:48:22');

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
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hasil_panen
-- ----------------------------
INSERT INTO `hasil_panen` VALUES ('1', '7', '2021-07-22', '500', 'Berhasil', null);
INSERT INTO `hasil_panen` VALUES ('2', '7', '2021-07-22', '500', 'Gagal', null);
INSERT INTO `hasil_panen` VALUES ('3', '10', '2021-07-31', '500', 'Berhasil', null);
INSERT INTO `hasil_panen` VALUES ('4', '10', '2021-07-31', '500', 'Gagal', null);
INSERT INTO `hasil_panen` VALUES ('5', '11', '2021-08-01', '25', 'Berhasil', null);
INSERT INTO `hasil_panen` VALUES ('6', '11', '2021-08-07', '50', 'Berhasil', null);
INSERT INTO `hasil_panen` VALUES ('7', '11', '2021-08-05', '25', 'Gagal', null);
INSERT INTO `hasil_panen` VALUES ('8', '12', '2021-08-31', '85', 'Berhasil', '2021-08-04 21:34:48');
INSERT INTO `hasil_panen` VALUES ('9', '13', '2021-08-07', '25', 'Gagal', '2021-08-04 21:50:45');
INSERT INTO `hasil_panen` VALUES ('10', '13', '2021-08-07', '50', 'Berhasil', '2021-08-04 21:50:53');

-- ----------------------------
-- Table structure for `item`
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `nama_item` varchar(128) DEFAULT NULL,
  `id_vendor` int(11) DEFAULT NULL,
  `keterangan` varchar(258) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of item
-- ----------------------------
INSERT INTO `item` VALUES ('1', 'Pacul', '1', 'Pacul full besi', '300000', null, null);
INSERT INTO `item` VALUES ('2', 'max', '1', 'max', '100000', null, null);
INSERT INTO `item` VALUES ('3', 'palu1', '1', 'palu beton', '200000', '2021-08-04 06:52:19', '2021-08-04 06:52:19');
INSERT INTO `item` VALUES ('4', 'lingis', '2', 'lingis besi', '150000', '2021-08-04 06:53:49', '2021-08-04 06:56:01');
INSERT INTO `item` VALUES ('5', '12312', '3', '312312', '312', '2021-08-04 20:53:46', null);
INSERT INTO `item` VALUES ('6', 'gergaji', '1', 'full besi', '125000', '2021-08-04 21:15:39', null);

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
  `harga_item` double DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of item_pengajuan
-- ----------------------------
INSERT INTO `item_pengajuan` VALUES ('2', '2107120001', 'item a', '2', 'xxx', '1', '300000', null, null);
INSERT INTO `item_pengajuan` VALUES ('3', '2107140001', 'item ax', '2', '1xx', '1', '300000', null, null);
INSERT INTO `item_pengajuan` VALUES ('4', '2107140001', 'item bx', '2', 'xxx', '2', '100000', null, null);
INSERT INTO `item_pengajuan` VALUES ('5', '2107210001', 'pacul beton', '2', '', '1', '300000', null, null);
INSERT INTO `item_pengajuan` VALUES ('6', '2107210001', 'palu beton', '2', '', '3', '200000', null, null);
INSERT INTO `item_pengajuan` VALUES ('7', '2108030001', '1', '2', 'xxx', '4', '150000', '2021-08-04 07:02:42', '2021-08-04 07:09:16');
INSERT INTO `item_pengajuan` VALUES ('8', '2108040002', 'pemotong', '2', '', '6', '125000', '2021-08-04 20:59:27', '2021-08-04 21:15:44');
INSERT INTO `item_pengajuan` VALUES ('9', '2108040001', 'pemotong', '2', '', null, null, '2021-08-04 21:43:44', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of jenis
-- ----------------------------
INSERT INTO `jenis` VALUES ('1', 'Alat Bajak Sawah', '2021-07-03 23:33:51', null);
INSERT INTO `jenis` VALUES ('2', 'Alat Pemotong', '2021-07-03 23:34:37', null);
INSERT INTO `jenis` VALUES ('3', 'xxx', '2021-07-03 23:35:33', '2021-08-04 07:03:34');
INSERT INTO `jenis` VALUES ('4', 'Pupuk Tanaman', '2021-07-03 23:35:50', null);
INSERT INTO `jenis` VALUES ('5', 'Bibit Tanaman', '2021-07-03 23:36:11', null);
INSERT INTO `jenis` VALUES ('6', 'Alat Siram Tanaman', '2021-07-03 23:37:32', null);
INSERT INTO `jenis` VALUES ('7', '1111', '2021-08-04 07:03:40', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of koperasi
-- ----------------------------
INSERT INTO `koperasi` VALUES ('1', 'KP. BAHAGIA SLALUx', 'sandix', 'porisx', '08381111', '210725103855_1.png', '1', '2021-07-07 22:52:45', '2021-08-04 07:52:28', null, null);
INSERT INTO `koperasi` VALUES ('3', 'Dinas', 'rudi', 'jl', '0812', '210804092751_3.jpg', '3', '2021-07-07 22:53:59', '2021-08-04 21:27:51', '4124124', 'dinas');
INSERT INTO `koperasi` VALUES ('15', 'Admin', '3', '3', '3', '210725070736_15.png', '17', '2021-07-25 06:43:00', '2021-07-30 05:41:52', '3', '3');
INSERT INTO `koperasi` VALUES ('16', 'test 2_10', 'test 2_10', 'test 2_10', '123123', null, '18', '2021-07-29 14:11:03', null, null, null);
INSERT INTO `koperasi` VALUES ('17', 'Dinas', '12', '12', '12', '210730053656_17.jpg', '19', '2021-07-30 05:36:56', null, '12', '12');
INSERT INTO `koperasi` VALUES ('18', 'Dinas', '3', '3', '3', '210730053823_18.jpg', '20', '2021-07-30 05:38:23', null, '3', '3');
INSERT INTO `koperasi` VALUES ('19', 'approve kop', 'approve kop', 'approve kop', 'approve kop', null, '21', '2021-07-30 05:50:02', null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=4012 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of penanaman
-- ----------------------------
INSERT INTO `penanaman` VALUES ('4001', 'Tanaman Pangan', 'Padi, jagung, ketela pohon', '2021-06-26 23:42:58', '2021-08-04 07:54:24', '40029');
INSERT INTO `penanaman` VALUES ('4002', 'Kebun', 'Buah-buahan, sayuran, dan bunga-bungaan', '2021-06-26 23:42:58', '2021-08-04 21:42:41', '40029');
INSERT INTO `penanaman` VALUES ('4006', 'Padi Aceh 4', 'Padi 12', '2021-06-27 22:01:34', null, '40029');
INSERT INTO `penanaman` VALUES ('4007', 'Jalan', 'jalan aja', '2021-06-28 20:50:50', '2021-06-28 21:44:24', '40029');
INSERT INTO `penanaman` VALUES ('4008', 'Jalan belok Kanan', 'Jalan belok kanan kiri', '2021-06-28 20:52:09', '2021-06-28 20:55:34', '40029');
INSERT INTO `penanaman` VALUES ('4009', 'Padi Aceh 3', 'cara Pembuatan', '2021-06-30 10:52:30', null, '40029');
INSERT INTO `penanaman` VALUES ('4010', 'xx', 'xx3', '2021-08-04 20:51:15', '2021-08-04 20:52:08', '0');
INSERT INTO `penanaman` VALUES ('4011', '123x', '123x', '2021-08-04 20:52:02', null, '0');

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
  `tgl_terima_bantuan` date DEFAULT NULL,
  `jml_doc` double DEFAULT NULL,
  `lokasi` varchar(128) DEFAULT NULL,
  `keterangan_hasil_pengajuan` varchar(128) DEFAULT NULL,
  `penanggung_jawab_dinas` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`pengajuan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of pengajuan
-- ----------------------------
INSERT INTO `pengajuan` VALUES ('2107120001', '1', '1', '2021-07-12', 'xxxxxx', '3', '210712113408_2107120001.jpeg', 'Done pengajuan', null, null, '1', '2021-07-12 23:32:45', '2021-07-13 00:30:37', '210713123056_bb_2107120001.jpeg', '1', '2021-07-13 00:30:56', '1', null, '210713123119_bbb_2107120001.jpeg', '1', '2021-07-14 11:59:24', '1', '2021-07-14', 'xxxx', '1', '2021-08-11', '3', null, 'ada perbaikan', 'sandi');
INSERT INTO `pengajuan` VALUES ('2107140001', '1', '1', '2021-07-14', 'xx', '4', '210725105129_2107140001.png', 'Done pengajuan', null, null, '1', '2021-07-14 21:01:38', '2021-07-25 10:52:43', '210725110327_bb_2107140001.pdf', '17', '2021-07-25 11:03:27', '1', null, '210725111304_bbb_2107140001.pdf', '3', '2021-07-25 11:13:09', '1', '2021-07-20', '', '1', '2021-08-12', '2', null, 'kehadiran tidak lengkap', 'andi');
INSERT INTO `pengajuan` VALUES ('2107210001', '1', '1', '2021-07-21', 'tes', '3', '210725110440_2107210001.pdf', 'Done pengajuan', null, null, '1', '2021-07-21 10:00:31', '2021-08-02 12:32:21', '210802123436_bb_2107210001.pdf', '17', '2021-08-02 12:34:42', '1', null, '210802123502_bbb_2107210001.pdf', '3', '2021-08-02 12:35:02', '1', '2021-08-07', 'rencana', '1', '2021-08-13', '3', 'XXX', '2312', 'sandi');
INSERT INTO `pengajuan` VALUES ('2107300001', '15', '17', '2021-07-30', '', null, '', 'Proses Pengajuan', null, null, null, '2021-07-30 05:50:57', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `pengajuan` VALUES ('2107300002', '15', '17', '2021-07-30', '', null, '', 'Proses Pengajuan', null, null, null, '2021-07-30 05:51:10', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `pengajuan` VALUES ('2108030001', '1', '1', '2021-08-03', 'xxxxx', '4', '210804070505_2108030001.pdf', 'Proses Serah Terima', null, null, '1', '2021-08-03 22:25:44', '2021-08-04 07:05:05', '210804070642_bb_2108030001.pdf', '17', '2021-08-04 07:06:42', '1', null, '210804070700_bbb_2108030001.pdf', '3', '2021-08-04 07:07:00', '1', '2021-08-07', '', '1', '0000-00-00', null, '', '', '');
INSERT INTO `pengajuan` VALUES ('2108040001', '1', '1', '2021-08-04', '', '1', '210804094431_2108040001.pdf', 'Proses Verifikasi', null, null, '1', '2021-08-04 07:54:02', '2021-08-04 21:44:38', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `pengajuan` VALUES ('2108040002', '16', '18', '2021-08-04', 'sudah di perbaiki dokumennya', '2', '210804085549_2108040002.pdf', 'Done pengajuan', null, null, '1', '2021-08-04 20:54:38', '2021-08-04 21:12:06', '210804091315_bb_2108040002.pdf', '17', '2021-08-04 21:13:15', '1', null, '210804091341_bbb_2108040002.pdf', '3', '2021-08-04 21:13:41', '1', '2021-08-07', '', '1', '2021-08-07', '2', 'balai kota', '', 'aqilah');
INSERT INTO `pengajuan` VALUES ('2108080001', '16', '18', '2021-08-08', '', null, '', 'Proses Pengajuan', null, null, null, '2021-08-08 15:21:40', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `petani`
-- ----------------------------
DROP TABLE IF EXISTS `petani`;
CREATE TABLE `petani` (
  `petani_id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `koperasi_id` int(11) NOT NULL,
  `penanaman_id` int(11) NOT NULL,
  `status_petani` varchar(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`petani_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of petani
-- ----------------------------
INSERT INTO `petani` VALUES ('1', '32373061708900013', 'Zaelani Muhtadin Ina', 'Jalan Karang Anyar Banten', '0876666', '1', '4006', 'Aktif', null, '2021-08-08 15:15:30');
INSERT INTO `petani` VALUES ('2', '3274061706900013', 'Rizal Manto angin', 'Banten Maja', '08566777', '1', '4001', 'Aktif', null, '2021-08-08 15:16:48');
INSERT INTO `petani` VALUES ('3', '1', 'Ziber', 'a2', '1', '1', '4009', 'Tidak Aktif', null, '2021-07-06 19:47:16');
INSERT INTO `petani` VALUES ('5', '244', 'Udin', 'd', '42', '1', '4002', 'Aktif', null, null);
INSERT INTO `petani` VALUES ('7', '2', 'Rojer', '2', '2', '1', '4006', 'Aktif', null, null);
INSERT INTO `petani` VALUES ('8', '12342512', 'shofiah aqilah', 'ketapang', '0812', '1', '4002', 'Aktif', null, '2021-08-03 22:25:22');
INSERT INTO `petani` VALUES ('9', '123412', 'Budi', 'jl.', '0921398', '16', '4007', 'Aktif', null, null);
INSERT INTO `petani` VALUES ('11', '1', '1', '1', '1', '1', '4002', 'Tidak Aktif', '2021-08-04 06:59:30', '2021-08-04 21:43:13');
INSERT INTO `petani` VALUES ('12', '123123', 'arsalan', '3123', '123123', '16', '4002', 'Tidak Aktif', '2021-08-04 20:58:33', '2021-08-08 15:23:41');

-- ----------------------------
-- Table structure for `petani_pengajuan`
-- ----------------------------
DROP TABLE IF EXISTS `petani_pengajuan`;
CREATE TABLE `petani_pengajuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `petani_id` int(11) NOT NULL,
  `pengajuan_id` int(11) NOT NULL,
  `kehadiran_seminar` varchar(64) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of petani_pengajuan
-- ----------------------------
INSERT INTO `petani_pengajuan` VALUES ('5', '7', '2107120001', 'Hadir', null, null);
INSERT INTO `petani_pengajuan` VALUES ('6', '3', '2107140001', 'Hadir', null, null);
INSERT INTO `petani_pengajuan` VALUES ('7', '1', '2107210001', 'Tidak Hadir', null, null);
INSERT INTO `petani_pengajuan` VALUES ('8', '2', '2107210001', 'Hadir', null, null);
INSERT INTO `petani_pengajuan` VALUES ('9', '11', '2108030001', 'Hadir', '2021-08-04 07:01:41', '2021-08-04 07:10:41');
INSERT INTO `petani_pengajuan` VALUES ('10', '9', '2108040002', 'Hadir', '2021-08-04 20:57:47', '2021-08-04 21:16:55');
INSERT INTO `petani_pengajuan` VALUES ('11', '12', '2108040002', 'Hadir', '2021-08-04 20:58:44', '2021-08-04 21:17:00');
INSERT INTO `petani_pengajuan` VALUES ('12', '7', '2108040001', null, '2021-08-04 21:43:37', null);

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
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tanam
-- ----------------------------
INSERT INTO `tanam` VALUES ('7', '2107120001', 'jl', '1000', '2021-07-01', '2021-07-31', 'Selesai Panen', '1', '1', '1', null);
INSERT INTO `tanam` VALUES ('11', '2107140001', 'jl.xx', '100', '2021-07-01', '2021-07-31', 'Selesai Panen', '1', '1', '1', null);
INSERT INTO `tanam` VALUES ('12', '2108040002', 'jl ketapang kanan', '100', '2021-08-07', '2021-08-31', 'Selesai Panen', '1', '1', '1', null);
INSERT INTO `tanam` VALUES ('13', '2107210001', 'jl ketapang xxx', '75', '2021-08-01', '2021-08-07', 'Selesai Panen', '1', '1', '1', '2021-08-04 21:50:09');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'koperasi1@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2', '1', '2021-07-07 22:52:45', '2021-08-03 22:20:01');
INSERT INTO `user` VALUES ('3', 'dinas@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '1', '1', '2021-07-07 22:53:59', '2021-08-04 21:27:51');
INSERT INTO `user` VALUES ('17', 'admin@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '3', '1', '2021-07-25 06:43:00', '2021-07-30 05:41:52');
INSERT INTO `user` VALUES ('18', 'koperasi2@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2', '1', '2021-07-29 14:11:03', '2021-07-30 05:48:09');
INSERT INTO `user` VALUES ('19', '12@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '1', '1', '2021-07-30 05:36:56', '2021-07-30 05:39:15');
INSERT INTO `user` VALUES ('20', '3@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '1', null, '2021-07-30 05:38:23', null);
INSERT INTO `user` VALUES ('21', 'approvekop@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2', null, '2021-07-30 05:50:02', null);

-- ----------------------------
-- Table structure for `vendor`
-- ----------------------------
DROP TABLE IF EXISTS `vendor`;
CREATE TABLE `vendor` (
  `id_vendor` int(15) NOT NULL AUTO_INCREMENT,
  `nama_vendor` varchar(64) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_vendor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vendor
-- ----------------------------
INSERT INTO `vendor` VALUES ('1', 'PT Prabot', null, null);
INSERT INTO `vendor` VALUES ('2', 'x', null, '2021-08-04 06:55:56');
INSERT INTO `vendor` VALUES ('3', 'PT. Aka', '2021-08-04 06:56:13', null);
INSERT INTO `vendor` VALUES ('4', 'PT.xx', '2021-08-04 20:52:34', null);
