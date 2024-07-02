-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2024 at 03:46 PM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marthash_dpodjok-garden`
--

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

CREATE TABLE `absences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `reason` enum('izin','sakit','libur') NOT NULL,
  `status` enum('pending','confirmed','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absences`
--

INSERT INTO `absences` (`id`, `employee_id`, `start_date`, `end_date`, `reason`, `status`, `created_at`, `updated_at`, `keterangan`, `catatan`) VALUES
(1, 3, '2024-06-04 00:39:00', '2024-06-05 00:39:00', 'izin', 'rejected', '2024-06-02 17:39:31', '2024-06-18 14:33:11', 'Operasi Lasik', NULL),
(2, 1, '2024-06-11 18:40:00', '2024-06-12 18:40:00', 'sakit', 'pending', '2024-06-11 11:41:07', '2024-06-11 11:41:07', 'Magh', NULL),
(3, 1, '2024-06-12 18:43:00', '2024-06-12 18:43:00', 'sakit', 'pending', '2024-06-11 11:43:52', '2024-06-11 11:43:52', 'Magh', NULL),
(4, 1, '2024-06-12 18:43:00', '2024-06-12 18:43:00', 'sakit', 'pending', '2024-06-11 11:44:08', '2024-06-11 11:44:08', 'magh', NULL),
(5, 2, '2024-06-18 14:24:00', '2024-06-19 14:24:00', 'libur', 'pending', '2024-06-16 07:25:06', '2024-06-16 07:25:06', 'Operasi Lasik', NULL),
(6, 2, '2024-06-18 21:29:00', '2024-06-20 21:29:00', 'sakit', 'pending', '2024-06-18 14:29:17', '2024-06-18 14:29:17', '33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `active_q_r_s`
--

CREATE TABLE `active_q_r_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `active_q_r_s`
--

INSERT INTO `active_q_r_s` (`id`, `code`, `isActive`, `created_at`, `updated_at`) VALUES
(1, '1718721007-1718721012-PyCyQiQZnU0U9x6eASNd', 0, '2024-06-02 11:28:05', '2024-06-18 14:30:07');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `method` enum('qr','confirmation') NOT NULL DEFAULT 'qr',
  `date` datetime NOT NULL,
  `time` time NOT NULL,
  `type` enum('in','out') NOT NULL,
  `status` enum('confirmed','pending','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_id`, `method`, `date`, `time`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'qr', '2024-06-02 00:00:00', '22:17:40', 'in', 'confirmed', '2024-06-02 15:17:40', '2024-06-02 15:17:40'),
(2, 2, 'qr', '2024-06-02 00:00:00', '22:18:01', 'out', 'confirmed', '2024-06-02 15:18:01', '2024-06-02 15:18:01'),
(3, 3, 'confirmation', '2024-06-03 00:00:00', '00:39:13', 'in', 'pending', '2024-06-02 17:39:13', '2024-06-02 17:39:13'),
(4, 1, 'qr', '2024-06-11 00:00:00', '18:06:30', 'in', 'confirmed', '2024-06-11 11:06:30', '2024-06-11 11:06:30'),
(5, 1, 'confirmation', '2024-06-11 00:00:00', '18:30:31', 'in', 'pending', '2024-06-11 11:30:31', '2024-06-11 11:30:31'),
(6, 2, 'confirmation', '2024-06-12 00:00:00', '19:38:55', 'in', 'pending', '2024-06-12 12:38:55', '2024-06-12 12:38:55'),
(7, 2, 'confirmation', '2024-06-16 00:00:00', '13:30:19', 'in', 'pending', '2024-06-16 06:30:19', '2024-06-16 06:30:19'),
(8, 2, 'confirmation', '2024-06-16 00:00:00', '13:50:50', 'in', 'pending', '2024-06-16 06:50:50', '2024-06-16 06:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jml_produk` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `created_at`, `updated_at`, `user_id`, `jml_produk`) VALUES
(1, '2024-06-02 08:13:58', '2024-06-02 08:13:58', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `hourly_rate` int(11) DEFAULT NULL,
  `contract_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `nama`, `alamat`, `telepon`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'pelanggan', 'Subang', '0853-1427-3819', 6, '2024-06-02 06:56:28', '2024-06-16 10:31:25'),
(4, 'Diah Rahman', 'Indonesia', '088', 16, '2024-06-02 18:02:33', '2024-06-02 18:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `detail_carts`
--

CREATE TABLE `detail_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_carts`
--

INSERT INTO `detail_carts` (`id`, `created_at`, `updated_at`, `cart_id`, `product_id`, `jumlah`) VALUES
(4, '2024-06-02 17:56:03', '2024-06-16 14:12:39', 1, 4, 4),
(5, '2024-06-02 18:01:04', '2024-06-11 15:30:41', 1, 6, 2),
(7, '2024-06-10 14:09:29', '2024-06-11 15:38:54', 1, 7, 1),
(8, '2024-06-13 11:52:45', '2024-06-13 11:57:49', 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_orders`
--

CREATE TABLE `detail_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `harga` bigint(20) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_orders`
--

INSERT INTO `detail_orders` (`id`, `order_id`, `product_id`, `jumlah`, `nama`, `deskripsi`, `image`, `harga`, `total_harga`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, 1, 'French Fries', 'Makanan Ringan', '1717316117-produk.jpg', 18000, 18000, NULL, '2024-06-02 09:00:05', '2024-06-02 09:00:05'),
(2, 5, 4, 1, 'Roti Bakar', 'Makanan Ringan', '1717316210-produk.jpg', 18000, 18000, NULL, '2024-06-02 09:13:11', '2024-06-02 09:13:11'),
(3, 6, 2, 1, 'Mango', 'Minuman', '1717316250.jpg', 18000, 18000, '', '2024-06-02 17:21:39', '2024-06-02 17:21:39'),
(4, 6, 4, 1, 'Roti Bakar', 'Makanan Ringan', '1717316210-produk.jpg', 18000, 18000, '', '2024-06-02 17:21:39', '2024-06-02 17:21:39'),
(5, 6, 6, 1, 'Strawberry Milk', 'Minuman susu', '1717348340-produk.jpg', 10000, 10000, '', '2024-06-02 17:21:39', '2024-06-02 17:21:39'),
(6, 7, 2, 2, 'Mango', 'Minuman', '1717316250.jpg', 18000, 36000, '', '2024-06-02 17:22:49', '2024-06-02 17:22:49'),
(7, 8, 4, 1, 'Roti Bakar', 'Makanan Ringan', '1717316210-produk.jpg', 18000, 18000, NULL, '2024-06-02 17:33:39', '2024-06-02 17:33:39'),
(8, 9, 6, 1, 'Strawberry Milk', 'Minuman susu', '1717348340-produk.jpg', 10000, 10000, '', '2024-06-02 17:36:02', '2024-06-02 17:36:02'),
(9, 9, 4, 1, 'Roti Bakar', 'Makanan Ringan', '1717316210-produk.jpg', 18000, 18000, '', '2024-06-02 17:36:02', '2024-06-02 17:36:02'),
(10, 10, 2, 1, 'Mango', 'Minuman', '1717316250.jpg', 18000, 18000, '', '2024-06-02 18:15:59', '2024-06-02 18:15:59'),
(11, 10, 4, 1, 'Roti Bakar', 'Makanan Ringan', '1717316210-produk.jpg', 18000, 18000, '', '2024-06-02 18:15:59', '2024-06-02 18:15:59'),
(12, 10, 6, 1, 'Strawberry Milk', 'Minuman susu', '1717348340-produk.jpg', 10000, 10000, '', '2024-06-02 18:15:59', '2024-06-02 18:15:59'),
(13, 11, 2, 1, 'Mango', 'Minuman', '1717316250.jpg', 18000, 18000, '', '2024-06-02 18:16:17', '2024-06-02 18:16:17'),
(14, 11, 4, 1, 'Roti Bakar', 'Makanan Ringan', '1717316210-produk.jpg', 18000, 18000, '', '2024-06-02 18:16:17', '2024-06-02 18:16:17'),
(15, 11, 6, 1, 'Strawberry Milk', 'Minuman susu', '1717348340-produk.jpg', 10000, 10000, '', '2024-06-02 18:16:17', '2024-06-02 18:16:17'),
(16, 12, 2, 1, 'Mango', 'Minuman', '1717932496.jpg', 18000, 18000, NULL, '2024-06-10 14:09:15', '2024-06-10 14:09:15'),
(17, 13, 4, 3, 'Roti Bakar', 'Makanan Ringan', '1717316210-produk.jpg', 18000, 54000, '', '2024-06-11 13:58:13', '2024-06-11 13:58:13'),
(18, 14, 4, 1, 'Roti Bakar', 'Makanan Ringan', '1717316210-produk.jpg', 18000, 18000, '', '2024-06-11 14:49:14', '2024-06-11 14:49:14'),
(19, 14, 2, 1, 'Mango', 'Minuman', '1717932496.jpg', 18000, 18000, '', '2024-06-11 14:49:14', '2024-06-11 14:49:14'),
(20, 15, 4, 1, 'Roti Bakar', 'Makanan Ringan', '1717316210-produk.jpg', 18000, 18000, '', '2024-06-11 14:59:11', '2024-06-11 14:59:11'),
(22, 15, 8, 5, 'French Fries', 'Goreng kentang dengan taburan bubuk cabai dan juga saos', '1717932681-produk.jpg', 13000, 65000, '', '2024-06-11 16:08:43', '2024-06-11 16:15:23'),
(23, 16, 2, 2, 'Mango', 'Minuman', '1717932496.jpg', 18000, 36000, '', '2024-06-11 16:51:28', '2024-06-11 16:51:28'),
(24, 17, 6, 1, 'Matcha Flavour', 'Minuman susu', '1717932524.jpg', 10000, 10000, '', '2024-06-12 03:35:50', '2024-06-12 03:35:50'),
(25, 18, 4, 2, 'Roti Bakar', 'Makanan Ringan', '1717316210-produk.jpg', 18000, 36000, '', '2024-06-12 04:23:42', '2024-06-12 04:23:42'),
(26, 19, 2, 1, 'Mango', 'Minuman', '1717932496.jpg', 18000, 18000, 'Less Sugar', '2024-06-12 07:00:57', '2024-06-12 07:00:57'),
(27, 20, 2, 1, 'Mango', 'Minuman', '1717932496.jpg', 18000, 18000, 'Less Sugar', '2024-06-12 07:01:21', '2024-06-12 07:01:21'),
(28, 21, 4, 1, 'Roti Bakar', 'Makanan Ringan', '1717316210-produk.jpg', 18000, 18000, NULL, '2024-06-13 12:38:17', '2024-06-13 12:38:17'),
(29, 22, 2, 1, 'Mango', 'Minuman', '1717932496.jpg', 18000, 18000, NULL, '2024-06-13 12:49:57', '2024-06-13 12:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pegawai` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `id_pegawai`, `email`, `password`, `nama`, `alamat`, `telepon`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', 'admin@email.com', '$2y$12$dA7liNrBb.YBLyeQbVL3s.9JmZKwNGTJF3MWldKABch0b1ZPQxI4.', 'admin', NULL, NULL, 1, '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(2, '2', 'kasir@email.com', '$2y$12$yiPyw9hVXnBncOpRgYv/lu0O9e19jJ3Wjc.tHjXMtmTLGsoN3z64K', 'kasir', NULL, NULL, 2, '2024-06-02 06:56:27', '2024-06-16 09:50:28'),
(3, '3', 'koki@email.com', '$2y$12$rzY0y2dINFtrDKieZK14r.BfHH7YiAsm4lOiotwrWLx5X5.0/b7eG', 'koki', NULL, NULL, 3, '2024-06-02 06:56:27', '2024-06-02 06:56:27'),
(4, '4', 'pelayan@email.com', '$2y$12$2h7rqqAt4aLS0WrVJoM2eu9LEqihOgiktrbO0rTmWnU5i3WzTHn9a', 'pelayan', NULL, NULL, 4, '2024-06-02 06:56:27', '2024-06-02 06:56:27');

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
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `reason` varchar(255) NOT NULL,
  `status` enum('pending','confirmed','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `employee_id`, `start_date`, `end_date`, `reason`, `status`, `created_at`, `updated_at`, `catatan`) VALUES
(1, 3, '2024-06-05 00:40:00', '2024-06-06 00:40:00', 'Cuti Menikah', 'pending', '2024-06-02 17:40:48', '2024-06-02 17:40:48', NULL),
(2, 3, '2024-06-06 00:40:00', '2024-06-07 00:40:00', 'Cuti Melahirkan', 'pending', '2024-06-02 17:41:06', '2024-06-02 17:41:06', NULL),
(3, 1, '2024-06-12 19:02:00', '2024-06-12 19:02:00', 'Cuti istri lahiran', 'pending', '2024-06-11 12:02:41', '2024-06-11 12:02:41', NULL),
(4, 1, '2024-06-11 19:08:00', '2024-06-11 19:08:00', 'Cuti menikah', 'pending', '2024-06-11 12:08:25', '2024-06-11 12:08:25', NULL);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_11_050323_create_product_categories_table', 1),
(6, '2024_03_17_012252_create_permission_tables', 1),
(7, '2024_03_17_054222_create_units_table', 1),
(8, '2024_03_24_022355_create_products_table', 1),
(9, '2024_03_24_035841_create_employees_table', 1),
(10, '2024_03_24_042035_create_customers_table', 1),
(11, '2024_03_24_042055_create_payments_table', 1),
(12, '2024_03_24_074510_create_reservations_table', 1),
(13, '2024_03_24_074512_create_orders_table', 1),
(14, '2024_03_24_074740_create_detail_orders_table', 1),
(15, '2024_04_13_143307_create_tables_table', 1),
(16, '2024_04_28_094722_create_carts_table', 1),
(17, '2024_04_28_094742_create_detail_carts_table', 1),
(18, '2024_05_09_032550_create_contracts_table', 1),
(19, '2024_05_09_032600_create_workhours_table', 1),
(20, '2024_05_09_033140_create_attendances_table', 1),
(21, '2024_05_09_035353_create_leaves_table', 1),
(22, '2024_05_09_073018_create_active_q_r_s_table', 1),
(23, '2024_05_12_073409_create_absences_table', 1),
(24, '2024_05_18_213549_create_reservation_tables_table', 1),
(25, '2024_05_18_220613_create_reservation_settings_table', 1),
(26, '2024_05_18_220614_create_worktimes_table', 1),
(27, '2024_05_18_220615_create_holidays_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 9),
(1, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 7),
(5, 'App\\Models\\User', 5),
(6, 'App\\Models\\User', 6),
(6, 'App\\Models\\User', 12),
(6, 'App\\Models\\User', 13),
(6, 'App\\Models\\User', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_pesanan` varchar(255) NOT NULL,
  `tipe` enum('in_store','online') NOT NULL DEFAULT 'in_store',
  `packing` enum('dine_in','take_away') NOT NULL DEFAULT 'dine_in',
  `progress` enum('menunggu_pembayaran','menunggu','diproses','selesai','diterima','dibatalkan') NOT NULL DEFAULT 'menunggu_pembayaran',
  `status` enum('lunas','belum_lunas','expired') NOT NULL DEFAULT 'belum_lunas',
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reservation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pemesan` varchar(255) DEFAULT NULL,
  `total_harga` bigint(20) NOT NULL DEFAULT 0,
  `jumlah_pesanan` int(11) NOT NULL DEFAULT 0,
  `snap_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `no_pesanan`, `tipe`, `packing`, `progress`, `status`, `employee_id`, `customer_id`, `payment_id`, `reservation_id`, `pemesan`, `total_harga`, `jumlah_pesanan`, `snap_token`, `created_at`, `updated_at`) VALUES
(4, 'ORDER-12024060216000564', 'online', 'take_away', 'dibatalkan', 'belum_lunas', NULL, 1, 4, NULL, 'pelanggan', 18000, 1, '58cb60be-5f69-4d11-983f-b9c0cf2ffef2', '2024-06-02 09:00:05', '2024-06-02 09:01:22'),
(5, 'ORDER-12024060216131165', 'online', 'take_away', 'diproses', 'lunas', NULL, 1, 5, NULL, 'pelanggan', 18000, 1, 'eb0d1894-b88c-4775-9ca0-d73f79b91b02', '2024-06-02 09:13:11', '2024-06-14 01:19:35'),
(6, 'ORDER-02024060300212326', 'in_store', 'dine_in', 'menunggu', 'lunas', 2, NULL, 6, NULL, 'upi', 46000, 3, NULL, '2024-06-02 17:21:39', '2024-06-14 01:19:37'),
(7, 'ORDER-02024060300223927', 'in_store', 'dine_in', 'diterima', 'lunas', 2, NULL, 7, NULL, 'dede', 36000, 2, NULL, '2024-06-02 17:22:49', '2024-06-02 17:24:41'),
(8, 'ORDER-12024060300333968', 'online', 'take_away', 'selesai', 'lunas', NULL, 1, 8, NULL, 'pelanggan', 18000, 1, 'df940251-e4ec-4eb2-a1f0-f560fb2a30d1', '2024-06-02 17:33:39', '2024-06-12 09:49:19'),
(9, 'ORDER-12024060300340669', 'online', 'dine_in', 'diproses', 'lunas', NULL, 1, 9, 1, 'pelanggan', 28000, 2, 'c9ee1ba0-1c75-4ed8-886b-763b04e72978', '2024-06-02 17:36:02', '2024-06-14 01:32:43'),
(10, 'ORDER-020240603011547210', 'in_store', 'dine_in', 'menunggu', 'lunas', 2, NULL, 10, NULL, 'diah', 46000, 3, NULL, '2024-06-02 18:15:59', '2024-06-13 13:04:23'),
(11, 'ORDER-020240603011608211', 'in_store', 'dine_in', 'menunggu', 'lunas', 2, NULL, 11, NULL, 'mira', 46000, 3, NULL, '2024-06-02 18:16:17', '2024-06-12 08:37:58'),
(12, 'ORDER-120240610210915612', 'online', 'take_away', 'menunggu_pembayaran', 'belum_lunas', NULL, 1, 12, NULL, 'pelanggan', 18000, 1, '34b6ac7f-e5e8-4d8b-a20a-3d4a4d6a7d75', '2024-06-10 14:09:15', '2024-06-10 14:09:17'),
(13, 'ORDER-020240611194730213', 'in_store', 'dine_in', 'menunggu', 'lunas', 2, NULL, 13, 2, 'diah', 54000, 3, NULL, '2024-06-11 13:58:13', '2024-06-14 01:32:49'),
(14, 'ORDER-020240611214830214', 'in_store', 'dine_in', 'selesai', 'lunas', 2, NULL, 14, 3, 'diah', 36000, 2, NULL, '2024-06-11 14:49:14', '2024-06-12 09:46:55'),
(15, 'ORDER-020240611215532215', 'in_store', 'dine_in', 'menunggu', 'lunas', 2, NULL, 15, 4, 'diah', 36000, 2, NULL, '2024-06-11 14:59:11', '2024-06-12 08:43:26'),
(16, 'ORDER-020240611233248216', 'in_store', 'dine_in', 'diproses', 'lunas', 2, NULL, 16, NULL, 'upi', 36000, 2, NULL, '2024-06-11 16:51:28', '2024-06-13 13:10:58'),
(17, 'ORDER-120240612103350617', 'online', 'dine_in', 'menunggu_pembayaran', 'belum_lunas', NULL, 1, 17, 5, 'pelanggan', 10000, 1, 'af34b362-9877-4e6e-bb34-2f2fc197ea4f', '2024-06-12 03:35:50', '2024-06-12 03:35:51'),
(18, 'ORDER-120240612112208618', 'online', 'dine_in', 'diterima', 'lunas', NULL, 1, 18, 6, 'pelanggan', 36000, 2, '616aa7d4-fdd1-49b0-b0ba-472b1a2e6624', '2024-06-12 04:23:42', '2024-06-12 08:46:05'),
(19, 'ORDER-120240612140057619', 'online', 'take_away', 'menunggu_pembayaran', 'belum_lunas', NULL, 1, 19, NULL, 'pelanggan', 18000, 1, '57e8e713-d7e5-4b39-81df-d0c6356eb683', '2024-06-12 07:00:57', '2024-06-12 07:00:58'),
(20, 'ORDER-120240612140121620', 'online', 'take_away', 'menunggu_pembayaran', 'belum_lunas', NULL, 1, 20, NULL, 'pelanggan', 18000, 1, 'a828b2f6-c3a7-4a0a-adc2-ecf503a63d23', '2024-06-12 07:01:21', '2024-06-12 07:01:21'),
(21, 'ORDER-120240613193817621', 'online', 'take_away', 'menunggu', 'lunas', NULL, 1, 21, NULL, 'pelanggan', 18000, 1, 'af0e3d19-eaa5-48ce-9241-e54974a86dbc', '2024-06-13 12:38:17', '2024-06-13 12:39:04'),
(22, 'ORDER-120240613194957622', 'online', 'take_away', 'menunggu_pembayaran', 'belum_lunas', NULL, 1, 22, NULL, 'pelanggan', 18000, 1, '4d02439d-bafe-401c-9508-fd515d911726', '2024-06-13 12:49:57', '2024-06-13 12:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_payment` varchar(255) NOT NULL,
  `status` enum('lunas','belum_lunas','expired') NOT NULL DEFAULT 'belum_lunas',
  `uang` bigint(20) DEFAULT NULL,
  `kembali` bigint(20) DEFAULT NULL,
  `transaction_time` datetime DEFAULT NULL,
  `transaction_status` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `status_code` int(11) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `signature_key` varchar(255) DEFAULT NULL,
  `fraud_status` varchar(255) DEFAULT NULL,
  `total_bayar` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `no_payment`, `status`, `uang`, `kembali`, `transaction_time`, `transaction_status`, `transaction_id`, `status_code`, `payment_type`, `signature_key`, `fraud_status`, `total_bayar`, `created_at`, `updated_at`) VALUES
(1, '1717316936-ORDER-12024060215285662', 'belum_lunas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18000, '2024-06-02 08:28:56', '2024-06-02 08:28:56'),
(2, '1717317609-ORDER-12024060215400962', 'belum_lunas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18000, '2024-06-02 08:40:09', '2024-06-02 08:40:09'),
(3, '1717318099-ORDER-12024060215481963', 'belum_lunas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18000, '2024-06-02 08:48:19', '2024-06-02 08:48:19'),
(4, '1717318805-ORDER-12024060216000564', 'belum_lunas', NULL, NULL, '2024-06-02 16:00:16', 'expire', '8f2576df-6d4a-4c3d-84bc-24dedf56a59a', 202, 'qris', '604a6fdc6bbfbc9b79e282eeff3a24b16eaacf4c738d89488e6f6971816ff67e4cf8842fa745974f8eb7d6d51f4e4530016c1a73492408577520d203a6398dea', 'accept', 18000, '2024-06-02 09:00:05', '2024-06-02 09:15:18'),
(5, '1717319591-ORDER-12024060216131165', 'lunas', 18000, 0, '2024-06-03 00:30:09', 'settlement', '78f2a044-53e5-43af-94f7-fcf5fbf6405a', 200, 'bank_transfer', '192241d0b0c65fe0e17432fa113b7164780ee8cbd21999fe1eaf4afd127448e55c9fafe31bc8174a96d7bad29a3314ab698f7143cb5d1008fec259e54dd77bb5', 'accept', 18000, '2024-06-02 09:13:11', '2024-06-02 17:30:44'),
(6, '1717348899-ORDER-02024060300212326', 'lunas', 50000, 4000, '2024-06-03 00:21:46', NULL, 'CASH6ON1717348899', NULL, 'cash', NULL, NULL, 46000, '2024-06-02 17:21:39', '2024-06-02 17:21:46'),
(7, '1717348969-ORDER-02024060300223927', 'lunas', 40000, 4000, '2024-06-03 00:23:03', NULL, 'CASH7ON1717348969', NULL, 'cash', NULL, NULL, 36000, '2024-06-02 17:22:49', '2024-06-02 17:23:03'),
(8, '1717349619-ORDER-12024060300333968', 'lunas', 18000, 0, '2024-06-03 00:33:43', 'settlement', '8c48461b-260d-4493-8700-4b951e31f83f', 200, 'bank_transfer', '4feea805377a902ffdc66636917576628123931d500e42896cf6b656b6a6fbf9b9f994c891b7bd2aab04c8b94b792ef3eef976fb30910e01d75f8ab91a7864b6', 'accept', 18000, '2024-06-02 17:33:39', '2024-06-02 17:33:54'),
(9, '1717349762-ORDER-12024060300340669', 'lunas', 28000, 0, '2024-06-03 00:36:08', 'settlement', '45604c2b-d3f4-48a5-9755-37eaedf71806', 200, 'bank_transfer', '3a35c9779c08615b13f643402b7ac833a23ed581ff03e981a6e69910363c795c717f0428e552ff44a7d83c1e649f03046c6031c38120cc2db74dc4415b5b6302', 'accept', 28000, '2024-06-02 17:36:02', '2024-06-02 17:36:18'),
(10, '1717352159-ORDER-020240603011547210', 'lunas', 50000, 4000, '2024-06-03 01:16:05', NULL, 'CASH10ON1717352159', NULL, 'cash', NULL, NULL, 46000, '2024-06-02 18:15:59', '2024-06-02 18:16:05'),
(11, '1717352177-ORDER-020240603011608211', 'lunas', 50000, 4000, '2024-06-03 01:16:23', NULL, 'CASH11ON1717352177', NULL, 'cash', NULL, NULL, 46000, '2024-06-02 18:16:17', '2024-06-02 18:16:23'),
(12, '1718028555-ORDER-120240610210915612', 'belum_lunas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18000, '2024-06-10 14:09:15', '2024-06-10 14:09:15'),
(13, '1718114293-ORDER-020240611194730213', 'lunas', 54000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 54000, '2024-06-11 13:58:13', '2024-06-11 14:47:39'),
(14, '1718117354-ORDER-020240611214830214', 'lunas', 36000, 0, '2024-06-11 21:50:25', NULL, 'CASH14ON1718117354', NULL, 'cash', NULL, NULL, 36000, '2024-06-11 14:49:14', '2024-06-11 14:50:25'),
(15, '1718117951-ORDER-020240611215532215', 'lunas', 83000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 83000, '2024-06-11 14:59:11', '2024-06-11 16:18:09'),
(16, '1718124688-ORDER-020240611233248216', 'lunas', 50000, 14000, '2024-06-11 23:58:29', NULL, 'CASH16ON1718124769', NULL, 'cash', NULL, NULL, 36000, '2024-06-11 16:51:28', '2024-06-11 16:58:29'),
(17, '1718163350-ORDER-120240612103350617', 'belum_lunas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10000, '2024-06-12 03:35:50', '2024-06-12 03:35:50'),
(18, '1718166222-ORDER-120240612112208618', 'lunas', 36000, 0, '2024-06-12 11:27:10', 'settlement', '1d41490d-6961-471d-8f34-36ddfe5c1069', 200, 'bank_transfer', '7bc81fa67ebcdc51fc9e87f7dbf9cd649e7bc36b824db4babc4e518515fdc9c45327c83c3f78926e39f82a5fb9530db89516052b78373309d51ccfd79356cca9', 'accept', 36000, '2024-06-12 04:23:42', '2024-06-12 04:34:53'),
(19, '1718175657-ORDER-120240612140057619', 'belum_lunas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18000, '2024-06-12 07:00:57', '2024-06-12 07:00:57'),
(20, '1718175681-ORDER-120240612140121620', 'belum_lunas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18000, '2024-06-12 07:01:21', '2024-06-12 07:01:21'),
(21, '1718282297-ORDER-120240613193817621', 'lunas', 18000, 0, '2024-06-13 19:38:49', 'settlement', '51b31dc5-e9a5-47fb-a00b-00f9c342b0b9', 200, 'qris', '4d7188499f5f6c17cea027a7294ab1de74157c93cfe05ead360dfc652495001e67d6a04e8eaa6d27c4b15fe1dde5b92c6642a8e5e4a33f30931de920c598dfc3', 'accept', 18000, '2024-06-13 12:38:17', '2024-06-13 12:39:04'),
(22, '1718282997-ORDER-120240613194957622', 'belum_lunas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18000, '2024-06-13 12:49:57', '2024-06-13 12:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'tambah-kategori-menu', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(2, 'edit-kategori-menu', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(3, 'hapus-kategori-menu', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(4, 'lihat-kategori-menu', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(5, 'tambah-menu', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(6, 'edit-menu', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(7, 'hapus-menu', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(8, 'lihat-menu', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(9, 'tambah-bahan-baku', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(10, 'edit-bahan-baku', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(11, 'hapus-bahan-baku', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(12, 'lihat-bahan-baku', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(13, 'tambah-add-ons', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(14, 'edit-add-ons', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(15, 'hapus-add-ons', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(16, 'lihat-add-ons', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(17, 'tambah-meja', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(18, 'edit-meja', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(19, 'hapus-meja', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(20, 'lihat-meja', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(21, 'tambah-area-reservasi', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(22, 'edit-area-reservasi', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(23, 'hapus-area-reservasi', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(24, 'lihat-area-reservasi', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(25, 'tambah-metode-bayar', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(26, 'edit-metode-bayar', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(27, 'hapus-metode-bayar', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(28, 'lihat-metode-bayar', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(29, 'tambah-pemesanan', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(30, 'edit-pemesanan', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(31, 'hapus-pemesanan', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(32, 'lihat-pemesanan', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(33, 'tambah-reservasi', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(34, 'edit-reservasi', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(35, 'hapus-reservasi', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(36, 'lihat-reservasi', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(37, 'tambah-sesi-absensi', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(38, 'edit-sesi-absensi', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(39, 'hapus-sesi-absensi', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(40, 'lihat-sesi-absensi', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(41, 'tambah-data-absensi', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(42, 'edit-data-absensi', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(43, 'hapus-data-absensi', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(44, 'lihat-data-absensi', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(45, 'absen', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(46, 'tambah-jam-kerja', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(47, 'edit-jam-kerja', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(48, 'hapus-jam-kerja', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(49, 'lihat-jam-kerja', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(50, 'tambah-cuti', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(51, 'edit-cuti', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(52, 'hapus-cuti', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(53, 'lihat-cuti', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(54, 'ajukan-cuti', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(55, 'konfirmasi-cuti', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(56, 'tambah-lembur', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(57, 'edit-lembur', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(58, 'hapus-lembur', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(59, 'lihat-lembur', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(60, 'perintah-lembur', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(61, 'konfirmasi-lembur', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(62, 'lihat-laporan', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(63, 'tambah-role', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(64, 'edit-role', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(65, 'hapus-role', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(66, 'lihat-role', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(67, 'tambah-user', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(68, 'edit-user', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(69, 'hapus-user', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(70, 'lihat-user', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `harga_jual` decimal(8,2) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 1,
  `product_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama`, `deskripsi`, `image`, `harga_jual`, `stok`, `product_category_id`, `created_at`, `updated_at`) VALUES
(2, 'Mango', 'Minuman', '1717932496.jpg', 18000.00, 2, 1, '2024-06-02 08:15:54', '2024-06-11 16:58:29'),
(4, 'Roti Bakar', 'Makanan Ringan', '1717316210-produk.jpg', 18000.00, 0, 1, '2024-06-02 08:16:50', '2024-06-13 12:39:04'),
(6, 'Matcha Flavour', 'Minuman susu', '1717932524.jpg', 10000.00, 16, 3, '2024-06-02 17:12:20', '2024-06-09 11:28:44'),
(7, 'Ice Cream Cookies', 'Ice cream dengan topping cookies dan taburan oreo', '1717932581-produk.jpg', 13000.00, 19, 3, '2024-06-09 11:29:41', '2024-06-09 11:29:41'),
(8, 'French Fries', 'Goreng kentang dengan taburan bubuk cabai dan juga saos', '1717932681-produk.jpg', 13000.00, 9, 1, '2024-06-09 11:31:21', '2024-06-09 11:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Makanan', 'Makanan', '2024-06-02 08:14:37', '2024-06-02 08:14:37'),
(3, 'Minuman', 'Minuman', '2024-06-02 17:11:10', '2024-06-02 17:11:10'),
(4, 'Main Course', 'Makanan Menu Utama', '2024-06-10 02:50:45', '2024-06-10 02:50:45'),
(5, 'Snack Corner', 'Makanan Ringan', '2024-06-10 03:31:38', '2024-06-10 03:31:38'),
(6, 'Topping Bar', 'Topping atau pelengkap makanan', '2024-06-10 03:32:13', '2024-06-10 03:32:13'),
(7, 'Coffee & Tea', 'Minuman kopi atau teh', '2024-06-10 03:32:44', '2024-06-10 03:32:44'),
(8, 'Ice Cream & Fizzy Float', 'Ice Cream', '2024-06-10 03:33:29', '2024-06-10 03:33:29'),
(9, 'Non Coffee & Milk', 'Minuman tanpa kopi dan susu', '2024-06-10 03:34:03', '2024-06-10 03:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_reservasi` varchar(255) NOT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `guests` int(11) NOT NULL DEFAULT 0,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `price` bigint(20) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` enum('menunggu_pembayaran','menunggu','aktif','selesai','dibatalkan') NOT NULL DEFAULT 'menunggu_pembayaran',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `no_reservasi`, `telepon`, `date`, `guests`, `start_time`, `end_time`, `price`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 'RESERVATION-12024060300340661', NULL, '2024-06-05', 4, '12:34:00', '16:34:00', 0, 'no', 'menunggu', '2024-06-02 17:36:02', '2024-06-02 17:36:18'),
(2, 'RESERVATION-02024061119473022', '085314273819', '2024-06-13', 8, '14:00:00', '16:00:00', 0, 'Siapkan tempat', 'menunggu', '2024-06-11 13:58:13', '2024-06-11 14:47:21'),
(3, 'RESERVATION-02024061121483023', '085314273819', '2024-06-12', 8, '13:48:00', '19:48:00', 0, 'Siapkan tempat', 'menunggu', '2024-06-11 14:49:14', '2024-06-11 14:50:25'),
(4, 'RESERVATION-02024061121553224', '085314273819', '2024-06-15', 8, '15:58:00', '19:58:00', 0, 'Siapkan tempat', 'menunggu', '2024-06-11 14:59:11', '2024-06-11 16:18:09'),
(5, 'RESERVATION-12024061210335065', NULL, '2024-06-20', 8, '11:34:00', '13:34:00', 0, 'Siapkan tempat', 'menunggu_pembayaran', '2024-06-12 03:35:50', '2024-06-12 03:35:50'),
(6, 'RESERVATION-12024061211220866', NULL, '2024-06-14', 8, '14:22:00', '16:22:00', 0, 'Acara Ulang Tahun', 'menunggu', '2024-06-12 04:23:42', '2024-06-12 04:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_settings`
--

CREATE TABLE `reservation_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` bigint(20) NOT NULL,
  `period` int(11) NOT NULL,
  `seat_deviation` int(11) NOT NULL,
  `period_unit` enum('minutes','hours','days') NOT NULL DEFAULT 'hours',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation_settings`
--

INSERT INTO `reservation_settings` (`id`, `price`, `period`, `seat_deviation`, `period_unit`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 3, 'hours', '2024-06-02 06:56:28', '2024-06-02 06:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_tables`
--

CREATE TABLE `reservation_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` bigint(20) UNSIGNED NOT NULL,
  `table_id` bigint(20) UNSIGNED DEFAULT NULL,
  `seats` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation_tables`
--

INSERT INTO `reservation_tables` (`id`, `reservation_id`, `table_id`, `seats`, `date`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 4, '2024-06-05', '12:34:00', '16:34:00', '2024-06-02 17:36:02', '2024-06-02 17:36:02'),
(2, 2, 2, 8, '2024-06-13', '14:00:00', '16:00:00', '2024-06-11 13:58:13', '2024-06-11 13:58:13'),
(3, 3, 2, 8, '2024-06-12', '13:48:00', '19:48:00', '2024-06-11 14:49:14', '2024-06-11 14:49:14'),
(4, 4, 2, 8, '2024-06-15', '15:58:00', '19:58:00', '2024-06-11 14:59:11', '2024-06-11 14:59:11'),
(5, 5, 2, 8, '2024-06-20', '11:34:00', '13:34:00', '2024-06-12 03:35:50', '2024-06-12 03:35:50'),
(6, 6, 2, 8, '2024-06-14', '14:22:00', '16:22:00', '2024-06-12 04:23:42', '2024-06-12 04:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(2, 'kasir', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(3, 'pelayan', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(4, 'koki', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(5, 'owner', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(6, 'pelanggan', 'web', '2024-06-02 06:56:26', '2024-06-02 06:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_meja` varchar(255) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `jumlah_kursi` int(11) DEFAULT 1,
  `status` enum('disewa','tersedia') NOT NULL DEFAULT 'tersedia',
  `image` varchar(255) DEFAULT NULL,
  `join_allowed` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `no_meja`, `deskripsi`, `jumlah_kursi`, `status`, `image`, `join_allowed`, `created_at`, `updated_at`) VALUES
(2, 'meja124', 'meja besi', 8, 'tersedia', 'images/1717330838.jpg', 1, '2024-06-02 12:20:38', '2024-06-02 12:20:38'),
(3, '3', 'Meja kayu', 4, 'tersedia', 'images/1717348297.jpg', 1, '2024-06-02 17:11:37', '2024-06-02 17:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@email.com', '2024-06-02 16:37:06', '$2y$12$9OM5RNMNXFf4WLh9O1oSaO9mzr2O4VWWq8B0oVuoBOemmBaYLFnZi', NULL, '2024-06-02 06:56:26', '2024-06-02 06:56:26'),
(2, 'kasir', 'kasir@email.com', '2024-06-02 16:37:06', '$2y$12$cdYOeKT6Dae07a3dnPv5beMFIMBnmX9h.t8MW5I9RhhrkAymy2qrS', NULL, '2024-06-02 06:56:27', '2024-06-16 09:50:14'),
(3, 'koki', 'koki@email.com', '2024-06-02 16:37:06', '$2y$12$tn9Xm.LpOZcPJL82VW7d7.KviWbg5PsKzI73Y0S8Z81M6c.PSrGc6', NULL, '2024-06-02 06:56:27', '2024-06-02 06:56:27'),
(4, 'pelayan', 'pelayan@email.com', '2024-06-02 16:37:06', '$2y$12$tuv04D5FY.6JCxRBi2FUO.MM/lv63.6DniIWFS/DOZsBDEXzxxhYa', 'QhvQzHStvtmUKHQ9X9wxALTDh8nEOZWzcR9aOkpPWqQvZC3NunnBjgH2Cy8M', '2024-06-02 06:56:27', '2024-06-02 06:56:27'),
(5, 'owner', 'owner@email.com', '2024-06-02 16:37:06', '$2y$12$7pE.zXM1MHt/DwMpOWFVKOFco/z.y8O2sR570R4IXVJQAYwln464.', NULL, '2024-06-02 06:56:28', '2024-06-02 06:56:28'),
(6, 'pelanggan', 'pelanggan@email.com', '2024-06-15 10:31:50', '$2y$12$009N90DwoZnpfOpvTTwFG.Xu09YVfbKn8hjdgNOoUDfbWiQhipFZm', NULL, '2024-06-02 06:56:28', '2024-06-16 10:31:42'),
(16, 'Diah Rahman', 'diahrahman107@gmail.com', '2024-06-02 18:04:56', '$2y$12$1LVo6zkkuxC/hSc.P5kvAeV0WdDVNw67hDMNrEH/uZyM53dPsEV6W', NULL, '2024-06-02 18:02:33', '2024-06-02 18:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `workhours`
--

CREATE TABLE `workhours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `week_start_date` datetime DEFAULT NULL,
  `day` enum('1','2','3','4','5','6','7') NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `worktimes`
--

CREATE TABLE `worktimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` enum('1','2','3','4','5','6','7') NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `rest_start_time` time DEFAULT NULL,
  `rest_end_time` time DEFAULT NULL,
  `rest_duration_min` int(11) NOT NULL DEFAULT 0,
  `working_duration_min` int(11) NOT NULL DEFAULT 0,
  `total_duration_min` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `worktimes`
--

INSERT INTO `worktimes` (`id`, `day`, `start_time`, `end_time`, `rest_start_time`, `rest_end_time`, `rest_duration_min`, `working_duration_min`, `total_duration_min`, `created_at`, `updated_at`) VALUES
(1, '1', '10:00:00', '22:00:00', NULL, NULL, 0, 720, 720, '2024-06-02 06:57:36', '2024-06-10 04:10:19'),
(2, '2', '10:00:00', '22:00:00', NULL, NULL, 0, 720, 720, '2024-06-02 06:57:36', '2024-06-10 04:10:16'),
(3, '3', '10:00:00', '22:00:00', NULL, NULL, 0, 720, 720, '2024-06-02 06:57:36', '2024-06-02 06:57:36'),
(4, '4', '10:00:00', '22:00:00', NULL, NULL, 0, 720, 720, '2024-06-02 06:57:36', '2024-06-02 06:57:36'),
(5, '5', '10:00:00', '22:00:00', NULL, NULL, 0, 720, 720, '2024-06-02 06:57:36', '2024-06-02 06:57:36'),
(6, '6', '10:00:00', '22:00:00', NULL, NULL, 0, 720, 720, '2024-06-02 06:57:36', '2024-06-02 06:57:36'),
(7, '7', '10:00:00', '22:00:00', NULL, NULL, 0, 720, 720, '2024-06-02 06:57:36', '2024-06-02 06:57:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absences_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `active_q_r_s`
--
ALTER TABLE `active_q_r_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contracts_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `detail_carts`
--
ALTER TABLE `detail_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_carts_cart_id_foreign` (`cart_id`),
  ADD KEY `detail_carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_orders_order_id_foreign` (`order_id`),
  ADD KEY `detail_orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_id_pegawai_unique` (`id_pegawai`),
  ADD KEY `employees_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaves_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_no_pesanan_unique` (`no_pesanan`),
  ADD KEY `orders_employee_id_foreign` (`employee_id`),
  ADD KEY `orders_reservation_id_foreign` (`reservation_id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_no_payment_unique` (`no_payment`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_nama_unique` (`nama`),
  ADD KEY `products_product_category_id_foreign` (`product_category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_categories_nama_unique` (`nama`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reservations_no_reservasi_unique` (`no_reservasi`);

--
-- Indexes for table `reservation_settings`
--
ALTER TABLE `reservation_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_tables`
--
ALTER TABLE `reservation_tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_tables_table_id_foreign` (`table_id`),
  ADD KEY `reservation_tables_reservation_id_foreign` (`reservation_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tables_no_meja_unique` (`no_meja`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_satuan_unique` (`satuan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `workhours`
--
ALTER TABLE `workhours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workhours_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `worktimes`
--
ALTER TABLE `worktimes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absences`
--
ALTER TABLE `absences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `active_q_r_s`
--
ALTER TABLE `active_q_r_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_carts`
--
ALTER TABLE `detail_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservation_settings`
--
ALTER TABLE `reservation_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservation_tables`
--
ALTER TABLE `reservation_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `workhours`
--
ALTER TABLE `workhours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `worktimes`
--
ALTER TABLE `worktimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absences`
--
ALTER TABLE `absences`
  ADD CONSTRAINT `absences_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_carts`
--
ALTER TABLE `detail_carts`
  ADD CONSTRAINT `detail_carts_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD CONSTRAINT `detail_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_reservation_id_foreign` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `reservation_tables`
--
ALTER TABLE `reservation_tables`
  ADD CONSTRAINT `reservation_tables_reservation_id_foreign` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_tables_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `workhours`
--
ALTER TABLE `workhours`
  ADD CONSTRAINT `workhours_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
