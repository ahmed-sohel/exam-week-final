# ************************************************************
# Sequel Ace SQL dump
# Version 20067
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 8.0.33)
# Database: final-week
# Generation Time: 2024-09-27 18:08:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cache
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table cache_locks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table cars
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cars`;

CREATE TABLE `cars` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int NOT NULL,
  `car_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `daily_rent_price` decimal(8,2) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `availability`, `image`, `created_at`, `updated_at`)
VALUES
	(1,'Toyota Camry update','Toyota','Camry',2022,'Sedan',1000.00,1,'images/cars/1811129837310047.png','2024-09-25 01:33:29','2024-09-27 13:07:46'),
	(2,'Honda Civic','Honda','Civic',2021,'Sedan',1100.00,1,'images/cars/1811129964943210.png','2024-09-25 01:35:31','2024-09-25 01:35:31'),
	(3,'Ford Mustang','Ford','Mustang',2022,'Coupe',1200.00,1,'images/cars/1811130100087434.webp','2024-09-25 01:37:40','2024-09-25 01:37:40'),
	(4,'Chevrolet Tahoe','Chevrolet','Tahoe',2022,'SUV',1300.00,1,'images/cars/1811130178040313.jpeg','2024-09-25 01:38:54','2024-09-25 01:38:54'),
	(5,'BMW X5','BMW','X5',2023,'SUV',5000.00,1,'images/cars/1811130322564916.webp','2024-09-25 01:40:45','2024-09-25 01:41:12'),
	(6,'Audi A4','Audi','A4',2023,'Sedan',5000.00,1,'images/cars/1811130420199236.jpg','2024-09-25 01:42:45','2024-09-25 01:42:45'),
	(7,'Mercedes-Benz C-Class','Mercedes-Benz','C-Class',2023,'Sedan',5500.00,1,'images/cars/1811130490193489.jpeg','2024-09-25 01:43:52','2024-09-25 01:43:52'),
	(8,'Tesla Model 3','Tesla','Model 3',2022,'Electric Sedan',6000.00,1,'images/cars/1811130582247451.jpeg','2024-09-25 01:45:20','2024-09-25 01:45:20'),
	(9,'Nissan Altima','Nissan','Altima',2021,'Sedan',2500.00,1,'images/cars/1811130690752456.webp','2024-09-25 01:47:03','2024-09-25 01:47:03'),
	(10,'Hyundai Tucson','Hyundai','Tucson',2022,'SUV',3000.00,1,'images/cars/1811130765152901.webp','2024-09-25 01:48:14','2024-09-25 01:48:14'),
	(11,'Subaru Outback','Subaru','Outback',2021,'SUV',3500.00,1,'images/cars/1811130827800713.jpeg','2024-09-25 01:49:14','2024-09-25 01:49:14'),
	(12,'Porsche 911','Porsche','911',2023,'Coupe',4000.00,1,'images/cars/1811130917677328.jpg','2024-09-25 01:50:39','2024-09-25 01:50:39'),
	(13,'Mazda CX-5','Mazda','CX-5',2022,'SUV',4500.00,1,'images/cars/1811130985558892.jpeg','2024-09-25 01:51:44','2024-09-25 01:51:44');

/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table job_batches
# ------------------------------------------------------------

DROP TABLE IF EXISTS `job_batches`;

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`)
VALUES
	(1,'default','{\"uuid\":\"182a4611-a24b-4c2a-b3be-2369b0182baa\",\"displayName\":\"App\\\\Mail\\\\CarBooked\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\CarBooked\\\":3:{s:4:\\\"data\\\";a:5:{s:4:\\\"name\\\";s:11:\\\"Sohel Ahmed\\\";s:14:\\\"messageContent\\\";s:63:\\\"You have booked a car for 3 days from 2024-10-07 to 2024-10-09.\\\";s:4:\\\"cost\\\";s:6:\\\"18000.\\\";s:8:\\\"carBrand\\\";s:5:\\\"Tesla\\\";s:8:\\\"carModel\\\";s:7:\\\"Model 3\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:15:\\\"sohel@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}',0,NULL,1727374986,1727374986),
	(2,'default','{\"uuid\":\"8372ebe7-acca-4e48-bdb8-e595c734c62a\",\"displayName\":\"App\\\\Mail\\\\CarBooked\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\CarBooked\\\":3:{s:4:\\\"data\\\";a:5:{s:4:\\\"name\\\";s:5:\\\"Admin\\\";s:14:\\\"messageContent\\\";s:70:\\\"Sohel Ahmed has booked a car for 3 days from 2024-10-07 to 2024-10-09.\\\";s:4:\\\"cost\\\";s:6:\\\"18000.\\\";s:8:\\\"carBrand\\\";s:5:\\\"Tesla\\\";s:8:\\\"carModel\\\";s:7:\\\"Model 3\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:15:\\\"admin@email.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}',0,NULL,1727374986,1727374986),
	(3,'default','{\"uuid\":\"1a519aa1-97f3-4c22-b9df-ea284701e7fa\",\"displayName\":\"App\\\\Mail\\\\CarBooked\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\CarBooked\\\":3:{s:4:\\\"data\\\";a:5:{s:4:\\\"name\\\";s:11:\\\"Sohel Ahmed\\\";s:14:\\\"messageContent\\\";s:63:\\\"You have booked a car for 2 days from 2024-09-28 to 2024-09-29.\\\";s:4:\\\"cost\\\";s:6:\\\"11000.\\\";s:8:\\\"carBrand\\\";s:13:\\\"Mercedes-Benz\\\";s:8:\\\"carModel\\\";s:7:\\\"C-Class\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:15:\\\"sohel@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}',0,NULL,1727375148,1727375148),
	(4,'default','{\"uuid\":\"93d3e04e-f365-48d9-9e60-10512a89169a\",\"displayName\":\"App\\\\Mail\\\\CarBooked\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:18:\\\"App\\\\Mail\\\\CarBooked\\\":3:{s:4:\\\"data\\\";a:5:{s:4:\\\"name\\\";s:5:\\\"Admin\\\";s:14:\\\"messageContent\\\";s:70:\\\"Sohel Ahmed has booked a car for 2 days from 2024-09-28 to 2024-09-29.\\\";s:4:\\\"cost\\\";s:6:\\\"11000.\\\";s:8:\\\"carBrand\\\";s:13:\\\"Mercedes-Benz\\\";s:8:\\\"carModel\\\";s:7:\\\"C-Class\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:15:\\\"admin@email.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}',0,NULL,1727375148,1727375148);

/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'0001_01_01_000000_create_users_table',1),
	(2,'0001_01_01_000001_create_cache_table',1),
	(3,'0001_01_01_000002_create_jobs_table',1),
	(4,'2024_09_17_181333_create_cars_table',1),
	(5,'2024_09_17_181449_create_rentals_table',1),
	(6,'2024_09_23_015912_add_status_column_to_rentals_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_reset_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table rentals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rentals`;

