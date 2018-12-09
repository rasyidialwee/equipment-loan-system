-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2018 at 03:32 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admID` int(11) NOT NULL,
  `admName` varchar(100) NOT NULL,
  `admPwd` varchar(80) NOT NULL,
  `admEmail` varchar(100) NOT NULL,
  `admPhone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admID`, `admName`, `admPwd`, `admEmail`, `admPhone`) VALUES
(8, 'MAS HAIRUL RASYIDI BIN ALWEE', '$2y$10$PnpTYaEWGguo2uKpkN3UCeLWQX5JwbmmlYsVHtpgho.dc.XpNn3au', 'rasyidialwee@gmail.com', '+60133962556');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `lnID` int(11) NOT NULL,
  `lnMatricID` int(11) NOT NULL,
  `lnTool` int(3) NOT NULL,
  `lnQuantity` int(2) NOT NULL,
  `lnStartDate` date NOT NULL,
  `lnStartTime` time NOT NULL,
  `lnReturnDate` date NOT NULL,
  `lnReturnTime` time NOT NULL,
  `lnStatus` enum('Unreturned','Completed','Damaged','Late') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`lnID`, `lnMatricID`, `lnTool`, `lnQuantity`, `lnStartDate`, `lnStartTime`, `lnReturnDate`, `lnReturnTime`, `lnStatus`) VALUES
(1, 1234, 2, 2, '2018-08-20', '18:08:03', '2018-08-21', '01:08:28', 'Unreturned'),
(2, 1150381, 2, 2, '2018-08-21', '01:08:08', '2018-08-21', '01:08:12', 'Completed'),
(3, 1150381, 3, 3, '2018-10-17', '14:10:30', '0000-00-00', '00:00:00', 'Unreturned');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logID` int(11) NOT NULL,
  `logDate` date NOT NULL,
  `logTime` time NOT NULL,
  `logAction` varchar(300) NOT NULL,
  `logUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logID`, `logDate`, `logTime`, `logAction`, `logUser`) VALUES
