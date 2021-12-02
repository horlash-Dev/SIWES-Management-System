-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 06:23 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siwes_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_users`
--

CREATE TABLE `all_users` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_users`
--

INSERT INTO `all_users` (`id`, `user_email`, `type`, `password`, `created_at`) VALUES
(1, 'admin@siwes.com', 1, '$argon2i$v=19$m=65536,t=4,p=1$OHRqN3BRRFZMN1guSVcxdA$LPiyusMNAjSfinESD8BCYXJAn0epg63I2w1LzatYvP8', '2021-06-22 11:32:43'),
(4, 'ajibade@yahoo.com', 2, '$argon2i$v=19$m=65536,t=4,p=1$bm9CL0cxQm0uSDZILmtNdA$QDXymJctSD7YFPSJUfYLd6gismuAX2YisJ+r5LGQ/mk', '2021-06-23 11:50:34'),
(7, 'collins34@gmail.com', 2, '$argon2i$v=19$m=65536,t=4,p=1$b1NSQkFnaXZ2ZG44YXRXZQ$pd9/QG7YfSc8UxOLJtAxhYcMIMVyKZwqQFlAQ6GvgTI', '2021-06-23 11:54:17'),
(8, 'kanny@gmail.com', 3, '$argon2i$v=19$m=65536,t=4,p=1$Q3I1c0h0WWhVSmdDZEQyQQ$y8v+1DN3BKilE1nUacD03xbdMqh45+yYRSDlG2hhxDE', '2021-06-24 17:51:50'),
(10, 'solia@gmail.com', 3, '$argon2i$v=19$m=65536,t=4,p=1$WWZwVS5GY3NMVm50YnFPSQ$2oc0BHmwaL0k+3kpWmqQ1zZ/hiGNEzZjsgILyhipXQs', '2021-06-25 12:18:30'),
(12, 'jake@gmail.com', 3, '$argon2i$v=19$m=65536,t=4,p=1$UnNLN3VSU0N4OGllUzhPRQ$eaWuf1Va56DBqZpZOK/+AKSOrTVoPsrEiT9FtMempKU', '2021-06-25 13:35:50'),
(13, 'samjon@gmail.com', 2, '$argon2i$v=19$m=65536,t=4,p=1$dUx3blduMXFxay96MU5naw$BknpuByTJzJ2J5S6O4lnvAuoS2FV1Ecitu5eeLHQUl0', '2021-06-25 13:41:00'),
(14, 'kashy@mail.com', 3, '$argon2i$v=19$m=65536,t=4,p=1$RkpMSXNsZ2RsNk1ZL3lDZg$J0qSFRWh8aNn+W0xR7Ur93/pd0cO+aascQdG6HKcZj0', '2021-11-27 16:42:58'),
(15, 'obasam@mail.com', 2, '$argon2i$v=19$m=65536,t=4,p=1$ZkEyWW9Yd2ExdnhtLmdQRQ$MzhE2/1RVh2gp7WFJt0+LEXIGD6o1mzS+wULdxMATXs', '2021-11-27 16:49:45'),
(16, 'dadrris@gmail.com', 3, '$argon2i$v=19$m=65536,t=4,p=1$OHM3cmI5a00vSkZWWXl1cg$F5d40LAg05PiUI2ikSh94al9y7x/+yuvJSQZuymswcM', '2021-11-27 17:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `users_account`
--

CREATE TABLE `users_account` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `ot_names` varchar(255) NOT NULL,
  `personal_id` varchar(255) NOT NULL,
  `session` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `lga` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `user_attachment` text DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `assign_id` tinyint(4) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `max_students` int(11) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_account`
--

INSERT INTO `users_account` (`id`, `fname`, `lname`, `ot_names`, `personal_id`, `session`, `address`, `lga`, `state`, `user_attachment`, `phone`, `assign_id`, `user_id`, `course`, `max_students`, `is_active`) VALUES
(3, 'prof olawale', 'ajibade', 'lekan', 'LEC/216e10', NULL, 'no 90 western street city.', 'apagi', 'kogi state', NULL, '09087341278', NULL, 4, 'computer science', 3, NULL),
(4, 'dr collins', 'emmanuel', 'austin', 'LEC/217c22', NULL, 'lekki phase 2', 'ikorodu', 'lagos state', NULL, '09045353463', NULL, 7, 'cyber security', 3, 1),
(5, 'kanny walter', 'jane', 'jones', '91/5565/tia', '1st semester', 'watson 33', 'kalton', 'usa', '22332', '090466363', 8, 8, 'software engineering', NULL, NULL),
(6, 'ella', 'solia', 'madu', '4545464646', '1st semester', 'weston city', 'lampton22', 'new jersey', 'washington ex', '09045458342045', 4, 10, 'cyber security', NULL, NULL),
(9, 'jake', 'luno', 'mark', '19/20sdtsas', '1st semester', 'kogi street', 'ifelodun', 'kogi state', 'ifelodun lga', '0904545834204', 10, 12, 'computer science', NULL, NULL),
(10, 'prof olawale', 'samson', 'mark', 'LEC/2137da', NULL, 'kogi street', 'ifelodun', 'kogi state', NULL, '0904535346345', NULL, 13, 'computer science', 9, 1),
(11, 'kashy ment', 'kashy', 'kashy coco', '20/ty67343', '1st semester', 'hillton raod 12..2', 'adana', 'kogi', 'adna', '345435344214234', 12, 14, 'information system', NULL, NULL),
(12, 'samuel', 'obasi', 'obasma', 'LEC/21c488', NULL, 'hillton raod 12..', 'adana', 'kogi', NULL, '333535454425', NULL, 15, 'information system', 3, 1),
(13, 'darris', 'banny', 'dax', '20/euu3343', '2nd semester', '28.Western reservoir', 'citylee', 'kogi', 'citylee', '344253534535', 12, 16, 'information system', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_users`
--
ALTER TABLE `all_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `users_account`
--
ALTER TABLE `users_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `personal_id` (`personal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_users`
--
ALTER TABLE `all_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users_account`
--
ALTER TABLE `users_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_account`
--
ALTER TABLE `users_account`
  ADD CONSTRAINT `siwes` FOREIGN KEY (`user_id`) REFERENCES `all_users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
