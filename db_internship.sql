-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Jun 2016 pada 05.58
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_internship`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `nip` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` mediumint(3) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `logtime` datetime DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nip`),
  KEY `level` (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`nip`, `password`, `level`, `status`, `logtime`, `created_date`, `updated_date`, `created_by`, `updated_by`, `deleted`) VALUES
('122410101033', '$2y$10$tx0C69iPAf9ShxWZ/ihgiekGAe6ZPae8ilrprKbaEF7ccBKQbbw36', 3, 1, '2016-04-23 03:01:25', '2016-04-20 00:00:00', NULL, '122410101086', NULL, 0),
('122410101085', '$2y$10$QRqGrYmnM2Ctrt/kLvBmuegGGAg1sREX0f8B7mh1E/t9P2Z0BVShK', 2, 2, '2016-06-13 05:26:42', '2015-09-28 03:55:35', '2015-09-28 03:55:35', '122410101086', '122410101086', 0),
('122410101086', '$2y$10$QRqGrYmnM2Ctrt/kLvBmuegGGAg1sREX0f8B7mh1E/t9P2Z0BVShK', 1, 1, '2016-06-13 05:15:53', '2015-09-23 08:39:12', '2015-09-23 08:39:12', '122410101086', '122410101086', 0),
('122410101087', '$2y$10$TDgqTxpgHiWeZlvL.E7sYOuRpA6/jZBlKeo8URnWbHgpp0QbVMpVC', 3, 1, '2016-05-24 06:49:20', '2015-09-28 05:21:36', NULL, '122410101086', NULL, 0),
('122410101099', '$2y$10$TDgqTxpgHiWeZlvL.E7sYOuRpA6/jZBlKeo8URnWbHgpp0QbVMpVC', 5, 1, '2016-06-13 05:16:18', '2015-09-28 06:53:07', NULL, '122410101086', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berkas`
--

