-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 11:47 PM
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
-- Database: `fuedusd_web_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deprt_id` int(11) NOT NULL,
  `Department_name_en` varchar(255) NOT NULL,
  `Department_name_ar` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `dep_type_id` int(11) NOT NULL,
  `faculty_code` int(11) DEFAULT NULL,
  `dep_dell` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deprt_id`, `Department_name_en`, `Department_name_ar`, `description`, `dep_type_id`, `faculty_code`, `dep_dell`) VALUES
(1, 'Faculty of Engineering', '', NULL, 1, 1, 0),
(2, 'Faculty of Computer Science', '', NULL, 1, 2, 0),
(3, 'Faculty of Information Technology', '', NULL, 1, 3, 0),
(4, 'Faculty of Telecommunication Engineering', '', NULL, 1, 4, 0),
(5, 'Faculty of Architecture Engineering', '', NULL, 1, 5, 0),
(6, 'Faculty of Fine Arts and Design', '', NULL, 1, 7, 0),
(7, 'Faculty of Geoinformatics', '', NULL, 1, 14, 0),
(8, 'Faculty of Basic Sciences', '', NULL, 1, 21, 0),
(9, 'Faculty of Postgraduate Studies', '', NULL, 1, 22, 0),
(10, 'Business Administration', '', NULL, 1, 23, 0),
(11, 'CESD', '', NULL, 3, 10, 0),
(12, 'CTS', '', NULL, 3, 20, 0),
(13, 'IRDC', '', NULL, 3, 30, 0),
(14, 'Admission and Registration', '', NULL, 2, 50, 0),
(15, 'Marketing', '', NULL, 2, 60, 0),
(16, 'Students Affairs', '', NULL, 2, 80, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department_type`
--

