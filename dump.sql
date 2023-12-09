-- MySQL dump 10.13  Distrib 8.0.35, for Linux (x86_64)
--
-- Host: localhost    Database: severtradespb
-- ------------------------------------------------------
-- Server version	8.0.35-0ubuntu0.22.04.1

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `type` int NOT NULL DEFAULT '1' COMMENT 'Тип',
  `parent_id` bigint NOT NULL COMMENT 'Родитель',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Название',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Slug',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'Описание',
  `thumbnail` text COLLATE utf8mb4_unicode_ci COMMENT 'Изображение',
  `meta_description` text COLLATE utf8mb4_unicode_ci COMMENT 'SEO-описание',
  `meta_keywords` text COLLATE utf8mb4_unicode_ci COMMENT 'SEO-ключевые слова',
  `is_publish` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Статус',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `sorting` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `categories_user_id_foreign` (`user_id`),
  KEY `categories_category_id_foreign` (`category_id`),
  CONSTRAINT `categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `moonshine_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (7,1,1,0,'Сортовой прокат','sortovoi-prokat','Сортовой прокат',NULL,'Сортовой прокат','Сортовой прокат',1,'2023-12-06 11:14:12','2023-12-06 11:25:28',NULL,NULL,0),(8,1,1,7,'Арматура, катанка','armatura-katanka','Арматура, катанка',NULL,'Арматура, катанка','Арматура, катанка',1,'2023-12-06 11:16:53','2023-12-06 11:16:53',NULL,7,0),(9,1,1,8,'Арматура рифленая А3','armatura-riflenaia-a3','Арматура рифленая А3',NULL,'Арматура рифленая А3','Арматура рифленая А3',1,'2023-12-06 11:20:31','2023-12-06 11:20:31',NULL,8,0),(10,1,1,8,'Арматура гладкая А1','armatura-gladkaia-a1','Арматура гладкая А1',NULL,'Арматура гладкая А1','Арматура гладкая А1',1,'2023-12-06 11:21:45','2023-12-06 11:21:45',NULL,8,0),(11,1,1,8,'Арматура Ат800','armatura-at800','Арматура Ат800',NULL,'Арматура Ат800','Арматура Ат800',1,'2023-12-06 11:22:19','2023-12-06 11:22:19',NULL,8,0),(12,1,1,8,'Катанка','katanka','Катанка',NULL,'Катанка','Катанка',1,'2023-12-06 11:23:18','2023-12-06 11:23:18',NULL,8,0),(13,1,1,0,'Метизы','metizy','Метизы',NULL,'Метизы','Метизы',1,'2023-12-06 11:24:51','2023-12-06 11:24:51',NULL,NULL,0),(14,1,1,13,'Калибровка, серебрянка','kalibrovka-serebrianka','Калибровка, серебрянка',NULL,'Калибровка, серебрянка','Калибровка, серебрянка',1,'2023-12-06 11:26:22','2023-12-06 11:26:22',NULL,13,0),(15,1,1,7,'Балка, швеллер','balka-sveller','Балка, швеллер',NULL,'Балка, швеллер','Балка, швеллер',1,'2023-12-06 11:29:08','2023-12-06 11:29:08',NULL,7,0),(18,1,1,7,'Балки (Двутавр)','balki-dvutavr','Балки (Двутавр)',NULL,'Балки (Двутавр)','Балки (Двутавр)',1,'2023-12-06 11:32:56','2023-12-06 17:16:49',NULL,15,0),(19,1,1,7,'Балки (Двутавр) низколегированные','balki-dvutavr-nizkolegirovannye','Балки (Двутавр) низколегированные',NULL,'Балки (Двутавр) низколегированные','Балки (Двутавр) низколегированные',1,'2023-12-06 11:33:51','2023-12-06 11:33:51',NULL,15,0),(20,1,1,7,'Швеллер','sveller','Швеллер',NULL,'Швеллер','Швеллер',1,'2023-12-06 11:34:21','2023-12-06 11:34:21',NULL,15,0),(21,1,1,7,'Швеллер низколегированный','sveller-nizkolegirovannyi','Швеллер низколегированный',NULL,'Швеллер низколегированный','Швеллер низколегированный',1,'2023-12-06 11:34:55','2023-12-06 11:34:55',NULL,15,0),(22,1,1,7,'Швеллер гнутый','sveller-gnutyi','Швеллер гнутый',NULL,'Швеллер гнутый','Швеллер гнутый',1,'2023-12-06 11:35:47','2023-12-06 11:35:47',NULL,15,0),(23,1,1,7,'Уголок','ugolok','Уголок',NULL,'Уголок','Уголок',1,'2023-12-06 11:37:34','2023-12-06 11:37:34',NULL,7,0),(24,1,1,7,'Уголок равнополочный','ugolok-ravnopolocnyi','Уголок равнополочный',NULL,'Уголок равнополочный','Уголок равнополочный',1,'2023-12-06 11:38:35','2023-12-06 11:38:35',NULL,23,0),(25,1,1,7,'Уголок равнополочный низколегированный','ugolok-ravnopolocnyi-nizkolegirovannyi','Уголок равнополочный низколегированный',NULL,'Уголок равнополочный низколегированный','Уголок равнополочный низколегированный',1,'2023-12-06 11:39:13','2023-12-06 11:39:13',NULL,23,0),(26,1,1,7,'Уголок неравнополочный','ugolok-neravnopolocnyi','Уголок неравнополочный',NULL,'Уголок неравнополочный','Уголок неравнополочный',1,'2023-12-06 11:39:52','2023-12-06 11:39:52',NULL,23,0),(27,1,1,7,'Уголок нержавеющий никельсодержащий','ugolok-nerzaveiushhii-nikelsoderzashhii','Уголок нержавеющий никельсодержащий',NULL,'Уголок нержавеющий никельсодержащий','Уголок нержавеющий никельсодержащий',1,'2023-12-06 11:40:28','2023-12-06 11:40:28',NULL,23,0),(28,1,1,7,'Уголок равнополочный судостроительный','ugolok-ravnopolocnyi-sudostroitelnyi','Уголок равнополочный судостроительный',NULL,'Уголок равнополочный судостроительный','Уголок равнополочный судостроительный',1,'2023-12-06 11:41:05','2023-12-06 11:41:05',NULL,23,0),(29,1,1,7,'Круг','krug','Круг',NULL,'Круг','Круг',1,'2023-12-06 11:41:46','2023-12-06 11:41:46',NULL,7,0),(30,1,1,7,'Полоса, квадрат','polosa-kvadrat','Полоса, квадрат',NULL,'Полоса, квадрат','Полоса, квадрат',1,'2023-12-06 11:42:18','2023-12-06 11:42:18',NULL,7,0),(31,1,1,7,'Полоса г/к','polosa-gk','Полоса г/к',NULL,'Полоса г/к','Полоса г/к',1,'2023-12-06 11:43:01','2023-12-06 11:43:01',NULL,30,0),(32,1,1,7,'Полоса г/к оцинкованная','polosa-gk-ocinkovannaia','Полоса г/к оцинкованная',NULL,'Полоса г/к оцинкованная','Полоса г/к оцинкованная',1,'2023-12-06 11:43:34','2023-12-06 11:43:34',NULL,30,0),(33,1,1,7,'Полоса нержавеющая никельсодержащая','polosa-nerzaveiushhaia-nikelsoderzashhaia','Полоса нержавеющая никельсодержащая',NULL,'Полоса нержавеющая никельсодержащая','Полоса нержавеющая никельсодержащая',1,'2023-12-06 11:44:56','2023-12-06 11:44:56',NULL,30,0),(34,1,1,7,'Квадрат горячекатаный','kvadrat-goriacekatanyi','Квадрат горячекатаный',NULL,'Квадрат горячекатаный','Квадрат горячекатаный',1,'2023-12-06 11:45:23','2023-12-06 11:45:23',NULL,30,0),(35,1,1,7,'Оцинкованный прокат','ocinkovannyi-prokat','Оцинкованный прокат',NULL,'Оцинкованный прокат','Оцинкованный прокат',1,'2023-12-06 11:46:10','2023-12-06 11:46:10',NULL,7,0),(36,1,1,7,'Полоса оцинкованная','polosa-ocinkovannaia','Полоса оцинкованная',NULL,'Полоса оцинкованная','Полоса оцинкованная',1,'2023-12-06 11:46:45','2023-12-06 11:46:45',NULL,35,0),(37,1,1,7,'Круг оцинкованный','krug-ocinkovannyi','Круг оцинкованный',NULL,'Круг оцинкованный','Круг оцинкованный',1,'2023-12-06 11:47:14','2023-12-06 11:47:14',NULL,35,0),(38,1,1,7,'Труба оцинкованная','truba-ocinkovannaia','Труба оцинкованная',NULL,'Труба оцинкованная','Труба оцинкованная',1,'2023-12-06 11:48:49','2023-12-06 11:48:49',NULL,35,0),(39,1,1,7,'Лист оцинкованный','list-ocinkovannyi','Лист оцинкованный',NULL,'Лист оцинкованный','Лист оцинкованный',1,'2023-12-06 11:49:24','2023-12-06 11:49:24',NULL,35,0),(41,1,1,7,'Круг калиброванный','krug-kalibrovannyi','Круг калиброванный',NULL,'Круг калиброванный','Круг калиброванный',1,'2023-12-06 11:51:20','2023-12-06 11:51:20',NULL,14,0),(42,1,1,7,'Шестигранник калиброванный','sestigrannik-kalibrovannyi','Шестигранник калиброванный',NULL,'Шестигранник калиброванный','Шестигранник калиброванный',1,'2023-12-06 11:51:51','2023-12-06 11:51:51',NULL,14,0),(43,1,1,7,'Профиль фасонный квадрат','profil-fasonnyi-kvadrat','Профиль фасонный квадрат',NULL,'Профиль фасонный квадрат','Профиль фасонный квадрат',1,'2023-12-06 11:52:15','2023-12-06 11:52:15',NULL,14,0),(44,1,1,7,'Профиль фасонный полоса','profil-fasonnyi-polosa','Профиль фасонный полоса',NULL,'Профиль фасонный полоса','Профиль фасонный полоса',1,'2023-12-06 11:53:50','2023-12-06 11:53:50',NULL,14,0),(45,1,1,7,'Серебрянка','serebrianka','Серебрянка',NULL,'Серебрянка','Серебрянка',1,'2023-12-06 11:54:40','2023-12-06 11:54:40',NULL,14,0),(46,1,1,7,'Проволока, канаты','provoloka-kanaty','Проволока, канаты',NULL,'Проволока, канаты','Проволока, канаты',1,'2023-12-06 11:55:59','2023-12-06 11:55:59',NULL,13,0),(47,1,1,7,'Канаты стальные','kanaty-stalnye','Канаты стальные',NULL,'Канаты стальные','Канаты стальные',1,'2023-12-06 11:57:51','2023-12-06 11:57:51',NULL,46,0),(48,1,1,7,'Проволока Вр-1','provoloka-vr-1','Проволока Вр-1',NULL,'Проволока Вр-1','Проволока Вр-1',1,'2023-12-06 11:58:17','2023-12-06 11:58:17',NULL,46,0),(49,1,1,7,'Проволока качественная пружинная','provoloka-kacestvennaia-pruzinnaia','Проволока качественная пружинная',NULL,'Проволока качественная пружинная','Проволока качественная пружинная',1,'2023-12-06 11:58:51','2023-12-06 11:58:51',NULL,46,0),(50,1,1,7,'Проволока качественная холодной высадки','provoloka-kacestvennaia-xolodnoi-vysadki','Проволока качественная холодной высадки',NULL,'Проволока качественная холодной высадки','Проволока качественная холодной высадки',1,'2023-12-06 12:20:11','2023-12-06 12:20:11',NULL,46,0),(51,1,1,7,'Проволока нержавеющая','provoloka-nerzaveiushhaia','Проволока нержавеющая',NULL,'Проволока нержавеющая','Проволока нержавеющая',1,'2023-12-06 12:20:37','2023-12-06 12:20:37',NULL,46,0),(52,1,1,7,'Проволока сварочная обыкновенного качества','provoloka-svarocnaia-obyknovennogo-kacestva','Проволока сварочная обыкновенного качества',NULL,'Проволока сварочная обыкновенного качества','Проволока сварочная обыкновенного качества',1,'2023-12-06 12:23:23','2023-12-06 12:23:23',NULL,46,0),(53,1,1,7,'Проволока торговая обыкновенного качества','provoloka-torgovaia-obyknovennogo-kacestva','Проволока торговая обыкновенного качества',NULL,'Проволока торговая обыкновенного качества','Проволока торговая обыкновенного качества',1,'2023-12-06 12:23:52','2023-12-06 12:23:52',NULL,46,0),(54,1,1,7,'Проволока сварочная легированная','provoloka-svarocnaia-legirovannaia','Проволока сварочная легированная',NULL,'Проволока сварочная легированная','Проволока сварочная легированная',1,'2023-12-06 12:24:29','2023-12-06 17:16:33',NULL,46,0),(55,1,1,7,'Проволока из сплавов с высоким сопротивлением','provoloka-iz-splavov-s-vysokim-soprotivleniem','Проволока из сплавов с высоким сопротивлением',NULL,'Проволока из сплавов с высоким сопротивлением','Проволока из сплавов с высоким сопротивлением',1,'2023-12-06 12:25:38','2023-12-06 12:25:38',NULL,46,0),(56,1,1,7,'Проволока нихромовая','provoloka-nixromovaia','Проволока нихромовая',NULL,'Проволока нихромовая','Проволока нихромовая',1,'2023-12-06 12:26:25','2023-12-06 12:26:25',NULL,46,0),(57,1,1,7,'Сетка, лента','setka-lenta','Сетка, лента',NULL,'Сетка, лента','Сетка, лента',1,'2023-12-06 12:27:00','2023-12-06 12:27:00',NULL,13,0),(58,1,1,7,'Сетка стальная тканая','setka-stalnaia-tkanaia','Сетка стальная тканая',NULL,'Сетка стальная тканая','Сетка стальная тканая',1,'2023-12-06 12:27:56','2023-12-06 12:27:56',NULL,57,0),(59,1,1,7,'Сетка стальная плетеная','setka-stalnaia-pletenaia','Сетка стальная плетеная',NULL,'Сетка стальная плетеная','Сетка стальная плетеная',1,'2023-12-06 12:28:31','2023-12-06 12:28:31',NULL,57,0),(60,1,1,7,'Сетка стальная сварная','setka-stalnaia-svarnaia','Сетка стальная сварная',NULL,'Сетка стальная сварная','Сетка стальная сварная',1,'2023-12-06 12:29:01','2023-12-06 12:29:01',NULL,57,0),(61,1,1,7,'Лента холоднокатаная упаковочная','lenta-xolodnokatanaia-upakovocnaia','Лента холоднокатаная упаковочная',NULL,'Лента холоднокатаная упаковочная','Лента холоднокатаная упаковочная',1,'2023-12-06 12:29:51','2023-12-06 12:29:51',NULL,57,0),(62,1,1,7,'Лента из прецизионных сплавов','lenta-iz-precizionnyx-splavov','Лента из прецизионных сплавов',NULL,'Лента из прецизионных сплавов','Лента из прецизионных сплавов',1,'2023-12-06 12:30:41','2023-12-06 17:16:19',NULL,57,0),(63,1,1,7,'Лента нихромовая','lenta-nixromovaia','Лента нихромовая',NULL,'Лента нихромовая','Лента нихромовая',1,'2023-12-06 12:31:10','2023-12-06 12:31:10',NULL,57,0),(64,1,1,7,'Крепеж, гвозди, болты, цепи','krepez-gvozdi-bolty-cepi','Крепеж, гвозди, болты, цепи',NULL,'Крепеж, гвозди, болты, цепи','Крепеж, гвозди, болты, цепи',1,'2023-12-06 12:31:50','2023-12-06 12:31:50',NULL,13,0),(65,1,1,7,'Анкерная техника','ankernaia-texnika','Анкерная техника',NULL,'Анкерная техника','Анкерная техника',1,'2023-12-06 12:32:29','2023-12-06 12:32:29',NULL,64,0),(66,1,1,7,'Болты','bolty','Болты',NULL,'Болты','Болты',1,'2023-12-06 12:32:59','2023-12-06 12:32:59',NULL,64,0),(67,1,1,7,'Винты','vinty','Винты',NULL,'Винты','Винты',1,'2023-12-06 12:33:26','2023-12-06 12:33:26',NULL,64,0),(68,1,1,7,'Гайки','gaiki','Гайки',NULL,'Гайки','Гайки',1,'2023-12-06 12:33:51','2023-12-06 12:33:51',NULL,64,0),(69,1,1,7,'Гвозди','gvozdi','Гвозди',NULL,'Гвозди','Гвозди',1,'2023-12-06 12:34:22','2023-12-06 12:34:22',NULL,64,0),(70,1,1,7,'Дюбельная техника','diubelnaia-texnika','Дюбельная техника',NULL,'Дюбельная техника','Дюбельная техника',1,'2023-12-06 12:34:55','2023-12-06 12:34:55',NULL,64,0),(71,1,1,7,'Крепёж из нержавеющей стали','krepez-iz-nerzaveiushhei-stali','Крепёж из нержавеющей стали',NULL,'Крепёж из нержавеющей стали','Крепёж из нержавеющей стали',1,'2023-12-06 12:35:44','2023-12-06 12:35:44',NULL,64,0),(72,1,1,7,'Общий крепеж','obshhii-krepez','Общий крепеж',NULL,'Общий крепеж','Общий крепеж',1,'2023-12-06 12:36:08','2023-12-06 12:36:08',NULL,64,0),(73,1,1,7,'Перфорированный крепёж','perforirovannyi-krepez','Перфорированный крепёж',NULL,'Перфорированный крепёж','Перфорированный крепёж',1,'2023-12-06 12:36:34','2023-12-06 12:36:34',NULL,64,0),(74,1,1,7,'Саморезы, шурупы','samorezy-surupy','Саморезы, шурупы',NULL,'Саморезы, шурупы','Саморезы, шурупы',1,'2023-12-06 12:37:26','2023-12-06 12:37:26',NULL,64,0),(75,1,1,7,'Такелаж (элементы)','takelaz-elementy','Такелаж (элементы)',NULL,'Такелаж (элементы)','Такелаж (элементы)',1,'2023-12-06 12:38:04','2023-12-06 12:38:04',NULL,64,0),(76,1,1,7,'Фиксаторы арматуры','fiksatory-armatury','Фиксаторы арматуры',NULL,'Фиксаторы арматуры','Фиксаторы арматуры',1,'2023-12-06 12:39:05','2023-12-06 12:39:05',NULL,64,0),(77,1,1,7,'Трос, цепи','tros-cepi','Трос, цепи',NULL,'Трос, цепи','Трос, цепи',1,'2023-12-06 12:39:43','2023-12-06 12:39:43',NULL,64,0),(78,1,1,7,'Шайбы','saiby','Шайбы',NULL,'Шайбы','Шайбы',1,'2023-12-06 12:40:10','2023-12-06 12:40:10',NULL,64,0),(79,1,1,7,'Шпилька резьбовая DIN 975','spilka-rezbovaia-din-975','Шпилька резьбовая DIN 975',NULL,'Шпилька резьбовая DIN 975','Шпилька резьбовая DIN 975',1,'2023-12-06 12:40:44','2023-12-06 12:40:44',NULL,64,0),(81,1,1,0,'Качественные стали','kacestvennye-stali','Качественные стали',NULL,'Качественные стали','Качественные стали',1,'2023-12-06 12:42:52','2023-12-06 12:42:52',NULL,NULL,0),(82,1,1,7,'Конструкционная сталь','konstrukcionnaia-stal','Конструкционная сталь',NULL,'Конструкционная сталь','Конструкционная сталь',1,'2023-12-06 12:44:32','2023-12-06 12:44:32',NULL,81,0),(83,1,1,7,'Круг горячекатаный конструкционный','krug-goriacekatanyi-konstrukcionnyi','Круг горячекатаный конструкционный',NULL,'Круг горячекатаный конструкционный','Круг горячекатаный конструкционный',1,'2023-12-06 12:44:57','2023-12-06 12:44:57',NULL,82,0),(84,1,1,7,'Круг горячекатаный никелевый','krug-goriacekatanyi-nikelevyi','Круг горячекатаный никелевый',NULL,'Круг горячекатаный никелевый','Круг горячекатаный никелевый',1,'2023-12-06 12:45:23','2023-12-06 12:45:23',NULL,82,0),(85,1,1,7,'Поковка','pokovka','Поковка',NULL,'Поковка','Поковка',1,'2023-12-06 12:46:02','2023-12-06 12:46:02',NULL,82,0),(86,1,1,7,'Шестигранник горячекатаный конструкционный','sestigrannik-goriacekatanyi-konstrukcionnyi','Шестигранник горячекатаный конструкционный',NULL,'Шестигранник горячекатаный конструкционный','Шестигранник горячекатаный конструкционный',1,'2023-12-06 12:46:50','2023-12-06 12:46:50',NULL,82,0),(87,1,1,7,'Инструментальная сталь','instrumentalnaia-stal','Инструментальная сталь',NULL,'Инструментальная сталь','Инструментальная сталь',1,'2023-12-06 12:47:20','2023-12-06 12:47:20',NULL,81,0),(88,1,1,7,'Круг инструментальный углеродистый и легированный','krug-instrumentalnyi-uglerodistyi-i-legirovannyi','Круг инструментальный углеродистый и легированный',NULL,'Круг инструментальный углеродистый и легированный','Круг инструментальный углеродистый и легированный',1,'2023-12-06 12:47:45','2023-12-06 12:47:45',NULL,87,0),(89,1,1,7,'Круг инструментальный быстрорежущий','krug-instrumentalnyi-bystrorezushhii','Круг инструментальный быстрорежущий',NULL,'Круг инструментальный быстрорежущий','Круг инструментальный быстрорежущий',1,'2023-12-06 12:48:22','2023-12-06 12:48:22',NULL,87,0),(90,1,1,0,'Судовая сталь','sudovaia-stal','Судовая сталь',NULL,'Судовая сталь','Судовая сталь',1,'2023-12-06 12:48:53','2023-12-06 12:48:53',NULL,NULL,0),(91,1,1,7,'Лист г/к нормальной прочности','list-gk-normalnoi-procnosti','Лист г/к нормальной прочности',NULL,'Лист г/к нормальной прочности','Лист г/к нормальной прочности',1,'2023-12-06 12:49:40','2023-12-07 08:01:19',NULL,90,0),(92,1,1,7,'Лист г/к повышенной прочности','list-gk-povysennoi-procnosti','Лист г/к повышенной прочности',NULL,'Лист г/к повышенной прочности','Лист г/к повышенной прочности',1,'2023-12-06 12:50:05','2023-12-07 08:02:00',NULL,90,0),(93,1,1,0,'Мостовая сталь','mostovaia-stal','Мостовая сталь',NULL,'Мостовая сталь','Мостовая сталь',1,'2023-12-06 12:50:40','2023-12-06 12:50:40',NULL,NULL,0),(94,1,1,0,'Листовой прокат','listovoi-prokat','Листовой прокат',NULL,'Листовой прокат','Листовой прокат',1,'2023-12-06 12:52:00','2023-12-06 12:52:00',NULL,NULL,0),(95,1,1,7,'Лист г/к','list-gk','Лист г/к',NULL,'Лист г/к','Лист г/к',1,'2023-12-06 12:52:28','2023-12-07 08:03:06',NULL,94,0),(96,1,1,7,'Лист г/к','list-gk-1','Лист г/к',NULL,'Лист г/к','Лист г/к',1,'2023-12-06 12:53:05','2023-12-06 12:53:05',NULL,95,0),(97,1,1,7,'Лист г/к Ст3','list-gk-st3','Лист г/к Ст3',NULL,'Лист г/к Ст3','Лист г/к Ст3',1,'2023-12-06 12:54:08','2023-12-06 12:54:08',NULL,95,0),(98,1,1,7,'Лист г/к низколегированный','list-gk-nizkolegirovannyi','Лист г/к низколегированный',NULL,'Лист г/к низколегированный','Лист г/к низколегированный',1,'2023-12-06 12:54:38','2023-12-06 12:54:38',NULL,95,0),(99,1,1,7,'Лист г/к конструкционный','list-gk-konstrukcionnyi','Лист г/к конструкционный',NULL,'Лист г/к конструкционный','Лист г/к конструкционный',1,'2023-12-06 12:55:29','2023-12-06 12:55:29',NULL,95,0),(100,1,1,7,'Лист г/к судостроительный','list-gk-sudostroitelnyi','Лист г/к судостроительный',NULL,'Лист г/к судостроительный','Лист г/к судостроительный',1,'2023-12-06 12:55:52','2023-12-06 12:55:52',NULL,95,0),(101,1,1,7,'Лист г/к мостостроительный','list-gk-mostostroitelnyi','Лист г/к мостостроительный',NULL,'Лист г/к мостостроительный','Лист г/к мостостроительный',1,'2023-12-06 12:56:38','2023-12-06 12:56:38',NULL,95,0),(102,1,1,7,'Лист г/к износостойкий','list-gk-iznosostoikii','Лист г/к износостойкий',NULL,'Лист г/к износостойкий','Лист г/к износостойкий',1,'2023-12-06 12:57:56','2023-12-06 12:57:56',NULL,95,0),(103,1,1,7,'Лист х/к','list-xk','Лист х/к',NULL,'Лист х/к','Лист х/к',1,'2023-12-06 12:58:40','2023-12-07 08:04:34',NULL,94,0),(104,1,1,7,'Лист холоднокатанный х/к','list-xolodnokatannyi-xk','Лист холоднокатанный х/к',NULL,'Лист холоднокатанный х/к','Лист холоднокатанный х/к',1,'2023-12-06 12:59:14','2023-12-06 12:59:14',NULL,103,0),(105,1,1,7,'Лист холоднокатанный х/к Ст','list-xolodnokatannyi-xk-st','Лист холоднокатанный х/к Ст',NULL,'Лист холоднокатанный х/к Ст','Лист холоднокатанный х/к Ст',1,'2023-12-06 13:00:04','2023-12-06 13:00:04',NULL,103,0),(106,1,1,7,'Лист оцинкованный','list-ocinkovannyi-1','Лист оцинкованный',NULL,'Лист оцинкованный','Лист оцинкованный',1,'2023-12-06 13:00:31','2023-12-07 08:05:17',NULL,94,0),(107,1,1,7,'Лист рифленый','list-riflenyi','Лист рифленый',NULL,'Лист рифленый','Лист рифленый',1,'2023-12-06 13:01:08','2023-12-07 08:06:10',NULL,94,0),(108,1,1,7,'Лист нержавеющий','list-nerzaveiushhii','Лист нержавеющий',NULL,'Лист нержавеющий','Лист нержавеющий',1,'2023-12-06 13:01:47','2023-12-07 07:55:28',NULL,140,0),(109,1,1,7,'Лист нержавеющий без никеля','list-nerzaveiushhii-bez-nikelia','Лист нержавеющий без никеля',NULL,'Лист нержавеющий без никеля','Лист нержавеющий без никеля',1,'2023-12-06 13:03:10','2023-12-06 13:03:10',NULL,100,0),(110,1,1,7,'Лист нержавеющий никельсодержащий','list-nerzaveiushhii-nikelsoderzashhii','Лист нержавеющий никельсодержащий',NULL,'Лист нержавеющий никельсодержащий','Лист нержавеющий никельсодержащий',1,'2023-12-06 13:03:34','2023-12-06 13:03:34',NULL,100,0),(111,1,1,7,'Лист нержавеющий ПВЛ','list-nerzaveiushhii-pvl','Лист нержавеющий ПВЛ',NULL,'Лист нержавеющий ПВЛ','Лист нержавеющий ПВЛ',1,'2023-12-06 13:04:08','2023-12-06 13:04:08',NULL,131,0),(112,1,1,7,'Дуплексная сталь','dupleksnaia-stal','Дуплексная сталь',NULL,'Дуплексная сталь','Дуплексная сталь',1,'2023-12-06 13:04:37','2023-12-06 13:04:37',NULL,NULL,0),(113,1,1,7,'Профнастил (профлист)','profnastil-proflist','Профнастил (профлист)',NULL,'Профнастил (профлист)','Профнастил (профлист)',1,'2023-12-06 13:05:25','2023-12-07 08:07:18',NULL,94,0),(114,1,1,7,'Профнастил оцинкованный','profnastil-ocinkovannyi','Профнастил оцинкованный',NULL,'Профнастил оцинкованный','Профнастил оцинкованный',1,'2023-12-06 13:07:34','2023-12-07 08:08:17',NULL,113,0),(115,1,1,7,'Профнастил окрашенный','profnastil-okrasennyi','Профнастил окрашенный',NULL,'Профнастил окрашенный','Профнастил окрашенный',1,'2023-12-06 13:08:00','2023-12-06 13:08:00',NULL,113,0),(116,1,1,7,'Профнастил С8','profnastil-s8','Профнастил С8',NULL,'Профнастил С8','Профнастил С8',1,'2023-12-06 13:08:27','2023-12-06 13:08:27',NULL,113,0),(117,1,1,7,'Профнастил С10','profnastil-s10','Профнастил С10',NULL,'Профнастил С10','Профнастил С10',1,'2023-12-06 13:08:50','2023-12-06 13:08:53',NULL,113,0),(118,1,1,7,'Профнастил С20','profnastil-s20','Профнастил С20',NULL,'Профнастил С20','Профнастил С20',1,'2023-12-06 13:09:27','2023-12-06 13:09:27',NULL,113,0),(120,1,1,7,'Профнастил С21','profnastil-s21','Профнастил С21',NULL,'Профнастил С21','Профнастил С21',1,'2023-12-06 13:10:50','2023-12-06 13:10:50',NULL,113,0),(121,1,1,7,'Профнастил Н57','profnastil-n57','Профнастил Н57',NULL,'Профнастил Н57','Профнастил Н57',1,'2023-12-06 13:11:18','2023-12-06 13:11:18',NULL,113,0),(122,1,1,7,'Профнастил Н60','profnastil-n60','Профнастил Н60',NULL,'Профнастил Н60','Профнастил Н60',1,'2023-12-06 13:11:52','2023-12-06 13:11:52',NULL,113,0),(123,1,1,7,'Профнастил Н75','profnastil-n75','Профнастил Н75',NULL,'Профнастил Н75','Профнастил Н75',1,'2023-12-06 13:13:14','2023-12-06 13:13:14',NULL,113,0),(124,1,1,7,'Профнастил Н114','profnastil-n114','Профнастил Н114',NULL,'Профнастил Н114','Профнастил Н114',1,'2023-12-06 13:13:39','2023-12-06 13:13:39',NULL,113,0),(125,1,1,7,'Профнастил НС35','profnastil-ns35','Профнастил НС35',NULL,'Профнастил НС35','Профнастил НС35',1,'2023-12-06 13:13:59','2023-12-06 13:13:59',NULL,113,0),(126,1,1,7,'Профнастил НС44','profnastil-ns44','Профнастил НС44',NULL,'Профнастил НС44','Профнастил НС44',1,'2023-12-06 13:14:26','2023-12-06 13:14:26',NULL,113,0),(127,1,1,7,'Профнастил НС44','profnastil-ns44-1','Профнастил НС44',NULL,'Профнастил НС44','Профнастил НС44',1,'2023-12-06 13:14:58','2023-12-06 13:14:58',NULL,113,0),(128,1,1,7,'Доборные элементы','dobornye-elementy','Доборные элементы',NULL,'Доборные элементы','Доборные элементы',1,'2023-12-06 13:15:20','2023-12-06 13:15:20',NULL,113,0),(129,1,1,7,'Водосточная система','vodostocnaia-sistema','Водосточная система',NULL,'Водосточная система','Водосточная система',1,'2023-12-06 13:16:32','2023-12-06 13:16:32',NULL,113,0),(130,1,1,7,'Саморезы кровельные','samorezy-krovelnye','Саморезы кровельные',NULL,'Саморезы кровельные','Саморезы кровельные',1,'2023-12-06 13:17:26','2023-12-06 13:17:26',NULL,113,0),(131,1,1,7,'Просечно-вытяжной лист (ПВЛ)','prosecno-vytiaznoi-list-pvl','Просечно-вытяжной лист (ПВЛ)',NULL,'Просечно-вытяжной лист (ПВЛ)','Просечно-вытяжной лист (ПВЛ)',1,'2023-12-06 13:17:54','2023-12-06 13:17:54',NULL,94,0),(132,1,1,7,'Рулонная сталь','rulonnaia-stal','Рулонная сталь',NULL,'Рулонная сталь','Рулонная сталь',1,'2023-12-06 13:18:47','2023-12-06 13:18:47',NULL,94,0),(133,1,1,7,'Рулоны нержавеющие','rulony-nerzaveiushhie','Рулоны нержавеющие',NULL,'Рулоны нержавеющие','Рулоны нержавеющие',1,'2023-12-06 13:19:12','2023-12-06 13:19:12',NULL,132,0),(134,1,1,7,'Рулоны оцинкованные','rulony-ocinkovannye','Рулоны оцинкованные',NULL,'Рулоны оцинкованные','Рулоны оцинкованные',1,'2023-12-06 13:19:40','2023-12-06 13:19:40',NULL,132,0),(135,1,1,7,'Рулоны оцинкованные с полимерным покрытием','rulony-ocinkovannye-s-polimernym-pokrytiem','Рулоны оцинкованные с полимерным покрытием',NULL,'Рулоны оцинкованные с полимерным покрытием','Рулоны оцинкованные с полимерным покрытием',1,'2023-12-06 13:20:14','2023-12-06 13:20:14',NULL,132,0),(136,1,1,7,'Рулоны г/к','rulony-gk','Рулоны г/к',NULL,'Рулоны г/к','Рулоны г/к',1,'2023-12-06 13:20:39','2023-12-06 13:20:39',NULL,132,0),(138,1,1,0,'Износостойкая сталь','iznosostoikaia-stal','Износостойкая сталь',NULL,'Износостойкая сталь','Износостойкая сталь',1,'2023-12-06 13:21:49','2023-12-06 13:21:49',NULL,NULL,0),(140,1,1,0,'Нержавеющая сталь','nerzaveiushhaia-stal','Нержавеющая сталь',NULL,'Нержавеющая сталь','Нержавеющая сталь',1,'2023-12-06 13:22:33','2023-12-06 13:22:33',NULL,NULL,0),(141,1,1,131,'Лист ПВЛ','list-pvl','Лист ПВЛ',NULL,'Лист ПВЛ','Лист ПВЛ',1,'2023-12-07 08:35:00','2023-12-07 08:35:00',NULL,131,0),(142,1,1,100,'Дуплексная сталь','dupleksnaia-stal-1','Дуплексная сталь',NULL,'Дуплексная сталь','Дуплексная сталь',1,'2023-12-07 08:49:56','2023-12-07 08:49:56',NULL,108,0),(143,1,1,13,'Дуплексная сталь','dupleksnaia-stal-2','Дуплексная сталь',NULL,'Дуплексная сталь','Дуплексная сталь',1,'2023-12-07 09:25:21','2023-12-07 09:25:21',NULL,13,0),(144,1,1,140,'Круг, квадрат, шестигранник','dupleksnaia-stal-3','Круг, квадрат, шестигранник',NULL,'Круг, квадрат, шестигранник','Круг, квадрат, шестигранник',1,'2023-12-07 09:36:06','2023-12-07 09:37:52',NULL,140,0),(145,1,1,144,'Круг нержавеющий безникелевый жаропрочный','krug-nerzaveiushhii-beznikelevyi-zaroprocnyi','Круг нержавеющий безникелевый жаропрочный',NULL,'Круг нержавеющий безникелевый жаропрочный','Круг нержавеющий безникелевый жаропрочный',1,'2023-12-07 09:38:55','2023-12-07 09:38:55',NULL,144,0),(146,1,1,144,'Круг нержавеющий никельсодержащий','krug-nerzaveiushhii-nikelsoderzashhii','Круг нержавеющий никельсодержащий',NULL,'Круг нержавеющий никельсодержащий','Круг нержавеющий никельсодержащий',1,'2023-12-07 09:39:49','2023-12-07 09:39:49',NULL,144,0),(147,1,1,144,'Квадрат нержавеющий никельсодержащий','kvadrat-nerzaveiushhii-nikelsoderzashhii','Квадрат нержавеющий никельсодержащий',NULL,'Квадрат нержавеющий никельсодержащий','Квадрат нержавеющий никельсодержащий',1,'2023-12-07 09:41:23','2023-12-07 09:41:23',NULL,144,0),(148,1,1,144,'Шестигранник нержавеющий безникелевый жаропрочный','sestigrannik-nerzaveiushhii-beznikelevyi-zaroprocnyi','Шестигранник нержавеющий безникелевый жаропрочный',NULL,'Шестигранник нержавеющий безникелевый жаропрочный','Шестигранник нержавеющий безникелевый жаропрочный',1,'2023-12-07 09:42:07','2023-12-07 09:42:07',NULL,144,0),(149,1,1,144,'Шестигранник нержавеющий никельсодержащий','sestigrannik-nerzaveiushhii-nikelsoderzashhii','Шестигранник нержавеющий никельсодержащий',NULL,'Шестигранник нержавеющий никельсодержащий','Шестигранник нержавеющий никельсодержащий',1,'2023-12-07 09:42:39','2023-12-07 09:42:39',NULL,144,0),(150,1,1,140,'Полоса, уголок, швеллер','polosa-ugolok-sveller','Полоса, уголок, швеллер',NULL,'Полоса, уголок, швеллер','Полоса, уголок, швеллер',1,'2023-12-07 09:44:53','2023-12-07 09:44:53',NULL,140,0),(151,1,1,150,'Полоса нержавеющая никельсодержащая','polosa-nerzaveiushhaia-nikelsoderzashhaia-1','Полоса нержавеющая никельсодержащая',NULL,'Полоса нержавеющая никельсодержащая','Полоса нержавеющая никельсодержащая',1,'2023-12-07 09:45:34','2023-12-07 09:45:34',NULL,150,0),(152,1,1,150,'Швеллер нержавеющий никельсодержащий','sveller-nerzaveiushhii-nikelsoderzashhii','Швеллер нержавеющий никельсодержащий',NULL,'Швеллер нержавеющий никельсодержащий','Швеллер нержавеющий никельсодержащий',1,'2023-12-07 09:46:06','2023-12-07 12:44:00',NULL,150,0);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_product`
--

DROP TABLE IF EXISTS `category_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_product` (
  `category_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  KEY `category_product_category_id_foreign` (`category_id`),
  KEY `category_product_product_id_foreign` (`product_id`),
  CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_product`
--

LOCK TABLES `category_product` WRITE;
/*!40000 ALTER TABLE `category_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_product` ENABLE KEYS */;
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
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2014_10_12_100000_create_password_reset_tokens_table',2),(6,'2020_10_04_115514_create_moonshine_roles_table',2),(7,'2020_10_05_173148_create_moonshine_tables',2),(8,'2022_12_19_115549_create_moonshine_socialites_table',2),(9,'9999_12_20_173629_create_notifications_table',2),(10,'2023_12_05_191152_create_products_table',3),(12,'2023_12_05_202123_create_categories_table',4),(13,'2023_12_05_213513_create_tags_table',5),(16,'2023_12_05_215335_create_category_product_table',6),(17,'2023_12_05_215714_create_product_tag_table',6),(18,'2023_12_07_103116_add_columns_to_category_table',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moonshine_socialites`
--

