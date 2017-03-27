-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3305
-- Время создания: Мар 10 2017 г., 12:03
-- Версия сервера: 5.5.50
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `myparser`
--

-- --------------------------------------------------------

--
-- Структура таблицы `stat`
--

CREATE TABLE IF NOT EXISTS `stat` (
  `id` int(11) NOT NULL,
  `queries` int(11) NOT NULL,
  `sites` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `urls`
--

CREATE TABLE IF NOT EXISTS `urls` (
  `id` int(11) NOT NULL,
  `url` varchar(600) NOT NULL,
  `protocol` varchar(5) NOT NULL,
  `hash` bigint(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `urls`
--

INSERT INTO `urls` (`id`, `url`, `protocol`, `hash`) VALUES
(1, 'xitfilms.ru', 'http', 2257871553),
(2, 'www.fassen.net', 'http', 778755532),
(3, 'www.wieistmeineip.de', 'https', 3602029108),
(4, 'www.shopify.com', 'https', 1154698994),
(5, 'www.psylib.ru', 'http', 2218631724),
(6, 'www.nicovideo.jp', 'http', 107394574),
(7, 'www.deezer.com', 'https', 822857479),
(8, 'auto.ria.com', 'https', 2202494609),
(9, 'gademoleech.biz', 'http', 3997919309),
(10, 'www.supertangas.com', 'http', 2765037312),
(11, 'turbobit.net', 'http', 3684951031),
(12, 'www.gelbeseiten.de', 'http', 1468167144),
(13, 'www.catch22.net', 'http', 2163222378),
(14, 'www.ozspeedtest.com', 'https', 1240575014),
(15, 'www.test-my-cam.com', 'http', 3103521448),
(16, 'www.mensa.org', 'http', 753155962),
(17, 'www.wikihow.com', 'http', 3063717317),
(18, 'testdrive2017.ru', 'http', 1146070875),
(19, 'test.anno-online.com', 'http', 955336110),
(20, 'TestDrive2016.ru', 'http', 529491394),
(21, 'www.google.es', 'http', 4039265696),
(22, 'onlinetestpad.com', 'https', 1421690869),
(23, 'www.englishlearner.com', 'http', 2636452634),
(24, 'dict.leo.org', 'http', 4244183997),
(25, 'www.whoishostingthis.com', 'http', 650035049),
(26, 'test-my-cam.com', 'http', 287523344),
(27, 'TestDrive2016.ru', 'http', 529491394),
(28, 'www.themalaysianinsider.com', 'http', 305465855),
(29, 'animeindo.web.id', 'http', 98502786),
(30, 'www.answers.com', 'http', 1115894987),
(31, 'BeOn.ru', 'http', 3719839191),
(32, 'rainmeter.net', 'http', 1277291079),
(33, 'speedtest.spb.yota.ru', 'http', 4055963110),
(34, 'openvpn.net', 'https', 3194255229),
(35, 'www.amurasia.ru', 'http', 1509845030),
(36, 'www.adme.ru', 'https', 3585664725),
(37, 'speedtest.msk.yota.ru', 'http', 2410848356),
(38, 'klout.com', 'https', 496520768),
(39, 'tap.uz', 'http', 326452577),
(40, 'mystart.incredimail.com', 'http', 3272004289),
(41, 'irecommend.ru', 'https', 1313423065),
(42, 'pc.shopping2.naver.com', 'http', 277101229),
(43, 'pikabu.ru', 'http', 548929340),
(44, 'sports.news.naver.com', 'http', 1787377346),
(45, 'www.beaute-test.com', 'http', 3333914190),
(46, 'matcreative.ru', 'http', 3419778346),
(47, 'www.utest.com', 'https', 896944277),
(48, 'finance.naver.com', 'http', 3246538334),
(49, 'www.usertesting.com', 'https', 779750055),
(50, 'test.i-exam.ru', 'http', 1698484325),
(51, 'www.myersbriggs.org', 'http', 1393562615),
(52, 'www.v-soul.com', 'http', 2047832327),
(53, 'vike.uhyb.rock-n-roll.ru', 'http', 373632304),
(54, 'www.assessment.com', 'http', 3930238721),
(55, 'fishki.net', 'http', 1186019079),
(56, 'www.overclockers.ru', 'https', 3674777923),
(57, 'niku.uhyb.rock-n-roll.ru', 'http', 1345290811),
(58, 'www.lovetest.com', 'http', 3645195214),
(59, 'www.gratis-lagump3.com', 'http', 1860831850),
(60, 'www.4tests.com', 'https', 4103461579),
(61, 'niku.uhyb.rock-n-roll.ru', 'http', 1345290811),
(62, 'niku.uhyb.rock-n-roll.ru', 'http', 1345290811),
(63, 'www.rambler.ru', 'https', 3410331151),
(64, 'diabet-test.com.ua', 'http', 29234117),
(65, 'www.speedtest.com', 'http', 2839235419),
(66, 'e28-forum.ru', 'http', 904340061),
(67, 'test.oyunuburada.com', 'http', 518118728),
(68, 'www.examenglish.com', 'http', 3316360961),
(69, 'www.kolesa.ru', 'http', 2664437489),
(70, 'test.novyurok.ru', 'http', 92940845),
(71, 'www.hellomagazine.com', 'http', 2424111349),
(72, 'www.7-zip.org', 'http', 3363923217),
(73, 'soundcloud.com', 'https', 2595907606),
(74, 'www.privacyware.com', 'http', 1673607789),
(75, 'renault.autoportal.ua', 'http', 1894376329),
(76, 'speedtest.com', 'http', 3111165964),
(77, 'www.speakeasy.net', 'https', 41393431),
(78, 'gamegpu.com', 'http', 1118608161),
(79, 'techcrunch.com', 'https', 864534071),
(80, 'www.autocentre.ua', 'https', 2183438281),
(81, 'speedtest.ofca.gov.hk', 'http', 849180481),
(82, 'www.InfoCar.ua', 'http', 4221113569),
(83, 'www.berettausa.com', 'http', 597610978),
(84, 'www.thatquiz.org', 'https', 3768490432),
(85, 'www.unduhfilm21.net', 'http', 2272897536),
(86, 'www.lacentrale.fr', 'http', 588650076),
(87, 'dip3.fitolodas.homelinux.com', 'http', 2829588041),
(88, 'effekttest.ru', 'http', 1024064013),
(89, 'browsershots.org', 'http', 391807004),
(90, 'WomanAdvice.ru', 'http', 3048980908),
(91, 'www.mudah.my', 'http', 4279248846),
(92, 'camstudio.org', 'http', 1739512084),
(93, 'www.easy-burner.com', 'http', 1238949825),
(94, 'www.linkomanija.net', 'https', 2530027771),
(95, 'www.20minutes.fr', 'http', 2206514482),
(96, 'test3.tankionline.com', 'http', 2026772048),
(97, 'www.drudgereport.com', 'http', 4012934079),
(98, 'www.dickssportinggoods.com', 'http', 3275584965),
(99, 'test1.tankionline.com', 'http', 986977972),
(100, 'www.beretta.com', 'http', 3020732830);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `urls`
--
ALTER TABLE `urls`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `urls`
--
ALTER TABLE `urls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
