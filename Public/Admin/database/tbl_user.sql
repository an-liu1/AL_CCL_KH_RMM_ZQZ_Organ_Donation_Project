-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 27, 2019 at 04:23 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_organ_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `points` int(50) NOT NULL,
  `last_login_ip` varchar(15) DEFAULT NULL,
  `last_login_time` int(30) DEFAULT NULL,
  `register_date` int(30) NOT NULL,
  `login_times` int(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_name`, `user_pass`, `name`, `tel`, `email`, `points`, `last_login_ip`, `last_login_time`, `register_date`, `login_times`) VALUES
(1, 'An', '123', 'Andy', '5196974518', 'andyvviiar@gmail.com', 0, '::1', 1551237266, 1551237266, 14),
(3, 'admin', '202cb962ac59075b964b07152d234b70', 'An Liu', '5196974518', 'andyvviiar@gmail.com', 0, '::1', 1551241241, 1551241032, 1),
(4, 'trv', '202cb962ac59075b964b07152d234b70', 'an liu', '0778 798 3900', '461646905@qq.com', 0, NULL, NULL, 1551241111, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
