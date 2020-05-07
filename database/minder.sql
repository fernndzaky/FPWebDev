-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 04:22 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minder`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `detail_id` int(11) NOT NULL,
  `dp_url` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `instrument_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`detail_id`, `dp_url`, `name`, `genre_id`, `region_id`, `instrument_id`, `description`, `status_id`, `updated_at`, `created_at`) VALUES
(1, 'nugie 1.png', 'Yohanes Haryo', 1, 1, 1, 'Hi my name is yohanes nugie haryo, my binus id is 2201802922', 6, NULL, NULL),
(2, 'new.png', 'Fernandha Dzaky', 1, 1, 1, 'hi am fernandha dzaky', 1, '2020-05-07 03:16:30', '2020-05-07 03:16:30'),
(4, 'new.png', 'Kennis Vito Salam', 3, 2, 2, 'hi im kenins', 1, '2020-05-07 03:23:16', '2020-05-07 03:23:16'),
(5, 'new.png', 'Winson Vito', 1, 1, 1, '123123', 1, '2020-05-07 04:49:47', '2020-05-07 04:49:47'),
(6, 'new.png', 'raftp', 1, 1, 1, '213123', 1, '2020-05-07 04:54:36', '2020-05-07 04:54:36'),
(7, 'new.png', 'rajwa aziz putra', 1, 1, 1, '123123', 1, '2020-05-07 05:28:46', '2020-05-07 05:28:46'),
(8, 'new.png', 'quinn', 1, 1, 1, '12321321', 1, '2020-05-07 05:50:48', '2020-05-07 05:50:48'),
(12, 'new.png', 'fernandha dzaky', 1, 1, 1, '213123123', 6, '2020-05-07 06:04:22', '2020-05-07 06:04:22'),
(13, 'new.png', 'Kennis Vito Salamssss', 1, 1, 1, '123123213', 6, '2020-05-07 06:30:19', '2020-05-07 06:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`) VALUES
(1, 'Rock'),
(2, 'Jazz'),
(3, 'Country'),
(4, 'Indie'),
(5, 'Pop'),
(6, 'Reggae');

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE `instruments` (
  `instrument_id` int(11) NOT NULL,
  `instrument_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`instrument_id`, `instrument_name`) VALUES
(1, 'Singer'),
(2, 'Drummer'),
(3, 'Guitarist'),
(4, 'Bassist'),
(5, 'Pianist');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`region_id`, `region_name`) VALUES
(1, 'Jakarta Utara'),
(2, 'Jakarta Selatan'),
(3, 'Jakarta Barat'),
(4, 'Jakarta Timur');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'Currently looking for pianist'),
(2, 'Currently looking for drummer'),
(3, 'Currently looking for singer'),
(4, 'Currently looking for guitarist'),
(5, 'Currently looking for bassist'),
(6, 'Currently looking for a band'),
(7, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `detail_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `phone`, `detail_id`, `updated_at`, `created_at`) VALUES
(1, 'naganugie', 'password', '08111377893', 1, NULL, NULL),
(9, 'dzaky', 'password', '213123', 2, '2020-05-07 03:17:01', '2020-05-07 03:17:01'),
(10, 'kennis', 'password', '08111377893', 4, '2020-05-07 03:23:16', '2020-05-07 03:23:16'),
(11, 'winson', 'password', '213213', 5, '2020-05-07 04:49:46', '2020-05-07 04:49:46'),
(12, 'fali', 'password', '1231231', 6, '2020-05-07 04:54:36', '2020-05-07 04:54:36'),
(13, 'rajwa', 'password', '213', 7, '2020-05-07 05:28:46', '2020-05-07 05:28:46'),
(14, 'quinn', 'password', '12321', 8, '2020-05-07 05:50:48', '2020-05-07 05:50:48'),
(16, 'usertest', 'password', '213123', 12, '2020-05-07 06:04:22', '2020-05-07 06:04:22'),
(17, 'kennyfoto', 'password', '12321', 13, '2020-05-07 06:30:19', '2020-05-07 06:30:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `instrument_id` (`instrument_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`instrument_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `detail_id` (`detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `instruments`
--
ALTER TABLE `instruments`
  MODIFY `instrument_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `details_ibfk_2` FOREIGN KEY (`instrument_id`) REFERENCES `instruments` (`instrument_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `details_ibfk_3` FOREIGN KEY (`region_id`) REFERENCES `regions` (`region_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `details_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`detail_id`) REFERENCES `details` (`detail_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
