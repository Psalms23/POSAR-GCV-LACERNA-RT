-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 03, 2018 at 07:58 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(50) NOT NULL,
  `branch_address` varchar(100) NOT NULL,
  `branch_contact` varchar(50) NOT NULL,
  `skin` varchar(15) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `branch_address`, `branch_contact`, `skin`) VALUES
(1, 'GCV Copier Supplies and Services', 'General Santos City', '090998278', 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `brandid` int(11) NOT NULL AUTO_INCREMENT,
  `brandn` varchar(50) NOT NULL,
  `brandm` varchar(50) NOT NULL,
  PRIMARY KEY (`brandid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandid`, `brandn`, `brandm`) VALUES
(4, 'Minolta', 'Bizhub'),
(5, 'Canon', 'Fax Phone L190'),
(6, 'cANON', 'Canon Image Class D130');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(21, 'Machine');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(50) NOT NULL,
  `cust_first` varchar(50) NOT NULL,
  `cust_mname` varchar(50) NOT NULL,
  `cust_last` varchar(30) NOT NULL,
  `cust_address` varchar(100) NOT NULL,
  `cust_contact` varchar(30) NOT NULL,
  `contp` varchar(50) NOT NULL,
  `tphone` int(11) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `cust_pic` varchar(300) NOT NULL,
  `bday` date NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `house_status` varchar(30) NOT NULL,
  `years` varchar(20) NOT NULL,
  `rent` varchar(10) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_no` varchar(30) NOT NULL,
  `emp_address` varchar(100) NOT NULL,
  `emp_year` varchar(10) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `salary` varchar(30) NOT NULL,
  `spouse` varchar(30) NOT NULL,
  `spouse_no` varchar(30) NOT NULL,
  `spouse_emp` varchar(50) NOT NULL,
  `spouse_details` varchar(100) NOT NULL,
  `spouse_income` decimal(10,2) NOT NULL,
  `comaker` varchar(30) NOT NULL,
  `comaker_details` varchar(100) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `credit_status` varchar(10) NOT NULL,
  `ci_remarks` varchar(1000) NOT NULL,
  `ci_name` varchar(50) NOT NULL,
  `ci_date` date NOT NULL,
  `payslip` varchar(30) NOT NULL,
  `valid_id` varchar(30) NOT NULL,
  `cert` varchar(30) NOT NULL,
  `cedula` varchar(30) NOT NULL,
  `income` varchar(30) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cname`, `cust_first`, `cust_mname`, `cust_last`, `cust_address`, `cust_contact`, `contp`, `tphone`, `balance`, `cust_pic`, `bday`, `nickname`, `house_status`, `years`, `rent`, `emp_name`, `emp_no`, `emp_address`, `emp_year`, `occupation`, `salary`, `spouse`, `spouse_no`, `spouse_emp`, `spouse_details`, `spouse_income`, `comaker`, `comaker_details`, `branch_id`, `credit_status`, `ci_remarks`, `ci_name`, `ci_date`, `payslip`, `valid_id`, `cert`, `cedula`, `income`) VALUES
