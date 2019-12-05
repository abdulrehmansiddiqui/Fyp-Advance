-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2019 at 12:04 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abdul_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_pass` varchar(30) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_pass`, `admin_name`, `admin_number`) VALUES
(1, 'arehmans@live.com', '123', 'Abdul', 2586336),
(4, 'omer@yahoo.com', '123', 'adf', 300258636);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_author` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `comment`, `comment_author`, `date`) VALUES
(27, 46, 5, 'hey', 'Aimon', '2018-10-25 20:54:00'),
(28, 46, 2, 'hey', 'Abdul Rehman', '2018-12-21 22:17:19'),
(31, 46, 0, 'morning', 'Abdul Rehman', '2018-12-22 13:48:16'),
(42, 46, 0, 'Morning', 'Rida', '2018-12-22 17:35:14'),
(47, 71, 0, 'yes i have', 'Abdul Rehman Siddiqui', '2019-04-25 19:45:52'),
(49, 46, 3, '1986 is best', 'Abdul Rehman Siddiqui', '2019-06-13 14:05:33'),
(50, 76, 3, 'yes im what you want to know ?', 'Abdul Rehman Siddiqui', '2019-06-15 07:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `subject`, `message`, `date`) VALUES
(1, 'Abdul Rehman Siddiqu', 'submit', 'asd', 'aaaa', '2019-07-14 15:28:20'),
(4, 'Omer', 'submit', 'asd', 'aaaa', '2019-07-14 15:52:45'),
(5, '', 'arehmans@live.com', '', '', '2019-07-14 20:30:35'),
(6, '', 'arehmans@live.com', '', '', '2019-07-15 07:37:44'),
(7, '', 'arehmans@live.com', '', '', '2019-07-15 07:41:41'),
(8, '', 'arehmans@live.com', '', '', '2019-07-15 07:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `event_description` varchar(1500) NOT NULL,
  `event_topic` int(50) NOT NULL,
  `event_date` date NOT NULL,
  `event_status` varchar(20) NOT NULL,
  `event_post_date` datetime NOT NULL,
  `event_time` time NOT NULL,
  `event_pic` text NOT NULL,
  `event_doc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `user_id`, `event_title`, `event_description`, `event_topic`, `event_date`, `event_status`, `event_post_date`, `event_time`, `event_pic`, `event_doc`) VALUES
