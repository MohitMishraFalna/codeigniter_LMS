-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2019 at 03:21 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `auth_id` int(11) NOT NULL,
  `auth_name` varchar(50) DEFAULT NULL,
  `auth_email` varchar(100) DEFAULT NULL,
  `auth_contact` varchar(50) DEFAULT NULL,
  `auth_pincode` varchar(50) DEFAULT NULL,
  `auth_city` varchar(50) DEFAULT NULL,
  `auth_distict` varchar(50) DEFAULT NULL,
  `auth_region` varchar(50) DEFAULT NULL,
  `auth_state` varchar(50) DEFAULT NULL,
  `auth_contry` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`auth_id`, `auth_name`, `auth_email`, `auth_contact`, `auth_pincode`, `auth_city`, `auth_distict`, `auth_region`, `auth_state`, `auth_contry`) VALUES
(1, 'Kuldeep Chand Mishra', 'bccfalna@gmail.com', '9799455505', '306116', 'Falna', 'Pali', 'Jodhpur', 'Rajasthan', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_code` varchar(10) DEFAULT NULL,
  `book_name` varchar(50) DEFAULT NULL,
  `book_image` varchar(100) DEFAULT NULL,
  `book_price` decimal(10,2) DEFAULT NULL,
  `book_qty` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_code`, `book_name`, `book_image`, `book_price`, `book_qty`) VALUES
(1, '0003', 'C Language', 'http://[::1]/LMS/uploads/c_language3.jpg', '500.00', '2000.00'),
(2, '0004', 'Javascript', 'http://[::1]/LMS/uploads/javascriptbook11.jpeg', '500.00', '3500.00'),
(4, '0005', 'Java', 'http://[::1]/LMS/uploads/javabook3.jpeg', '400.00', '3000.00'),
(5, '0006', 'Python', 'http://[::1]/LMS/uploads/python11.jpeg', '600.00', '4000.00'),
(6, '0007', 'C++', 'http://[::1]/LMS/uploads/c++1.jpeg', '450.00', '4500.00');

-- --------------------------------------------------------

--
-- Table structure for table `employeed`
--

