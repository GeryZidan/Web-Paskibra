-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2019 at 03:49 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paskib`
--

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `isi_postingan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `judul`, `waktu`, `gambar`, `isi_postingan`) VALUES
(1, 'Judul 001', '30.03.19', 'p1.jpg', 'Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . '),
(2, 'Judul 002', '30.03.19', 'p3.jpg', 'Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . Lorem ipsum ip summary loram apsum ip primary . ');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(5) NOT NULL,
  `nama_materi` varchar(50) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `nama_materi`, `link`) VALUES
(1, 'materi 01', 'https://www.google.com/'),
(2, 'materi 02', 'https://www.google.com/'),
(3, 'materi 03', 'https://www.google.com/'),
(4, 'materi 04', 'https://www.google.com/'),
(5, 'materi 05', 'https://www.google.com/'),
(6, 'materi 06', 'https://www.google.com/');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `nra` int(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  `kebidangan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nra`, `nama`, `satuan`, `angkatan`, `kebidangan`, `email`, `password`, `level`) VALUES
(1, 0, 'Ucok Johnson', '0', '2018', 'Anggota', 'cjgroove@gmail.com', 'carl', 'admin'),
(2, 1, 'Budi Bismilah', '3', '2017', 'Ketua', 'budiiii@gmail.com', 'buahahaha', 'user'),
(3, 1, 'Udin Sumanudin', '1', '2018', 'Anggota', 'udinz@gmail.com', 'udin', 'user'),
(4, 2, 'Seto Gembira', '1', '2017', 'Bendahara', 'gseto@gmail.com', 'seto', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
