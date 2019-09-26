-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2019 at 05:44 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kolonoskopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_dokter`
--

CREATE TABLE `m_dokter` (
  `id_dokter` int(10) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_dokter`
--

INSERT INTO `m_dokter` (`id_dokter`, `nama_dokter`) VALUES
(1, 'Dr. Dasa Nugrahanta Putra, SpB-KBD, FICS');

-- --------------------------------------------------------

--
-- Table structure for table `m_ruang`
--

CREATE TABLE `m_ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_ruang`
--

INSERT INTO `m_ruang` (`id_ruang`, `nama_kelas`) VALUES
(1, 'Ruang Dahlia'),
(3, 'Rawat Jalan'),
(4, 'Ruang Anggrek');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `level` enum('admin','maintenage','user') NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `tanggal_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`id_user`, `nama_user`, `level`, `username`, `password`, `tanggal_input`) VALUES
(1, 'Benny Danang Kurniawan, S. Kom', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2019-09-18'),
(2, 'Hidayat Setyanto,  S. Kom', 'maintenage', 'maintenage', '202cb962ac59075b964b07152d234b70', '2019-08-01'),
(3, 'Murniasih A.md', 'user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '2019-08-01'),
(8, 'Benny Danang Kurniawan, S.Kom', 'admin', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `t_foto`
--

CREATE TABLE `t_foto` (
  `id_foto` int(100) NOT NULL,
  `id_pasien` int(100) NOT NULL,
  `nama_foto` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_foto`
--

INSERT INTO `t_foto` (`id_foto`, `id_pasien`, `nama_foto`, `token`) VALUES
(22, 8, 'IMG_1650.JPG', '0.22268956201398526'),
(23, 8, 'IMG_1651.JPG', '0.3505904625290017'),
(24, 8, 'IMG_1653.JPG', '0.0640520824855193'),
(25, 8, 'IMG_1652.JPG', '0.5250186802109815'),
(26, 8, 'IMG_1654.JPG', '0.7682613519403243'),
(27, 8, 'IMG_1656.JPG', '0.5778897320567229'),
(28, 8, 'IMG_1655.JPG', '0.2291937984508272'),
(29, 8, 'IMG_1657.JPG', '0.6111253747622518'),
(30, 10, 'IMG_1012.JPG', '0.8365592448960002'),
(31, 10, 'IMG_1017.JPG', '0.7329628836038355'),
(32, 10, 'IMG_1024.JPG', '0.3251974746797941'),
(33, 10, 'IMG_1023.JPG', '0.7963486492344323'),
(34, 10, 'IMG_1025.JPG', '0.6589954123738067'),
(35, 10, 'IMG_1026.JPG', '0.16093979159072314'),
(36, 10, 'IMG_1028.JPG', '0.8514197030585071'),
(37, 10, 'IMG_1027.JPG', '0.8169358152122304');

-- --------------------------------------------------------

--
-- Table structure for table `t_pasien`
--

CREATE TABLE `t_pasien` (
  `id_pasien` int(100) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `no_rm` varchar(100) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_kamar` int(50) NOT NULL,
  `id_dokter` int(50) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `diagnosa` varchar(100) NOT NULL,
  `alat` varchar(100) NOT NULL,
  `obat_pre` varchar(250) NOT NULL,
  `tanggal_input` date NOT NULL,
  `hasil` text NOT NULL,
  `kesimpulan` text NOT NULL,
  `saran` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `status` enum('sudah','belum') NOT NULL,
  `perkiraan_operasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pasien`
--

INSERT INTO `t_pasien` (`id_pasien`, `barcode`, `no_rm`, `nama_pasien`, `tempat`, `tanggal_lahir`, `alamat`, `id_kamar`, `id_dokter`, `keluhan`, `diagnosa`, `alat`, `obat_pre`, `tanggal_input`, `hasil`, `kesimpulan`, `saran`, `jenis_kelamin`, `status`, `perkiraan_operasi`) VALUES
(8, 'KLRSWW0000001', '00050097', 'Surtinah', 'Boyolali', '2001-09-02', 'Ngelo RT 05 / RW 01', 1, 1, 'Bab Berdarah', 'F4', 'KOLONOSKOPI', 'Bioplasma, generator, Disel', '2019-09-17', '<p>Cukup Baik Banget</p>\r\n<p>Penambahan Bahan A</p>', '<p>cukup membaik sekali</p>', '<p>Mungkin Lebih Baik</p>', 'P', 'sudah', '2019-09-18'),
(9, 'KLRSWW0000002', '00050096', 'Parto', 'Boyolali', '1902-11-13', 'Boyolali RT 05 / RW 07', 3, 1, 'sering Pusing', 'F4', 'KOLONOSKOPI', 'Bio', '2019-09-18', '', '', '', 'L', 'belum', '2019-09-18'),
(10, 'KLRSWW0000003', '00000099', 'sumarni solikah', 'Boyolali', '1986-05-05', 'ngendo RT 11 / RW 07', 3, 1, 'Perut Sakit karena lapar', 'A77', 'KOLONOSKOPI', 'Bioplasma, generator, Disel', '2019-08-01', '<p>Baik,</p>', '<p>baik,</p>', '<p>baik</p>', 'P', 'sudah', '2019-09-20'),
(11, 'KLRSWW0000004', '000000016', 'Dwi Senjati', 'Boyolali', '1990-09-15', 'Boyolali RT 05 / RW 01', 3, 1, 'Bab Berdarah', 'F4', 'KOLONOSKOPI', 'Bio', '2019-09-19', '', '', '', 'P', 'belum', '2019-09-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_dokter`
--
ALTER TABLE `m_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `m_ruang`
--
ALTER TABLE `m_ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `t_foto`
--
ALTER TABLE `t_foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `t_pasien`
--
ALTER TABLE `t_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_dokter`
--
ALTER TABLE `m_dokter`
  MODIFY `id_dokter` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_ruang`
--
ALTER TABLE `m_ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_foto`
--
ALTER TABLE `t_foto`
  MODIFY `id_foto` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `t_pasien`
--
ALTER TABLE `t_pasien`
  MODIFY `id_pasien` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
