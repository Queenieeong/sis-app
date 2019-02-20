-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2018 at 05:25 AM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student-information-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `priority_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `priority_id`, `title`, `date_start`, `date_end`, `message`, `publish_status`, `created_at`, `updated_at`) VALUES
(1, 0, 'TEST 321', '2018-09-01', '2018-09-30', 'the quick brown fox jumps over the lazy dog.', 1, '2018-09-01 02:24:16', NULL),
(2, 0, 'SAMPLE', '2018-09-03', '2018-09-08', 'lorem ipsum dolor with the quick brown fox jumps over the lazy dog.', 1, '2018-09-01 02:28:11', NULL),
(3, 0, '7 ELEVEN', '2018-09-24', '2018-09-25', 'FOR TESTING PURPOSE', 1, '2018-09-01 05:54:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `description` varchar(50) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `name`, `description`, `date_created`, `date_modified`, `created_by`) VALUES
(1, 'BIRTH CERTIFICATE', 'Photocopy of NSO Certified Birth Certificate', '2018-09-14 16:50:55', '2018-09-14 17:10:04', 0),
(2, 'REPORT CARD', 'Photocopy of Report Card (Form 138)', '2018-09-14 16:51:05', '2018-09-14 17:09:52', 0),
(3, 'ID PHOTO', '2 pcs 1\" x 1\" ID Photo', '2018-09-14 17:08:20', '2018-09-14 17:10:11', 0),
(4, 'DOCTOR\'S CERTIFICATE', 'Doctor\'s Certificate of Good Health', '2018-09-14 17:09:38', '2018-09-14 17:10:16', 0),
(5, 'DEMO CREDENTIAL', 'The quick brown fox jumps over the lazy dog.', '2018-09-14 20:35:17', '2018-09-14 20:35:17', 0),
(6, 'NEW DEMO CREDENTIAL', 'adasdasdasd adasdasdasd adasdasdasd adasdasdasd ad', '2018-09-14 20:48:22', '2018-09-14 20:48:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `credential_requirements`
--

CREATE TABLE `credential_requirements` (
  `id` int(11) NOT NULL,
  `credential_template_id` int(11) UNSIGNED NOT NULL,
  `credential_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `date_creadted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credential_requirements`
--

INSERT INTO `credential_requirements` (`id`, `credential_template_id`, `credential_id`, `date_creadted`, `date_modified`, `created_by`) VALUES
(1, 1, 1, '2018-09-19 01:34:30', '2018-09-19 01:34:30', 1),
(2, 1, 2, '2018-09-19 01:34:30', '2018-09-19 01:34:30', 1),
(3, 1, 3, '2018-09-19 01:34:30', '2018-09-19 01:34:30', 1),
(4, 1, 4, '2018-09-19 01:34:30', '2018-09-19 01:34:30', 1),
(5, 1, 5, '2018-09-19 01:34:30', '2018-09-19 01:34:30', 1),
(6, 1, 6, '2018-09-19 01:34:30', '2018-09-19 01:34:30', 1),
(7, 2, 1, '2018-09-19 01:34:55', '2018-09-19 01:34:55', 1),
(8, 2, 2, '2018-09-19 01:34:55', '2018-09-19 01:34:55', 1),
(9, 2, 3, '2018-09-19 01:34:55', '2018-09-19 01:34:55', 1),
(10, 2, 4, '2018-09-19 01:34:55', '2018-09-19 01:34:55', 1),
(11, 2, 5, '2018-09-19 01:34:55', '2018-09-19 01:34:55', 1),
(12, 2, 6, '2018-09-19 01:34:55', '2018-09-19 01:34:55', 1),
(13, 3, 1, '2018-09-19 01:35:17', '2018-09-19 01:35:17', 1),
(14, 3, 2, '2018-09-19 01:35:17', '2018-09-19 01:35:17', 1),
(15, 3, 3, '2018-09-19 01:35:17', '2018-09-19 01:35:17', 1),
(16, 3, 4, '2018-09-19 01:35:17', '2018-09-19 01:35:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `credential_templates`
--

CREATE TABLE `credential_templates` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credential_templates`
--

INSERT INTO `credential_templates` (`id`, `name`, `date_created`, `date_modified`, `created_by`) VALUES
(1, 'GRADE ONE CREDENTIAL TEMPLATE', '2018-09-19 01:34:30', '2018-09-19 01:34:30', 0),
(2, 'GRADE TWO CREDENTIAL TEMPLATE', '2018-09-19 01:34:55', '2018-09-19 01:34:55', 0),
(3, 'GRADE THREE CREDENTIAL TEMPLATE', '2018-09-19 01:35:17', '2018-09-19 01:35:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `priority_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_status` tinyint(1) NOT NULL,
  `active_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `eventscol` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `priority_id`, `title`, `date_start`, `date_end`, `message`, `publish_status`, `active_status`, `created_at`, `updated_at`, `eventscol`) VALUES
