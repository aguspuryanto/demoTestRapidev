-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.6.7-MariaDB-2ubuntu1 - Ubuntu 22.04
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table dbdemo2.promotions
DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('DISCOUNT','CASHBACK') NOT NULL,
  `amount` decimal(6,0) NOT NULL,
  `max_amount` int(10) unsigned DEFAULT NULL,
  `publish_start` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `publish_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `booking_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `booking_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `stay_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `stay_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_all_properties` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_promotions_users_1` (`author_id`) USING BTREE,
  CONSTRAINT `fk_promotions_users_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbdemo2.promotions: ~1 rows (approximately)
DELETE FROM `promotions`;
/*!40000 ALTER TABLE `promotions` DISABLE KEYS */;
INSERT INTO `promotions` (`id`, `author_id`, `name`, `type`, `amount`, `max_amount`, `publish_start`, `publish_end`, `booking_start`, `booking_end`, `stay_start`, `stay_end`, `is_all_properties`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'Promo Agustus', 'DISCOUNT', 100000, 40, '2022-08-01 11:26:56', '2022-08-05 00:00:00', '2022-08-02 00:00:00', '2022-08-05 00:00:00', '2022-08-03 00:00:00', '2022-08-10 00:00:00', 0, '2022-08-12 23:25:22', '2022-08-12 23:25:22', NULL);
/*!40000 ALTER TABLE `promotions` ENABLE KEYS */;

-- Dumping structure for table dbdemo2.properties
DROP TABLE IF EXISTS `properties`;
CREATE TABLE IF NOT EXISTS `properties` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `property_group_id` bigint(20) unsigned NOT NULL,
  `manager_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_properties_property_groups_1` (`property_group_id`) USING BTREE,
  KEY `fk_properties_users_1` (`manager_id`) USING BTREE,
  CONSTRAINT `fk_properties_property_groups_1` FOREIGN KEY (`property_group_id`) REFERENCES `property_groups` (`id`),
  CONSTRAINT `fk_properties_users_1` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbdemo2.properties: ~2 rows (approximately)
