-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2018 at 01:50 AM
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
-- Database: `my_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userType` enum('user','backend') NOT NULL DEFAULT 'user',
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `emailID` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `contactNumber` varchar(15) NOT NULL,
  `addedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isActive` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userType`, `firstName`, `lastName`, `emailID`, `password`, `contactNumber`, `addedOn`, `isActive`) VALUES
(1, 'backend', 'Sanket', 'Utekar', 'sanket009@gmail.com', '$2y$10$pypSHYEL3vnIW4ZUAV0aT.9xY3fZvsg46OrQ8jC6iPSfzfoviQLJC', '9920742337', '2018-08-17 15:59:31', '1'),
(2, 'user', 'Sanket', 'Utekar', 'sanket@gmail.com', '$2y$10$pypSHYEL3vnIW4ZUAV0aT.9xY3fZvsg46OrQ8jC6iPSfzfoviQLJC', '9920742337', '2018-08-17 22:10:45', '1'),
(6, 'user', 'Sagar', 'Chavan', 'sagar@gmail.com', '$2y$10$NDkto14q7B5qOWe07Z9ljeM4riTb2tYvEr0JkD.QraETpGH.MO8bW', '9820742337', '2018-08-17 23:13:03', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
