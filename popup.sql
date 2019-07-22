-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2019 at 03:51 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `counter`
--

-- --------------------------------------------------------

--
-- Table structure for table `proxy`
--

CREATE TABLE `proxy` (
  `id` int(11) NOT NULL,
  `Proxy` varchar(100) NOT NULL,
  `Status` int(2) NOT NULL,
  `date` datetime NOT NULL,
  `websites` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proxy`
--

INSERT INTO `proxy` (`id`, `Proxy`, `Status`, `date`, `websites`) VALUES
(1126, '94.101.141.242:80\r\n', 1, '2019-07-15 19:37:41', '[\"example.com\"]'),
(1127, '81.91.144.53:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1128, '31.29.37.81:60560\r\n', 0, '1990-01-01 12:00:00', ''),
(1129, '37.235.31.248:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1130, '5.160.85.2:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1131, '46.209.74.82:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1132, '188.136.243.51:38977\r\n', 0, '1990-01-01 12:00:00', ''),
(1133, '188.253.2.163:3128\r\n', 0, '1990-01-01 12:00:00', ''),
(1134, '185.83.197.229:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1135, '84.241.22.20:23500\r\n', 0, '1990-01-01 12:00:00', ''),
(1136, '5.160.39.226:52550\r\n', 0, '1990-01-01 12:00:00', ''),
(1137, '37.32.10.215:56696\r\n', 0, '1990-01-01 12:00:00', ''),
(1138, '5.160.124.139:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1139, '185.159.87.249:54100\r\n', 0, '1990-01-01 12:00:00', ''),
(1140, '31.47.55.66:52373\r\n', 0, '1990-01-01 12:00:00', ''),
(1141, '31.29.61.37:37623\r\n', 0, '1990-01-01 12:00:00', ''),
(1142, '185.20.163.135:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1143, '94.74.153.1:808\r\n', 0, '1990-01-01 12:00:00', ''),
(1144, '89.221.90.238:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1145, '46.209.150.88:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1146, '178.253.46.79:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1147, '80.191.174.220:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1148, '92.50.23.66:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1149, '46.209.30.156:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1150, '46.100.95.205:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1151, '81.12.91.202:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1152, '178.22.122.76:8585\r\n', 0, '1990-01-01 12:00:00', ''),
(1153, '46.209.77.235:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1154, '46.209.77.227:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1155, '5.160.137.30:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1156, '95.38.213.44:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1157, '109.238.190.136:8080\r\n', 0, '1990-01-01 12:00:00', ''),
(1158, '82.99.223.94:47209\r\n', 0, '1990-01-01 12:00:00', ''),
(1159, '86.109.43.218:3128\r\n', 0, '1990-01-01 12:00:00', ''),
(1160, '185.109.62.124:808\r\n', 0, '1990-01-01 12:00:00', ''),
(1161, '2.188.167.50:8080', 0, '1990-01-01 12:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `site` varchar(255) NOT NULL,
  `userid` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `site`, `userid`) VALUES
(1, 'example.ir', '5313'),
(2, 'example.com', '1263');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proxy`
--
ALTER TABLE `proxy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Proxy_UNIQUE` (`Proxy`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_UNIQUE` (`site`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proxy`
--
ALTER TABLE `proxy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1162;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
