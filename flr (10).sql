-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 07, 2015 at 10:52 AM
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
('11b99995d3cc3a61149060fb281da6ec', '192.168.1.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.3', 1428396686, 'a:2:{s:9:"user_data";s:0:"";s:9:"logged_in";a:3:{s:2:"id";s:1:"1";s:8:"username";s:5:"admin";s:9:"role_code";s:1:"1";}}');

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
(1, 1, 'lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, sample&nbsp;'),
(2, 2, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) NOT NULL,
  `jobwork_id` int(11) NOT NULL,
  `date_of_invoice` date NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `quotation_id`, `jobwork_id`, `date_of_invoice`) VALUES
(1, 1, 1, '0000-00-00'),
(2, 4, 3, '0000-00-00'),
(3, 2, 2, '0000-00-00'),
(4, 6, 4, '0000-00-00'),
(5, 3, 0, '0000-00-00'),
(6, 5, 0, '0000-00-00'),
(7, 7, 0, '0000-00-00'),
(8, 8, 0, '0000-00-00'),
(9, 9, 5, '0000-00-00'),
(10, 10, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `jobwork`
--

CREATE TABLE `jobwork` (
  `jobwork_id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) NOT NULL,
  `sales_exe` varchar(240) NOT NULL,
  PRIMARY KEY (`jobwork_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jobwork`
--

INSERT INTO `jobwork` (`jobwork_id`, `quotation_id`, `sales_exe`) VALUES
(1, 1, ''),
(2, 2, ''),
(3, 4, ''),
(4, 6, ''),
(5, 9, ''),
(6, 17, '');

-- --------------------------------------------------------

--
-- Table structure for table `job_complete`
--

CREATE TABLE `job_complete` (
  `job_com_id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) NOT NULL,
  `jobwork_id` int(11) NOT NULL,
  `sales_exe` varchar(340) NOT NULL,
  `sr_date` date NOT NULL,
  PRIMARY KEY (`job_com_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `job_complete`
--

INSERT INTO `job_complete` (`job_com_id`, `quotation_id`, `jobwork_id`, `sales_exe`, `sr_date`) VALUES
(1, 1, 1, 'lyndon Abesamis', '2015-04-01'),
(2, 2, 2, 'Lyndon Abesamis', '2015-04-01'),
(3, 4, 3, 'Lyndon Abesamis', '2015-04-02'),
(4, 6, 4, 'Lyndon Abesamis', '2015-04-06'),
(5, 9, 5, 'Lyndon Abesamis', '2015-04-06');

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
  `date_of_approved` date NOT NULL,
  `date_of_reject` date NOT NULL,
  `remarks` varchar(256) NOT NULL,
  `sales_exe` varchar(256) NOT NULL,
  PRIMARY KEY (`quotation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`quotation_id`, `company_id`, `term_payment`, `validity_period`, `job_description`, `status`, `date_of_quote`, `date_of_approved`, `date_of_reject`, `remarks`, `sales_exe`) VALUES
(1, 39, 30, 30, 'sample description', 5, '2015-04-01', '0000-00-00', '2015-04-01', 'approved', 'lyndon Abesamis'),
(2, 47, 23, 23, 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 5, '2015-04-01', '0000-00-00', '0000-00-00', 'approved', 'Lyndon Abesamis'),
(3, 47, 23, 23, 'sample', 5, '2015-04-01', '0000-00-00', '2015-04-07', 'reject', 'lyndon Abesamis'),
(4, 47, 23, 23, 'sample desc', 5, '2015-04-02', '0000-00-00', '0000-00-00', 'approved', 'Lyndon Abesamis'),
(5, 47, 30, 40, 'this is a sample description', 5, '2015-04-02', '0000-00-00', '2015-04-06', 'reject', 'Lyndon Abesamis'),
(6, 47, 230, 232, 'sample description 21', 5, '2015-04-06', '0000-00-00', '0000-00-00', 'approved', 'Lyndon Abesamis'),
(7, 39, 30, 30, 'sample desc', 5, '2015-04-06', '0000-00-00', '2015-03-03', 'reject', 'Lyndon Abesamis'),
(8, 47, 23, 23, 'sample description', 5, '2015-04-06', '0000-00-00', '2015-04-07', 'reject', 'Lyndon Abesamis'),
(9, 47, 23, 23, 'sample description', 5, '2015-04-06', '0000-00-00', '0000-00-00', 'approved', 'Lyndon Abesamis'),
(10, 47, 23, 23, 'sample', 5, '2015-04-06', '0000-00-00', '2015-04-06', 'reject', 'asdasd'),
(11, 47, 23, 23, 'sad', 4, '2015-04-06', '0000-00-00', '2015-04-07', 'reject', 'asdasd'),
(12, 47, 30, 34, 'ic', 4, '2015-02-06', '0000-00-00', '2015-04-02', 'reject', 'ugcidy'),
(13, 39, 34, 34, 'ggggg', 4, '2015-12-23', '0000-00-00', '2015-04-05', 'reject', 'savh2'),
(14, 47, 30, 30, 'sample desc', 4, '2015-06-01', '0000-00-00', '2015-04-21', 'reject', 'lyndo '),
(15, 47, 24, 24, 'gdidgid', 4, '2015-04-06', '0000-00-00', '2015-02-17', 'reject', 'gIdiydiyd'),
(16, 47, 30, 40, 'sample desc', 4, '2015-02-19', '0000-00-00', '2015-04-21', 'reject', 'Lyndon Abesamis'),
(17, 39, 30, 30, 'sample description', 2, '2015-04-07', '2015-04-07', '0000-00-00', 'approved', 'Lyndon Abesamis');

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
  `sales_exe` varchar(256) NOT NULL,
  PRIMARY KEY (`quotation_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `quotation_details`
--

INSERT INTO `quotation_details` (`quotation_details_id`, `quotation_id`, `sub_description`, `sn`, `quantity`, `uom`, `unit_price`, `amount`, `company_id`, `sales_exe`) VALUES
(1, 1, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, 'm3', 2, 4, 39, 'lyndon Abesamis'),
(2, 1, 'this is a adding information', '23', 2, '23', 3, 6, 0, ''),
(3, 2, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '2', 2, 4, 47, 'Lyndon Abesamis'),
(4, 3, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 23, '23', 23, 529, 47, 'lyndon Abesamis'),
(5, 4, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, 'm2', 12, 24, 47, 'Lyndon Abesamis'),
(6, 5, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 3, '3', 3, 9, 47, 'Lyndon Abesamis'),
(7, 6, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '2', 2, 4, 47, 'Lyndon Abesamis'),
(8, 5, 'sample desc 1', '1', 34, '12', 12, 408, 0, ''),
(9, 6, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 34, '23', 23, 782, 0, ''),
(10, 7, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '2', 2, 4, 39, 'Lyndon Abesamis'),
(11, 8, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 3, '3', 3, 9, 47, 'Lyndon Abesamis'),
(12, 9, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 3, '3', 3, 9, 47, 'Lyndon Abesamis'),
(13, 9, 'sample sample sample er', '1', 23, '23', 23, 529, 0, ''),
(14, 10, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 3, '3', 3, 9, 47, 'asdasd'),
(15, 11, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '2', 2, 4, 47, 'asdasd'),
(16, 12, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '2', 2, 4, 47, 'ugcidy'),
(17, 13, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 12, 'm3', 12, 144, 39, 'savh2'),
(18, 14, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 9, 'm3', 2, 18, 47, 'lyndo '),
(19, 15, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '5', 5, 10, 47, 'gIdiydiyd'),
(20, 16, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '2', 2, 4, 47, 'Lyndon Abesamis'),
(21, 17, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '2', 2, 4, 39, 'Lyndon Abesamis');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `quotation_quote_total`
--

INSERT INTO `quotation_quote_total` (`jobwork_qoute_id`, `quotation_id`, `sub_total`, `gst_total`, `grand_total`) VALUES
(1, 1, 10, 0.7, 10.7),
(2, 2, 4, 0.28, 4.28),
(3, 3, 529, 37.03, 566.03),
(4, 4, 24, 1.68, 25.68),
(5, 5, 417, 29.19, 446.19),
(6, 6, 786, 55.02, 841.02),
(7, 7, 4, 0.28, 4.28),
(8, 8, 9, 0.63, 9.63),
(9, 9, 538, 37.66, 575.66),
(10, 10, 9, 0.63, 9.63),
(11, 11, 4, 0.28, 4.28),
(12, 12, 4, 0.28, 4.28),
(13, 13, 144, 10.08, 154.08),
(14, 14, 18, 1.26, 19.26),
(15, 15, 10, 0.7, 10.7),
(16, 16, 4, 0.28, 4.28),
(17, 17, 4, 0.28, 4.28);

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
  `remarks` varchar(256) NOT NULL,
  PRIMARY KEY (`service_report_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `service_report`
--

INSERT INTO `service_report` (`service_report_id`, `quotation_id`, `jobwork_id`, `sales_exe`, `sr_date`, `remarks`) VALUES
(1, 1, 1, 'lyndon Abesamis', '2015-04-01', 'checkout with invoice'),
(2, 1, 1, '', '0000-00-00', ''),
(3, 2, 2, 'Lyndon Abesamis', '2015-04-01', 'checkout with invoice'),
(4, 3, 0, 'none', '0000-00-00', 'reject'),
(5, 4, 3, 'Lyndon Abesamis', '2015-04-02', 'checkout with invoice'),
(6, 4, 3, '', '0000-00-00', ''),
(7, 5, 0, 'none', '0000-00-00', 'reject'),
(8, 6, 4, 'Lyndon Abesamis', '2015-04-06', 'checkout with invoice'),
(9, 2, 2, '', '0000-00-00', ''),
(10, 6, 4, '', '0000-00-00', ''),
(11, 3, 0, '', '0000-00-00', ''),
(12, 7, 0, 'none', '0000-00-00', 'reject'),
(13, 5, 0, '', '0000-00-00', ''),
(14, 7, 0, '', '0000-00-00', ''),
(15, 8, 0, 'none', '0000-00-00', 'reject'),
(16, 8, 0, '', '0000-00-00', ''),
(17, 9, 5, 'Lyndon Abesamis', '2015-04-06', 'checkout with invoice'),
(18, 9, 5, '', '0000-00-00', ''),
(19, 10, 0, 'none', '0000-00-00', 'reject'),
(20, 16, 0, 'none', '0000-00-00', 'reject'),
(21, 10, 0, '', '0000-00-00', ''),
(22, 15, 0, 'none', '0000-00-00', 'reject'),
(23, 12, 0, 'none', '0000-00-00', 'reject'),
(24, 13, 0, 'none', '0000-00-00', 'reject'),
(25, 14, 0, 'none', '0000-00-00', 'reject'),
(26, 11, 0, 'none', '0000-00-00', 'reject');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_code`, `username`, `password`, `full_name`, `last_activity`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'lyndon', '0000-00-00'),
(9, 2, 'sur', 'a587b16e0a2c4a9c61feee6486c3a6c5', 'sample surveyor', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
