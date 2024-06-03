-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2024 at 09:33 AM
-- Server version: 10.3.39-MariaDB
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdev_modern_group`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `access` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `image`, `access`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Master Admin', 'masteradmin@gmail.com', 'admin', NULL, NULL, NULL, '$2y$10$Lf1NiPUAV16dDv0ox82cxeBAf.EvzUdBH5feNjiYd.BQE9Jyjptyy', 0, NULL, NULL),
(6, 'Usman', 'usmanazhar357@gmail.com', 'usman', NULL, NULL, NULL, '$2y$10$Vpg9.dbovAeh3Keiji8mIO3cwagZ3dHf0twJgYd9BWO1JjdS2DxEW', 1, '2024-05-01 09:26:02', '2024-05-01 09:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `read_status` tinyint(4) NOT NULL DEFAULT 0,
  `click_url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `name` varchar(225) NOT NULL,
  `localize_name` varchar(225) NOT NULL,
  `short_name` varchar(225) NOT NULL,
  `charges_type` varchar(225) DEFAULT NULL,
  `order` varchar(225) DEFAULT NULL,
  `inactive` varchar(155) DEFAULT NULL,
  `type` varchar(155) DEFAULT NULL,
  `reporting_group` varchar(200) DEFAULT NULL,
  `tag` varchar(200) DEFAULT NULL,
  `printing_name` varchar(255) DEFAULT NULL,
  `calculation_type` varchar(155) DEFAULT NULL,
  `tax` varchar(155) DEFAULT NULL,
  `payable_party_type` varchar(155) DEFAULT NULL,
  `recevable_party_type` varchar(155) DEFAULT NULL,
  `c_category` varchar(100) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commodities`
--

CREATE TABLE `commodities` (
  `id` int(11) NOT NULL,
  `code` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `short_code` varchar(225) DEFAULT NULL,
  `hs_code` varchar(225) DEFAULT NULL,
  `cargo_type` varchar(225) DEFAULT NULL,
  `commodity_group` varchar(225) DEFAULT NULL,
  `inactive` varchar(225) DEFAULT NULL,
  `hazmat_product` varchar(225) DEFAULT NULL,
  `packing_group` varchar(255) DEFAULT NULL,
  `hazmat_code` varchar(255) DEFAULT NULL,
  `hazmat_class` varchar(255) DEFAULT NULL,
  `chemical_name` varchar(255) DEFAULT NULL,
  `uno_code` varchar(255) DEFAULT NULL,
  `sro` varchar(255) DEFAULT NULL,
  `insurance` varchar(255) DEFAULT NULL,
  `i_tax` varchar(155) DEFAULT NULL,
  `rd` varchar(155) DEFAULT NULL,
  `landing_insurance` varchar(155) DEFAULT NULL,
  `s_itax` varchar(155) DEFAULT NULL,
  `cd%` varchar(155) DEFAULT NULL,
  `fed%` varchar(155) DEFAULT NULL,
  `add_stax` varchar(155) DEFAULT NULL,
  `fine` varchar(155) DEFAULT NULL,
  `add_cd` varchar(155) DEFAULT NULL,
  `eto` varchar(155) DEFAULT NULL,
  `item` varchar(100) DEFAULT NULL,
  `created_at` varchar(55) DEFAULT NULL,
  `updated_at` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `commodities`
--

INSERT INTO `commodities` (`id`, `code`, `name`, `short_code`, `hs_code`, `cargo_type`, `commodity_group`, `inactive`, `hazmat_product`, `packing_group`, `hazmat_code`, `hazmat_class`, `chemical_name`, `uno_code`, `sro`, `insurance`, `i_tax`, `rd`, `landing_insurance`, `s_itax`, `cd%`, `fed%`, `add_stax`, `fine`, `add_cd`, `eto`, `item`, `created_at`, `updated_at`) VALUES
(2, '2', 'eiueyiwq', '4543', '55', 'GI', NULL, '', 'No', 'ii(med-danger)', NULL, 'Class4SolidDivisionNotSpecified', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-28 09:28:22', '2024-05-28 09:45:23'),
(3, '3', 'Textiles and Apparel', 'Tex', NULL, NULL, NULL, '', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 05:46:55', '2024-05-29 10:12:57'),
(5, '5', 'abc', 'abc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 06:02:11', '2024-05-29 06:02:11'),
(6, '6', 'asd', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 06:02:47', '2024-05-29 06:02:47'),
(9, '9', 'asjdnqi', 'aiosda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 06:03:08', '2024-05-29 06:03:08'),
(10, '10', 'laksnd', 'asdnad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 06:03:16', '2024-05-29 06:03:16'),
(11, '11', 'aljsndalsdn', 'asildnew', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 06:03:22', '2024-05-29 06:03:22'),
(12, '12', 'asiqjwe', 'apoier', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 06:03:28', '2024-05-29 06:03:28'),
(13, '13', 'qwopej', 'pwoejq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 06:03:34', '2024-05-29 06:03:34'),
(14, '14', 'qwpoejqwe', 'pqiwej', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 06:03:39', '2024-05-29 06:03:39'),
(15, '15', 'qlwej', 'qwpoejq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 06:03:45', '2024-05-29 06:03:45'),
(19, '16', 'alksdna;skd', 'aklsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 06:10:36', '2024-05-29 06:10:36'),
(20, '17', 'lkaslaksd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 06:10:43', '2024-05-29 06:10:43'),
(24, '18', 'IRON', 'IRON', '720449', NULL, NULL, '', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 10:14:19', '2024-05-29 10:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `company_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1- Open\r\n2- Working\r\n3- Completed',
  `description` text DEFAULT NULL,
  `added_by` text DEFAULT '0',
  `solution` text DEFAULT NULL,
  `lead_id` int(11) NOT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cros`
--

CREATE TABLE `cros` (
  `id` int(11) NOT NULL,
  `cro_no` varchar(255) NOT NULL,
  `cro_type` varchar(255) NOT NULL,
  `job_number` varchar(255) NOT NULL,
  `client` text NOT NULL,
  `issue_date` varchar(255) NOT NULL,
  `cro_valid_for` text DEFAULT NULL,
  `ref_number` varchar(255) DEFAULT NULL,
  `equip_qty` varchar(255) DEFAULT NULL,
  `size_type` varchar(255) DEFAULT NULL,
  `overseas_agent` text DEFAULT NULL,
  `clearing_agent` text DEFAULT NULL,
  `shipper` text DEFAULT NULL,
  `pickup_location` text DEFAULT NULL,
  `port_of_loading` text DEFAULT NULL,
  `port_of_discharge` text DEFAULT NULL,
  `final_destination` text DEFAULT NULL,
  `commodity` text DEFAULT NULL,
  `terminal` text DEFAULT NULL,
  `empty_depot` text DEFAULT NULL,
  `transporter` text DEFAULT NULL,
  `book_no` varchar(255) DEFAULT NULL,
  `gate_pass` varchar(255) DEFAULT NULL,
  `date` varchar(155) DEFAULT NULL,
  `letter_no` varchar(255) DEFAULT NULL,
  `licence_no` varchar(255) DEFAULT NULL,
  `job_no` varchar(255) DEFAULT NULL,
  `expiry_date` varchar(155) DEFAULT NULL,
  `shipping_agent` text DEFAULT NULL,
  `cargo_type` varchar(155) DEFAULT NULL,
  `vessel` varchar(255) DEFAULT NULL,
  `voyage` varchar(255) DEFAULT NULL,
  `sailing_date` varchar(155) DEFAULT NULL,
  `Manual` varchar(155) DEFAULT NULL,
  `upload` text DEFAULT NULL,
  `print_logo` varchar(155) DEFAULT NULL,
  `continue_mode` varchar(155) DEFAULT NULL,
  `haulage` text DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cros`
