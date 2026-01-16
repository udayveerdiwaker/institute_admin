-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2026 at 09:39 AM
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
-- Table structure for table `admin_users`
--

-- CREATE TABLE `admin_users` (
--   `id` int(11) NOT NULL,
--   `username` varchar(255) NOT NULL,
--   `password` varchar(255) NOT NULL,
--   `role` enum('student','exam_admin','exam_user') NOT NULL DEFAULT 'student'
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --
-- Dumping data for table `admin_users`
--

-- INSERT INTO `admin_users` (`id`, `username`, `password`, `role`) VALUES
-- (4, 'website', '053d2a794e4dbf38d6a04fe52d938c2c52ac2617eb94aa61498a8060d4e4d845', 'student'),
-- (5, 'admin', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'exam_admin'),
-- (6, 'user', 'e606e38b0d8c19b24cf0ee3808183162ea7cd63ff7912dbb22b5e803286b4446', 'exam_user');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

-- CREATE TABLE `courses` (
--   `id` int(11) NOT NULL,
--   `course` varchar(100) NOT NULL,
--   `duration` varchar(50) NOT NULL,
--   `fees` decimal(10,2) NOT NULL,
--   `monthly_fee` decimal(10,2) NOT NULL,
--   `course_details` text DEFAULT NULL,
--   `date` timestamp NOT NULL DEFAULT current_timestamp()
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

-- INSERT INTO `courses` (`id`, `course`, `duration`, `fees`, `monthly_fee`, `course_details`, `date`) VALUES
-- (9, 'Web Development', '6 months', '20000.00', '1000.00', 'test', '2025-12-20 10:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `exam_name`) VALUES
(1, 'c'),
(2, 'computer'),
(3, 'coreldraw'),
(5, 'tally');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

-- CREATE TABLE `expenses` (
--   `id` int(11) NOT NULL,
--   `expense_date` date NOT NULL,
--   `name` varchar(255) NOT NULL,
--   `description` text DEFAULT NULL,
--   `amount` decimal(10,2) NOT NULL,
--   `created_at` timestamp NOT NULL DEFAULT current_timestamp()
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

-- CREATE TABLE `guests` (
--   `id` int(11) NOT NULL,
--   `guest_name` varchar(150) DEFAULT NULL,
--   `phone` varchar(20) DEFAULT NULL,
--   `address` text DEFAULT NULL,
--   `purpose` varchar(200) DEFAULT NULL,
--   `lead_type` enum('Hot','Cold','Close','Success') NOT NULL,
--   `visit_date` date DEFAULT NULL,
--   `visit_time` time DEFAULT NULL,
--   `comments` text DEFAULT NULL,
--   `attended_by` varchar(100) DEFAULT NULL,
--   `created_at` timestamp NOT NULL DEFAULT current_timestamp()
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guests`
--

-- INSERT INTO `guests` (`id`, `guest_name`, `phone`, `address`, `purpose`, `lead_type`, `visit_date`, `visit_time`, `comments`, `attended_by`, `created_at`) VALUES
-- (19, 'tannu', '9720067044', 'f', 'f', 'Hot', '2026-01-08', '01:04:00', 'f', 'f', '2026-01-09 07:34:25'),
-- (20, 't', '09720067044', 't', 't', 'Success', '2026-01-02', '13:13:00', 't', 't', '2026-01-09 07:43:35');

-- -- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `options` text NOT NULL,
  `sub` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_number`, `is_correct`, `options`, `sub`, `created_at`) VALUES
(1, 1, 1, 'Application', 'Computer', '2026-01-16 08:37:18'),
(2, 1, 0, 'Compiler', 'Computer', '2026-01-16 08:37:18'),
(3, 1, 0, 'System', 'Computer', '2026-01-16 08:37:18'),
(4, 1, 0, 'Programming', 'Computer', '2026-01-16 08:37:18'),
(5, 2, 0, 'Italic', 'Computer', '2026-01-16 08:37:18'),
(6, 2, 1, 'Magic tool', 'Computer', '2026-01-16 08:37:18'),
(7, 2, 0, 'Font', 'Computer', '2026-01-16 08:37:18'),
(8, 2, 0, 'Bold', 'Computer', '2026-01-16 08:37:18'),
(9, 3, 0, ' MS Word 2003', 'Computer', '2026-01-16 08:37:18'),
(10, 3, 0, 'MS Word 2007', 'Computer', '2026-01-16 08:37:18'),
(11, 3, 0, 'MS Word 2010', 'Computer', '2026-01-16 08:37:18'),
(12, 3, 1, 'MS Word 1020', 'Computer', '2026-01-16 08:37:18'),
(13, 4, 0, 'Clipart', 'Computer', '2026-01-16 08:37:18'),
(14, 4, 1, 'Margins', 'Computer', '2026-01-16 08:37:18'),
(15, 4, 0, 'Header', 'Computer', '2026-01-16 08:37:18'),
(16, 4, 0, 'Footer', 'Computer', '2026-01-16 08:37:18'),
(17, 5, 0, 'Document formatting', 'Computer', '2026-01-16 08:37:18'),
(18, 5, 0, 'Database management', 'Computer', '2026-01-16 08:37:18'),
(19, 5, 1, 'Mail merge', 'Computer', '2026-01-16 08:37:18'),
(20, 5, 0, ' Form letters', 'Computer', '2026-01-16 08:37:18'),
(21, 6, 0, '.exe', 'Computer', '2026-01-16 08:37:18'),
(22, 6, 1, '.doc', 'Computer', '2026-01-16 08:37:18'),
(23, 6, 0, '.png', 'Computer', '2026-01-16 08:37:18'),
(24, 6, 0, '.jpeg', 'Computer', '2026-01-16 08:37:18'),
(25, 7, 1, 'Text wrapping', 'Computer', '2026-01-16 08:37:18'),
(26, 7, 0, 'Indent', 'Computer', '2026-01-16 08:37:18'),
(27, 7, 0, 'Clipart', 'Computer', '2026-01-16 08:37:18'),
(28, 7, 0, 'Line spacing', 'Computer', '2026-01-16 08:37:18'),
(29, 8, 0, 'Home panel', 'Computer', '2026-01-16 08:37:18'),
(30, 8, 0, 'Ribbon', 'Computer', '2026-01-16 08:37:18'),
(31, 8, 1, 'View option toolbar', 'Computer', '2026-01-16 08:37:18'),
(32, 8, 0, 'Title bar', 'Computer', '2026-01-16 08:37:18'),
(33, 9, 1, 'Calibri', 'Computer', '2026-01-16 08:37:18'),
(34, 9, 0, 'vrinda', 'Computer', '2026-01-16 08:37:18'),
(35, 9, 0, 'Times New Roman', 'Computer', '2026-01-16 08:37:18'),
(36, 9, 0, 'Cambria', 'Computer', '2026-01-16 08:37:18'),
(37, 10, 1, 'Page Border', 'Computer', '2026-01-16 08:37:18'),
(38, 10, 0, 'Margins', 'Computer', '2026-01-16 08:37:18'),
(39, 10, 0, 'Orientation', 'Computer', '2026-01-16 08:37:18'),
(40, 10, 0, 'Line Numbers', 'Computer', '2026-01-16 08:37:18'),
(41, 11, 0, 'Computer understands only C Language', 'Computer', '2026-01-16 08:37:18'),
(42, 11, 0, 'Computer understands only Assembly Language', 'Computer', '2026-01-16 08:37:18'),
(43, 11, 1, 'Computer understands only Binary Language', 'Computer', '2026-01-16 08:37:18'),
(44, 11, 0, 'Computer understands only BASIC', 'Computer', '2026-01-16 08:37:18'),
(45, 12, 0, 'Output Unit', 'Computer', '2026-01-16 08:37:18'),
(46, 12, 1, 'Input Unit', 'Computer', '2026-01-16 08:37:18'),
(47, 12, 0, 'Memory Unit', 'Computer', '2026-01-16 08:37:18'),
(48, 12, 0, 'Arithmetic & Logic Unit', 'Computer', '2026-01-16 08:37:18'),
(49, 13, 0, 'Commonly Occupied Machines Used in Technical and Educational Research', 'Computer', '2026-01-16 08:37:18'),
(50, 13, 0, 'Commonly Operated Machines Purposely Used in Technical and Environmental Research', 'Computer', '2026-01-16 08:37:18'),
(51, 13, 0, 'Commonly Oriented Machines Used in Technical and Educational Research', 'Computer', '2026-01-16 08:37:18'),
(52, 13, 1, 'Common Operating Machine Purposely Used for Technological and Educational Research', 'Computer', '2026-01-16 08:37:18'),
(53, 14, 0, 'View menu', 'Computer', '2026-01-16 08:37:18'),
(54, 14, 0, 'Insert Menu', 'Computer', '2026-01-16 08:37:18'),
(55, 14, 1, 'File Menu', 'Computer', '2026-01-16 08:37:18'),
(56, 14, 0, 'None of these', 'Computer', '2026-01-16 08:37:18'),
(57, 15, 1, 'Hardware', 'Computer', '2026-01-16 08:37:18'),
(58, 15, 0, 'Software', 'Computer', '2026-01-16 08:37:18'),
(59, 15, 0, 'System Software', 'Computer', '2026-01-16 08:37:18'),
(60, 15, 0, 'Package', 'Computer', '2026-01-16 08:37:18'),
(61, 16, 0, 'James Gosling', 'Computer', '2026-01-16 08:37:18'),
(62, 16, 1, 'Charles Babbage', 'Computer', '2026-01-16 08:37:18'),
(63, 16, 0, 'Dennis Ritchie', 'Computer', '2026-01-16 08:37:18'),
(64, 16, 0, 'Bjarne Stroustrup', 'Computer', '2026-01-16 08:37:18'),
(65, 17, 1, 'Aling To The Center', 'Computer', '2026-01-16 08:37:18'),
(66, 17, 0, 'Aling To The Right Side', 'Computer', '2026-01-16 08:37:18'),
(67, 17, 0, 'Cut', 'Computer', '2026-01-16 08:37:18'),
(68, 17, 0, 'None of These', 'Computer', '2026-01-16 08:37:18'),
(69, 18, 0, 'Find The Image', 'Computer', '2026-01-16 08:37:18'),
(70, 18, 0, 'Find The Color', 'Computer', '2026-01-16 08:37:18'),
(71, 18, 0, ' Cut', 'Computer', '2026-01-16 08:37:18'),
(72, 18, 1, ' Find The Text', 'Computer', '2026-01-16 08:37:18'),
(73, 19, 0, ' F1', 'Computer', '2026-01-16 08:37:18'),
(74, 19, 0, 'F5', 'Computer', '2026-01-16 08:37:18'),
(75, 19, 1, ' F7', 'Computer', '2026-01-16 08:37:18'),
(76, 19, 0, ' F12', 'Computer', '2026-01-16 08:37:18'),
(77, 20, 0, ' CDs and DVDs', 'Computer', '2026-01-16 08:37:18'),
(78, 20, 0, ' Primary and Secondary', 'Computer', '2026-01-16 08:37:18'),
(79, 20, 1, ' RAM and ROM', 'Computer', '2026-01-16 08:37:18'),
(80, 20, 0, ' External Memory', 'Computer', '2026-01-16 08:37:18'),
(81, 21, 1, 'Spreadsheet', 'Computer', '2026-01-16 08:37:18'),
(82, 21, 0, 'Database Management', 'Computer', '2026-01-16 08:37:18'),
(83, 21, 0, 'Presentation', 'Computer', '2026-01-16 08:37:18'),
(84, 21, 0, 'Workbook', 'Computer', '2026-01-16 08:37:18'),
(85, 22, 0, '48,10,576', 'Computer', '2026-01-16 08:37:18'),
(86, 22, 1, '10,48,576', 'Computer', '2026-01-16 08:37:18'),
(87, 22, 0, '1,57,648', 'Computer', '2026-01-16 08:37:18'),
(88, 22, 0, '1,63, 84', 'Computer', '2026-01-16 08:37:18'),
(89, 23, 1, ' 1, 2, 3,...', 'Computer', '2026-01-16 08:37:18'),
(90, 23, 0, ' A, B, C,...', 'Computer', '2026-01-16 08:37:18'),
(91, 23, 0, 'A1, B1, C1, ....', 'Computer', '2026-01-16 08:37:18'),
(92, 23, 0, ' I, II, III,...', 'Computer', '2026-01-16 08:37:18'),
(93, 24, 0, 'Arithmetic', 'Computer', '2026-01-16 08:37:18'),
(94, 24, 0, 'Conditional', 'Computer', '2026-01-16 08:37:18'),
(95, 24, 1, 'Logical', 'Computer', '2026-01-16 08:37:18'),
(96, 24, 0, 'Greater', 'Computer', '2026-01-16 08:37:18'),
(97, 25, 0, '=IF (logical_test, TRUE([value_if_true]), FALSE([value_if_false]))', 'Computer', '2026-01-16 08:37:18'),
(98, 25, 1, '=IF (logical_test, [value_if_true], [value_if_false])', 'Computer', '2026-01-16 08:37:18'),
(99, 25, 0, '=IF (logical_test, {[value_if_true]}, {[value_if_false]})', 'Computer', '2026-01-16 08:37:18'),
(100, 25, 0, '=IF (logical_test: [value_if_true] , [value_if_false])', 'Computer', '2026-01-16 08:37:18'),
(101, 26, 1, 'Counts cells as specified', 'Computer', '2026-01-16 08:37:18'),
(102, 26, 0, 'Counts blank cells in a range', 'Computer', '2026-01-16 08:37:18'),
(103, 26, 0, 'Counts cells with numbers in a range', 'Computer', '2026-01-16 08:37:18'),
(104, 26, 0, 'Returns values based on a TRUE or FALSE condition', 'Computer', '2026-01-16 08:37:18'),
(105, 27, 0, '/', 'Computer', '2026-01-16 08:37:18'),
(106, 27, 0, 'f', 'Computer', '2026-01-16 08:37:18'),
(107, 27, 1, '=', 'Computer', '2026-01-16 08:37:18'),
(108, 27, 0, '?', 'Computer', '2026-01-16 08:37:18'),
(109, 28, 1, 'Ctrl+K', 'Computer', '2026-01-16 08:37:18'),
(110, 28, 0, 'Ctrl+H', 'Computer', '2026-01-16 08:37:18'),
(111, 28, 0, 'Ctrl+J', 'Computer', '2026-01-16 08:37:18'),
(112, 28, 0, 'Ctrl+F', 'Computer', '2026-01-16 08:37:18'),
(113, 29, 0, 'Ctrl+B', 'Computer', '2026-01-16 08:37:18'),
(114, 29, 0, 'Ctrl+I', 'Computer', '2026-01-16 08:37:18'),
(115, 29, 0, 'Ctrl+O', 'Computer', '2026-01-16 08:37:18'),
(116, 29, 1, 'Ctrl+N', 'Computer', '2026-01-16 08:37:18'),
(117, 30, 0, 'Data management', 'Computer', '2026-01-16 08:37:18'),
(118, 30, 0, 'Accounting', 'Computer', '2026-01-16 08:37:18'),
(119, 30, 0, 'Programming', 'Computer', '2026-01-16 08:37:18'),
(120, 30, 1, 'All Of Above', 'Computer', '2026-01-16 08:37:18'),
(121, 31, 1, '400%', 'Computer', '2026-01-16 08:37:18'),
(122, 31, 0, '300%', 'Computer', '2026-01-16 08:37:18'),
(123, 31, 0, '200%', 'Computer', '2026-01-16 08:37:18'),
(124, 31, 0, '100%', 'Computer', '2026-01-16 08:37:18'),
(125, 32, 0, 'Ctrl + F', 'Computer', '2026-01-16 08:37:18'),
(126, 32, 0, 'Ctrl + O', 'Computer', '2026-01-16 08:37:18'),
(127, 32, 1, ' Ctrl + M', 'Computer', '2026-01-16 08:37:18'),
(128, 32, 0, 'Ctrl + N', 'Computer', '2026-01-16 08:37:18'),
(129, 33, 0, 'Picture', 'Computer', '2026-01-16 08:37:18'),
(130, 33, 0, 'Gradient', 'Computer', '2026-01-16 08:37:18'),
(131, 33, 0, 'Texture', 'Computer', '2026-01-16 08:37:18'),
(132, 33, 1, 'All of the above', 'Computer', '2026-01-16 08:37:18'),
(133, 34, 0, 'Ms- Word', 'Computer', '2026-01-16 08:37:18'),
(134, 34, 0, 'Ms- Excel', 'Computer', '2026-01-16 08:37:18'),
(135, 34, 0, 'Ms- Access', 'Computer', '2026-01-16 08:37:18'),
(136, 34, 0, 'Ms - Power point', 'Computer', '2026-01-16 08:37:18'),
(137, 35, 0, 'Transition tab', 'Computer', '2026-01-16 08:37:18'),
(138, 35, 1, 'Design Tab', 'Computer', '2026-01-16 08:37:18'),
(139, 35, 0, 'Insert Tab', 'Computer', '2026-01-16 08:37:18'),
(140, 35, 0, 'Animation Tab', 'Computer', '2026-01-16 08:37:18'),
(141, 36, 1, 'F5', 'Computer', '2026-01-16 08:37:18'),
(142, 36, 0, 'F11', 'Computer', '2026-01-16 08:37:18'),
(143, 36, 0, 'F7', 'Computer', '2026-01-16 08:37:18'),
(144, 36, 0, 'shift+ F5', 'Computer', '2026-01-16 08:37:18'),
(145, 37, 1, 'Exretreme animation', 'Computer', '2026-01-16 08:37:18'),
(146, 37, 0, 'Slide show', 'Computer', '2026-01-16 08:37:18'),
(147, 37, 0, 'Slide sorter', 'Computer', '2026-01-16 08:37:18'),
(148, 37, 0, 'Normal', 'Computer', '2026-01-16 08:37:18'),
(149, 38, 0, 'COMMA', 'Computer', '2026-01-16 08:37:18'),
(150, 38, 0, 'HYPEN', 'Computer', '2026-01-16 08:37:18'),
(151, 38, 1, 'ESC', 'Computer', '2026-01-16 08:37:18'),
(152, 38, 0, 'TAB', 'Computer', '2026-01-16 08:37:18'),
(153, 39, 0, 'Comment Box', 'Computer', '2026-01-16 08:37:18'),
(154, 39, 0, 'Text Layer', 'Computer', '2026-01-16 08:37:18'),
(155, 39, 0, 'Note Box', 'Computer', '2026-01-16 08:37:18'),
(156, 39, 1, 'Text Box', 'Computer', '2026-01-16 08:37:18'),
(157, 40, 0, 'View', 'Computer', '2026-01-16 08:37:18'),
(158, 40, 1, 'Insert', 'Computer', '2026-01-16 08:37:18'),
(159, 40, 0, 'Edit', 'Computer', '2026-01-16 08:37:18'),
(160, 40, 0, 'File', 'Computer', '2026-01-16 08:37:18'),
(162, 41, 0, 'Ctrl+M', 'Computer', '2026-01-16 08:37:18'),
(163, 41, 0, 'Ctrl+B', 'Computer', '2026-01-16 08:37:18'),
(164, 41, 0, 'Ctrl+J', 'Computer', '2026-01-16 08:37:18'),
(165, 41, 1, 'Ctrl+N', 'Computer', '2026-01-16 08:37:18'),
(166, 42, 0, '3', 'Computer', '2026-01-16 08:37:18'),
(167, 42, 0, '4', 'Computer', '2026-01-16 08:37:18'),
(168, 42, 1, '5', 'Computer', '2026-01-16 08:37:18'),
(169, 42, 0, '6', 'Computer', '2026-01-16 08:37:18'),
(170, 43, 1, 'Artificial Intelligence ', 'Computer', '2026-01-16 08:37:18'),
(171, 43, 0, 'Programming Intelligence ', 'Computer', '2026-01-16 08:37:18'),
(172, 43, 0, 'System Knowledge ', 'Computer', '2026-01-16 08:37:18'),
(173, 43, 0, 'None Of These ', 'Computer', '2026-01-16 08:37:18'),
(174, 44, 0, 'Microsoft Word ', 'Computer', '2026-01-16 08:37:18'),
(175, 44, 0, 'Microsoft Excel ', 'Computer', '2026-01-16 08:37:18'),
(176, 44, 1, 'Microsoft Windows ', 'Computer', '2026-01-16 08:37:18'),
(177, 44, 0, 'Microsoft Access ', 'Computer', '2026-01-16 08:37:18'),
(178, 45, 0, 'Mainframe', 'Computer', '2026-01-16 08:37:18'),
(179, 45, 1, 'Super computer ', 'Computer', '2026-01-16 08:37:18'),
(180, 45, 0, 'Micro Computer ', 'Computer', '2026-01-16 08:37:18'),
(181, 45, 0, 'None of These', 'Computer', '2026-01-16 08:37:18'),
(182, 46, 0, 'Keyboard', 'Computer', '2026-01-16 08:37:18'),
(183, 46, 0, 'Mouse', 'Computer', '2026-01-16 08:37:18'),
(184, 46, 1, 'Speaker ', 'Computer', '2026-01-16 08:37:18'),
(185, 46, 0, 'Scanner ', 'Computer', '2026-01-16 08:37:18'),
(186, 47, 0, 'SUM', 'Computer', '2026-01-16 08:37:18'),
(187, 47, 0, 'MIN', 'Computer', '2026-01-16 08:37:18'),
(188, 47, 1, 'SUBTRACT', 'Computer', '2026-01-16 08:37:18'),
(189, 47, 0, 'MAX', 'Computer', '2026-01-16 08:37:18'),
(190, 48, 0, 'Powerpoint', 'Computer', '2026-01-16 08:37:18'),
(191, 48, 0, 'PowerPoint', 'Computer', '2026-01-16 08:37:18'),
(192, 48, 0, 'Pwrpoint', 'Computer', '2026-01-16 08:37:18'),
(193, 48, 1, 'Powerpnt', 'Computer', '2026-01-16 08:37:18'),
(198, 49, 1, 'TRUE', 'Computer', '2026-01-16 08:37:18'),
(199, 49, 0, 'FALSE', 'Computer', '2026-01-16 08:37:18'),
(200, 49, 0, 'Cant Say', 'Computer', '2026-01-16 08:37:18'),
(201, 49, 0, 'May Be', 'Computer', '2026-01-16 08:37:18'),
(202, 50, 0, ' Computer Processing Unit', 'Computer', '2026-01-16 08:37:18'),
(203, 50, 0, ' Central Peripheral Unit', 'Computer', '2026-01-16 08:37:18'),
(204, 50, 1, ' Central Processing Unit', 'Computer', '2026-01-16 08:37:18'),
(205, 50, 0, ' Computer Processing User', 'Computer', '2026-01-16 08:37:18'),
(206, 51, 0, 'Steve Jobs', 'C', '2026-01-16 08:37:18'),
(207, 51, 0, 'James Gosling', 'C', '2026-01-16 08:37:18'),
(208, 51, 1, 'Dennis Ritchie', 'C', '2026-01-16 08:37:18'),
(209, 51, 0, 'Rasmus Lerdorf', 'C', '2026-01-16 08:37:18'),
(210, 52, 0, 'int number;', 'C', '2026-01-16 08:37:18'),
(211, 52, 0, 'float rate;', 'C', '2026-01-16 08:37:18'),
(212, 52, 0, 'int variable_count;', 'C', '2026-01-16 08:37:18'),
(213, 52, 1, 'int $main;', 'C', '2026-01-16 08:37:18'),
(214, 53, 1, 'LowerCase letters', 'C', '2026-01-16 08:37:18'),
(215, 53, 0, 'UpperCase letters', 'C', '2026-01-16 08:37:18'),
(216, 53, 0, 'CamelCase letters', 'C', '2026-01-16 08:37:18'),
(217, 53, 0, 'None of the mentioned', 'C', '2026-01-16 08:37:18'),
(218, 54, 0, '-3.4e38 to 3.4e38', 'C', '2026-01-16 08:37:18'),
(219, 54, 1, '-32767 to 32768', 'C', '2026-01-16 08:37:18'),
(220, 54, 0, '-32668 to 32667', 'C', '2026-01-16 08:37:18'),
(221, 54, 0, '-32768 to 32767', 'C', '2026-01-16 08:37:18'),
(222, 55, 1, '19 82', 'C', '2026-01-16 08:37:18'),
(223, 55, 0, 'Compilation Error', 'C', '2026-01-16 08:37:18'),
(224, 55, 0, '82 19', 'C', '2026-01-16 08:37:18'),
(225, 55, 0, 'None of the above', 'C', '2026-01-16 08:37:18'),
(226, 56, 0, '2', 'C', '2026-01-16 08:37:18'),
(227, 56, 0, '3', 'C', '2026-01-16 08:37:18'),
(228, 56, 0, '4', 'C', '2026-01-16 08:37:18'),
(229, 56, 1, '5', 'C', '2026-01-16 08:37:18'),
(230, 57, 0, 'Greater', 'C', '2026-01-16 08:37:18'),
(231, 57, 0, 'Equal', 'C', '2026-01-16 08:37:18'),
(232, 57, 1, 'Lesser', 'C', '2026-01-16 08:37:18'),
(233, 57, 0, 'None of the above', 'C', '2026-01-16 08:37:18'),
(234, 58, 1, '5 3', 'C', '2026-01-16 08:37:18'),
(235, 58, 0, '5 5', 'C', '2026-01-16 08:37:18'),
(236, 58, 0, '3 3', 'C', '2026-01-16 08:37:18'),
(237, 58, 0, '3 5', 'C', '2026-01-16 08:37:18'),
(238, 59, 0, '&&', 'C', '2026-01-16 08:37:18'),
(239, 59, 0, '!', 'C', '2026-01-16 08:37:18'),
(240, 59, 1, '|', 'C', '2026-01-16 08:37:18'),
(241, 59, 0, '||', 'C', '2026-01-16 08:37:18'),
(242, 60, 0, 'Equality Compairsion ( == )', 'C', '2026-01-16 08:37:18'),
(243, 60, 0, 'Assignment ( = )', 'C', '2026-01-16 08:37:18'),
(244, 60, 1, 'Both of the above', 'C', '2026-01-16 08:37:18'),
(245, 60, 0, 'None of the above', 'C', '2026-01-16 08:37:18'),
(246, 61, 1, 'The size of a variable in bytes.', 'C', '2026-01-16 08:37:18'),
(247, 61, 0, 'The address of a variable.', 'C', '2026-01-16 08:37:18'),
(248, 61, 0, 'The value of a variable.', 'C', '2026-01-16 08:37:18'),
(249, 61, 0, 'The type of a variable.', 'C', '2026-01-16 08:37:18'),
(250, 62, 0, 'close()', 'C', '2026-01-16 08:37:18'),
(251, 62, 0, 'file_close()', 'C', '2026-01-16 08:37:18'),
(252, 62, 1, 'fclose()', 'C', '2026-01-16 08:37:18'),
(253, 62, 0, 'endfile()', 'C', '2026-01-16 08:37:18'),
(254, 63, 0, '2', 'C', '2026-01-16 08:37:18'),
(255, 63, 0, 'None', 'C', '2026-01-16 08:37:18'),
(256, 63, 0, '1 2 3 None', 'C', '2026-01-16 08:37:18'),
(257, 63, 1, '2 3 None', 'C', '2026-01-16 08:37:18'),
(258, 64, 0, 'Hello', 'C', '2026-01-16 08:37:18'),
(259, 64, 0, '5', 'C', '2026-01-16 08:37:18'),
(260, 64, 1, 'Hello 5', 'C', '2026-01-16 08:37:18'),
(261, 64, 0, '0', 'C', '2026-01-16 08:37:18'),
(262, 65, 0, '2', 'C', '2026-01-16 08:37:18'),
(263, 65, 0, '15', 'C', '2026-01-16 08:37:18'),
(264, 65, 0, '18', 'C', '2026-01-16 08:37:18'),
(265, 65, 1, '16', 'C', '2026-01-16 08:37:18'),
(266, 66, 0, '4', 'C', '2026-01-16 08:37:18'),
(267, 66, 1, '8', 'C', '2026-01-16 08:37:18'),
(268, 66, 0, '12', 'C', '2026-01-16 08:37:18'),
(269, 66, 0, '16', 'C', '2026-01-16 08:37:18'),
(270, 67, 0, 'No Data Hiding.', 'C', '2026-01-16 08:37:18'),
(271, 67, 1, 'Functions are allowed inside structs.', 'C', '2026-01-16 08:37:18'),
(272, 67, 0, 'Constructors are not allowed inside structs.', 'C', '2026-01-16 08:37:18'),
(273, 67, 0, 'Cannot have static members in the structs body.', 'C', '2026-01-16 08:37:18'),
(274, 68, 0, 'for', 'C', '2026-01-16 08:37:18'),
(275, 68, 0, 'while', 'C', '2026-01-16 08:37:18'),
(276, 68, 0, 'do-while', 'C', '2026-01-16 08:37:18'),
(277, 68, 1, 'all of the mentioned', 'C', '2026-01-16 08:37:18'),
(278, 69, 0, 'Inclusion directive', 'C', '2026-01-16 08:37:18'),
(279, 69, 1, 'Preprocessor directive', 'C', '2026-01-16 08:37:18'),
(280, 69, 0, 'File inclusion directive', 'C', '2026-01-16 08:37:18'),
(281, 69, 0, 'None of the mentioned', 'C', '2026-01-16 08:37:18'),
(282, 70, 1, '1 Byte', 'C', '2026-01-16 08:37:18'),
(283, 70, 0, '2 Byte', 'C', '2026-01-16 08:37:18'),
(284, 70, 0, '1 bit', 'C', '2026-01-16 08:37:18'),
(285, 70, 1, '8 bit', 'C', '2026-01-16 08:37:18'),
(286, 71, 0, '1', 'C', '2026-01-16 08:37:18'),
(287, 71, 0, '4', 'C', '2026-01-16 08:37:18'),
(288, 71, 0, '20', 'C', '2026-01-16 08:37:18'),
(289, 71, 1, '10', 'C', '2026-01-16 08:37:18'),
(290, 72, 0, 'Hello, World', 'C', '2026-01-16 08:37:18'),
(291, 72, 0, 'ol, World!', 'C', '2026-01-16 08:37:18'),
(292, 72, 1, 'World!', 'C', '2026-01-16 08:37:18'),
(293, 72, 0, 'ello, World!', 'C', '2026-01-16 08:37:18'),
(294, 73, 0, '9', 'C', '2026-01-16 08:37:18'),
(295, 73, 0, '10', 'C', '2026-01-16 08:37:18'),
(296, 73, 0, '11', 'C', '2026-01-16 08:37:18'),
(297, 73, 1, '12', 'C', '2026-01-16 08:37:18'),
(298, 74, 0, '10', 'C', '2026-01-16 08:37:18'),
(299, 74, 1, '20', 'C', '2026-01-16 08:37:18'),
(300, 74, 0, '30', 'C', '2026-01-16 08:37:18'),
(301, 74, 0, 'Error', 'C', '2026-01-16 08:37:18'),
(302, 75, 0, 'It is used to declare arrays.', 'C', '2026-01-16 08:37:18'),
(303, 75, 1, 'It is used to group together variables of different data types.', 'C', '2026-01-16 08:37:18'),
(304, 75, 0, 'It is used to create linked lists.', 'C', '2026-01-16 08:37:18'),
(305, 75, 0, 'It is used to define constant values.', 'C', '2026-01-16 08:37:18'),
(306, 76, 1, 'malloc()', 'C', '2026-01-16 08:37:18'),
(307, 76, 0, 'printf()', 'C', '2026-01-16 08:37:18'),
(308, 76, 0, 'strcpy()', 'C', '2026-01-16 08:37:18'),
(309, 76, 0, 'sin()', 'C', '2026-01-16 08:37:18'),
(310, 77, 1, '&', 'C', '2026-01-16 08:37:18'),
(311, 77, 0, '*', 'C', '2026-01-16 08:37:18'),
(312, 77, 0, '@', 'C', '2026-01-16 08:37:18'),
(313, 77, 0, '#', 'C', '2026-01-16 08:37:18'),
(314, 78, 0, 'It is used for iteration.', 'C', '2026-01-16 08:37:18'),
(315, 78, 0, 'It is used for decision-making.', 'C', '2026-01-16 08:37:18'),
(316, 78, 1, 'It ensures that a block of code is executed at least once.', 'C', '2026-01-16 08:37:18'),
(317, 78, 0, 'It is used to break out of a loop.', 'C', '2026-01-16 08:37:18'),
(318, 79, 0, '023 23', 'C', '2026-01-16 08:37:18'),
(319, 79, 1, '19 23', 'C', '2026-01-16 08:37:18'),
(320, 79, 0, '23 23', 'C', '2026-01-16 08:37:18'),
(321, 79, 0, '23 19', 'C', '2026-01-16 08:37:18'),
(322, 80, 0, '12', 'C', '2026-01-16 08:37:18'),
(323, 80, 0, '24', 'C', '2026-01-16 08:37:18'),
(324, 80, 0, '18', 'C', '2026-01-16 08:37:18'),
(325, 80, 1, '20', 'C', '2026-01-16 08:37:18'),
(326, 81, 1, 'Hello Hello ', 'C', '2026-01-16 08:37:18'),
(327, 81, 0, 'Hello', 'C', '2026-01-16 08:37:18'),
(328, 81, 0, 'compilation Error', 'C', '2026-01-16 08:37:18'),
(329, 81, 0, 'None of the above', 'C', '2026-01-16 08:37:18'),
(330, 82, 1, '3 2 1 0 1 2 3', 'C', '2026-01-16 08:37:18'),
(331, 82, 0, '3 2 1 0', 'C', '2026-01-16 08:37:18'),
(332, 82, 0, '0 1 2 3', 'C', '2026-01-16 08:37:18'),
(333, 82, 0, 'None of the above', 'C', '2026-01-16 08:37:18'),
(334, 83, 0, 'It converts a string to uppercase.', 'C', '2026-01-16 08:37:18'),
(335, 83, 0, 'It compares two strings.', 'C', '2026-01-16 08:37:18'),
(336, 83, 1, 'It concatenates two strings.', 'C', '2026-01-16 08:37:18'),
(337, 83, 0, 'It calculates the string length.', 'C', '2026-01-16 08:37:18'),
(338, 84, 1, '|', 'C', '2026-01-16 08:37:18'),
(339, 84, 0, '|&', 'C', '2026-01-16 08:37:18'),
(340, 84, 0, '|*', 'C', '2026-01-16 08:37:18'),
(341, 84, 0, '||', 'C', '2026-01-16 08:37:18'),
(342, 85, 0, 'It makes the variable global.', 'C', '2026-01-16 08:37:18'),
(343, 85, 0, 'It allocates memory on the heap.', 'C', '2026-01-16 08:37:18'),
(344, 85, 1, 'It preserves the variable?s value between function calls.', 'C', '2026-01-16 08:37:18'),
(345, 85, 0, 'It initializes the variable to zero.', 'C', '2026-01-16 08:37:18'),
(346, 86, 0, 'char', 'C', '2026-01-16 08:37:18'),
(347, 86, 0, 'int', 'C', '2026-01-16 08:37:18'),
(348, 86, 0, 'long', 'C', '2026-01-16 08:37:18'),
(349, 86, 1, 'double', 'C', '2026-01-16 08:37:18'),
(350, 87, 1, 'In while loop 2', 'C', '2026-01-16 08:37:18'),
(351, 87, 0, 'In while loop in while loop 2', 'C', '2026-01-16 08:37:18'),
(352, 87, 0, 'In while loop 3', 'C', '2026-01-16 08:37:18'),
(353, 87, 0, 'Infinite loop', 'C', '2026-01-16 08:37:18'),
(354, 88, 0, '1', 'C', '2026-01-16 08:37:18'),
(355, 88, 0, '2', 'C', '2026-01-16 08:37:18'),
(356, 88, 0, '3', 'C', '2026-01-16 08:37:18'),
(357, 88, 1, '4', 'C', '2026-01-16 08:37:18'),
(358, 89, 0, '3.75', 'C', '2026-01-16 08:37:18'),
(359, 89, 0, 'Depends on compiler', 'C', '2026-01-16 08:37:18'),
(360, 89, 1, '24', 'C', '2026-01-16 08:37:18'),
(361, 89, 0, '3', 'C', '2026-01-16 08:37:18'),
(362, 90, 0, 'It will cause a compile-time error', 'C', '2026-01-16 08:37:18'),
(363, 90, 1, 'It will run without any error and prints 3', 'C', '2026-01-16 08:37:18'),
(364, 90, 0, 'It will cause a run-time error', 'C', '2026-01-16 08:37:18'),
(365, 90, 0, 'It will experience infinite looping', 'C', '2026-01-16 08:37:18'),
(366, 91, 1, 'void', 'C', '2026-01-16 08:37:18'),
(367, 91, 0, 'null', 'C', '2026-01-16 08:37:18'),
(368, 91, 0, 'free', 'C', '2026-01-16 08:37:18'),
(369, 91, 0, 'empty', 'C', '2026-01-16 08:37:18'),
(370, 92, 0, 'myfriend', 'C', '2026-01-16 08:37:18'),
(371, 92, 0, 'classfriend', 'C', '2026-01-16 08:37:18'),
(372, 92, 1, 'friend', 'C', '2026-01-16 08:37:18'),
(373, 92, 0, 'firend', 'C', '2026-01-16 08:37:18'),
(374, 93, 0, 'a class that has four forms', 'C', '2026-01-16 08:37:18'),
(375, 93, 0, 'a class that has two forms', 'C', '2026-01-16 08:37:18'),
(376, 93, 0, 'a class that has only a single form', 'C', '2026-01-16 08:37:18'),
(377, 93, 1, 'a class that has many forms', 'C', '2026-01-16 08:37:18'),
(378, 94, 0, 'queue', 'C', '2026-01-16 08:37:18'),
(379, 94, 1, 'set', 'C', '2026-01-16 08:37:18'),
(380, 94, 0, 'heap', 'C', '2026-01-16 08:37:18'),
(381, 94, 0, 'multimap', 'C', '2026-01-16 08:37:18'),
(382, 95, 0, 'Hi', 'C', '2026-01-16 08:37:18'),
(383, 95, 1, 'Bye', 'C', '2026-01-16 08:37:18'),
(384, 95, 0, 'HiBye', 'C', '2026-01-16 08:37:18'),
(385, 95, 0, 'Compilation Error', 'C', '2026-01-16 08:37:18'),
(386, 96, 0, '11', 'C', '2026-01-16 08:37:18'),
(387, 96, 1, '10', 'C', '2026-01-16 08:37:18'),
(388, 96, 0, 'Error', 'C', '2026-01-16 08:37:18'),
(389, 96, 0, '0', 'C', '2026-01-16 08:37:18'),
(390, 97, 0, 'Error', 'C', '2026-01-16 08:37:18'),
(391, 97, 1, '5 Times', 'C', '2026-01-16 08:37:18'),
(392, 97, 0, '4 Times', 'C', '2026-01-16 08:37:18'),
(393, 97, 0, '6 Times', 'C', '2026-01-16 08:37:18'),
(394, 98, 1, '10', 'C', '2026-01-16 08:37:18'),
(395, 98, 0, '11', 'C', '2026-01-16 08:37:18'),
(396, 98, 0, '12', 'C', '2026-01-16 08:37:18'),
(397, 98, 0, '13', 'C', '2026-01-16 08:37:18'),
(398, 99, 1, 'Yes', 'C', '2026-01-16 08:37:18'),
(399, 99, 0, 'No', 'C', '2026-01-16 08:37:18'),
(400, 99, 0, 'Compilation Error', 'C', '2026-01-16 08:37:18'),
(401, 99, 0, 'Runtime Error', 'C', '2026-01-16 08:37:18'),
(402, 100, 0, '+', 'C', '2026-01-16 08:37:18'),
(403, 100, 0, '-', 'C', '2026-01-16 08:37:18'),
(404, 100, 0, '*', 'C', '2026-01-16 08:37:18'),
(405, 100, 1, '::', 'C', '2026-01-16 08:37:18'),
(406, 101, 0, '+', 'C', '2026-01-16 08:37:18'),
(407, 101, 0, '-', 'C', '2026-01-16 08:37:18'),
(408, 101, 1, '++', 'C', '2026-01-16 08:37:18'),
(409, 101, 0, '*', 'C', '2026-01-16 08:37:18'),
(410, 102, 1, 'for(initialization;condition; increment/decrement)', 'C', '2026-01-16 08:37:18'),
(411, 102, 0, 'for(increment/decrement; initialization; condition)', 'C', '2026-01-16 08:37:18'),
(412, 102, 0, 'for(initialization, condition, increment/decrement', 'C', '2026-01-16 08:37:18'),
(413, 102, 0, 'None of These', 'C', '2026-01-16 08:37:18'),
(414, 103, 0, '111111', 'C', '2026-01-16 08:37:18'),
(415, 103, 1, '111011', 'C', '2026-01-16 08:37:18'),
(416, 103, 0, '101011', 'C', '2026-01-16 08:37:18'),
(417, 103, 0, '101010', 'C', '2026-01-16 08:37:18'),
(418, 104, 0, 'One', 'C', '2026-01-16 08:37:18'),
(419, 104, 0, 'Compilation Error', 'C', '2026-01-16 08:37:18'),
(420, 104, 0, 'Default', 'C', '2026-01-16 08:37:18'),
(421, 104, 1, 'OneTwoThreeDefault', 'C', '2026-01-16 08:37:18'),
(422, 105, 0, 'Compilation Error', 'C', '2026-01-16 08:37:18'),
(423, 105, 0, '0', 'C', '2026-01-16 08:37:18'),
(424, 105, 1, '-3', 'C', '2026-01-16 08:37:18'),
(425, 105, 0, '3', 'C', '2026-01-16 08:37:18'),
(426, 106, 0, 'FiveSix', 'C', '2026-01-16 08:37:18'),
(427, 106, 1, 'Five', 'C', '2026-01-16 08:37:18'),
(428, 106, 0, 'Six', 'C', '2026-01-16 08:37:18'),
(429, 106, 0, 'None of the above', 'C', '2026-01-16 08:37:18'),
(430, 107, 0, 'A class with abstract keyword.', 'C', '2026-01-16 08:37:18'),
(431, 107, 0, 'A class with no functions in it.', 'C', '2026-01-16 08:37:18'),
(432, 107, 1, 'A class with atleast one pure virtual function.', 'C', '2026-01-16 08:37:18'),
(433, 107, 0, 'Empty Class.', 'C', '2026-01-16 08:37:18'),
(434, 108, 1, 'Yes', 'C', '2026-01-16 08:37:18'),
(435, 108, 0, 'No', 'C', '2026-01-16 08:37:18'),
(436, 108, 0, 'Compilation Error', 'C', '2026-01-16 08:37:18'),
(437, 108, 0, 'None of the above', 'C', '2026-01-16 08:37:18'),
(438, 109, 0, 'Storing data in arrays', 'C', '2026-01-16 08:37:18'),
(439, 109, 0, 'The process of inheritance', 'C', '2026-01-16 08:37:18'),
(440, 109, 1, 'Combining data and methods', 'C', '2026-01-16 08:37:18'),
(441, 109, 0, 'A type of loop', 'C', '2026-01-16 08:37:18'),
(442, 110, 0, 'Encapsulation', 'C', '2026-01-16 08:37:18'),
(443, 110, 0, 'Abstraction', 'C', '2026-01-16 08:37:18'),
(444, 110, 0, 'Inheritance', 'C', '2026-01-16 08:37:18'),
(445, 110, 1, 'Polymorphism', 'C', '2026-01-16 08:37:18'),
(446, 111, 0, 'blue', 'C', '2026-01-16 08:37:18'),
(447, 111, 0, 'Compilation Error', 'C', '2026-01-16 08:37:18'),
(448, 111, 1, '2', 'C', '2026-01-16 08:37:18'),
(449, 111, 0, '1', 'C', '2026-01-16 08:37:18'),
(450, 112, 1, '4', 'C', '2026-01-16 08:37:18'),
(451, 112, 0, '3', 'C', '2026-01-16 08:37:18'),
(452, 112, 0, '2', 'C', '2026-01-16 08:37:18'),
(453, 112, 0, '1', 'C', '2026-01-16 08:37:18'),
(454, 113, 0, '9876543210', 'C', '2026-01-16 08:37:18'),
(455, 113, 0, '987654321', 'C', '2026-01-16 08:37:18'),
(456, 113, 1, '0', 'C', '2026-01-16 08:37:18'),
(457, 113, 0, '9', 'C', '2026-01-16 08:37:18'),
(458, 114, 0, 'The programs runs with no output', 'C', '2026-01-16 08:37:18'),
(459, 114, 1, '77', 'C', '2026-01-16 08:37:18'),
(460, 114, 0, 'Hello!', 'C', '2026-01-16 08:37:18'),
(461, 114, 0, 'Hello!', 'C', '2026-01-16 08:37:18'),
(462, 115, 0, 'g++ -o <filename>', 'C', '2026-01-16 08:37:18'),
(463, 115, 1, 'g++ -c <filename>', 'C', '2026-01-16 08:37:18'),
(464, 115, 0, 'g++ <filename>', 'C', '2026-01-16 08:37:18'),
(465, 115, 0, 'g++ -f <filename>', 'C', '2026-01-16 08:37:18'),
(466, 116, 0, 'static function', 'C', '2026-01-16 08:37:18'),
(467, 116, 0, 'utility function', 'C', '2026-01-16 08:37:18'),
(468, 116, 1, 'constructor', 'C', '2026-01-16 08:37:18'),
(469, 116, 0, 'destructor', 'C', '2026-01-16 08:37:18'),
(470, 117, 1, 'Static function', 'C', '2026-01-16 08:37:18'),
(471, 117, 0, 'constructor', 'C', '2026-01-16 08:37:18'),
(472, 117, 0, 'destructor', 'C', '2026-01-16 08:37:18'),
(473, 117, 0, 'friend', 'C', '2026-01-16 08:37:18'),
(474, 118, 0, 'Polymorphism', 'C', '2026-01-16 08:37:18'),
(475, 118, 1, 'Inheritance', 'C', '2026-01-16 08:37:18'),
(476, 118, 0, 'Function overloading', 'C', '2026-01-16 08:37:18'),
(477, 118, 0, 'None of these', 'C', '2026-01-16 08:37:18'),
(478, 119, 0, 'Equal', 'C', '2026-01-16 08:37:18'),
(479, 119, 0, 'EqualEqual', 'C', '2026-01-16 08:37:18'),
(480, 119, 0, 'EqualNotEqual', 'C', '2026-01-16 08:37:18'),
(481, 119, 1, 'NotEqual', 'C', '2026-01-16 08:37:18'),
(482, 120, 0, '1', 'C', '2026-01-16 08:37:18'),
(483, 120, 0, '2', 'C', '2026-01-16 08:37:18'),
(484, 120, 1, '3', 'C', '2026-01-16 08:37:18'),
(485, 120, 0, '4', 'C', '2026-01-16 08:37:18'),
(486, 121, 1, '28', 'Tally', '2026-01-16 08:37:18'),
(487, 121, 0, '30', 'Tally', '2026-01-16 08:37:18'),
(488, 121, 0, '15', 'Tally', '2026-01-16 08:37:18'),
(489, 121, 0, '11', 'Tally', '2026-01-16 08:37:18'),
(490, 122, 0, ' Vedika  softwares ', 'Tally', '2026-01-16 08:37:18'),
(491, 122, 0, ' Peutronics ', 'Tally', '2026-01-16 08:37:18'),
(492, 122, 0, 'Coral softwares ', 'Tally', '2026-01-16 08:37:18'),
(493, 122, 1, ' Tally softwares', 'Tally', '2026-01-16 08:37:18'),
(494, 123, 1, '1st  April of any Year', 'Tally', '2026-01-16 08:37:18'),
(495, 123, 0, ' 31st March of any year', 'Tally', '2026-01-16 08:37:18'),
(496, 123, 0, 'All of them are true ', 'Tally', '2026-01-16 08:37:18'),
(497, 123, 0, 'None of these', 'Tally', '2026-01-16 08:37:18'),
(498, 124, 0, 'Select Company ', 'Tally', '2026-01-16 08:37:18'),
(499, 124, 0, ' Shut Company', 'Tally', '2026-01-16 08:37:18'),
(500, 124, 1, ' Alter', 'Tally', '2026-01-16 08:37:18'),
(501, 124, 0, 'Create company', 'Tally', '2026-01-16 08:37:18'),
(502, 125, 0, ' Reports', 'Tally', '2026-01-16 08:37:18'),
(503, 125, 0, ' Import ', 'Tally', '2026-01-16 08:37:18'),
(504, 125, 1, ' Masters', 'Tally', '2026-01-16 08:37:18'),
(505, 125, 0, 'Transactions', 'Tally', '2026-01-16 08:37:18'),
(506, 126, 0, 'Voucher ', 'Tally', '2026-01-16 08:37:18'),
(507, 126, 1, ' Accounting voucher ', 'Tally', '2026-01-16 08:37:18'),
(508, 126, 0, ' Accounts info ', 'Tally', '2026-01-16 08:37:18'),
(509, 126, 0, 'None Of these ', 'Tally', '2026-01-16 08:37:18'),
(510, 127, 0, 'Indirect Incomes ', 'Tally', '2026-01-16 08:37:18'),
(511, 127, 1, 'Indirect Expenses ', 'Tally', '2026-01-16 08:37:18'),
(512, 127, 0, ' direct Incomes ', 'Tally', '2026-01-16 08:37:18'),
(513, 127, 0, ' direct Incomes  ', 'Tally', '2026-01-16 08:37:18'),
(514, 128, 0, 'System software', 'Tally', '2026-01-16 08:37:18'),
(515, 128, 0, ' Utility software', 'Tally', '2026-01-16 08:37:18'),
(516, 128, 1, ' Application software', 'Tally', '2026-01-16 08:37:18'),
(517, 128, 0, ' Operating software', 'Tally', '2026-01-16 08:37:18'),
(518, 129, 0, 'Cash', 'Tally', '2026-01-16 08:37:18'),
(519, 129, 0, 'Profit &Loss A/c', 'Tally', '2026-01-16 08:37:18'),
(520, 129, 0, 'CapitalA/c', 'Tally', '2026-01-16 08:37:18'),
(521, 129, 1, ' A And B Both', 'Tally', '2026-01-16 08:37:18'),
(522, 130, 0, 'Receipt ', 'Tally', '2026-01-16 08:37:18'),
(523, 130, 1, 'contra ', 'Tally', '2026-01-16 08:37:18'),
(524, 130, 0, ' Payment ', 'Tally', '2026-01-16 08:37:18'),
(525, 130, 0, ' post- Dated ', 'Tally', '2026-01-16 08:37:18'),
(526, 131, 0, 'contra', 'Tally', '2026-01-16 08:37:18'),
(527, 131, 0, 'Journal ', 'Tally', '2026-01-16 08:37:18'),
(528, 131, 0, 'Receipt ', 'Tally', '2026-01-16 08:37:18'),
(529, 131, 1, ' Payment', 'Tally', '2026-01-16 08:37:18'),
(530, 132, 0, 'Purchase ', 'Tally', '2026-01-16 08:37:18'),
(531, 132, 1, 'Journal ', 'Tally', '2026-01-16 08:37:18'),
(532, 132, 0, 'Receipt ', 'Tally', '2026-01-16 08:37:18'),
(533, 132, 0, ' Payment', 'Tally', '2026-01-16 08:37:18'),
(534, 133, 1, 'Assets =Liabilities + Capital ', 'Tally', '2026-01-16 08:37:18'),
(535, 133, 0, 'Liabilities =Assets +Capital ', 'Tally', '2026-01-16 08:37:18'),
(536, 133, 0, 'Capital= Assets +Liabilites ', 'Tally', '2026-01-16 08:37:18'),
(537, 133, 0, ' All of these ', 'Tally', '2026-01-16 08:37:18'),
(538, 134, 0, '3', 'Tally', '2026-01-16 08:37:18'),
(539, 134, 0, '2', 'Tally', '2026-01-16 08:37:18'),
(540, 134, 0, '4', 'Tally', '2026-01-16 08:37:18'),
(541, 134, 1, '5', 'Tally', '2026-01-16 08:37:18'),
(542, 135, 0, 'Gateway of Tally >Reports > Trail Balance', 'Tally', '2026-01-16 08:37:18'),
(543, 135, 0, ' Gateway of Tally > Trail Balance', 'Tally', '2026-01-16 08:37:18'),
(544, 135, 1, ' Gateway of Tally > Display more reports> Trail Balance', 'Tally', '2026-01-16 08:37:18'),
(545, 135, 0, ' None of these ', 'Tally', '2026-01-16 08:37:18'),
(546, 136, 0, ' Company Information', 'Tally', '2026-01-16 08:37:18'),
(547, 136, 1, ' Company Features', 'Tally', '2026-01-16 08:37:18'),
(548, 136, 0, ' Accounting Vouchers', 'Tally', '2026-01-16 08:37:18'),
(549, 136, 0, ' Inventory Vouchers', 'Tally', '2026-01-16 08:37:18'),
(550, 137, 1, 'Main Location', 'Tally', '2026-01-16 08:37:18'),
(551, 137, 0, 'A or C', 'Tally', '2026-01-16 08:37:18'),
(552, 137, 0, 'Primary', 'Tally', '2026-01-16 08:37:18'),
(553, 137, 0, 'None of these', 'Tally', '2026-01-16 08:37:18'),
(554, 138, 0, ' Cash Account', 'Tally', '2026-01-16 08:37:18'),
(555, 138, 0, ' Bank Account', 'Tally', '2026-01-16 08:37:18'),
(556, 138, 1, ' Sundry Creditors', 'Tally', '2026-01-16 08:37:18'),
(557, 138, 0, ' Sundry Debtors', 'Tally', '2026-01-16 08:37:18'),
(558, 139, 0, ' Inventory Info', 'Tally', '2026-01-16 08:37:18'),
(559, 139, 0, ' Reports Menu', 'Tally', '2026-01-16 08:37:18'),
(560, 139, 0, ' Gateway of Tally', 'Tally', '2026-01-16 08:37:18'),
(561, 139, 1, ' Display', 'Tally', '2026-01-16 08:37:18'),
(562, 140, 0, ' Enterprise Resolution Planning', 'Tally', '2026-01-16 08:37:18'),
(563, 140, 1, ' Enterprise Resource Planning', 'Tally', '2026-01-16 08:37:18'),
(564, 140, 0, ' Entry Resource Planning', 'Tally', '2026-01-16 08:37:18'),
(565, 140, 0, ' Exclusive Resource Planning', 'Tally', '2026-01-16 08:37:18'),
(566, 141, 0, ' To open the calculator panel', 'Tally', '2026-01-16 08:37:18'),
(567, 141, 0, ' To copy text', 'Tally', '2026-01-16 08:37:18'),
(568, 141, 1, ' To create a ledger while in a voucher entry screen', 'Tally', '2026-01-16 08:37:18'),
(569, 141, 0, ' To cancel a transaction', 'Tally', '2026-01-16 08:37:18'),
(570, 142, 0, ' F1', 'Tally', '2026-01-16 08:37:18'),
(571, 142, 0, ' F2', 'Tally', '2026-01-16 08:37:18'),
(572, 142, 1, ' F11', 'Tally', '2026-01-16 08:37:18'),
(573, 142, 0, ' F12', 'Tally', '2026-01-16 08:37:18'),
(574, 143, 0, ' Cash', 'Tally', '2026-01-16 08:37:18'),
(575, 143, 0, ' Bank', 'Tally', '2026-01-16 08:37:18'),
(576, 143, 0, ' Sales', 'Tally', '2026-01-16 08:37:18'),
(577, 143, 1, ' Profit & Loss Account', 'Tally', '2026-01-16 08:37:18'),
(578, 144, 1, ' Current Assets', 'Tally', '2026-01-16 08:37:18'),
(579, 144, 0, ' Current Liabilities', 'Tally', '2026-01-16 08:37:18'),
(580, 144, 0, ' Fixed Assets', 'Tally', '2026-01-16 08:37:18'),
(581, 144, 0, ' Indirect Expenses', 'Tally', '2026-01-16 08:37:18'),
(582, 145, 0, ' Debit Purchases ?10,000; Credit Cash ?10,000', 'Tally', '2026-01-16 08:37:18'),
(583, 145, 1, ' Debit Purchases ?10,000; Credit Creditor ?10,000', 'Tally', '2026-01-16 08:37:18'),
(584, 145, 0, ' Debit Purchases ?10,000; Credit Sales ?10,000', 'Tally', '2026-01-16 08:37:18'),
(585, 145, 0, ' Debit Creditor ?10,000; Credit Purchases ?10,000', 'Tally', '2026-01-16 08:37:18'),
(586, 146, 1, ' Debit Furniture Account; Credit Creditor Account', 'Tally', '2026-01-16 08:37:18'),
(587, 146, 0, ' Debit Cash Account; Credit Furniture Account', 'Tally', '2026-01-16 08:37:18'),
(588, 146, 0, ' Debit Furniture Account; Credit Bank Account', 'Tally', '2026-01-16 08:37:18'),
(589, 146, 0, ' Debit Bank Account; Credit Furniture Account', 'Tally', '2026-01-16 08:37:18'),
(590, 147, 0, ' Payment Voucher', 'Tally', '2026-01-16 08:37:18'),
(591, 147, 0, ' Credit Note Voucher', 'Tally', '2026-01-16 08:37:18'),
(592, 147, 1, ' Debit Note Voucher', 'Tally', '2026-01-16 08:37:18'),
(593, 147, 0, ' Journal Voucher', 'Tally', '2026-01-16 08:37:18'),
(594, 148, 0, ' Ctrl + F9', 'Tally', '2026-01-16 08:37:18'),
(595, 148, 0, ' Ctrl + F6', 'Tally', '2026-01-16 08:37:18'),
(596, 148, 0, ' Ctrl + F5', 'Tally', '2026-01-16 08:37:18'),
(597, 148, 1, ' Ctrl + F8', 'Tally', '2026-01-16 08:37:18'),
(598, 149, 0, ' Cash Deposit in Bank', 'Tally', '2026-01-16 08:37:18'),
(599, 149, 0, ' Cash Withdrawal from Bank', 'Tally', '2026-01-16 08:37:18'),
(600, 149, 0, ' Transfer from Bank to Bank', 'Tally', '2026-01-16 08:37:18'),
(601, 149, 1, ' Credit Sale', 'Tally', '2026-01-16 08:37:18'),
(602, 150, 0, ' Balance Sheet', 'Tally', '2026-01-16 08:37:18'),
(603, 150, 0, ' Profit & Loss Account', 'Tally', '2026-01-16 08:37:18'),
(604, 150, 1, ' Database Management', 'Tally', '2026-01-16 08:37:18'),
(605, 150, 0, ' Inventory Management', 'Tally', '2026-01-16 08:37:18'),
(606, 151, 0, ' Changes company data', 'Tally', '2026-01-16 08:37:18'),
(607, 151, 1, ' Changes Tally configuration settings', 'Tally', '2026-01-16 08:37:18'),
(608, 151, 0, ' Creates a new ledger', 'Tally', '2026-01-16 08:37:18'),
(609, 151, 0, ' Opens accounting reports', 'Tally', '2026-01-16 08:37:18'),
(610, 152, 1, ' Alt + F2', 'Tally', '2026-01-16 08:37:18'),
(611, 152, 0, ' Ctrl + D', 'Tally', '2026-01-16 08:37:18'),
(612, 152, 0, ' Alt + D', 'Tally', '2026-01-16 08:37:18'),
(613, 152, 0, ' Ctrl + F2', 'Tally', '2026-01-16 08:37:18'),
(614, 153, 0, ' Receipt Voucher', 'Tally', '2026-01-16 08:37:18'),
(615, 153, 0, ' Contra Voucher', 'Tally', '2026-01-16 08:37:18'),
(616, 153, 0, ' Journal Voucher', 'Tally', '2026-01-16 08:37:18'),
(617, 153, 1, ' Payment Voucher', 'Tally', '2026-01-16 08:37:18'),
(618, 154, 0, ' Accounts Books', 'Tally', '2026-01-16 08:37:18'),
(619, 154, 1, 'Inventory Books', 'Tally', '2026-01-16 08:37:18'),
(620, 154, 0, ' Statutory Books', 'Tally', '2026-01-16 08:37:18'),
(621, 154, 0, 'Display', 'Tally', '2026-01-16 08:37:18'),
(622, 155, 1, ' Company Info > Alter', 'Tally', '2026-01-16 08:37:18'),
(623, 155, 0, 'Company Info > Alter Company', 'Tally', '2026-01-16 08:37:18'),
(624, 155, 0, ' Gateway of Tally > Modify Company', 'Tally', '2026-01-16 08:37:18'),
(625, 155, 0, 'None of these', 'Tally', '2026-01-16 08:37:18'),
(626, 156, 1, ' Cash Account', 'Tally', '2026-01-16 08:37:18'),
(627, 156, 0, ' Capital Account', 'Tally', '2026-01-16 08:37:18'),
(628, 156, 0, ' Sales Account', 'Tally', '2026-01-16 08:37:18'),
(629, 156, 0, ' Interest Account', 'Tally', '2026-01-16 08:37:18'),
(630, 157, 0, ' Cash Account', 'Tally', '2026-01-16 08:37:18'),
(631, 157, 0, ' Bank Account', 'Tally', '2026-01-16 08:37:18'),
(632, 157, 1, ' Sundry Creditors', 'Tally', '2026-01-16 08:37:18'),
(633, 157, 0, ' Sundry Debtors', 'Tally', '2026-01-16 08:37:18'),
(634, 158, 0, ' Inventory Management', 'Tally', '2026-01-16 08:37:18'),
(635, 158, 0, ' Payroll Management', 'Tally', '2026-01-16 08:37:18'),
(636, 158, 1, ' Web Designing', 'Tally', '2026-01-16 08:37:18'),
(637, 158, 0, ' Statutory Compliance', 'Tally', '2026-01-16 08:37:18'),
(638, 159, 0, ' Shift + Del', 'Tally', '2026-01-16 08:37:18'),
(639, 159, 1, ' Alt + D', 'Tally', '2026-01-16 08:37:18'),
(640, 159, 0, ' Ctrl + D', 'Tally', '2026-01-16 08:37:18'),
(641, 159, 0, ' alter', 'Tally', '2026-01-16 08:37:18'),
(642, 160, 0, ' Symbol', 'Tally', '2026-01-16 08:37:18'),
(643, 160, 1, 'Primary', 'Tally', '2026-01-16 08:37:18'),
(644, 160, 0, 'Stock', 'Tally', '2026-01-16 08:37:18'),
(645, 160, 0, 'Main Location', 'Tally', '2026-01-16 08:37:18'),
(646, 161, 0, ' Customer Relations', 'Tally', '2026-01-16 08:37:18'),
(647, 161, 1, ' Inventory Levels', 'Tally', '2026-01-16 08:37:18'),
(648, 161, 0, ' Employee Scheduling', 'Tally', '2026-01-16 08:37:18'),
(649, 161, 0, ' Project Management', 'Tally', '2026-01-16 08:37:18'),
(650, 162, 1, 'F7', 'Tally', '2026-01-16 08:37:18'),
(651, 162, 0, 'F5', 'Tally', '2026-01-16 08:37:18'),
(652, 162, 0, 'F8', 'Tally', '2026-01-16 08:37:18'),
(653, 162, 0, 'F9', 'Tally', '2026-01-16 08:37:18'),
(654, 163, 0, ' .xls', 'Tally', '2026-01-16 08:37:18'),
(655, 163, 0, ' .doc', 'Tally', '2026-01-16 08:37:18'),
(656, 163, 0, ' .tally', 'Tally', '2026-01-16 08:37:18'),
(657, 163, 1, ' .tsf', 'Tally', '2026-01-16 08:37:18'),
(658, 164, 0, 'Alt +F1', 'Tally', '2026-01-16 08:37:18'),
(659, 164, 0, 'Alt +F9', 'Tally', '2026-01-16 08:37:18'),
(660, 164, 0, 'Alt +F2', 'Tally', '2026-01-16 08:37:18'),
(661, 164, 1, 'Alt +F3', 'Tally', '2026-01-16 08:37:18'),
(662, 165, 0, ' Voucher Entry', 'Tally', '2026-01-16 08:37:18'),
(663, 165, 0, ' Invoice Customization', 'Tally', '2026-01-16 08:37:18'),
(664, 165, 1, ' Print Configuration', 'Tally', '2026-01-16 08:37:18'),
(665, 165, 0, ' Payment Gateway', 'Tally', '2026-01-16 08:37:18'),
(666, 166, 0, ' Complex navigation', 'Tally', '2026-01-16 08:37:18'),
(667, 166, 0, ' Graphical interface', 'Tally', '2026-01-16 08:37:18'),
(668, 166, 0, ' Extensive help and documentation', 'Tally', '2026-01-16 08:37:18'),
(669, 166, 1, ' Both B and C', 'Tally', '2026-01-16 08:37:18'),
(670, 167, 0, ' To track user purchases', 'Tally', '2026-01-16 08:37:18'),
(671, 167, 1, ' To define user roles and permissions', 'Tally', '2026-01-16 08:37:18'),
(672, 167, 0, ' To monitor employee performance', 'Tally', '2026-01-16 08:37:18'),
(673, 167, 0, ' To create user profiles for marketing', 'Tally', '2026-01-16 08:37:18'),
(674, 168, 0, 'Account Books', 'Tally', '2026-01-16 08:37:18'),
(675, 168, 0, 'Cash and fund flow', 'Tally', '2026-01-16 08:37:18'),
(676, 168, 0, 'Inventory Books?', 'Tally', '2026-01-16 08:37:18'),
(677, 168, 1, 'Statement Of Account ', 'Tally', '2026-01-16 08:37:18'),
(678, 169, 0, 'Receipt Vaucher', 'Tally', '2026-01-16 08:37:18'),
(679, 169, 0, 'Contra Vaucher ', 'Tally', '2026-01-16 08:37:18'),
(680, 169, 0, 'Payment vaucher ', 'Tally', '2026-01-16 08:37:18'),
(681, 169, 1, ' All of the above ', 'Tally', '2026-01-16 08:37:18'),
(682, 170, 0, 'Debit Note', 'Tally', '2026-01-16 08:37:18'),
(683, 170, 0, 'Receipt Note', 'Tally', '2026-01-16 08:37:18'),
(684, 170, 1, 'Rejection Out', 'Tally', '2026-01-16 08:37:18'),
(685, 170, 0, ' Rejection In', 'Tally', '2026-01-16 08:37:18'),
(686, 171, 0, 'Word Editor', 'Coreldraw', '2026-01-16 08:37:18'),
(687, 171, 1, 'Vector Graphic Editor', 'Coreldraw', '2026-01-16 08:37:18'),
(688, 171, 0, 'Oprating System ', 'Coreldraw', '2026-01-16 08:37:18'),
(689, 171, 0, 'Non of Above', 'Coreldraw', '2026-01-16 08:37:18'),
(690, 172, 0, 'A computer\'s memory is the minimum capacity required by Corel DRAW.', 'Coreldraw', '2026-01-16 08:37:18'),
(691, 172, 0, 'Installing it over many machines will be easy, and it will be independent of the operating system.', 'Coreldraw', '2026-01-16 08:37:18'),
(692, 172, 0, 'Any system that is as fast and dexterous as Linux or Windows is acceptable.', 'Coreldraw', '2026-01-16 08:37:18'),
(693, 172, 1, ' All of the above', 'Coreldraw', '2026-01-16 08:37:18'),
(694, 173, 0, 'The Document Palette', 'Coreldraw', '2026-01-16 08:37:18'),
(695, 173, 0, ' The Color Style Palette', 'Coreldraw', '2026-01-16 08:37:18'),
(696, 173, 0, 'The Object Properties Container', 'Coreldraw', '2026-01-16 08:37:18'),
(697, 173, 1, ' All of the above', 'Coreldraw', '2026-01-16 08:37:18'),
(698, 174, 0, 'Paragraph Text', 'Coreldraw', '2026-01-16 08:37:18'),
(699, 174, 0, 'Artistic Media', 'Coreldraw', '2026-01-16 08:37:18'),
(700, 174, 1, 'Both A and B', 'Coreldraw', '2026-01-16 08:37:18'),
(701, 174, 0, 'None of the above', 'Coreldraw', '2026-01-16 08:37:18'),
(702, 175, 0, 'Tables', 'Coreldraw', '2026-01-16 08:37:18'),
(703, 175, 0, ' Bitmaps', 'Coreldraw', '2026-01-16 08:37:18'),
(704, 175, 1, ' Lenses', 'Coreldraw', '2026-01-16 08:37:18'),
(705, 175, 0, 'Objects', 'Coreldraw', '2026-01-16 08:37:18'),
(706, 176, 0, 'JEPG', 'Coreldraw', '2026-01-16 08:37:18'),
(707, 176, 0, 'PNG', 'Coreldraw', '2026-01-16 08:37:18'),
(708, 176, 0, 'GIF', 'Coreldraw', '2026-01-16 08:37:18'),
(709, 176, 1, 'All of the above', 'Coreldraw', '2026-01-16 08:37:18'),
(710, 177, 0, ' Outline Trace', 'Coreldraw', '2026-01-16 08:37:18'),
(711, 177, 0, ' Centreline Trace', 'Coreldraw', '2026-01-16 08:37:18'),
(712, 177, 1, 'Both A and B', 'Coreldraw', '2026-01-16 08:37:18'),
(713, 177, 0, 'None of the above', 'Coreldraw', '2026-01-16 08:37:18'),
(714, 178, 0, 'Pen Tool', 'Coreldraw', '2026-01-16 08:37:18'),
(715, 178, 0, ' Freehand Tool', 'Coreldraw', '2026-01-16 08:37:18'),
(716, 178, 1, ' B-Spline Tool', 'Coreldraw', '2026-01-16 08:37:18'),
(717, 178, 0, ' 2-Point Line Tool', 'Coreldraw', '2026-01-16 08:37:18'),
(718, 179, 0, 'JPEG', 'Coreldraw', '2026-01-16 08:37:18'),
(719, 179, 1, ' PNG', 'Coreldraw', '2026-01-16 08:37:18'),
(720, 179, 0, ' BMP', 'Coreldraw', '2026-01-16 08:37:18'),
(721, 179, 0, 'TIFF', 'Coreldraw', '2026-01-16 08:37:18'),
(722, 180, 1, 'True ', 'Coreldraw', '2026-01-16 08:37:18'),
(723, 180, 0, 'FALSE', 'Coreldraw', '2026-01-16 08:37:18'),
(724, 180, 0, '_', 'Coreldraw', '2026-01-16 08:37:18'),
(725, 180, 0, 'None of These', 'Coreldraw', '2026-01-16 08:37:18'),
(726, 181, 1, '2', 'Coreldraw', '2026-01-16 08:37:18'),
(727, 181, 0, '1', 'Coreldraw', '2026-01-16 08:37:18'),
(728, 181, 0, '4', 'Coreldraw', '2026-01-16 08:37:18'),
(729, 181, 0, '3', 'Coreldraw', '2026-01-16 08:37:18'),
(730, 182, 0, 'Java ', 'Coreldraw', '2026-01-16 08:37:18'),
(731, 182, 0, 'Python ', 'Coreldraw', '2026-01-16 08:37:18'),
(732, 182, 1, 'C++ & C#', 'Coreldraw', '2026-01-16 08:37:18'),
(733, 182, 0, 'Angular ', 'Coreldraw', '2026-01-16 08:37:18'),
(734, 183, 1, 'F11', 'Coreldraw', '2026-01-16 08:37:18'),
(735, 183, 0, 'F6', 'Coreldraw', '2026-01-16 08:37:18'),
(736, 183, 0, 'F10', 'Coreldraw', '2026-01-16 08:37:18'),
(737, 183, 0, 'F8', 'Coreldraw', '2026-01-16 08:37:18'),
(738, 184, 0, 'File', 'Coreldraw', '2026-01-16 08:37:18'),
(739, 184, 0, 'Import', 'Coreldraw', '2026-01-16 08:37:18'),
(740, 184, 1, 'Export', 'Coreldraw', '2026-01-16 08:37:18'),
(741, 184, 0, 'Text ', 'Coreldraw', '2026-01-16 08:37:18'),
(742, 185, 1, 'Latter ', 'Coreldraw', '2026-01-16 08:37:18'),
(743, 185, 0, 'A4', 'Coreldraw', '2026-01-16 08:37:18'),
(744, 185, 0, 'Legal ', 'Coreldraw', '2026-01-16 08:37:18'),
(745, 185, 0, 'Postcard', 'Coreldraw', '2026-01-16 08:37:18'),
(746, 186, 0, 'It has a line', 'Coreldraw', '2026-01-16 08:37:18'),
(747, 186, 1, ' It can be filled', 'Coreldraw', '2026-01-16 08:37:18'),
(748, 186, 0, 'It has nodes', 'Coreldraw', '2026-01-16 08:37:18'),
(749, 186, 0, 'It has a shape', 'Coreldraw', '2026-01-16 08:37:18'),
(750, 187, 0, 'Selection Tool', 'Coreldraw', '2026-01-16 08:37:18'),
(751, 187, 0, 'Curve tool', 'Coreldraw', '2026-01-16 08:37:18'),
(752, 187, 0, 'Direct Selection Tool', 'Coreldraw', '2026-01-16 08:37:18'),
(753, 187, 1, 'Shape tool', 'Coreldraw', '2026-01-16 08:37:18'),
(754, 188, 0, 'Freehand Tool', 'Coreldraw', '2026-01-16 08:37:18'),
(755, 188, 0, 'Shape tool', 'Coreldraw', '2026-01-16 08:37:18'),
(756, 188, 1, 'Pick tool', 'Coreldraw', '2026-01-16 08:37:18'),
(757, 188, 0, 'Bezier Tool', 'Coreldraw', '2026-01-16 08:37:18'),
(758, 189, 0, 'TRUE', 'Coreldraw', '2026-01-16 08:37:18'),
(759, 189, 1, 'FALSE', 'Coreldraw', '2026-01-16 08:37:18'),
(760, 189, 0, 'None of these', 'Coreldraw', '2026-01-16 08:37:18'),
(761, 189, 0, '_', 'Coreldraw', '2026-01-16 08:37:18'),
(762, 190, 0, 'pencil', 'Coreldraw', '2026-01-16 08:37:18'),
(763, 190, 1, 'Eyedropper', 'Coreldraw', '2026-01-16 08:37:18'),
(764, 190, 0, 'Bezier', 'Coreldraw', '2026-01-16 08:37:18'),
(765, 190, 0, 'Freehand', 'Coreldraw', '2026-01-16 08:37:18'),
(766, 191, 0, 'None of these', 'Coreldraw', '2026-01-16 08:37:18'),
(767, 191, 0, 'Remove Overlapping Segments in Objects', 'Coreldraw', '2026-01-16 08:37:18'),
(768, 191, 1, 'Removes the area outside a selection', 'Coreldraw', '2026-01-16 08:37:18'),
(769, 191, 0, 'Slice objects into two separate parts', 'Coreldraw', '2026-01-16 08:37:18'),
(770, 192, 0, 'Bitmap', 'Coreldraw', '2026-01-16 08:37:18'),
(771, 192, 1, 'Scalar', 'Coreldraw', '2026-01-16 08:37:18'),
(772, 192, 0, 'Vector', 'Coreldraw', '2026-01-16 08:37:18'),
(773, 192, 0, 'Photo paint', 'Coreldraw', '2026-01-16 08:37:18'),
(774, 193, 0, 'Vectors', 'Coreldraw', '2026-01-16 08:37:18'),
(775, 193, 0, 'Particles', 'Coreldraw', '2026-01-16 08:37:18'),
(776, 193, 1, 'Pixels', 'Coreldraw', '2026-01-16 08:37:18'),
(777, 193, 0, 'Lines', 'Coreldraw', '2026-01-16 08:37:18'),
(778, 194, 0, 'For book design', 'Coreldraw', '2026-01-16 08:37:18'),
(779, 194, 0, 'Setting of margin', 'Coreldraw', '2026-01-16 08:37:18'),
(780, 194, 0, 'Dividing your work', 'Coreldraw', '2026-01-16 08:37:18'),
(781, 194, 1, 'All of the above', 'Coreldraw', '2026-01-16 08:37:18'),
(782, 195, 1, 'Careldrw', 'Coreldraw', '2026-01-16 08:37:18'),
(783, 195, 0, 'Coraldrw', 'Coreldraw', '2026-01-16 08:37:18'),
(784, 195, 0, 'Coraldwr', 'Coreldraw', '2026-01-16 08:37:18'),
(785, 195, 0, 'Careldrw', 'Coreldraw', '2026-01-16 08:37:18'),
(786, 196, 0, 'Text Tool', 'Coreldraw', '2026-01-16 08:37:18'),
(787, 196, 0, 'Shape Tool', 'Coreldraw', '2026-01-16 08:37:18'),
(788, 196, 0, 'Pick Tool', 'Coreldraw', '2026-01-16 08:37:18'),
(789, 196, 1, 'Move Tool', 'Coreldraw', '2026-01-16 08:37:18'),
(790, 197, 0, 'Ctrl + W', 'Coreldraw', '2026-01-16 08:37:18'),
(791, 197, 0, 'Ctrl + C', 'Coreldraw', '2026-01-16 08:37:18'),
(792, 197, 0, 'Alt + F2', 'Coreldraw', '2026-01-16 08:37:18'),
(793, 197, 1, 'Alt + F4', 'Coreldraw', '2026-01-16 08:37:18'),
(794, 198, 0, 'T', 'Coreldraw', '2026-01-16 08:37:18'),
(795, 198, 0, 'A', 'Coreldraw', '2026-01-16 08:37:18'),
(796, 198, 1, 'I', 'Coreldraw', '2026-01-16 08:37:18'),
(797, 198, 0, 'R', 'Coreldraw', '2026-01-16 08:37:18'),
(798, 199, 1, 'Reapply the last undone action', 'Coreldraw', '2026-01-16 08:37:18'),
(799, 199, 0, 'Insert New Page', 'Coreldraw', '2026-01-16 08:37:18'),
(800, 199, 0, 'None of These', 'Coreldraw', '2026-01-16 08:37:18'),
(801, 199, 0, 'Cancel the Previous action', 'Coreldraw', '2026-01-16 08:37:18'),
(802, 200, 0, 'TRUE', 'Coreldraw', '2026-01-16 08:37:18'),
(803, 200, 1, 'FALSE', 'Coreldraw', '2026-01-16 08:37:18'),
(804, 200, 0, 'None of these', 'Coreldraw', '2026-01-16 08:37:18'),
(805, 200, 0, '_', 'Coreldraw', '2026-01-16 08:37:18'),
(806, 201, 0, 'D', 'Coreldraw', '2026-01-16 08:37:18'),
(807, 201, 0, 'T', 'Coreldraw', '2026-01-16 08:37:18'),
(808, 201, 0, 'W', 'Coreldraw', '2026-01-16 08:37:18'),
(809, 201, 1, 'M', 'Coreldraw', '2026-01-16 08:37:18'),
(810, 202, 0, 'RGB', 'Coreldraw', '2026-01-16 08:37:18'),
(811, 202, 1, 'LZW', 'Coreldraw', '2026-01-16 08:37:18'),
(812, 202, 0, 'HSV', 'Coreldraw', '2026-01-16 08:37:18'),
(813, 202, 0, 'CMYK', 'Coreldraw', '2026-01-16 08:37:18'),
(814, 203, 0, 'Use the  Ellipse Tool While Holding Down the Alt Key ', 'Coreldraw', '2026-01-16 08:37:18'),
(815, 203, 1, 'Use the  Ellipse Tool While Holding Down the Shift Key ', 'Coreldraw', '2026-01-16 08:37:18'),
(816, 203, 0, 'Use the  Ellipse Tool While Holding Down the Ctrl Key ', 'Coreldraw', '2026-01-16 08:37:18');
INSERT INTO `options` (`id`, `question_number`, `is_correct`, `options`, `sub`, `created_at`) VALUES
(817, 203, 0, 'Use the  Ellipse Tool While Holding Down the Spacebar', 'Coreldraw', '2026-01-16 08:37:18'),
(818, 204, 0, 'Shape Tool ', 'Coreldraw', '2026-01-16 08:37:18'),
(819, 204, 1, 'Power Clip ', 'Coreldraw', '2026-01-16 08:37:18'),
(820, 204, 0, 'Crop Tool ', 'Coreldraw', '2026-01-16 08:37:18'),
(821, 204, 0, 'Freehand Tool ', 'Coreldraw', '2026-01-16 08:37:18'),
(822, 205, 1, 'Ctrl + G', 'Coreldraw', '2026-01-16 08:37:18'),
(823, 205, 0, ' Ctrl + U', 'Coreldraw', '2026-01-16 08:37:18'),
(824, 205, 0, 'Ctrl + C', 'Coreldraw', '2026-01-16 08:37:18'),
(825, 205, 0, ' Ctrl + D', 'Coreldraw', '2026-01-16 08:37:18'),
(826, 206, 0, 'File', 'Coreldraw', '2026-01-16 08:37:18'),
(827, 206, 1, 'Arrange', 'Coreldraw', '2026-01-16 08:37:18'),
(828, 206, 0, 'Tools', 'Coreldraw', '2026-01-16 08:37:18'),
(829, 206, 0, 'View', 'Coreldraw', '2026-01-16 08:37:18'),
(830, 207, 0, 'Opens a file', 'Coreldraw', '2026-01-16 08:37:18'),
(831, 207, 1, 'Zoom in (by dragging an area)', 'Coreldraw', '2026-01-16 08:37:18'),
(832, 207, 0, 'Group objects', 'Coreldraw', '2026-01-16 08:37:18'),
(833, 207, 0, ' Select text', 'Coreldraw', '2026-01-16 08:37:18'),
(834, 208, 0, 'Weld', 'Coreldraw', '2026-01-16 08:37:18'),
(835, 208, 1, ' Order', 'Coreldraw', '2026-01-16 08:37:18'),
(836, 208, 0, 'Align', 'Coreldraw', '2026-01-16 08:37:18'),
(837, 208, 0, ' Combine', 'Coreldraw', '2026-01-16 08:37:18'),
(838, 209, 0, 'To group objects', 'Coreldraw', '2026-01-16 08:37:18'),
(839, 209, 1, 'To convert text or shapes into editable curves', 'Coreldraw', '2026-01-16 08:37:18'),
(840, 209, 0, 'To change color', 'Coreldraw', '2026-01-16 08:37:18'),
(841, 209, 0, ' To zoom object', 'Coreldraw', '2026-01-16 08:37:18'),
(842, 210, 0, 'File', 'Coreldraw', '2026-01-16 08:37:18'),
(843, 210, 0, ' Edit', 'Coreldraw', '2026-01-16 08:37:18'),
(844, 210, 1, ' View', 'Coreldraw', '2026-01-16 08:37:18'),
(845, 210, 0, ' Layout', 'Coreldraw', '2026-01-16 08:37:18'),
(846, 211, 1, 'Break Curve Apart', 'Coreldraw', '2026-01-16 08:37:18'),
(847, 211, 0, ' Ungroup', 'Coreldraw', '2026-01-16 08:37:18'),
(848, 211, 0, ' Separate', 'Coreldraw', '2026-01-16 08:37:18'),
(849, 211, 0, 'Divide', 'Coreldraw', '2026-01-16 08:37:18'),
(850, 212, 1, 'Interactive Fill Tool', 'Coreldraw', '2026-01-16 08:37:18'),
(851, 212, 0, ' Eyedropper Tool', 'Coreldraw', '2026-01-16 08:37:18'),
(852, 212, 0, 'Outline Tool', 'Coreldraw', '2026-01-16 08:37:18'),
(853, 212, 0, ' Transparency Tool', 'Coreldraw', '2026-01-16 08:37:18'),
(854, 213, 0, 'F6', 'Coreldraw', '2026-01-16 08:37:18'),
(855, 213, 1, ' F11', 'Coreldraw', '2026-01-16 08:37:18'),
(856, 213, 0, 'Ctrl + P', 'Coreldraw', '2026-01-16 08:37:18'),
(857, 213, 0, ' Ctrl + C', 'Coreldraw', '2026-01-16 08:37:18'),
(858, 214, 1, 'RGB and CMYK', 'Coreldraw', '2026-01-16 08:37:18'),
(859, 214, 0, ' HSL and HSV', 'Coreldraw', '2026-01-16 08:37:18'),
(860, 214, 0, ' Pantone and CMY', 'Coreldraw', '2026-01-16 08:37:18'),
(861, 214, 0, ' XYZ and YUV', 'Coreldraw', '2026-01-16 08:37:18'),
(862, 215, 0, 'At the top', 'Coreldraw', '2026-01-16 08:37:18'),
(863, 215, 0, ' At the bottom', 'Coreldraw', '2026-01-16 08:37:18'),
(864, 215, 0, ' At the left', 'Coreldraw', '2026-01-16 08:37:18'),
(865, 215, 1, 'At the right', 'Coreldraw', '2026-01-16 08:37:18'),
(866, 216, 0, 'White', 'Coreldraw', '2026-01-16 08:37:18'),
(867, 216, 0, ' Transparent', 'Coreldraw', '2026-01-16 08:37:18'),
(868, 216, 1, 'X icon in the color palette', 'Coreldraw', '2026-01-16 08:37:18'),
(869, 216, 0, ' Eraser tool', 'Coreldraw', '2026-01-16 08:37:18'),
(870, 217, 1, '.cdr', 'Coreldraw', '2026-01-16 08:37:18'),
(871, 217, 0, '.cdrw', 'Coreldraw', '2026-01-16 08:37:18'),
(872, 217, 0, ' .cdw', 'Coreldraw', '2026-01-16 08:37:18'),
(873, 217, 0, '.corel', 'Coreldraw', '2026-01-16 08:37:18'),
(874, 218, 0, '.jpg', 'Coreldraw', '2026-01-16 08:37:18'),
(875, 218, 1, '.docx', 'Coreldraw', '2026-01-16 08:37:18'),
(876, 218, 0, ' .png', 'Coreldraw', '2026-01-16 08:37:18'),
(877, 218, 0, ' .svg', 'Coreldraw', '2026-01-16 08:37:18'),
(878, 219, 0, 'Page Background', 'Coreldraw', '2026-01-16 08:37:18'),
(879, 219, 1, ' Page Setup', 'Coreldraw', '2026-01-16 08:37:18'),
(880, 219, 0, ' Orientation Tool', 'Coreldraw', '2026-01-16 08:37:18'),
(881, 219, 0, 'Page Numbering', 'Coreldraw', '2026-01-16 08:37:18'),
(882, 220, 0, 'File', 'Coreldraw', '2026-01-16 08:37:18'),
(883, 220, 1, 'Layout', 'Coreldraw', '2026-01-16 08:37:18'),
(884, 220, 0, 'Tools', 'Coreldraw', '2026-01-16 08:37:18'),
(885, 220, 0, 'Window', 'Coreldraw', '2026-01-16 08:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question_number` varchar(10) NOT NULL,
  `question_text` varchar(200) NOT NULL,
  `sub` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_number`, `question_text`, `sub`, `created_at`) VALUES
(1, '1', 'Microsoft word is ____ software.?', 'Computer', '2026-01-16 08:36:48'),
(2, '2', 'Which is not in MS Word?', 'Computer', '2026-01-16 08:36:48'),
(3, '3', 'Which is not an edition of MS Word?', 'Computer', '2026-01-16 08:36:48'),
(4, '4', 'What is the blank space outside the printing area on a page?', 'Computer', '2026-01-16 08:36:48'),
(5, '5', 'The ability to combine name and addresses with a standard document is called ________', 'Computer', '2026-01-16 08:36:48'),
(6, '6', 'The valid format of MS Word is ___?.', 'Computer', '2026-01-16 08:36:48'),
(7, '7', '_____ is the change the way text warps around the selected object.', 'Computer', '2026-01-16 08:36:48'),
(8, '8', 'In the _____ we can change the view of the document and set the zoom option.', 'Computer', '2026-01-16 08:36:48'),
(9, '9', 'What is thw default font of a Microsoft word 2007 Document.', 'Computer', '2026-01-16 08:36:48'),
(10, '10', 'Which Option is not available in the page setup group of page layout tab ', 'Computer', '2026-01-16 08:36:48'),
(11, '11', 'Which of the following language does the computer understand?', 'Computer', '2026-01-16 08:36:48'),
(12, '12', 'Which of the following unit is responsible for converting the data received from the user into a computer understandable format?', 'Computer', '2026-01-16 08:36:48'),
(13, '13', 'Which of the following is the correct abbreviation of COMPUTER?', 'Computer', '2026-01-16 08:36:48'),
(14, '14', 'What menu is selected to print ?', 'Computer', '2026-01-16 08:36:48'),
(15, '15', 'Which of the following are physical devices of a computer?', 'Computer', '2026-01-16 08:36:48'),
(16, '16', 'Who is the father of Computers?', 'Computer', '2026-01-16 08:36:48'),
(17, '17', 'It is done by CTRL+E .', 'Computer', '2026-01-16 08:36:48'),
(18, '18', 'It is done by CTRL+F .', 'Computer', '2026-01-16 08:36:48'),
(19, '19', 'Which of the following is a shortcut key for \"spelling and Grammar ?  ', 'Computer', '2026-01-16 08:36:48'),
(20, '20', 'Two Kinds of Main Memory are ?', 'Computer', '2026-01-16 08:36:48'),
(21, '21', 'What is MS Excel?', 'Computer', '2026-01-16 08:36:48'),
(22, '22', 'What is the row limit of MS Excel 2019? ', 'Computer', '2026-01-16 08:36:48'),
(23, '23', 'In Microsoft Excel spreadsheets, rows are designated as _______?', 'Computer', '2026-01-16 08:36:48'),
(24, '24', 'The Greater Than sign (>) exemplifies a/an _____ operator.', 'Computer', '2026-01-16 08:36:48'),
(25, '25', '____ is the correct syntax of IF() Function. ', 'Computer', '2026-01-16 08:36:48'),
(26, '26', 'Why is the =COUNTIF function in Excel used? ', 'Computer', '2026-01-16 08:36:48'),
(27, '27', 'What do Excel formulas start with? ', 'Computer', '2026-01-16 08:36:48'),
(28, '28', 'How to Open the Insert hyperlink dialog box? ', 'Computer', '2026-01-16 08:36:48'),
(29, '29', 'What is shortcut key to open an existing workbook?', 'Computer', '2026-01-16 08:36:48'),
(30, '30', 'What is Excel used for?', 'Computer', '2026-01-16 08:36:48'),
(31, '31', 'What is the Max Zoom percentage in MS PowerPoint?', 'Computer', '2026-01-16 08:36:48'),
(32, '32', 'In the current presentation, if we want to insert a new slide, we can choose which of these?', 'Computer', '2026-01-16 08:36:48'),
(33, '33', 'Which of the following fill effects can be used to fill the background of the slide?', 'Computer', '2026-01-16 08:36:48'),
(34, '34', 'Slides Are prepared in ?', 'Computer', '2026-01-16 08:36:48'),
(35, '35', 'In power point, Themes could befound Under- ', 'Computer', '2026-01-16 08:36:48'),
(36, '36', 'In Ms powerpoint ,key used to run the slide show from the beginning is -', 'Computer', '2026-01-16 08:36:48'),
(37, '37', 'Which type of view is not present in MS-PowerPoint? ', 'Computer', '2026-01-16 08:36:48'),
(38, '38', 'Which of the Following Sortcut keys is used to end a Powerpoint Persentation? ', 'Computer', '2026-01-16 08:36:48'),
(39, '39', 'What do we use if we want to add texts in a given slide?', 'Computer', '2026-01-16 08:36:48'),
(40, '40', 'From which of these menus can we access a Text Box, Picture, Chart etc.?', 'Computer', '2026-01-16 08:36:48'),
(41, '41', 'which of the following shortcut key to open new Blank Document in ms word ? ', 'Computer', '2026-01-16 08:36:48'),
(42, '42', 'In how many generation a computer can be classified ?', 'Computer', '2026-01-16 08:36:48'),
(43, '43', 'Fifth genration computer are based on ? ', 'Computer', '2026-01-16 08:36:48'),
(44, '44', 'Which one of the Following is an example of oprating system ? ', 'Computer', '2026-01-16 08:36:48'),
(45, '45', 'Which of the following is the powerful type of the computer ?', 'Computer', '2026-01-16 08:36:48'),
(46, '46', 'Which one is not an input device?', 'Computer', '2026-01-16 08:36:48'),
(47, '47', '____ is not a function in Excel.', 'Computer', '2026-01-16 08:36:48'),
(48, '48', 'What we have to type in the Run dialog box to open Powerpoint?', 'Computer', '2026-01-16 08:36:48'),
(49, '49', 'In PowerPoint, is it allowed to make a PDF of the powerpoint presentation?', 'Computer', '2026-01-16 08:36:48'),
(50, '50', 'What does CPU stand for?', 'Computer', '2026-01-16 08:36:48'),
(51, '51', 'Who invented c programming language?', 'C', '2026-01-16 08:36:48'),
(52, '52', 'Which of the following is not a valid C variable name?', 'C', '2026-01-16 08:36:48'),
(53, '53', 'All keywords in C are in ____________', 'C', '2026-01-16 08:36:48'),
(54, '54', 'What is the 16-bit compiler allowable range for integer constants?', 'C', '2026-01-16 08:36:48'),
(55, '55', '#include <stdio.h>\nstruct School {\n    int age, rollNo;\n};\nvoid solve() {\n    struct School sc;\n    sc.age = 19;\n    sc.rollNo = 82;\n    printf(\"%d %d\", sc.age, sc.rollNo);\n}\nint main() {\n    solve();', 'C', '2026-01-16 08:36:48'),
(56, '56', '#include <stdio.h>\nvoid solve() {\n    int x = 2;\n    printf(\"%d\", (x << 1) + (x >> 1));\n}\nint main() {\n    solve();\n	return 0;\n}', 'C', '2026-01-16 08:36:48'),
(57, '57', '#include <stdio.h>\nvoid solve() {\n    int x = 1, y = 2;\n    printf(x > y ? \"Greater\" : x == y ? \"Equal\" : \"Lesser\");\n}\nint main() {\n    solve();\n	return 0;\n}', 'C', '2026-01-16 08:36:48'),
(58, '58', '#include <stdio.h>\nint main() {\n	int a = 3, b = 5;\n	int t = a;\n	a = b;\n	b = t;\n	printf(\"%d %d\", a, b);\n	return 0;\n}', 'C', '2026-01-16 08:36:48'),
(59, '59', 'Which of the following is not a logical operator?', 'C', '2026-01-16 08:36:48'),
(60, '60', 'Which of the following operators can be applied on structure variables?', 'C', '2026-01-16 08:36:48'),
(61, '61', 'What does the `sizeof` operator in C return?', 'C', '2026-01-16 08:36:48'),
(62, '62', 'In C, which function is used to close a file?', 'C', '2026-01-16 08:36:48'),
(63, '63', '#include <stdio.h>\nvoid solve() {\n    int ch = 2;\n    switch(ch) {\n        case 1: printf(\"1 \");\n        case 2: printf(\"2 \");\n        case 3: printf(\"3 \");\n        default: printf(\"None\");\n    }\n}\nin', 'C', '2026-01-16 08:36:48'),
(64, '64', '#include <stdio.h>\nvoid solve() {\n    int x = printf(\"Hello\");\n    printf(\" %d\", x);\n}\nint main() {\n	solve();\n	return 0;\n}', 'C', '2026-01-16 08:36:48'),
(65, '65', 'int main() {\n	int sum = 2 + 4 / 2 + 6 * 2;\n	printf(\"%d\", sum);\n	return 0;\n}', 'C', '2026-01-16 08:36:48'),
(66, '66', '#include <stdio.h>\nunion School {\n    int age, rollNo;\n    double marks;\n};\nvoid solve() {\n    union School sc;\n    sc.age = 19;\n    sc.rollNo = 82;\n    sc.marks = 19.04;\n    printf(\"%d\", (int)sizeof(', 'C', '2026-01-16 08:36:48'),
(67, '67', ' Which of the following is not true about structs in C?', 'C', '2026-01-16 08:36:48'),
(68, '68', ' What is an example of iteration in C?', 'C', '2026-01-16 08:36:48'),
(69, '69', 'What is #include <stdio.h>?', 'C', '2026-01-16 08:36:48'),
(70, '70', 'What is the sizeof(char) in a 32-bit C compiler?', 'C', '2026-01-16 08:36:48'),
(71, '71', '#include <stdio.h>\nint main() {\n	int a[] = {1, 2, 3, 4};\n	int sum = 0;\n	for(int i = 0; i < 4; i++) {\n	    sum += a[i];\n	}\n	printf(\"%d\", sum);\n	return 0;\n}', 'C', '2026-01-16 08:36:48'),
(72, '72', '#include <stdio.h>\nint main() {\n	 char str[] = \"Hello, World!\";\n\n    printf(\"%s\", str + 7);\n\n    return 0;\n}\n', 'C', '2026-01-16 08:36:48'),
(73, '73', '#include <stdio.h>\nint main() {\n	  int x = 5;\n\n    int y = (x++) + (++x);\n\n    printf(\"%d\", y);\n\n    return 0;\n}', 'C', '2026-01-16 08:36:48'),
(74, '74', '#include <stdio.h>\nint main() {\n	   int a = 10, b = 20, c;\n\n    c = a > b ? a : b;\n\n    printf(\"%d\", c);\n\n    return 0;\n}', 'C', '2026-01-16 08:36:48'),
(75, '75', 'What is the purpose of the `union` data type in C?', 'C', '2026-01-16 08:36:48'),
(76, '76', 'Which of the following standard C library functions is used for memory allocation and deallocation?', 'C', '2026-01-16 08:36:48'),
(77, '77', 'which operator is used to access the address of a variable?', 'C', '2026-01-16 08:36:48'),
(78, '78', 'What is the purpose of the `do?while` loop in C?', 'C', '2026-01-16 08:36:48'),
(79, '79', '#include <stdio.h>\nvoid solve() {\n    printf(\"%d %d\", (023), (23));\n}\nint main() {\n    solve();\n	return 0;\n}\n', 'C', '2026-01-16 08:36:48'),
(80, '80', '#include <stdio.h>\nvoid solve() {\n    int a = 3;\n    int res = a++ + ++a + a++ + ++a;\n    printf(\"%d\", res);\n}\nint main() {\n	solve();\n	return 0;\n}', 'C', '2026-01-16 08:36:48'),
(81, '81', '#include <stdio.h>\n#include<string.h>\nvoid solve() {\n    char s[] = \"Hello\";\n    printf(\"%s \", s);\n    char t[40];\n    strcpy(t, s);\n    printf(\"%s\", t);\n}\nint main() {\n    solve();\n	return 0;\n}', 'C', '2026-01-16 08:36:48'),
(82, '82', '#include <stdio.h>\nvoid solve(int x) {\n    if(x == 0) {\n        printf(\"%d \", x);\n        return;\n    }\n    printf(\"%d \", x);\n    solve(x - 1);\n    printf(\"%d \", x);\n}\nint main() {\n    solve(3);\n	retu', 'C', '2026-01-16 08:36:48'),
(83, '83', 'What is the purpose of the strcat function in C?', 'C', '2026-01-16 08:36:48'),
(84, '84', ' which operator is used for bitwise OR?', 'C', '2026-01-16 08:36:48'),
(85, '85', 'What is the purpose of the `static` keyword when applied to a local variable in C?', 'C', '2026-01-16 08:36:48'),
(86, '86', ' Which of the following data types in C has the highest storage size?', 'C', '2026-01-16 08:36:48'),
(87, '87', '#include <stdio.h>\nint main()\n{\nint i = 0;\ndo\n{\ni++;\nif(i == 2)\ncontinue;\nprintf(\"In while loop \");\n}\nwhile (i < 2);\nprintf(\"%d\\n\", i);\n}', 'C', '2026-01-16 08:36:48'),
(88, '88', '#include <stdio.h>\nint main()\n{\nint i = 0;\nwhile (i < 3)\ni++;\nprintf(\"In while loop\\n\");\n}', 'C', '2026-01-16 08:36:48'),
(89, '89', '#include <stdio.h>\nvoid main()\n{\nint x = 5 * 9 / 3 + 9;\nprintf(\"%d\\n\", x);\n}', 'C', '2026-01-16 08:36:48'),
(90, '90', '#include <stdio.h>\nint main()\n{\nint main = 3;\nprintf(\"%d\", main);\nreturn 0;\n}', 'C', '2026-01-16 08:36:48'),
(91, '91', 'Which of these won?t return any value?', 'C', '2026-01-16 08:36:48'),
(92, '92', 'Which of these keywords do we use for the declaration of the friend function?', 'C', '2026-01-16 08:36:48'),
(93, '93', 'What does polymorphism stand for?', 'C', '2026-01-16 08:36:48'),
(94, '94', 'Which container is the best for keeping a collection of various distinct elements?', 'C', '2026-01-16 08:36:48'),
(95, '95', '#include <iostream>\n\nint main()\n{\n if(0)\n {\n    std::cout<<\"Hi\";\n }\n else\n {\n    std::cout<<\"Bye\";\n }\nreturn 0;\n}', 'C', '2026-01-16 08:36:48'),
(96, '96', '#include<iostream>\n\nint main()\n{\nint a=10; \nstd::cout<<a++;\nreturn 0;\n}', 'C', '2026-01-16 08:36:48'),
(97, '97', '#include<iostream>\n\nint main()\n{\n    int i=0;\n    lbl:\n    std::cout<<\"CppBuzz.com\";\n    i++;\n    if(i<5)\n    {\n	goto lbl;\n    }\n\n    return 0;\n\n}', 'C', '2026-01-16 08:36:48'),
(98, '98', '#include <iostream>\nusing namespace std;\n\nint main()\n{\nint a = 10;\ncout<<a++;\nreturn 0;\n}', 'C', '2026-01-16 08:36:48'),
(99, '99', 'Can a for loop contain another for loop?', 'C', '2026-01-16 08:36:48'),
(100, '100', 'Which operator can not be overloaded in C++?', 'C', '2026-01-16 08:36:48'),
(101, '101', 'Which operator has highest precedence in below list in C++?', 'C', '2026-01-16 08:36:48'),
(102, '102', 'What is correct syntax of a for loop in C++?', 'C', '2026-01-16 08:36:48'),
(103, '103', 'int main()\n{\n  int a=10;\n  int b,c;\n  b = a++;\n  c = a;\n  std::cout<<a<<b<<c;\n  return 0;\n}', 'C', '2026-01-16 08:36:48'),
(104, '104', '#include<iostream>\nint main()\n{\n    int a = 1;\n    switch(a)\n    {\n    case 1: std::cout<<\"One\";\n    case 2: std::cout<<\"Two\";\n    case 3: std::cout<<\"Three\";\n    default: std::cout<<\"Default\";\n    }\n', 'C', '2026-01-16 08:36:48'),
(105, '105', '#include<iostream>\n\nint main()\n{\n\nstd::cout<<-1-1-1;\n\nreturn 0;\n}', 'C', '2026-01-16 08:36:48'),
(106, '106', '#include <iostream>\nusing namespace std;\n\nint main() \n{\nint x = 5;\n\nif(x++ == 5)\ncout<<\"Five\"<<endl;\nelse\nif(++x == 6)\ncout<<\"Six\"<<endl;\n\nreturn 0;\n}', 'C', '2026-01-16 08:36:48'),
(107, '107', 'What is abstract class?', 'C', '2026-01-16 08:36:48'),
(108, '108', 'Can a Structure contain pointer to itself?', 'C', '2026-01-16 08:36:48'),
(109, '109', 'In OOP, what does encapsulation refer to?', 'C', '2026-01-16 08:36:48'),
(110, '110', 'Which concept in OOP allows for the same function to be used in different ways based on the object it is associated with?', 'C', '2026-01-16 08:36:48'),
(111, '111', '#include<iostream>\nenum color\n{\n	black=1,\n	blue,\n	red	\n};\nint main()\n{\n    color obj = blue;\n    std::cout<<obj;\n	return 0;\n}', 'C', '2026-01-16 08:36:48'),
(112, '112', '#include<iostream>\nusing namespace std;\nenum color{\n	black,\n	blue,\n	red	\n};\nint main()\n{    \n    color obj;\n    cout<<sizeof(obj);\n    return 0;\n}  ', 'C', '2026-01-16 08:36:48'),
(113, '113', '#include<iostream>\nusing namespace std;\n\nint main()\n{\n int x = 9;\n while (x>0)\n x--;\n cout<<x;\n\nreturn 0;\n}', 'C', '2026-01-16 08:36:48'),
(114, '114', '#include <iostream>\nusing namespace std;\nclass TestingClass\n{\npublic:\nTestingClass(int x)\n{\n cout << x << endl; \n}\n\nTestingClass()\n{\n cout <<\"Hello!\"<< endl; \n}\n\n};\nint main()\n{\n TestingClass test(77)', 'C', '2026-01-16 08:36:48'),
(115, '115', 'Which is the correct command used to compile source code (.cpp files) into object code(.o files)?', 'C', '2026-01-16 08:36:48'),
(116, '116', 'Which member function of a class is called automatically when any object is created of that class?', 'C', '2026-01-16 08:36:48'),
(117, '117', 'What type of function is not a member of a class, but has access to the private members of the class.', 'C', '2026-01-16 08:36:48'),
(118, '118', 'Which of following allows us to create new classes based on existing classes.', 'C', '2026-01-16 08:36:48'),
(119, '119', '#include<iostream>\n#include<string.h>\nusing namespace std;\n\nint main()\n{\n    char one[]=\"one\";\n    char two[]=\"two\";\n    \n    if(one==two){\n        cout<<\"Equal\";\n    }\n    \n    if(strcmp(one, two)==0', 'C', '2026-01-16 08:36:48'),
(120, '120', '#include <iostream>\n\nusing namespace std;\n\nint main()\n\n {\n\n    int arr[5] = {1, 2, 3, 4, 5};\n\n    int *ptr = arr;\n\n    cout << *(ptr + 2) << endl;\n\n    return 0;\n\n}', 'C', '2026-01-16 08:36:48'),
(121, '121', '  How Many Groups Are Pre -Defined in Tally ?', 'Tally', '2026-01-16 08:36:48'),
(122, '122', ' Tally package is developed by ?', 'Tally', '2026-01-16 08:36:48'),
(123, '123', ' In General the Financial Year From shall be from?', 'Tally', '2026-01-16 08:36:48'),
(124, '124', ' Which option is used in Tally to make changes in created company ?', 'Tally', '2026-01-16 08:36:48'),
(125, '125', ' Which menu is used to create new ledger , group  and voucher types in Tally?', 'Tally', '2026-01-16 08:36:48'),
(126, '126', '  which Submenu is used for voucher entry in tally ?', 'Tally', '2026-01-16 08:36:48'),
(127, '127', '  Salary Account Comes Under Which Head ?', 'Tally', '2026-01-16 08:36:48'),
(128, '128', 'Tally is an example of which type of software?', 'Tally', '2026-01-16 08:36:48'),
(129, '129', '  Which ledger is created by Tally Automatically as soon as we create a new company ?', 'Tally', '2026-01-16 08:36:48'),
(130, '130', '  20,000 withdrawn from State Bank . In Which Voucher type this transation will be recorded ?', 'Tally', '2026-01-16 08:36:48'),
(131, '131', '  Where do we record transactions of salary, rent or interest paid ?', 'Tally', '2026-01-16 08:36:48'),
(132, '132', ' Where do we record credit purchase of furniture in tally?', 'Tally', '2026-01-16 08:36:48'),
(133, '133', ' Which of the following equation is true for balance sheet ?', 'Tally', '2026-01-16 08:36:48'),
(134, '134', ' How Many Options Related to company features are there in \"F11: Freatures\" in tally ', 'Tally', '2026-01-16 08:36:48'),
(135, '135', ' Which option is used to view trial balance from gateway of Tally ?', 'Tally', '2026-01-16 08:36:48'),
(136, '136', ' What does ?F11? key stand for in Tally?', 'Tally', '2026-01-16 08:36:48'),
(137, '137', 'Default \'Godown\' name in tally is?', 'Tally', '2026-01-16 08:36:48'),
(138, '138', ' In Tally, which ledger is created under the group \"Current Liabilities\"?', 'Tally', '2026-01-16 08:36:48'),
(139, '139', ' Which menu in Tally allows you to view reports such as balance sheets and profit & loss statements?', 'Tally', '2026-01-16 08:36:48'),
(140, '140', ' What is the full form of ERP in Tally ERP 9?', 'Tally', '2026-01-16 08:36:48'),
(141, '141', ' In Tally, what is the use of \"Alt + C\"?', 'Tally', '2026-01-16 08:36:48'),
(142, '142', ' In Tally, where do you configure payroll features?', 'Tally', '2026-01-16 08:36:48'),
(143, '143', ' Which of the following ledgers cannot be deleted in Tally?', 'Tally', '2026-01-16 08:36:48'),
(144, '144', ' In Tally, which type of ledger is \"Sundry Debtors\"?', 'Tally', '2026-01-16 08:36:48'),
(145, '145', ' If a company purchases goods worth ?10,000 on credit, what would the journal entry be?', 'Tally', '2026-01-16 08:36:48'),
(146, '146', ' In Tally, what is the correct journal entry to record the purchase of furniture on credit?', 'Tally', '2026-01-16 08:36:48'),
(147, '147', ' Which voucher is used to record the return of goods to a supplier in Tally?', 'Tally', '2026-01-16 08:36:48'),
(148, '148', ' Which shortcut key is used to record a Credit Note Voucher in Tally?', 'Tally', '2026-01-16 08:36:48'),
(149, '149', ' Which of the following is not recorded in a Contra Voucher?', 'Tally', '2026-01-16 08:36:48'),
(150, '150', ' Which of the following is NOT a component of Tally?', 'Tally', '2026-01-16 08:36:48'),
(151, '151', ' In Tally, what does the \"F12: Configure\" option do?', 'Tally', '2026-01-16 08:36:48'),
(152, '152', ' Which shortcut key is used to change the date in Tally?', 'Tally', '2026-01-16 08:36:48'),
(153, '153', ' Which voucher is used to record personal drawings (owner withdrawing money for personal use) from the business?', 'Tally', '2026-01-16 08:36:48'),
(154, '154', ' Which Option is user to view to stock Group and Stock Summery ', 'Tally', '2026-01-16 08:36:48'),
(155, '155', ' We can Modify an exsiting company from ?', 'Tally', '2026-01-16 08:36:48'),
(156, '156', ' In Tally, which of the following is considered a real account?', 'Tally', '2026-01-16 08:36:48'),
(157, '157', ' In Tally, which ledger is created under the group \"Current Liabilities\"?', 'Tally', '2026-01-16 08:36:48'),
(158, '158', ' Which of the following is not a feature of Tally ?', 'Tally', '2026-01-16 08:36:48'),
(159, '159', ' Which of the following keys is used to Delete in ledger ?', 'Tally', '2026-01-16 08:36:48'),
(160, '160', 'Which of the following is the Predefined  stock category in Tally?', 'Tally', '2026-01-16 08:36:48'),
(161, '161', ' Which of the following can be managed using Tally?', 'Tally', '2026-01-16 08:36:48'),
(162, '162', 'What  shortcut key is journal Vaucher ?', 'Tally', '2026-01-16 08:36:48'),
(163, '163', ' What is the primary file extension used for Tally data files ?', 'Tally', '2026-01-16 08:36:48'),
(164, '164', 'The Short key of company creation ?', 'Tally', '2026-01-16 08:36:48'),
(165, '165', ' Which feature in Tally allows you to define custom invoice formats?', 'Tally', '2026-01-16 08:36:48'),
(166, '166', ' Which characteristic of Tally allows it to be user-friendly ?', 'Tally', '2026-01-16 08:36:48'),
(167, '167', ' What does Tally?s \'User Management\' feature allow ?', 'Tally', '2026-01-16 08:36:48'),
(168, '168', ' We can get the report of Interest From ?', 'Tally', '2026-01-16 08:36:48'),
(169, '169', ' Single entry mode Applicable for ?', 'Tally', '2026-01-16 08:36:48'),
(170, '170', ' Goods Returning to a Creditor after challan but before bill we need to pass?', 'Tally', '2026-01-16 08:36:48'),
(171, '171', ' What is Corel draw ?', 'Coreldraw', '2026-01-16 08:36:48'),
(172, '172', 'Which of the following is are the advantage(s) of Coreldraw Graphics?', 'Coreldraw', '2026-01-16 08:36:48'),
(173, '173', 'A number of color style controls are available in CorelDRAW____ the Object style container and the Color styles container.', 'Coreldraw', '2026-01-16 08:36:48'),
(174, '174', 'Which of the following is are the text object type(s)?', 'Coreldraw', '2026-01-16 08:36:48'),
(175, '175', 'An object\'s attributes and properties are not modified by ____but by how an area of it is represented.', 'Coreldraw', '2026-01-16 08:36:48'),
(176, '176', 'Which of the file format  can be exported in CorelDRAW?', 'Coreldraw', '2026-01-16 08:36:48'),
(177, '177', 'Which of the following techniques is \nare available in CorelDRAW to trace a bitmap?', 'Coreldraw', '2026-01-16 08:36:48'),
(178, '178', 'Which tool allows you to draw freehand lines and automatically smooth out the curves in CorelDRAW?', 'Coreldraw', '2026-01-16 08:36:48'),
(179, '179', 'Which format is suitable for saving bitmap images with transparent backgrounds in CorelDRAW?', 'Coreldraw', '2026-01-16 08:36:48'),
(180, '180', 'C aligns centers of selected objects vertically.', 'Coreldraw', '2026-01-16 08:36:48'),
(181, '181', 'What number of paper orientation do we have in Corel Draw?', 'Coreldraw', '2026-01-16 08:36:48'),
(182, '182', 'Corel Draw was Wrriten in _______', 'Coreldraw', '2026-01-16 08:36:48'),
(183, '183', 'What is the Shortcut key to fountain fills For the object  ?', 'Coreldraw', '2026-01-16 08:36:48'),
(184, '184', 'Which of the following submenu Convert the .CDR file for .JPG format ?', 'Coreldraw', '2026-01-16 08:36:48'),
(185, '185', 'What is Default Paper size in corel Drow ?', 'Coreldraw', '2026-01-16 08:36:48'),
(186, '186', 'The object is closed and can be known by?', 'Coreldraw', '2026-01-16 08:36:48'),
(187, '187', 'Which of the following Tool is used for editing Nodes or curve object?', 'Coreldraw', '2026-01-16 08:36:48'),
(188, '188', '______is used for selecting and deselecting objects.', 'Coreldraw', '2026-01-16 08:36:48'),
(189, '189', 'Can we increase sides of polygon by pressing up arrow key in CorelDraw?', 'Coreldraw', '2026-01-16 08:36:48'),
(190, '190', 'Which Tool in not a basic drawing tool in a 2d Image program ?', 'Coreldraw', '2026-01-16 08:36:48'),
(191, '191', 'Crop Tool helps in.', 'Coreldraw', '2026-01-16 08:36:48'),
(192, '192', 'CorelDraw is a ____________ based drawing Application Package.', 'Coreldraw', '2026-01-16 08:36:48'),
(193, '193', 'Bitmap images are made up of ____________.', 'Coreldraw', '2026-01-16 08:36:48'),
(194, '194', 'The ruler bar is used for _____________', 'Coreldraw', '2026-01-16 08:36:48'),
(195, '195', 'Corel Run Command?', 'Coreldraw', '2026-01-16 08:36:48'),
(196, '196', 'None of Corel Tool ?', 'Coreldraw', '2026-01-16 08:36:48'),
(197, '197', 'What is the Shortcut Key for Exit in CorelDraw ?', 'Coreldraw', '2026-01-16 08:36:48'),
(198, '198', 'Artistic Media Shortcut ?', 'Coreldraw', '2026-01-16 08:36:48'),
(199, '199', 'What is the Use of the Redo Tool in CorelDraw ?', 'Coreldraw', '2026-01-16 08:36:48'),
(200, '200', 'F3 the shortcut key to zoom in on all objects in the drawing.', 'Coreldraw', '2026-01-16 08:36:48'),
(201, '201', 'Which shortcut key to use text Modify .', 'Coreldraw', '2026-01-16 08:36:48'),
(202, '202', 'what is Not a color Model used on 2D and 3D Images ?', 'Coreldraw', '2026-01-16 08:36:48'),
(203, '203', 'How do You create a Perfect Circle in Corel DRAW?', 'Coreldraw', '2026-01-16 08:36:48'),
(204, '204', 'Which Coreldraw Tool lets you place an object inside another object\'s Shape ?', 'Coreldraw', '2026-01-16 08:36:48'),
(205, '205', 'In CorelDRAW which shortcut key is used to group selected objects?', 'Coreldraw', '2026-01-16 08:36:48'),
(206, '206', 'Which menu is used to align objects in CorelDRAW?', 'Coreldraw', '2026-01-16 08:36:48'),
(207, '207', 'What does pressing F2 do in CorelDRAW?', 'Coreldraw', '2026-01-16 08:36:48'),
(208, '208', 'Which of the following options lets you place an object in front of or behind other objects?', 'Coreldraw', '2026-01-16 08:36:48'),
(209, '209', 'What is the use of the Convert to Curves (Ctrl + Q) command?', 'Coreldraw', '2026-01-16 08:36:48'),
(210, '210', 'Which menu contains Zoom options?', 'Coreldraw', '2026-01-16 08:36:48'),
(211, '211', 'Which command is used to break apart combined objects?', 'Coreldraw', '2026-01-16 08:36:48'),
(212, '212', 'Which tool is used to apply a gradient (fountain) fill in an object?', 'Coreldraw', '2026-01-16 08:36:48'),
(213, '213', 'What is the shortcut key to open the Color Palette in CorelDRAW?', 'Coreldraw', '2026-01-16 08:36:48'),
(214, '214', 'Which color models are commonly used in CorelDRAW?', 'Coreldraw', '2026-01-16 08:36:48'),
(215, '215', 'The default color palettes in CorelDRAW is placed:', 'Coreldraw', '2026-01-16 08:36:48'),
(216, '216', 'Which of the following is used to apply no fill color to an object?', 'Coreldraw', '2026-01-16 08:36:48'),
(217, '217', 'What is the default file extension of a CorelDRAW file?', 'Coreldraw', '2026-01-16 08:36:48'),
(218, '218', 'Which of the following file formats cannot be imported into CorelDRAW?', 'Coreldraw', '2026-01-16 08:36:48'),
(219, '219', 'Which command is used to set the orientation of the page in CorelDRAW ?', 'Coreldraw', '2026-01-16 08:36:48'),
(220, '220', 'You can create multiple pages in CorelDRAW from which menu?', 'Coreldraw', '2026-01-16 08:36:48');

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

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

-- CREATE TABLE `students` (
--   `id` int(11) NOT NULL,
--   `student_name` varchar(255) DEFAULT NULL,
--   `father_name` varchar(255) DEFAULT NULL,
--   `dob` date DEFAULT NULL,
--   `qualification` varchar(255) DEFAULT NULL,
--   `photo` varchar(255) DEFAULT NULL,
--   `course_id` int(11) DEFAULT NULL,
--   `batch_time` varchar(100) DEFAULT NULL,
--   `duration` varchar(100) DEFAULT NULL,
--   `admission_date` date DEFAULT NULL,
--   `address` text DEFAULT NULL,
--   `phone` varchar(20) DEFAULT NULL,
--   `email` varchar(100) DEFAULT NULL,
--   `extra_note` text DEFAULT NULL,
--   `created_at` timestamp NOT NULL DEFAULT current_timestamp()
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --
-- Dumping data for table `students`
--

-- INSERT INTO `students` (`id`, `student_name`, `father_name`, `dob`, `qualification`, `photo`, `course_id`, `batch_time`, `duration`, `admission_date`, `address`, `phone`, `email`, `extra_note`, `created_at`) VALUES
-- (33, 'shiva', 'raj Singh ', '2025-12-23', '12th pass', '1766642143_kite.jpg', 9, '10 am', '6 months', '2025-12-12', 'Awash Vikash Colony House No.507\r\n5', '09720067044', 'shiva@gmail.com', 'hi', '2025-12-24 13:43:15'),
-- (34, 'test', 'test', '2026-01-14', 'test', '1768294485_6398.jpeg', 9, '10 am', '6 months', '2026-01-19', 'Awash Vikash Colony House No.507\r\n5', '09720067044', 'shiva@gmail.com', 'hi', '2026-01-13 08:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

-- CREATE TABLE `student_fees` (
--   `id` int(11) NOT NULL,
--   `student_id` int(11) DEFAULT NULL,
--   `course_id` int(11) DEFAULT NULL,
--   `total_fee` decimal(10,2) DEFAULT NULL,
--   `discount` decimal(10,2) DEFAULT 0.00,
--   `paid_amount` decimal(10,2) DEFAULT NULL,
--   `prev_fee` decimal(10,2) DEFAULT 0.00,
--   `remaining` decimal(10,2) DEFAULT NULL,
--   `payment_mode` varchar(50) DEFAULT NULL,
--   `remarks` text DEFAULT NULL,
--   `fees_date` date DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT current_timestamp()
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --
-- Dumping data for table `student_fees`
--

-- INSERT INTO `student_fees` (`id`, `student_id`, `course_id`, `total_fee`, `discount`, `paid_amount`, `prev_fee`, `remaining`, `payment_mode`, `remarks`, `fees_date`, `created_at`) VALUES
-- (95, 33, 9, '20000.00', '0.00', '2000.00', '0.00', '18000.00', 'Cash', 'Monthly fee', '2025-12-12', '2025-12-24 13:43:15'),
-- (96, 34, 9, '20000.00', '0.00', '2000.00', '0.00', '18000.00', 'Cash', 'test', '2026-01-19', '2026-01-13 08:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','student') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`) VALUES
(1, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_user`
--
ALTER TABLE `registered_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
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
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=886;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `registered_user`
--
ALTER TABLE `registered_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
