-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 05:20 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_travel_history`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` mediumint(9) NOT NULL,
  `user_id` smallint(6) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `target` double(10,3) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `user_id`, `name`, `target`, `start_date`, `end_date`, `description`) VALUES
(1, 0, 'Ramadan 2022', 1000.000, '2022-04-01', '2022-04-30', 'حملة جمع تبرعات لرمضان 2022');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` mediumint(9) NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `car_number` char(30) NOT NULL,
  `make` varchar(20) DEFAULT NULL,
  `model` varchar(20) DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `mileage` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `user_id`, `car_number`, `make`, `model`, `year`, `color`, `mileage`) VALUES
(0, 0, '92374301', 'Renault', 'Megane', '2017', 'white', '180920');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` tinyint(4) NOT NULL,
  `str` varchar(1000) NOT NULL,
  `value` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `str`, `value`) VALUES
(1, 'default_language', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `dictionary`
--

CREATE TABLE `dictionary` (
  `word` char(255) NOT NULL,
  `en` varchar(1000) DEFAULT NULL,
  `ar` varchar(1000) NOT NULL,
  `he` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dictionary`
--

INSERT INTO `dictionary` (`word`, `en`, `ar`, `he`) VALUES
('add', 'Add', 'اضافة', ''),
('added_by', 'Added By', 'أضيفت بواسطة', ''),
('add_campaign', 'Add Campaign', 'اضافة حملة', ''),
('add_donation', 'Add Donation', 'اضافة تبرع', ''),
('amount', 'Amount', 'المبلغ', ''),
('campaign', 'Campaign', 'حملة', ''),
('campaigns', 'Campaigns', 'الحملات', ''),
('campaigns_list', 'Campaigns List', 'قائمة الحملات', ''),
('campaign_end_date', 'Campaign End Date', 'تاريخ انتهاء الحملة', ''),
('campaign_name', 'Campaign Name', 'إسم الحملة', ''),
('campaign_start_date', 'Campaign Start Date', 'تاريخ بدء الحملة', ''),
('campaign_target', 'Campaign Target', 'هدف الحملة', ''),
('cancel', 'Cancel', 'الغاء', ''),
('category_name', 'Category Name', 'اسم الفئة', ''),
('close', 'Close', 'اغلاق', ''),
('dashboard', 'Dashboard', 'الرئيسية', ''),
('date', 'Date', 'التاريخ', ''),
('delete', 'Delete', 'حذف', ''),
('description', 'Description', 'الوصف', ''),
('donations', 'Donations', 'التبرعات', ''),
('donations_list', 'Donations List', 'قائمة التبرعات', ''),
('donator_details', 'Donator Details', 'تفاصيل المتبرع', ''),
('donator_name', 'Donator Name', 'إسم المتبرع', ''),
('donator_phone', 'Donator Phone', 'هاتف المتبرع', ''),
('edit_campaign', 'Edit Campaign', 'تعديل حملة', ''),
('edit_category', 'Edit Category', 'تعديل فئة', ''),
('email', 'Email', 'البريد الإلكتروني', 'דואר אלקטרוני\r\n'),
('end', 'End', 'النهاية', ''),
('end_date', 'End Date', 'تاريخ الانتهاء', ''),
('error', 'Error', 'خطأ', ''),
('expense_categories', 'Expense Categories', 'فئات المصروف', ''),
('income_categories', 'Income Categories', 'فئات المدخولات', ''),
('language', 'Language', 'اللغة', ''),
('login', 'Login', 'الدخول', 'כניסה'),
('name', 'Name', 'الإسم', ''),
('new_campaign', 'New Campaign', 'حملة جديدة', ''),
('new_category', 'New Category', 'فئة جديدة', ''),
('new_donation', 'New Donation', 'تبرع جديد', ''),
('options', 'Options', 'خيارات', ''),
('phone', 'Phone', 'الهاتف', ''),
('received_by', 'Received By', 'سُلِمت الى', ''),
('save', 'Save', 'حفظ', ''),
('start', 'Start', 'البداية', ''),
('start_date', 'Start Date', 'تاريخ البدء', ''),
('target', 'Target', 'الهدف', ''),
('time', 'Time', 'الوقت', '');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `campaign` mediumint(9) DEFAULT NULL,
  `added_by` smallint(6) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `amount` double(10,3) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `received_by` smallint(6) NOT NULL,
  `note` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `campaign`, `added_by`, `name`, `phone`, `amount`, `date`, `time`, `received_by`, `note`) VALUES
(1, 1, 0, 'Alex', '0528705533', 100.500, '2022-04-03', '00:00:00', 0, 'test'),
(2, 1, 1, NULL, NULL, 100.500, '2022-04-03', '00:00:00', 1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` mediumint(9) NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `user_id`, `name`) VALUES
(1, 0, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `income_categories`
--

CREATE TABLE `income_categories` (
  `id` mediumint(9) NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `income_categories`
--

INSERT INTO `income_categories` (`id`, `user_id`, `name`) VALUES
(1, 0, 'KSP1'),
(2, 0, 'Students');

-- --------------------------------------------------------

--
-- Table structure for table `langauge`
--

CREATE TABLE `langauge` (
  `id` tinyint(4) NOT NULL,
  `lang_name` char(255) NOT NULL,
  `lang_dir` char(3) NOT NULL,
  `lang_code` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `langauge`
--

INSERT INTO `langauge` (`id`, `lang_name`, `lang_dir`, `lang_code`) VALUES
(1, 'english', 'ltr', 'en'),
(2, 'العربية', 'rtl', 'ar'),
(3, 'עברית', 'rtl', 'he');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` smallint(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(0, 'username', 'username@gmail.com', '$2y$10$IqLDIpk88G8frd9pXCkSW.5vuip0Zsj9LwjFdI746mgmLgIkhYOd.'),
(1, 'test', 'test@gmail.com', '$2y$10$IqLDIpk88G8frd9pXCkSW.5vuip0Zsj9LwjFdI746mgmLgIkhYOd.');

-- --------------------------------------------------------

--
-- Table structure for table `users_perm`
--

CREATE TABLE `users_perm` (
  `id` smallint(6) NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `see_all_donations` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_perm`
--

INSERT INTO `users_perm` (`id`, `user_id`, `see_all_donations`) VALUES
(1, 0, '1'),
(2, 1, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dictionary`
--
ALTER TABLE `dictionary`
  ADD UNIQUE KEY `Key` (`word`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `received_by` (`received_by`),
  ADD KEY `campaign` (`campaign`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `income_categories`
--
ALTER TABLE `income_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `langauge`
--
ALTER TABLE `langauge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_perm`
--
ALTER TABLE `users_perm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `langauge`
--
ALTER TABLE `langauge`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD CONSTRAINT `campaigns_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `donations_ibfk_2` FOREIGN KEY (`received_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `donations_ibfk_3` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `donations_ibfk_4` FOREIGN KEY (`received_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `donations_ibfk_5` FOREIGN KEY (`campaign`) REFERENCES `campaigns` (`id`);

--
-- Constraints for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD CONSTRAINT `expense_categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `income_categories`
--
ALTER TABLE `income_categories`
  ADD CONSTRAINT `income_categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_perm`
--
ALTER TABLE `users_perm`
  ADD CONSTRAINT `users_perm_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
