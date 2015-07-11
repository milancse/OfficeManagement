-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2015 at 12:13 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smart_time_keeper`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE IF NOT EXISTS `attendances` (
`id` bigint(20) unsigned NOT NULL,
  `in_time` timestamp NULL DEFAULT NULL,
  `out_time` timestamp NULL DEFAULT NULL,
  `employee_id` bigint(20) unsigned DEFAULT NULL,
  `office_time_id` bigint(20) unsigned DEFAULT NULL,
  `network_ip` text,
  `comments` varchar(255) DEFAULT NULL,
  `admin_comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(220) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `in_time`, `out_time`, `employee_id`, `office_time_id`, `network_ip`, `comments`, `admin_comments`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '2015-05-09 10:07:33', '2015-05-09 10:11:26', 20, 9, '192.168.1.146', 'First punch out', NULL, '2015-05-09 10:07:33', '2015-05-09 10:11:26', NULL, NULL),
(2, '2015-05-09 11:44:05', '2015-05-09 11:44:35', 22, 9, '192.168.1.110', NULL, NULL, '2015-05-09 11:44:05', '2015-05-09 11:44:35', NULL, NULL),
(3, '2015-05-09 12:27:28', '2015-05-19 11:23:09', 19, 9, '192.168.1.146', 'Hello', NULL, '2015-05-09 12:27:28', '2015-05-19 11:23:09', NULL, NULL),
(4, '2015-05-09 12:33:06', NULL, 23, 8, '192.168.1.146', 'This is first punch in', NULL, '2015-05-09 12:33:06', '2015-05-09 12:33:06', NULL, NULL),
(5, '2015-05-10 09:18:14', '2015-05-10 09:18:34', 23, 9, '192.168.1.146', 'Punch out', NULL, '2015-05-10 09:18:14', '2015-05-10 09:18:34', NULL, NULL),
(6, '2015-05-10 10:24:46', '2015-05-20 08:55:23', 19, 9, '192.168.1.146', '', NULL, '2015-05-10 10:24:46', '2015-05-20 08:55:23', NULL, NULL),
(7, '2015-05-12 07:00:01', '2015-05-12 08:55:55', 19, 9, '192.168.1.146', NULL, NULL, '2015-05-12 07:00:01', '2015-05-12 08:55:55', NULL, NULL),
(8, '2015-05-12 09:02:25', NULL, 22, 9, '192.168.1.110', NULL, NULL, '2015-05-12 09:02:25', '2015-05-12 09:02:25', NULL, NULL),
(9, '2015-05-13 09:21:33', NULL, 22, 9, '192.168.1.110', NULL, NULL, '2015-05-13 09:21:33', '2015-05-13 09:21:33', NULL, NULL),
(10, '2015-05-14 06:10:33', '2015-05-14 09:42:46', 19, 9, '192.168.1.146', NULL, NULL, '2015-05-14 06:10:33', '2015-05-14 09:42:46', NULL, NULL),
(11, '2015-05-14 06:28:02', NULL, 22, 9, '192.168.1.110', NULL, NULL, '2015-05-14 06:28:02', '2015-05-14 06:28:02', NULL, NULL),
(12, '2015-05-19 11:23:00', NULL, 19, 9, '192.168.1.147', NULL, NULL, '2015-05-19 11:23:00', '2015-05-19 11:23:00', NULL, NULL),
(13, '2015-05-20 12:25:14', NULL, 22, 9, '192.168.1.110', NULL, NULL, '2015-05-20 12:25:14', '2015-05-20 12:25:14', NULL, NULL),
(14, '2015-06-08 12:16:11', NULL, 19, 9, '192.168.1.147', 'Punch in for today', NULL, '2015-06-08 12:16:12', '2015-06-08 12:16:12', NULL, NULL),
(15, '2015-06-09 12:20:41', NULL, 22, 9, '192.168.1.110', NULL, NULL, '2015-06-09 12:20:41', '2015-06-09 12:20:41', NULL, NULL),
(16, '2015-06-10 11:30:43', NULL, 22, 9, '192.168.1.110', NULL, NULL, '2015-06-10 11:30:43', '2015-06-10 11:30:43', NULL, NULL),
(17, '2015-06-22 04:00:00', NULL, 19, 8, '::1', NULL, NULL, '2015-06-22 06:54:45', '2015-06-22 06:54:45', NULL, NULL),
(18, '2015-07-06 03:00:00', '2015-07-06 08:19:13', 19, 9, '::1', '', NULL, '2015-07-06 08:18:58', '2015-07-06 08:19:13', NULL, NULL),
(19, '2015-07-07 04:37:03', NULL, 19, 9, '::1', NULL, NULL, '2015-07-07 04:37:03', '2015-07-07 04:37:03', NULL, NULL),
(20, '2015-07-08 09:06:53', NULL, 19, 8, '::1', NULL, NULL, '2015-07-08 09:06:53', '2015-07-08 09:06:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
`id` bigint(20) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `office_time_zone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `office_start_time` time DEFAULT NULL,
  `office_end_time` time DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `mobile` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `fax` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `web` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `logo` varchar(20) DEFAULT NULL,
  `slogan` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `title`, `office_time_zone`, `office_start_time`, `office_end_time`, `address`, `phone`, `mobile`, `email`, `fax`, `web`, `active`, `logo`, `slogan`, `created_at`, `updated_at`) VALUES
(1, 'Nabisco', 'america/dawson', '05:00:00', '05:00:00', 'Dhaka', '01722619096', '01949784110', 'nabisco@gmail.com', '017854125', 'nabisco.com', 1, '', '', '2015-04-30 05:02:54', '2015-07-09 05:49:23'),
(10, 'PranRfl', 'america/st_johns', '06:00:00', '08:00:00', 'Norsingdi', '01722659874', '01949784110', 'pranrfl@gmail.com', '017854125', 'pranrfl.com', 1, '', '', '2015-04-30 05:19:06', '2015-05-03 04:45:50'),
(11, 'Al-Amin', 'america/yakutat', '08:15:00', '08:15:00', 'Noakhali', '01723695251', '01748596325', 'admin@gmail.com', '01748596', 'al-amin.com', 1, '', 'So good', '2015-04-30 08:13:12', '2015-07-05 05:03:10'),
(12, 'Nestle', 'america/yakutat', '02:15:00', '02:15:00', 'Dhaka', '017458965241', '01748596325', 'nestle@gmail.com', '0147852', 'nestle.com', 1, '', '', '2015-05-02 02:25:17', '2015-05-19 11:23:39'),
(15, 'Danish', 'america/yakutat', '02:30:00', '03:30:00', 'Dhaka', '9195784163', '017452968475', 'danish@gmail.com', '0147852', 'danish.com', 1, '', '', '2015-05-02 02:34:51', '2015-05-03 04:53:20'),
(16, 'Square', 'america/adak', '09:00:00', '05:00:00', 'Dhaka', '017854125', '0147859625', 'square@yahoo.com', '687646', 'square.com', 1, '150503111146.jpeg', '', '2015-05-03 05:08:39', '2015-05-03 05:11:46'),
(17, 'Opsonin', 'america/st_johns', '10:00:00', '07:00:00', 'Narayangonj,Bangladesh', '0978415263', '01722547896', 'opsonin@gmail.com', '', 'opsonin.com', 1, '150503010931.jpeg', '', '2015-05-03 07:09:31', '2015-05-03 07:09:56'),
(18, 'Test Factory', 'america/atikokan', '07:15:00', '07:15:00', '', '', '01713123956', 'employee@gmail.com', '6876465', '', 1, '', '', '2015-05-03 07:16:47', '2015-07-09 05:49:00'),
(19, 'Orion', 'america/yakutat', '09:45:00', '05:45:00', 'Dhaka', '017859654', '01711478596', 'orion@gmail.com', '7485962', 'orion.com.bd', 1, '', '', '2015-05-05 01:40:05', '2015-05-05 01:46:05'),
(20, 'Maks', 'america/adak', '08:00:00', '08:00:00', 'Dhaka', '3876343431', '0172548596', 'marks@gmail.com', '53645', 'marks.com', 1, '', '', '2015-05-05 08:00:52', '2015-07-09 05:48:52'),
(21, 'Apollo', 'america/adak', '08:15:00', '08:15:00', 'Dhaka', '91748596', '017134528796', 'apollo@gmail.com', '3687434531', 'apollo.com', 1, '', '', '2015-05-05 08:07:53', '2015-07-09 05:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `depertments`
--

CREATE TABLE IF NOT EXISTS `depertments` (
`id` bigint(20) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `details` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `company_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depertments`
--

INSERT INTO `depertments` (`id`, `title`, `details`, `company_id`, `created_at`, `updated_at`) VALUES
(1, 'HR Department', NULL, 1, '2015-05-02 10:56:56', NULL),
(2, 'Account Department', NULL, 1, '2015-05-02 10:56:56', NULL),
(3, 'Management Department', NULL, 1, '2015-05-02 11:06:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE IF NOT EXISTS `designations` (
`id` bigint(20) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'General Manegar', '2015-05-03 10:21:45', NULL),
(2, 'HR Manager', '2015-05-03 10:21:45', NULL),
(3, 'Area Manager', '2015-05-05 07:43:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
`id` bigint(20) unsigned NOT NULL,
  `company_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `employee_identifier` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `national_id` varchar(50) DEFAULT NULL,
  `present_address` text,
  `permanent_address` text,
  `joining_date` timestamp NULL DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `designation_id` bigint(20) DEFAULT NULL,
  `dob` timestamp NULL DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `company_id`, `user_id`, `employee_identifier`, `first_name`, `last_name`, `email`, `phone`, `national_id`, `present_address`, `permanent_address`, `joining_date`, `department_id`, `designation_id`, `dob`, `gender`, `photo`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(14, 12, 15, '102', 'Abul', 'Kashem', NULL, '01722619096', '19917859641', 'Dhaka', 'Rajshahi', '2015-05-02 18:00:00', 1, 3, '2015-05-04 18:00:00', 'male', '', 0, '2015-05-05 05:40:45', NULL, '2015-05-05 07:52:21'),
(17, 15, 18, '120', 'Ashik ', 'Nehal', '', '01710325478', '6946464645646', 'Dhaka', 'Rajshahi', '2015-05-03 18:00:00', 2, 1, '2015-04-29 18:00:00', 'male', '150506081242.jpeg', 0, '2015-05-05 08:11:51', NULL, '2015-05-06 02:23:45'),
(18, 1, 19, '110_ab', 'Aftab', 'Ahmed', NULL, NULL, NULL, NULL, NULL, '2015-05-03 18:00:00', 1, 3, NULL, NULL, NULL, 0, '2015-05-06 02:36:35', NULL, '2015-05-06 02:36:35'),
(19, 11, 20, '107', 'Nurnabi', 'Milan', 'milan31@gmail.com', '01710256341', '1991789746132', '', '', '2015-05-02 18:00:00', 2, 1, '1991-08-08 18:00:00', 'male', '150709122347.jpeg', 0, '2015-05-07 06:09:12', NULL, '2015-07-09 06:23:47'),
(21, 11, 22, '123654', 'Aslam', 'Babu', NULL, NULL, NULL, NULL, NULL, '2015-05-07 18:00:00', 2, 1, NULL, NULL, NULL, 0, '2015-05-09 04:03:52', NULL, '2015-05-09 04:03:52'),
(22, 11, 23, '2014-011-01', 'Mizanur', 'Rahman', NULL, NULL, NULL, NULL, NULL, '2015-04-30 18:00:00', 2, 1, NULL, NULL, NULL, 0, '2015-05-09 04:39:34', NULL, '2015-05-09 04:39:34'),
(23, 11, 24, '123456', 'Nurnabi', 'Milan', 'milan@yahoo.com', '0174859632', '9879896454', '', '', '2015-05-03 18:00:00', 2, 1, '0000-00-00 00:00:00', 'male', NULL, 0, '2015-05-09 06:28:15', NULL, '2015-05-19 11:23:19'),
(24, 15, 25, 'ripon', 'Nuruzzaman', 'Ripon', 'abc@gmail.com', '786578677', '8968968+68/+', '', '', '2015-06-10 18:00:00', 1, 2, '0000-00-00 00:00:00', 'male', NULL, 0, '2015-06-18 09:39:55', NULL, '2015-06-18 10:26:48'),
(25, 15, 26, 'ataur', 'Ataur', '', NULL, NULL, NULL, NULL, NULL, '2015-06-11 18:00:00', 2, 1, NULL, NULL, NULL, 0, '2015-06-18 09:53:45', NULL, '2015-06-18 09:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
`id` bigint(20) unsigned NOT NULL,
  `company_id` bigint(20) unsigned NOT NULL,
  `transaction_head_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `transaction_done_by` bigint(20) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comment` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE IF NOT EXISTS `holidays` (
`id` int(11) NOT NULL,
  `holiday_name` varchar(256) NOT NULL,
  `holiday_total` varchar(256) NOT NULL,
  `holiday_start_date` datetime NOT NULL,
  `holiday_end_date` datetime NOT NULL,
  `holiday_year` varchar(256) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `holiday_name`, `holiday_total`, `holiday_start_date`, `holiday_end_date`, `holiday_year`, `status`, `company_id`) VALUES
(2, 'Occasional', '3', '2015-05-28 00:00:00', '2015-05-30 00:00:00', '2015', 1, 11),
(3, 'Public holiday', '3', '2015-06-17 00:00:00', '2015-06-19 00:00:00', '2015', 1, 11),
(4, 'Aziz vai er birth day', '1', '2015-06-03 00:00:00', '2015-06-03 00:00:00', '2015', 1, 11),
(5, 'Official Holiday', '3', '2015-06-28 00:00:00', '2015-06-30 00:00:00', '2015', 1, 11),
(6, 'Occasional', '7', '2015-06-11 00:00:00', '2015-06-17 00:00:00', '2015', 1, 11),
(7, 'For office shift to another place', '3', '2015-06-22 00:00:00', '2015-06-24 00:00:00', '2015', 1, 11),
(8, 'dsfgsd', '2', '2015-06-25 00:00:00', '2015-06-26 00:00:00', '2015', 1, 11),
(9, 'causal leave', '5', '2015-06-11 00:00:00', '2015-06-15 00:00:00', '2015', 1, 15),
(10, 'Public holiday', '1', '2015-07-05 00:00:00', '2015-07-05 00:00:00', '2015', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
`image_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `image_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE IF NOT EXISTS `incomes` (
`id` bigint(20) unsigned NOT NULL,
  `company_id` bigint(20) unsigned NOT NULL,
  `transaction_head_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` bigint(20) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE IF NOT EXISTS `leaves` (
`id` bigint(20) NOT NULL,
  `leave_application_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `leave_type_id` bigint(20) NOT NULL,
  `leave_start_date` datetime NOT NULL,
  `leave_end_date` datetime NOT NULL,
  `leave_days_count` varchar(256) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `approval` tinyint(1) NOT NULL,
  `read_unread` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `leave_application_date`, `leave_type_id`, `leave_start_date`, `leave_end_date`, `leave_days_count`, `description`, `approval`, `read_unread`, `user_id`) VALUES
(1, '2015-05-18 14:08:18', 0, '2015-05-07 00:00:00', '2015-05-22 00:00:00', '16', 'Illness', 0, 1, 20),
(2, '2015-05-19 09:37:39', 0, '2015-05-24 00:00:00', '2015-05-28 00:00:00', '5', 'my grandfather is very sick so i need to go home.', 0, 1, 20),
(3, '2015-06-18 09:59:01', 0, '2015-06-20 00:00:00', '2015-06-23 00:00:00', '4', '<p>Due to my sudden illness i could&#39;nt attend office above mentioned date.</p>\r\n', 0, 1, 26),
(4, '2015-07-09 05:35:50', 0, '2015-07-15 00:00:00', '2015-07-22 00:00:00', '8', '<p>For Eid-ul Fitr</p>\r\n', 0, 1, 20),
(5, '2015-07-09 05:40:26', 0, '2015-07-02 00:00:00', '2015-07-08 00:00:00', '7', '<p>For sickness</p>\r\n', 0, 0, 20),
(6, '2015-07-09 05:40:42', 0, '2015-07-16 00:00:00', '2015-07-19 00:00:00', '4', '<p>Casual Leave</p>\r\n', 0, 0, 20),
(7, '2015-07-09 05:40:56', 0, '2015-07-18 00:00:00', '2015-07-23 00:00:00', '6', '<p>Eid-ul Fitr</p>\r\n', 0, 0, 20),
(8, '2015-07-09 05:41:15', 0, '2015-07-28 00:00:00', '2015-07-31 00:00:00', '4', '<p>Personal leave</p>\r\n', 0, 0, 20);

-- --------------------------------------------------------

--
-- Table structure for table `leavetype`
--

CREATE TABLE IF NOT EXISTS `leavetype` (
`leave_type_id` int(11) NOT NULL,
  `leavetype` varchar(256) NOT NULL,
  `leave_description` varchar(500) NOT NULL,
  `paid_unpaid` varchar(256) NOT NULL,
  `total_leave` varchar(256) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_04_30_073236_create_nerds_table', 1),
('2015_04_30_073608_create_employees_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
`module_id` int(11) NOT NULL,
  `module_text` varchar(256) NOT NULL,
  `modult_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nerds`
--

CREATE TABLE IF NOT EXISTS `nerds` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nerd_level` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nerds`
--

INSERT INTO `nerds` (`id`, `name`, `email`, `nerd_level`, `created_at`, `updated_at`) VALUES
(1, 'Mizanur Rahman', 'mizanur.rahman@smartwebsource.com', 3, '2015-04-30 02:26:35', '2015-04-30 02:30:11'),
(2, 'Fardin Rahman', 'fardin@gmail.com', 2, '2015-04-30 02:27:07', '2015-04-30 02:27:07'),
(4, 'MyWiFi_IGram', 'admin@admin.com', 1, '2015-04-30 07:33:22', '2015-04-30 08:06:02'),
(5, 'MyWiFi_IGram', 'naoshad4k@gmail.com', 3, '2015-04-30 07:48:05', '2015-04-30 08:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
`notice_id` int(11) NOT NULL,
  `notice_content` varchar(256) NOT NULL,
  `notice_sender` int(11) NOT NULL,
  `notice_receiver` int(11) NOT NULL,
  `notice_creation_date` datetime NOT NULL,
  `notice_status` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `office_times`
--

CREATE TABLE IF NOT EXISTS `office_times` (
`id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `depertment_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `office_intime` time DEFAULT NULL,
  `office_outtime` time NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `office_times`
--

INSERT INTO `office_times` (`id`, `company_id`, `depertment_id`, `title`, `office_intime`, `office_outtime`, `status`, `created_at`, `created_by`) VALUES
(8, 11, 2, 'Office time for winter', '09:00:00', '17:00:00', 0, '2015-07-06 07:57:46', 20),
(9, 11, 2, 'Office time for summer', '10:00:00', '19:00:00', 0, '2015-07-06 08:14:04', 20),
(10, 11, 2, 'Office time for ramadan', '09:00:00', '16:00:00', 1, '2015-07-07 06:27:22', 20);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
`options_id` int(11) NOT NULL,
  `options_name` varchar(256) NOT NULL,
  `options_value` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(50) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
`permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `public_holidays`
--

CREATE TABLE IF NOT EXISTS `public_holidays` (
`id` bigint(20) unsigned NOT NULL,
  `company_id` bigint(20) unsigned DEFAULT NULL,
  `holiday` timestamp NULL DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `public_holidays`
--

INSERT INTO `public_holidays` (`id`, `company_id`, `holiday`, `reason`, `status`, `created_by`) VALUES
(1, 11, '2015-01-04 18:00:00', 'Eid Milad un-Nabi', 1, 0),
(2, 11, '2015-02-21 18:00:00', 'Shahid Dibash (Language Martyrs'' Day)', 1, 0),
(3, 11, '2015-03-17 17:00:00', 'Bangabandhu Birthday', 1, 0),
(4, 11, '2015-03-26 17:00:00', 'Independence Day', 1, 0),
(5, 11, '2015-04-13 17:00:00', 'Bangla New Year''s Day', 1, 0),
(6, 11, '2015-05-01 17:00:00', 'May Day', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` bigint(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'employee', '2015-05-03 13:27:25', NULL),
(2, 'admin', '2015-05-03 13:27:25', NULL),
(3, 'superadmin', '2015-05-03 13:52:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_heads`
--

CREATE TABLE IF NOT EXISTS `transaction_heads` (
`id` bigint(20) unsigned NOT NULL,
  `company_id` bigint(20) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `head_type` varchar(100) NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` bigint(20) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_heads`
--

INSERT INTO `transaction_heads` (`id`, `company_id`, `title`, `head_type`, `details`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 11, 'abc', 'income', 'Income details', '2015-07-09 09:16:54', 20, '2015-07-09 09:04:15', NULL),
(2, 11, 'abc', 'expense', 'Expense details', '2015-07-09 09:17:01', 20, '2015-07-09 09:08:46', NULL),
(4, 11, 'def', 'income', '', '2015-07-09 09:37:31', 20, '2015-07-09 09:37:31', NULL),
(5, 11, 'def', 'expense', 'Expense Details', '2015-07-09 09:41:48', 20, '2015-07-09 09:41:48', NULL),
(6, 11, 'asd', 'expense', 'Expense Details', '2015-07-09 09:42:37', 20, '2015-07-09 09:42:37', NULL),
(7, 11, 'asdf', 'expense', 'Expense Details', '2015-07-09 09:42:59', 20, '2015-07-09 09:42:59', NULL),
(8, 11, 'asdfg', 'expense', 'asf', '2015-07-09 09:44:04', 20, '2015-07-09 09:44:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `active` int(1) NOT NULL,
  `lastlogin` timestamp NULL DEFAULT NULL,
  `remember_token` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_id`, `role_id`, `email`, `password`, `active`, `lastlogin`, `remember_token`, `created_at`, `updated_at`) VALUES
(15, 11, 2, 'kalam@gmail.com', '$2y$10$bm4HCQw5LJy78y3GLbcdoe9IOsDVgqgW6s1QIvwjn76ZRebrbyyOW', 1, '2015-05-09 02:50:52', 'Ll4ZF2AYQoopc01iDyBRNx1n0TIXerOtwuI39jCqIbrs0YNifML5lx4vvSpX', '2015-05-05 05:40:45', '2015-05-09 02:53:36'),
(18, 11, 1, 'employee@gmail.com', '$2y$10$fv2kPgPjlhL.KqekQMaYFu1Sxj5vVNfqZV8tAv2oUmHVOkjPW24VG', 1, '2015-05-06 02:35:35', 'IwOAdclfuBGpsRt42qVyt5aIeiDjxZu6UGsiD6gpx72TrabLzXTd3VmaBnVf', '2015-05-05 08:11:51', '2015-05-06 02:35:35'),
(19, 12, 1, 'aftab@gmail.com', '$2y$10$Z9Q5t4AKPtD9BirUqJK.su9HhI8QD.Ms3XAiqjd4otlFRVqUlnRPG', 1, NULL, NULL, '2015-05-06 02:36:35', '2015-05-06 02:36:35'),
(20, 11, 3, 'milan31cse@gmail.com', '$2y$10$JB1jYhxMeDg8VyCnn0rE5eFQchMglJnH61sZA3DFi2SZPxlhALSfO', 1, '2015-07-09 05:36:19', 'oei0ZIXrCIVoRfYqqGm2TDVLr9RZyzeCbgeMpAQQtoHyJxUzGjluq1E70XGy', '2015-05-07 06:09:12', '2015-07-09 05:36:19'),
(22, 11, 1, 'aslam@gmail.com', '$2y$10$fLnAStuASfMT/W1QupGSdu547Xbf.N/J3FQaG4Bn5QGQ4O3JiTEBq', 1, NULL, NULL, '2015-05-09 04:03:52', '2015-05-09 04:03:52'),
(23, 11, 3, 'mizanur.rahman@smartwebsource.com', '$2y$10$rDW1afAIHM3xmZfg.pfwWuyLKZqPFkzShgmwIttOomahayUkmrSvK', 1, '2015-06-15 12:17:48', 'OH7MptdowMdMIv181l6aITVFeAyLDYz4aQuu6z3apCir1JKIgHeyf5wmLpDW', '2015-05-09 04:39:34', '2015-06-15 12:17:48'),
(24, 11, 1, 'nurnabi.milan.31@gmail.com', '$2y$10$kaRDKn572Nee4o2P2Oy9NOP.E81LXzICoBrqxpSwctrUXdpqqbYpC', 1, '2015-05-10 04:01:55', 'dhMqApIxHIHX1WtyBuSclTPAKZtUGAqoAYMGhkvfJVsRkNkC6JSeeyG05ake', '2015-05-09 06:28:15', '2015-05-10 10:24:25'),
(25, 15, 2, 'nuruzzamanripon@gmail.com', '$2y$10$CbnAoS3k.E1MNIts.AaS0OXyCqBaiXqi39EK8gZsb.BeC0qLeFbMy', 1, '2015-06-18 10:03:57', 'UneHFJmCT1WqYQuGoADOYBeLvHuwy94pLgDKZznnOghpgI0t8U5gz4vOUo1j', '2015-06-18 09:39:55', '2015-06-18 13:16:53'),
(26, 15, 1, 'ataur@gmail.com', '$2y$10$vB4Em7WGYp.QpVY265wyD.J1tIclse6VOdZ26kGcJCFNU6nMRKHH2', 1, '2015-06-18 09:57:49', '2PYIUzsTfy1P1IRBIWxp8F9nzBM3uSFMtI9uHWwbeCacmGPc7uUnBC1YFGUY', '2015-06-18 09:53:45', '2015-06-18 09:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
`id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `first_name`, `last_name`, `phone`, `email`, `address`, `photo`, `created_at`, `updated_at`) VALUES
(6, 4, 'Aslam', 'Babu', '01725968741', 'ripon@gmail.com', 'Rajshahi', '150503011021.jpeg', '2015-05-02 08:27:36', '2015-05-03 07:10:35'),
(9, 9, 'Abu', 'Ashraf', '0174589652', 'masnum@yahoo.com', 'Khulna', '', '2015-05-03 01:19:22', '2015-05-03 04:06:17'),
(10, 10, 'Mizanur', 'Rahman', NULL, NULL, NULL, '', '2015-05-03 07:28:56', '2015-05-03 07:28:56'),
(11, 11, 'Al', 'Amin', NULL, NULL, NULL, '', '2015-05-03 07:30:11', '2015-05-03 07:30:11'),
(12, 12, 'Al', 'Amin', NULL, NULL, NULL, '', '2015-05-03 07:35:47', '2015-05-03 07:35:47'),
(13, 13, 'Amin', 'Mohammad', NULL, NULL, NULL, '', '2015-05-03 07:39:00', '2015-05-03 07:39:00'),
(14, 14, 'Abu', 'Hanif', 'sws-dev2', '', '', '150505074539.jpeg', '2015-05-05 01:44:42', '2015-05-05 01:45:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `company_name` (`title`);

--
-- Indexes for table `depertments`
--
ALTER TABLE `depertments`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `depertment_name` (`title`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `employee_identifier` (`employee_identifier`), ADD UNIQUE KEY `national_id` (`national_id`), ADD UNIQUE KEY `phone` (`phone`), ADD UNIQUE KEY `email` (`email`), ADD KEY `email_2` (`email`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
 ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leavetype`
--
ALTER TABLE `leavetype`
 ADD PRIMARY KEY (`leave_type_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
 ADD PRIMARY KEY (`module_id`), ADD UNIQUE KEY `module_text` (`module_text`,`modult_name`);

--
-- Indexes for table `nerds`
--
ALTER TABLE `nerds`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
 ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `office_times`
--
ALTER TABLE `office_times`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
 ADD PRIMARY KEY (`options_id`), ADD UNIQUE KEY `options_name` (`options_name`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
 ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `public_holidays`
--
ALTER TABLE `public_holidays`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `role_name` (`name`);

--
-- Indexes for table `transaction_heads`
--
ALTER TABLE `transaction_heads`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `depertments`
--
ALTER TABLE `depertments`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `leavetype`
--
ALTER TABLE `leavetype`
MODIFY `leave_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nerds`
--
ALTER TABLE `nerds`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `office_times`
--
ALTER TABLE `office_times`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
MODIFY `options_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `public_holidays`
--
ALTER TABLE `public_holidays`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaction_heads`
--
ALTER TABLE `transaction_heads`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
