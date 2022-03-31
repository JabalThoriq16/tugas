-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 08:00 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas`
--

-- --------------------------------------------------------

--
-- Table structure for table `apotek`
--

CREATE TABLE `apotek` (
  `id` int(11) NOT NULL,
  `nama` char(64) NOT NULL,
  `jenis` char(24) NOT NULL,
  `kadaluarsa` date NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apotek`
--

INSERT INTO `apotek` (`id`, `nama`, `jenis`, `kadaluarsa`, `quantity`) VALUES
(1, 'obat maag', 'perut', '2022-03-30', 10),
(2, 'obat pusing', 'kepala', '2022-03-31', 10),
(3, 'obat luka', 'kulit', '2022-03-25', 15),
(4, 'obat sariawan', 'mulut', '2022-03-31', 10),
(5, 'obat sembelit', 'perut', '2023-03-08', 10),
(6, 'obat nyeri otot', 'otot', '2023-03-24', 20),
(7, 'obat jerawat', 'kulit', '2025-03-13', 10),
(8, 'obat sesak nafas', 'paru-aru', '2024-03-20', 20),
(9, 'obat rontok', 'kepala', '2022-03-30', 10),
(10, 'obat flu', 'hidung', '2022-03-30', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apotek`
--
ALTER TABLE `apotek`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apotek`
--
ALTER TABLE `apotek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
