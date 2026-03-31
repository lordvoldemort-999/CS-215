-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: gaming-center_db
-- Generation Time: Mar 31, 2026 at 03:21 AM
-- Server version: 11.4.10-MariaDB-ubu2404
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaming_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `GameHistory`
--

CREATE TABLE `GameHistory` (
  `history_ID` int(255) NOT NULL,
  `game_ID` int(255) NOT NULL,
  `user_ID` int(255) NOT NULL,
  `opponentNickname` varchar(255) NOT NULL,
  `datePlayed` date NOT NULL,
  `outcome` varchar(255) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `Games`
--

CREATE TABLE `Games` (
  `game_ID` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `maxPlayers` int(255) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

CREATE TABLE `Login` (
  `login_ID` int(255) NOT NULL,
  `user_ID` int(255) NOT NULL,
  `date` datetime NOT NULL,
  `ipAddress` varchar(255) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `User_ID` int(255) NOT NULL,
  `fullName` varchar(255),
  `nickName` varchar(255) NOT NULL,
  `DOB` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `GameHistory`
--
ALTER TABLE `GameHistory`
  ADD PRIMARY KEY (`history_ID`),
  ADD KEY `game_ID` (`game_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `Games`
--
ALTER TABLE `Games`
  ADD PRIMARY KEY (`game_ID`);

--
-- Indexes for table `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`login_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `GameHistory`
--
ALTER TABLE `GameHistory`
  MODIFY `history_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Games`
--
ALTER TABLE `Games`
  MODIFY `game_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Login`
--
ALTER TABLE `Login`
  MODIFY `login_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `User_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `GameHistory`
--
ALTER TABLE `GameHistory`
  ADD CONSTRAINT `gamehistory_ibfk_1` FOREIGN KEY (`game_ID`) REFERENCES `Games` (`game_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gamehistory_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `Users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Login`
--
ALTER TABLE `Login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `Users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;