CREATE TABLE IF NOT EXISTS `tb_berkas` (
  `id` varchar(17) NOT NULL,
  `id_user` varchar(17) NOT NULL,
  `nama_berkas` varchar(250) NOT NULL,
  `kategori` varchar(250) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berkas`
--

INSERT INTO `tb_berkas` (`id`, `id_user`, `nama_berkas`, `kategori`, `file`, `created_date`, `updated_date`, `created_by`, `updated_by`, `deleted`) VALUES
('ber20160423023037', 'u20160423022930', 'Proposal Pengajuan Magang', 'proposal', 'u20160423022930_Proposal_magang.pdf', '2016-04-23 02:30:37', '2016-04-23 02:30:37', '', NULL, 0),
('ber20160423024518', 'u20160423024443', 'Proposal Pengajuan Magang', 'proposal', 'u20160423024443_Proposal_magang.pdf', '2016-04-23 02:45:18', '2016-04-23 02:45:18', '', NULL, 0),
('ber20160423025145', 'u20160423025040', 'Proposal Pengajuan Magang', 'proposal', 'u20160423025040_Proposal_magang.pdf', '2016-04-23 02:51:45', '2016-04-23 02:51:45', '', NULL, 0),
('ber20160524061445', 'u20160423024443', 'presensi kehadiran magang', 'presensi', 'u20160423024443_presensi.pdf', '2016-05-24 06:14:45', '2016-05-24 06:14:45', '', NULL, 0),
('ber20160524063917', 'u20160524063625', 'PROPOSAL PENGAJUAN', 'proposal', 'u20160524063625_proposal.pdf', '2016-05-24 06:39:17', '2016-05-24 06:39:17', '', NULL, 0),
('ber20160524071126', 'u20160524070952', 'PROPOSAL', 'proposal', 'u20160524070952_proposal.pdf', '2016-05-24 07:11:26', '2016-05-24 07:11:26', '', NULL, 0),
('ber20160608053132', 'u20160524063625', 'Laporan', 'laporan', 'u20160524063625_laporan.pdf', '2016-06-08 05:31:32', '2016-06-08 05:31:32', '', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bidang`
--

CREATE TABLE IF NOT EXISTS `tb_bidang` (
  `id` mediumint(3) NOT NULL,
  `bagian` varchar(250) NOT NULL,
  `deskripsi` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `created_by` varchar(25) NOT NULL,
  `updated_by` varchar(25) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bidang`
--

INSERT INTO `tb_bidang` (`id`, `bagian`, `deskripsi`, `status`, `created_date`, `updated_date`, `created_by`, `updated_by`, `deleted`) VALUES
(1, 'Teknologi Informasi', ' Bidang TI yang terbaik', 1, '2015-09-19 12:38:09', '2015-12-20 04:01:37', '122410101086', NULL, 0),
(2, 'Administrasi', ' Bidang bagian administrasi kantor', 1, '2015-09-19 12:38:28', '2015-12-20 04:01:32', '122410101086', NULL, 0),
(3, 'Akuntansi dan Keuangan', ' Bidang tentang manajemen keuangan dan perhitungan akuntansi', 1, '2015-09-21 05:04:07', '2015-12-20 04:01:34', '122410101086', NULL, 0),
(4, 'Teknik Mesin', ' Bidang tentang komponen komponen mesin ', 1, '2015-09-21 05:06:17', '2015-12-20 04:01:39', '122410101086', NULL, 0),
(5, 'Perpajakan', ' Bidang tentang pajak yang ada dalam perusahaan', 1, '2015-09-21 05:07:32', '2015-09-29 03:53:26', '122410101086', NULL, 0),
(6, 'Hukum', ' Bidang tentang hukum yang harus dipenuhi\r\n ', 1, '2015-09-21 05:09:11', NULL, '122410101086', NULL, 0),
(7, 'Teknik Listrik', ' Bidang tentang mengolah aliran Listrik yang ada di Perusaha', 1, '2015-09-21 05:10:29', NULL, '122410101086', NULL, 0),
(8, 'K3 dan Lingkungan', ' Bidang yang mengatur tentang Kesehatan dan pengolahan Lingk', 1, '2015-09-21 05:13:26', '2015-12-20 04:01:42', '122410101086', NULL, 0),
(9, 'Manajemen', ' Bidang tentang manajemen yang ada di Perusahaan', 1, '2015-09-21 06:29:30', '2015-09-28 03:22:22', '122410101086', NULL, 0),
(10, 'Kesehatan', ' tentang p3k', 1, '2015-12-21 09:17:58', '2015-12-21 09:18:49', '122410101086', NULL, 0),
(11, 'Rohani', 'Tentang Rohani ', 0, '2015-12-22 05:11:55', '2015-12-22 05:12:19', '122410101086', '122410101086', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokumen`
--

CREATE TABLE IF NOT EXISTS `tb_dokumen` (
  `id` mediumint(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tb_dokumen`
--

INSERT INTO `tb_dokumen` (`id`, `nama`, `file`, `created_date`, `updated_date`, `created_by`, `updated_by`, `deleted`) VALUES
(1, 'absensi bulanan', 'absensi_bulanan.pdf', '2016-05-26 12:44:33', '2016-05-26 12:44:33', '', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hak_akses`
--

CREATE TABLE IF NOT EXISTS `tb_hak_akses` (
  `no` mediumint(3) NOT NULL AUTO_INCREMENT,
  `id_menu` smallint(3) NOT NULL,
  `level` mediumint(3) NOT NULL,
  `priv` varchar(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`no`),
  KEY `level` (`level`),
  KEY `id_menu` (`id_menu`),
  KEY `level_2` (`level`),
  KEY `level_3` (`level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data untuk tabel `tb_hak_akses`
--

INSERT INTO `tb_hak_akses` (`no`, `id_menu`, `level`, `priv`, `created_date`, `updated_date`, `created_by`, `updated_by`, `deleted`) VALUES
(1, 1, 1, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(2, 2, 1, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(3, 3, 1, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(4, 4, 1, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(5, 5, 1, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(6, 6, 1, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(7, 7, 1, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(8, 17, 1, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(9, 11, 2, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(10, 12, 2, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(11, 14, 2, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(12, 15, 2, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(13, 16, 2, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(14, 7, 2, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(15, 17, 2, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(16, 13, 3, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(17, 7, 3, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(18, 17, 3, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(19, 7, 4, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(20, 8, 4, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(21, 9, 4, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(22, 7, 5, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(23, 17, 5, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(24, 10, 5, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(25, 18, 5, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(26, 18, 2, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(27, 19, 5, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(28, 19, 2, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(29, 20, 4, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(30, 21, 1, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(31, 21, 2, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(32, 21, 3, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(33, 21, 5, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(34, 17, 4, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(35, 23, 5, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(36, 24, 5, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(37, 25, 5, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(38, 26, 4, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(39, 27, 2, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(40, 28, 5, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(41, 29, 5, '1111', '0000-00-00 00:00:00', NULL, '', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_instansi`
--

CREATE TABLE IF NOT EXISTS `tb_instansi` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(250) NOT NULL,
  `kota` varchar(250) NOT NULL,
  `sekolah` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis`
--

CREATE TABLE IF NOT EXISTS `tb_jenis` (
  `id` mediumint(3) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `durasi` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis`
--

INSERT INTO `tb_jenis` (`id`, `jenis`, `durasi`, `created_date`, `updated_date`, `created_by`, `updated_by`, `deleted`) VALUES
(1, 'SMK', '2', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(2, 'SMK', '3', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(3, 'D3', '2', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(4, 'D3', '3', '0000-00-00 00:00:00', NULL, '', NULL, 0),
(5, 'S1', '1', '0000-00-00 00:00:00', NULL, '', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kontak`
--

CREATE TABLE IF NOT EXISTS `tb_kontak` (
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` int(11) NOT NULL,
  `fax` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `syarat_ketentuan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kuota`
--

CREATE TABLE IF NOT EXISTS `tb_kuota` (
  `tahun` year(4) NOT NULL,
  `kuota` int(4) NOT NULL,
  `budget` int(10) NOT NULL,
  PRIMARY KEY (`tahun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kuota`
--

INSERT INTO `tb_kuota` (`tahun`, `kuota`, `budget`) VALUES
(2015, 4000, 200000000),
(2016, 3600, 50000000),
(2017, 3000, 300000000),
(2018, 4000, 200000000),
(2019, 4000, 20000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kuota_bidang`
--

CREATE TABLE IF NOT EXISTS `tb_kuota_bidang` (
  `id` varchar(10) NOT NULL,
  `id_bidang` mediumint(3) NOT NULL,
  `bulan` varchar(6) NOT NULL,
  `kuota` int(4) NOT NULL,
  `sisa` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bulan` (`bulan`),
  KEY `id_bidang` (`id_bidang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kuota_bidang`
--

INSERT INTO `tb_kuota_bidang` (`id`, `id_bidang`, `bulan`, `kuota`, `sisa`) VALUES
('2015121', 1, '201512', 10, 10),
('20151210', 10, '201512', 0, 0),
('2015122', 2, '201512', 10, 10),
('2015123', 3, '201512', 10, 0),
('2015124', 4, '201512', 0, 0),
('2015125', 5, '201512', 0, 0),
('2015126', 6, '201512', 0, 0),
('2015127', 7, '201512', 0, 0),
('2015128', 8, '201512', 0, 0),
('2015129', 9, '201512', 0, 0),
('201551', 1, '20155', 344, 344),
('2015510', 10, '20155', 0, 0),
('201552', 2, '20155', 0, 0),
('201553', 3, '20155', 0, 0),
('201554', 4, '20155', 0, 0),
('201555', 5, '20155', 0, 0),
('201556', 6, '20155', 0, 0),
('201557', 7, '20155', 0, 0),
('201558', 8, '20155', 0, 0),
('201559', 9, '20155', 0, 0),
('201641', 1, '20164', 10, 10),
('2016410', 10, '20164', 3, 3),
('201642', 2, '20164', 20, 20),
('201643', 3, '20164', 20, 20),
('201644', 4, '20164', 10, 10),
('201645', 5, '20164', 10, 10),
('201646', 6, '20164', 10, 10),
('201647', 7, '20164', 10, 10),
('201648', 8, '20164', 5, 5),
('201649', 9, '20164', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kuota_bulan`
--

CREATE TABLE IF NOT EXISTS `tb_kuota_bulan` (
  `no` varchar(6) NOT NULL,
  `bulan` tinyint(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `kuota` int(4) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kuota_bulan`
--

INSERT INTO `tb_kuota_bulan` (`no`, `bulan`, `tahun`, `kuota`) VALUES
('20151', 1, 2015, 100),
('201510', 10, 2015, 83),
('201511', 11, 2015, 83),
('201512', 12, 2015, 96),
('20152', 2, 2015, 83),
('20153', 3, 2015, 83),
('20154', 4, 2015, 83),
('20155', 5, 2015, 87),
('20156', 6, 2015, 100),
('20157', 7, 2015, 83),
('20158', 8, 2015, 83),
('20159', 9, 2015, 83),
('20161', 1, 2016, 300),
('201610', 10, 2016, 300),
('201611', 11, 2016, 300),
('201612', 12, 2016, 300),
('20162', 2, 2016, 300),
('20163', 3, 2016, 300),
('20164', 4, 2016, 300),
('20165', 5, 2016, 300),
('20166', 6, 2016, 300),
('20167', 7, 2016, 300),
('20168', 8, 2016, 300),
('20169', 9, 2016, 300),
('20171', 1, 2017, 250),
('201710', 10, 2017, 250),
('201711', 11, 2017, 250),
('201712', 12, 2017, 250),
('20172', 2, 2017, 250),
('20173', 3, 2017, 250),
('20174', 4, 2017, 250),
('20175', 5, 2017, 250),
('20176', 6, 2017, 250),
('20177', 7, 2017, 250),
('20178', 8, 2017, 250),
('20179', 9, 2017, 250),
('20181', 1, 2018, 333),
('201810', 10, 2018, 333),
('201811', 11, 2018, 333),
('201812', 12, 2018, 333),
('20182', 2, 2018, 333),
('20183', 3, 2018, 333),
('20184', 4, 2018, 333),
('20185', 5, 2018, 333),
('20186', 6, 2018, 337),
('20187', 7, 2018, 333),
('20188', 8, 2018, 333),
('20189', 9, 2018, 333),
('20191', 1, 2019, 333),
('201910', 10, 2019, 333),
('201911', 11, 2019, 333),
('201912', 12, 2019, 333),
('20192', 2, 2019, 333),
('20193', 3, 2019, 333),
('20194', 4, 2019, 333),
('20195', 5, 2019, 333),
('20196', 6, 2019, 337),
('20197', 7, 2019, 333),
('20198', 8, 2019, 333),
('20199', 9, 2019, 333);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE IF NOT EXISTS `tb_level` (
  `level` mediumint(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(18) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `kategori` varchar(13) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(12) DEFAULT NULL,
  `created_by` varchar(12) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`level`, `nama`, `deskripsi`, `kategori`, `created_date`, `updated_date`, `updated_by`, `created_by`, `deleted`) VALUES
(1, 'Admin', 'Hak akses Admin untuk mengelola sistem', 'super', '2015-09-23 00:00:00', NULL, NULL, '122410101086', 0),
(2, 'Diklat', 'Hak akses untuk kantor Diklat', 'diklat', '2015-09-23 00:00:00', NULL, NULL, '122410101086', 0),
(3, 'Unit Kerja', 'Hak akses untuk Unit Kerja di PT. Semen Indonesia Tbk.', 'unit_kerja', '2015-09-23 00:00:00', NULL, NULL, '122410101086', 0),
(4, 'User', 'Hak akses untuk Peserta PKL', 'user', '0000-00-00 00:00:00', NULL, NULL, '', 0),
(5, 'Diklat [Bu Mafula]', 'Hak akses Diklat khusus Menu Persetujuan magang', 'diklat', '2015-09-28 06:23:57', NULL, NULL, '122410101086', 0),
(6, 'test', 'anak buah', 'diklat', '2015-12-21 09:22:32', '2015-12-21 09:23:39', '122410101086', '122410101086', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_magang`
--

CREATE TABLE IF NOT EXISTS `tb_magang` (
  `no` int(6) NOT NULL AUTO_INCREMENT,
  `id_member` int(7) NOT NULL,
  `pembina` varchar(12) NOT NULL,
  `no_sertifikat` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `created_by` varchar(12) NOT NULL,
  `updated_by` varchar(12) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`no`),
  KEY `id_member` (`id_member`),
  KEY `pembina` (`pembina`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_magang`
--

INSERT INTO `tb_magang` (`no`, `id_member`, `pembina`, `no_sertifikat`, `status`, `created_date`, `updated_date`, `created_by`, `updated_by`, `deleted`) VALUES
(1, 1, '122410101033', '', 0, '2016-04-23 02:36:14', '0000-00-00 00:00:00', '122410101033', '', 0),
(2, 2, '122410101087', '', 0, '2016-04-23 02:55:39', '0000-00-00 00:00:00', '122410101087', '', 0),
(3, 3, '122410101033', '', 0, '2016-04-23 03:01:33', '0000-00-00 00:00:00', '122410101033', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_member`
--

CREATE TABLE IF NOT EXISTS `tb_member` (
  `id` varchar(17) NOT NULL,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `instansi` varchar(50) NOT NULL DEFAULT '0',
  `alamat` varchar(60) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `id_jenis` mediumint(3) NOT NULL DEFAULT '0',
  `id_bidang` mediumint(3) NOT NULL,
  `tujuan` varchar(10) NOT NULL,
  `bulan_pengajuan` date NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(12) DEFAULT NULL,
  `level` mediumint(3) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_jenis` (`id_jenis`),
  KEY `level` (`level`),
  KEY `level_2` (`level`),
  KEY `level_3` (`level`),
  KEY `level_4` (`level`),
  KEY `level_5` (`level`),
  KEY `id_bidang` (`id_bidang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Menyimpan data user yg sudah register';

--
-- Dumping data untuk tabel `tb_member`
--

INSERT INTO `tb_member` (`id`, `nama`, `instansi`, `alamat`, `jurusan`, `id_jenis`, `id_bidang`, `tujuan`, `bulan_pengajuan`, `password`, `email`, `hp`, `level`, `created_date`, `updated_date`, `created_by`, `updated_by`, `deleted`) VALUES
('u20160423022930', 'Marceli Aditya', 'Universitas Jember', 'Jalan Manyar', 'Sistem Informasi', 5, 1, 'pkl', '2016-06-01', 'e3b15', 'celi@gmail.com', '0899311823', 4, '0000-00-00 00:00:00', NULL, '', NULL, 0),
('u20160423024443', 'Affan Taruna', 'Universitas Brawijaya', 'Mayang', 'Teknik Mesin', 5, 4, 'pkl', '2016-06-01', 'f8c4b', 'afan@gmail.com', '086543578909', 4, '0000-00-00 00:00:00', NULL, '', NULL, 0),
('u20160423025040', 'Nindi Norya', 'Universitas Malang', 'Tulungagung', 'Akuntansi', 5, 3, 'pkl', '2016-05-01', '6822c', 'nindi@gmail.com', '086543578909', 4, '0000-00-00 00:00:00', NULL, '', NULL, 0),
('u20160524063625', 'haris', 'UNEJ', 'KAKAJSKSJK', 'PSSI', 1, 1, 'pkl', '2016-05-31', 'b407a', 'haris@gmail.com', '089989898989', 4, '0000-00-00 00:00:00', '2016-05-24 08:09:05', '', NULL, 0),
('u20160524070952', 'arfan', 'Universitas Jember', 'ASSASASA', 'PSSI', 5, 1, 'pkl', '1994-05-25', '89af8', 'arfan@gmail.com', '98798798797', 4, '0000-00-00 00:00:00', NULL, '', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_member_user`
--

CREATE TABLE IF NOT EXISTS `tb_member_user` (
  `id` int(7) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `no_induk` varchar(25) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `jk` tinyint(1) NOT NULL,
  `hp` varchar(14) NOT NULL,
  `tgl_lahir` datetime NOT NULL,
  `foto` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '-1',
  `alasan_penolakan` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_member_user`
--

INSERT INTO `tb_member_user` (`id`, `id_user`, `nama`, `no_induk`, `alamat`, `jk`, `hp`, `tgl_lahir`, `foto`, `status`, `alasan_penolakan`, `created_date`, `updated_date`, `created_by`, `updated_by`, `deleted`) VALUES
(1, 'u20160423022930', 'Marceli Aditya', '122410101001', 'Jalan Manyar', 1, '08993111823', '1990-04-24 00:00:00', 'u20160423022930_foto_122410101001.jpg', 3, '', '2016-04-23 02:31:19', '2016-04-23 02:36:14', '', '122410101033', 0),
(2, 'u20160423022930', 'Mahmuda', '122410101026', 'Gebang', 0, '085257783017', '1993-04-30 00:00:00', 'u20160423022930_foto_122410101026.jpg', 3, '', '2016-04-23 02:31:59', '2016-04-23 02:55:39', '', '122410101087', 0),
(3, 'u20160423024443', 'Affan Taruna', '122410101001', 'Mayang', 1, '0874567883', '1992-04-24 00:00:00', 'u20160423024443_foto_122410101001.jpg', 3, '', '2016-04-23 02:45:51', '2016-04-23 03:01:33', '', '122410101033', 0),
(4, 'u20160423024443', 'Yudi Candra', '122410101037', 'Kaliwates', 1, '098765432345', '1993-04-25 00:00:00', 'u20160423024443_foto_122410101037.jpg', 3, '', '2016-04-23 02:46:20', '2016-04-23 02:48:52', '', NULL, 0),
(5, 'u20160423025040', 'Nindi Norya', '122410101036', 'Ta', 0, '0987654345', '1992-12-12 00:00:00', 'u20160423025040_foto_122410101036.jpg', 0, '', '2016-04-23 02:52:13', '2016-04-23 02:52:51', '', NULL, 0),
(6, 'u20160524063625', 'HARIS1', '122556565', 'FTFYTVYV', 1, '232323232', '1994-05-24 00:00:00', 'u20160524063625_foto_122556565.jpg', 2, '', '2016-05-24 06:40:02', '2016-05-24 06:44:55', '', NULL, 0),
(7, 'u20160524063625', 'HARIS2', '17651761516', 'CFGBHJNN', 1, '2131313131', '1994-05-24 00:00:00', 'u20160524063625_foto_17651761516.jpg', 2, '', '2016-05-24 06:40:30', '2016-05-24 06:44:55', '', NULL, 0),
(8, 'u20160524070952', 'ARFAN', '2715211', 'ASASASAS', 1, '212121212', '1994-05-31 00:00:00', 'u20160524070952_foto_2715211.jpg', -1, '', '2016-05-24 07:12:04', NULL, '', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu`
--

CREATE TABLE IF NOT EXISTS `tb_menu` (
  `id` smallint(3) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `link` varchar(250) NOT NULL,
  `deskripsi` varchar(250) DEFAULT NULL,
  `icon` varchar(10) NOT NULL DEFAULT '&#xf085',
  `visible` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_menu`
--

INSERT INTO `tb_menu` (`id`, `menu`, `link`, `deskripsi`, `icon`, `visible`, `created_date`, `updated_date`, `created_by`, `updated_by`, `deleted`) VALUES
(1, 'Admin', 'dashboard/admin', 'Digunakan untuk menampilkan data adminitrasi user yang memiliki kontrol akses ke portal ke sistem.', '&#xf007', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '122410101086', '122410101086', 0),
(2, 'Form Tambah Admin', 'dashboard/admin_form', 'Digunakan untuk menambahkan hak akses user di sistem.', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '122410101086', '', 0),
(3, 'Level', 'dashboard/level', 'Digunakan untuk data level hak akses user.', '&#xf13d', 1, '2015-09-17 00:00:00', '0000-00-00 00:00:00', '122410101086', '', 0),
(4, 'Master Menu', 'dashboard/master_menu', 'Digunkan untuk menampilkan daftar menu di sistem.', '&#xf0ae', 1, '2015-09-17 00:00:00', NULL, '122410101086', NULL, 0),
(5, 'Hak Akses', 'dashboard/hak_akses', 'Digunakan untuk mengelola hak akses di setiap level.', '&#xf096', 0, '2015-09-17 09:34:13', NULL, '122410101086', NULL, 0),
(6, 'Bidang Keahlian', 'dashboard/bidang', 'Digunakan untuk mengelola data Bidang keahlian yang di tawarkan kepada peserta magang.', '&#xf0c3', 1, '2015-09-18 04:23:56', NULL, '122410101086', NULL, 0),
(7, 'Profil', 'dashboard/profil', 'Digunakan untuk mengelola profil di setiap hak akses.', '&#xf1ae', 1, '2015-09-18 04:23:56', NULL, '122410101086', NULL, 0),
(8, 'Member', 'dashboard/member', 'Digunakan untuk mengelola data anggota member peserta PKL.', '&#xf0c0', 1, '2015-09-18 04:23:56', NULL, '122410101086', NULL, 0),
(9, 'Daftar Member', 'dashboard/member_form', 'Digunkan untuk untuk menampilkan form Anggota member peserta PKL', '', 0, '2015-09-18 04:23:56', NULL, '122410101086', NULL, 0),
(10, 'Persetujuan Magang', 'dashboard/persetujuan_magang', 'Digunakan oleh hak akses Khusus Diklat yang memiliki wewenang untuk menerima Peserta PKL, sebelum diajukan ke Unit Kerja.', '&#xf00c', 1, '2015-09-23 10:01:40', NULL, '122410101086', NULL, 0),
(11, 'Pengajuan Unit Kerja', 'dashboard/pengajuan_unit', 'Digunakan untuk mengajukan  Peserta PKL ke pihak Unit Kerja.', '&#xf0b1', 1, '2015-09-25 07:39:52', NULL, '122410101086', NULL, 0),
(12, 'Detail Pengajuan Unit Kerja', 'dashboard/detail_pengajuan_unit', 'Digunakan untuk menampilkan detail data pengajuan Peserta PKL ', '', 0, '2015-09-26 01:05:47', NULL, '122410101086', NULL, 0),
(13, 'Persetujuan Unit Kerja', 'dashboard/persetujuan_unit', 'Digunakan oleh unit kerja untuk menerima / menolak Peserta PKL \n', '&#xf046', 1, '2015-09-26 08:03:21', NULL, '122410101086', NULL, 0),
(14, 'Nilai Non-Teknis', 'dashboard/nilai_nonteknis', 'Digunakan oleh Unit Kerja sebagai pembimbing lapangan, untuk memberikan nilai Non-Teknis kepada peserta PKL khusus kategori SMK', '&#xf040', 0, '2015-09-27 07:13:24', '2016-04-20 10:43:10', '122410101086', '122410101086', 1),
(15, 'Penilaian', 'dashboard/nilai_teknis', 'Digunakan oleh Unit Kerja sebagai pembimbing lapangan, untuk memberikan nilai Teknis kepada peserta PKL khusus kategori SMK', '&#xf044', 1, '2015-09-27 12:08:33', NULL, '122410101086', NULL, 0),
(16, 'Berkas', 'dashboard/berkas_diklat', 'Digunakan untuk menampilkan berkas yang telah diunggah oleh peserta PKL.', '&#xf187', 1, '2015-09-27 04:31:01', NULL, '122410101086', NULL, 0),
(17, 'Info Member', 'dashboard/info_member', 'Digunakan untuk menampilkan informasi lengkap data diri member.', '', 0, '2015-09-28 05:52:38', NULL, '122410101086', NULL, 0),
(18, 'Insight', 'dashboard/insight', 'Digunakan untuk menampilkan grafik data Pengajuan PKL', '&#xf080', 1, '0000-00-00 00:00:00', NULL, '', NULL, 0),
(19, 'notifikasi', 'dashboard/notifikasi', 'Digunkan untuk mengirim pesan ke peserta PKL', '&#xf0a1', 1, '0000-00-00 00:00:00', NULL, '', NULL, 0),
(20, 'berkas', 'dashboard/berkas_member', 'Digunakan untuk mengunggah data berkas oleh peserta PKL', '&#xf187', 1, '0000-00-00 00:00:00', NULL, '', NULL, 0),
(21, 'Ubah Kata Sandi', 'dashboard/reset_password', 'Digunakan untuk mengganti password lama ', '&#xf085', 1, '0000-00-00 00:00:00', NULL, '', NULL, 0),
(22, 'testing', 'dash/test', 'ngetest', '&#xf085', 1, '2015-12-21 09:40:53', '2015-12-21 09:41:20', '122410101086', '122410101086', 1),
(23, 'Kuota', 'dashboard/kuota', 'Digunakan untuk mengatur kuota', '&#xf0e4', 1, '0000-00-00 00:00:00', NULL, '', NULL, 0),
(24, 'Kuota_detail', 'dashboard/kuota_detail', 'Digunakan untuk mengganti password lama ', '&#xf085', 0, '0000-00-00 00:00:00', NULL, '', NULL, 0),
(25, 'Detail Kelompok', 'dashboard/kelompok_detail', 'Digunakan untuk mengganti password lama ', '&#xf085', 0, '0000-00-00 00:00:00', NULL, '', NULL, 0),
(26, 'Pendaftar Diterima', 'dashboard/daftar_terima', 'Detail penerimaan pengaju', '&#xf085', 0, '0000-00-00 00:00:00', NULL, '', NULL, 0),
(27, 'Report', 'dashboard/report', 'Laporan diklat', '&#xf085', 1, '0000-00-00 00:00:00', NULL, '', NULL, 0),
(28, 'Kuota Bidang', 'dashboard/kuota_bidang', 'Laporan diklat', '&#xf085', 1, '0000-00-00 00:00:00', NULL, '', NULL, 0),
(29, 'Kelompok', 'dashboard/kelompok', 'daftar kelompok peserta magang', '&#xf085', 1, '0000-00-00 00:00:00', NULL, '', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_nteknis`
--

CREATE TABLE IF NOT EXISTS `tb_nilai_nteknis` (
  `id` mediumint(3) NOT NULL AUTO_INCREMENT,
  `id_member` int(7) NOT NULL,
  `disiplin` varchar(1) NOT NULL,
  `kerjasama` varchar(1) NOT NULL,
  `inisiatif` varchar(1) NOT NULL,
  `tanggung_jawab` varchar(1) NOT NULL,
  `keberhasilan` varchar(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_member` (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_teknis`
--

CREATE TABLE IF NOT EXISTS `tb_nilai_teknis` (
  `id` mediumint(3) NOT NULL AUTO_INCREMENT,
  `id_member` int(7) NOT NULL,
  `jenis_kegiatan` varchar(250) NOT NULL,
  `jumlah_jam` int(2) NOT NULL,
  `nilai` varchar(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_member` (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_notifikasi`
--

CREATE TABLE IF NOT EXISTS `tb_notifikasi` (
  `no` varchar(15) NOT NULL,
  `penerima` varchar(15) NOT NULL,
  `pesan` varchar(160) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL,
  `created_by` varchar(12) NOT NULL,
  `updated_by` int(12) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `penerima` (`penerima`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE IF NOT EXISTS `tb_pegawai` (
  `nip` varchar(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `id_unitkerja` varchar(20) NOT NULL,
  `hp` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `is_pembina` tinyint(4) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`nip`),
  KEY `id_unitkerja` (`id_unitkerja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`nip`, `nama`, `jabatan`, `id_unitkerja`, `hp`, `alamat`, `is_pembina`, `created_date`, `updated_date`, `created_by`, `updated_by`, `deleted`) VALUES
('122410101026', 'Mahmuda', 'BIro Diklat', '2002025300', '08993111823', 'Jalan Manggar XA gang Pemuda no.23 Jember', 0, '2015-09-29 00:00:00', NULL, '', NULL, 0),
('122410101033', 'Qomariyatul Hasanah', 'Sie Pembelajaran', '2007043000', '085723488999', 'Jember', 1, '0000-00-00 00:00:00', NULL, '', NULL, 0),
('122410101085', 'aji', 'kepala biro', '2002026100', '081231808707', 'jl. nias', 0, '0000-00-00 00:00:00', NULL, '', NULL, 0),
('122410101086', 'M Ainul Yaqin', 'Kepala SIE', '2002026200', '087556782', 'Jalan Kalimantan ', 1, '2015-09-23 00:00:00', NULL, '122410101086', NULL, 0),
('122410101087', 'M. Yaqin', 'seketaris', '2002025300', '081231808711', 'jl. pb. sudirman', 1, '0000-00-00 00:00:00', NULL, '', NULL, 0),
('122410101089', 'mahmuda', 'seketaris', '2002026200', '081231808710', 'jl. kalimantan', 0, '0000-00-00 00:00:00', NULL, '', NULL, 0),
('122410101097', 'arfan', 'kepala biro', '2002026000', '081231808706', 'jl. nias', 1, '0000-00-00 00:00:00', NULL, '', NULL, 0),
('122410101099', 'MAFULA', 'jab', '2002025300', '081231808713', 'jlan.', 1, '0000-00-00 00:00:00', NULL, '', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajuan_pembina`
--

CREATE TABLE IF NOT EXISTS `tb_pengajuan_pembina` (
  `id` varchar(17) NOT NULL,
  `id_member` int(7) NOT NULL,
  `pembina` varchar(12) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `alasan` text,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_member` (`id_member`),
  KEY `pembina` (`pembina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengajuan_pembina`
--

INSERT INTO `tb_pengajuan_pembina` (`id`, `id_member`, `pembina`, `status`, `alasan`, `created_date`, `updated_date`, `created_by`, `updated_by`, `deleted`) VALUES
('20160423023447', 2, '122410101087', -1, 'Maaf', '2016-04-23 02:34:47', '2016-04-23 02:36:59', '', '', 0),
('20160423023449', 1, '122410101033', -1, 'none', '2016-04-23 02:34:49', '2016-04-23 02:36:14', '', '', 0),
('20160423023927', 2, '122410101087', 2, 'none', '2016-04-23 02:39:27', '2016-04-23 02:55:39', '', '', 0),
('20160423025914', 3, '122410101033', 2, 'none', '2016-04-23 02:59:14', '2016-04-23 03:01:32', '', '', 0),
('20160423025915', 4, '122410101033', -1, 'kamu', '2016-04-23 02:59:15', '2016-04-23 03:01:43', '', '', 0),
('20160423030322', 4, '122410101087', -1, NULL, '2016-04-23 03:03:22', '0000-00-00 00:00:00', '', '', 0),
('20160524065550', 6, '122410101086', 1, NULL, '2016-05-24 06:55:50', '0000-00-00 00:00:00', '', '', 0),
('20160613051451', 4, '122410101086', 1, NULL, '2016-06-13 05:14:51', '0000-00-00 00:00:00', '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_unitkerja`
--

CREATE TABLE IF NOT EXISTS `tb_unitkerja` (
  `id` varchar(20) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `lokasi` varchar(25) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_unitkerja`
--

INSERT INTO `tb_unitkerja` (`id`, `deskripsi`, `lokasi`, `created_date`, `updated_date`, `created_by`, `updated_by`, `deleted`) VALUES
('2002025300', 'SEKSI ASET & KONFIGURASI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2002026000', 'BIRO OPERASI ICT SP', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2002026100', 'SEKSI DUKUNGAN APLIKASI SP', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2002026200', 'SEKSI DUKUNGAN JARINGAN SP', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2002026300', 'SEKSI DUKUNGAN USER DEVICE SP', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2002027000', 'BIRO OPERASI ICT ST', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2002027100', 'SEKSI DUKUNGAN APLIKASI ST', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2002027200', 'SEKSI DUKUNGAN JARINGAN ST', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2002027300', 'SEKSI DUKUNGAN USER DEVICE ST', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2002030000', 'DEPARTEMEN STRATEGIC PERFORMANCE MANAGEMENT', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2003000000', 'DIREKTUR PRODUKSI & LITBANG', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2003010000', 'DEPARTEMEN TEKNIK  & PRODUKTIVITAS', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2003011000', 'BIRO PROD & TAMBANG', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2003012000', 'BIRO PENINGKT PRODUKTIFITAS', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2003013000', 'BIRO LAYAN TEKNIK DAN PEMELIHARAAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2003020000', 'DEPARTEMEN LITBANG TEKNOLOGI & PRODUK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2003024000', 'BIRO SMSI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2003030000', 'DEPARTEMEN LITBANG  ENERGI, MATERIAL & LINGKUNGAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2003040000', 'DEPARTEMEN LITBANG APLIKASI PRODUK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2004000000', 'DIREKTUR ENGINIRING & PROYEK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2004010000', 'DEPARTEMEN PENGADAAN STRATEGIS ', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2004011000', 'BIRO PERENC & PENGENDALIAN PENGADAAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2004012000', 'BIRO PENGADAAN STRATEGIS', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2004012100', 'SEKSI PENGADAAN BARANG STRATEGIS', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2004012200', 'SEKSI PENGADAAN JASA STRATEGIS', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2004020000', 'DEPARTEMEN ENGINEERING KNOWLEDGE & INOVASI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2004021000', 'BIRO PENELTIAN ENGINERING & INOVASI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2004022000', 'BIRO ENGINEERING KNOWLEDGE', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2004110000', 'DEPARTEMEN RANCANG BANGUN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2004130000', 'DEPARTEMEN LAYANAN PROYEK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2005000000', 'DIREKTUR KOMERSIAL', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2005010000', 'DEPARTEMEN DISTRIBUSI & LOGISTIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2005020000', 'DEPARTEMEN PEMASARAN ', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2005021000', 'BIRO PERENCANAAN & PENGEMBANGAN PEMASARAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2005022000', 'BIRO KOMUNIKASI PEMASARAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2005023000', 'BIRO PENELITIAN PASAR & INTELEJEN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2006000000', 'DIREKTUR PENGEMBANGAN BISNIS DAN STRATEGI PERUSAHA', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2006010000', 'DEPARTEMEN PENGEMBANGAN PERUSAHAAN ', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2006020000', 'DEPARTEMEN CAPEX', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2006030000', 'DEPARTEMEN PERLUASAN BAHAN BAKU', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2007000000', 'DIREKTUR SUMBER DAYA MANUSIA DAN HUKUM', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2007010000', 'DEPARTEMEN HUKUM & GRC', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2007011000', 'BIRO  HUKUM ADMINISTRASI & ADVISORY', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2007012000', 'BIRO  HUKUM PERUSAHAAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2007013000', 'BIRO GRC', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2007020000', 'DEPARTEMEN SDM GROUP', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2007021000', 'BIRO MANAJEMEN TALENTA', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2007022000', 'BIRO SISTEM MANAJEMEN SDM ', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2007030000', 'DEPARTEMEN ASET PERUSAHAAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2007031000', 'BIRO ADMINISTRASI ASET', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2007032000', 'BIRO OPTIMASI ASET', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2007040000', 'DEPARTEMEN CENTER OF DYNAMIC LEARNING', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2007041000', 'BIRO PERENC KOMPETENSI & PEMBELAJARAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2007042000', 'BIRO KNOWLEDGE MANAJEMEN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2007043000', 'BIRO PUSAT PEMBELAJARAN GROUP', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2007043100', 'SEKSI PERSIAPAN PEMBELAJARAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2007043200', 'SEKSI PELAKSANAAN PEMBELAJARAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2007043300', 'SEKSI EVALUASI PEMBELAJARAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2009000000', 'KOMISARIS', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2009100000', 'KOMITE AUDIT', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('2009100300', 'MANAJEMEN PROYEK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7101211000', 'UMUM-SIE KEAMANAN GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7101211914', 'SEKSI KEAMANAN GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7101231000', 'SEKSI RUMAH TANGGA GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7101233000', 'SEKSI PEMELIHARAAN SARANA UMUM GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7103340901', 'BIRO PABRIK  GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7103341041', 'KILN GSK SIE OP FM GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7103341051', 'FINISH MILL GSK OP FM GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7103341061', 'PACKER GSK CURAH S. OP FM GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7103341062', 'PACKER GSK BAG S. OP FM GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7103341901', 'SEKSI OPERASI FINISH MILL & PACKER GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7103341913', 'PRODUKSI KANTONG GSK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7103342906', 'SEKSI PEMELIHARAAN MESIN  GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7103343000', 'UMUM SIE. PEMEL LISTRIK GSK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7103343903', 'UTILITAS GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7103343904', 'RAW WATER GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7103343907', 'SEKSI PEMEL. LISTRIK GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7103423901', 'SEKSI PERENCANAAN TEKNIK GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7103431914', 'SEKSI KESELAMATAN KERJA & KEBERSIHAN GSK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7104211000', 'SEKSI  PENYERAHAN  GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7104342901', 'SEKSI PENGELOLAAN PERSEDIAAN GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7201000000', 'EVP OPERASI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7201100000', 'INTERNAL AUDIT', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7201110000', 'BIRO AUDIT AKUNTANSI DAN KEUANGAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7201120000', 'BIRO AUDIT KOMERSIAL ', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7201130000', 'BIRO AUDIT TEKNIK ', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7201200000', 'DEPARTEMEN KOMUNIKASI & SARANA UMUM', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7201210000', 'BIRO KEAMANAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7201212000', 'UMUM-SIE KEAMANAN TUBAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7201212914', 'SEKSI KEAMANAN TUBAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7201220000', 'BIRO HUBUNGAN MASYARAKAT & CSR', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7201221000', 'SEKSI HUBUNGAN MASYARAKAT TUBAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7201222000', 'SEKSI BINA LINGKUNGAN TUBAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7201223000', 'SEKSI SEKRETARIAT DAN PROTOKOL TUBAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7201230000', 'BIRO SARANA UMUM', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7201232000', 'SEKSI RUMAH TANGGA TUBAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7201234000', 'SEKSI PEMELIHARAAN SARANA UMUM TUBAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202000000', 'VP KEUANGAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202100000', 'DEPARTEMEN AKUNTANSI & KEUANGAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202110000', 'BIRO BENDAHARA ', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202111000', 'SEKSI PENERIMAAN & PEMBAYARAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202112000', 'SEKSI PERENCANAAN LIKUIDITAS', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202120000', 'BIRO PERPAJAKAN & ASURANSI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202121000', 'SEKSI PERPAJAKAN ', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202122000', 'SEKSI ASURANSI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202130000', 'BIRO AKUNTANSI KEUANGAN & PELAPORAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202131000', 'SEKSI AKUNTANSI UMUM', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202132000', 'SEKSI AKUNTANSI BIAYA', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202133000', 'SEKSI VERIFIKASI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202140000', 'BIRO HUTANG & PIUTANG', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202141000', 'SEKSI HUTANG', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202142000', 'SEKSI PIUTANG', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202143000', 'SEKSI PENAGIHAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202200000', 'DEPARTEMEN SUMBER DAYA MANUSIA', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202210000', 'BIRO PERSONALIA', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202211000', 'SEKSI ADMINISTRASI KARYAWAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202212000', 'SEKSI TENAGA KONTRAK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202213000', 'SEKSI HUBUNGAN KARYAWAN & HIPERKES', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202220000', 'BIRO PUSAT PEMBELAJARAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202221000', 'SEKSI PERENCANAAN & EVALUASI PEMBELAJARAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202222000', 'SEKSI PELAKSANAAN PEMBELAJARAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202230000', 'BIRO PENGEMBANGAN ORGANISASI & SDM', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202231000', 'SEKSI PENGEMBANGAN ORGANISASI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202232000', 'SEKSI PERENCANAAN SDM', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7202233000', 'SEKSI KINERJA KARYAWAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203000901', 'VP PRODUKSI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203100901', 'DEPARTEMEN PRODUKSI BAHAN BAKU', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203110902', 'BIRO PENGENDALIAN PROSES', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203111902', 'SEKSI PENGENDALIAN  PROSES ', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203112901', 'UTILITAS OP UTILITAS', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203112903', 'FO/IDO S. OP UTILITAS', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203112904', 'RAW WATER OP UTILITAS', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203112905', 'AIR COMPR OP UTILITAS', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203120901', 'BIRO PRODUKSI BAHAN BAKU', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203121011', 'CRUSHER BT. KAPUR TUBAN1', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203121012', 'CRUSHER BT. KAPUR TUBAN2', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203121013', 'CRUSHER BT. KAPUR TUBAN3', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203121014', 'CRUSHER BT. KAPUR TUBAN4', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203121021', 'CRUSHER TNH LIAT TUBAN1', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203121022', 'CRUSHER TNH LIAT TUBAN2', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203121023', 'CRUSHER TNH LIAT TUBAN3', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203121024', 'CRUSHER TNH LIAT TUBAN4', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203121901', 'SEKSI OPERASI CRUSHER', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203121916', 'COAL TRANSPORT TBN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203122906', 'SEKSI PEMELIHARAAN MESIN CRUSHER', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203123901', 'SEKSI ALAT BERAT', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203124907', 'SEKSI  PEMEL LISTRIK & INSTRUMEN CRUSHER', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203130901', 'BIRO PERENCANAAN & PENGAWASAN TAMBANG', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203131000', 'SEKSI PENGELOLAAN LAHAN PASCA TAMBANG', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203132901', 'SEKSI PERENC. & PENGAWASAN TAMBANG', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203133901', 'SEKSI OPERASI TAMBANG', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203200901', 'DEPARTEMEN PRODUKSI  TERAK I', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203210071', 'NEW COAL MILL TUBAN 123', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203210901', 'BIRO PRODUKSI TERAK I', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203211031', 'RAW MILL TBN1 SEKSI RKC1', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203211041', 'KILN TUBAN1 - SEKSI RKC1', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203211071', 'COAL MILL TUBAN1 - SEKSI RKC1', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203211901', 'SEKSI OPERASI RKC TBN 1', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203212032', 'RAW MILL TBN2 - SEKSI RKC2', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203212042', 'KILN TBN2 - SEKSI RKC2', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203212072', 'COAL MILL TBN2 - SEKSI RKC2', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203212901', 'SEKSI OPERASI RKC TBN 2', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203213033', 'RAW MILL TBN3 - SEKSI RKC3', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203214901', 'SEKSI PENGELOLAAN  ALTERNATIF FUEL', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203214910', 'ALTERNATIF FUEL TBN1', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203214911', 'ALTERNATIF FUEL TBN2', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203214912', 'ALTERNATIF FUEL TBN3', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203220901', 'BIRO PEMELIHARAAN MESIN I', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203221906', 'SEKSI PEMELIHARAAN MESIN ROLLER MILL', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203222906', 'SIE PEMELIHARAAN MESIN KILN & COAL MILL', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203230901', 'BIRO PEMEL. LISTRIK & INSTRUMENTASI I', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203231000', 'UMUM- SIE PEML LISTRIK RKC 1-2', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203231907', 'SEKSI PEMELIHARAAN LISTRIK RKC 1-2', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203232907', 'SEKSI PEMEL INSTR & SISTEM KONTROL RKC 1-2', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203312000', 'PELABUHAN TUBAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203312061', 'PACKER T1 CRH SIE PACKER & PELB TBN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203312062', 'PACKER T2 CRH SIE PACKER & PELB TBN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203312063', 'PACKER T3 CRH SIE PACKER & PELB TBN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203312064', 'PACKER T1 BAG S. PACKER & PELB TBN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203312065', 'PACKER T2 BAG S. PACKER & PELB TBN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203312066', 'PACKER T3 BAG S. PACKER & PELB TBN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203312067', 'PACKER T4 CRH SIE PACKER & PELB TBN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203312068', 'PACKER T4 BAG S. PACKER & PELB TBN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203312901', 'PERENC SIE PACKER & PELB TBN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203312913', 'PRODUKSI KANTONG TBN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203312916', 'COAL & RAW TRANSPORT', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203312917', 'COAL STORAGE', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203320901', 'BIRO PEMELIHARAAN MESIN III', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203321906', 'SEKSI PEMELIHARAAN MESIN FM TBN12', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203322906', 'SEKSI PEMELIHARAAN MESIN PACKER & PELAB', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203323906', 'SEKSI PEMELIHARAAN MESIN FM TBN34', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203330901', 'BIRO PEMEL LISTRIK & INSTRUMENTASI III', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203331907', 'SEKSI PEMEL LISTRIK & INSTR FM 1-2', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203332907', 'SEKSI PEMEL LISTRIK & INSTR FM 3-4', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203333907', 'SEKSI PEMEL LIST & INSTR PACKER & PELABH', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203400901', 'DEPARTEMEN TEKNIK & JAMUT', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203410901', 'BIRO BENGKEL & KONSTRUKSI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203411906', 'SEKSI PEMELIHARAAN UTILITAS', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203412907', 'SEKSI BENGKEL LISTRIK & INSTRUMENTASI ', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203413906', 'SEKSI BENGKEL MESIN ', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203414901', 'SEKSI KONSTRUKSI ', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203420901', 'BIRO PERENCANAAN TEKNIK ', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203421901', 'SEKSI PERENCANAAN. SUKU CADANG ', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203422901', 'SEKSI INSPEKSI PEMELIHARAAN ', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203424901', 'SEKSI PENGENDALIAN PEMELIHARAAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203430914', 'BIRO  KESELAMATAN KERJA & LINGKUNGAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203432914', 'SEKSI KESELAMATAN KERJA & KEBERSIHAN TBN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203433914', 'SEKSI PENGENDALIAN EMISI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203434914', 'SEKSI KEBERSH & PENYEHATAN LINGKUNGAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203440901', 'BIRO  PENGENDALIAN GANGGUAN OPERASI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203450902', 'BIRO JAMINAN MUTU', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203451902', 'SEKSI JAMINAN MUTU', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203452902', 'SEKSI PENGUJIAN BAHAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203453902', 'SEKSI PERENCANAAN BAHAN & PRODUKSI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203454902', 'SEKSI PEMANTAUAN LINGKUNGAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203500901', 'DEPARTEMEN PRODUKSI  TERAK II', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7203510901', 'BIRO PRODUKSI TERAK II', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204000000', 'VP KOMERSIL', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204100000', 'DEPARTEMEN PENJUALAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204101000', 'SEKSI ADMINISTRASI PENJUALAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204110000', 'BIRO PENJUALAN  WILAYAH I', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204111000', 'SEKSI PENJUALAN  JATIM I', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204112000', 'SEKSI PENJUALAN  JATIM II', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204120000', 'BIRO PENJUALAN  WILAYAH II', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204121000', 'SEKSI PENJUALAN  JABAR, BANTEN & DKI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204122000', 'SEKSI PENJUALAN JATENG  &  DIY', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204130000', 'BIRO PENJUALAN  WILAYAH  III', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204131000', 'SEKSI  PENJUALAN  BALI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204132000', 'SEKSI  PENJUALAN  LUAR JAWA BALI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204140000', 'BIRO PERENC PEMASARAN & PELAYANAN PELANGGAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204141000', 'SEKSI KOMUNIKASI PELANGGAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204142000', 'SEKSI PELAYANAN PELANGGAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204143000', 'SEKSI PERENCANAAN PEMASARAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204150000', 'BIRO PENJUALAN SEMEN CURAH & PROYEK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204200000', 'DEPARTEMEN DISTRIBUSI & TRANSPORTASI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204201000', 'SEKSI ADMIN DISTRIBUSI & TRANSPORTASI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204210000', 'BIRO  DISTRIBUSI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204212000', 'SEKSI PENYERAHAN TUBAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204213000', 'SEKSI OPERASI  GUDANG  ', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204220000', 'BIRO  TRANSPORTASI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204221000', 'SEKSI ADMINISTRASI PELABUHAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204222000', 'SEKSI TRANSPORTASI LAUT', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204223000', 'SEKSI TRANSPORTASI DARAT', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204300000', 'DEP PENGADAAN  ', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204310000', 'BIRO PERENCANAAN PENGADAAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204320000', 'BIRO PENGADAAN BARANG', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204321000', 'SEKSI PENGADAAN  SUKU CADANG', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204322000', 'SEKSI PENGADAAN  BAHAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204330000', 'BIRO PENGADAAN  JASA', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204331000', 'SEKSI PENGADAAN  JASA RUTIN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204332000', 'SEKSI PENGADAAN  JASA NON RUTIN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204340901', 'BIRO PERSEDIAAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204341901', 'SEKSI PERENCANAAN PERSEDIAAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204343901', 'SEKSI PENERIMAAN BARANG', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7204344901', 'SEKSI PENGELOLAAN PERSEDIAAN TUBAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7304213001', 'GP GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7304213002', 'GP TANJUNG WANGI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7304213003', 'GP PELB. GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7304213005', 'GP BURNEH BANGKALAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7304213006', 'GP NAROGONG', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7304213010', 'GP CIWANDAN SP', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7304213012', 'GP TANJUNG PRIOK (SP)', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7304213013', 'GP SAMARINDA (ST)', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7304213014', 'GP PASOSO', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7304213701', 'GP GRESIK', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7304213702', 'GP TANJUNG WANGI', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7304213705', 'GP BURNEH BANGKALAN', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7304213706', 'GP NAROGONG', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7404213001', 'PACKING PLAN CIWANDAN CURAH', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7404213002', 'PACKING PLAN CIWANDAN BAG', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7404213003', 'PP CELUKAN BAWANG CURAH', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7404213004', 'PP CELUKAN BAWANG BAG', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7404213005', 'PACKING PLAN BANYUWANGI CURAH', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7404213006', 'PACKING PLAN BANYUWANGI BAG', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7404213007', 'PACKING PLAN SORONG CURAH', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7404213008', 'PACKING PLAN SORONG BAG', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7404213009', 'PP PONTIANAK CURAH (ST)', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7404213010', 'PACKING PLAN PONTIANAK BAG (ST)', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7404213011', 'PP BANJARMASIN CURAH', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0),
('7404213012', 'PP BANJARMASIN BAG', 'KOSONG', '0000-00-00 00:00:00', NULL, '', NULL, 0);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_admin_ibfk_4` FOREIGN KEY (`level`) REFERENCES `tb_level` (`level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD CONSTRAINT `tb_berkas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_hak_akses`
--
ALTER TABLE `tb_hak_akses`
  ADD CONSTRAINT `tb_hak_akses_ibfk_2` FOREIGN KEY (`level`) REFERENCES `tb_level` (`level`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_hak_akses_ibfk_3` FOREIGN KEY (`id_menu`) REFERENCES `tb_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kuota_bidang`
--
ALTER TABLE `tb_kuota_bidang`
  ADD CONSTRAINT `tb_kuota_bidang_ibfk_1` FOREIGN KEY (`bulan`) REFERENCES `tb_kuota_bulan` (`no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kuota_bidang_ibfk_2` FOREIGN KEY (`id_bidang`) REFERENCES `tb_bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_magang`
--
ALTER TABLE `tb_magang`
  ADD CONSTRAINT `tb_magang_ibfk_2` FOREIGN KEY (`pembina`) REFERENCES `tb_admin` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_magang_ibfk_3` FOREIGN KEY (`id_member`) REFERENCES `tb_member_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  ADD CONSTRAINT `tb_member_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_member_ibfk_2` FOREIGN KEY (`id_bidang`) REFERENCES `tb_bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_member_ibfk_3` FOREIGN KEY (`level`) REFERENCES `tb_level` (`level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_member_user`
--
ALTER TABLE `tb_member_user`
  ADD CONSTRAINT `tb_member_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_nilai_nteknis`
--
ALTER TABLE `tb_nilai_nteknis`
  ADD CONSTRAINT `tb_nilai_nteknis_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tb_member_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_nilai_teknis`
--
ALTER TABLE `tb_nilai_teknis`
  ADD CONSTRAINT `tb_nilai_teknis_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tb_member_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD CONSTRAINT `tb_pegawai_ibfk_1` FOREIGN KEY (`id_unitkerja`) REFERENCES `tb_unitkerja` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pengajuan_pembina`
--
ALTER TABLE `tb_pengajuan_pembina`
  ADD CONSTRAINT `tb_pengajuan_pembina_ibfk_2` FOREIGN KEY (`pembina`) REFERENCES `tb_admin` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengajuan_pembina_ibfk_3` FOREIGN KEY (`id_member`) REFERENCES `tb_member_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
