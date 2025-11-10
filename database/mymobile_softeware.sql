-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2025 at 08:40 AM
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
-- Database: `mymobile_softeware`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `subtitle`, `description`, `slug`, `author`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Beyond Transactions: Using E-commerce Data to Know Your Customers', 'Beyond Transactions: Using E-commerce Data to Know Your Customers', '<p>In the world of retail, knowledge is power. The more you know about your customers, the better you can serve them and grow your business. While a physical store can only offer limited insights, an e-commerce solution provides a goldmine of data that can be used to make smarter, more profitable decisions.</p>\r\n\r\n<p>Every click, view, and purchase on your website is a data point. E-commerce platforms are equipped with powerful analytics tools that allow you to track and understand customer behavior in real-time. You can see which products are most popular, where your customers are coming from, and at what point in the checkout process they abandon their cart. This invaluable information allows you to personalize the customer experience, from recommending products based on past purchases to creating targeted marketing campaigns that resonate with specific customer segments. By leveraging this data, you can optimize your website for a better user experience, identify your most loyal customers, and even predict future trends. An e-commerce solution moves you beyond simple transactions, empowering you to build a business that is not just selling products, but truly understanding and connecting with its customers.</p>', 'lorem-ipsum', 'Amir Saifi', '1758712684.webp', '1', '2025-09-23 04:58:25', '2025-10-18 00:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Active, 0 = Inactive',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'oppo', '5175594f-be00-448c-a735-bdf99ed97e86.png', 1, '2025-10-07 22:57:23', '2025-10-15 02:14:21'),
(2, 'iphone', '0b8de8ff-b3fc-4c93-b131-932f950f10db.jpeg', 1, '2025-10-08 01:25:43', '2025-10-15 02:13:47'),
(3, 'samsung', '23206685-6c64-4d7b-889d-c2235957a374.jpeg', 1, '2025-10-08 01:26:09', '2025-10-15 02:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Apple', '35cb2b08-24e8-4f38-8c7f-03165e397a54.jpeg', 1, '2025-10-07 07:12:29', '2025-10-15 01:28:47'),
(2, 'Vivo', 'a8950b56-2838-4577-8bfd-59c4529e4758.png', 1, '2025-10-07 07:13:54', '2025-10-15 01:28:46'),
(3, 'Oppo', '6c5cf53e-33ea-4db9-8a75-2e987e75543b.png', 1, '2025-10-07 07:15:20', '2025-10-15 01:16:00'),
(4, 'Samsung', 'e859e05f-37c0-4977-a9dd-8dbd4fdfc0af.jpeg', 1, '2025-10-07 23:49:14', '2025-10-15 01:04:56'),
(5, 'Galaxy S23 Ultra', '7cb2da53-b08a-4366-9527-1f0304b867a1.jpeg', 1, '2025-10-07 23:57:40', '2025-10-15 01:04:43'),
(6, 'Motorola', '1e07fe57-d03e-4199-8d3b-87c5b0048143.png', 1, '2025-10-07 23:58:31', '2025-10-15 01:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `slug`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about-us', '<h2>About Curecomm Solutions</h2>\r\n\r\n<p>At Curecomm Solutions, we believe that the future of business is built on meaningful connections. We are a multi-platform tech company with a simple but powerful mission: to help businesses connect with their customers, partners, and employees in ways that drive growth and build lasting loyalty. We&#39;re not just another tech company; we&#39;re a team that combines creativity, technology, and rewards to deliver exceptional experiences. Our journey began in 2023 with a vision to integrate innovation seamlessly into every aspect of life, and our motto of continuous learning and growth has driven us to become a partner of choice for category leaders across various industries, including Telecom, Mobile, Banking, and Automotive. Our Approach: Tech with a Heart Our success is rooted in our unique approach. We go beyond traditional solutions by blending cutting-edge technology with a deep understanding of human behavior. We leverage AI and insights to design and execute campaigns that are not only effective but also genuinely engaging.</p>\r\n\r\n<h2>Our Vision</h2>\r\n\r\n<p>We envision a future where innovation is accessible to all. Whether you&#39;re a small brand in India looking to delight your consumers or a large enterprise seeking to redefine your market, we are here to help you succeed. Our constant drive for innovation and expertise has garnered recognition, and we are proud to be a trusted partner in your growth story.</p>\r\n\r\n<h2>Ecommerce Platforms</h2>\r\n\r\n<p><a href=\"https://curecommsolutions.com/why-curecomm\"><img alt=\"\" src=\"https://curecommsolutions.com/assets/images/services/istockphoto-1639553609-612x612.webp\" /></a></p>\r\n\r\n<h3><a href=\"https://curecommsolutions.com/why-curecomm\">Why Curecomm</a></h3>\r\n\r\n<p><a href=\"https://curecommsolutions.com/our-client\"><img alt=\"\" src=\"https://curecommsolutions.com/assets/images/services/istockphoto-2044806125-612x612.jpg\" /></a></p>', 1, '2025-09-20 02:18:23', '2025-10-17 23:37:03'),
(2, 'Privacy Policy', 'privacy-policy', '<p>1. Introduction</p>\r\n\r\n<p>This Privacy Policy explains how <strong>Rebelify Technologies Private Limited</strong> (&quot;we,&quot; &quot;our,&quot; or &quot;us&quot;) collects, uses, and protects your information when you visit <strong><a href=\"https://curecommsolutions.com\">https://curecommsolutions.com</a></strong></p>\r\n\r\n<p>2. Information We Collect</p>\r\n\r\n<ul>\r\n	<li><strong>Personal Information:</strong> name, email address, phone number, or any details you provide through forms.</li>\r\n	<li><strong>Non-Personal Information:</strong> browser type, device, IP address, pages visited, and general usage data.</li>\r\n</ul>\r\n\r\n<p>3. How We Use Information</p>\r\n\r\n<p>We may use collected information to:</p>\r\n\r\n<ul>\r\n	<li>Provide and improve our services</li>\r\n	<li>Respond to inquiries and customer support</li>\r\n	<li>Send updates, newsletters, or promotional material (you can opt out anytime)</li>\r\n	<li>Ensure website security and prevent misuse</li>\r\n</ul>\r\n\r\n<p>4. Cookies &amp; Tracking</p>\r\n\r\n<p>We use cookies and similar technologies to enhance user experience, track website performance, and understand user preferences. You can disable cookies in your browser settings, but some features may not work properly.</p>\r\n\r\n<p>5. Sharing of Information</p>\r\n\r\n<p>We do not sell or rent your personal information. We may share it only with:</p>\r\n\r\n<ul>\r\n	<li>Trusted service providers assisting in operations (with confidentiality agreements)</li>\r\n	<li>Legal authorities, if required by law</li>\r\n</ul>\r\n\r\n<p>6. Data Security</p>\r\n\r\n<p>We implement appropriate technical and organizational measures to protect your personal data. However, no method of online transmission is 100% secure, and we cannot guarantee absolute security.</p>\r\n\r\n<p>7. Your Rights</p>\r\n\r\n<p>You have the right to:</p>\r\n\r\n<ul>\r\n	<li>Access the personal data we hold about you</li>\r\n	<li>Request corrections or updates</li>\r\n	<li>Request deletion of your data (subject to legal obligations)</li>\r\n	<li>Opt-out of promotional communications</li>\r\n</ul>\r\n\r\n<p>8. Changes to This Policy</p>\r\n\r\n<p>We may update this Privacy Policy from time to time. The latest version will always be available on this page with the updated date.</p>\r\n\r\n<p>9. Contact Us</p>\r\n\r\n<p>If you have questions regarding this Privacy Policy, contact us at:</p>\r\n\r\n<ul>\r\n	<li><strong>Email:</strong> <a href=\"mailto:info@curecommsolutions.com\">info@curecommsolutions.com</a></li>\r\n	<li><strong>Phone:</strong> <a href=\"tel:+ 917678667951\">917678667951</a> , <a href=\"tel:+ 917303770893\">917303770893</a></li>\r\n	<li><strong>Address:</strong> Office No. 103, Seven Wonders Business Center Plot No. 61, Sector 16 Noida, Gautam Buddh Nagar Uttar Pradesh &ndash; 201301 India</li>\r\n</ul>', 1, '2025-09-20 02:18:23', '2025-10-17 23:37:04'),
(4, 'Terms & Conditions', 'dsfasdf', '<!-- Intro -->\r\n<p>These Terms &amp; Conditions (&quot;Terms&quot;) govern your use of <strong>Rebelify Technologies Private Limited</strong> <a href=\"https://curecommsolutions.com\">https://curecommsolutions.com</a> By accessing or using the Site, you accept these Terms.</p>\r\n<!-- Sections -->\r\n\r\n<p>1. Acceptance of Terms</p>\r\n\r\n<p>By visiting or using this Site, you agree to these Terms and our <a href=\"https://curecommsolutions.com/privacy-policy\">Privacy Policy</a>. If you do not agree, please do not use our Site.</p>\r\n\r\n<p>2. Use of Website</p>\r\n\r\n<ul>\r\n	<li>The content provided is for <strong>informational and promotional</strong> purposes only.</li>\r\n	<li>You agree not to use the Site for any illegal, malicious, or fraudulent activity.</li>\r\n	<li>You may view and download content for personal use; commercial redistribution requires written permission.</li>\r\n</ul>\r\n\r\n<p>3. Intellectual Property Rights</p>\r\n\r\n<p>All content (text, images, logos, icons, video) on this Site is the property of <strong>Rebelify Technologies Private Limited</strong> or its licensors, unless otherwise noted. Unauthorized copying or use is prohibited.</p>\r\n\r\n<p>4. Third-Party Links</p>\r\n\r\n<p>The Site may contain links to third-party websites. We do not endorse or take responsibility for any content, policies, or practices of those sites. Visiting third-party links is at your own risk.</p>\r\n\r\n<p>5. Disclaimer of Warranties</p>\r\n\r\n<p>We aim to keep information accurate and up-to-date, but the Site is provided &quot;as is&quot; without warranties of any kind. Nothing on the Site should be construed as professional advice.</p>\r\n\r\n<p>6. Limitation of Liability</p>\r\n\r\n<p><strong>Rebelify Technologies Private Limited</strong> is not liable for any direct, indirect, incidental, or consequential damages arising from use of the Site. This includes loss of data, revenue, or business opportunities.</p>\r\n\r\n<p>7. Changes to Terms</p>\r\n\r\n<p>We may update these Terms at any time. Continued use of the Site after updates constitutes acceptance of the revised Terms. We recommend checking this page periodically.</p>\r\n\r\n<p>8. Governing Law</p>\r\n\r\n<p>These Terms are governed by the laws of <strong>India</strong>. Any disputes will be subject to the jurisdiction of courts in <strong>Uttar Pradesh</strong>.</p>\r\n\r\n<p>9. Contact Us</p>\r\n\r\n<p>If you have questions about these Terms, contact us at:</p>\r\n\r\n<ul>\r\n	<li><strong>Email:</strong> <a href=\"mailto:info@curecommsolutions.com\">info@curecommsolutions.com</a></li>\r\n	<li><strong>Phone:</strong> <a href=\"tel:+ 917678667951\">917678667951</a> , <a href=\"tel:+ 917303770893\">917303770893</a></li>\r\n	<li><strong>Address:</strong> Office No. 103, Seven Wonders Business Center Plot No. 61, Sector 16 Noida, Gautam Buddh Nagar Uttar Pradesh &ndash; 201301 India</li>\r\n</ul>\r\n<!-- Footer action --><!--<div class=\"mt-3 d-flex gap-2\">--><!--  <a href=\"#\" class=\"btn btn-primary btn-sm\">Privacy Policy</a>--><!--  <a href=\"#\" class=\"btn btn-outline-secondary btn-sm\">Return to Home</a>--><!--</div>-->', 1, '2025-09-20 03:29:46', '2025-09-20 07:04:12'),
(6, 'Return & Refund Policy', 'return-refund-policy', '<p>Return &amp; Refund Policy</p>', 1, '2025-09-22 06:32:19', '2025-10-17 23:20:53');

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
(1, '2025_09_18_101345_create_users_table', 1),
(2, '2025_09_19_063107_create_products_table', 2),
(3, '2025_09_20_073858_create_cms_pages_table', 3),
(4, '2025_09_22_061627_create_socials_table', 4),
(5, '2025_09_22_070117_create_sitesettings_table', 5),
(6, '2025_09_22_094431_create_categories_table', 6),
(7, '2025_09_22_094506_create_subcategories_table', 6),
(8, '2025_09_23_045613_create_password_resets_table', 7),
(9, '2025_09_23_064506_add_role_id_to_users_table', 8),
(10, '2025_09_23_073912_create_testimonials_table', 9),
(11, '2025_09_23_093621_create_blogs_table', 10),
(12, '2025_09_23_113438_add_image_to_users_table', 11),
(13, '2025_10_15_050253_create_cache_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `tax_total` decimal(10,2) DEFAULT 0.00,
  `discount_total` decimal(10,2) DEFAULT 0.00,
  `grand_total` decimal(10,2) NOT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `status` enum('pending','processing','completed','cancelled') DEFAULT 'pending',
  `shipping_address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `subtotal`, `tax_total`, `discount_total`, `grand_total`, `payment_method`, `status`, `shipping_address`, `created_at`, `updated_at`) VALUES
(1, 'ORD20251018104500', 6, 2450.00, 50.00, 0.00, 2500.00, 'Cash', 'pending', '123 Main Street, Mumbai', '2025-10-18 06:20:23', '2025-10-18 06:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(6, 'amirsaifi7671@gmail.com', '$2y$12$AbsQX2YocYYLXbdvaCDTj.yL0iVAiohI5LlrEvj7Lz5tAfPwDzlFS', '2025-09-23 00:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `sellprice` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `guarantee` varchar(100) DEFAULT NULL,
  `sku` varchar(100) NOT NULL,
  `producttype_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `mrp`, `sellprice`, `stock`, `guarantee`, `sku`, `producttype_id`, `subcategory_id`, `category_id`, `brand_id`, `status`, `created_at`, `updated_at`) VALUES
