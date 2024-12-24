-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for karesepan
CREATE DATABASE IF NOT EXISTS `karesepan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `karesepan`;

-- Dumping structure for table karesepan.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table karesepan.cache: ~0 rows (approximately)
DELETE FROM `cache`;

-- Dumping structure for table karesepan.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table karesepan.cache_locks: ~0 rows (approximately)
DELETE FROM `cache_locks`;

-- Dumping structure for table karesepan.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
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

-- Dumping data for table karesepan.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table karesepan.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table karesepan.jobs: ~0 rows (approximately)
DELETE FROM `jobs`;

-- Dumping structure for table karesepan.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table karesepan.job_batches: ~0 rows (approximately)
DELETE FROM `job_batches`;

-- Dumping structure for table karesepan.kategoris
CREATE TABLE IF NOT EXISTS `kategoris` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table karesepan.kategoris: ~0 rows (approximately)
DELETE FROM `kategoris`;
INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
	(1, 'Makanan Berat', '2024-12-08 07:55:09', '2024-12-08 07:55:09'),
	(2, 'Sarapan', '2024-12-08 07:59:47', '2024-12-08 07:59:47');

-- Dumping structure for table karesepan.likes
CREATE TABLE IF NOT EXISTS `likes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `resep_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `likes_user_id_foreign` (`user_id`),
  KEY `likes_resep_id_foreign` (`resep_id`),
  CONSTRAINT `likes_resep_id_foreign` FOREIGN KEY (`resep_id`) REFERENCES `resep_makanan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table karesepan.likes: ~0 rows (approximately)
DELETE FROM `likes`;

-- Dumping structure for table karesepan.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table karesepan.migrations: ~5 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(9, '0001_01_01_000000_create_users_table', 1),
	(10, '0001_01_01_000001_create_cache_table', 1),
	(11, '0001_01_01_000002_create_jobs_table', 1),
	(12, '2024_11_16_134506_create_resep_table', 1),
	(13, '2024_11_19_003214_create_likes_table', 2),
	(16, '2024_12_08_125706_create_kategoris_table', 3);

-- Dumping structure for table karesepan.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table karesepan.password_reset_tokens: ~0 rows (approximately)
DELETE FROM `password_reset_tokens`;

