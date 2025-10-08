-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2024 at 01:48 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xpokw`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_otp` int DEFAULT NULL,
  `mobile` bigint DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0 : Inactive , 1 : Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `password`, `image`, `login_otp`, `mobile`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Admin', 'admin@gmail.com', '$2y$12$cxyMOQQNg2mORrLrXGJ2GuboBSiCj80MBOwPPY42KCs96hPMY3ktq', NULL, NULL, NULL, 0, '2024-07-25 23:45:40', '2024-07-25 23:45:40'),
(2, 'Jhon', 'Doe', 'jhondoe@gmail.com', '$2y$12$.kPk57Ti/NGXEFsGVDhOl..mMe80I5vKBflmehkMQcqoI/d2LKrY2', NULL, NULL, NULL, 0, '2024-07-25 23:45:41', '2024-07-25 23:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `meta`, `date`, `description`, `categories`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Title1', NULL, '2024-04-20', 'fgvhbjnkml', 'njkml,', '20240726_2061879919.jpeg', '2024-07-26 01:26:57', '2024-07-26 01:27:52', '2024-07-26 01:27:52'),
(2, 'fghj', 'meta1', '2024-04-20', 'djk', 'cvbnm', '20240726_615558829.jpeg', '2024-07-26 01:31:08', '2024-07-27 01:30:52', NULL),
(3, 'Tittle1', 'meta', '2024-04-20', 'cvbn m', 'mmm', '20240727_1837101124.jpg', '2024-07-27 01:23:44', '2024-07-27 01:30:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dynamics`
--

CREATE TABLE `dynamics` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dynamics`
--

INSERT INTO `dynamics` (`id`, `title`, `meta`, `content`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ABCD EFGH thgg', NULL, '<p>szxdrfcgvbhj;klm,emrnjtklmvf</p>', 'abcd-efgh-thgg', '2024-07-26 06:35:14', '2024-07-26 06:26:21', '2024-07-26 06:35:14'),
(2, 'ut mngbhjn', '5555', '<p>sdxfcgvbhjnlkm</p>', 'ut-mngbhjn', NULL, '2024-07-26 06:35:00', '2024-07-27 01:53:06'),
(3, 'twit', 'met', '<p>asdfbgh</p>', 'twit', NULL, '2024-07-27 01:39:07', '2024-07-27 01:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Tittle1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis natus consequuntur, officiis cumque enim, doloribus nisi repellat quisquam officia maiores vel. Facilis ipsam quas consectetur quasi, perspiciatis ut nesciunt similique?\"', '2024-07-26 00:47:56', '2024-07-26 00:47:15', '2024-07-26 00:47:56'),
(2, 'Tittle2', 'FAQ created successfully...\"', '2024-07-26 01:06:09', '2024-07-26 00:53:39', '2024-07-26 01:06:09'),
(3, 'Tittle', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid culpa labore minima temporibus esse, vel reprehenderit nihil atque sed fugiat accusantium ea veniam quam itaque mollitia iure saepe aspernatur perferendis?', '2024-07-26 01:05:29', '2024-07-26 01:05:07', '2024-07-26 01:05:29'),
(4, 'wedfrg', 'drt', '2024-07-26 01:06:55', '2024-07-26 01:06:51', '2024-07-26 01:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tittle1', '20240726_653489640.jpeg', '2024-07-26 07:14:33', '2024-07-26 07:50:17', '2024-07-26 07:50:17'),
(2, 'fvg', '20240726_966695543.jpeg', '2024-07-26 07:57:32', '2024-07-27 05:00:08', '2024-07-27 05:00:08'),
(3, 'tittle2', NULL, '2024-07-27 02:18:56', '2024-07-27 02:18:56', NULL),
(4, 'fgvh', NULL, '2024-07-27 05:48:39', '2024-07-27 05:48:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `generalsettings`
--

CREATE TABLE `generalsettings` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_mailhost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `printest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generalsettings`
--

INSERT INTO `generalsettings` (`id`, `logo`, `name`, `email`, `mobile`, `address`, `facebook`, `twitter`, `instagram`, `linkedin`, `meta_title`, `meta_description`, `keyword`, `email_setting`, `email_type`, `smtp_mailhost`, `mail_password`, `created_at`, `updated_at`, `icon`, `printest`) VALUES
(2, '20240726_165855509.png', 'food1', 'jhon@gmail.com', '655555589996', '31ggh', 'jkendc4', 'bhjjh5', 'hscb hjs5', 'nn', 'hjhh1', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-26 02:32:23', '2024-07-27 01:57:31', '20240726_759925216.png', 'fgvhb');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_08_081056_create_admins_table', 1),
(6, '2024_01_08_103251_create_permission_tables', 1),
(7, '2024_07_26_054440_create_faqs_table', 2),
(8, '2024_07_26_063828_create_blogs_table', 3),
(9, '2024_07_26_064203_add_soft_delete_to_blogs_table', 4),
(10, '2024_07_26_070846_create_testimonials_table', 5),
(11, '2024_07_26_072753_create_generalsettings_table', 6),
(12, '2024_07_26_095351_add_fav_icon_to_generalsettings_table', 7),
(13, '2024_07_26_110652_create_galleries_table', 8),
(14, '2024_07_26_114547_create_dynamics_table', 9),
(15, '2024_07_26_131416_add_soft_delete_to_galleries_table', 10),
(16, '2024_07_27_063748_add_meta_to_blogs_table', 11),
(17, '2024_07_27_070203_add_meta_to_dynamics_table', 12),
(19, '2024_07_27_072859_create_photos_table', 13),
(20, '2024_07_27_091559_add_gallery_id_photos_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin.dashboard', 'admin', '2024-07-25 23:45:41', '2024-07-25 23:45:41'),
(2, 'admin.user-list', 'admin', '2024-07-25 23:45:41', '2024-07-25 23:45:41'),
(3, 'admin.add-user', 'admin', '2024-07-25 23:45:41', '2024-07-25 23:45:41'),
(4, 'admin.edit-user', 'admin', '2024-07-25 23:45:41', '2024-07-25 23:45:41'),
(5, 'admin.update-user', 'admin', '2024-07-25 23:45:41', '2024-07-25 23:45:41'),
(6, 'admin.delete-user', 'admin', '2024-07-25 23:45:41', '2024-07-25 23:45:41'),
(7, 'sanctum.csrf-cookie', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(8, 'ignition.healthCheck', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(9, 'ignition.executeSolution', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(10, 'ignition.updateConfig', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(11, 'leads.insert', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(12, 'admin.login', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(13, 'admin.login-details-submit', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(14, 'admin.forgot.password', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(15, 'admin.send.otp', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(16, 'admin.otp.verification', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(17, 'admin.reset.password', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(18, 'admin.profileForm', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(19, 'admin.logout', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(20, 'admin.updateProfile', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(21, 'admin.add-user-form', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(22, 'admin.change-user-status', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(23, 'admin.change-user-password', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(24, 'admin.add-permission-form', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(25, 'admin.add-permission', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(26, 'admin.roles', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(27, 'admin.add-role-form', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(28, 'admin.add-role', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(29, 'admin.change-role-status', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(30, 'admin.faq.list', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(31, 'admin.assign-permissions-to-role', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(32, 'admin.assign-permissions', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(33, 'login', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(34, 'user.login-details-submit', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(35, 'user.dashboard', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(36, 'user.logout', 'admin', '2024-07-26 00:29:58', '2024-07-26 00:29:58'),
(37, 'admin.faq.form', 'admin', '2024-07-26 00:44:28', '2024-07-26 00:44:28'),
(38, 'admin.faq.add', 'admin', '2024-07-26 00:44:28', '2024-07-26 00:44:28'),
(39, 'admin.faq.edit', 'admin', '2024-07-26 00:44:28', '2024-07-26 00:44:28'),
(40, 'admin.faq.update', 'admin', '2024-07-26 00:44:28', '2024-07-26 00:44:28'),
(41, 'admin.faq.delete', 'admin', '2024-07-26 00:44:28', '2024-07-26 00:44:28'),
(42, 'admin.blog.list', 'admin', '2024-07-26 01:21:51', '2024-07-26 01:21:51'),
(43, 'admin.blog.form', 'admin', '2024-07-26 01:21:51', '2024-07-26 01:21:51'),
(44, 'admin.', 'admin', '2024-07-26 01:21:51', '2024-07-26 01:21:51'),
(45, 'admin.blog.edit', 'admin', '2024-07-26 01:21:51', '2024-07-26 01:21:51'),
(46, 'admin.blog.update', 'admin', '2024-07-26 01:21:51', '2024-07-26 01:21:51'),
(47, 'admin.blog.destroy', 'admin', '2024-07-26 01:21:51', '2024-07-26 01:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint UNSIGNED NOT NULL,
  `gallery_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `gallery_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(5, '4', NULL, '4807231722088009.jpeg', '2024-07-27 08:16:49', '2024-07-27 08:16:49'),
(6, '4', NULL, '6452261722088009.jpeg', '2024-07-27 08:16:49', '2024-07-27 08:16:49'),
(7, '4', NULL, '9045731722088009.jpeg', '2024-07-27 08:16:49', '2024-07-27 08:16:49'),
(8, '4', NULL, '9525031722088009.jpg', '2024-07-27 08:16:49', '2024-07-27 08:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '0 : Inactive , 1 : Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 1, '2024-07-25 23:45:41', '2024-07-25 23:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'title1', '20240726_977332292.jpeg', 'ghjnk', '2024-07-26 01:45:50', '2024-07-26 01:46:08'),
(3, 'wsedfr', NULL, 'wer', '2024-07-26 01:53:48', '2024-07-26 01:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_otp` int DEFAULT NULL,
  `mobile` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamics`
--
ALTER TABLE `dynamics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalsettings`
--
ALTER TABLE `generalsettings`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dynamics`
--
ALTER TABLE `dynamics`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `generalsettings`
--
ALTER TABLE `generalsettings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
