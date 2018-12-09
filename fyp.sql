-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2018 at 03:27 PM
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
  `admPhone` varchar(100) NOT NULL,
  `admDepartment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admID`, `admName`, `admPwd`, `admEmail`, `admPhone`, `admDepartment`) VALUES
(8, 'Rasyidi Alwee', '$2y$10$PnpTYaEWGguo2uKpkN3UCeLWQX5JwbmmlYsVHtpgho.dc.XpNn3au', 'rasyidialwee@gmail.com', '+60133962556', 'Creator'),
(11, 'adminfst', '$2y$10$3XBGeVO27BNccBf1mMJNXOAFtdXDHwHW2vPPxS9KJf8z7Z1u6VcLe', 'adminfst@gmail.com', '01234567', 'FST');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dprtID` int(11) NOT NULL,
  `dprtName` varchar(255) NOT NULL,
  `dprtAbbr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dprtID`, `dprtName`, `dprtAbbr`) VALUES
(1, 'Faculty of Science and Technology', 'FST');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `lnID` int(11) NOT NULL,
  `lnMatricID` int(11) NOT NULL,
  `lnStaffID` int(11) NOT NULL,
  `lnTool` int(3) NOT NULL,
  `lnQuantity` int(2) NOT NULL,
  `lnStartDate` date NOT NULL,
  `lnStartTime` time NOT NULL,
  `lnReturnDate` date NOT NULL,
  `lnReturnTime` time NOT NULL,
  `lnReturnNote` text,
  `lnStatus` enum('Unreturned','Completed','Damaged','Late') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`lnID`, `lnMatricID`, `lnStaffID`, `lnTool`, `lnQuantity`, `lnStartDate`, `lnStartTime`, `lnReturnDate`, `lnReturnTime`, `lnReturnNote`, `lnStatus`) VALUES
(1, 1234, 0, 2, 2, '2018-08-20', '18:08:03', '2018-08-21', '01:08:28', '', 'Unreturned'),
(2, 1150381, 0, 2, 2, '2018-08-21', '01:08:08', '2018-08-21', '01:08:12', '', 'Completed'),
(3, 1150381, 0, 3, 3, '2018-10-17', '14:10:30', '0000-00-00', '00:00:00', '', 'Unreturned'),
(4, 1150381, 0, 19, 3, '2018-12-07', '17:12:11', '0000-00-00', '00:00:00', '', 'Unreturned');

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
(52, '2018-12-05', '22:09:08', 'Log in success', 8),
(53, '2018-12-07', '17:10:50', 'Log in success', 8),
(54, '2018-12-09', '15:52:16', 'Log in success', 8),
(55, '2018-12-09', '15:52:28', 'logged out', 8),
(56, '2018-12-09', '15:52:39', 'Log in success', 8),
(57, '2018-12-09', '16:30:23', 'Added a department tessq Successful', 0),
(58, '2018-12-09', '16:33:19', 'department 3 deleted', 8),
(59, '2018-12-09', '19:15:31', 'department with ID 2 deleted', 8),
(60, '2018-12-09', '19:16:37', 'department with ID 1 deleted', 8),
(61, '2018-12-09', '19:17:06', 'Added a department Faculty of Science and Technology Successful', 0),
(62, '2018-12-09', '19:17:06', 'department with ID 1 deleted', 8),
(63, '2018-12-09', '19:19:32', 'Added a department Faculty of Science and Technology Successful', 8),
(64, '2018-12-09', '19:20:25', 'created admin adminfst with email adminfst@gmail.com', 8),
(65, '2018-12-09', '19:49:15', 'admin with 9 deleted', 8),
(66, '2018-12-09', '19:49:45', 'created admin adminfst with email adminfst@gmail.com', 8),
(67, '2018-12-09', '19:49:45', 'admin with 9 deleted', 8),
(68, '2018-12-09', '19:51:16', 'admin with 10 deleted', 8),
(69, '2018-12-09', '19:51:42', 'created admin adminfst with email adminfst@gmail.com', 8),
(70, '2018-12-09', '19:51:42', 'admin with 10 deleted', 8),
(71, '2018-12-09', '20:16:53', 'Admin Rasyidi Alwee updated success', 8),
(72, '2018-12-09', '20:17:29', 'Admin Rasyidi Alwee updated success', 8),
(73, '2018-12-09', '20:17:34', 'Admin MAS HAIRUL RASYIDI BIN ALWEE updated success', 8),
(74, '2018-12-09', '20:19:12', 'Admin Rasyidi Alwee updated failed', 8),
(75, '2018-12-09', '20:21:07', 'Admin MAS HAIRUL RASYIDI BIN ALWEE updated failed', 8),
(76, '2018-12-09', '20:22:15', 'Admin MAS HAIRUL RASYIDI BIN ALWEE updated failed', 8),
(77, '2018-12-09', '20:23:07', 'Admin Rasyidi Alwee updated failed', 8),
(78, '2018-12-09', '20:23:30', 'Admin Rasyidi Alwee updated failed', 8),
(79, '2018-12-09', '20:24:28', 'Admin Rasyidi Alwee updated failed', 8),
(80, '2018-12-09', '20:24:38', 'Admin Rasyidi Alwees updated success', 8),
(81, '2018-12-09', '20:26:12', 'Admin Rasyidi Alwee updated success', 8),
(82, '2018-12-09', '20:26:16', 'Admin Rasyidi Alwee updated failed', 8),
(83, '2018-12-09', '20:26:36', 'Admin Rasyidi Alwee updated failed', 8),
(84, '2018-12-09', '20:26:49', 'Admin Rasyidi Alwee updated failed', 8),
(85, '2018-12-09', '20:27:36', 'Admin Rasyidi Alwee updated failed', 8),
(86, '2018-12-09', '20:28:01', 'Admin Rasyidi Alwee updated failed', 8),
(87, '2018-12-09', '20:28:54', 'Admin Rasyidi Alwee updated success', 8),
(88, '2018-12-09', '20:29:06', 'Admin Rasyidi Alwee updated failed', 8),
(89, '2018-12-09', '20:30:12', 'Admin Rasyidi Alwee updated success', 8),
(90, '2018-12-09', '20:30:17', 'Admin Rasyidi Alwee updated failed', 8),
(91, '2018-12-09', '20:30:23', 'Admin Rasyidi Alwee updated success', 8),
(92, '2018-12-09', '20:30:29', 'Admin Rasyidi Alwee updated failed', 8),
(93, '2018-12-09', '20:30:54', 'Admin Rasyidi Alwee updated success', 8),
(94, '2018-12-09', '21:04:55', 'tool asdsa with variation asdsadq added', 8),
(95, '2018-12-09', '21:35:55', 'test', 8),
(96, '2018-12-09', '21:37:09', 'Tool Talam (Makan) updated with reason : barang dah elok\r\n', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `tlID` int(11) NOT NULL,
  `tlName` varchar(100) NOT NULL,
  `tlVariation` varchar(50) NOT NULL,
  `tlQuantity` int(3) NOT NULL,
  `tlAvailable` int(3) NOT NULL,
  `tlLeft` int(11) NOT NULL,
  `tlStore` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`tlID`, `tlName`, `tlVariation`, `tlQuantity`, `tlAvailable`, `tlLeft`, `tlStore`) VALUES
(2, 'Talam (Makan)', 'Hijau', 10, 10, 0, 'FST'),
(3, 'Talam (Makan)', 'Biru', 8, 8, 5, 'FST'),
(4, 'Talam(Makan)', 'Putih', 3, 3, 0, 'FST'),
(5, 'Alas Dulang', 'Emas', 2, 2, 0, 'FST'),
(6, 'Alas Dulang', 'Putih', 1, 1, 0, 'FST'),
(7, 'Alas Dulang', 'Oren', 1, 1, 0, 'FST'),
(8, 'Alas Dulang', 'Coklat Bunga', 3, 3, 0, 'FST'),
(9, 'Alas Dulang', 'Merah Bunga', 1, 1, 0, 'FST'),
(10, 'Goblet', 'Panjang', 9, 9, 0, 'FST'),
(11, 'Goblet', 'Pendek', 4, 4, 0, 'FST'),
(12, 'Alas Meja Makan', 'Maroon Bercorak', 1, 1, 0, 'FST'),
(13, 'Alas Meja Makan', 'Hijau Bercorak', 1, 1, 0, 'FST'),
(14, 'Alas Meja Makan', 'Maroon', 7, 7, 0, 'FST'),
(15, 'Alas Meja Makan', 'Krim', 2, 2, 0, 'FST'),
(16, 'Alas Meja Makan', 'Biru Cair', 2, 2, 0, 'FST'),
(17, 'Alas Meja Makan', 'Emas - Kecil', 2, 2, 0, 'FST'),
(18, 'Alas Meja Makan', 'Merah - Kecil', 4, 4, 0, 'FST'),
(19, 'Alas Meja Makan', 'Hitam', 16, 16, 13, 'FST'),
(20, 'Alas Meja Makan', 'Ungu', 3, 3, 0, 'FST'),
(21, 'Stand Bunting', '', 10, 10, 0, 'FST'),
(22, 'Global Zakat Game', '', 3, 3, 0, 'FST'),
(23, 'Bekas Air', '', 2, 2, 0, 'FST'),
(24, 'Vest SekreFaST', '', 18, 18, 0, 'FST'),
(25, 'Set Catur', '', 7, 7, 0, 'FST'),
(26, 'Jersi', 'Kuning/Hitam (Bola)', 16, 16, 0, 'FST'),
(27, 'Jersi', 'Merah/Hitam', 16, 16, 0, 'FST'),
(28, 'Jersi', 'Kelabu/Pink', 16, 16, 0, 'FST'),
(29, 'Jersi', 'Muslimah', 10, 10, 0, 'FST'),
(30, 'Jersi', 'Biru/Oren', 8, 8, 0, 'FST'),
(31, 'Jersi', 'Biru/Hijau', 8, 8, 0, 'FST'),
(32, 'Jersi', 'Hitam/Oren', 3, 3, 0, 'FST'),
(33, 'Jersi', 'Keeper - Kuning', 1, 1, 0, 'FST'),
(34, 'Jersi', 'Keeper - Biru', 1, 1, 0, 'FST'),
(35, 'Short Pants', 'Kelabu', 8, 8, 0, 'FST'),
(36, 'Short Pants', 'Hitam', 27, 27, 0, 'FST'),
(37, 'Short Pants', 'Biru', 1, 1, 0, 'FST'),
(38, 'Stoking', 'Hitam', 14, 14, 0, 'FST'),
(39, 'Stoking', 'Merah', 16, 16, 0, 'FST'),
(40, 'Kon', '', 8, 8, 0, 'FST'),
(41, 'Bip (Bola Sepak)', 'Biru', 10, 10, 0, 'FST'),
(42, 'Bip (Bola Sepak)', 'Merah', 10, 10, 0, 'FST'),
(43, 'Bip (Bola Jaring)', 'Merah', 7, 7, 0, 'FST'),
(44, 'Bip (Bola Jaring)', 'Biru', 7, 7, 0, 'FST'),
(45, 'Bip (Bola Jaring)', 'Hijau', 7, 7, 0, 'FST'),
(46, 'Wisel', '', 4, 4, 0, 'FST'),
(47, 'Glove', '', 1, 1, 0, 'FST'),
(48, 'Bola Jaring', '', 4, 4, 0, 'FST'),
(49, 'Futsal', '', 5, 5, 0, 'FST'),
(50, 'Tikar Getah', '', 2, 2, 0, 'FST'),
(51, 'Haler', 'Putih/Biru', 3, 3, 0, 'FST'),
(52, 'Walkie Talkie', 'Hitam', 10, 10, 0, 'FST'),
(53, 'Laptop', 'Hitam', 4, 4, 0, 'FST'),
(54, 'LCD Projector', 'putih', 7, 7, 0, 'FST'),
(55, 'Portable Microphone', 'Silver', 3, 3, 0, 'FST'),
(56, 'Wireless Microphone', 'Hitam', 3, 3, 0, 'FST'),
(57, 'Extension', 'Putih', 5, 5, 0, 'FST'),
(58, 'First Aid Kit', 'Putih/Merah', 3, 3, 0, 'FST'),
(59, 'Layar Putih', 'Hitam', 3, 3, 0, 'FST'),
(60, 'Stand Microphone', 'Hitam', 1, 1, 0, 'FST'),
(61, 'Stand Kayu Poster', 'Coklat', 2, 2, 0, 'FST'),
(62, 'Soft Board', 'Biru', 50, 50, 0, 'FST'),
(63, 'Talam ( Makan)', 'Merah', 7, 7, 0, 'FST');

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
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dprtID`);

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
  MODIFY `admID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dprtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `lnID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `tlID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usrID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
