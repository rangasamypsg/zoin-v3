-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 02:33 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoin-app-v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(12) UNSIGNED NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `city` varchar(80) DEFAULT NULL,
  `postcode` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `address`, `city`, `postcode`) VALUES
(1, '22 first street', 'cbe', NULL),
(2, 'rs Puram', 'Coimbatore', NULL),
(3, 'baniya', 'Coimbatore', NULL),
(4, 'Gandhipuram', 'Coimbatore', NULL),
(5, 'Indranagar', 'Coimbatore', NULL),
(6, '37 Cross Road, Main lane', 'Coimbatore', NULL),
(7, '37, CBE', 'Trichy', NULL),
(9, NULL, 'coiudskn', '654345'),
(10, NULL, 'coimbatore', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `email`, `password`) VALUES
(1, 'admin@zoin.in', 'ff9f92cf2804120fac283f7f1dd43766');

-- --------------------------------------------------------

--
-- Table structure for table `business_rule`
--

CREATE TABLE `business_rule` (
  `business_type` varchar(100) NOT NULL,
  `max_loyalty_amount` int(8) NOT NULL,
  `zoin_points` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_rule`
--

INSERT INTO `business_rule` (`business_type`, `max_loyalty_amount`, `zoin_points`) VALUES
('Restaurants', 2500, 250),
('Restaurants', 2000, 200),
('Restaurants', 1500, 150),
('Restaurants', 1000, 100),
('Restaurants', 500, 50);

-- --------------------------------------------------------

--
-- Table structure for table `business_types`
--

CREATE TABLE `business_types` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `business_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_types`
--

INSERT INTO `business_types` (`id`, `business_type`) VALUES
(001, 'Restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `checkin_limit`
--

CREATE TABLE `checkin_limit` (
  `maximum_checkin_available` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkin_limit`
--

INSERT INTO `checkin_limit` (`maximum_checkin_available`) VALUES
(99);

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `mobile_number` varchar(12) NOT NULL,
  `password` varchar(250) DEFAULT NULL,
  `user_type` varchar(3) DEFAULT NULL,
  `is_mobile_verified` int(1) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`mobile_number`, `password`, `user_type`, `is_mobile_verified`) VALUES
('9159934893', NULL, 'V', 1),
('9566309844', '', 'V', 0),
('9566425554', NULL, 'V', 1),
('9585537309', NULL, 'v', 1),
('9698450115', NULL, 'V', 1),
('9789108964', NULL, 'V', 1),
('9880933303', NULL, 'V', 1);

-- --------------------------------------------------------

--
-- Table structure for table `funky_names`
--

CREATE TABLE `funky_names` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funky_names`
--

INSERT INTO `funky_names` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bugs Bunny', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(2, 'Scooby-Doo', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(3, 'Tom and Jerry', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(4, 'Mickey Mouse', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(5, 'Homer Simpson', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(6, 'Daffy Duck', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(7, 'Wile E. Coyote', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(8, 'Bart Simpson', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(9, 'Shaggy Rogers', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(10, 'Tom Cat', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(11, 'Batman', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(12, 'Jerry Mouse', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(13, 'Snoopy', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(14, 'Donald Duck', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(15, 'Stewie Griffin', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(16, 'SpongeBob SquarePants', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(17, 'Sylvester', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(18, 'Popeye', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(19, 'Goofy', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(20, 'Tasmanian Devil', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(21, 'Fred Flintstone', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(22, 'Tigger', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(23, 'Foghorn Leghorn', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(24, 'Charlie Brown', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(25, 'Marvin the Martian', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(26, 'Yosemite Sam', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(27, 'Peter Griffin', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(28, 'Pink Panther', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(29, 'Brian Griffin', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(30, 'Winnie-the-Pooh', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(31, 'Eeyore', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(32, 'Pepé Le Pew', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(33, 'Teenage Mutant Ninja Turtles', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(34, 'Bender', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(35, 'Dexter', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(36, 'Tweety', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(37, 'Woody Woodpecker', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(38, 'Chip \'n\' Dale', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(39, 'Courage', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(40, 'Elmer Fudd', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(41, 'Tommy Pickles', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(42, 'Porky Pig', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(43, 'Scrooge McDuck', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(44, 'Yakko, Wakko, and Dot', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(45, 'Fry', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(46, 'Pinky', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(47, 'Yogi Bear', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(48, 'Goku', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(49, 'Eric Cartman', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(50, 'Velma Dinkley', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(51, 'The Powerpuff Girls', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(52, 'Optimus Prime', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(53, 'The Joker', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(54, 'Spider-Man', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(55, 'Leela', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(56, 'Speedy Gonzales', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(57, 'Maggie Simpson', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(58, 'Lisa Simpson', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(59, 'Garfield', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(60, 'The Brain', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(61, 'Skeletor', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(62, 'Barney Rubble', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(63, 'Patrick Star', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(64, 'Marge Simpson', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(65, 'Deadpool', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(66, 'Stitch', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(67, 'Squidward Tentacles', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(68, 'Shrek', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(69, 'Rick Sanchez', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(70, 'Roger', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(71, 'George Jetson', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(72, 'Inspector Gadget', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(73, 'Superman', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(74, 'Kenny McCormick', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(75, 'Donkey', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(76, 'Stimpson J. \"Stimpy\" Cat', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(77, 'Butters Stotch', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(78, 'Mr. Burns', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(79, 'Betty Boop', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(80, 'Bullwinkle J. Moose', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(81, 'Droopy Dog', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(82, 'Linus van Pelt', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(83, 'Papa Smurf', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(84, 'Mario', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(85, 'Glenn Quagmire', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(86, 'Minnie Mouse', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(87, 'Hank Hill', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(88, 'Underdog', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(89, 'Plankton', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(90, 'Mighty Mouse', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(91, 'Felix the Cat', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(92, 'Darkwing Duck', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(93, 'Butt-Head', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(94, 'Ren Höek', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(95, 'Angelica Pickles', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(96, 'Finn the Human', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(97, 'Krusty the Clown', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(98, 'He-Man', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(99, 'Lois Griffin', '2018-05-01 18:30:00', '2018-05-23 18:30:00'),
(100, '', '2018-05-01 18:30:00', '2018-05-23 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `loyalty`
--

CREATE TABLE `loyalty` (
  `id` int(12) UNSIGNED NOT NULL,
  `loyalty_id` varchar(28) NOT NULL,
  `loyalty_status` enum('Created','Inactive','Open','Closed','Denied') DEFAULT 'Created',
  `max_checkin` int(2) UNSIGNED DEFAULT NULL,
  `max_bill_amount` int(8) UNSIGNED DEFAULT NULL,
  `offer_type` varchar(50) DEFAULT NULL,
  `zoin_point` varchar(50) NOT NULL,
  `description` text,
  `loyalty_pics_path` varchar(500) DEFAULT NULL,
  `vendor_id` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loyalty`
--

