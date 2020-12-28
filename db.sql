-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2020 at 02:01 AM
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
(1, 'CA1', 'Project Promo akhir tahun', '999999.99', 'APPV', 14, '2020-12-27 13:17:28', NULL, NULL, 1, 'jack sihombing', 'Marketing', 0, ''),
(2, 'CA2', 'Event penjualan akhirtahun', '26000000.00', 'Closed', 14, '2020-12-27 13:37:20', NULL, NULL, 0, 'Ucok Sidabutar', 'Sales', 0, 'linked list.png'),
(3, 'CA3', 'Pengadaan komputer', '15000000.00', 'Paid', 14, '2020-12-27 14:47:20', NULL, NULL, 0, 'Onesinus SPT', 'IT', 0, 'gajee.PNG');

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
(1, 1, 'Test', 25, '40000.00', '999999.99', 14, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 2, 'Brosur', 100, '250000.00', '25000000.00', 14, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 2, 'Spanduk', 20, '50000.00', '1000000.00', 14, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 3, 'PC', 20, '750000.00', '15000000.00', 14, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `realization_id` int(11) NOT NULL,
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

INSERT INTO `payments` (`id`, `realization_id`, `payment_type`, `bank`, `account_number`, `account_name`, `amount`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`, `is_deleted`) VALUES
(4, 3, 'cash', '', '', '', '50000.00', 'Closed', 14, '2020-12-27 17:52:01', NULL, NULL, 0);

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

--
-- Dumping data for table `realizations`
--

INSERT INTO `realizations` (`id`, `cash_advance_id`, `doc_num`, `total`, `difference`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`, `is_deleted`) VALUES
(1, 1, 'R1', '25750002.00', '249998.00', 'Open', 14, '2020-12-27 14:16:22', NULL, NULL, 1),
(2, 2, 'R2', '26000000.00', '0.00', 'Closed', 14, '2020-12-27 14:37:28', NULL, NULL, 0),
(3, 3, 'R3', '15000000.00', '0.00', 'Open', 14, '2020-12-27 16:41:26', NULL, NULL, 0);

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

--
-- Dumping data for table `realization_details`
--

INSERT INTO `realization_details` (`id`, `realization_id`, `description`, `amount`, `created_by`, `created_date`, `updated_by`, `updated_date`, `is_deleted`) VALUES
(1, 1, 'test', '2.00', 14, '2020-12-27 14:16:22', NULL, NULL, 1),
(2, 1, 'test 2', '250000.00', 14, '2020-12-27 14:16:22', NULL, NULL, 1),
(3, 1, 'test 3', '2500000.00', 14, '2020-12-27 14:16:22', NULL, NULL, 1),
(4, 1, 'test 3', '23000000.00', 14, '2020-12-27 14:16:22', NULL, NULL, 1),
(5, 2, 'Test', '26000000.00', 14, '2020-12-27 14:37:28', NULL, NULL, 0),
(6, 3, 'PC', '15000000.00', 14, '2020-12-27 16:41:26', NULL, NULL, 0);

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
(1, 'admin ubah', '$2y$10$4dijUfXyhHcGSEAWDxCKTuu59ScHb1h.K8Hngaai3NO0CnNM.52by', 'Administrator', '', ''),
(2, 'onesinus', '$2y$10$UM.iePKEEnCd33X7LodPbOtn.hpGpyob0oYGz6oKYpu0GDGDi3fEi', 'Admin Web', '', ''),
(3, 'Bambang', '$2y$10$7J.Bsi6aqE24BCSn67joIeLJhYWZ7v1S5P4wt.QIvKHd1WgJzQ3ye', 'Admin Web', '', ''),
(7, 'Blegedes', '$2y$10$77AY/D4Ud1Ke.Y50fSZLfOh6LJSmGqZMvgCpQASBCGwklixOoCRBu', 'Administrator', '', ''),
(13, 'test', '$2y$10$bv8QUtmG7KqiHrYaLpfUFOwVzQtyvCMzIEAos/DiMiYqszU1C.qti', 'Admin Web', '', ''),
(14, 'admin', '$2y$10$FI/wx1Irj7im1JZdwGTy/u3nUrZqTZ8qEraks2h//4INMlkPK99ue', 'Admin', '1601110069', 'Senior sales'),
(16, 'okeoce', '$2y$10$Qp8fx7cU/4CH68BeQvDKjuIUBzXXShHwzDEdKQOhHHw8R6poujGMi', 'Admin Web', '', ''),
(17, 'coba', '$2y$10$B4GY8a0VAQxhH8w56DF2yeNELugVhzSFHqZ9I9qYuNIRlOsOmrngy', 'Kang Mie Ayam', '', ''),
(18, 'coba ubah kang mie ayam', '$2y$10$4Rx6tCegiZH3E1Vn1DjnceUL0yzcMH6GmILFxLczPdkAozpu8usEG', 'Kang Mie Ayam', '', ''),
(19, 'wew', '$2y$10$903v.rfhrVvAe1x8VVnuVe9mRc1xW3ZSv.D2XJv/OBP1wLzXDqED2', 'Admin Web', '', ''),
(20, 'coba', '$2y$10$tTIyAZm8u.lcEWZi1bgFYeGeXUZQZbi2bzs7iEA4gPPfH.43M2V5i', 'Kang Mie Ayam', '', ''),
(21, 'coba', '$2y$10$iKL0WyfQWAyALgf6SbLeGuYaAqciY97Z7P7NG5B0YJDiA29qXjjEa', 'Kang Mie Ayam', '', ''),
(22, 'gela', '$2y$10$A5D3X5KFrJ3zY7k4tcAmEurI.wJin1LWOJSNKO8Tj8zJoiyjbHOKa', 'Kang Mie Ayam', '', ''),
(23, 'aklsdjalk', '$2y$10$7Wi1LDaVYYE4BYOqg8pdU.qWNiPgcvBzGe1uTtp2Cgcdjgws17QM.', 'Kang Mie Ayam', '', ''),
(24, 'asdlkasjdl', '$2y$10$D.AJh.Acr8l/L8eNYz4agudyx81iN4CWnpvxjv7t2YsDhtiBXh79W', 'Kang Mie Ayam', '', ''),
(25, 'ouwo uwo uwo', '$2y$10$5vv4Qw0vgv/kcoXKPkPuMu9b50ZH.9vRxLFzwGaeTYzxGq4urIQjq', 'Kang Mie Ayam', '', '');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cash_advances`
--
ALTER TABLE `cash_advances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cash_advance_details`
--
ALTER TABLE `cash_advance_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
