-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2024 at 10:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maisonneuve`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maisonn_etudiants`
--

CREATE TABLE `maisonn_etudiants` (
  `id` bigint(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `birthday` date NOT NULL,
  `ville_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maisonn_etudiants`
--

INSERT INTO `maisonn_etudiants` (`id`, `name`, `address`, `phone`, `email`, `birthday`, `ville_id`) VALUES
(1, 'Antonette Walker', '4651 Chanel Dale Suite 913\nMarjolaineshire, LA 44251', '1-740-288-6537', 'allison76@gmail.com', '2001-11-05', 4),
(2, 'Sam Batz', '394 Liam Cliffs\nEast Elliot, ID 61805-4420', '682-593-7930', 'romaguera.ardith@kiehn.com', '1978-03-21', 5),
(3, 'Annabelle Rippin', '407 Shana Locks Suite 444\nEast Eve, NV 69423-8176', '1-802-852-8259', 'aurelia.gibson@braun.com', '2002-02-26', 12),
(4, 'Kianna Rempel', '9498 Heaney Via Suite 598\nWest Waltonland, MN 79402', '912-805-0707', 'imcclure@durgan.org', '2005-04-28', 12),
(5, 'Reuben Hermiston', '900 Nader Spur\nJordanville, AL 68800', '937-751-2820', 'dubuque.veronica@gmail.com', '1981-11-15', 14),
(6, 'Tyshawn Bahringer', '2966 Chaz Creek\nNewtonton, AL 57716-5724', '+1.346.485.3659', 'mara39@weimann.com', '1992-06-02', 13),
(7, 'Elliott Kerluke', '898 Bridget Mountains Apt. 132\nSchillerport, NM 79409', '(510) 391-7988', 'ari.heaney@hotmail.com', '2000-05-06', 12),
(8, 'Kristian Osinski', '337 Brenden Circles\nSouth Monica, VA 02410-9788', '+1-214-921-2263', 'ashleigh.kilback@gmail.com', '1982-07-29', 2),
(9, 'Odell Smith', '31731 Schultz Union Apt. 456\nPort Sabrina, NY 24423-4951', '+1.205.517.4474', 'vtrantow@hotmail.com', '1991-01-15', 7),
(10, 'Alberto Ebert', '3522 McCullough Via Suite 842\nKilbackville, NH 43793', '(573) 205-7592', 'pollich.earl@okon.com', '1989-11-13', 4),
(11, 'Ronaldo Gutkowski', '495 Mertz Terrace Suite 546\nEast Eliseoberg, AL 59664', '+1.802.682.3272', 'jenifer60@weber.com', '1996-10-06', 1),
(12, 'Charles Hyatt', '13896 Lakin Mews Suite 512\nSchmidtville, MD 61616', '+1-520-594-0089', 'tania01@yahoo.com', '2021-03-28', 15),
(13, 'Natalia Turcotte', '311 Wiza Brooks\nDanialfort, NV 69717', '+14145101247', 'alisa16@gmail.com', '2013-12-18', 7),
(14, 'Chasity VonRueden', '193 Stehr Brooks\nEast Jalynville, OK 67924', '+1 (646) 220-4995', 'stephany68@toy.com', '1987-04-03', 14),
(15, 'Orpha Runolfsdottir', '623 Toy Flat Apt. 825\nEast Orlando, MA 79444', '+1-279-524-5114', 'lockman.carmen@hotmail.com', '2014-06-26', 8),
(16, 'D\'angelo Batz', '87718 Jensen Mills Apt. 965\nMozellland, GA 26630', '+1-253-544-7890', 'myrl.streich@haley.com', '1984-04-16', 8),
(17, 'Alessia Hamill', '5171 Lubowitz Via\nLake Danny, NJ 03494', '1-361-402-4249', 'carroll.iva@hotmail.com', '1979-02-06', 14),
(18, 'Alvina Durgan', '26423 Hauck Branch\nPort Edgar, AL 45730-4326', '+1-573-790-1264', 'isai.little@king.com', '1972-07-21', 14),
(19, 'Frederic Dickens', '32495 Imani Springs Apt. 845\nWest Emanuel, PA 07501', '680-299-6682', 'hollie33@batz.com', '1991-05-18', 14),
(20, 'Ivy Ryan', '356 Jason Roads Apt. 042\nEast Leonel, TN 58229', '(336) 778-7885', 'julius84@botsford.org', '2019-05-13', 8),
(21, 'Eveline Schultz', '20429 D\'Amore Knoll Suite 740\nWest Evan, OR 64698', '662.586.9405', 'zstoltenberg@hodkiewicz.info', '2006-06-08', 15),
(22, 'Shanny Volkman', '48164 Hand Valleys\nSouth Katrineshire, UT 73663-7713', '+1-347-677-2693', 'maurine02@yahoo.com', '1970-11-08', 14),
(23, 'Gunnar Grant', '73703 Sanford Lane\nDiannachester, NE 82244-4604', '+13207439630', 'raul.zemlak@gmail.com', '1995-04-10', 1),
(24, 'Edd Torp', '23273 Schumm Trail\nLake Barney, AZ 27218', '1-772-478-2565', 'bbeer@cassin.com', '1973-06-16', 11),
(25, 'Abbey Bednar', '657 Alfred Plains\nLake Toyton, VT 84232-6362', '+1-540-494-9866', 'mandy58@gmail.com', '2015-04-18', 7),
(26, 'Bernita Lowe', '5322 Wiegand Hill Apt. 230\nLangoshview, IL 28817', '231.730.7808', 'ptromp@yahoo.com', '1974-11-09', 12),
(27, 'Carissa Krajcik', '9151 Sporer Motorway\nNorth Makenna, AK 30136', '+17855947299', 'simonis.creola@kuvalis.com', '2000-05-10', 11),
(28, 'Helene Parker', '3189 Brody Union Apt. 238\nNew Kareem, WA 14336-1126', '+1.774.987.1145', 'weber.eden@hotmail.com', '1980-04-05', 9),
(29, 'Mitchell Franecki', '93546 Reba Knoll\nSouth Hobart, MS 91382', '+1 (903) 466-1182', 'tracy98@emard.net', '2023-07-22', 11),
(30, 'Forest Wilderman', '5013 Terrence Knoll\nNew Lelafort, TN 99937', '+1.984.746.0457', 'oconnell.duane@halvorson.org', '2014-11-30', 11),
(31, 'Elwyn Hilpert', '2998 Tromp Crossing\nBogisichfort, NJ 70590', '1-718-363-6410', 'cornelius.prosacco@gmail.com', '1996-03-17', 1),
(32, 'Lyla Lebsack', '76891 Hahn Trafficway Suite 159\nLake Jensenland, WY 55943', '+1 (443) 519-7420', 'grimes.karelle@yahoo.com', '2014-06-28', 10),
(33, 'Ernie Bogisich', '1121 Reynolds Freeway\nJoanyville, AR 37181-4005', '(432) 670-7156', 'coleman.koss@yahoo.com', '2017-05-20', 13),
(34, 'Dustin Reilly', '737 Larue Springs Suite 497\nMadalineside, PA 13857', '+17153442458', 'greenholt.constance@mante.com', '1998-12-07', 10),
(35, 'Mae Bednar', '693 Runolfsdottir Plaza Apt. 000\nNew Favian, MS 12150-3013', '+1-484-689-5637', 'nhagenes@reynolds.com', '1999-09-11', 9),
(36, 'Antonette Mueller', '86204 Ulises Islands Suite 703\nPort Kanestad, AZ 42242', '754-871-0789', 'thomas19@gmail.com', '1976-01-30', 1),
(37, 'Alisa Huels', '159 Jedediah Stream Apt. 654\nPort Erichstad, WI 01599', '+1.218.330.3074', 'rylan.zieme@abshire.com', '1996-08-23', 5),
(38, 'Easton Stroman', '523 Nya Valley\nPort Melvinland, CO 18883-6710', '+1-260-920-3523', 'mafalda.heaney@yahoo.com', '1993-04-06', 7),
(39, 'Kendall Hermiston', '90560 Schmidt Harbor\nKatrineshire, NM 42081-8492', '+1.680.561.1647', 'christiansen.coby@hotmail.com', '2022-11-18', 11),
(40, 'Ena Gleichner', '806 Brandy Shoals\nGarrystad, NH 30761-4485', '+16268554599', 'cale29@hotmail.com', '1974-03-25', 4),
(41, 'Rodrigo Ledner', '72416 Hilpert Mills\nBergnaumton, OH 43250', '(724) 286-4860', 'cyrus.osinski@gmail.com', '1987-08-10', 11),
(42, 'Ned Hodkiewicz', '379 Jakubowski Parkway Suite 940\nWest Myahport, CA 73730', '201-332-1834', 'rudolph.hettinger@bogisich.net', '1975-07-05', 1),
(43, 'Maybell Leannon', '4969 Myles Island Suite 194\nSouth Gerda, AK 90339', '(952) 345-0497', 'karolann56@gmail.com', '1971-07-24', 5),
(44, 'Hazel Botsford', '62343 Boehm Cape\nJastton, SD 32484', '+16616197414', 'seth42@bechtelar.com', '2011-03-28', 6),
(45, 'Jocelyn Koelpin', '875 Mario Station Suite 857\nWest Estelleberg, AR 47857-5641', '+1 (870) 242-2344', 'cwaelchi@conroy.org', '1977-02-15', 13),
(46, 'Kristoffer Will', '6438 Graham Villages Suite 034\nPort Joestad, MT 60889', '+18204580853', 'kaleigh54@crooks.com', '1974-06-27', 13),
(47, 'Gino Wilderman', '45865 Leannon Point\nSchowaltermouth, MS 90005', '860-258-5001', 'selmer11@hotmail.com', '1995-03-21', 13),
(48, 'Robbie Considine', '32921 Nolan Falls\nPort Nyasia, WA 54215', '+1-689-244-0991', 'uhuel@yahoo.com', '1982-09-12', 11),
(49, 'Ariel Toy', '36367 Jett Valleys Suite 145\nEast Delilah, AK 01871', '(570) 987-5177', 'berge.olen@gmail.com', '1992-10-22', 9),
(50, 'Lempi Bernier', '4795 Issac Plains\nLionelport, NM 81699-7151', '1-708-612-0323', 'tcassin@hotmail.com', '1984-07-14', 9),
(51, 'Sofia Langworth', '4303 Shawn Cove\nTorphaven, MA 26288-2753', '1-640-476-2958', 'jordyn28@cormier.net', '1972-08-30', 4),
(52, 'Halle Rutherford', '634 Zboncak Fork Suite 357\nPort Leland, WV 07889', '1-707-868-1214', 'tia03@waelchi.com', '1995-11-18', 1),
(53, 'Antoinette Sauer', '516 Schaden Glen\nLake Adah, RI 56705', '708-461-5211', 'richard.donnelly@yahoo.com', '2016-11-11', 5),
(54, 'Josephine Goodwin', '2908 Huels Fall Apt. 069\nHyatttown, CT 97660-7448', '860-512-5828', 'brooke.collins@hotmail.com', '1996-12-31', 4),
(55, 'Gerson Brown', '57031 Daron Ranch\nLake Eileen, LA 72378-4399', '425-934-1173', 'mayert.jay@gmail.com', '1983-01-31', 13),
(56, 'Noel Considine', '48088 VonRueden Common\nWizafort, VT 75949', '520-479-0954', 'maci84@yahoo.com', '1989-04-02', 1),
(57, 'Concepcion Stracke', '55992 Bernhard Way\nBatztown, NM 33436-3744', '+16302623664', 'fgrady@hotmail.com', '2004-05-07', 13),
(58, 'Jennings Collins', '640 Kessler View\nSouth Ettie, IL 77458-7227', '754-206-8327', 'francis.russel@yahoo.com', '1974-03-17', 6),
(59, 'Ben Ferry', '864 Vincent Creek\nJonathanhaven, RI 72721-4393', '+1-828-922-3537', 'lysanne69@yahoo.com', '2004-09-21', 3),
(60, 'Darwin Murray', '208 Imogene Isle Apt. 278\nJacefurt, VT 20844', '(341) 558-7163', 'maritza50@zulauf.info', '2022-04-26', 4),
(61, 'Bette Price', '896 Margarette Fall\nBrendaton, NV 04279', '240-802-3666', 'thomas.rogahn@gmail.com', '2004-03-21', 1),
(62, 'Rosanna Hyatt', '88595 Emanuel View Suite 612\nWest Charles, NH 79460', '+18129748355', 'ysteuber@gmail.com', '1984-09-14', 11),
(63, 'Zena Pollich', '7156 Bednar Drives\nColechester, WV 08979', '+1-717-387-5046', 'hadley21@stiedemann.biz', '1988-04-06', 14),
(64, 'Elvis Borer', '4848 Mueller Haven\nSchmelerchester, NC 58689', '1-234-957-2845', 'uriel94@cruickshank.com', '1994-03-27', 6),
(65, 'Montana Frami', '62550 Effertz Hill\nBaileyburgh, WY 88249-7657', '+1-520-912-1831', 'bjaskolski@gmail.com', '1997-10-18', 7),
(66, 'Arlie Johnston', '412 Wiza Springs Apt. 681\nWest Jasminbury, GA 79100-8121', '(631) 479-6618', 'howell91@zieme.com', '2008-05-11', 10),
(67, 'Elza Bashirian', '388 Justice View Apt. 868\nNew Carlotta, IL 18359', '+1.929.419.1915', 'bria12@beahan.org', '1972-01-10', 2),
(68, 'Sigurd Satterfield', '49097 Manuela Forks Apt. 306\nLake Vadamouth, TX 11885', '(301) 237-4245', 'mitchell.eldora@gmail.com', '2016-02-03', 8),
(69, 'Brandy Pouros', '258 Hope Islands Apt. 810\nKevinshire, MN 50647-6441', '1-831-757-1353', 'greenholt.alvis@jacobson.com', '1974-02-03', 13),
(70, 'Raoul Purdy', '5858 White Squares\nPort Penelopemouth, GA 80508-5231', '+1 (660) 585-3499', 'roselyn68@murray.com', '1970-01-26', 3),
(71, 'Maiya Hills', '18079 Antone Oval Apt. 701\nHarveybury, WV 26672-4415', '(585) 922-1623', 'shyanne87@volkman.biz', '1978-12-20', 3),
(72, 'Mckenna Gerlach', '5701 Steuber Key\nSavanahstad, MS 62128-6033', '+1-708-605-8255', 'london19@howe.biz', '2011-04-27', 4),
(73, 'Kali Hoeger', '5607 Keebler Summit\nWillmsfurt, CA 36263-8650', '(425) 713-5743', 'hoppe.brayan@dooley.com', '1997-02-26', 9),
(74, 'Kaitlyn Beatty', '3934 Jovany Village Apt. 219\nEast Eulafort, MO 72543', '623-569-8190', 'fkuhlman@casper.com', '1995-06-18', 2),
(75, 'Drew Witting', '217 Purdy Points\nAstridborough, MS 43629', '(934) 931-0113', 'hegmann.kyla@bartoletti.com', '1988-08-29', 4),
(76, 'Elfrieda Lesch', '51328 Alexa Mountains\nNew Fredy, TX 05137', '(570) 250-6744', 'marion.jakubowski@goyette.biz', '2004-04-28', 12),
(77, 'Golda McDermott', '58308 Jast Mountain\nKreigerchester, NJ 92729', '1-320-471-6596', 'pollich.fredrick@nicolas.org', '2017-05-14', 8),
(78, 'Blaise Wehner', '4615 Kallie Wells\nGrahamhaven, NY 16458', '+1.959.937.1331', 'ehodkiewicz@maggio.com', '2018-10-06', 2),
(79, 'Emily Bailey', '9272 Janick Track Apt. 446\nNew Amparoport, ID 77159', '+1-838-369-8393', 'victoria53@johnston.org', '1982-07-02', 13),
(80, 'Celia Kiehn', '53853 Heller Via Suite 868\nNorth Edwinaland, WV 31521', '(571) 516-6190', 'lokon@yahoo.com', '2004-01-07', 10),
(81, 'Curt Ruecker', '8278 Llewellyn Hill\nGeneralhaven, KY 64653', '820.787.7501', 'hryan@gmail.com', '2008-11-14', 1),
(82, 'Joel Greenfelder', '6837 Rippin Camp Suite 261\nWest Donnell, TN 64634-2944', '+1-423-412-6607', 'obartell@gmail.com', '2003-02-26', 8),
(83, 'Claudia Parisian', '730 Dickinson Way\nBrooksburgh, VT 41427-4100', '908.706.1186', 'aterry@durgan.com', '2008-11-06', 11),
(84, 'Breanne Mills', '2565 Runolfsdottir Course Suite 829\nPfefferborough, MI 73569', '(775) 579-6315', 'hmosciski@yahoo.com', '1978-11-26', 14),
(85, 'Gabriel Haag', '90839 Florida Unions Apt. 773\nRickeyfurt, IN 44093', '(703) 809-4110', 'athiel@stracke.com', '2018-11-01', 1),
(86, 'Selina Boehm', '10843 Hayes Terrace\nChristiansenshire, OK 66102', '903-451-8104', 'wspinka@yahoo.com', '2016-02-28', 12),
(87, 'Percy Nikolaus', '5842 Ethyl Ridges\nMylesmouth, NH 67060-8409', '708.398.1099', 'schowalter.shanon@gleason.com', '1999-02-22', 8),
(88, 'Moises Friesen', '73242 Humberto Vista Apt. 674\nLake Johnathan, PA 69704-5145', '1-606-320-6047', 'shayna56@schultz.com', '1977-01-03', 11),
(89, 'Newell Hettinger', '7448 Alene Corners Apt. 191\nFlatleyton, MI 91320', '+1.256.266.7875', 'armstrong.madisen@hegmann.com', '1978-11-25', 10),
(90, 'Dorcas Terry', '55077 Leannon Estate\nFredafort, TN 90507', '+1.667.661.3226', 'schimmel.laurianne@welch.net', '2014-07-01', 8),
(91, 'Janessa Kozey', '48023 Candido Lights\nHickletown, GA 39386', '+16619013807', 'pstoltenberg@gmail.com', '1987-02-23', 3),
(92, 'Brooks Wyman', '2570 Weimann Mountains Apt. 016\nWest Jazminborough, DE 87229-0638', '+1-986-548-8875', 'cassin.eloise@yahoo.com', '1993-05-21', 10),
(93, 'Jayne Feest', '17844 Allan Way Apt. 790\nEast Amaniberg, NE 69985', '347.534.5751', 'konopelski.cyril@mccullough.com', '1976-06-17', 12),
(94, 'Clifford Stamm', '83094 West River\nEast Creolaview, WI 88935-5233', '1-283-378-2993', 'kutch.charity@runte.com', '1983-01-13', 6),
(95, 'Neha Gutmann', '140 Hickle Well Apt. 078\nNew Kayla, FL 14612-2557', '+1-315-574-6480', 'sally76@jacobi.net', '1972-06-10', 4),
(96, 'Alex Nitzsche', '78186 Dibbert Islands Apt. 104\nWest Alivia, NV 30788', '(520) 909-1007', 'hkemmer@hotmail.com', '2013-07-07', 2),
(97, 'Edd Hill', '45101 Hahn Pines\nChelseyville, WA 76501-1178', '+1-339-310-9768', 'adriana.hane@hotmail.com', '2004-04-25', 9),
(98, 'Jalon Zieme', '249 D\'Amore Green\nPort Henriton, IA 08806-8622', '+1 (330) 465-0758', 'rosa.konopelski@gmail.com', '1996-04-05', 1),
(99, 'Alfonzo Thiel', '6516 Lemke Neck Suite 670\nSouth Morton, WA 70086', '+1 (678) 280-1310', 'vmraz@gmail.com', '2009-08-23', 2),
(100, 'Electa Hane', '337 Maudie Bridge Suite 308\nAnabelhaven, MI 78419', '+1-689-743-5332', 'randal42@block.com', '2021-04-23', 9);

-- --------------------------------------------------------

--
-- Table structure for table `maisonn_villes`
--

CREATE TABLE `maisonn_villes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maisonn_villes`
--

INSERT INTO `maisonn_villes` (`id`, `name`) VALUES
(5, 'Gastonmouth'),
(15, 'Hilperttown'),
(12, 'Hoegerville'),
(2, 'Kassulkeshire'),
(10, 'Lake Garnettchester'),
(13, 'Lake Kassandraburgh'),
(7, 'Lake Micaelafurt'),
(8, 'New Kelley'),
(1, 'New Loren'),
(14, 'Port Albertha'),
(3, 'Schroederville'),
(11, 'Trompfort'),
(9, 'Ullrichbury'),
(6, 'West Milford'),
(4, 'West Nevaberg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_13_212723_create_villes_table', 1),
(6, '2023_12_13_212725_create_etudiants_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `maisonn_etudiants`
--
ALTER TABLE `maisonn_etudiants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `etudiants_email_unique` (`email`),
  ADD KEY `etudiants_ville_id_foreign` (`ville_id`);

--
-- Indexes for table `maisonn_villes`
--
ALTER TABLE `maisonn_villes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `villes_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maisonn_etudiants`
--
ALTER TABLE `maisonn_etudiants`
  MODIFY `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `maisonn_villes`
--
ALTER TABLE `maisonn_villes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `maisonn_etudiants`
--
ALTER TABLE `maisonn_etudiants`
  ADD CONSTRAINT `etudiants_ville_id_foreign` FOREIGN KEY (`ville_id`) REFERENCES `maisonn_villes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