INSERT INTO `loyalty` (`id`, `loyalty_id`, `loyalty_status`, `max_checkin`, `max_bill_amount`, `offer_type`, `zoin_point`, `description`, `loyalty_pics_path`, `vendor_id`, `created_at`, `updated_at`) VALUES
(1, 'ZLTY001', 'Open', 3, 500, NULL, '50', 'new loyalty created', NULL, 'ZVR001', '2018-03-31 04:50:21', '2018-05-25 06:27:18'),
(2, 'ZLTY002', 'Open', 3, 1000, NULL, '100', 'Hello', NULL, 'ZVR002', '2018-03-12 00:49:28', '2018-03-12 00:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `loyalty_balance`
--

CREATE TABLE `loyalty_balance` (
  `id` int(11) UNSIGNED NOT NULL,
  `vendor_id` varchar(25) DEFAULT NULL,
  `user_id` varchar(25) DEFAULT NULL,
  `total_loyalty` int(8) NOT NULL DEFAULT '0',
  `claimed_loyalty` int(8) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loyalty_balance`
--

INSERT INTO `loyalty_balance` (`id`, `vendor_id`, `user_id`, `total_loyalty`, `claimed_loyalty`) VALUES
(1, 'ZVR001', NULL, 1, 8),
(2, 'ZVR002', NULL, 1, 5),
(3, NULL, 'ZUR001', 1, 1),
(4, NULL, 'ZUR003', 1, 5),
(5, NULL, 'ZUR004', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `loyalty_completed`
--

CREATE TABLE `loyalty_completed` (
  `id` int(11) UNSIGNED NOT NULL,
  `completed_id` varchar(50) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `user_id` varchar(25) DEFAULT NULL,
  `zoin_point` varchar(50) NOT NULL,
  `user_checkin` tinyint(3) UNSIGNED NOT NULL,
  `max_checkin` tinyint(3) UNSIGNED NOT NULL,
  `user_max_bill_amount` float(8,2) NOT NULL,
  `max_bill_amount` float(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loyalty_completed`
--

INSERT INTO `loyalty_completed` (`id`, `completed_id`, `vendor_id`, `user_id`, `zoin_point`, `user_checkin`, `max_checkin`, `user_max_bill_amount`, `max_bill_amount`, `created_at`, `updated_at`) VALUES
(1, 'ZCD001', 'ZVR001', 'ZUR002', '50', 11, 3, 1500.00, 500.00, '2018-03-12 00:38:53', '2018-03-12 00:38:53'),
(2, 'ZCD002', 'ZVR001', 'ZUR002', '50', 9, 3, 1100.00, 500.00, '2018-03-12 00:38:53', '2018-03-12 00:38:53'),
(3, 'ZCD003', 'ZVR001', 'ZUR002', '50', 7, 3, 700.00, 500.00, '2018-03-12 00:38:53', '2018-03-12 00:38:53'),
(4, 'ZCD004', 'ZVR001', 'ZUR002', '50', 7, 3, 500.00, 500.00, '2018-03-12 00:38:53', '2018-03-12 00:38:53'),
(5, 'ZCD005', 'ZVR001', 'ZUR002', '50', 6, 3, 500.00, 500.00, '2018-03-12 00:38:53', '2018-03-12 00:38:53'),
(6, 'ZCD006', 'ZVR001', 'ZUR002', '50', 8, 3, 500.00, 500.00, '2018-03-12 00:38:53', '2018-03-12 00:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_bank_details`
--

CREATE TABLE `merchant_bank_details` (
  `id` int(11) UNSIGNED NOT NULL,
  `vendor_id` varchar(25) NOT NULL,
  `gst_number` varchar(25) NOT NULL,
  `author_number` varchar(25) NOT NULL,
  `pan_number` varchar(25) NOT NULL,
  `ifsc_code` varchar(25) NOT NULL,
  `account_number` varchar(25) NOT NULL,
  `account_name` varchar(150) NOT NULL,
  `bank_name` varchar(150) NOT NULL,
  `bank_address` text NOT NULL,
  `account_type` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `merchant_details`
--

CREATE TABLE `merchant_details` (
  `id` int(9) UNSIGNED NOT NULL,
  `vendor_id` varchar(25) NOT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `email_id` varchar(150) DEFAULT NULL,
  `contact_person` varchar(150) DEFAULT NULL,
  `mobile_number` varchar(12) NOT NULL,
  `address_id` int(12) NOT NULL,
  `is_email_verified` int(1) UNSIGNED ZEROFILL NOT NULL,
  `confirmation_code` varchar(250) DEFAULT NULL,
  `profile_image` varchar(250) DEFAULT NULL,
  `business_type` int(3) NOT NULL,
  `location` varchar(80) DEFAULT NULL,
  `merchant_level` int(2) UNSIGNED ZEROFILL NOT NULL,
  `is_admin_approved` int(1) UNSIGNED ZEROFILL NOT NULL,
  `is_login_approved` tinyint(3) NOT NULL DEFAULT '0',
  `description` text,
  `website` varchar(250) DEFAULT NULL,
  `start_time` varchar(12) DEFAULT NULL,
  `end_time` varchar(12) DEFAULT NULL,
  `closed` varchar(250) DEFAULT NULL,
  `latitude` varchar(25) DEFAULT NULL,
  `longitude` varchar(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant_details`
--

INSERT INTO `merchant_details` (`id`, `vendor_id`, `company_name`, `email_id`, `contact_person`, `mobile_number`, `address_id`, `is_email_verified`, `confirmation_code`, `profile_image`, `business_type`, `location`, `merchant_level`, `is_admin_approved`, `is_login_approved`, `description`, `website`, `start_time`, `end_time`, `closed`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'ZVR001', 'demo residency', 'tamil@thegang.in', 'tamil', '9585537309', 1, 0, NULL, NULL, 1, '0', 01, 1, 1, 'fsdf fsfsdfsd fdsfsdfsdf', 'http://www.phoneix.com', '5:00 AM', '05:00 PM', 'Monday,Tuesday,Wednesday\n', '11.016844', '76.955832', '2018-03-12 00:38:53', '2018-03-19 06:05:31'),
(2, 'ZVR002', 'Hello', 'karthick@thegang.in', 'Hello', '9566425554', 2, 0, NULL, '1527315593.bmp', 1, '0', 01, 1, 1, 'Hello', 'http://www.hello.com', '10:30 AM', '12:40 PM', 'Monday,Tuesday,Wednesday', '16.395308', '78.795313', '2018-03-12 00:41:26', '2018-05-26 00:49:53'),
(3, 'ZVR003', 'hello', 'padma@thegang.in', 'hello', '9159934893', 4, 0, NULL, '1523082842.bmp', 1, '0', 01, 3, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-14 00:07:17', '2018-04-07 01:04:02'),
(4, 'ZVR004', 'Happy', 'happy@gmail.com', 'Ranga', '9789108964', 5, 0, NULL, NULL, 1, '0', 01, 3, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-19 23:53:04', '2018-03-20 03:28:57'),
(5, 'ZVR005', 'Village', 'prasannah@gmail.com', 'Prasanna', '9880933303', 6, 0, NULL, NULL, 1, '0', 01, 3, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-20 03:31:29', '2018-03-20 03:31:29'),
(6, 'ZVR006', 'Happy', 'prasan@gmail.com', 'Prasanna', '9698450115', 7, 0, NULL, NULL, 1, '0', 01, 3, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-26 06:02:14', '2018-03-26 06:02:14'),
(8, 'ZVR007', 'Phoenix', 'pragadeesh@thegang.in', 'Praga', '9566309844', 9, 0, '', '', 1, '', 01, 1, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'http://zoin.in/adminpanel/admin/add_merchant.php', '7:00 AM', '6:00 PM', '', '12.3333', '13.3333', '2018-03-27 01:39:01', '2018-03-27 01:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_feature_details`
--

CREATE TABLE `merchant_feature_details` (
  `id` int(11) UNSIGNED NOT NULL,
  `vendor_id` varchar(25) NOT NULL,
  `feature_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `merchant_feature_details`
--

INSERT INTO `merchant_feature_details` (`id`, `vendor_id`, `feature_id`) VALUES
(1, 'ZVR001', 1),
(2, 'ZVR001', 4),
(3, 'ZVR001', 0),
(4, 'ZVR001', 8),
(5, 'ZVR001', 9),
(6, 'ZVR001', 0),
(7, 'ZVR001', 0),
(8, 'ZVR001', 12),
(9, 'ZVR001', 0),
(10, 'ZVR001', 14),
(11, 'ZVR002', 3),
(12, 'ZVR002', 4),
(13, 'ZVR002', 7),
(14, 'ZVR002', 0),
(15, 'ZVR002', 9),
(16, 'ZVR002', 10),
(17, 'ZVR002', 11),
(18, 'ZVR002', 12),
(19, 'ZVR002', 13),
(20, 'ZVR002', 14),
(36, 'ZVR007', 0),
(37, 'ZVR007', 11),
(38, 'ZVR007', 12),
(39, 'ZVR007', 13),
(40, 'ZVR007', 14);

-- --------------------------------------------------------

--
-- Table structure for table `merchant_feature_images`
--

CREATE TABLE `merchant_feature_images` (
  `id` int(11) UNSIGNED NOT NULL,
  `feature_type` varchar(25) NOT NULL,
  `feature_name` varchar(255) NOT NULL,
  `feature_image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `merchant_feature_images`
--

INSERT INTO `merchant_feature_images` (`id`, `feature_type`, `feature_name`, `feature_image`) VALUES
(1, 'food', 'veg', 'http://zoin.in/feature_image/veg.png'),
(2, 'food', 'Non Veg', 'http://zoin.in/feature_image/veg-nonveg.png'),
(3, 'food', 'Veg/Non Veg', 'http://zoin.in/feature_image/veg-nonveg.png'),
(4, 'room', 'Ac', 'http://zoin.in/feature_image/ac.png'),
(5, 'room', 'Non Ac', 'http://zoin.in/feature_image/nonac.png'),
(6, 'room', 'Ac/Non A/c', 'http://zoin.in/feature_image/ac-nonac.png'),
(7, 'card_payment', 'Card Payment', 'http://zoin.in/feature_image/card.png'),
(8, 'wifi', 'Wifi', 'http://zoin.in/feature_image/wifi.png'),
(9, 'rest_room', 'Rest Room', 'http://zoin.in/feature_image/restroom.png'),
(10, 'self_services', 'Self Services', 'http://zoin.in/feature_image/selfservice.png'),
(11, 'parking', 'Parking', 'http://zoin.in/feature_image/parking.png'),
(12, 'disabled_access', 'Disabled Access', 'http://zoin.in/feature_image/access.png'),
(13, 'cctv', 'CCTV', 'http://zoin.in/feature_image/cctv.png'),
(14, 'alcohol_serving', 'Alcohol Serving', 'http://zoin.in/feature_image/bar.png');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_images`
--

CREATE TABLE `merchant_images` (
  `id` int(11) UNSIGNED NOT NULL,
  `vendor_id` varchar(25) NOT NULL,
  `profile_image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant_images`
--

INSERT INTO `merchant_images` (`id`, `vendor_id`, `profile_image`) VALUES
(5, 'ZVR002', 'http://zoin.in/adminpanel/database/uploads/R5.jpg'),
(6, 'ZVR002', 'http://zoin.in/adminpanel/database/uploads/R1.jpg'),
(7, 'ZVR001', 'http://zoin.in/adminpanel/database/uploads/R1.jpg'),
(8, 'ZVR001', 'http://zoin.in/adminpanel/database/uploads/R2.jpg'),
(9, 'ZVR001', 'http://zoin.in/adminpanel/database/uploads/R4.jpg'),
(12, 'ZVR007', 'http://zoin.in/adminpanel/database/uploads/R4.jpg'),
(17, 'ZVR007', 'http://zoin.in/adminpanel/database/uploads/R4.jpg'),
(18, 'ZVR007', 'http://zoin.in/adminpanel/database/uploads/R4.jpg'),
(19, 'ZVR007', 'http://zoin.in/adminpanel/database/uploads/R4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_social_media`
--

CREATE TABLE `merchant_social_media` (
  `id` int(11) NOT NULL,
  `vendor_id` varchar(25) NOT NULL,
  `social_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant_social_media`
--

INSERT INTO `merchant_social_media` (`id`, `vendor_id`, `social_name`) VALUES
(8, 'ZVR004', 'http://zoin.in/facebook'),
(9, 'ZVR004', 'http://zoin.in/gplus');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_status`
--

CREATE TABLE `merchant_status` (
  `id` int(11) UNSIGNED NOT NULL,
  `status_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant_status`
--

INSERT INTO `merchant_status` (`id`, `status_name`) VALUES
(1, 'Approved'),
(2, 'Un Approved'),
(3, 'Pending'),
(4, 'Block');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_tags`
--

CREATE TABLE `merchant_tags` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `merchant_tags`
--

INSERT INTO `merchant_tags` (`id`, `tag_name`) VALUES
(1, 'Chettinad'),
(2, 'Chinese'),
(3, 'Continental'),
(4, 'Cafe'),
(5, 'Pizza'),
(6, 'Chicken'),
(7, 'Mutton'),
(8, 'Non veg'),
(9, 'Veg'),
(10, 'Chat'),
(11, 'Ice cream'),
(12, 'Sweets'),
(13, 'Italian'),
(14, 'Indian'),
(15, 'North Indian'),
(16, 'South Indian'),
(17, 'Desserts'),
(18, 'Sea foods'),
(19, 'Street foods'),
(20, 'Biriyani'),
(21, 'Snacks'),
(22, 'Thai'),
(23, 'Tandoori'),
(24, 'Fast foods'),
(25, 'American'),
(26, 'Andra');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_otp`
--

CREATE TABLE `mobile_otp` (
  `mobile_number` varchar(12) NOT NULL,
  `otp` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile_otp`
--

INSERT INTO `mobile_otp` (`mobile_number`, `otp`) VALUES
('95664255554', '2429'),
('8248014315', '2809'),
('98999757', '1671'),
('889689', '1697'),
('8508784722', '9860'),
('9566309844', '3733'),
('9789108964', '5736');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` varchar(28) NOT NULL,
  `subject_id` varchar(25) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `message` text NOT NULL,
  `amount` varchar(25) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `zoin_status` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `subject_id`, `title`, `image`, `message`, `amount`, `status`, `zoin_status`, `created_at`) VALUES
(1, 'ZVR001', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/merchant_bal.png', 'Merchant point 500 added successfully', '500', 0, 'IN', '2018-03-12 00:38:54'),
(2, 'ZVR001', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/logout.png', 'MERID-ZVR001 logged out.', NULL, 0, NULL, '2018-03-12 00:39:07'),
(3, 'ZVR001', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/logout.png', 'MERID-ZVR001 logged out.', NULL, 0, NULL, '2018-03-12 00:39:11'),
(4, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/merchant_bal.png', 'Merchant point 500 added successfully', '500', 0, 'IN', '2018-03-12 00:41:28'),
(5, 'ZVR001', '', NULL, 'http://zoin.in/feature_image/submit.png', 'MERID-ZVR001 Approved.', '', 0, NULL, '2018-03-12 00:45:15'),
(6, 'ZVR001', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR001 logged in.', NULL, 0, NULL, '2018-03-12 00:45:51'),
(7, 'ZVR002', '', NULL, 'http://zoin.in/feature_image/submit.png', 'MERID-ZVR002 Approved.', '', 0, NULL, '2018-03-12 00:47:56'),
(8, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-12 00:48:47'),
(9, 'ZVR001', 'ZLTY001', NULL, 'http://zoin.in/zoin/public/images/notification/loyalty_submit.png', 'MERID-ZVR001 submitted | LTYID-ZLTY001 successfully', NULL, 0, NULL, '2018-03-12 00:49:24'),
(10, 'ZVR002', 'ZLTY002', NULL, 'http://zoin.in/zoin/public/images/notification/loyalty_submit.png', 'MERID-ZVR002 submitted | LTYID-ZLTY002 successfully', NULL, 0, NULL, '2018-03-12 00:49:28'),
(11, 'ZVR001', 'ZLTY001', NULL, 'http://zoin.in/zoin/public/images/notification/loyalty_submit.png', 'MERID-ZVR001 active | LTYID-ZLTY001 successfully.', '', 0, NULL, '2018-03-12 00:50:24'),
(12, 'ZVR001', 'ZLTY001', NULL, 'http://zoin.in/zoin/public/images/notification/loyalty_active.png', 'MERID-ZVR001 activated | LTYID-ZLTY001 successfully', NULL, 0, NULL, '2018-03-12 00:50:57'),
(13, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/edit_profile.png', 'MERID-ZVR002 edited Tag successfully', NULL, 0, NULL, '2018-03-12 00:51:12'),
(14, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/edit_profile.png', 'MERID-ZVR002 edited Tag successfully', NULL, 0, NULL, '2018-03-12 00:51:46'),
(15, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/edit_profile.png', 'MERID-ZVR002 edited Tag successfully', NULL, 0, NULL, '2018-03-12 00:51:56'),
(16, 'ZVR002', 'ZLTY002', NULL, 'http://zoin.in/zoin/public/images/notification/loyalty_submit.png', 'MERID-ZVR002 activated | LTYID-ZLTY002 successfully.', '', 0, NULL, '2018-03-12 00:53:05'),
(17, 'ZVR002', 'ZLTY002', NULL, 'http://zoin.in/zoin/public/images/notification/loyalty_submit.png', 'MERID-ZVR002 active | LTYID-ZLTY002 successfully.', '', 0, NULL, '2018-03-12 00:53:15'),
(18, 'ZVR002', 'ZLTY002', NULL, 'http://zoin.in/zoin/public/images/notification/loyalty_active.png', 'MERID-ZVR002 activated | LTYID-ZLTY002 successfully', NULL, 0, NULL, '2018-03-12 00:53:26'),
(19, 'ZUR001', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'Login successful', NULL, 0, NULL, '2018-03-12 00:54:32'),
(20, 'ZUR001', 'CL7580', NULL, 'http://zoin.in/zoin/public/images/notification/redeem_code.png', 'Redeem code created successfully', NULL, 0, NULL, '2018-03-12 01:02:10'),
(21, 'ZVR001', 'ZTN001', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR001 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-03-12 01:02:51'),
(22, 'ZVR001', 'ZTN002', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR001 redeemed | LTYID-ZLTY001 successfully', '200', 0, NULL, '2018-03-12 01:03:47'),
(23, 'ZVR001', 'ZTN003', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR001 redeemed | LTYID-ZLTY001 successfully', '300', 0, NULL, '2018-03-12 01:04:31'),
(24, 'ZUR001', 'ZTN003', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'MERID-ZVR001 added | 50 Zoin by USRID-ZUR001 successfully', '+50', 0, 'IN', '2018-03-12 01:04:31'),
(25, 'ZVR001', 'ZTN003', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'MERID-ZVR001 deducted | 50 Zoin by USRID-ZUR001 successfully', '-50', 0, 'OUT', '2018-03-12 01:04:31'),
(26, 'ZUR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'Login successful', NULL, 0, NULL, '2018-03-12 01:08:52'),
(27, 'ZUR002', 'TE5976', NULL, 'http://zoin.in/zoin/public/images/notification/redeem_code.png', 'Redeem code created successfully', NULL, 0, NULL, '2018-03-12 01:10:44'),
(28, 'ZVR002', 'ZTN004', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR002 redeemed | LTYID-ZLTY002 successfully', '100', 0, NULL, '2018-03-12 01:11:41'),
(29, 'ZVR002', 'ZTN005', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR002 redeemed | LTYID-ZLTY002 successfully', '2000', 0, NULL, '2018-03-12 01:12:35'),
(30, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-12 06:44:19'),
(31, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-12 06:44:40'),
(32, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-12 06:47:55'),
(33, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-12 06:50:27'),
(34, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-12 06:51:57'),
(35, 'ZVR001', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/logout.png', 'MERID-ZVR001 logged out.', NULL, 0, NULL, '2018-03-12 06:53:29'),
(36, 'ZVR001', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR001 logged in.', NULL, 0, NULL, '2018-03-12 06:54:01'),
(37, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-12 06:59:33'),
(38, 'ZVR001', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR001 logged in.', NULL, 0, NULL, '2018-03-12 07:00:05'),
(39, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-12 07:01:26'),
(40, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-12 07:02:33'),
(41, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-12 07:04:14'),
(42, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-12 07:16:07'),
(43, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-12 07:18:46'),
(44, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-12 07:19:38'),
(45, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-12 07:51:40'),
(46, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/logout.png', 'MERID-ZVR002 logged out.', NULL, 0, NULL, '2018-03-12 07:51:44'),
(47, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-12 07:52:13'),
(48, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/logout.png', 'MERID-ZVR002 logged out.', NULL, 0, NULL, '2018-03-12 07:52:20'),
(49, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-13 03:56:30'),
(50, 'ZUR001', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'Login successful', NULL, 0, NULL, '2018-03-13 06:05:22'),
(51, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-13 22:59:51'),
(52, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-13 23:04:47'),
(53, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-13 23:05:02'),
(54, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-13 23:05:52'),
(55, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-13 23:09:41'),
(56, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-13 23:47:43'),
(57, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-13 23:52:37'),
(58, 'ZVR003', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/merchant_bal.png', 'Merchant point 500 added successfully', '500', 0, 'IN', '2018-03-14 00:07:19'),
(59, 'ZUR001', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'Login successful', NULL, 0, NULL, '2018-03-15 10:43:07'),
(60, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-15 23:01:32'),
(61, 'ZUR003', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'Login successful', NULL, 0, NULL, '2018-03-16 00:53:11'),
(62, 'ZUR003', 'DT9981', NULL, 'http://zoin.in/zoin/public/images/notification/redeem_code.png', 'Redeem code created successfully', NULL, 0, NULL, '2018-03-16 00:55:04'),
(63, 'ZVR002', 'ZTN006', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR003 redeemed | LTYID-ZLTY002 successfully', '200', 0, NULL, '2018-03-16 00:57:48'),
(64, 'ZVR002', 'ZTN007', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR003 redeemed | LTYID-ZLTY002 successfully', '500', 0, NULL, '2018-03-16 00:58:33'),
(65, 'ZVR002', 'ZTN008', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR003 redeemed | LTYID-ZLTY002 successfully', '500', 0, NULL, '2018-03-16 00:59:29'),
(66, 'ZUR003', 'ZTN008', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'MERID-ZVR002 added | 100 Zoin by USRID-ZUR003 successfully', '+100', 0, 'IN', '2018-03-16 00:59:29'),
(67, 'ZVR002', 'ZTN008', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'MERID-ZVR002 deducted | 100 Zoin by USRID-ZUR003 successfully', '-100', 0, 'OUT', '2018-03-16 00:59:29'),
(68, 'ZVR002', 'ZTN009', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR003 redeemed | LTYID-ZLTY002 successfully', '200', 0, NULL, '2018-03-16 01:06:28'),
(69, 'ZVR002', 'ZTN010', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR003 redeemed | LTYID-ZLTY002 successfully', '300', 0, NULL, '2018-03-16 01:07:50'),
(70, 'ZVR002', 'ZTN011', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR003 redeemed | LTYID-ZLTY002 successfully', '400', 0, NULL, '2018-03-16 01:09:16'),
(71, 'ZUR003', 'ZTN011', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'MERID-ZVR002 added | 100 Zoin by USRID-ZUR003 successfully', '+100', 0, 'IN', '2018-03-16 01:09:16'),
(72, 'ZVR002', 'ZTN011', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'MERID-ZVR002 deducted | 100 Zoin by USRID-ZUR003 successfully', '-100', 0, 'OUT', '2018-03-16 01:09:18'),
(73, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-16 01:16:21'),
(74, 'ZVR002', 'ZTN012', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR003 redeemed | LTYID-ZLTY002 successfully', '300', 0, NULL, '2018-03-16 01:17:50'),
(75, 'ZVR002', 'ZTN013', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR003 redeemed | LTYID-ZLTY002 successfully', '500', 0, NULL, '2018-03-16 01:20:06'),
(76, 'ZVR002', 'ZTN014', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR003 redeemed | LTYID-ZLTY002 successfully', '200', 0, NULL, '2018-03-16 01:20:49'),
(77, 'ZUR003', 'ZTN014', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'MERID-ZVR002 added | 100 Zoin by USRID-ZUR003 successfully', '+100', 0, 'IN', '2018-03-16 01:20:49'),
(78, 'ZVR002', 'ZTN014', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'MERID-ZVR002 deducted | 100 Zoin by USRID-ZUR003 successfully', '-100', 0, 'OUT', '2018-03-16 01:20:50'),
(79, 'ZVR002', 'ZTN015', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR003 redeemed | LTYID-ZLTY002 successfully', '300', 0, NULL, '2018-03-16 01:32:49'),
(80, 'ZVR002', 'ZTN016', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR003 redeemed | LTYID-ZLTY002 successfully', '300', 0, NULL, '2018-03-16 01:33:35'),
(81, 'ZVR002', 'ZTN017', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR003 redeemed | LTYID-ZLTY002 successfully', '500', 0, NULL, '2018-03-16 01:38:48'),
(82, 'ZUR003', 'ZTN017', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'MERID-ZVR002 added | 100 Zoin by USRID-ZUR003 successfully', '+100', 0, 'IN', '2018-03-16 01:38:48'),
(83, 'ZVR002', 'ZTN017', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'MERID-ZVR002 deducted | 100 Zoin by USRID-ZUR003 successfully', '-100', 0, 'OUT', '2018-03-16 01:38:48'),
(84, 'ZVR001', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR001 logged in.', NULL, 0, NULL, '2018-03-16 02:00:19'),
(85, 'ZVR002', 'ZTN018', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR003 redeemed | LTYID-ZLTY002 successfully', '500', 0, NULL, '2018-03-16 04:51:40'),
(86, 'ZVR002', 'ZTN019', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR003 redeemed | LTYID-ZLTY002 successfully', '200', 0, NULL, '2018-03-16 04:52:28'),
(87, 'ZVR002', 'ZTN020', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'USRID-ZUR003 redeemed | LTYID-ZLTY002 successfully', '500', 0, NULL, '2018-03-16 04:53:16'),
(88, 'ZUR003', 'ZTN020', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'MERID-ZVR002 added | 100 Zoin by USRID-ZUR003 successfully', '+100', 0, 'IN', '2018-03-16 04:53:16'),
(89, 'ZVR002', 'ZTN020', NULL, 'http://zoin.in/zoin/public/images/notification/transaction.png', 'MERID-ZVR002 deducted | 100 Zoin by USRID-ZUR003 successfully', '-100', 0, 'OUT', '2018-03-16 04:53:16'),
(90, 'ZUR003', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'Login successful', NULL, 0, NULL, '2018-03-16 07:09:52'),
(91, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-19 04:38:31'),
(92, 'ZUR001', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/logout.png', 'Logout successful', NULL, 0, NULL, '2018-03-19 06:05:15'),
(93, 'ZVR001', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/logout.png', 'MERID-ZVR001 logged out.', NULL, 0, NULL, '2018-03-19 06:05:31'),
(94, 'ZVR001', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR001 logged in.', NULL, 0, NULL, '2018-03-19 22:29:21'),
(95, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/logout.png', 'MERID-ZVR002 logged out.', NULL, 0, NULL, '2018-03-19 23:51:02'),
(96, 'ZVR004', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/merchant_bal.png', 'Merchant point 500 added successfully', '500', 0, 'IN', '2018-03-19 23:53:05'),
(97, 'ZVR004', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/logout.png', 'MERID-ZVR004 logged out.', NULL, 0, NULL, '2018-03-20 03:28:57'),
(98, 'ZVR005', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/merchant_bal.png', 'Merchant point 500 added successfully', '500', 0, 'IN', '2018-03-20 03:31:30'),
(99, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-20 03:32:06'),
(100, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-21 01:15:41'),
(101, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-21 03:47:57'),
(102, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-21 03:50:57'),
(103, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 00:58:57'),
(104, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 01:05:57'),
(105, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 01:07:49'),
(106, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 01:10:36'),
(107, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 01:12:08'),
(108, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 01:22:31'),
(109, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 01:32:09'),
(110, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 01:38:09'),
(111, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 01:45:44'),
(112, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 02:04:54'),
(113, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 02:06:42'),
(114, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 02:19:56'),
(115, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 02:21:08'),
(116, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 02:21:47'),
(117, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 02:21:47'),
(118, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 02:22:57'),
(119, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 02:24:29'),
(120, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 02:24:35'),
(121, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 02:24:38'),
(122, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 02:26:23'),
(123, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 02:26:38'),
(124, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 02:27:45'),
(125, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 04:38:19'),
(126, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 04:39:59'),
(127, 'ZUR001', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'Login successful', NULL, 0, NULL, '2018-03-22 04:55:27'),
(128, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 10:46:11'),
(129, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 10:48:56'),
(130, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 11:06:12'),
(131, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 11:12:58'),
(132, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 11:16:01'),
(133, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 11:30:51'),
(134, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 11:33:17'),
(135, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-22 21:30:25'),
(136, 'ZVR001', '', NULL, 'http://zoin.in/feature_image/submit.png', 'MERID-ZVR001 edited Tag successfully', '', 0, '', '0000-00-00 00:00:00'),
(137, 'ZVR001', '', NULL, 'http://zoin.in/feature_image/submit.png', 'MERID-ZVR001 edited company description successfully.', '', 0, '', '0000-00-00 00:00:00'),
(138, 'ZVR001', '', NULL, 'http://zoin.in/feature_image/submit.png', 'MERID-ZVR001 edited company description successfully.', '', 0, '', '0000-00-00 00:00:00'),
(139, 'ZUR004', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'Login successful', NULL, 0, NULL, '2018-03-23 05:02:10'),
(140, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-26 01:26:39'),
(141, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/logout.png', 'MERID-ZVR002 logged out.', NULL, 0, NULL, '2018-03-26 01:26:45'),
(142, 'ZVR006', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/merchant_bal.png', 'Merchant point 500 added successfully', '500', 0, 'IN', '2018-03-26 06:02:15'),
(143, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-26 06:02:58'),
(144, 'ZVR007', '', NULL, 'http://zoin.in/zoin/public/images/notification/merchant_bal.png', 'MERID- point 500 added successfully.', '500', 0, 'IN', '2018-03-27 00:11:14'),
(145, 'ZVR007', '', NULL, 'http://zoin.in/zoin/public/images/notification/merchant_bal.png', 'MERID- point 500 added successfully.', '500', 0, 'IN', '2018-03-27 01:39:01'),
(146, 'ZVR007', '', NULL, 'http://zoin.in/feature_image/submit.png', 'MERID-ZVR007 edited Tag successfully', '', 0, '', '0000-00-00 00:00:00'),
(147, 'ZVR007', '', NULL, 'http://zoin.in/feature_image/submit.png', 'MERID-ZVR007 Approved.', '', 0, '', '2018-03-27 01:52:44'),
(148, 'ZVR007', '', NULL, 'http://zoin.in/feature_image/submit.png', 'MERID-ZVR007 Pending.', '', 0, '', '2018-03-27 01:52:51'),
(149, 'ZVR007', '', NULL, 'http://zoin.in/feature_image/submit.png', 'MERID-ZVR007 UnApproved.', '', 0, '', '2018-03-27 01:52:56'),
(150, 'ZVR007', '', NULL, 'http://zoin.in/feature_image/submit.png', 'MERID-ZVR007 Blocked.', '', 0, '', '2018-03-27 01:53:01'),
(151, 'ZVR007', '', NULL, 'http://zoin.in/feature_image/submit.png', 'MERID-ZVR007 Approved.', '', 0, '', '2018-03-27 01:53:06'),
(152, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-28 01:14:32'),
(153, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-28 03:49:19'),
(154, 'ZVR002', NULL, NULL, 'http://zoin.in/zoin/public/images/notification/login.png', 'MERID-ZVR002 logged in.', NULL, 0, NULL, '2018-03-28 04:00:09'),
(155, 'ZVR001', 'ZTN022', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 03:53:45'),
(156, 'ZVR001', 'ZTN023', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 03:54:42'),
(157, 'ZVR001', 'ZTN024', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 03:55:29'),
(158, 'ZVR001', 'ZTN025', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 03:57:06'),
(159, 'ZUR004', 'ZTN025', 'ZOIN EARN', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'MERID-ZVR001 added | 50 Zoin by USRID-ZUR004 successfully', '+50', 0, 'IN', '2018-04-13 03:57:07'),
(160, 'ZVR001', 'ZTN025', 'ZOIN SPENT', 'http://localhost/zoin-v2/public/images/notification/zoin_spent.png', 'MERID-ZVR001 deducted | 50 Zoin by USRID-ZUR004 successfully', '-50', 0, 'OUT', '2018-04-13 03:57:07'),
(161, 'ZVR001', 'ZTN026', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 03:58:09'),
(162, 'ZVR001', 'ZTN027', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 03:59:09'),
(163, 'ZVR001', 'ZTN028', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 04:01:53'),
(164, 'ZVR001', 'ZTN029', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 05:41:04'),
(165, 'ZVR001', 'ZTN030', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 05:46:30'),
(166, 'ZUR004', 'ZTN030', 'ZOIN EARN', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'MERID-ZVR001 added | 50 Zoin by USRID-ZUR004 successfully', '+50', 0, 'IN', '2018-04-13 05:46:30'),
(167, 'ZVR001', 'ZTN030', 'ZOIN SPENT', 'http://localhost/zoin-v2/public/images/notification/zoin_spent.png', 'MERID-ZVR001 deducted | 50 Zoin by USRID-ZUR004 successfully', '-50', 0, 'OUT', '2018-04-13 05:46:30'),
(168, 'ZVR001', 'ZTN031', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 06:41:43'),
(169, 'ZUR004', 'ZTN031', 'ZOIN EARN', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'MERID-ZVR001 added | 50 Zoin by USRID-ZUR004 successfully', '+50', 0, 'IN', '2018-04-13 06:41:43'),
(170, 'ZVR001', 'ZTN031', 'ZOIN SPENT', 'http://localhost/zoin-v2/public/images/notification/zoin_spent.png', 'MERID-ZVR001 deducted | 50 Zoin by USRID-ZUR004 successfully', '-50', 0, 'OUT', '2018-04-13 06:41:44'),
(171, 'ZVR001', 'ZTN032', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 06:44:13'),
(172, 'ZUR004', 'ZTN032', 'ZOIN EARN', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'MERID-ZVR001 added | 50 Zoin by USRID-ZUR004 successfully', '+50', 0, 'IN', '2018-04-13 06:44:13'),
(173, 'ZVR001', 'ZTN032', 'ZOIN SPENT', 'http://localhost/zoin-v2/public/images/notification/zoin_spent.png', 'MERID-ZVR001 deducted | 50 Zoin by USRID-ZUR004 successfully', '-50', 0, 'OUT', '2018-04-13 06:44:14'),
(174, 'ZVR001', 'ZTN033', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 06:52:19'),
(175, 'ZUR004', 'ZTN033', 'ZOIN EARN', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'MERID-ZVR001 added | 50 Zoin by USRID-ZUR004 successfully', '+50', 0, 'IN', '2018-04-13 06:52:19'),
(176, 'ZVR001', 'ZTN033', 'ZOIN SPENT', 'http://localhost/zoin-v2/public/images/notification/zoin_spent.png', 'MERID-ZVR001 deducted | 50 Zoin by USRID-ZUR004 successfully', '-50', 0, 'OUT', '2018-04-13 06:52:20'),
(177, 'ZVR001', 'ZTN034', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 06:57:00'),
(178, 'ZUR004', 'ZTN034', 'ZOIN EARN', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'MERID-ZVR001 added | 50 Zoin by USRID-ZUR004 successfully', '+50', 0, 'IN', '2018-04-13 06:57:01'),
(179, 'ZVR001', 'ZTN034', 'ZOIN SPENT', 'http://localhost/zoin-v2/public/images/notification/zoin_spent.png', 'MERID-ZVR001 deducted | 50 Zoin by USRID-ZUR004 successfully', '-50', 0, 'OUT', '2018-04-13 06:57:01'),
(180, 'ZVR001', 'ZTN035', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 06:58:59'),
(181, 'ZUR004', 'ZTN035', 'ZOIN EARN', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'MERID-ZVR001 added | 50 Zoin by USRID-ZUR004 successfully', '+50', 0, 'IN', '2018-04-13 06:58:59'),
(182, 'ZVR001', 'ZTN035', 'ZOIN SPENT', 'http://localhost/zoin-v2/public/images/notification/zoin_spent.png', 'MERID-ZVR001 deducted | 50 Zoin by USRID-ZUR004 successfully', '-50', 0, 'OUT', '2018-04-13 06:58:59'),
(183, 'ZVR001', 'ZTN036', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 06:59:04'),
(184, 'ZUR004', 'ZTN036', 'ZOIN EARN', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'MERID-ZVR001 added | 50 Zoin by USRID-ZUR004 successfully', '+50', 0, 'IN', '2018-04-13 06:59:04'),
(185, 'ZVR001', 'ZTN036', 'ZOIN SPENT', 'http://localhost/zoin-v2/public/images/notification/zoin_spent.png', 'MERID-ZVR001 deducted | 50 Zoin by USRID-ZUR004 successfully', '-50', 0, 'OUT', '2018-04-13 06:59:04'),
(186, 'ZVR001', 'ZTN037', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 06:59:08'),
(187, 'ZVR001', 'ZTN038', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 06:59:12'),
(188, 'ZVR001', 'ZTN039', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 07:12:19'),
(189, 'ZUR004', 'ZTN039', 'ZOIN EARN', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'MERID-ZVR001 added | 50 Zoin by USRID-ZUR004 successfully', '+50', 0, 'IN', '2018-04-13 07:12:20'),
(190, 'ZVR001', 'ZTN039', 'ZOIN SPENT', 'http://localhost/zoin-v2/public/images/notification/zoin_spent.png', 'MERID-ZVR001 deducted | 50 Zoin by USRID-ZUR004 successfully', '-50', 0, 'OUT', '2018-04-13 07:12:20'),
(191, 'ZVR001', 'ZTN040', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 07:15:31'),
(192, 'ZVR001', 'ZTN041', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 07:16:18'),
(193, 'ZUR004', 'ZTN041', 'ZOIN EARN', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'MERID-ZVR001 added | 50 Zoin by USRID-ZUR004 successfully', '+50', 0, 'IN', '2018-04-13 07:16:19'),
(194, 'ZVR001', 'ZTN041', 'ZOIN SPENT', 'http://localhost/zoin-v2/public/images/notification/zoin_spent.png', 'MERID-ZVR001 deducted | 50 Zoin by USRID-ZUR004 successfully', '-50', 0, 'OUT', '2018-04-13 07:16:19'),
(195, 'ZVR001', 'ZTN042', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 07:18:01'),
(196, 'ZVR001', 'ZTN043', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 07:18:04'),
(197, 'ZVR001', 'ZTN044', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 07:18:06'),
(198, 'ZVR001', 'ZTN045', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 07:18:29'),
(199, 'ZVR001', 'ZTN046', 'TRANSACTION', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'USRID-ZUR004 redeemed | LTYID-ZLTY001 successfully', '100', 0, NULL, '2018-04-13 07:18:57'),
(200, 'ZUR004', 'ZTN046', 'ZOIN EARN', 'http://localhost/zoin-v2/public/images/notification/transaction.png', 'MERID-ZVR001 added | 50 Zoin by USRID-ZUR004 successfully', '+50', 0, 'IN', '2018-04-13 07:18:57'),
(201, 'ZVR001', 'ZTN046', 'ZOIN SPENT', 'http://localhost/zoin-v2/public/images/notification/zoin_spent.png', 'MERID-ZVR001 deducted | 50 Zoin by USRID-ZUR004 successfully', '-50', 0, 'OUT', '2018-04-13 07:18:57'),
(202, 'ZVR001', NULL, 'Edit Tag', 'http://localhost/zoin-v2/public/images/notification/edit_profile.png', 'MERID-ZVR001 edited company tags successfully', NULL, 0, NULL, '2018-05-08 03:50:13'),
(203, 'ZVR001', NULL, 'Edit Tag', 'http://localhost/zoin-v2/public/images/notification/edit_profile.png', 'MERID-ZVR001 edited company tags successfully', NULL, 0, NULL, '2018-05-08 04:03:23'),
(204, 'ZUR005', NULL, 'Login', 'http://192.168.0.110/zoin-v2/public/images/notification/login.png', 'Login successful', NULL, 0, NULL, '2018-05-21 02:16:46'),
(205, 'ZUR005', NULL, 'Login', 'http://192.168.0.110/zoin-v2/public/images/notification/login.png', 'Login successful', NULL, 0, NULL, '2018-05-22 06:13:51'),
(206, 'ZUR006', NULL, 'Login', 'http://192.168.0.110/zoin-v2/public/images/notification/login.png', 'Login successful', NULL, 0, NULL, '2018-05-25 23:05:29'),
(207, 'ZUR007', NULL, 'Login', 'http://192.168.0.110/zoin-v2/public/images/notification/login.png', 'Login successful', NULL, 0, NULL, '2018-05-25 23:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `postcode`
--

CREATE TABLE `postcode` (
  `postcode` varchar(12) DEFAULT NULL,
  `area` varchar(80) DEFAULT NULL,
  `city` varchar(80) DEFAULT NULL,
  `state` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `redeem_code`
--

CREATE TABLE `redeem_code` (
  `id` int(11) NOT NULL,
  `vendor_id` varchar(25) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `loyalty_id` varchar(28) NOT NULL,
  `redeem_code` varchar(10) NOT NULL,
  `qr_code_img` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(12) NOT NULL,
  `mer_mobile_number` varchar(12) DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `user_checkin` varchar(10) NOT NULL DEFAULT '0',
  `user_balance` double(10,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `redeem_code`
--

INSERT INTO `redeem_code` (`id`, `vendor_id`, `user_id`, `loyalty_id`, `redeem_code`, `qr_code_img`, `mobile_number`, `mer_mobile_number`, `status`, `user_checkin`, `user_balance`) VALUES
(1, 'ZVR002', 'ZUR004', 'ZLTY002', 'EW6719', NULL, '9894571615', '9566425554', 0, '0', 0.00),
(2, 'ZVR001', 'ZUR004', 'ZLTY001', 'EL0936', '1523623738-EL0936.png', '9894571615', '9585537309', 0, '5', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tag_merchants`
--

CREATE TABLE `tag_merchants` (
  `id` int(11) UNSIGNED NOT NULL,
  `vendor_id` varchar(25) NOT NULL,
  `tag_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tag_merchants`
--

INSERT INTO `tag_merchants` (`id`, `vendor_id`, `tag_id`) VALUES
(1, 'ZVR002', 1),
(3, 'ZVR002', 3),
(5, 'ZVR007', 5),
(6, 'ZVR007', 6),
(7, 'ZVR007', 7),
(8, 'ZVR001', 1),
(9, 'ZVR001', 2),
(10, 'ZVR001', 3),
(11, 'ZVR001', 4),
(12, 'ZVR001', 5),
(13, 'ZVR001', 6),
(14, 'ZVR001', 7);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(15) UNSIGNED NOT NULL,
  `transaction_id` varchar(30) NOT NULL,
  `completed_id` varchar(50) DEFAULT NULL,
  `vendor_id` varchar(30) DEFAULT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `transaction_type` varchar(20) DEFAULT NULL,
  `transaction_status` varchar(20) DEFAULT NULL,
  `loyalty_id` varchar(28) NOT NULL,
  `user_checkin` int(2) DEFAULT NULL,
  `bill_path` varchar(400) DEFAULT NULL,
  `user_bill_amount` int(8) DEFAULT NULL,
  `last_checkin_data` date DEFAULT NULL,
  `creation_date` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_id`, `completed_id`, `vendor_id`, `user_id`, `transaction_type`, `transaction_status`, `loyalty_id`, `user_checkin`, `bill_path`, `user_bill_amount`, `last_checkin_data`, `creation_date`, `status`) VALUES
(1, 'ZTN001', '', 'ZVR001', 'ZUR001', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://zoin.in/zoin/public/images/1520836371.bmp', 100, NULL, '2018-03-12 01:02:51', 1),
(2, 'ZTN002', '', 'ZVR001', 'ZUR001', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://zoin.in/zoin/public/images/1520836427.bmp', 200, NULL, '2018-03-12 01:03:47', 1),
(3, 'ZTN003', '', 'ZVR001', 'ZUR001', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://zoin.in/zoin/public/images/1520836471.bmp', 300, NULL, '2018-03-12 01:04:31', 1),
(4, 'ZTN004', '', 'ZVR002', 'ZUR002', 'ZOIN', 'Approved', 'ZLTY002', 1, 'http://zoin.in/zoin/public/images/1520836901.bmp', 100, NULL, '2018-03-12 01:11:41', 0),
(5, 'ZTN005', '', 'ZVR002', 'ZUR002', 'ZOIN', 'Approved', 'ZLTY002', 1, 'http://zoin.in/zoin/public/images/1520836954.bmp', 2000, NULL, '2018-03-12 01:12:35', 1),
(6, 'ZTN006', '', 'ZVR002', 'ZUR003', 'ZOIN', 'Approved', 'ZLTY002', 1, 'http://zoin.in/zoin/public/images/1521181667.bmp', 200, NULL, '2018-03-16 00:57:47', 1),
(7, 'ZTN007', '', 'ZVR002', 'ZUR003', 'ZOIN', 'Approved', 'ZLTY002', 1, 'http://zoin.in/zoin/public/images/1521181712.bmp', 500, NULL, '2018-03-16 00:58:33', 1),
(8, 'ZTN008', '', 'ZVR002', 'ZUR003', 'ZOIN', 'Approved', 'ZLTY002', 1, 'http://zoin.in/zoin/public/images/1521181768.bmp', 500, NULL, '2018-03-16 00:59:28', 1),
(9, 'ZTN009', '', 'ZVR002', 'ZUR003', 'ZOIN', 'Approved', 'ZLTY002', 1, 'http://zoin.in/zoin/public/images/1521182187.bmp', 200, NULL, '2018-03-16 01:06:27', 1),
(10, 'ZTN010', '', 'ZVR002', 'ZUR003', 'ZOIN', 'Approved', 'ZLTY002', 1, 'http://zoin.in/zoin/public/images/1521182269.bmp', 300, NULL, '2018-03-16 01:07:49', 1),
(11, 'ZTN011', '', 'ZVR002', 'ZUR003', 'ZOIN', 'Approved', 'ZLTY002', 1, 'http://zoin.in/zoin/public/images/1521182355.bmp', 400, NULL, '2018-03-16 01:09:15', 1),
(12, 'ZTN012', '', 'ZVR002', 'ZUR003', 'ZOIN', 'Approved', 'ZLTY002', 1, 'http://zoin.in/zoin/public/images/1521182869.bmp', 300, NULL, '2018-03-16 01:17:49', 1),
(13, 'ZTN013', '', 'ZVR002', 'ZUR003', 'ZOIN', 'Approved', 'ZLTY002', 1, 'http://zoin.in/zoin/public/images/1521183005.bmp', 500, NULL, '2018-03-16 01:20:06', 1),
(14, 'ZTN014', '', 'ZVR002', 'ZUR003', 'ZOIN', 'Approved', 'ZLTY002', 1, 'http://zoin.in/zoin/public/images/1521183048.bmp', 200, NULL, '2018-03-16 01:20:49', 1),
(15, 'ZTN015', '', 'ZVR002', 'ZUR003', 'ZOIN', 'Approved', 'ZLTY002', 1, 'http://zoin.in/zoin/public/images/1521183768.bmp', 300, NULL, '2018-03-16 01:32:48', 1),
(16, 'ZTN016', '', 'ZVR002', 'ZUR003', 'ZOIN', 'Approved', 'ZLTY002', 1, 'http://zoin.in/zoin/public/images/1521183815.bmp', 300, NULL, '2018-03-16 01:33:35', 1),
(17, 'ZTN017', '', 'ZVR002', 'ZUR003', 'ZOIN', 'Approved', 'ZLTY002', 1, 'http://zoin.in/zoin/public/images/1521184127.bmp', 500, NULL, '2018-03-16 01:38:47', 1),
(18, 'ZTN018', '', 'ZVR002', 'ZUR003', 'ZOIN', 'Approved', 'ZLTY002', 1, 'http://zoin.in/zoin/public/images/1521195700.bmp', 500, NULL, '2018-03-16 04:51:40', 1),
(19, 'ZTN019', '', 'ZVR002', 'ZUR003', 'ZOIN', 'Approved', 'ZLTY002', 1, 'http://zoin.in/zoin/public/images/1521195747.bmp', 200, NULL, '2018-03-16 04:52:28', 1),
(20, 'ZTN020', '', 'ZVR002', 'ZUR003', 'ZOIN', 'Approved', 'ZLTY002', 1, 'http://zoin.in/zoin/public/images/1521195795.bmp', 500, NULL, '2018-03-16 04:53:15', 1),
(21, 'ZTN021', 'ZCD003', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://localhost/zoin-v2/public/images/1523611348.bmp', 100, NULL, '2018-04-13 03:52:28', 1),
(22, 'ZTN022', 'ZCD003', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://localhost/zoin-v2/public/images/1523611425.bmp', 100, NULL, '2018-04-13 03:53:45', 1),
(23, 'ZTN023', 'ZCD003', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://localhost/zoin-v2/public/images/1523611482.bmp', 100, NULL, '2018-04-13 03:54:42', 1),
(24, 'ZTN024', 'ZCD003', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://localhost/zoin-v2/public/images/1523611529.bmp', 100, NULL, '2018-04-13 03:55:29', 1),
(25, 'ZTN025', 'ZCD003', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://localhost/zoin-v2/public/images/1523611626.bmp', 100, NULL, '2018-04-13 03:57:06', 1),
(26, 'ZTN026', 'ZCD003', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 0, 'http://localhost/zoin-v2/public/images/1523611688.bmp', 100, NULL, '2018-04-13 03:58:09', 1),
(27, 'ZTN027', 'ZCD003', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 0, 'http://localhost/zoin-v2/public/images/1523611749.bmp', 100, NULL, '2018-04-13 03:59:09', 1),
(28, 'ZTN028', 'ZCD003', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 0, 'http://localhost/zoin-v2/public/images/1523611913.bmp', 100, NULL, '2018-04-13 04:01:53', 1),
(29, 'ZTN029', 'ZCD003', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 0, 'http://localhost/zoin-v2/public/images/1523617864.bmp', 100, NULL, '2018-04-13 05:41:04', 1),
(30, 'ZTN030', 'ZCD003', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 0, 'http://localhost/zoin-v2/public/images/1523618189.bmp', 100, NULL, '2018-04-13 05:46:29', 1),
(31, 'ZTN031', 'ZCD003', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 0, 'http://localhost/zoin-v2/public/images/1523621503.bmp', 100, NULL, '2018-04-13 06:41:43', 1),
(32, 'ZTN032', 'ZCD003', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 0, 'http://localhost/zoin-v2/public/images/1523621653.bmp', 100, NULL, '2018-04-13 06:44:13', 1),
(33, 'ZTN033', 'ZCD003', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 0, 'http://localhost/zoin-v2/public/images/1523622138.bmp', 100, NULL, '2018-04-13 06:52:19', 1),
(34, 'ZTN034', 'ZCD003', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://localhost/zoin-v2/public/images/1523622420.bmp', 100, NULL, '2018-04-13 06:57:00', 1),
(35, 'ZTN035', 'ZCD003', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://localhost/zoin-v2/public/images/1523622538.bmp', 100, NULL, '2018-04-13 06:58:58', 1),
(36, 'ZTN036', 'ZCD003', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://localhost/zoin-v2/public/images/1523622544.bmp', 100, NULL, '2018-04-13 06:59:04', 1),
(37, 'ZTN037', 'ZCD005', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://localhost/zoin-v2/public/images/1523622548.bmp', 100, NULL, '2018-04-13 06:59:08', 1),
(38, 'ZTN038', 'ZCD005', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://localhost/zoin-v2/public/images/1523622551.bmp', 100, NULL, '2018-04-13 06:59:11', 1),
(39, 'ZTN039', 'ZCD005', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://localhost/zoin-v2/public/images/1523623339.bmp', 100, NULL, '2018-04-13 07:12:19', 1),
(40, 'ZTN040', 'ZCD005', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://localhost/zoin-v2/public/images/1523623530.bmp', 100, NULL, '2018-04-13 07:15:30', 1),
(41, 'ZTN041', 'ZCD005', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://localhost/zoin-v2/public/images/1523623578.bmp', 100, NULL, '2018-04-13 07:16:18', 1),
(42, 'ZTN042', 'ZCD006', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://localhost/zoin-v2/public/images/1523623681.bmp', 100, NULL, '2018-04-13 07:18:01', 1),
(43, 'ZTN043', 'ZCD006', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://localhost/zoin-v2/public/images/1523623684.bmp', 100, NULL, '2018-04-13 07:18:04', 1),
(44, 'ZTN044', 'ZCD006', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://localhost/zoin-v2/public/images/1523623686.bmp', 100, NULL, '2018-04-13 07:18:06', 1),
(45, 'ZTN045', 'ZCD006', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://localhost/zoin-v2/public/images/1523623709.bmp', 100, NULL, '2018-04-13 07:18:29', 1),
(46, 'ZTN046', 'ZCD006', 'ZVR001', 'ZUR004', 'ZOIN', 'Approved', 'ZLTY001', 1, 'http://localhost/zoin-v2/public/images/1523623736.bmp', 100, NULL, '2018-04-13 07:18:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(9) UNSIGNED NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `email_id` varchar(150) DEFAULT NULL,
  `mobile_number` varchar(12) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `occupation` varchar(40) DEFAULT NULL,
  `address_id` int(12) DEFAULT NULL,
  `is_email_verified` int(1) UNSIGNED ZEROFILL NOT NULL,
  `profile_image` varchar(250) DEFAULT NULL,
  `badge` varchar(50) DEFAULT NULL,
  `user_level` int(2) UNSIGNED ZEROFILL NOT NULL,
  `user_type` varchar(3) NOT NULL,
  `is_mobile_verified` tinyint(4) NOT NULL DEFAULT '0',
  `is_login_approved` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `full_name`, `username`, `email_id`, `mobile_number`, `date_of_birth`, `occupation`, `address_id`, `is_email_verified`, `profile_image`, `badge`, `user_level`, `user_type`, `is_mobile_verified`, `is_login_approved`) VALUES
(2, 'ZUR002', 'test', 'badman', 'zen@gmail.com', '9566425554', NULL, NULL, 3, 0, '1527314714.bmp', NULL, 01, 'u', 1, 1),
(4, 'ZUR004', 'user tamil', NULL, 'tamil@thegang.in', '9894571615', NULL, NULL, 5, 0, NULL, NULL, 01, 'u', 1, 1),
(5, 'ZUR005', 'Happy labs', 'hitman', 'rangasamy.nplus@gmail.com', '9789108964', NULL, NULL, 9, 0, '1527315659.bmp', NULL, 01, 'u', 1, 1),
(6, 'ZUR006', 'Aachi Restraunt', 'shakthiiman', 'rangasamy.23@gmail.com', '7010179652', NULL, NULL, 7, 0, NULL, NULL, 01, 'u', 1, 1),
(7, 'ZUR007', 'Madurai idly kadai', 'shakthiman', 'rangasamy12321@gmail.com', '9784123560', NULL, NULL, 10, 0, NULL, NULL, 01, 'u', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_mobile_otp`
--

CREATE TABLE `user_mobile_otp` (
  `id` int(11) UNSIGNED NOT NULL,
  `mobile_number` varchar(12) NOT NULL,
  `otp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `version`
--

CREATE TABLE `version` (
  `id` int(11) UNSIGNED NOT NULL,
  `version_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `version`
--

INSERT INTO `version` (`id`, `version_name`, `created_at`) VALUES
(1, '1.0', '2018-02-17 09:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `zoin_balance`
--

CREATE TABLE `zoin_balance` (
  `vendor_or_user_id` varchar(25) NOT NULL,
  `zoin_balance` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zoin_balance`
--

INSERT INTO `zoin_balance` (`vendor_or_user_id`, `zoin_balance`) VALUES
('ZVR001', 9900),
('ZUR004', 100);

-- --------------------------------------------------------

--
-- Table structure for table `zoin_open_balance`
--

CREATE TABLE `zoin_open_balance` (
  `id` int(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zoin_open_balance`
--

INSERT INTO `zoin_open_balance` (`id`, `user_type`, `amount`) VALUES
(1, 'vendor', '500'),
(2, 'user', '500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `business_types`
--
ALTER TABLE `business_types`
  ADD PRIMARY KEY (`business_type`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`mobile_number`);

--
-- Indexes for table `funky_names`
--
ALTER TABLE `funky_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loyalty`
--
ALTER TABLE `loyalty`
  ADD PRIMARY KEY (`loyalty_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `loyalty_balance`
--
ALTER TABLE `loyalty_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loyalty_completed`
--
ALTER TABLE `loyalty_completed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_bank_details`
--
ALTER TABLE `merchant_bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_details`
--
ALTER TABLE `merchant_details`
  ADD PRIMARY KEY (`vendor_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `merchant_feature_details`
--
ALTER TABLE `merchant_feature_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_feature_images`
--
ALTER TABLE `merchant_feature_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_images`
--
ALTER TABLE `merchant_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_social_media`
--
ALTER TABLE `merchant_social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_status`
--
ALTER TABLE `merchant_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_tags`
--
ALTER TABLE `merchant_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redeem_code`
--
ALTER TABLE `redeem_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_merchants`
--
ALTER TABLE `tag_merchants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user_mobile_otp`
--
ALTER TABLE `user_mobile_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zoin_open_balance`
--
ALTER TABLE `zoin_open_balance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `business_types`
--
ALTER TABLE `business_types`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `funky_names`
--
ALTER TABLE `funky_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `loyalty`
--
ALTER TABLE `loyalty`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `loyalty_balance`
--
ALTER TABLE `loyalty_balance`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `loyalty_completed`
--
ALTER TABLE `loyalty_completed`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `merchant_bank_details`
--
ALTER TABLE `merchant_bank_details`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `merchant_details`
--
ALTER TABLE `merchant_details`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `merchant_feature_details`
--
ALTER TABLE `merchant_feature_details`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `merchant_feature_images`
--
ALTER TABLE `merchant_feature_images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `merchant_images`
--
ALTER TABLE `merchant_images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `merchant_social_media`
--
ALTER TABLE `merchant_social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `merchant_status`
--
ALTER TABLE `merchant_status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `merchant_tags`
--
ALTER TABLE `merchant_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;
--
-- AUTO_INCREMENT for table `redeem_code`
--
ALTER TABLE `redeem_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tag_merchants`
--
ALTER TABLE `tag_merchants`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_mobile_otp`
--
ALTER TABLE `user_mobile_otp`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `version`
--
ALTER TABLE `version`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `zoin_open_balance`
--
ALTER TABLE `zoin_open_balance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
