-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table utemsihat.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  UNIQUE KEY `cache_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table utemsihat.cache: ~0 rows (approximately)
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;

-- Dumping structure for table utemsihat.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table utemsihat.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table utemsihat.foods
CREATE TABLE IF NOT EXISTS `foods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `image_url` text,
  `description` varchar(255) DEFAULT NULL,
  `calorie` float(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table utemsihat.foods: ~2 rows (approximately)
/*!40000 ALTER TABLE `foods` DISABLE KEYS */;
INSERT INTO `foods` (`id`, `type_id`, `name`, `image_url`, `description`, `calorie`, `created_at`, `updated_at`) VALUES
	(1, 2, 'AYAM GORENG', NULL, 'Fried chiken 30g', 10.00, NULL, '2020-06-16 02:14:30'),
	(2, 1, 'FRIED MEE', 'https://img.delicious.com.au/I1ULxXzq/w1200/del/2017/07/malaysian-chicken-mee-goreng-49049-2.jpg', 'Fried chiken 30g', 60.00, NULL, NULL);
/*!40000 ALTER TABLE `foods` ENABLE KEYS */;

-- Dumping structure for table utemsihat.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table utemsihat.jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

-- Dumping structure for table utemsihat.ledgers
CREATE TABLE IF NOT EXISTS `ledgers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `recordable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recordable_id` bigint(20) unsigned NOT NULL,
  `context` tinyint(3) unsigned NOT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pivot` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ledgers_recordable_type_recordable_id_index` (`recordable_type`,`recordable_id`),
  KEY `ledgers_user_id_user_type_index` (`user_id`,`user_type`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table utemsihat.ledgers: ~30 rows (approximately)
/*!40000 ALTER TABLE `ledgers` DISABLE KEYS */;
INSERT INTO `ledgers` (`id`, `user_type`, `user_id`, `recordable_type`, `recordable_id`, `context`, `event`, `properties`, `modified`, `pivot`, `extra`, `url`, `ip_address`, `user_agent`, `signature`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$KWEPyrClkyHgR2u0fY0t5uV9j4gHMwlgK2.rLS.QrNTQUa7jz11Pi","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":null,"last_login_at":null,"last_login_ip":null,"to_be_logged_out":0,"remember_token":"PKRzZaWKUmm5uUR4xN3ocPEPvlMzC7AlxREvUbkQi9AIrrG5mrclkWOKhdJx","created_at":"2020-05-31 07:26:43","updated_at":"2020-05-31 07:26:43","deleted_at":null}', '["remember_token"]', '[]', '[]', 'http://utemsihat.test/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'b8a00980c98fe90e68abe78d05c27fec7bed54de97b1cf286cab5c1d728214dd8360c0160f65d94eb05ab4e1de26599aa84818b39d4c8be14b0cf6525003972d', '2020-05-31 08:47:35', '2020-05-31 08:47:35'),
	(2, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$KWEPyrClkyHgR2u0fY0t5uV9j4gHMwlgK2.rLS.QrNTQUa7jz11Pi","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-05-31 08:47:35","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"PKRzZaWKUmm5uUR4xN3ocPEPvlMzC7AlxREvUbkQi9AIrrG5mrclkWOKhdJx","created_at":"2020-05-31 07:26:43","updated_at":"2020-05-31 08:47:35","deleted_at":null}', '["timezone","last_login_at","last_login_ip","updated_at"]', '[]', '[]', 'http://utemsihat.test/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'e80a0994b2a978eaebff4d3e8a3ee1c945f39aa56de475ab9dd8db96496900e1bc3e1142057422af54fcaf5256d9917252d637ac5db0678951fec9ea284103c1', '2020-05-31 08:47:35', '2020-05-31 08:47:35'),
	(3, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$uzMeMF5N8Kpc\\/fO9c7AUIOAp0R6hVwqwmssBovyre4M9jaWSZrC22","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-05-31 08:47:35","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"PKRzZaWKUmm5uUR4xN3ocPEPvlMzC7AlxREvUbkQi9AIrrG5mrclkWOKhdJx","created_at":"2020-05-31 07:26:43","updated_at":"2020-05-31 08:47:35","deleted_at":null}', '["password"]', '[]', '[]', 'http://utemsihat.test/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'c71eded209f653d21558a8e89cbd40ef4a04f39c34b3966d6c97785ecbd08e8c3eeaac3a89e62fba5a319e7e9e4a7e37da7584fad5435e2b52ba930eac20676d', '2020-05-31 08:47:35', '2020-05-31 08:47:35'),
	(4, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$uzMeMF5N8Kpc\\/fO9c7AUIOAp0R6hVwqwmssBovyre4M9jaWSZrC22","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-05-31 08:47:35","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"bR3RfEbuuu3yMJD7MWxusGXFqWW9dxnWbZyLrnAVSlpJjjpVkgi0qo90BGVV","created_at":"2020-05-31 07:26:43","updated_at":"2020-05-31 08:47:35","deleted_at":null}', '["remember_token"]', '[]', '[]', 'http://utemsihat.test/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', '648b5b1fc763a65436a6770f19a5815fcacc2a3b9c8773ebe6eb6538055057a962e7982546f3303bcf006d0fea53ff969cb1624a4242c7005a33d87bde39a450', '2020-05-31 08:49:22', '2020-05-31 08:49:22'),
	(5, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$uzMeMF5N8Kpc\\/fO9c7AUIOAp0R6hVwqwmssBovyre4M9jaWSZrC22","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-05-31 08:49:32","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"bR3RfEbuuu3yMJD7MWxusGXFqWW9dxnWbZyLrnAVSlpJjjpVkgi0qo90BGVV","created_at":"2020-05-31 07:26:43","updated_at":"2020-05-31 08:49:32","deleted_at":null}', '["last_login_at","updated_at"]', '[]', '[]', 'http://utemsihat.test/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'a71b5f71add50b8a81955b3fec3fcd402d736f5b7bfbcca35432e6c08fae331725e68075791efcb8de19e54b06d216b55ba4b2abb3eafb0cb9c037a5b5d32e2d', '2020-05-31 08:49:32', '2020-05-31 08:49:32'),
	(6, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$14VaB2x8fXk9getoqxqZieCGLm5af93R\\/qg4IyA.1xbwETixWzQ5S","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-05-31 08:49:32","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"bR3RfEbuuu3yMJD7MWxusGXFqWW9dxnWbZyLrnAVSlpJjjpVkgi0qo90BGVV","created_at":"2020-05-31 07:26:43","updated_at":"2020-05-31 08:49:32","deleted_at":null}', '["password"]', '[]', '[]', 'http://utemsihat.test/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', '40c63404869d0d2f100ac958087373646b34538a9bb62ea4e51f5389fc4704d3ed19bc6bb71b7e0e5784a138816854dd42be616ee9708fa475e074932cb4a4a8', '2020-05-31 08:49:32', '2020-05-31 08:49:32'),
	(7, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$14VaB2x8fXk9getoqxqZieCGLm5af93R\\/qg4IyA.1xbwETixWzQ5S","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-05-31 08:49:32","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"5xsEBlOlPwhPNJVvHolhWjViBAHLYxPpqzFTm7sH8ExyoF1FwPNnkbN8yMYa","created_at":"2020-05-31 07:26:43","updated_at":"2020-05-31 08:49:32","deleted_at":null}', '["remember_token"]', '[]', '[]', 'http://utemsihat.test/logout', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'cdd957f0d414d4ee8ec6cdf30359a2f5dfd6abee438835f9f51f454de3eb642aaebc78ef9659bd13077407fdf8f559668c3598063e61d7fe27c959144512ac39', '2020-05-31 10:06:02', '2020-05-31 10:06:02'),
	(8, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$14VaB2x8fXk9getoqxqZieCGLm5af93R\\/qg4IyA.1xbwETixWzQ5S","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-05-31 10:06:12","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"5xsEBlOlPwhPNJVvHolhWjViBAHLYxPpqzFTm7sH8ExyoF1FwPNnkbN8yMYa","created_at":"2020-05-31 07:26:43","updated_at":"2020-05-31 10:06:12","deleted_at":null}', '["last_login_at","updated_at"]', '[]', '[]', 'http://utemsihat.test/login', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '506d17e8005730f9f88b898c1f05a673e4e0fe1a07cabd35fa6e250ff6060c79517db186b1b4e456816d6d1a3c965f916806ce252640b8c27f2eaa1245c163ef', '2020-05-31 10:06:12', '2020-05-31 10:06:12'),
	(9, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$RTMyhkfpjifj0HocKq6PxOsS07viEo.rU0ESl20sdwCaqY4aM50EK","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-05-31 10:06:12","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"5xsEBlOlPwhPNJVvHolhWjViBAHLYxPpqzFTm7sH8ExyoF1FwPNnkbN8yMYa","created_at":"2020-05-31 07:26:43","updated_at":"2020-05-31 10:06:12","deleted_at":null}', '["password"]', '[]', '[]', 'http://utemsihat.test/login', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'd83d609c978d47a55397c8f835f65bf449c7f7104aca25a7e58648d3ae827248edf1d4776ec0cad23841129f49543ebb35fe2b8bfc1ad00fcb1d06152fd710dd', '2020-05-31 10:06:12', '2020-05-31 10:06:12'),
	(10, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$RTMyhkfpjifj0HocKq6PxOsS07viEo.rU0ESl20sdwCaqY4aM50EK","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-05-31 10:06:12","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"qRABg0DPmEQ2IPgSikd3lBg6TTnowgsZKv5FexOKmQO6sO7OYoYmxFzgkbdr","created_at":"2020-05-31 07:26:43","updated_at":"2020-05-31 10:06:12","deleted_at":null}', '["remember_token"]', '[]', '[]', 'http://utemsihat.test/logout', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '6dab01cd2e433fe7b0d2e528d47b80dbc468920db770745ebfb38a4f04f4bf5503cd30353f0ceafb589c072c88e85ad96f4c42a6dc64e941025421c9153d288b', '2020-05-31 10:06:15', '2020-05-31 10:06:15'),
	(11, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$RTMyhkfpjifj0HocKq6PxOsS07viEo.rU0ESl20sdwCaqY4aM50EK","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-05-31 10:06:28","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"qRABg0DPmEQ2IPgSikd3lBg6TTnowgsZKv5FexOKmQO6sO7OYoYmxFzgkbdr","created_at":"2020-05-31 07:26:43","updated_at":"2020-05-31 10:06:28","deleted_at":null}', '["last_login_at","updated_at"]', '[]', '[]', 'http://utemsihat.test/login', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '3b4ca6a1f8c6940a61a472d2133b9c6cfeee76c9147b6ea4206ec2672116a951f504c58f47a004f72844531aa90bf9f19cfa8eb5724db658e98c7579c2244229', '2020-05-31 10:06:28', '2020-05-31 10:06:28'),
	(12, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$6boOEfgV0ZyjbFcMRNbPTudsBIa.1boBL5XXSGWv5NHwQe3P\\/Ays6","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-05-31 10:06:28","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"qRABg0DPmEQ2IPgSikd3lBg6TTnowgsZKv5FexOKmQO6sO7OYoYmxFzgkbdr","created_at":"2020-05-31 07:26:43","updated_at":"2020-05-31 10:06:28","deleted_at":null}', '["password"]', '[]', '[]', 'http://utemsihat.test/login', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '851ce5d94eb4fea2b3bd427f5e39df997dfa07ea175fb73c62e7d6333c2f6facf220e520ca1c1d73f56414c21d7cf0af9d49e8c64d43c9e5626b88e91bce3492', '2020-05-31 10:06:28', '2020-05-31 10:06:28'),
	(13, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$6boOEfgV0ZyjbFcMRNbPTudsBIa.1boBL5XXSGWv5NHwQe3P\\/Ays6","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-05-31 10:06:28","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"4hEDXkoKOeJ6go3glySA7JcXkTB1cuHPPxwTPACethvfSssKnQjYQH808766","created_at":"2020-05-31 07:26:43","updated_at":"2020-05-31 10:06:28","deleted_at":null}', '["remember_token"]', '[]', '[]', 'http://utemsihat.test/logout', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'fd66c27bed0879a2dd46a75c38acce628654afb826e0973d7b59e12cb627ef8a8d89282becc63b5c56ca910d34d799e00bb97199a6470e014190e40d9451680a', '2020-05-31 10:43:52', '2020-05-31 10:43:52'),
	(14, 'App\\Models\\Auth\\User', 1, 'App\\Models\\Auth\\User', 1, 4, 'updated', '{"id":1,"uuid":"198157c8-960c-446f-856a-f7d61e274680","first_name":"Super","last_name":"Admin","email":"admin@admin.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$ozz5tNsPO7kNXEjZ1w9jgeSfQ1emK8z.krSZSpMWD20eULIH9Eyb2","password_changed_at":null,"active":1,"confirmation_code":"7b9774cf4cdd71faa0173ae1df079e6c","confirmed":1,"timezone":null,"last_login_at":null,"last_login_ip":null,"to_be_logged_out":0,"remember_token":"tFX4R7iLgA1sUTjLxVWm67BMyQBWvD3tmyBTK2rKJTUd112WWUBEQKruP79p","created_at":"2020-05-31 07:26:43","updated_at":"2020-05-31 07:26:43","deleted_at":null}', '["remember_token"]', '[]', '[]', 'http://utemsihat.test/login', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '96464ddfd5861796ded3c15499dccefba217b16e856d91621e8e37b2b711eb8d8f982926e4e971fd6d6be88a9db311a9a2afb0dad7f74d9cd9ee57d783e835f2', '2020-05-31 10:44:05', '2020-05-31 10:44:05'),
	(15, 'App\\Models\\Auth\\User', 1, 'App\\Models\\Auth\\User', 1, 4, 'updated', '{"id":1,"uuid":"198157c8-960c-446f-856a-f7d61e274680","first_name":"Super","last_name":"Admin","email":"admin@admin.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$ozz5tNsPO7kNXEjZ1w9jgeSfQ1emK8z.krSZSpMWD20eULIH9Eyb2","password_changed_at":null,"active":1,"confirmation_code":"7b9774cf4cdd71faa0173ae1df079e6c","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-05-31 10:44:05","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"tFX4R7iLgA1sUTjLxVWm67BMyQBWvD3tmyBTK2rKJTUd112WWUBEQKruP79p","created_at":"2020-05-31 07:26:43","updated_at":"2020-05-31 10:44:05","deleted_at":null}', '["timezone","last_login_at","last_login_ip","updated_at"]', '[]', '[]', 'http://utemsihat.test/login', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'bf570d3fb17c9dbda86948930c93292f6690ac6b45a4f7a1fe8355fe6d355a1cdc76a68119a6230639470c9399b25ed16322cd1c4ced2a0b403a740088a05f16', '2020-05-31 10:44:05', '2020-05-31 10:44:05'),
	(16, 'App\\Models\\Auth\\User', 1, 'App\\Models\\Auth\\User', 1, 4, 'updated', '{"id":1,"uuid":"198157c8-960c-446f-856a-f7d61e274680","first_name":"Super","last_name":"Admin","email":"admin@admin.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$R2c8AwWZWlddah.z5yr.yOthmbzXB3zuxRMIA24ZXv\\/fbJYbj4F9y","password_changed_at":null,"active":1,"confirmation_code":"7b9774cf4cdd71faa0173ae1df079e6c","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-05-31 10:44:05","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"tFX4R7iLgA1sUTjLxVWm67BMyQBWvD3tmyBTK2rKJTUd112WWUBEQKruP79p","created_at":"2020-05-31 07:26:43","updated_at":"2020-05-31 10:44:05","deleted_at":null}', '["password"]', '[]', '[]', 'http://utemsihat.test/login', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'e7688761f69be85df10113822426368a01f56edbafc8abb9bd04a5d9776f8bd7e57d142b708dac894d26559a3fe3180bdf144792b12219281258270015c688f2', '2020-05-31 10:44:05', '2020-05-31 10:44:05'),
	(17, 'App\\Models\\Auth\\User', 1, 'App\\Models\\Auth\\User', 1, 4, 'updated', '{"id":1,"uuid":"198157c8-960c-446f-856a-f7d61e274680","first_name":"Super","last_name":"Admin","email":"admin@admin.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$R2c8AwWZWlddah.z5yr.yOthmbzXB3zuxRMIA24ZXv\\/fbJYbj4F9y","password_changed_at":null,"active":1,"confirmation_code":"7b9774cf4cdd71faa0173ae1df079e6c","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-05-31 10:44:05","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"OwsKEjgGFQ5e7RAK3r86NPDX9vP0kzeDjcFfBuwDWy7KGTVPol6iQuxyw6TV","created_at":"2020-05-31 07:26:43","updated_at":"2020-05-31 10:44:05","deleted_at":null}', '["remember_token"]', '[]', '[]', 'http://utemsihat.test/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', '759f842903d0b4eb6d1ba9c79ae043d6d114b1cf25ac796c7d2ef7dc5e30b8bcea8dc407afb652bf7b8393a56e2c3325cc621ed3f5cd0776b1de7ed0597019e3', '2020-06-04 12:44:34', '2020-06-04 12:44:34'),
	(18, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$6boOEfgV0ZyjbFcMRNbPTudsBIa.1boBL5XXSGWv5NHwQe3P\\/Ays6","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-06-04 12:44:42","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"4hEDXkoKOeJ6go3glySA7JcXkTB1cuHPPxwTPACethvfSssKnQjYQH808766","created_at":"2020-05-31 07:26:43","updated_at":"2020-06-04 12:44:43","deleted_at":null}', '["last_login_at","updated_at"]', '[]', '[]', 'http://utemsihat.test/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', '3a3bcc5c80f4e577314760acccba930aeb915c2c1c4c001b8eee95d1d94f80854fbad6a2c25b8d6c825c38e4040afbea6d4c519aeaaeb8d59333badc0fafd8dc', '2020-06-04 12:44:43', '2020-06-04 12:44:43'),
	(19, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$JkTVgcsoSphHzH4iMJdhhunISe9wMzcbYfwUp2D1rIXNceECgeMrO","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-06-04 12:44:42","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"4hEDXkoKOeJ6go3glySA7JcXkTB1cuHPPxwTPACethvfSssKnQjYQH808766","created_at":"2020-05-31 07:26:43","updated_at":"2020-06-04 12:44:43","deleted_at":null}', '["password"]', '[]', '[]', 'http://utemsihat.test/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'd7cc67fa76b7fd9474d6399171e41346cdd74390a248adf00b5e567d55852e8fbd95b1b1c054eb40ffed2023304f5282c7bddaf3074b85a80dd5f258fecac354', '2020-06-04 12:44:43', '2020-06-04 12:44:43'),
	(20, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$JkTVgcsoSphHzH4iMJdhhunISe9wMzcbYfwUp2D1rIXNceECgeMrO","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-06-04 12:44:42","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"LuwmAQY2ba0CrgkE3TYNoXhP6wOArw484q7MsqrObQvteO5NoZAgiDaqIrgK","created_at":"2020-05-31 07:26:43","updated_at":"2020-06-04 12:44:43","deleted_at":null}', '["remember_token"]', '[]', '[]', 'http://utemsihat.test/logout', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '817150d00ac5b49c55d667b56fa29ae011f74dd52b306fb7b89595a58799e5e95c6d543bbfd13d4573cd3c1cb877ca157bb45e240a4f6f3409d93d70bc19e17d', '2020-06-04 13:24:45', '2020-06-04 13:24:45'),
	(21, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$JkTVgcsoSphHzH4iMJdhhunISe9wMzcbYfwUp2D1rIXNceECgeMrO","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-06-04 13:28:31","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"LuwmAQY2ba0CrgkE3TYNoXhP6wOArw484q7MsqrObQvteO5NoZAgiDaqIrgK","created_at":"2020-05-31 07:26:43","updated_at":"2020-06-04 13:28:31","deleted_at":null}', '["last_login_at","updated_at"]', '[]', '[]', 'http://utemsihat.test/login', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', '02a4fcd8086e9f350f119e7dc96bf638da2dc8e9c41b3bf5a03bc878d87b03614ac885de8d6688ea9cea0a84ac30f998f1c43a3ccd78fa619a7e6b7274200d6b', '2020-06-04 13:28:31', '2020-06-04 13:28:31'),
	(22, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$YsWtR9d7WkMspk.1QHTB9.YRfQtN1cwERiSJj6ycoiQ1mwHX7gDui","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-06-04 13:28:31","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"LuwmAQY2ba0CrgkE3TYNoXhP6wOArw484q7MsqrObQvteO5NoZAgiDaqIrgK","created_at":"2020-05-31 07:26:43","updated_at":"2020-06-04 13:28:31","deleted_at":null}', '["password"]', '[]', '[]', 'http://utemsihat.test/login', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'fbec65f8c0a153383c867a5f970705a6fe8509a537bae9625719275fb1f389ef8c5b0f264c2c721615977f9732e6321edd1706825c21a2510801c5f31426f023', '2020-06-04 13:28:31', '2020-06-04 13:28:31'),
	(23, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","age":"23","gender":"F","weight":"72.5","height":"167","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$YsWtR9d7WkMspk.1QHTB9.YRfQtN1cwERiSJj6ycoiQ1mwHX7gDui","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-06-04 13:28:31","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"LuwmAQY2ba0CrgkE3TYNoXhP6wOArw484q7MsqrObQvteO5NoZAgiDaqIrgK","created_at":"2020-05-31 07:26:43","updated_at":"2020-06-15 08:17:23","deleted_at":null}', '["gender","updated_at"]', '[]', '[]', 'http://utemsihat.test/account', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', '6abd81114890395e9facf380a6d257015b65103ed5c23ff1565213e7cb3683f0c8515ff64fb01b9a1cbcd042c2ec72741884a9e18cfb201d44459741fa60155f', '2020-06-15 08:17:23', '2020-06-15 08:17:23'),
	(24, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","age":"34","gender":"F","weight":"72.5","height":"167","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$YsWtR9d7WkMspk.1QHTB9.YRfQtN1cwERiSJj6ycoiQ1mwHX7gDui","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-06-04 13:28:31","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"LuwmAQY2ba0CrgkE3TYNoXhP6wOArw484q7MsqrObQvteO5NoZAgiDaqIrgK","created_at":"2020-05-31 07:26:43","updated_at":"2020-06-15 08:17:37","deleted_at":null}', '["age","updated_at"]', '[]', '[]', 'http://utemsihat.test/account', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', '584744e6076fab443ed1de78d289a4d87a8399ad61b37cc7218b8ae949cd5e51b6ab74ef0098ba7c54fee77bc6b42e4d7e6b860b27faf636baf227424ef4ed78', '2020-06-15 08:17:37', '2020-06-15 08:17:37'),
	(25, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","age":"20","gender":"F","weight":"72.5","height":"167","email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$YsWtR9d7WkMspk.1QHTB9.YRfQtN1cwERiSJj6ycoiQ1mwHX7gDui","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-06-04 13:28:31","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"LuwmAQY2ba0CrgkE3TYNoXhP6wOArw484q7MsqrObQvteO5NoZAgiDaqIrgK","created_at":"2020-05-31 07:26:43","updated_at":"2020-06-15 08:18:30","deleted_at":null}', '["age","updated_at"]', '[]', '[]', 'http://utemsihat.test/account', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', '3f9c5282ca5ed2828d54a1c291e8b60363ef0dedee74989dca9d3cbaac8fc28ad29abb3aa146169cc50c7223f698c70cdab87bf9abeee6dcc3739135016be649', '2020-06-15 08:18:30', '2020-06-15 08:18:30'),
	(26, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","age":20,"gender":"F","weight":72.5,"height":167,"email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$YsWtR9d7WkMspk.1QHTB9.YRfQtN1cwERiSJj6ycoiQ1mwHX7gDui","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-06-15 10:28:15","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"LuwmAQY2ba0CrgkE3TYNoXhP6wOArw484q7MsqrObQvteO5NoZAgiDaqIrgK","created_at":"2020-05-31 07:26:43","updated_at":"2020-06-15 10:28:15","deleted_at":null}', '["last_login_at","updated_at"]', '[]', '[]', 'http://us.test/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'f7f49a20b37f84aa118961cba4483868e1550d61b544c6331519b3458ecd632a42363f5951df8c6884ed17b1d4e0ce96fff82bad34c3cb415a4c26a6dc51baab', '2020-06-15 10:28:15', '2020-06-15 10:28:15'),
	(27, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","age":20,"gender":"F","weight":72.5,"height":167,"email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$cABKyGDkKQMP.6D5ttto8.HooaCM1yMAg39SPhv07D9SsLrsgofma","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","last_login_at":"2020-06-15 10:28:15","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"LuwmAQY2ba0CrgkE3TYNoXhP6wOArw484q7MsqrObQvteO5NoZAgiDaqIrgK","created_at":"2020-05-31 07:26:43","updated_at":"2020-06-15 10:28:16","deleted_at":null}', '["password","updated_at"]', '[]', '[]', 'http://us.test/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', '484eb7c17ec3155c9ffbef261b10db755393caf6e32ac71b689b8255f7a4a3c218f11535ab292d62df209af4156d8bc10686ef028427e12917d037b5b2b694b7', '2020-06-15 10:28:16', '2020-06-15 10:28:16'),
	(28, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","age":20,"gender":"F","weight":72.5,"height":167,"email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$cABKyGDkKQMP.6D5ttto8.HooaCM1yMAg39SPhv07D9SsLrsgofma","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","lat":"4.6914329","lon":"115.0295545","state":"SWK","country":"unknown","last_login_at":"2020-06-15 10:28:15","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"LuwmAQY2ba0CrgkE3TYNoXhP6wOArw484q7MsqrObQvteO5NoZAgiDaqIrgK","created_at":"2020-05-31 07:26:43","updated_at":"2020-06-15 13:41:26","deleted_at":null}', '["lat","lon","state","updated_at"]', '[]', '[]', 'https://us.test/account/location', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', '3a0ebe61b765472462763035a2ffc819637224af399d9cfcb8a6ea65acaea0a6652cf39c0cb09d635f470351577d45761db6a510bbcb63765f667fbbb5871ffa', '2020-06-15 13:41:27', '2020-06-15 13:41:27'),
	(29, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","age":20,"gender":"F","weight":72.5,"height":167,"email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$cABKyGDkKQMP.6D5ttto8.HooaCM1yMAg39SPhv07D9SsLrsgofma","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","lat":"4.6914329","lon":"115.0295545","state":"SWK","country":"unknown","last_login_at":"2020-06-15 10:28:15","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"LuwmAQY2ba0CrgkE3TYNoXhP6wOArw484q7MsqrObQvteO5NoZAgiDaqIrgK","created_at":"2020-05-31 07:26:43","updated_at":"2020-06-15 13:56:42","deleted_at":null}', '["lat","lon","updated_at"]', '[]', '[]', 'https://us.test/account/location', '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Mobile Safari/537.36', '2c586502c01ab1f59436a34fa53d12c0f01269b282bef59d2daa6cd9f8d059091de47943600de317fe83d17d678b4a3b73ad9e53c2bbbfacbc179c44c68584e8', '2020-06-15 13:56:42', '2020-06-15 13:56:42'),
	(30, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","age":20,"gender":"F","weight":72.5,"height":167,"email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$cABKyGDkKQMP.6D5ttto8.HooaCM1yMAg39SPhv07D9SsLrsgofma","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","lat":"1.5535423499999998","lon":"110.35924626340086","state":"SWK","country":"unknown","last_login_at":"2020-06-15 10:28:15","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"LuwmAQY2ba0CrgkE3TYNoXhP6wOArw484q7MsqrObQvteO5NoZAgiDaqIrgK","created_at":"2020-05-31 07:26:43","updated_at":"2020-06-16 00:11:22","deleted_at":null}', '["lat","lon","updated_at"]', '[]', '[]', 'https://us.test/account/location', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'dafa45f1ae09c4d295b3f2f3154d386bf067ea45f39800a259179770695bc644923f5813335bb951b476964cf24fd9bacf286a43750e10e817136382a9f0a53a', '2020-06-16 00:11:22', '2020-06-16 00:11:22'),
	(31, 'App\\Models\\Auth\\User', 2, 'App\\Models\\Auth\\User', 2, 4, 'updated', '{"id":2,"uuid":"2ce2e723-12e4-4149-aaa7-7dabd70f86c2","first_name":"Default","last_name":"User","age":20,"gender":"F","weight":72.5,"height":167,"email":"user@user.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$cABKyGDkKQMP.6D5ttto8.HooaCM1yMAg39SPhv07D9SsLrsgofma","password_changed_at":null,"active":1,"confirmation_code":"cc65364a35d8a40a378d77cdc9079a02","confirmed":1,"timezone":"America\\/New_York","lat":"2","lon":"110","state":"SWK","country":"unknown","last_login_at":"2020-06-15 10:28:15","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"XK71RQ6eC6JSKu65JBv7LNnD2vs3F7mZ45LOFqHtMo9WmNWG8e8PyanrfBKi","created_at":"2020-05-31 07:26:43","updated_at":"2020-06-16 00:11:22","deleted_at":null}', '["remember_token"]', '[]', '[]', 'https://us.test/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'b581f1306e706fc3121007cb25720ceb33cd886c04411f752e22bef938f0d1811551004823691152715efd7a23b05d9cee1de86079f357aeb4583fbad8020126', '2020-06-16 00:21:52', '2020-06-16 00:21:52'),
	(32, 'App\\Models\\Auth\\User', 1, 'App\\Models\\Auth\\User', 1, 4, 'updated', '{"id":1,"uuid":"198157c8-960c-446f-856a-f7d61e274680","first_name":"Super","last_name":"Admin","age":null,"gender":"M","weight":null,"height":null,"email":"admin@admin.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$R2c8AwWZWlddah.z5yr.yOthmbzXB3zuxRMIA24ZXv\\/fbJYbj4F9y","password_changed_at":null,"active":1,"confirmation_code":"7b9774cf4cdd71faa0173ae1df079e6c","confirmed":1,"timezone":"America\\/New_York","lat":null,"lon":null,"state":"unknown","country":"unknown","last_login_at":"2020-06-16 00:22:01","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"OwsKEjgGFQ5e7RAK3r86NPDX9vP0kzeDjcFfBuwDWy7KGTVPol6iQuxyw6TV","created_at":"2020-05-31 07:26:43","updated_at":"2020-06-16 00:22:01","deleted_at":null}', '["last_login_at","updated_at"]', '[]', '[]', 'https://us.test/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'f415e352316cc6e8af44dd46151952a05df17c6dd3bd68bf50764490d7e3a9cffc8f666404aea145ec0e9c727ca6f36b24001e54ae8e7e4377ccd452f9d11b0f', '2020-06-16 00:22:01', '2020-06-16 00:22:01'),
	(33, 'App\\Models\\Auth\\User', 1, 'App\\Models\\Auth\\User', 1, 4, 'updated', '{"id":1,"uuid":"198157c8-960c-446f-856a-f7d61e274680","first_name":"Super","last_name":"Admin","age":null,"gender":"M","weight":null,"height":null,"email":"admin@admin.com","avatar_type":"gravatar","avatar_location":null,"password":"$2y$10$Ok7S7IjkoggidZs3LguGQ.\\/X1K7soczmI3OX3\\/IJO5G6nFC0Xx1zW","password_changed_at":null,"active":1,"confirmation_code":"7b9774cf4cdd71faa0173ae1df079e6c","confirmed":1,"timezone":"America\\/New_York","lat":null,"lon":null,"state":"unknown","country":"unknown","last_login_at":"2020-06-16 00:22:01","last_login_ip":"127.0.0.1","to_be_logged_out":0,"remember_token":"OwsKEjgGFQ5e7RAK3r86NPDX9vP0kzeDjcFfBuwDWy7KGTVPol6iQuxyw6TV","created_at":"2020-05-31 07:26:43","updated_at":"2020-06-16 00:22:01","deleted_at":null}', '["password"]', '[]', '[]', 'https://us.test/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', '51a9370c89e436e0153de1506566550b04b02397e8796742fa0a3673a7258fdc377376d642f0fa4a6e335bc83041c5454ad6f84e33e500f140d601655ae495e7', '2020-06-16 00:22:01', '2020-06-16 00:22:01');
/*!40000 ALTER TABLE `ledgers` ENABLE KEYS */;

-- Dumping structure for table utemsihat.meals
CREATE TABLE IF NOT EXISTS `meals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `meal_type` int(11) NOT NULL DEFAULT '0',
  `meal_type_alt` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `ttl_calorie` float(10,2) DEFAULT '0.00',
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table utemsihat.meals: ~3 rows (approximately)
/*!40000 ALTER TABLE `meals` DISABLE KEYS */;
INSERT INTO `meals` (`id`, `user_id`, `meal_type`, `meal_type_alt`, `notes`, `ttl_calorie`, `date`, `time`, `created_at`, `updated_at`) VALUES
	(1, 2, 0, 'Breakfast', NULL, 60.00, '2020-06-14', '12:00:00', '2020-06-14 13:16:48', '2020-06-14 13:41:45'),
	(2, 2, 0, 'Lunch', NULL, 10.00, '2020-06-14', '12:00:00', '2020-06-14 13:20:38', '2020-06-14 13:41:26'),
	(3, 2, 0, 'Tea', NULL, 180.00, '2020-06-16', '12:00:00', '2020-06-16 00:20:01', '2020-06-16 00:21:12'),
	(4, 1, 0, 'High Tea', NULL, 60.00, '2020-06-16', '12:00:00', '2020-06-16 02:36:01', '2020-06-16 02:36:07');
/*!40000 ALTER TABLE `meals` ENABLE KEYS */;

-- Dumping structure for table utemsihat.meal_has_food
CREATE TABLE IF NOT EXISTS `meal_has_food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meal_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `data` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table utemsihat.meal_has_food: ~5 rows (approximately)
/*!40000 ALTER TABLE `meal_has_food` DISABLE KEYS */;
INSERT INTO `meal_has_food` (`id`, `meal_id`, `food_id`, `data`, `created_at`, `updated_at`) VALUES
	(5, 2, 1, '{"name":"AYAM GORENG","calorie":10,"description":"Fried chiken 30g"}', '2020-06-14 13:41:26', '2020-06-14 13:41:26'),
	(6, 1, 2, '{"name":"FRIED MEE","calorie":60,"description":"Fried chiken 30g"}', '2020-06-14 13:41:45', '2020-06-14 13:41:45'),
	(7, 3, 2, '{"name":"FRIED MEE","calorie":60,"description":"Fried chiken 30g"}', '2020-06-16 00:20:12', '2020-06-16 00:20:12'),
	(8, 3, 2, '{"name":"FRIED MEE","calorie":60,"description":"Fried chiken 30g"}', '2020-06-16 00:21:05', '2020-06-16 00:21:05'),
	(9, 3, 2, '{"name":"FRIED MEE","calorie":60,"description":"Fried chiken 30g"}', '2020-06-16 00:21:12', '2020-06-16 00:21:12'),
	(10, 4, 2, '{"name":"FRIED MEE","calorie":60,"description":"Fried chiken 30g"}', '2020-06-16 02:36:07', '2020-06-16 02:36:07');
/*!40000 ALTER TABLE `meal_has_food` ENABLE KEYS */;

-- Dumping structure for table utemsihat.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table utemsihat.migrations: ~10 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2017_09_03_144628_create_permission_tables', 1),
	(4, '2017_09_11_174816_create_social_accounts_table', 1),
	(5, '2017_09_26_140332_create_cache_table', 1),
	(6, '2017_09_26_140528_create_sessions_table', 1),
	(7, '2017_09_26_140609_create_jobs_table', 1),
	(8, '2018_04_08_033256_create_password_histories_table', 1),
	(9, '2018_11_21_000001_create_ledgers_table', 1),
	(10, '2019_08_19_000000_create_failed_jobs_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table utemsihat.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table utemsihat.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table utemsihat.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table utemsihat.model_has_roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\Auth\\User', 1),
	(2, 'App\\Models\\Auth\\User', 2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table utemsihat.password_histories
CREATE TABLE IF NOT EXISTS `password_histories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password_histories_user_id_foreign` (`user_id`),
  CONSTRAINT `password_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table utemsihat.password_histories: ~10 rows (approximately)
/*!40000 ALTER TABLE `password_histories` DISABLE KEYS */;
INSERT INTO `password_histories` (`id`, `user_id`, `password`, `created_at`, `updated_at`) VALUES
	(1, 1, '$2y$10$ozz5tNsPO7kNXEjZ1w9jgeSfQ1emK8z.krSZSpMWD20eULIH9Eyb2', '2020-05-31 07:26:43', '2020-05-31 07:26:43'),
	(2, 2, '$2y$10$KWEPyrClkyHgR2u0fY0t5uV9j4gHMwlgK2.rLS.QrNTQUa7jz11Pi', '2020-05-31 07:26:43', '2020-05-31 07:26:43'),
	(3, 2, '$2y$10$uzMeMF5N8Kpc/fO9c7AUIOAp0R6hVwqwmssBovyre4M9jaWSZrC22', '2020-05-31 08:47:35', '2020-05-31 08:47:35'),
	(4, 2, '$2y$10$14VaB2x8fXk9getoqxqZieCGLm5af93R/qg4IyA.1xbwETixWzQ5S', '2020-05-31 08:49:32', '2020-05-31 08:49:32'),
	(5, 2, '$2y$10$RTMyhkfpjifj0HocKq6PxOsS07viEo.rU0ESl20sdwCaqY4aM50EK', '2020-05-31 10:06:12', '2020-05-31 10:06:12'),
	(6, 2, '$2y$10$6boOEfgV0ZyjbFcMRNbPTudsBIa.1boBL5XXSGWv5NHwQe3P/Ays6', '2020-05-31 10:06:28', '2020-05-31 10:06:28'),
	(7, 1, '$2y$10$R2c8AwWZWlddah.z5yr.yOthmbzXB3zuxRMIA24ZXv/fbJYbj4F9y', '2020-05-31 10:44:05', '2020-05-31 10:44:05'),
	(8, 2, '$2y$10$JkTVgcsoSphHzH4iMJdhhunISe9wMzcbYfwUp2D1rIXNceECgeMrO', '2020-06-04 12:44:43', '2020-06-04 12:44:43'),
	(9, 2, '$2y$10$YsWtR9d7WkMspk.1QHTB9.YRfQtN1cwERiSJj6ycoiQ1mwHX7gDui', '2020-06-04 13:28:31', '2020-06-04 13:28:31'),
	(10, 2, '$2y$10$cABKyGDkKQMP.6D5ttto8.HooaCM1yMAg39SPhv07D9SsLrsgofma', '2020-06-15 10:28:16', '2020-06-15 10:28:16'),
	(11, 1, '$2y$10$Ok7S7IjkoggidZs3LguGQ./X1K7soczmI3OX3/IJO5G6nFC0Xx1zW', '2020-06-16 00:22:01', '2020-06-16 00:22:01');
/*!40000 ALTER TABLE `password_histories` ENABLE KEYS */;

-- Dumping structure for table utemsihat.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table utemsihat.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table utemsihat.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table utemsihat.permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'view backend', 'web', '2020-05-31 07:26:43', '2020-05-31 07:26:43');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table utemsihat.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roles_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table utemsihat.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'administrator', 'web', '2020-05-31 07:26:43', '2020-05-31 07:26:43'),
	(2, 'user', 'web', '2020-05-31 07:26:43', '2020-05-31 07:26:43');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table utemsihat.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table utemsihat.role_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table utemsihat.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table utemsihat.sessions: ~0 rows (approximately)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Dumping structure for table utemsihat.social_accounts