(18, 'Samsung Original 45W Type-C Travel Adaptor with Cable, Black', 'c5f543c4-94ae-44ce-969c-2a9430a44cc3.webp', '<p>Samsung Original 45W Type-C Travel Adaptor with Cable, Black<br />\r\nSamsung Original 45W Type-C Travel Adaptor with Cable, Black<br />\r\nSamsung Original 45W Type-C Travel Adaptor with Cable, Black<br />\r\nSamsung Original 45W Type-C Travel Adaptor with Cable, Black</p>', 1200.00, 1100.00, 10, '1', 'SKU-20251025-P54A', 3, 4, 4, 3, 1, '2025-10-25 04:03:06', '2025-10-25 11:55:46'),
(19, 'Display for Samsung Galaxy S23 Ultra - Black', '35e02250-055e-43a5-91ea-8f21eca8b005.webp', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Display for Samsung Galaxy S23 Ultra - Black</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Display for Samsung Galaxy S23 Ultra - Black</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</p>', 15000.00, 12999.00, 115, '3', 'SKU-20251025-ECYA', 2, 5, 4, 3, 1, '2025-10-25 04:10:19', '2025-10-25 11:55:51'),
(20, 'LCD with Touch Screen for Apple iPhone 13 pro - Black', 'e835f74b-1ade-48b7-a93d-320df7a00c6f.webp', '<p>LCD with Touch Screen for Apple iPhone 13 pro - Black<br />\r\nLCD with Touch Screen for Apple iPhone 13 pro - Black<br />\r\nLCD with Touch Screen for Apple iPhone 13 pro - Black</p>', 2000.00, 18000.00, 119, '6', 'SKU-20251025-JXJY', 2, 2, 1, 2, 1, '2025-10-25 04:12:07', '2025-10-27 22:43:37'),
(21, 'Pikkme Back Cover | Electroplated Crome Metal Ring | Full Camera Protection | Raised Edges | Super Soft Side TPU | Bumper Case for Nothing Phone 1 (Dark Green)', '030bbea3-f9a4-4782-9192-4a0aa311b291.jpg', '<ul>\r\n	<li>All Around protection: Soft Silicon Side case wraps around the whole phone for all around protection. Covers all four sides and includes raised edges to keep the screen safe.</li>\r\n	<li>High Quality Material : Our cases are 100% Original Crome plated. We use premium metal Ring and metal buttons, consistent texture and is easy to clean and maintain. It is durable and the grip of the side TPU is of top-grade.</li>\r\n	<li>PRECISE CUTOUTS:Take pictures, listen to music, charge your phone, and use your side buttons without removing the case! Exquisite cutouts offer an easier access to all ports, all buttons, sensors, speakers and camera on your phone.</li>\r\n	<li>Camera Protection: The cover has raised edges around the camera which protects it even during a fall.</li>\r\n	<li>Comfortable Grip: Unique luxury texture design offers good grip and comfort with its side tpu, excellent crome plated metal ring, features perfect hand feeling. Maximize the functionality of your phone with Anti-Slip sides.</li>\r\n</ul>', 200.00, 150.00, 10, '12', 'SKU-20251025-S9JH', 2, 5, 4, 3, 1, '2025-10-25 06:24:37', '2025-10-25 11:55:59'),
(22, 'Crome Case Silicone Shockproof Golden Plating Crystal Clear Soft Silicone Chrome Mobile Back Case Cover Compatible with Redmi 9A (Cream)', '6c2389b4-501d-4674-954f-9ce3987963a3.avif', '<p>Name&nbsp;:&nbsp;Crome Case Silicone Shockproof Golden Plating Crystal Clear Soft Silicone Chrome Mobile Back Case Cover Compatible with Redmi 9A (Cream)</p>\r\n<p>Color&nbsp;:&nbsp;Grey</p>\r\n<p>Compatible Models&nbsp;:&nbsp;Redmi 9</p>\r\n<p>Material&nbsp;:&nbsp;Silicon</p>\r\n<p>Net Quantity (N)&nbsp;:&nbsp;1</p>\r\n<p>Theme&nbsp;:&nbsp;No Theme</p>\r\n<p>Type&nbsp;:&nbsp;Plain</p>\r\n<p>New and high quality full protection Back case Cover for Samsung Galaxy S22 Ultra 5G with Golden Border Electroplating . Easy access to all buttons and ports without removing the Case.</p>\r\n<p>Country of Origin&nbsp;:&nbsp;India</p>', 500.00, 400.00, 10, NULL, 'SKU-20251025-0DUN', 1, 4, 4, 3, 1, '2025-10-25 06:44:53', '2025-10-25 06:46:26'),
(23, 'iPad Pro 11', 'ffaef230-e46f-4a9b-9fc4-6a60fdd0abbb.jpg', '<p>Apple M5 chip brings next-generation speed and powerful on‑device AI to the personal, professional and creative tasks you do every&nbsp;day</p>\r\n\r\n<p>Apple Intelligence helps you communicate, express yourself and get things done effortlessly while giving you peace of mind with groundbreaking privacy protections&nbsp;footnote&nbsp;&sup1;</p>\r\n\r\n<p>Ultra Retina XDR display&nbsp;footnote&nbsp;&sup2; with ProMotion, P3&shy; wide colour and True Tone. Optional&nbsp;nano-texture&nbsp;glass.</p>', 99900.00, 89900.00, 10, NULL, 'IPA-37166', 3, 2, 1, 2, 1, '2025-10-27 23:17:19', '2025-10-27 23:17:19'),
(24, 'Smart Folio for iPad (A16) – Sky', 'acd3d3c5-c1b4-45fa-8b78-538faac8a03f.jpg', '<p>&nbsp;</p>\r\n\r\n<p>The Smart Folio for iPad (A16) is thin and light, and offers front and back protection for your device. It automatically wakes your iPad when opened and puts it to sleep when closed. The Smart Folio attaches magnetically, and you can easily fold it into different positions to create a stand for reading, viewing, typing or making FaceTime calls.</p>', 45000.00, 43990.00, 30, '12', 'SKU-20251028-TQKA-SMA-88401', 1, 2, 1, 2, 1, '2025-10-27 23:24:55', '2025-10-28 03:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `productsold`
--

CREATE TABLE `productsold` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `mrp` decimal(10,2) DEFAULT NULL,
  `sellprice` decimal(10,2) DEFAULT NULL,
  `rating` decimal(3,2) NOT NULL DEFAULT 0.00,
  `size` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productsold`
--

INSERT INTO `productsold` (`id`, `name`, `image`, `mrp`, `sellprice`, `rating`, `size`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GRECIILOOKS Regular Trouser Loose Fit', 'uploads/products/8f9edabb-7821-427e-a2f4-36a3a405c457.avif', 20000.00, 600.00, 5.00, 'S,M,L,XL,XXL', 'active', '2025-09-22 06:22:40', '2025-09-23 23:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Active, 0 = Inactive',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `slug`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Combo', 'combo', '<p>mobile combo</p>', 'f8d03f28-fe01-4c20-884e-0e61967173c9.webp', 1, '2025-10-08 01:26:34', '2025-10-15 05:09:30'),
(2, 'display', 'display', '<p>display</p>', 'ff496181-5d3d-49af-a5c8-ec45106cb1c4.jpeg', 1, '2025-10-08 03:24:54', '2025-10-15 05:09:11'),
(3, 'charger', 'charger', '<p>charger</p>', '514e0b20-7b35-4224-af07-7bff4456f796.jpg', 1, '2025-10-08 03:26:14', '2025-10-16 07:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `sitesettings`
--

CREATE TABLE `sitesettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `background_color` varchar(255) DEFAULT NULL,
  `footer_text` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitesettings`
--

INSERT INTO `sitesettings` (`id`, `name`, `url`, `contact`, `email`, `address`, `logo`, `favicon`, `background_image`, `color`, `background_color`, `footer_text`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gtech logics india', 'https://gtechlogicsindia.com/', '7678667951', 'hey@gtechlogicsindia.com', 'kareem nagar', 'b182918c-9c6f-446e-aa39-4b396e2d992a.png', '4b691acf-373e-4240-8208-15cf4f0cb98b.jpg', 'eb0db215-da55-49c6-a11a-61fe6a681976.jpg', '#0d4db5', '#f4c27b', 'Welcome to Rebelify Technologies Private Limited – a ProMoTech leader in tactical and loyalty-driven campaigns. We design innovative Retailer, Influencer, Distributor, and Sales Loyalty Programs that go beyond rewards....', 1, '2025-09-22 02:21:07', '2025-10-16 02:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `label`, `value`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Facebook', 'https://www.facebook.com/', 1, '2025-09-22 06:56:52', '2025-10-14 03:20:04'),
(6, 'Instagram', 'https://www.instagram.com/', 1, '2025-09-22 06:56:52', '2025-09-22 06:56:52'),
(7, 'Twitter', 'https://x.com/', 1, '2025-09-22 06:56:52', '2025-09-22 07:09:18'),
(8, 'WhatsApp', 'https://web.whatsapp.com/', 1, '2025-09-22 06:56:52', '2025-10-14 03:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `total_stock` int(11) NOT NULL DEFAULT 0,
  `sold_stock` int(11) NOT NULL DEFAULT 0,
  `remaining_stock` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `total_stock`, `sold_stock`, `remaining_stock`, `created_at`, `updated_at`) VALUES
(4, 18, 10, 0, 10, '2025-10-25 04:03:06', '2025-10-25 06:07:41'),
(5, 19, 115, 0, 115, '2025-10-25 04:10:19', '2025-10-25 04:56:01'),
(6, 20, 119, 0, 119, '2025-10-25 04:12:07', '2025-10-27 22:43:37'),
(7, 21, 10, 0, NULL, '2025-10-25 06:24:37', '2025-10-25 06:24:37'),
(8, 22, 10, 0, NULL, '2025-10-25 06:44:53', '2025-10-25 06:44:53'),
(9, 23, 10, 0, NULL, '2025-10-27 23:17:19', '2025-10-27 23:17:19'),
(10, 24, 30, 0, 30, '2025-10-27 23:24:55', '2025-10-28 03:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'iPhone 16', 'a2cefa3c-f763-44b9-b30d-a11eec48a7ec.jpeg', 1, '2025-10-08 00:02:34', '2025-10-15 01:50:18'),
(3, 1, 'iPhone 16 Pro', '1ef2f0ab-48a1-4d3e-963d-4bbedf931293.jpeg', 1, '2025-10-08 00:04:30', '2025-10-28 03:55:15'),
(4, 4, 'Galaxy S23', '24c8bd15-402b-4a79-8f78-1b6bc5994e03.png', 1, '2025-10-08 00:06:07', '2025-10-15 01:49:39'),
(5, 4, 'Galaxy S23 Ultra', '849dfb64-f5d7-471a-8d48-284c85c38b70.jpeg', 1, '2025-10-08 00:07:24', '2025-10-15 01:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `company`, `message`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Rajesh Sharma', 'Founder – Jaipur Handicrafts Exporters', 'Jaipur Handicrafts Exporters Pvt. Ltd.', '“CureComm Solution turned our online presence into global visibility!”', 'uploads/testimonials/1758617906.jpg', '2025-09-23 03:27:40', '2025-09-24 06:02:24'),
(4, 'Neha Mehta', 'Marketing Manager', 'Royal Palace Hotels', 'From zero bookings to full occupancy – CureComm made it possible.', 'uploads/testimonials/1758713651.jpg', '2025-09-24 06:04:11', '2025-09-24 06:04:11'),
(5, 'Aarav Gupta', 'CEO', 'EduSmart Coaching Institute', 'They don’t just do digital marketing, they deliver measurable growth', 'uploads/testimonials/1758713780.jpg', '2025-09-24 06:06:20', '2025-09-24 06:06:20'),
(6, 'Pooja Saini', 'Owner', 'Trendy Threads Boutique', 'CureComm helped us become Jaipur’s favorite online fashion brand', 'uploads/testimonials/1758713841.jpg', '2025-09-24 06:07:21', '2025-09-24 06:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1=Admin, 2=User',
  `address` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `otp_expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `image`, `role`, `address`, `address2`, `city`, `state`, `pincode`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `otp`, `otp_expires_at`) VALUES
(3, 'amir', NULL, 'amir@gmail.com', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$cXdC3McQIeHzSLRZpMxeXud3NxAbT54gBUMifgCgo0WlYwkLVAtr6', NULL, '2025-09-18 04:49:45', '2025-09-18 04:49:45', NULL, NULL),
(4, 'Amir Saifis', '8979728150', 'amirsaifi7671@gmail.com', '1758629025.avif', 1, NULL, NULL, 'California', NULL, '90011', NULL, '$2y$12$BDON52qHTisXWRe7DdpHGOuK89pZDaTv2RIFQ0imfPJPs5wMywZgO', NULL, '2025-09-18 05:01:34', '2025-09-23 06:33:45', NULL, NULL),
(5, 'Amir Saifi', '7023574769', 'admin@gmail.com', '1761374721.jpg', 1, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$rKXt/giUbPA9zdcthCy1xu3QIGT0sA6lBMSFZa5z.8ZxW.qsTLEOS', NULL, '2025-10-07 22:43:51', '2025-10-25 01:18:43', NULL, NULL),
(6, 'amirsaifi', NULL, 'admin1@gmail.com', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$KxmZE5M6l4CL.fBbh80ZnuDto4i6D27Ux82UOCTtCsAXbReyAxFgm', NULL, '2025-10-12 23:31:14', '2025-10-12 23:31:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `manager_name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `location`, `manager_name`, `contact_number`, `created_at`, `updated_at`) VALUES
(1, 'Main Warehouse', 'Jaipur, Rajasthan', 'Pawan Kumar', '6375774392', '2025-10-25 06:55:28', '2025-10-25 06:55:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cms_pages_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `fk_products_category` (`category_id`),
  ADD KEY `fk_products_brand` (`brand_id`),
  ADD KEY `fk_products_subcategory` (`subcategory_id`),
  ADD KEY `fk_products_producttype` (`producttype_id`);

--
-- Indexes for table `productsold`
--
ALTER TABLE `productsold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `sitesettings`
--
ALTER TABLE `sitesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_product_id_foreign` (`product_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `productsold`
--
ALTER TABLE `productsold`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sitesettings`
--
ALTER TABLE `sitesettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_brand` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_products_producttype` FOREIGN KEY (`producttype_id`) REFERENCES `product_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_products_subcategory` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
