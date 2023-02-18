-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 07:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catagoryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catagoryCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `catagoryName`, `catagoryCode`, `created_at`, `updated_at`) VALUES
(1, 'Apple', '10101', NULL, '2023-01-20 11:59:44'),
(2, 'Orange', '021910', NULL, '2023-01-20 12:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `company_datails`
--

CREATE TABLE `company_datails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `companyName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `companyEmail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_datails`
--

INSERT INTO `company_datails` (`id`, `companyName`, `companyEmail`, `phone`, `address`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'NS Web Soft', 'nswebsoft@gmail.com', '01839317038', 'Companigonj, Noakhali.', '1674125889.jfif', NULL, '2023-01-19 04:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customerName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerPhone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerAddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custoPrevBalance` decimal(10,2) NOT NULL,
  `customerCurrentBalance` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customerName`, `customerEmail`, `customerPhone`, `customerAddress`, `note`, `custoPrevBalance`, `customerCurrentBalance`, `created_at`, `updated_at`) VALUES
(1, 'Shuvo Talukder', 'shuvo@gmail.com', '01839317038', 'Sadar, Feni.', 'Nothing to note', '0.00', '3000.00', '2023-01-20 11:58:08', '2023-01-20 12:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `customer_ledgers`
--

CREATE TABLE `customer_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customerID` int(11) NOT NULL,
  `customerName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `particular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchaseAmount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `paidAmount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `totalBalance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_ledgers`
--

INSERT INTO `customer_ledgers` (`id`, `customerID`, `customerName`, `invNumber`, `paymentDate`, `particular`, `purchaseAmount`, `paidAmount`, `totalBalance`, `created_at`, `updated_at`) VALUES
(1, 1, 'Shuvo Talukder', '34556', '2023-01-11', '0', '3250.00', '250.00', '3000.00', '2023-01-20 12:17:03', '2023-01-20 12:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment_lists`
--

CREATE TABLE `customer_payment_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salesShortID` int(11) NOT NULL DEFAULT 0,
  `invNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '------',
  `customerID` int(11) NOT NULL,
  `customerName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transactionMethod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '------',
  `custPrevBalance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `paymentAmount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `duesAmount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `custCurrBalance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '------',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_payment_lists`
--

INSERT INTO `customer_payment_lists` (`id`, `salesShortID`, `invNumber`, `customerID`, `customerName`, `paymentDate`, `transactionMethod`, `custPrevBalance`, `paymentAmount`, `duesAmount`, `custCurrBalance`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, '34556', 1, 'Shuvo Talukder', '2023-01-11', 'Bkash', '0.00', '250.00', '3000.00', '3000.00', 'Nothing to note', '2023-01-20 12:17:03', '2023-01-20 12:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_07_153651_create_suppliers_table', 1),
(6, '2023_01_11_033434_create_catagories_table', 1),
(7, '2023_01_11_053358_create_customers_table', 1),
(8, '2023_01_13_160618_create_subcatagories_table', 1),
(12, '2023_01_14_075112_create_products_table', 3),
(13, '2023_01_15_033408_create_purchases_table', 4),
(15, '2023_01_15_045828_create_purchase_shorts_table', 5),
(16, '2023_01_17_052215_create_supplier_payment_lists_table', 6),
(18, '2023_01_17_061705_create_supplier_ledgers_table', 7),
(19, '2023_01_12_130149_create_company_datails_table', 8),
(21, '2023_01_15_032856_create_sales_table', 9),
(22, '2023_01_18_072702_create_customer_ledgers_table', 10),
(23, '2023_01_18_073111_create_customer_payment_lists_table', 10),
(25, '2023_01_18_073401_create_sales_shorts_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `productName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productCode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subCategoryId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productRate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stockBalance` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `productCode`, `categoryId`, `subCategoryId`, `productRate`, `stockBalance`, `created_at`, `updated_at`) VALUES
(1, 'Apple', '4444666666', '1', '1', '220', '20', NULL, '2023-01-21 13:32:41'),
(2, 'Orange', '777', '1', '1', '250', '5', NULL, '2023-01-20 12:17:03'),
(3, 'Mango', '345654', '2', '2', '200', '10', NULL, '2023-01-20 12:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchaseShortID` int(11) NOT NULL,
  `productID` bigint(20) UNSIGNED NOT NULL,
  `prodCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchaseDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplierID` int(11) NOT NULL,
  `supplierName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodQty` int(11) NOT NULL,
  `prodRate` decimal(8,2) NOT NULL,
  `totalPrice` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `purchaseShortID`, `productID`, `prodCode`, `invNumber`, `purchaseDate`, `supplierID`, `supplierName`, `prodQty`, `prodRate`, `totalPrice`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '4444', '34556', '2023-01-01', 1, 'Nowab Shorif', 10, '220.00', '2200.00', '2023-01-20 12:07:10', '2023-01-20 12:07:10'),
(2, 2, 1, '4444', '5555', '2023-01-19', 1, 'Nowab Shorif', 10, '220.00', '2200.00', '2023-01-20 12:08:07', '2023-01-20 12:08:07'),
(3, 2, 2, '777', '5555', '2023-01-19', 1, 'Nowab Shorif', 10, '250.00', '2500.00', '2023-01-20 12:08:07', '2023-01-20 12:08:07'),
(4, 2, 3, '345654', '5555', '2023-01-19', 1, 'Nowab Shorif', 10, '200.00', '2000.00', '2023-01-20 12:08:07', '2023-01-20 12:08:07'),
(5, 2, 1, '4444', '34556', '2023-01-20', 1, 'Nowab Shorif', 10, '220.00', '2200.00', '2023-01-20 12:15:57', '2023-01-20 12:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_shorts`
--

CREATE TABLE `purchase_shorts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchaseSID` int(11) NOT NULL,
  `invNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplierName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchaseDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grandTotal` decimal(10,2) NOT NULL,
  `paidAmount` decimal(10,2) NOT NULL,
  `duesAmount` decimal(10,2) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '------',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_shorts`
--

INSERT INTO `purchase_shorts` (`id`, `purchaseSID`, `invNumber`, `supplierName`, `purchaseDate`, `grandTotal`, `paidAmount`, `duesAmount`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, '34556', 'Nowab Shorif', '2023-01-01', '2200.00', '1000.00', '1200.00', 'Nothing to note', '2023-01-20 12:07:10', '2023-01-20 12:07:10'),
(2, 2, '5555', 'Nowab Shorif', '2023-01-19', '6700.00', '3700.00', '3000.00', 'Nothing to note', '2023-01-20 12:08:07', '2023-01-20 12:08:07'),
(3, 2, '34556', 'Nowab Shorif', '2023-01-20', '2200.00', '200.00', '2000.00', 'Nothing to note', '2023-01-20 12:15:57', '2023-01-20 12:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salesSID` int(11) NOT NULL,
  `invNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerID` int(11) NOT NULL,
  `customerName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchaseDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proID` bigint(20) UNSIGNED NOT NULL,
  `prodCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodQty` int(11) NOT NULL,
  `prodRate` decimal(8,2) NOT NULL,
  `totalPrice` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `salesSID`, `invNumber`, `customerID`, `customerName`, `purchaseDate`, `proID`, `prodCode`, `prodQty`, `prodRate`, `totalPrice`, `created_at`, `updated_at`) VALUES
(1, 1, '34556', 1, 'Shuvo Talukder', '2023-01-11', 1, '4444', 10, '220.00', '2000.00', '2023-01-20 12:17:03', '2023-01-20 12:17:03'),
(2, 1, '34556', 1, 'Shuvo Talukder', '2023-01-11', 2, '777', 5, '250.00', '1250.00', '2023-01-20 12:17:03', '2023-01-20 12:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `sales_shorts`
--

CREATE TABLE `sales_shorts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salesShortID` int(11) NOT NULL,
  `invNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salesDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grandTotal` decimal(10,2) NOT NULL,
  `paidAmount` decimal(10,2) NOT NULL,
  `duesAmount` decimal(10,2) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '------',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_shorts`
--

INSERT INTO `sales_shorts` (`id`, `salesShortID`, `invNumber`, `customerName`, `salesDate`, `grandTotal`, `paidAmount`, `duesAmount`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, '34556', 'Shuvo Talukder', '2023-01-11', '3250.00', '250.00', '3000.00', 'Nothing to note', '2023-01-20 12:17:03', '2023-01-20 12:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `subcatagories`
--

CREATE TABLE `subcatagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catagoryID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subCatagoryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subCatagoryCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcatagories`
--

INSERT INTO `subcatagories` (`id`, `catagoryID`, `subCatagoryName`, `subCatagoryCode`, `created_at`, `updated_at`) VALUES
(1, '1', 'White Apple', '444', NULL, '2023-01-20 12:00:31'),
(2, '2', 'Chaina orange', '333', NULL, '2023-01-20 12:00:57'),
(3, '1', 'Bangladeshi', '449944', NULL, NULL),
(4, '2', 'Bangladeshi', '6666', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplierName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplierEmail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplierPhone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplierAddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplierprevioustBalance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplierCurrentBalance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplierName`, `supplierEmail`, `supplierPhone`, `supplierAddress`, `note`, `supplierprevioustBalance`, `supplierCurrentBalance`, `created_at`, `updated_at`) VALUES
(1, 'Nowab Shorif', 'nsanoman@gmail.com', '01839317038', 'Companigonj, Noakhali.', 'Nothing to note', '3000', '5000', NULL, '2023-01-20 12:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_ledgers`
--

CREATE TABLE `supplier_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplierID` int(11) NOT NULL,
  `supplierName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `particular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supPrevBal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `paymentAmount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `totalBalance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_ledgers`
--

INSERT INTO `supplier_ledgers` (`id`, `supplierID`, `supplierName`, `invNumber`, `paymentDate`, `particular`, `supPrevBal`, `paymentAmount`, `totalBalance`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nowab Shorif', '34556', '2023-01-01', '0', '2200.00', '1000.00', '0.00', '2023-01-20 12:07:10', '2023-01-20 12:07:10'),
(2, 1, 'Nowab Shorif', '5555', '2023-01-19', '0', '6700.00', '3700.00', '0.00', '2023-01-20 12:08:07', '2023-01-20 12:08:07'),
(3, 1, 'Nowab Shorif', '0', '01-12-2022', 'Bkash', '0.00', '1200.00', '0.00', '2023-01-20 12:11:04', '2023-01-20 12:11:04'),
(4, 1, 'Nowab Shorif', '34556', '2023-01-20', '0', '2200.00', '200.00', '0.00', '2023-01-20 12:15:57', '2023-01-20 12:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payment_lists`
--

CREATE TABLE `supplier_payment_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchaseSID` int(11) NOT NULL DEFAULT 0,
  `invNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplierID` int(11) NOT NULL,
  `supplierName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transactionMethod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `supplierPrevBalance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `paymentAmount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `duesAmount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `supplierCurrentBalance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '---',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_payment_lists`
--

INSERT INTO `supplier_payment_lists` (`id`, `purchaseSID`, `invNumber`, `supplierID`, `supplierName`, `paymentDate`, `transactionMethod`, `supplierPrevBalance`, `paymentAmount`, `duesAmount`, `supplierCurrentBalance`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, '34556', 1, 'Nowab Shorif', '2023-01-01', 'Bkash', '0.00', '1000.00', '1200.00', '1200.00', 'Nothing to note', '2023-01-20 12:07:10', '2023-01-20 12:07:10'),
(2, 2, '5555', 1, 'Nowab Shorif', '2023-01-19', 'Bkash', '1200.00', '3700.00', '3000.00', '4200.00', 'Nothing to note', '2023-01-20 12:08:07', '2023-01-20 12:08:07'),
(3, 0, '0', 1, 'Nowab Shorif', '01-12-2022', 'Bkash', '4200.00', '1200.00', '0.00', '3000.00', '---', '2023-01-20 12:11:04', '2023-01-20 12:11:04'),
(4, 2, '34556', 1, 'Nowab Shorif', '2023-01-20', 'Bkash', '3000.00', '200.00', '2000.00', '5000.00', 'Nothing to note', '2023-01-20 12:15:57', '2023-01-20 12:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$2VqKXpmVnR9zTKYkVdoD/.Aw3OWyMIE396uaKVBzqJ7WC7Kf43ZcS', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_datails`
--
ALTER TABLE `company_datails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_ledgers`
--
ALTER TABLE `customer_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_payment_lists`
--
ALTER TABLE `customer_payment_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_productid_foreign` (`productID`);

--
-- Indexes for table `purchase_shorts`
--
ALTER TABLE `purchase_shorts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_proid_foreign` (`proID`);

--
-- Indexes for table `sales_shorts`
--
ALTER TABLE `sales_shorts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcatagories`
--
ALTER TABLE `subcatagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_ledgers`
--
ALTER TABLE `supplier_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_payment_lists`
--
ALTER TABLE `supplier_payment_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_datails`
--
ALTER TABLE `company_datails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_ledgers`
--
ALTER TABLE `customer_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_payment_lists`
--
ALTER TABLE `customer_payment_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase_shorts`
--
ALTER TABLE `purchase_shorts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales_shorts`
--
ALTER TABLE `sales_shorts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcatagories`
--
ALTER TABLE `subcatagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier_ledgers`
--
ALTER TABLE `supplier_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier_payment_lists`
--
ALTER TABLE `supplier_payment_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_productid_foreign` FOREIGN KEY (`productID`) REFERENCES `products` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_proid_foreign` FOREIGN KEY (`proID`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
