-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2025 at 11:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `birthday_reminder`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `dob`, `gender`, `email`, `mobile`, `image`, `status`, `created_at`) VALUES
(1, 'Amit Sharma', '1986-01-01', 'Male', 'amitsharma@example.com', '9237394369', 'default.png', 1, '2025-12-30 09:16:15'),
(2, 'Neha Verma', '1988-12-31', 'Other', 'nehaverma@example.com', '9555653163', 'default.png', 1, '2025-12-30 09:16:15'),
(3, 'Rahul Singh', '2000-12-30', 'Male', 'rahulsingh@example.com', '9963644574', 'default.png', 1, '2025-12-30 09:16:15'),
(4, 'Pooja Mehta', '1986-12-30', 'Other', 'poojamehta@example.com', '9180409125', 'default.png', 1, '2025-12-30 09:16:15'),
(5, 'Rohit Kumar', '1986-12-30', 'Other', 'rohitkumar@example.com', '9483018056', 'default.png', 1, '2025-12-30 09:16:15'),
(6, 'Anjali Gupta', '1993-01-06', 'Female', 'anjaligupta@example.com', '9638917637', 'default.png', 1, '2025-12-30 09:16:15'),
(7, 'Sandeep Yadav', '1997-01-01', 'Female', 'sandeepyadav@example.com', '9126172067', 'default.png', 1, '2025-12-30 09:16:15'),
(8, 'Kiran Patel', '1985-01-11', 'Female', 'kiranpatel@example.com', '9591519160', 'default.png', 1, '2025-12-30 09:16:15'),
(9, 'Vikas Jain', '2003-12-31', 'Other', 'vikasjain@example.com', '9385150924', 'default.png', 1, '2025-12-30 09:16:15'),
(10, 'Sneha Kapoor', '1994-01-13', 'Female', 'snehakapoor@example.com', '9447790030', 'default.png', 1, '2025-12-30 09:16:15'),
(11, 'Arjun Malhotra', '1998-01-11', 'Other', 'arjunmalhotra@example.com', '9404085483', 'default.png', 1, '2025-12-30 09:16:15'),
(12, 'Priya Nair', '1995-01-08', 'Male', 'priyanair@example.com', '9670559533', 'default.png', 1, '2025-12-30 09:16:15'),
(13, 'Manish Pandey', '1991-12-25', 'Other', 'manishpandey@example.com', '9337189248', 'default.png', 1, '2025-12-30 09:16:15'),
(14, 'Ritu Saxena', '1989-12-21', 'Male', 'ritusaxena@example.com', '9520357982', 'default.png', 1, '2025-12-30 09:16:15'),
(15, 'Deepak Joshi', '2004-12-25', 'Other', 'deepakjoshi@example.com', '9719513942', 'default.png', 1, '2025-12-30 09:16:15'),
(16, 'Simran Kaur', '1985-12-22', 'Male', 'simrankaur@example.com', '9256662164', 'default.png', 1, '2025-12-30 09:16:15'),
(17, 'Nitin Bansal', '1999-12-14', 'Female', 'nitinbansal@example.com', '9164174102', 'default.png', 1, '2025-12-30 09:16:15'),
(18, 'Kavita Rao', '1995-12-20', 'Male', 'kavitarao@example.com', '9110150903', 'default.png', 1, '2025-12-30 09:16:15'),
(19, 'Mohit Aggarwal', '2005-12-13', 'Male', 'mohitaggarwal@example.com', '9542355216', 'default.png', 1, '2025-12-30 09:16:15'),
(20, 'Shilpa Das', '2002-12-16', 'Female', 'shilpadas@example.com', '9556944590', 'default.png', 1, '2025-12-30 09:16:15'),
(21, 'Raghav Vishwakarma', '2000-01-01', 'Male', 'raghu121@gmail.com', '9993103682', 'user_69539ced8874a.png', 1, '2025-12-30 09:35:41'),
(22, 'Nidhi Jain', '1989-01-03', 'Female', 'nidhi121@gmail.com', '8987878761', 'user_6953a3850a0f2.jpeg', 1, '2025-12-30 10:03:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
