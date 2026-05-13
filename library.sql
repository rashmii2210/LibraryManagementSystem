-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 12:00 PM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `date_of_entry` date DEFAULT NULL,
  `book_title` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `year` date DEFAULT NULL,
  `pages` bigint(20) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `isbn_no` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `date_of_entry`, `book_title`, `language`, `author`, `publisher`, `year`, `pages`, `location`, `price`, `isbn_no`, `status`, `keyword`, `created_at`, `updated_at`) VALUES
(1, '2024-04-10', 'Bhagavad Gita', 'Sanskrit', 'Maharishi Veda Vyasa', 'RR Varma', '2023-04-10', 600, 'Section-A', '999', '1001', '1', 'Gita', '2024-04-10 12:16:45', '2024-05-20 05:54:42'),
(2, '2024-04-10', 'Mahabharat', 'English', 'Vyasa', 'Bharatiya vidya bhavan', '2021-04-10', 483, 'Section-A', '860', '2', '1', 'mahabharat', '2024-04-10 12:29:23', '2024-04-16 16:17:05'),
(3, '2024-04-10', 'H.C VERMA', 'English', 'h.c verma', 'h.c verma', '2015-04-10', 800, 'Section-C', '1000', '3', '0', 'physics', '2024-04-10 12:34:00', '2024-04-17 05:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `book_demand`
--

CREATE TABLE `book_demand` (
  `demand_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `book_title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `demand_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_demand`
--

INSERT INTO `book_demand` (`demand_id`, `student_id`, `book_title`, `author`, `publisher`, `demand_date`) VALUES
(1, 2, 'ise', 'j.b patel', 'j.b patel', '2024-04-12 18:30:00'),
(2, 2, 'ise', 'j.b patel', 'j.b patel', '2024-04-12 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `book_issueds`
--

CREATE TABLE `book_issueds` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `issued_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_issueds`
--

INSERT INTO `book_issueds` (`id`, `student_id`, `book_id`, `book_name`, `issued_date`, `due_date`, `return_date`, `created_at`, `updated_at`) VALUES
(14, 2, 2, 'Mahabharat', '2024-04-12', '2024-05-24', '2024-04-12', '2024-04-12 10:11:53', '2024-04-12 13:07:39'),
(35, 2, 3, 'H.C VERMA', '2024-04-17', '2024-04-24', NULL, '2024-04-17 05:43:43', '2024-04-17 05:43:43'),
(36, 1, 1, 'Bhagavad Gita', '2024-05-20', '2024-05-27', '2024-05-20', '2024-05-20 05:53:44', '2024-05-20 05:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `s_name` varchar(255) DEFAULT NULL,
  `sfather_name` varchar(255) DEFAULT NULL,
  `s_surname` varchar(255) DEFAULT NULL,
  `s_address` text DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `s_email` varchar(255) DEFAULT NULL,
  `s_phoneno` int(10) NOT NULL,
  `s_birth_date` date DEFAULT NULL,
  `s_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `s_name`, `sfather_name`, `s_surname`, `s_address`, `gender`, `s_email`, `s_phoneno`, `s_birth_date`, `s_photo`, `created_at`, `updated_at`) VALUES
(1, 'Rashmi', 'Ashokbhai', 'Manani', 'Railnagar,krishnapark rajkot', 'female', 'rashmi@gmail.com', 884123456, '2006-10-22', NULL, '2024-04-10 16:53:51', '2024-04-11 06:57:27'),
(2, 'ashok', 'mavjibhai', 'manani', 'pune,maharastra', 'male', 'ashok@gmail.com', 123, '2024-04-10', NULL, '2024-04-10 17:14:45', '2024-04-10 17:14:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_demand`
--
ALTER TABLE `book_demand`
  ADD PRIMARY KEY (`demand_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `book_issueds`
--
ALTER TABLE `book_issueds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `book_demand`
--
ALTER TABLE `book_demand`
  MODIFY `demand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `book_issueds`
--
ALTER TABLE `book_issueds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_demand`
--
ALTER TABLE `book_demand`
  ADD CONSTRAINT `book_demand_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `book_issueds`
--
ALTER TABLE `book_issueds`
  ADD CONSTRAINT `book_issueds_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_issueds_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