-- Dumping structure for table karesepan.resep_makanan
CREATE TABLE IF NOT EXISTS `resep_makanan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `nama_makanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kat_id` bigint unsigned DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resep` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cara_buat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table karesepan.resep_makanan: ~1 rows (approximately)
DELETE FROM `resep_makanan`;
INSERT INTO `resep_makanan` (`id`, `user_id`, `nama_makanan`, `kat_id`, `deskripsi`, `resep`, `cara_buat`, `link_gambar`, `created_at`, `updated_at`) VALUES
	(1, 3, 'Lontong Kari Khas Batak', 1, 'lontong yang disajikan dengan kari daging sapi dengan bumbu kari cenderung tipis atau ‘enteng', '600 g daging sapi sengkel\r\n5 buah lontong\r\n1 sdm asam jawa, larutkan dengan 3 sdm air panas\r\n5 butir cengkeh\r\n2 butir kapulaga\r\n2 cm kayu manis\r\n2 batang serai, memarkan\r\n1 lembar daun pandan\r\n1 butir pekak\r\n1 sdt Royco Kaldu Ikan\r\n1500 ml air\r\n200 ml santan kental\r\n4 sdm bawang merah goreng\r\n3 sdm minyak, untuk menumis\r\n\r\nBumbu halus\r\n10 butir bawang merah\r\n5 siung bawang putih\r\n4 buah cabai merah\r\n4 butir kemiri\r\n3 cm jahe\r\n1 sdt garam\r\n1 sdt ketumbar, sangrai\r\n½ sdt merica putih butiran\r\n½ sdt jintan\r\n½ sdt adas', '1. Lumuri daging sapi dengan air asam jawa. Sisihkan.\r\n2. Panaskan minyak, tumis bumbu halus hingga harum. Kecilkan api, tambahkan cengkih, kapulaga, kayu manis, serai, pandan, dan pekak. Tumis hingga harum dan matang.\r\n3. Masukkan daging sapi, aduk hingga setengah matang. Tuang air, masak hingga mendidih.\r\n4. Kecilkan api, masak hingga daging setengah empuk.\r\n5. Tuangi santan dan Royco Kaldu Sapi, masak sambil sesekali diaduk hingga daging empuk.\r\n6. Tambahkan air asam jawa, aduk rata. Masak hingga meresap. Angkat.\r\n7. Taburi dengan bawang goreng, aduk rata. Siapkan mangkuk saji yang sudah diisi dengan potongan lontong. Tuang kuah kari sapi. Sajikan bersama pelengkap', 'images/resep/1733456337.png', '2024-12-05 20:38:57', '2024-12-08 05:21:46'),
	(3, 3, 'Nasi Goreng Sosis', 2, 'Nasi goreng dengan potongan sosis yang gurih, digoreng bersama bumbu sederhana yang Rasanya lezat, praktis, dan cocok untuk sarapan atau makan malam', '1 piring penuh nasi putih\r\n2 buah sosis\r\n1 batang daun bawang, cincang halus\r\n1 butir telur ayam\r\n1/2 sdt kaldu bubuk\r\nKecap manis secukupnya\r\nGaram secukupnya\r\nbumbu halus :\r\n5 butir bawang merah\r\n2 siung bawang putih\r\nLada bubuk secukupnya\r\nCabai rawit secukupnya', 'Tumis bumbu sampai harum.\r\nMasukkan telur lalu masak orak-arik bersama bumbu.\r\nTambahkan garam, daun bawang dan sosis. Masak hingga matang.\r\nMasukkan nasi putih, kecap manis dan kaldu ayam bubuk lalu kembali aduk rata.\r\nMasak sebentar sampai nasi goreng matang sempurna. Siap disajikan.', 'images/resep/Nasi Goreng Sosis1733672561.jpg', '2024-12-08 08:42:41', '2024-12-08 08:42:41'),
	(4, 3, 'Tumis Kangkung', 2, 'Hidangan kangkung yang ditumis dengan bawang merah, bawang putih, dan terasi, memberikan cita rasa gurih dan pedas dengan tambahan cabai rawit.', '3 ikat kangkung, siangi\r\n\r\n2 siung bawang merah iris tipis\r\n\r\n1 siung bawang putih iris tipis\r\n\r\n1/2-1 sdt terasi\r\n\r\n10 buah cabai rawit iris tipis\r\ngaram, gula dan kaldu jamur \r\n\r\n50 ml air secukupnya', 'Tumis bawang merah putih dan caba sampai harum. Masukkan terasi dan air. Tekan-tekan terasi agar tercampur rata atau bisa dihaluskan menjadi satu.\r\n\r\nMasukkan kangkung, garam, gula, dan kaldu jamur.\r\n\r\nAduk-aduk, tunggu sampai kangkung layu, tes rasa dan matikan kompor.\r\n\r\nSajikan.', 'images/resep/Tumis Kangkung1733677557.png', '2024-12-08 10:05:57', '2024-12-08 10:05:57'),
	(5, 4, 'Mie Goreng Bakso', 1, 'Mie goreng bakso adalah hidangan mi goreng yang disajikan dengan irisan bakso sebagai pelengkap. Dimasak dengan bumbu sederhana, mie ini memiliki cita rasa gurih dan kenyal', '1 bungkus mie telur\r\n5 butir bakso sapi, potong-potong\r\n1 butir telur, kocok lepas dan goreng orak-arik\r\n2 batang daun bawang, potong-potong\r\nsayur sawi secukupnya\r\n2 siung bawang putih\r\n5 siung bawang merah\r\n1/2 sdt merica bubuk\r\n1/2 sdt pala bubuk\r\n1 sdt garam\r\n1 sdt gula\r\n1 sdt kecap asin\r\nkecap manis secukupnya', 'Rebus mie sebentar, tiriskan dan campur dengan minyak agar tidak lengket.\r\nHaluskan bumbu bawang putih, bawang merah, merica dan pala. Tumis hingga harum. Masukkan bakso, sosis, dan telur, tumis hingga matang.\r\nMasukkan daun bawang dan sawi, tumis hingga layu.\r\nMasukkan mie, kecap asin dan kecap manis secukupnya. Aduk rata dan tes rasa, jika sudah pas, angkat.', 'images/resep/Mie Goreng Bakso1733677794.jpg', '2024-12-08 10:09:54', '2024-12-08 10:09:54'),
	(6, 4, 'Capcay Goreng', 2, 'Sayuran campuran yang ditumis dengan saus tiram dan bumbu pilihan, menghasilkan sajian yang kaya rasa dan penuh gizi.', '- 1 ikat sawi ijo\r\n- 1 buah sawi putih\r\n- 2 buah worte\r\n- 1 buah kembang kol\r\n\r\nBahan bumbu:\r\n\r\n- 2 siung bawang putih\r\n- 3 butir bawang merah\r\n- 1/2 bawang bombai\r\n- 1 sdm saus tiram\r\n- 1 sdt saus Inggris\r\n- 1 sdt kecap asin\r\n- 1 sdm maizena, campur dengan sedikit air\r\n- 1 sdt minyak wijen\r\n- Air secukupnya\r\n- Garam\r\n- Lada', 'Tumis bawang merah dan bawang putih hingga harum, masukkan bawang bombai\r\nMasukkan wortel, aduk-aduk sampai setengah matang\r\nBeri air secukupnya, masukkan saus tiram, kecap Inggris, kecap asin, garam, lada. Aduk-aduk hingga kuah mendidih masukkan maizena, aduk-aduk\r\n \r\nMasukkan sawi, kembang kol, aduk-aduk\r\nTest rasa, terakhir masukkan minyak wijen.\r\nAngkat dan sajikan.', 'images/resep/Capcay Goreng1733677861.png', '2024-12-08 10:11:01', '2024-12-08 10:11:01'),
	(7, 5, 'Oseng Kacang Panjang Tempe Kecap Pedas', 1, 'Tumisan kacang panjang dan tempe dengan tambahan kecap manis dan bumbu pedas, cocok untuk penggemar makanan bercita rasa manis dan pedas', 'Bahan-bahan:\r\n \r\n- 1 ikat kacang panjang (potong korek api)\r\n- 1 papan tempe besar (potong dadu)\r\n \r\nBumbu halus:\r\n \r\n- 4 siung bawang merah\r\n- 3 siung bawang putih\r\n- 5 cabai rawit merah\r\n- 10 cabai rawit hijau\r\n- Garam secukupnya\r\n- Gula pasir secukupnya\r\n- Kaldu bubuk secukupnya\r\n- Kecap manis secukupnya\r\n- Saori saus tiram secukupnya', '1. Cuci bersih kacang panjang yang sudah dipotong korek api. Sisihkan\r\n2. Goreng tempe yang sudah dipotong hingga keemasan. Tiriskan\r\n3. Tumis bumbu halus hingga harum, tambahkan, garam, gula, kecap, saori, dan kaldu bubuk\r\n4. Masukkan kacang panjang, aduk hingga tercampur rata dan tambahkan sedikit air\r\n5. masukkan tempe, oseng-oseng sebentar. Koreksi rasa\r\n6. Angkat dan sajikan.', 'images/resep/Oseng Kacang Panjang Tempe Kecap Pedas1733679132.png', '2024-12-08 10:32:12', '2024-12-08 10:32:12'),
	(8, 5, 'Tumis Bayam Tomat', 2, 'Bayam yang segar ditumis bersama jagung manis dan tomat, dilengkapi bumbu rempah yang membuat hidangan ini lezat dan sehat.', 'Bahan-bahan:\r\n \r\n- 1 ikat bayam, siangi daunnya\r\n- 1 buah jagung manis, sisir\r\n- 3 buah tomat, potong-potong\r\n \r\nBumbu halus:\r\n \r\n- 3 siung bawang putih\r\n- 5 siung bawang merah\r\n- 2 buah cabai keriting\r\n- 6 buah cabai rawit\r\n- 1/2 sdt terasi matang\r\n- 2 sdm kecap manis\r\n- 1 sdm saus tiram\r\n- 1 sdt kecap asin\r\n- gula, garam, merica, kaldu bubuk secukupnya', 'Tumis bumbu halus hingga harum dan matang, beri sedikit air bila perlu\r\nMasukkan jagung yang sudah disisir, tunggu hingga jagung matang\r\nMasukkan bayam, bumbui dengan kecap manis, saus tiram, dan kecap asin.\r\nKemudian tambahkan gula, garam, merica, dan kaldu bubuk, lalu aduk-aduk hingga rata.\r\nTerakhir masukkan potongan tomat, koreksi rasa.\r\nAngkat dan sajikan.', 'images/resep/Tumis Bayam Tomat1733679277.png', '2024-12-08 10:34:37', '2024-12-08 10:34:37'),
	(9, 5, 'Sayur Asem', 1, 'Sup sayuran dengan kuah asam yang menyegarkan, menggabungkan berbagai sayuran seperti jagung, labu siam, dan belimbing wuluh.', 'Bahan-bahan:\r\n \r\n- 2,5 liter air putih\r\n- 1 ikat kacang panjang\r\n- 1 buah labu siam\r\n- 1 buah wortel\r\n- 2 buah jagung manis kol/kubis secukupnya segenggam daun belinjo\r\n- 15 buah belimbing wuluh\r\n- 4 lembar daun salam lengkuas geprek segenggam kacang tanah/kacang merah\r\n- Gula pasir, gula jawa, garam secukupnya\r\n \r\nBumbu halus (diblender):\r\n \r\n- 7 buah cabai merah besar (buang bijinya)\r\n- 15 buah cabai rawit (sesuaikan selera pedesnya) 1 saset terasi\r\n- 7 siung bawang putih\r\n- 9 butir bawang merah\r\n- 6 mata asam jawa (buang bijinya)', '1. Rebus air bersama lengkuas dan daun salam, masukkan bumbu tunggu mendidih dan bumbu agak matang.\r\n2. Lalu masukkan sayur berurutan sesuai tingkat kematangan, misal jagung, kacang, labu siam, kacang panjang, wortel, kubis + daun belinjo, belimbing wuluh\r\n3. Jangan lupa koreksi rasa, sesuaikan selera\r\n4. Sajikan', 'images/resep/Sayur Asem1733679433.png', '2024-12-08 10:37:13', '2024-12-08 10:37:13'),
	(10, 5, 'Oseng Sawi Putih Jagung Manis', 2, 'Tumisan sawi putih dan jagung manis yang sederhana, cocok untuk menu harian dengan cita rasa gurih dan manis.', 'Bahan-bahan:\r\n \r\n- 1 buah/bonggol sawi putih potong-potong\r\n- 1 buah jagung manis, serut\r\n- 3 siung bawang putih cincang\r\n- Secukupnya cabai\r\n- Gula garam kaldu bubuk secukupnya\r\n- Air secukupnya', 'Bahan-bahan:\r\n \r\n- 1 buah/bonggol sawi putih potong-potong\r\n- 1 buah jagung manis, serut\r\n- 3 siung bawang putih cincang\r\n- Secukupnya cabai\r\n- Gula garam kaldu bubuk secukupnya\r\n- Air secukupnya\r\nCara membuat oseng sawi putih jagung manis:\r\n \r\n1. Tumis bawang putih sampai harum, masukkan cabai uleg, jagung, dan air\r\n2. Tunggu sampai jagung empuk/cukup matang\r\n3. Masukkan sawi putih, tambah garam gula dan kaldu bubuk\r\n4. Aduk rata tunggu sawi layu, matikan kompor\r\n5. Sajikan dalam mangkuk.', 'images/resep/Oseng Sawi Putih Jagung Manis1733679488.png', '2024-12-08 10:38:08', '2024-12-08 10:38:08'),
	(11, 5, 'Cah Tauge dan Tahu', 1, 'Kombinasi tauge segar, tahu, dan bakso dengan bumbu tumis pedas, memberikan sensasi rasa yang nikmat dan tekstur yang kaya', 'Bahan-bahan:\r\n \r\n- 1/4 Tauge (cuci bersih)\r\n- 3 buah tahu putih (potong dadu)\r\n- 5 buah bakso sapi (belah dua)\r\n \r\nBumbu iris:\r\n \r\n- 5 buah cabai rawit merah\r\n- 2 buah cabai merah kriting\r\n- 3 buah bawang merah\r\n- 2 siung bawang putih\r\n- Garam secukupnya\r\n- Gula pasir secukupnya\r\n- Kaldu bubuk secukupnya\r\n- 1 sdm Saori', '1. Goreng tahu dan bakso (jangan terlalu kering). Tiriskan\r\n2. Tumis bumbu yang sudah di rajang sampai harum\r\n3. Tambahkan saori, garam, gula dan kaldu bubuk\r\n4. Masukkan tauge tahu dan bakso, aduk sebentar sampai rata. Koreksi rasa (jangan ditambah air)\r\n5. Angkat dan sajikan.', 'images/resep/Cah Tauge dan Tahu1733679550.png', '2024-12-08 10:39:10', '2024-12-08 10:39:10');

