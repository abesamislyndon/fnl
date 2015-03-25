-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 25, 2015 at 10:50 AM
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
('a317883049962e883b09708725410119', '192.168.1.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.104 Safari/537.3', 1427276748, 'a:4:{s:9:"user_data";s:0:"";s:9:"date_from";s:10:"2015-01-01";s:7:"date_to";s:10:"2015-04-30";s:9:"logged_in";a:3:{s:2:"id";s:1:"1";s:8:"username";s:5:"admin";s:9:"role_code";s:1:"1";}}');

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
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) NOT NULL,
  `jobwork_id` int(11) NOT NULL,
  `date_of_invoice` date NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `quotation_id`, `jobwork_id`, `date_of_invoice`) VALUES
(1, 1, 0, '0000-00-00'),
(2, 2, 1, '0000-00-00'),
(3, 3, 0, '0000-00-00'),
(4, 4, 0, '0000-00-00'),
(5, 5, 2, '0000-00-00'),
(6, 6, 3, '0000-00-00'),
(7, 7, 0, '0000-00-00');

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
(1, 2, ''),
(2, 5, ''),
(3, 6, '');

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
(1, 2, 1, 'Lyndon Abesamis'),
(2, 5, 2, 'Lyndon Abesamis'),
(3, 6, 3, 'Lyndon Abesamis');

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
  `remarks` varchar(256) NOT NULL,
  PRIMARY KEY (`quotation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`quotation_id`, `company_id`, `term_payment`, `validity_period`, `job_description`, `status`, `date_of_quote`, `remarks`) VALUES
(1, 47, 30, 40, 'sample description', 5, '2015-03-24', 'reject'),
(2, 39, 30, 20, 'sample desc', 5, '2015-03-24', 'approved'),
(3, 39, 1, 12, 'sample desc', 5, '2015-03-01', 'reject'),
(4, 39, 30, 20, 'sample description', 5, '2015-04-01', 'reject'),
(5, 39, 30, 20, 'sample desc', 5, '2015-01-13', 'approved'),
(6, 39, 30, 20, 'and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker', 5, '2015-04-01', 'approved'),
(7, 39, 30, 20, 'Wall plastering sample ', 5, '2015-04-01', 'reject');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `quotation_details`
--

INSERT INTO `quotation_details` (`quotation_details_id`, `quotation_id`, `sub_description`, `sn`, `quantity`, `uom`, `unit_price`, `amount`, `company_id`) VALUES
(1, 1, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '2', 2, 4, 47),
(2, 2, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '2', 2, 4, 39),
(3, 3, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '2', 2, 4, 39),
(5, 3, 'sample desc 1', '1', 12, '12', 12, 144, 0),
(6, 4, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '2', 2, 4, 39),
(7, 5, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '2', 2, 4, 39),
(8, 6, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '2', 2, 4, 39),
(9, 7, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '2', 1232, 2464, 39),
(10, 7, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 12, '12', 2, 24, 0),
(11, 7, 'sample desc 1', '1', 12, '33', 221, 2652, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `quotation_quote_total`
--

INSERT INTO `quotation_quote_total` (`jobwork_qoute_id`, `quotation_id`, `sub_total`, `gst_total`, `grand_total`) VALUES
(1, 1, 4, 0.28, 4.28),
(2, 2, 4, 0.28, 4.28),
(3, 3, 148, 10.36, 158.36),
(4, 4, 4, 0.28, 4.28),
(5, 5, 4, 0.28, 4.28),
(6, 6, 4, 0.28, 4.28),
(7, 7, 5140, 359.8, 5499.8);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `service_report`
--

INSERT INTO `service_report` (`service_report_id`, `quotation_id`, `jobwork_id`, `sales_exe`, `sr_date`, `remarks`) VALUES
(1, 1, 0, 'none', '0000-00-00', 'reject'),
(2, 1, 0, '', '0000-00-00', ''),
(3, 2, 1, 'Lyndon Abesamis', '0000-00-00', ''),
(4, 2, 1, '', '0000-00-00', ''),
(5, 3, 0, 'none', '0000-00-00', 'reject'),
(6, 3, 0, '', '0000-00-00', ''),
(7, 4, 0, 'none', '0000-00-00', 'reject'),
(8, 4, 0, '', '0000-00-00', ''),
(9, 5, 2, 'Lyndon Abesamis', '0000-00-00', ''),
(10, 5, 2, '', '0000-00-00', ''),
(11, 6, 3, 'Lyndon Abesamis', '0000-00-00', ''),
(12, 6, 3, '', '0000-00-00', ''),
(13, 7, 0, 'none', '0000-00-00', 'reject'),
(14, 7, 0, '', '0000-00-00', '');

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
