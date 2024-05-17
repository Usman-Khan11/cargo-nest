-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2024 at 12:40 AM
-- Server version: 10.3.39-MariaDB
-- PHP Version: 8.1.27

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

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'All Purpose', 'All Purpose', '2024-04-09 08:41:21', '2024-04-19 07:01:07');

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

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `code`, `currency`, `name`, `localize_name`, `short_name`, `charges_type`, `order`, `inactive`, `type`, `reporting_group`, `tag`, `printing_name`, `calculation_type`, `tax`, `payable_party_type`, `recevable_party_type`, `c_category`, `created_at`, `updated_at`) VALUES
(1, '123', 'AED', 'usman', 'Anas', 'usu', 'None', NULL, 'In-Active', NULL, NULL, NULL, NULL, 'Per Shipment', '[\"Tax-Payable\",\"Tax On Principal Payment\"]', 'CFS Facility', 'Terminal', NULL, '2024-05-11 08:14:54', '2024-05-11 08:14:54'),
(2, '123', 'PKR', 'Ocean Freight', 'OCEAN FREIGHT', 'OFT', 'Principle', '1', NULL, 'Placement Charges', 'Freight', NULL, 'OCEAN FREIGHT', 'Per Unit', 'null', 'l-Agent', 'Client', NULL, '2024-05-14 12:54:19', '2024-05-14 12:54:19'),
(3, '123', 'PKR', 'Ocean Freight', 'OCEAN FREIGHT', 'OFT', 'Principle', '1', NULL, 'Placement Charges', 'Freight', NULL, 'OCEAN FREIGHT', 'Per Unit', 'null', 'l-Agent', 'Client', NULL, '2024-05-14 12:55:35', '2024-05-14 12:55:35'),
(4, '123', 'PKR', 'Ocean Freight', 'OCEAN FREIGHT', 'OFT', 'Principle', '1', NULL, 'Placement Charges', 'Freight', NULL, 'OCEAN FREIGHT', 'Per Unit', 'null', 'l-Agent', 'Client', NULL, '2024-05-14 12:56:09', '2024-05-14 12:56:09');

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
(11, '1276', 'Khan', NULL, NULL, 'CAR', NULL, 'inactive', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shipping Item', '2024-05-14 13:21:47', '2024-05-14 13:25:18'),
(12, '2315', 'Rehan', '4543', '55', 'GI', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-14 13:22:20', '2024-05-14 13:24:03'),
(13, '123', 'Anas', NULL, NULL, 'GI', NULL, 'inactive', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Warehouse Item', '2024-05-14 13:23:34', '2024-05-14 13:24:29'),
(14, '123', 'Anas', NULL, NULL, 'GI', NULL, 'inactive', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shipping Item', '2024-05-14 13:27:24', '2024-05-14 13:27:24');

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

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `customer_id`, `name`, `address`, `city`, `state`, `country`, `created_at`, `updated_at`) VALUES
(1, 2, 'Dezigns', 'Karachi Pakistan', 'Karachi', 'sindh', 'Pakistan', '2024-04-16 06:49:58', '2024-04-19 07:46:25'),
(2, 1, 'Global', 'Karachi Pakistan', 'Peshawar', 'sindh', 'Pakistan', '2024-04-16 06:51:24', '2024-04-19 07:46:04');

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

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `title`, `company_id`, `status`, `description`, `added_by`, `solution`, `lead_id`, `created_at`, `updated_at`) VALUES
(1, 'abjdsnc', 1, 3, NULL, '1', NULL, 1, '2024-04-17 12:18:20', '2024-04-20 07:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(225) NOT NULL,
  `main_symbol` varchar(155) NOT NULL,
  `unit_symbol` varchar(155) NOT NULL,
  `decimal_portion_digits` varchar(155) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `name`, `main_symbol`, `unit_symbol`, `decimal_portion_digits`, `created_at`, `updated_at`) VALUES
(1, '123', 'United State', 'Dollor', '$', '0.00', '2024-05-11 11:16:36', '2024-05-14 10:52:27');

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

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `phone`, `email`, `city`, `state`, `country`, `status`, `postal_code`, `gst_no`, `created_at`, `updated_at`) VALUES
(1, 'Testing Dezigns', 'Karachi Pakistan', '0215666768', 'gdphp7@gmail.com', 'Pakistan', 'sindh', 'Pakistan', NULL, '73200', '12', '2024-04-06 11:39:46', '2024-04-06 11:39:46'),
(2, 'Ghazi Naseem', '705 7th Floor', '03092474783', 'ghazi.2785@gmail.com', 'Pakistan', NULL, 'Pakistan', '1', '74000', NULL, '2024-04-09 08:31:36', '2024-04-09 08:31:36');

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

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `sender`, `receiver`, `subject`, `content`, `file`, `created_at`, `updated_at`) VALUES
(2, NULL, 'ghazi.2785@gmail.com', 'testing', 'testing', 'assets/img/email/1649333600.jpg', '2024-04-19 09:53:05', '2024-04-19 09:53:05');

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
(1, '123', '60', 'Truck & Trailer', '1245', '1245', '1452', '15', '2024-05-11 10:25:27', '2024-05-14 11:37:34'),
(2, '123', '20', 'Dry Container', NULL, NULL, NULL, NULL, '2024-05-14 12:36:12', '2024-05-14 12:36:12'),
(3, '123', '40', 'Dry Container', NULL, NULL, NULL, NULL, '2024-05-14 12:41:47', '2024-05-14 12:41:47');

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

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `company_id`, `title`, `status`, `source`, `value`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lead 1', 2, 'Email', '5000', 'Lead 1', '1', '2024-04-16 10:43:24', '2024-04-19 08:11:30'),
(2, 2, 'Lead 2', 3, 'Call', '1000', NULL, '1', '2024-04-19 06:21:41', '2024-04-19 08:11:21'),
(3, 1, 'Lead 3', 1, 'Email', '10000', NULL, '1', '2024-04-19 06:22:00', '2024-04-19 08:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
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

INSERT INTO `locations` (`id`, `location`, `location_check`, `co_ordinates`, `inactive`, `latitude`, `state`, `longitude`, `phone_prefix`, `epass_code`, `country_region`, `created_at`, `updated_at`) VALUES
(1, 'satpak.websitedevelopment.com.pk', '[\"country\",\"airport\"]', 'abc', 'In-Active', '450', NULL, '450', NULL, NULL, NULL, '2024-05-11 07:03:49', '2024-05-11 07:03:49'),
(2, 'Pakistan', '[\"country\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-11 09:06:15', '2024-05-11 09:06:15'),
(3, 'Sindh', '[\"country\"]', NULL, 'In-Active', NULL, NULL, '64651', NULL, '535', 'Pakistan', '2024-05-11 09:06:46', '2024-05-14 13:07:25'),
(4, 'Azizabad', '[\"airport\",\"seaport\"]', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-14 11:11:49', '2024-05-14 13:07:19');

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
(1, '123', '', 'Golden Packages', '3542', '3435', '66543', '2024-05-14 12:55:14', '2024-05-11 10:55:57'),
(2, '435', 'default', 'Silver Packages', '23', '455', '6554', '2024-05-14 08:30:09', '2024-05-14 08:30:09'),
(3, '6543', '', 'Moderate', '32', '766', '58793', '2024-05-14 12:55:06', '2024-05-14 11:26:08');

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
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `party_basic_info`
--

CREATE TABLE `party_basic_info` (
  `id` int(11) NOT NULL,
  `short_name` varchar(225) NOT NULL,
  `reg_date` varchar(225) NOT NULL,
  `license_no` varchar(225) NOT NULL,
  `contact_person` varchar(155) NOT NULL,
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

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', NULL, '2000', 2, '2024-04-17 05:24:57', '2024-04-17 05:32:12'),
(2, 'Iphone 11', NULL, '5000', 2, '2024-04-19 07:00:40', '2024-04-19 07:00:40'),
(3, 'ssd', NULL, '4000', 2, '2024-04-19 07:01:26', '2024-04-19 07:01:26'),
(4, 'Graphic Card', NULL, '10000', 2, '2024-04-19 07:01:39', '2024-04-19 07:01:39'),
(5, 'Mouse', NULL, '1000', 2, '2024-04-19 07:01:54', '2024-04-19 07:01:54'),
(6, 'Keyboard', NULL, '1500', 2, '2024-04-19 07:02:04', '2024-04-19 07:02:04');

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

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `lead_id`, `subject`, `description`, `status`, `amount`, `payment_term`, `delivery_term`, `remark`, `assign_to_user`, `created_at`, `updated_at`) VALUES
(1, 2, 'new testing', NULL, 3, '0', NULL, NULL, NULL, 0, '2024-04-30 05:59:06', '2024-04-30 06:23:58');

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

--
-- Dumping data for table `proposal_qties`
--

INSERT INTO `proposal_qties` (`id`, `proposal_id`, `product_id`, `qty`, `rate`, `gst_value`, `total`, `created_at`, `updated_at`) VALUES
(4, 1, 2, '10', '5000', '1000', '51000', '2024-04-30 06:23:58', '2024-04-30 06:23:58');

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
  `cwt_client` varchar(225) DEFAULT NULL,
  `cwt_line` varchar(225) DEFAULT NULL,
  `approval_status` varchar(225) DEFAULT NULL,
  `bank_detail` varchar(225) DEFAULT NULL,
  `total_receivable` varchar(225) DEFAULT NULL,
  `total_payable` varchar(225) DEFAULT NULL,
  `total_profit` varchar(225) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `quotation_no`, `date`, `expire_date`, `route_type`, `mode`, `operation_type`, `cost_center`, `file`, `sale_rep`, `book_rep`, `customer_type`, `client`, `stage`, `pkgs`, `unit`, `attn_person`, `from_person`, `gross_wt`, `net_wt`, `vol_cbm`, `commodity`, `shipment_size`, `inco_term`, `wt_unit`, `subject`, `job_type`, `sub_type`, `bill_vol`, `manual_vol`, `vessel`, `voyage`, `grt`, `nrt`, `cwt_client`, `cwt_line`, `approval_status`, `bank_detail`, `total_receivable`, `total_payable`, `total_profit`, `created_at`, `updated_at`) VALUES
(1, '123', '2024-05-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-03 12:09:26', '2024-05-03 12:09:26');

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

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `title`, `date`, `assign_user_id`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'test', '2024-05-22T10:40', '[\"6\"]', 1, 1, '2024-05-01 05:36:58', '2024-05-01 05:41:18');

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

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2024-05-01 04:23:10', '2024-05-01 05:43:22');

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

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `title`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'abcmd', 'abc', 'abcxyz', '2024-04-09 10:03:52', '2024-04-16 05:51:27');

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
  `owner` varchar(200) NOT NULL,
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