-- Dumping structure for table karesepan.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table karesepan.sessions: ~2 rows (approximately)
DELETE FROM `sessions`;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('sxRKRZ0kUpVnYXFkbJ3dGB1MMNrjwlS4g85cppwT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRjRDelU4dFUyR3hyRlFaY3pTSHRaTUlVYzV1czRoaTRhdGNsdlgxaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9rYXJlc2VwYW4udGVzdC9yZXNlcF9kZXRhaWwvMyI7fX0=', 1733681978);

-- Dumping structure for table karesepan.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table karesepan.users: ~0 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `poto`, `remember_token`, `created_at`, `updated_at`) VALUES
	(3, 'Akhmad Ridlo', 'akhmad', '$2y$12$0NWygzyaQpxSUsljw7d6Dum61bIYuFahvulhrYlIUk73vwmy2ABri', 'akhmadd432@gmail.com', 'images/profiles/1731842519.jpg', NULL, '2024-11-17 04:21:59', '2024-11-17 04:21:59'),
	(4, 'Rena Anastasia', 'rentasia', '$2y$12$uGcQz/8sB9sqzm3MZPUM/Ovg1o94ZWxp21Ma74gfzY3zIcleIlp7y', 'rentasia22@gmail.com', 'images/profiles/1733677667.jpg', NULL, '2024-12-08 10:07:47', '2024-12-08 10:07:47'),
	(5, 'Angelica Mahavesa', 'angel', '$2y$12$1B9Pyx9vBKRXc.N4NqYZ6ejyy9L2nNQHrPLHEQF4ST1FqrxJBhUFS', 'furfur25@gmail.com', 'images/profiles/1733678968.jfif', NULL, '2024-12-08 10:29:28', '2024-12-08 10:29:28');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
