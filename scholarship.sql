-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2015 at 07:10 PM
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `studentID`, `date`, `start-time`, `end-time`, `total`) VALUES
(22, '5510490047', '2015-04-16', '02:02:00', '03:03:00', '01:01:00'),
(24, '5510490047', '2015-04-25', '02:02:00', '04:05:00', '02:03:00'),
(25, '5510490047', '2015-04-25', '02:02:00', '04:05:00', '07:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '1234'),
('test', '1234');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=42 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `studentID`, `firstname`, `lastname`, `year`, `department`, `GPA`, `academicYear`, `status`, `password`) VALUES
(11, '5510520199', 'พุทธิวัฒน์', 'ภูนุภา', '3', 'วิศวกรรมคอมพิวเตอร์', '3.00', '2558', 1, '$1$./3.th3.$spV6aUBISiXBmd9AdjDnu.'),
(37, '5510490066', 'สมชาติ', 'ดีดีดี', '2', 'วิศวกรรมโยธา', '2.22', '2558', 1, '$1$8f4.vE1.$5NrdOii7P7q5v5tI1zLlj0'),
(38, '5510520199', 'พุทธิวัฒน์', 'ภูนุภา', '3', 'วิศวกรรมคอมพิวเตอร์', '3.00', '2558', 1, '$1$4W..5J0.$r/.HSU8gHWyhj5QksZGyo/'),
(39, '5510490047', 'วุธิชัย', 'จันทร์สวัสดิ์', '3', 'วิศวกรรมคอมพิวเตอร์', '3.36', '2558', 1, '$1$o31.RO/.$HdVjVYimCGfPc.q1nR8uD1'),
(40, '5710614433', 'สมหมาย', 'ใจดี', '3', 'วิศวกรรมเครื่องกล', '3.36', '2558', 1, '$1$Kv2.LJ5.$.4Zb0Df4z3ynHqr.tcNjM.'),
(41, '5510617777', 'สมชาย', 'เฟี้ยวเงาะ', '3', 'วิศวกรรมเคมี', '4.00', '2558', 1, '$1$gD3.pC3.$AFeVEYFb08CgTtizKZ/V1/');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