(6, 'RMMC', 'Ruel', 'L', 'Cadiz', 'GENERAL SANTOS CITY', '554678', '', 0, '9000.00', 'default.gif', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '', '', 1, '', 'Approved', '', '0000-00-00', '2', '2', '2', '', '2'),
(7, 'RMMC', 'Jim', 'D', 'Jamero', 'GENERAL SANTOS CITY', '6678956', '', 0, '2000.00', 'default.gif', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '', '', 1, '', 'Approved', '', '0000-00-00', '2', '2', '2', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `history_log`
--

CREATE TABLE IF NOT EXISTS `history_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=245 ;

--
-- Dumping data for table `history_log`
--

INSERT INTO `history_log` (`log_id`, `user_id`, `action`, `date`) VALUES
(90, 1, 'has logged in the system at ', '2018-02-21 00:28:47'),
(91, 1, 'has logged in the system at ', '2018-02-21 00:33:49'),
(92, 1, 'has logged in the system at ', '2018-02-24 17:28:09'),
(93, 1, 'has logged in the system at ', '2018-02-24 17:29:36'),
(94, 1, 'has logged in the system at ', '2018-02-25 16:06:35'),
(95, 0, 'has logged in the system at ', '2018-02-25 16:26:18'),
(96, 0, 'has logged in the system at ', '2018-02-25 16:26:22'),
(97, 1, 'has logged in the system at ', '2018-02-25 16:27:05'),
(98, 1, 'has logged in the system at ', '2018-02-25 16:33:23'),
(99, 1, 'has logged in the system at ', '2018-02-25 16:35:06'),
(100, 1, 'has logged in the system at ', '2018-02-25 17:07:20'),
(101, 1, 'has logged in the system at ', '2018-02-25 17:08:04'),
(102, 1, 'has logged in the system at ', '2018-02-25 17:40:25'),
(103, 1, 'has logged in the system at ', '2018-02-25 17:41:38'),
(104, 1, 'has logged in the system at ', '2018-02-25 17:42:07'),
(105, 1, 'added 6 of pan', '2018-02-25 18:40:15'),
(106, 1, 'has logged in the system at ', '2018-02-26 20:28:30'),
(107, 1, 'has logged in the system at ', '2018-02-26 21:41:30'),
(108, 1, 'has logged in the system at ', '2018-02-27 09:09:23'),
(109, 1, 'has logged in the system at ', '2018-02-27 09:09:43'),
(110, 1, 'has logged in the system at ', '2018-02-27 09:10:28'),
(111, 1, 'has logged in the system at ', '2018-02-27 21:49:37'),
(112, 1, 'has logged in the system at ', '2018-02-28 19:54:06'),
(113, 1, 'has logged in the system at ', '2018-03-08 20:22:17'),
(114, 1, 'has logged in the system at ', '2018-03-10 23:03:16'),
(115, 1, 'has logged in the system at ', '2018-03-11 22:56:38'),
(116, 1, 'has logged out the system at ', '2018-03-12 00:27:36'),
(117, 0, 'has logged out the system at ', '2018-03-12 00:27:40'),
(118, 1, 'has logged in the system at ', '2018-03-12 01:53:50'),
(119, 1, 'has logged in the system at ', '2018-03-12 02:01:04'),
(120, 1, 'has logged in the system at ', '2018-03-12 12:03:18'),
(121, 1, 'has logged in the system at ', '2018-03-18 20:54:36'),
(122, 1, 'has logged in the system at ', '2018-03-18 21:56:34'),
(123, 1, 'has logged in the system at ', '2018-03-19 10:50:29'),
(124, 1, 'added a payment of -4.96 for , ', '2018-03-19 00:00:00'),
(125, 1, 'has logged in the system at ', '2018-03-19 14:59:50'),
(126, 1, 'has logged in the system at ', '2018-03-22 09:20:50'),
(127, 1, 'has logged in the system at ', '2018-03-22 17:37:01'),
(128, 1, 'has logged in the system at ', '2018-03-22 20:03:36'),
(129, 1, 'has logged in the system at ', '2018-03-22 20:05:18'),
(130, 1, 'has logged in the system at ', '2018-03-22 21:19:16'),
(131, 1, 'has logged in the system at ', '2018-03-22 21:43:53'),
(132, 1, 'has logged in the system at ', '2018-03-23 09:46:30'),
(133, 1, 'has logged in the system at ', '2018-03-23 13:08:16'),
(134, 1, 'has logged in the system at ', '2018-03-23 21:01:35'),
(135, 1, 'has logged in the system at ', '2018-03-23 21:27:24'),
(136, 1, 'has logged in the system at ', '2018-03-23 23:06:37'),
(137, 1, 'has logged out the system at ', '2018-03-23 23:10:31'),
(138, 1, 'has logged in the system at ', '2018-03-23 23:11:33'),
(139, 1, 'has logged out the system at ', '2018-03-23 23:13:36'),
(140, 1, 'has logged in the system at ', '2018-03-23 23:14:42'),
(141, 1, 'has logged out the system at ', '2018-03-23 23:57:53'),
(142, 1, 'has logged in the system at ', '2018-03-23 23:58:25'),
(143, 1, 'has logged out the system at ', '2018-03-23 23:58:28'),
(144, 0, 'has logged in the system at ', '2018-03-23 23:58:39'),
(145, 0, 'has logged in the system at ', '2018-03-23 23:58:49'),
(146, 1, 'has logged in the system at ', '2018-03-24 00:02:48'),
(147, 1, 'has logged in the system at ', '2018-03-24 00:28:45'),
(148, 1, 'has logged in the system at ', '2018-03-24 00:28:52'),
(149, 1, 'added 10 of Lotion', '2018-03-24 01:05:57'),
(150, 1, 'has logged out the system at ', '2018-03-24 01:24:16'),
(151, 1, 'has logged in the system at ', '2018-03-24 01:24:40'),
(152, 1, 'has logged out the system at ', '2018-03-24 02:09:47'),
(153, 1, 'has logged in the system at ', '2018-03-24 02:12:36'),
(154, 1, 'has logged in the system at ', '2018-03-24 02:26:06'),
(155, 1, 'has logged out the system at ', '2018-03-24 16:51:07'),
(156, 1, 'has logged in the system at ', '2018-03-24 16:57:35'),
(157, 1, 'has logged in the system at ', '2018-03-24 17:23:41'),
(158, 1, 'has logged in the system at ', '2018-03-24 18:26:58'),
(159, 1, 'added 5 of efs', '2018-03-24 18:29:11'),
(160, 1, 'has logged in the system at ', '2018-03-25 04:16:28'),
(161, 1, 'has logged in the system at ', '2018-03-25 05:30:01'),
(162, 0, 'has logged in the system at ', '2018-03-25 06:16:05'),
(163, 0, 'has logged in the system at ', '2018-03-25 06:16:41'),
(164, 0, 'has logged in the system at ', '2018-03-25 06:16:54'),
(165, 1, 'has logged in the system at ', '2018-03-25 06:17:28'),
(166, 1, 'has logged out the system at ', '2018-03-25 06:22:03'),
(167, 0, 'has logged in the system at ', '2018-03-25 06:22:15'),
(168, 1, 'has logged in the system at ', '2018-03-25 06:23:35'),
(169, 4, 'has logged in the system at ', '2018-03-25 06:34:06'),
(170, 4, 'has logged out the system at ', '2018-03-25 06:34:30'),
(171, 4, 'has logged in the system at ', '2018-03-25 06:34:39'),
(172, 4, 'has logged in the system at ', '2018-03-25 06:35:01'),
(173, 4, 'has logged out the system at ', '2018-03-25 06:35:47'),
(174, 1, 'has logged in the system at ', '2018-03-25 06:35:55'),
(175, 1, 'has logged out the system at ', '2018-03-25 06:37:20'),
(176, 1, 'has logged in the system at ', '2018-03-25 06:37:33'),
(177, 1, 'has logged in the system at ', '2018-03-25 06:41:01'),
(178, 1, 'has logged out the system at ', '2018-03-25 06:44:09'),
(179, 4, 'has logged in the system at ', '2018-03-25 06:44:19'),
(180, 4, 'has logged out the system at ', '2018-03-25 06:44:24'),
(181, 1, 'has logged in the system at ', '2018-03-25 06:44:34'),
(182, 1, 'has logged in the system at ', '2018-03-25 07:13:23'),
(183, 1, 'has logged out the system at ', '2018-03-25 07:13:31'),
(184, 4, 'has logged in the system at ', '2018-03-25 07:13:41'),
(185, 4, 'has logged out the system at ', '2018-03-25 07:13:44'),
(186, 1, 'has logged in the system at ', '2018-03-25 07:13:55'),
(187, 4, 'has logged in the system at ', '2018-03-25 08:10:59'),
(188, 4, 'has logged out the system at ', '2018-03-25 08:16:25'),
(189, 1, 'has logged in the system at ', '2018-03-25 08:16:33'),
(190, 1, 'has logged in the system at ', '2018-03-25 08:29:15'),
(191, 1, 'has logged in the system at ', '2018-03-25 08:41:21'),
(192, 1, 'added 5 of ', '2018-03-25 09:07:29'),
(193, 1, 'added 5 of ', '2018-03-25 09:08:16'),
(194, 1, 'added 5 of 1', '2018-03-25 09:12:46'),
(195, 1, 'added 5 of 1', '2018-03-25 09:17:48'),
(196, 1, 'added 5 of 1', '2018-03-25 09:18:22'),
(197, 1, 'added 5 of 1', '2018-03-25 09:23:18'),
(198, 1, 'added 5 of ', '2018-03-25 09:30:15'),
(199, 1, 'has logged in the system at ', '2018-03-25 09:38:32'),
(200, 1, 'added 5 of ', '2018-03-25 09:47:05'),
(201, 1, 'added 5 of ', '2018-03-25 09:48:24'),
(202, 1, 'added 5 of ', '2018-03-25 12:01:01'),
(203, 1, 'has logged out the system at ', '2018-03-25 14:51:20'),
(204, 1, 'has logged in the system at ', '2018-03-25 17:24:03'),
(205, 1, 'has logged out the system at ', '2018-03-25 18:02:33'),
(206, 1, 'has logged in the system at ', '2018-03-25 18:32:45'),
(207, 1, 'has logged in the system at ', '2018-03-25 18:48:55'),
(208, 1, 'added 5 of ', '2018-03-25 18:54:32'),
(209, 1, 'added 5 of ', '2018-03-25 18:55:17'),
(210, 1, 'added 5 of ', '2018-03-25 19:01:56'),
(211, 1, 'added 5 of ', '2018-03-25 19:02:38'),
(212, 1, 'added 15 of ', '2018-03-25 19:37:29'),
(213, 1, 'added 15 of ', '2018-03-25 19:38:37'),
(214, 1, 'added 15 of ', '2018-03-25 19:39:47'),
(215, 1, 'added 15 of ', '2018-03-25 19:42:40'),
(216, 1, 'has logged out the system at ', '2018-03-25 19:46:08'),
(217, 1, 'has logged in the system at ', '2018-03-25 19:56:22'),
(218, 1, 'added 5 of ', '2018-03-25 19:58:21'),
(219, 1, 'has logged out the system at ', '2018-03-25 20:00:35'),
(220, 1, 'has logged in the system at ', '2018-03-25 20:02:24'),
(221, 1, 'has logged out the system at ', '2018-03-25 20:23:43'),
(222, 1, 'has logged in the system at ', '2018-03-25 20:26:08'),
(223, 1, 'added 15 of ', '2018-03-25 20:28:59'),
(224, 1, 'has logged out the system at ', '2018-03-25 20:32:11'),
(225, 1, 'has logged in the system at ', '2018-03-25 20:55:08'),
(226, 1, 'has logged out the system at ', '2018-03-25 20:55:15'),
(227, 1, 'has logged in the system at ', '2018-03-25 20:55:47'),
(228, 1, 'added 5 of ', '2018-03-25 21:25:34'),
(229, 1, 'added 5 of ', '2018-03-25 21:30:05'),
(230, 1, 'added a payment of 0.019999999945867 for , ', '2018-03-25 00:00:00'),
(231, 1, 'added 10 of ', '2018-03-25 21:59:58'),
(232, 1, 'added a payment of -10900 for , ', '2018-03-25 00:00:00'),
(233, 1, 'added a payment of -15000 for , ', '2018-03-25 00:00:00'),
(234, 1, 'added a payment of -15300 for , ', '2018-03-25 00:00:00'),
(235, 1, 'has logged in the system at ', '2018-03-25 22:11:21'),
(236, 1, 'added a payment of -15500 for , ', '2018-03-25 00:00:00'),
(237, 1, 'added a payment of -1750 for , ', '2018-03-25 00:00:00'),
(238, 1, 'added a payment of -461 for , ', '2018-03-25 00:00:00'),
(239, 1, 'added a payment of -2439 for , ', '2018-03-25 00:00:00'),
(240, 1, 'has logged in the system at ', '2018-03-25 22:33:16'),
(241, 1, 'has logged out the system at ', '2018-03-26 02:42:45'),
(242, 1, 'has logged in the system at ', '2018-04-03 20:36:43'),
(243, 1, 'has logged in the system at ', '2018-06-07 15:35:24'),
(244, 1, 'has logged in the system at ', '2018-07-03 15:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `payment_for` date NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `interest` decimal(10,2) NOT NULL,
  `remaining` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `rebate` decimal(10,2) NOT NULL,
  `or_no` int(11) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `cust_id`, `sales_id`, `payment`, `payment_date`, `user_id`, `branch_id`, `payment_for`, `due`, `interest`, `remaining`, `status`, `rebate`, `or_no`) VALUES
(39, 6, 9, '56649.83', '2018-03-25 21:46:15', 1, 1, '2018-04-25', '56649.83', '0.00', '0.00', 'paid', '0.00', 0),
(40, 6, 9, '56649.83', '2018-03-25 21:46:15', 1, 1, '2018-05-25', '56649.83', '0.00', '0.00', 'paid', '0.00', 0),
(41, 6, 9, '56649.83', '2018-03-25 21:46:15', 1, 1, '2018-06-25', '56649.83', '0.00', '0.00', 'paid', '0.00', 0),
(42, 6, 9, '56649.83', '2018-03-25 21:46:15', 1, 1, '2018-07-25', '56649.83', '0.00', '0.00', 'paid', '0.00', 0),
(43, 6, 9, '56649.83', '2018-03-25 21:46:15', 1, 1, '2018-08-25', '56649.83', '0.00', '0.00', 'paid', '0.00', 0),
(44, 6, 9, '56649.83', '2018-03-25 21:46:15', 1, 1, '2018-09-25', '56649.83', '0.00', '0.00', 'paid', '0.00', 0),
(45, 6, 9, '1.00', '2018-03-25 00:00:00', 1, 1, '2018-03-25', '1.00', '0.00', '0.00', 'paid', '0.00', 3151),
(46, 6, 10, '400.00', '2018-03-25 22:18:08', 1, 1, '2018-04-25', '15900.00', '270.00', '9540.00', 'partially paid', '0.00', 0),
(47, 6, 10, '15000.00', '2018-03-25 00:00:00', 1, 1, '2018-03-25', '15000.00', '0.00', '0.00', 'paid', '0.00', 3152),
(48, 7, 11, '2650.00', '2018-03-25 22:21:34', 1, 1, '2018-04-25', '2650.00', '0.00', '0.00', 'paid', '0.00', 0),
(49, 7, 11, '2650.00', '2018-03-25 22:21:34', 1, 1, '2018-05-25', '2650.00', '0.00', '0.00', 'paid', '0.00', 0),
(50, 7, 11, '2650.00', '2018-03-25 22:21:34', 1, 1, '2018-06-25', '2650.00', '0.00', '0.00', 'paid', '0.00', 0),
(51, 7, 11, '2650.00', '2018-03-25 22:21:34', 1, 1, '2018-07-25', '2650.00', '0.00', '0.00', 'paid', '0.00', 0),
(52, 7, 11, '211.00', '2018-03-25 22:22:17', 1, 1, '2018-08-25', '2650.00', '0.00', '250.00', 'partially paid', '0.00', 0),
(53, 7, 11, '0.00', '0000-00-00 00:00:00', 1, 1, '2018-09-25', '2650.00', '0.00', '2650.00', '', '0.00', 0),
(54, 7, 11, '15000.00', '2018-03-25 00:00:00', 1, 1, '2018-03-25', '15000.00', '0.00', '0.00', 'paid', '0.00', 3153),
(55, 6, 12, '21060000.00', '2018-03-25 22:37:18', 1, 1, '2018-03-25', '21060000.00', '0.00', '0.00', 'paid', '0.00', 1901);

-- --------------------------------------------------------

--
-- Table structure for table `prejoborder`
--

CREATE TABLE IF NOT EXISTS `prejoborder` (
  `prejob_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `cust_first` varchar(50) NOT NULL,
  `cust_last` varchar(50) NOT NULL,
  `cust_address` varchar(100) NOT NULL,
  `cust_contact` varchar(50) NOT NULL,
  `jobdesc` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `sched` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prod_brand` varchar(50) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `prod_model` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prejoborder`
--


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(100) NOT NULL,
  `prod_price` decimal(10,2) NOT NULL,
  `prod_desc` varchar(500) NOT NULL,
  `prod_pic` varchar(300) NOT NULL,
  `brandid` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcatid` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `reorder` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `serial` varchar(50) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_price`, `prod_desc`, `prod_pic`, `brandid`, `cat_id`, `subcatid`, `prod_qty`, `branch_id`, `reorder`, `supplier_id`, `serial`) VALUES
