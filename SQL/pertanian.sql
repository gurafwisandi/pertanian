/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : pertanian

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2021-07-07 15:02:38
*/

SET FOREIGN_KEY_CHECKS=0;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of item_pengajuan
-- ----------------------------

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
  `nama` varchar(50) NOT NULL,
  `ketua` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telpon` varchar(16) NOT NULL,
  `created` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`koperasi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=898788 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of koperasi
-- ----------------------------
INSERT INTO `koperasi` VALUES ('898781', 'SUKA KUD OKE', 'RIZAL MANGKUBUMI', 'JALAN RAYA PASIR CIHERANG NO 20', '08778888888', '2021-06-30 10:45:45', '40029');
INSERT INTO `koperasi` VALUES ('898782', 'Petani Jaya Makmur', 'Ridzal', 'Jalan Majalengka No 23', '08566777765', '2021-06-30 16:01:33', '40029');
INSERT INTO `koperasi` VALUES ('898783', 'Maju Jaya Bersama', 'Yunita', 'Jalan Pahlawan revolusi', '086777555', '2021-06-30 16:25:58', '40029');
INSERT INTO `koperasi` VALUES ('898785', 'Lebak Pasir Istana', 'Jujun Ariyadi Miftah', 'Jalan Pasir Kecapi No 19', '08567899887', '2021-07-03 09:45:19', '40029');
INSERT INTO `koperasi` VALUES ('898786', 'koperasi', 'ketua', 'a', '1', '2021-07-06 19:43:59', '40031');

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
) ENGINE=InnoDB AUTO_INCREMENT=4011 DEFAULT CHARSET=utf8mb4;

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
  `status_proposal` varchar(20) NOT NULL COMMENT '1:proses,2:review,3:persetujuan',
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `verifikasi_dokumen` int(1) DEFAULT NULL,
  `id_user_verifikasi` int(11) DEFAULT NULL,
  `tgl_verifikasi` datetime DEFAULT NULL,
  `verifikasi_dokumen_dinas` int(1) DEFAULT NULL,
  `id_user_verifikasi_dinas` int(11) DEFAULT NULL,
  `tgl_verifikasi_dinas` datetime DEFAULT NULL,
  `tgl_kirim_bantuan` datetime DEFAULT NULL,
  `tgl_terima_bantuan` datetime DEFAULT NULL,
  PRIMARY KEY (`pengajuan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of pengajuan
-- ----------------------------
INSERT INTO `pengajuan` VALUES ('2107070011', '898786', '40031', '2021-07-07', '', null, '', 'Selesai Pengajuan', '2021-07-07 10:29:16', null, null, null, null, null, null, null, null, null);
INSERT INTO `pengajuan` VALUES ('2107070012', '898786', '40031', '2021-07-07', '', '2', '210707012059_2107070012.pdf', 'Proses Pengajuan', '2021-07-07 10:31:14', null, null, null, null, null, null, null, null, null);
INSERT INTO `pengajuan` VALUES ('2107070013', '898786', '40031', '2021-07-07', '', null, '', 'Proses Pengajuan', '2021-07-07 12:13:52', null, null, null, null, null, null, null, null, null);
INSERT INTO `pengajuan` VALUES ('2107070014', '898786', '40031', '2021-07-07', '', null, '', 'Proses Pengajuan', '2021-07-07 14:19:42', null, null, null, null, null, null, null, null, null);
INSERT INTO `pengajuan` VALUES ('2107070015', '898786', '40031', '2021-07-07', '', null, '', 'Proses Pengajuan', '2021-07-07 14:53:25', null, null, null, null, null, null, null, null, null);
INSERT INTO `pengajuan` VALUES ('2107070016', '898786', '40031', '2021-07-07', '', null, '', 'Proses Pengajuan', '2021-07-07 15:00:01', null, null, null, null, null, null, null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=35685 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of petani
-- ----------------------------
INSERT INTO `petani` VALUES ('35681', '32373061708900013', 'Zaelani Muhtadin Ina', 'Jalan Karang Anyar Banten', '0', '0876666', '898782', '4006', '2021-07-03 09:47:30');
INSERT INTO `petani` VALUES ('35682', '3274061706900013', 'Rizal Manto angin', 'Banten Maja', '0', '08566777', '898785', '4001', '0000-00-00 00:00:00');
INSERT INTO `petani` VALUES ('35683', '1', 'a2', 'a2', '0', '1', '898783', '4009', '2021-07-06 19:47:16');

-- ----------------------------
-- Table structure for `petani_pengajuan`
-- ----------------------------
DROP TABLE IF EXISTS `petani_pengajuan`;
CREATE TABLE `petani_pengajuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `petani_id` int(11) NOT NULL,
  `pengajuan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of petani_pengajuan
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:Dinas,2:KL',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40033 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('40029', 'aditia', 'Kepala Dinas', '788PU-881', 'aditia', 'aditia@gmail.com', '55c828b40067e55ef2e146dfb95eb7ce', '1');
INSERT INTO `user` VALUES ('40030', 'sandi', 'Kepala Dinas', '788PU-865', 'sandi', 'sandi@gmail.com', '4b1e2554cf51dcfb19cae120c', '1');
INSERT INTO `user` VALUES ('40031', 'Komeng', '', '', 'komeng', 'komeng@gmail.com', '5e876a16c63f3b8519fa7dcc8ccf2ac5', '2');
