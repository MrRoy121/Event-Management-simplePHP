-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2022 at 10:18 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `No` int(55) NOT NULL,
  `email` varchar(101) NOT NULL,
  `name` varchar(101) NOT NULL,
  `place` varchar(505) NOT NULL,
  `date` varchar(101) NOT NULL,
  `time` varchar(501) NOT NULL,
  `avaiTicket` int(11) NOT NULL,
  `Ticket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`No`, `email`, `name`, `place`, `date`, `time`, `avaiTicket`, `Ticket`) VALUES
(2, 'ar319047@gmail.com', 'Covid Fund Raise', 'Sylhet, Kazi Nazrul Islam Auditorim', '2021-06-30', '09:30', 61, 500),
(7, 'asdf@gmail.com', 'In Memories Of AB', 'Sylhet, SUST Field', '2021-11-12', '21:44', 3, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `No` int(55) NOT NULL,
  `name` varchar(101) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `email` varchar(101) NOT NULL,
  `city` varchar(101) NOT NULL,
  `password` varchar(101) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`No`, `name`, `phone`, `email`, `city`, `password`) VALUES
(40, 'ssss', '12133413413', '31vaay@gmail.com', 'aeda', '123'),
(41, 'xyz', '01713473621', 'asdf@gmail.com', 'xyz', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `No` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `No` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