CREATE TABLE `employeed` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(50) DEFAULT NULL,
  `emp_email` varchar(100) DEFAULT NULL,
  `emp_pwd` varchar(50) DEFAULT NULL,
  `emp_contact` varchar(50) DEFAULT NULL,
  `emp_dob` date DEFAULT NULL,
  `emp_pincode` varchar(8) DEFAULT NULL,
  `emp_cityname` varchar(50) DEFAULT NULL,
  `emp_districtname` varchar(50) DEFAULT NULL,
  `emp_state` varchar(50) DEFAULT NULL,
  `emp_contry` varchar(50) DEFAULT NULL,
  `emp_classname` varchar(50) DEFAULT NULL,
  `emp_passingyear` date DEFAULT NULL,
  `emp_Image` varchar(80) DEFAULT NULL,
  `emp_percent` varchar(50) DEFAULT NULL,
  `emp_roll` varchar(50) DEFAULT NULL,
  `emp_signature` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeed`
--

INSERT INTO `employeed` (`id`, `emp_name`, `emp_email`, `emp_pwd`, `emp_contact`, `emp_dob`, `emp_pincode`, `emp_cityname`, `emp_districtname`, `emp_state`, `emp_contry`, `emp_classname`, `emp_passingyear`, `emp_Image`, `emp_percent`, `emp_roll`, `emp_signature`) VALUES
(1, 'Mohit Mishra', 'mohitmishra.falna850@gmail.com', 'password', '8690716407', '2019-09-06', '306116', 'Falna', 'Pali', 'Rajasthan', 'India', 'M.sc (cs)', '2019-09-13', 'http://[::1]/LMS/uploads/employee6.jpeg', '72', 'librarian', 'http://[::1]/LMS/uploads/signature1.png');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memid` int(11) NOT NULL,
  `membername` varchar(50) DEFAULT NULL,
  `mememail` varchar(100) DEFAULT NULL,
  `membcontact` varchar(15) DEFAULT NULL,
  `memimage` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `contry` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `DOJ` date DEFAULT NULL,
  `gender` varchar(8) DEFAULT NULL,
  `pincode` varchar(8) DEFAULT NULL,
  `rigion` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `signimage` varchar(100) DEFAULT NULL,
  `total_issued` decimal(10,2) DEFAULT NULL,
  `total_paid` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memid`, `membername`, `mememail`, `membcontact`, `memimage`, `city`, `contry`, `district`, `DOB`, `DOJ`, `gender`, `pincode`, `rigion`, `state`, `signimage`, `total_issued`, `total_paid`) VALUES
(1, 'Mohit Mishra', 'mohitmishra.falna850@gmail.com', '8690716407', 'http://[::1]/LMS/uploads/employee142.jpeg', 'Falna', 'India', 'Pali', '2019-09-04', '2019-09-22', 'Male', '306116', 'Jodhpur', 'Rajasthan', 'http://[::1]/LMS/uploads/employee151.jpeg', NULL, NULL),
(2, 'Rohit Mishra', 'Rohitmishra.falna850@gmail.com', '8690716407', 'http://[::1]/LMS/uploads/employee20.jpeg', 'Falna', 'India', 'Pali', '2019-09-06', '2019-09-24', 'Male', '306116', 'Jodhpur', 'Rajasthan', 'http://[::1]/LMS/uploads/signature06.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `planid` int(11) NOT NULL,
  `planname` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `validity` varchar(20) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`planid`, `planname`, `status`, `validity`, `amount`) VALUES
(1, 'Deepawali Dhamaka', 'Activate', '30', '30'),
(2, 'Mansoon Dhamaka', 'Activate', '120', '200'),
(3, 'Navratri Dhamaka', 'Activate', '10', '30'),
(4, 'New Year Offer', 'Activate', '30', '20');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `pub_id` int(11) NOT NULL,
  `pub_company` varchar(50) DEFAULT NULL,
  `pub_name` varchar(50) DEFAULT NULL,
  `pub_email` varchar(100) DEFAULT NULL,
  `pub_contact` varchar(50) DEFAULT NULL,
  `pub_pincode` varchar(50) DEFAULT NULL,
  `pub_city` varchar(50) DEFAULT NULL,
  `pub_distict` varchar(50) DEFAULT NULL,
  `pub_region` varchar(50) DEFAULT NULL,
  `pub_state` varchar(50) DEFAULT NULL,
  `pub_contry` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`pub_id`, `pub_company`, `pub_name`, `pub_email`, `pub_contact`, `pub_pincode`, `pub_city`, `pub_distict`, `pub_region`, `pub_state`, `pub_contry`) VALUES
(1, 'Mishra Publication', 'Mohit Mishra', 'mohitmishra.falna850@gmail.com', '8690716407', '400004', 'Chaupati', 'Mumbai', 'Mumbai', 'Maharashtra', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `subid` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `sub_start` datetime DEFAULT CURRENT_TIMESTAMP,
  `sub_end` datetime DEFAULT CURRENT_TIMESTAMP,
  `pay_mode` varchar(20) DEFAULT NULL,
  `status` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`subid`, `member_id`, `plan_id`, `sub_start`, `sub_end`, `pay_mode`, `status`) VALUES
(1, 1, 1, NULL, '2019-10-13 00:00:00', 'cash_mode', '1');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `issue_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `amount_paid` decimal(10,2) DEFAULT '0.00',
  `status` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `member_id`, `issue_date`, `amount_paid`, `status`) VALUES
(1, 1, '2019-10-01 07:39:25', '1500.00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `trans_products`
--

CREATE TABLE `trans_products` (
  `trans_prod_id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `trans_id` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_products`
--

INSERT INTO `trans_products` (`trans_prod_id`, `book_id`, `trans_id`, `status`) VALUES
(1, 4, 1, '0'),
(2, 2, 1, '0'),
(3, 5, 1, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `book_name` (`book_name`);

--
-- Indexes for table `employeed`
--
ALTER TABLE `employeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memid`),
  ADD UNIQUE KEY `mememail` (`mememail`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`planid`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`pub_id`),
  ADD UNIQUE KEY `pub_company` (`pub_company`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `trans_products`
--
ALTER TABLE `trans_products`
  ADD PRIMARY KEY (`trans_prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employeed`
--
ALTER TABLE `employeed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `planid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `pub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trans_products`
--
ALTER TABLE `trans_products`
  MODIFY `trans_prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
