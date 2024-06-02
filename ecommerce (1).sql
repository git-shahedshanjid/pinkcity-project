-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 12:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(13, '2020_09_29_091631_create_products_table', 2),
(16, '2020_10_01_053003_create_products_images_table', 2);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `section_name`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(5, 'Users', 'Add User', 'add-user', '2020-09-22 16:18:37', '2020-09-22 16:18:37'),
(6, 'Users', 'Edit User', 'edit-user', '2020-09-22 16:19:26', '2020-09-22 16:19:26'),
(7, 'Users', 'Delete User', 'delete-user', '2020-09-22 16:19:41', '2020-09-22 16:19:41'),
(8, 'Users', 'View User', 'view-user', '2020-09-22 16:20:38', '2020-09-22 16:20:38'),
(9, 'Customer', 'Add Customer', 'add-customer', '2020-09-22 16:22:42', '2020-09-22 16:22:42'),
(10, 'Customer', 'Edit Customer', 'edit-customer', '2020-09-22 16:22:54', '2020-09-22 16:22:54'),
(11, 'Customer', 'Delete Customer', 'delete-customer', '2020-09-22 16:23:10', '2020-09-22 16:23:10'),
(12, 'Customer', 'View Customer', 'view-customer', '2020-09-22 16:23:27', '2020-09-22 16:23:27'),
(13, 'Role', 'Add Role', 'add-role', '2020-09-27 20:54:28', '2020-09-27 20:54:28'),
(14, 'Role', 'Edit Role', 'edit-role', '2020-09-27 20:54:28', '2020-09-27 20:54:28'),
(15, 'Role', 'Delete Role', 'delete-role', '2020-09-27 20:54:28', '2020-09-27 20:54:28'),
(16, 'Role', 'View Role', 'view-role', '2020-09-27 20:54:28', '2020-09-27 20:54:28'),
(33, 'Product', 'Add Product', 'add-product', '2020-10-05 16:24:12', '2020-10-05 16:24:12'),
(34, 'Product', 'Edit Product', 'edit-product', '2020-10-05 16:24:12', '2020-10-05 16:24:12'),
(35, 'Product', 'Delete Product', 'delete-product', '2020-10-05 16:24:12', '2020-10-05 16:24:12'),
(36, 'Product', 'View Product', 'view-product', '2020-10-05 16:24:12', '2020-10-05 16:24:12'),
(45, 'Shop', 'Add Shop', 'add-shop', '2022-02-14 07:34:31', '2022-02-14 07:34:31'),
(46, 'Shop', 'Edit Shop', 'edit-shop', '2022-02-14 07:34:31', '2022-02-14 07:34:31'),
(47, 'Shop', 'View Shop', 'view-shop', '2022-02-14 07:34:31', '2022-02-14 07:34:31'),
(48, 'Shop', 'Delete Shop', 'delete-shop', '2022-02-14 07:34:31', '2022-02-14 07:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `seller` int(11) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `min_order` int(5) NOT NULL,
  `serial_no` varchar(50) DEFAULT NULL,
  `location` varchar(150) DEFAULT NULL,
  `seller_review` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `seller`, `name`, `min_order`, `serial_no`, `location`, `seller_review`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 'product 2', 10, '23', 'Dhanmondi', 'Review', 'Original', '2024-06-02 00:22:17', '2024-06-02 09:20:25'),
