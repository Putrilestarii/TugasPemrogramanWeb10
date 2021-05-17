-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 12:44 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_grafik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_corona`
--

CREATE TABLE `tb_corona` (
  `id_corona` int(11) NOT NULL,
  `countryother` varchar(11) NOT NULL,
  `totalcases` varchar(255) NOT NULL,
  `newcases` varchar(255) NOT NULL,
  `totaldeaths` varchar(255) NOT NULL,
  `newdeaths` varchar(255) NOT NULL,
  `totalrecovered` varchar(255) NOT NULL,
  `activecases` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_corona`
--

INSERT INTO `tb_corona` (`id_corona`, `countryother`, `totalcases`, `newcases`, `totaldeaths`, `newdeaths`, `totalrecovered`, `activecases`) VALUES
(1, 'USA', '33515308', '+30152', '596179', '+370', '26507427', '5979784'),
(2, 'India', '22991927', '+329571', '250025', '+3879', '19021207', '3522905'),
(3, 'Brazil', '15214030', '+29240', '423436', '+1018', '13759125', '1094365'),
(4, 'France', '5780379', '+3292', '106684', '+292', '4917393', '1791815'),
(5, 'Turkey', '5044936', '+13604', '43311', '+282', '4743871', '125358'),
(6, 'Russia', '4888727', '+8465', '113647', '+321', '4502906', '4679465'),
(7, 'UK', '4437217', '+2357', '127609', '+4', '4250699', '45891'),
(8, 'Italy', '4116287', '+5080', '123031', '+198', '3619586', '328882'),
(9, 'Spain', '3581392', '+4579', '78895', '+35', '3274808', '228120'),
(10, 'Germany', '3535354', '+7814', '85481', '+110', '3175600', '215508');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_corona`
--
ALTER TABLE `tb_corona`
  ADD PRIMARY KEY (`id_corona`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_corona`
--
ALTER TABLE `tb_corona`
  MODIFY `id_corona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
