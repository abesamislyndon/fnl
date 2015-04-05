-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 17, 2015 at 10:21 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flr`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('7950c2b6afec4ccf6d1ae52d4b3ffef2', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36', 1426580588, ''),
('b9182f962a78c315b92d786b6452de45', '192.168.1.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36', 1426583892, 'a:2:{s:9:"user_data";s:0:"";s:9:"logged_in";a:3:{s:2:"id";s:1:"1";s:8:"username";s:5:"admin";s:9:"role_code";s:1:"1";}}');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `tel_num` varchar(50) NOT NULL,
  `fax_num` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date_in` date NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `address`, `tel_num`, `fax_num`, `email`, `date_in`) VALUES
(38, 'Exhibit Media Pte Ltd', '35 changi south 2 Singapore', '62851088', '64816077', 'kscheong@daiya.com.sg', '2103-05-24'),
(39, 'DAIYA ENGINEERING & CONSTRUCTION PTE LTD', 'NO 14 TUAS AVENUE 5 SINGAPORE 639339', '62689055', '63689572', 'alanng@tangsengservices.com', '2012-12-12'),
(46, 'Messan Pte  Ltd', 'NO 20 SUNGEI KADUT STREET 4 SINGAPORE 729047', '62851088', '63689572', 'taametal@singnet.com.sg', '2103-05-05'),
(47, 'Sunny Metal Pte Ltd', 'NO. 23 KRANJI WAY ,SINGAPORE 739450', '63658998', '63689572', 'alanng@tangsengservices.com', '2103-05-05'),
(48, 'F & L Reinstatement Pte Ltd', 'NO 48 SUNGEI KADUT AVENUE SINGAPORE 729671', '62851088', '63684706', 'coolshox@gmail.com', '2103-05-05'),
(49, '', '', '', '', '', '0000-00-00'),
(50, 'Sample Company', '35 changi south 2 Singapore', '312414', '32525', 'alanng@tangsengservices.com', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE `description` (
  `sn_id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` int(11) NOT NULL,
  `sub_description` longtext NOT NULL,
  PRIMARY KEY (`sn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`sn_id`, `sn`, `sub_description`) VALUES
(1, 1, 'sample desc 1'),
(2, 2, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n');

-- --------------------------------------------------------

--
-- Table structure for table `jobwork`
--

CREATE TABLE `jobwork` (
  `jobwork_id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) NOT NULL,
  `sales_exe` varchar(240) NOT NULL,
  PRIMARY KEY (`jobwork_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jobwork`
--

INSERT INTO `jobwork` (`jobwork_id`, `quotation_id`, `sales_exe`) VALUES
(1, 1, ''),
(2, 2, ''),
(3, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `job_complete`
--

CREATE TABLE `job_complete` (
  `job_com_id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) NOT NULL,
  `jobwork_id` int(11) NOT NULL,
  `sales_exe` varchar(340) NOT NULL,
  PRIMARY KEY (`job_com_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `job_complete`
--

INSERT INTO `job_complete` (`job_com_id`, `quotation_id`, `jobwork_id`, `sales_exe`) VALUES
(1, 1, 1, 'Lyndon Abesamis'),
(2, 2, 2, 'Lyndon Abesamis'),
(3, 3, 3, 'Lyndon Abesamis ');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `quotation_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `term_payment` int(11) NOT NULL,
  `validity_period` int(11) NOT NULL,
  `job_description` varchar(340) NOT NULL,
  `status` int(11) NOT NULL,
  `date_of_quote` date NOT NULL,
  PRIMARY KEY (`quotation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`quotation_id`, `company_id`, `term_payment`, `validity_period`, `job_description`, `status`, `date_of_quote`) VALUES
(1, 50, 1, 20, 'sa', 5, '2015-03-17'),
(2, 47, 30, 20, 'sample ', 5, '2015-03-17'),
(3, 39, 33, 203, 'fe3', 5, '2015-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_details`
--

CREATE TABLE `quotation_details` (
  `quotation_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) NOT NULL,
  `sub_description` varchar(400) DEFAULT NULL,
  `sn` varchar(230) DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `uom` varchar(120) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `amount` float NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`quotation_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `quotation_details`
--

INSERT INTO `quotation_details` (`quotation_details_id`, `quotation_id`, `sub_description`, `sn`, `quantity`, `uom`, `unit_price`, `amount`, `company_id`) VALUES
(1, 1, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '2', 2, 4, 50),
(2, 2, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '2', 2, 4, 47),
(3, 3, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '2', 2, 4, 39);

-- --------------------------------------------------------

--
-- Table structure for table `quotation_quote_total`
--

CREATE TABLE `quotation_quote_total` (
  `jobwork_qoute_id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) NOT NULL,
  `sub_total` float NOT NULL,
  `gst_total` float NOT NULL,
  `grand_total` float NOT NULL,
  PRIMARY KEY (`jobwork_qoute_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `quotation_quote_total`
--

INSERT INTO `quotation_quote_total` (`jobwork_qoute_id`, `quotation_id`, `sub_total`, `gst_total`, `grand_total`) VALUES
(1, 1, 4, 0.28, 4.28),
(2, 2, 4, 0.28, 4.28),
(3, 3, 4, 0.28, 4.28);

-- --------------------------------------------------------

--
-- Table structure for table `service_report`
--

CREATE TABLE `service_report` (
  `service_report_id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) NOT NULL,
  `jobwork_id` int(11) NOT NULL,
  `sales_exe` varchar(250) NOT NULL,
  `sr_date` date NOT NULL,
  PRIMARY KEY (`service_report_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `service_report`
--

INSERT INTO `service_report` (`service_report_id`, `quotation_id`, `jobwork_id`, `sales_exe`, `sr_date`) VALUES
(1, 1, 1, 'Lyndon Abesamis', '0000-00-00'),
(2, 1, 1, '', '0000-00-00'),
(3, 2, 2, 'Lyndon Abesamis', '0000-00-00'),
(4, 2, 2, '', '0000-00-00'),
(5, 3, 3, 'Lyndon Abesamis', '0000-00-00'),
(6, 3, 3, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `role_code` int(11) NOT NULL,
  `username` varchar(90) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(90) NOT NULL,
  `last_activity` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_code`, `username`, `password`, `full_name`, `last_activity`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '0000-00-00'),
(2, 2, 'sur', 'a587b16e0a2c4a9c61feee6486c3a6c5', 'surveyor', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