INSERT INTO `vessels` (`id`, `vessel_code`, `vessel_name`, `owner`, `principle_code`, `call_sign`, `grt`, `nrt`, `imo_no`, `country_registered`, `created_at`, `updated_at`) VALUES
(1, '122', 'Anas', 'Usman', '5654', NULL, NULL, NULL, NULL, 'Pakistan', '2024-05-11 06:13:22', '2024-05-14 10:53:26'),
(5, '122', 'Arbabtes', 'Usman', NULL, '1567', NULL, NULL, NULL, NULL, '2024-05-13 11:08:14', '2024-05-14 13:30:38'),
(6, '124', 'asvvva', 'asa', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-14 14:06:03', '2024-05-14 14:06:03'),
(7, '12', 'asjjjasv', 'asknas', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-14 14:06:44', '2024-05-14 14:06:44'),
(8, '13', 'askda;ksvnks', 'akslnal ver', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-14 14:06:59', '2024-05-14 14:06:59'),
(9, '14', 'asm[[wq', 'vkne;ar', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-14 14:07:09', '2024-05-14 14:07:09'),
(10, '15', 'kkklaskvnpke', 'apoeqq', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-14 14:07:17', '2024-05-14 14:07:17'),
(11, '16', 'kkal', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-14 14:07:24', '2024-05-14 14:07:24'),
(12, '17', 'pweqa', 'qwer', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-14 14:07:33', '2024-05-14 14:07:33'),
(13, '18', 'lamsd;alsd', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-14 14:07:41', '2024-05-14 14:07:41'),
(14, '18', 'lamsd;alsd', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-14 14:07:42', '2024-05-14 14:07:42'),
(15, '1854', 'lamsd;alsd', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-14 14:07:42', '2024-05-15 04:11:19'),
(16, '19', 'alsdm;av', 'asad [', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-14 14:07:58', '2024-05-14 14:07:58'),
(17, '20', 'asmla;vkka[osd', 'asav', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-14 14:08:08', '2024-05-14 14:08:08'),
(18, '21', 'll;asdmv[', 'kad', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-14 14:08:16', '2024-05-14 14:08:16'),
(19, '22', 'lams;lvooasd', 'asdfff', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-14 14:08:27', '2024-05-14 14:08:27'),
(20, '23', 'admmmasv', 'asdkkkad', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-14 14:08:51', '2024-05-14 14:08:51'),
(21, '24', 'ajj;a;sdj', 'as;ldamkka', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-14 14:09:10', '2024-05-14 14:09:10'),
(22, '25', 'Anas', 'Usman', '5654', '1567', 'gcv', 'vdff', '4324', 'PAKISTAN', '2024-05-15 04:12:09', '2024-05-15 04:12:09');

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
(1, 'abc', 'abc', 'lkdcn', 'nscdcn', 'Export', '2024-05-14 06:37:55', '2024-05-14 06:37:55'),
(2, 'sjkcnkjfna', 'kljnfn', 'dscnfl', 'kcsnqwnd', 'Export', '2024-05-14 06:40:43', '2024-05-14 06:40:43'),
(3, 'hiring', 'supp', 'sjakn', 'c ammj', 'Both', '2024-05-14 06:42:13', '2024-05-14 10:32:42'),
(4, 'rtruyt', 'iuiuyu', 'lkdcn', 'nscdcn', 'Export', '2024-05-14 06:42:38', '2024-05-14 06:42:38'),
(5, 'qwerty', 'ewiwejn', 'enmkn', 'qsdvmnk', 'Export', '2024-05-14 06:52:10', '2024-05-14 06:52:10'),
(6, 'OLYM', '213', 'ABC', 'ABC', 'Both', '2024-05-14 13:10:10', '2024-05-14 13:31:43'),
(7, 'OLYMPIA', '213', 'ABC', 'ABC', NULL, '2024-05-14 13:10:13', '2024-05-14 13:10:13');

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `party_basic_info`
--
ALTER TABLE `party_basic_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_localize_kyc`
--
ALTER TABLE `party_localize_kyc`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commodities`
--
ALTER TABLE `commodities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `party_account_detail`
--
ALTER TABLE `party_account_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `party_ach_bank_detail`
--
ALTER TABLE `party_ach_bank_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `party_basic_info`
--
ALTER TABLE `party_basic_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `party_localize_kyc`
--
ALTER TABLE `party_localize_kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `party_other_info`
--
ALTER TABLE `party_other_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proposal_qties`
--
ALTER TABLE `proposal_qties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `voyages`
--
ALTER TABLE `voyages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
