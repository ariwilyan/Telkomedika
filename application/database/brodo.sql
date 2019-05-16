-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2019 at 03:30 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brodo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_admin` int(11) NOT NULL,
  `Nama_admin` varchar(50) NOT NULL,
  `No_hp` varchar(50) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_admin`, `Nama_admin`, `No_hp`, `Alamat`, `Username`, `Password`) VALUES
(1, 'Ari Wilyan', '082280585407', 'Rajawali Futsal 12', 'admin', 'admin123'),
(2, 'Tita Nurul', '082212345678', 'Pasir Impun', 'admintita', 'admin123'),
(3, 'Alzira Azka', '082287654321', 'Pasar Cinde', 'adminazka', 'admin123'),
(4, 'Hendro Pratama', '082242318675', 'Gang Demang', 'adminhendro', 'admin123'),
(5, 'Jiddy', '082243215678', 'Bojongsoang Asri', 'adminjiddy', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ID_item` int(11) NOT NULL,
  `Nama_item` varchar(50) NOT NULL,
  `Harga_item` varchar(10) NOT NULL,
  `Deskripsi_item` varchar(100) DEFAULT NULL,
  `Foto` varchar(1000) NOT NULL DEFAULT 'Default_item.png',
  `no_sub_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ID_item`, `Nama_item`, `Harga_item`, `Deskripsi_item`, `Foto`, `no_sub_kategori`) VALUES
(25, 'Brunn Kids White White Sole', '399000', NULL, 'gambar1.jpg', 4),
(26, 'Brunn Grey White Sole', '495000', NULL, 'gambar2.jpg', 4),
(27, 'Fujin Navy White Sole', '499000', NULL, 'gambar3.jpg', 4),
(28, 'Raijin Navy White Sole', '499000', NULL, 'gambar4.jpg', 4),
(29, 'Brodo x Cottonink Brunn Peach White Sole', '479000', NULL, 'gambar5.jpg', 4),
(30, 'Navante E + Dark Choco Black Sole', '640000', NULL, 'gambar6.jpg', 4),
(31, 'Base Black Gumsole', '399000', NULL, 'gambar7.jpg', 4),
(32, 'Base Black Blacksole', '399000', NULL, 'gambar8.jpg', 4),
(33, 'Base Navy Gumsole', '399000', NULL, 'gambar9.jpg', 4),
(34, 'Brunn Black White Sole', '495000', NULL, 'gambar10.jpg', 4),
(35, 'Brunn Navy White Sole', '495000', NULL, 'gambar11.jpg', 4),
(36, 'Brunn Full White WS', '495000', NULL, 'gambar12.jpg', 4),
(37, 'Baju Baru', '1000', NULL, 'Default_item.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `no_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`no_kategori`, `nama_kategori`) VALUES
(1, 'Pakaian'),
(2, 'Shoes'),
(3, 'Inspirasi'),
(4, 'Aksesoris'),
(5, 'Sandals');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `no_sub_kategori` int(11) NOT NULL,
  `nama_sub_kategori` varchar(20) NOT NULL,
  `no_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`no_sub_kategori`, `nama_sub_kategori`, `no_kategori`) VALUES
(1, 'Atasan', 1),
(2, 'Bawahan', 1),
(3, 'Signature Collection', 2),
(4, 'Sneakers', 2),
(5, 'Boots', 2),
(6, 'Outfits Kerja', 3),
(7, 'Outfits Travel', 3),
(8, 'Grooming', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_user` int(50) NOT NULL,
  `Nama_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_user`, `Nama_user`, `email`, `Password`) VALUES
(1, 'Rahmat Hendrawan', 'rahmatgantengbangetuhuy@gmail.com', '123123'),
(2, 'Tita Nurul', 'titanggraita@gmail.com', '123'),
(3, 'Monica', 'monicatr@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_admin`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ID_item`),
  ADD KEY `item_subkategori` (`no_sub_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`no_kategori`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`no_sub_kategori`),
  ADD KEY `kategori_subkategori` (`no_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ID_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `no_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `no_sub_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_subkategori` FOREIGN KEY (`no_sub_kategori`) REFERENCES `sub_kategori` (`no_sub_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD CONSTRAINT `kategori_subkategori` FOREIGN KEY (`no_kategori`) REFERENCES `kategori` (`no_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
