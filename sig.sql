-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2024 at 05:07 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sig`
--

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `lat_lng` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `lat_lng`, `nama`, `kategori`, `keterangan`, `gambar`) VALUES
(14, '-4.008195616146536, 122.52150535583498', 'Universitas Halu Oleo', 'Negeri', 'Kampus Hijau', '1-768x512.jpg'),
(15, '-3.998600684383084, 122.5089740753174', 'FISIP Universitas Muhammadiyah Kendari', 'Swasta', 'Fakultas', 'IMG-20240201-WA0003-1-700x432.jpg'),
(16, '-5.489018529816925, 122.57270872592927', 'Universitas Dayanu Ikhsanuddin', 'Swasta', 'Bagus', '1676430407.jpg'),
(17, '-5.462906240315771, 122.59980708360673', 'FISIP Universitas Muhammadiyah Buton', 'Swasta', 'Kampus', 'DJI_0066a.jpg'),
(18, '-3.999612090745065, 122.52136856317522', 'Universitas Mandala Waluya', 'Swasta', 'Kampus Kesehatan', 'universitas-mandala-waluya-kendari.jpg'),
(19, '-4.041799998494538, 122.47756004333498', 'Universitas Sulawesi Tenggara', 'Swasta', 'Bagus', 'rektorat_unsultra.jpg'),
(20, '-4.042980980206985, 122.47604995965959', 'IAIN Kendari', 'Negeri', 'Bagus', 'IDUP17194749010476165.jpg'),
(21, '-4.072999916490853, 121.62449419498445', 'Universitas 19 November Kolaka', 'Negeri', 'Bagus', '1706758051-xcGgm2EGv8-thumbnail.jpg'),
(22, '-5.464091730922874, 122.86216735839845', 'Universitas Muhammadiyah Buton', 'Swasta', 'Bagus', 'index.jpg'),
(23, '-5.4790703626629025, 122.58759498596193', 'Politeknik Baubau', 'Swasta', 'Kampus Kesehatan', 'kampus.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(4, 'admin', '$2y$10$me0x1cBgOpGE3sMY8vxMzuSC.l5QtA5ALo7RoDyI.hEEe7gz8EMp2'),
(5, 'sumiartin', '$2y$10$alQ9dHCUHwKUTymnDAWH4.CTpKEl.xSlg9WSuENndoth3sD1susDi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
