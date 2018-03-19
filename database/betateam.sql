-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2017 at 10:05 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `betateam`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `easy` int(2) NOT NULL,
  `hard` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `easy`, `hard`) VALUES
('subbu', '123', 0, 0),
('marotu', '321', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tech_quiz`
--

CREATE TABLE `tech_quiz` (
  `s.no` int(1) NOT NULL,
  `question` varchar(255) NOT NULL,
  `opt1` varchar(50) NOT NULL,
  `opt2` varchar(50) NOT NULL,
  `opt3` varchar(50) NOT NULL,
  `opt4` varchar(50) NOT NULL,
  `answer` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tech_quiz`
--

INSERT INTO `tech_quiz` (`s.no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`) VALUES
(1, 'Capital of Andhrapradesh', 'vizag', 'amaravathi', 'hyderabad', 'both 2 & 3', 4),
(2, 'Apple founder', 'steve jobs', 'valla nanna', 'valla amma?', 'found itself', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
