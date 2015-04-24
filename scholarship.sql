-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2015 at 08:32 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scholarship`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentID` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `start-time` time NOT NULL,
  `end-time` time NOT NULL,
  `total` time NOT NULL,
  `academicYear` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=89 ;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `studentID`, `date`, `start-time`, `end-time`, `total`, `academicYear`) VALUES
(1, '3333333333', '2557-01-02', '13:14:00', '15:50:00', '02:36:00', '2557'),
(75, '5510490047', '2557-01-02', '13:14:00', '15:50:00', '02:36:00', '2557'),
(76, '5510490047', '2557-01-02', '13:14:00', '15:50:00', '02:36:00', '2557'),
(78, '5510490047', '2558-01-02', '13:45:00', '15:50:00', '02:05:00', '2558'),
(79, '5510490047', '2558-01-02', '13:45:00', '15:50:00', '02:05:00', '2558'),
(87, '5510490047', '2558-04-04', '02:03:00', '04:05:00', '02:02:00', '2558'),
(88, '5710614433', '2558-04-04', '02:02:00', '03:04:00', '01:02:00', '2558');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$1$1q1..g2.$VxTDXqtSZ2NNz7DsxJKF81'),
(2, 'test', '$1$1q1..g2.$VxTDXqtSZ2NNz7DsxJKF81');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentID` text COLLATE utf8_unicode_ci NOT NULL,
  `firstname` text COLLATE utf8_unicode_ci NOT NULL,
  `lastname` text COLLATE utf8_unicode_ci NOT NULL,
  `year` decimal(10,0) NOT NULL,
  `department` text COLLATE utf8_unicode_ci NOT NULL,
  `GPA` text COLLATE utf8_unicode_ci NOT NULL,
  `academicYear` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `FTLogin` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=47 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `studentID`, `firstname`, `lastname`, `year`, `department`, `GPA`, `academicYear`, `status`, `password`, `FTLogin`) VALUES
(11, '5510520199', 'พุทธิวัฒน์', 'ภูนุภา', '3', 'วิศวกรรมคอมพิวเตอร์', '3.00', '2558', 1, '$1$tH..yk0.$UVGj.Jmnu9op5mzlLwvBO1', 1),
(37, '5510490066', 'สมชาติ', 'ดีดีดี', '2', 'วิศวกรรมโยธา', '2.22', '2558', 1, '$1$8f4.vE1.$5NrdOii7P7q5v5tI1zLlj0', 1),
(39, '5510490047', 'วุธิชัย', 'จันทร์สวัสดิ์', '3', 'วิศวกรรมคอมพิวเตอร์', '3.36', '2558', 1, '$1$CP2.jb/.$EJ9oifo1l7SuGt1kxXtMJ0', 1),
(40, '5710614433', 'สมหมาย', 'ใจดี', '3', 'วิศวกรรมเครื่องกล', '3.36', '2558', 2, '$1$Kv2.LJ5.$.4Zb0Df4z3ynHqr.tcNjM.', 1),
(41, '5510617777', 'สมชาย', 'เฟี้ยวเงาะ', '3', 'วิศวกรรมเคมี', '4.00', '2558', 1, '$1$gD3.pC3.$AFeVEYFb08CgTtizKZ/V1/', 1),
(44, '1111111111', 'อิอิ', 'คริคริ', '3', 'วิศวกรรมไฟฟ้า', '2.33', '2558', 1, '$1$rh1.YD2.$FLeOCo68xodKm6IoyhRCA/', 1),
(45, '2222222222', 'อุอุ', 'อิอิ', '1', 'วิศวกรรมคอมพิวเตอร์', '2.22', '2558', 1, '$1$B//.0Q/.$OYoazH90tEiMDY9Mgk6r40', 1),
(46, '5510490047', 'วุธิชัย', 'จันทร์สวัสดิ์', '3', 'วิศวกรรมคอมพิวเตอร์', '3.36', '2557', 1, '$1$CP2.jb/.$EJ9oifo1l7SuGt1kxXtMJ0', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
