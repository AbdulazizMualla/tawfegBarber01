-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2021 at 07:39 PM
-- Server version: 5.6.51-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barber_t`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `time`, `date`) VALUES
(1068, 1, '19:00:00', '2021-10-22'),
(1077, 1, '15:30:00', '2021-10-22'),
(1097, 1, '14:00:00', '2021-10-23'),
(1105, 1, '13:00:00', '2021-10-23'),
(1106, 1, '13:30:00', '2021-10-23'),
(1107, 1, '14:30:00', '2021-10-23'),
(1114, 1, '20:00:00', '2021-10-22'),
(1115, 1, '20:30:00', '2021-10-22'),
(1117, 1, '23:30:00', '2021-10-21'),
(1123, 1, '18:00:00', '2021-10-22'),
(1125, 1, '17:00:00', '2021-10-22'),
(1126, 1, '15:00:00', '2021-10-22'),
(1127, 1, '17:30:00', '2021-10-22'),
(1128, 1, '16:30:00', '2021-10-22'),
(1129, 1, '20:00:00', '2021-10-23'),
(1130, 1, '13:30:00', '2021-10-22'),
(1131, 1, '14:00:00', '2021-10-22'),
(1132, 1, '22:30:00', '2021-10-27'),
(1133, 1, '23:00:00', '2021-10-27'),
(1134, 1, '13:00:00', '2021-10-22'),
(1135, 1, '14:30:00', '2021-10-22'),
(1136, 1, '15:00:00', '2021-10-23'),
(1137, 1, '16:00:00', '2021-10-22'),
(1138, 1, '18:30:00', '2021-10-22'),
(1139, 1, '19:30:00', '2021-10-22'),
(1140, 1, '21:00:00', '2021-10-22'),
(1141, 1, '16:30:00', '2021-10-23'),
(1142, 1, '23:30:00', '2021-10-23'),
(1143, 1, '21:30:00', '2021-10-22'),
(1144, 1, '22:00:00', '2021-10-22'),
(1145, 1, '22:30:00', '2021-10-22'),
(1146, 1, '17:00:00', '2021-10-23'),
(1147, 1, '23:00:00', '2021-10-22'),
(1151, 1, '23:30:00', '2021-10-22'),
(1152, 1, '21:00:00', '2021-10-23'),
(1153, 1, '15:30:00', '2021-10-23'),
(1154, 1, '21:30:00', '2021-10-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1159;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
