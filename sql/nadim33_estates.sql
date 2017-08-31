-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 06, 2017 at 02:40 PM
-- Server version: 5.5.51-38.2
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nadim33_estates`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `n_id` int(11) NOT NULL,
  `detail` text NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`n_id`, `detail`, `image`, `status`) VALUES
(1, '<b><i>	HTML content default in textarea&nbsp;</i></b><div><b><i><br></i></b></div><div><b><i>asdasdasdasd</i></b></div><div><b><i>asdassd</i></b></div>', '12006292_10153893587974578_2894302347733144459_n.jpg', 0),
(2, 'addsdadsad<div>asdsadadda</div><div>asdddddddd</div>', '', 0),
(3, '	Add <b>content</b> <i>of</i> news\r\n', '', 2),
(4, '	Add <b>content</b> <i>of</i> news\r\n', '', 2),
(5, '	Add <b>content</b> <i>of</i> news\r\n', '', 2),
(6, '	Add <b>content</b> <i>of</i> news\r\n', 'choco.jpg', 2),
(7, '	Add <b>content</b> <i>of</i> news\r\n', '12006292_10153893587974578_2894302347733144459_n.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `p_id` int(11) NOT NULL,
  `location` text NOT NULL,
  `status` int(11) NOT NULL,
  `p_type` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `bath` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `description` text NOT NULL,
  `state` text NOT NULL,
  `city` int(11) NOT NULL,
  `image` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `image4` text NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `purpose` int(11) NOT NULL,
  `unit` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`p_id`, `location`, `status`, `p_type`, `room`, `bath`, `price`, `area`, `description`, `state`, `city`, `image`, `image2`, `image3`, `image4`, `name`, `phone`, `email`, `purpose`, `unit`) VALUES
(44, '12 Valley Road, Westridge', 1, 1, 10, 5, 3000000, 1, 'I want to sale my house located in Rawalpindi Westridge.', 'Punjab', 41, '', '', '', '', 'Awais Maqsood', '03245753641', 'awaismaqsood91@yahoo.com', 1, 'Kanal'),
(45, 'bahria town phase 8', 0, 1, 10, 6, 10000000, 1, 'House for sale in bahria town', 'Punjab', 41, '', '', '', '', 'waleed', '03435551441', 'waleed_iiui@yahoo.com', 1, 'Kanal');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `r_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`r_id`, `email`, `password`) VALUES
(1, 'waleedwaheed1196iiui@yahoo.com', '123456'),
(2, 'awaismaqsood91@yahoo.com', 'killer'),
(3, 'info@researchanalyticsintl.org', 'ranalytics');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