(1, 0, 'EVENT 1', '2018-12-12', '2018-12-12', 'The quick brown fox jumps over the lazy dog', 1, 0, '2018-10-04 16:46:22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'student', ''),
(4, 'teacher', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '192.168.33.1', 'JUSTIN_BIEBER', 1541499712);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_08_11_125459_create_school_years_table', 1),
(2, '2018_08_11_125551_create_school_departments_table', 1),
(3, '2018_08_11_125610_create_school_grade_levels_table', 1),
(4, '2018_08_11_125622_create_school_sections_table', 1),
(5, '2018_08_11_125633_create_school_subjects_table', 1),
(6, '2018_08_11_125644_create_announcements_table', 1),
(7, '2018_08_11_125655_create_students_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_class`
--

CREATE TABLE `schedule_class` (
  `id` int(11) UNSIGNED NOT NULL,
  `schedule_master_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `subject_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `teacher_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `room_id` int(11) NOT NULL,
  `time_start` time NOT NULL DEFAULT '00:00:00',
  `time_end` time NOT NULL DEFAULT '00:00:00',
  `days` varchar(50) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_class`
--

INSERT INTO `schedule_class` (`id`, `schedule_master_id`, `subject_id`, `teacher_id`, `room_id`, `time_start`, `time_end`, `days`, `date_created`) VALUES
(1, 1, 1, 1, 0, '00:08:00', '00:09:00', 'MON-TUE-WED-THU-FRI', '2018-08-29 13:01:55'),
(2, 1, 2, 1, 0, '00:09:00', '00:10:00', 'MON-TUE-WED-THU-FRI', '2018-08-29 13:03:16'),
(3, 1, 3, 2, 0, '00:10:00', '00:11:00', 'MON-WED-FRI', '2018-08-29 13:03:55'),
(4, 1, 4, 1, 0, '00:11:00', '00:12:00', 'TUE-THU', '2018-08-29 13:04:36'),
(8, 2, 2, 1, 0, '09:00:00', '10:00:00', 'MON-WED-FRI', '2018-09-01 05:44:47'),
(9, 2, 3, 2, 0, '10:00:00', '11:00:00', 'MON-TUE-WED-THU-FRI', '2018-09-01 05:45:21'),
(10, 4, 6, 1, 0, '10:00:00', '11:00:00', 'MON-WED-FRI', '2018-09-01 05:46:16'),
(11, 2, 4, 1, 0, '00:12:00', '02:32:00', 'MON-FRI', '2018-09-17 13:59:58'),
(12, 4, 5, 1, 0, '15:00:00', '16:00:00', 'TUE-WED-THU', '2018-10-05 02:25:09'),
(13, 4, 7, 2, 0, '16:00:00', '17:00:00', 'MON-TUE-WED', '2018-10-05 15:35:06'),
(14, 5, 1, 1, 0, '08:00:00', '09:00:00', 'MON-TUE-WED-THU-FRI', '2018-10-15 23:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_master`
--

CREATE TABLE `schedule_master` (
  `id` int(11) UNSIGNED NOT NULL,
  `school_year_id` int(11) UNSIGNED NOT NULL,
  `department_id` int(11) UNSIGNED NOT NULL,
  `grade_level_id` int(11) UNSIGNED NOT NULL,
  `section_id` int(11) UNSIGNED NOT NULL,
  `adviser_id` int(11) UNSIGNED NOT NULL,
  `capacity` int(11) UNSIGNED NOT NULL,
  `total_dropped` int(11) UNSIGNED NOT NULL,
  `total_enrolled` int(11) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `active_status` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_master`
--

INSERT INTO `schedule_master` (`id`, `school_year_id`, `department_id`, `grade_level_id`, `section_id`, `adviser_id`, `capacity`, `total_dropped`, `total_enrolled`, `date_created`, `date_modified`, `created_by`, `active_status`) VALUES
(1, 1, 2, 2, 1, 0, 0, 0, 0, '2018-08-29 17:19:14', '0000-00-00 00:00:00', 0, 1),
(2, 1, 2, 2, 2, 0, 8, 0, 0, '2018-08-29 17:23:55', '0000-00-00 00:00:00', 0, 1),
(3, 1, 2, 2, 3, 2, 10, 0, 0, '2018-09-01 13:09:42', '0000-00-00 00:00:00', 0, 1),
(4, 1, 2, 5, 24, 2, 10, 0, 0, '2018-09-01 13:18:11', '0000-00-00 00:00:00', 0, 1),
(5, 1, 2, 2, 4, 2, 10, 0, 0, '2018-09-17 13:58:20', '0000-00-00 00:00:00', 0, 1),
(6, 1, 2, 4, 18, 1, 4, 0, 0, '2018-10-15 23:51:23', '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_departments`
--

CREATE TABLE `school_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_departments`
--

INSERT INTO `school_departments` (`id`, `name`, `code_name`, `description`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 'KINDERGARTEN', 'KG', '', 1, NULL, NULL),
(2, 'PRIMARY SCHOOL', 'PS', '', 1, NULL, NULL),
(3, 'JUNIOR HIGH SCHOOL', 'JHS', '', 1, NULL, NULL),
(4, 'SENIOR HIGH SCHOOL', 'SHS', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_grade_levels`
--

CREATE TABLE `school_grade_levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_grade_levels`
--

INSERT INTO `school_grade_levels` (`id`, `department_id`, `name`, `description`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'KINDERGARTEN', '', 1, NULL, NULL),
(2, 2, 'GRADE 1', '', 1, NULL, NULL),
(3, 2, 'GRADE 2 ', '', 1, NULL, NULL),
(4, 2, 'GRADE 3', '', 1, NULL, NULL),
(5, 2, 'GRADE 4', '', 1, NULL, NULL),
(6, 2, 'GRADE 5', '', 1, NULL, NULL),
(7, 2, 'GRADE 6', '', 1, NULL, NULL),
(8, 3, 'GRADE 7', '', 1, NULL, NULL),
(9, 3, 'GRADE 8', '', 1, NULL, NULL),
(10, 3, 'GRADE 9', '', 1, NULL, NULL),
(11, 3, 'GRADE 10', '', 1, NULL, NULL),
(12, 4, 'GRADE 11', '', 1, NULL, NULL),
(13, 4, 'GRADE 12', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_sections`
--

CREATE TABLE `school_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `grade_level_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_sections`
--

INSERT INTO `school_sections` (`id`, `grade_level_id`, `name`, `description`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 2, 'SUN', '', 1, NULL, NULL),
(2, 2, 'MERCURY', '', 1, NULL, NULL),
(3, 2, 'VENUS', '', 1, NULL, NULL),
(4, 2, 'EARTH', '', 1, NULL, NULL),
(5, 2, 'MARS', '', 1, NULL, NULL),
(6, 2, 'JUPITER', '', 1, NULL, NULL),
(7, 2, 'SATURN', '', 1, NULL, NULL),
(8, 2, 'URANUS', '', 1, NULL, NULL),
(9, 2, 'NEPTUNE', '', 1, NULL, NULL),
(10, 2, 'PLUTO', '', 1, NULL, NULL),
(11, 3, 'APPLE ', '', 1, NULL, NULL),
(12, 3, 'GRAPES', '', 1, NULL, NULL),
(13, 3, 'BANANA', '', 1, NULL, NULL),
(14, 3, 'STRAWBERRY', '', 1, NULL, NULL),
(15, 3, 'MANGO', '', 1, NULL, NULL),
(16, 3, 'ORANGE', '', 1, NULL, NULL),
(17, 3, 'PINEAPPLE', '', 1, NULL, NULL),
(18, 4, 'RED', '', 1, NULL, NULL),
(19, 4, 'BLUE', '', 1, NULL, NULL),
(20, 4, 'GREEN', '', 1, NULL, NULL),
(21, 4, 'YELLOW', '', 1, NULL, NULL),
(22, 4, 'PURPLE', '', 1, NULL, NULL),
(23, 4, 'PINK', '', 1, NULL, NULL),
(24, 5, 'ONE', '', 1, NULL, NULL),
(25, 5, 'TWO ', '', 1, NULL, NULL),
(26, 5, 'THREE', '', 1, NULL, NULL),
(27, 5, 'FOUR', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_subjects`
--

CREATE TABLE `school_subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `grade_level_id` int(11) NOT NULL,
  `parent_subject_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_subjects`
--

INSERT INTO `school_subjects` (`id`, `department_id`, `grade_level_id`, `parent_subject_id`, `name`, `description`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 0, 'ENGLISH', '', 1, NULL, NULL),
(2, 2, 2, 0, 'MATHEMATICS', '', 1, NULL, NULL),
(3, 2, 2, 0, 'SCIENCE', '', 1, NULL, NULL),
(4, 2, 2, 0, 'PHYSICAL EDUCATION', '', 1, NULL, NULL),
(5, 2, 5, 0, 'MATHEMATICS', '', 1, NULL, NULL),
(6, 2, 5, 0, 'SCIENCE', '', 1, NULL, NULL),
(7, 2, 5, 0, 'ENGLISH', '', 1, NULL, NULL),
(8, 2, 4, 0, 'ASD', '', 1, NULL, NULL),
(9, 2, 4, 0, 'ZXC', '', 1, NULL, NULL),
(10, 2, 4, 0, 'QWE', '', 1, NULL, NULL),
(11, 2, 4, 0, 'RTY', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_years`
--

CREATE TABLE `school_years` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `is_current` tinyint(1) NOT NULL,
  `active_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_years`
--

INSERT INTO `school_years` (`id`, `name`, `description`, `date_start`, `date_end`, `is_current`, `active_status`, `created_at`, `updated_at`) VALUES
(1, '2018 - 2019', '', '2018-06-04', '2019-03-29', 1, 0, NULL, NULL),
(2, '2020 - 2021 ', '', '2020-06-01', '2021-03-31', 0, 0, NULL, NULL),
(3, '2020 - 2021 ', '', '2020-06-04', '2021-03-30', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suffix_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone_number` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_old_student` tinyint(1) NOT NULL,
  `is_enrolled` tinyint(1) NOT NULL,
  `profile_photo_filename` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_filepath` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_enrolled_id` tinyint(1) NOT NULL,
  `student_profile_id` tinyint(1) NOT NULL,
  `active_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `student_number`, `first_name`, `middle_name`, `last_name`, `suffix_name`, `current_address`, `telephone_number`, `mobile_number`, `email_address`, `gender`, `birth_date`, `birth_place`, `is_old_student`, `is_enrolled`, `profile_photo_filename`, `profile_photo_filepath`, `student_enrolled_id`, `student_profile_id`, `active_status`, `created_at`, `updated_at`) VALUES
(2, 5, '2018-03-00005', 'Kobe', 'beef', 'Bryant', '', '123 int somewhere street philippines', '44444444', '44444444', 'kobe.bryant@email.com', 1, '0000-00-00', 'manila', 0, 1, 'd4fb47d0024744fdd1ca463d493f6d16.png', 'http://192.168.33.10/sis-app/assets/img/student-photos/d4fb47d0024744fdd1ca463d493f6d16.png', 1, 0, 1, '2018-08-31 08:10:58', NULL),
(3, 6, '2018-03-00006', 'jeniffer', 'violo', 'tio', '', '123 int somewhere street philippines', '44444444', '44444444', 'jeniffer.tio@email.com', 0, '0000-00-00', 'manila', 0, 1, '9b7b9c8d33d29432ed46a69527d281d9.jpg', 'http://192.168.33.10/sis-app/assets/img/student-photos/9b7b9c8d33d29432ed46a69527d281d9.jpg', 2, 0, 1, '2018-09-01 05:48:21', NULL),
(4, 7, '2018-03-00007', 'Miguel', '', 'Rivera', '', '123 int somewhere street philippines', '123123123', '09123456789', 'miguel.rivera@email.com', 1, '0000-00-00', 'manila', 0, 1, '68e896cb92268eb7ad5e04ea34905ea3.jpg', 'http://192.168.33.10/sis-app/assets/img/student-photos/68e896cb92268eb7ad5e04ea34905ea3.jpg', 3, 0, 1, '2018-11-06 10:14:45', NULL),
(6, 9, '2018-03-00009', 'Lebron', '', 'James', '', '123 int somewhere street philippines', '123123123', '09123456789', 'lebron.james@email.com', 1, '0000-00-00', 'Akron, Ohio, United States', 0, 1, '460ce5c0ac3c4c3c359d1b0b28484566.png', 'http://192.168.33.10/sis-app/assets/img/student-photos/460ce5c0ac3c4c3c359d1b0b28484566.png', 4, 0, 1, '2018-11-06 13:27:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_credentials`
--

CREATE TABLE `student_credentials` (
  `id` int(11) UNSIGNED NOT NULL,
  `student_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `credential_template_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `credential_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `is_submitted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `document_type` int(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '1 = pdf; 2 = docx; 3 = hard copy',
  `remarks` varchar(250) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_credentials`
--

INSERT INTO `student_credentials` (`id`, `student_id`, `credential_template_id`, `credential_id`, `is_submitted`, `document_type`, `remarks`, `date_created`, `date_modified`, `created_by`) VALUES
(1, 2, 1, 1, 1, 3, 'demo demo demo demode mo', '2018-09-21 03:07:14', '2018-09-21 03:07:14', 1),
(2, 2, 1, 2, 1, 1, 'demo demo demo demode mo', '2018-09-21 03:07:14', '2018-09-21 03:07:15', 1),
(3, 2, 1, 3, 1, 2, 'demo demo demo demode mo', '2018-09-21 03:07:15', '2018-09-21 03:07:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_enrolled`
--

CREATE TABLE `student_enrolled` (
  `id` int(11) UNSIGNED NOT NULL,
  `student_id` int(11) UNSIGNED NOT NULL,
  `school_year_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `department_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `grade_level_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `section_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `is_regular` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `date_enrolled` date DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_enrolled`
--

INSERT INTO `student_enrolled` (`id`, `student_id`, `school_year_id`, `department_id`, `grade_level_id`, `section_id`, `is_regular`, `date_enrolled`, `date_created`, `date_modified`, `created_by`) VALUES
(1, 2, 1, 2, 2, 1, 0, '0000-00-00', '2018-10-17 17:58:04', '2018-10-17 17:58:04', NULL),
(2, 3, 1, 2, 4, 18, 0, '0000-00-00', '2018-11-06 05:40:11', '2018-11-06 05:40:11', NULL),
(3, 4, 1, 2, 2, 2, 0, '0000-00-00', '2018-11-07 04:56:46', '2018-11-07 04:56:46', NULL),
(4, 6, 1, 2, 2, 2, 0, '0000-00-00', '2018-11-07 04:57:02', '2018-11-07 04:57:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_parent`
--

CREATE TABLE `student_parent` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `parent_type_id` tinyint(1) NOT NULL COMMENT '1 = father; 2 = mother',
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `suffix_name` varchar(25) NOT NULL,
  `current_address` varchar(250) NOT NULL,
  `telephone_number` varchar(50) NOT NULL,
  `mobile_number` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_parent`
--

INSERT INTO `student_parent` (`id`, `student_id`, `parent_type_id`, `first_name`, `middle_name`, `last_name`, `suffix_name`, `current_address`, `telephone_number`, `mobile_number`, `email_address`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Anthony', '', 'McClelland', '', '123 int somewhere street philippines', '123123123', '09123456789', 'anthony.mcclelland@email.com', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `specialized_subject_id` int(11) UNSIGNED NOT NULL,
  `teacher_number` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL DEFAULT '0',
  `middle_name` varchar(100) NOT NULL DEFAULT '0',
  `last_name` varchar(100) NOT NULL DEFAULT '0',
  `suffix_name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL DEFAULT '0',
  `email_address` varchar(100) NOT NULL DEFAULT '0',
  `telephone_number` varchar(100) NOT NULL DEFAULT '0',
  `mobile_number` varchar(100) NOT NULL DEFAULT '0',
  `gender` tinyint(1) UNSIGNED NOT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_place` varchar(50) DEFAULT NULL,
  `profile_photo_filename` varchar(250) DEFAULT NULL,
  `profile_photo_filepath` varchar(250) DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `specialized_subject_id`, `teacher_number`, `first_name`, `middle_name`, `last_name`, `suffix_name`, `address`, `email_address`, `telephone_number`, `mobile_number`, `gender`, `birth_date`, `birth_place`, `profile_photo_filename`, `profile_photo_filepath`, `active_status`, `created_by`, `date_created`, `date_modified`) VALUES
(1, 3, 1, '2018-04-00003', 'john', 'ewan', 'doe', '', '281 int 5th avenue m.h del pilar street caloocan city', 'john.doe@email.com', '33333333', '+6391233456789', 1, '0000-00-00', 'manila', '45b9de03ba7ceeeb0f90e820d8bb446f4.jpg', 'http://192.168.33.10/sis-app/assets/img/teacher-photos/45b9de03ba7ceeeb0f90e820d8bb446f4.jpg', 1, 1, '2018-08-31 10:48:39', NULL),
(2, 4, 3, '2018-04-00004', 'jane', 'ewan', 'doe', '', '281 int 5th avenue m.h del pilar street caloocan city', 'jane.doe@email.com', '33333333', '091233456789', 1, '0000-00-00', 'manila', 'a439eedfb4feed2d50aca35724feeaa56.jpg', 'http://192.168.33.10/sis-app/assets/img/teacher-photos/a439eedfb4feed2d50aca35724feeaa56.jpg', 1, 1, '2018-08-31 11:43:37', NULL),
(4, 11, 8, '2018-04-00011', 'Justin', '', 'Bieber', '', '123 int somewhere street philippines', 'justin.bieber@email.com', '123123123', '09123456789', 1, '0000-00-00', 'anywhere', '771d603f9e567288a851e429afb28883.png', 'http://192.168.33.10/sis-app/assets/img/teacher-photos/771d603f9e567288a851e429afb28883.png', 1, 1, '2018-11-06 16:32:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1541566441, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(3, '192.168.33.1', 'DOE_JOHN', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', NULL, 'john.doe@email.com', '', NULL, NULL, NULL, 1535683719, 1541566688, 1, 'JOHN', 'DOE', NULL, NULL),
(4, '192.168.33.1', 'DOE_JANE', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', NULL, 'jane.doe@email.com', NULL, NULL, NULL, NULL, 1535687017, 1535778402, 1, 'JANE', 'DOE', NULL, NULL),
(5, '192.168.33.1', 'BRYANT_KOBE', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', NULL, 'kobe.bryant@email.com', NULL, NULL, NULL, NULL, 1535703058, 1539770292, 1, 'KOBE', 'BRYANT', NULL, NULL),
(6, '192.168.33.1', 'TIO_JENIFFER', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', NULL, 'kobe.bryant@email.com', NULL, NULL, NULL, NULL, 1535780901, 1539770079, 1, 'JENIFFER', 'TIO', NULL, NULL),
(7, '192.168.33.1', 'RIVERA_MIGUEL', '$2y$08$soOatUUyqHX9.84GPV5FQeHxkcOowGHkVh2HFhzqGUNyR22V5fDlm', NULL, 'miguel.rivera@email.com', NULL, NULL, NULL, NULL, 1541470485, NULL, 1, 'MIGUEL', 'RIVERA', NULL, NULL),
(9, '192.168.33.1', 'JAMES_LEBRON', '$2y$08$rtnsawyXgutE8ck7n9pjnO.6gCs1yEn760XduZppwiO5SrzEtz1we', NULL, 'lebron.james@email.com', NULL, NULL, NULL, NULL, 1541482033, 1541514346, 1, 'LEBRON', 'JAMES', NULL, NULL),
(11, '192.168.33.1', 'BIEBER_JUSTIN', '$2y$08$EgBQTiNNzLKuTyHYZpbzbebINx8TOGCWLSD7pVGzmkqloiEYSFgra', NULL, 'justin.bieber@email.com', NULL, NULL, NULL, NULL, 1541493132, 1541514942, 1, 'JUSTIN', 'BIEBER', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(10, 3, 4),
(11, 4, 4),
(12, 5, 3),
(13, 6, 3),
(14, 7, 3),
(16, 9, 3),
(18, 11, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credential_requirements`
--
ALTER TABLE `credential_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credential_templates`
--
ALTER TABLE `credential_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_class`
--
ALTER TABLE `schedule_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_master`
--
ALTER TABLE `schedule_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_departments`
--
ALTER TABLE `school_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_grade_levels`
--
ALTER TABLE `school_grade_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_sections`
--
ALTER TABLE `school_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_subjects`
--
ALTER TABLE `school_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_years`
--
ALTER TABLE `school_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_credentials`
--
ALTER TABLE `student_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_enrolled`
--
ALTER TABLE `student_enrolled`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_parent`
--
ALTER TABLE `student_parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `credential_requirements`
--
ALTER TABLE `credential_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `credential_templates`
--
ALTER TABLE `credential_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schedule_class`
--
ALTER TABLE `schedule_class`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `schedule_master`
--
ALTER TABLE `schedule_master`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `school_departments`
--
ALTER TABLE `school_departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `school_grade_levels`
--
ALTER TABLE `school_grade_levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `school_sections`
--
ALTER TABLE `school_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `school_subjects`
--
ALTER TABLE `school_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `school_years`
--
ALTER TABLE `school_years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_credentials`
--
ALTER TABLE `student_credentials`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_enrolled`
--
ALTER TABLE `student_enrolled`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_parent`
--
ALTER TABLE `student_parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