--

INSERT INTO `cros` (`id`, `cro_no`, `cro_type`, `job_number`, `client`, `issue_date`, `cro_valid_for`, `ref_number`, `equip_qty`, `size_type`, `overseas_agent`, `clearing_agent`, `shipper`, `pickup_location`, `port_of_loading`, `port_of_discharge`, `final_destination`, `commodity`, `terminal`, `empty_depot`, `transporter`, `book_no`, `gate_pass`, `date`, `letter_no`, `licence_no`, `job_no`, `expiry_date`, `shipping_agent`, `cargo_type`, `vessel`, `voyage`, `sailing_date`, `Manual`, `upload`, `print_logo`, `continue_mode`, `haulage`, `created_at`, `updated_at`) VALUES
(1, '23', 'job_booking', '33', 'cfhgv', '2024-05-29', 're6cr', '12', '65', 'XXL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'general', NULL, NULL, NULL, NULL, NULL, 'Print-Logo', NULL, NULL, '2024-05-28 10:45:52', '2024-05-29 10:18:23'),
(2, '23', 'sale_off_hire', '33', 'cfhgv', '2024-05-30', 're6cr', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hazardous', NULL, NULL, NULL, NULL, NULL, 'Print-Logo', 'Continue-Mode', NULL, '2024-05-29 10:01:30', '2024-05-29 10:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `ctrk`
--

CREATE TABLE `ctrk` (
  `id` int(11) NOT NULL,
  `container_no` varchar(225) NOT NULL,
  `size_type` varchar(225) NOT NULL,
  `yom` text DEFAULT NULL,
  `weight_limit` varchar(225) DEFAULT NULL,
  `principal` varchar(255) DEFAULT NULL,
  `principal_code` varchar(155) DEFAULT NULL,
  `top` varchar(100) DEFAULT NULL,
  `right` varchar(100) DEFAULT NULL,
  `left` varchar(100) DEFAULT NULL,
  `front` varchar(100) DEFAULT NULL,
  `back` varchar(100) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ctrk`
--

INSERT INTO `ctrk` (`id`, `container_no`, `size_type`, `yom`, `weight_limit`, `principal`, `principal_code`, `top`, `right`, `left`, `front`, `back`, `remarks`, `created_at`, `updated_at`) VALUES
(8, 'FCIU2617753', '20SD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MAXX', '2024-06-01 18:07:37', '2024-06-01 18:13:31'),
(9, 'MAXU6249801', '40HC', '', '', '', '', '', '', '', '', '', '', '2024-06-01 18:08:41', '2024-06-01 18:08:41'),
(10, 'EMCU3475141', '20SD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-01 18:10:59', '2024-06-01 18:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(225) NOT NULL,
  `ex_rate` varchar(20) DEFAULT NULL,
  `main_symbol` varchar(155) NOT NULL,
  `unit_symbol` varchar(155) NOT NULL,
  `decimal_portion_digits` varchar(155) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `name`, `ex_rate`, `main_symbol`, `unit_symbol`, `decimal_portion_digits`, `created_at`, `updated_at`) VALUES
(20, 'USD', 'UNITED STATE', NULL, 'DOLLAR', '$', '0', '2024-06-01 12:24:57', '2024-06-01 12:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `postal_code` text DEFAULT NULL,
  `gst_no` text DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `sender` text DEFAULT NULL,
  `receiver` text NOT NULL,
  `subject` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `code` varchar(225) NOT NULL,
  `size` varchar(100) NOT NULL,
  `type` varchar(225) NOT NULL,
  `teu` varchar(155) DEFAULT NULL,
  `old_iso` varchar(155) DEFAULT NULL,
  `iso` varchar(155) DEFAULT NULL,
  `weight` varchar(155) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `code`, `size`, `type`, `teu`, `old_iso`, `iso`, `weight`, `created_at`, `updated_at`) VALUES
(4, '20SD', '20', 'Dry Container', '1', NULL, '22G1', '2350.00', '2024-05-31 07:04:11', '2024-05-31 08:00:17'),
(8, '20OT', '20', 'Open Top', '1', NULL, '20UT', NULL, '2024-05-31 12:52:37', '2024-05-31 12:52:37'),
(9, '20FR', '20', 'Flat Rack', '1', NULL, '20U5', NULL, '2024-05-31 12:53:01', '2024-05-31 12:53:33'),
(11, '20RF', '20', 'Refrigerated Container', '1', NULL, NULL, NULL, '2024-05-31 13:00:22', '2024-05-31 13:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `extensions`
--

CREATE TABLE `extensions` (
  `id` int(10) UNSIGNED NOT NULL,
  `act` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `script` text DEFAULT NULL,
  `shortcode` text DEFAULT NULL COMMENT 'object',
  `support` text DEFAULT NULL COMMENT 'help section',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extensions`
--

INSERT INTO `extensions` (`id`, `act`, `name`, `description`, `image`, `script`, `shortcode`, `support`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'tawk-chat', 'Tawk.to', 'Key location is shown bellow', 'tawky_big.png', '<script>\r\n                        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n                        (function(){\r\n                        var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\n                        s1.async=true;\r\n                        s1.src=\"https://embed.tawk.to/{{app_key}}\";\r\n                        s1.charset=\"UTF-8\";\r\n                        s1.setAttribute(\"crossorigin\",\"*\");\r\n                        s0.parentNode.insertBefore(s1,s0);\r\n                        })();\r\n                    </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"------------------------------\"}}', 'twak.png', 0, NULL, '2019-10-18 23:16:05', '2021-04-09 23:16:02'),
(2, 'google-recaptcha2', 'Google Recaptcha 2', 'Key location is shown bellow', 'recaptcha3.png', '\r\n<script src=\"https://www.google.com/recaptcha/api.js\"></script>\r\n<div class=\"g-recaptcha\" data-sitekey=\"{{sitekey}}\" data-callback=\"verifyCaptcha\"></div>\r\n<div id=\"g-recaptcha-error\"></div>', '{\"sitekey\":{\"title\":\"Site Key\",\"value\":\"-----------------------------\"}}', 'recaptcha.png', 0, NULL, '2019-10-18 23:16:05', '2021-04-09 23:16:31'),
(3, 'custom-captcha', 'Custom Captcha', 'Just Put Any Random String', 'customcaptcha.png', NULL, '{\"random_key\":{\"title\":\"Random String\",\"value\":\"Demo\"}}', 'na', 1, NULL, '2019-10-18 23:16:05', '2021-04-09 23:15:41'),
(4, 'google-analytics', 'Google Analytics', 'Key location is shown bellow', 'google-analytics.png', '<script async src=\"https://www.googletagmanager.com/gtag/js?id={{app_key}}\"></script>\r\n                <script>\r\n                  window.dataLayer = window.dataLayer || [];\r\n                  function gtag(){dataLayer.push(arguments);}\r\n                  gtag(\"js\", new Date());\r\n                \r\n                  gtag(\"config\", \"{{app_key}}\");\r\n                </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"---------------------------------\"}}', 'ganalytics.png', 0, NULL, NULL, '2021-04-09 23:16:10'),
(5, 'fb-comment', 'Facebook Comment ', 'Key location is shown bellow', 'Facebook.png', '<div id=\"fb-root\"></div><script async defer crossorigin=\"anonymous\" src=\"https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId={{app_key}}&autoLogAppEvents=1\"></script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"-------------------------------------\"}}', 'fb_com.png', 0, NULL, NULL, '2021-04-09 23:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitename` varchar(255) DEFAULT NULL,
  `footer_desc` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `iframe` text DEFAULT NULL,
  `copyright` varchar(255) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `pinterest` varchar(255) DEFAULT NULL,
  `privacy_policy` text DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `cur_text` varchar(255) DEFAULT NULL COMMENT 'currency text',
  `cur_sym` varchar(255) DEFAULT NULL COMMENT 'currency symbol',
  `email_from` varchar(255) DEFAULT NULL,
  `email_template` text DEFAULT NULL,
  `base_color` varchar(255) DEFAULT NULL,
  `secondary_color` varchar(255) DEFAULT NULL,
  `mail_config` text DEFAULT NULL,
  `secure_password` tinyint(4) NOT NULL DEFAULT 0,
  `currency` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `sitename`, `footer_desc`, `logo`, `phone`, `whatsapp`, `email`, `address`, `iframe`, `copyright`, `facebook`, `twitter`, `linkedin`, `youtube`, `instagram`, `pinterest`, `privacy_policy`, `meta_title`, `meta_desc`, `meta_keywords`, `cur_text`, `cur_sym`, `email_from`, `email_template`, `base_color`, `secondary_color`, `mail_config`, `secure_password`, `currency`, `created_at`, `updated_at`) VALUES
(1, 'Modern Group Of Company', 'Contra and layouts, in content of dummy text is nonsensical.typefaces of dummy text is appearance of different general the content of dummy text is nonsensical. typefaces of dummy text is nonsensical.', 'logo.png', '123 456 789', NULL, 'info@modern_group.com', NULL, NULL, '© Copyright 2023 Signature luxury Real Estate', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Modern Group Of Company', 'Modern Group Of Company', 'Modern Group Of Company', 'USD', '$', 'info@signatureluxuryrealestate.com', '<table style=\"color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(0, 23, 54); text-decoration-style: initial; text-decoration-color: initial;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#001736\"><tbody><tr><td valign=\"top\" align=\"center\"><table class=\"mobile-shell\" width=\"650\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"td container\" style=\"width: 650px; min-width: 650px; font-size: 0pt; line-height: 0pt; margin: 0px; font-weight: normal; padding: 55px 0px;\"><div style=\"text-align: center;\"><img src=\"https://globaldezigns.com/images/logo.png\" style=\"height: 240 !important;width: 338px;margin-bottom: 20px;\"></div><table style=\"width: 650px; margin: 0px auto;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td style=\"padding-bottom: 10px;\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"tbrr p30-15\" style=\"padding: 60px 30px; border-radius: 26px 26px 0px 0px;\" bgcolor=\"#000036\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td style=\"color: rgb(255, 255, 255); font-family: Muli, Arial, sans-serif; font-size: 20px; line-height: 46px; padding-bottom: 25px; font-weight: bold;\">Hi {{name}} ,</td></tr><tr><td style=\"color: rgb(193, 205, 220); font-family: Muli, Arial, sans-serif; font-size: 20px; line-height: 30px; padding-bottom: 25px;\">{{message}}</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table style=\"width: 650px; margin: 0px auto;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"p30-15 bbrr\" style=\"padding: 50px 30px; border-radius: 0px 0px 26px 26px;\" bgcolor=\"#000036\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"text-footer1 pb10\" style=\"color: rgb(0, 153, 255); font-family: Muli, Arial, sans-serif; font-size: 18px; line-height: 30px; text-align: center; padding-bottom: 10px;\">© 2023 HamZa. All Rights Reserved.</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>', 'ff7149', '36274c', '{\"name\":\"php\"}', 0, 21, NULL, '2024-05-01 15:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `incoterms`
--

CREATE TABLE `incoterms` (
  `id` int(11) NOT NULL,
  `code` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `incoterms`
--

INSERT INTO `incoterms` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, '123', 'jbhjb', '2024-05-28 09:52:37', '2024-05-28 09:52:37'),
(2, '92', 'bjkuykj', '2024-05-28 09:52:48', '2024-05-28 09:52:48'),
(3, '9255', 'jhbjh ub', '2024-05-28 09:52:56', '2024-05-28 09:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `tran_number` varchar(225) NOT NULL,
  `inv_date` varchar(155) NOT NULL,
  `reference` varchar(225) NOT NULL,
  `status` varchar(155) NOT NULL,
  `category` varchar(155) DEFAULT NULL,
  `option` varchar(100) DEFAULT NULL,
  `client` varchar(255) DEFAULT NULL,
  `sequence` varchar(255) DEFAULT NULL,
  `invoice_type` varchar(255) DEFAULT NULL,
  `ref_tran_number` varchar(225) DEFAULT NULL,
  `operation` varchar(155) DEFAULT NULL,
  `job_number` varchar(155) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `cost_center` varchar(225) DEFAULT NULL,
  `invoice_to` varchar(255) DEFAULT NULL,
  `manual` varchar(100) DEFAULT NULL,
  `due_days` varchar(155) DEFAULT NULL,
  `invoice_ac` varchar(155) DEFAULT NULL,
  `auto_round_off` varchar(100) DEFAULT NULL,
  `storage_end_date` varchar(100) DEFAULT NULL,
  `tax_charges` varchar(100) DEFAULT NULL,
  `invoice_title` varchar(225) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `total_amount` varchar(225) DEFAULT NULL,
  `net_amount` varchar(225) DEFAULT NULL,
  `voucher_no` varchar(225) DEFAULT NULL,
  `discount` varchar(225) DEFAULT NULL,
  `tax_amount` varchar(225) DEFAULT NULL,
  `bank_detail` varchar(225) DEFAULT NULL,
  `net_amount_inc_tax` varchar(225) DEFAULT NULL,
  `local_amount` varchar(225) DEFAULT NULL,
  `settled_amount` varchar(225) DEFAULT NULL,
  `invoice_balance` varchar(225) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `tran_number`, `inv_date`, `reference`, `status`, `category`, `option`, `client`, `sequence`, `invoice_type`, `ref_tran_number`, `operation`, `job_number`, `currency`, `cost_center`, `invoice_to`, `manual`, `due_days`, `invoice_ac`, `auto_round_off`, `storage_end_date`, `tax_charges`, `invoice_title`, `remarks`, `total_amount`, `net_amount`, `voucher_no`, `discount`, `tax_amount`, `bank_detail`, `net_amount_inc_tax`, `local_amount`, `settled_amount`, `invoice_balance`, `created_at`, `updated_at`) VALUES
(1, '5543', '2024-06-25', 'jhjhhuj', 'incomplete', 'securityDeposit', 'milestone_wise', 'cfhgv', NULL, NULL, NULL, 'air import', NULL, 'GBP', 'Head Office', 'invoiceTo', NULL, NULL, NULL, NULL, '2024-06-25', NULL, NULL, 'mkclkcm', '989883484', '45897489', 'wclklclq', '55901235', '8420948', 'nckdfniniqddjnanjn', '80909', '809', '898', '090', '2024-06-03 06:52:38', '2024-06-03 06:52:38'),
(2, '231', '2024-06-12', 'buhjmj', 'void', 'regular', 'job_wise', 'fifjkz', 'nbkjfn', 'cnjdf', 'zxm sdma', 'sea export', 'CNSF', 'AED', 'Head Office', 'clearingAgent', 'Manual', NULL, NULL, NULL, NULL, 'Tax Charges', NULL, 'utfghvnvhj', '3532', '3233', '23556', '23', NULL, NULL, '56', '23', '23532', '98', '2024-06-03 07:02:15', '2024-06-03 07:02:15');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `charges_code` varchar(155) DEFAULT NULL,
  `charges_name` varchar(255) DEFAULT NULL,
  `charges_description` text DEFAULT NULL,
  `size_type` varchar(155) DEFAULT NULL,
  `rate_group` varchar(155) DEFAULT NULL,
  `dg_nondg` varchar(155) DEFAULT NULL,
  `container` text DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `rate` varchar(155) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `net_amount` varchar(255) DEFAULT NULL,
  `margin` varchar(255) DEFAULT NULL,
  `tax` varchar(255) DEFAULT NULL,
  `tax_amount` varchar(155) DEFAULT NULL,
  `inc_tax` varchar(155) DEFAULT NULL,
  `ex_rate` varchar(255) DEFAULT NULL,
  `local_amount` varchar(155) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `status` tinyint(11) NOT NULL DEFAULT 1 COMMENT '1- Open\r\n2- Converted to Proposal\r\n3- Cancel',
  `source` text DEFAULT NULL,
  `value` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` text NOT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `location` varchar(225) NOT NULL,
  `location_check` text NOT NULL,
  `co_ordinates` varchar(255) DEFAULT NULL,
  `inactive` varchar(155) DEFAULT NULL,
  `latitude` varchar(155) DEFAULT NULL,
  `state` varchar(155) DEFAULT NULL,
  `longitude` varchar(155) DEFAULT NULL,
  `phone_prefix` varchar(155) DEFAULT NULL,
  `epass_code` varchar(155) DEFAULT NULL,
  `country_region` text DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `code`, `location`, `location_check`, `co_ordinates`, `inactive`, `latitude`, `state`, `longitude`, `phone_prefix`, `epass_code`, `country_region`, `created_at`, `updated_at`) VALUES
(1, 1, 'Azizabad,Karachi', '[\"airport\",\"seaport\"]', 'abc', 'In-Active', '150000', 'A', '250000', '3216556515', '535', 'Islam', '2024-05-27 12:11:47', '2024-05-29 10:22:50'),
(2, 2, 'Gulshan Block 14', '[\"airport\",\"seaport\"]', 'kldvnsdl', NULL, '65465', 'sindh', '5651', '3216556515', '568', NULL, '2024-05-27 12:12:44', '2024-05-27 12:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `manifests`
--

CREATE TABLE `manifests` (
  `id` int(11) NOT NULL,
  `tran` varchar(100) NOT NULL,
  `doc` varchar(225) NOT NULL,
  `year` varchar(100) NOT NULL,
  `agent` varchar(155) DEFAULT NULL,
  `vessel` varchar(225) DEFAULT NULL,
  `terminals` varchar(225) DEFAULT NULL,
  `license` varchar(155) DEFAULT NULL,
  `port` varchar(155) DEFAULT NULL,
  `ship_company` varchar(225) DEFAULT NULL,
  `captain_name` varchar(225) DEFAULT NULL,
  `berth_wharf` varchar(225) DEFAULT NULL,
  `remarks` varchar(225) DEFAULT NULL,
  `same_bottom_cargo` varchar(225) DEFAULT NULL,
  `manifest_ref` varchar(225) DEFAULT NULL,
  `shad_no` varchar(225) DEFAULT NULL,
  `ground_date` varchar(155) DEFAULT NULL,
  `docs_rcvd` varchar(225) DEFAULT NULL,
  `time` varchar(155) DEFAULT NULL,
  `agent_code` varchar(155) DEFAULT NULL,
  `line_code` varchar(155) DEFAULT NULL,
  `cost_center` varchar(225) DEFAULT NULL,
  `custom_report` varchar(225) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_000000_create_customers_table', 2),
(6, '2023_07_23_141225_create_extensions_table', 3),
(7, '2023_07_23_142730_create_user_logins_table', 4),
(8, '2023_07_23_143947_create_general_settings_table', 5),
(9, '2023_07_23_153250_create_admins_table', 6),
(10, '2023_07_23_154241_create_admin_notifications_table', 7),
(11, '2023_07_23_155008_create_admin_password_resets_table', 8),
(12, '2023_07_26_172528_create_quotations_table', 9),
(13, '2023_07_26_173255_create_orders_table', 9),
(14, '2023_07_26_173339_create_vectors_table', 9),
(15, '2023_08_30_153916_create_file_transfers_table', 10),
(16, '2023_08_30_154409_create_invoices_table', 11),
(17, '2023_08_30_154503_create_employees_table', 11),
(18, '2023_08_30_154535_create_card_details_table', 11),
(19, '2023_08_30_154620_create_referral_settings_table', 11),
(20, '2023_08_30_154704_create_referral_logs_table', 11),
(21, '2023_08_30_160400_create_payments_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE `milestones` (
  `id` int(11) NOT NULL,
  `type` varchar(225) NOT NULL,
  `job_no` varchar(225) NOT NULL,
  `job_date` varchar(225) NOT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `milestones`
--

INSERT INTO `milestones` (`id`, `type`, `job_no`, `job_date`, `created_at`, `updated_at`) VALUES
(1, 'Job-wise', '54', '2024-06-19', '2024-06-03 04:57:48', '2024-06-03 04:57:48'),
(2, 'Job-wise', '77', '2024-06-10', '2024-06-03 04:58:06', '2024-06-03 04:58:06'),
(3, 'Job-wise', '23', '2024-06-28', '2024-06-03 04:58:18', '2024-06-03 04:58:18'),
(4, 'Milestone-wise', '56', '2024-06-28', '2024-06-03 04:58:33', '2024-06-03 04:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `milestone_documents`
--

CREATE TABLE `milestone_documents` (
  `id` int(11) NOT NULL,
  `milestone_id` int(11) NOT NULL,
  `d_code` varchar(100) DEFAULT NULL,
  `d_name` varchar(225) DEFAULT NULL,
  `d_anticipated` varchar(155) DEFAULT NULL,
  `d_done` varchar(155) DEFAULT NULL,
  `d_date` varchar(155) DEFAULT NULL,
  `d_remarks` text DEFAULT NULL,
  `d_action` text DEFAULT NULL,
  `d_update_on` varchar(225) DEFAULT NULL,
  `d_update_by` varchar(225) DEFAULT NULL,
  `d_update_log` varchar(255) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `milestone_operationals`
--

CREATE TABLE `milestone_operationals` (
  `id` int(11) NOT NULL,
  `milestone_id` int(11) NOT NULL,
  `o_code` varchar(155) DEFAULT NULL,
  `o_name` varchar(225) DEFAULT NULL,
  `o_anticipated` varchar(155) DEFAULT NULL,
  `o_done` varchar(155) DEFAULT NULL,
  `o_date` varchar(155) DEFAULT NULL,
  `o_remarks` text DEFAULT NULL,
  `o_action` text DEFAULT NULL,
  `o_update_on` varchar(225) DEFAULT NULL,
  `o_update_by` varchar(255) DEFAULT NULL,
  `o_update_log` varchar(255) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `pack_code` varchar(225) NOT NULL,
  `default` varchar(100) DEFAULT NULL,
  `pack_name` varchar(225) NOT NULL,
  `std_2digit` varchar(225) DEFAULT NULL,
  `std_3digit` varchar(255) DEFAULT NULL,
  `epas_code` varchar(155) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `pack_code`, `default`, `pack_name`, `std_2digit`, `std_3digit`, `epas_code`, `updated_at`, `created_at`) VALUES
(7, 'BAL', NULL, 'BALES', 'BL', 'BAL', NULL, '2024-05-31 06:39:57', '2024-05-31 06:39:57'),
(10, 'BAG', NULL, 'BAGS', 'BG', 'BAG', NULL, '2024-05-31 06:50:43', '2024-05-31 06:50:43'),
(11, 'BDL', '', 'BUNDLES', 'BE', 'BDL', NULL, '2024-05-31 07:19:19', '2024-05-31 06:51:22'),
(12, 'BK', '', 'BULK', 'BK', 'BLK', NULL, '2024-05-31 12:32:17', '2024-05-31 12:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `party_account_detail`
--

CREATE TABLE `party_account_detail` (
  `id` int(11) NOT NULL,
  `party_basic_id` int(11) NOT NULL,
  `manual_account` varchar(225) DEFAULT NULL,
  `parent_account` varchar(225) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `sale_rep` varchar(155) DEFAULT NULL,
  `doc_rep` varchar(155) DEFAULT NULL,
  `account_rep` varchar(155) DEFAULT NULL,
  `referred_by` varchar(155) DEFAULT NULL,
  `currency` varchar(155) DEFAULT NULL,
  `customer_grp` varchar(225) DEFAULT NULL,
  `sub_type` varchar(225) DEFAULT NULL,
  `sub_type_input` text NOT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `party_account_detail`
--

INSERT INTO `party_account_detail` (`id`, `party_basic_id`, `manual_account`, `parent_account`, `account`, `sale_rep`, `doc_rep`, `account_rep`, `referred_by`, `currency`, `customer_grp`, `sub_type`, `sub_type_input`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PKR', NULL, NULL, 'null', '2024-06-01 09:00:00', '2024-06-01 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `party_ach_bank_detail`
--

CREATE TABLE `party_ach_bank_detail` (
  `id` int(11) NOT NULL,
  `party_basic_id` int(11) NOT NULL,
  `ach_authority` varchar(225) DEFAULT NULL,
  `account_title` varchar(225) DEFAULT NULL,
  `bank` varchar(225) DEFAULT NULL,
  `bank_name` varchar(225) DEFAULT NULL,
  `account_no` varchar(225) DEFAULT NULL,
  `iban` varchar(155) DEFAULT NULL,
  `branch_code` varchar(155) DEFAULT NULL,
  `swift_code` varchar(155) DEFAULT NULL,
  `routing_no` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(155) DEFAULT NULL,
  `micr_code` varchar(155) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `auth_date` varchar(255) DEFAULT NULL,
  `auth_by` varchar(255) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `party_ach_bank_detail`
--

INSERT INTO `party_ach_bank_detail` (`id`, `party_basic_id`, `ach_authority`, `account_title`, `bank`, `bank_name`, `account_no`, `iban`, `branch_code`, `swift_code`, `routing_no`, `ifsc_code`, `micr_code`, `remarks`, `auth_date`, `auth_by`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-01 09:00:00', '2024-06-01 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `party_basic_infos`
--

CREATE TABLE `party_basic_infos` (
  `id` int(11) NOT NULL,
  `party_code` varchar(225) NOT NULL,
  `party_name` varchar(225) NOT NULL,
  `party_inactive` varchar(100) DEFAULT NULL,
  `short_name` varchar(225) DEFAULT NULL,
  `reg_date` varchar(225) DEFAULT NULL,
  `license_no` varchar(225) DEFAULT NULL,
  `contact_person` varchar(155) DEFAULT NULL,
  `ntn` varchar(155) DEFAULT NULL,
  `strn` varchar(155) DEFAULT NULL,
  `address1` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `address3` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zipcode` varchar(50) DEFAULT NULL,
  `tel_1` varchar(100) DEFAULT NULL,
  `tel_2` varchar(100) DEFAULT NULL,
  `facsimile` varchar(155) DEFAULT NULL,
  `mobile` varchar(155) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `acc_dept_email` varchar(255) DEFAULT NULL,
  `operation` varchar(255) DEFAULT NULL,
  `operation_check` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `nomination` varchar(155) DEFAULT NULL,
  `scac_iata_code` varchar(155) DEFAULT NULL,
  `restriction` varchar(155) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `party_basic_infos`
--

INSERT INTO `party_basic_infos` (`id`, `party_code`, `party_name`, `party_inactive`, `short_name`, `reg_date`, `license_no`, `contact_person`, `ntn`, `strn`, `address1`, `address2`, `address3`, `city`, `zipcode`, `tel_1`, `tel_2`, `facsimile`, `mobile`, `website`, `email`, `acc_dept_email`, `operation`, `operation_check`, `Type`, `nomination`, `scac_iata_code`, `restriction`, `created_at`, `updated_at`) VALUES
(1, '1', 'test', NULL, 'test', '2024-06-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'karachi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Operation', '[\"Sea-Export\"]', '[\"Non Operational Party\"]', 'null', NULL, 'null', '2024-06-01 09:00:00', '2024-06-01 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `party_center`
--

CREATE TABLE `party_center` (
  `id` int(11) NOT NULL,
  `party_basic_id` int(11) NOT NULL,
  `company` varchar(225) DEFAULT NULL,
  `default` varchar(100) DEFAULT NULL,
  `cost_center` varchar(255) DEFAULT NULL,
  `distribution` varchar(255) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `party_insurance`
--

CREATE TABLE `party_insurance` (
  `id` int(11) NOT NULL,
  `party_basic_id` int(11) NOT NULL,
  `insurace_company` varchar(255) DEFAULT NULL,
  `insurance_type` varchar(255) DEFAULT NULL,
  `policy_value` varchar(225) DEFAULT NULL,
  `policy_no` varchar(225) DEFAULT NULL,
  `expiry_date` varchar(155) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `party_localize_kyc`
--

CREATE TABLE `party_localize_kyc` (
  `id` int(11) NOT NULL,
  `party_basic_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address1` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `address3` text DEFAULT NULL,
  `kyc_verification` varchar(255) DEFAULT NULL,
  `kyc_date` varchar(255) DEFAULT NULL,
  `kyc_remarks` text DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `party_localize_kyc`
--

INSERT INTO `party_localize_kyc` (`id`, `party_basic_id`, `name`, `address1`, `address2`, `address3`, `kyc_verification`, `kyc_date`, `kyc_remarks`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-01 09:00:00', '2024-06-01 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `party_notifications`
--

CREATE TABLE `party_notifications` (
  `id` int(11) NOT NULL,
  `party_basic_id` int(11) NOT NULL,
  `notification` text DEFAULT NULL,
  `disabled` varchar(100) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `operation_type` varchar(225) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `party_other_info`
--

CREATE TABLE `party_other_info` (
  `id` int(11) NOT NULL,
  `party_basic_id` int(11) NOT NULL,
  `ownership` varchar(255) DEFAULT NULL,
  `affiliated_companies` varchar(255) DEFAULT NULL,
  `fed_id` varchar(255) DEFAULT NULL,
  `business_type` varchar(255) DEFAULT NULL,
  `year_company_establised` varchar(255) DEFAULT NULL,
  `no_of_employee` varchar(255) DEFAULT NULL,
  `est_annual_sales` varchar(255) DEFAULT NULL,
  `d_b` varchar(100) DEFAULT NULL,
  `ntn_name` varchar(255) DEFAULT NULL,
  `buyer_type` varchar(255) DEFAULT NULL,
  `specific_credit_card` varchar(255) DEFAULT NULL,
  `due_days` varchar(155) DEFAULT NULL,
  `credit_unit` varchar(155) DEFAULT NULL,
  `expiry_date` varchar(155) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `party_other_info`
--

INSERT INTO `party_other_info` (`id`, `party_basic_id`, `ownership`, `affiliated_companies`, `fed_id`, `business_type`, `year_company_establised`, `no_of_employee`, `est_annual_sales`, `d_b`, `ntn_name`, `buyer_type`, `specific_credit_card`, `due_days`, `credit_unit`, `expiry_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-01 09:00:00', '2024-06-01 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `subject` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1- Open\r\n2- Sent\r\n3- Gain\r\n4- Loss',
  `amount` varchar(100) NOT NULL DEFAULT '0',
  `payment_term` text DEFAULT NULL,
  `delivery_term` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `assign_to_user` int(11) NOT NULL DEFAULT 0,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposal_qties`
--

CREATE TABLE `proposal_qties` (
  `id` int(11) NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(100) NOT NULL DEFAULT '0',
  `rate` varchar(100) NOT NULL DEFAULT '0',
  `gst_value` varchar(100) NOT NULL DEFAULT '0',
  `total` varchar(100) NOT NULL DEFAULT '0',
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` int(11) NOT NULL,
  `quotation_no` varchar(255) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `expire_date` varchar(50) DEFAULT NULL,
  `route_type` varchar(255) DEFAULT NULL,
  `mode` varchar(255) DEFAULT NULL,
  `operation_type` varchar(255) DEFAULT NULL,
  `cost_center` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `sale_rep` int(11) DEFAULT 0,
  `book_rep` varchar(200) DEFAULT NULL,
  `customer_type` varchar(100) DEFAULT NULL,
  `client` int(11) DEFAULT 0,
  `stage` varchar(155) DEFAULT NULL,
  `pkgs` varchar(155) DEFAULT NULL,
  `unit` varchar(155) DEFAULT NULL,
  `attn_person` varchar(155) DEFAULT NULL,
  `from_person` varchar(155) DEFAULT NULL,
  `gross_wt` varchar(155) DEFAULT NULL,
  `net_wt` varchar(225) DEFAULT NULL,
  `vol_cbm` varchar(225) DEFAULT NULL,
  `commodity` varchar(225) DEFAULT NULL,
  `shipment_size` varchar(225) DEFAULT NULL,
  `inco_term` varchar(225) DEFAULT NULL,
  `wt_unit` varchar(225) DEFAULT NULL,
  `subject` varchar(225) DEFAULT NULL,
  `job_type` varchar(225) DEFAULT NULL,
  `sub_type` varchar(225) DEFAULT NULL,
  `bill_vol` varchar(225) DEFAULT NULL,
  `manual_vol` varchar(225) DEFAULT NULL,
  `vessel` varchar(225) DEFAULT NULL,
  `voyage` varchar(225) DEFAULT NULL,
  `grt` varchar(225) DEFAULT NULL,
  `nrt` varchar(225) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `ex_rate` varchar(10) DEFAULT NULL,
  `cwt_client` varchar(225) DEFAULT NULL,
  `cwt_line` varchar(225) DEFAULT NULL,
  `approval_status` varchar(225) DEFAULT NULL,
  `bank_detail` varchar(225) DEFAULT NULL,
  `total_receivable` varchar(225) DEFAULT NULL,
  `total_payable` varchar(225) DEFAULT NULL,
  `total_profit` varchar(225) DEFAULT NULL,
  `header_footer` text DEFAULT NULL,
  `internal` text DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_details`
--

CREATE TABLE `quotation_details` (
  `id` int(11) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `charges_code` varchar(50) DEFAULT NULL,
  `charges` varchar(50) DEFAULT NULL,
  `charges_desc` varchar(200) DEFAULT NULL,
  `charges_category` varchar(50) DEFAULT NULL,
  `units` varchar(50) DEFAULT NULL,
  `size_type` varchar(50) DEFAULT NULL,
  `good_unit` varchar(50) DEFAULT NULL,
  `rate_group` varchar(50) DEFAULT NULL,
  `mode` varchar(50) DEFAULT NULL,
  `manual` varchar(50) DEFAULT NULL,
  `dg_type` varchar(10) DEFAULT NULL,
  `qty` varchar(10) DEFAULT NULL,
  `rate` varchar(20) DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `ex_rate` varchar(20) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `local_amount` varchar(20) DEFAULT NULL,
  `tax` varchar(20) DEFAULT NULL,
  `inc_tax_amount` varchar(20) DEFAULT NULL,
  `buying_rate` varchar(20) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `payable_to` varchar(50) DEFAULT NULL,
  `buying_remarks` varchar(200) DEFAULT NULL,
  `ord` varchar(20) DEFAULT NULL,
  `tariff_code` varchar(10) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_equipments`
--

CREATE TABLE `quotation_equipments` (
  `id` int(11) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `size_type` varchar(100) DEFAULT NULL,
  `rate_group` varchar(100) DEFAULT NULL,
  `qty` varchar(100) DEFAULT NULL,
  `dg_type` varchar(100) DEFAULT NULL,
  `gross` varchar(100) DEFAULT NULL,
  `tue` varchar(100) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_routings`
--

CREATE TABLE `quotation_routings` (
  `id` int(11) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `po_num` text DEFAULT NULL,
  `ready_date` varchar(100) DEFAULT NULL,
  `ship_date` varchar(100) DEFAULT NULL,
  `arrive_date` varchar(100) DEFAULT NULL,
  `s_c` varchar(155) DEFAULT NULL,
  `service_type` varchar(255) DEFAULT NULL,
  `transit_time` varchar(255) DEFAULT NULL,
  `free_days` text DEFAULT NULL,
  `vendor` varchar(255) DEFAULT NULL,
  `overseas` varchar(255) DEFAULT NULL,
  `sline_carrier` varchar(255) DEFAULT NULL,
  `principal` varchar(255) DEFAULT NULL,
  `other_instruct` text DEFAULT NULL,
  `terminals` text DEFAULT NULL,
  `shipper` varchar(255) DEFAULT NULL,
  `pickup_location` varchar(255) DEFAULT NULL,
  `auto_address` text DEFAULT NULL,
  `custom_clearance` text DEFAULT NULL,
  `port_of_loading` varchar(255) DEFAULT NULL,
  `port_of_discharge` varchar(255) DEFAULT NULL,
  `final_destination` text DEFAULT NULL,
  `drop_off_location` text DEFAULT NULL,
  `auto_address2` text DEFAULT NULL,
  `transportation` text DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `tran_no` varchar(100) NOT NULL,
  `tran_date` varchar(100) NOT NULL,
  `status` varchar(155) NOT NULL,
  `sequence` text DEFAULT NULL,
  `refund` varchar(155) DEFAULT NULL,
  `hbl_no` varchar(155) DEFAULT NULL,
  `advance_balance` varchar(155) DEFAULT NULL,
  `cost_center` varchar(155) DEFAULT NULL,
  `cc_invoice` varchar(225) DEFAULT NULL,
  `total_amount` varchar(225) DEFAULT NULL,
  `client` varchar(225) DEFAULT NULL,
  `code` varchar(225) DEFAULT NULL,
  `currency` varchar(155) DEFAULT NULL,
  `operation` varchar(255) DEFAULT NULL,
  `job_number` varchar(155) DEFAULT NULL,
  `terminal_inv_number` varchar(225) DEFAULT NULL,
  `continue` text DEFAULT NULL,
  `exchange_rate` text DEFAULT NULL,
  `multi_currency` varchar(225) DEFAULT NULL,
  `payment_type` varchar(225) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `code2` varchar(155) DEFAULT NULL,
  `reversal` text DEFAULT NULL,
  `rev_tran_number` text DEFAULT NULL,
  `on_account` text DEFAULT NULL,
  `tax` text DEFAULT NULL,
  `tax_amt` varchar(225) DEFAULT NULL,
  `sub_type` varchar(255) DEFAULT NULL,
  `cheque_no` text DEFAULT NULL,
  `date` varchar(155) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `draw_at` text DEFAULT NULL,
  `invoice_no` varchar(155) DEFAULT NULL,
  `pay_to` text DEFAULT NULL,
  `bank_charges` text DEFAULT NULL,
  `gain_loss_fc` varchar(225) DEFAULT NULL,
  `account1` varchar(225) DEFAULT NULL,
  `account2` varchar(225) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `t_amount` varchar(225) DEFAULT NULL,
  `advance` text DEFAULT NULL,
  `voucher_number` varchar(225) DEFAULT NULL,
  `rf` text DEFAULT NULL,
  `net_received` text DEFAULT NULL,
  `normal` text DEFAULT NULL,
  `security` text DEFAULT NULL,
  `detension` text DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_details`
--

CREATE TABLE `receipt_details` (
  `id` int(11) NOT NULL,
  `receipt_id` varchar(255) NOT NULL,
  `job_no` varchar(100) DEFAULT NULL,
  `invoice_no` varchar(100) DEFAULT NULL,
  `invoice_date` varchar(100) DEFAULT NULL,
  `ref_no` varchar(100) DEFAULT NULL,
  `hbl_no` varchar(100) DEFAULT NULL,
  `mbl_no` varchar(100) DEFAULT NULL,
  `inv_curr` varchar(255) DEFAULT NULL,
  `inv_bal` varchar(255) DEFAULT NULL,
  `rcvd_amount` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `checkbox` varchar(100) DEFAULT NULL,
  `file_no` varchar(255) DEFAULT NULL,
  `container` varchar(255) DEFAULT NULL,
  `index_no` varchar(100) DEFAULT NULL,
  `igm_no` varchar(100) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `date` varchar(100) NOT NULL,
  `assign_user_id` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: Pending\r\n1: Completed',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `type` text NOT NULL,
  `description` text NOT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stuffings`
--

CREATE TABLE `stuffings` (
  `id` int(11) NOT NULL,
  `tran_number` varchar(155) NOT NULL,
  `date` varchar(155) NOT NULL,
  `type1` varchar(255) DEFAULT NULL,
  `type2` varchar(255) DEFAULT NULL,
  `container` varchar(255) DEFAULT NULL,
  `seal_number` varchar(255) DEFAULT NULL,
  `vessel` varchar(255) DEFAULT NULL,
  `overseas_agent` varchar(255) DEFAULT NULL,
  `shipping_line` varchar(255) DEFAULT NULL,
  `sales_rep` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `stuffing_date` varchar(155) DEFAULT NULL,
  `cut_off_date` varchar(155) DEFAULT NULL,
  `port_of_discharge` text DEFAULT NULL,
  `size_type` int(11) DEFAULT NULL,
  `job_number` varchar(155) DEFAULT NULL,
  `voyage` varchar(155) DEFAULT NULL,
  `sailing_date` varchar(155) DEFAULT NULL,
  `delivery` text DEFAULT NULL,
  `print` text DEFAULT NULL,
  `serial_number` text DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stuffings`
--

INSERT INTO `stuffings` (`id`, `tran_number`, `date`, `type1`, `type2`, `container`, `seal_number`, `vessel`, `overseas_agent`, `shipping_line`, `sales_rep`, `remarks`, `stuffing_date`, `cut_off_date`, `port_of_discharge`, `size_type`, `job_number`, `voyage`, `sailing_date`, `delivery`, `print`, `serial_number`, `created_at`, `updated_at`) VALUES
(1, '5543', '2024-05-30', NULL, NULL, 'nnkmmk', NULL, 'nnlkn', 'mklm', 'nlknmkn', 'mnmkl;', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 10:46:12', '2024-05-29 10:46:12'),
(2, '5543', '2024-06-07', NULL, NULL, 'vfdfghg', '14', 'vgff', 'c vfbaX DVQ C', 'VVDF', NULL, 'dfgrtyujttyj c dfbfgb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-31 05:55:35', '2024-05-31 05:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_ip` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vessels`
--

CREATE TABLE `vessels` (
  `id` int(11) NOT NULL,
  `vessel_code` varchar(100) NOT NULL,
  `vessel_name` varchar(200) NOT NULL,
  `ship_id` varchar(255) DEFAULT NULL,
  `owner` varchar(200) DEFAULT NULL,
  `principle_code` varchar(155) DEFAULT NULL,
  `call_sign` varchar(155) DEFAULT NULL,
  `grt` varchar(155) DEFAULT NULL,
  `nrt` varchar(155) DEFAULT NULL,
  `imo_no` varchar(155) DEFAULT NULL,
  `country_registered` varchar(255) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vessels`
--

INSERT INTO `vessels` (`id`, `vessel_code`, `vessel_name`, `ship_id`, `owner`, `principle_code`, `call_sign`, `grt`, `nrt`, `imo_no`, `country_registered`, `created_at`, `updated_at`) VALUES
(1, '1001', 'GSL ELIZABETH', NULL, NULL, NULL, NULL, '27786', NULL, '9308429', 'LIBERIA', '2024-05-27 05:43:05', '2024-05-27 08:16:02'),
(2, '1002', 'INDEPENDENT SPIRIT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 05:43:36', '2024-05-27 05:43:36'),
(4, '1003', 'OLYMPIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 06:08:18', '2024-05-27 07:00:26'),
(5, '1004', 'TS KEELUNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 07:43:37', '2024-05-27 07:43:37'),
(6, '1005', 'NORDLION', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 07:43:49', '2024-05-27 07:43:49'),
(7, '1006', 'X-PRESS KAVERI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 07:44:13', '2024-05-27 07:44:13'),
(8, '1007', 'ADDISON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 07:45:17', '2024-05-27 07:45:17'),
(9, '1008', 'GSL NICOLETTA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 07:45:28', '2024-05-27 07:45:28'),
(10, '1009', 'HANSA EUROPE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 07:46:19', '2024-05-27 07:46:19'),
(11, '1010', 'EXPRESS ARGENTINA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 07:46:41', '2024-05-27 07:46:41'),
(12, '1011', 'SOUNION TRADER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 07:47:00', '2024-05-27 07:47:00'),
(13, '1012', 'WIDE ALPHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 07:47:34', '2024-05-27 07:47:34'),
(14, '1013', 'WADI DUKA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 07:47:52', '2024-05-27 07:47:52'),
(15, '1014', 'X-PRESS SALWEEN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 07:48:03', '2024-05-27 07:48:03'),
(16, '1015', 'NAVIOS BAHAMAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 07:48:18', '2024-05-27 07:48:18'),
(17, '1016', 'BIG BREEZY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 07:48:36', '2024-05-27 07:48:36'),
(31, '1017', 'X PRESS KAILASH', '', '', '', '', '', '', '', '', '2024-05-27 09:13:13', '2024-05-27 09:13:13'),
(32, '1018', 'KHALID IBN AL WALEED', '', '', '', '', '', '', '', '', '2024-05-27 09:13:13', '2024-05-27 09:13:13'),
(33, '1020', 'APL QINGDAO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 09:54:10', '2024-05-27 09:55:59'),
(34, '1021', 'AL ABDALI', '', '', '', '', '', '', '', '', '2024-05-27 10:05:01', '2024-05-27 10:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `voyages`
--

CREATE TABLE `voyages` (
  `id` int(11) NOT NULL,
  `vessel` varchar(255) NOT NULL,
  `voy` varchar(255) NOT NULL,
  `port_of_discharge` varchar(255) DEFAULT NULL,
  `port_of_loading` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `voyages`
--

INSERT INTO `voyages` (`id`, `vessel`, `voy`, `port_of_discharge`, `port_of_loading`, `type`, `created_at`, `updated_at`) VALUES
(3, '31', '071W', NULL, NULL, 'Import', '2024-05-27 08:04:02', '2024-05-28 11:49:06'),
(4, '1', '065W', NULL, NULL, NULL, '2024-05-27 11:03:00', '2024-05-27 11:37:24'),
(5, '6', '012W', NULL, NULL, NULL, '2024-05-27 11:04:40', '2024-05-27 11:40:38'),
(6, '1', '065W', NULL, NULL, 'Export', '2024-05-27 11:06:08', '2024-05-27 11:40:46'),
(7, '4', '024', NULL, NULL, NULL, '2024-05-27 11:41:53', '2024-05-27 11:41:53'),
(8, '12', '098', NULL, NULL, NULL, '2024-05-27 11:48:10', '2024-05-27 11:48:10'),
(9, '31', '012', NULL, NULL, NULL, '2024-05-27 12:20:10', '2024-05-27 12:20:10'),
(10, '10', '018', NULL, NULL, NULL, '2024-05-27 12:21:07', '2024-05-27 12:21:07'),
(11, '7', '011', NULL, NULL, NULL, '2024-05-27 12:21:38', '2024-05-27 12:21:38'),
(12, '17', '072', NULL, NULL, NULL, '2024-05-27 12:22:23', '2024-05-27 12:22:23'),
(13, '17', '074', NULL, NULL, NULL, '2024-05-27 12:22:43', '2024-05-27 12:22:43'),
(14, '16', '089', NULL, NULL, NULL, '2024-05-27 12:24:15', '2024-05-27 12:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `voyage_details`
--

CREATE TABLE `voyage_details` (
  `id` int(11) NOT NULL,
  `voyage_id` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `selling` varchar(255) DEFAULT NULL,
  `buying` varchar(225) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `voyage_details`
--

INSERT INTO `voyage_details` (`id`, `voyage_id`, `currency`, `selling`, `buying`, `created_at`, `updated_at`) VALUES
(1, '7', NULL, NULL, NULL, '2024-05-27 11:41:53', '2024-05-27 11:41:53'),
(2, '8', NULL, NULL, NULL, '2024-05-27 11:48:10', '2024-05-27 11:48:10'),
(3, '9', NULL, NULL, NULL, '2024-05-27 12:20:10', '2024-05-27 12:20:10'),
(4, '10', NULL, NULL, NULL, '2024-05-27 12:21:08', '2024-05-27 12:21:08'),
(5, '11', NULL, NULL, NULL, '2024-05-27 12:21:38', '2024-05-27 12:21:38'),
(6, '12', NULL, NULL, NULL, '2024-05-27 12:22:23', '2024-05-27 12:22:23'),
(7, '13', NULL, NULL, NULL, '2024-05-27 12:22:43', '2024-05-27 12:22:43'),
(8, '14', NULL, NULL, NULL, '2024-05-27 12:24:15', '2024-05-27 12:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `voyage_locals`
--

CREATE TABLE `voyage_locals` (
  `id` int(11) NOT NULL,
  `voyage_id` varchar(255) DEFAULT NULL,
  `code` text DEFAULT NULL,
  `local_port` varchar(225) DEFAULT NULL,
  `arrival_date` varchar(155) DEFAULT NULL,
  `sailing_date` varchar(155) DEFAULT NULL,
  `vir_no` varchar(155) DEFAULT NULL,
  `egm_no` varchar(155) DEFAULT NULL,
  `egm_date` varchar(155) DEFAULT NULL,
  `code2` text DEFAULT NULL,
  `slot_operator` varchar(225) DEFAULT NULL,
  `scn` text DEFAULT NULL,
  `sa_code` text DEFAULT NULL,
  `opening_date` varchar(155) DEFAULT NULL,
  `opening_time` varchar(155) DEFAULT NULL,
  `closing_date` varchar(155) DEFAULT NULL,
  `closing_time` varchar(155) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commodities`
--
ALTER TABLE `commodities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cros`
--
ALTER TABLE `cros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ctrk`
--
ALTER TABLE `ctrk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extensions`
--
ALTER TABLE `extensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incoterms`
--
ALTER TABLE `incoterms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manifests`
--
ALTER TABLE `manifests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milestones`
--
ALTER TABLE `milestones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milestone_documents`
--
ALTER TABLE `milestone_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milestone_operationals`
--
ALTER TABLE `milestone_operationals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_account_detail`
--
ALTER TABLE `party_account_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_ach_bank_detail`
--
ALTER TABLE `party_ach_bank_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_basic_infos`
--
ALTER TABLE `party_basic_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_center`
--
ALTER TABLE `party_center`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_insurance`
--
ALTER TABLE `party_insurance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_localize_kyc`
--
ALTER TABLE `party_localize_kyc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_notifications`
--
ALTER TABLE `party_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_other_info`
--
ALTER TABLE `party_other_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal_qties`
--
ALTER TABLE `proposal_qties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_details`
--
ALTER TABLE `quotation_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_equipments`
--
ALTER TABLE `quotation_equipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_routings`
--
ALTER TABLE `quotation_routings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_details`
--
ALTER TABLE `receipt_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stuffings`
--
ALTER TABLE `stuffings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vessels`
--
ALTER TABLE `vessels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voyages`
--
ALTER TABLE `voyages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voyage_details`
--
ALTER TABLE `voyage_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voyage_locals`
--
ALTER TABLE `voyage_locals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commodities`
--
ALTER TABLE `commodities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cros`
--
ALTER TABLE `cros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ctrk`
--
ALTER TABLE `ctrk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `extensions`
--
ALTER TABLE `extensions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `incoterms`
--
ALTER TABLE `incoterms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manifests`
--
ALTER TABLE `manifests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `milestones`
--
ALTER TABLE `milestones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `milestone_documents`
--
ALTER TABLE `milestone_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `milestone_operationals`
--
ALTER TABLE `milestone_operationals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `party_account_detail`
--
ALTER TABLE `party_account_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `party_ach_bank_detail`
--
ALTER TABLE `party_ach_bank_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `party_basic_infos`
--
ALTER TABLE `party_basic_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `party_center`
--
ALTER TABLE `party_center`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `party_insurance`
--
ALTER TABLE `party_insurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `party_localize_kyc`
--
ALTER TABLE `party_localize_kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `party_notifications`
--
ALTER TABLE `party_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `party_other_info`
--
ALTER TABLE `party_other_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposal_qties`
--
ALTER TABLE `proposal_qties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotation_details`
--
ALTER TABLE `quotation_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotation_equipments`
--
ALTER TABLE `quotation_equipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotation_routings`
--
ALTER TABLE `quotation_routings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt_details`
--
ALTER TABLE `receipt_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stuffings`
--
ALTER TABLE `stuffings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vessels`
--
ALTER TABLE `vessels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `voyages`
--
ALTER TABLE `voyages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `voyage_details`
--
ALTER TABLE `voyage_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `voyage_locals`
--
ALTER TABLE `voyage_locals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