CREATE TABLE `rentals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `car_id` bigint unsigned NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_cost` decimal(8,2) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `rentals` WRITE;
/*!40000 ALTER TABLE `rentals` DISABLE KEYS */;

INSERT INTO `rentals` (`id`, `user_id`, `car_id`, `start_date`, `end_date`, `total_cost`, `status`, `created_at`, `updated_at`)
VALUES
	(1,5,2,'2024-09-25','2024-09-25',1100.00,'Completed','2024-09-26 02:03:21','2024-09-26 05:26:59'),
	(2,5,1,'2024-09-28','2024-09-28',1000.00,'Cancelled','2024-09-26 04:33:34','2024-09-26 05:28:30'),
	(3,5,1,'2024-09-29','2024-09-29',1000.00,'Ongoing','2024-09-26 04:36:05','2024-09-26 05:26:51'),
	(4,4,2,'2024-09-25','2024-09-25',1100.00,'Completed','2024-09-26 17:55:49','2024-09-26 18:05:55'),
	(5,4,2,'2024-09-25','2024-09-25',1100.00,'Completed','2024-09-26 17:56:00','2024-09-26 17:56:00'),
	(6,4,6,'2024-09-25','2024-09-26',10000.00,'Completed','2024-09-26 18:01:14','2024-09-26 18:01:14'),
	(7,4,5,'2024-09-28','2024-09-29',10000.00,'Cancelled','2024-09-26 18:02:14','2024-09-26 18:05:44'),
	(8,4,5,'2024-09-30','2024-10-02',15000.00,'Cancelled','2024-09-26 18:04:20','2024-09-26 18:05:42'),
	(9,4,8,'2024-10-01','2024-10-01',6000.00,'Cancelled','2024-09-26 18:13:47','2024-09-27 13:05:46'),
	(10,4,8,'2024-10-03','2024-10-04',12000.00,'Ongoing','2024-09-26 18:19:25','2024-09-26 18:19:25'),
	(11,4,8,'2024-10-05','2024-10-06',12000.00,'Ongoing','2024-09-26 18:21:20','2024-09-26 18:21:20'),
	(12,4,8,'2024-10-07','2024-10-09',18000.00,'Ongoing','2024-09-26 18:23:06','2024-09-26 18:23:06'),
	(13,4,7,'2024-09-28','2024-09-29',11000.00,'Ongoing','2024-09-26 18:25:48','2024-09-26 18:25:48'),
	(14,4,7,'2024-09-30','2024-10-02',16500.00,'Ongoing','2024-09-26 18:26:43','2024-09-26 18:26:43'),
	(15,4,10,'2024-10-02','2024-10-02',3000.00,'Cancelled','2024-09-26 18:46:44','2024-09-27 17:50:18'),
	(16,4,10,'2024-09-28','2024-09-29',6000.00,'Ongoing','2024-09-27 19:05:03','2024-09-27 19:05:03'),
	(18,4,3,'2024-09-27','2024-09-28',2400.00,'Ongoing','2024-09-27 19:50:40','2024-09-27 19:50:40'),
	(19,4,3,'2024-10-03','2024-10-05',3600.00,'Ongoing','2024-09-27 23:49:26','2024-09-27 23:49:26');

/*!40000 ALTER TABLE `rentals` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`)
VALUES
	('K1Yz2Cb8qrPM157a7ayoVoG3UY9ij95Jz75tTx1A',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR1lBZkswT0cxTXZYOUNwRW5JMktvRFVQVWdWYnljb3kycTdJV2FIVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1727459861);

/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Admin','admin@email.com',NULL,'$2y$12$jKAYvX1jYoyUKBPUuxsj5.V7qitRN05Q/9rpEDvGWarKPwEJRmsha','admin',NULL,NULL,NULL),
	(4,'Sohel','sohel@gmail.com',NULL,'$2y$12$4mhWoLBtITT3QW0lu5x1jegohqhCGwtKhlxfupOE6wITVeur43kAq','customer',NULL,'2024-09-25 18:39:58','2024-09-26 18:33:13'),
	(5,'Sohel Ahmed','sohelaiub2012@gmail.com',NULL,'$2y$12$ULPGrKZUSducrrLphMoiJ.mgLDCtwT.Xinpz8I0Zu1q2CBGCOrY9q','customer',NULL,'2024-09-26 01:46:55','2024-09-26 01:46:55');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