(6, 'Konica', '30000.00', 'Multifunction Laser', 'default.gif', 5, 21, 0, -20, 1, 5, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_request`
--

CREATE TABLE IF NOT EXISTS `purchase_request` (
  `pr_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `qtypr` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `branch_id` int(11) NOT NULL,
  `purchase_status` varchar(10) NOT NULL,
  PRIMARY KEY (`pr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `purchase_request`
--

INSERT INTO `purchase_request` (`pr_id`, `prod_id`, `qtypr`, `request_date`, `branch_id`, `purchase_status`) VALUES
(9, 6, 5, '2018-03-25', 1, 'Received'),
(10, 6, 10, '2018-03-25', 1, 'Received'),
(11, 6, 20, '2018-06-07', 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cash_tendered` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `amount_due` decimal(10,2) NOT NULL,
  `cash_change` decimal(10,2) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `modeofpayment` varchar(15) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `cust_id`, `user_id`, `cash_tendered`, `discount`, `amount_due`, `cash_change`, `date_added`, `modeofpayment`, `branch_id`, `total`) VALUES
(9, 6, 1, NULL, NULL, '0.00', NULL, '2018-03-25 21:37:00', 'credit', 1, '330.00'),
(10, 6, 1, NULL, NULL, '0.00', NULL, '2018-03-25 22:00:24', 'credit', 1, '30.00'),
(11, 7, 1, NULL, NULL, '0.00', NULL, '2018-03-25 22:19:47', 'credit', 1, '30.00'),
(12, 6, 1, '99999999.99', '0.00', '21060000.00', '99999999.99', '2018-03-25 22:37:18', 'cash', 1, '21060000.00');

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE IF NOT EXISTS `sales_details` (
  `sales_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`sales_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`sales_details_id`, `sales_id`, `prod_id`, `price`, `qty`) VALUES
(8, 9, 6, '30000.00', 11),
(9, 10, 6, '30000.00', 1),
(10, 11, 6, '30000.00', 1),
(11, 12, 6, '780000.00', 27);

-- --------------------------------------------------------

--
-- Table structure for table `stockin`
--

CREATE TABLE IF NOT EXISTS `stockin` (
  `stockin_id` int(11) NOT NULL AUTO_INCREMENT,
  `dr` varchar(50) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(6) NOT NULL,
  `date` datetime NOT NULL,
  `branch_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`stockin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `stockin`
--

INSERT INTO `stockin` (`stockin_id`, `dr`, `prod_id`, `qty`, `date`, `branch_id`, `status`) VALUES
(19, '1098H', 9, 5, '2018-03-25 21:25:34', 1, 'Complete'),
(20, '133', 9, 5, '2018-03-25 21:30:05', 1, 'Complete'),
(21, 'DSFSFSD', 10, 10, '2018-03-25 21:59:58', 1, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `subcatid` int(11) NOT NULL,
  `subcat_name` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--


-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_address` varchar(300) NOT NULL,
  `supplier_contact` varchar(50) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `supplier`
--


-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE IF NOT EXISTS `technician` (
  `techid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `cno` int(11) NOT NULL,
  PRIMARY KEY (`techid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `technician`
--


-- --------------------------------------------------------

--
-- Table structure for table `temp_trans`
--

CREATE TABLE IF NOT EXISTS `temp_trans` (
  `temp_trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`temp_trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `temp_trans`
--


-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE IF NOT EXISTS `term` (
  `term_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) DEFAULT NULL,
  `payable_for` varchar(10) NOT NULL,
  `term` varchar(11) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `payment_start` date NOT NULL,
  `down` decimal(10,2) NOT NULL,
  `due_date` date NOT NULL,
  `interest` decimal(10,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`term_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`term_id`, `sales_id`, `payable_for`, `term`, `due`, `payment_start`, `down`, `due_date`, `interest`, `status`) VALUES
(19, 9, '6', 'monthly', '56649.83', '2018-03-25', '1.00', '2018-09-25', '9900.00', 'paid'),
(20, 10, '1', 'monthly', '15900.00', '2018-03-25', '15000.00', '2018-04-25', '900.00', ''),
(21, 11, '6', 'monthly', '2650.00', '2018-03-25', '15000.00', '2018-09-25', '900.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `cno` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `position`, `name`, `lname`, `cno`, `status`, `branch_id`) VALUES
(1, 'admin', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', '', 'Melissa', '', '', 'active', 1),
(2, 'administrator', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', '', 'Melissa Lacerna', '', '', 'active', 0);
