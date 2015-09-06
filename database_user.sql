-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2015 at 03:07 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `database_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `grpID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `grpID` int(10) NOT NULL,
  `grpName` varchar(50) NOT NULL,
  `grpDes` varchar(100) NOT NULL,
  `creator` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`grpID`, `grpName`, `grpDes`, `creator`) VALUES
(1, 'Group1', '', '12'),
(2, 'Group2', '', '12'),
(3, 'New Group', '', '13'),
(4, 'group v', 'thisis group 2', '13'),
(5, 'Some Group', 'dhsja ', '13');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `MemberID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `grpID` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MemberID`, `User_ID`, `grpID`) VALUES
(1, 12, 1),
(2, 13, 4);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `postID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `file_path` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postID`, `memberID`, `file_path`, `description`) VALUES
(5, 0, 'uploads/', ''),
(6, 0, '../uploads/', ''),
(7, 0, '../uploads/', ''),
(8, 0, '../uploads/', ''),
(9, 0, 'djfkjsnfkjsn', 'sdhb ajdhab'),
(10, 1, 'path', 'dfsdfsdfs'),
(11, 1, 'uploads/', 'jdakas sadhak ajsd'),
(12, 2, 'uploads/', 'dhfjds fksdjnfjksdf skfnksjndf'),
(13, 1, 'uploads/', 'fsdf sdfsf sfks'),
(14, 2, 'uploads/', 'sdnka aksndka kajsd'),
(15, 2, '', 'hdfjks fksdhfks fksdhfksdf '),
(16, 1, '', 'This is a post'),
(17, 1, '', 'Here is a post'),
(18, 2, '', 'This is a group 4 post'),
(19, 2, '', 'This is a group 4 post'),
(20, 2, '', 'This is a group 4 post'),
(21, 0, '', 'Group 3 post'),
(22, 0, '', 'Group 4 post'),
(23, 0, '', 'Group 4 post'),
(24, 2, 'dfdsfsd', 'dfdfdsf'),
(25, 2, '', 'New Group post 4'),
(26, 2, '', 'New Post'),
(27, 2, '', 'sfsdf'),
(28, 2, '', 'I feel crezy');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `taskID` int(10) NOT NULL,
  `taskName` varchar(50) NOT NULL,
  `taskDes` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `creator` int(10) NOT NULL,
  `assigned` int(10) NOT NULL,
  `grpID` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`taskID`, `taskName`, `taskDes`, `status`, `creator`, `assigned`, `grpID`) VALUES
(1, 'task1', 'task to work out', 0, 0, 12, 0),
(2, 'New Task', 'dsfuysdf sdufhisd sdufhsidfh', 0, 0, 13, 0),
(3, 'Test Task', 'dsfsjf fksndidsf', 0, 0, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(11) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `User_Name` varchar(30) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `E_mail` varchar(30) NOT NULL,
  `group` int(11) NOT NULL,
  `salt` varchar(32) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `First_Name`, `Last_Name`, `User_Name`, `Password`, `E_mail`, `group`, `salt`) VALUES
(12, 'abcd', 'ssss', 'silva', '9108a3c918171f0a220dfd31dbd1e1c0e17e70102338c1e8b7099df703d0081a', 'silva@gmail.com', 2, '­þ–ÿO©£w>­ñ=0b…²õ{ªÎ„ÊÌjqtE'),
(13, 'alexx', 'garlettfhbftg', 'alex', 'ab23a954b9893a4674c35272ceca812f501507f9a8c1109edb64b889105b9601', 'alexx@gmail.com', 1, 'ÏrL,J¼=Àº±ç/d÷â“HSì€¯—¦vAv)Ë');

-- --------------------------------------------------------

--
-- Table structure for table `users_sessions`
--

CREATE TABLE IF NOT EXISTS `users_sessions` (
  `User_ID` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`,`userID`,`grpID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`grpID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MemberID`,`grpID`), ADD KEY `User_ID` (`User_ID`), ADD KEY `grpID` (`grpID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`taskID`), ADD UNIQUE KEY `taskID` (`taskID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `users_sessions`
--
ALTER TABLE `users_sessions`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `grpID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `MemberID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `taskID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users_sessions`
--
ALTER TABLE `users_sessions`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `member`
--
ALTER TABLE `member`
ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`),
ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`grpID`) REFERENCES `groups` (`grpID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
