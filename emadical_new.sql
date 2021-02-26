-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2021 at 04:05 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 7.2.34-13+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emadical_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `timing` varchar(255) DEFAULT NULL,
  `header_detail` varchar(255) DEFAULT NULL,
  `exp_edu_detail` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `phone`, `address`, `tel`, `timing`, `header_detail`, `exp_edu_detail`, `created_at`) VALUES
(1, 'Dr Aslam', '03005246762', '427 - 428 G4 Johar Town', '03005246762', '12 AM- 12PM', '03005246762', 'BA', '2021-02-25 14:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `age` varchar(250) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `so_name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mrn` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `address`, `age`, `gender`, `name`, `so_name`, `created_at`, `phone`, `mrn`) VALUES
(11, '427 - 428 G4 Johar Town', '', '', 'Sadam Hussain', '', '2021-02-26 04:52:28', '03005246762', '11-02-26'),
(12, '427 - 428 G4 Johar Town', '', '', 'Sadam Hussain', '', '2021-02-26 10:09:10', '03005246762', '12-02-26'),
(13, '427 - 428 G4 Johar Town', '', '', 'Sadam Hussain', '', '2021-02-26 10:09:58', '03005246762', '13-02-26'),
(14, '427 - 428 G4 Johar Town', '', '', 'Sadam Hussain', '', '2021-02-26 10:11:04', '03005246762', '14-02-26'),
(15, '427 - 428 G4 Johar Town', '', '', 'Sadam Hussain', '', '2021-02-26 10:11:28', '03005246762', '15-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `patient_visits`
--

CREATE TABLE `patient_visits` (
  `id` bigint(20) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `summery` text,
  `status` int(10) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_visits`
--

INSERT INTO `patient_visits` (`id`, `patient_id`, `summery`, `status`, `created_at`) VALUES
(1, 15, NULL, 0, '2021-02-26 10:11:29'),
(2, 11, '', 0, '2021-02-26 10:41:48'),
(3, 11, NULL, 0, '2021-02-26 10:48:15'),
(4, 11, NULL, 0, '2021-02-26 10:48:33'),
(5, 11, NULL, 0, '2021-02-26 10:49:10'),
(6, 11, NULL, 0, '2021-02-26 10:49:23'),
(7, 11, NULL, 0, '2021-02-26 10:49:29'),
(8, 11, NULL, 0, '2021-02-26 10:50:43'),
(9, 11, NULL, 0, '2021-02-26 10:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` bigint(20) NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `number`, `created_at`, `patient_id`, `status`) VALUES
(1, 1, '2021-02-26 05:11:48', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_visits`
--
ALTER TABLE `patient_visits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patient_visits`
--
ALTER TABLE `patient_visits`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
