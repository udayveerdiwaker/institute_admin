-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2026 at 09:47 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `institute_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(10) NOT NULL,
  `student_name` varchar(25) NOT NULL,
  `student_marks` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `student_name`, `student_marks`, `created_at`) VALUES
(1, 'ss730439@gmail.com', '46', '2026-01-16 08:37:41'),
(2, 'Arnavmandal@', '37', '2026-01-16 08:37:41'),
(4, 'udayveer2@gmail.com', '30', '2026-01-16 08:37:41'),
(9, 'ss730439@gmail.com', '48', '2026-01-16 08:37:41'),
(10, 'ss730439@gmail.com', '28', '2026-01-16 08:37:41'),
(11, 'Arnavmandal@', '48', '2026-01-16 08:37:41'),
(16, 'VishakhaSaini', '71', '2026-01-16 08:37:41'),
(17, 'akshit@gmail.com', '43', '2026-01-16 08:37:41'),
(18, 'Akshit kestwal', '35', '2026-01-16 08:37:41'),
(19, 'singhmuskan7387@gmail.com', '28', '2026-01-16 08:37:41'),
(20, 'Supriya Mall', '38', '2026-01-16 08:37:41'),
(21, 'Muskan Prajapati ', '44', '2026-01-16 08:37:41'),
(22, 'amychristabell4451@gmail.', '35', '2026-01-16 08:37:41'),
(23, 'riteshprajapati89000@gmai', '42', '2026-01-16 08:37:41'),
(24, 'Asmita rawat', '23', '2026-01-16 08:37:41'),
(25, 'Asmita rawat', '22', '2026-01-16 08:37:41'),
(26, 'alokraj', '35', '2026-01-16 08:37:41'),
(28, 'Aanchal', '41', '2026-01-16 08:37:41'),
(29, 'Aanchal', '33', '2026-01-16 08:37:41'),
(31, 'ss730439@gmail.com', '49', '2026-01-16 08:37:41'),
(32, 'kiranjha567889@gmail.com', '31', '2026-01-16 08:37:41'),
(33, 'Meenu kumari', '33', '2026-01-16 08:37:41'),
(34, 'Meenu kumari', '31', '2026-01-16 08:37:41'),
(35, 'Ansh Gupta', '17', '2026-01-16 08:37:41'),
(36, 'nanugunjan@gmail.com', '28', '2026-01-16 08:37:41'),
(37, 'Upasana sirohi', '29', '2026-01-16 08:37:41'),
(39, 'test', '91', '2026-01-16 08:37:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
