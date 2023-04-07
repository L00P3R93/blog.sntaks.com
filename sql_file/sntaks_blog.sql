-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 11:57 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sntaks_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `uid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Name of the Category',
  `descr` varchar(100) DEFAULT NULL COMMENT 'Description of the Category',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`uid`, `name`, `descr`, `date_added`) VALUES
(1, 'Web Development', 'covering all aspects of web development such as front-end, back-end, full-stack, frameworks, librari', '2023-04-07 22:06:17'),
(2, 'SEO', 'covering topics related to search engine optimization, such as keyword research, on-page optimizatio', '2023-04-07 22:06:17'),
(3, 'Digital Marketing', 'covering various digital marketing channels such as email marketing, social media marketing, PPC adv', '2023-04-07 22:06:17'),
(4, 'Website Design', 'covering topics related to website design such as UI/UX design, responsive design, typography, color', '2023-04-07 22:06:17'),
(5, 'E-commerce', 'covering topics related to e-commerce websites such as payment gateways, shopping carts, product cat', '2023-04-07 22:06:17'),
(6, 'Mobile Optimization', 'covering topics related to mobile optimization such as responsive design, mobile apps, mobile SEO, a', '2023-04-07 22:06:17'),
(7, 'Analytics', 'covering topics related to web analytics such as Google Analytics, data visualization, A/B testing, ', '2023-04-07 22:06:17'),
(8, 'Security', 'covering topics related to website security such as SSL, secure coding practices, hacking prevention', '2023-04-07 22:06:17'),
(9, 'Performance', 'covering topics related to website performance optimization such as website speed, caching, compress', '2023-04-07 22:06:17'),
(10, 'Content Marketing', 'covering topics related to content marketing such as content creation, promotion, distribution, and ', '2023-04-07 22:06:17'),
(11, 'Social Media Marketing', 'covering topics related to social media marketing such as social media platforms, social media adver', '2023-04-07 22:06:17'),
(12, 'Branding', 'covering topics related to branding such as brand identity, brand strategy, brand messaging, and mor', '2023-04-07 22:06:17'),
(13, 'User Experience', 'covering topics related to user experience such as user research, usability testing, user journey ma', '2023-04-07 22:06:17'),
(14, 'Web Technologies', 'covering various web technologies such as HTML, CSS, JavaScript, PHP, MySQL, and more.', '2023-04-07 22:06:17'),
(15, 'Accessibility', 'covering topics related to web accessibility such as ADA compliance, WCAG guidelines, assistive tech', '2023-04-07 22:06:17'),
(16, 'Standards', 'covering topics related to web standards such as W3C, HTML5, CSS3, and more.', '2023-04-07 22:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `uid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `author` varchar(50) DEFAULT NULL,
  `published_date` datetime DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `tags` mediumtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date_added` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`uid`, `title`, `content`, `author`, `published_date`, `added_by`, `category_id`, `tags`, `status`, `date_added`, `date_modified`) VALUES
(1, 'Eligendi ea id inventore nobis.', 'Iste accusantium voluptas cumque. Nihil dolore explicabo culpa vel. Saepe mollitia porro quia cupiditate et deleniti voluptatum. Ex incidunt labore voluptatibus excepturi.\n\nEaque pariatur expedita suscipit dolores voluptas est. Minima sequi sunt porro sed et. Qui velit et praesentium ipsum ut quos.\n\nEt ipsum ut et incidunt. Soluta saepe dignissimos consectetur ut sit iusto. Explicabo natus rerum itaque pariatur sint architecto sunt error. Accusantium et qui impedit reiciendis error. Et ullam est iusto quasi blanditiis voluptates.\n\nQuo et sit possimus nemo aperiam qui. Eveniet ut officia quam sint. Sunt doloribus est nemo sint. Deleniti animi sequi nobis labore quaerat. Eveniet cumque quae et voluptatem quam nihil corrupti.\n\nQuia consectetur fugit sint nulla. Nihil quae consectetur ullam omnis dolores. Nisi vel necessitatibus qui tempora eaque. Ratione et dolor ipsam id perspiciatis.', 'Daisy Mann', '2022-09-09 22:59:19', 1, 15, '8,20,14', 1, '2023-04-07 22:44:35', NULL),
(2, 'Dolore et saepe quos dolores est itaque a delectus.', 'Molestias dicta culpa est fugit ea vel officia odit. Sed numquam ullam unde qui ullam. Qui voluptate illo molestias enim quibusdam modi neque ex.\n\nOmnis sed sint omnis et nihil doloribus et. Maiores aspernatur adipisci laboriosam id eveniet porro aut illum. Impedit voluptatem nesciunt vero consequatur velit.\n\nVoluptatem aperiam rerum molestias debitis reiciendis accusantium cumque. Consequatur architecto rerum dolores repellat quaerat aut. Nobis illo vero natus facere.\n\nTemporibus officiis itaque quos alias veritatis ratione omnis. Autem eum ea optio mollitia ab nemo sint. Eveniet quia enim aut officia nemo illum. At fuga esse qui quia consectetur sint.\n\nImpedit voluptates sapiente autem quia aut. Sint et eos alias deserunt iste vel.', 'Mr. Forrest Stracke', '2023-01-29 01:22:45', 1, 7, '8,20,14', 1, '2023-04-07 22:44:35', NULL),
(3, 'Quasi expedita odio quia.', 'Velit harum qui non ad sapiente. Et quia quia error ut quis voluptas possimus non. Consequatur deleniti labore eveniet optio optio. Magnam ratione maxime dolores quia libero rerum.\n\nAnimi placeat sit perferendis. Et labore veniam culpa. Voluptate ut sit sequi quia et.\n\nSapiente commodi laboriosam id ratione ducimus quia veniam consectetur. Ducimus odit harum quisquam dolores nam. Debitis voluptate esse explicabo repellendus quia distinctio qui.\n\nSimilique quidem nobis provident. Rerum inventore vitae dignissimos aspernatur ducimus dignissimos totam. Eum necessitatibus iusto cum eos blanditiis quo. Sint necessitatibus facere earum.\n\nIpsum dolor molestiae eos qui accusamus ratione autem. Repellat consequatur quod laudantium rem possimus et. Numquam quisquam ullam quis. Sapiente aut molestias possimus distinctio.', 'Scarlett Orn', '2022-09-18 11:20:01', 1, 8, '3,6,19', 6, '2023-04-07 22:50:29', NULL),
(4, 'Temporibus voluptate cumque qui eveniet commodi deserunt quia.', 'Qui sed cumque voluptatem aut inventore fugiat unde. Eaque tenetur delectus quaerat voluptatem. Voluptatibus architecto est vitae consequuntur. Aliquid quis veniam in nostrum fuga.\n\nAssumenda reprehenderit quia nam asperiores dolor voluptas. Molestias repellat sequi autem est. Pariatur voluptas optio ratione asperiores autem voluptas qui.\n\nEnim officiis velit et corporis. Repellendus eligendi illo explicabo tenetur. Occaecati sequi fugiat odit aut qui voluptatem.\n\nDelectus praesentium illo at praesentium. Ipsa laudantium fugiat sed est. Quas illo in ut quis laboriosam omnis. Ducimus aliquid omnis suscipit sed animi nihil.\n\nMaxime molestiae ut aut ut. Ipsam aliquam autem corporis a nihil. Accusamus eum nihil aliquid ipsa non optio. Repellendus autem ducimus numquam optio in.', 'Prof. Hipolito Cruickshank', '2021-05-04 10:42:48', 1, 14, '5,7,19,10,1', 6, '2023-04-07 22:50:29', NULL),
(5, 'Mollitia ullam commodi totam eligendi velit amet.', 'Nam eos maxime ut porro voluptas eum cumque. Et commodi accusamus blanditiis laudantium eos. Sed laboriosam perspiciatis accusamus iste et asperiores. Animi doloribus perspiciatis et nobis.\n\nA dicta perferendis earum ratione natus debitis. Et debitis aspernatur quia at quia culpa. Est et adipisci in inventore. Molestiae quod sed nemo culpa non.\n\nPraesentium nihil quas consequatur ipsam quidem minima. Et qui vel dolores in maiores odio. Magnam magnam placeat reprehenderit ex exercitationem sapiente. Nihil quae quas praesentium id adipisci.\n\nVoluptatum cupiditate quia dolorem perferendis quia in. Dolor blanditiis animi repellat corrupti est accusantium. Quidem non expedita est dignissimos dolorem libero aut et. Sed est et ipsam non quia suscipit facilis.\n\nExcepturi sint illo officia quidem commodi ut. Quaerat provident aut at qui blanditiis et dolorem. Cum veritatis sed quia vel a dolore. Dolorum at facere maxime.', 'Duncan Cormier', '2023-04-04 14:40:23', 1, 5, '16,18', 4, '2023-04-07 22:50:29', NULL),
(6, 'In facere et aspernatur fuga quia.', 'Ipsum odit voluptatum nisi fuga hic sapiente. Soluta qui optio temporibus ut vel ea exercitationem. Quis minus repellat possimus qui vel quas eum. Autem nam numquam eaque dolorem inventore magni pariatur qui.\n\nDolores voluptatem error cupiditate eius. Modi repudiandae qui rerum ut. Et possimus consectetur provident sequi iure. Cum illo quisquam ea quae sapiente voluptas.\n\nExpedita dolorum reiciendis ut sit aut repudiandae. Eligendi et quis qui fugit excepturi laudantium similique. Tempore voluptas fugit error nihil. Quidem rem et voluptate sequi modi.\n\nLaboriosam velit perspiciatis eius quibusdam sit. Unde accusamus quae quod. Temporibus nihil quas nihil totam repudiandae aliquid. Impedit recusandae architecto totam illum autem. Nisi ipsum veniam voluptatum ullam quis voluptatibus.\n\nUt illum vel modi iusto quia dolorum sit. Rem fuga ipsam voluptatum et voluptates aut. Assumenda placeat vero omnis autem reprehenderit quia ea repellendus.', 'Neha Cormier', '2021-09-22 23:10:11', 2, 5, '12,5,19', 3, '2023-04-07 22:50:29', NULL),
(7, 'Dignissimos et ducimus qui vero rerum dolorum sed.', 'Dolores eos sit ut voluptates. Quod voluptas voluptas nam eos fuga. Ut ratione consequatur dolore est vitae et ea. Corporis alias non animi consequatur est est iusto. Aperiam et porro iure alias.\n\nDolores perspiciatis iure ut natus. Assumenda commodi quibusdam recusandae est ut ducimus. Provident voluptas nisi nisi ea sed mollitia. Laborum optio ad exercitationem dolorem non consequuntur et.\n\nEarum vel temporibus omnis aut. Et dignissimos omnis voluptas mollitia vel. Dignissimos mollitia quos cum magni.\n\nVoluptas alias quis esse ea quis. Et nemo fuga mollitia autem eveniet mollitia quo.', 'Sally Zboncak', '2023-03-19 14:06:20', 1, 10, '4', 5, '2023-04-07 22:51:35', NULL),
(8, 'Voluptatem alias voluptatem optio ad magni.', 'Animi impedit totam minima sed molestiae. Recusandae vel nulla natus corporis. Iure dolore culpa perspiciatis. Illum doloremque consequatur hic optio placeat cupiditate.\n\nUt cupiditate corrupti sed at. Laborum eligendi corporis illo molestiae vitae illo. Facilis est sunt in voluptate maiores expedita molestias. Nihil nisi iusto quia ea aut libero. Dicta et sapiente consequatur dicta maiores accusantium.\n\nQui sit accusantium dolor. Quae est eius sequi minima.\n\nEst aut saepe aut non. Cumque saepe aliquid eos magni sint. Officia consequatur voluptatem ex accusantium doloribus quam.', 'Anna Bosco', '2023-02-28 10:40:48', 2, 7, '2', 3, '2023-04-07 22:51:35', NULL),
(9, 'Et esse ipsam eos id.', 'Quia minus accusantium totam dignissimos tempore qui magni. Placeat corporis exercitationem facilis illum laudantium fugit nulla voluptas. Quis et omnis in quisquam.\n\nQuaerat quo quae iste optio qui molestiae saepe. Quae quos numquam velit doloremque sequi tempora. Rerum quo dolores maiores molestiae harum quo. Eligendi magnam qui est voluptas.\n\nIpsum facere vel voluptas repellendus. Dolorem dolor molestiae unde perspiciatis porro. Ullam vero dolorem enim dolorem nihil beatae. Reprehenderit itaque voluptas et reiciendis.\n\nQui accusantium maiores id autem voluptatem commodi. Maiores esse perspiciatis accusamus ut. Consectetur quo enim hic harum ut ut eum.', 'Octavia Harber', '2022-12-15 11:09:39', 2, 13, '19,18,19,10', 1, '2023-04-07 22:51:35', NULL),
(10, 'Quasi voluptatem temporibus et sint vitae maiores.', 'Omnis libero cupiditate autem dicta laboriosam sunt veritatis. Voluptatum vero velit delectus nobis velit. Qui rerum velit necessitatibus et dolore doloremque.\n\nError corporis tenetur mollitia aut ab reiciendis consequuntur. Doloremque nulla ut veniam sit temporibus. Sed illum non tempore numquam eligendi.\n\nConsequatur eaque at aut consequatur pariatur iusto tempore enim. Numquam numquam nisi quasi vitae quia quibusdam non. Enim illo et nemo dolorem.\n\nLaboriosam numquam beatae ullam non sint ea sint. Fugit aliquid nihil distinctio similique sapiente quidem eos inventore. Voluptas deserunt sapiente aperiam sed est.', 'Billy Thompson', '2021-05-17 08:51:11', 1, 15, '11,1,4', 1, '2023-04-07 22:51:35', NULL),
(11, 'Et sit earum quae doloremque quia porro molestiae hic.', 'Et ducimus repudiandae ea aliquam assumenda. At omnis autem adipisci autem. Porro explicabo vel quibusdam veniam quia repellendus sint. Aut ea laudantium ut omnis iure corporis maiores.\n\nMollitia aut accusantium qui consequatur error suscipit. Nam numquam impedit ut. Ut quia quia mollitia fugit ea saepe et eum.\n\nMaiores non voluptatum odit et. Natus rerum sit atque pariatur. Esse voluptas nisi aut quo quod est.\n\nAut cum nostrum reprehenderit maiores vel in maxime sed. Amet quidem delectus quo voluptatem. Eum ipsa eos aliquam natus quidem voluptates nobis.', 'Dr. Ellen Wyman MD', '2021-07-03 21:19:00', 1, 5, '16,2', 5, '2023-04-07 22:51:35', NULL),
(12, 'Sunt temporibus animi necessitatibus nihil quisquam ea.', 'Tenetur hic architecto itaque mollitia consequatur et. Ad quia quibusdam ab minima doloremque quod impedit qui. Sit nobis quasi a.\n\nLaudantium ut ex sed ratione dolorum. Ducimus magni illo atque deserunt. Cum eos omnis sint ullam et ut dolorem. Repudiandae nostrum ipsum quia omnis reprehenderit qui modi.\n\nOdio dolorum non at omnis rerum odio aut. Voluptas molestiae quod id. Earum dolor dolore quibusdam atque recusandae perferendis sit. Non incidunt quia doloribus culpa laborum corrupti.\n\nIllum sapiente voluptatem iusto ad. Tempora molestiae maxime dolore deserunt.', 'Prof. Bobby Haley Sr.', '2021-04-14 06:27:44', 2, 5, '9', 2, '2023-04-07 22:51:35', NULL),
(13, 'Rerum numquam veniam reiciendis qui.', 'Est blanditiis ea enim reprehenderit neque aut est. Aspernatur est odio beatae asperiores harum aut.\n\nRepudiandae molestiae est aliquam dolores earum quidem sunt. Et rerum eius aperiam voluptas facilis. Architecto aspernatur dolorem optio non aut tempore est.\n\nLaudantium placeat consequatur quod quis et in. Aspernatur veniam aut sit quos. Autem qui laudantium sunt non voluptatem odit aspernatur. Cumque est dolorum nam cupiditate aut facere.\n\nRepellat ut ut harum perspiciatis quia aliquid est aliquid. Voluptatem quia qui repudiandae quibusdam perferendis. Tempore sint debitis expedita tenetur similique earum. Provident sit omnis impedit corporis et. Sint et incidunt nemo velit assumenda est iste.', 'Elvis Ebert', '2021-05-08 04:14:49', 2, 10, '3', 1, '2023-04-07 23:00:23', NULL),
(14, 'Est sint natus dolorum omnis magnam quas.', 'Adipisci nemo dolor nam temporibus. Assumenda beatae rem rerum rerum itaque. Sequi reiciendis qui quis minus.\n\nSequi ut iusto sit. Aperiam delectus maxime sint id qui qui. Quo sunt eveniet aut provident qui aliquam iusto. Architecto veniam ducimus rerum itaque vitae. Reprehenderit enim in accusantium repudiandae quidem eius omnis.\n\nConsequuntur amet tenetur aut veniam corrupti. Et dolorem aliquid ut doloribus ut facere velit rerum. Sed praesentium sunt impedit reprehenderit.\n\nPorro non ea consequatur laudantium. Est sed aut nesciunt aut necessitatibus. Perspiciatis culpa hic tempora quia praesentium. Blanditiis quo doloribus aut quia ut asperiores. Sit vel quos ut animi et.', 'Dr. Patrick Becker V', '2022-04-03 11:01:29', 1, 9, '17,2,4', 5, '2023-04-07 23:00:23', NULL),
(15, 'Incidunt possimus et aut nihil in earum soluta corrupti.', 'Voluptatem excepturi soluta sed. Et eum quos maxime quod quia. Voluptas amet accusamus est dolorum. Perferendis ut iure ut in odit magnam ea.\n\nQui quae aut rerum sunt et. Omnis aut totam vero sapiente dolorem est at. Laboriosam eos at iusto.\n\nNulla fugiat odio nemo ipsam rem fugit adipisci totam. Voluptates sunt vel quis provident architecto. Dolores libero itaque cupiditate delectus itaque pariatur labore. Et aperiam harum repellat possimus rerum consequatur et. Sunt alias vero voluptas.\n\nDolore repudiandae ut deleniti aut quis rerum aperiam. Aliquam est sunt ad pariatur impedit est. Labore asperiores aperiam cumque ut. Deserunt sit cum excepturi.', 'Victor Will', '2022-11-23 00:12:46', 1, 11, '8', 1, '2023-04-07 23:00:23', NULL),
(16, 'Aliquam consequatur aut fugiat consectetur.', 'Nihil labore excepturi ducimus mollitia sint qui est. Quaerat atque saepe et sit quis. Hic esse ut labore quaerat. Corporis tempora natus atque illo repellat dolorem aut debitis.\n\nConsequuntur quo libero in dolor unde quis cupiditate. Expedita perferendis voluptates eius veniam placeat omnis. Ea saepe atque deserunt error sequi non dolorem minima.\n\nOdit id architecto voluptas exercitationem. Voluptatem voluptas ut consequatur nulla quos minus harum omnis. Ab velit quia laudantium dolorum. Omnis nemo ut hic consequuntur suscipit voluptatem atque.\n\nSoluta vero alias ex molestiae animi. Omnis et occaecati officiis quam. Ullam id ex corrupti. Temporibus expedita ipsum atque officia non.', 'Santino Bernier', '2021-05-21 15:45:08', 2, 16, '2', 5, '2023-04-07 23:00:23', NULL),
(17, 'Neque accusamus ut eum iure minus explicabo.', 'Esse omnis quos saepe nihil qui quo. Dolor eius est quo sunt. Sit temporibus in voluptate assumenda accusamus sit. Reprehenderit similique repudiandae perferendis quia non quaerat.\n\nFacere sed a odio. Eum fugiat et tempora nostrum est nostrum veniam. Iste corporis sed nihil consectetur. Molestias dolores et sit adipisci facere ratione vero. Mollitia nam molestiae saepe perspiciatis laudantium molestiae consectetur veniam.\n\nEa consequatur impedit omnis hic maxime adipisci quia. Aut tenetur voluptatibus magnam accusamus dignissimos natus. Est aut officiis praesentium consequatur nihil distinctio atque.\n\nBlanditiis sed et dolorem ut neque. Error dolores necessitatibus voluptatem nulla numquam quis iure aut. Necessitatibus et totam sunt cum nesciunt. Odio maiores saepe qui quia autem libero.', 'Mervin Upton', '2021-11-05 09:23:55', 2, 10, '8,12', 5, '2023-04-07 23:00:23', NULL),
(18, 'Non dolor qui soluta.', 'Odit neque dolores alias quia. Et eveniet et labore inventore sed hic eum. Voluptatem et et non qui.\n\nNobis ut libero rerum sed ullam. Voluptas dolor repellat cum nihil aut et qui. Est temporibus id quas velit libero ut.\n\nNumquam nihil deserunt rerum id reprehenderit. Cum expedita ratione autem modi nobis assumenda voluptatem. Quam maiores omnis nesciunt atque harum. Deserunt qui nesciunt ducimus est voluptatibus ea.\n\nCorporis eligendi similique excepturi unde. Et non debitis vitae sed illo. Praesentium impedit magnam sit quia et.', 'German Marvin', '2022-01-20 19:32:36', 2, 4, '1,14,14', 6, '2023-04-07 23:00:24', NULL),
(19, 'Laboriosam esse et voluptas atque ut.', 'Quidem vel sit dicta numquam asperiores vero occaecati. Odio numquam quam tempora vitae dolores vel et. Sit optio occaecati voluptas aut. Autem nihil aut tenetur voluptates doloremque harum quae. Odit autem ex itaque qui in.\n\nUt nobis non maxime sint iste numquam aut sed. Quia veniam blanditiis aut ducimus sunt consequatur aut laudantium. Et quasi aliquam asperiores. Modi quibusdam minima eligendi non tempora corporis at.\n\nTotam doloremque illum ut nam aliquid at repellat. Architecto eius magni non et. In sint et autem est.\n\nEt atque neque officia natus debitis. Nisi ut doloribus ex ratione nisi deserunt. Modi quaerat rerum tenetur non nemo voluptas aspernatur.', 'Amina Streich Jr.', '2022-08-05 16:02:50', 1, 14, '1,18', 2, '2023-04-07 23:00:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_status`
--

