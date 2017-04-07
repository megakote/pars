-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Апр 07 2017 г., 13:47
-- Версия сервера: 10.1.22-MariaDB-1~jessie
-- Версия PHP: 7.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pars`
--

-- --------------------------------------------------------

--
-- Структура таблицы `querys`
--

CREATE TABLE `querys` (
  `id` int(11) NOT NULL,
  `val` text NOT NULL,
  `used` tinyint(1) DEFAULT NULL,
  `hash` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `querys`
--

INSERT INTO `querys` (`id`, `val`, `used`, `hash`) VALUES
(113, 'запрос', 1, 2938122091),
(114, 'запрос', 1, 2938122091),
(115, 'еще запрос', 1, 2797544660);

-- --------------------------------------------------------

--
-- Структура таблицы `stat`
--

CREATE TABLE `stat` (
  `id` int(11) NOT NULL,
  `queries` int(11) NOT NULL,
  `sites` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `urls`
--

CREATE TABLE `urls` (
  `id` int(11) NOT NULL,
  `url` varchar(600) NOT NULL,
  `protocol` varchar(5) NOT NULL,
  `q_id` int(11) NOT NULL,
  `hash` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `urls`
--

INSERT INTO `urls` (`id`, `url`, `protocol`, `q_id`, `hash`) VALUES
(5, 'xitfilms.ru', 'http', 113, 2257871553),
(6, 'www.fassen.net', 'http', 113, 778755532),
(7, 'www.wieistmeineip.de', 'https', 113, 3602029108),
(8, 'www.shopify.com', 'https', 113, 1154698994),
(9, 'www.psylib.ru', 'http', 113, 2218631724),
(10, 'www.nicovideo.jp', 'http', 113, 107394574),
(11, 'www.deezer.com', 'https', 113, 822857479),
(12, 'auto.ria.com', 'https', 113, 2202494609),
(13, 'gademoleech.biz', 'http', 113, 3997919309),
(14, 'www.supertangas.com', 'http', 113, 2765037312),
(15, 'turbobit.net', 'http', 113, 3684951031),
(16, 'www.gelbeseiten.de', 'http', 113, 1468167144),
(17, 'www.catch22.net', 'http', 113, 2163222378),
(18, 'www.ozspeedtest.com', 'https', 113, 1240575014),
(19, 'www.test-my-cam.com', 'http', 113, 3103521448),
(20, 'www.mensa.org', 'http', 113, 753155962),
(21, 'www.wikihow.com', 'http', 113, 3063717317),
(22, 'testdrive2017.ru', 'http', 113, 1146070875),
(23, 'test.anno-online.com', 'http', 113, 955336110),
(24, 'TestDrive2016.ru', 'http', 113, 529491394),
(25, 'www.google.es', 'http', 113, 4039265696),
(26, 'onlinetestpad.com', 'https', 113, 1421690869),
(27, 'www.englishlearner.com', 'http', 113, 2636452634),
(28, 'dict.leo.org', 'http', 113, 4244183997),
(29, 'www.whoishostingthis.com', 'http', 113, 650035049),
(30, 'test-my-cam.com', 'http', 113, 287523344),
(31, 'TestDrive2016.ru', 'http', 113, 529491394),
(32, 'www.themalaysianinsider.com', 'http', 113, 305465855),
(33, 'animeindo.web.id', 'http', 113, 98502786),
(34, 'www.answers.com', 'http', 113, 1115894987),
(35, 'BeOn.ru', 'http', 113, 3719839191),
(36, 'rainmeter.net', 'http', 113, 1277291079),
(37, 'speedtest.spb.yota.ru', 'http', 113, 4055963110),
(38, 'openvpn.net', 'https', 113, 3194255229),
(39, 'www.amurasia.ru', 'http', 113, 1509845030),
(40, 'www.adme.ru', 'https', 113, 3585664725),
(41, 'speedtest.msk.yota.ru', 'http', 113, 2410848356),
(42, 'klout.com', 'https', 113, 496520768),
(43, 'tap.uz', 'http', 113, 326452577),
(44, 'mystart.incredimail.com', 'http', 113, 3272004289),
(45, 'irecommend.ru', 'https', 113, 1313423065),
(46, 'pc.shopping2.naver.com', 'http', 113, 277101229),
(47, 'pikabu.ru', 'http', 113, 548929340),
(48, 'sports.news.naver.com', 'http', 113, 1787377346),
(49, 'www.beaute-test.com', 'http', 113, 3333914190),
(50, 'matcreative.ru', 'http', 113, 3419778346),
(51, 'www.utest.com', 'https', 113, 896944277),
(52, 'finance.naver.com', 'http', 113, 3246538334),
(53, 'www.usertesting.com', 'https', 113, 779750055),
(54, 'test.i-exam.ru', 'http', 113, 1698484325),
(55, 'www.myersbriggs.org', 'http', 113, 1393562615),
(56, 'www.v-soul.com', 'http', 113, 2047832327),
(57, 'vike.uhyb.rock-n-roll.ru', 'http', 113, 373632304),
(58, 'www.assessment.com', 'http', 113, 3930238721),
(59, 'fishki.net', 'http', 113, 1186019079),
(60, 'www.overclockers.ru', 'https', 113, 3674777923),
(61, 'niku.uhyb.rock-n-roll.ru', 'http', 113, 1345290811),
(62, 'www.lovetest.com', 'http', 113, 3645195214),
(63, 'www.gratis-lagump3.com', 'http', 113, 1860831850),
(64, 'www.4tests.com', 'https', 113, 4103461579),
(65, 'niku.uhyb.rock-n-roll.ru', 'http', 113, 1345290811),
(66, 'niku.uhyb.rock-n-roll.ru', 'http', 113, 1345290811),
(67, 'www.rambler.ru', 'https', 113, 3410331151),
(68, 'diabet-test.com.ua', 'http', 113, 29234117),
(69, 'www.speedtest.com', 'http', 113, 2839235419),
(70, 'e28-forum.ru', 'http', 113, 904340061),
(71, 'test.oyunuburada.com', 'http', 113, 518118728),
(72, 'www.examenglish.com', 'http', 113, 3316360961),
(73, 'www.kolesa.ru', 'http', 113, 2664437489),
(74, 'test.novyurok.ru', 'http', 113, 92940845),
(75, 'www.hellomagazine.com', 'http', 113, 2424111349),
(76, 'www.7-zip.org', 'http', 113, 3363923217),
(77, 'soundcloud.com', 'https', 113, 2595907606),
(78, 'www.privacyware.com', 'http', 113, 1673607789),
(79, 'renault.autoportal.ua', 'http', 113, 1894376329),
(80, 'speedtest.com', 'http', 113, 3111165964),
(81, 'www.speakeasy.net', 'https', 113, 41393431),
(82, 'gamegpu.com', 'http', 113, 1118608161),
(83, 'techcrunch.com', 'https', 113, 864534071),
(84, 'www.autocentre.ua', 'https', 113, 2183438281),
(85, 'speedtest.ofca.gov.hk', 'http', 113, 849180481),
(86, 'www.InfoCar.ua', 'http', 113, 4221113569),
(87, 'www.berettausa.com', 'http', 113, 597610978),
(88, 'www.thatquiz.org', 'https', 113, 3768490432),
(89, 'www.unduhfilm21.net', 'http', 113, 2272897536),
(90, 'www.lacentrale.fr', 'http', 113, 588650076),
(91, 'dip3.fitolodas.homelinux.com', 'http', 113, 2829588041),
(92, 'effekttest.ru', 'http', 113, 1024064013),
(93, 'browsershots.org', 'http', 113, 391807004),
(94, 'WomanAdvice.ru', 'http', 113, 3048980908),
(95, 'www.mudah.my', 'http', 113, 4279248846),
(96, 'camstudio.org', 'http', 113, 1739512084),
(97, 'www.easy-burner.com', 'http', 113, 1238949825),
(98, 'www.linkomanija.net', 'https', 113, 2530027771),
(99, 'www.20minutes.fr', 'http', 113, 2206514482),
(100, 'test3.tankionline.com', 'http', 113, 2026772048),
(101, 'www.drudgereport.com', 'http', 113, 4012934079),
(102, 'www.dickssportinggoods.com', 'http', 113, 3275584965),
(103, 'test1.tankionline.com', 'http', 113, 986977972),
(104, 'www.beretta.com', 'http', 113, 3020732830),
(105, 'xitfilms.ru', 'http', 114, 2257871553),
(106, 'www.fassen.net', 'http', 114, 778755532),
(107, 'www.wieistmeineip.de', 'https', 114, 3602029108),
(108, 'www.shopify.com', 'https', 114, 1154698994),
(109, 'www.psylib.ru', 'http', 114, 2218631724),
(110, 'www.nicovideo.jp', 'http', 114, 107394574),
(111, 'www.deezer.com', 'https', 114, 822857479),
(112, 'auto.ria.com', 'https', 114, 2202494609),
(113, 'gademoleech.biz', 'http', 114, 3997919309),
(114, 'www.supertangas.com', 'http', 114, 2765037312),
(115, 'turbobit.net', 'http', 114, 3684951031),
(116, 'www.gelbeseiten.de', 'http', 114, 1468167144),
(117, 'www.catch22.net', 'http', 114, 2163222378),
(118, 'www.ozspeedtest.com', 'https', 114, 1240575014),
(119, 'www.test-my-cam.com', 'http', 114, 3103521448),
(120, 'www.mensa.org', 'http', 114, 753155962),
(121, 'www.wikihow.com', 'http', 114, 3063717317),
(122, 'testdrive2017.ru', 'http', 114, 1146070875),
(123, 'test.anno-online.com', 'http', 114, 955336110),
(124, 'TestDrive2016.ru', 'http', 114, 529491394),
(125, 'www.google.es', 'http', 114, 4039265696),
(126, 'onlinetestpad.com', 'https', 114, 1421690869),
(127, 'www.englishlearner.com', 'http', 114, 2636452634),
(128, 'dict.leo.org', 'http', 114, 4244183997),
(129, 'www.whoishostingthis.com', 'http', 114, 650035049),
(130, 'test-my-cam.com', 'http', 114, 287523344),
(131, 'TestDrive2016.ru', 'http', 114, 529491394),
(132, 'www.themalaysianinsider.com', 'http', 114, 305465855),
(133, 'animeindo.web.id', 'http', 114, 98502786),
(134, 'www.answers.com', 'http', 114, 1115894987),
(135, 'BeOn.ru', 'http', 114, 3719839191),
(136, 'rainmeter.net', 'http', 114, 1277291079),
(137, 'speedtest.spb.yota.ru', 'http', 114, 4055963110),
(138, 'openvpn.net', 'https', 114, 3194255229),
(139, 'www.amurasia.ru', 'http', 114, 1509845030),
(140, 'www.adme.ru', 'https', 114, 3585664725),
(141, 'speedtest.msk.yota.ru', 'http', 114, 2410848356),
(142, 'klout.com', 'https', 114, 496520768),
(143, 'tap.uz', 'http', 114, 326452577),
(144, 'mystart.incredimail.com', 'http', 114, 3272004289),
(145, 'irecommend.ru', 'https', 114, 1313423065),
(146, 'pc.shopping2.naver.com', 'http', 114, 277101229),
(147, 'pikabu.ru', 'http', 114, 548929340),
(148, 'sports.news.naver.com', 'http', 114, 1787377346),
(149, 'www.beaute-test.com', 'http', 114, 3333914190),
(150, 'matcreative.ru', 'http', 114, 3419778346),
(151, 'www.utest.com', 'https', 114, 896944277),
(152, 'finance.naver.com', 'http', 114, 3246538334),
(153, 'www.usertesting.com', 'https', 114, 779750055),
(154, 'test.i-exam.ru', 'http', 114, 1698484325),
(155, 'www.myersbriggs.org', 'http', 114, 1393562615),
(156, 'www.v-soul.com', 'http', 114, 2047832327),
(157, 'vike.uhyb.rock-n-roll.ru', 'http', 114, 373632304),
(158, 'www.assessment.com', 'http', 114, 3930238721),
(159, 'fishki.net', 'http', 114, 1186019079),
(160, 'www.overclockers.ru', 'https', 114, 3674777923),
(161, 'niku.uhyb.rock-n-roll.ru', 'http', 114, 1345290811),
(162, 'www.lovetest.com', 'http', 114, 3645195214),
(163, 'www.gratis-lagump3.com', 'http', 114, 1860831850),
(164, 'www.4tests.com', 'https', 114, 4103461579),
(165, 'niku.uhyb.rock-n-roll.ru', 'http', 114, 1345290811),
(166, 'niku.uhyb.rock-n-roll.ru', 'http', 114, 1345290811),
(167, 'www.rambler.ru', 'https', 114, 3410331151),
(168, 'diabet-test.com.ua', 'http', 114, 29234117),
(169, 'www.speedtest.com', 'http', 114, 2839235419),
(170, 'e28-forum.ru', 'http', 114, 904340061),
(171, 'test.oyunuburada.com', 'http', 114, 518118728),
(172, 'www.examenglish.com', 'http', 114, 3316360961),
(173, 'www.kolesa.ru', 'http', 114, 2664437489),
(174, 'test.novyurok.ru', 'http', 114, 92940845),
(175, 'www.hellomagazine.com', 'http', 114, 2424111349),
(176, 'www.7-zip.org', 'http', 114, 3363923217),
(177, 'soundcloud.com', 'https', 114, 2595907606),
(178, 'www.privacyware.com', 'http', 114, 1673607789),
(179, 'renault.autoportal.ua', 'http', 114, 1894376329),
(180, 'speedtest.com', 'http', 114, 3111165964),
(181, 'www.speakeasy.net', 'https', 114, 41393431),
(182, 'gamegpu.com', 'http', 114, 1118608161),
(183, 'techcrunch.com', 'https', 114, 864534071),
(184, 'www.autocentre.ua', 'https', 114, 2183438281),
(185, 'speedtest.ofca.gov.hk', 'http', 114, 849180481),
(186, 'www.InfoCar.ua', 'http', 114, 4221113569),
(187, 'www.berettausa.com', 'http', 114, 597610978),
(188, 'www.thatquiz.org', 'https', 114, 3768490432),
(189, 'www.unduhfilm21.net', 'http', 114, 2272897536),
(190, 'www.lacentrale.fr', 'http', 114, 588650076),
(191, 'dip3.fitolodas.homelinux.com', 'http', 114, 2829588041),
(192, 'effekttest.ru', 'http', 114, 1024064013),
(193, 'browsershots.org', 'http', 114, 391807004),
(194, 'WomanAdvice.ru', 'http', 114, 3048980908),
(195, 'www.mudah.my', 'http', 114, 4279248846),
(196, 'camstudio.org', 'http', 114, 1739512084),
(197, 'www.easy-burner.com', 'http', 114, 1238949825),
(198, 'www.linkomanija.net', 'https', 114, 2530027771),
(199, 'www.20minutes.fr', 'http', 114, 2206514482),
(200, 'test3.tankionline.com', 'http', 114, 2026772048),
(201, 'www.drudgereport.com', 'http', 114, 4012934079),
(202, 'www.dickssportinggoods.com', 'http', 114, 3275584965),
(203, 'test1.tankionline.com', 'http', 114, 986977972),
(204, 'www.beretta.com', 'http', 114, 3020732830),
(205, 'xitfilms.ru', 'http', 115, 2257871553),
(206, 'www.fassen.net', 'http', 115, 778755532),
(207, 'www.wieistmeineip.de', 'https', 115, 3602029108),
(208, 'www.shopify.com', 'https', 115, 1154698994),
(209, 'www.psylib.ru', 'http', 115, 2218631724),
(210, 'www.nicovideo.jp', 'http', 115, 107394574),
(211, 'www.deezer.com', 'https', 115, 822857479),
(212, 'auto.ria.com', 'https', 115, 2202494609),
(213, 'gademoleech.biz', 'http', 115, 3997919309),
(214, 'www.supertangas.com', 'http', 115, 2765037312),
(215, 'turbobit.net', 'http', 115, 3684951031),
(216, 'www.gelbeseiten.de', 'http', 115, 1468167144),
(217, 'www.catch22.net', 'http', 115, 2163222378),
(218, 'www.ozspeedtest.com', 'https', 115, 1240575014),
(219, 'www.test-my-cam.com', 'http', 115, 3103521448),
(220, 'www.mensa.org', 'http', 115, 753155962),
(221, 'www.wikihow.com', 'http', 115, 3063717317),
(222, 'testdrive2017.ru', 'http', 115, 1146070875),
(223, 'test.anno-online.com', 'http', 115, 955336110),
(224, 'TestDrive2016.ru', 'http', 115, 529491394),
(225, 'www.google.es', 'http', 115, 4039265696),
(226, 'onlinetestpad.com', 'https', 115, 1421690869),
(227, 'www.englishlearner.com', 'http', 115, 2636452634),
(228, 'dict.leo.org', 'http', 115, 4244183997),
(229, 'www.whoishostingthis.com', 'http', 115, 650035049),
(230, 'test-my-cam.com', 'http', 115, 287523344),
(231, 'TestDrive2016.ru', 'http', 115, 529491394),
(232, 'www.themalaysianinsider.com', 'http', 115, 305465855),
(233, 'animeindo.web.id', 'http', 115, 98502786),
(234, 'www.answers.com', 'http', 115, 1115894987),
(235, 'BeOn.ru', 'http', 115, 3719839191),
(236, 'rainmeter.net', 'http', 115, 1277291079),
(237, 'speedtest.spb.yota.ru', 'http', 115, 4055963110),
(238, 'openvpn.net', 'https', 115, 3194255229),
(239, 'www.amurasia.ru', 'http', 115, 1509845030),
(240, 'www.adme.ru', 'https', 115, 3585664725),
(241, 'speedtest.msk.yota.ru', 'http', 115, 2410848356),
(242, 'klout.com', 'https', 115, 496520768),
(243, 'tap.uz', 'http', 115, 326452577),
(244, 'mystart.incredimail.com', 'http', 115, 3272004289),
(245, 'irecommend.ru', 'https', 115, 1313423065),
(246, 'pc.shopping2.naver.com', 'http', 115, 277101229),
(247, 'pikabu.ru', 'http', 115, 548929340),
(248, 'sports.news.naver.com', 'http', 115, 1787377346),
(249, 'www.beaute-test.com', 'http', 115, 3333914190),
(250, 'matcreative.ru', 'http', 115, 3419778346),
(251, 'www.utest.com', 'https', 115, 896944277),
(252, 'finance.naver.com', 'http', 115, 3246538334),
(253, 'www.usertesting.com', 'https', 115, 779750055),
(254, 'test.i-exam.ru', 'http', 115, 1698484325),
(255, 'www.myersbriggs.org', 'http', 115, 1393562615),
(256, 'www.v-soul.com', 'http', 115, 2047832327),
(257, 'vike.uhyb.rock-n-roll.ru', 'http', 115, 373632304),
(258, 'www.assessment.com', 'http', 115, 3930238721),
(259, 'fishki.net', 'http', 115, 1186019079),
(260, 'www.overclockers.ru', 'https', 115, 3674777923),
(261, 'niku.uhyb.rock-n-roll.ru', 'http', 115, 1345290811),
(262, 'www.lovetest.com', 'http', 115, 3645195214),
(263, 'www.gratis-lagump3.com', 'http', 115, 1860831850),
(264, 'www.4tests.com', 'https', 115, 4103461579),
(265, 'niku.uhyb.rock-n-roll.ru', 'http', 115, 1345290811),
(266, 'niku.uhyb.rock-n-roll.ru', 'http', 115, 1345290811),
(267, 'www.rambler.ru', 'https', 115, 3410331151),
(268, 'diabet-test.com.ua', 'http', 115, 29234117),
(269, 'www.speedtest.com', 'http', 115, 2839235419),
(270, 'e28-forum.ru', 'http', 115, 904340061),
(271, 'test.oyunuburada.com', 'http', 115, 518118728),
(272, 'www.examenglish.com', 'http', 115, 3316360961),
(273, 'www.kolesa.ru', 'http', 115, 2664437489),
(274, 'test.novyurok.ru', 'http', 115, 92940845),
(275, 'www.hellomagazine.com', 'http', 115, 2424111349),
(276, 'www.7-zip.org', 'http', 115, 3363923217),
(277, 'soundcloud.com', 'https', 115, 2595907606),
(278, 'www.privacyware.com', 'http', 115, 1673607789),
(279, 'renault.autoportal.ua', 'http', 115, 1894376329),
(280, 'speedtest.com', 'http', 115, 3111165964),
(281, 'www.speakeasy.net', 'https', 115, 41393431),
(282, 'gamegpu.com', 'http', 115, 1118608161),
(283, 'techcrunch.com', 'https', 115, 864534071),
(284, 'www.autocentre.ua', 'https', 115, 2183438281),
(285, 'speedtest.ofca.gov.hk', 'http', 115, 849180481),
(286, 'www.InfoCar.ua', 'http', 115, 4221113569),
(287, 'www.berettausa.com', 'http', 115, 597610978),
(288, 'www.thatquiz.org', 'https', 115, 3768490432),
(289, 'www.unduhfilm21.net', 'http', 115, 2272897536),
(290, 'www.lacentrale.fr', 'http', 115, 588650076),
(291, 'dip3.fitolodas.homelinux.com', 'http', 115, 2829588041),
(292, 'effekttest.ru', 'http', 115, 1024064013),
(293, 'browsershots.org', 'http', 115, 391807004),
(294, 'WomanAdvice.ru', 'http', 115, 3048980908),
(295, 'www.mudah.my', 'http', 115, 4279248846),
(296, 'camstudio.org', 'http', 115, 1739512084),
(297, 'www.easy-burner.com', 'http', 115, 1238949825),
(298, 'www.linkomanija.net', 'https', 115, 2530027771),
(299, 'www.20minutes.fr', 'http', 115, 2206514482),
(300, 'test3.tankionline.com', 'http', 115, 2026772048),
(301, 'www.drudgereport.com', 'http', 115, 4012934079),
(302, 'www.dickssportinggoods.com', 'http', 115, 3275584965),
(303, 'test1.tankionline.com', 'http', 115, 986977972),
(304, 'www.beretta.com', 'http', 115, 3020732830);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `querys`
--
ALTER TABLE `querys`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `urls`
--
ALTER TABLE `urls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `q_id` (`q_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `querys`
--
ALTER TABLE `querys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT для таблицы `urls`
--
ALTER TABLE `urls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `urls`
--
ALTER TABLE `urls`
  ADD CONSTRAINT `urls_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `querys` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
