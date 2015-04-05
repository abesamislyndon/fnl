-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 30, 2015 at 11:55 AM
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
('077f0eabc308cb194d8d20efef4d4469', '192.168.1.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.104 Safari/537.3', 1427709293, 'a:1:{s:9:"logged_in";a:3:{s:2:"id";s:1:"1";s:8:"username";s:5:"admin";s:9:"role_code";s:1:"1";}}');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `quotation_id`, `jobwork_id`, `date_of_invoice`) VALUES
(1, 1, 1, '0000-00-00'),
(2, 2, 2, '0000-00-00'),
(3, 3, 0, '0000-00-00'),
(4, 4, 0, '0000-00-00'),
(5, 5, 3, '0000-00-00'),
(6, 6, 4, '0000-00-00'),
(7, 7, 6, '0000-00-00'),
(8, 8, 7, '0000-00-00'),
(9, 9, 8, '0000-00-00'),
(10, 10, 9, '0000-00-00'),
(11, 11, 10, '0000-00-00'),
(12, 12, 11, '0000-00-00'),
(13, 13, 0, '0000-00-00'),
(14, 14, 12, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `jobwork`
--

CREATE TABLE `jobwork` (
  `jobwork_id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) NOT NULL,
  `sales_exe` varchar(240) NOT NULL,
  PRIMARY KEY (`jobwork_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `jobwork`
--

INSERT INTO `jobwork` (`jobwork_id`, `quotation_id`, `sales_exe`) VALUES
(1, 1, ''),
(2, 2, ''),
(3, 5, ''),
(4, 6, ''),
(5, 6, ''),
(6, 7, ''),
(7, 8, ''),
(8, 9, ''),
(9, 10, ''),
(10, 11, ''),
(11, 12, ''),
(12, 14, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `job_complete`
--

INSERT INTO `job_complete` (`job_com_id`, `quotation_id`, `jobwork_id`, `sales_exe`, `sr_date`) VALUES
(1, 1, 1, 'Lyndon Abesamis', '2015-03-26'),
(2, 2, 2, 'Lyndon Abesamis', '2015-03-26'),
(3, 5, 3, 'Lyndon Abesamis', '2015-03-27'),
(4, 6, 4, 'leon ', '2015-03-27'),
(5, 7, 6, 'Lyndon Abesamis', '2015-03-27'),
(6, 8, 7, 'Angus', '2015-03-27'),
(7, 9, 8, 'Lyndon Abesamis ', '2015-03-30'),
(8, 10, 9, 'sample name', '2015-03-30'),
(9, 11, 10, 'Lyndon Abesamis', '2015-03-30'),
(10, 12, 11, 'Lyndon Abesamis ', '2015-03-30'),
(11, 14, 12, 'lyndo ', '2015-03-30');

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
  `sales_exe` varchar(256) NOT NULL,
  PRIMARY KEY (`quotation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`quotation_id`, `company_id`, `term_payment`, `validity_period`, `job_description`, `status`, `date_of_quote`, `remarks`, `sales_exe`) VALUES
(1, 39, 24, 34, 'sadasd', 5, '2015-04-02', 'approved', ''),
(2, 39, 12, 12, 'asdasd', 5, '2015-04-02', 'approved', ''),
(3, 39, 12, 12, 'smple description', 5, '2015-04-02', 'reject', ''),
(4, 39, 30, 40, 'sample description', 5, '2015-04-02', 'reject', ''),
(5, 39, 30, 20, 'wall sample', 5, '2015-04-03', 'approved', ''),
(6, 47, 90, 30, 'Kitchen Renovation', 5, '2015-04-01', 'approved', ''),
(7, 47, 23, 23, 'sdfsdd', 5, '2015-04-03', 'approved', ''),
(8, 47, 30, 90, 'Estella Kitchen', 5, '2015-04-01', 'approved', ''),
(9, 38, 23, 23, 'Wall Platering work at Suntec City', 5, '2015-04-06', 'approved', ''),
(10, 47, 23, 23, 'sample description', 5, '2015-04-06', 'approved', ''),
(11, 47, 12, 12, 'sample desc', 5, '2015-04-06', 'approved', 'Lyndon Abesamis'),
(12, 47, 34, 34, 'sample desc', 5, '2015-04-06', 'approved', 'Lyndon Abesamis'),
(13, 47, 23, 23, 'sample description', 5, '2015-04-06', 'reject', 'Lyndon Abesamis'),
(14, 39, 30, 30, 'sample desc', 5, '2015-04-06', 'approved', 'lyndo ');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `quotation_details`
--

INSERT INTO `quotation_details` (`quotation_details_id`, `quotation_id`, `sub_description`, `sn`, `quantity`, `uom`, `unit_price`, `amount`, `company_id`, `sales_exe`) VALUES
(1, 1, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 234, '234', 234, 54756, 39, ''),
(2, 2, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 12, '12', 12, 144, 39, ''),
(3, 3, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 23, '23', 23, 529, 39, ''),
(4, 4, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 3, '3', 3, 9, 39, ''),
(5, 5, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '2', 2, 4, 39, ''),
(6, 6, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 1, 'ft', 34, 34, 47, ''),
(7, 6, 'sample desc 1', '1', 4, 'ft', 56, 224, 47, ''),
(8, 6, 'Kitchen Top', '3', 1, 'ft', 34, 34, 47, ''),
(9, 6, 'TV Console', '4', 20, 'ft', 300, 6000, 0, ''),
(10, 6, 'pumping ', '6', 3, 'ft', 400, 1200, 0, ''),
(11, 7, 'sdsd', '2', 3, '3', 3, 9, 47, ''),
(14, 8, 'Solid surface', '1', 10, 'ft', 100, 1000, 47, ''),
(15, 8, 'Cabinet', '2', 10, 'ft', 1000, 10000, 47, ''),
(16, 8, 'Flooring', '3', 10, 'SQF', 12, 120, 47, ''),
(17, 8, 'Plumbing', '4', 1, '-', 500, 500, 0, ''),
(18, 8, 'Electrical work', '5', 1, '-', 1000, 1000, 0, ''),
(19, 8, 'painting', '6', 1, ' 4 room', 2000, 2000, 0, ''),
(20, 9, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 12, 'm2', 3, 36, 38, ''),
(21, 9, 'sample desc 1', '1', 12.9, 'sq', 12, 154.8, 0, ''),
(22, 9, 'sample description 2', '12', 2, '1', 1, 2, 0, ''),
(23, 10, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 12, 'm2', 12, 144, 47, ''),
(24, 11, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 2, '2', 2, 4, 47, ''),
(25, 12, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 3, '3', 3, 9, 47, 'Lyndon Abesamis'),
(26, 12, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 3, '3', 3, 9, 0, ''),
(27, 12, 'edited samokesdd', '2', 3, '3', 3, 9, 0, ''),
(28, 13, 'sample description', '1', 1, '12', 1, 1, 47, 'Lyndon Abesamis'),
(29, 13, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 1, '1', 1, 1, 0, ''),
(30, 13, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 3, '3', 3, 9, 0, ''),
(31, 14, 'Scope of Work:\nsupply Labour and materials to carry out works as follows:\n\nSupply labour and materials to plastering of existing wall with dans and cement\nand 2 coats of selected emulsion pain\n(Approx area 44.7 mx4.2m)\n', '2', 12, 'm2', 12, 144, 39, 'lyndo ');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `quotation_quote_total`
--

INSERT INTO `quotation_quote_total` (`jobwork_qoute_id`, `quotation_id`, `sub_total`, `gst_total`, `grand_total`) VALUES
(1, 1, 54756, 3832.92, 58588.9),
(2, 2, 144, 10.08, 154.08),
(3, 3, 529, 37.03, 566.03),
(4, 4, 9, 0.63, 9.63),
(5, 5, 4, 0.28, 4.28),
(6, 6, 7492, 524.44, 8016.44),
(7, 7, 280, 19.6, 299.6),
(8, 8, 14620, 1023.4, 15643.4),
(9, 9, 192.8, 13.5, 206.3),
(10, 10, 144, 10.08, 154.08),
(11, 11, 4, 0.28, 4.28),
(12, 12, 27, 1.89, 28.89),
(13, 13, 11, 0.77, 11.77),
(14, 14, 144, 10.08, 154.08);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `service_report`
--

INSERT INTO `service_report` (`service_report_id`, `quotation_id`, `jobwork_id`, `sales_exe`, `sr_date`, `remarks`) VALUES
(1, 1, 1, 'Lyndon Abesamis', '2015-03-26', 'checkout with invoice'),
(2, 1, 1, '', '0000-00-00', ''),
(3, 2, 2, 'Lyndon Abesamis', '2015-03-26', 'checkout with invoice'),
(4, 2, 2, '', '0000-00-00', ''),
(5, 3, 0, 'none', '0000-00-00', 'reject'),
(6, 3, 0, '', '0000-00-00', ''),
(7, 4, 0, 'none', '0000-00-00', 'reject'),
(8, 4, 0, '', '0000-00-00', ''),
(9, 5, 3, 'Lyndon Abesamis', '2015-03-27', 'checkout with invoice'),
(10, 5, 3, '', '0000-00-00', ''),
(11, 6, 4, 'leon', '2015-03-27', 'checkout with invoice'),
(12, 6, 4, '', '0000-00-00', ''),
(13, 7, 6, 'Lyndon Abesamis', '2015-03-27', 'checkout with invoice'),
(14, 7, 6, '', '0000-00-00', ''),
(15, 8, 7, 'Angus', '2015-03-27', 'checkout with invoice'),
(16, 8, 7, '', '0000-00-00', ''),
(17, 9, 8, 'Lyndon Abesamis', '2015-03-30', 'checkout with invoice'),
(18, 9, 8, '', '0000-00-00', ''),
(19, 10, 9, 'sample name', '2015-03-30', 'checkout with invoice'),
(20, 10, 9, '', '0000-00-00', ''),
(21, 11, 10, 'Lyndon Abesamis', '2015-03-30', 'checkout with invoice'),
(22, 11, 10, '', '0000-00-00', ''),
(23, 12, 11, 'Lyndon Abesamis', '2015-03-30', 'checkout with invoice'),
(24, 12, 11, '', '0000-00-00', ''),
(25, 13, 0, 'none', '0000-00-00', 'reject'),
(26, 13, 0, '', '0000-00-00', ''),
(27, 14, 12, 'lyndo ', '2015-03-30', 'checkout with invoice'),
(28, 14, 12, '', '0000-00-00', '');

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
