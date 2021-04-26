-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2021 at 09:22 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16480659_sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `area_coverage` varchar(100) NOT NULL,
  `google_coordinate` varchar(100) NOT NULL,
  `antenna_model` varchar(100) NOT NULL,
  `date_started` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `schedule` int(11) DEFAULT NULL,
  `subs_option` tinyint(4) NOT NULL,
  `monthly` int(11) NOT NULL,
  `device_user` varchar(100) NOT NULL,
  `b_affiliates` varchar(100) NOT NULL,
  `speed` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `subscriber_id`, `account_name`, `area_coverage`, `google_coordinate`, `antenna_model`, `date_started`, `due_date`, `schedule`, `subs_option`, `monthly`, `device_user`, `b_affiliates`, `speed`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 4, 'Ron Cajan', 'Plaridel', '', '', '12/06/2020', '03/05/2021', 5, 2, 3500, 'multiple', 'no', '30mbps', 'Active', '2021-03-16 04:42:12', '2021-03-22 18:24:58', '2021-03-29 14:17:31'),
(9, 5, 'Reid O1ds', 'Calamba', 'd222', '', '11/25/2020', '02/05/2021', 5, 2, 2500, 'multiple', 'no', '20mbps', 'Active', '2021-03-16 04:44:23', NULL, '2021-03-30 18:38:56'),
(10, 4, 'Ron Cajansasa', 'aloran', '', '', '01/05/2021', '05/05/2021', 5, 2, 1000, 'multiple', 'no', '30mbps', 'Active', '2021-03-18 10:06:13', NULL, '2021-03-29 14:17:31'),
(11, 6, 'vincentcale', 'loboc', '234324', 'lbem5', '03/26/2021', '05/05/2021', 5, 2, 1000, 'multiple', 'no', '10mbps', 'Active', '2021-03-29 05:42:55', NULL, NULL),
(12, 7, 'edrolin', 'Talic', '  8°28\'41.39\"N 123°48\'23.70\"E', 'lbem5', '02/01/2019', '04/05/2019', 5, 1, 1000, 'multiple', 'no', '10mbps', 'Active', '2021-03-30 10:17:59', NULL, NULL),
(13, 8, 'carloevidente', 'Talairon', '  8°28\'7.97\"N 123°48\'19.70\"E', 'lbegen2', '07/01/2019', '04/05/2021', 5, 2, 3500, 'multiple', 'no', '30mbps', 'Active', '2021-03-30 10:37:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `events` varchar(100) DEFAULT NULL,
  `activity_type` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `events`, `activity_type`, `user_id`, `created_at`) VALUES
