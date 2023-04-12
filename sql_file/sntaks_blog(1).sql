-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 05:13 AM
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
  `status` int(11) NOT NULL DEFAULT 1,
  `date_added` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`uid`, `title`, `content`, `author`, `published_date`, `added_by`, `category_id`, `status`, `date_added`, `date_modified`) VALUES
(1, 'Eligendi ea id inventore nobis.', 'Iste accusantium voluptas cumque. Nihil dolore explicabo culpa vel. Saepe mollitia porro quia cupiditate et deleniti voluptatum. Ex incidunt labore voluptatibus excepturi.\n\nEaque pariatur expedita suscipit dolores voluptas est. Minima sequi sunt porro sed et. Qui velit et praesentium ipsum ut quos.\n\nEt ipsum ut et incidunt. Soluta saepe dignissimos consectetur ut sit iusto. Explicabo natus rerum itaque pariatur sint architecto sunt error. Accusantium et qui impedit reiciendis error. Et ullam est iusto quasi blanditiis voluptates.\n\nQuo et sit possimus nemo aperiam qui. Eveniet ut officia quam sint. Sunt doloribus est nemo sint. Deleniti animi sequi nobis labore quaerat. Eveniet cumque quae et voluptatem quam nihil corrupti.\n\nQuia consectetur fugit sint nulla. Nihil quae consectetur ullam omnis dolores. Nisi vel necessitatibus qui tempora eaque. Ratione et dolor ipsam id perspiciatis.', 'Daisy Mann', '2022-09-09 22:59:19', 1, 15, 1, '2023-04-07 22:44:35', NULL),
(2, 'Dolore et saepe quos dolores est itaque a delectus.', 'Molestias dicta culpa est fugit ea vel officia odit. Sed numquam ullam unde qui ullam. Qui voluptate illo molestias enim quibusdam modi neque ex.\n\nOmnis sed sint omnis et nihil doloribus et. Maiores aspernatur adipisci laboriosam id eveniet porro aut illum. Impedit voluptatem nesciunt vero consequatur velit.\n\nVoluptatem aperiam rerum molestias debitis reiciendis accusantium cumque. Consequatur architecto rerum dolores repellat quaerat aut. Nobis illo vero natus facere.\n\nTemporibus officiis itaque quos alias veritatis ratione omnis. Autem eum ea optio mollitia ab nemo sint. Eveniet quia enim aut officia nemo illum. At fuga esse qui quia consectetur sint.\n\nImpedit voluptates sapiente autem quia aut. Sint et eos alias deserunt iste vel.', 'Mr. Forrest Stracke', '2023-01-29 01:22:45', 1, 7, 1, '2023-04-07 22:44:35', NULL),
(3, 'Quasi expedita odio quia.', 'Velit harum qui non ad sapiente. Et quia quia error ut quis voluptas possimus non. Consequatur deleniti labore eveniet optio optio. Magnam ratione maxime dolores quia libero rerum.\n\nAnimi placeat sit perferendis. Et labore veniam culpa. Voluptate ut sit sequi quia et.\n\nSapiente commodi laboriosam id ratione ducimus quia veniam consectetur. Ducimus odit harum quisquam dolores nam. Debitis voluptate esse explicabo repellendus quia distinctio qui.\n\nSimilique quidem nobis provident. Rerum inventore vitae dignissimos aspernatur ducimus dignissimos totam. Eum necessitatibus iusto cum eos blanditiis quo. Sint necessitatibus facere earum.\n\nIpsum dolor molestiae eos qui accusamus ratione autem. Repellat consequatur quod laudantium rem possimus et. Numquam quisquam ullam quis. Sapiente aut molestias possimus distinctio.', 'Scarlett Orn', '2022-09-18 11:20:01', 1, 8, 1, '2023-04-07 22:50:29', NULL),
(4, 'Temporibus voluptate cumque qui eveniet commodi deserunt quia.', 'Qui sed cumque voluptatem aut inventore fugiat unde. Eaque tenetur delectus quaerat voluptatem. Voluptatibus architecto est vitae consequuntur. Aliquid quis veniam in nostrum fuga.\n\nAssumenda reprehenderit quia nam asperiores dolor voluptas. Molestias repellat sequi autem est. Pariatur voluptas optio ratione asperiores autem voluptas qui.\n\nEnim officiis velit et corporis. Repellendus eligendi illo explicabo tenetur. Occaecati sequi fugiat odit aut qui voluptatem.\n\nDelectus praesentium illo at praesentium. Ipsa laudantium fugiat sed est. Quas illo in ut quis laboriosam omnis. Ducimus aliquid omnis suscipit sed animi nihil.\n\nMaxime molestiae ut aut ut. Ipsam aliquam autem corporis a nihil. Accusamus eum nihil aliquid ipsa non optio. Repellendus autem ducimus numquam optio in.', 'Prof. Hipolito Cruickshank', '2021-05-04 10:42:48', 1, 14, 1, '2023-04-07 22:50:29', NULL),
(5, 'Mollitia ullam commodi totam eligendi velit amet.', 'Nam eos maxime ut porro voluptas eum cumque. Et commodi accusamus blanditiis laudantium eos. Sed laboriosam perspiciatis accusamus iste et asperiores. Animi doloribus perspiciatis et nobis.\n\nA dicta perferendis earum ratione natus debitis. Et debitis aspernatur quia at quia culpa. Est et adipisci in inventore. Molestiae quod sed nemo culpa non.\n\nPraesentium nihil quas consequatur ipsam quidem minima. Et qui vel dolores in maiores odio. Magnam magnam placeat reprehenderit ex exercitationem sapiente. Nihil quae quas praesentium id adipisci.\n\nVoluptatum cupiditate quia dolorem perferendis quia in. Dolor blanditiis animi repellat corrupti est accusantium. Quidem non expedita est dignissimos dolorem libero aut et. Sed est et ipsam non quia suscipit facilis.\n\nExcepturi sint illo officia quidem commodi ut. Quaerat provident aut at qui blanditiis et dolorem. Cum veritatis sed quia vel a dolore. Dolorum at facere maxime.', 'Duncan Cormier', '2023-04-04 14:40:23', 1, 5, 1, '2023-04-07 22:50:29', NULL),
(6, 'In facere et aspernatur fuga quia.', 'Ipsum odit voluptatum nisi fuga hic sapiente. Soluta qui optio temporibus ut vel ea exercitationem. Quis minus repellat possimus qui vel quas eum. Autem nam numquam eaque dolorem inventore magni pariatur qui.\n\nDolores voluptatem error cupiditate eius. Modi repudiandae qui rerum ut. Et possimus consectetur provident sequi iure. Cum illo quisquam ea quae sapiente voluptas.\n\nExpedita dolorum reiciendis ut sit aut repudiandae. Eligendi et quis qui fugit excepturi laudantium similique. Tempore voluptas fugit error nihil. Quidem rem et voluptate sequi modi.\n\nLaboriosam velit perspiciatis eius quibusdam sit. Unde accusamus quae quod. Temporibus nihil quas nihil totam repudiandae aliquid. Impedit recusandae architecto totam illum autem. Nisi ipsum veniam voluptatum ullam quis voluptatibus.\n\nUt illum vel modi iusto quia dolorum sit. Rem fuga ipsam voluptatum et voluptates aut. Assumenda placeat vero omnis autem reprehenderit quia ea repellendus.', 'Neha Cormier', '2021-09-22 23:10:11', 2, 5, 1, '2023-04-07 22:50:29', NULL),
(7, 'Dignissimos et ducimus qui vero rerum dolorum sed.', 'Dolores eos sit ut voluptates. Quod voluptas voluptas nam eos fuga. Ut ratione consequatur dolore est vitae et ea. Corporis alias non animi consequatur est est iusto. Aperiam et porro iure alias.\n\nDolores perspiciatis iure ut natus. Assumenda commodi quibusdam recusandae est ut ducimus. Provident voluptas nisi nisi ea sed mollitia. Laborum optio ad exercitationem dolorem non consequuntur et.\n\nEarum vel temporibus omnis aut. Et dignissimos omnis voluptas mollitia vel. Dignissimos mollitia quos cum magni.\n\nVoluptas alias quis esse ea quis. Et nemo fuga mollitia autem eveniet mollitia quo.', 'Sally Zboncak', '2023-03-19 14:06:20', 1, 10, 1, '2023-04-07 22:51:35', NULL),
(8, 'Voluptatem alias voluptatem optio ad magni.', 'Animi impedit totam minima sed molestiae. Recusandae vel nulla natus corporis. Iure dolore culpa perspiciatis. Illum doloremque consequatur hic optio placeat cupiditate.\n\nUt cupiditate corrupti sed at. Laborum eligendi corporis illo molestiae vitae illo. Facilis est sunt in voluptate maiores expedita molestias. Nihil nisi iusto quia ea aut libero. Dicta et sapiente consequatur dicta maiores accusantium.\n\nQui sit accusantium dolor. Quae est eius sequi minima.\n\nEst aut saepe aut non. Cumque saepe aliquid eos magni sint. Officia consequatur voluptatem ex accusantium doloribus quam.', 'Anna Bosco', '2023-02-28 10:40:48', 2, 7, 1, '2023-04-07 22:51:35', NULL),
(9, 'Et esse ipsam eos id.', 'Quia minus accusantium totam dignissimos tempore qui magni. Placeat corporis exercitationem facilis illum laudantium fugit nulla voluptas. Quis et omnis in quisquam.\n\nQuaerat quo quae iste optio qui molestiae saepe. Quae quos numquam velit doloremque sequi tempora. Rerum quo dolores maiores molestiae harum quo. Eligendi magnam qui est voluptas.\n\nIpsum facere vel voluptas repellendus. Dolorem dolor molestiae unde perspiciatis porro. Ullam vero dolorem enim dolorem nihil beatae. Reprehenderit itaque voluptas et reiciendis.\n\nQui accusantium maiores id autem voluptatem commodi. Maiores esse perspiciatis accusamus ut. Consectetur quo enim hic harum ut ut eum.', 'Octavia Harber', '2022-12-15 11:09:39', 2, 13, 1, '2023-04-07 22:51:35', NULL),
(10, 'Quasi voluptatem temporibus et sint vitae maiores.', 'Omnis libero cupiditate autem dicta laboriosam sunt veritatis. Voluptatum vero velit delectus nobis velit. Qui rerum velit necessitatibus et dolore doloremque.\n\nError corporis tenetur mollitia aut ab reiciendis consequuntur. Doloremque nulla ut veniam sit temporibus. Sed illum non tempore numquam eligendi.\n\nConsequatur eaque at aut consequatur pariatur iusto tempore enim. Numquam numquam nisi quasi vitae quia quibusdam non. Enim illo et nemo dolorem.\n\nLaboriosam numquam beatae ullam non sint ea sint. Fugit aliquid nihil distinctio similique sapiente quidem eos inventore. Voluptas deserunt sapiente aperiam sed est.', 'Billy Thompson', '2021-05-17 08:51:11', 1, 15, 1, '2023-04-07 22:51:35', NULL),
(11, 'Et sit earum quae doloremque quia porro molestiae hic.', 'Et ducimus repudiandae ea aliquam assumenda. At omnis autem adipisci autem. Porro explicabo vel quibusdam veniam quia repellendus sint. Aut ea laudantium ut omnis iure corporis maiores.\n\nMollitia aut accusantium qui consequatur error suscipit. Nam numquam impedit ut. Ut quia quia mollitia fugit ea saepe et eum.\n\nMaiores non voluptatum odit et. Natus rerum sit atque pariatur. Esse voluptas nisi aut quo quod est.\n\nAut cum nostrum reprehenderit maiores vel in maxime sed. Amet quidem delectus quo voluptatem. Eum ipsa eos aliquam natus quidem voluptates nobis.', 'Dr. Ellen Wyman MD', '2021-07-03 21:19:00', 1, 5, 1, '2023-04-07 22:51:35', NULL),
(12, 'Sunt temporibus animi necessitatibus nihil quisquam ea.', 'Tenetur hic architecto itaque mollitia consequatur et. Ad quia quibusdam ab minima doloremque quod impedit qui. Sit nobis quasi a.\n\nLaudantium ut ex sed ratione dolorum. Ducimus magni illo atque deserunt. Cum eos omnis sint ullam et ut dolorem. Repudiandae nostrum ipsum quia omnis reprehenderit qui modi.\n\nOdio dolorum non at omnis rerum odio aut. Voluptas molestiae quod id. Earum dolor dolore quibusdam atque recusandae perferendis sit. Non incidunt quia doloribus culpa laborum corrupti.\n\nIllum sapiente voluptatem iusto ad. Tempora molestiae maxime dolore deserunt.', 'Prof. Bobby Haley Sr.', '2021-04-14 06:27:44', 2, 5, 1, '2023-04-07 22:51:35', NULL),
(13, 'Rerum numquam veniam reiciendis qui.', 'Est blanditiis ea enim reprehenderit neque aut est. Aspernatur est odio beatae asperiores harum aut.\n\nRepudiandae molestiae est aliquam dolores earum quidem sunt. Et rerum eius aperiam voluptas facilis. Architecto aspernatur dolorem optio non aut tempore est.\n\nLaudantium placeat consequatur quod quis et in. Aspernatur veniam aut sit quos. Autem qui laudantium sunt non voluptatem odit aspernatur. Cumque est dolorum nam cupiditate aut facere.\n\nRepellat ut ut harum perspiciatis quia aliquid est aliquid. Voluptatem quia qui repudiandae quibusdam perferendis. Tempore sint debitis expedita tenetur similique earum. Provident sit omnis impedit corporis et. Sint et incidunt nemo velit assumenda est iste.', 'Elvis Ebert', '2021-05-08 04:14:49', 2, 10, 1, '2023-04-07 23:00:23', NULL),
(14, 'Est sint natus dolorum omnis magnam quas.', 'Adipisci nemo dolor nam temporibus. Assumenda beatae rem rerum rerum itaque. Sequi reiciendis qui quis minus.\n\nSequi ut iusto sit. Aperiam delectus maxime sint id qui qui. Quo sunt eveniet aut provident qui aliquam iusto. Architecto veniam ducimus rerum itaque vitae. Reprehenderit enim in accusantium repudiandae quidem eius omnis.\n\nConsequuntur amet tenetur aut veniam corrupti. Et dolorem aliquid ut doloribus ut facere velit rerum. Sed praesentium sunt impedit reprehenderit.\n\nPorro non ea consequatur laudantium. Est sed aut nesciunt aut necessitatibus. Perspiciatis culpa hic tempora quia praesentium. Blanditiis quo doloribus aut quia ut asperiores. Sit vel quos ut animi et.', 'Dr. Patrick Becker V', '2022-04-03 11:01:29', 1, 9, 1, '2023-04-07 23:00:23', NULL),
(15, 'Incidunt possimus et aut nihil in earum soluta corrupti.', 'Voluptatem excepturi soluta sed. Et eum quos maxime quod quia. Voluptas amet accusamus est dolorum. Perferendis ut iure ut in odit magnam ea.\n\nQui quae aut rerum sunt et. Omnis aut totam vero sapiente dolorem est at. Laboriosam eos at iusto.\n\nNulla fugiat odio nemo ipsam rem fugit adipisci totam. Voluptates sunt vel quis provident architecto. Dolores libero itaque cupiditate delectus itaque pariatur labore. Et aperiam harum repellat possimus rerum consequatur et. Sunt alias vero voluptas.\n\nDolore repudiandae ut deleniti aut quis rerum aperiam. Aliquam est sunt ad pariatur impedit est. Labore asperiores aperiam cumque ut. Deserunt sit cum excepturi.', 'Victor Will', '2022-11-23 00:12:46', 1, 11, 1, '2023-04-07 23:00:23', NULL),
(16, 'Aliquam consequatur aut fugiat consectetur.', 'Nihil labore excepturi ducimus mollitia sint qui est. Quaerat atque saepe et sit quis. Hic esse ut labore quaerat. Corporis tempora natus atque illo repellat dolorem aut debitis.\n\nConsequuntur quo libero in dolor unde quis cupiditate. Expedita perferendis voluptates eius veniam placeat omnis. Ea saepe atque deserunt error sequi non dolorem minima.\n\nOdit id architecto voluptas exercitationem. Voluptatem voluptas ut consequatur nulla quos minus harum omnis. Ab velit quia laudantium dolorum. Omnis nemo ut hic consequuntur suscipit voluptatem atque.\n\nSoluta vero alias ex molestiae animi. Omnis et occaecati officiis quam. Ullam id ex corrupti. Temporibus expedita ipsum atque officia non.', 'Santino Bernier', '2021-05-21 15:45:08', 2, 16, 1, '2023-04-07 23:00:23', NULL),
(17, 'Neque accusamus ut eum iure minus explicabo.', 'Esse omnis quos saepe nihil qui quo. Dolor eius est quo sunt. Sit temporibus in voluptate assumenda accusamus sit. Reprehenderit similique repudiandae perferendis quia non quaerat.\n\nFacere sed a odio. Eum fugiat et tempora nostrum est nostrum veniam. Iste corporis sed nihil consectetur. Molestias dolores et sit adipisci facere ratione vero. Mollitia nam molestiae saepe perspiciatis laudantium molestiae consectetur veniam.\n\nEa consequatur impedit omnis hic maxime adipisci quia. Aut tenetur voluptatibus magnam accusamus dignissimos natus. Est aut officiis praesentium consequatur nihil distinctio atque.\n\nBlanditiis sed et dolorem ut neque. Error dolores necessitatibus voluptatem nulla numquam quis iure aut. Necessitatibus et totam sunt cum nesciunt. Odio maiores saepe qui quia autem libero.', 'Mervin Upton', '2021-11-05 09:23:55', 2, 10, 1, '2023-04-07 23:00:23', NULL),
(18, 'Non dolor qui soluta.', 'Odit neque dolores alias quia. Et eveniet et labore inventore sed hic eum. Voluptatem et et non qui.\n\nNobis ut libero rerum sed ullam. Voluptas dolor repellat cum nihil aut et qui. Est temporibus id quas velit libero ut.\n\nNumquam nihil deserunt rerum id reprehenderit. Cum expedita ratione autem modi nobis assumenda voluptatem. Quam maiores omnis nesciunt atque harum. Deserunt qui nesciunt ducimus est voluptatibus ea.\n\nCorporis eligendi similique excepturi unde. Et non debitis vitae sed illo. Praesentium impedit magnam sit quia et.', 'German Marvin', '2022-01-20 19:32:36', 2, 4, 1, '2023-04-07 23:00:24', NULL),
(19, 'Laboriosam esse et voluptas atque ut.', 'Quidem vel sit dicta numquam asperiores vero occaecati. Odio numquam quam tempora vitae dolores vel et. Sit optio occaecati voluptas aut. Autem nihil aut tenetur voluptates doloremque harum quae. Odit autem ex itaque qui in.\n\nUt nobis non maxime sint iste numquam aut sed. Quia veniam blanditiis aut ducimus sunt consequatur aut laudantium. Et quasi aliquam asperiores. Modi quibusdam minima eligendi non tempora corporis at.\n\nTotam doloremque illum ut nam aliquid at repellat. Architecto eius magni non et. In sint et autem est.\n\nEt atque neque officia natus debitis. Nisi ut doloribus ex ratione nisi deserunt. Modi quaerat rerum tenetur non nemo voluptas aspernatur.', 'Amina Streich Jr.', '2022-08-05 16:02:50', 1, 14, 1, '2023-04-07 23:00:24', NULL),
(20, 'Velit ducimus non ut quis et numquam.', 'Aut aspernatur quaerat aut aspernatur ut quaerat aspernatur dignissimos. Consequatur nam fugit unde at aut. Eveniet minima natus voluptatem. Quas ut necessitatibus et.\n\nFugiat modi commodi fuga sapiente. Praesentium eius commodi ab necessitatibus fuga eligendi. Eius est natus quaerat et quis.\n\nQuia quidem minima esse dolor minima quo quidem. Et modi quisquam distinctio ipsum. Et quidem quasi amet architecto quia et voluptatibus.\n\nError ut ipsam et eum dolores laborum quaerat asperiores. Tempore atque et ipsam mollitia placeat nihil. Dolorem tempora sequi nisi omnis sint. Est dolores id itaque inventore veniam fugit.', 'Mafalda Hoeger', '2022-01-17 20:04:14', 2, 8, 1, '2023-04-11 16:29:02', NULL),
(21, 'Impedit et quo voluptas dicta iste tempora.', 'Placeat dolorem ea et nihil ea. Facilis mollitia a vero sapiente voluptatibus quos. Laudantium doloribus ut neque enim.\n\nEt iusto et velit sed iste quia. Et dolor molestiae et quo sed nobis velit. Reprehenderit accusamus dolorum quibusdam non quis ut ad blanditiis. Iusto commodi temporibus dolores saepe et impedit at temporibus.\n\nIure voluptatem incidunt eaque ab. Nisi qui ratione aut. Aut sed amet voluptatem minus voluptas quibusdam. Nihil magnam praesentium in magni et reiciendis. Amet iure soluta sit nesciunt.\n\nUt dignissimos suscipit architecto aut. Quo corrupti voluptates qui ut qui.', 'Dr. Leola Hill', '2022-02-16 03:07:52', 1, 13, 1, '2023-04-11 16:29:03', NULL),
(22, 'Itaque officia qui maxime.', 'Similique maxime necessitatibus facere soluta sit. Unde cum itaque eos tempora saepe.\n\nVeritatis minima ut nobis qui et eos velit. Ea eligendi molestiae ab aut. Amet quia nihil iusto porro ea quia sint. Perspiciatis hic quae aut perspiciatis.\n\nBeatae assumenda omnis beatae voluptatum aliquam sit. Itaque cumque facere quos soluta nulla maxime perferendis qui. Delectus numquam nobis et ullam veniam est beatae molestias. Ut eos est reiciendis ex corporis omnis at.\n\nOfficiis aspernatur iure labore eius tempore fuga ipsum et. Ut quia asperiores omnis eos. Consequatur temporibus sint blanditiis dolorem beatae.', 'Dr. Nicklaus Buckridge', '2022-07-24 21:20:41', 1, 15, 1, '2023-04-11 16:29:03', NULL),
(23, 'Incidunt dicta suscipit dolor sunt repellat ducimus iste.', 'Laborum ex et amet minima magni tempora est. Quia eius at consequuntur. Qui ut porro impedit tenetur rerum aut.\n\nDoloribus voluptatem et vitae earum. Ipsa saepe veniam commodi. Aliquid ut quia beatae exercitationem magni. Neque exercitationem et fuga ut blanditiis.\n\nSit culpa ea magni. Sed temporibus dolor quia et dolorum numquam officia illo. Aut eaque vero dignissimos quia facere possimus nulla. Eum accusantium sint et et fugiat voluptatibus qui aut. Laborum quisquam quis facere qui laborum voluptates delectus.\n\nEius eum deleniti accusamus omnis est a. Dolores et et voluptatem nulla nobis. Quis non molestiae incidunt iste eius. Fuga et eos voluptatem officia assumenda similique.', 'Geovanni Glover', '2021-06-24 18:20:19', 2, 3, 1, '2023-04-11 16:29:03', NULL),
(24, 'Delectus iure cumque cumque assumenda est.', 'Non deserunt nam quidem. Quod iusto quia debitis. Minima est voluptatum explicabo quia reprehenderit sit consequatur ratione. Neque suscipit tenetur autem omnis repudiandae tenetur maxime rerum.\n\nPariatur dolorem commodi consequatur enim cupiditate aspernatur quasi. Molestias eius dolores reiciendis eaque. Aliquam molestias vel aliquid voluptas explicabo perferendis.\n\nAsperiores velit magni quo voluptates sed minima similique. Voluptatibus sapiente quisquam qui cumque facilis quas est. Aut architecto doloremque totam cum odio ab molestiae. Doloremque voluptas autem sapiente maiores saepe et assumenda.\n\nEst id eum possimus quas inventore id distinctio. Doloribus neque sit eaque quis excepturi velit. Quidem aut ullam repudiandae dolores voluptatibus consequatur numquam.', 'Prof. Sammy Kozey', '2022-07-07 08:43:14', 1, 2, 1, '2023-04-11 16:29:03', NULL),
(25, 'Debitis architecto est et quae et.', 'Rerum qui laborum totam architecto. Voluptas repellendus praesentium consequuntur voluptas architecto. Modi nemo sint aut odit asperiores quo eum. Dolor non eligendi quos aliquam doloribus.\n\nQuia eos ad earum et autem. Debitis accusamus neque tempore cupiditate. Eaque sed laborum blanditiis aperiam nihil placeat aut. Quaerat repudiandae dolorem provident.\n\nEt ut dolore iste quis. Aut quisquam sit qui. Quod aliquam veritatis porro. Inventore sed quia quasi et.\n\nPossimus corporis impedit ducimus cumque perferendis. Maxime cum est ad necessitatibus placeat. Ut debitis occaecati labore voluptas eligendi dicta id.', 'Johnson Pagac', '2021-04-22 05:45:09', 1, 2, 1, '2023-04-11 16:29:03', NULL),
(26, 'Sed non eveniet eum veritatis blanditiis praesentium dicta.', 'Rem accusantium suscipit impedit adipisci nostrum delectus. Quis autem consequuntur eum aut fugiat est. Mollitia eos qui hic rerum recusandae perferendis minima iure. Asperiores necessitatibus voluptatibus distinctio vitae molestiae. Ipsam repudiandae doloremque perspiciatis.\n\nAt non sed itaque occaecati. Dolores dolores qui asperiores et est rerum. Est nulla dolor consequatur pariatur. Animi error atque expedita accusamus provident.\n\nItaque distinctio eius et illo expedita dicta. Ea doloremque aperiam iusto perspiciatis. Nobis iusto dolorum et qui.\n\nQuo aperiam natus facilis ab ut consequatur qui. Illum consequuntur molestiae corrupti qui rerum illo et hic. Et dolorem sed accusantium nesciunt quam voluptatem.', 'Manuela Fay', '2022-11-17 17:57:36', 1, 11, 1, '2023-04-11 16:29:04', NULL),
(27, 'Voluptatem accusamus est perspiciatis qui maxime.', 'In quia quis et et est. Et optio et aut non. Eveniet incidunt consequuntur sit.\n\nMagnam ipsum culpa ipsum. Nihil modi ea similique qui expedita iure. Voluptate libero aut autem porro.\n\nFacilis vero sunt ut in sit sunt. Vel ut et quisquam dolores et quae dolorem nobis. Ex nobis officia quis non delectus laudantium consequatur qui.\n\nAut in architecto consequatur qui. Non explicabo provident voluptatem ratione. Eum voluptatibus doloribus non delectus temporibus.', 'Dr. Vito Blick PhD', '2022-04-25 16:51:43', 1, 3, 1, '2023-04-11 16:29:04', NULL),
(28, 'Et dolores vel velit autem praesentium.', 'Aut sint consequatur quam aut quasi assumenda. Sunt est qui in est dolor. Voluptatem iste vel quia nihil. Quos corporis accusamus incidunt distinctio dolores ipsum.\n\nAliquid necessitatibus assumenda et porro sed omnis ad inventore. Laborum earum cupiditate iste aut deserunt possimus beatae corrupti.\n\nSunt doloremque quia est tempore et aliquam voluptas. Corrupti alias et numquam voluptatibus sint. Inventore consequatur non mollitia qui laudantium assumenda aut.\n\nEst est fuga qui voluptatem doloremque nisi. Nihil veniam suscipit quia reiciendis omnis. Eius architecto voluptatem non minima occaecati.', 'Kathryn Quigley', '2021-09-20 21:47:21', 2, 14, 1, '2023-04-11 16:29:04', NULL),
(29, 'Aliquam quia est laborum ut saepe cupiditate.', 'Error optio sed est ea dignissimos. Debitis aut dolores itaque laborum facere consequatur. Est facere a dolore aut quo inventore. Iusto numquam quaerat molestiae quaerat repudiandae fugiat.\n\nVoluptates nihil incidunt veniam qui. Soluta dolorum quo nesciunt quas maiores. Expedita quod eos atque cupiditate.\n\nQui quia nisi ea laboriosam quisquam quibusdam enim. Dolores ex nihil ut repellat maiores tempore. Architecto assumenda maiores id maxime.\n\nDolor qui consequuntur doloribus rem excepturi velit. Sint sapiente mollitia consequatur temporibus ut. Numquam quos ea tenetur hic.', 'Robin Hettinger DDS', '2021-06-14 04:56:49', 1, 16, 1, '2023-04-11 16:38:18', NULL),
(30, 'Facere id dolorum quibusdam commodi.', 'Est cupiditate exercitationem aliquam consequatur. Sit aspernatur voluptas soluta mollitia animi ut et. Qui vel vel doloribus maiores itaque iure occaecati. Ullam ea enim incidunt aut sed et rem.\n\nIpsa sit sed ut nam voluptatum et. In voluptas atque ut quas quis eligendi natus.\n\nVoluptas saepe sint placeat voluptatem minima. Iste nesciunt suscipit nesciunt magnam ut similique in. Nam molestias possimus consequatur in ducimus natus nemo. At quam impedit ea quia occaecati vel.\n\nVeritatis architecto id quo perferendis. Accusantium architecto sed ex consequuntur et et ratione. Eum qui accusamus consequatur et.', 'Kurt Gutkowski', '2022-06-29 10:21:50', 1, 7, 1, '2023-04-11 16:38:20', NULL),
(31, 'Ut natus facere soluta enim veniam ut laboriosam aut.', 'Corporis tenetur nostrum iure aut suscipit. Porro qui pariatur quasi incidunt rem autem eaque veniam. Atque laboriosam est qui inventore. Provident dolor delectus ut.\n\nId aliquid id est nam. Dolor provident et ipsum et omnis officia. Et nostrum qui laudantium architecto et quis laudantium.\n\nEos quia voluptas tenetur. Id sunt eveniet est aut qui iure. Quod id rerum quod ducimus.\n\nCupiditate error nesciunt nam quia. Tempora doloribus modi tenetur voluptatem quasi quas.', 'Paris Tromp', '2022-03-10 14:53:44', 1, 12, 1, '2023-04-11 16:38:23', NULL),
(32, 'Molestiae sequi dignissimos at fugiat.', 'Perferendis sunt odio aspernatur quaerat omnis. Eum ullam est reiciendis dolores et velit dolorem rem. Qui aut dolores autem quia.\n\nIllum et nihil eveniet magni vel est. Voluptates dolorum est officiis impedit dolorum enim non. Incidunt ullam ea quod qui quo. Dolorem hic quis ut possimus delectus illum non. Consequuntur fugit quod nobis omnis dicta quo.\n\nEius quasi reprehenderit facere. Qui aperiam et et eos quia doloribus dolores voluptas. Aspernatur quasi dolores excepturi non rerum incidunt.\n\nTempore laboriosam labore eaque cum aut possimus. Ut quod quia reiciendis. Esse eos et quaerat quasi vero harum quis. Vero ratione in saepe sunt.', 'Santina Roberts', '2022-09-01 22:21:18', 1, 15, 1, '2023-04-11 16:38:25', NULL),
(33, 'Ullam voluptas officiis saepe dolor numquam.', 'A distinctio dolores qui eum et optio numquam quod. Et est possimus voluptatem delectus sed velit. Ab et aspernatur praesentium culpa eum expedita.\n\nFuga eligendi quas iste velit voluptas. Sequi cumque ut laudantium non. Necessitatibus est quaerat ducimus modi fugiat et natus.\n\nFacilis porro corporis saepe labore tempora. Id recusandae ad dicta et quas voluptatem dignissimos. A quia nulla id. Modi sapiente eligendi et voluptatibus dicta quia similique neque.\n\nExercitationem ratione molestiae pariatur voluptas nobis accusantium quas. Consequuntur corrupti placeat exercitationem iste ea minus. Cum qui eveniet id enim qui soluta.', 'Jabari Jenkins', '2023-01-24 14:06:58', 2, 9, 1, '2023-04-11 16:38:27', NULL),
(34, 'Sapiente non ducimus rerum placeat et vel voluptatem aut.', 'Voluptates omnis magnam possimus dolores nesciunt a. In voluptatum quis rerum iure et consequatur. Ut et ea iste nemo et aperiam repellat. Vero enim numquam quam saepe.\n\nOdit dignissimos perferendis praesentium perspiciatis et ratione soluta. Tempora id ratione voluptas excepturi est quia quia et. Sunt blanditiis officiis iure possimus. Et iste voluptatem fugiat neque id excepturi.\n\nLabore voluptatem vero nihil aspernatur qui. Aut ratione et ut sed aut voluptatibus quaerat. Enim facere amet dolores neque magni.\n\nEt at similique blanditiis nihil assumenda. Et voluptatibus aut dolor quibusdam voluptatem illo. Ea sit illum labore aut est reiciendis quam quaerat.', 'Nora Upton', '2021-05-03 08:46:08', 1, 12, 1, '2023-04-11 16:38:29', NULL),
(35, 'Eos ullam dolor itaque itaque dolorem illum eligendi.', 'Veniam quasi eligendi non numquam laborum non. Libero laudantium ducimus neque sit qui dolorem. Vel quibusdam voluptas quisquam odio expedita. Commodi repudiandae doloremque enim et. Sit dolorem molestias enim impedit nisi sit.\n\nPlaceat in quos possimus fuga. Odio soluta sint sapiente itaque nobis similique. Nobis nisi ut fugiat blanditiis modi quia. Error cumque voluptas vel sequi ut.\n\nUt sint molestias magnam. Asperiores dolorum et sint qui tempore et. Nulla ad in minima. Ex quisquam in dolor libero illo eligendi earum.\n\nAut est veritatis veniam incidunt. Temporibus quidem dignissimos labore inventore in. Reiciendis dolores facere ut sunt et ad.', 'Era Funk', '2022-07-29 01:49:57', 2, 16, 1, '2023-04-11 16:38:31', NULL),
(36, 'Quo consectetur temporibus est.', 'Aut perferendis omnis magnam fuga nemo qui. Similique corrupti fugit commodi. Corrupti numquam quis molestias qui voluptas ut ducimus.\n\nQuia dolor ea aperiam repellat beatae. Quis ab pariatur voluptas excepturi sequi recusandae. Aut rerum ipsa consequuntur tempore id.\n\nNemo quia et qui natus quis rerum in. Fugit amet dolorem velit debitis voluptatem fugit nihil. Rerum temporibus harum necessitatibus.\n\nNecessitatibus eos vero veniam qui eaque. Rerum veritatis consequuntur ducimus sapiente quae. Ea earum consequatur est porro quaerat ut.', 'Donny Halvorson DDS', '2023-01-23 02:41:44', 2, 13, 1, '2023-04-11 16:38:33', NULL),
(37, 'Cumque veritatis debitis perferendis non.', 'Quidem explicabo amet enim ut nisi. Sit necessitatibus nisi consequuntur nemo nihil. Distinctio iste quaerat excepturi ea.\n\nVoluptas saepe recusandae recusandae ea cupiditate. Et quia et vel velit. Sit debitis vero voluptas eum perspiciatis. Inventore vel saepe et maxime possimus.\n\nLibero quis cumque culpa voluptas corporis ad. Nisi quae doloribus aut in ut. Laudantium voluptas et a.\n\nExplicabo adipisci nisi cum reprehenderit rerum. Distinctio unde nihil nisi similique nam enim magni et. Rem voluptatem incidunt iusto fuga sit aut. Iste soluta molestiae et in exercitationem qui nemo.', 'Miss Mittie Lang V', '2021-08-06 23:59:57', 1, 12, 1, '2023-04-11 16:38:35', NULL),
(38, 'Est est consequatur sit aut explicabo unde repudiandae distinctio.', 'Mollitia qui velit iste rerum dolore. Nobis minus ullam sit quis. Unde aliquid iusto modi quas id. Odit ut ab aut libero qui ea voluptas.\n\nEius qui provident ipsum ipsa autem. Minima enim voluptatem necessitatibus rem assumenda ut fugiat. Et nihil necessitatibus enim quia. Excepturi expedita voluptatem odit ad laborum qui voluptatem soluta.\n\nEarum debitis sunt harum eum repellendus. Illo qui assumenda et ex excepturi dolores. Quod dolores quod eaque doloremque fugiat sapiente et et. Recusandae suscipit ratione velit asperiores ut rem.\n\nPariatur aut vel est. Porro perspiciatis aut incidunt sed rerum iste. Sequi fugit autem hic magnam exercitationem aliquam delectus.', 'Josue Okuneva', '2021-07-13 19:41:11', 2, 9, 1, '2023-04-11 16:38:37', NULL),
(39, 'Nam ut dolor animi eos.', 'Inventore ipsa in in officiis tenetur incidunt ut. Nostrum odio libero ipsum itaque. Sequi sunt in quibusdam dignissimos provident recusandae cupiditate. Inventore vitae dolor distinctio dignissimos.\n\nTotam sit eum sed cupiditate. Voluptas quia dicta enim molestiae hic quia est nobis. Magnam suscipit voluptas perspiciatis error. Aut eligendi corporis vel et.\n\nIncidunt repellat similique nulla architecto sit impedit minima. Dolores aut aliquam ratione. Molestias porro delectus esse dolores doloremque. Dolorem ut illum beatae odit cumque voluptatibus qui.\n\nLaudantium sed ducimus consequuntur. Quo esse ipsum sit numquam. Voluptatem occaecati et commodi maxime autem et. Maiores velit nam occaecati consequatur.', 'Jayde Cartwright', '2022-06-16 13:48:54', 2, 3, 1, '2023-04-11 16:38:39', NULL),
(40, 'Sit ea beatae dignissimos.', 'Consectetur molestias sit debitis asperiores dolor. Quam sequi magnam expedita ullam perferendis. Labore architecto harum est ipsam qui.\n\nSuscipit voluptas non laborum laboriosam laboriosam vel dolores. Quisquam repellendus consequatur voluptatibus mollitia maxime ratione recusandae. Et optio sit atque omnis. Quos quisquam et incidunt.\n\nAssumenda incidunt est sunt est sequi necessitatibus dolorum tempora. Quas assumenda libero nulla et. Explicabo consequatur illum omnis tenetur. Tenetur quisquam illo deleniti vel.\n\nUt dolorem reiciendis vero aperiam eius perspiciatis. Magnam nihil tempore fugiat at. Velit ut modi et ad accusamus officia praesentium quam. Reprehenderit maiores laboriosam iure et.', 'Monroe Nader', '2022-10-15 16:09:22', 1, 4, 1, '2023-04-11 16:38:41', NULL),
(41, 'Quisquam placeat laboriosam vel rerum.', 'Alias rerum dolorum veniam suscipit. Sint necessitatibus accusamus laborum perspiciatis. Animi cum sint laborum placeat tempora aut. Aut laborum inventore est ipsam voluptates. Dolores dolores odit et id nisi sit suscipit.\n\nSit ut blanditiis voluptas error hic tenetur nemo. Alias iste aut sed assumenda totam accusamus accusamus qui.\n\nEt vitae consectetur consequatur occaecati. Hic neque sapiente quaerat. Impedit minima pariatur magni.\n\nIn voluptate animi quam vitae perferendis. Enim ab aut repellendus necessitatibus ad facilis veritatis. Vero voluptatibus ducimus asperiores.', 'Zaria Gislason DDS', '2022-12-07 19:35:42', 1, 16, 1, '2023-04-11 16:38:43', NULL),
(42, 'Ut fugiat quidem sint maiores provident sapiente et dolorem.', 'Sequi sequi recusandae voluptas nesciunt. Ut voluptatem doloribus nobis tempore. Ullam eaque quo voluptas sit est voluptas omnis veritatis. Quo velit debitis autem sapiente. Iusto voluptatibus nemo minima ut inventore assumenda praesentium.\n\nEa delectus sed illum nihil. Maiores at corporis quasi a asperiores. Optio odio doloribus voluptas.\n\nNatus ut illum magni delectus aut numquam. Molestias qui placeat reprehenderit odio porro. Vitae natus autem reiciendis ipsum possimus.\n\nPossimus quo corrupti aut eos nobis maxime cum. Ab qui facilis atque officia deserunt et voluptas. Iusto dicta sunt et et exercitationem adipisci culpa magnam. Placeat cumque animi iste beatae ut id.', 'Mr. Arnaldo Predovic', '2023-01-23 12:11:36', 1, 12, 1, '2023-04-11 16:38:45', NULL),
(43, 'Quo reprehenderit ex dolorem quam totam autem.', 'Nobis dolorem odio quia sed ratione. Magnam qui illo sint veritatis qui. Ex quis est expedita dicta maiores nobis error.\n\nEnim ut asperiores eveniet illum. Eos praesentium earum omnis ipsa est nihil sapiente. Corrupti id quod quis hic.\n\nA id repudiandae molestiae officia et eum sequi. Minus debitis ut quidem debitis dolor accusamus autem.\n\nMinus voluptatibus eos accusantium libero. Perferendis perferendis dolores iste ut. Perferendis quasi at error consequuntur. Perspiciatis voluptate eos magni ut.', 'Jaleel Hackett', '2021-08-27 10:47:09', 2, 2, 1, '2023-04-11 16:38:47', NULL),
(44, 'Rem possimus ducimus soluta laborum.', 'Et nihil eius in repellat. Perspiciatis aut quia quo nisi voluptas architecto nisi dolores.\n\nQuos alias aut dolor non ab veniam. Error facere ut id eum veniam qui. Ut veritatis quo voluptas atque voluptatem sint.\n\nVoluptas possimus quod nemo. Dolor quisquam vitae sapiente tempora. Et reprehenderit omnis laboriosam quia quam et. Doloremque reiciendis et autem cum.\n\nPlaceat earum adipisci non quia magnam. Aut odio optio reiciendis facere dolores ipsum. Aut fugit corporis saepe fugit. Esse consequatur libero perferendis in enim modi nesciunt.', 'Jovani Lubowitz', '2023-01-01 17:43:42', 1, 1, 1, '2023-04-11 16:38:50', NULL),
(45, 'Repellendus fuga deleniti sint consequatur maxime nemo distinctio.', 'Dolores illum delectus consequatur est iure. Iure in sunt voluptatibus dicta dolores quis et. Harum placeat ad qui alias.\n\nConsectetur aut sit illum voluptas quia. Possimus unde rerum voluptas commodi. Qui veritatis id et debitis ipsum odit error ut.\n\nEarum rerum dolore voluptas expedita sit officia. Fugiat perspiciatis minima nam ut id itaque eligendi. Architecto natus ea maxime minima voluptatum qui.\n\nOptio ad id rerum magnam. Qui et recusandae eos neque doloremque. Soluta qui dolorem sint maxime. Adipisci laboriosam voluptatem eveniet ab dolores eos.', 'Elnora Sauer', '2022-12-20 01:44:51', 2, 9, 1, '2023-04-11 16:38:52', NULL),
(46, 'Quae officia qui asperiores suscipit.', 'Omnis non ea fugit et nobis consequuntur. Provident aut veritatis et sit inventore asperiores iusto id.\n\nEst reiciendis ut consequuntur voluptas quia et dolor magnam. Architecto in autem molestiae deserunt ex asperiores nobis. Nobis dolor iure sit aut. Corporis et ad et dicta qui.\n\nEst ea id sequi fuga qui facere accusamus. Aut nihil quis ut assumenda eum non. Expedita minima impedit atque incidunt cupiditate voluptatem tenetur. Omnis blanditiis aut tempora rerum non necessitatibus.\n\nAb beatae vel totam enim. Sed magni sed et voluptatem vitae officia ullam. Qui libero sint repellendus quis dicta.', 'Osvaldo Koelpin', '2021-11-06 22:24:15', 1, 13, 1, '2023-04-11 16:38:54', NULL),
(47, 'Fugiat molestiae culpa nobis iure quam dolor alias.', 'Consectetur eligendi qui molestiae. Harum quia ea inventore amet aut eum nam. Et blanditiis natus soluta aliquam adipisci impedit nihil voluptatem.\n\nMollitia vero vero voluptate facere ut dolore aliquam. Ipsa velit doloribus cupiditate aspernatur nam. Sit aut asperiores iste ea deserunt. Neque rerum ipsum quasi vel assumenda eum voluptate. Cupiditate amet consequatur ut.\n\nSuscipit neque dolores dolorem quia non possimus. Dolore facilis qui sed quis laborum consequatur doloremque. Architecto aut maiores id est itaque non.\n\nAut quam non non molestiae quas. Maiores esse perferendis molestias ullam. Sint aut consequatur velit aut quia libero. Similique officia ut officiis.', 'Mabel Turner', '2021-11-23 12:23:32', 2, 8, 1, '2023-04-11 16:38:56', NULL),
(48, 'Molestiae rerum mollitia ipsum magni.', 'Et quis dolorem illo tempore. Et voluptatum iure at molestiae. Est consequatur laudantium harum fugit labore ad. Illo mollitia maiores nisi earum in fugit veritatis fugiat.\n\nDolorem aut voluptates eum qui quaerat repudiandae autem. Debitis non rem et quia. Ducimus qui nesciunt quisquam nihil. Exercitationem dolor vero qui rem quasi nihil omnis.\n\nEt iusto dolorum ad ducimus. Magni suscipit est cupiditate assumenda rerum. Dicta sunt porro quam. Neque cupiditate repellendus ad sit et aut iusto.\n\nTempore in amet aspernatur dolorem. Amet consequatur nesciunt tempora possimus et eum ipsam. Sit reiciendis ducimus minus explicabo blanditiis. Rerum autem ut est quam dolores doloremque sed.', 'Tomasa Abbott DDS', '2022-03-08 03:30:58', 1, 11, 1, '2023-04-11 16:38:58', NULL),
(49, 'Minus voluptas non asperiores omnis suscipit unde.', 'Quisquam nihil incidunt dolore. Maxime sit unde officia et asperiores eum asperiores cumque. Ipsa alias sed illo rerum inventore numquam. Earum fuga assumenda voluptatum debitis vel laudantium error.\n\nEst modi voluptatum eius qui quibusdam consequatur quia eos. Temporibus sed facilis maiores molestiae dolores. Voluptas ea in ab.\n\nPariatur aut nisi ut modi et et consectetur. Quia velit aut molestias assumenda nihil ut. Enim animi dolore vitae. Et fugiat qui ut molestias eum.\n\nError dolores sequi et voluptate. Velit ducimus et nisi ratione natus itaque. Voluptatem nostrum aut magni sapiente.', 'Mara Bernhard', '2022-04-13 07:26:10', 2, 12, 1, '2023-04-11 16:39:00', NULL),
(50, 'Deleniti perferendis praesentium in ut laboriosam.', 'Qui dolores rerum et quia maiores saepe. Vel libero sit perferendis et dolore.\n\nDoloremque praesentium tempore dignissimos est facere natus id. Non error eaque repudiandae delectus placeat qui. Blanditiis porro eum voluptatem aut. Odio dolorum impedit officiis.\n\nNihil dolorem ut molestias laboriosam magnam aut dolorum. Ut et suscipit eius. Temporibus et modi ut ut autem non.\n\nVoluptas aut quibusdam natus neque laborum minima inventore. Perspiciatis harum deleniti est accusamus laboriosam nostrum. Ut assumenda eum fuga odit nam.', 'Prof. Lorena Kris DVM', '2022-07-02 18:35:54', 2, 16, 1, '2023-04-11 16:39:02', NULL),
(51, 'Saepe nostrum doloribus tempora repudiandae.', 'Eligendi ipsa necessitatibus minima velit aut natus reprehenderit. Itaque a necessitatibus et labore. Sint consequuntur dolorum eius magni maxime.\n\nNeque quis molestiae ea alias illum aut. Doloribus praesentium repellat ad eum nemo.\n\nAccusamus officia voluptas maxime laboriosam corrupti a qui nesciunt. Facilis omnis non est distinctio eius necessitatibus distinctio provident.\n\nAlias quaerat rerum nam aut est quis et. Porro rerum voluptatum iste repudiandae et maxime cumque. Numquam et exercitationem vero soluta in expedita et recusandae.', 'Verona Koelpin', '2021-04-12 16:57:31', 2, 10, 1, '2023-04-11 16:39:04', NULL),
(52, 'Dolor est voluptas a modi quidem non.', 'Sit architecto ullam a rerum molestiae. Odit fugit numquam et doloremque ut dicta sequi. Laboriosam in vitae asperiores quasi.\n\nAut ratione atque incidunt velit delectus quo ab. Tempora quos asperiores quas accusamus sunt voluptas est deserunt. Animi rerum nesciunt et.\n\nQuia consequatur recusandae nemo at qui impedit. Aut id laudantium enim ut eius. Excepturi nisi et eos aspernatur. Quae et esse asperiores qui et.\n\nEst dolorem facilis explicabo sit. Incidunt quis qui enim quo est voluptates impedit. Iusto adipisci distinctio dignissimos nam. Similique soluta et deserunt sed a et qui rerum.', 'Aric Will PhD', '2022-01-24 04:14:20', 1, 6, 1, '2023-04-11 16:39:06', NULL),
(53, 'Sequi voluptas adipisci sapiente.', 'Inventore eos placeat recusandae iusto quidem dignissimos. Tenetur qui et non et. Quia corporis unde qui.\n\nItaque corporis nihil officiis aut quo. Omnis culpa vero sit sed molestiae. Alias mollitia illum et aliquid ea ut.\n\nIn impedit neque rerum explicabo dolores nihil ipsam. Tempore et quam vel nostrum similique ipsum voluptate voluptatum. Atque et dolor est distinctio culpa. Aut laboriosam autem totam dolorem consequuntur saepe.\n\nIusto laudantium sit maxime cumque facere tempore et. Est atque est deserunt consectetur fugit et illum quia. Rerum aut soluta soluta et itaque sit molestiae.', 'Gust Stehr', '2021-09-26 21:43:24', 2, 3, 1, '2023-04-11 16:39:08', NULL),
(54, 'Adipisci eum dolorem repellat in fugiat.', 'Sed dicta consequatur aspernatur sunt explicabo voluptatem consequatur. Qui excepturi aut fuga sapiente. Et beatae mollitia et nesciunt dolorem debitis et. Quos modi eligendi cupiditate placeat perferendis architecto tempore.\n\nOdit aut quia et facere. Voluptates porro sequi et. Impedit rerum deleniti numquam facere aut dicta assumenda.\n\nOmnis assumenda aperiam laudantium iste. Dolor in nisi quia harum quidem sed. Dolore sed totam quos odio est et.\n\nAliquid corrupti dolor voluptas qui possimus asperiores. Alias maxime et harum ut minus ullam sed. Accusamus perspiciatis et debitis omnis.', 'Leilani Gottlieb', '2021-10-27 06:52:16', 1, 7, 1, '2023-04-11 16:39:11', NULL),
(55, 'Quibusdam omnis ex qui sed est sit.', 'Quis repellat eum beatae sed magnam voluptatem natus facilis. Ullam et sequi rerum labore dolores. Similique enim laboriosam dignissimos rerum est accusamus cupiditate. Ad ipsam tempore ad amet voluptatum.\n\nDolore dignissimos deserunt soluta quaerat impedit. Officia et iste nostrum sed quidem molestias quo sequi.\n\nAd eius laborum placeat qui mollitia. Illum et facilis id neque qui et temporibus. Sed quis saepe vel est nesciunt. Adipisci aliquam voluptatem culpa cumque quis consequatur vel fugit. Cupiditate iste mollitia quia.\n\nMolestias natus aspernatur ea dolorem ratione dolorum. Rerum quis ratione est dolor distinctio molestiae. Accusantium libero et itaque in molestiae id.', 'Miss Raquel Kub MD', '2021-09-27 21:55:35', 2, 13, 1, '2023-04-11 16:39:13', NULL),
(56, 'Aspernatur molestiae autem veniam impedit officiis repellat.', 'Doloremque optio dignissimos dolorem iure non quis sed. Cumque numquam eos quisquam porro libero deleniti sint et. Eveniet quis quidem aut nesciunt odio atque. Iusto architecto ex nobis consequuntur qui aliquam animi aut.\n\nTempora quasi ab non assumenda. Aut optio corporis perspiciatis praesentium. Incidunt aliquid corrupti nemo earum.\n\nEum maiores fugit atque sunt. Quis facere eos aut rerum quo sapiente veniam. Ut voluptatem sunt inventore enim vel id sed.\n\nIusto sapiente et eos est nisi quaerat non amet. Perferendis adipisci inventore debitis dolor aut ipsam est. Beatae doloribus cum sapiente debitis omnis dolore.', 'Dr. Corbin Davis', '2022-01-01 00:28:23', 2, 14, 1, '2023-04-11 16:39:15', NULL),
(57, 'Quia repellat laborum veritatis quas consectetur voluptas a.', 'Non cupiditate ullam in esse totam. Magnam iure molestias in aut sapiente consequatur qui velit. At sunt dolores deleniti.\n\nEt accusantium non ea quibusdam. Eos velit repellendus adipisci sit est et alias explicabo. Labore quod quo necessitatibus sit quia est.\n\nUllam architecto repellat reprehenderit a quia consequatur ut. Ullam et numquam tempora nam et sunt. Maxime dolor vel cum. Quidem rerum excepturi quasi vero consequuntur.\n\nRerum ducimus ut asperiores est. Aliquid at rerum illum ea aut vel. Recusandae sit adipisci sunt saepe.', 'Glenda Nicolas', '2021-09-24 22:45:15', 2, 14, 1, '2023-04-11 16:39:17', NULL),
(58, 'Vel cum iusto similique harum.', 'Nemo et dolorum modi cupiditate. Rerum accusamus hic ratione qui rem. Repudiandae nesciunt blanditiis dolores asperiores deleniti quas commodi.\n\nExpedita commodi aperiam quia quasi. Sit animi corrupti culpa quam aliquid quaerat est. Maxime quo omnis occaecati. Dolorem esse commodi aut rerum quaerat saepe aliquam.\n\nFacere impedit ratione possimus. Ad est assumenda incidunt eveniet quo expedita sint sunt. Non voluptas magni voluptatem et reiciendis. Enim labore quis eaque adipisci. Tenetur officia quae quibusdam vitae adipisci quibusdam.\n\nFugit culpa sint quas quasi quia suscipit. Est tenetur temporibus voluptatem. Neque enim quam molestiae officia. Et necessitatibus tempora quas.', 'Dr. Tressa Schinner', '2022-07-10 00:48:35', 2, 6, 1, '2023-04-11 16:39:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_img`
--

CREATE TABLE `post_img` (
  `uid` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `img_name` varchar(50) NOT NULL,
  `img_path` varchar(80) NOT NULL DEFAULT 'uploads/posts/',
  `img_alt` varchar(50) DEFAULT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `uid` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_liked` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `uid` int(11) NOT NULL,
  `post_id` int(11) NOT NULL COMMENT 'The ID if the post',
  `tag_id` int(11) NOT NULL COMMENT 'The ID of the tag'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Show all tags related to a post';

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`uid`, `post_id`, `tag_id`) VALUES
(1, 1, 8),
(2, 1, 20),
(3, 1, 14),
(4, 2, 8),
(5, 2, 20),
(6, 2, 14),
(7, 3, 3),
(8, 3, 6),
(9, 3, 19),
(10, 4, 5),
(11, 4, 7),
(12, 4, 19),
(13, 4, 10),
(14, 4, 1),
(15, 5, 16),
(16, 5, 18),
(17, 6, 12),
(18, 6, 5),
(19, 6, 19),
(20, 7, 4),
(21, 8, 2),
(22, 9, 19),
(23, 9, 18),
(24, 9, 19),
(25, 9, 10),
(26, 10, 11),
(27, 10, 1),
(28, 10, 4),
(29, 11, 16),
(30, 11, 2),
(31, 12, 9),
(32, 13, 3),
(33, 14, 17),
(34, 14, 2),
(35, 14, 4),
(36, 15, 8),
(37, 16, 2),
(38, 17, 8),
(39, 17, 12),
(40, 18, 1),
(41, 18, 14),
(42, 18, 14),
(43, 19, 1),
(44, 19, 18),
(45, 20, 11),
(46, 20, 9),
(47, 20, 20),
(48, 20, 17),
(49, 20, 18),
(50, 21, 7),
(51, 21, 19),
(52, 21, 2),
(53, 22, 3),
(54, 22, 5),
(55, 22, 12),
(56, 22, 6),
(57, 23, 10),
(58, 23, 20),
(59, 24, 12),
(60, 24, 4),
(61, 24, 3),
(62, 25, 15),
(63, 25, 9),
(64, 25, 8),
(65, 25, 7),
(66, 25, 2),
(67, 26, 7),
(68, 26, 8),
(69, 27, 2),
(70, 27, 1),
(71, 27, 5),
(72, 27, 17),
(73, 28, 3),
(74, 28, 1),
(75, 29, 4),
(76, 30, 10),
(77, 30, 15),
(78, 30, 19),
(79, 30, 2),
(80, 30, 10),
(81, 31, 17),
(82, 31, 4),
(83, 31, 9),
(84, 32, 11),
(85, 33, 7),
(86, 33, 19),
(87, 33, 14),
(88, 34, 18),
(89, 34, 10),
(90, 34, 20),
(91, 34, 17),
(92, 35, 7),
(93, 35, 10),
(94, 35, 7),
(95, 36, 3),
(96, 36, 8),
(97, 36, 12),
(98, 37, 11),
(99, 37, 4),
(100, 38, 8),
(101, 38, 19),
(102, 38, 18),
(103, 38, 17),
(104, 38, 8),
(105, 39, 17),
(106, 39, 2),
(107, 39, 19),
(108, 39, 2),
(109, 40, 17),
(110, 40, 18),
(111, 40, 8),
(112, 41, 18),
(113, 41, 10),
(114, 42, 19),
(115, 42, 8),
(116, 42, 17),
(117, 42, 1),
(118, 42, 1),
(119, 43, 19),
(120, 43, 2),
(121, 43, 9),
(122, 43, 11),
(123, 43, 7),
(124, 44, 8),
(125, 44, 3),
(126, 45, 20),
(127, 45, 2),
(128, 45, 6),
(129, 46, 12),
(130, 47, 8),
(131, 47, 16),
(132, 47, 10),
(133, 47, 5),
(134, 48, 8),
(135, 49, 3),
(136, 49, 3),
(137, 49, 16),
(138, 50, 5),
(139, 50, 4),
(140, 51, 8),
(141, 51, 5),
(142, 52, 17),
(143, 52, 16),
(144, 53, 16),
(145, 53, 16),
(146, 53, 14),
(147, 54, 2),
(148, 54, 18),
(149, 54, 1),
(150, 54, 5),
(151, 55, 11),
(152, 55, 17),
(153, 56, 11),
(154, 57, 13),
(155, 58, 12),
(156, 58, 5),
(157, 58, 5),
(158, 58, 9),
(159, 58, 14);

-- --------------------------------------------------------

--
-- Table structure for table `post_views`
--

CREATE TABLE `post_views` (
  `uid` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `last_viewed` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Show number of views for a post and last time viewed';

--
-- Dumping data for table `post_views`
--

INSERT INTO `post_views` (`uid`, `post_id`, `view_count`, `last_viewed`) VALUES
(1, 50, 5, '2023-04-11 22:59:23'),
(2, 19, 3, '2023-04-11 21:59:23'),
(3, 9, 10, '2023-04-12 00:40:52'),
(4, 36, 7, '2023-04-12 00:40:52'),
(5, 55, 2, '2023-04-12 00:40:52'),
(6, 34, 1, '2023-04-12 00:40:52'),
(7, 37, 15, '2023-04-12 00:40:52'),
(8, 42, 4, '2023-04-12 00:40:52');

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
-- Indexes for table `post_img`
--
ALTER TABLE `post_img`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_status`
--
ALTER TABLE `post_status`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `post_views`
--
ALTER TABLE `post_views`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `post_id` (`post_id`);

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
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `post_img`
--
ALTER TABLE `post_img`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_status`
--
ALTER TABLE `post_status`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `post_views`
--
ALTER TABLE `post_views`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
