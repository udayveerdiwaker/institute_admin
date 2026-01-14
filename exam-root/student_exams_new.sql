-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2026 at 05:50 AM
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
-- Database: `formsonia`
--
CREATE DATABASE IF NOT EXISTS `formsonia` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `formsonia`;

-- --------------------------------------------------------

--
-- Table structure for table `table_form`
--

CREATE TABLE `table_form` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `number` int(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_form`
--
ALTER TABLE `table_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_form`
--
ALTER TABLE `table_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Database: `myadmin`
--
CREATE DATABASE IF NOT EXISTS `myadmin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `myadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `name`, `address`, `date`, `remark`, `created_at`) VALUES
(1, 'Sonia', 'Suman vihar Bapugram Rishikesh', '2025-12-13', 'Computer Class', '2025-12-11 11:56:55'),
(2, 'Shiva Divakar', 'Awas Vikas Rishikesh', '2025-12-27', 'Old Student Website Banaye Computer Sikhe', '2025-12-11 11:58:21'),
(3, 'Aditya Singh', 'Rama palace Dehradun road Rishikesh', '2025-12-13', 'Full Stack developer', '2025-12-11 12:13:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"myadmin\",\"table\":\"records\"},{\"db\":\"formsonia\",\"table\":\"table_form\"},{\"db\":\"student_exams\",\"table\":\"options\"},{\"db\":\"student_exams\",\"table\":\"questions\"},{\"db\":\"student_exams\",\"table\":\"result\"},{\"db\":\"student_exams\",\"table\":\"registered_user\"},{\"db\":\"premiumbusiness\",\"table\":\"cards\"},{\"db\":\"premiumbusiness\",\"table\":\"rename_section\"},{\"db\":\"premiumbusiness\",\"table\":\"card_fields\"},{\"db\":\"premiumbusiness\",\"table\":\"portfolio\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'student_exams', 'options', '{\"sorted_col\":\"`options`.`sub` ASC\"}', '2025-10-09 13:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2026-01-14 04:49:48', '{\"Console\\/Mode\":\"collapse\",\"Server\\/hide_db\":\"\",\"Server\\/only_db\":\"\",\"NavigationWidth\":185}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `premiumbusiness`
--
CREATE DATABASE IF NOT EXISTS `premiumbusiness` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `premiumbusiness`;

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `theme_name` varchar(256) NOT NULL DEFAULT 'theme_one',
  `card_theme_bg_type` varchar(256) NOT NULL DEFAULT 'Color',
  `card_theme_bg` text NOT NULL,
  `profile` text NOT NULL,
  `title` text NOT NULL,
  `sub_title` text NOT NULL,
  `description` text NOT NULL,
  `banner` text NOT NULL,
  `social_options` text NOT NULL,
  `hide_branding` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `card_bg_type` varchar(256) NOT NULL DEFAULT 'Color',
  `card_bg` text NOT NULL,
  `card_font_color` varchar(256) NOT NULL DEFAULT '#000000',
  `card_font` text NOT NULL,
  `scans` int(11) NOT NULL,
  `enquery_email` text NOT NULL,
  `show_add_to_phone_book` int(11) NOT NULL DEFAULT 1,
  `show_share` int(11) NOT NULL DEFAULT 1,
  `show_qr_on_card` int(11) NOT NULL DEFAULT 1,
  `show_change_language_option_on_a_card` int(11) NOT NULL DEFAULT 0,
  `show_card_view_count_on_a_card` int(11) NOT NULL DEFAULT 0,
  `show_qr_on_share_popup` int(11) NOT NULL DEFAULT 1,
  `search_engine_indexing` int(11) NOT NULL DEFAULT 0,
  `make_setions_conetnt_carousel` int(11) NOT NULL DEFAULT 0,
  `custom_css` text NOT NULL,
  `custom_js` text NOT NULL,
  `custom_domain_redirect` int(11) NOT NULL DEFAULT 0,
  `custom_domain_status` int(11) NOT NULL DEFAULT 0,
  `custom_domain` text NOT NULL,
  `reorder_sections` text NOT NULL,
  `qr_code_options` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `saas_id` int(11) DEFAULT NULL,
  `google_analytics` text DEFAULT NULL,
  `rename_section` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `user_id`, `slug`, `theme_name`, `card_theme_bg_type`, `card_theme_bg`, `profile`, `title`, `sub_title`, `description`, `banner`, `social_options`, `hide_branding`, `views`, `card_bg_type`, `card_bg`, `card_font_color`, `card_font`, `scans`, `enquery_email`, `show_add_to_phone_book`, `show_share`, `show_qr_on_card`, `show_change_language_option_on_a_card`, `show_card_view_count_on_a_card`, `show_qr_on_share_popup`, `search_engine_indexing`, `make_setions_conetnt_carousel`, `custom_css`, `custom_js`, `custom_domain_redirect`, `custom_domain_status`, `custom_domain`, `reorder_sections`, `qr_code_options`, `created`, `saas_id`, `google_analytics`, `rename_section`) VALUES
(1, 1, 'demo', 'theme_five', 'Image', '1627534897-waptechy-card-background.jpg', '1627534264-waptechy-card-profile.jpg', 'WAPTechy', 'CEO and Founder', 'We are WAPTechy Advanced Full Stack Developers.', '1627535026-waptechy-card-banner.jpg', '{\"optional\":{\"icon\":[\"fab fa-facebook m-0\"],\"text\":[\"Facebook\"],\"url\":[\"https:\\/\\/www.facebook.com\\/\"]},\"mandatory\":{\"mobile\":\"+918888888888\",\"email\":\"waptechy@gmail.com\",\"website\":\"https:\\/\\/waptechy.com\",\"address\":\"Silicon Valley, California, USA\",\"address_url\":\"https:\\/\\/goo.gl\\/maps\\/fey6iWQbYP6ozcHc7\"}}', 0, 67, 'Color', '#ffffff', '#000000', 'Lato', 0, '', 1, 1, 0, 0, 0, 1, 1, 0, '', '', 0, 0, '', '', '', '2021-07-14 07:36:00', 1, '', ''),
(2, 2, '1691230686', 'theme_one', 'Image', '1691564351-desktop-wallpaper-football-stadium-soccer-pitch-for-soccer-mobile.jpg', '1691469583-images-(1).jpg', 'player', 'football', 'Coaching', '1691482163-0700b941a8a53d4e035febb498af6efc.jpg', '', 0, 75, 'Image', '1691564429-desktop-wallpaper-mito-neymar-jr-mito-neymar-neymar-neymar-football-neymar-jr-brazil-football-thumbnail.jpg', '#ffffff', '', 0, 'ankitfootball@.com', 1, 1, 1, 0, 0, 1, 0, 0, '', '', 1, 1, 'ankit.premiumbusiness.in', '[\"main_card_section\",\"products_services\",\"portfolio\",\"gallery\",\"testimonials\",\"qr_code\",\"enquiry_form\",\"custom_sections\"]', '{\"foreground_color\":\"#000000\",\"background_color\":\"#ffffff\",\"corner_radius\":\"12\",\"qr_type\":\"4\",\"size\":\"50\",\"text\":\"\",\"text_color\":\"#000000\",\"image\":\"1691480890-download-(2).jpg\"}', '2023-08-05 10:18:06', 2, '', ''),
(3, 3, 'sk-interiors', 'theme_six', 'Color', '#e52165', '1691461047-sanjeev-photo.png', 'sk interiors', 'wallpapers', 'dream on floor', '1691410224-skbanga.jpg', '', 0, 14, 'Color', '#ffffff', '#000000', '', 0, 'skinteriors.com', 1, 1, 1, 0, 0, 1, 0, 0, '', '', 1, 0, '', '[\"main_card_section\",\"portfolio\",\"gallery\",\"products_services\",\"testimonials\",\"enquiry_form\",\"custom_sections\",\"qr_code\"]', '', '2023-08-05 11:23:44', 3, '', ''),
(4, 4, 'Ashmit-Gamer', 'theme_one', 'Image', '1691644172-background.jpg', '1691564582-Gamer.jpg', 'Ashmit Banga', 'Working at Websitebanaye', 'I am a computer engineer i have 1 year experince', '1691564544-WhatsApp-Image-2023-08-08-at-1.31.00-PM.jpeg', '', 0, 24, 'Color', '#ffffff', '#000000', '', 0, 'ashmitgamer.com', 1, 1, 1, 0, 0, 1, 0, 0, '', '', 0, 0, '', '[\"main_card_section\",\"portfolio\",\"gallery\",\"products_services\",\"testimonials\",\"enquiry_form\",\"custom_sections\",\"qr_code\"]', '', '2023-08-07 07:54:08', 4, '', ''),
(5, 5, '1691482610', 'theme_one', 'Color', '', '', '', '', '', '', '', 0, 0, 'Color', '', '#000000', '', 0, '', 1, 1, 1, 0, 0, 1, 0, 0, '', '', 0, 0, '', '', '', '2023-08-08 08:16:50', 5, NULL, ''),
(6, 6, '1693654467', 'theme_one', 'Color', '', '', '', '', '', '', '', 0, 1, 'Color', '', '#000000', '', 0, '', 1, 1, 1, 0, 0, 1, 0, 0, '', '', 0, 0, '', '', '', '2023-09-02 11:34:27', 6, NULL, ''),
(8, 8, '1693809711', 'theme_five', 'Image', '1693823782-Theme1.jpg', '1693822971-profile.jpg', 'Teacher', 'Computer', 'Coaching', '1693822982-banner.jpg', '', 0, 18, 'Image', '1693823433-background.jpg', '#000000', '', 0, '', 1, 1, 1, 0, 0, 1, 0, 0, '', '', 0, 0, '', '[\"main_card_section\",\"products_services\",\"portfolio\",\"gallery\",\"testimonials\",\"qr_code\",\"enquiry_form\",\"custom_sections\"]', '{\"foreground_color\":\"#000000\",\"background_color\":\"#ffffff\",\"corner_radius\":\"15\",\"qr_type\":\"0\",\"size\":\"26\",\"text\":\"\",\"text_color\":\"#000000\"}', '2023-09-04 06:41:51', 8, NULL, ''),
(9, 9, 'dhamyatra', 'theme_five', 'Color', '#e52165', '1695214528-Logo.jpeg', 'Dham Yatra', 'All India Tour & Travels', 'Welcome to our premier tour and travel agency, where adventure knows no bounds and dreams become destinations. At Dham Yatra, we are your passport to extraordinary experiences, creating memories that last a lifetime.\r\n\r\nOur agency is not just about booking trips; we specialize in crafting immersive journeys tailored to your unique desires. Whether you\'re seeking the tranquil beauty of exotic beaches, the thrill of exploring ancient cultures, or the adrenaline rush of adventure sports, we have a meticulously curated selection of destinations and itineraries to choose from.\r\n\r\nWhat sets us apart is our commitment to personalized service. Our team of travel experts takes the time to understand your preferences, budget, and interests, ensuring that every trip is a perfect fit. Whether you\'re a solo traveler, a couple seeking a romantic getaway, a family yearning for adventure, or a group of friends ready for a new expedition, we have the expertise to create an unforgettable experience. From meticulously planned itineraries to spontaneous getaways, we cater to every type of traveler.\r\n\r\nJoin us on a journey of discovery, where every trip is a story waiting to be written. Let Dham Yatra be your trusted companion on the road to remarkable destinations, where wanderlust turns into wonderful memories. Your adventure begins here.', '1695212433-Background.jpeg', '', 0, 55, 'Color', '#ffffff', '#000000', '', 0, '', 1, 1, 1, 0, 0, 1, 0, 0, '', '', 0, 0, '', '', '{\"foreground_color\":\"#000000\",\"background_color\":\"#ffffff\",\"corner_radius\":\"27\",\"qr_type\":\"0\",\"size\":\"26\",\"text\":\"\",\"text_color\":\"#000000\"}', '2023-09-19 09:35:13', 9, '', ''),
(11, 11, 'Career-Oriented-courses', 'theme_three', 'Color', '#d6f8ff', '1698821346-web-developer-.jpeg', 'COMPUTER LEARNING', 'Center for Tally, IT & Web Development', 'We have a Provide Latest Computer Course .', '1698643208-computer.jpeg', '', 0, 18, 'Color', '#fafafa', '#000000', 'Lato', 0, 'rishikeshcomputercenter@gmail.com', 1, 1, 1, 0, 0, 1, 0, 0, ' ', '', 0, 0, '', '[\"main_card_section\",\"custom_sections\",\"products_services\",\"portfolio\",\"gallery\",\"testimonials\",\"qr_code\",\"enquiry_form\"]', '', '2023-10-27 06:50:09', 11, '', ''),
(12, 12, '1707989541', 'theme_one', 'Color', '', '', '', '', '', '', '', 0, 0, 'Color', '', '#000000', '', 0, '', 1, 1, 1, 0, 0, 1, 0, 0, '', '', 0, 0, '', '', '', '2024-02-15 09:32:21', 12, NULL, ''),
(13, 13, '1716791428', 'theme_one', 'Color', '', '', '', '', '', '', '', 0, 0, 'Color', '', '#000000', '', 0, '', 1, 1, 1, 0, 0, 1, 0, 0, '', '', 0, 0, '', '', '', '2024-05-27 06:30:28', 13, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `card_fields`
--

CREATE TABLE `card_fields` (
  `id` int(11) NOT NULL,
  `saas_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `icon` text NOT NULL,
  `title` text NOT NULL,
  `url` text NOT NULL,
  `order_by_id` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `card_fields`
--

INSERT INTO `card_fields` (`id`, `saas_id`, `user_id`, `card_id`, `type`, `icon`, `title`, `url`, `order_by_id`, `created`) VALUES
(1, 1, 1, 1, 'mobile', 'fas fa-mobile-alt', '+918888888888', '+918888888888', 0, '2022-01-30 14:06:41'),
(2, 1, 1, 1, 'email', 'far fa-envelope', 'waptechyone@gmail.com', 'waptechyone@gmail.com', 0, '2022-01-30 14:06:41'),
(4, 1, 1, 1, 'address', 'fas fa-map-marker-alt', 'Silicon Valley, California, USA', 'https://goo.gl/maps/fey6iWQbYP6ozcHc7', 0, '2022-01-30 14:06:41'),
(5, 1, 1, 1, 'custom', 'fab fa-facebook m-0', 'Facebook', 'https://www.facebook.com/', 0, '2022-01-30 14:06:41'),
(6, 3, 3, 3, 'mobile', 'fas fa-mobile-alt', '7017976166', '7017976166', 0, '2023-08-05 11:55:46'),
(7, 2, 2, 2, 'mobile', 'fas fa-mobile-alt', '9634362073', '9634362073', 0, '2023-08-07 07:49:11'),
(8, 4, 4, 4, 'mobile', 'fas fa-mobile-alt', '9258300463', '9258300463', 0, '2023-08-07 11:42:49'),
(9, 2, 2, 2, 'address', 'fas fa-map-marker-alt', 'Uttarakhand pithoragarh munsyari', '9634362073', 0, '2023-08-08 05:34:58'),
(10, 8, 8, 8, 'mobile', 'fas fa-mobile-alt', '8449620513', 'wedre4t4', 0, '2023-09-04 07:00:29'),
(11, 8, 8, 8, 'email', 'far fa-envelope', 'isharaturi655@gmail.com', '1234', 0, '2023-09-04 07:05:09'),
(12, 9, 9, 9, 'mobile', 'fas fa-mobile-alt', '8923141121', '8923141121', 0, '2023-09-19 10:01:36'),
(13, 9, 9, 9, 'email', 'far fa-envelope', 'dham4yatra@gmail.com', 'dham4yatra@gmail.com', 0, '2023-09-19 10:06:49'),
(14, 11, 11, 11, 'mobile', 'fas fa-mobile-alt', '9814143394', '9292003000', 0, '2023-10-28 06:37:46'),
(15, 11, 11, 11, 'address', 'fas fa-map-marker-alt', 'Shastri Nagar Om Palace, Rishikesh, Uttarakhand', 'https://maps.app.goo.gl/6Dxgi5X5NfaZ3DqFA', 0, '2023-10-28 06:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `card_sections`
--

CREATE TABLE `card_sections` (
  `id` int(11) NOT NULL,
  `saas_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `order_by_id` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `card_sections`
--

INSERT INTO `card_sections` (`id`, `saas_id`, `user_id`, `card_id`, `title`, `content`, `order_by_id`, `created`) VALUES
(1, 3, 3, 3, 'interior decoration', '<p>wallpaper, blinds,glassfilm</p>', 0, '2023-08-05 11:51:15'),
(2, 3, 3, 3, 'waterproof pvc wallpaper', '<p>glass film and wallpaper</p>', 0, '2023-08-07 11:57:10'),
(3, 4, 4, 4, 'Video Games and Accessories', '<p>Video Games and Accessories</p>', 0, '2023-08-07 11:58:10'),
(4, 4, 4, 4, 'Service and updates', '<p>We also provide service and update video games</p>', 0, '2023-08-07 11:59:12'),
(5, 2, 2, 2, 'Soccer', '<h2 class=\"O5uR6d wHYlTd\" style=\"font-family: arial, sans-serif; line-height: 22px; margin-top: 0px; color: #202124; background-color: #ffffff; text-align: center;\">A game that is played By two teams of eleven players who try to kick a round ball into a goal.... ⚽⚽</h2>\r\n<p>&nbsp;</p>\r\n<p>&nbsp; &nbsp; &nbsp;</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n<p>&nbsp;</p>', 0, '2023-08-09 05:50:50'),
(6, 2, 2, 2, 'Best coaching service in football...', '<p>⚽</p>', 0, '2023-08-10 05:30:12'),
(7, 8, 8, 8, 'Best Computer Education', '<p>Computer education is the process of learning about computers and how to use them.</p>', 0, '2023-09-04 07:17:46'),
(8, 9, 9, 9, 'Special Offer', '<p>Special offer between June To december</p>', 0, '2023-09-20 10:25:08'),
(9, 9, 9, 9, '*', '<p>All prices are of Compact cars. Our vehicle rental prices vary based on capacity:&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>1. Compact cars: Affordable for couples or small groups.</p>\r\n<p>2. SUVs: Ideal for families.</p>\r\n<p>3. Minivans: Suitable for larger groups.</p>\r\n<p>4. Coaches: Spacious for large parties.</p>', 0, '2023-09-20 13:18:35'),
(10, 11, 11, 11, 'Full Stack Web Development', '<p><img src=\"https://auburn.edu/outreach/opce/webdesign/images/webdesign_banner.jpg\" alt=\"\" width=\"100%\" height=\"auto\" /></p>\r\n<ul>\r\n<li style=\"text-align: left;\"><span style=\"font-family: \'times new roman\', times, serif;\"><strong>WEBSITE DESIGING</strong></span></li>\r\n<li style=\"text-align: left;\"><span style=\"font-family: \'times new roman\', times, serif;\">(Responsive website with HTML+CSS)</span></li>\r\n<li style=\"text-align: left;\"><span style=\"font-family: \'times new roman\', times, serif;\">Advance JavaScript</span></li>\r\n<li style=\"text-align: left;\"><span style=\"font-family: \'times new roman\', times, serif;\">PHP</span></li>\r\n<li style=\"text-align: left;\"><span style=\"font-family: \'times new roman\', times, serif;\">MY SQL&nbsp;</span></li>\r\n<li style=\"text-align: left;\"><span style=\"font-family: \'times new roman\', times, serif;\">Practical Project&nbsp;</span></li>\r\n<li style=\"text-align: left;\"><span style=\"font-family: \'times new roman\', times, serif;\">THESE ARE MAIN MODULES&nbsp;</span><br /><br /><span style=\"font-family: \'times new roman\', times, serif;\">OTHER ARE&nbsp;</span></li>\r\n</ul>', 1, '2023-10-28 06:44:09'),
(11, 11, 11, 11, 'Tally ERP9', '<p><img src=\"https://www.attitudetallyacademy.com/Blog/wp-content/uploads/2018/06/Untitled-1.jpg\" alt=\"\" width=\"100%\" height=\"auto\" /></p>\r\n<p><strong><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\">Manual Accounting Up To Advance Tally Chapters&nbsp; &nbsp;&nbsp;</span></strong></p>\r\n<ul>\r\n<li><strong>1-<span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">Computerized Accounting&nbsp;</span></strong></li>\r\n<li><strong><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">2-Interest,cost Centre&nbsp;&nbsp;</span></strong></li>\r\n<li><strong><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">3-Inventory Management&nbsp;&nbsp;</span></strong></li>\r\n<li><strong><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">4-Payroll Generating A payslip in Tally</span></strong></li>\r\n<li><strong><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">5-Taxes- TDS and TCS</span></strong></li>\r\n<li><strong><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">6- Inventory Advance chapter On Tally <img src=\"https://www.google.com/imgres?imgurl=https%3A%2F%2Fwww.tutorialkart.com%2Fwp-content%2Fuploads%2F2019%2F07%2FWhat-is-tally-Tally-power-of-simplicity.png&amp;tbnid=DOsuveflTJGIIM&amp;vet=12ahUKEwie3d6mvp-CAxW6TWwGHfIFAtkQMygsegUIARCtAQ..i&amp;imgrefurl=https%3A%2F%2Fwww.tutorialkart.com%2Ftally%2Fwhat-is-tally%2F&amp;docid=lvzKnoR4O7birM&amp;w=729&amp;h=414&amp;q=tally%20course%20name&amp;ved=2ahUKEwie3d6mvp-CAxW6TWwGHfIFAtkQMygsegUIARCtAQ\" alt=\"\" width=\"100\" height=\"auto\" /></span></strong></li>\r\n<li><strong><span style=\"font-size: 12pt; font-family: \'times new roman\', times, serif;\">9- Practical Test on Tally</span></strong></li>\r\n</ul>', 0, '2023-10-28 07:32:10'),
(12, 11, 11, 11, 'Advance Computer', '<p><img src=\"https://import.cdn.thinkific.com/316712/courses/1462733/EMWmrqSvSlbTgFB73DtA_office%20advanced.png\" alt=\"\" width=\"100%\" height=\"auto \" /></p>\r\n<p><strong><span style=\"font-size: 14pt;\"><span style=\"font-family: \'times new roman\', times, serif;\">&nbsp; &nbsp; &nbsp; Ms office Specialist&nbsp;</span><span style=\"font-family: \'times new roman\', times, serif;\">(3 Months)</span></span></strong></p>\r\n<ul>\r\n<li><strong><span style=\"font-family: \'times new roman\', times, serif;\">MS-Word&nbsp;</span></strong></li>\r\n<li><strong><span style=\"font-family: \'times new roman\', times, serif;\">MS-Excel&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></strong></li>\r\n<li><strong><span style=\"font-family: \'times new roman\', times, serif;\">MS-Powerpoint</span></strong></li>\r\n</ul>\r\n<p><span style=\"font-family: \'times new roman\', times, serif;\"><span style=\"font-family: times new roman, times, serif;\"><strong>When you have an in-depth knowledge of MS Office, it means you can make better presentations, use more features in Word, Excel or Powerpoint .</strong></span></span></p>\r\n<p>&nbsp;</p>', 2, '2023-10-31 05:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `date_formats`
--

CREATE TABLE `date_formats` (
  `id` int(11) NOT NULL,
  `format` text NOT NULL,
  `js_format` text NOT NULL,
  `description` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `date_formats`
--

INSERT INTO `date_formats` (`id`, `format`, `js_format`, `description`, `created`) VALUES
(1, 'd-m-Y', 'DD-MM-YYYY', 'd-m-Y (18-05-2020)', '2020-05-18 01:50:13'),
(2, 'm-d-Y', 'MM-DD-YYYY', 'm-d-Y (05-18-2020)', '2020-05-18 01:50:13'),
(3, 'Y-m-d', 'YYYY-MM-DD', 'Y-m-d (2020-05-18)', '2020-05-18 01:50:13'),
(4, 'd.m.Y', 'DD.MM.YYYY', 'd.m.Y (18.05.2020)', '2020-05-18 01:50:13'),
(5, 'm.d.Y', 'MM.DD.YYYY', 'm.d.Y (05.18.2020)', '2020-05-18 01:50:13'),
(6, 'Y.m.d', 'YYYY.MM.DD', 'Y.m.d (2020.05.18)', '2020-05-18 01:50:13'),
(7, 'd/m/Y', 'DD/MM/YYYY', 'd/m/Y (18/05/2020)', '2020-05-18 01:50:13'),
(8, 'm/d/Y', 'MM/DD/YYYY', 'm/d/Y (05/18/2020)', '2020-05-18 01:50:13'),
(9, 'Y/m/d', 'YYYY/MM/DD', 'Y/m/d (2020/05/18)', '2020-05-18 01:50:13'),
(10, 'd-M-Y', 'DD-MMM-YYYY', 'd-M-Y (18-May-2020)', '2020-05-18 01:50:13'),
(11, 'd/M/Y', 'DD/MMM/YYYY', 'd/M/Y (18/May/2020)', '2020-05-18 01:50:13'),
(12, 'd.M.Y', 'DD.MMM.YYYY', 'd.M.Y (18.May.2020)', '2020-05-18 01:50:13'),
(13, 'd-M-Y', 'DD-MMM-YYYY', 'd-M-Y (18-May-2020)', '2020-05-18 01:50:13'),
(14, 'd M Y', 'DD MMM YYYY', 'd M Y (18 May 2020)', '2020-05-18 01:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `variables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `subject`, `message`, `variables`) VALUES
(1, 'new_user_registration', 'Welcome', '<p>Welcome to the {COMPANY_NAME}, This is an automatically generated email to inform you. Below are the credentials for your work dashboard.</p>\r\n<p>Login credentials</p>\r\n<p>Email: {LOGIN_EMAIL}</p>\r\n<p>Password: {LOGIN_PASSWORD}</p>\r\n<p><a href=\"{DASHBOARD_URL}\">Login Now</a></p>', '{COMPANY_NAME}, {DASHBOARD_URL}, {LOGO_URL}, {LOGIN_EMAIL}, {LOGIN_PASSWORD}'),
(2, 'forgot_password', 'Reset password', '<p>Hello,</p>\r\n<p>A password reset request has been created for your account.</p>\r\n<p>Please click on the following link to reset your password: {RESET_PASSWORD_LINK}</p>', '{COMPANY_NAME}, {DASHBOARD_URL}, {LOGO_URL}, {RESET_PASSWORD_LINK}'),
(3, 'email_verification', 'Confirm your email address', '<p>Welcome to the {COMPANY_NAME},</p>\r\n<p>Please confirm your email to activate your account.</p>\r\n<p>Please click on the following link to confirm your email address: {EMAIL_CONFIRMATION_LINK}</p>', '{COMPANY_NAME}, {DASHBOARD_URL}, {LOGO_URL}, {EMAIL_CONFIRMATION_LINK}'),
(9, 'front_enquiry_form', 'Contact Form submitted', '<p>Name:&nbsp;<span style=\"background-color: #ffffff; color: #0d1137; font-family: Nunito, \'Segoe UI\', arial;\">{NAME} </span></p>\r\n<p><span style=\"background-color: #ffffff; color: #0d1137; font-family: Nunito, \'Segoe UI\', arial;\">Email: {EMAIL}</span></p>\r\n<p><span style=\"background-color: #ffffff; color: #0d1137; font-family: Nunito, \'Segoe UI\', arial;\">{MESSAGE}</span></p>', '{COMPANY_NAME}, {DASHBOARD_URL}, {LOGO_URL}, {NAME}, {EMAIL}, {MESSAGE}'),
(10, 'card_enquiry_form', 'Enquiry form submitted from your vCard', '<p>Name:&nbsp;<span style=\"background-color: #ffffff; color: #0d1137; font-family: Nunito, \'Segoe UI\', arial;\">{NAME}</span></p>\r\n<p><span style=\"background-color: #ffffff; color: #0d1137; font-family: Nunito, \'Segoe UI\', arial;\">Email: {EMAIL}</span></p>\r\n<p><span style=\"background-color: #ffffff; color: #0d1137; font-family: Nunito, \'Segoe UI\', arial;\">Mobile: {MOBILE}</span></p>\r\n<p><span style=\"background-color: #ffffff; color: #0d1137; font-family: Nunito, \'Segoe UI\', arial;\">{MESSAGE}</span></p>', '{COMPANY_NAME}, {DASHBOARD_URL}, {LOGO_URL}, {NAME}, {EMAIL}, {MOBILE}, {MESSAGE}, {CARD_EMAIL}, {CARD_NAME}, {CARD_URL}');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `icon` text NOT NULL,
  `order_by_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `saas_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `content_type` text NOT NULL,
  `title` text NOT NULL,
  `url` text NOT NULL,
  `order_by_id` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `saas_id`, `user_id`, `card_id`, `content_type`, `title`, `url`, `order_by_id`, `created`) VALUES
(3, 4, 4, 4, 'upload', 'gallery', '1691472307-Gaming-Pc-1.jpg', 0, '2023-08-07 11:49:58'),
(6, 4, 4, 4, 'upload', 'gallery', '1691472345-Gaming-Pc-2.jpg', 0, '2023-08-07 11:51:25'),
(7, 3, 3, 3, 'upload', 'gallery', '1691419139-720x1280-Background-HD-Wallpaper-182.jpg', 0, '2023-08-07 14:38:59'),
(8, 3, 3, 3, 'upload', 'gallery', '1691419175-720x1280-Background-HD-Wallpaper-136.jpg', 0, '2023-08-07 14:39:35'),
(9, 2, 2, 2, 'upload', 'gallery', '1691472368-bigstock-Boys-Running-Soccer-Balls-Betw-390988997.jpg', 0, '2023-08-08 05:26:08'),
(10, 2, 2, 2, 'upload', 'gallery', '1691472389-images-(2).jpg', 0, '2023-08-08 05:26:29'),
(12, 8, 8, 8, 'upload', 'gallery', '1693825748-images.jpg', 0, '2023-09-04 11:09:08'),
(13, 8, 8, 8, 'upload', 'gallery', '1693825819-download.jpg', 0, '2023-09-04 11:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'saas_admin', 'SaaS Admin');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `language` text NOT NULL,
  `short_code` varchar(256) NOT NULL DEFAULT 'en',
  `active` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`, `short_code`, `active`, `created`, `status`) VALUES
(1, 'english', 'en', 0, '2021-01-16 16:34:50', 1),
(2, 'hindi', 'en', 0, '2021-01-16 16:34:50', 1),
(3, 'italian', 'en', 0, '2021-01-16 16:34:50', 1),
(4, 'spanish', 'en', 0, '2021-01-16 16:34:50', 1),
(5, 'french', 'en', 0, '2021-01-16 16:34:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `notification` text NOT NULL,
  `type` text NOT NULL,
  `type_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notification`, `type`, `type_id`, `from_id`, `to_id`, `is_read`, `created`) VALUES
(1, 'New user registered.', 'new_user', 2, 2, 1, 1, '2023-08-05 10:18:06'),
(2, '<span class=\"text-info\">ankit.premiumbusiness.in</span>', 'new_domain', 2, 2, 1, 1, '2023-08-05 10:40:14'),
(3, '<span class=\"text-info\">ankit.premiumbusiness.in</span>', 'new_domain_status', 2, 1, 2, 1, '2023-08-05 10:40:33'),
(4, '<span class=\"text-info\">ankit.premiumbusiness.in</span>', 'new_domain', 2, 2, 1, 1, '2023-08-05 10:40:56'),
(5, 'New user registered.', 'new_user', 3, 3, 1, 1, '2023-08-05 11:23:43'),
(6, '<span class=\"text-info\">Basic Plan</span>', 'offline_request', 1, 2, 1, 1, '2023-08-07 03:21:53'),
(7, '<span class=\"text-info\">Basic Plan</span>', 'offline_request', 1, 1, 2, 1, '2023-08-07 03:22:29'),
(8, 'New user registered.', 'new_user', 4, 4, 1, 1, '2023-08-07 07:54:08'),
(9, '<span class=\"text-info\"></span>', 'new_domain', 3, 3, 1, 1, '2023-08-07 12:00:28'),
(10, '<span class=\"text-info\"></span>', 'new_domain', 4, 4, 1, 1, '2023-08-07 12:00:31'),
(11, '<span class=\"text-info\">ankit.premiumbusiness.in</span>', 'new_domain', 2, 2, 1, 1, '2023-08-08 05:49:17'),
(12, 'New user registered.', 'new_user', 5, 5, 1, 1, '2023-08-08 08:16:49'),
(13, 'New user registered.', 'new_user', 6, 6, 1, 1, '2023-09-02 11:34:27'),
(15, 'New user registered.', 'new_user', 8, 8, 1, 1, '2023-09-04 06:41:51'),
(16, 'New user registered.', 'new_user', 9, 9, 1, 1, '2023-09-19 09:35:13'),
(18, 'New user registered.', 'new_user', 11, 11, 1, 1, '2023-10-27 06:50:09'),
(19, 'New user registered.', 'new_user', 12, 12, 1, 1, '2024-02-15 09:32:21'),
(20, 'New user registered.', 'new_user', 13, 13, 1, 1, '2024-05-27 06:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `offline_requests`
--

CREATE TABLE `offline_requests` (
  `id` int(11) NOT NULL,
  `saas_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `receipt` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `offline_requests`
--

INSERT INTO `offline_requests` (`id`, `saas_id`, `plan_id`, `status`, `created`, `receipt`) VALUES
(1, 2, 1, 1, '2023-08-07 03:21:53', '1691378513-logo-png.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `saas_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `amount` text NOT NULL,
  `amount_with_tax` text NOT NULL,
  `tax` text NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `saas_id`, `plan_id`, `amount`, `amount_with_tax`, `tax`, `transaction_id`, `status`, `created`) VALUES
(1, 2, 1, '2000', '2360', '[{\"tax_name\":\"GST\",\"tax_per\":\"18\",\"tax_amount\":360}]', 1, 1, '2023-08-07 03:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `created`) VALUES
(1, 'About Us', '<h1>call us 9814143394</h1>', '2021-02-05 07:25:18'),
(2, 'Privacy Policy', '<h1>Privacy Policy</h1>', '2021-02-05 07:31:52'),
(3, 'Terms and Conditions', '<h1>Terms and Conditions</h1>', '2021-02-05 07:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `price` int(11) NOT NULL,
  `billing_type` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modules` text NOT NULL,
  `cards` int(11) DEFAULT 1,
  `custom_fields` int(11) NOT NULL DEFAULT -1,
  `products_services` int(11) NOT NULL DEFAULT -1,
  `portfolio` int(11) NOT NULL DEFAULT -1,
  `testimonials` int(11) NOT NULL DEFAULT -1,
  `gallery` int(11) NOT NULL DEFAULT -1,
  `custom_sections` int(11) NOT NULL DEFAULT -1,
  `team_member` int(11) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `title`, `price`, `billing_type`, `status`, `created`, `modules`, `cards`, `custom_fields`, `products_services`, `portfolio`, `testimonials`, `gallery`, `custom_sections`, `team_member`) VALUES
(1, 'Basic Plan', 2000, 'One Time', 1, '2020-10-13 11:58:55', '{\"select_all\":1,\"custom_fields\":1,\"products_services\":1,\"portfolio\":1,\"testimonials\":1,\"gallery\":1,\"custom_sections\":1,\"team_member\":0,\"qr_code\":1,\"hide_branding\":1,\"enquiry_form\":1,\"support\":1,\"ads\":1,\"custom_js_css\":1,\"search_engine_indexing\":1,\"multiple_themes\":1,\"custom_domain\":1,\"custom_card_url\":1}', 1, 5, 10, 2, 2, 2, 2, 2),
(2, 'Enterprise Plan', 5000, 'Yearly', 1, '2023-10-31 05:32:58', '{\"select_all\":1,\"custom_fields\":1,\"products_services\":1,\"portfolio\":1,\"testimonials\":1,\"gallery\":1,\"custom_sections\":1,\"team_member\":1,\"qr_code\":1,\"hide_branding\":1,\"enquiry_form\":1,\"support\":1,\"ads\":1,\"custom_js_css\":1,\"search_engine_indexing\":1,\"multiple_themes\":1,\"custom_domain\":1,\"custom_card_url\":1}', 5, 10, 10, 10, 10, 10, 15, 10);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `saas_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `url` text NOT NULL,
  `order_by_id` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `saas_id`, `user_id`, `card_id`, `title`, `description`, `image`, `url`, `order_by_id`, `created`) VALUES
(1, 1, 1, 1, 'Project Management Systems', 'Professional Project Management Systems and CRM applications.', '1627536436-Inline-Preview-Image.jpg', 'https://codecanyon.net/user/wap_techy/portfolio', 0, '2021-09-27 09:15:53'),
(2, 2, 2, 2, 'Neymar jr', 'Best player in BFC', '1691559602-Neymar.jpg', '9634362073', 0, '2023-08-09 05:40:02'),
(4, 2, 2, 2, 'Football', 'Product', '1691644925-items-of-football-or-soccer-sport-vector-21297606.jpg', '', 0, '2023-08-10 05:22:05'),
(6, 8, 8, 8, 'Web designing', 'Web designers plan, create and code internet sites and web pages, many of which combine text with sounds, pictures, graphics and video clips.', '', '', 0, '2023-09-04 10:57:51'),
(7, 8, 8, 8, 'C and C++', 'C++ adds functionality for object-oriented programming, as well as other features. C and C++ are used for many purposes, including system applications, games, and graphics.', '', '', 0, '2023-09-04 11:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `saas_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `price` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `url` text NOT NULL,
  `order_by_id` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `saas_id`, `user_id`, `card_id`, `title`, `price`, `description`, `image`, `url`, `order_by_id`, `created`) VALUES
(1, 1, 1, 1, 'TimWork and TimWork SaaS', '14-21 USD', 'TimWork is a perfect, robust, lightweight, superfast web application to fulfill all your CRM, Project Management, and Team Collaboration needs.', '1627537889-Inline-Preview-Image.jpg', 'https://codecanyon.net/user/wap_techy/portfolio', 0, '2021-07-29 10:55:23'),
(7, 4, 4, 4, 'Grand Theft Auto 5 Premium Edition', '₹2,499.00 INR*', 'Action, Single Player & Multiplayer', '1691472693-Grand-Theft-Auto-5-Premium-Edition.jpg', '#', 0, '2023-08-07 11:48:23'),
(10, 3, 3, 3, 'glass film', '1000', 'glass film', '1691410741-gods.jpg', '#', 0, '2023-08-07 12:19:01'),
(11, 2, 2, 2, 'Comptable boots', '500', 'Best coaching in town', '1691480538-images-(4).jpg', '#', 0, '2023-08-08 06:04:23'),
(12, 2, 2, 2, 'Football', '500', 'Coaching', '1691478665-images-(2).jpg', '#', 0, '2023-08-08 07:11:05'),
(17, 8, 8, 8, 'Advance Computer course', '1000', 'Duration - 2 Month', '', '#', 0, '2023-09-04 10:50:23'),
(18, 8, 8, 8, 'Basic Computer Course', '500', 'Duration- 1 month', '', '#', 0, '2023-09-04 10:51:03'),
(19, 9, 9, 9, '4 Dham', '40000 *', 'Join our Chardham Yatra tour package and explore the holiest shrines in Uttarakhand - Yamunotri, Gangotri, Kedarnath, and Badrinath. A 10-day spiritual odyssey awaits, combining devotion with stunning Himalayan scenery. Seek blessings, cleanse your soul, and create lifelong memories. Embark on this sacred journey today.', '1695213083-Char-Dham.jpeg', '#enquiryform', 0, '2023-09-19 10:12:42'),
(20, 9, 9, 9, '2 Dham', '20000 *', 'Embark on a sacred odyssey with our Badrinath-Kedarnath Yatra tour package. Discover divine serenity at Badrinath, dedicated to Lord Vishnu, and Kedarnath, dedicated to Lord Shiva. This spiritual journey of 5 days and 4 nights offers blessings, breathtaking landscapes, and a profound connection with the divine. Book now for a soul-enriching experience.', '1695213372-2-dham.jpeg', '#', 0, '2023-09-19 10:15:11'),
(21, 9, 9, 9, 'Yog Nagri Rishikesh', '2500 *', 'Experience the spiritual and yoga capital of India with our Rishikesh tour package. Explore the tranquil banks of the Ganges, Laxman Jhula, Ram Jhula, Beatles Aashram, Parmarth Niketan Ganga Aarti & Geeta Bhawan/ Triveni Ghat Ganga Aarti and other holy places. This journey offers a perfect blend of serenity and excitement amidst the Himalayan foothills. Book now for an unforgettable getaway.', '1695214086-Rishikesh.jpg', '#', 0, '2023-09-20 12:48:06'),
(22, 9, 9, 9, 'Neelkanth Mahadev Temple', '2500 *', 'Discover divine tranquility with our Neelkanth Mahadev Temple tour package. Located amidst the Garhwal Himalayas, this sacred temple honors Lord Shiva\'s blue-throated form. Explore the rich history, lush forests, and spiritual aura of this site. Seek blessings and find solace in the lap of nature. Book your spiritual escape today.', '1695214434-Neelkanth-Mahadev-Temple.jpeg', '#', 0, '2023-09-20 12:53:54'),
(23, 9, 9, 9, 'Dehradun-Mussoorie', '3500 *', 'Experience the best of Uttarakhand with our Dehradun and Mussoorie tour package. Enjoy your vacation by exploring the charming capital city of Dehradun and the picturesque hill station of Mussoorie. Enjoy lush landscapes, serene hilltops, and local culture. An ideal blend of nature and urban escapades awaits. Book now for a memorable getaway.', '1695215100-Dehradun-Mussoorie.jpeg', '#', 0, '2023-09-20 13:05:00'),
(24, 9, 9, 9, 'Auli-Chopta', '4000 *', 'Embark on an epic adventure with our Auli and Chopta Tour Package in Uttarakhand. Conquer the snow-covered slopes of Auli for skiing and trek through the enchanting landscapes of Chopta. Immerse yourself in thrilling activities, stunning vistas, and nature\'s beauty. Book now for an adrenaline-filled journey of a lifetime.', '1695215681-Auli-Chopta.jpeg', '#', 0, '2023-09-20 13:14:41'),
(25, 9, 9, 9, 'Adventure Activities Around Rishikesh', '', 'Experience adrenaline-pumping adventure in Rishikesh. Plunge into the thrill of India\'s Highest bungee jumping, conquer white-water rapids with river rafting. Get your heart racing in Rishikesh with the ultimate thrill of bungee jumping, Parasailing, Giant Swing, Reverse Bungee, Leap from a towering platform, freefalling above the Ganges River, surrounded by the Himalayan foothills. An adrenaline rush like no other awaits adventure seekers in this breathtaking destination. Dare to take the plunge!', '1695216855-Adventure-in-Rishikesh.jpg', '#', 0, '2023-09-20 13:34:15'),
(26, 9, 9, 9, 'Airport Pickup & Drop', '', 'Our airport pickup and drop service ensures a seamless start and end to your journey. Relax as our professional chauffeurs greet you at the airport, assist with luggage, and provide a comfortable ride to your destination. Trust us for reliable and stress-free transfers, making travel hassle-free and enjoyable.', '1695217197-Airport-Pickup--Drop.jpg', '#', 0, '2023-09-20 13:39:57'),
(30, 11, 11, 11, 'Create your website', '', 'To All information contact our reception.', '', '#enquiryform', 0, '2024-01-15 18:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `rename_section`
--

CREATE TABLE `rename_section` (
  `product_services` text NOT NULL,
  `portflio` text NOT NULL,
  `gallery` text NOT NULL,
  `testimonials` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `value` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `type`, `value`, `created`) VALUES
(1, 'general', '{\"company_name\":\"Premium Business\",\"footer_text\":\"Powered by Premium business\",\"currency_code\":\"INR\",\"currency_symbol\":\"\\u20b9\",\"google_analytics\":\"\",\"mysql_timezone\":\"+05:30\",\"php_timezone\":\"Asia\\/Colombo\",\"date_format\":\"d M Y\",\"time_format\":\"h:i A\",\"date_format_js\":\"DD MMM YYYY\",\"time_format_js\":\"hh:mm A\",\"alert_days\":\"3\",\"full_logo\":\"logo-png2.png\",\"half_logo\":\"logo-half.png\",\"favicon\":\"favicon.png\",\"default_language\":\"english\",\"email_activation\":\"0\",\"theme_color\":\"#e52165\",\"turn_off_new_user_registration\":\"0\",\"turn_off_custom_domain_system\":\"0\"}', '2020-05-18 06:15:11'),
(2, 'email', '{\"smtp_host\":\"smtp.gmail.com\",\"smtp_port\":\"465\",\"smtp_username\":\"websitebanaye@gmail.com\",\"smtp_password\":\"mpzctjutldryyeua\",\"smtp_encryption\":\"ssl\",\"email_library\":\"phpmailer\",\"from_email\":\"websitebanaye@gmail.com\"}', '2020-05-18 06:15:11'),
(3, 'permissions', '{\"project_view\":1,\"project_create\":1,\"project_edit\":1,\"project_delete\":0,\"task_view\":1,\"task_create\":1,\"task_edit\":1,\"task_delete\":0,\"user_view\":1,\"setting_view\":1,\"setting_update\":0,\"todo_view\":1,\"notes_view\":1,\"chat_view\":1}', '2020-05-18 06:15:11'),
(4, 'system_version', '2.9', '2020-05-18 06:15:11'),
(5, 'payment', '{\"paypal_client_id\":\"\",\"paypal_secret\":\"1\",\"stripe_publishable_key\":\"\",\"stripe_secret_key\":\"\",\"razorpay_key_id\":\"\",\"razorpay_key_secret\":\"\",\"paystack_public_key\":\"\",\"paystack_secret_key\":\"\",\"offline_bank_transfer\":1,\"bank_details\":\"<p>You can pay via google pay or paytm <br \\/>number is 9814143394<\\/p>\"}', '2020-10-21 12:04:24'),
(6, 'frontend', '{\"theme_name\":null,\"landing_page\":1,\"features\":1,\"subscription_plans\":1,\"contact\":1,\"about\":1,\"privacy\":1,\"terms\":1}', '2021-02-20 06:40:22'),
(7, 'ads', '{\"header_code\":\"\",\"footer_code\":\"\",\"ad_area\":[\"after\"],\"ad_code\":\"\"}', '2023-09-21 10:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_messages`
--

CREATE TABLE `support_messages` (
  `id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` int(11) NOT NULL,
  `saas_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `tax` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `saas_id`, `title`, `tax`, `created`) VALUES
(1, 1, 'GST', '18', '2023-08-05 10:27:02');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `saas_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `rating` text NOT NULL,
  `order_by_id` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `saas_id`, `user_id`, `card_id`, `title`, `description`, `image`, `rating`, `order_by_id`, `created`) VALUES
(1, 1, 1, 1, 'Ironman', 'Fantastic, I\'m totally blown away by TimWork.', '1627536923-tony.jpg', '5', 0, '2021-09-27 09:15:53'),
(2, 1, 1, 1, 'Black Widow', 'This is unbelievable. After using TimWork my business skyrocketed!', '1627536910-natasha.jpg', '5', 0, '2021-09-27 09:15:53'),
(3, 1, 1, 1, 'Captain America', 'TimWork is the best tool to make up projects quickly.', '1627537722-Chris-Evans-title-character-Joe-Johnston-Captain.jpg', '4', 0, '2021-09-27 09:15:53'),
(4, 4, 4, 4, 'Best Gamer in city', 'Very good service and provide on time', '1691473060-Forest_research_institute_3,_Dehra_dun.jpg', '5', 0, '2023-08-07 11:54:20'),
(6, 3, 3, 3, 'best wallpaper in city', 'best service and price', '1691409322-n-3.jpg', '5', 0, '2023-08-07 11:55:22'),
(8, 2, 2, 2, 'Football', 'Coaching', '1691560018-soccer-7392844_1280.jpg', '5', 0, '2023-08-09 05:46:58'),
(9, 2, 2, 2, 'Football', 'Coaching', '1691645585-images-(2).jpg', '5', 0, '2023-08-10 05:33:05'),
(10, 8, 8, 8, 'Computer', 'As a Computer Teacher, I have experience in teaching a variety of computer courses to students from different backgrounds. I have knowledge of a range of computer applications such as Basic computer, Programming in C and C++ and HTML.', '', '5', 0, '2023-09-04 11:44:30'),
(11, 11, 11, 11, 'Join us For Exciting Career Courses', 'Web Development', '1698822199-Career-Software-Engineer.png', '5', 0, '2023-11-01 06:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `time_formats`
--

CREATE TABLE `time_formats` (
  `id` int(11) NOT NULL,
  `format` text NOT NULL,
  `js_format` text NOT NULL,
  `description` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `time_formats`
--

INSERT INTO `time_formats` (`id`, `format`, `js_format`, `description`, `created`) VALUES
(1, 'h:i A', 'hh:mm A', '12 Hour', '2020-05-18 01:33:44'),
(4, 'H:i', 'H:mm', '24 Hour', '2020-05-18 01:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `saas_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `tax` text NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `saas_id`, `amount`, `tax`, `status`, `created`) VALUES
(1, 2, 2000, '', 1, '2023-08-07 03:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `saas_id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `profile` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `saas_id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `profile`) VALUES
(1, 1, '127.0.0.1', 'gmpankajarora@gmail.com', '$2y$10$mpZpoIaP5ye8Hxy8lrFbL.mhQxVKv8jPMsOaK5GtahsynuQLWi4rq', 'gmpankajarora@gmail.com', NULL, '', NULL, NULL, NULL, 'baf95324bbf3ac07015852e612600ea1fae2a382', '$2y$10$zGQQJgpDijFlO6yQY5lD6.tQo2sfDcF/tqqLsdNpkMuxfKdH.v8Ge', 1268889823, 1716792059, 1, 'SaaS', 'Admin', NULL, '', NULL),
(2, 2, '172.70.251.205', 'ankit@ankit.com', '$2y$12$fohHDQhS16IfPs4JZpnBy.VMZ9lujUt/W6eR6ES8kps7vrEAUP8r.', 'ankit@ankit.com', NULL, NULL, NULL, NULL, NULL, 'e19497e11cb67191a6f852ed518e40c49590f20f', '$2y$10$/e9HeUkbNEmyBSMCbUvUDONQbEOm5Fkgi66ux.SPYN5mEflVvIAsi', 1691230686, 1698467405, 1, 'Ankit', 'Singh', NULL, '9634362073', NULL),
(3, 3, '162.158.23.42', 'anandamusicindia@gmail.com', '$2y$12$Ppz/PZ8YQoEWUEQ5k5OHJuGpXSfdevKh7iS4x2vtTZfRagRdvp8Iu', 'anandamusicindia@gmail.com', '02c801db3f3a2be5a48f', '$2y$10$iEzqGn7UoeJOQNVeBxQR1evjYr2vXU6yxfGW2vh50aBXuOdU0kcrG', NULL, NULL, NULL, '6c3eec72bb2404508a50233c5bb5bf8d126277c4', '$2y$10$xDoaNPS.CncMHl4P1Hmecu5ckhju4XLtTFTAnQ45UShaE.r7KBH0G', 1691234623, 1691471289, 0, 'sanjeev', 'kumar', NULL, '7017976166', NULL),
(4, 4, '162.158.22.8', 'ryder.ninja05@gmail.com', '$2y$12$SKrXZsAiv/sX0s8aNCb27.wEvWwYIMU4yis37K60mZZstlfOM9doq', 'ryder.ninja05@gmail.com', NULL, NULL, NULL, NULL, NULL, 'c928f3d801104bc7039a5fd8afeb0512a5313d09', '$2y$10$gsd9NHrQ4.X8pAe3EeyPaOEJad7MPCfCiXUz.4HruGFv3zJ8CVKAO', 1691394848, 1693649813, 1, 'Ashmit', 'Banga', NULL, '9258300463', NULL),
(5, 5, '172.71.250.122', 'ankitdhamot@035gmail.com', '$2y$12$x7VAQHbC8McmSpbkgdQDOeCn9.rXPPaVXXXRjFNO4x9Nw.62kWaPK', 'ankitdhamot@035gmail.com', NULL, NULL, NULL, NULL, NULL, '8c1bc6683516d25693e7a79abcd327100fa79d27', '$2y$10$6AcahKfMyoMkf70lv4Ps4OOTKyZf7pOdOn0uqVynpvBgUDQu.W89C', 1691482609, 1691483145, 1, 'Golu', 'Singh', NULL, NULL, NULL),
(6, 6, '162.158.22.23', 'sagarbhatt7451@gmail.com', '$2y$12$SY8oh1KyNF2oGjwMGFQzh.RGrS6AcjUnZGDxcwqrzUIIYW28/2IGu', 'sagarbhatt7451@gmail.com', NULL, NULL, NULL, NULL, NULL, '4b7c94681918d97ef77a5ef705463958eb440e74', '$2y$10$GgOFrH7juo2wrWaKj5d3KOcygLdxOjx77xPK8iqj0zlUFZlRhcnCC', 1693654467, 1698474047, 1, 'Sagar', 'bhatt', NULL, '', NULL),
(8, 8, '172.71.186.129', 'isharaturi655@gmail.com', '$2y$12$bABprSxofFUCdvuumLDfd.0oqgCq4N7TEB.Uo2ORPkS2YR01Np2e6', 'isharaturi655@gmail.com', NULL, NULL, NULL, NULL, NULL, 'c29b2f5cad6535455d7ae4a343f7fc105bf780af', '$2y$10$yzMY4KCI.YAFYEqCEM2GyeDJX6I4P/4noMAw0d/PRPaydfdXFjlaO', 1693809711, 1693889623, 1, 'Isha', 'Raturi', NULL, '', NULL),
(9, 9, '162.158.23.13', 'dhamyatra@gmail.com', '$2y$12$4/GKhIhs9ZmDz/gX1irb6ebRP9rCw/Cm7BT/5MKRHgBExc8roPFdy', 'dhamyatra@gmail.com', NULL, NULL, NULL, NULL, NULL, 'e4cf9ef50cb1f364205827ac7ee3b8fd052c3796', '$2y$10$oTde83eYW/r6brbcsAPsjOq8LTSoUBNgQJM0KgG1uiMybYHnbubZG', 1695116113, 1695290280, 1, 'Dham', 'Yatra', NULL, '', NULL),
(11, 11, '172.71.186.177', 'websitebanaye@gmail.com', '$2y$12$cdyrWat9HVPHlR9P6SXNG.l/kY9WNSU78bQJgakLgbR4wz0PWFKgK', 'websitebanaye@gmail.com', NULL, NULL, NULL, NULL, NULL, 'd81409712ae9e983949c7382a343681527ef9c97', '$2y$10$cYZouTycUEX/SGBIe4RMx.hX4IOI6RGABWMAg5lsiUP5RPzecvOQq', 1698389409, 1705341726, 1, 'Computer', 'Courses', NULL, '', NULL),
(12, 12, '172.71.102.69', 'wholehousewaterfiltermarketing@gmail.com', '$2y$10$YsYr8LNk7a/QjxG0PwpL1uzWJaVMrkg07POVTFLej4W6WJhiBPTdK', 'wholehousewaterfiltermarketing@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1707989541, NULL, 1, 'whwf', 'uae', NULL, NULL, NULL),
(13, 13, '::1', 'anitarawat389@gmail.com', '$2y$12$iVOfvnlQYzXB9nRigUc8GOFME6ehl0qp5tE4Ie1RTs7yaQ9ZVsqma', 'anitarawat389@gmail.com', NULL, NULL, NULL, NULL, NULL, '0833a6e497eddd307c7473287003bb7955552557', '$2y$10$h1Fy73bJg5mtRoH8PVBsAO7rXcuUN4wFslMjJPJ7hzIYd2H./6JJW', 1716791428, 1716792292, 1, 'Anita', 'Rawat', NULL, '', NULL),
(14, 13, '::1', 'ani123@gmail.com', '$2y$10$h9zO1kZEn8lLdmDVru18V.cGXIBIp4v89HMQ0MvbRJXADRiM2m4.q', 'ani123@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1716791986, NULL, 1, 'Anita', 'Rawat', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 3),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(8, 8, 1),
(9, 9, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_plans`
--

CREATE TABLE `users_plans` (
  `id` int(11) NOT NULL,
  `saas_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `expired` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_plans`
--

INSERT INTO `users_plans` (`id`, `saas_id`, `plan_id`, `start_date`, `end_date`, `expired`, `created`) VALUES
(1, 2, 1, '2023-08-07', NULL, 1, '2023-08-05 10:18:06'),
(2, 3, 1, '2023-08-05', NULL, 1, '2023-08-05 11:23:43'),
(3, 4, 1, '2023-08-07', NULL, 1, '2023-08-07 07:54:08'),
(4, 5, 1, '2023-08-08', '2023-08-07', 0, '2023-08-08 08:16:49'),
(5, 6, 1, '2023-09-02', NULL, 1, '2023-09-02 11:34:27'),
(7, 8, 1, '2023-09-04', NULL, 1, '2023-09-04 06:41:51'),
(8, 9, 1, '2023-09-19', NULL, 1, '2023-09-19 09:35:13'),
(10, 11, 2, '2023-10-27', '2024-08-31', 1, '2023-10-27 06:50:09'),
(11, 12, 1, '2024-02-15', '2024-02-14', 0, '2024-02-15 09:32:21'),
(12, 13, 1, '2024-05-27', NULL, 1, '2024-05-27 06:30:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_fields`
--
ALTER TABLE `card_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_sections`
--
ALTER TABLE `card_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `date_formats`
--
ALTER TABLE `date_formats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offline_requests`
--
ALTER TABLE `offline_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_messages`
--
ALTER TABLE `support_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_formats`
--
ALTER TABLE `time_formats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `users_plans`
--
ALTER TABLE `users_plans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `card_fields`
--
ALTER TABLE `card_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `card_sections`
--
ALTER TABLE `card_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `date_formats`
--
ALTER TABLE `date_formats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `offline_requests`
--
ALTER TABLE `offline_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_messages`
--
ALTER TABLE `support_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `time_formats`
--
ALTER TABLE `time_formats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_plans`
--
ALTER TABLE `users_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
--
-- Database: `studentdata`
--
CREATE DATABASE IF NOT EXISTS `studentdata` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `studentdata`;
--
-- Database: `student_exams`
--
CREATE DATABASE IF NOT EXISTS `student_exams` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `student_exams`;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `options` text NOT NULL,
  `sub` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_number`, `is_correct`, `options`, `sub`) VALUES
(1, 1, 1, 'Application', 'Computer'),
(2, 1, 0, 'Compiler', 'Computer'),
(3, 1, 0, 'System', 'Computer'),
(4, 1, 0, 'Programming', 'Computer'),
(5, 2, 0, 'Italic', 'Computer'),
(6, 2, 1, 'Magic tool', 'Computer'),
(7, 2, 0, 'Font', 'Computer'),
(8, 2, 0, 'Bold', 'Computer'),
(9, 3, 0, ' MS Word 2003', 'Computer'),
(10, 3, 0, 'MS Word 2007', 'Computer'),
(11, 3, 0, 'MS Word 2010', 'Computer'),
(12, 3, 1, 'MS Word 1020', 'Computer'),
(13, 4, 0, 'Clipart', 'Computer'),
(14, 4, 1, 'Margins', 'Computer'),
(15, 4, 0, 'Header', 'Computer'),
(16, 4, 0, 'Footer', 'Computer'),
(17, 5, 0, 'Document formatting', 'Computer'),
(18, 5, 0, 'Database management', 'Computer'),
(19, 5, 1, 'Mail merge', 'Computer'),
(20, 5, 0, ' Form letters', 'Computer'),
(21, 6, 0, '.exe', 'Computer'),
(22, 6, 1, '.doc', 'Computer'),
(23, 6, 0, '.png', 'Computer'),
(24, 6, 0, '.jpeg', 'Computer'),
(25, 7, 1, 'Text wrapping', 'Computer'),
(26, 7, 0, 'Indent', 'Computer'),
(27, 7, 0, 'Clipart', 'Computer'),
(28, 7, 0, 'Line spacing', 'Computer'),
(29, 8, 0, 'Home panel', 'Computer'),
(30, 8, 0, 'Ribbon', 'Computer'),
(31, 8, 1, 'View option toolbar', 'Computer'),
(32, 8, 0, 'Title bar', 'Computer'),
(33, 9, 1, 'Calibri', 'Computer'),
(34, 9, 0, 'vrinda', 'Computer'),
(35, 9, 0, 'Times New Roman', 'Computer'),
(36, 9, 0, 'Cambria', 'Computer'),
(37, 10, 1, 'Page Border', 'Computer'),
(38, 10, 0, 'Margins', 'Computer'),
(39, 10, 0, 'Orientation', 'Computer'),
(40, 10, 0, 'Line Numbers', 'Computer'),
(41, 11, 0, 'Computer understands only C Language', 'Computer'),
(42, 11, 0, 'Computer understands only Assembly Language', 'Computer'),
(43, 11, 1, 'Computer understands only Binary Language', 'Computer'),
(44, 11, 0, 'Computer understands only BASIC', 'Computer'),
(45, 12, 0, 'Output Unit', 'Computer'),
(46, 12, 1, 'Input Unit', 'Computer'),
(47, 12, 0, 'Memory Unit', 'Computer'),
(48, 12, 0, 'Arithmetic & Logic Unit', 'Computer'),
(49, 13, 0, 'Commonly Occupied Machines Used in Technical and Educational Research', 'Computer'),
(50, 13, 0, 'Commonly Operated Machines Purposely Used in Technical and Environmental Research', 'Computer'),
(51, 13, 0, 'Commonly Oriented Machines Used in Technical and Educational Research', 'Computer'),
(52, 13, 1, 'Common Operating Machine Purposely Used for Technological and Educational Research', 'Computer'),
(53, 14, 0, 'View menu', 'Computer'),
(54, 14, 0, 'Insert Menu', 'Computer'),
(55, 14, 1, 'File Menu', 'Computer'),
(56, 14, 0, 'None of these', 'Computer'),
(57, 15, 1, 'Hardware', 'Computer'),
(58, 15, 0, 'Software', 'Computer'),
(59, 15, 0, 'System Software', 'Computer'),
(60, 15, 0, 'Package', 'Computer'),
(61, 16, 0, 'James Gosling', 'Computer'),
(62, 16, 1, 'Charles Babbage', 'Computer'),
(63, 16, 0, 'Dennis Ritchie', 'Computer'),
(64, 16, 0, 'Bjarne Stroustrup', 'Computer'),
(65, 17, 1, 'Aling To The Center', 'Computer'),
(66, 17, 0, 'Aling To The Right Side', 'Computer'),
(67, 17, 0, 'Cut', 'Computer'),
(68, 17, 0, 'None of These', 'Computer'),
(69, 18, 0, 'Find The Image', 'Computer'),
(70, 18, 0, 'Find The Color', 'Computer'),
(71, 18, 0, ' Cut', 'Computer'),
(72, 18, 1, ' Find The Text', 'Computer'),
(73, 19, 0, ' F1', 'Computer'),
(74, 19, 0, 'F5', 'Computer'),
(75, 19, 1, ' F7', 'Computer'),
(76, 19, 0, ' F12', 'Computer'),
(77, 20, 0, ' CDs and DVDs', 'Computer'),
(78, 20, 0, ' Primary and Secondary', 'Computer'),
(79, 20, 1, ' RAM and ROM', 'Computer'),
(80, 20, 0, ' External Memory', 'Computer'),
(81, 21, 1, 'Spreadsheet', 'Computer'),
(82, 21, 0, 'Database Management', 'Computer'),
(83, 21, 0, 'Presentation', 'Computer'),
(84, 21, 0, 'Workbook', 'Computer'),
(85, 22, 0, '48,10,576', 'Computer'),
(86, 22, 1, '10,48,576', 'Computer'),
(87, 22, 0, '1,57,648', 'Computer'),
(88, 22, 0, '1,63, 84', 'Computer'),
(89, 23, 1, ' 1, 2, 3,...', 'Computer'),
(90, 23, 0, ' A, B, C,...', 'Computer'),
(91, 23, 0, 'A1, B1, C1, ....', 'Computer'),
(92, 23, 0, ' I, II, III,...', 'Computer'),
(93, 24, 0, 'Arithmetic', 'Computer'),
(94, 24, 0, 'Conditional', 'Computer'),
(95, 24, 1, 'Logical', 'Computer'),
(96, 24, 0, 'Greater', 'Computer'),
(97, 25, 0, '=IF (logical_test, TRUE([value_if_true]), FALSE([value_if_false]))', 'Computer'),
(98, 25, 1, '=IF (logical_test, [value_if_true], [value_if_false])', 'Computer'),
(99, 25, 0, '=IF (logical_test, {[value_if_true]}, {[value_if_false]})', 'Computer'),
(100, 25, 0, '=IF (logical_test: [value_if_true] , [value_if_false])', 'Computer'),
(101, 26, 1, 'Counts cells as specified', 'Computer'),
(102, 26, 0, 'Counts blank cells in a range', 'Computer'),
(103, 26, 0, 'Counts cells with numbers in a range', 'Computer'),
(104, 26, 0, 'Returns values based on a TRUE or FALSE condition', 'Computer'),
(105, 27, 0, '/', 'Computer'),
(106, 27, 0, 'f', 'Computer'),
(107, 27, 1, '=', 'Computer'),
(108, 27, 0, '?', 'Computer'),
(109, 28, 1, 'Ctrl+K', 'Computer'),
(110, 28, 0, 'Ctrl+H', 'Computer'),
(111, 28, 0, 'Ctrl+J', 'Computer'),
(112, 28, 0, 'Ctrl+F', 'Computer'),
(113, 29, 0, 'Ctrl+B', 'Computer'),
(114, 29, 0, 'Ctrl+I', 'Computer'),
(115, 29, 0, 'Ctrl+O', 'Computer'),
(116, 29, 1, 'Ctrl+N', 'Computer'),
(117, 30, 0, 'Data management', 'Computer'),
(118, 30, 0, 'Accounting', 'Computer'),
(119, 30, 0, 'Programming', 'Computer'),
(120, 30, 1, 'All Of Above', 'Computer'),
(121, 31, 1, '400%', 'Computer'),
(122, 31, 0, '300%', 'Computer'),
(123, 31, 0, '200%', 'Computer'),
(124, 31, 0, '100%', 'Computer'),
(125, 32, 0, 'Ctrl + F', 'Computer'),
(126, 32, 0, 'Ctrl + O', 'Computer'),
(127, 32, 1, ' Ctrl + M', 'Computer'),
(128, 32, 0, 'Ctrl + N', 'Computer'),
(129, 33, 0, 'Picture', 'Computer'),
(130, 33, 0, 'Gradient', 'Computer'),
(131, 33, 0, 'Texture', 'Computer'),
(132, 33, 1, 'All of the above', 'Computer'),
(133, 34, 0, 'Ms- Word', 'Computer'),
(134, 34, 0, 'Ms- Excel', 'Computer'),
(135, 34, 0, 'Ms- Access', 'Computer'),
(136, 34, 0, 'Ms - Power point', 'Computer'),
(137, 35, 0, 'Transition tab', 'Computer'),
(138, 35, 1, 'Design Tab', 'Computer'),
(139, 35, 0, 'Insert Tab', 'Computer'),
(140, 35, 0, 'Animation Tab', 'Computer'),
(141, 36, 1, 'F5', 'Computer'),
(142, 36, 0, 'F11', 'Computer'),
(143, 36, 0, 'F7', 'Computer'),
(144, 36, 0, 'shift+ F5', 'Computer'),
(145, 37, 1, 'Exretreme animation', 'Computer'),
(146, 37, 0, 'Slide show', 'Computer'),
(147, 37, 0, 'Slide sorter', 'Computer'),
(148, 37, 0, 'Normal', 'Computer'),
(149, 38, 0, 'COMMA', 'Computer'),
(150, 38, 0, 'HYPEN', 'Computer'),
(151, 38, 1, 'ESC', 'Computer'),
(152, 38, 0, 'TAB', 'Computer'),
(153, 39, 0, 'Comment Box', 'Computer'),
(154, 39, 0, 'Text Layer', 'Computer'),
(155, 39, 0, 'Note Box', 'Computer'),
(156, 39, 1, 'Text Box', 'Computer'),
(157, 40, 0, 'View', 'Computer'),
(158, 40, 1, 'Insert', 'Computer'),
(159, 40, 0, 'Edit', 'Computer'),
(160, 40, 0, 'File', 'Computer'),
(162, 41, 0, 'Ctrl+M', 'Computer'),
(163, 41, 0, 'Ctrl+B', 'Computer'),
(164, 41, 0, 'Ctrl+J', 'Computer'),
(165, 41, 1, 'Ctrl+N', 'Computer'),
(166, 42, 0, '3', 'Computer'),
(167, 42, 0, '4', 'Computer'),
(168, 42, 1, '5', 'Computer'),
(169, 42, 0, '6', 'Computer'),
(170, 43, 1, 'Artificial Intelligence ', 'Computer'),
(171, 43, 0, 'Programming Intelligence ', 'Computer'),
(172, 43, 0, 'System Knowledge ', 'Computer'),
(173, 43, 0, 'None Of These ', 'Computer'),
(174, 44, 0, 'Microsoft Word ', 'Computer'),
(175, 44, 0, 'Microsoft Excel ', 'Computer'),
(176, 44, 1, 'Microsoft Windows ', 'Computer'),
(177, 44, 0, 'Microsoft Access ', 'Computer'),
(178, 45, 0, 'Mainframe', 'Computer'),
(179, 45, 1, 'Super computer ', 'Computer'),
(180, 45, 0, 'Micro Computer ', 'Computer'),
(181, 45, 0, 'None of These', 'Computer'),
(182, 46, 0, 'Keyboard', 'Computer'),
(183, 46, 0, 'Mouse', 'Computer'),
(184, 46, 1, 'Speaker ', 'Computer'),
(185, 46, 0, 'Scanner ', 'Computer'),
(186, 47, 0, 'SUM', 'Computer'),
(187, 47, 0, 'MIN', 'Computer'),
(188, 47, 1, 'SUBTRACT', 'Computer'),
(189, 47, 0, 'MAX', 'Computer'),
(190, 48, 0, 'Powerpoint', 'Computer'),
(191, 48, 0, 'PowerPoint', 'Computer'),
(192, 48, 0, 'Pwrpoint', 'Computer'),
(193, 48, 1, 'Powerpnt', 'Computer'),
(198, 49, 1, 'TRUE', 'Computer'),
(199, 49, 0, 'FALSE', 'Computer'),
(200, 49, 0, 'Cant Say', 'Computer'),
(201, 49, 0, 'May Be', 'Computer'),
(202, 50, 0, ' Computer Processing Unit', 'Computer'),
(203, 50, 0, ' Central Peripheral Unit', 'Computer'),
(204, 50, 1, ' Central Processing Unit', 'Computer'),
(205, 50, 0, ' Computer Processing User', 'Computer'),
(206, 51, 0, 'Steve Jobs', 'C'),
(207, 51, 0, 'James Gosling', 'C'),
(208, 51, 1, 'Dennis Ritchie', 'C'),
(209, 51, 0, 'Rasmus Lerdorf', 'C'),
(210, 52, 0, 'int number;', 'C'),
(211, 52, 0, 'float rate;', 'C'),
(212, 52, 0, 'int variable_count;', 'C'),
(213, 52, 1, 'int $main;', 'C'),
(214, 53, 1, 'LowerCase letters', 'C'),
(215, 53, 0, 'UpperCase letters', 'C'),
(216, 53, 0, 'CamelCase letters', 'C'),
(217, 53, 0, 'None of the mentioned', 'C'),
(218, 54, 0, '-3.4e38 to 3.4e38', 'C'),
(219, 54, 1, '-32767 to 32768', 'C'),
(220, 54, 0, '-32668 to 32667', 'C'),
(221, 54, 0, '-32768 to 32767', 'C'),
(222, 55, 1, '19 82', 'C'),
(223, 55, 0, 'Compilation Error', 'C'),
(224, 55, 0, '82 19', 'C'),
(225, 55, 0, 'None of the above', 'C'),
(226, 56, 0, '2', 'C'),
(227, 56, 0, '3', 'C'),
(228, 56, 0, '4', 'C'),
(229, 56, 1, '5', 'C'),
(230, 57, 0, 'Greater', 'C'),
(231, 57, 0, 'Equal', 'C'),
(232, 57, 1, 'Lesser', 'C'),
(233, 57, 0, 'None of the above', 'C'),
(234, 58, 1, '5 3', 'C'),
(235, 58, 0, '5 5', 'C'),
(236, 58, 0, '3 3', 'C'),
(237, 58, 0, '3 5', 'C'),
(238, 59, 0, '&&', 'C'),
(239, 59, 0, '!', 'C'),
(240, 59, 1, '|', 'C'),
(241, 59, 0, '||', 'C'),
(242, 60, 0, 'Equality Compairsion ( == )', 'C'),
(243, 60, 0, 'Assignment ( = )', 'C'),
(244, 60, 1, 'Both of the above', 'C'),
(245, 60, 0, 'None of the above', 'C'),
(246, 61, 1, 'The size of a variable in bytes.', 'C'),
(247, 61, 0, 'The address of a variable.', 'C'),
(248, 61, 0, 'The value of a variable.', 'C'),
(249, 61, 0, 'The type of a variable.', 'C'),
(250, 62, 0, 'close()', 'C'),
(251, 62, 0, 'file_close()', 'C'),
(252, 62, 1, 'fclose()', 'C'),
(253, 62, 0, 'endfile()', 'C'),
(254, 63, 0, '2', 'C'),
(255, 63, 0, 'None', 'C'),
(256, 63, 0, '1 2 3 None', 'C'),
(257, 63, 1, '2 3 None', 'C'),
(258, 64, 0, 'Hello', 'C'),
(259, 64, 0, '5', 'C'),
(260, 64, 1, 'Hello 5', 'C'),
(261, 64, 0, '0', 'C'),
(262, 65, 0, '2', 'C'),
(263, 65, 0, '15', 'C'),
(264, 65, 0, '18', 'C'),
(265, 65, 1, '16', 'C'),
(266, 66, 0, '4', 'C'),
(267, 66, 1, '8', 'C'),
(268, 66, 0, '12', 'C'),
(269, 66, 0, '16', 'C'),
(270, 67, 0, 'No Data Hiding.', 'C'),
(271, 67, 1, 'Functions are allowed inside structs.', 'C'),
(272, 67, 0, 'Constructors are not allowed inside structs.', 'C'),
(273, 67, 0, 'Cannot have static members in the structs body.', 'C'),
(274, 68, 0, 'for', 'C'),
(275, 68, 0, 'while', 'C'),
(276, 68, 0, 'do-while', 'C'),
(277, 68, 1, 'all of the mentioned', 'C'),
(278, 69, 0, 'Inclusion directive', 'C'),
(279, 69, 1, 'Preprocessor directive', 'C'),
(280, 69, 0, 'File inclusion directive', 'C'),
(281, 69, 0, 'None of the mentioned', 'C'),
(282, 70, 1, '1 Byte', 'C'),
(283, 70, 0, '2 Byte', 'C'),
(284, 70, 0, '1 bit', 'C'),
(285, 70, 1, '8 bit', 'C'),
(286, 71, 0, '1', 'C'),
(287, 71, 0, '4', 'C'),
(288, 71, 0, '20', 'C'),
(289, 71, 1, '10', 'C'),
(290, 72, 0, 'Hello, World', 'C'),
(291, 72, 0, 'ol, World!', 'C'),
(292, 72, 1, 'World!', 'C'),
(293, 72, 0, 'ello, World!', 'C'),
(294, 73, 0, '9', 'C'),
(295, 73, 0, '10', 'C'),
(296, 73, 0, '11', 'C'),
(297, 73, 1, '12', 'C'),
(298, 74, 0, '10', 'C'),
(299, 74, 1, '20', 'C'),
(300, 74, 0, '30', 'C'),
(301, 74, 0, 'Error', 'C'),
(302, 75, 0, 'It is used to declare arrays.', 'C'),
(303, 75, 1, 'It is used to group together variables of different data types.', 'C'),
(304, 75, 0, 'It is used to create linked lists.', 'C'),
(305, 75, 0, 'It is used to define constant values.', 'C'),
(306, 76, 1, 'malloc()', 'C'),
(307, 76, 0, 'printf()', 'C'),
(308, 76, 0, 'strcpy()', 'C'),
(309, 76, 0, 'sin()', 'C'),
(310, 77, 1, '&', 'C'),
(311, 77, 0, '*', 'C'),
(312, 77, 0, '@', 'C'),
(313, 77, 0, '#', 'C'),
(314, 78, 0, 'It is used for iteration.', 'C'),
(315, 78, 0, 'It is used for decision-making.', 'C'),
(316, 78, 1, 'It ensures that a block of code is executed at least once.', 'C'),
(317, 78, 0, 'It is used to break out of a loop.', 'C'),
(318, 79, 0, '023 23', 'C'),
(319, 79, 1, '19 23', 'C'),
(320, 79, 0, '23 23', 'C'),
(321, 79, 0, '23 19', 'C'),
(322, 80, 0, '12', 'C'),
(323, 80, 0, '24', 'C'),
(324, 80, 0, '18', 'C'),
(325, 80, 1, '20', 'C'),
(326, 81, 1, 'Hello Hello ', 'C'),
(327, 81, 0, 'Hello', 'C'),
(328, 81, 0, 'compilation Error', 'C'),
(329, 81, 0, 'None of the above', 'C'),
(330, 82, 1, '3 2 1 0 1 2 3', 'C'),
(331, 82, 0, '3 2 1 0', 'C'),
(332, 82, 0, '0 1 2 3', 'C'),
(333, 82, 0, 'None of the above', 'C'),
(334, 83, 0, 'It converts a string to uppercase.', 'C'),
(335, 83, 0, 'It compares two strings.', 'C'),
(336, 83, 1, 'It concatenates two strings.', 'C'),
(337, 83, 0, 'It calculates the string length.', 'C'),
(338, 84, 1, '|', 'C'),
(339, 84, 0, '|&', 'C'),
(340, 84, 0, '|*', 'C'),
(341, 84, 0, '||', 'C'),
(342, 85, 0, 'It makes the variable global.', 'C'),
(343, 85, 0, 'It allocates memory on the heap.', 'C'),
(344, 85, 1, 'It preserves the variable?s value between function calls.', 'C'),
(345, 85, 0, 'It initializes the variable to zero.', 'C'),
(346, 86, 0, 'char', 'C'),
(347, 86, 0, 'int', 'C'),
(348, 86, 0, 'long', 'C'),
(349, 86, 1, 'double', 'C'),
(350, 87, 1, 'In while loop 2', 'C'),
(351, 87, 0, 'In while loop in while loop 2', 'C'),
(352, 87, 0, 'In while loop 3', 'C'),
(353, 87, 0, 'Infinite loop', 'C'),
(354, 88, 0, '1', 'C'),
(355, 88, 0, '2', 'C'),
(356, 88, 0, '3', 'C'),
(357, 88, 1, '4', 'C'),
(358, 89, 0, '3.75', 'C'),
(359, 89, 0, 'Depends on compiler', 'C'),
(360, 89, 1, '24', 'C'),
(361, 89, 0, '3', 'C'),
(362, 90, 0, 'It will cause a compile-time error', 'C'),
(363, 90, 1, 'It will run without any error and prints 3', 'C'),
(364, 90, 0, 'It will cause a run-time error', 'C'),
(365, 90, 0, 'It will experience infinite looping', 'C'),
(366, 91, 1, 'void', 'C'),
(367, 91, 0, 'null', 'C'),
(368, 91, 0, 'free', 'C'),
(369, 91, 0, 'empty', 'C'),
(370, 92, 0, 'myfriend', 'C'),
(371, 92, 0, 'classfriend', 'C'),
(372, 92, 1, 'friend', 'C'),
(373, 92, 0, 'firend', 'C'),
(374, 93, 0, 'a class that has four forms', 'C'),
(375, 93, 0, 'a class that has two forms', 'C'),
(376, 93, 0, 'a class that has only a single form', 'C'),
(377, 93, 1, 'a class that has many forms', 'C'),
(378, 94, 0, 'queue', 'C'),
(379, 94, 1, 'set', 'C'),
(380, 94, 0, 'heap', 'C'),
(381, 94, 0, 'multimap', 'C'),
(382, 95, 0, 'Hi', 'C'),
(383, 95, 1, 'Bye', 'C'),
(384, 95, 0, 'HiBye', 'C'),
(385, 95, 0, 'Compilation Error', 'C'),
(386, 96, 0, '11', 'C'),
(387, 96, 1, '10', 'C'),
(388, 96, 0, 'Error', 'C'),
(389, 96, 0, '0', 'C'),
(390, 97, 0, 'Error', 'C'),
(391, 97, 1, '5 Times', 'C'),
(392, 97, 0, '4 Times', 'C'),
(393, 97, 0, '6 Times', 'C'),
(394, 98, 1, '10', 'C'),
(395, 98, 0, '11', 'C'),
(396, 98, 0, '12', 'C'),
(397, 98, 0, '13', 'C'),
(398, 99, 1, 'Yes', 'C'),
(399, 99, 0, 'No', 'C'),
(400, 99, 0, 'Compilation Error', 'C'),
(401, 99, 0, 'Runtime Error', 'C'),
(402, 100, 0, '+', 'C'),
(403, 100, 0, '-', 'C'),
(404, 100, 0, '*', 'C'),
(405, 100, 1, '::', 'C'),
(406, 101, 0, '+', 'C'),
(407, 101, 0, '-', 'C'),
(408, 101, 1, '++', 'C'),
(409, 101, 0, '*', 'C'),
(410, 102, 1, 'for(initialization;condition; increment/decrement)', 'C'),
(411, 102, 0, 'for(increment/decrement; initialization; condition)', 'C'),
(412, 102, 0, 'for(initialization, condition, increment/decrement', 'C'),
(413, 102, 0, 'None of These', 'C'),
(414, 103, 0, '111111', 'C'),
(415, 103, 1, '111011', 'C'),
(416, 103, 0, '101011', 'C'),
(417, 103, 0, '101010', 'C'),
(418, 104, 0, 'One', 'C'),
(419, 104, 0, 'Compilation Error', 'C'),
(420, 104, 0, 'Default', 'C'),
(421, 104, 1, 'OneTwoThreeDefault', 'C'),
(422, 105, 0, 'Compilation Error', 'C'),
(423, 105, 0, '0', 'C'),
(424, 105, 1, '-3', 'C'),
(425, 105, 0, '3', 'C'),
(426, 106, 0, 'FiveSix', 'C'),
(427, 106, 1, 'Five', 'C'),
(428, 106, 0, 'Six', 'C'),
(429, 106, 0, 'None of the above', 'C'),
(430, 107, 0, 'A class with abstract keyword.', 'C'),
(431, 107, 0, 'A class with no functions in it.', 'C'),
(432, 107, 1, 'A class with atleast one pure virtual function.', 'C'),
(433, 107, 0, 'Empty Class.', 'C'),
(434, 108, 1, 'Yes', 'C'),
(435, 108, 0, 'No', 'C'),
(436, 108, 0, 'Compilation Error', 'C'),
(437, 108, 0, 'None of the above', 'C'),
(438, 109, 0, 'Storing data in arrays', 'C'),
(439, 109, 0, 'The process of inheritance', 'C'),
(440, 109, 1, 'Combining data and methods', 'C'),
(441, 109, 0, 'A type of loop', 'C'),
(442, 110, 0, 'Encapsulation', 'C'),
(443, 110, 0, 'Abstraction', 'C'),
(444, 110, 0, 'Inheritance', 'C'),
(445, 110, 1, 'Polymorphism', 'C'),
(446, 111, 0, 'blue', 'C'),
(447, 111, 0, 'Compilation Error', 'C'),
(448, 111, 1, '2', 'C'),
(449, 111, 0, '1', 'C'),
(450, 112, 1, '4', 'C'),
(451, 112, 0, '3', 'C'),
(452, 112, 0, '2', 'C'),
(453, 112, 0, '1', 'C'),
(454, 113, 0, '9876543210', 'C'),
(455, 113, 0, '987654321', 'C'),
(456, 113, 1, '0', 'C'),
(457, 113, 0, '9', 'C'),
(458, 114, 0, 'The programs runs with no output', 'C'),
(459, 114, 1, '77', 'C'),
(460, 114, 0, 'Hello!', 'C'),
(461, 114, 0, 'Hello!', 'C'),
(462, 115, 0, 'g++ -o <filename>', 'C'),
(463, 115, 1, 'g++ -c <filename>', 'C'),
(464, 115, 0, 'g++ <filename>', 'C'),
(465, 115, 0, 'g++ -f <filename>', 'C'),
(466, 116, 0, 'static function', 'C'),
(467, 116, 0, 'utility function', 'C'),
(468, 116, 1, 'constructor', 'C'),
(469, 116, 0, 'destructor', 'C'),
(470, 117, 1, 'Static function', 'C'),
(471, 117, 0, 'constructor', 'C'),
(472, 117, 0, 'destructor', 'C'),
(473, 117, 0, 'friend', 'C'),
(474, 118, 0, 'Polymorphism', 'C'),
(475, 118, 1, 'Inheritance', 'C'),
(476, 118, 0, 'Function overloading', 'C'),
(477, 118, 0, 'None of these', 'C'),
(478, 119, 0, 'Equal', 'C'),
(479, 119, 0, 'EqualEqual', 'C'),
(480, 119, 0, 'EqualNotEqual', 'C'),
(481, 119, 1, 'NotEqual', 'C'),
(482, 120, 0, '1', 'C'),
(483, 120, 0, '2', 'C'),
(484, 120, 1, '3', 'C'),
(485, 120, 0, '4', 'C'),
(486, 121, 1, '28', 'Tally'),
(487, 121, 0, '30', 'Tally'),
(488, 121, 0, '15', 'Tally'),
(489, 121, 0, '11', 'Tally'),
(490, 122, 0, ' Vedika  softwares ', 'Tally'),
(491, 122, 0, ' Peutronics ', 'Tally'),
(492, 122, 0, 'Coral softwares ', 'Tally'),
(493, 122, 1, ' Tally softwares', 'Tally'),
(494, 123, 1, '1st  April of any Year', 'Tally'),
(495, 123, 0, ' 31st March of any year', 'Tally'),
(496, 123, 0, 'All of them are true ', 'Tally'),
(497, 123, 0, 'None of these', 'Tally'),
(498, 124, 0, 'Select Company ', 'Tally'),
(499, 124, 0, ' Shut Company', 'Tally'),
(500, 124, 1, ' Alter', 'Tally'),
(501, 124, 0, 'Create company', 'Tally'),
(502, 125, 0, ' Reports', 'Tally'),
(503, 125, 0, ' Import ', 'Tally'),
(504, 125, 1, ' Masters', 'Tally'),
(505, 125, 0, 'Transactions', 'Tally'),
(506, 126, 0, 'Voucher ', 'Tally'),
(507, 126, 1, ' Accounting voucher ', 'Tally'),
(508, 126, 0, ' Accounts info ', 'Tally'),
(509, 126, 0, 'None Of these ', 'Tally'),
(510, 127, 0, 'Indirect Incomes ', 'Tally'),
(511, 127, 1, 'Indirect Expenses ', 'Tally'),
(512, 127, 0, ' direct Incomes ', 'Tally'),
(513, 127, 0, ' direct Incomes  ', 'Tally'),
(514, 128, 0, 'System software', 'Tally'),
(515, 128, 0, ' Utility software', 'Tally'),
(516, 128, 1, ' Application software', 'Tally'),
(517, 128, 0, ' Operating software', 'Tally'),
(518, 129, 0, 'Cash', 'Tally'),
(519, 129, 0, 'Profit &Loss A/c', 'Tally'),
(520, 129, 0, 'CapitalA/c', 'Tally'),
(521, 129, 1, ' A And B Both', 'Tally'),
(522, 130, 0, 'Receipt ', 'Tally'),
(523, 130, 1, 'contra ', 'Tally'),
(524, 130, 0, ' Payment ', 'Tally'),
(525, 130, 0, ' post- Dated ', 'Tally'),
(526, 131, 0, 'contra', 'Tally'),
(527, 131, 0, 'Journal ', 'Tally'),
(528, 131, 0, 'Receipt ', 'Tally'),
(529, 131, 1, ' Payment', 'Tally'),
(530, 132, 0, 'Purchase ', 'Tally'),
(531, 132, 1, 'Journal ', 'Tally'),
(532, 132, 0, 'Receipt ', 'Tally'),
(533, 132, 0, ' Payment', 'Tally'),
(534, 133, 1, 'Assets =Liabilities + Capital ', 'Tally'),
(535, 133, 0, 'Liabilities =Assets +Capital ', 'Tally'),
(536, 133, 0, 'Capital= Assets +Liabilites ', 'Tally'),
(537, 133, 0, ' All of these ', 'Tally'),
(538, 134, 0, '3', 'Tally'),
(539, 134, 0, '2', 'Tally'),
(540, 134, 0, '4', 'Tally'),
(541, 134, 1, '5', 'Tally'),
(542, 135, 0, 'Gateway of Tally >Reports > Trail Balance', 'Tally'),
(543, 135, 0, ' Gateway of Tally > Trail Balance', 'Tally'),
(544, 135, 1, ' Gateway of Tally > Display more reports> Trail Balance', 'Tally'),
(545, 135, 0, ' None of these ', 'Tally'),
(546, 136, 0, ' Company Information', 'Tally'),
(547, 136, 1, ' Company Features', 'Tally'),
(548, 136, 0, ' Accounting Vouchers', 'Tally'),
(549, 136, 0, ' Inventory Vouchers', 'Tally'),
(550, 137, 1, 'Main Location', 'Tally'),
(551, 137, 0, 'A or C', 'Tally'),
(552, 137, 0, 'Primary', 'Tally'),
(553, 137, 0, 'None of these', 'Tally'),
(554, 138, 0, ' Cash Account', 'Tally'),
(555, 138, 0, ' Bank Account', 'Tally'),
(556, 138, 1, ' Sundry Creditors', 'Tally'),
(557, 138, 0, ' Sundry Debtors', 'Tally'),
(558, 139, 0, ' Inventory Info', 'Tally'),
(559, 139, 0, ' Reports Menu', 'Tally'),
(560, 139, 0, ' Gateway of Tally', 'Tally'),
(561, 139, 1, ' Display', 'Tally'),
(562, 140, 0, ' Enterprise Resolution Planning', 'Tally'),
(563, 140, 1, ' Enterprise Resource Planning', 'Tally'),
(564, 140, 0, ' Entry Resource Planning', 'Tally'),
(565, 140, 0, ' Exclusive Resource Planning', 'Tally'),
(566, 141, 0, ' To open the calculator panel', 'Tally'),
(567, 141, 0, ' To copy text', 'Tally'),
(568, 141, 1, ' To create a ledger while in a voucher entry screen', 'Tally'),
(569, 141, 0, ' To cancel a transaction', 'Tally'),
(570, 142, 0, ' F1', 'Tally'),
(571, 142, 0, ' F2', 'Tally'),
(572, 142, 1, ' F11', 'Tally'),
(573, 142, 0, ' F12', 'Tally'),
(574, 143, 0, ' Cash', 'Tally'),
(575, 143, 0, ' Bank', 'Tally'),
(576, 143, 0, ' Sales', 'Tally'),
(577, 143, 1, ' Profit & Loss Account', 'Tally'),
(578, 144, 1, ' Current Assets', 'Tally'),
(579, 144, 0, ' Current Liabilities', 'Tally'),
(580, 144, 0, ' Fixed Assets', 'Tally'),
(581, 144, 0, ' Indirect Expenses', 'Tally'),
(582, 145, 0, ' Debit Purchases ?10,000; Credit Cash ?10,000', 'Tally'),
(583, 145, 1, ' Debit Purchases ?10,000; Credit Creditor ?10,000', 'Tally'),
(584, 145, 0, ' Debit Purchases ?10,000; Credit Sales ?10,000', 'Tally'),
(585, 145, 0, ' Debit Creditor ?10,000; Credit Purchases ?10,000', 'Tally'),
(586, 146, 1, ' Debit Furniture Account; Credit Creditor Account', 'Tally'),
(587, 146, 0, ' Debit Cash Account; Credit Furniture Account', 'Tally'),
(588, 146, 0, ' Debit Furniture Account; Credit Bank Account', 'Tally'),
(589, 146, 0, ' Debit Bank Account; Credit Furniture Account', 'Tally'),
(590, 147, 0, ' Payment Voucher', 'Tally'),
(591, 147, 0, ' Credit Note Voucher', 'Tally'),
(592, 147, 1, ' Debit Note Voucher', 'Tally'),
(593, 147, 0, ' Journal Voucher', 'Tally'),
(594, 148, 0, ' Ctrl + F9', 'Tally'),
(595, 148, 0, ' Ctrl + F6', 'Tally'),
(596, 148, 0, ' Ctrl + F5', 'Tally'),
(597, 148, 1, ' Ctrl + F8', 'Tally'),
(598, 149, 0, ' Cash Deposit in Bank', 'Tally'),
(599, 149, 0, ' Cash Withdrawal from Bank', 'Tally'),
(600, 149, 0, ' Transfer from Bank to Bank', 'Tally'),
(601, 149, 1, ' Credit Sale', 'Tally'),
(602, 150, 0, ' Balance Sheet', 'Tally'),
(603, 150, 0, ' Profit & Loss Account', 'Tally'),
(604, 150, 1, ' Database Management', 'Tally'),
(605, 150, 0, ' Inventory Management', 'Tally'),
(606, 151, 0, ' Changes company data', 'Tally'),
(607, 151, 1, ' Changes Tally configuration settings', 'Tally'),
(608, 151, 0, ' Creates a new ledger', 'Tally'),
(609, 151, 0, ' Opens accounting reports', 'Tally'),
(610, 152, 1, ' Alt + F2', 'Tally'),
(611, 152, 0, ' Ctrl + D', 'Tally'),
(612, 152, 0, ' Alt + D', 'Tally'),
(613, 152, 0, ' Ctrl + F2', 'Tally'),
(614, 153, 0, ' Receipt Voucher', 'Tally'),
(615, 153, 0, ' Contra Voucher', 'Tally'),
(616, 153, 0, ' Journal Voucher', 'Tally'),
(617, 153, 1, ' Payment Voucher', 'Tally'),
(618, 154, 0, ' Accounts Books', 'Tally'),
(619, 154, 1, 'Inventory Books', 'Tally'),
(620, 154, 0, ' Statutory Books', 'Tally'),
(621, 154, 0, 'Display', 'Tally'),
(622, 155, 1, ' Company Info > Alter', 'Tally'),
(623, 155, 0, 'Company Info > Alter Company', 'Tally'),
(624, 155, 0, ' Gateway of Tally > Modify Company', 'Tally'),
(625, 155, 0, 'None of these', 'Tally'),
(626, 156, 1, ' Cash Account', 'Tally'),
(627, 156, 0, ' Capital Account', 'Tally'),
(628, 156, 0, ' Sales Account', 'Tally'),
(629, 156, 0, ' Interest Account', 'Tally'),
(630, 157, 0, ' Cash Account', 'Tally'),
(631, 157, 0, ' Bank Account', 'Tally'),
(632, 157, 1, ' Sundry Creditors', 'Tally'),
(633, 157, 0, ' Sundry Debtors', 'Tally'),
(634, 158, 0, ' Inventory Management', 'Tally'),
(635, 158, 0, ' Payroll Management', 'Tally'),
(636, 158, 1, ' Web Designing', 'Tally'),
(637, 158, 0, ' Statutory Compliance', 'Tally'),
(638, 159, 0, ' Shift + Del', 'Tally'),
(639, 159, 1, ' Alt + D', 'Tally'),
(640, 159, 0, ' Ctrl + D', 'Tally'),
(641, 159, 0, ' alter', 'Tally'),
(642, 160, 0, ' Symbol', 'Tally'),
(643, 160, 1, 'Primary', 'Tally'),
(644, 160, 0, 'Stock', 'Tally'),
(645, 160, 0, 'Main Location', 'Tally'),
(646, 161, 0, ' Customer Relations', 'Tally'),
(647, 161, 1, ' Inventory Levels', 'Tally'),
(648, 161, 0, ' Employee Scheduling', 'Tally'),
(649, 161, 0, ' Project Management', 'Tally'),
(650, 162, 1, 'F7', 'Tally'),
(651, 162, 0, 'F5', 'Tally'),
(652, 162, 0, 'F8', 'Tally'),
(653, 162, 0, 'F9', 'Tally'),
(654, 163, 0, ' .xls', 'Tally'),
(655, 163, 0, ' .doc', 'Tally'),
(656, 163, 0, ' .tally', 'Tally'),
(657, 163, 1, ' .tsf', 'Tally'),
(658, 164, 0, 'Alt +F1', 'Tally'),
(659, 164, 0, 'Alt +F9', 'Tally'),
(660, 164, 0, 'Alt +F2', 'Tally'),
(661, 164, 1, 'Alt +F3', 'Tally'),
(662, 165, 0, ' Voucher Entry', 'Tally'),
(663, 165, 0, ' Invoice Customization', 'Tally'),
(664, 165, 1, ' Print Configuration', 'Tally'),
(665, 165, 0, ' Payment Gateway', 'Tally'),
(666, 166, 0, ' Complex navigation', 'Tally'),
(667, 166, 0, ' Graphical interface', 'Tally'),
(668, 166, 0, ' Extensive help and documentation', 'Tally'),
(669, 166, 1, ' Both B and C', 'Tally'),
(670, 167, 0, ' To track user purchases', 'Tally'),
(671, 167, 1, ' To define user roles and permissions', 'Tally'),
(672, 167, 0, ' To monitor employee performance', 'Tally'),
(673, 167, 0, ' To create user profiles for marketing', 'Tally'),
(674, 168, 0, 'Account Books', 'Tally'),
(675, 168, 0, 'Cash and fund flow', 'Tally'),
(676, 168, 0, 'Inventory Books?', 'Tally'),
(677, 168, 1, 'Statement Of Account ', 'Tally'),
(678, 169, 0, 'Receipt Vaucher', 'Tally'),
(679, 169, 0, 'Contra Vaucher ', 'Tally'),
(680, 169, 0, 'Payment vaucher ', 'Tally'),
(681, 169, 1, ' All of the above ', 'Tally'),
(682, 170, 0, 'Debit Note', 'Tally'),
(683, 170, 0, 'Receipt Note', 'Tally'),
(684, 170, 1, 'Rejection Out', 'Tally'),
(685, 170, 0, ' Rejection In', 'Tally'),
(686, 171, 0, 'Word Editor', 'Coreldraw'),
(687, 171, 1, 'Vector Graphic Editor', 'Coreldraw'),
(688, 171, 0, 'Oprating System ', 'Coreldraw'),
(689, 171, 0, 'Non of Above', 'Coreldraw'),
(690, 172, 0, 'A computer\'s memory is the minimum capacity required by Corel DRAW.', 'Coreldraw'),
(691, 172, 0, 'Installing it over many machines will be easy, and it will be independent of the operating system.', 'Coreldraw'),
(692, 172, 0, 'Any system that is as fast and dexterous as Linux or Windows is acceptable.', 'Coreldraw'),
(693, 172, 1, ' All of the above', 'Coreldraw'),
(694, 173, 0, 'The Document Palette', 'Coreldraw'),
(695, 173, 0, ' The Color Style Palette', 'Coreldraw'),
(696, 173, 0, 'The Object Properties Container', 'Coreldraw'),
(697, 173, 1, ' All of the above', 'Coreldraw'),
(698, 174, 0, 'Paragraph Text', 'Coreldraw'),
(699, 174, 0, 'Artistic Media', 'Coreldraw'),
(700, 174, 1, 'Both A and B', 'Coreldraw'),
(701, 174, 0, 'None of the above', 'Coreldraw'),
(702, 175, 0, 'Tables', 'Coreldraw'),
(703, 175, 0, ' Bitmaps', 'Coreldraw'),
(704, 175, 1, ' Lenses', 'Coreldraw'),
(705, 175, 0, 'Objects', 'Coreldraw'),
(706, 176, 0, 'JEPG', 'Coreldraw'),
(707, 176, 0, 'PNG', 'Coreldraw'),
(708, 176, 0, 'GIF', 'Coreldraw'),
(709, 176, 1, 'All of the above', 'Coreldraw'),
(710, 177, 0, ' Outline Trace', 'Coreldraw'),
(711, 177, 0, ' Centreline Trace', 'Coreldraw'),
(712, 177, 1, 'Both A and B', 'Coreldraw'),
(713, 177, 0, 'None of the above', 'Coreldraw'),
(714, 178, 0, 'Pen Tool', 'Coreldraw'),
(715, 178, 0, ' Freehand Tool', 'Coreldraw'),
(716, 178, 1, ' B-Spline Tool', 'Coreldraw'),
(717, 178, 0, ' 2-Point Line Tool', 'Coreldraw'),
(718, 179, 0, 'JPEG', 'Coreldraw'),
(719, 179, 1, ' PNG', 'Coreldraw'),
(720, 179, 0, ' BMP', 'Coreldraw'),
(721, 179, 0, 'TIFF', 'Coreldraw'),
(722, 180, 1, 'True ', 'Coreldraw'),
(723, 180, 0, 'FALSE', 'Coreldraw'),
(724, 180, 0, '_', 'Coreldraw'),
(725, 180, 0, 'None of These', 'Coreldraw'),
(726, 181, 1, '2', 'Coreldraw'),
(727, 181, 0, '1', 'Coreldraw'),
(728, 181, 0, '4', 'Coreldraw'),
(729, 181, 0, '3', 'Coreldraw'),
(730, 182, 0, 'Java ', 'Coreldraw'),
(731, 182, 0, 'Python ', 'Coreldraw'),
(732, 182, 1, 'C++ & C#', 'Coreldraw'),
(733, 182, 0, 'Angular ', 'Coreldraw'),
(734, 183, 1, 'F11', 'Coreldraw'),
(735, 183, 0, 'F6', 'Coreldraw'),
(736, 183, 0, 'F10', 'Coreldraw'),
(737, 183, 0, 'F8', 'Coreldraw'),
(738, 184, 0, 'File', 'Coreldraw'),
(739, 184, 0, 'Import', 'Coreldraw'),
(740, 184, 1, 'Export', 'Coreldraw'),
(741, 184, 0, 'Text ', 'Coreldraw'),
(742, 185, 1, 'Latter ', 'Coreldraw'),
(743, 185, 0, 'A4', 'Coreldraw'),
(744, 185, 0, 'Legal ', 'Coreldraw'),
(745, 185, 0, 'Postcard', 'Coreldraw'),
(746, 186, 0, 'It has a line', 'Coreldraw'),
(747, 186, 1, ' It can be filled', 'Coreldraw'),
(748, 186, 0, 'It has nodes', 'Coreldraw'),
(749, 186, 0, 'It has a shape', 'Coreldraw'),
(750, 187, 0, 'Selection Tool', 'Coreldraw'),
(751, 187, 0, 'Curve tool', 'Coreldraw'),
(752, 187, 0, 'Direct Selection Tool', 'Coreldraw'),
(753, 187, 1, 'Shape tool', 'Coreldraw'),
(754, 188, 0, 'Freehand Tool', 'Coreldraw'),
(755, 188, 0, 'Shape tool', 'Coreldraw'),
(756, 188, 1, 'Pick tool', 'Coreldraw'),
(757, 188, 0, 'Bezier Tool', 'Coreldraw'),
(758, 189, 0, 'TRUE', 'Coreldraw'),
(759, 189, 1, 'FALSE', 'Coreldraw'),
(760, 189, 0, 'None of these', 'Coreldraw'),
(761, 189, 0, '_', 'Coreldraw'),
(762, 190, 0, 'pencil', 'Coreldraw'),
(763, 190, 1, 'Eyedropper', 'Coreldraw'),
(764, 190, 0, 'Bezier', 'Coreldraw'),
(765, 190, 0, 'Freehand', 'Coreldraw'),
(766, 191, 0, 'None of these', 'Coreldraw'),
(767, 191, 0, 'Remove Overlapping Segments in Objects', 'Coreldraw'),
(768, 191, 1, 'Removes the area outside a selection', 'Coreldraw'),
(769, 191, 0, 'Slice objects into two separate parts', 'Coreldraw'),
(770, 192, 0, 'Bitmap', 'Coreldraw'),
(771, 192, 1, 'Scalar', 'Coreldraw'),
(772, 192, 0, 'Vector', 'Coreldraw'),
(773, 192, 0, 'Photo paint', 'Coreldraw'),
(774, 193, 0, 'Vectors', 'Coreldraw'),
(775, 193, 0, 'Particles', 'Coreldraw'),
(776, 193, 1, 'Pixels', 'Coreldraw'),
(777, 193, 0, 'Lines', 'Coreldraw'),
(778, 194, 0, 'For book design', 'Coreldraw'),
(779, 194, 0, 'Setting of margin', 'Coreldraw'),
(780, 194, 0, 'Dividing your work', 'Coreldraw'),
(781, 194, 1, 'All of the above', 'Coreldraw'),
(782, 195, 1, 'Careldrw', 'Coreldraw'),
(783, 195, 0, 'Coraldrw', 'Coreldraw'),
(784, 195, 0, 'Coraldwr', 'Coreldraw'),
(785, 195, 0, 'Careldrw', 'Coreldraw'),
(786, 196, 0, 'Text Tool', 'Coreldraw'),
(787, 196, 0, 'Shape Tool', 'Coreldraw'),
(788, 196, 0, 'Pick Tool', 'Coreldraw'),
(789, 196, 1, 'Move Tool', 'Coreldraw'),
(790, 197, 0, 'Ctrl + W', 'Coreldraw'),
(791, 197, 0, 'Ctrl + C', 'Coreldraw'),
(792, 197, 0, 'Alt + F2', 'Coreldraw'),
(793, 197, 1, 'Alt + F4', 'Coreldraw'),
(794, 198, 0, 'T', 'Coreldraw'),
(795, 198, 0, 'A', 'Coreldraw'),
(796, 198, 1, 'I', 'Coreldraw'),
(797, 198, 0, 'R', 'Coreldraw'),
(798, 199, 1, 'Reapply the last undone action', 'Coreldraw'),
(799, 199, 0, 'Insert New Page', 'Coreldraw'),
(800, 199, 0, 'None of These', 'Coreldraw'),
(801, 199, 0, 'Cancel the Previous action', 'Coreldraw'),
(802, 200, 0, 'TRUE', 'Coreldraw'),
(803, 200, 1, 'FALSE', 'Coreldraw'),
(804, 200, 0, 'None of these', 'Coreldraw'),
(805, 200, 0, '_', 'Coreldraw'),
(806, 201, 0, 'D', 'Coreldraw'),
(807, 201, 0, 'T', 'Coreldraw'),
(808, 201, 0, 'W', 'Coreldraw'),
(809, 201, 1, 'M', 'Coreldraw'),
(810, 202, 0, 'RGB', 'Coreldraw'),
(811, 202, 1, 'LZW', 'Coreldraw'),
(812, 202, 0, 'HSV', 'Coreldraw'),
(813, 202, 0, 'CMYK', 'Coreldraw'),
(814, 203, 0, 'Use the  Ellipse Tool While Holding Down the Alt Key ', 'Coreldraw'),
(815, 203, 1, 'Use the  Ellipse Tool While Holding Down the Shift Key ', 'Coreldraw'),
(816, 203, 0, 'Use the  Ellipse Tool While Holding Down the Ctrl Key ', 'Coreldraw'),
(817, 203, 0, 'Use the  Ellipse Tool While Holding Down the Spacebar', 'Coreldraw'),
(818, 204, 0, 'Shape Tool ', 'Coreldraw'),
(819, 204, 1, 'Power Clip ', 'Coreldraw'),
(820, 204, 0, 'Crop Tool ', 'Coreldraw'),
(821, 204, 0, 'Freehand Tool ', 'Coreldraw'),
(822, 205, 1, 'Ctrl + G', 'Coreldraw'),
(823, 205, 0, ' Ctrl + U', 'Coreldraw'),
(824, 205, 0, 'Ctrl + C', 'Coreldraw'),
(825, 205, 0, ' Ctrl + D', 'Coreldraw'),
(826, 206, 0, 'File', 'Coreldraw'),
(827, 206, 1, 'Arrange', 'Coreldraw'),
(828, 206, 0, 'Tools', 'Coreldraw'),
(829, 206, 0, 'View', 'Coreldraw'),
(830, 207, 0, 'Opens a file', 'Coreldraw'),
(831, 207, 1, 'Zoom in (by dragging an area)', 'Coreldraw'),
(832, 207, 0, 'Group objects', 'Coreldraw'),
(833, 207, 0, ' Select text', 'Coreldraw'),
(834, 208, 0, 'Weld', 'Coreldraw'),
(835, 208, 1, ' Order', 'Coreldraw'),
(836, 208, 0, 'Align', 'Coreldraw'),
(837, 208, 0, ' Combine', 'Coreldraw'),
(838, 209, 0, 'To group objects', 'Coreldraw'),
(839, 209, 1, 'To convert text or shapes into editable curves', 'Coreldraw'),
(840, 209, 0, 'To change color', 'Coreldraw'),
(841, 209, 0, ' To zoom object', 'Coreldraw'),
(842, 210, 0, 'File', 'Coreldraw'),
(843, 210, 0, ' Edit', 'Coreldraw'),
(844, 210, 1, ' View', 'Coreldraw'),
(845, 210, 0, ' Layout', 'Coreldraw'),
(846, 211, 1, 'Break Curve Apart', 'Coreldraw'),
(847, 211, 0, ' Ungroup', 'Coreldraw'),
(848, 211, 0, ' Separate', 'Coreldraw'),
(849, 211, 0, 'Divide', 'Coreldraw'),
(850, 212, 1, 'Interactive Fill Tool', 'Coreldraw'),
(851, 212, 0, ' Eyedropper Tool', 'Coreldraw'),
(852, 212, 0, 'Outline Tool', 'Coreldraw'),
(853, 212, 0, ' Transparency Tool', 'Coreldraw'),
(854, 213, 0, 'F6', 'Coreldraw'),
(855, 213, 1, ' F11', 'Coreldraw'),
(856, 213, 0, 'Ctrl + P', 'Coreldraw'),
(857, 213, 0, ' Ctrl + C', 'Coreldraw'),
(858, 214, 1, 'RGB and CMYK', 'Coreldraw'),
(859, 214, 0, ' HSL and HSV', 'Coreldraw'),
(860, 214, 0, ' Pantone and CMY', 'Coreldraw'),
(861, 214, 0, ' XYZ and YUV', 'Coreldraw'),
(862, 215, 0, 'At the top', 'Coreldraw'),
(863, 215, 0, ' At the bottom', 'Coreldraw'),
(864, 215, 0, ' At the left', 'Coreldraw'),
(865, 215, 1, 'At the right', 'Coreldraw'),
(866, 216, 0, 'White', 'Coreldraw'),
(867, 216, 0, ' Transparent', 'Coreldraw'),
(868, 216, 1, 'X icon in the color palette', 'Coreldraw'),
(869, 216, 0, ' Eraser tool', 'Coreldraw'),
(870, 217, 1, '.cdr', 'Coreldraw'),
(871, 217, 0, '.cdrw', 'Coreldraw'),
(872, 217, 0, ' .cdw', 'Coreldraw'),
(873, 217, 0, '.corel', 'Coreldraw'),
(874, 218, 0, '.jpg', 'Coreldraw'),
(875, 218, 1, '.docx', 'Coreldraw'),
(876, 218, 0, ' .png', 'Coreldraw'),
(877, 218, 0, ' .svg', 'Coreldraw'),
(878, 219, 0, 'Page Background', 'Coreldraw'),
(879, 219, 1, ' Page Setup', 'Coreldraw'),
(880, 219, 0, ' Orientation Tool', 'Coreldraw'),
(881, 219, 0, 'Page Numbering', 'Coreldraw'),
(882, 220, 0, 'File', 'Coreldraw'),
(883, 220, 1, 'Layout', 'Coreldraw'),
(884, 220, 0, 'Tools', 'Coreldraw'),
(885, 220, 0, 'Window', 'Coreldraw');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question_number` varchar(10) NOT NULL,
  `question_text` varchar(200) NOT NULL,
  `sub` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_number`, `question_text`, `sub`) VALUES
(1, '1', 'Microsoft word is ____ software.?', 'Computer'),
(2, '2', 'Which is not in MS Word?', 'Computer'),
(3, '3', 'Which is not an edition of MS Word?', 'Computer'),
(4, '4', 'What is the blank space outside the printing area on a page?', 'Computer'),
(5, '5', 'The ability to combine name and addresses with a standard document is called ________', 'Computer'),
(6, '6', 'The valid format of MS Word is ___?.', 'Computer'),
(7, '7', '_____ is the change the way text warps around the selected object.', 'Computer'),
(8, '8', 'In the _____ we can change the view of the document and set the zoom option.', 'Computer'),
(9, '9', 'What is thw default font of a Microsoft word 2007 Document.', 'Computer'),
(10, '10', 'Which Option is not available in the page setup group of page layout tab ', 'Computer'),
(11, '11', 'Which of the following language does the computer understand?', 'Computer'),
(12, '12', 'Which of the following unit is responsible for converting the data received from the user into a computer understandable format?', 'Computer'),
(13, '13', 'Which of the following is the correct abbreviation of COMPUTER?', 'Computer'),
(14, '14', 'What menu is selected to print ?', 'Computer'),
(15, '15', 'Which of the following are physical devices of a computer?', 'Computer'),
(16, '16', 'Who is the father of Computers?', 'Computer'),
(17, '17', 'It is done by CTRL+E .', 'Computer'),
(18, '18', 'It is done by CTRL+F .', 'Computer'),
(19, '19', 'Which of the following is a shortcut key for \"spelling and Grammar ?  ', 'Computer'),
(20, '20', 'Two Kinds of Main Memory are ?', 'Computer'),
(21, '21', 'What is MS Excel?', 'Computer'),
(22, '22', 'What is the row limit of MS Excel 2019? ', 'Computer'),
(23, '23', 'In Microsoft Excel spreadsheets, rows are designated as _______?', 'Computer'),
(24, '24', 'The Greater Than sign (>) exemplifies a/an _____ operator.', 'Computer'),
(25, '25', '____ is the correct syntax of IF() Function. ', 'Computer'),
(26, '26', 'Why is the =COUNTIF function in Excel used? ', 'Computer'),
(27, '27', 'What do Excel formulas start with? ', 'Computer'),
(28, '28', 'How to Open the Insert hyperlink dialog box? ', 'Computer'),
(29, '29', 'What is shortcut key to open an existing workbook?', 'Computer'),
(30, '30', 'What is Excel used for?', 'Computer'),
(31, '31', 'What is the Max Zoom percentage in MS PowerPoint?', 'Computer'),
(32, '32', 'In the current presentation, if we want to insert a new slide, we can choose which of these?', 'Computer'),
(33, '33', 'Which of the following fill effects can be used to fill the background of the slide?', 'Computer'),
(34, '34', 'Slides Are prepared in ?', 'Computer'),
(35, '35', 'In power point, Themes could befound Under- ', 'Computer'),
(36, '36', 'In Ms powerpoint ,key used to run the slide show from the beginning is -', 'Computer'),
(37, '37', 'Which type of view is not present in MS-PowerPoint? ', 'Computer'),
(38, '38', 'Which of the Following Sortcut keys is used to end a Powerpoint Persentation? ', 'Computer'),
(39, '39', 'What do we use if we want to add texts in a given slide?', 'Computer'),
(40, '40', 'From which of these menus can we access a Text Box, Picture, Chart etc.?', 'Computer'),
(41, '41', 'which of the following shortcut key to open new Blank Document in ms word ? ', 'Computer'),
(42, '42', 'In how many generation a computer can be classified ?', 'Computer'),
(43, '43', 'Fifth genration computer are based on ? ', 'Computer'),
(44, '44', 'Which one of the Following is an example of oprating system ? ', 'Computer'),
(45, '45', 'Which of the following is the powerful type of the computer ?', 'Computer'),
(46, '46', 'Which one is not an input device?', 'Computer'),
(47, '47', '____ is not a function in Excel.', 'Computer'),
(48, '48', 'What we have to type in the Run dialog box to open Powerpoint?', 'Computer'),
(49, '49', 'In PowerPoint, is it allowed to make a PDF of the powerpoint presentation?', 'Computer'),
(50, '50', 'What does CPU stand for?', 'Computer'),
(51, '51', 'Who invented c programming language?', 'C'),
(52, '52', 'Which of the following is not a valid C variable name?', 'C'),
(53, '53', 'All keywords in C are in ____________', 'C'),
(54, '54', 'What is the 16-bit compiler allowable range for integer constants?', 'C'),
(55, '55', '#include <stdio.h>\nstruct School {\n    int age, rollNo;\n};\nvoid solve() {\n    struct School sc;\n    sc.age = 19;\n    sc.rollNo = 82;\n    printf(\"%d %d\", sc.age, sc.rollNo);\n}\nint main() {\n    solve();', 'C'),
(56, '56', '#include <stdio.h>\nvoid solve() {\n    int x = 2;\n    printf(\"%d\", (x << 1) + (x >> 1));\n}\nint main() {\n    solve();\n	return 0;\n}', 'C'),
(57, '57', '#include <stdio.h>\nvoid solve() {\n    int x = 1, y = 2;\n    printf(x > y ? \"Greater\" : x == y ? \"Equal\" : \"Lesser\");\n}\nint main() {\n    solve();\n	return 0;\n}', 'C'),
(58, '58', '#include <stdio.h>\nint main() {\n	int a = 3, b = 5;\n	int t = a;\n	a = b;\n	b = t;\n	printf(\"%d %d\", a, b);\n	return 0;\n}', 'C'),
(59, '59', 'Which of the following is not a logical operator?', 'C'),
(60, '60', 'Which of the following operators can be applied on structure variables?', 'C'),
(61, '61', 'What does the `sizeof` operator in C return?', 'C'),
(62, '62', 'In C, which function is used to close a file?', 'C'),
(63, '63', '#include <stdio.h>\nvoid solve() {\n    int ch = 2;\n    switch(ch) {\n        case 1: printf(\"1 \");\n        case 2: printf(\"2 \");\n        case 3: printf(\"3 \");\n        default: printf(\"None\");\n    }\n}\nin', 'C'),
(64, '64', '#include <stdio.h>\nvoid solve() {\n    int x = printf(\"Hello\");\n    printf(\" %d\", x);\n}\nint main() {\n	solve();\n	return 0;\n}', 'C'),
(65, '65', 'int main() {\n	int sum = 2 + 4 / 2 + 6 * 2;\n	printf(\"%d\", sum);\n	return 0;\n}', 'C'),
(66, '66', '#include <stdio.h>\nunion School {\n    int age, rollNo;\n    double marks;\n};\nvoid solve() {\n    union School sc;\n    sc.age = 19;\n    sc.rollNo = 82;\n    sc.marks = 19.04;\n    printf(\"%d\", (int)sizeof(', 'C'),
(67, '67', ' Which of the following is not true about structs in C?', 'C'),
(68, '68', ' What is an example of iteration in C?', 'C'),
(69, '69', 'What is #include <stdio.h>?', 'C'),
(70, '70', 'What is the sizeof(char) in a 32-bit C compiler?', 'C'),
(71, '71', '#include <stdio.h>\nint main() {\n	int a[] = {1, 2, 3, 4};\n	int sum = 0;\n	for(int i = 0; i < 4; i++) {\n	    sum += a[i];\n	}\n	printf(\"%d\", sum);\n	return 0;\n}', 'C'),
(72, '72', '#include <stdio.h>\nint main() {\n	 char str[] = \"Hello, World!\";\n\n    printf(\"%s\", str + 7);\n\n    return 0;\n}\n', 'C'),
(73, '73', '#include <stdio.h>\nint main() {\n	  int x = 5;\n\n    int y = (x++) + (++x);\n\n    printf(\"%d\", y);\n\n    return 0;\n}', 'C'),
(74, '74', '#include <stdio.h>\nint main() {\n	   int a = 10, b = 20, c;\n\n    c = a > b ? a : b;\n\n    printf(\"%d\", c);\n\n    return 0;\n}', 'C'),
(75, '75', 'What is the purpose of the `union` data type in C?', 'C'),
(76, '76', 'Which of the following standard C library functions is used for memory allocation and deallocation?', 'C'),
(77, '77', 'which operator is used to access the address of a variable?', 'C'),
(78, '78', 'What is the purpose of the `do?while` loop in C?', 'C'),
(79, '79', '#include <stdio.h>\nvoid solve() {\n    printf(\"%d %d\", (023), (23));\n}\nint main() {\n    solve();\n	return 0;\n}\n', 'C'),
(80, '80', '#include <stdio.h>\nvoid solve() {\n    int a = 3;\n    int res = a++ + ++a + a++ + ++a;\n    printf(\"%d\", res);\n}\nint main() {\n	solve();\n	return 0;\n}', 'C'),
(81, '81', '#include <stdio.h>\n#include<string.h>\nvoid solve() {\n    char s[] = \"Hello\";\n    printf(\"%s \", s);\n    char t[40];\n    strcpy(t, s);\n    printf(\"%s\", t);\n}\nint main() {\n    solve();\n	return 0;\n}', 'C'),
(82, '82', '#include <stdio.h>\nvoid solve(int x) {\n    if(x == 0) {\n        printf(\"%d \", x);\n        return;\n    }\n    printf(\"%d \", x);\n    solve(x - 1);\n    printf(\"%d \", x);\n}\nint main() {\n    solve(3);\n	retu', 'C'),
(83, '83', 'What is the purpose of the strcat function in C?', 'C'),
(84, '84', ' which operator is used for bitwise OR?', 'C'),
(85, '85', 'What is the purpose of the `static` keyword when applied to a local variable in C?', 'C'),
(86, '86', ' Which of the following data types in C has the highest storage size?', 'C'),
(87, '87', '#include <stdio.h>\nint main()\n{\nint i = 0;\ndo\n{\ni++;\nif(i == 2)\ncontinue;\nprintf(\"In while loop \");\n}\nwhile (i < 2);\nprintf(\"%d\\n\", i);\n}', 'C'),
(88, '88', '#include <stdio.h>\nint main()\n{\nint i = 0;\nwhile (i < 3)\ni++;\nprintf(\"In while loop\\n\");\n}', 'C'),
(89, '89', '#include <stdio.h>\nvoid main()\n{\nint x = 5 * 9 / 3 + 9;\nprintf(\"%d\\n\", x);\n}', 'C'),
(90, '90', '#include <stdio.h>\nint main()\n{\nint main = 3;\nprintf(\"%d\", main);\nreturn 0;\n}', 'C'),
(91, '91', 'Which of these won?t return any value?', 'C'),
(92, '92', 'Which of these keywords do we use for the declaration of the friend function?', 'C'),
(93, '93', 'What does polymorphism stand for?', 'C'),
(94, '94', 'Which container is the best for keeping a collection of various distinct elements?', 'C'),
(95, '95', '#include <iostream>\n\nint main()\n{\n if(0)\n {\n    std::cout<<\"Hi\";\n }\n else\n {\n    std::cout<<\"Bye\";\n }\nreturn 0;\n}', 'C'),
(96, '96', '#include<iostream>\n\nint main()\n{\nint a=10; \nstd::cout<<a++;\nreturn 0;\n}', 'C'),
(97, '97', '#include<iostream>\n\nint main()\n{\n    int i=0;\n    lbl:\n    std::cout<<\"CppBuzz.com\";\n    i++;\n    if(i<5)\n    {\n	goto lbl;\n    }\n\n    return 0;\n\n}', 'C'),
(98, '98', '#include <iostream>\nusing namespace std;\n\nint main()\n{\nint a = 10;\ncout<<a++;\nreturn 0;\n}', 'C'),
(99, '99', 'Can a for loop contain another for loop?', 'C'),
(100, '100', 'Which operator can not be overloaded in C++?', 'C'),
(101, '101', 'Which operator has highest precedence in below list in C++?', 'C'),
(102, '102', 'What is correct syntax of a for loop in C++?', 'C'),
(103, '103', 'int main()\n{\n  int a=10;\n  int b,c;\n  b = a++;\n  c = a;\n  std::cout<<a<<b<<c;\n  return 0;\n}', 'C'),
(104, '104', '#include<iostream>\nint main()\n{\n    int a = 1;\n    switch(a)\n    {\n    case 1: std::cout<<\"One\";\n    case 2: std::cout<<\"Two\";\n    case 3: std::cout<<\"Three\";\n    default: std::cout<<\"Default\";\n    }\n', 'C'),
(105, '105', '#include<iostream>\n\nint main()\n{\n\nstd::cout<<-1-1-1;\n\nreturn 0;\n}', 'C'),
(106, '106', '#include <iostream>\nusing namespace std;\n\nint main() \n{\nint x = 5;\n\nif(x++ == 5)\ncout<<\"Five\"<<endl;\nelse\nif(++x == 6)\ncout<<\"Six\"<<endl;\n\nreturn 0;\n}', 'C'),
(107, '107', 'What is abstract class?', 'C'),
(108, '108', 'Can a Structure contain pointer to itself?', 'C'),
(109, '109', 'In OOP, what does encapsulation refer to?', 'C'),
(110, '110', 'Which concept in OOP allows for the same function to be used in different ways based on the object it is associated with?', 'C'),
(111, '111', '#include<iostream>\nenum color\n{\n	black=1,\n	blue,\n	red	\n};\nint main()\n{\n    color obj = blue;\n    std::cout<<obj;\n	return 0;\n}', 'C'),
(112, '112', '#include<iostream>\nusing namespace std;\nenum color{\n	black,\n	blue,\n	red	\n};\nint main()\n{    \n    color obj;\n    cout<<sizeof(obj);\n    return 0;\n}  ', 'C'),
(113, '113', '#include<iostream>\nusing namespace std;\n\nint main()\n{\n int x = 9;\n while (x>0)\n x--;\n cout<<x;\n\nreturn 0;\n}', 'C'),
(114, '114', '#include <iostream>\nusing namespace std;\nclass TestingClass\n{\npublic:\nTestingClass(int x)\n{\n cout << x << endl; \n}\n\nTestingClass()\n{\n cout <<\"Hello!\"<< endl; \n}\n\n};\nint main()\n{\n TestingClass test(77)', 'C'),
(115, '115', 'Which is the correct command used to compile source code (.cpp files) into object code(.o files)?', 'C'),
(116, '116', 'Which member function of a class is called automatically when any object is created of that class?', 'C'),
(117, '117', 'What type of function is not a member of a class, but has access to the private members of the class.', 'C'),
(118, '118', 'Which of following allows us to create new classes based on existing classes.', 'C'),
(119, '119', '#include<iostream>\n#include<string.h>\nusing namespace std;\n\nint main()\n{\n    char one[]=\"one\";\n    char two[]=\"two\";\n    \n    if(one==two){\n        cout<<\"Equal\";\n    }\n    \n    if(strcmp(one, two)==0', 'C'),
(120, '120', '#include <iostream>\n\nusing namespace std;\n\nint main()\n\n {\n\n    int arr[5] = {1, 2, 3, 4, 5};\n\n    int *ptr = arr;\n\n    cout << *(ptr + 2) << endl;\n\n    return 0;\n\n}', 'C'),
(121, '121', '  How Many Groups Are Pre -Defined in Tally ?', 'Tally'),
(122, '122', ' Tally package is developed by ?', 'Tally'),
(123, '123', ' In General the Financial Year From shall be from?', 'Tally'),
(124, '124', ' Which option is used in Tally to make changes in created company ?', 'Tally'),
(125, '125', ' Which menu is used to create new ledger , group  and voucher types in Tally?', 'Tally'),
(126, '126', '  which Submenu is used for voucher entry in tally ?', 'Tally'),
(127, '127', '  Salary Account Comes Under Which Head ?', 'Tally'),
(128, '128', 'Tally is an example of which type of software?', 'Tally'),
(129, '129', '  Which ledger is created by Tally Automatically as soon as we create a new company ?', 'Tally'),
(130, '130', '  20,000 withdrawn from State Bank . In Which Voucher type this transation will be recorded ?', 'Tally'),
(131, '131', '  Where do we record transactions of salary, rent or interest paid ?', 'Tally'),
(132, '132', ' Where do we record credit purchase of furniture in tally?', 'Tally'),
(133, '133', ' Which of the following equation is true for balance sheet ?', 'Tally'),
(134, '134', ' How Many Options Related to company features are there in \"F11: Freatures\" in tally ', 'Tally'),
(135, '135', ' Which option is used to view trial balance from gateway of Tally ?', 'Tally'),
(136, '136', ' What does ?F11? key stand for in Tally?', 'Tally'),
(137, '137', 'Default \'Godown\' name in tally is?', 'Tally'),
(138, '138', ' In Tally, which ledger is created under the group \"Current Liabilities\"?', 'Tally'),
(139, '139', ' Which menu in Tally allows you to view reports such as balance sheets and profit & loss statements?', 'Tally'),
(140, '140', ' What is the full form of ERP in Tally ERP 9?', 'Tally'),
(141, '141', ' In Tally, what is the use of \"Alt + C\"?', 'Tally'),
(142, '142', ' In Tally, where do you configure payroll features?', 'Tally'),
(143, '143', ' Which of the following ledgers cannot be deleted in Tally?', 'Tally'),
(144, '144', ' In Tally, which type of ledger is \"Sundry Debtors\"?', 'Tally'),
(145, '145', ' If a company purchases goods worth ?10,000 on credit, what would the journal entry be?', 'Tally'),
(146, '146', ' In Tally, what is the correct journal entry to record the purchase of furniture on credit?', 'Tally'),
(147, '147', ' Which voucher is used to record the return of goods to a supplier in Tally?', 'Tally'),
(148, '148', ' Which shortcut key is used to record a Credit Note Voucher in Tally?', 'Tally'),
(149, '149', ' Which of the following is not recorded in a Contra Voucher?', 'Tally'),
(150, '150', ' Which of the following is NOT a component of Tally?', 'Tally'),
(151, '151', ' In Tally, what does the \"F12: Configure\" option do?', 'Tally'),
(152, '152', ' Which shortcut key is used to change the date in Tally?', 'Tally'),
(153, '153', ' Which voucher is used to record personal drawings (owner withdrawing money for personal use) from the business?', 'Tally'),
(154, '154', ' Which Option is user to view to stock Group and Stock Summery ', 'Tally'),
(155, '155', ' We can Modify an exsiting company from ?', 'Tally'),
(156, '156', ' In Tally, which of the following is considered a real account?', 'Tally'),
(157, '157', ' In Tally, which ledger is created under the group \"Current Liabilities\"?', 'Tally'),
(158, '158', ' Which of the following is not a feature of Tally ?', 'Tally'),
(159, '159', ' Which of the following keys is used to Delete in ledger ?', 'Tally'),
(160, '160', 'Which of the following is the Predefined  stock category in Tally?', 'Tally'),
(161, '161', ' Which of the following can be managed using Tally?', 'Tally'),
(162, '162', 'What  shortcut key is journal Vaucher ?', 'Tally'),
(163, '163', ' What is the primary file extension used for Tally data files ?', 'Tally'),
(164, '164', 'The Short key of company creation ?', 'Tally'),
(165, '165', ' Which feature in Tally allows you to define custom invoice formats?', 'Tally'),
(166, '166', ' Which characteristic of Tally allows it to be user-friendly ?', 'Tally'),
(167, '167', ' What does Tally?s \'User Management\' feature allow ?', 'Tally'),
(168, '168', ' We can get the report of Interest From ?', 'Tally'),
(169, '169', ' Single entry mode Applicable for ?', 'Tally'),
(170, '170', ' Goods Returning to a Creditor after challan but before bill we need to pass?', 'Tally'),
(171, '171', ' What is Corel draw ?', 'Coreldraw'),
(172, '172', 'Which of the following is are the advantage(s) of Coreldraw Graphics?', 'Coreldraw'),
(173, '173', 'A number of color style controls are available in CorelDRAW____ the Object style container and the Color styles container.', 'Coreldraw'),
(174, '174', 'Which of the following is are the text object type(s)?', 'Coreldraw'),
(175, '175', 'An object\'s attributes and properties are not modified by ____but by how an area of it is represented.', 'Coreldraw'),
(176, '176', 'Which of the file format  can be exported in CorelDRAW?', 'Coreldraw'),
(177, '177', 'Which of the following techniques is \nare available in CorelDRAW to trace a bitmap?', 'Coreldraw'),
(178, '178', 'Which tool allows you to draw freehand lines and automatically smooth out the curves in CorelDRAW?', 'Coreldraw'),
(179, '179', 'Which format is suitable for saving bitmap images with transparent backgrounds in CorelDRAW?', 'Coreldraw'),
(180, '180', 'C aligns centers of selected objects vertically.', 'Coreldraw'),
(181, '181', 'What number of paper orientation do we have in Corel Draw?', 'Coreldraw'),
(182, '182', 'Corel Draw was Wrriten in _______', 'Coreldraw'),
(183, '183', 'What is the Shortcut key to fountain fills For the object  ?', 'Coreldraw'),
(184, '184', 'Which of the following submenu Convert the .CDR file for .JPG format ?', 'Coreldraw'),
(185, '185', 'What is Default Paper size in corel Drow ?', 'Coreldraw'),
(186, '186', 'The object is closed and can be known by?', 'Coreldraw'),
(187, '187', 'Which of the following Tool is used for editing Nodes or curve object?', 'Coreldraw'),
(188, '188', '______is used for selecting and deselecting objects.', 'Coreldraw'),
(189, '189', 'Can we increase sides of polygon by pressing up arrow key in CorelDraw?', 'Coreldraw'),
(190, '190', 'Which Tool in not a basic drawing tool in a 2d Image program ?', 'Coreldraw'),
(191, '191', 'Crop Tool helps in.', 'Coreldraw'),
(192, '192', 'CorelDraw is a ____________ based drawing Application Package.', 'Coreldraw'),
(193, '193', 'Bitmap images are made up of ____________.', 'Coreldraw'),
(194, '194', 'The ruler bar is used for _____________', 'Coreldraw'),
(195, '195', 'Corel Run Command?', 'Coreldraw'),
(196, '196', 'None of Corel Tool ?', 'Coreldraw'),
(197, '197', 'What is the Shortcut Key for Exit in CorelDraw ?', 'Coreldraw'),
(198, '198', 'Artistic Media Shortcut ?', 'Coreldraw'),
(199, '199', 'What is the Use of the Redo Tool in CorelDraw ?', 'Coreldraw'),
(200, '200', 'F3 the shortcut key to zoom in on all objects in the drawing.', 'Coreldraw'),
(201, '201', 'Which shortcut key to use text Modify .', 'Coreldraw'),
(202, '202', 'what is Not a color Model used on 2D and 3D Images ?', 'Coreldraw'),
(203, '203', 'How do You create a Perfect Circle in Corel DRAW?', 'Coreldraw'),
(204, '204', 'Which Coreldraw Tool lets you place an object inside another object\'s Shape ?', 'Coreldraw'),
(205, '205', 'In CorelDRAW which shortcut key is used to group selected objects?', 'Coreldraw'),
(206, '206', 'Which menu is used to align objects in CorelDRAW?', 'Coreldraw'),
(207, '207', 'What does pressing F2 do in CorelDRAW?', 'Coreldraw'),
(208, '208', 'Which of the following options lets you place an object in front of or behind other objects?', 'Coreldraw'),
(209, '209', 'What is the use of the Convert to Curves (Ctrl + Q) command?', 'Coreldraw'),
(210, '210', 'Which menu contains Zoom options?', 'Coreldraw'),
(211, '211', 'Which command is used to break apart combined objects?', 'Coreldraw'),
(212, '212', 'Which tool is used to apply a gradient (fountain) fill in an object?', 'Coreldraw'),
(213, '213', 'What is the shortcut key to open the Color Palette in CorelDRAW?', 'Coreldraw'),
(214, '214', 'Which color models are commonly used in CorelDRAW?', 'Coreldraw'),
(215, '215', 'The default color palettes in CorelDRAW is placed:', 'Coreldraw'),
(216, '216', 'Which of the following is used to apply no fill color to an object?', 'Coreldraw'),
(217, '217', 'What is the default file extension of a CorelDRAW file?', 'Coreldraw'),
(218, '218', 'Which of the following file formats cannot be imported into CorelDRAW?', 'Coreldraw'),
(219, '219', 'Which command is used to set the orientation of the page in CorelDRAW ?', 'Coreldraw'),
(220, '220', 'You can create multiple pages in CorelDRAW from which menu?', 'Coreldraw');

-- --------------------------------------------------------

--
-- Table structure for table `registered_user`
--

CREATE TABLE `registered_user` (
  `id` int(10) NOT NULL,
  `fname` text DEFAULT NULL,
  `lname` text DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_user`
--

INSERT INTO `registered_user` (`id`, `fname`, `lname`, `username`, `password`) VALUES
(2, 'sonia', 'singh', 'ss730439@gmail.com', 'sonia123'),
(3, 'Arnav', 'Mandal', 'Arnavmandal@', 'Arnavmandal@'),
(4, 'shiva', 'divaker', 'udayveer2@gmail.com', 'shiva@1234'),
(108, 'Alok', 'raj', 'alokraj', 'alok123'),
(109, 'Vishakha', 'Saini', 'VishakhaSaini', 'Vishakha@123'),
(111, 'Akshit', 'Kestwal', 'akshit@gmail.com', 'akshit@gmail.com'),
(112, 'Akshit', 'Kestwal', 'Akshit kestwal', 'Akshit kestwal'),
(113, 'Muskan ', '', 'singhmuskan7387@gmail.com', 'singhmuskan'),
(115, 'Muskan ', 'Prajapati', 'Muskan Prajapati ', 'muskan@123'),
(116, 'Supriya', 'Mall', 'Supriya Mall', 'supriya@123'),
(117, 'Amy', 'Christabell', '', ''),
(118, 'Amy', 'Christabell', 'amychristabell4451@gmail.com', 'amy@123'),
(119, 'Muskan ', 'Prajapati', 'riteshprajapati89000@gmail.com', 'muskan@123'),
(120, 'Asmita ', 'rawat', 'Asmita rawat', 'Asmita123'),
(121, 'Alok', 'Raj', 'alokraj', 'alokraj'),
(122, 'Aanchal', '', '', ''),
(123, 'Aanchal', '', '', ''),
(124, 'Aanchal', '', 'Aanchal', 'anchal@123'),
(125, 'Saurabh', 'jha', 'saurabh', 'saurabh'),
(126, 'Ankit ', '', '', ''),
(127, 'Ankit', 'jha', 'kiranjha567889@gmail.com', 'Ankit 007'),
(128, 'Meenu', 'Kumari', 'Meenu kumari', 'meenu@123'),
(129, 'Ansh ', 'Gupta ', 'Ansh Gupta', 'ansh@123'),
(130, 'Arushi ', 'Chhetri', 'nanugunjan@gmail.com', 'aruhsi@123'),
(131, 'Upasana', 'Sirohi', 'Upasana sirohi', 'upasana@123');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(10) NOT NULL,
  `student_name` varchar(25) NOT NULL,
  `student_marks` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `student_name`, `student_marks`) VALUES
(1, 'ss730439@gmail.com', '46'),
(2, 'Arnavmandal@', '37'),
(4, 'udayveer2@gmail.com', '30'),
(9, 'ss730439@gmail.com', '48'),
(10, 'ss730439@gmail.com', '28'),
(11, 'Arnavmandal@', '48'),
(16, 'VishakhaSaini', '71'),
(17, 'akshit@gmail.com', '43'),
(18, 'Akshit kestwal', '35'),
(19, 'singhmuskan7387@gmail.com', '28'),
(20, 'Supriya Mall', '38'),
(21, 'Muskan Prajapati ', '44'),
(22, 'amychristabell4451@gmail.', '35'),
(23, 'riteshprajapati89000@gmai', '42'),
(24, 'Asmita rawat', '23'),
(25, 'Asmita rawat', '22'),
(26, 'alokraj', '35'),
(28, 'Aanchal', '41'),
(29, 'Aanchal', '33'),
(31, 'ss730439@gmail.com', '49'),
(32, 'kiranjha567889@gmail.com', '31'),
(33, 'Meenu kumari', '33'),
(34, 'Meenu kumari', '31'),
(35, 'Ansh Gupta', '17'),
(36, 'nanugunjan@gmail.com', '28'),
(37, 'Upasana sirohi', '29');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
