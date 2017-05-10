-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2017 at 01:58 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `champions_league`
--

-- --------------------------------------------------------

--
-- Table structure for table `away_teams`
--

CREATE TABLE `away_teams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `away_teams`
--

INSERT INTO `away_teams` (`id`, `name`) VALUES
(1, 'CSKA');

-- --------------------------------------------------------

--
-- Table structure for table `home_teams`
--

CREATE TABLE `home_teams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home_teams`
--

INSERT INTO `home_teams` (`id`, `name`) VALUES
(1, 'Levski');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `home_team` varchar(50) NOT NULL DEFAULT '0',
  `away_team` varchar(50) NOT NULL DEFAULT '0',
  `match_type` varchar(50) NOT NULL DEFAULT '0',
  `home_goals` int(11) DEFAULT '0',
  `away_goals` int(11) DEFAULT '0',
  `played_on` date DEFAULT NULL,
  `stadium` varchar(50) NOT NULL DEFAULT '0',
  `tickets_sold` int(11) DEFAULT '0',
  `tickets_price` decimal(10,0) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `home_team`, `away_team`, `match_type`, `home_goals`, `away_goals`, `played_on`, `stadium`, `tickets_sold`, `tickets_price`) VALUES
(2, 'Levski', 'CSKA', 'Final', 5, 2, '2017-05-10', 'Botev', 100, '8');

-- --------------------------------------------------------

--
-- Table structure for table `matches_complex`
--

CREATE TABLE `matches_complex` (
  `id` int(11) NOT NULL,
  `home_team_id` int(11) NOT NULL DEFAULT '0',
  `away_team_id` int(11) NOT NULL DEFAULT '0',
  `match_type_id` int(11) NOT NULL DEFAULT '0',
  `home_goals` int(11) DEFAULT '0',
  `away_goals` int(11) DEFAULT '0',
  `played_on` date DEFAULT NULL,
  `stadium_id` int(11) NOT NULL DEFAULT '0',
  `tickets_sold` int(11) DEFAULT '0',
  `tickets_price` decimal(10,0) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `match_type`
--

CREATE TABLE `match_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `match_type`
--

INSERT INTO `match_type` (`id`, `name`) VALUES
(1, 'Quarter Final'),
(2, 'Semi Final'),
(3, 'Final');

-- --------------------------------------------------------

--
-- Table structure for table `stadiums`
--

CREATE TABLE `stadiums` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stadiums`
--

INSERT INTO `stadiums` (`id`, `name`) VALUES
(1, 'Botev');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `away_teams`
--
ALTER TABLE `away_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_teams`
--
ALTER TABLE `home_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches_complex`
--
ALTER TABLE `matches_complex`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_matches_home_teams` (`home_team_id`),
  ADD KEY `FK_matches_away_teams` (`away_team_id`),
  ADD KEY `FK_matches_match_type` (`match_type_id`),
  ADD KEY `FK_matches_stadiums` (`stadium_id`);

--
-- Indexes for table `match_type`
--
ALTER TABLE `match_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stadiums`
--
ALTER TABLE `stadiums`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `away_teams`
--
ALTER TABLE `away_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `home_teams`
--
ALTER TABLE `home_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `matches_complex`
--
ALTER TABLE `matches_complex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `match_type`
--
ALTER TABLE `match_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `stadiums`
--
ALTER TABLE `stadiums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `matches_complex`
--
ALTER TABLE `matches_complex`
  ADD CONSTRAINT `matches_complex_ibfk_1` FOREIGN KEY (`away_team_id`) REFERENCES `away_teams` (`id`),
  ADD CONSTRAINT `matches_complex_ibfk_2` FOREIGN KEY (`home_team_id`) REFERENCES `home_teams` (`id`),
  ADD CONSTRAINT `matches_complex_ibfk_3` FOREIGN KEY (`match_type_id`) REFERENCES `match_type` (`id`),
  ADD CONSTRAINT `matches_complex_ibfk_4` FOREIGN KEY (`stadium_id`) REFERENCES `stadiums` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
