-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2017 at 07:25 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `center4info`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `heading` varchar(30) NOT NULL,
  `ename` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(10) NOT NULL,
  `time` time NOT NULL,
  `content` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`heading`, `ename`, `date`, `day`, `time`, `content`) VALUES
('Sparsh', 'curricular ', '2017-07-11', 'Fri', '00:00:00', 'Comitee Meeting'),
('Election is gone', 'election', '2017-07-07', 'Tuesday', '04:15:00', 'Ohk,get Out of Here'),
('Election is here', 'election', '2017-07-06', 'Monday', '04:17:48', 'Ohk,Lets be Honest'),
('ACM', 'student chapter', '2017-07-11', 'Wed', '07:00:00', 'Tommorrow is meeting');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `result` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(10) NOT NULL,
  `time` time NOT NULL,
  `subject` varchar(30) NOT NULL,
  `syllabus` varchar(600) NOT NULL,
  `title` varchar(30) NOT NULL,
  `exid` int(255) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`result`, `date`, `day`, `time`, `subject`, `syllabus`, `title`, `exid`, `userid`, `status`) VALUES
('pass', '2017-07-04', 'Wed', '05:14:00', 'Dbms', 'Nupp', 'Mid', 1, 'u15co048', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `userid` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `emailid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userid`, `password`, `fname`, `lname`, `emailid`) VALUES
('u15co001', '1234', 'Aki', 'Patel', 'akshpatel7@gmail.com'),
('u15co048', '1234', 'jay', 'dudhat', 'jaydudhatnk@gmail.co'),
('u15co050', '1234', 'priyansh', 'zalawadiya', 'prizala@gmail.com'),
('u15co051', '1234', 'jasmin', 'nasit', 'jasunasit76@gmail.co');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `pid` int(255) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `content` text NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`pid`, `userid`, `content`, `time`) VALUES
(1, '0', 'heyyy', 1499443807),
(2, 'u15co048', 'Hii', 1500042572),
(3, 'u15co048', 'So Where R u NOw???\r\n\r\n\r\n', 1500099913),
(4, 'u15co001', 'Hii fellllassss\r\n', 1500111493),
(5, 'u15co048', 'Hii fellllassss\r\n', 1500112737),
(6, 'u15co048', 'Hii fellllassss\r\n', 1500112818),
(7, 'u15co048', 'Hii fellllassss\r\n', 1500112844);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `rid` int(254) NOT NULL,
  `sender` varchar(10) NOT NULL,
  `receiver` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`rid`, `sender`, `receiver`, `status`) VALUES
(1, 'u15co048', 'u15co051', 1),
(2, 'u15co051', 'u15co050', 0),
(3, 'u15co048', 'u15co050', 0),
(4, 'u15co051', 'u15co001', 1),
(5, 'u15co001', 'u15co048', 1),
(6, 'u15co051', 'u15co001', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`content`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD UNIQUE KEY `rid` (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `rid` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