CREATE TABLE `department_type` (
  `dep_type_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `type_desc` text NOT NULL,
  `dep_dell` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department_type`
--

INSERT INTO `department_type` (`dep_type_id`, `type_name`, `type_desc`, `dep_dell`) VALUES
(1, 'Faculties', '', 0),
(2, 'Departments', '', 0),
(3, 'Centers', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fu_events`
--

CREATE TABLE `fu_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `event_desc` text NOT NULL,
  `event_time` varchar(191) NOT NULL,
  `event_date` date NOT NULL,
  `event_imgs` varchar(255) NOT NULL,
  `faculty_id` varchar(191) NOT NULL,
  `event_by` int(11) NOT NULL DEFAULT 0,
  `event_status` int(11) NOT NULL DEFAULT 0,
  `del` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `fu_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `news_title` varchar(100) NOT NULL,
  `news_desc` text NOT NULL,
  `news_date` date NOT NULL,
  `news_imgs` varchar(255) NOT NULL,
  `faculty_id` varchar(191) NOT NULL,
  `news_by` int(11) NOT NULL DEFAULT 0,
  `news_status` int(11) NOT NULL DEFAULT 0,
  `del` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fu_news`
--

INSERT INTO `fu_news` (`id`, `news_title`, `news_desc`, `news_date`, `news_imgs`, `faculty_id`, `news_by`, `news_status`, `del`, `created_at`, `updated_at`) VALUES
(4, 'التقديم للجامعات الحكومية والأهلية', 'أكدت الأستاذة كوثر أبو النجا مدير إدارة القبول والتسجيل بجامعة المستقبل أن يتم عبر الموقع الإلكتروني المخصص لهذا الغرض من قبل وزارة التعليم العالي\r\nwww.admission.gov.sd\r\nوالذي يشمل بدوره علي دليل القبول لكل الجامعات الحكومية والأهلية وما يختص بالبرامج الدراسية والمصروفات الدراسية.\r\nوقالت أبو النجا أن التقديم يبدأ بشراء الطالب لرقم استمارة القبول من البنوك التي تتوفر فيها هذه الاستمارة (فيصل – العمال – المشرق – امدرمان الوطني) و يتم التقديم عبر الموبايل أو جهاز الحاسوب أو أحد المراكز المخصصة للتقديم مشيرة الي ان الجامعه بها مركز للتقديم للراغبين في الالتحاق بجامعة المستقبل.\r\nوأشارت أبو النجا أن طريقة التقديم إختلفت كثيرا عن النظام السابق المعمول به, والذي كان يعتمد بشكل رئيسي علي الدليل الورقي (كتيب التقديم) ويتم عبر المراكز التي تحددها الوزارة بالعاصمة والولايات , وقالت ان هذا العام يعتبر العام الخامس منذ تعميم تجربة التقديم الإلكتروني.\r\nو أفادت بأن الطلاب أصحاب الشهادات لأعوام سابقة يمكنهم التقديم في قبول الشواغر (الدور الثاني).\r\nلمزيد من الإستفسار والتواصل يمكنكم الاتصال بالأرقام :\r\n0183428543\r\n0183428544\r\n0183428545\r\nتوصيلات داخلية:\r\n112- 124 – 227', '2023-12-12', 'admission.jpg', '05', 1, 1, 0, '2023-12-10 09:26:54', '2023-12-10 09:26:54'),
(5, 'كلية هندسة الاتصالات وتكنولوجيا الفضاء تنظم ورشة حول الماتلاب للمبتدئين', 'في إطار سعيها الدؤوب لترقية مهارات اعضاء هيئة التدريس بجامعة المستقبل  ، بالإضافة الى المهتمين في مجال تحليل و تصميم الأنظمة الإلكترونية بإستخدام الحاسب داخل الجامعة ،  وحفزاً للهمم  في مجال البحث العلمي و نشرا للفائدة و تقريب و جهات النظر , و بما يخدم العملية الأكاديمية بالجامعة ، نظّمت كلية كلية هندسة الاتصالات وتكنولوجيا الفضاء ، ورشة عمل تطبييقية بعنوان (ماتلاب للمبتدئين) ، شهدت حضورا نوعيا لمنسوبي الجامعة ، وقد زاوجت الورشة التي إستمرت لأكثر من خمس ساعات بين المعرفة النظرية والعملية ، تلقى فيها الدارسين تعريفاً وافياً بشأن برنامج الماتلاب والذي وصفه القائمون على الورشة بأنه عبارة عن منصة رياضية تتيح للمستخدمين حل المعادلات الرياضية المعقدة والبسيطة وعرضها كأشكال مرئية سهلة الفهم ، بهدف تمكين مرتادي الورشة من معرفة الأساسيات ومنحهم الخبرة اللازمة لاستخدام برنامج الماتلاب في التحليل والأبحاث .وأجمل منظمو الورشة أهدافها في كونها تأتي فرصة لتطوير مهارات منتسبي الجامعة ،وتحفيزهم على تنظيم الندوات العلمية وورش العمل لتبادل المعرفة التطبيقية  الممتعة لتطوير وتعزيز العملية التعليمية في الجامعة ، وطرح أساليب جديدة مختلفة لأجل تلبية إحتياجات التعليم الحديثة', '2023-12-12', 'tcom_course.jpg,3.jpg,7.jpg,8.jpg,9.jpg', '06', 1, 1, 0, '2023-12-10 11:57:32', '2023-12-10 11:57:32'),
(6, 'Newly discovered Asteroid named after Egyptian-American space scientist', 'أطلقت وكالة الفضاء الأميركية “ناسا” اسم عالم الفضاء المصري، فاروق الباز، على كويكب مكتشف حديثا تقديرا لإسهاماته العلمية البارزة.\r\n\r\nوأطلق الاتحاد العالمي للفلك والتابع لهيئة الأمم المتحدة اسم الباز علي كويكب بالفضاء نتيجة لدوره مع وكالة الفضاء الأميركية بداية بمشروع أبوللو لاستكشاف سطح القمر في منتصف ستينيات القرن الماضي، مرورا بتصوير الأرض من المدار على رحلة أبوللو سيوز الأميركية الروسية المشتركة .\r\n\r\nوتعد هذه المرة الأولى، التي يتم إطلاق اسم عالم مصري، على كويكب بالسماء، فيما قدمت جامعة المستقبل (كمبيوتر مان سابقآ)، متمثلة في رئيسها ورئيس مجلس امناءها الدكتور ابوبكر مصطفي والسادة اعضاء المجلس والاساتذه والعاملون وطلاب الجامعة، التهنئة للباز الذي هو احد أعضاء مجلس الامناء بجامعة المستقبل(كمبيوتر مان سابقآ) منذ تأسيسها وقد زار السودان عدة مرات,ويرجع له الفضل في إكتشاف حوض بحيرة دارفور ,وزار منطقة دارفور واطلق مع دكتور ابوبكرمصطفي رئيس مجلس أمناء الجامعة مبادرة حفر 1000 بئر بدارفور وقدم محاضرات بتلك المناسبه في كل من جامعة المستقبل وفندق كورنيثيا بالخرطوم.\r\n\r\nالجدير بالذكر أن مجلس أمناء جامعة المستقبل يضم الي جانب البروفيسور فاروق الباز عددآ من القامات العلميه العالميه مثل العالم الانجليزي (اليك بوكسنبيرج), الذي اكتشف أيضآ احد الكواكب وأطلق اسمه فيما بعد عليه والعالم المصري المرحوم احمد زويل الذي نال جائزة نوبل في الكيمياء , والعالم فيروز شهروخي المستشار لوكالة الفضاء الخارجي بفيينا , والبروفيسور عدنان بدران رئيس وزراء الأردن السابق وغيرهم .\r\n\r\nلذا يعد العالم فاروق الباز ثاني عالم من مجلس أمناء جامعة المستقبل تطلق وكالة الفضاء ناسا اسمه علي كوكب بالفضاء .\r\n\r\nجامعة المستقبل (كمبيوتر مان سابقآ) والسودان ووادي النيل والعالم العربي والأفريقي يهنئون أنفسهم بهذا الإنجاز العلمي المتميز , أملين في المزيد من تلك النجاحات الباهرة .\r\n\r\nيذكر أن العالم المصري فاروق الباز ولد في الثاني من يناير 1938 في مدينة الزقازيق.\r\n\r\nوحصل الباز على شهادة البكالوريوس في علوم الكيمياء والجيولوجيا من جامعة عين شمس في عمر العشرين وكذلك حصل في عام 1961 على شهادة ماجستير العلوم في الجيولوجيا، والدكتوراه في عام 1964، ثم عمل في وكالة ناسا خلال برنامج أبوللو.', '2023-12-27', 'فاروق1.jpg', '1', 1, 1, 0, '2023-12-10 13:53:11', '2023-12-10 13:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `linkages`
--

CREATE TABLE `linkages` (
  `link_id` int(11) NOT NULL,
  `link_name` varchar(255) NOT NULL,
  `link_type` int(11) NOT NULL DEFAULT 0,
  `link_date` varchar(255) DEFAULT NULL,
  `link_duration` varchar(255) DEFAULT NULL,
  `link_url` varchar(255) NOT NULL,
  `link_desc` varchar(255) DEFAULT NULL,
  `link_logo` varchar(255) DEFAULT NULL,
  `link_del` int(11) NOT NULL DEFAULT 0,
  `updated_at` varchar(200) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `linkages`
--

INSERT INTO `linkages` (`link_id`, `link_name`, `link_type`, `link_date`, `link_duration`, `link_url`, `link_desc`, `link_logo`, `link_del`, `updated_at`, `created_at`) VALUES
(1, 'test', 1, '2024-06-27', 'from 20 to 20', 'https://www.test.com', 'test test test', '1_n.jpg', 1, '2024-06-12 06:12:16', '2024-06-06 15:57:45'),
(2, 'Nottingham University, Malaysia Campus', 1, '2024-06-18', 'from 20 to 20', 'https://www.tes25.com', NULL, '3_n.jpg', 0, '2024-06-06 16:16:09', '2024-06-06 16:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `prog_id` int(11) NOT NULL,
  `program_name_en` varchar(255) NOT NULL,
  `program_name_ar` varchar(255) NOT NULL,
  `program_desc` text DEFAULT NULL,
  `abbreviation` varchar(20) DEFAULT NULL,
  `program_code` int(11) DEFAULT NULL,
  `faculty_code` int(11) DEFAULT NULL,
  `prog_cat_id` int(11) NOT NULL,
  `program_del` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`prog_id`, `program_name_en`, `program_name_ar`, `program_desc`, `abbreviation`, `program_code`, `faculty_code`, `prog_cat_id`, `program_del`) VALUES
(1, 'B.Sc. in Computer Engineering', 'بكالريوس  شرف هندسة الحاسوب', NULL, 'ENG', 1, 1, 1, 0),
(2, 'B.Sc. in Computer Science', 'بكالوريوس شرف  علوم الحاسوب', NULL, 'SCI', 2, 2, 1, 0),
(3, 'B.Sc. in Information Technology', 'بكلاريوس شرف تقنية المعلومات', NULL, 'IT', 3, 3, 1, 0),
(4, 'B.Sc. In Telecom. Engineering', 'بكالوريوس  شرف هندسة االإتصالات', NULL, 'TCOM', 4, 4, 1, 0),
(5, 'B.Sc. in Architecture Engneering', 'بكالوريوس شرف هندسة العمارة ', NULL, 'ARCH', 5, 5, 1, 0),
(6, 'Diploma in Information Technology', 'دبلوم تقنية المعلومات', NULL, 'DIT', 7, 3, 3, 0),
(7, 'Diploma In Telecom. Engineering', 'دبلوم هندسة تقنية الإتصالات', NULL, 'DCOM', 8, 4, 3, 0),
(8, 'B.Sc. In Knowledge Engineering', 'بكالوريوس شرف الهندسة المعرفية', NULL, 'KNENG', 19, 3, 1, 0),
(9, 'B.Sc. in Knowledge managment', 'بكالوريوس شرف الإدارة المعرفية', NULL, 'KNMGT', 20, 3, 1, 0),
(10, 'B.Sc. In GIS', 'بكالوريوس شرف نظم المعلومات الجغرافية', NULL, 'GIS', 21, 14, 1, 0),
(11, 'B.Sc in Electronic Eng.', 'بكلاريوس هندسة الالكترونيات', NULL, 'ELECT', 22, 1, 2, 0),
(12, 'B.Sc in Creative Multimedia', 'بكالاريوس شرف الوسائط المتعددة', NULL, 'CMM', 25, 7, 1, 0),
(13, 'Diploma  in E-Commerce Technology', 'دبلوم تقنية التجارة الإلكترونية', NULL, 'DECOM', 26, 3, 3, 0),
(14, 'Diploma in Web design', 'دبلوم  تصميم مواقع الإنترنت', NULL, 'DWEB', 27, 3, 3, 0),
(15, 'Diploma in IT business and accounting', 'دبلوم تقنية المعلومات التحارية والمحاسبية', NULL, 'DITBUS', 28, 3, 3, 0),
(16, 'Diploma in Computer Engineering', 'دبلوم هندسة الحاسوب', NULL, 'DENG', 29, 1, 3, 0),
(17, 'Diploma in Electronic  Engineering', 'دبلوم هندسة الإلكترونيات  ', NULL, 'DELECT', 30, 1, 3, 0),
(18, 'Diploma in Network Engineering', 'دبلوم هندسة الشبكات', NULL, 'DNETENG', 31, 1, 3, 0),
(19, 'B.Sc. in Laser Engineering', 'بكلاريوس هندسة الليزر', NULL, 'LASENG', 33, 1, 2, 0),
(20, 'B.Sc. in Biomedical Engineering', 'بكلاريوس الهندسة الطبية الحيوية     ', NULL, 'BIOMED', 34, 1, 2, 0),
(21, 'B.Sc. in Mechatronics Engineering', 'الهندسة الميكانيكية الإلكترونية ', NULL, 'MECTRONIC', 35, 1, 2, 0),
(22, 'B.Sc. in Satellite Engineering', 'بكالوريوس  شرف هندسة الأقمار الصناعية', NULL, 'SATENG', 36, 4, 1, 0),
(23, 'B.Sc. in Interior Design', ' بكالوريوس التصميم الداخلي', NULL, 'INTDES', 37, 7, 2, 0),
(24, 'B.Sc. in Digital Marketing', 'بكالوريوس شرف التسويق الرقمى', NULL, 'DIGMKT', 38, 3, 1, 0),
(25, 'B.Sc. in Digital Banking', 'بكالوريوس شرف  البنوك الرقمية', NULL, 'DIGBNK', 39, 3, 1, 0),
(26, 'B.Sc. in Bioinformatics', 'بكالوريوس شرف المعلوماتية الحيوية', NULL, 'BIOINFO', 40, 3, 0, 0),
(27, 'B.Sc. In Artificial Intelligance', 'بكالريوس شرف الذكاء الصناعى', NULL, 'ARTIN', 41, 2, 0, 0),
(28, 'B.Sc. in Graphic Technology Art', 'بكلاريوس', NULL, 'GRAPHIC', 42, 7, 0, 0),
(29, 'B.Sc. in Remote Sensing', '   بكالوريوس شرف الإستشعار عن بعد', NULL, 'REMSEN', 43, 14, 0, 0),
(30, 'B.Sc. in Information Technology(MB)', 'B.Sc. in Information Technology(MB)', NULL, 'ITMB', 44, 3, 0, 0),
(31, 'Master in Data Communication and Networking Engineering', 'ماجستير في بيانات الاتصال وهندسة الشبكات', NULL, NULL, 45, 22, 0, 0),
(32, 'Master in Business Administration', 'ماجستير في ادارة الاعمال', NULL, NULL, 46, 22, 0, 0),
(33, 'Master in Landscape Architecture', 'ماجستير في هندسة المساحة', NULL, NULL, 47, 22, 0, 0),
(34, 'Master by research in Telecommunication Engineering', 'ماجستير في هندسه الاتصالات', NULL, NULL, 48, 22, 0, 0),
(35, 'Master by research in Computer Engineering', 'ماجستير في هندسه الحاسوب', NULL, NULL, 49, 22, 0, 0),
(36, 'Master by research in Information Technology & Information System Design', 'ماجستير في تقنية المعلومات وتصميم انظمة المعلومات', NULL, NULL, 50, 22, 0, 0),
(37, 'Master by research in Architecture', 'ماجستير في الهندسة المعمارية', NULL, NULL, 51, 22, 0, 0),
(38, 'Master by research in Art and Interior Design', 'ماجستير في الفنون والتصميم الداخلي', NULL, NULL, 52, 22, 0, 0),
(39, 'Master by research in Nanotechnology', 'ماجستير في النانوتكنولوجي', NULL, NULL, 53, 22, 0, 0),
(40, 'Master in Computer Science', 'ماجستير في علوم الحاسوب', NULL, NULL, 54, 22, 0, 0),
(41, 'Master in Information System', ' ماجستير في نظم المعلومات', NULL, NULL, 55, 22, 0, 0),
(42, 'B.Sc in Renewable Energy', 'بكالوريوس الطاقة المتجددة', NULL, NULL, 56, 1, 0, 0),
(43, 'B.Sc of Business Administration', 'بكالوريوس ادارة الاعمال ', NULL, 'BA', 57, 23, 0, 0),
(44, 'Master of Science in Geoinformatics', 'ماجستير في نظم المعلومات الجغرافية', NULL, NULL, 58, 22, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `program_category`
--

CREATE TABLE `program_category` (
  `prog_cat_id` int(11) NOT NULL,
  `prog_category_name_en` varchar(255) NOT NULL,
  `prog_category_name_ar` varchar(255) NOT NULL,
  `category_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_category`
--

INSERT INTO `program_category` (`prog_cat_id`, `prog_category_name_en`, `prog_category_name_ar`, `category_code`) VALUES
(1, 'Bachelors degree honors', 'بكالوريوس شرف', 0),
(2, 'Bachelors', 'بكالوريوس', 0),
(3, 'Diploma', 'دبلوم', 0),
(4, 'Master', 'ماجستير', 0);

-- --------------------------------------------------------

--
-- Table structure for table `program_fees`
--

CREATE TABLE `program_fees` (
  `prog_fees_id` int(11) NOT NULL,
  `admission_year` varchar(255) NOT NULL,
  `program_code` varchar(255) DEFAULT NULL,
  `fee` varchar(11) DEFAULT NULL,
  `fee_type` varchar(255) NOT NULL,
  `fee_del` int(11) NOT NULL DEFAULT 0,
  `updated_at` varchar(200) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_fees`
--

INSERT INTO `program_fees` (`prog_fees_id`, `admission_year`, `program_code`, `fee`, `fee_type`, `fee_del`, `updated_at`, `created_at`) VALUES
(2, '2015', '3', '20000', 'Sudanese', 0, '2024-06-12 07:24:40', '2024-06-12 07:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `staff_cv`
--

CREATE TABLE `staff_cv` (
  `staff_cv_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `work_experience` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `contact` text DEFAULT NULL,
  `publication` text DEFAULT NULL,
  `teaching_and_supervision` text DEFAULT NULL,
  `academic_recognition_and_leadership` text DEFAULT NULL,
  `cv_image` varchar(255) DEFAULT NULL,
  `another_information` text DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `cv_dell` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_cv`
--

INSERT INTO `staff_cv` (`staff_cv_id`, `staff_id`, `title`, `about`, `work_experience`, `education`, `skills`, `contact`, `publication`, `teaching_and_supervision`, `academic_recognition_and_leadership`, `cv_image`, `another_information`, `updated_at`, `created_at`, `cv_dell`) VALUES
(1, 1, NULL, 'test of about', 'test of experinces', 'test of education', 'test of skills', 'test of contact', 'test of publication', 'test of teachign and supervision', 'test of academic and leadership', '', NULL, '2024-07-08 17:28:18', '2024-07-08 14:57:57', 0),
(4, 3, NULL, '**Highly-skilled and motivated Senior software Developer with 4 years of experience. Enhanced performance of 24 applications using PHP , Flutter ,Dart\r\nand Laravel Framework.**', 'Full Stack Software Engineer | Future University | Sudan,Khartoum | March 2020 - Present\r\n• Create scalable PHP / SQL web applications with an API and a custom authentication system from the ground up, and find new\r\nsolutions and ideas that help the university control student information, professors and staff information\r\nI.T officer | AL-Balad Bank | Sudan,Khartoum | September 2019 - October 2019\r\n•I was working as a trainee in the information technology department of the bank. I learned from her how the banking systems\r\nwork, how to deal with and manage customers, and also how to link the unified bank system with all the bank’s branches\r\nI.T officer | Raiba Trans Company | Sudan,Khartoum | October 2022 - February 2020\r\n• I worked as trainee in this company as a trainee in the IT department with the chief programmer and we were working on an\r\noperating system specialized in managing employees in the company, we were developing it in the C# language and I was\r\nresponsible for the validity tests.\r\nI.T officer | Bashir Motors Nissan Dealership | Sudan,Khartoum | October 2021 - January 2022\r\n• Information technology officer and responsible for the system and technical support for employees and management of the\r\nodoo system', 'BA Honors in Information Technology | Future University , Sudan | Sudan/Khartoum | 2018', 'Systems Administrator and Development\r\nProgramming Languages: Php, Sqli, JavaScript, Dart\r\nTools/Frameworks: Git, Laravel, oracle database, database administration, HTML/CSS, GitHub\r\nFront End : JavaScript , Html , Html5, Css\r\nSoftware: Php, Laravel, Javascript, Framework, Mvc, Mvc Webapi, Oop, Programming\r\nBack End : PHP , JavaScript , sql , sql', 'Khartoum, Sudan naderngeeb2@gmail.com (+249) 920138876 www.linkedin.com/in/nader-nageeb-156b6b209\r\nhttps://github.com/NaderNageeb', NULL, NULL, NULL, 'niceone.jpg', NULL, '2024-07-13 11:55:59', '2024-07-10 13:22:10', 0),
(5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-13 09:12:21', '2024-07-13 09:12:21', 0),
(6, 5, NULL, 'Received his Bachelor degree in Telecommunication engineering from Future University, Sudan 2011. He then received his Master of Engineering in Telecommunication from Multimedia University, Malaysia 2014. He also received his Ph.D. of Engineering in Telecommunication from Multimedia University, Malaysia 2020. He is registered with the Sudan Engineering Council (SEC) as a specialist engineer since January 2022 and with the Board of Engineers Malaysia (BEM) as a graduate engineer since April 2019. Currently he is an assistant professor in the faculty of telecommunication and space technology, the director of the innovation, research and development center (IRDC), the acting director of the center of technical services (CTS), the manager of the technology horizon journal (THJ), and the university president\'s advisor for technical affairs at the Future University, Sudan. His research interests include cellular communication, 5G, intelligent reflective surfaces (IRSs), internet of things (IoT), beamforming, and interference management in wireless networks.', '1.  **University president’s advisor for technical affairs**, Future university, Khartoum, Sudan, Oct 2022 - Present*\r\n2.  **Manager**, The technology horizon journal (THJ), Future university, Khartoum, Sudan, *Oct 2022 - Present*\r\n3.  **Acting Director**, The Center of technical affairs (CTS), Future university, Khartoum, Sudan, *Jul 2022 - Present*\r\n4.  **Director**, The innovation, research and development center (IRDC), Future university, Khartoum, Sudan, *Jun 2022 - Present*\r\n5.  **Acting Director**, The innovation, research and development center (IRDC),Future university, Khartoum, Sudan, *Oct 2021 - May 2022*\r\n6.  **Assistant Professor**, aculty of Telecommunication & Space Technology, Future university, Khartoum, Sudan, *Aug 2021 - Present*\r\n7.  **Gaduate Research Assistant (GRA)**, Faculty of Engineering, Multimedia University, Cyberjaya, Malaysia, *Feb 2015 - Feb 2019*', '1. Philosophy Doctorate of Engineering in Telecommunication, Multimedia University, Malaysia, *Feb 2015 - Nov 2020*\r\n**Thesis title: Improvement of Interference Reduction Techniques For Femto-cell\r\nNetworks**\r\n2. Master of Engineering in Telecommunication (CGPA: 3.25), Multimedia University, Malaysia, *Nov 2012 - Jul 2014*\r\n3. Bachelor in Telecommunication Engineering (CGPA: 2.30), Future University, Sudan, *Nov 2006 - Feb 2011*', '1. MATLAB: *Proficient.*\r\n2. LATEX: *Proficient.*\r\n3. Arduino programming: *Intermediate.*\r\n4. C programming: *Intermediate.*\r\n5. Dobot Studio: *Intermediate.*\r\n6. Python: *Beginner.*\r\n7. PHP: *Beginner.*\r\n8. HTML: *Beginner.*', 'khalidkaradh@fu.edu.sd', '**Peer-reviewed journals**\r\n1. Hassan, M. K., Ariffin, S. H. S., Syed-Yusof, S. K., Ghazali, N. E., Kanona, M. E., Mohamed, K. S., ... & Hamdan, M. (2023). DLVisor: Dynamic Learning\r\nHypervisor for Software Defined Network. IEEE Access. DOI:10.1109/ACCESS.2023.3302266.\r\n2. Kanona, M. E., Alias, M. Y., Hassan, M. K., Mohamed, K. S., Khairi, M. H., Hamdan, M., ... & Ahmed, A. M. (2022). A Machine Learning Based Vehicle\r\nClassification in Forward Scattering Radar. IEEE Access, 10, 64688-64700.DOI:10.1109/ACCESS.2022.3183127.\r\n3. Osman, O. M., Kanona, M. E., Hassan, M. K., Elkhair, A. A., & Mohamed, K. S. (2022). Hybrid multistage framework for data manipulation by combining\r\ncryptography and steganography. Bulletin of Electrical Engineering and Informatics, 11(1). DOI: 10.11591/eei.v11i1.3451.\r\n4. Mohamed, K. S., Alias, M. Y., Roslee, M., Raji, Y. M. (2021). Towards Green Communication in 5G Systems: Survey on Beamforming Concept. IET\r\ncommunications, 15(1), 142-154. DOI: 10.1049/cmu2.12066.\r\n5. Alquhali, A. H., Roslee, M., Abdelgadir, M. B., Kordi, K., & Mohamed, K. S. (2020). Enhanced fractional frequency reuse approach for interference mitigation in femtocell networks. Bulletin of Electrical Engineering and Informatics, 9(4), 1638-1645, DOI: 10.11591/eei.v9i4.2355\r\n6. Alquhali, A. H., Roslee, M., Alias, M. Y., & Mohamed, K. S. (2020). D2D communication for spectral efficiency improvement and interference reduction: A\r\nsurvey. Bulletin of Electrical Engineering and Informatics, 9(3), 1085-1094, DOI:10.11591/eei.v9i3.2171.\r\n7. Khalid S. Mohamed, Mohamad Y. Alias, Mardeni Roslee (2020). Interference Management Using Beamforming Techniques For Line-Of-Sight Femtocell\r\nNetworks, IEICE Transactions on Communications, Article ID 2019EBP3172, [Advance publication] Released January 24, 2020, Online ISSN 1745-1345, Print ISSN 0916-8516, DOI: 10.1587/transcom.2019EBP3172.\r\n8. A. Alhammadi, M. Roslee, M. Y. Alias, I. Shayea, S. Alraih & K. S. Mohamed (2020). Auto Tuning Self-Optimization Algorithm for Mobility Management in\r\nLTE-A and 5G HetNets, in IEEE Access, vol. 8, pp. 294-304, 2020. DOI:10.1109/ACCESS.2019.2961186.\r\n9. Mohamed, K. S., Alias, M. Y., & Roslee, M. (2019). Interference Avoidance Using TDMA-Beamforming in Location Aware Small Cell Systems. Applied Sciences, 9(23), 4979. DOI: 10.3390/app9234979.\r\n10. Alhammadi, A., Roslee, M., Alias, M. Y., Sheikhidris, K., Jack, Y. J., Bin Abas, A., & Randhava, K. S. (2019). An intelligent spectrum handoff scheme based on multiple attribute decision making for LTE-A network. International Journal of Electrical & Computer Engineering (2088-8708), 9. DOI:10.11591/ijece.v9i6.pp5330-5339 .\r\n11. Mohamed, K. S., Alias, M. Y., & Roslee, M. (2018). Review on Femto-cell Networks Interference Management Techniques. (IJET) International Journal of\r\nEngineering and Technology 10(4). DOI: 10.21817/ijet/2018/v10i4/181004078 .\r\n\r\n**Conference proceedings**\r\n1. Mohamed, K. S., Alias, M. Y., Kanona, M. E., Hassan, M. K., & Hussein, M. H. (2023, February). Received Power Analysis In Non-interfering Intelligent\r\nReflective Surface Environments. In International Congress on Information and Communication Technology (pp. 607-617). Singapore: Springer Nature\r\nSingapore. DOI: 10.1007/978-981-99-3243-6 49.\r\n2. Mahdi, M., Bakare, T. A., Ahmad, A., Buhari, A. M., & Mohamed, K. S. (2021). Scalable Smartification of Commercial Buildings HVAC Systems using The\r\nInternet of Things and Machine Learning (No. 5399). EasyChair, DOI:easychair.org/publications/preprint/356d.\r\n3. Mahdi, M. N., Mohamed, K. S., Ahmad, A. R., & Subhi, M. A. (2020, August). The Vision of 5G and Cell-Free Communication Networks in Malaysia. In 2020 8th International Conference on Information Technology and Multimedia (ICIMU) (pp. 156-161). IEEE. DOI: 10.1109/ICIMU49871.2020.9243435.\r\n4. Abdajbar, A., Mohamed, K. S., & Alias, M. Y. (2019). Link Budget Based Optimised Link State Routing Protocol in Flying Ad-hoc Networks. In\r\nTechnologies (CSUDET), 2019 IEEE Conference on Sustainable Utilization and Development in Engineering and. IEEE. DOI:10.1109/CSUDET47057.2019.9214608.\r\n5. Alquhali, A. H., Roslee, M., Alias, M. Y., Mohamed, K. S., & Kordi, K. (2019). IOT Based Real-Time Vehicle Tracking System. In Technologies (CSUDET), 2019 IEEE Conference on Sustainable Utilization and Development in Engineering and. IEEE. DOI:10.1109/CSUDET47057.2019.9214633.\r\n6. Sheikhidris, K. S., Alias, M. Y., & Roslee, M. (2019). Power Spectral Density and Spectral Efficiency Analysis in Line-of-Sight 2.6 GHz Beamforming\r\nFemtocell Networks. In 2019 IEEE 14th Malaysia International Conference on Communication (MICC) (pp. 130-135). IEEE. DOI:10.1109/MICC48337.2019.9037610.\r\n7. Mohamed, K. S., Alias, M. Y., & Roslee, M. (2019). Distributed Indoor Femtocell System For Interference Mitigation And Path-loss Compensation. In 2019 25th Asia-Pacific Conference on Communications (APCC) (pp. 403-408). IEEE. DOI:10.1109/APCC47188.2019.9026541.\r\n8. Mohamed, K. S., Alias, M. Y., Roslee, M., & Alam, J. M. (2018). Throughput Maximization Based On User Association In Heterogeneous Networks. In\r\nTechnology (ICOICT), 2018 6th International Conference on Information and Communication (pp. 34-37). IEEE. DOI: 10.1109/ICoICT.2018.8528793.\r\n9. Sheikhidris, K., Alias, M. Y., & Roslee, M. (2017). Adaptive power management with fractional frequency reuse scheme for co-tier Femto-cell interference reduction. In Communications (MICC), 2017 IEEE 13th Malaysia International Conference on (pp. 311-315). IEEE. DOI: 10.1109/MICC.2017.8311778.\r\n10. Mohamed, K. S., Alias, M. Y., & Roslee, M. B. (2017). Investigation and Improvement of Maximum Likelihood Channel Estimator in OFDM Systems. In Platform Technology and Service (PlatCon), 2017 International Conference on (pp. 1-4). IEEE. DOI: 10.1109/PlatCon.2017.7883714.\r\n11. Mohamed, K. S., & Alias, M. Y. (2015). An Efficient Femto-cell Channel Assignment Scheme. In lEICE Information and Communication Technology Forum. DOI: 10.34385/proc.22.SESSION7-5.', NULL, NULL, 'IMG_7417.jpg', NULL, '2024-07-13 15:36:12', '2024-07-13 15:30:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_information`
--

CREATE TABLE `staff_information` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `staff_dep_id` int(11) NOT NULL,
  `staff_email` varchar(255) DEFAULT NULL,
  `staff_position` varchar(255) DEFAULT NULL,
  `staff_phone` varchar(255) DEFAULT NULL,
  `staff_del` int(11) NOT NULL DEFAULT 0,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_information`
--

INSERT INTO `staff_information` (`staff_id`, `staff_name`, `staff_dep_id`, `staff_email`, `staff_position`, `staff_phone`, `staff_del`, `updated_at`, `created_at`) VALUES
(1, 'Salah Hassan Malik', 3, 'salah@gmail.com', 'Dean Faculty Of Information Technology', '0925647', 0, '2024-07-07 19:12:22', '2024-07-07 19:12:22'),
(3, 'Nader Nageeb Abdrhman', 11, 'naderngeeb2@gmail.com', 'Senior Software Developer', '0904474400', 0, '2024-07-09 13:23:03', '2024-07-09 13:23:03'),
(4, 'Eng.Gazi Abdallah', 11, 'gazi@gmail.com', 'Junior Developer', '0963296783', 0, '2024-07-13 09:10:31', '2024-07-13 09:10:31'),
(5, 'Se. Dr. Khalid Sheikhidris Mohamed', 12, 'khalidkaradh@fu.edu.sd', 'Director', '+249100944949', 0, '2024-07-13 15:00:36', '2024-07-13 15:00:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_phone` varchar(12) NOT NULL,
  `user_email` varchar(191) NOT NULL,
  `user_faculty` int(11) NOT NULL DEFAULT 0,
  `isAdmin` int(11) NOT NULL DEFAULT 1,
  `user_by` int(11) NOT NULL DEFAULT 0,
  `user_add_date` timestamp NULL DEFAULT NULL,
  `user_update_date` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `del` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_fullname`, `user_phone`, `user_email`, `user_faculty`, `isAdmin`, `user_by`, `user_add_date`, `user_update_date`, `updated_at`, `created_at`, `del`) VALUES
(1, 'admin', '$2y$10$yW4fBBgegLe10uVhBI5IT.10H8DuTgbxhmi3YDjcqOVaLKUECrqoW', 'Mohammed MaverickX', '0916554412', 'mohammed.beng@gmail.com', 0, 1, 1, NULL, NULL, '2024-01-05 13:38:09', '2023-11-28 10:17:57', 0),
(2, 'user', '$2y$10$yW4fBBgegLe10uVhBI5IT.10H8DuTgbxhmi3YDjcqOVaLKUECrqoW', 'Mohammed Prince', '0916554400', 'moh.beng@gmail.com', 0, 0, 0, NULL, NULL, '2023-11-28 10:17:57', '2023-11-28 10:17:57', 0),
(3, 'nader', '$2y$10$dozIQu3I857ZyYgcSc0QOuJglZAocChg5HD2SZi90evhSLX/6Sbmu', 'Nader Nageeb Abdlrhman', '0920138876', 'nedo2299@gmail.com', 10, 2, 1, NULL, NULL, '2024-06-05 07:44:50', '2024-06-05 07:44:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `vac_id` int(11) NOT NULL,
  `vac_title` varchar(200) NOT NULL,
  `vac_department` varchar(255) NOT NULL,
  `vac_description` text NOT NULL,
  `vac_requirements` text NOT NULL,
  `vac_open_date` varchar(255) NOT NULL,
  `vac_close_date` varchar(255) NOT NULL,
  `vac_status` int(11) NOT NULL DEFAULT 0,
  `vac_salary` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deprt_id`);

--
-- Indexes for table `department_type`
--
ALTER TABLE `department_type`
  ADD PRIMARY KEY (`dep_type_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fu_events`
--
ALTER TABLE `fu_events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fu_events_event_title_unique` (`event_title`);

--
-- Indexes for table `fu_news`
--
ALTER TABLE `fu_news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fu_news_news_title_unique` (`news_title`);

--
-- Indexes for table `linkages`
--
ALTER TABLE `linkages`
  ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`prog_id`);

--
-- Indexes for table `program_category`
--
ALTER TABLE `program_category`
  ADD PRIMARY KEY (`prog_cat_id`);

--
-- Indexes for table `program_fees`
--
ALTER TABLE `program_fees`
  ADD PRIMARY KEY (`prog_fees_id`);

--
-- Indexes for table `staff_cv`
--
ALTER TABLE `staff_cv`
  ADD PRIMARY KEY (`staff_cv_id`);

--
-- Indexes for table `staff_information`
--
ALTER TABLE `staff_information`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_user_phone_unique` (`user_phone`),
  ADD UNIQUE KEY `users_user_email_unique` (`user_email`);

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`vac_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `deprt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `department_type`
--
ALTER TABLE `department_type`
  MODIFY `dep_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fu_events`
--
ALTER TABLE `fu_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fu_news`
--
ALTER TABLE `fu_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `linkages`
--
ALTER TABLE `linkages`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `prog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `program_category`
--
ALTER TABLE `program_category`
  MODIFY `prog_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `program_fees`
--
ALTER TABLE `program_fees`
  MODIFY `prog_fees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff_cv`
--
ALTER TABLE `staff_cv`
  MODIFY `staff_cv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff_information`
--
ALTER TABLE `staff_information`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `vac_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