(4, 1, 'product 3', 10, '1', 'Dhaka', 'ok', 'Copy', '2024-06-02 00:22:43', '2024-06-02 09:21:05'),
(5, 1, 'product 4', 10, '5', 'Dhaka', 'Review', 'Original', '2024-06-02 00:36:53', '2024-06-02 09:21:12'),
(6, 1, 'product 5', 12, '23', 'Dhanmondi', 'Seller Review', 'Copy', '2024-06-02 01:58:25', '2024-06-02 09:21:20'),
(7, 1, 'product 6', 12, '52', 'Dhanmondi', 'Seller Review', 'Original', '2024-06-02 02:13:05', '2024-06-02 09:21:29'),
(8, 1, 'product 7', 15, '36', 'Dhanmondi', 'Seller Review', 'Copy', '2024-06-02 02:13:44', '2024-06-02 09:21:36'),
(9, 1, 'product 8', 11, '54', 'Dhanmondi', 'Great', 'Copy', '2024-06-02 03:06:00', '2024-06-02 09:06:00'),
(10, 1, 'product 9', 15, '55', 'Dhaka', 'Seller Review', 'Copy', '2024-06-02 03:40:03', '2024-06-02 09:40:03'),
(11, 1, 'product 10', 13, '85', 'Dhanmondi', 'ok', 'Original', '2024-06-02 03:40:28', '2024-06-02 09:40:28'),
(12, 1, 'product 11', 23, '85', 'Dhaka', 'Review', 'Original', '2024-06-02 03:40:55', '2024-06-02 09:40:55'),
(13, 1, 'product 12', 13, '85', 'Dhanmondi', 'Seller Review', 'Copy', '2024-06-02 03:41:22', '2024-06-02 09:41:22'),
(14, 1, 'product 13', 50, '35', 'Dhanmondi', 'Seller Review', 'Original', '2024-06-02 03:55:16', '2024-06-02 09:55:16'),
(15, 1, 'product 14', 11, '85', 'Dhaka', 'Seller Review', 'Original', '2024-06-02 04:05:10', '2024-06-02 10:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `images_name` text NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `is_main_image` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `images_name`, `product_id`, `is_main_image`, `created_at`, `updated_at`) VALUES
(1, 'products/3500-ezgif-compressed.jpg', 1, 1, NULL, NULL),
(2, 'products/_b5ad3d52-fb95-11e8-b0ae-a79201e85078_1634487261905 (1)-compressed.jpg', 2, 1, NULL, NULL),
(9, 'products/images (7).jpg', 9, 1, NULL, NULL),
(10, 'products/images (6).jpg', 3, 1, NULL, NULL),
(11, 'products/images (5).jpg', 5, 1, NULL, NULL),
(12, 'products/images (4).jpg', 6, 1, NULL, NULL),
(13, 'products/download (6).jpg', 8, 1, NULL, NULL),
(14, 'products/download (5).jpg', 7, 1, NULL, NULL),
(15, 'products/download (4).jpg', 4, 1, NULL, NULL),
(16, 'products/download (6).jpg', 10, 1, NULL, NULL),
(17, 'products/images (7).jpg', 11, 1, NULL, NULL),
(18, 'products/download (6).jpg', 12, 1, NULL, NULL),
(19, 'products/download (5).jpg', 13, 1, NULL, NULL),
(20, 'products/download (6).jpg', 14, 1, NULL, NULL),
(21, 'products/download (5).jpg', 15, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'Super Admin', NULL, NULL),
(2, 'seller', 'Seller', '2022-02-09 22:27:52', '2024-06-02 04:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 38),
(2, 43);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `image`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Seller', '1717237130.png', '$2y$12$rTQWINwitmMKojkzREBpYO07h49qlU8DSq/ZicSNwiYNRB7jZvF5i', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(10) UNSIGNED NOT NULL,
  `role` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(250) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `phone`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(56, 2, 'Shahed', NULL, 'pnk@gmail.com', NULL, '$2y$12$PqVfJBWDJcxx0E/C.2pNGuOzIU4NjJNPNW6hH3LBmNt1YsOp5FC2O', NULL, NULL, '2024-06-01 01:19:51', '2024-06-02 04:27:17'),
(57, 1, 'Shahed', NULL, 'mail.shahedshanjid@gmail.com', NULL, '$2y$12$E4Dz5JHu8mbUZeva8qsaiOb4I9M3zOEgamudsTEvhUqnES14Vb97C', NULL, NULL, '2024-06-02 04:29:00', '2024-06-02 04:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_permissions`
--

CREATE TABLE `users_permissions` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES
(9, 1),
(20, 2),
(23, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 1),
(47, 2),
(48, 2),
(49, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `roles_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `users_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `users_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD CONSTRAINT `roles_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD CONSTRAINT `users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
