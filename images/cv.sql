-- phpMyAdmin SQL Dump
-- version 4.3.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2017 at 09:35 AM
-- Server version: 5.5.41-MariaDB
-- PHP Version: 5.6.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cv`
--

-- --------------------------------------------------------

--
-- Table structure for table `examname`
--

CREATE TABLE IF NOT EXISTS `examname` (
  `id` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `examname`
--

INSERT INTO `examname` (`id`, `description`) VALUES
(1, 'SSC'),
(2, 'HSC'),
(3, 'BSC'),
(4, 'MSC'),
(5, 'MADRASA'),
(6, 'DHAKIL'),
(7, 'KAUMI');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `id` int(11) NOT NULL,
  `transcript_id` int(11) NOT NULL,
  `result` float DEFAULT NULL,
  `studentinfo_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `transcript_id`, `result`, `studentinfo_id`) VALUES
(29, 17, 4, 11),
(30, 18, 4, 11),
(31, 19, 4, 11),
(32, 20, 4, 11),
(34, 17, 3.9, 2),
(35, 18, 3.9, 2),
(36, 19, 3.9, 2),
(37, 20, 3.9, 2),
(42, 21, 5, 2),
(43, 22, 5, 2),
(44, 23, 5, 2),
(45, 24, 5, 2),
(136, 37, 5, 19),
(137, 36, 5, 19),
(138, 35, 5, 19);

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE IF NOT EXISTS `studentinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `name`, `role`) VALUES
(1, 'Muhaiminur Rahman', '12301019'),
(2, 'abir', '12301019543'),
(3, 'Tushar Tush Khush', '1712301019'),
(4, 'abir', '1263425'),
(7, 'swaqeeb', '97658974365'),
(8, 'myname', '12301'),
(9, 'lol', '12301019'),
(10, 'abiraaa', '1712301019'),
(11, 'cristiano ronaldo', '17273747'),
(12, 'laliga', '33'),
(13, 'UEFA', '12'),
(14, 'copa del ray', '34'),
(15, 'a kmn bichar', '12'),
(16, 'test1', '90'),
(17, 'test2', '80'),
(18, 'test3', '6787'),
(19, 'MEENA', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL,
  `xam` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `xam`) VALUES
(1, 'ENGLISH'),
(2, 'BANGLA'),
(3, 'ENGLISH FIRST PAPER'),
(4, 'ENGLISH SECOND PAPER'),
(5, 'BANGLA FIRST PAPER'),
(6, 'BANGLA SECOND PAPER'),
(7, 'CSE110'),
(8, 'CSE111'),
(9, 'CSE220'),
(10, 'CSE221'),
(11, 'CSE340'),
(12, 'CSE423'),
(13, 'ISLAM');

-- --------------------------------------------------------

--
-- Table structure for table `transcript`
--

CREATE TABLE IF NOT EXISTS `transcript` (
  `id` int(11) NOT NULL,
  `examname_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transcript`
--

INSERT INTO `transcript` (`id`, `examname_id`, `subject_id`) VALUES
(17, 3, 7),
(18, 3, 8),
(19, 3, 9),
(20, 3, 10),
(21, 2, 3),
(22, 2, 4),
(23, 2, 5),
(24, 2, 6),
(30, 5, 1),
(31, 5, 2),
(32, 5, 3),
(33, 5, 4),
(34, 5, 5),
(35, 1, 1),
(36, 1, 2),
(37, 1, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `examname`
--
ALTER TABLE `examname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_result_transcript1_idx` (`transcript_id`), ADD KEY `fk_result_studentinfo1_idx` (`studentinfo_id`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transcript`
--
ALTER TABLE `transcript`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_transcript_examname_idx` (`examname_id`), ADD KEY `fk_transcript_subject1_idx` (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examname`
--
ALTER TABLE `examname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `transcript`
--
ALTER TABLE `transcript`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `result`
--
ALTER TABLE `result`
ADD CONSTRAINT `fk_result_studentinfo1` FOREIGN KEY (`studentinfo_id`) REFERENCES `studentinfo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_result_transcript1` FOREIGN KEY (`transcript_id`) REFERENCES `transcript` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transcript`
--
ALTER TABLE `transcript`
ADD CONSTRAINT `fk_transcript_examname` FOREIGN KEY (`examname_id`) REFERENCES `examname` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_transcript_subject1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
