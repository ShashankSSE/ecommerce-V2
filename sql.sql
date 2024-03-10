-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: succu_ecom
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attributes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attributes`
--

LOCK TABLES `attributes` WRITE;
/*!40000 ALTER TABLE `attributes` DISABLE KEYS */;
INSERT INTO `attributes` VALUES (1,'size','M','Admin','active','2024-03-08 19:16:58','2024-03-08 19:16:58',NULL),(2,'size','L','Admin','active','2024-03-08 19:17:04','2024-03-08 19:17:04',NULL),(3,'size','XL','Admin','active','2024-03-08 19:17:12','2024-03-08 19:17:12',NULL),(4,'size','S','Admin','active','2024-03-08 19:17:18','2024-03-08 19:17:18',NULL),(5,'size','28','Admin','active','2024-03-08 20:28:20','2024-03-08 20:28:20',NULL),(6,'size','30','Admin','active','2024-03-08 20:28:26','2024-03-08 20:28:26',NULL),(7,'color','Black','Admin','active','2024-03-08 21:21:06','2024-03-08 21:21:06',NULL),(8,'color','Blue','Admin','active','2024-03-08 21:21:14','2024-03-08 21:21:14',NULL),(9,'color','Gray','Admin','active','2024-03-08 21:21:23','2024-03-08 21:21:23',NULL),(10,'size','32','Admin','active','2024-03-09 16:20:18','2024-03-09 16:20:18',NULL),(11,'unit','2 pkg','Admin','active','2024-03-09 16:20:33','2024-03-09 16:20:33',NULL);
/*!40000 ALTER TABLE `attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Ethnic wear','ethnic-wear','Admin','active','2024-03-08 19:14:21','2024-03-09 10:48:17',NULL),(2,'Western wear','western-wear','Admin','active','2024-03-08 19:14:32','2024-03-09 10:48:00',NULL),(3,'Men\'s wear',NULL,'Admin','active','2024-03-09 10:57:51','2024-03-09 10:58:33','2024-03-09 10:58:33'),(4,'Men\'s wear','mens-wear','Admin','active','2024-03-09 10:59:10','2024-03-09 11:00:27',NULL),(5,'Wemen\'s wear','wemens-wear','Admin','active','2024-03-09 11:00:04','2024-03-09 11:00:04',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faqs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answere` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_01_30_193244_create_categories_table',1),(6,'2024_03_02_215127_create_attribute_table',1),(7,'2024_03_03_171607_create_products_table',1),(8,'2024_03_04_020215_create_pages_table',1),(9,'2024_03_04_202943_add_slug_to_products_table',1),(10,'2024_03_05_003018_create_faq_table',1),(11,'2024_03_08_002349_create_sub_category_table',1),(12,'2024_03_08_002738_update_category_column_in_products',1),(13,'2024_03_08_013227_create_settings_table',1),(14,'2024_03_08_224516_add_deleted_at_column_in_users_table',2),(15,'2024_03_09_005051_add_sub_category_column_in_products_table',3),(16,'2024_03_09_161129_add_slug_column_in_category_table',4),(17,'2024_03_09_161308_add_slug_column_in_sub_category_table',4),(18,'2024_03_10_203743_create_user_information_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` bigint unsigned DEFAULT NULL,
  `sub_category` bigint unsigned DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_Desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sizeArray` json DEFAULT NULL,
  `weightArray` json DEFAULT NULL,
  `unitArray` json DEFAULT NULL,
  `colorArray` json DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_flash_sale` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Women Printed Cotton Blend Straight Kurta',1,2,'women-printed-cotton-blend-straight-kurta','Women Printed Cotton Blend Straight Kurta','<p><div style=\" color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255)\"><span class=\"B_NuCI\" style=\"line-height: 1.4; font-size: inherit; display: inline-block; font-weight: bold; font-style: italic;\">Women Printed Cotton Blend Straight Kurta  (Multicolor)</span></div><span style=\"font-weight: bold; font-style: italic;\"><br class=\"Apple-interchange-newline\" /><br /></span></p>','1709929066_kurti.png','[{\"mrp\": \"999\", \"size\": \"M\", \"selling\": \"299\"}, {\"mrp\": \"999\", \"size\": \"L\", \"selling\": \"399\"}, {\"mrp\": \"999\", \"size\": \"XL\", \"selling\": \"499\"}, {\"mrp\": \"999\", \"size\": \"S\", \"selling\": \"199\"}]',NULL,NULL,NULL,'Women Printed Cotton Blend Straight Kurta','Women Printed Cotton Blend Straight Kurta',1,0,1,'Admin','2024-03-08 20:17:46','2024-03-08 20:22:39',NULL),(2,'Men Slim Mid Rise Grey Jeans',2,7,'men-slim-mid-rise-grey-jeans','Men Slim Mid Rise Grey Jeans','<p><span style=\"font-weight: bold; font-style: italic;\">Men Slim Mid Rise Grey Jeans<br /></span></p>','1709929765_jeans.png','[{\"mrp\": \"1699\", \"size\": \"28\", \"selling\": \"799\"}, {\"mrp\": \"1699\", \"size\": \"30\", \"selling\": \"999\"}]',NULL,NULL,'[{\"mrp\": \"1999\", \"color\": \"Black\", \"image\": \"http://127.0.0.1:8000/images/products/1709937247_jeans.png\", \"selling\": \"999\"}, {\"mrp\": \"2499\", \"color\": \"Blue\", \"image\": \"http://127.0.0.1:8000/images/products/1709962381_kurti.png\", \"selling\": \"799\"}, {\"mrp\": \"1499\", \"color\": \"Gray\", \"image\": null, \"selling\": \"699\"}]','Men Slim Mid Rise Grey Jeans','Men Slim Mid Rise Grey Jeans',1,0,1,'Admin','2024-03-08 20:29:25','2024-03-09 05:33:37',NULL),(3,'Men Jogger Fit Mid Rise Dark Blue Jeans',2,7,'men-jogger-fit-mid-rise-dark-blue-jeans','Men Jogger Fit Mid Rise Dark Blue Jeans','<p><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255)\">Men Jogger Fit Mid Rise Dark Blue Jeans</span><br /></p>','1709962708_jeans-new.png','[{\"mrp\": \"2400\", \"size\": \"28\", \"selling\": \"899\"}, {\"mrp\": \"2000\", \"size\": \"30\", \"selling\": \"1299\"}]',NULL,NULL,'[{\"mrp\": \"1200\", \"color\": \"Blue\", \"image\": \"http://127.0.0.1:8000/images/products/1709962708_jeans-new.png\", \"selling\": \"799\"}]','Men Jogger Fit Mid Rise Dark Blue Jeans','Men Jogger Fit Mid Rise Dark Blue Jeans',0,0,1,'Admin','2024-03-09 05:38:28','2024-03-09 05:38:28',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `header_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media` json DEFAULT NULL,
  `credits` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'header_logo.png','default_favicon.png','footer_logo.png','Your default short description here.','Default Meta Title','Default, Keywords, Here','Your default meta description here.','1234567890','info@example.com','123 Street, City, Country','{\"Twitter\": \"https://twitter.com/example\", \"Facebook\": \"https://facebook.com/example\", \"Snapchat\": \"https://snapchat.com/example\", \"Instagram\": \"https://instagram.com/example\"}','Your default credits here.','2024-03-08 10:31:35','2024-03-08 15:57:53'),(2,'default_logo.png','default_favicon.png','default_footer_logo.png','Your default short description here.','Default Meta Title','Default, Keywords, Here','Your default meta description here.','1234567890','info@example.com','123 Street, City, Country','{\"Twitter\": \"https://twitter.com/example\", \"Facebook\": \"https://facebook.com/example\", \"Snapchat\": \"https://snapchat.com/example\", \"Instagram\": \"https://instagram.com/example\"}','Your default credits here.','2024-03-08 10:34:05','2024-03-08 10:34:05');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sub_category_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_category`
--

LOCK TABLES `sub_category` WRITE;
/*!40000 ALTER TABLE `sub_category` DISABLE KEYS */;
INSERT INTO `sub_category` VALUES (1,'Suit sets','suit-sets',1,1,'Admin','2024-03-08 19:15:01','2024-03-09 11:32:15',NULL),(2,'Kurt’a sets','kurta-sets',1,1,'Admin','2024-03-08 19:15:10','2024-03-09 11:32:04',NULL),(3,'⁠Co-orda sets','co-ord-sets-1',1,1,'Admin','2024-03-08 19:15:22','2024-03-09 11:29:25',NULL),(4,'Sharara Suit sets','sharara-suit-sets',1,1,'Admin','2024-03-08 19:15:37','2024-03-09 11:31:52',NULL),(5,'Anarkali sets','anarkali-sets',1,1,'Admin','2024-03-08 19:15:46','2024-03-09 11:31:42',NULL),(6,'Tops','tops',2,1,'Admin','2024-03-08 19:15:56','2024-03-09 11:31:32',NULL),(7,'Jeans','jeans',2,1,'Admin','2024-03-08 19:16:09','2024-03-09 11:31:26',NULL),(8,'Dresses','dresses',2,1,'Admin','2024-03-08 19:16:22','2024-03-09 11:30:29',NULL),(9,'Co-ord sets','co-ord-sets',2,1,'Admin','2024-03-08 19:16:36','2024-03-09 12:05:14',NULL),(10,'Shirts',NULL,4,1,'Admin','2024-03-09 11:33:10','2024-03-09 11:33:10',NULL),(11,'Pants',NULL,1,1,'Admin','2024-03-09 11:33:19','2024-03-09 11:33:19',NULL);
/*!40000 ALTER TABLE `sub_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_information`
--

DROP TABLE IF EXISTS `user_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_information` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `mobile` bigint DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` bigint DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_information`
--

LOCK TABLES `user_information` WRITE;
/*!40000 ALTER TABLE `user_information` DISABLE KEYS */;
INSERT INTO `user_information` VALUES (1,13,9999999999,'Greated Noida West','Uttar Pradesh',201301,'Fusion homes flat no 902 tower K near ek murti','2024-03-10 15:42:13','2024-03-10 15:45:54'),(2,7,NULL,NULL,NULL,NULL,NULL,'2024-03-10 17:03:14','2024-03-10 17:03:14');
/*!40000 ALTER TABLE `user_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'User','user@ecom.com',0,'2024-03-08 10:31:35','$2y$12$3Z4zZqNeoKKaySf3PZvcSOgRQsXaiAiGuQIq785.EHKKqfbiTe3ou',NULL,'2024-03-08 10:31:35','2024-03-08 10:31:35',NULL),(7,'Admin','admin@ecom.com',1,NULL,'$2y$12$cHpHDmlWJ3AXNMc.ddsKuOAi4eESLo57fk0tXsmm.24bDMTiBzKuy',NULL,'2024-03-08 17:36:47','2024-03-10 16:02:49',NULL),(8,'User Normal','normal@normal.com',0,NULL,'$2y$12$NrqgXO9lsPMryloE/30bteo4I2U/FmwAKGaoKJG6IDGhseNFtZAZu',NULL,'2024-03-08 18:59:30','2024-03-08 19:10:23','2024-03-08 19:10:23'),(13,'Shashank Srivastava','shashankchitransh99@gmail.com',0,NULL,'$2y$12$30H0kyTgrCdKerD0PMis4ev2oA53vGpQ0fZmvAjZFOJEpORlh5Ctq',NULL,'2024-03-09 09:11:37','2024-03-10 17:55:44',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-10 23:41:33