CREATE TABLE `post_status` (
  `uid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `descr` varchar(100) DEFAULT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_status`
--

INSERT INTO `post_status` (`uid`, `name`, `descr`, `date_added`) VALUES
(1, 'Published', 'the post is live on the website and can be viewed by visitors.', '2023-04-07 17:44:38'),
(2, 'Pending Review', 'the post has been submitted for review and is awaiting approval by an editor or administrator.', '2023-04-07 17:44:38'),
(3, 'Draft', 'the post is not yet ready for publication and is still being worked on by the author or editor.', '2023-04-07 17:44:38'),
(4, 'Scheduled', 'the post has been scheduled to be published at a specific date and time in the future.', '2023-04-07 17:44:38'),
(5, 'Private', 'the post is only visible to logged-in users with specific permissions.', '2023-04-07 17:44:38'),
(6, 'Archived', 'the post is no longer visible on the website but can still be accessed by authorized users.', '2023-04-07 17:44:38'),
(7, 'Deleted', 'the post has been deleted but can be restored or permanently deleted by an admin', '2023-04-07 17:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `uid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`uid`, `name`, `status`, `date_added`) VALUES
(1, 'Super Admin', 1, '2023-04-07 17:32:36'),
(2, 'Admin', 1, '2023-04-07 17:32:36'),
(3, 'Editor', 1, '2023-04-07 17:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `uid` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL DEFAULT 'Blog - Sntaks',
  `site_descr` mediumtext NOT NULL,
  `logo_url` varchar(100) NOT NULL,
  `timezone` varchar(50) NOT NULL DEFAULT 'Africa/Nairobi',
  `date_format` varchar(20) NOT NULL DEFAULT 'dd M Y',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`uid`, `site_title`, `site_descr`, `logo_url`, `timezone`, `date_format`, `date_added`) VALUES
(1, 'Blog - Sntaks', 'Our mission is to help businesses of all sizes achieve their online goals through reliable and cost-effective web development solutions.', 'https://blog.sntaks.com/images/blog.sntaks-logo.png', 'Africa/Nairobi', 'dd M Y', '2023-04-07 17:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `uid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`uid`, `name`, `date_added`) VALUES
(1, 'WebDev', '2023-04-07 22:04:02'),
(2, 'SEOtips', '2023-04-07 22:04:02'),
(3, 'DigitalMarketing', '2023-04-07 22:04:02'),
(4, 'OnlinePresence', '2023-04-07 22:04:02'),
(5, 'Design', '2023-04-07 22:04:02'),
(6, 'ContentMarketing', '2023-04-07 22:04:02'),
(7, 'SocialMedia', '2023-04-07 22:04:02'),
(8, 'Ecommerce', '2023-04-07 22:04:02'),
(9, 'MobileOptimization', '2023-04-07 22:04:02'),
(10, 'UX', '2023-04-07 22:04:02'),
(11, 'Algorithms', '2023-04-07 22:04:02'),
(12, 'Analytics', '2023-04-07 22:04:02'),
(13, 'Conversion', '2023-04-07 22:04:02'),
(14, 'Security', '2023-04-07 22:04:02'),
(15, 'Performance', '2023-04-07 22:04:02'),
(16, 'Advertising', '2023-04-07 22:04:02'),
(17, 'Branding', '2023-04-07 22:04:02'),
(18, 'Technologies', '2023-04-07 22:04:02'),
(19, 'Accessibility', '2023-04-07 22:04:02'),
(20, 'Standards', '2023-04-07 22:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `email`, `password`, `role`, `status`, `date_added`) VALUES
(1, 'sntaks', 'info@sntaks.com', 'Asdf@123', 1, 1, '2023-04-07 19:09:16'),
(2, 'wizard', 'vincentkioko51@gmail.com', 'Asdf@123', 3, 1, '2023-04-07 19:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `uid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`uid`, `name`, `date_added`) VALUES
(1, 'Active', '2023-04-07 17:40:53'),
(2, 'Blocked', '2023-04-07 17:40:53'),
(3, 'Deleted', '2023-04-07 17:41:16'),
(4, 'Suspended', '2023-04-07 17:41:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `status` (`status`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`added_by`);

--
-- Indexes for table `post_status`
--
ALTER TABLE `post_status`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role` (`role`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `post_status`
--
ALTER TABLE `post_status`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
