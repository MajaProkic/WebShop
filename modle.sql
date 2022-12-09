-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Dec 08, 2022 at 10:45 PM
=======
-- Generation Time: Jul 07, 2022 at 09:29 PM
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `modle`
--

-- --------------------------------------------------------

--
-- Table structure for table `cene`
--

CREATE TABLE `cene` (
  `ID_velicine` int(11) NOT NULL,
  `ID_utiskivaca` int(11) NOT NULL,
  `Cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cene`
--

INSERT INTO `cene` (`ID_velicine`, `ID_utiskivaca`, `Cena`) VALUES
<<<<<<< HEAD
(6, 0, 100),
(6, 1, 150),
(7, 0, 130),
(7, 1, 200),
(8, 0, 160),
(8, 1, 250),
(9, 0, 300),
(9, 1, 190);
=======
(6, 1, 150),
(6, 2, 100),
(7, 1, 200),
(7, 2, 130),
(8, 1, 250),
(8, 2, 160);
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`id`, `naziv`) VALUES
(1, 'Novogodišnje'),
(2, 'Uskršnje'),
(3, 'Božićne'),
(4, 'Po porudžbini'),
(5, 'Baby'),
(6, 'Slavske'),
(7, 'Oblici'),
(8, 'Životinje-insekti'),
(9, 'Crtani junaci'),
<<<<<<< HEAD
(10, 'Odmah dostupno'),
(11, 'Biljke'),
(12, 'Modle za nakit'),
(13, 'Stencili');
=======
(10, 'Odmah dostupno');
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

-- --------------------------------------------------------

--
-- Table structure for table `kupci`
--

