-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2019 at 03:29 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telkomedika`
--

-- --------------------------------------------------------

--
-- Table structure for table `apoteker`
--

CREATE TABLE `apoteker` (
  `id_apoteker` int(11) NOT NULL,
  `nama_apoteker` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apoteker`
--

INSERT INTO `apoteker` (`id_apoteker`, `nama_apoteker`, `jenis_kelamin`, `username`, `password`) VALUES
(1, 'enggal', 'L', 'enggal', '123'),
(2, 'wota', 'P', 'wotawibu', '123');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jadwal_awal` date NOT NULL,
  `jadwal_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `username`, `password`, `jadwal_awal`, `jadwal_akhir`) VALUES
(1, 'reisa', 'reisabroto', '123', '2019-05-01', '2019-05-16'),
(2, 'abdulmuluk', 'abdulmuluk', '123', '2019-05-05', '2019-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jenis_obat` varchar(50) NOT NULL,
  `gambar_obat` varchar(1000) NOT NULL DEFAULT 'default_gambar.png',
  `harga_obat` varchar(10) NOT NULL,
  `stok_obat` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis_obat`, `gambar_obat`, `harga_obat`, `stok_obat`) VALUES
(1, 'Tolak Angin', 'Obat Herbal', 'default_gambar.png', '5000', 20),
(2, 'Antangin', 'Obat Masuk Angin', 'default_gambar.png', '3000', 5),
(3, 'Adem Sari', 'Panas Dalam', 'adem-sari.jpg', '2000', 10),
(12, 'OBH Combi', 'Batuk', 'ultra-flu.jpg', '10000', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `foto` varchar(1000) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `birthday`, `email`, `username`, `password`, `alamat`, `no_telepon`, `jenis_kelamin`, `foto`) VALUES
(1, 'Ari Wilyan', '2019-03-18', 'ariwilyan@gmail.com', 'ariwilyan', '123', 'Rajawali Futsal 12', '082280585407', 'L', 'pas_foto-min.jpg'),
(2, 'Ryan Ramdhani', '2019-05-01', 'ramadhelza@gmail.com', 'ryanrmd', '123', 'GBA', '082212345678', 'L', 'default.jpg'),
(3, 'Jiddy Abdillah', '2019-05-04', 'jiddyabd@gmail.com', 'jiddyabdillah', '123', 'gang demang', '082212345678', 'L', 'default.jpg'),
(4, 'Yudha Febris', '2019-04-17', 'yudhafebris@gmail.com', 'yudhafebris', '123', 'gang demang', '082212345678', 'L', 'default.jpg'),
(5, 'Hendro Pratama', '2019-03-16', 'hendropratama@gmail.com', 'hendropratama', '123', 'Rajawali', '082212345678', 'L', 'default.jpg'),
(6, 'Azka Karamoi', '2019-04-01', 'azkakaramoi@gmail.com', 'azkakaramoi', '123', 'Sukapura', '082212345678', 'P', 'default.jpg'),
(9, 'Fajar Hidayat', '2019-03-24', 'fajarhidayat@gmail.com', 'fajarhidayat', '123', 'akita', '082212345678', 'L', 'default.jpg'),
(10, 'Monica Triyani', '2019-03-08', 'monicatriyani@gmail.com', 'monicatriyani', '123', 'sukabirus', '082212345678', 'P', 'default.jpg'),
(12, 'Marwa Hasna', '2019-02-09', 'marwa@gmail.com', 'marwa', '123', 'gg demang', '082212345678', 'P', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `jadwal` date NOT NULL,
  `keluhan` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apoteker`
--
ALTER TABLE `apoteker`
  ADD PRIMARY KEY (`id_apoteker`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD KEY `fk_Periksa_dokter_idx` (`id_pasien`),
  ADD KEY `fk_Periksa_pasien1_idx` (`id_dokter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apoteker`
--
ALTER TABLE `apoteker`
  MODIFY `id_apoteker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `fk_Periksa_dokter` FOREIGN KEY (`id_pasien`) REFERENCES `dokter` (`id_dokter`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Periksa_pasien1` FOREIGN KEY (`id_dokter`) REFERENCES `pasien` (`id_pasien`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