(1, 'Ronil Cajansds has been updated!', 'Update', 8, '2021-03-22 04:50:19'),
(3, 'Subscriber with the id of 8 has been deleted!', 'Delete', 8, '2021-03-22 04:58:03'),
(4, ' has been deleted!', 'Delete', 8, '2021-03-22 04:58:03'),
(5, 'Account id: 8 paid for 02/05/2021 due date.', 'New Payment', 8, '2021-03-22 05:08:53'),
(6, 'Account id: 8 paid for 02/05/2021 due date.', 'New Payment', 8, '2021-03-22 05:13:51'),
(7, 'Account id: 9 paid for 02/05/2021 due date.', 'New Payment', 8, '2021-03-22 05:15:00'),
(8, 'Account id: 9 paid for 03/05/2021 due date.', 'New Payment', 8, '2021-03-22 05:15:23'),
(9, 'Subscriber name: Ronil Cajansds has been updated!', 'Subscriber Update', 8, '2021-03-22 05:56:22'),
(10, 'Subscriber name: Ronil Cajansds has been updated!', 'Subscriber Update', 8, '2021-03-22 05:57:24'),
(11, 'Subscriber name: Ronil Cajansds has been updated!', 'Subscriber Update', 8, '2021-03-22 05:57:42'),
(12, 'Ron Cajan has been updated!', 'Account Update', 8, '2021-03-22 05:57:42'),
(13, 'Account name:Reid O1ds has been updated!', 'Account Update', 8, '2021-03-22 05:58:32'),
(14, 'Account id: [8] paid for 03/05/2021 due date.', 'New Payment', 8, '2021-03-22 08:39:54'),
(15, 'Subscriber name: Ronil Cajan has been updated!', 'Subscriber Update', 8, '2021-03-22 10:24:58'),
(16, 'Account name: Ron Cajan has been updated!', 'Account Update', 8, '2021-03-22 10:24:58'),
(17, 'Account id: [8] paid for 04/05/2021 due date.', 'New Payment', 8, '2021-03-22 11:30:46'),
(18, 'Transcation with account id [53] has been updated!', 'Update Payment', 8, '2021-03-22 11:34:56'),
(19, 'Account ID: [8] paid 01/05/2021 due date.', 'New Payment', 8, '2021-03-23 08:32:29'),
(20, 'Account ID: [8] paid 02/05/2021 due date.', 'New Payment', 13, '2021-03-25 03:39:04'),
(21, 'Account ID: [8] paid 03/05/2021 due date.', 'New Payment', 13, '2021-03-25 04:02:57'),
(22, 'Account ID: [10] paid 03/05/2021 due date.', 'New Payment', 8, '2021-03-25 04:18:35'),
(23, 'Account ID: [8] paid 01/05/2021 due date.', 'New Payment', 8, '2021-03-25 04:24:23'),
(24, 'Account ID: [10] paid 03/05/2021 due date.', 'New Payment', 8, '2021-03-25 04:32:41'),
(25, 'Account ID: [9] paid 12/05/2020 due date.', 'New Payment', 13, '2021-03-25 04:39:16'),
(26, 'Transaction ID: has been updated!', 'Payment Approved', 8, '2021-03-25 05:12:48'),
(27, 'Transaction ID: [61] has been updated!', 'Payment Approved', 8, '2021-03-25 05:16:33'),
(28, 'Account ID: [9] paid 01/05/2021 due date.', 'New Payment', 13, '2021-03-25 06:59:14'),
(29, 'Transaction ID: [63] has been approved!', 'Payment Approved', 8, '2021-03-28 11:11:24'),
(30, 'Subscriber Name: Vincent Cale has been created!', 'New Subscriber', 8, '2021-03-29 05:42:55'),
(31, 'Account Name:vincentcale has been created.', 'New Account', 8, '2021-03-29 05:42:55'),
(32, 'Account ID: [11] paid 04/05/2021 due date.', 'New Payment', 8, '2021-03-29 05:45:31'),
(33, 'Account ID: [8] paid 02/05/2021 due date.', 'New Payment', 8, '2021-03-29 05:46:41'),
(34, 'Account ID: [10] paid 04/05/2021 due date.', 'New Payment', 8, '2021-03-29 06:02:28'),
(35, 'Subscriber ID: 8 has been deleted!', 'Delete Subscriber', 8, '2021-03-29 06:17:31'),
(36, 'Account ID:  has been deleted!', 'Delete Account', 8, '2021-03-29 06:17:31'),
(37, 'Subscriber Name: Vangie Edrolin has been created!', 'New Subscriber', 8, '2021-03-30 10:17:59'),
(38, 'Account Name:edrolin has been created.', 'New Account', 8, '2021-03-30 10:17:59'),
(39, 'Subscriber Name: Carlo Evidente has been created!', 'New Subscriber', 8, '2021-03-30 10:37:15'),
(40, 'Account Name:carloevidente has been created.', 'New Account', 8, '2021-03-30 10:37:15'),
(41, 'Account ID: [13] paid 03/05/2021 due date.', 'New Payment', 8, '2021-03-30 10:38:17'),
(42, 'Subscriber ID: 8 has been deleted!', 'Delete Subscriber', 8, '2021-03-30 10:38:56'),
(43, 'Account ID:  has been deleted!', 'Delete Account', 8, '2021-03-30 10:38:56'),
(44, 'Account ID: [12] paid 03/05/2019 due date.', 'New Payment', 8, '2021-03-30 13:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.192 Safari/537.36', '7ad72ce133f5fd6ab9dbfd5f674d4cf2', '2021-02-25 22:35:12'),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.192 Safari/537.36', 'fc763bca72b38dfe8ca915378c2939c1', '2021-02-25 23:04:31'),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.192 Safari/537.36', 'db84d633cc61eaa3ff14b4e1689a269a', '2021-03-01 09:41:15'),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.105 Safari/537.36', '8b208ae2d27abd25eac06fabfbf8bb6e', '2021-03-28 19:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'administration '),
(2, 'collector', 'collectors '),
(3, 'staff', 'staffs ');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 8),
(1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'cajanr02@gmail.com', 8, '2021-02-18 20:45:45', 1),
(2, '::1', 'cajanr02@gmail.com', 8, '2021-02-18 20:48:18', 1),
(3, '::1', 'cajanr02@gmail.com', NULL, '2021-02-18 21:02:32', 0),
(4, '::1', 'ds', NULL, '2021-02-18 21:03:02', 0),
(5, '::1', 'cajanr02@gmail.com', NULL, '2021-02-18 21:03:12', 0),
(6, '::1', '0392FDSF ', NULL, '2021-02-18 22:21:43', 0),
(7, '::1', 'cajanr02@gmail.com', 8, '2021-02-22 23:50:04', 1),
(8, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:23:54', 1),
(9, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:24:15', 1),
(10, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:24:25', 1),
(11, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:24:56', 1),
(12, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:25:10', 1),
(13, '::1', 'cajanr02@gmail.com', NULL, '2021-02-23 01:28:18', 0),
(14, '::1', 'cajanr02@gmail.com', NULL, '2021-02-23 01:28:31', 0),
(15, '::1', 'cajanr02@gmail.com', NULL, '2021-02-23 01:29:45', 0),
(16, '::1', 'cajanr02@gmail.com', NULL, '2021-02-23 01:30:06', 0),
(17, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:30:18', 1),
(18, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:30:53', 1),
(19, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:31:22', 1),
(20, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:32:46', 1),
(21, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:33:31', 1),
(22, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:35:09', 1),
(23, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:35:59', 1),
(24, '::1', 'cajanr02@gmail.com', NULL, '2021-02-23 01:36:52', 0),
(25, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:36:57', 1),
(26, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:38:19', 1),
(27, '::1', 'cajanr02@gmail.com', NULL, '2021-02-23 01:39:02', 0),
(28, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:39:17', 1),
(29, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:41:22', 1),
(30, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:41:43', 1),
(31, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:42:03', 1),
(32, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:47:10', 1),
(33, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:48:31', 1),
(34, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:49:02', 1),
(35, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 01:50:37', 1),
(36, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 02:28:53', 1),
(37, '::1', 'cajanr02@gmail.com', 8, '2021-02-23 04:54:26', 1),
(38, '::1', 'cajanr02@gmail.com', NULL, '2021-02-24 21:08:15', 0),
(39, '::1', 'cajanr02@gmail.com', 8, '2021-02-24 21:09:53', 1),
(40, '::1', 'cajanr02@gmail.com', 8, '2021-02-24 21:10:46', 1),
(41, '::1', 'cajanr02@gmail.com', 8, '2021-02-24 22:33:37', 1),
(42, '::1', 'cajanr02@gmail.com', 8, '2021-02-24 22:35:57', 1),
(43, '::1', 'cajanr02@gmail.com', 8, '2021-02-25 03:14:53', 1),
(44, '::1', 'cajanr02@gmail.com', NULL, '2021-02-25 03:15:13', 0),
(45, '::1', 'cajanr02@gmail.com', 8, '2021-02-25 03:15:18', 1),
(46, '::1', 'cajanr02@gmail.com', 8, '2021-02-25 20:00:46', 1),
(47, '::1', 'cajanr02@gmail.com', 8, '2021-02-25 22:19:35', 1),
(48, '::1', 'cajanr02@gmail.com', NULL, '2021-02-25 22:33:55', 0),
(49, '::1', 'cajanr02@gmail.com', 8, '2021-02-25 22:34:06', 1),
(50, '::1', '0392FDSF ', NULL, '2021-02-26 14:29:04', 0),
(51, '::1', 'cajanr02@gmail.com', 8, '2021-02-26 15:11:31', 1),
(52, '::1', 'cajanr02@gmail.com', NULL, '2021-03-01 09:22:56', 0),
(53, '::1', 'cajanr02@gmail.com', 8, '2021-03-01 09:23:01', 1),
(54, '::1', 'cajanr02@gmail.com', 8, '2021-03-01 10:41:03', 1),
(55, '::1', 'cajanr02@gmail.com', NULL, '2021-03-01 15:46:30', 0),
(56, '::1', 'cajanr02@gmail.com', NULL, '2021-03-01 15:46:39', 0),
(57, '::1', 'cajanr02@gmail.com', NULL, '2021-03-01 15:46:45', 0),
(58, '::1', 'cajanr02@gmail.com', NULL, '2021-03-01 15:57:48', 0),
(59, '::1', 'cajanr02@gmail.com', NULL, '2021-03-01 15:57:53', 0),
(60, '::1', 'cajanr02@gmail.com', 8, '2021-03-01 16:07:37', 1),
(61, '::1', 'cajanr02@gmail.com', NULL, '2021-03-01 16:09:24', 0),
(62, '::1', 'cajanr02@gmail.com', 8, '2021-03-01 16:09:29', 1),
(63, '::1', 'cajanr02@gmail.com', NULL, '2021-03-01 16:11:12', 0),
(64, '::1', 'cajanr02@gmail.com', 8, '2021-03-01 16:11:16', 1),
(65, '::1', 'ronil.cajan@gmail.com', 13, '2021-03-01 16:14:46', 1),
(66, '::1', 'cajanr02@gmail.com', 8, '2021-03-01 16:20:36', 1),
(67, '::1', 'cajanr02@gmail.com', 8, '2021-03-02 12:49:58', 1),
(68, '::1', 'cajanr02@gmail.com', 8, '2021-03-03 14:14:12', 1),
(69, '::1', 'cajanr02@gmail.com', 8, '2021-03-03 19:03:51', 1),
(70, '::1', 'cajanr02@gmail.com', 8, '2021-03-04 07:51:29', 1),
(71, '::1', 'cajanr02@gmail.com', 8, '2021-03-04 08:43:28', 1),
(72, '::1', 'cajanr02@gmail.com', 8, '2021-03-05 09:39:32', 1),
(73, '::1', 'cajanr02@gmail.com', 8, '2021-03-05 22:01:54', 1),
(74, '::1', 'cajanr02@gmail.com', 8, '2021-03-09 10:26:46', 1),
(75, '::1', 'cajanr02@gmail.com', 8, '2021-03-09 10:28:03', 1),
(76, '::1', 'cajanr02@gmail.com', 8, '2021-03-09 20:04:30', 1),
(77, '::1', 'cajanr02@gmail.com', 8, '2021-03-10 10:51:22', 1),
(78, '::1', 'cajanr02@gmail.com', 8, '2021-03-11 11:27:13', 1),
(79, '::1', 'cajanr02@gmail.com', 8, '2021-03-11 14:01:45', 1),
(80, '::1', 'cajanr02@gmail.com', 8, '2021-03-12 11:47:32', 1),
(81, '::1', 'cajanr02@gmail.com', 8, '2021-03-15 08:38:26', 1),
(82, '::1', 'cajanr02@gmail.com', 8, '2021-03-15 19:42:07', 1),
(83, '::1', 'cajanr02@gmail.com', 8, '2021-03-16 11:10:51', 1),
(84, '::1', 'cajanr02@gmail.com', 8, '2021-03-16 16:38:03', 1),
(85, '::1', 'cajanr02@gmail.com', 8, '2021-03-17 09:50:38', 1),
(86, '::1', 'cajanr02@gmail.com', 8, '2021-03-18 11:22:05', 1),
(87, '::1', 'cajanr02@gmail.com', 8, '2021-03-19 07:14:28', 1),
(88, '::1', 'cajanr02@gmail.com', NULL, '2021-03-22 10:22:22', 0),
(89, '::1', 'cajanr02@gmail.com', 8, '2021-03-22 10:22:26', 1),
(90, '::1', 'cajanr02@gmail.com', 8, '2021-03-23 13:01:52', 1),
(91, '::1', 'cajanr02@gmail.com', 8, '2021-03-23 20:06:25', 1),
(92, '::1', 'cajanr02@gmail.com', 8, '2021-03-23 20:28:18', 1),
(93, '::1', 'cajanr02@gmail.com', 8, '2021-03-23 20:39:51', 1),
(94, '::1', 'cajanr02@gmail.com', 8, '2021-03-24 10:46:07', 1),
(95, '::1', 'cajanr02@gmail.com', NULL, '2021-03-24 12:56:02', 0),
(96, '::1', 'cajanr02@gmail.com', 8, '2021-03-24 12:56:09', 1),
(97, '::1', 'cajanr02@gmail.com', 8, '2021-03-25 09:50:44', 1),
(98, '::1', 'ronil.cajan@gmail.com', 13, '2021-03-25 10:08:49', 1),
(99, '::1', 'cajanr02@gmail.com', 8, '2021-03-25 11:06:28', 1),
(100, '::1', 'ronil.cajan@gmail.com', 13, '2021-03-25 11:07:27', 1),
(101, '::1', 'cajanr02@gmail.com', 8, '2021-03-25 11:31:48', 1),
(102, '::1', 'ronil.cajan@gmail.com', 13, '2021-03-25 11:35:29', 1),
(103, '::1', 'cajanr02@gmail.com', 8, '2021-03-25 12:07:07', 1),
(104, '::1', 'ronil.cajan@gmail.com', 13, '2021-03-25 12:22:37', 1),
(105, '::1', 'cajanr02@gmail.com', NULL, '2021-03-25 12:23:08', 0),
(106, '::1', 'cajanr02@gmail.com', 8, '2021-03-25 12:23:11', 1),
(107, '::1', 'ronil.cajan@gmail.com', 13, '2021-03-25 12:34:02', 1),
(108, '::1', 'cajanr02@gmail.com', 8, '2021-03-25 12:40:14', 1),
(109, '::1', 'ronil.cajan@gmail.com', 13, '2021-03-25 14:59:04', 1),
(110, '::1', 'cajanr02@gmail.com', 8, '2021-03-25 15:01:14', 1),
(111, '::1', 'cajanr02@gmail.com', 8, '2021-03-28 19:10:38', 1),
(112, '::1', 'ronil.cajan@gmail.com', 13, '2021-03-28 19:15:11', 1),
(113, '::1', 'cajanr02@gmail.com', NULL, '2021-03-28 19:18:39', 0),
(114, '::1', 'cajanr02@gmail.com', 8, '2021-03-28 19:18:45', 1),
(115, '::1', 'jameronjame@gmail.com', 16, '2021-03-28 19:28:55', 1),
(116, '124.106.85.138', 'cajanr02@gmail.com', 8, '2021-03-28 22:24:37', 1),
(117, '124.106.85.138', 'cajanr02@gmail.com', 8, '2021-03-28 22:29:33', 1),
(118, '175.176.84.192', 'cajanr02@gmail.com', 8, '2021-03-29 07:39:08', 1),
(119, '175.176.85.75', 'cajanr02@gmail.com', 8, '2021-03-29 13:28:38', 1),
(120, '58.69.64.236', 'cajanr02@gmail.com', 8, '2021-03-29 13:39:23', 1),
(121, '124.106.85.138', 'cajanr02@gmail.com', 8, '2021-03-30 12:02:56', 1),
(122, '124.106.85.138', 'cajanr02@gmail.com', 8, '2021-03-30 12:21:12', 1),
(123, '124.106.85.138', 'jameronjame@gmail.com', NULL, '2021-03-30 12:42:22', 0),
(124, '124.106.85.138', 'ronil.cajan@gmail.com', 24, '2021-03-30 12:43:01', 1),
(125, '124.106.85.138', 'cajanr02@gmail.com', 8, '2021-03-30 12:44:44', 1),
(126, '124.106.85.138', 'ronil.cajan@gmail.com', 25, '2021-03-30 12:45:39', 1),
(127, '58.69.64.236', 'nodtech28', NULL, '2021-03-30 18:11:53', 0),
(128, '58.69.64.236', 'cajanr02@gmail.com', 8, '2021-03-30 18:12:04', 1),
(129, '58.69.64.236', 'cajanr02@gmail.com', 8, '2021-03-30 21:18:34', 1),
(130, '124.106.85.138', 'cajanr02@gmail.com', 8, '2021-04-04 09:47:46', 1),
(131, '124.106.85.138', 'cajanr02@gmail.com', 8, '2021-04-06 09:03:44', 1),
(132, '2001:4455:27a:9500:f8af:5eaa:a763:f79f', 'cajanr02@gmail.com', NULL, '2021-04-22 16:15:19', 0),
(133, '2001:4455:27a:9500:f8af:5eaa:a763:f79f', 'cajanr02@gmail.com', 8, '2021-04-22 16:15:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_reset_attempts`
--

INSERT INTO `auth_reset_attempts` (`id`, `email`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, 'ssantostx@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.152 Safari/537.36', '4324234', '2021-02-18 21:40:15'),
(2, 'cajanr02@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 'e96da34b77a4deb36580757601404a40', '2021-02-23 01:33:24'),
(3, 'cajanr02@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.192 Safari/537.36', 'd46e7267939b155de5cdf236954aa5e3', '2021-03-01 16:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1613699072, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `date_paid` varchar(20) DEFAULT NULL,
  `due_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `account_id`, `date_paid`, `due_date`) VALUES
(1, 8, '02/05/2021', '03/05/2021'),
(2, 9, '01/05/2021', '02/05/2021'),
(3, 10, '04/05/2021', '05/05/2021'),
(4, 11, '04/05/2021', '05/05/2021'),
(5, 12, '03/05/2019', '04/05/2019'),
(6, 13, '03/05/2021', '04/05/2021');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fb_name` varchar(100) DEFAULT NULL,
  `fb_url` varchar(100) DEFAULT NULL,
  `recommended_by` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'Active',
  `img` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `phone`, `email`, `fb_name`, `fb_url`, `recommended_by`, `street`, `city`, `province`, `status`, `img`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Ronil Cajan', '19512659595', 'cajanr02@gmail.com', 'RoOnil Cajan', 'https://www.facebook.com/messenger_media?thread_id=612374645&attachment_id=477455046609732&message_i', 'Ron Cajan', '310 W Las Colinas Blvd', 'Irvingd', 'Misamis Occidental', 'Active', NULL, '2021-03-16 04:42:12', '2021-03-22 18:24:58', '2021-03-29 14:17:31'),
(5, 'Jon Jones', '9512659595', 'ssantostx@gmail.com', 'Jame ROa', 'https://stackoverflow.com/questions/3552461/how-to-format-a-javascript-date', 'Ron Cajan', 'PH', 'Looc', 'Misamis Occidental', 'Active', NULL, '2021-03-16 04:44:23', NULL, '2021-03-30 18:38:56'),
(6, 'Vincent Cale', '09999998208', 'nodtech28@yahoo.com', 'vincent', 'sdfad', 'Emon', 'Loboc, Oroquieta city', 'Oroquieta', 'Misamis Occidental', 'Active', NULL, '2021-03-29 05:42:55', NULL, NULL),
(7, 'Vangie Edrolin', '09503651515', 'none@gmail.com', 'Vangie Salvacion Edrolin', 'https://www.facebook.com/van.sal.ed', 'none', 'Talick St.', 'Oroquieta ', 'Misamis Occidental', 'Active', NULL, '2021-03-30 10:17:59', NULL, NULL),
(8, 'Carlo Evidente', 'none', 'none1@gmail.com', 'Carlo Diaz Evidente', 'https://www.facebook.com/carlo311', 'none', 'Talairon', 'Oroquieta ', 'Misamis Occidental', 'Active', NULL, '2021-03-30 10:37:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_options`
--

CREATE TABLE `subscription_options` (
  `id` int(11) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `dname` varchar(100) DEFAULT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `icon` varchar(200) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `name`, `dname`, `tagline`, `email`, `phone`, `address`, `icon`, `logo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Waga Network Solution', 'Waga Network', 'Striving towards an era of unlimited data.', 'ssantostx@gmail.com', '19512659595', '310 W Las Colinas Blvd', 'new-1616498396_a31baac085b781973b1d.png', '1616929980_9cd39c68135611220df2.jpg', '2021-03-23 10:32:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `notes` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Paid',
  `p_date` varchar(20) DEFAULT NULL,
  `no_months` int(11) DEFAULT NULL,
  `payment` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `account_id`, `description`, `notes`, `status`, `p_date`, `no_months`, `payment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(60, 10, '03/05/2021', '', 'Paid', '2021-03-25', 2, 2000.00, '2021-03-25 04:32:41', '2021-03-25 13:12:48', NULL),
(61, 9, '12/05/2020', 'akoa ni', 'Paid', '2021-03-25', 1, 833.00, '2021-03-25 04:39:16', '2021-03-25 13:16:33', NULL),
(63, 9, '01/05/2021', 'nice one', 'Paid', '2021-03-25', 1, 2500.00, '2021-03-25 06:59:14', '2021-03-28 19:11:24', NULL),
(64, 11, '04/05/2021', 'paid in advance march 30, noted', 'Paid', '2021-03-29', 1, 333.00, '2021-03-29 05:45:31', NULL, NULL),
(65, 8, '02/05/2021', '2months payment til february 5', 'Paid', '2021-03-29', 2, 7117.00, '2021-03-29 05:46:41', NULL, NULL),
(66, 10, '04/05/2021', 'paid partial 500, balance 500 for April 5', 'Paid', '2021-03-29', 1, 500.00, '2021-03-29 06:02:28', NULL, NULL),
(67, 13, '03/05/2021', 'Paid till march 5', 'Paid', '2021-03-30', 20, 4500.00, '2021-03-30 10:38:17', NULL, NULL),
(68, 12, '03/05/2019', '', 'Paid', '2021-03-30', 1, 1067.00, '2021-03-30 13:19:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'cajanr02@gmail.com', 'roncajan', '$2y$10$4kkmoVRWI23838bcTDS/vemzUi70y5oTor27YcJJ.xOiA724TSI8O', '448c7f5bae362071871d3a00d5a5d172', '2021-03-01 16:10:55', '2021-03-23 21:25:54', NULL, NULL, NULL, 1, 0, '2021-02-18 20:45:32', '2021-03-23 20:25:54', NULL),
(25, 'ronil.cajan@gmail.com', 'ron', '$2y$10$9VvR4nr732JnG2RwGtMkIOgNmoOa8bblF73Yfg6A4yIpMXLiPhCf.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-30 12:45:17', '2021-03-30 12:45:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `name`, `phone`, `address`, `img`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 8, 'Ronil Cajan', '432423423', '310 W Las Colinas Blvd', '1616498752_f3f61ccbba3bfb12fdfc.jpg', '2021-02-26 05:35:36', '2021-03-23 19:25:52', NULL),
(13, 25, NULL, NULL, NULL, NULL, '2021-03-30 04:45:17', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_options`
--
ALTER TABLE `subscription_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subscription_options`
--
ALTER TABLE `subscription_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
