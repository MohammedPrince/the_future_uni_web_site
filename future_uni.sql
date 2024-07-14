-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 05, 2024 at 06:18 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `future_uni`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fu_events`
--

DROP TABLE IF EXISTS `fu_events`;
CREATE TABLE IF NOT EXISTS `fu_events` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` date NOT NULL,
  `event_imgs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_by` int NOT NULL DEFAULT '0',
  `event_status` int NOT NULL DEFAULT '0',
  `del` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fu_events_event_title_unique` (`event_title`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fu_events`
--

INSERT INTO `fu_events` (`id`, `event_title`, `event_desc`, `event_time`, `event_date`, `event_imgs`, `faculty_id`, `event_by`, `event_status`, `del`, `created_at`, `updated_at`) VALUES
(7, 'test I', 'test I', '09:00 AM', '2023-12-22', 'test.png', '1', 1, 1, 0, NULL, NULL),
(8, 'test II', 'test II', '09:00 AM', '2023-12-22', 'test.png', '1', 1, 1, 0, NULL, NULL),
(6, 'test', 'test', '09:00 AM', '2023-12-22', 'test.png', '1', 1, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fu_news`
--

DROP TABLE IF EXISTS `fu_news`;
CREATE TABLE IF NOT EXISTS `fu_news` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `news_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_date` date NOT NULL,
  `news_imgs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_by` int NOT NULL DEFAULT '0',
  `news_status` int NOT NULL DEFAULT '0',
  `del` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fu_news_news_title_unique` (`news_title`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fu_news`
--

INSERT INTO `fu_news` (`id`, `news_title`, `news_desc`, `news_date`, `news_imgs`, `faculty_id`, `news_by`, `news_status`, `del`, `created_at`, `updated_at`) VALUES
(4, 'التقديم للجامعات الحكومية والأهلية', 'أكدت الأستاذة كوثر أبو النجا مدير إدارة القبول والتسجيل بجامعة المستقبل أن يتم عبر الموقع الإلكتروني المخصص لهذا الغرض من قبل وزارة التعليم العالي\r\nwww.admission.gov.sd\r\nوالذي يشمل بدوره علي دليل القبول لكل الجامعات الحكومية والأهلية وما يختص بالبرامج الدراسية والمصروفات الدراسية.\r\nوقالت أبو النجا أن التقديم يبدأ بشراء الطالب لرقم استمارة القبول من البنوك التي تتوفر فيها هذه الاستمارة (فيصل – العمال – المشرق – امدرمان الوطني) و يتم التقديم عبر الموبايل أو جهاز الحاسوب أو أحد المراكز المخصصة للتقديم مشيرة الي ان الجامعه بها مركز للتقديم للراغبين في الالتحاق بجامعة المستقبل.\r\nوأشارت أبو النجا أن طريقة التقديم إختلفت كثيرا عن النظام السابق المعمول به, والذي كان يعتمد بشكل رئيسي علي الدليل الورقي (كتيب التقديم) ويتم عبر المراكز التي تحددها الوزارة بالعاصمة والولايات , وقالت ان هذا العام يعتبر العام الخامس منذ تعميم تجربة التقديم الإلكتروني.\r\nو أفادت بأن الطلاب أصحاب الشهادات لأعوام سابقة يمكنهم التقديم في قبول الشواغر (الدور الثاني).\r\nلمزيد من الإستفسار والتواصل يمكنكم الاتصال بالأرقام :\r\n0183428543\r\n0183428544\r\n0183428545\r\nتوصيلات داخلية:\r\n112- 124 – 227', '2023-12-12', 'admission.jpg', '05', 1, 1, 0, '2023-12-10 09:26:54', '2023-12-10 09:26:54'),
(5, 'كلية هندسة الاتصالات وتكنولوجيا الفضاء تنظم ورشة حول الماتلاب للمبتدئين', 'في إطار سعيها الدؤوب لترقية مهارات اعضاء هيئة التدريس بجامعة المستقبل  ، بالإضافة الى المهتمين في مجال تحليل و تصميم الأنظمة الإلكترونية بإستخدام الحاسب داخل الجامعة ،  وحفزاً للهمم  في مجال البحث العلمي و نشرا للفائدة و تقريب و جهات النظر , و بما يخدم العملية الأكاديمية بالجامعة ، نظّمت كلية كلية هندسة الاتصالات وتكنولوجيا الفضاء ، ورشة عمل تطبييقية بعنوان (ماتلاب للمبتدئين) ، شهدت حضورا نوعيا لمنسوبي الجامعة ، وقد زاوجت الورشة التي إستمرت لأكثر من خمس ساعات بين المعرفة النظرية والعملية ، تلقى فيها الدارسين تعريفاً وافياً بشأن برنامج الماتلاب والذي وصفه القائمون على الورشة بأنه عبارة عن منصة رياضية تتيح للمستخدمين حل المعادلات الرياضية المعقدة والبسيطة وعرضها كأشكال مرئية سهلة الفهم ، بهدف تمكين مرتادي الورشة من معرفة الأساسيات ومنحهم الخبرة اللازمة لاستخدام برنامج الماتلاب في التحليل والأبحاث .وأجمل منظمو الورشة أهدافها في كونها تأتي فرصة لتطوير مهارات منتسبي الجامعة ،وتحفيزهم على تنظيم الندوات العلمية وورش العمل لتبادل المعرفة التطبيقية  الممتعة لتطوير وتعزيز العملية التعليمية في الجامعة ، وطرح أساليب جديدة مختلفة لأجل تلبية إحتياجات التعليم الحديثة', '2023-12-12', 'tcom_course.jpg,3.jpg,7.jpg,8.jpg,9.jpg', '06', 1, 1, 0, '2023-12-10 11:57:32', '2023-12-10 11:57:32'),
(6, 'Newly discovered Asteroid named after Egyptian-American space scientist', 'أطلقت وكالة الفضاء الأميركية “ناسا” اسم عالم الفضاء المصري، فاروق الباز، على كويكب مكتشف حديثا تقديرا لإسهاماته العلمية البارزة.\r\n\r\nوأطلق الاتحاد العالمي للفلك والتابع لهيئة الأمم المتحدة اسم الباز علي كويكب بالفضاء نتيجة لدوره مع وكالة الفضاء الأميركية بداية بمشروع أبوللو لاستكشاف سطح القمر في منتصف ستينيات القرن الماضي، مرورا بتصوير الأرض من المدار على رحلة أبوللو سيوز الأميركية الروسية المشتركة .\r\n\r\nوتعد هذه المرة الأولى، التي يتم إطلاق اسم عالم مصري، على كويكب بالسماء، فيما قدمت جامعة المستقبل (كمبيوتر مان سابقآ)، متمثلة في رئيسها ورئيس مجلس امناءها الدكتور ابوبكر مصطفي والسادة اعضاء المجلس والاساتذه والعاملون وطلاب الجامعة، التهنئة للباز الذي هو احد أعضاء مجلس الامناء بجامعة المستقبل(كمبيوتر مان سابقآ) منذ تأسيسها وقد زار السودان عدة مرات,ويرجع له الفضل في إكتشاف حوض بحيرة دارفور ,وزار منطقة دارفور واطلق مع دكتور ابوبكرمصطفي رئيس مجلس أمناء الجامعة مبادرة حفر 1000 بئر بدارفور وقدم محاضرات بتلك المناسبه في كل من جامعة المستقبل وفندق كورنيثيا بالخرطوم.\r\n\r\nالجدير بالذكر أن مجلس أمناء جامعة المستقبل يضم الي جانب البروفيسور فاروق الباز عددآ من القامات العلميه العالميه مثل العالم الانجليزي (اليك بوكسنبيرج), الذي اكتشف أيضآ احد الكواكب وأطلق اسمه فيما بعد عليه والعالم المصري المرحوم احمد زويل الذي نال جائزة نوبل في الكيمياء , والعالم فيروز شهروخي المستشار لوكالة الفضاء الخارجي بفيينا , والبروفيسور عدنان بدران رئيس وزراء الأردن السابق وغيرهم .\r\n\r\nلذا يعد العالم فاروق الباز ثاني عالم من مجلس أمناء جامعة المستقبل تطلق وكالة الفضاء ناسا اسمه علي كوكب بالفضاء .\r\n\r\nجامعة المستقبل (كمبيوتر مان سابقآ) والسودان ووادي النيل والعالم العربي والأفريقي يهنئون أنفسهم بهذا الإنجاز العلمي المتميز , أملين في المزيد من تلك النجاحات الباهرة .\r\n\r\nيذكر أن العالم المصري فاروق الباز ولد في الثاني من يناير 1938 في مدينة الزقازيق.\r\n\r\nوحصل الباز على شهادة البكالوريوس في علوم الكيمياء والجيولوجيا من جامعة عين شمس في عمر العشرين وكذلك حصل في عام 1961 على شهادة ماجستير العلوم في الجيولوجيا، والدكتوراه في عام 1964، ثم عمل في وكالة ناسا خلال برنامج أبوللو.', '2023-12-27', 'فاروق1.jpg', '1', 1, 1, 0, '2023-12-10 13:53:11', '2023-12-10 13:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_11_25_190600_create_fu_events_table', 1),
(5, '2023_11_25_191350_create_fu_news_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_faculty` int NOT NULL DEFAULT '0',
  `isAdmin` int NOT NULL DEFAULT '1',
  `user_by` int NOT NULL DEFAULT '0',
  `user_add_date` timestamp NULL DEFAULT NULL,
  `user_update_date` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `del` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_user_phone_unique` (`user_phone`),
  UNIQUE KEY `users_user_email_unique` (`user_email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_fullname`, `user_phone`, `user_email`, `user_faculty`, `isAdmin`, `user_by`, `user_add_date`, `user_update_date`, `updated_at`, `created_at`, `del`) VALUES
(1, 'admin', '$2y$10$yW4fBBgegLe10uVhBI5IT.10H8DuTgbxhmi3YDjcqOVaLKUECrqoW', 'Mohammed MaverickX', '0916554412', 'mohammed.beng@gmail.com', 0, 1, 1, NULL, NULL, '2024-01-05 13:38:09', '2023-11-28 10:17:57', 0),
(2, 'user', '$2y$10$yW4fBBgegLe10uVhBI5IT.10H8DuTgbxhmi3YDjcqOVaLKUECrqoW', 'Mohammed Prince', '0916554400', 'moh.beng@gmail.com', 0, 0, 0, NULL, NULL, '2023-11-28 10:17:57', '2023-11-28 10:17:57', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
