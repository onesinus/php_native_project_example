-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2020 at 06:55 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

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
  `total` decimal(8,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cash_advances`
--

INSERT INTO `cash_advances` (`id`, `doc_num`, `description`, `total`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`, `is_deleted`) VALUES
(1, 'CA0001', 'coba aksjdakd', '10000.00', 'OK', 1, '2020-11-17 12:47:13', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cash_advance_details`
--

CREATE TABLE `cash_advance_details` (
  `id` int(11) NOT NULL,
  `cash_advance_id` int(11) NOT NULL,
  `description` varchar(125) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin ubah', '$2y$10$4dijUfXyhHcGSEAWDxCKTuu59ScHb1h.K8Hngaai3NO0CnNM.52by', 'Administrator'),
(2, 'onesinus', '$2y$10$UM.iePKEEnCd33X7LodPbOtn.hpGpyob0oYGz6oKYpu0GDGDi3fEi', 'Admin Web'),
(3, 'Bambang', '$2y$10$7J.Bsi6aqE24BCSn67joIeLJhYWZ7v1S5P4wt.QIvKHd1WgJzQ3ye', 'Admin Web'),
(7, 'Blegedes', '$2y$10$77AY/D4Ud1Ke.Y50fSZLfOh6LJSmGqZMvgCpQASBCGwklixOoCRBu', 'Administrator'),
(13, 'test', '$2y$10$bv8QUtmG7KqiHrYaLpfUFOwVzQtyvCMzIEAos/DiMiYqszU1C.qti', 'Admin Web'),
(14, 'admin', '$2y$10$FI/wx1Irj7im1JZdwGTy/u3nUrZqTZ8qEraks2h//4INMlkPK99ue', 'Administrator'),
(15, 'coba', '$2y$10$woDcqf23W4/5cYJ5dpmvaeZHR8MaN3TgC8VfCzkNxZOuAz1u0OodC', 'Administrator'),
(16, 'okeoce', '$2y$10$Qp8fx7cU/4CH68BeQvDKjuIUBzXXShHwzDEdKQOhHHw8R6poujGMi', 'Admin Web'),
(17, 'coba', '$2y$10$B4GY8a0VAQxhH8w56DF2yeNELugVhzSFHqZ9I9qYuNIRlOsOmrngy', 'Kang Mie Ayam'),
(18, 'coba ubah kang mie ayam', '$2y$10$4Rx6tCegiZH3E1Vn1DjnceUL0yzcMH6GmILFxLczPdkAozpu8usEG', 'Kang Mie Ayam'),
(19, 'wew', '$2y$10$903v.rfhrVvAe1x8VVnuVe9mRc1xW3ZSv.D2XJv/OBP1wLzXDqED2', 'Admin Web'),
(20, 'coba', '$2y$10$tTIyAZm8u.lcEWZi1bgFYeGeXUZQZbi2bzs7iEA4gPPfH.43M2V5i', 'Kang Mie Ayam'),
(21, 'coba', '$2y$10$iKL0WyfQWAyALgf6SbLeGuYaAqciY97Z7P7NG5B0YJDiA29qXjjEa', 'Kang Mie Ayam'),
(22, 'gela', '$2y$10$A5D3X5KFrJ3zY7k4tcAmEurI.wJin1LWOJSNKO8Tj8zJoiyjbHOKa', 'Kang Mie Ayam'),
(23, 'aklsdjalk', '$2y$10$7Wi1LDaVYYE4BYOqg8pdU.qWNiPgcvBzGe1uTtp2Cgcdjgws17QM.', 'Kang Mie Ayam'),
(24, 'asdlkasjdl', '$2y$10$D.AJh.Acr8l/L8eNYz4agudyx81iN4CWnpvxjv7t2YsDhtiBXh79W', 'Kang Mie Ayam'),
(25, 'ouwo uwo uwo', '$2y$10$5vv4Qw0vgv/kcoXKPkPuMu9b50ZH.9vRxLFzwGaeTYzxGq4urIQjq', 'Kang Mie Ayam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash_advances`
--
ALTER TABLE `cash_advances`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
