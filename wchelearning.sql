-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2018 at 04:04 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wchelearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_answer`
--

CREATE TABLE `tb_answer` (
  `answerID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `answerDesc` varchar(500) NOT NULL,
  `answerImage` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_question`
--

CREATE TABLE `tb_question` (
  `questionID` int(100) NOT NULL,
  `questionDesc` varchar(500) NOT NULL,
  `answerTrue` varchar(300) NOT NULL,
  `questionImage` varchar(500) NOT NULL,
  `questionChapter` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_student`
--

CREATE TABLE `tb_student` (
  `userID` int(5) UNSIGNED ZEROFILL NOT NULL,
  `stdYear` int(4) NOT NULL,
  `stdTitle` text NOT NULL,
  `stdFirstname` text NOT NULL,
  `stdLastname` text NOT NULL,
  `stdClass` int(2) NOT NULL,
  `stdRoom` int(2) NOT NULL,
  `stdStatus` int(1) NOT NULL,
  `stdFotoPath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_student`
--

INSERT INTO `tb_student` (`userID`, `stdYear`, `stdTitle`, `stdFirstname`, `stdLastname`, `stdClass`, `stdRoom`, `stdStatus`, `stdFotoPath`) VALUES
(00004, 2561, 'เด็กหญิง', 'indy', 'sama', 1, 1, 0, 'upload/userdefault.png'),
(00005, 2558, 'เด็กชาย', 'sada', 'saha', 1, 1, 0, 'upload/userdefault.png'),
(00200, 2561, 'เด็กหญิง', 'Suriya', 'Saratip', 6, 2, 0, 'upload/BOY_2983.jpg'),
(00333, 2558, 'นาย', 'sasfaf', 'afsasfasf', 5, 3, 0, ''),
(33101, 2560, 'เด็กหญิง', 'ออเจ้า', 'เมาทุกวัน', 4, 4, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `userID` int(5) UNSIGNED ZEROFILL NOT NULL,
  `userName` text NOT NULL,
  `userPass` text NOT NULL,
  `userType` int(2) NOT NULL,
  `LoginStatus` int(1) NOT NULL,
  `LastUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`userID`, `userName`, `userPass`, `userType`, `LoginStatus`, `LastUpdate`) VALUES
(00004, '00004', 'bannasan', 0, 0, '0000-00-00 00:00:00'),
(00005, '00005', 'bannasan', 0, 0, '0000-00-00 00:00:00'),
(00200, '00200', 'bannasan', 0, 0, '0000-00-00 00:00:00'),
(00333, '00333', 'bannasan', 0, 0, '0000-00-00 00:00:00'),
(33101, '33101', 'bannasan', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_userscore`
--

CREATE TABLE `tb_userscore` (
  `userID` int(5) UNSIGNED ZEROFILL NOT NULL,
  `pretest` int(3) NOT NULL,
  `scoreCh01` int(3) NOT NULL,
  `scoreCh02` int(3) NOT NULL,
  `scoreCh03` int(3) NOT NULL,
  `scoreCh04` int(3) NOT NULL,
  `scoreCh05` int(3) NOT NULL,
  `scoreCh06` int(3) NOT NULL,
  `scoreCh07` int(3) NOT NULL,
  `scoreCh08` int(3) NOT NULL,
  `scoreCh09` int(3) NOT NULL,
  `scoreCh10` int(3) NOT NULL,
  `scoreCh11` int(3) NOT NULL,
  `scoreCh12` int(3) NOT NULL,
  `scoreCh13` int(3) NOT NULL,
  `scoreCh14` int(3) NOT NULL,
  `scoreCh15` int(3) NOT NULL,
  `scoreCh16` int(3) NOT NULL,
  `scoreCh17` int(3) NOT NULL,
  `scoreCh18` int(3) NOT NULL,
  `scoreCh19` int(3) NOT NULL,
  `posttest` int(3) NOT NULL,
  `scoreTotal` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_userscore`
--

INSERT INTO `tb_userscore` (`userID`, `pretest`, `scoreCh01`, `scoreCh02`, `scoreCh03`, `scoreCh04`, `scoreCh05`, `scoreCh06`, `scoreCh07`, `scoreCh08`, `scoreCh09`, `scoreCh10`, `scoreCh11`, `scoreCh12`, `scoreCh13`, `scoreCh14`, `scoreCh15`, `scoreCh16`, `scoreCh17`, `scoreCh18`, `scoreCh19`, `posttest`, `scoreTotal`) VALUES
(00004, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(00005, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_answer`
--
ALTER TABLE `tb_answer`
  ADD PRIMARY KEY (`answerID`);

--
-- Indexes for table `tb_question`
--
ALTER TABLE `tb_question`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `tb_student`
--
ALTER TABLE `tb_student`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `userID_2` (`userID`);

--
-- Indexes for table `tb_userscore`
--
ALTER TABLE `tb_userscore`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_question`
--
ALTER TABLE `tb_question`
  MODIFY `questionID` int(100) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
