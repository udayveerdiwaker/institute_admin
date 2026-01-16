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
-- Table structure for table `registered_user`
--

CREATE TABLE `registered_user` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lname` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `exam_id` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_user`
--

INSERT INTO `registered_user` (`id`, `name`, `lname`, `email`, `password`, `phone`, `exam_id`, `created_at`) VALUES
(2, 'sonia', 'singh', 'ss730439@gmail.com', 'sonia123', NULL, 1, '2026-01-16 08:21:47'),
(3, 'Arnav', 'Mandal', 'Arnavmandal@', 'Arnavmandal@', NULL, 1, '2026-01-16 08:21:47'),
(4, 'shiva', 'divaker', 'udayveer2@gmail.com', 'shiva@1234', NULL, 1, '2026-01-16 08:21:47'),
(108, 'Alok', 'raj', 'alokraj', 'alok123', NULL, 1, '2026-01-16 08:21:47'),
(109, 'Vishakha', 'Saini', 'VishakhaSaini', 'Vishakha@123', NULL, 1, '2026-01-16 08:21:47'),
(111, 'Akshit', 'Kestwal', 'akshit@gmail.com', 'akshit@gmail.com', NULL, 1, '2026-01-16 08:21:47'),
(112, 'Akshit', 'Kestwal', 'Akshit kestwal', 'Akshit kestwal', NULL, 1, '2026-01-16 08:21:47'),
(113, 'Muskan ', '', 'singhmuskan7387@gmail.com', 'singhmuskan', NULL, 1, '2026-01-16 08:21:47'),
(115, 'Muskan ', 'Prajapati', 'Muskan Prajapati ', 'muskan@123', NULL, 1, '2026-01-16 08:21:47'),
(116, 'Supriya', 'Mall', 'Supriya Mall', 'supriya@123', NULL, 1, '2026-01-16 08:21:47'),
(117, 'Amy', 'Christabell', '', '', NULL, 1, '2026-01-16 08:21:47'),
(118, 'Amy', 'Christabell', 'amychristabell4451@gmail.com', 'amy@123', NULL, 1, '2026-01-16 08:21:47'),
(119, 'Muskan ', 'Prajapati', 'riteshprajapati89000@gmail.com', 'muskan@123', NULL, 1, '2026-01-16 08:21:47'),
(120, 'Asmita ', 'rawat', 'Asmita rawat', 'Asmita123', NULL, 1, '2026-01-16 08:21:47'),
(121, 'Alok', 'Raj', 'alokraj', 'alokraj', NULL, 1, '2026-01-16 08:21:47'),
(122, 'Aanchal', '', '', '', NULL, 1, '2026-01-16 08:21:47'),
(123, 'Aanchal', '', '', '', NULL, 1, '2026-01-16 08:21:47'),
(124, 'Aanchal', '', 'Aanchal', 'anchal@123', NULL, 1, '2026-01-16 08:21:47'),
(125, 'Saurabh', 'jha', 'saurabh', 'saurabh', NULL, 1, '2026-01-16 08:21:47'),
(126, 'Ankit ', '', '', '', NULL, 1, '2026-01-16 08:21:47'),
(127, 'Ankit', 'jha', 'kiranjha567889@gmail.com', 'Ankit 007', NULL, 1, '2026-01-16 08:21:47'),
(128, 'Meenu', 'Kumari', 'Meenu kumari', 'meenu@123', NULL, 1, '2026-01-16 08:21:47'),
(129, 'Ansh ', 'Gupta ', 'Ansh Gupta', 'ansh@123', NULL, 1, '2026-01-16 08:21:47'),
(130, 'Arushi ', 'Chhetri', 'nanugunjan@gmail.com', 'aruhsi@123', NULL, 1, '2026-01-16 08:21:47'),
(131, 'Upasana', 'Sirohi', 'Upasana sirohi', 'upasana@123', NULL, 1, '2026-01-16 08:21:47'),
(132, 'Udayveer', 'Diwaker', 'udayveerdiwaker2@gmail.com', 'shivafree44', NULL, 1, '2026-01-16 08:21:47'),
(169, 'test', NULL, 'admin@example.com', NULL, '9720067044', 2, '2026-01-16 08:22:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registered_user`
--
ALTER TABLE `registered_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registered_user`
--
ALTER TABLE `registered_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