DROP TABLE IF EXISTS `moonshine_socialites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `moonshine_socialites` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `moonshine_user_id` bigint unsigned NOT NULL,
  `driver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `moonshine_socialites_driver_identity_unique` (`driver`,`identity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moonshine_socialites`
--

LOCK TABLES `moonshine_socialites` WRITE;
/*!40000 ALTER TABLE `moonshine_socialites` DISABLE KEYS */;
/*!40000 ALTER TABLE `moonshine_socialites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moonshine_user_roles`
--

DROP TABLE IF EXISTS `moonshine_user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `moonshine_user_roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moonshine_user_roles`
--

LOCK TABLES `moonshine_user_roles` WRITE;
/*!40000 ALTER TABLE `moonshine_user_roles` DISABLE KEYS */;
INSERT INTO `moonshine_user_roles` VALUES (1,'Admin','2023-12-05 15:38:31','2023-12-05 15:38:31');
/*!40000 ALTER TABLE `moonshine_user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moonshine_users`
--

DROP TABLE IF EXISTS `moonshine_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `moonshine_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `moonshine_user_role_id` bigint unsigned NOT NULL DEFAULT '1',
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `moonshine_users_email_unique` (`email`),
  KEY `moonshine_users_moonshine_user_role_id_foreign` (`moonshine_user_role_id`),
  CONSTRAINT `moonshine_users_moonshine_user_role_id_foreign` FOREIGN KEY (`moonshine_user_role_id`) REFERENCES `moonshine_user_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moonshine_users`
--

LOCK TABLES `moonshine_users` WRITE;
/*!40000 ALTER TABLE `moonshine_users` DISABLE KEYS */;
INSERT INTO `moonshine_users` VALUES (1,1,'arttema@mail.ru','$2y$12$fzXVg48tLKQvBHlU058.i.8krU8OOd6KRaALftc1OfN6c3W/OUmGK','arttema',NULL,NULL,'2023-12-05 15:39:02','2023-12-05 15:39:02');
/*!40000 ALTER TABLE `moonshine_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES ('ccdf672f-d152-4d9b-83d8-be076cc9fc4a','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"\\u042d\\u043a\\u0441\\u043f\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\",\"button\":{\"link\":\"http:\\/\\/localhost:8000\\/storage\\/category-resource.csv\",\"label\":\"\\u0421\\u043a\\u0430\\u0447\\u0430\\u0442\\u044c\"}}','2023-12-06 16:20:05','2023-12-06 13:59:29','2023-12-06 16:20:05'),('d33ae585-a351-4e50-a778-a5278b9f15cf','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"\\u042d\\u043a\\u0441\\u043f\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\",\"button\":{\"link\":\"http:\\/\\/localhost:8000\\/storage\\/category-resource.csv\",\"label\":\"\\u0421\\u043a\\u0430\\u0447\\u0430\\u0442\\u044c\"}}',NULL,'2023-12-07 13:17:02','2023-12-07 13:17:02'),('d81a9ca6-af96-4f4f-a08d-a2e3615ac487','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"\\u042d\\u043a\\u0441\\u043f\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\",\"button\":{\"link\":\"http:\\/\\/localhost:8000\\/storage\\/category-resource.csv\",\"label\":\"\\u0421\\u043a\\u0430\\u0447\\u0430\\u0442\\u044c\"}}','2023-12-06 16:20:05','2023-12-06 14:50:12','2023-12-06 16:20:05'),('f70ad18f-f249-42e5-9dc9-97544d9b9cd1','MoonShine\\Notifications\\MoonShineDatabaseNotification','MoonShine\\Models\\MoonshineUser',1,'{\"message\":\"\\u042d\\u043a\\u0441\\u043f\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\",\"button\":{\"link\":\"http:\\/\\/localhost:8000\\/storage\\/category-resource.csv\",\"label\":\"\\u0421\\u043a\\u0430\\u0447\\u0430\\u0442\\u044c\"}}','2023-12-06 16:20:05','2023-12-06 14:52:53','2023-12-06 16:20:05');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
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
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
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
-- Table structure for table `product_tag`
--

DROP TABLE IF EXISTS `product_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_tag` (
  `product_id` bigint unsigned NOT NULL,
  `tag_id` bigint unsigned NOT NULL,
  KEY `product_tag_product_id_foreign` (`product_id`),
  KEY `product_tag_tag_id_foreign` (`tag_id`),
  CONSTRAINT `product_tag_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_tag`
--

LOCK TABLES `product_tag` WRITE;
/*!40000 ALTER TABLE `product_tag` DISABLE KEYS */;
INSERT INTO `product_tag` VALUES (5,1),(5,2),(5,3),(4,3),(1,2);
/*!40000 ALTER TABLE `product_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Заголовок',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Slug',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'Описание',
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Размер',
  `mark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Марка',
  `length` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Длина',
  `thumbnail` text COLLATE utf8mb4_unicode_ci COMMENT 'Изображение',
  `characteristics` json DEFAULT NULL COMMENT 'Характеристики',
  `meta_description` text COLLATE utf8mb4_unicode_ci COMMENT 'SEO-описание',
  `meta_keywords` text COLLATE utf8mb4_unicode_ci COMMENT 'SEO-ключевые слова',
  `is_publish` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Статус',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_user_id_foreign` (`user_id`),
  CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `moonshine_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'Сталь сортовая нержавеющая жаропрочная круг х/т 3','stal-sortovaia-nerzaveiushhaia-zaroprocnaia-krug-xt-3','<p>Cum ipsa sit qui voluptas aperiam. Sit non perspiciatis totam ipsam. A voluptatem qui quidem. Et soluta sunt est architecto suscipit quia omnis.</p>','3','AISI 420 20Х13','3000','products/nYEBXleHCOQFbDfDvV2CDIt30qcBfAsSL1hp9vLq.png',NULL,'Et veniam ut iste earum nostrum temporibus perferendis. Quos iste commodi sed non ea. Est voluptas quis et. Aut mollitia dignissimos libero aliquam doloremque excepturi et.','rerum magni',1,'2023-12-04 21:00:00','2023-12-06 05:12:53',NULL),(2,1,'Provident maxime','provident-maxime','<p>Eius ut totam at ex et. Quia optio voluptas sunt reprehenderit illum sunt doloremque assumenda. Explicabo qui sunt magnam consectetur aliquam est est ipsa.</p>','culpa','iusto','eos','products/seGtQmq2BW0EOlChF6B5jo0plJV4wqRdGcUPrS81.png',NULL,'Quisquam ab aliquam provident rerum sequi illo maxime est. Ullam sed ab alias magnam. Totam commodi sapiente aperiam et.','commodi ea',1,'2023-12-04 21:00:00','2023-12-06 04:31:36',NULL),(3,1,'Et neque','et-neque','<p>Et excepturi voluptatum sint. Eius eveniet iste impedit. Cupiditate eum non voluptate.</p>','perspiciatis','voluptas','et','products/3xy5JFI5VNDyY3gSSq0EH5KRU4eu1EgE4MEDGIgP.png',NULL,'Quod placeat dolore tenetur officia sapiente tempore et vel. Odit dolorum quidem neque illum molestias.','voluptas saepe',0,'2023-12-04 21:00:00','2023-12-06 04:31:25',NULL),(4,1,'Quos enim','quos-enim','<p>Suscipit sint rem iste non. Dolores omnis eos iure fugit. Sunt occaecati tempora ut cupiditate est eius doloremque.</p>','quam','nobis','velit','products/bWTdBowazFycOO3BDfa6pH4UCbQ3TEohoOZ0ygvt.png',NULL,'Eaque eum a fugit molestias atque sit ut. Sed exercitationem accusantium accusantium nihil et suscipit consequatur. Voluptatem debitis fugiat consectetur minus veritatis.','debitis non',1,'2023-12-04 21:00:00','2023-12-05 21:00:00',NULL),(5,1,'Cum consequatur','cum-consequatur','<p>Earum velit dolor molestias est. Voluptatem minus deleniti vel occaecati. Reiciendis corrupti ducimus dolore ratione. Qui reprehenderit quasi ad consequatur aliquid dolorem ex natus.</p>','adipisci','beatae','et','products/aRcV6yXLJFMSBqdqWo90NH79a9QsAHddzqxoknKL.png',NULL,'Facere deleniti ipsam optio magni consequatur distinctio a blanditiis. Fugit voluptatem tempore illum sit. Quisquam hic soluta deserunt. Eos accusamus laborum ut et eius ea.','et a',0,'2023-12-04 21:00:00','2023-12-05 21:00:00',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `type` int NOT NULL DEFAULT '1' COMMENT 'Тип',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Название',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Slug',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'Описание',
  `thumbnail` text COLLATE utf8mb4_unicode_ci COMMENT 'Изображение',
  `meta_description` text COLLATE utf8mb4_unicode_ci COMMENT 'SEO-описание',
  `meta_keywords` text COLLATE utf8mb4_unicode_ci COMMENT 'SEO-ключевые слова',
  `is_publish` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Статус',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tags_user_id_foreign` (`user_id`),
  CONSTRAINT `tags_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `moonshine_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,1,2,'werqw','werqw','<p>Ipsum excepturi ex debitis sed aut. Laudantium aut et quis libero quaerat voluptatum architecto. Commodi distinctio qui id veniam asperiores. Molestiae dolores in nihil asperiores non voluptas quia.</p>','products/bKi8jOnxBKOLjukzHWt7cnyzjsmV9030ViBezqjP.png','Atque eveniet reprehenderit quia rerum odio. Rerum ut sapiente aut voluptas. Dolores alias doloremque aut hic dolorem. Voluptatem dolores pariatur quae officiis. Autem ut placeat magni.','sit ratione',1,'2023-12-04 21:00:00','2023-12-05 21:00:00',NULL),(2,1,2,'ggggggggggg','ggggggggggg','<p>Temporibus suscipit saepe reiciendis ut. Sunt harum et eveniet. Architecto aut autem maxime aut libero illum exercitationem.</p>','products/ZSRS1G5df6Vok9frvdxMFdFgnGFU1mIDloLqlCDV.png','Sint accusantium sed ipsam quia. Quia veniam quia et consectetur qui. Ab id repellendus aut et ut saepe. Quasi animi quos aut officiis sit impedit. Aliquid qui nihil minima veniam quia dolorem ut.','rerum libero',1,'2023-12-04 21:00:00','2023-12-06 04:51:14',NULL),(3,1,1,'Reprehenderit autem','reprehenderit-autem','<p>Ducimus rerum provident architecto quam est. Quas aspernatur dolor neque quod. Sed placeat eius fuga facere vitae.</p>','products/5QDeLVPT3aNN1OHHXUgXCFNTMs3AiCuFMa80cJ6U.png','Adipisci porro cupiditate quae voluptatem quod sed. Cumque eligendi ipsum eos molestiae.','aliquam eum',1,'2023-12-04 21:00:00','2023-12-06 04:19:17',NULL),(5,1,2,'Aut iusto','aut-iusto','<p>Nemo vel laborum rerum quas ab eum. Quaerat id non nihil. Rem voluptate aut fugit saepe ex. Aperiam velit non vitae voluptate est corrupti delectus.</p>','products/yQclF000Lzi1PZZzbfbkw7f0BMddE01FLNA66Uzh.png','Molestiae debitis eos non reiciendis facere libero optio. Ipsa voluptatem quasi vel et nulla asperiores.','eligendi amet',1,'2023-12-04 21:00:00','2023-12-06 06:02:40',NULL);
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
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
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2023-12-07 19:21:26
