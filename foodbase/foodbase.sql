-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2018 at 03:06 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Oid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `price` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Oid`, `name`, `email`, `type`, `price`) VALUES
(1, 'css', 'cs@gmail.com', 'Khichuri', '700'),
(2, 'css', 'cs@gmail.com', 'Fastfood', '300'),
(3, 'css', 'cs@gmail.com', 'Fastfood', '1200'),
(4, 'Alibaba', 'al@gmail.com', 'Khichuri', '1050');

-- --------------------------------------------------------

--
-- Table structure for table `com2`
--

CREATE TABLE `com2` (
  `cid` int(11) NOT NULL,
  `uid` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `type` enum('Fastfood','Kacchi','Khichuri') NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `com2`
--

INSERT INTO `com2` (`cid`, `uid`, `email`, `date`, `type`, `msg`) VALUES
(1, 'Anonymous', 'cs@gmail.com', '2018-11-29 02:46:07', 'Kacchi', '1 looks good!'),
(2, 'Anonymous', 'cs@gmail.com', '2018-11-29 02:46:23', 'Khichuri', 'for 2 any offer?\r\n'),
(3, 'Anonymous', 'cs@gmail.com', '2018-11-29 02:46:43', 'Fastfood', 'Burger is pricey here :'),
(4, 'Anonymous', 'cs@gmail.com', '2018-11-29 08:05:57', 'Kacchi', 'HJE DDRTRSG '),
(5, 'Anonymous', 'sss@gmail.com', '2018-11-29 11:55:49', 'Fastfood', 'tekhyj jyt');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `fid` int(11) NOT NULL,
  `Item` varchar(200) NOT NULL,
  `price` varchar(7) NOT NULL,
  `des` text NOT NULL,
  `type` enum('Fastfood','Kacchi','Khichuri','Grill','Drinks') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`fid`, `Item`, `price`, `des`, `type`) VALUES
(1, '45779623_1469868493115592_5182257455739961344_n.jpg', '250', 'mrjyntbgrvfwbrt ynretb  5mrnteb mrynebtrv', 'Kacchi'),
(2, '3165238582aa3479e0abc8e719b49691.jpg', '350', 'dtfyguhijokpl fyugihojpk[l fugihojpk[l fugihojpk.', 'Khichuri'),
(3, '45643548_2025098747789207_2339139747470901248_n.jpg', '300', 'cvhbjnmjpk[l gfhjpk[l', 'Fastfood'),
(4, '45775918_263260154381170_2542418638330134528_n.jpg', '350', 'uvivboinhpi ', 'Kacchi'),
(5, '1496391604_5.jpg', '400', 'hioufgviyuob ob o', 'Khichuri'),
(6, '45791901_329831051153002_2684922384741302272_n.jpg', '800', 'noubviycv ihy hiviygouhiph', 'Fastfood'),
(7, '45788829_252374822297257_5892249067693539328_n.jpg', '300', 'This kacchi is very delicious ,I hope you will enjoy it.', 'Kacchi'),
(8, '45805310_246521209350742_8651278403002957824_n.jpg', '550', 'It is alibaba burger ,, khaile khali khaitei mon chabe, lets try it.,,', 'Fastfood'),
(9, '1496391604_5.jpg', '400', 'tnbrjf k8il,k 5i', 'Khichuri');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Uid` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `Type` enum('Admin','Manager','User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Uid`, `Username`, `email`, `pass`, `Type`) VALUES
(1, 'a', 'a@gmail.com', '123', 'Admin'),
(2, 'm', 'm@gmail.com', '111', 'Manager'),
(3, 'm2', 'm2@gmail.com', '222', 'Manager'),
(4, 'css', 'cs@gmail.com', '333', 'User'),
(5, 'm3', 'm3@gmail.com', '555', 'Manager'),
(6, 'Alibaba', 'al@gmail.com', '666', 'User'),
(7, 'm4', 'm4@gmail.com', '777', 'Manager'),
(8, 'sss', 'sss@gmail.com', '888', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `mid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`mid`, `name`, `contact`) VALUES
(1, 'Manik', 4323567),
(3, 'Naqi', 56432566),
(4, 'ALI', 87654321),
(5, 'cse471', 986454342);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `Riid` int(11) NOT NULL,
  `fiid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`Riid`, `fiid`) VALUES
(1, 1),
(1, 2),
(1, 3),
(3, 4),
(3, 5),
(3, 6),
(4, 7),
(4, 8),
(5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `restraunt`
--

CREATE TABLE `restraunt` (
  `Rid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `busid` varchar(40) NOT NULL,
  `location` varchar(30) NOT NULL,
  `contact` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restraunt`
--

INSERT INTO `restraunt` (`Rid`, `name`, `busid`, `location`, `contact`) VALUES
(3, 'Naqi', '2323', 'gulshan', 56432566),
(4, 'ALI', '45321', 'Motijheel', 87654321),
(1, 'Manik', '54321', 'Banani', 4323567),
(5, 'cse471', '65443', 'Mohakhali', 986454342);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Oid`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `com2`
--
ALTER TABLE `com2`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Uid`,`email`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`mid`,`contact`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD KEY `menu_ibfk_1` (`Riid`),
  ADD KEY `menu_ibfk_2` (`fiid`);

--
-- Indexes for table `restraunt`
--
ALTER TABLE `restraunt`
  ADD PRIMARY KEY (`busid`),
  ADD KEY `restraunt_ibfk_1` (`Rid`,`contact`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `Oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `com2`
--
ALTER TABLE `com2`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`email`) REFERENCES `login` (`email`);

--
-- Constraints for table `com2`
--
ALTER TABLE `com2`
  ADD CONSTRAINT `com2_ibfk_1` FOREIGN KEY (`email`) REFERENCES `login` (`email`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`Riid`) REFERENCES `manager` (`mid`),
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`fiid`) REFERENCES `food` (`fid`);

--
-- Constraints for table `restraunt`
--
ALTER TABLE `restraunt`
  ADD CONSTRAINT `restraunt_ibfk_1` FOREIGN KEY (`Rid`,`contact`) REFERENCES `manager` (`mid`, `contact`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