DELETE FROM `properties`;
/*!40000 ALTER TABLE `properties` DISABLE KEYS */;
INSERT INTO `properties` (`id`, `property_group_id`, `manager_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 0, 0, 'Bhuvana', '2022-08-13 09:28:51', NULL, NULL),
	(2, 0, 0, 'Timoho', '2022-08-13 09:29:19', NULL, NULL);
/*!40000 ALTER TABLE `properties` ENABLE KEYS */;

-- Dumping structure for table dbdemo2.property_groups
DROP TABLE IF EXISTS `property_groups`;
CREATE TABLE IF NOT EXISTS `property_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `manager_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_property_groups_users_1` (`manager_id`) USING BTREE,
  CONSTRAINT `fk_property_groups_users_1` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbdemo2.property_groups: ~0 rows (approximately)
DELETE FROM `property_groups`;
/*!40000 ALTER TABLE `property_groups` DISABLE KEYS */;
INSERT INTO `property_groups` (`id`, `manager_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 2, 'Example Hotel Group', NULL, NULL, NULL);
/*!40000 ALTER TABLE `property_groups` ENABLE KEYS */;

-- Dumping structure for table dbdemo2.property_promotion
DROP TABLE IF EXISTS `property_promotion`;
CREATE TABLE IF NOT EXISTS `property_promotion` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `promo_id` bigint(20) unsigned NOT NULL,
  `property_id` bigint(20) unsigned NOT NULL,
  `is_all_rooms` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `promo_id` (`promo_id`,`property_id`) USING BTREE,
  KEY `fk_property_promotion_properties_1` (`property_id`) USING BTREE,
  CONSTRAINT `fk_property_promotion_promotions_1` FOREIGN KEY (`promo_id`) REFERENCES `promotions` (`id`),
  CONSTRAINT `fk_property_promotion_properties_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbdemo2.property_promotion: ~0 rows (approximately)
DELETE FROM `property_promotion`;
/*!40000 ALTER TABLE `property_promotion` DISABLE KEYS */;
/*!40000 ALTER TABLE `property_promotion` ENABLE KEYS */;

-- Dumping structure for table dbdemo2.rooms
DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `property_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_rooms_properties_1` (`property_id`) USING BTREE,
  CONSTRAINT `fk_rooms_properties_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbdemo2.rooms: ~2 rows (approximately)
DELETE FROM `rooms`;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` (`id`, `property_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'Double Bed', NULL, NULL, NULL),
	(2, 1, 'Twin Bed', NULL, NULL, NULL);
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;

-- Dumping structure for table dbdemo2.room_allotments
DROP TABLE IF EXISTS `room_allotments`;
CREATE TABLE IF NOT EXISTS `room_allotments` (
  `room_id` bigint(20) unsigned NOT NULL,
  `date` date NOT NULL,
  `available` int(11) NOT NULL,
  `used` int(11) NOT NULL,
  `is_closed_out` tinyint(1) NOT NULL DEFAULT 0,
  `no_check_in` tinyint(1) NOT NULL DEFAULT 0,
  `no_check_out` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`room_id`,`date`) USING BTREE,
  CONSTRAINT `fk_room_allotments_rooms_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbdemo2.room_allotments: ~10 rows (approximately)
DELETE FROM `room_allotments`;
/*!40000 ALTER TABLE `room_allotments` DISABLE KEYS */;
INSERT INTO `room_allotments` (`room_id`, `date`, `available`, `used`, `is_closed_out`, `no_check_in`, `no_check_out`) VALUES
	(1, '2022-08-11', 10, 0, 0, 0, 0),
	(1, '2022-08-12', 10, 0, 0, 0, 0),
	(1, '2022-08-13', 10, 0, 0, 0, 0),
	(1, '2022-08-14', 10, 0, 0, 0, 0),
	(1, '2022-08-15', 10, 0, 0, 0, 0),
	(2, '2022-08-11', 10, 0, 0, 0, 0),
	(2, '2022-08-12', 10, 0, 0, 0, 0),
	(2, '2022-08-13', 10, 0, 0, 0, 0),
	(2, '2022-08-14', 10, 0, 0, 0, 0),
	(2, '2022-08-15', 10, 0, 0, 0, 0);
/*!40000 ALTER TABLE `room_allotments` ENABLE KEYS */;

-- Dumping structure for table dbdemo2.room_promotion
DROP TABLE IF EXISTS `room_promotion`;
CREATE TABLE IF NOT EXISTS `room_promotion` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `property_promo_id` bigint(20) unsigned NOT NULL,
  `room_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_room_promotion_property_promotion_1` (`property_promo_id`) USING BTREE,
  KEY `fk_room_promotion_rooms_1` (`room_id`) USING BTREE,
  CONSTRAINT `fk_room_promotion_property_promotion_1` FOREIGN KEY (`property_promo_id`) REFERENCES `property_promotion` (`id`),
  CONSTRAINT `fk_room_promotion_rooms_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbdemo2.room_promotion: ~0 rows (approximately)
DELETE FROM `room_promotion`;
/*!40000 ALTER TABLE `room_promotion` DISABLE KEYS */;
/*!40000 ALTER TABLE `room_promotion` ENABLE KEYS */;

-- Dumping structure for table dbdemo2.room_rates
DROP TABLE IF EXISTS `room_rates`;
CREATE TABLE IF NOT EXISTS `room_rates` (
  `room_id` bigint(20) unsigned NOT NULL,
  `date` date NOT NULL,
  `rate` int(10) unsigned NOT NULL,
  `no_promo` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`room_id`,`date`) USING BTREE,
  CONSTRAINT `fk_room_rates_rooms_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbdemo2.room_rates: ~11 rows (approximately)
DELETE FROM `room_rates`;
/*!40000 ALTER TABLE `room_rates` DISABLE KEYS */;
INSERT INTO `room_rates` (`room_id`, `date`, `rate`, `no_promo`) VALUES
	(1, '2022-08-11', 100000, 0),
	(1, '2022-08-12', 100000, 0),
	(1, '2022-08-13', 98000, 1),
	(1, '2022-08-14', 100000, 0),
	(1, '2022-08-15', 97000, 1),
	(1, '2022-08-16', 100000, 0),
	(2, '2022-08-11', 65000, 1),
	(2, '2022-08-12', 65000, 1),
	(2, '2022-08-13', 85000, 0),
	(2, '2022-08-14', 65000, 1),
	(2, '2022-08-15', 135000, 0);
/*!40000 ALTER TABLE `room_rates` ENABLE KEYS */;

-- Dumping structure for table dbdemo2.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbdemo2.users: ~2 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Super Admin', 'superadmin@example.test', '$2y$10$PoWfZKFQ5QbiMnDWMASOFOXDPjUFYWDdWwEMhtSrDf/O1pI79uZI2', 'SUPER_ADMIN', NULL, NULL, NULL),
	(2, 'Property Manager', 'propertymanager@example.test', '$2y$10$PoWfZKFQ5QbiMnDWMASOFOXDPjUFYWDdWwEMhtSrDf/O1pI79uZI2', 'PROPERTY_MANAGER', NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
