-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 04:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abutaleb_vai_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_location_id` int(11) DEFAULT NULL,
  `business_type_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `account_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_amount` decimal(20,2) DEFAULT NULL,
  `contract_person` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_location_id` int(11) DEFAULT NULL,
  `business_type_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_uid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bussiness_type_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `company_uid`, `user_id`, `bussiness_type_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 'Sonny', NULL, '2020-12-07 01:39:35', '2020-12-07 01:39:35'),
(2, 1, 2, 1, 'LG', NULL, '2020-12-07 01:39:48', '2020-12-07 01:39:48'),
(3, 1, 2, 2, 'Manik', 'dfadafdsfsdf', '2020-12-11 02:28:52', '2020-12-11 02:28:52'),
(4, 1, 2, 2, 'construction', 'dfsadfd', '2020-12-11 02:31:41', '2020-12-11 02:31:41'),
(5, 1, 2, 1, 'fgfgf', 'fgfgf', '2020-12-13 21:02:50', '2020-12-13 21:02:50'),
(6, 1, 2, 1, 'Khaza Milk', NULL, '2020-12-14 01:04:25', '2020-12-14 01:04:25'),
(7, 1, 2, 1, 'oil', NULL, '2020-12-14 03:29:53', '2020-12-14 03:29:53'),
(8, 1, 2, 1, 'Others', NULL, '2020-12-14 04:28:59', '2020-12-14 04:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `brunches`
--

CREATE TABLE `brunches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_uid` int(15) DEFAULT NULL,
  `bussiness_type_id` int(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_locations`
--

CREATE TABLE `business_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `landmark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_contract_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_scheme` int(11) DEFAULT NULL,
  `invoice_layout_for_pos` int(11) DEFAULT NULL,
  `invoice_layout_for_sale` int(11) DEFAULT NULL,
  `default_selling_price_group` int(11) DEFAULT NULL,
  `custom_field_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_field_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_field_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_locations`
--

INSERT INTO `business_locations` (`id`, `name`, `location_id`, `branch_id`, `landmark`, `city`, `zip_code`, `state`, `country`, `phone`, `alt_contract_number`, `email`, `website`, `invoice_scheme`, `invoice_layout_for_pos`, `invoice_layout_for_sale`, `default_selling_price_group`, `custom_field_1`, `custom_field_2`, `custom_field_3`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Head Office', '10001', 1, 'Dhaka, Mirpur, Dhaka', 'Dhaka', '1212', 'Dhaka', 'Bangladesh', '0155875422', '025558744', 'ood@gmail.com', 'ooo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business_types`
--

CREATE TABLE `business_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_typies`
--