(1, '2018-08-11', '18:27:57', 'logged out', 0),
(2, '2018-08-11', '18:28:17', 'Log in success', 1),
(3, '2018-08-11', '18:28:20', 'Log in success', 1),
(4, '2018-08-11', '18:29:10', 'Log in success', 1),
(5, '2018-08-11', '18:29:50', 'Log in success', 1),
(6, '2018-08-11', '18:29:55', 'Log in success', 1),
(7, '2018-08-11', '18:31:10', 'logged out', 0),
(8, '2018-08-11', '18:32:54', 'logged out', 1),
(9, '2018-08-11', '18:33:06', 'Log in success', 1),
(10, '2018-08-11', '18:33:16', 'logged out', 1),
(11, '2018-08-11', '18:33:23', 'Log in success', 1),
(12, '2018-08-11', '18:34:51', 'tool new with variation baru added', 0),
(13, '2018-08-11', '18:36:54', 'tool tesbau with variation bau added', 1),
(14, '2018-08-11', '18:37:36', 'tool 3 deleted', 1),
(15, '2018-08-12', '09:19:29', 'Log in success', 1),
(16, '2018-08-12', '09:30:50', 'Log in success', 1),
(17, '2018-08-18', '17:15:25', 'Log in success', 1),
(18, '2018-09-04', '14:24:09', 'Log in success', 1),
(19, '2018-09-04', '14:49:37', 'logged out', 1),
(20, '2018-09-04', '14:49:42', 'Log in success', 1),
(21, '2018-09-04', '15:03:37', 'tool 1 deleted', 1),
(22, '2018-09-04', '15:04:46', 'tool Talam ( Makan) with variation Merah added', 1),
(23, '2018-09-04', '15:04:46', 'tool 1 deleted', 1),
(24, '2018-09-04', '15:52:03', 'created admin admin with email admin@admin.com', 1),
(25, '2018-09-04', '15:52:29', 'created admin admin with email admin@admin.com', 1),
(26, '2018-09-04', '15:52:46', 'created admin admin with email admin@admin.com', 1),
(27, '2018-09-04', '15:53:07', 'created admin admin with email admin@admin.com', 1),
(28, '2018-09-04', '15:53:27', 'created admin admin with email admin@admin.com', 1),
(29, '2018-09-04', '15:53:34', 'created admin admin with email admin@admin.com', 1),
(30, '2018-09-04', '15:54:05', 'tool 6 deleted', 1),
(31, '2018-09-04', '15:55:39', 'tool 1 deleted', 1),
(32, '2018-09-04', '15:55:59', 'created admin MAS HAIRUL RASYIDI BIN ALWEE with email rasyidialwee@gmail.com', 1),
(33, '2018-09-04', '15:55:59', 'tool 1 deleted', 1),
(34, '2018-09-04', '15:56:27', 'logged out', 1),
(35, '2018-09-04', '15:56:32', 'Log in success', 8),
(36, '2018-09-04', '16:23:44', 'user 4 deleted', 8),
(37, '2018-09-04', '16:26:11', 'logged out', 8),
(38, '2018-10-05', '16:30:03', 'Log in success', 8),
(39, '2018-10-16', '10:43:47', 'Log in failed', 8),
(40, '2018-10-16', '10:43:51', 'Log in success', 8),
(41, '2018-10-17', '11:38:47', 'Log in success', 8),
(42, '2018-10-17', '14:03:39', 'logged out', 8),
(43, '2018-10-17', '14:04:30', 'Log in success', 8),
(44, '2018-10-17', '14:04:34', 'logged out', 8),
(45, '2018-10-17', '14:14:28', 'Log in success', 8),
(46, '2018-10-17', '14:16:33', 'logged out', 8),
(47, '2018-10-17', '14:17:16', 'Log in success', 8),
(48, '2018-11-23', '21:36:38', 'Log in success', 8),
(49, '2018-12-05', '21:26:45', 'logged out', 1),
(50, '2018-12-05', '21:26:50', 'Log in success', 8),
(51, '2018-12-05', '22:08:59', 'logged out', 4),
(52, '2018-12-05', '22:09:08', 'Log in success', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `tlID` int(11) NOT NULL,
  `tlName` varchar(100) NOT NULL,
  `tlVariation` varchar(50) NOT NULL,
  `tlQuantity` int(11) NOT NULL,
  `tlLeft` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`tlID`, `tlName`, `tlVariation`, `tlQuantity`, `tlLeft`) VALUES