(2, 3, 'Biker Auto show', 'at sir syed uni', 2, '2019-01-31', 'decline', '0000-00-00 00:00:00', '00:00:00', 'portfolio-4.jpg', ''),
(3, 3, 'Cars Auto Show', 'Need Auto Show at 20 May 2019 sharp 2AM', 1, '2019-01-02', 'decline', '0000-00-00 00:00:00', '00:00:00', 'portfolio-1.jpg', ''),
(4, 2, 'Do Dariya', 'all guy are coming on 29 July at 6 pm so all guys are invited to join us and see our cars bike and if you have you own come join us in free and have fun', 1, '2019-07-29', 'decline', '2019-07-10 00:00:00', '06:00:00', 'dodariya.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `event_comments`
--

CREATE TABLE `event_comments` (
  `comment_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_author` varchar(50) NOT NULL,
  `comment` varchar(1500) NOT NULL,
  `event_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_comments`
--

INSERT INTO `event_comments` (`comment_id`, `event_id`, `user_id`, `comment_author`, `comment`, `event_date`) VALUES
(2, 2, 3, 'Abdul Rehman Siddiqui', 'timing', '2019-04-21 05:03:22'),
(3, 3, 3, 'Abdul Rehman Siddiqui', 'timing', '2019-04-21 05:03:29'),
(4, 2, 3, 'Abdul', 'asd', '2019-07-01 03:03:56'),
(5, 2, 3, 'Abdul', 'yes im what you want to know ?', '2019-07-01 03:17:05'),
(6, 2, 3, 'Abdul', 'yes im what you want to know ?', '2019-07-01 03:17:08'),
(7, 2, 3, 'Abdul', 'asd', '2019-07-01 03:17:11'),
(8, 2, 3, 'Abdul', 'yes im what you want to know ?', '2019-07-01 03:17:31'),
(9, 2, 3, 'Abdul', 'yes im what you want to know ?', '2019-07-01 03:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `event_topic`
--

CREATE TABLE `event_topic` (
  `event_topic_id` int(50) NOT NULL,
  `event_topic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_topic`
--

INSERT INTO `event_topic` (`event_topic_id`, `event_topic`) VALUES
(1, 'Car Auto Show'),
(2, 'Bike Auto Show'),
(3, 'Management '),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `inbox_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reciver_name` varchar(200) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `checker` int(11) NOT NULL,
  `checker1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`inbox_id`, `user_id`, `reciver_name`, `sender_id`, `sender_name`, `status`, `date`, `checker`, `checker1`) VALUES
(81, 3, 'Rida', 2, 'Abdul Rehman Siddiqui', 'unread', '2019-07-06 08:31:22', 232, 223),
(82, 2, 'Abdul Rehman Siddiqui', 10, 'Omer', 'unread', '2019-07-14 15:34:37', 2210, 2102),
(83, 5, 'Aimon', 10, 'Omer', 'unread', '2019-07-14 15:35:11', 2510, 2105);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `reciver_id` int(11) NOT NULL,
  `reciver_name` varchar(200) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `sender_msg` text NOT NULL,
  `reply` text NOT NULL,
  `status` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `checker` int(11) NOT NULL,
  `checker1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `reciver_id`, `reciver_name`, `sender_id`, `sender_name`, `sender_msg`, `reply`, `status`, `msg_date`, `checker`, `checker1`) VALUES
(199, 3, 'Rida', 2, 'Abdul Rehman Siddiqui', 'hi', 'no_reply', 'unread', '2019-06-07 13:52:09', 232, 223),
(200, 2, 'Abdul Rehman Siddiqui', 3, 'Rida', 'hello', 'no_reply', 'unread', '2019-06-07 13:52:23', 223, 232),
(201, 3, 'Rida', 2, 'Abdul Rehman Siddiqui', 'how are you?', 'no_reply', 'unread', '2019-06-07 13:52:39', 232, 223),
(202, 2, 'Abdul Rehman Siddiqui', 3, 'Rida', 'im good what about you?', 'no_reply', 'unread', '2019-07-06 08:26:21', 223, 232),
(203, 9, 'Nabeel', 2, 'Abdul Rehman Siddiqui', 'hello', 'no_reply', 'unread', '2019-06-07 13:53:13', 292, 229),
(204, 2, 'Abdul Rehman Siddiqui', 9, 'Nabeel', 'im good', 'no_reply', 'unread', '2019-06-07 13:53:44', 229, 292),
(205, 9, 'Nabeel', 2, 'Abdul Rehman Siddiqui', 'hhh', 'no_reply', 'unread', '2019-06-07 13:54:14', 292, 229),
(206, 9, 'Nabeel', 2, 'Abdul Rehman Siddiqui', 'hhh', 'no_reply', 'unread', '2019-06-07 13:56:03', 292, 229),
(207, 7, 'Talha', 2, 'Abdul Rehman Siddiqui', 'nikl', 'no_reply', 'unread', '2019-06-07 13:57:46', 272, 227),
(208, 7, 'Talha', 2, 'Abdul Rehman Siddiqui', 'nikl', 'no_reply', 'unread', '2019-06-07 13:57:57', 272, 227),
(209, 7, 'Talha', 2, 'Abdul Rehman Siddiqui', 'nikl', 'no_reply', 'unread', '2019-06-07 13:58:04', 272, 227),
(210, 9, 'Nabeel', 2, 'Abdul Rehman Siddiqui', 'nikl', 'no_reply', 'unread', '2019-06-07 13:58:16', 292, 229),
(211, 7, 'Talha', 0, 'Abdul Rehman Siddiqui', 'hhh', 'no_reply', 'unread', '2019-07-02 21:03:19', 27, 27),
(212, 7, 'Talha', 0, 'Abdul Rehman Siddiqui', 'hhh', 'no_reply', 'unread', '2019-07-02 21:04:39', 27, 27),
(213, 7, 'Talha', 0, 'Abdul Rehman Siddiqui', 'acha', 'no_reply', 'unread', '2019-07-02 21:06:13', 27, 27),
(214, 3, 'Rida', 0, 'Abdul Rehman Siddiqui', 'im also good what are you doing now a days ?', 'no_reply', 'unread', '2019-07-06 08:21:47', 23, 23),
(215, 3, 'Rida', 0, 'Abdul Rehman Siddiqui', 'im also good what are you doing now a days ?', 'no_reply', 'unread', '2019-07-06 08:22:02', 23, 23),
(216, 9, 'Nabeel', 0, 'Abdul Rehman Siddiqui', 'adf', 'no_reply', 'unread', '2019-07-06 08:22:35', 29, 29),
(217, 3, 'Rida', 0, 'Abdul Rehman Siddiqui', '<strong>', 'no_reply', 'unread', '2019-07-06 08:23:28', 23, 23),
(218, 3, 'Rida', 2, 'Abdul Rehman Siddiqui', 'im also good what are you doing now a days ?', 'no_reply', 'unread', '2019-07-06 08:25:39', 232, 223),
(220, 3, 'Rida', 2, 'Abdul Rehman Siddiqui', '?', 'no_reply', 'unread', '2019-07-06 08:31:22', 232, 223),
(221, 2, 'Abdul Rehman Siddiqui', 3, 'Rida', 'nothing special you tell', 'no_reply', 'unread', '2019-07-06 08:33:31', 223, 232),
(222, 2, 'Abdul Rehman Siddiqui', 10, 'Omer', 'hey abdul', 'no_reply', 'unread', '2019-07-14 15:34:37', 2210, 2102),
(223, 5, 'Aimon', 10, 'Omer', 'hi', 'no_reply', 'unread', '2019-07-14 15:35:11', 2510, 2105),
(224, 10, 'Omer', 2, 'Abdul Rehman Siddiqui', 'hey how are you', 'no_reply', 'unread', '2019-07-14 15:35:57', 2102, 2210),
(225, 2, 'Abdul Rehman Siddiqui', 10, 'Omer', 'im good what about you', 'no_reply', 'unread', '2019-07-14 15:36:09', 2210, 2102);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_title` text NOT NULL,
  `user_msg` text NOT NULL,
  `user_topic` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `user_title`, `user_msg`, `user_topic`, `post_date`) VALUES
(46, 3, 'Good Moring', 'Some one just help me out in old model cars like Mehran or FX!', '3', '2019-06-12 09:32:54'),
(71, 3, 'Pass Available ', 'any one can have pass for NED auto Show consert', '1', '2019-07-09 14:43:35'),
(73, 2, 'hey i have pass for new concersts', 'Events', '5', '2019-07-06 06:47:53'),
(74, 10, 'Hey Every One', 'Is there any One interested in custom bike', '2', '2019-06-12 09:33:25'),
(75, 5, 'Do Dariya', 'Who are going on this sunday', '4', '2019-06-12 09:33:32'),
(76, 3, 'Hey Every One', 'Is there any One interested in custom bike', '3', '2019-06-08 18:42:09'),
(77, 2, 'Do Dariya', 'Who are going on this sunday', '1', '2019-07-14 14:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` varchar(250) NOT NULL,
  `review_author` varchar(200) NOT NULL,
  `rev_author_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_id`, `review`, `review_author`, `rev_author_id`, `date`) VALUES
(9, 7, 'he is good in php', 'Abdul Rehman Siddiqui', 2, '2019-07-15 07:40:20'),
(10, 8, 'He Is good in web', 'Abdul Rehman Siddiqui', 2, '2019-07-15 07:40:41'),
(11, 5, 'You are the best aimon', 'Abdul Rehman Siddiqui', 2, '2019-07-15 07:40:44'),
(12, 9, 'have a nice car', 'Abdul Rehman Siddiqui', 2, '2019-07-15 07:40:46'),
(13, 3, 'She is a great organizer ', 'Omer', 10, '2019-07-15 07:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `sell_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `des` varchar(1000) NOT NULL,
  `number` varchar(13) NOT NULL,
  `topic` text NOT NULL,
  `model` int(5) NOT NULL,
  `sell_pic1` text NOT NULL,
  `sell_pic2` text NOT NULL,
  `sell_pic3` text NOT NULL,
  `sell_pic4` text NOT NULL,
  `sell_pic5` text NOT NULL,
  `sell_pic6` text NOT NULL,
  `location` varchar(200) NOT NULL,
  `price` int(12) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`sell_id`, `user_id`, `title`, `des`, `number`, `topic`, `model`, `sell_pic1`, `sell_pic2`, `sell_pic3`, `sell_pic4`, `sell_pic5`, `sell_pic6`, `location`, `price`, `date`, `status`) VALUES
(13, 2, 'Mercedes E Class E250 2014 Model For Sale', 'Multimedia Stearing\r\n\r\nImmbolizer Key\r\n\r\nIntertainment Panal\r\nAc Best Condition\r\n\r\nReqaired Best Offer\r\n\r\nContact me or Whatsapp', '+923068416862', 'Car', 2014, 'mer123.jpg', '34563ref.jpg', '1b23.jpg', '', '', '', 'G-8, Islamabad, Islamabad Capital Territory\r\n', 8200000, '2019-07-15 07:58:50', 'verify'),
(23, 2, 'Suzuki gsxr 600 2005', 'Suzuki gsxr 600 2005 in very good condition.\r\n\r\nEngine perfect\r\n\r\nNew tyres\r\n\r\nFairing of 2009 model', '12', 'Bike', 2005, '123.jpg', '', '', '', '', '', 'Bahria Town Rawalpindi, Rawalpindi, Punjab\r\n', 750000, '2019-07-02 18:11:06', 'verify'),
(24, 3, 'Honda City-16', 'Just superb & immaculate  Honda City-2016(Manual transmission)  Registered in 2019  ABS,Auto mirrors,power stayring & many more  Excellent fuel consumption  14-km/L in city  17-km/L on long  100% engine n suspension  100% mechanical fitness  100% non accidental & seal by seal packed internally.  100% genuine internally  Roof,Trunk & bonut is in genuine paint & rest is shower for fresh look only.  All \"a~z\" original documents  Token paid up to June-2019  Note! No need of one penny work required, just buy n enjoy luxurious drive of \"Honda City\"', '3002586336', 'Car', 2016, 'car.jpg', 'evqw234.jpg', 'car12.jpg', '', '', '', 'Gulisten e Jahor Block 15 Karachi Pakistan', 1590000, '2019-07-12 07:07:09', 'verify'),
(25, 6, 'Suzuki GSX-R 1000 K9', 'GSX-R 1000 2009  Pristine bike for sale. New tyres installed, with K&N performance air filter. Well maintained bike with timely service and tuning. Odo: 16,000 kms. Overall Length: 2,045 mm (80.5 in.)   Overall Width: 720 mm (28.4 in.)   Overall Height: 1,130 mm (44.5 in.)   Seat Height: 810 mm (31.9 in.)   Ground Clearance: 130 mm (5.1 in.)   Wheelbase: 1,405 mm (55.3 in.)   Fuel tank capacity: 17.5 litres  Dry Weight: 167 kg (203 kg wet)  Engine type: Water-cooled 999 cc inline-4, DOHC, 16 valves. 182 hp (135.7 kW)/ 12,000 rpm, 116.7 Nm/ 10,000 rpm.', '3002586336', 'Bike', 2017, 'bik1.jpg', 'awrv123.jpg', 'asdc12.jpg', '', '', '', 'DHA Phase 2, Lahore, Punjab', 1175000, '2019-07-12 07:07:03', 'verify'),
(30, 6, 'Mercedes E200 2004', 'Model 2004,Mercedes Benz  Excellent condition,  129,000km Driven ,  Total genuine.  Silver Colour,  No Malfunction,  well Maintained,  Exchage Possible.  gift for E Class/mercedes Lovers', '923005554369', 'Car', 2004, 'b43t3.jpg', 'bgt54.jpg', 'vt234r.jpg', '', '', '', 'Askari 10, Rawalpindi, Punjab', 1800000, '2019-07-02 18:08:16', 'verify'),
(32, 6, 'pourchi 2019', 'BEST DAY GROUP OF COMPANIES  Suzuki Wagon R all models ho ya apni pasnd ki koi bhi gari finance krwayn pury Pakistan may sabsy asaan iqsat py  JUST 20% ADVANCE aur gari k maalik banyn  2 shaksi zamant pay  1 sy 5 sal py apni marzi kay mutabiq plan hasil karyn  soud sy pak , shafaf islamic financing.', '923178889923', 'Car', 2019, 'prg45.jpg', '', '', '', '', '', 'Mianwali, Punjab, Pakistan', 600000, '2019-07-02 18:10:28', 'verify'),
(33, 2, 'Audi', 'asia jdaksdj kla ', '12987387823', 'Car', 2010, 'background.jpg', 'bg.jpg', 'bg.jpg', '1672530-poster-1920-adobe.jpg', 'bg.jpg', '', 'Gulisten e Jahor Block 15 Karachi Pakistan', 234234, '2019-07-15 08:02:18', 'verify');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `super_id` int(1) NOT NULL,
  `super_user` varchar(30) NOT NULL,
  `super_pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`super_id`, `super_user`, `super_pass`) VALUES
(1, 'arehmans', '123123123');

-- --------------------------------------------------------

--
-- Table structure for table `topicss`
--

CREATE TABLE `topicss` (
  `topic_id` int(11) NOT NULL,
  `topic_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topicss`
--

INSERT INTO `topicss` (`topic_id`, `topic_title`) VALUES
(1, 'Car'),
(2, 'Bike'),
(3, 'Spare parts'),
(4, 'Management'),
(6, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_country` varchar(50) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_des` text NOT NULL,
  `user_birth` date NOT NULL,
  `user_mobile` text NOT NULL,
  `user_image` text NOT NULL,
  `cover` text NOT NULL,
  `registor_date` date NOT NULL,
  `last_login` date NOT NULL,
  `status` text NOT NULL,
  `ver_code` int(100) NOT NULL,
  `posts` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_country`, `user_gender`, `user_des`, `user_birth`, `user_mobile`, `user_image`, `cover`, `registor_date`, `last_login`, `status`, `ver_code`, `posts`) VALUES
(2, 'Abdul Rehman Siddiqui', '202cb962ac59075b964b07152d234b70', 'arehmans@live.com', 'United Arab of Emirate', 'Male', '', '1995-10-23', '03002586336', 'pp.jpg', 'cdefualt.jpg', '2019-07-13', '2019-07-15', 'verified', 1994638116, 'yes'),
(3, 'Rida', '202cb962ac59075b964b07152d234b70', 'ayeshakhan@live.com', 'pakistan', 'Female', '', '2017-12-01', '99999999999', 'IMG-20180827-WA0004.jpg', 'IMG0064A.jpg', '2018-06-07', '2019-07-06', 'verified', 0, 'yes'),
(5, 'Aimon', '202cb962ac59075b964b07152d234b70', 'aimon_me@msn.com', 'india', 'Female', '', '1997-03-12', '0283472893', 'aimon.jpg', 'cdefualt.jpg', '2018-09-23', '2019-05-02', 'verified', 0, 'yes'),
(7, 'Talha', '202cb962ac59075b964b07152d234b70', 'talha@live.com', 'Hyderabad', 'Male', '', '0000-00-00', '', 'talha.jpg', 'cdefualt.jpg', '2019-04-17', '2019-05-02', 'verified', 1876142291, 'no'),
(9, 'Nabeel', '202cb962ac59075b964b07152d234b70', 'nabeel@yahoo.com', '', 'Male', '', '0000-00-00', '', 'nabeel.jpg', 'cdefualt.jpg', '0000-00-00', '2019-06-07', 'verified', 0, ''),
(10, 'Omer', '202cb962ac59075b964b07152d234b70', 'omer@gmail.com', 'Hyderabad', 'Male', '', '0000-00-00', '063456123165', 'omer.jpg', 'cdefualt.jpg', '0000-00-00', '2019-07-14', 'verified', 0, 'yes'),
(11, 'Saad', '202cb962ac59075b964b07152d234b70', 'saad@yahoo.com', 'pakistan', 'Male', '', '0000-00-00', '03002586336', 'saad.jpg', 'cdefualt.jpg', '2019-05-02', '2019-05-07', 'verified', 1042787478, 'no'),
(17, 'Laalii', 'd41d8cd98f00b204e9800998ecf8427e', 'info@laali.com', 'Pakistan', 'Female', '', '0000-00-00', '123', 'defualt.jpg', 'cdefualt.jpg', '2019-07-06', '2019-07-12', 'verified', 1554792166, 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`,`admin_email`,`admin_number`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`,`user_id`);

--
-- Indexes for table `event_comments`
--
ALTER TABLE `event_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `event_topic`
--
ALTER TABLE `event_topic`
  ADD PRIMARY KEY (`event_topic_id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`sell_id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`super_id`,`super_user`);

--
-- Indexes for table `topicss`
--
ALTER TABLE `topicss`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_comments`
--
ALTER TABLE `event_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event_topic`
--
ALTER TABLE `event_topic`
  MODIFY `event_topic_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `sell_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `super_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topicss`
--
ALTER TABLE `topicss`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