CREATE TABLE `business_typies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_uid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bussiness_type_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `company_uid`, `user_id`, `bussiness_type_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 'Dry', 'Dry Type Product', '2020-12-07 01:38:41', '2020-12-07 01:38:41'),
(2, 1, 2, 1, 'Oil', NULL, '2020-12-07 01:38:50', '2020-12-07 01:38:50'),
(3, 1, 2, 1, 'Other', NULL, '2020-12-07 01:39:17', '2020-12-07 01:39:17'),
(4, 1, 2, 2, 'Manik', 'adsfds', '2020-12-07 07:36:06', '2020-12-07 07:36:06'),
(5, 1, 2, 2, 'construction', NULL, '2020-12-11 02:48:31', '2020-12-11 02:48:31'),
(6, 1, 2, 1, 'yrdy', 'dfgsf', '2020-12-13 21:02:33', '2020-12-13 21:02:33'),
(7, 1, 2, 1, 'Fish', NULL, '2020-12-16 16:07:27', '2020-12-16 16:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_uid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bussiness_type_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `company_uid`, `user_id`, `bussiness_type_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Red', NULL, NULL, NULL),
(2, 1, 1, 1, 'White', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_2` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_3` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `email_verified_at`, `password`, `gender`, `phone`, `phone_2`, `phone_3`, `blood_group`, `religion`, `id_no`, `company_name`, `address`, `verified`, `deleted_at`, `created_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Walk-in Customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_location_id` int(11) DEFAULT NULL,
  `business_type_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_details`
--

CREATE TABLE `expense_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_location_id` int(11) DEFAULT NULL,
  `business_type_id` int(11) DEFAULT NULL,
  `expense_category_id` int(11) DEFAULT NULL,
  `final_expense_id` int(11) DEFAULT NULL,
  `reference_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_created_date` datetime DEFAULT NULL,
  `sub_total` decimal(20,2) DEFAULT NULL,
  `expense_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_finals`
--

CREATE TABLE `expense_finals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_location_id` int(11) DEFAULT NULL,
  `business_type_id` int(11) DEFAULT NULL,
  `expense_category_id` int(11) DEFAULT NULL,
  `reference_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_date` datetime DEFAULT NULL,
  `others_cost` decimal(20,2) DEFAULT NULL,
  `discount_type` tinyint(4) NOT NULL DEFAULT 1,
  `discount_value` decimal(20,2) DEFAULT NULL,
  `discount_amount` decimal(20,2) DEFAULT NULL,
  `expense_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_stocks`
--

CREATE TABLE `main_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_location_id` int(11) DEFAULT NULL,
  `business_type_id` int(11) DEFAULT NULL,
  `stock_type_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `product_variation_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `available_stock` decimal(65,4) DEFAULT NULL,
  `used_stock` decimal(65,4) DEFAULT NULL,
  `stock_lock_applicable` tinyint(4) NOT NULL DEFAULT 1,
  `stock_lock_quantity` decimal(65,4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_18_164853_create_settings_table', 2),
(5, '2020_11_18_171101_create_business_types_table', 2),
(6, '2020_11_18_172658_create_brunches_table', 3),
(7, '2020_11_18_173540_create_categories_table', 3),
(8, '2020_11_18_173601_create_brands_table', 3),
(9, '2020_11_18_173620_create_units_table', 3),
(10, '2020_11_18_173636_create_weights_table', 3),
(11, '2020_11_18_173705_create_colors_table', 3),
(12, '2020_11_18_173728_create_sizes_table', 3),
(13, '2020_11_18_183814_create_products_table', 4),
(14, '2020_11_18_184236_create_product_images_table', 4),
(16, '2020_12_07_095109_create_suppliers_table', 6),
(17, '2020_12_16_072230_create_sale_finals_table', 7),
(18, '2020_12_16_072335_create_sale_details_table', 7),
(19, '2020_12_16_072715_create_sale_warranty_guarantees_table', 7),
(20, '2020_12_16_072737_create_customers_table', 7),
(21, '2020_11_18_171102_create_business_typies_table', 8),
(22, '2020_11_18_171103_create_companies_table', 8),
(23, '2021_02_07_135310_create_product_variations_table', 9),
(24, '2021_02_07_135358_create_business_locations_table', 9),
(26, '2021_02_07_135649_create_purchase_finals_table', 9),
(27, '2021_02_07_135718_create_purchase_details_table', 9),
(28, '2021_02_07_135719_create_purchase_product_receive_histories_table', 9),
(29, '2021_02_07_135720_create_purchase_statuses_table', 9),
(30, '2021_02_07_135721_create_purchase_final_additional_notes_table', 9),
(31, '2021_02_07_135723_create_purchase_shipping_addresses_table', 9),
(32, '2021_02_07_135552_create_stock_typies_table', 10),
(33, '2021_02_07_135553_create_stocks_table', 10),
(34, '2021_02_07_135554_create_main_stocks_table', 11),
(35, '2021_02_07_135556_create_primary_stocks_table', 11),
(36, '2021_02_07_135557_create_secondary_stocks_table', 11),
(37, '2020_12_16_072716_create_sale_shipping_addresses_table', 12),
(38, '2021_02_08_104957_create_payment_methods_table', 12),
(39, '2021_02_08_105133_create_banks_table', 12),
(40, '2021_02_08_105224_create_accounts_table', 13),
(41, '2021_02_08_105547_create_expense_categories_table', 14),
(42, '2021_02_08_105612_create_expense_finals_table', 14),
(43, '2021_02_08_105653_create_expense_details_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_location_id` int(11) DEFAULT NULL,
  `business_type_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `method` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `business_location_id`, `business_type_id`, `branch_id`, `method`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 'Advance', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, 'Cash', 1, 1, 1, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, 'Bank', 1, 1, 1, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, 'Check', 1, 1, 1, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, 'Card', 1, 1, 1, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, 'Bank Transfer', 1, 1, 1, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, 'Others', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `primary_stocks`
--

CREATE TABLE `primary_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_location_id` int(11) DEFAULT NULL,
  `business_type_id` int(11) DEFAULT NULL,
  `stock_type_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `product_variation_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `available_stock` decimal(65,4) DEFAULT NULL,
  `used_stock` decimal(65,4) DEFAULT NULL,
  `stock_lock_applicable` tinyint(4) NOT NULL DEFAULT 1,
  `stock_lock_quantity` decimal(65,4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `primary_stocks`
--

INSERT INTO `primary_stocks` (`id`, `business_location_id`, `business_type_id`, `stock_type_id`, `company_id`, `stock_id`, `product_variation_id`, `product_id`, `available_stock`, `used_stock`, `stock_lock_applicable`, `stock_lock_quantity`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 2, NULL, 2, 1, 1, '9000.0000', '1000.0000', 1, NULL, 1, 1, 1, NULL, NULL, '2021-02-25 15:53:32', '2021-02-26 06:31:00'),
(2, 1, NULL, 2, NULL, 2, 2, 1, '9000.0000', '1000.0000', 1, NULL, 1, 1, 1, NULL, NULL, '2021-02-25 15:53:32', '2021-02-26 06:31:00'),
(3, 1, NULL, 2, NULL, 2, 3, 2, '0.0000', '12.0000', 1, NULL, 1, 1, 1, NULL, NULL, '2021-02-25 15:53:32', '2021-02-26 06:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_uid` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bussiness_type_id` int(11) DEFAULT NULL,
  `brunch_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `sku` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bar_code` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_uid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_price` decimal(20,3) DEFAULT NULL,
  `whole_sale_price` decimal(20,3) DEFAULT NULL,
  `sale_price` decimal(20,3) DEFAULT NULL,
  `mrp_price` decimal(20,3) DEFAULT NULL,
  `online_sell_price` decimal(20,3) DEFAULT NULL,
  `online_discount_price` decimal(20,3) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `purchase_unit_id` int(11) DEFAULT NULL,
  `sale_unit_id` int(11) DEFAULT NULL,
  `low_sell_qty` decimal(20,3) DEFAULT NULL,
  `low_alert_qty` decimal(20,3) DEFAULT NULL,
  `default_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_period` decimal(4,2) DEFAULT NULL,
  `warranty_period_type` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_value` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guarantee_period` decimal(4,2) DEFAULT NULL,
  `guarantee_period_type` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guarantee_value` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_period` decimal(4,2) DEFAULT NULL,
  `expiry_period_type` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_value` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_discount_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_discount_value` decimal(20,3) DEFAULT NULL,
  `sale_discount_amount` decimal(20,3) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_return` tinyint(11) DEFAULT NULL,
  `tax_type` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `barcode_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `initial_stock` decimal(20,3) DEFAULT NULL,
  `deleted_at` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `company_uid`, `user_id`, `bussiness_type_id`, `brunch_id`, `supplier_id`, `sku`, `bar_code`, `name`, `product_uid`, `product_sku`, `purchase_price`, `whole_sale_price`, `sale_price`, `mrp_price`, `online_sell_price`, `online_discount_price`, `category_id`, `brand_id`, `purchase_unit_id`, `sale_unit_id`, `low_sell_qty`, `low_alert_qty`, `default_photo`, `warranty_period`, `warranty_period_type`, `warranty_value`, `guarantee_period`, `guarantee_period_type`, `guarantee_value`, `expiry_period`, `expiry_period_type`, `expiry_value`, `sale_discount_type`, `sale_discount_value`, `sale_discount_amount`, `description`, `is_return`, `tax_type`, `tax`, `barcode_type`, `initial_stock`, `deleted_at`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 1, 1, 'sugar', '001', 'Sugar', '1', '1', '30.000', '32.000', '35.000', '35.000', '35.000', '0.000', 4, 6, 2, 8, NULL, '5.000', 'public/uploaded/products/5fda3c343855b.png', NULL, NULL, 'NULL', NULL, NULL, 'NULL', '2.00', NULL, '1970-01-01 06:00:00', 'fixed', NULL, NULL, 'testafafas', 1, 1, 1, '1', '20.000', NULL, 1, '2020-12-14 01:28:08', '2020-12-16 16:56:20'),
(2, 1, 2, 1, 1, 1, NULL, '002', 'Egg', '1', '1', '25.000', '28.000', '30.000', '30.000', '30.000', '0.000', 2, 7, 8, 1, '2.000', '5.000', 'public/uploaded/products/5fd731467ccb9.png', '3.00', 'months', '2021-03-14 03:32:54', NULL, NULL, 'NULL', '2.00', 'years', '2022-12-14 03:32:54', 'fixed', NULL, NULL, 'kajdfkalsd', 1, 1, 1, '1', '20.000', NULL, 1, '2020-12-14 09:32:54', '2020-12-14 09:32:54'),
(3, 1, 2, 1, 1, NULL, NULL, '003', 'Product 3', '1', '1', '55.000', '62.000', '65.000', '65.000', '65.000', '0.000', 3, 8, 8, 8, NULL, '2.000', 'public/uploaded/products/5fd73ec3276f3.png', NULL, NULL, 'NULL', NULL, NULL, 'NULL', '5.00', 'months', '2021-05-14 04:30:27', 'fixed', NULL, NULL, 'adsfds', 1, 1, 1, '1', NULL, NULL, 1, '2020-12-14 10:30:27', '2020-12-14 10:30:27'),
(4, 1, 2, 1, 1, 1, NULL, '004', 'Keya Shop', '1', '1', '23.000', '24.000', '25.000', '25.000', '25.000', '0.000', 5, 4, 7, 7, NULL, NULL, NULL, NULL, NULL, 'NULL', NULL, NULL, 'NULL', NULL, NULL, 'NULL', 'fixed', NULL, NULL, NULL, 1, 1, 1, '1', NULL, NULL, 1, '2020-12-14 05:15:11', '2021-02-22 16:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variations`
--

CREATE TABLE `product_variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_type_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `sub_sku` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `weight_id` int(11) DEFAULT NULL,
  `expiry_period` decimal(4,2) DEFAULT NULL,
  `expiry_period_type` enum('days','months','years','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `applicable_for_offer_promo_code` tinyint(4) DEFAULT NULL,
  `promo_code_start_time` datetime DEFAULT NULL,
  `promo_code_end_time` datetime DEFAULT NULL,
  `offer_promo_code_less_amount` decimal(20,2) DEFAULT NULL,
  `offer_promo_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online_sale_price` decimal(20,2) DEFAULT NULL,
  `online_mrp_price` decimal(20,2) DEFAULT NULL,
  `retail_price` decimal(20,2) DEFAULT NULL,
  `whole_sale_price` decimal(20,2) DEFAULT NULL,
  `reseller_price` decimal(20,2) DEFAULT NULL,
  `vip_price` decimal(20,2) DEFAULT NULL,
  `mrp_price` decimal(20,2) DEFAULT NULL,
  `group_sale_price` decimal(20,2) DEFAULT NULL,
  `purchase_unit_price_before_discount` decimal(20,2) DEFAULT NULL,
  `purchase_unit_price_before_tax` decimal(20,2) DEFAULT NULL,
  `purchase_unit_price_inc_tax` decimal(20,2) DEFAULT NULL,
  `default_purchase_price` decimal(20,2) DEFAULT NULL,
  `unit_selling_price_inc_tax` decimal(20,2) DEFAULT NULL,
  `unit_selling_price_exc_tax` decimal(20,2) DEFAULT NULL,
  `default_selling_price` decimal(20,2) DEFAULT NULL,
  `default_purchase_unit_id` int(11) DEFAULT NULL,
  `default_sale_unit_id` int(11) DEFAULT NULL,
  `profit_margin_parcent` decimal(20,2) DEFAULT NULL,
  `profit_amount` decimal(20,2) DEFAULT NULL,
  `warrantity_id` int(11) DEFAULT NULL,
  `grarantee_id` int(11) DEFAULT NULL,
  `alert_quantity` decimal(20,2) DEFAULT NULL,
  `low_sale_quantity` decimal(20,2) DEFAULT NULL,
  `applicable_for_returnable` tinyint(4) DEFAULT NULL,
  `sale_tax_type` tinyint(4) DEFAULT NULL,
  `sale_tax_amount` decimal(20,2) DEFAULT NULL,
  `applicable_tax_for_purchase` tinyint(4) DEFAULT NULL,
  `purchase_tax_type` tinyint(4) DEFAULT NULL,
  `purchase_tax_amount` decimal(20,2) DEFAULT NULL,
  `imei_srl_num_enable_disable_type` tinyint(4) DEFAULT NULL,
  `applicable_sale_type` tinyint(4) DEFAULT NULL,
  `sd` decimal(20,2) DEFAULT NULL,
  `initial_stock` decimal(4,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variations`
--

INSERT INTO `product_variations` (`id`, `business_type_id`, `branch_id`, `product_id`, `sub_sku`, `size_id`, `color_id`, `weight_id`, `expiry_period`, `expiry_period_type`, `supplier_id`, `applicable_for_offer_promo_code`, `promo_code_start_time`, `promo_code_end_time`, `offer_promo_code_less_amount`, `offer_promo_code`, `online_sale_price`, `online_mrp_price`, `retail_price`, `whole_sale_price`, `reseller_price`, `vip_price`, `mrp_price`, `group_sale_price`, `purchase_unit_price_before_discount`, `purchase_unit_price_before_tax`, `purchase_unit_price_inc_tax`, `default_purchase_price`, `unit_selling_price_inc_tax`, `unit_selling_price_exc_tax`, `default_selling_price`, `default_purchase_unit_id`, `default_sale_unit_id`, `profit_margin_parcent`, `profit_amount`, `warrantity_id`, `grarantee_id`, `alert_quantity`, `low_sale_quantity`, `applicable_for_returnable`, `sale_tax_type`, `sale_tax_amount`, `applicable_tax_for_purchase`, `purchase_tax_type`, `purchase_tax_amount`, `imei_srl_num_enable_disable_type`, `applicable_sale_type`, `sd`, `initial_stock`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'ssdd', 2, 1, NULL, '30.00', 'days', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '71.50', NULL, NULL, NULL, NULL, '65.00', '65.00', '65.00', '65.00', '81.25', '81.25', '81.25', 2, 2, NULL, NULL, NULL, NULL, '2.00', '1.00', NULL, NULL, NULL, NULL, NULL, '2.00', NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2021-02-25 15:53:32'),
(2, 1, 1, 1, 'ddss', 1, 2, NULL, NULL, '', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60.50', NULL, NULL, NULL, NULL, '55.00', '55.00', '55.00', '55.00', '68.75', '68.75', '68.75', 2, 2, NULL, NULL, NULL, NULL, '1.00', '2.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2021-02-25 15:53:32'),
(3, 1, 1, 2, 'ddss', NULL, NULL, NULL, NULL, '', 1, 1, NULL, '2021-02-19 16:52:13', '5.00', '017', NULL, NULL, NULL, '99.00', NULL, NULL, NULL, NULL, '90.00', '90.00', '90.00', '90.00', '110.00', '110.00', '110.00', 8, 8, NULL, NULL, NULL, NULL, '1.00', '2.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2021-02-25 15:53:32'),
(4, 1, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '132.00', NULL, NULL, '25.00', NULL, '120.00', '120.00', '120.00', '120.00', '150.00', '150.00', '150.00', 7, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-22 16:38:22', '2021-02-22 16:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_final_id` int(11) DEFAULT NULL,
  `business_location_id` int(11) DEFAULT NULL,
  `business_type_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `stock_type_id` int(11) DEFAULT NULL,
  `reference_no` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chalan_no` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `product_variation_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quanity` decimal(20,2) DEFAULT NULL,
  `purchase_unit_price_before_discount` decimal(20,2) DEFAULT NULL,
  `discount_type` tinyint(4) DEFAULT NULL,
  `discount_value` decimal(20,2) DEFAULT NULL,
  `discount_amount` decimal(20,2) DEFAULT NULL,
  `purchase_unit_price_before_tax` decimal(20,2) DEFAULT NULL,
  `sub_total_before_tax_amount` decimal(20,2) DEFAULT NULL,
  `product_tax` decimal(20,2) DEFAULT NULL,
  `purchase_unit_price_inc_tax` decimal(20,2) DEFAULT NULL,
  `purchase_sub_total_inc_tax_amount` decimal(20,2) DEFAULT NULL,
  `unit_selling_price_inc_tax` decimal(20,2) DEFAULT NULL,
  `unit_selling_price_exc_tax` decimal(20,2) DEFAULT NULL,
  `default_purchase_unit_id` int(11) DEFAULT NULL,
  `default_sale_unit_id` int(11) DEFAULT NULL,
  `profit_margin_parcent` decimal(20,2) DEFAULT NULL,
  `profit_amount` decimal(20,2) DEFAULT NULL,
  `purchase_status_id` int(11) DEFAULT NULL,
  `original_created_status_id` int(11) DEFAULT NULL,
  `purchase_delivery_status_id` int(11) DEFAULT NULL,
  `return_request_status` tinyint(4) DEFAULT NULL,
  `return_request_date` datetime DEFAULT NULL,
  `return_requested_by` int(11) DEFAULT NULL,
  `return_accepted_date` datetime DEFAULT NULL,
  `return_quantity` decimal(20,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `purchase_final_id`, `business_location_id`, `business_type_id`, `branch_id`, `stock_id`, `stock_type_id`, `reference_no`, `invoice_no`, `chalan_no`, `supplier_id`, `product_variation_id`, `product_id`, `quanity`, `purchase_unit_price_before_discount`, `discount_type`, `discount_value`, `discount_amount`, `purchase_unit_price_before_tax`, `sub_total_before_tax_amount`, `product_tax`, `purchase_unit_price_inc_tax`, `purchase_sub_total_inc_tax_amount`, `unit_selling_price_inc_tax`, `unit_selling_price_exc_tax`, `default_purchase_unit_id`, `default_sale_unit_id`, `profit_margin_parcent`, `profit_amount`, `purchase_status_id`, `original_created_status_id`, `purchase_delivery_status_id`, `return_request_status`, `return_request_date`, `return_requested_by`, `return_accepted_date`, `return_quantity`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, 2, 2, '3303wdd', '2021250209163520', 'challladsfdaa', 1, 1, 1, '10.00', '65.00', 1, '0.00', '0.00', '65.00', '650.00', '0.00', '65.00', '650.00', '81.25', '81.25', 2, 2, '25.00', '16.25', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-25 15:53:32', '2021-02-25 15:53:32'),
(2, 1, 1, NULL, NULL, 2, 2, '3303wdd', '2021250209163520', 'challladsfdaa', 1, 2, 1, '10.00', '55.00', 1, '0.00', '0.00', '55.00', '550.00', '0.00', '55.00', '550.00', '68.75', '68.75', 2, 2, '25.00', '13.75', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-25 15:53:32', '2021-02-25 15:53:32'),
(3, 1, 1, NULL, NULL, 2, 2, '3303wdd', '2021250209163520', 'challladsfdaa', 1, 3, 2, '1.00', '90.00', 1, '0.00', '0.00', '90.00', '90.00', '0.00', '90.00', '90.00', '110.00', '110.00', 8, 8, '22.22', '20.00', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-25 15:53:32', '2021-02-25 15:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_finals`
--

CREATE TABLE `purchase_finals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_location_id` int(11) DEFAULT NULL,
  `business_type_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `stock_type_id` int(11) DEFAULT NULL,
  `reference_no` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chalan_no` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `others_cost` decimal(20,2) DEFAULT NULL,
  `discount_type` tinyint(4) DEFAULT NULL,
  `discount_value` decimal(20,2) DEFAULT NULL,
  `discount_amount` decimal(20,2) DEFAULT NULL,
  `purchase_tax_applicable` tinyint(4) DEFAULT NULL,
  `purchase_tax_in_parcent_value` decimal(20,2) DEFAULT NULL,
  `purchase_tax_amount` decimal(20,2) DEFAULT NULL,
  `additional_shipping_charge` decimal(20,2) DEFAULT NULL,
  `purchaes_date` datetime DEFAULT NULL,
  `file` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_status_id` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `purchase_created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_finals`
--

INSERT INTO `purchase_finals` (`id`, `business_location_id`, `business_type_id`, `branch_id`, `stock_id`, `stock_type_id`, `reference_no`, `invoice_no`, `chalan_no`, `supplier_id`, `others_cost`, `discount_type`, `discount_value`, `discount_amount`, `purchase_tax_applicable`, `purchase_tax_in_parcent_value`, `purchase_tax_amount`, `additional_shipping_charge`, `purchaes_date`, `file`, `purchase_status_id`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `purchase_created_by`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 2, 2, '3303wdd', '2021250209163520', 'challladsfdaa', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '2021-02-16 00:00:00', '', 1, 1, 1, 1, NULL, NULL, 2, '2021-02-25 15:53:32', '2021-02-25 15:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_final_additional_notes`
--

CREATE TABLE `purchase_final_additional_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_final_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `business_location_id` int(11) DEFAULT NULL,
  `business_type_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `additional_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_final_additional_notes`
--

INSERT INTO `purchase_final_additional_notes` (`id`, `purchase_final_id`, `supplier_id`, `business_location_id`, `business_type_id`, `branch_id`, `additional_note`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-25 15:53:32', '2021-02-25 15:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product_receive_histories`
--

CREATE TABLE `purchase_product_receive_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_final_id` int(11) DEFAULT NULL,
  `purchase_detail_id` int(11) DEFAULT NULL,
  `business_location_id` int(11) DEFAULT NULL,
  `business_type_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `reference_no` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chalan_no` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `product_variation_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `received_quantity` decimal(20,2) DEFAULT NULL,
  `received_by` int(11) DEFAULT NULL,
  `received_at` datetime DEFAULT NULL,
  `received_from` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_invo_cln_ref_no` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiving_period` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_product_receive_histories`
--

INSERT INTO `purchase_product_receive_histories` (`id`, `purchase_final_id`, `purchase_detail_id`, `business_location_id`, `business_type_id`, `branch_id`, `reference_no`, `invoice_no`, `chalan_no`, `supplier_id`, `product_variation_id`, `product_id`, `received_quantity`, `received_by`, `received_at`, `received_from`, `received_invo_cln_ref_no`, `receiving_period`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL, '3303wdd', '2021250209163520', 'challladsfdaa', 1, 1, 1, '10.00', 2, '2021-02-25 09:53:32', NULL, NULL, 1, 1, 1, 1, NULL, NULL, '2021-02-25 15:53:32', '2021-02-25 15:53:32'),
(2, 1, 2, 1, NULL, NULL, '3303wdd', '2021250209163520', 'challladsfdaa', 1, 2, 1, '10.00', 2, '2021-02-25 09:53:32', NULL, NULL, 1, 1, 1, 1, NULL, NULL, '2021-02-25 15:53:32', '2021-02-25 15:53:32'),
(3, 1, 3, 1, NULL, NULL, '3303wdd', '2021250209163520', 'challladsfdaa', 1, 3, 2, '1.00', 2, '2021-02-25 09:53:32', NULL, NULL, 1, 1, 1, 1, NULL, NULL, '2021-02-25 15:53:32', '2021-02-25 15:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_shipping_addresses`
--

CREATE TABLE `purchase_shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_final_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `business_location_id` int(11) DEFAULT NULL,
  `business_type_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_shipping_addresses`
--

INSERT INTO `purchase_shipping_addresses` (`id`, `purchase_final_id`, `supplier_id`, `business_location_id`, `business_type_id`, `branch_id`, `address`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-02-25 15:53:32', '2021-02-25 15:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_statuses`
--

CREATE TABLE `purchase_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_statuses`
--

INSERT INTO `purchase_statuses` (`id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Ordered & Received (Receive Product)', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Ordered (Receive Product Letter)', 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 'Pending', 1, 1, 1, NULL, NULL, NULL, NULL),
(4, 'Quotation', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sale_details`
--

CREATE TABLE `sale_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_final_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` decimal(20,2) DEFAULT NULL,
  `unit_price` decimal(20,2) DEFAULT NULL,
  `discount_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_value` decimal(20,2) DEFAULT NULL,
  `discount_amount` decimal(20,2) DEFAULT NULL,
  `sub_total` decimal(20,2) DEFAULT NULL,
  `sale_date` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_from_stock_id` int(11) DEFAULT NULL,
  `sale_unit_id` int(11) DEFAULT NULL,
  `sale_type_id` int(11) DEFAULT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_request_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_quantity` decimal(20,2) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `verified` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_details`
--

INSERT INTO `sale_details` (`id`, `sale_final_id`, `customer_id`, `order_no`, `product_id`, `quantity`, `unit_price`, `discount_type`, `discount_value`, `discount_amount`, `sub_total`, `sale_date`, `sale_from_stock_id`, `sale_unit_id`, `sale_type_id`, `description`, `sale_status`, `return_request_status`, `return_quantity`, `created_by`, `verified`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', 3, '8.00', '9.00', 'fixed', '0.00', '0.00', '72.00', '2021-02-25 10:08:50 pm', 2, 5, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2021-02-25 16:50:08', '2021-02-25 16:50:08'),
(2, 2, 1, '2', 3, '4.00', '9.17', 'percentage', '60.00', '22.01', '14.67', '2021-02-26 12:00:31 pm', 2, 5, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2021-02-26 06:31:00', '2021-02-26 06:31:00'),
(3, 2, 1, '2', 1, '1.00', '65.00', 'fixed', '0.00', '0.00', '65.00', '2021-02-26 12:00:31 pm', 2, 2, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2021-02-26 06:31:00', '2021-02-26 06:31:00'),
(4, 2, 1, '2', 2, '1.00', '68.75', 'fixed', '0.00', '0.00', '68.75', '2021-02-26 12:00:31 pm', 2, 2, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2021-02-26 06:31:00', '2021-02-26 06:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `sale_finals`
--

CREATE TABLE `sale_finals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` decimal(20,2) DEFAULT NULL,
  `sub_total` decimal(20,2) DEFAULT NULL,
  `other_cost` decimal(20,2) DEFAULT NULL,
  `discount_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_value` decimal(20,2) DEFAULT NULL,
  `discount_amount` decimal(20,2) DEFAULT NULL,
  `final_total` decimal(20,2) DEFAULT NULL,
  `paid_total` decimal(20,2) DEFAULT NULL,
  `sale_date` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `payment_note` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_received_by` int(11) DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_note` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_request_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_quantity` decimal(20,2) DEFAULT NULL,
  `return_received_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `verified` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_finals`
--

INSERT INTO `sale_finals` (`id`, `customer_id`, `order_no`, `quantity`, `sub_total`, `other_cost`, `discount_type`, `discount_value`, `discount_amount`, `final_total`, `paid_total`, `sale_date`, `payment_method_id`, `account_id`, `payment_note`, `payment_status`, `payment_date`, `payment_received_by`, `status`, `delivery_note`, `delivery_status`, `return_request_status`, `return_quantity`, `return_received_by`, `created_by`, `verified`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '8.00', '72.00', '0.00', NULL, '0.00', '5.00', '70.00', '70.00', '2021-02-25 10:08:50 pm', 1, NULL, NULL, NULL, '2021-02-25 10:08:50 pm', 2, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2021-02-25 16:50:08', '2021-02-25 16:50:08'),
(2, 1, '2', '6.00', '148.42', '0.00', NULL, '0.00', '7.42', '141.00', '141.00', '2021-02-26 12:00:31 pm', 1, NULL, NULL, NULL, '2021-02-26 12:00:31 pm', 2, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2021-02-26 06:31:00', '2021-02-26 06:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `sale_shipping_addresses`
--

CREATE TABLE `sale_shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_final_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `business_location_id` int(11) DEFAULT NULL,
  `business_type_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_warranty_guarantees`
--

CREATE TABLE `sale_warranty_guarantees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_final_id` int(11) DEFAULT NULL,
  `sale_detail_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `sale_date` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_guarantee_type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` decimal(20,2) DEFAULT NULL,
  `identity_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `secondary_stocks`
--

CREATE TABLE `secondary_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_location_id` int(11) DEFAULT NULL,
  `business_type_id` int(11) DEFAULT NULL,
  `stock_type_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `product_variation_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `available_stock` decimal(65,4) DEFAULT NULL,
  `used_stock` decimal(65,4) DEFAULT NULL,
  `stock_lock_applicable` tinyint(4) NOT NULL DEFAULT 1,
  `stock_lock_quantity` decimal(65,4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_uid` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `bussiness_type_id` int(15) NOT NULL,
  `shopname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat_status` int(11) NOT NULL,
  `vat_registration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `print_format` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sms_company` int(11) DEFAULT NULL,
  `sms_api` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_uid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bussiness_type_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `company_uid`, `user_id`, `bussiness_type_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Small', NULL, NULL, NULL),
(2, 1, 1, 1, 'Big', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_location_id` int(11) DEFAULT NULL,
  `business_type_id` int(11) DEFAULT NULL,
  `stock_type_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `business_location_id`, `business_type_id`, `stock_type_id`, `company_id`, `name`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, ' Main Stock , Abdullah Group ', 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 1, 1, 2, 1, ' Showroom  Stock', 1, 1, 1, NULL, NULL, NULL, NULL),
(3, 1, 1, 3, 1, 'Warehouse 01 of Abdullah Group ', NULL, 1, 1, NULL, NULL, NULL, NULL),
(4, 1, 1, 3, 1, 'Warehouse 02 of Abdullah Group ', 1, 1, 1, NULL, NULL, NULL, NULL),
(5, 1, 1, 2, 1, 'Offer stock', 1, 1, 1, NULL, NULL, NULL, NULL),
(6, 1, 1, 2, 1, ' Godown Stock (also sale from here\r\n)', 1, 1, 1, NULL, NULL, NULL, NULL),
(7, 1, 1, 3, 1, 'Stock 1', NULL, 1, 1, NULL, NULL, NULL, NULL),
(8, 1, 1, 3, 1, 'Stock 5', 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_typies`
--

CREATE TABLE `stock_typies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_typies`
--

INSERT INTO `stock_typies` (`id`, `name`, `description`, `status`, `is_active`, `is_verified`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Main Stock', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Showroom Stock (sale from stock)', 'Showroom stock / (Sale Stock)', NULL, 1, 1, NULL, NULL, NULL, NULL),
(3, 'Godown Stock (Not Sale)', 'Warehouse Stock , or gooddown', NULL, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_person` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_due` decimal(20,2) NOT NULL DEFAULT 0.00,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone`, `email`, `contract_person`, `previous_due`, `address`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Manik', '015578452', 'manik@gmail.com', 'Manik', '0.00', 'asdfsdf', 'adfdsf', '2020-12-07 04:52:40', '2020-12-07 04:52:40'),
(2, 'Hasan', '4545457845', 'dsfklj', 'Hasan', '564.00', 'klfjadksjf', 'jadfkjds', '2020-12-07 04:59:19', '2020-12-07 04:59:19'),
(3, 'Ikbal', '465754', NULL, 'ikbal', '0.00', NULL, NULL, '2020-12-07 05:03:01', '2020-12-07 05:03:01'),
(44, 'Rabbi', 'Rabbi', NULL, 'Rabbi', '0.00', NULL, NULL, '2020-12-07 07:11:37', '2020-12-07 07:11:37'),
(45, 'Toooo', 'Tooo', NULL, 'Toooo', '0.00', NULL, NULL, '2020-12-07 07:11:54', '2020-12-07 07:11:54'),
(46, 'Minhaz', 'min', NULL, 'minhaz', '0.00', NULL, NULL, '2020-12-07 07:13:27', '2020-12-07 07:13:27'),
(47, 'Nizim', 'nizma', NULL, 'nizam', '0.00', NULL, NULL, '2020-12-07 07:19:49', '2020-12-07 07:19:49'),
(48, 'NNNNNNN', 'jdfaklsjd', NULL, 'NNNNNNq', '0.00', NULL, NULL, '2020-12-07 07:32:59', '2020-12-07 07:32:59'),
(49, 'Sakib', '904589489', 'sakib@gmial.com', 'Sakib', '478.00', 'jkdsjf', 'jasdkjfksdl', '2020-12-10 22:26:45', '2020-12-10 22:26:45'),
(50, 'Sajid', '9990-9sd', 'sajid@gmail.com', 'sajid', '8909.00', 'asdkjf', 'jjdlsjlfsd', '2020-12-10 22:27:30', '2020-12-10 22:27:30'),
(51, 'Man', 'Man', 'Man', 'Man', '0.00', 'Man', 'Man', '2020-12-11 02:10:15', '2020-12-11 02:10:15'),
(54, 'New Supplier', 'New Supplier', NULL, 'New Supplier', '0.00', 'sadfsdf', 'asdfdf', '2020-12-13 09:09:35', '2020-12-13 09:09:35'),
(55, 'from edit', '4578745', NULL, 'sadjfk', '0.00', NULL, NULL, '2020-12-16 16:27:02', '2020-12-16 16:27:02'),
(56, 'making here', '45784545', 'mak@gmail.com', 'making here', '12500.00', 'kadjfa', 'jadfkjsdkl', '2021-02-08 11:16:35', '2021-02-08 11:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_uid` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bussiness_type_id` int(11) DEFAULT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `parent_cal_result` decimal(20,3) DEFAULT NULL,
  `calculation_value` decimal(20,3) DEFAULT NULL,
  `calculation_result` decimal(20,3) DEFAULT NULL,
  `base_unit_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `company_uid`, `user_id`, `bussiness_type_id`, `full_name`, `short_name`, `parent_id`, `parent_cal_result`, `calculation_value`, `calculation_result`, `base_unit_id`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 'gram', 'gram', 0, '1.000', '1.000', '1.000', 1, NULL, NULL, '2020-12-07 01:37:56', '2021-02-14 14:53:06'),
(2, 1, 2, 1, 'kg', 'kg', 1, '1.000', '1000.000', '1000.000', 1, NULL, NULL, '2020-12-07 01:37:56', '2020-12-07 01:37:56'),
(3, 1, 2, 2, 'mon', 'mon', 2, '1000.000', '40.000', '40000.000', 1, NULL, NULL, '2020-12-11 02:47:24', '2020-12-11 02:47:24'),
(4, 1, 2, 2, 'ton', 'ton', 3, '40000.000', '25.000', '1000000.000', 1, NULL, NULL, '2020-12-11 02:48:41', '2020-12-11 02:48:41'),
(5, 1, 2, 2, 'pice', 'pice', 0, NULL, '1.000', '1.000', 5, NULL, NULL, '2020-12-11 02:57:40', '2020-12-11 02:57:40'),
(6, 1, 2, 1, 'hali', 'hali', 5, '1.000', '4.000', '4.000', 5, NULL, NULL, '2020-12-13 23:29:07', '2020-12-13 23:29:07'),
(7, 1, 2, 1, 'dojon', 'dojon', 5, '1.000', '12.000', '12.000', 5, NULL, NULL, '2020-12-13 23:34:25', '2020-12-13 23:34:25'),
(8, 1, 2, 1, 'dojon', 'dojon', 6, '4.000', '3.000', '12.000', 5, NULL, NULL, '2020-12-14 01:04:54', '2020-12-14 01:04:54'),
(9, 1, 2, 1, 'Kuri', 'Kuri', 6, '4.000', '5.000', '20.000', 5, NULL, NULL, '2020-12-16 16:26:13', '2020-12-16 16:26:13'),
(18, 1, 2, 1, 'Mili LItter', 'ml', 0, NULL, '1.000', '1.000', 18, 'Mili LItter', NULL, '2021-02-22 01:42:23', '2021-02-22 01:42:23'),
(19, 1, 2, 1, 'Litter', 'litter', 18, '1.000', '1000.000', '1000.000', 18, 'Litter', NULL, '2021-02-22 01:43:38', '2021-02-22 01:43:38'),
(20, 1, 2, 1, 'Mili Metter', 'mm', 0, NULL, '1.000', '1.000', 20, 'mili metter', NULL, '2021-02-22 05:23:51', '2021-02-22 05:23:51'),
(21, 1, 2, 1, 'centimetres', 'cm', 20, '1.000', '10.000', '10.000', 20, NULL, NULL, '2021-02-22 05:25:08', '2021-02-22 05:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bussiness_type_id` int(15) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `type` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_uid`, `bussiness_type_id`, `name`, `mobile`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, 'Md Abu Taleb', '01779325718', 'abutalebgmtt@gmail.com', NULL, '$2y$12$tln1TvduZij2Ps3.uNXUCeUIW6p1Q6fPdTc.XuqnXwhOZiurrhqp6', NULL, 1, 1, 1, NULL, NULL),
(2, '1', NULL, 'Moinul Islam', '01712794033', 'moinulibr@gmail.com', NULL, '$2y$12$tln1TvduZij2Ps3.uNXUCeUIW6p1Q6fPdTc.XuqnXwhOZiurrhqp6', NULL, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `weights`
--

CREATE TABLE `weights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_uid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bussiness_type_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weights`
--

INSERT INTO `weights` (`id`, `company_uid`, `user_id`, `bussiness_type_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '500 gm', 'dfd', NULL, NULL),
(2, 1, 1, 1, 'KG', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brunches`
--
ALTER TABLE `brunches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_locations`
--
ALTER TABLE `business_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_types`
--
ALTER TABLE `business_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_typies`
--
ALTER TABLE `business_typies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`),
  ADD UNIQUE KEY `customers_phone_2_unique` (`phone_2`),
  ADD UNIQUE KEY `customers_phone_3_unique` (`phone_3`),
  ADD UNIQUE KEY `customers_id_no_unique` (`id_no`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_details`
--
ALTER TABLE `expense_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_finals`
--
ALTER TABLE `expense_finals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_stocks`
--
ALTER TABLE `main_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `primary_stocks`
--
ALTER TABLE `primary_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_finals`
--
ALTER TABLE `purchase_finals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_final_additional_notes`
--
ALTER TABLE `purchase_final_additional_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_product_receive_histories`
--
ALTER TABLE `purchase_product_receive_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_shipping_addresses`
--
ALTER TABLE `purchase_shipping_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_statuses`
--
ALTER TABLE `purchase_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_finals`
--
ALTER TABLE `sale_finals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_shipping_addresses`
--
ALTER TABLE `sale_shipping_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_warranty_guarantees`
--
ALTER TABLE `sale_warranty_guarantees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `secondary_stocks`
--
ALTER TABLE `secondary_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_typies`
--
ALTER TABLE `stock_typies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_phone,15_unique` (`phone`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brunches`
--
ALTER TABLE `brunches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_locations`
--
ALTER TABLE `business_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_types`
--
ALTER TABLE `business_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_typies`
--
ALTER TABLE `business_typies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_details`
--
ALTER TABLE `expense_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_finals`
--
ALTER TABLE `expense_finals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_stocks`
--
ALTER TABLE `main_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `primary_stocks`
--
ALTER TABLE `primary_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_finals`
--
ALTER TABLE `purchase_finals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_final_additional_notes`
--
ALTER TABLE `purchase_final_additional_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_product_receive_histories`
--
ALTER TABLE `purchase_product_receive_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_shipping_addresses`
--
ALTER TABLE `purchase_shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_statuses`
--
ALTER TABLE `purchase_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sale_finals`
--
ALTER TABLE `sale_finals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sale_shipping_addresses`
--
ALTER TABLE `sale_shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_warranty_guarantees`
--
ALTER TABLE `sale_warranty_guarantees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `secondary_stocks`
--
ALTER TABLE `secondary_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stock_typies`
--
ALTER TABLE `stock_typies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `weights`
--
ALTER TABLE `weights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