CREATE TABLE IF NOT EXISTS `social_accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `provider` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci,
  `avatar` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_accounts_user_id_foreign` (`user_id`),
  CONSTRAINT `social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table utemsihat.social_accounts: ~0 rows (approximately)
/*!40000 ALTER TABLE `social_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_accounts` ENABLE KEYS */;

-- Dumping structure for table utemsihat.types
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table utemsihat.types: ~1 rows (approximately)
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'food', '2', '2020-06-04 21:11:49', '2020-06-04 21:11:51', '2020-06-04 21:11:52'),
	(2, 'fast-food', 'asdas dfsdf', '2020-06-16 10:13:24', '2020-06-16 10:13:25', '2020-06-16 10:13:26');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;

-- Dumping structure for table utemsihat.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT '1',
  `gender` char(50) COLLATE utf8mb4_unicode_ci DEFAULT 'M',
  `weight` float(10,2) DEFAULT '1.00',
  `height` float(10,2) DEFAULT '1.00',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gravatar',
  `avatar_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_changed_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `confirmation_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` decimal(10,0) DEFAULT NULL,
  `lon` decimal(10,0) DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'unknown',
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'unknown',
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_be_logged_out` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table utemsihat.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `uuid`, `first_name`, `last_name`, `age`, `gender`, `weight`, `height`, `email`, `avatar_type`, `avatar_location`, `password`, `password_changed_at`, `active`, `confirmation_code`, `confirmed`, `timezone`, `lat`, `lon`, `state`, `country`, `last_login_at`, `last_login_ip`, `to_be_logged_out`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '198157c8-960c-446f-856a-f7d61e274680', 'Super', 'Admin', NULL, 'M', NULL, NULL, 'admin@admin.com', 'gravatar', NULL, '$2y$10$Ok7S7IjkoggidZs3LguGQ./X1K7soczmI3OX3/IJO5G6nFC0Xx1zW', NULL, 1, '7b9774cf4cdd71faa0173ae1df079e6c', 1, 'America/New_York', NULL, NULL, 'unknown', 'unknown', '2020-06-16 00:22:01', '127.0.0.1', 0, 'OwsKEjgGFQ5e7RAK3r86NPDX9vP0kzeDjcFfBuwDWy7KGTVPol6iQuxyw6TV', '2020-05-31 07:26:43', '2020-06-16 00:22:01', NULL),
	(2, '2ce2e723-12e4-4149-aaa7-7dabd70f86c2', 'Default', 'User', 20, 'F', 72.50, 167.00, 'user@user.com', 'gravatar', NULL, '$2y$10$cABKyGDkKQMP.6D5ttto8.HooaCM1yMAg39SPhv07D9SsLrsgofma', NULL, 1, 'cc65364a35d8a40a378d77cdc9079a02', 1, 'America/New_York', 2, 110, 'SWK', 'unknown', '2020-06-15 10:28:15', '127.0.0.1', 0, 'XK71RQ6eC6JSKu65JBv7LNnD2vs3F7mZ45LOFqHtMo9WmNWG8e8PyanrfBKi', '2020-05-31 07:26:43', '2020-06-16 00:11:22', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