(2, 'Talam (Makan)', 'Hijau', 10, 0),
(3, 'Talam (Makan)', 'Biru', 8, 5),
(4, 'Talam(Makan)', 'Putih', 3, 0),
(5, 'Alas Dulang', 'Emas', 2, 0),
(6, 'Alas Dulang', 'Putih', 1, 0),
(7, 'Alas Dulang', 'Oren', 1, 0),
(8, 'Alas Dulang', 'Coklat Bunga', 3, 0),
(9, 'Alas Dulang', 'Merah Bunga', 1, 0),
(10, 'Goblet', 'Panjang', 9, 0),
(11, 'Goblet', 'Pendek', 4, 0),
(12, 'Alas Meja Makan', 'Maroon Bercorak', 1, 0),
(13, 'Alas Meja Makan', 'Hijau Bercorak', 1, 0),
(14, 'Alas Meja Makan', 'Maroon', 7, 0),
(15, 'Alas Meja Makan', 'Krim', 2, 0),
(16, 'Alas Meja Makan', 'Biru Cair', 2, 0),
(17, 'Alas Meja Makan', 'Emas - Kecil', 2, 0),
(18, 'Alas Meja Makan', 'Merah - Kecil', 4, 0),
(19, 'Alas Meja Makan', 'Hitam', 16, 0),
(20, 'Alas Meja Makan', 'Ungu', 3, 0),
(21, 'Stand Bunting', '', 10, 0),
(22, 'Global Zakat Game', '', 3, 0),
(23, 'Bekas Air', '', 2, 0),
(24, 'Vest SekreFaST', '', 18, 0),
(25, 'Set Catur', '', 7, 0),
(26, 'Jersi', 'Kuning/Hitam (Bola)', 16, 0),
(27, 'Jersi', 'Merah/Hitam', 16, 0),
(28, 'Jersi', 'Kelabu/Pink', 16, 0),
(29, 'Jersi', 'Muslimah', 10, 0),
(30, 'Jersi', 'Biru/Oren', 8, 0),
(31, 'Jersi', 'Biru/Hijau', 8, 0),
(32, 'Jersi', 'Hitam/Oren', 3, 0),
(33, 'Jersi', 'Keeper - Kuning', 1, 0),
(34, 'Jersi', 'Keeper - Biru', 1, 0),
(35, 'Short Pants', 'Kelabu', 8, 0),
(36, 'Short Pants', 'Hitam', 27, 0),
(37, 'Short Pants', 'Biru', 1, 0),
(38, 'Stoking', 'Hitam', 14, 0),
(39, 'Stoking', 'Merah', 16, 0),
(40, 'Kon', '', 8, 0),
(41, 'Bip (Bola Sepak)', 'Biru', 10, 0),
(42, 'Bip (Bola Sepak)', 'Merah', 10, 0),
(43, 'Bip (Bola Jaring)', 'Merah', 7, 0),
(44, 'Bip (Bola Jaring)', 'Biru', 7, 0),
(45, 'Bip (Bola Jaring)', 'Hijau', 7, 0),
(46, 'Wisel', '', 4, 0),
(47, 'Glove', '', 1, 0),
(48, 'Bola Jaring', '', 4, 0),
(49, 'Futsal', '', 5, 0),
(50, 'Tikar Getah', '', 2, 0),
(51, 'Haler', 'Putih/Biru', 3, 0),
(52, 'Walkie Talkie', 'Hitam', 10, 0),
(53, 'Laptop', 'Hitam', 4, 0),
(54, 'LCD Projector', 'putih', 7, 0),
(55, 'Portable Microphone', 'Silver', 3, 0),
(56, 'Wireless Microphone', 'Hitam', 3, 0),
(57, 'Extension', 'Putih', 5, 0),
(58, 'First Aid Kit', 'Putih/Merah', 3, 0),
(59, 'Layar Putih', 'Hitam', 3, 0),
(60, 'Stand Microphone', 'Hitam', 1, 0),
(61, 'Stand Kayu Poster', 'Coklat', 2, 0),
(62, 'Soft Board', 'Biru', 50, 0),
(63, 'Talam ( Makan)', 'Merah', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usrID` int(11) NOT NULL,
  `usrMatricID` int(15) NOT NULL,
  `usrName` varchar(200) NOT NULL,
  `usrIC` varchar(20) NOT NULL,
  `usrEmail` varchar(200) NOT NULL,
  `usrPhone` varchar(20) NOT NULL,
  `usrFac` varchar(100) NOT NULL,
  `usrCourse` varchar(100) NOT NULL,
  `usrStatus` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usrID`, `usrMatricID`, `usrName`, `usrIC`, `usrEmail`, `usrPhone`, `usrFac`, `usrCourse`, `usrStatus`) VALUES
(1, 1150381, 'Mas Hairul Rasyidi bin Alwee', '960525015191', 'rasyidialwee@gmail.com', '0133962556', 'FST', 'Information Security and Assurance', 'active'),
(3, 1234, 'Kirin Uchiha', '123456753', 'khairulsyakirin96@gmail.com', '1234456771', 'FST', 'sad', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admID`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`lnID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logID`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`tlID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usrID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `lnID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `tlID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usrID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
