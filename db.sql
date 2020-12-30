-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 09:22 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash_advances`
--

CREATE TABLE `cash_advances` (
  `id` int(11) NOT NULL,
  `doc_num` varchar(12) NOT NULL,
  `description` varchar(125) NOT NULL,
  `total` decimal(16,2) NOT NULL,
  `status` varchar(25) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `pic_name` varchar(100) NOT NULL,
  `division` varchar(100) NOT NULL,
  `is_realized` tinyint(1) NOT NULL DEFAULT 0,
  `file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cash_advances`
--

INSERT INTO `cash_advances` (`id`, `doc_num`, `description`, `total`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`, `is_deleted`, `pic_name`, `division`, `is_realized`, `file`) VALUES
(10, 'CA1', 'Pengadaan Software', '12500000.00', 'Paid', 17, '2020-12-29 20:02:00', NULL, NULL, 0, 'Onesinus SPT', 'IT', 1, ''),
(11, 'CA2', 'Project Training IT', '250000.00', 'Paid', 17, '2020-12-29 20:13:33', NULL, NULL, 0, 'Bambang Sudibyo', 'IT', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `cash_advance_details`
--

CREATE TABLE `cash_advance_details` (
  `id` int(11) NOT NULL,
  `cash_advance_id` int(11) NOT NULL,
  `description` varchar(125) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `total_amount` decimal(16,2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cash_advance_details`
--

INSERT INTO `cash_advance_details` (`id`, `cash_advance_id`, `description`, `qty`, `amount`, `total_amount`, `created_by`, `created_date`, `updated_by`, `updated_date`, `is_deleted`) VALUES
(11, 10, 'PC', 25, '500000.00', '12500000.00', 17, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 10, '', 0, '0.00', '0.00', 17, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 11, 'Training Web Dev', 1, '50000.00', '50000.00', 17, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 11, 'Training IT Security', 2, '100000.00', '200000.00', 17, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `realization_id` int(11) NOT NULL,
  `cash_advance_id` int(11) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `bank` varchar(25) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `account_name` varchar(125) DEFAULT NULL,
  `amount` decimal(16,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `realization_id`, `cash_advance_id`, `payment_type`, `bank`, `account_number`, `account_name`, `amount`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`, `is_deleted`) VALUES
(8, 0, 10, 'cash', '', '', '', '12500000.00', 'Closed', 17, '2020-12-30 15:21:41', NULL, NULL, 0),
(9, 0, 11, 'transfer', 'BCA', '1209310', 'Onesinus SPT', '250000.00', 'Closed', 17, '2020-12-30 15:22:09', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `realizations`
--

CREATE TABLE `realizations` (
  `id` int(11) NOT NULL,
  `cash_advance_id` int(11) NOT NULL,
  `doc_num` varchar(25) NOT NULL,
  `total` decimal(16,2) NOT NULL,
  `difference` decimal(16,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `realization_details`
--

CREATE TABLE `realization_details` (
  `id` int(11) NOT NULL,
  `realization_id` int(11) NOT NULL,
  `description` varchar(125) NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(25) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `nik`, `jabatan`) VALUES
(14, 'admin', '$2y$10$FI/wx1Irj7im1JZdwGTy/u3nUrZqTZ8qEraks2h//4INMlkPK99ue', 'Admin', '1601110069', 'Senior sales'),
(15, 'finance', '$2y$10$SY3hLGnDZOeFxpVLxmBK7eZ9/S977ylhOOgwY6YO8KwxBz2uW6qsq', 'Finance', 'FN0001', 'Finance Staf'),
(16, 'management', '$2y$10$f0qiU/UfCq3gXGviVVQeJ.ArTKcq8r1zIFNLqEgsM/vieEp3aHpvO', 'Management', 'MGN0001', 'CEO'),
(17, 'it', '$2y$10$AoNFRLodB.EJHX4mrKzOLe4EpYjYdg1rQVVS9z2nhD16TFGkxlWFG', 'IT', 'IT001', 'IT Staf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash_advances`
--
ALTER TABLE `cash_advances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_advance_details`
--
ALTER TABLE `cash_advance_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realizations`
--
ALTER TABLE `realizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realization_details`
--
ALTER TABLE `realization_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cash_advances`
--
ALTER TABLE `cash_advances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cash_advance_details`
--
ALTER TABLE `cash_advance_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `realizations`
--
ALTER TABLE `realizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `realization_details`
--
ALTER TABLE `realization_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