CREATE TABLE `kupci` (
  `id` int(11) NOT NULL,
  `ime` varchar(35) NOT NULL,
  `prezime` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mesto` varchar(60) NOT NULL,
  `ulica` varchar(100) NOT NULL,
  `broj` varchar(12) NOT NULL,
  `telefon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kupci`
--

INSERT INTO `kupci` (`id`, `ime`, `prezime`, `email`, `mesto`, `ulica`, `broj`, `telefon`) VALUES
(8, 'Nikolina', 'Nikolic', 'nikolinanina@gmail.c', 'Beograd', 'Niksicka', '1', '0651414525'),
(25, 'Dragana', 'Jokic', 'gaga@gmail.com', 'Begaljica', 'mikolina', '1', '0628844316'),
(26, 'Dragana', 'Jokic', 'gaga@gmail.com', 'Begaljica', 'mikolina', '1', '0628844316'),
(27, 'Zlata', 'Zlatkovic', 'zlata@gmail.com', 'Mitrovica', 'Zelenska', '1', '0628443316'),
(28, 'Zlata', 'Zlatkovic', 'zlata@gmail.com', 'Mitrovica', 'Zelenska', '1', '628443316'),
(29, 'Biljanaa', 'Dragojevic', 'bilja@gmail.com', 'Beograd', 'Milutina Milankovica', '1', '628956233'),
(30, 'Biljanaa', 'Dragojevic', 'bilja@gmail.com', 'Beograd', 'Milutina Milankovica', '1', '628956233'),
(33, 'Aleksandra', 'Nikolic', 'nikolicaleks@gmail.c', 'Beograd', 'Milutina Mil', '1', '651415221'),
(34, 'Dragica', 'Dragic', 'dragica@gmail.com', 'Kragujevac', 'Jastrebacka', '1', '692215147'),
(35, 'Desanka', 'Jovic', 'desa@gmail.com', 'Negotin', 'Milovna Jokica', '1', '0635511478'),
(36, 'Draganaa', 'Dragojevic', 'dragana123@gmail.com', 'Bujanovac', 'Cetnicka', '1', '628844663'),
(37, 'Nevena', 'Nikolic', 'nevena@gmail.com', 'Despotovac', 'milanovacka', '1', '628843629'),
(38, 'Nikola', 'Nikolic', 'nikola@gmail.com', 'Beocin', 'Sremska', '1', '654411589'),
(40, 'Nikola', 'Nikolic', 'nikola@gmail.com', 'Beocin', 'Sremska', '16', '0654411589'),
(41, 'Nikola', 'Nikolic', 'nikola@gmail.com', 'Beocin', 'Sremska', '16', '0654411589'),
(42, 'Nikola', 'Nikolic', 'nikola@gmail.com', 'Beocin', 'Sremska', '16', '0654411589'),
(43, 'Dubravka', 'Ostojic', 'dubravka@gmail.com', 'Beograd', 'Beogradska', '17', '065998521'),
(44, 'Negovan', 'Milojevic', 'nex@gmail.com', 'Beograd', 'Surcinski put', '0', '0631763598'),
(45, 'Ana', 'Jovanovic', 'ana@gmail.com', 'Kragujevac', 'aujnol', '2', '065310523'),
(46, 'Ana', 'Jovanovic', 'anajokv@gmail.com', 'Kragujevac', 'aujnol', '2', '065310523'),
(47, 'faegae', 'asfdgrshbwr', 'wfeghrshjtdkk', 'dawdg', 'eagsrh', '54', '242452045245'),
(48, 'Milijana', 'Bobulia', 'milijana@gmail.com', 'Be', 'rad', '6', '06455852584'),
(49, 'Marica', 'Markovic', 'markovic@gmail.com', 'Kragujevac', 'Mihajla pupina', '17', '0639595285'),
(50, 'Novica', 'Ostojic', 'nikolanovica@gmail.com', 'Despotovac', 'Trnavska', '16', '0628433778'),
(51, 'Nikola', 'Jovic', 'mayap343@gmail.com', 'Beocin', 'Milovna Jokica', '16', '0631763598'),
(52, 'Teodora', 'Radovanovic', 'teodora@gmail.com', 'Negotin', 'Mihajla pupina', '17', '06236638585'),
(53, 'slavica', 'prokic', 'slavica@gmail.com', 'topola', 'ovsiste', '0', '0638165852'),
(54, 'Trajko', 'Gavrilovic', 'trajko@gmail.com', 'Surdulica', 'josanicka', '14', '0645511725'),
(55, 'Maja', 'Prokic', 'mayap343@gmail.com', 'Topola', 'Bulevar vozda karadjordja', '121', '0628433192'),
(58, 'jedtj', 'seg', 'ht,ug', 'Krusevac', 'gs', '285', '4156156323'),
(61, 'trala', 'lala', 'tralalalala', 'kokso', 'oghu', '59', '1789652369'),
(63, 'trala', 'lala', 'tralalalala585', 'kokso', 'oghu', '59', '178965236910'),
<<<<<<< HEAD
(64, 'Maja', 'af', 'afaf', 'fa', 'fa', '45', '466'),
(65, 'Maja', 'Prokic', 'desa@gmail.com', 'Nova Pazova', 'Nikoja', '2', '0365755758'),
(66, 'Jovana', 'Jovanovic', 'jovanajovanovic@gmail.com', 'Brezovac', 'Brezovac', '00', '0628436452'),
(67, 'Marko', 'Milovanovic', 'markomarko@gmail.com', 'Ovsiste', 'Nema', '00', '061554475');
=======
(64, 'Maja', 'af', 'afaf', 'fa', 'fa', '45', '466');
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

-- --------------------------------------------------------

--
-- Table structure for table `modla`
--

CREATE TABLE `modla` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `kategorija_id` int(11) NOT NULL,
<<<<<<< HEAD
=======
  `slika` varchar(255) NOT NULL,
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
  `hashtag` varchar(700) NOT NULL,
  `datum_postavljanja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modla`
--

<<<<<<< HEAD
INSERT INTO `modla` (`id`, `naziv`, `kategorija_id`, `hashtag`, `datum_postavljanja`) VALUES
(19, 'Lane ', 1, '#lane#novogodisnje#modle#modlice#nova#godina', '2006-07-22 23:31:18'),
(23, 'Sneško maše', 1, '#snesko#nova#godina#zima#sneg#belić#božić', '0000-00-00 00:00:00'),
(51, 'Krst', 6, '#krst#slava#slavske#modle#modlice#bez#utiskivaca#utiskivača#srećna#slava', '2004-07-22 11:26:02'),
(73, 'Narcis', 2, '#narcis#biljka#cvet#uskrsnje#modle#modlice#uskršnje', '2031-05-22 12:50:49'),
(82, 'Grožđe i vino', 6, '#grožđe#vino#čaša#slava#slavska#modla#casa#grozdje', NULL),
(83, 'Knjiga i krst', 6, '#krst#knjiga#slava#modla#slavske', NULL),
(99, 'Zeka', 2, '#zeka#uskrs#modle#modlice#medenjaci', '2031-05-22 17:28:44'),
(103, 'Zeka drži šargarepu', 2, '#zeka#jaje#zekadrzisargarepu#cupavi#uskrsnje#uskršnje#modle#modlice#sargarepa#sangarepa', NULL),
(104, 'Zeka na jajetu', 2, '#zeka#jaje#zekanajajetu#cupavi#uskrsnje#uskršnje#modle#modlice', NULL),
(105, 'Zeka drži jaje', 2, '#zeka#jaje#zekadrzijaje#cupavi#uskrsnje#uskršnje#modle#modlice', NULL),
(116, 'Anđeo koji se moli', 6, '#andjeo#molitva#novogodišnje#slavske#modle', NULL),
(133, 'Golub', 6, '#golub#slavske#modle#modlice#kolac#ptica', NULL),
(134, 'Grožđe', 6, '#grozdje#slava#modla#slavska#kolac#vino', NULL),
(140, 'Anđeo raširenih krila', 6, '#andjeo#anđeo#slavske#modle#modlice#božić#bozic#kolac', '2006-07-22 23:23:19'),
(141, 'Bure', 6, '#bure#bacva#slavske#modle#kolac#vino', NULL),
(142, 'Bure sa linijama', 6, '#bure#slavske#modle#bacva#bačva', NULL),
(161, 'Golub sa raširenim krilima', 6, '#slavske#modle#golub#ptica', NULL),
(176, 'Bela rada', 11, '#cvet#biljka#bela#rada#modla', '2007-07-22 21:44:00'),
(190, 'Candy Cat - Pepa Pig', 9, '#candy#cat#pepa#prase#modlice#za#decu#modle', NULL),
(193, 'Emily elephant - Pepa Pig', 9, '#pepa#prase#pig#modle#modlice#za#decu', NULL),
(214, 'Korpa sa jajima', 2, '#korpa#jaja#uskrs#uskrsnje#modle#uskršnje#modlice', '2031-05-22 12:24:52'),
(241, 'Zeka u automobilu', 2, '#uskrsnje#modle#modlice#za#kolace', NULL),
(254, 'Šargarepa sa srcem', 2, '#šargarepa#srce#uskršnje#uskrsnje#modle#modlice', '2031-05-22 12:54:46'),
(255, 'Šargarepa sa ušima', 2, '#šargarepa#uši#sargarepa#usi#uskrs#uskrsnje#uskršnje#modle#modlice', '2031-05-22 15:01:09'),
(275, 'Beba spava na oblaku', 5, '#beba#rodjendan#novorodjence#novorođenče#rođenje#baby#boy#girl#modle#modla', '2017-06-22 14:53:09'),
(276, 'Beba', 5, '#beba#dete#sedi#modla#novorodjence#novorođenče#rođenje#rođendan#boy#girl', '2017-06-22 15:16:06'),
(288, 'Buket ruža', 11, '#ruze#buket#biljke#cvece#osmi#mart#8#poruka', '2007-07-22 21:45:51'),
(299, 'Cigla', 13, '#cigla#stencil', '2024-08-22 23:14:06');
=======
INSERT INTO `modla` (`id`, `naziv`, `kategorija_id`, `slika`, `hashtag`, `datum_postavljanja`) VALUES
(19, 'Lane ', 1, 'lane.PNG', '#lane#novogodisnje#modle#modlice#nova#godina', '2006-07-22 23:31:18'),
(51, 'Krst', 6, 'icons8-cookies-80.png', '#krst#slava#slavske#modle#modlice#bez#utiskivaca#utiskivača#srećna#slava', '2004-07-22 11:26:02'),
(53, 'Hrastov list', 3, 'list hrasta.PNG', '#list#hrast#slavski#kolač#kolac#modle', NULL),
(73, 'Narcis', 2, 'narcis.PNG', '#narcis#biljka#cvet#uskrsnje#modle#modlice#uskršnje', '2031-05-22 12:50:49'),
(82, 'Grožđe i vino', 6, 'grozdje vino casa.PNG', '#grožđe#vino#čaša#slava#slavska#modla#casa#grozdje', NULL),
(83, 'Knjiga i krst', 6, 'knjiga sa krstom.PNG', '#krst#knjiga#slava#modla#slavske', NULL),
(99, 'Zeka', 2, 'zec krupan.PNG', '#zeka#uskrs#modle#modlice#medenjaci', '2031-05-22 17:28:44'),
(103, 'Zeka drži šargarepu', 2, 'cupavi zeka sa sargarepom.PNG', '#zeka#jaje#zekadrzisargarepu#cupavi#uskrsnje#uskršnje#modle#modlice#sargarepa#sangarepa', NULL),
(104, 'Zeka na jajetu', 2, 'cupavi zeka na jajetu.PNG', '#zeka#jaje#zekanajajetu#cupavi#uskrsnje#uskršnje#modle#modlice', NULL),
(105, 'Zeka drži jaje', 2, 'cupavi zeka drzi jaje.PNG', '#zeka#jaje#zekadrzijaje#cupavi#uskrsnje#uskršnje#modle#modlice', NULL),
(116, 'Anđeo koji se moli', 6, 'andjeo se moli.PNG', '#andjeo#molitva#novogodišnje#slavske#modle', NULL),
(133, 'Golub', 6, 'golub lik.PNG', '#golub#slavske#modle#modlice#kolac#ptica', NULL),
(134, 'Grožđe', 6, 'grozdje.PNG', '#grozdje#slava#modla#slavska#kolac#vino', NULL),
(140, 'Anđeo raširenih krila', 6, 'andjeo rasirenih krila.PNG', '#andjeo#anđeo#slavske#modle#modlice#božić#bozic#kolac', '2006-07-22 23:23:19'),
(141, 'Bure', 6, 'bure.PNG', '#bure#bacva#slavske#modle#kolac#vino', NULL),
(142, 'Bure sa linijama', 6, 'bure sa linijamaa.PNG', '#bure#slavske#modle#bacva#bačva', NULL),
(161, 'Golub sa raširenim krilima', 6, 'golub sa rasirenim krilima.PNG', '#slavske#modle#golub#ptica', NULL),
(190, 'Candy Cat - Pepa Pig', 9, 'candy cat.PNG', '#candy#cat#pepa#prase#modlice#za#decu#modle', NULL),
(193, 'Emily elephant - Pepa Pig', 9, 'emily elephant.PNG', '#pepa#prase#pig#modle#modlice#za#decu', NULL),
(214, 'Korpa sa jajima', 2, 'korpa sa jajima i leptirom.PNG', '#korpa#jaja#uskrs#uskrsnje#modle#uskršnje#modlice', '2031-05-22 12:24:52'),
(241, 'Zeka u automobilu', 2, 'auto sa zecom.PNG', '#uskrsnje#modle#modlice#za#kolace', NULL),
(254, 'Šargarepa sa srcem', 2, 'sargarepa sa srcem.PNG', '#šargarepa#srce#uskršnje#uskrsnje#modle#modlice', '2031-05-22 12:54:46'),
(255, 'Šargarepa sa ušima', 2, 'sargarepica sa usima.PNG', '#šargarepa#uši#sargarepa#usi#uskrs#uskrsnje#uskršnje#modle#modlice', '2031-05-22 15:01:09'),
(275, 'Beba spava na oblaku', 5, 'Beba spava na oblaku.PNG', '#beba#rodjendan#novorodjence#novorođenče#rođenje#baby#boy#girl#modle#modla', '2017-06-22 14:53:09'),
(276, 'Beba', 5, 'beba.PNG', '#beba#dete#sedi#modla#novorodjence#novorođenče#rođenje#rođendan#boy#girl', '2017-06-22 15:16:06');
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

-- --------------------------------------------------------

--
-- Table structure for table `narudzbenica`
--

CREATE TABLE `narudzbenica` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `status` varchar(35) NOT NULL,
  `napomena` varchar(350) NOT NULL,
  `nacin_placanja` varchar(40) NOT NULL,
  `kurirska_sluzba` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `narudzbenica`
--

INSERT INTO `narudzbenica` (`id`, `id_user`, `datum`, `status`, `napomena`, `nacin_placanja`, `kurirska_sluzba`) VALUES
(37, 51, '2022-06-01 12:18:41', 'Neobradjeno', '', 'pouzecem', ''),
(38, 35, '2022-06-01 12:20:41', 'Neobradjeno', '', 'pouzecem', ''),
(39, 35, '2022-06-01 12:27:04', 'Neobradjeno', '', 'pouzecem', ''),
(40, 35, '2022-06-01 12:32:21', 'Neobradjeno', '', 'pouzecem', ''),
(41, 35, '2022-06-01 12:32:51', 'Neobradjeno', '', 'pouzecem', ''),
(42, 35, '2022-06-01 12:33:22', 'Neobradjeno', '', 'pouzecem', ''),
(43, 35, '2022-06-01 12:33:59', 'Neobradjeno', '', 'pouzecem', ''),
(44, 35, '2022-06-01 12:38:13', 'Neobradjeno', '', 'pouzecem', ''),
(45, 35, '2022-06-01 12:41:12', 'Neobradjeno', '', 'pouzecem', ''),
(46, 35, '2022-06-01 12:41:56', 'Neobradjeno', '', 'pouzecem', ''),
(47, 35, '2022-06-01 12:42:23', 'Neobradjeno', '', 'pouzecem', ''),
(48, 35, '2022-06-01 12:42:43', 'Neobradjeno', '', 'pouzecem', ''),
(49, 35, '2022-06-01 12:45:41', 'Neobradjeno', '', 'pouzecem', ''),
(50, 35, '2022-06-01 12:48:51', 'Neobradjeno', '', 'pouzecem', ''),
(51, 35, '2022-06-01 12:49:16', 'Neobradjeno', '', 'pouzecem', ''),
(52, 35, '2022-06-01 12:53:56', 'Neobradjeno', '', 'pouzecem', ''),
(53, 35, '2022-06-01 12:55:26', 'Neobradjeno', '', 'pouzecem', ''),
(54, 35, '2022-06-01 12:56:22', 'Neobradjeno', '', 'pouzecem', ''),
(55, 35, '2022-06-01 12:57:43', 'Neobradjeno', '', 'pouzecem', ''),
(56, 35, '2022-06-01 12:57:48', 'Neobradjeno', '', 'pouzecem', ''),
(57, 35, '2022-06-01 12:57:53', 'Neobradjeno', '', 'pouzecem', ''),
(58, 35, '2022-06-01 12:58:25', 'Neobradjeno', '', 'pouzecem', ''),
(59, 35, '2022-06-01 13:12:01', 'Neobradjeno', '', 'pouzecem', ''),
(60, 35, '2022-06-01 13:12:37', 'Neobradjeno', '', 'pouzecem', ''),
(61, 35, '2022-06-01 13:14:33', 'Neobradjeno', '', 'pouzecem', ''),
(62, 35, '2022-06-01 13:15:47', 'Neobradjeno', '', 'pouzecem', ''),
(63, 35, '2022-06-01 13:15:55', 'Neobradjeno', '', 'pouzecem', ''),
(64, 35, '2022-06-01 13:16:00', 'Neobradjeno', '', 'pouzecem', ''),
(65, 35, '2022-06-01 13:16:48', 'Neobradjeno', '', 'pouzecem', ''),
(66, 35, '2022-06-01 13:22:10', 'Neobradjeno', '', 'pouzecem', ''),
(67, 35, '2022-06-01 13:23:08', 'Neobradjeno', '', 'pouzecem', ''),
(68, 35, '2022-06-01 17:15:57', 'Neobradjeno', '', 'pouzecem', ''),
(69, 35, '2022-06-01 17:16:59', 'Neobradjeno', '', 'pouzecem', ''),
(70, 35, '2022-06-01 17:18:30', 'Neobradjeno', '', 'pouzecem', ''),
(71, 35, '2022-06-01 17:18:41', 'Neobradjeno', '', 'pouzecem', ''),
(72, 35, '2022-06-01 17:18:44', 'Neobradjeno', '', 'pouzecem', ''),
(73, 35, '2022-06-01 17:20:40', 'Neobradjeno', '', 'pouzecem', ''),
(74, 35, '2022-06-01 17:20:43', 'Neobradjeno', '', 'pouzecem', ''),
(75, 35, '2022-06-01 17:21:00', 'Neobradjeno', '', 'pouzecem', ''),
(76, 35, '2022-06-01 17:21:42', 'Neobradjeno', '', 'pouzecem', ''),
(77, 35, '2022-06-01 17:22:08', 'Neobradjeno', '', 'pouzecem', ''),
(78, 35, '2022-06-01 17:24:02', 'Neobradjeno', '', 'pouzecem', ''),
(79, 35, '2022-06-01 17:24:35', 'Neobradjeno', '', 'pouzecem', ''),
(80, 35, '2022-06-01 17:27:14', 'Neobradjeno', '', 'pouzecem', ''),
(81, 50, '2022-06-14 14:42:08', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(82, 53, '2022-06-14 14:44:14', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(83, 53, '2022-06-14 14:48:45', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(84, 54, '2022-06-14 16:53:31', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(85, 35, '2022-07-01 13:57:58', 'Neobradjeno', 'fj', 'Pouzećem', 'Post express'),
(86, 35, '2022-07-01 16:05:18', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(87, 35, '2022-07-01 16:06:39', 'Neobradjeno', '', 'Pouzećem', 'D-Express'),
(88, 35, '2022-07-01 16:15:15', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(89, 35, '2022-07-01 16:19:25', 'Neobradjeno', '', 'Pre slanja', 'Post express'),
(90, 35, '2022-07-01 16:19:32', 'Neobradjeno', '', 'Pouzećem', 'D-Express'),
(91, 35, '2022-07-01 16:21:14', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(92, 35, '2022-07-01 16:22:33', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(93, 35, '2022-07-01 16:23:43', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(94, 35, '2022-07-01 16:23:49', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(95, 35, '2022-07-01 16:25:39', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(96, 35, '2022-07-01 17:00:03', 'Neobradjeno', 'ss', 'Pouzećem', 'Post express'),
(97, 35, '2022-07-01 17:01:32', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(98, 35, '2022-07-01 17:03:18', 'Neobradjeno', '', 'Pouzećem', 'D-Express'),
(99, 35, '2022-07-01 17:05:15', 'Neobradjeno', '', 'Pouzećem', 'D-Express'),
(100, 35, '2022-07-01 17:05:53', 'Neobradjeno', '', 'Pre slanja', 'Post express'),
(101, 35, '2022-07-01 17:07:30', 'Neobradjeno', '', 'Pouzećem', 'D-Express'),
(102, 35, '2022-07-01 17:07:59', 'Neobradjeno', '', 'Pouzećem', 'D-Express'),
(103, 35, '2022-07-01 17:10:02', 'Neobradjeno', '', 'Pouzećem', 'D-Express'),
(104, 35, '2022-07-01 17:10:28', 'Neobradjeno', '', 'Pouzećem', 'D-Express'),
(105, 35, '2022-07-01 17:11:55', 'Neobradjeno', '', 'Pouzećem', 'D-Express'),
(106, 35, '2022-07-01 17:12:04', 'Neobradjeno', '', 'Pouzećem', 'D-Express'),
(107, 35, '2022-07-01 17:12:39', 'Neobradjeno', '', 'Pre slanja', 'Post express'),
(108, 35, '2022-07-01 17:27:37', 'Neobradjeno', '', 'Pre slanja', 'Post express'),
(109, 35, '2022-07-01 17:29:51', 'Neobradjeno', '', 'Pouzećem', 'D-Express'),
(110, 35, '2022-07-01 17:32:16', 'Neobradjeno', '', 'Pouzećem', 'D-Express'),
(111, 35, '2022-07-01 17:33:25', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(112, 35, '2022-07-01 18:03:14', 'Neobradjeno', '', 'Pouzećem', 'D-Express'),
(113, 35, '2022-07-01 18:04:00', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(114, 35, '2022-07-01 18:05:31', 'Neobradjeno', '', 'Pouzećem', 'D-Express'),
(115, 35, '2022-07-01 18:10:57', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(116, 55, '2022-07-07 14:05:11', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(117, 55, '2022-07-07 14:06:02', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(118, 55, '2022-07-07 14:06:11', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(119, 55, '2022-07-07 14:07:32', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(122, 61, '2022-07-07 15:16:48', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(123, 61, '2022-07-07 15:21:31', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(125, 63, '2022-07-07 15:25:57', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(126, 64, '2022-07-07 15:42:50', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(127, 35, '2022-07-07 16:21:09', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(128, 35, '2022-07-07 17:19:12', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(129, 35, '2022-07-07 17:19:57', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(130, 35, '2022-07-07 17:20:03', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(131, 35, '2022-07-07 17:20:21', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
<<<<<<< HEAD
(132, 35, '2022-07-07 17:35:23', 'Neobradjeno', '', 'Pouzećem', 'Post express'),
(133, 65, '2022-08-18 17:02:23', 'Neobradjeno', '', 'Uplata_preko_računa', 'Post_Express'),
(134, 65, '2022-08-18 17:05:07', 'Neobradjeno', '', 'Uplata_preko_računa', 'Post_Express'),
(135, 35, '2022-08-18 18:33:32', 'Neobradjeno', '', 'Pouzećem', 'Post_Express'),
(136, 35, '2022-08-18 18:41:25', 'Neobradjeno', '', 'Pouzećem', 'Post_Express'),
(137, 35, '2022-08-18 18:42:16', 'Neobradjeno', '', 'Pouzećem', 'Post_Express'),
(138, 35, '2022-08-26 21:49:13', 'Neobradjeno', '', 'Uplata_preko_računa', 'Post_Express'),
(139, 35, '2022-08-26 21:50:56', 'Neobradjeno', '', 'Uplata_preko_računa', 'Post_Express'),
(140, 35, '2022-08-26 21:51:48', 'Neobradjeno', '', 'Uplata_preko_računa', 'Post_Express'),
(141, 35, '2022-08-28 13:33:51', 'Neobradjeno', '', 'Uplata_preko_računa', 'Post_Express'),
(142, 35, '2022-08-28 13:36:02', 'Neobradjeno', '', 'Uplata_preko_računa', 'Post_Express'),
(143, 35, '2022-08-28 13:36:45', 'Neobradjeno', '', 'Uplata_preko_računa', 'Post_Express'),
(144, 66, '2022-11-08 08:25:11', 'primljeno', '', 'Pouzećem', 'Post_Express'),
(145, 67, '2022-11-08 08:28:51', 'u izradi', '', 'Pouzećem', 'Post_Express');
=======
(132, 35, '2022-07-07 17:35:23', 'Neobradjeno', '', 'Pouzećem', 'Post express');
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

-- --------------------------------------------------------

--
-- Table structure for table `opis_modle`
--

CREATE TABLE `opis_modle` (
  `ID_opisa` int(11) NOT NULL,
  `ID_modle` int(11) NOT NULL,
  `debljina_sekaca` varchar(244) DEFAULT NULL,
  `sirina_modle` varchar(244) DEFAULT NULL,
  `duzina_modle` varchar(244) DEFAULT NULL,
  `debljina_utiskivaca` varchar(244) DEFAULT NULL,
  `tezina_modle` varchar(244) DEFAULT NULL,
  `visina_utiskivaca` varchar(244) DEFAULT NULL,
  `visina_sekaca` varchar(244) DEFAULT NULL,
  `utiskivac_sekac_spojeni` varchar(3) DEFAULT NULL,
  `velicina_testiranog_proizvoda` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opis_modle`
--

INSERT INTO `opis_modle` (`ID_opisa`, `ID_modle`, `debljina_sekaca`, `sirina_modle`, `duzina_modle`, `debljina_utiskivaca`, `tezina_modle`, `visina_utiskivaca`, `visina_sekaca`, `utiskivac_sekac_spojeni`, `velicina_testiranog_proizvoda`) VALUES
(3, 275, '1 cm', '6.3 cm', '5 cm', '0.5 cm', '7 grama', '6 cm', '10 cm', 'Ne ', '6 cm'),
(4, 276, '1 cm', '4.9 cm', '6.7 cm', '0.5 cm', '7 grama', '6 cm', '10 cm', 'Ne ', '6 cm'),
(6, 255, '1 cm', '4.3 cm', '6.2 cm', '0.5 cm', '5 grama', '6 cm', '10cm', 'Ne', '6 cm'),
(7, 51, '1 cm', '44 cm', '64.5 cm', '', '3 g', '', '10 cm', '', '6 cm'),
(8, 254, '1 cm', '3.8 cm', '6.2 cm', '0.5 cm', '4 grama', '6 cm', '10 cm', 'Ne', '6cm'),
(9, 241, '1 cm', '5.4 cm', '6.2 cm', '0.5', '8 grama', '6 cm', '10 cm', 'Ne', '6 cm'),
(10, 214, '1 cm', '4.5 cm', '6.2 cm', '0.5 cm', '6 grama', '6 cm', '10 cm', 'Ne', '6 cm'),
(11, 193, '1 cm', '5.9 cm', '6.3 cm', '0.5 cm', '6 grama', '6 cm', '10cm', 'Ne', '6 cm'),
(12, 190, '1 cm', '3.6 cm', '6.5 cm', '0.5 cm', '5 grama', '6 cm', '10 cm', 'Ne', '6 cm'),
(13, 161, '1 cm', '6.4 cm', '5.3 cm', '0.5 cm', '5 grama', '6 cm', '10 cm', 'Ne', '6 cm'),
(14, 142, '1 cm', '5.1 cm', '6.2 cm', '0.5 cm', '7 grama', '6 cm', '10 cm', 'Ne', '6 cm'),
(15, 141, '1 cm', '5.4 cm', '6.3 cm', '0.5 cm', '11 grama', '6 cm', '10 cm', 'Ne', '6 cm'),
(16, 134, '1 cm', '5.7 cm', '6.3 cm', '0.5 cm', '9 grama', '6 cm', '10 cm', 'Ne', '6 cm'),
(17, 133, '1 cm', '4.2 cm', '6.3 cm', '0.5 cm', '5 grama', '6 cm', '10 cm', 'Ne', '6 cm'),
(18, 116, '1 cm', '4.7 cm', '6.2 cm', '', '5 grama', '', '10 cm', '', '6 cm'),
(19, 105, '1 cm', '5.1 cm', '6.1 cm', '0.5 cm', '8 grama', '6 cm', '10 cm', 'Ne', '6 cm'),
(20, 104, '1 cm', '5.9 cm', '6.1 cm', '0.5 cm', '7 grama', '6 cm', '10 cm', 'Ne', '6 cm'),
(21, 103, '1 cm', '4.1 cm', '6.3 cm', '0.5 cm', '6 grama', '6 cm', '10 cm', 'Ne', '6 cm'),
(22, 99, '1 cm', '4.8 cm', '6.3 cm', '0.5 cm', '7 grama', '6 cm', '10 cm', 'Ne', '6 cm'),
(23, 83, '1 cm', '6.4 cm', '4.9 cm', '0.5 cm', '6 grama', '6 cm', '10 cm', 'Ne', '6 cm'),
(24, 82, '1 cm', '5.5 cm', '6.2 cm', '0.5 cm', '7 grama', '6 cm', '10 cm', 'Ne', '6 cm'),
(25, 73, '1 cm', '3.4 cm', '6.2 cm', '0.5 cm', '6 grama', '6 cm', '10 cm', 'Ne', '6 cm'),
<<<<<<< HEAD
(27, 0, '1 cm', '5 cm', '6.2 cm', '-', '4 grama', '-', '10 cm', '-', '6 cm'),
(28, 140, '1 cm', '5 cm', '6,2 cm', '-', '4 cm', '-', '10 cm', '-', '6 cm'),
(29, 19, '1 cm', '3.2 cm', '6.2 cm', '0.5 cm', '6 grama', '6 cm', '10 cm', 'Ne ', '6 cm'),
(30, 176, '1 cm', '6.3 cm', '6.2 cm', '-', '4 grama', '-', '10 cm', '-', '6 cm'),
(31, 288, '1 cm', '6.4 cm', '8.8 cm', '0.5 cm', '9 grama', '6 cm', '10 cm', 'Ne', '8 cm'),
(34, 0, '1 cm', '6.3 cm', '6.2 cm', '0.12 cm', '9 grama', '0.6 cm', '10 cm', 'Ne', '6 cm'),
(35, 102, '1 cm', '6.3 cm', '8.8 cm', '0.12 cm', '4 grama', '0.6 cm', '1 cm', 'Ne', '6 cm'),
(39, 299, '', '', '', '', '', '', '', '', ''),
(41, 23, '0.1 cm', '4.3 cm', '6.2 cm', '0.12 cm', '5 grama', '0.6 cm', '1 cm', 'ne', '6 cm');
=======
(26, 53, '1 cm', '3.9 cm', '6.2 cm', '0.5 cm', '6 grama', '6 cm', '10 cm', 'Ne', '6 cm'),
(27, 0, '1 cm', '5 cm', '6.2 cm', '-', '4 grama', '-', '10 cm', '-', '6 cm'),
(28, 140, '1 cm', '5 cm', '6,2 cm', '-', '4 cm', '-', '10 cm', '-', '6 cm'),
(29, 19, '1 cm', '3.2 cm', '6.2 cm', '0.5 cm', '6 grama', '6 cm', '10 cm', 'Ne ', '6 cm');
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

-- --------------------------------------------------------

--
-- Table structure for table `poručeni_artikli`
--

CREATE TABLE `poručeni_artikli` (
  `ID_proizvoda` int(11) NOT NULL,
  `ID_narudzbenice` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL,
<<<<<<< HEAD
  `utiskivac` tinyint(1) NOT NULL,
=======
  `utiskivac` bit(11) NOT NULL,
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
  `velicina` int(11) NOT NULL,
  `cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poručeni_artikli`
--

INSERT INTO `poručeni_artikli` (`ID_proizvoda`, `ID_narudzbenice`, `kolicina`, `utiskivac`, `velicina`, `cena`) VALUES
<<<<<<< HEAD
(23, 145, 1, 1, 7, 200),
(73, 138, 1, 49, 6, 150),
(73, 139, 1, 49, 6, 150),
(73, 140, 1, 49, 6, 150),
(99, 138, 1, 49, 6, 150),
(99, 139, 1, 49, 6, 150),
(99, 140, 1, 49, 6, 150),
(99, 143, 1, 2, 7, 130),
(99, 144, 2, 1, 6, 300),
(103, 127, 1, 49, 7, 200),
(140, 145, 1, 0, 6, 100),
(161, 0, 2, 49, 6, 150),
(161, 81, 2, 49, 6, 150),
(193, 0, 1, 49, 7, 200),
(193, 81, 1, 49, 7, 200),
(214, 80, 1, 49, 6, 150),
(214, 127, 1, 49, 7, 200),
(214, 128, 1, 49, 7, 200),
(214, 129, 1, 49, 7, 200),
(214, 130, 1, 49, 7, 200),
(214, 131, 1, 49, 7, 200),
(214, 132, 1, 49, 7, 200),
(227, 82, 1, 49, 6, 150),
(227, 83, 1, 49, 6, 150),
(241, 127, 1, 49, 7, 200),
(242, 82, 1, 49, 7, 200),
(242, 83, 1, 49, 7, 200),
(255, 84, 1, 50, 7, 130),
(255, 96, 1, 49, 6, 150),
(255, 97, 1, 49, 6, 150),
(255, 98, 1, 49, 6, 150),
(255, 99, 1, 49, 6, 150),
(255, 100, 1, 49, 6, 150),
(255, 101, 1, 49, 6, 150),
(255, 102, 1, 49, 6, 150),
(255, 103, 1, 49, 6, 150),
(255, 104, 1, 49, 6, 150),
(255, 105, 1, 49, 6, 150),
(255, 106, 1, 49, 6, 150),
(255, 107, 1, 49, 6, 150),
(255, 108, 1, 49, 6, 150),
(255, 109, 1, 49, 6, 150),
(255, 110, 1, 49, 6, 150),
(255, 111, 1, 49, 6, 150),
(255, 120, 1, 49, 7, 200),
(255, 121, 1, 49, 7, 200),
(255, 122, 1, 49, 7, 200),
(255, 123, 1, 49, 7, 200),
(255, 124, 1, 49, 7, 200),
(255, 125, 1, 49, 7, 200),
(255, 126, 1, 49, 7, 200),
(255, 144, 1, 1, 6, 150),
(275, 114, 2, 49, 6, 150),
(275, 115, 2, 49, 6, 150),
(275, 116, 1, 49, 7, 200),
(275, 117, 1, 49, 7, 200),
(275, 118, 1, 49, 7, 200),
(275, 119, 1, 49, 7, 200),
(275, 120, 1, 49, 7, 200),
(275, 121, 1, 49, 7, 200),
(275, 122, 1, 49, 7, 200),
(275, 123, 1, 49, 7, 200),
(275, 124, 1, 49, 7, 200),
(275, 125, 1, 49, 7, 200),
(275, 126, 1, 49, 7, 200),
(276, 0, 1, 49, 7, 200),
(276, 85, 1, 49, 7, 200),
(276, 86, 1, 49, 7, 200),
(276, 87, 1, 49, 7, 200),
(276, 88, 1, 49, 7, 200),
(276, 89, 1, 49, 7, 200),
(276, 90, 1, 49, 7, 200),
(276, 91, 1, 49, 7, 200),
(276, 92, 1, 49, 7, 200),
(276, 93, 1, 49, 7, 200),
(276, 94, 1, 49, 7, 200),
(276, 95, 1, 49, 7, 200),
(276, 116, 1, 49, 6, 150),
(276, 117, 1, 49, 6, 150),
(276, 118, 1, 49, 6, 150),
(276, 119, 1, 49, 6, 150),
(276, 122, 1, 49, 6, 150),
(276, 123, 1, 49, 6, 150),
(276, 124, 1, 49, 6, 150),
(276, 125, 1, 49, 6, 150),
(276, 126, 1, 49, 6, 150),
(276, 133, 1, 49, 6, 150),
(276, 134, 1, 49, 6, 150),
(276, 135, 1, 49, 7, 200),
(276, 136, 1, 49, 7, 200),
(276, 137, 1, 49, 7, 200),
(276, 144, 2, 1, 6, 150),
(276, 145, 2, 1, 6, 150),
(288, 141, 1, 49, 8, 250),
(288, 142, 1, 1, 8, 250);

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE `slike` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `slika1` varchar(255) DEFAULT NULL,
  `slika2` varchar(255) DEFAULT NULL,
  `slika3` varchar(255) DEFAULT NULL,
  `slika4` varchar(255) DEFAULT NULL,
  `slika5` varchar(255) DEFAULT NULL,
  `slika6` varchar(255) DEFAULT NULL,
  `slika7` varchar(255) DEFAULT NULL,
  `slika8` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`id`, `id_product`, `slika1`, `slika2`, `slika3`, `slika4`, `slika5`, `slika6`, `slika7`, `slika8`) VALUES
(1, 343, 'slika7.jpg', 'slika1.jpg', 'slika2.jpg', 'slika3.jpg', 'slika4.jpg', 'slika5.jpg', 'slika6.jpg', NULL),
(2, 19, 'lane.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 51, 'icons8-cookies-80.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 73, 'narcis.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 82, 'grozdje vino casa.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 83, 'knjiga sa krstom.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 99, 'zec krupan.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 103, 'cupavi zeka sa sargarepom.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 104, 'cupavi zeka na jajetu.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 105, 'cupavi zeka drzi jaje.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 116, 'andjeo se moli.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 133, 'golub lik.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 134, 'grozdje.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 140, 'andjeo rasirenih krila.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 141, 'bure.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 142, 'bure sa linijamaa.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 161, 'golub sa rasirenim krilima.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 176, 'bela rada.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 190, 'candy cat.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 193, 'emily elephant.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 214, 'korpa sa jajima i leptirom.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 241, 'auto sa zecom.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 254, 'sargarepa sa srcem.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 255, 'sargarepica sa usima.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 275, 'Beba spava na oblaku.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 276, 'beba.PNG', '7107bb0ae87f6468b441c8e849b9aef7.jpg', '8c8603ce8b082cb36854f26a51c63212.jpg', '', '', '', '', NULL),
(27, 288, 'Buket ruza.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 299, 'cigla.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 343, 'cdbacabf8052948c03c038d59b7cf0f4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 23, 'snesko mase.png', '0-02-05-b2afd82d6601875d68005d87d918919ca343d0a4c9718ff218397d88324b88a2_7794e164b294e454.jpg', '', '', '', '', '', NULL),
(34, 343, 'icons8-no-image-60.png', '', '', '', '', '', '', NULL),
(35, 343, NULL, 'icons8-no-image-60.png', '', '', '', '', '', NULL);
=======
(103, 127, 1, b'00000110001', 7, 200),
(161, 0, 2, b'00000110001', 6, 150),
(161, 81, 2, b'00000110001', 6, 150),
(193, 0, 1, b'00000110001', 7, 200),
(193, 81, 1, b'00000110001', 7, 200),
(214, 80, 1, b'00000110001', 6, 150),
(214, 127, 1, b'00000110001', 7, 200),
(214, 128, 1, b'00000110001', 7, 200),
(214, 129, 1, b'00000110001', 7, 200),
(214, 130, 1, b'00000110001', 7, 200),
(214, 131, 1, b'00000110001', 7, 200),
(214, 132, 1, b'00000110001', 7, 200),
(227, 82, 1, b'00000110001', 6, 150),
(227, 83, 1, b'00000110001', 6, 150),
(241, 127, 1, b'00000110001', 7, 200),
(242, 82, 1, b'00000110001', 7, 200),
(242, 83, 1, b'00000110001', 7, 200),
(255, 84, 1, b'00000110010', 7, 130),
(255, 96, 1, b'00000110001', 6, 150),
(255, 97, 1, b'00000110001', 6, 150),
(255, 98, 1, b'00000110001', 6, 150),
(255, 99, 1, b'00000110001', 6, 150),
(255, 100, 1, b'00000110001', 6, 150),
(255, 101, 1, b'00000110001', 6, 150),
(255, 102, 1, b'00000110001', 6, 150),
(255, 103, 1, b'00000110001', 6, 150),
(255, 104, 1, b'00000110001', 6, 150),
(255, 105, 1, b'00000110001', 6, 150),
(255, 106, 1, b'00000110001', 6, 150),
(255, 107, 1, b'00000110001', 6, 150),
(255, 108, 1, b'00000110001', 6, 150),
(255, 109, 1, b'00000110001', 6, 150),
(255, 110, 1, b'00000110001', 6, 150),
(255, 111, 1, b'00000110001', 6, 150),
(255, 120, 1, b'00000110001', 7, 200),
(255, 121, 1, b'00000110001', 7, 200),
(255, 122, 1, b'00000110001', 7, 200),
(255, 123, 1, b'00000110001', 7, 200),
(255, 124, 1, b'00000110001', 7, 200),
(255, 125, 1, b'00000110001', 7, 200),
(255, 126, 1, b'00000110001', 7, 200),
(275, 114, 2, b'00000110001', 6, 150),
(275, 115, 2, b'00000110001', 6, 150),
(275, 116, 1, b'00000110001', 7, 200),
(275, 117, 1, b'00000110001', 7, 200),
(275, 118, 1, b'00000110001', 7, 200),
(275, 119, 1, b'00000110001', 7, 200),
(275, 120, 1, b'00000110001', 7, 200),
(275, 121, 1, b'00000110001', 7, 200),
(275, 122, 1, b'00000110001', 7, 200),
(275, 123, 1, b'00000110001', 7, 200),
(275, 124, 1, b'00000110001', 7, 200),
(275, 125, 1, b'00000110001', 7, 200),
(275, 126, 1, b'00000110001', 7, 200),
(276, 0, 1, b'00000110001', 7, 200),
(276, 85, 1, b'00000110001', 7, 200),
(276, 86, 1, b'00000110001', 7, 200),
(276, 87, 1, b'00000110001', 7, 200),
(276, 88, 1, b'00000110001', 7, 200),
(276, 89, 1, b'00000110001', 7, 200),
(276, 90, 1, b'00000110001', 7, 200),
(276, 91, 1, b'00000110001', 7, 200),
(276, 92, 1, b'00000110001', 7, 200),
(276, 93, 1, b'00000110001', 7, 200),
(276, 94, 1, b'00000110001', 7, 200),
(276, 95, 1, b'00000110001', 7, 200),
(276, 116, 1, b'00000110001', 6, 150),
(276, 117, 1, b'00000110001', 6, 150),
(276, 118, 1, b'00000110001', 6, 150),
(276, 119, 1, b'00000110001', 6, 150),
(276, 122, 1, b'00000110001', 6, 150),
(276, 123, 1, b'00000110001', 6, 150),
(276, 124, 1, b'00000110001', 6, 150),
(276, 125, 1, b'00000110001', 6, 150),
(276, 126, 1, b'00000110001', 6, 150);
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `mesto` varchar(255) NOT NULL,
  `ulica` varchar(255) NOT NULL,
  `broj` int(11) NOT NULL,
  `broj_telefona` varchar(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `ime`, `prezime`, `mesto`, `ulica`, `broj`, `broj_telefona`, `username`, `password`, `email`, `role`) VALUES
(9, 'Jovana', 'Jovanovic', 'Beocin', 'Milovana Vitezovica', 16, '0631926263', 'joka98', '$2y$10$WcrbzzYRq28bkrUfGKqlJe45QeXMDGBqAECTL8q1CCVeLYecT7Jbi', 'jovana@gmail.com', 'customer'),
(10, 'Maja', 'Prokic', 'Topola', 'Bulevar Vožda Karađorđa ', 121, '0628433192', 'maja98', '$2y$10$JWz8rYJPCVM7ou5zj1FeWuP7qVae42e6k1aywOc2bCiLpBptausEm', 'mayap343@gmail.com', 'admin'),
(11, 'Milica', 'Milosavljevic', 'Grdlica', 'Milojevaa', 16, '069661475', 'milica', '$2y$10$ZLqm7fvj3spqGqbhFXtlS.NZ2TKL/9vaIPkKjQO8ntOCK2yb7rubS', 'milica@gmail.com', 'customer'),
(12, 'Novica', 'Novakovic', 'Nikolje', 'Trnavska', 16, '0628433778', 'novica', '$2y$10$hTaTUn48oFMwnOSaulFFb.RxO7Dai0QBiOC62fDgwpqKvxYd1U2hS', 'nikolanovica@gmail.com', 'customer'),
(14, 'Desanka ', 'Jovic', 'Negotin', 'Milovna Jokica', 17, '0635511478', 'desaa', '$2y$10$NdtUFxORbW/nR5wV.wMk5ey7GtbixOXEF3eVEuXYcRAx7qk/i32lS', 'desa@gmail.com', 'admin'),
(22, 'Nikolija', 'Grabic', 'Beograd', 'Jovanova', 44, '0658844215', 'nikolija', '$2y$10$a4YLN1Q2OijKab/e4Awlq.I28qLaaRL2x6jhrRXRuUBmtgX/FrjIm', 'nikolijanikolija@gmail.com', 'customer'),
(23, '', 'Jovic', 'Negotin', 'Trnavska', 16, '0631763598', 'nikolija', '$2y$10$JmFxK3iQi72us7WybS4o8evaaorcg18kbB8zlcgemvRubetfXtoqi', 'nex@gmail.com', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, '4osov3q7ulrm6a6kv3tv7bnk0l', 1627409109),
(2, '9pa6919669nf2oj0vu5rk1ln4e', 1627373176),
(3, 'u5erqebnf56q4r3jrlbn2adjae', 1627544282),
(4, 'f68u6vsehljun7ddosu32aicb2', 1627543837),
(5, '2rae45g6pe6hjhs3hvv8ujetqr', 1628324016),
(6, 'u4kllk9208eaac85lrtoqbj394', 1628352349),
(7, '35deed672sr13dud3unrmgmbfs', 1628425187),
(8, 'a62krl7gvlb1l0jljatvb6clle', 1631911669),
(9, 'rupklnl7nqh98359b47i339fb5', 1632414819),
(10, 'rupklnl7nqh98359b47i339fb5', 1632414819),
(11, 'rupklnl7nqh98359b47i339fb5', 1632414819),
(12, 'rupklnl7nqh98359b47i339fb5', 1632414819),
(13, 'rupklnl7nqh98359b47i339fb5', 1632414819),
(14, 'rupklnl7nqh98359b47i339fb5', 1632414819),
(15, 'rupklnl7nqh98359b47i339fb5', 1632414819),
(16, 'rupklnl7nqh98359b47i339fb5', 1632414819),
(17, 'rupklnl7nqh98359b47i339fb5', 1632414819),
(18, 'rupklnl7nqh98359b47i339fb5', 1632414819),
(19, 'rupklnl7nqh98359b47i339fb5', 1632414819),
(20, 'rupklnl7nqh98359b47i339fb5', 1632414827),
(21, 'rupklnl7nqh98359b47i339fb5', 1632414830),
(22, 'gv7qqfqdbp2lcj98som1i174ip', 1634475979),
(23, '243or9olduuev90e4q6kgugeu4', 1635063621),
(24, 'vpoinrnnel5g34qovapjmkodah', 1636575571),
(25, 's6n10hmb94pa0g2d6ou3n8641j', 1638700391),
(26, 'a25lt14vqujud89dbp9i4eju3d', 1646133965),
(27, 'gn4u5pl5f4c8fv07ra11a2srk7', 1647435488);

-- --------------------------------------------------------

--
-- Table structure for table `utiskivaci`
--

CREATE TABLE `utiskivaci` (
  `ID` int(11) NOT NULL,
  `Naziv` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utiskivaci`
--

INSERT INTO `utiskivaci` (`ID`, `Naziv`) VALUES
<<<<<<< HEAD
(0, 'Bez utiskivača'),
=======
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
(1, 'sa utiskivacem'),
(2, 'bez utiskivaca');

-- --------------------------------------------------------

--
-- Table structure for table `utiskivaci_po_modlama`
--

CREATE TABLE `utiskivaci_po_modlama` (
  `ID_utiskivaca` int(11) NOT NULL,
  `ID_modle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utiskivaci_po_modlama`
--

INSERT INTO `utiskivaci_po_modlama` (`ID_utiskivaca`, `ID_modle`) VALUES
<<<<<<< HEAD
(0, 19),
(0, 51),
(0, 73),
(0, 82),
(0, 83),
(0, 99),
(0, 103),
(0, 104),
(0, 105),
(0, 116),
(0, 133),
(0, 134),
(0, 140),
(0, 141),
(0, 142),
(0, 161),
(0, 176),
(0, 190),
(0, 193),
(0, 214),
(0, 241),
(0, 254),
(0, 255),
(0, 275),
(0, 276),
(0, 288),
(0, 299),
(1, 19),
(1, 23),
=======
(1, 19),
(1, 53),
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
(1, 73),
(1, 82),
(1, 83),
(1, 99),
(1, 103),
(1, 104),
(1, 105),
(1, 133),
(1, 134),
(1, 141),
(1, 142),
(1, 161),
(1, 190),
(1, 193),
(1, 214),
(1, 241),
(1, 254),
(1, 255),
(1, 275),
(1, 276),
<<<<<<< HEAD
(1, 288),
(2, 23);
=======
(2, 19),
(2, 51),
(2, 53),
(2, 73),
(2, 82),
(2, 83),
(2, 99),
(2, 103),
(2, 104),
(2, 105),
(2, 116),
(2, 133),
(2, 134),
(2, 140),
(2, 141),
(2, 142),
(2, 161),
(2, 190),
(2, 193),
(2, 214),
(2, 241),
(2, 254),
(2, 255),
(2, 275),
(2, 276);
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

-- --------------------------------------------------------

--
-- Table structure for table `velicine`
--

CREATE TABLE `velicine` (
  `ID` int(11) NOT NULL,
  `Dimenzija` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `velicine`
--

INSERT INTO `velicine` (`ID`, `Dimenzija`) VALUES
(1, 3),
(2, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `velicine_po_modli`
--

CREATE TABLE `velicine_po_modli` (
  `ID_velicine` int(11) NOT NULL,
  `ID_modle` int(11) NOT NULL,
  `RedniBrojVelicine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `velicine_po_modli`
--

INSERT INTO `velicine_po_modli` (`ID_velicine`, `ID_modle`, `RedniBrojVelicine`) VALUES
(6, 0, 1),
(6, 19, 2),
<<<<<<< HEAD
(6, 23, 2),
=======
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
(6, 51, 2),
(6, 53, 1),
(6, 73, 1),
(6, 82, 1),
(6, 83, 1),
(6, 99, 1),
<<<<<<< HEAD
(6, 101, 2),
=======
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
(6, 103, 1),
(6, 104, 1),
(6, 105, 1),
(6, 116, 1),
(6, 133, 1),
(6, 134, 1),
(6, 140, 2),
(6, 141, 1),
(6, 142, 1),
(6, 146, 1),
(6, 157, 1),
(6, 161, 1),
<<<<<<< HEAD
(6, 176, 2),
=======
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
(6, 190, 1),
(6, 193, 1),
(6, 214, 1),
(6, 227, 1),
(6, 241, 1),
(6, 242, 1),
(6, 254, 1),
(6, 255, 1),
(6, 275, 1),
(6, 276, 2),
<<<<<<< HEAD
(6, 343, 2),
(7, 0, 2),
(7, 19, 3),
(7, 23, 3),
=======
(7, 0, 2),
(7, 19, 3),
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
(7, 51, 3),
(7, 53, 2),
(7, 73, 2),
(7, 82, 2),
(7, 83, 2),
(7, 99, 2),
<<<<<<< HEAD
(7, 101, 3),
=======
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
(7, 103, 2),
(7, 104, 2),
(7, 105, 2),
(7, 116, 2),
(7, 133, 2),
(7, 134, 2),
(7, 140, 3),
(7, 141, 1),
(7, 142, 2),
(7, 146, 2),
(7, 157, 2),
(7, 161, 2),
<<<<<<< HEAD
(7, 176, 3),
=======
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
(7, 190, 2),
(7, 193, 2),
(7, 214, 2),
(7, 227, 2),
(7, 241, 2),
(7, 242, 2),
(7, 254, 1),
(7, 255, 2),
(7, 275, 2),
(7, 276, 3),
<<<<<<< HEAD
(7, 343, 3),
(8, 0, 3),
(8, 19, 4),
(8, 23, 4),
=======
(8, 0, 3),
(8, 19, 4),
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
(8, 51, 4),
(8, 53, 3),
(8, 73, 3),
(8, 82, 3),
(8, 83, 3),
(8, 99, 3),
<<<<<<< HEAD
(8, 101, 4),
=======
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
(8, 103, 3),
(8, 104, 3),
(8, 105, 3),
(8, 116, 3),
(8, 133, 3),
(8, 134, 3),
(8, 140, 4),
(8, 141, 2),
(8, 142, 3),
(8, 146, 3),
(8, 157, 3),
(8, 161, 3),
<<<<<<< HEAD
(8, 176, 4),
=======
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
(8, 190, 3),
(8, 193, 3),
(8, 214, 3),
(8, 227, 3),
(8, 241, 3),
(8, 242, 3),
(8, 254, 2),
(8, 255, 3),
(8, 275, 3),
<<<<<<< HEAD
(8, 276, 4),
(8, 288, 1),
(8, 343, 4),
(9, 288, 2);
=======
(8, 276, 4);
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cene`
--
ALTER TABLE `cene`
  ADD PRIMARY KEY (`ID_velicine`,`ID_utiskivaca`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kupci`
--
ALTER TABLE `kupci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modla`
--
ALTER TABLE `modla`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narudzbenica`
--
ALTER TABLE `narudzbenica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUserForeignKey` (`id_user`);

--
-- Indexes for table `opis_modle`
--
ALTER TABLE `opis_modle`
  ADD PRIMARY KEY (`ID_opisa`);

--
-- Indexes for table `poručeni_artikli`
--
ALTER TABLE `poručeni_artikli`
  ADD PRIMARY KEY (`ID_proizvoda`,`ID_narudzbenice`);

--
<<<<<<< HEAD
-- Indexes for table `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`id`);

--
=======
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utiskivaci`
--
ALTER TABLE `utiskivaci`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `utiskivaci_po_modlama`
--
ALTER TABLE `utiskivaci_po_modlama`
<<<<<<< HEAD
  ADD PRIMARY KEY (`ID_utiskivaca`,`ID_modle`);
=======
  ADD PRIMARY KEY (`ID_utiskivaca`,`ID_modle`),
  ADD KEY `ID_utiskivaca` (`ID_utiskivaca`),
  ADD KEY `ID_modle` (`ID_modle`);
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

--
-- Indexes for table `velicine`
--
ALTER TABLE `velicine`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `velicine_po_modli`
--
ALTER TABLE `velicine_po_modli`
  ADD PRIMARY KEY (`ID_velicine`,`ID_modle`),
  ADD KEY `ID_modle` (`ID_modle`),
  ADD KEY `velicine_po_modli_ibfk_1` (`ID_velicine`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

--
-- AUTO_INCREMENT for table `kupci`
--
ALTER TABLE `kupci`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

--
-- AUTO_INCREMENT for table `narudzbenica`
--
ALTER TABLE `narudzbenica`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

--
-- AUTO_INCREMENT for table `opis_modle`
--
ALTER TABLE `opis_modle`
<<<<<<< HEAD
  MODIFY `ID_opisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `slike`
--
ALTER TABLE `slike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
=======
  MODIFY `ID_opisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
<<<<<<< HEAD
=======
-- AUTO_INCREMENT for table `utiskivaci`
--
ALTER TABLE `utiskivaci`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
-- AUTO_INCREMENT for table `velicine`
--
ALTER TABLE `velicine`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `narudzbenica`
--
ALTER TABLE `narudzbenica`
  ADD CONSTRAINT `idUserForeignKey` FOREIGN KEY (`id_user`) REFERENCES `kupci` (`id`);

--
-- Constraints for table `utiskivaci_po_modlama`
--
ALTER TABLE `utiskivaci_po_modlama`
  ADD CONSTRAINT `utiskivaci_po_modlama_ibfk_1` FOREIGN KEY (`ID_utiskivaca`) REFERENCES `utiskivaci` (`ID`),
  ADD CONSTRAINT `utiskivaci_po_modlama_ibfk_2` FOREIGN KEY (`ID_modle`) REFERENCES `modla` (`id`);

--
-- Constraints for table `velicine_po_modli`
--
ALTER TABLE `velicine_po_modli`
  ADD CONSTRAINT `velicine_po_modli_ibfk_1` FOREIGN KEY (`ID_velicine`) REFERENCES `velicine` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
