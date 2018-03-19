-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2017 at 10:10 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `calender`
--

CREATE TABLE `calender` (
  `start_date` date NOT NULL,
  `ende_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `late_by` int(11) NOT NULL COMMENT 'no. of year back in course'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `calender`:
--   `user_id`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'no. of years',
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `course`:
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `title` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` bigint(10) UNSIGNED NOT NULL,
  `address` varchar(100) NOT NULL COMMENT 'postal address',
  `Date_of_registration` date NOT NULL,
  `pincode` mediumint(6) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `course_id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `home_phone` bigint(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `details`:
--   `user_id`
--       `users` -> `id`
--

--
-- Dumping data for table `details`
--

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `department` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pincode` mediumint(6) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `contact` bigint(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `instructor`:
--   `user_id`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `semester` int(2) DEFAULT NULL,
  `expiry_date` date NOT NULL,
  `data` varchar(10000) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `notification`:
--   `course_id`
--       `course` -> `id`
--   `subject_id`
--       `subject` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE `registered` (
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `title` varchar(20) NOT NULL COMMENT 'student hod',
  `email` varchar(50) NOT NULL,
  `contact` bigint(10) UNSIGNED NOT NULL,
  `address` varchar(100) NOT NULL,
  `time_of_request` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pincode` mediumint(6) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `registered`:
--

-- --------------------------------------------------------

--
-- Table structure for table `sem1`
--

CREATE TABLE `sem1` (
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `internal1` decimal(10,0) NOT NULL DEFAULT '0',
  `internal2` decimal(10,0) NOT NULL DEFAULT '0',
  `endsem_marks` decimal(10,0) NOT NULL DEFAULT '0',
  `quiz` decimal(10,0) NOT NULL DEFAULT '0',
  `project` decimal(10,0) NOT NULL DEFAULT '0',
  `total` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `sem1`:
--   `user_id`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `sem2`
--

CREATE TABLE `sem2` (
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `internal1` decimal(10,0) NOT NULL DEFAULT '0',
  `internal2` decimal(10,0) NOT NULL DEFAULT '0',
  `endsem_marks` decimal(10,0) NOT NULL DEFAULT '0',
  `quiz` decimal(10,0) NOT NULL DEFAULT '0',
  `project` decimal(10,0) NOT NULL DEFAULT '0',
  `total` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `sem2`:
--   `user_id`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `sem3`
--

CREATE TABLE `sem3` (
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `internal1` decimal(10,0) NOT NULL DEFAULT '0',
  `internal2` decimal(10,0) NOT NULL DEFAULT '0',
  `endsem_marks` decimal(10,0) NOT NULL DEFAULT '0',
  `quiz` decimal(10,0) NOT NULL DEFAULT '0',
  `project` decimal(10,0) NOT NULL DEFAULT '0',
  `total` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `sem3`:
--   `user_id`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `sem4`
--

CREATE TABLE `sem4` (
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `internal1` decimal(10,0) NOT NULL DEFAULT '0',
  `internal2` decimal(10,0) NOT NULL DEFAULT '0',
  `endsem_marks` decimal(10,0) NOT NULL DEFAULT '0',
  `quiz` decimal(10,0) NOT NULL DEFAULT '0',
  `project` decimal(10,0) NOT NULL DEFAULT '0',
  `total` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `sem4`:
--   `user_id`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `sem5`
--

CREATE TABLE `sem5` (
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `internal1` decimal(10,0) NOT NULL DEFAULT '0',
  `internal2` decimal(10,0) NOT NULL DEFAULT '0',
  `endsem_marks` decimal(10,0) NOT NULL DEFAULT '0',
  `quiz` decimal(10,0) NOT NULL DEFAULT '0',
  `project` decimal(10,0) NOT NULL DEFAULT '0',
  `total` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `sem5`:
--   `user_id`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `sem6`
--

CREATE TABLE `sem6` (
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `internal1` decimal(10,0) NOT NULL DEFAULT '0',
  `internal2` decimal(10,0) NOT NULL DEFAULT '0',
  `endsem_marks` decimal(10,0) NOT NULL DEFAULT '0',
  `quiz` decimal(10,0) NOT NULL DEFAULT '0',
  `project` decimal(10,0) NOT NULL DEFAULT '0',
  `total` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `sem6`:
--   `user_id`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `sem7`
--

CREATE TABLE `sem7` (
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `internal1` decimal(10,0) NOT NULL DEFAULT '0',
  `internal2` decimal(10,0) NOT NULL DEFAULT '0',
  `endsem_marks` decimal(10,0) NOT NULL DEFAULT '0',
  `quiz` decimal(10,0) NOT NULL DEFAULT '0',
  `project` decimal(10,0) NOT NULL DEFAULT '0',
  `total` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `sem7`:
--   `user_id`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `sem8`
--

CREATE TABLE `sem8` (
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `internal1` decimal(10,0) NOT NULL DEFAULT '0',
  `internal2` decimal(10,0) NOT NULL DEFAULT '0',
  `endsem_marks` decimal(10,0) NOT NULL DEFAULT '0',
  `quiz` decimal(10,0) NOT NULL DEFAULT '0',
  `project` decimal(10,0) NOT NULL DEFAULT '0',
  `total` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `sem8`:
--   `user_id`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL COMMENT 'under which course subject comes',
  `name` varchar(100) NOT NULL,
  `credits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `subject`:
--   `course_id`
--       `course` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `instructor` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `title` varchar(10) NOT NULL COMMENT 'student professor hod',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 for active 2 for inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `users`:
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `calender`
--
ALTER TABLE `calender`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD UNIQUE KEY `username` (`user_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD KEY `course_id` (`course_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `sem1`
--
ALTER TABLE `sem1`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sem2`
--
ALTER TABLE `sem2`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sem3`
--
ALTER TABLE `sem3`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sem4`
--
ALTER TABLE `sem4`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sem5`
--
ALTER TABLE `sem5`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sem6`
--
ALTER TABLE `sem6`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sem7`
--
ALTER TABLE `sem7`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sem8`
--
ALTER TABLE `sem8`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `calender`
--
ALTER TABLE `calender`
  ADD CONSTRAINT `calender_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`)ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sem1`
--
ALTER TABLE `sem1`
  ADD CONSTRAINT `sem1_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sem2`
--
ALTER TABLE `sem2`
  ADD CONSTRAINT `sem2_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sem3`
--
ALTER TABLE `sem3`
  ADD CONSTRAINT `sem3_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sem4`
--
ALTER TABLE `sem4`
  ADD CONSTRAINT `sem4_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sem5`
--
ALTER TABLE `sem5`
  ADD CONSTRAINT `sem5_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sem6`
--
ALTER TABLE `sem6`
  ADD CONSTRAINT `sem6_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sem7`
--
ALTER TABLE `sem7`
  ADD CONSTRAINT `sem7_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sem8`
--
ALTER TABLE `sem8`
  ADD CONSTRAINT `sem8_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for calender
--

--
-- Metadata for course
--

--
-- Metadata for details
--

--
-- Metadata for instructor
--

--
-- Metadata for notification
--

--
-- Metadata for registered
--

--
-- Metadata for sem1
--

--
-- Metadata for sem2
--

--
-- Metadata for sem3
--

--
-- Metadata for sem4
--

--
-- Metadata for sem5
--

--
-- Metadata for sem6
--

--
-- Metadata for sem7
--

--
-- Metadata for sem8
--

--
-- Metadata for subject
--

--
-- Metadata for users
--

--
-- Metadata for course_management_system
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
