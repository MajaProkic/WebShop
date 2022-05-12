-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2022 at 11:32 AM
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
(9, 'Crtani junaci');

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
  `telefon` varchar(12) NOT NULL,
  `napomena` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kupci`
--

INSERT INTO `kupci` (`id`, `ime`, `prezime`, `email`, `mesto`, `ulica`, `broj`, `telefon`, `napomena`) VALUES
(1, 'Maja', 'Prokic', 'mayap343@gmail.com', 'Topola', 'Bulevar Vožda Karađorđa ', '2', '62858585', 'gnng'),
(8, 'Nikolina', 'Nikolic', 'nikolinanina@gmail.c', 'Beograd', 'Niksicka', '1', '651414525', ''),
(25, 'Dragana', 'Jokic', 'gaga@gmail.com', 'Begaljica', 'mikolina', '1', '628844316', ''),
(26, 'Dragana', 'Jokic', 'gaga@gmail.com', 'Begaljica', 'mikolina', '1', '628844316', ''),
(27, 'Zlata', 'Zlatkovic', 'zlata@gmail.com', 'Mitrovica', 'Zelenska', '1', '628443316', ''),
(28, 'Zlata', 'Zlatkovic', 'zlata@gmail.com', 'Mitrovica', 'Zelenska', '1', '628443316', ''),
(29, 'Biljanaa', 'Dragojevic', 'bilja@gmail.com', 'Beograd', 'Milutina Milankovica', '1', '628956233', ''),
(30, 'Biljanaa', 'Dragojevic', 'bilja@gmail.com', 'Beograd', 'Milutina Milankovica', '1', '628956233', ''),
(31, 'Maja', 'Prokic', 'mayap343@gmail.com', 'Topola', 'Bulevar Vožda Karađorđa ', '2', '628433192', 'gnng'),
(33, 'Aleksandra', 'Nikolic', 'nikolicaleks@gmail.c', 'Beograd', 'Milutina Mil', '1', '651415221', ''),
(34, 'Dragica', 'Dragic', 'dragica@gmail.com', 'Kragujevac', 'Jastrebacka', '1', '692215147', ''),
(35, 'Desanka', 'Jovic', 'desa@gmail.com', 'Negotin', 'Milovna Jokica', '1', '0635511478', ''),
(36, 'Draganaa', 'Dragojevic', 'dragana123@gmail.com', 'Bujanovac', 'Cetnicka', '1', '628844663', ''),
(37, 'Nevena', 'Nikolic', 'nevena@gmail.com', 'Despotovac', 'milanovacka', '1', '628843629', ''),
(38, 'Nikola', 'Nikolic', 'nikola@gmail.com', 'Beocin', 'Sremska', '1', '654411589', ''),
(40, 'Nikola', 'Nikolic', 'nikola@gmail.com', 'Beocin', 'Sremska', '16', '0654411589', ''),
(41, 'Nikola', 'Nikolic', 'nikola@gmail.com', 'Beocin', 'Sremska', '16', '0654411589', ''),
(42, 'Nikola', 'Nikolic', 'nikola@gmail.com', 'Beocin', 'Sremska', '16', '0654411589', ''),
(43, 'Dubravka', 'Ostojic', 'dubravka@gmail.com', 'Beograd', 'Beogradska', '17', '065998521', ''),
(44, 'Negovan', 'Milojevic', 'nex@gmail.com', 'Beograd', 'Surcinski put', '0', '0631763598', ''),
(45, 'Ana', 'Jovanovic', 'ana@gmail.com', 'Kragujevac', 'aujnol', '2', '065310523', ''),
(46, 'Ana', 'Jovanovic', 'anajokv@gmail.com', 'Kragujevac', 'aujnol', '2', '065310523', ''),
(47, 'faegae', 'asfdgrshbwr', 'wfeghrshjtdkk', 'dawdg', 'eagsrh', '54', '242452045245', '');

-- --------------------------------------------------------

--
-- Table structure for table `modla`
--

CREATE TABLE `modla` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `kategorija_id` int(11) NOT NULL,
  `utiskivac` tinyint(1) NOT NULL,
  `opis` varchar(999) NOT NULL,
  `slika` varchar(255) NOT NULL,
  `hashtag` varchar(700) NOT NULL,
  `velicina_1` int(11) NOT NULL,
  `velicina_2` int(11) DEFAULT NULL,
  `velicina_3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modla`
--

INSERT INTO `modla` (`id`, `status`, `naziv`, `kategorija_id`, `utiskivac`, `opis`, `slika`, `hashtag`, `velicina_1`, `velicina_2`, `velicina_3`) VALUES
(0, 1, 'Anđeo raširenih krila', 6, 0, 'Anđeo raširenih krila je modla koja nema utiskivač. Može se koristiti za razne praznike jer predstavlja jedan od osnovnih simbola vere.', 'andjeo rasirenih krila.PNG', '#andjeo#anđeo#krila#slavske#modle#božićne#bozicne', 6, 7, 8),
(51, 1, 'Krst', 0, 0, 'Pravoslavni krst je nezaobilazna slavska modla', 'krst.PNG', '#krst#modle#slavske#pravoslavni', 6, 7, 8),
(53, 1, 'Hrastov list', 0, 1, 'Hrastov list se može koristiti pri dekorisanju slavskog kolača. ', 'list hrasta.PNG', '#list#hrast#slavski#kolač#kolac#modle', 6, 7, 8),
(82, 1, 'Grožđe i vino', 0, 1, 'Grožđe, vino i čaša predstavljaju neke od simbola pravoslavlja. Samim tim se često nalaze na trpezi kada je slava.', 'grozdje vino casa.PNG', '#grožđe#vino#čaša#slava#slavska#modla#casa#grozdje', 6, 7, 8),
(83, 1, 'Knjiga i krst', 5, 1, 'Modla standardne veličine, sa utiskivačem uredno ocrtava svaki detalj. ', 'knjiga sa krstom.PNG', '#krst#knjiga#slava#modla#slavske', 6, 7, 8),
(103, 1, 'Zeka drži šargarepu', 2, 1, 'ya', 'cupavi zeka sa sargarepom.PNG', '#zeka#jaje#zekadrzisargarepu#cupavi#uskrsnje#uskršnje#modle#modlice#sargarepa#sangarepa', 6, 7, 8),
(104, 1, 'Zeka na jajetu', 2, 1, 'Još jedna modla od mini seta sličnih modlica gde je glavni motiv zeka', 'cupavi zeka na jajetu.PNG', '#zeka#jaje#zekanajajetu#cupavi#uskrsnje#uskršnje#modle#modlice', 6, 7, 8),
(105, 1, 'Zeka drži jaje', 2, 1, 'Simboli uskršnjeg praznika na jednoj modlici.', 'cupavi zeka drzi jaje.PNG', '#zeka#jaje#zekadrzijaje#cupavi#uskrsnje#uskršnje#modle#modlice', 6, 7, 8),
(116, 1, 'Anđeo koji se moli', 0, 0, 'Modla anđela koji se moli može se naći i u kategoriji slavskih modli, ali i u kategoriji novogodišnjih modli', 'andjeo se moli.PNG', '#andjeo#molitva#novogodišnje#slavske#modle', 6, 7, 8),
(133, 1, 'Golub', 6, 1, 'Golub ', 'golub lik.PNG', '#golub#slavske#modle', 6, 7, 8),
(134, 1, 'Grožđe', 5, 1, 'Modla standardnih veličina, čest simbol slavske trpeze', 'grozdje.PNG', '#grozdje#slava#modla#slavska', 6, 7, 8),
(141, 1, 'Bure', 6, 1, 'Bure jednostavno iz prvog lica.', 'bure.PNG', '#bure#bacva#slavske#modle', 6, 7, 8),
(142, 1, 'Bure sa linijama', 6, 1, 'U ponudi imamo i ovakav tip bureta', 'bure sa linijamaa.PNG', '#bure#slavske#modle#bacva#bačva', 6, 7, 8),
(146, 1, 'Irvas raširenih ruku', 0, 1, 'Novogodišnja modlica irvasa raširenih ruku. Jednostavnog dizajna obećava dobro utiskivanje u testo.', 'irvas rasirenih ruku.png', '#irvas#nova#godina#modle#novogodisnje', 6, 7, 8),
(157, 1, 'Irvas sa lampicama', 0, 1, 'Irvas sa lampicama na rogovima pripada tematici novogodisnjih modli, zbog svojih detaljnijih šara u predelu rogova preporučiljivo je poručivati modlu u većim dimenzijama zbog efektnijeg otiska na testu', 'irvas sa lampicama.PNG', '#irvas#lampice#nova#godina#novogodisnje#modle', 6, 7, 8),
(161, 1, 'Golub sa raširenim krilima', 5, 1, '<div class=\"description\">\r\n    <p class=\'attribute\'>Debljina sekača: </p>\r\n    <p class=\'attribute_value\'> 10 cm</p>\r\n    <p class=\'attribute\'>Širina modle: </p>\r\n    <p class=\'attribute_value\'> 6,4cm</p>\r\n  <p class=\'attribute\'>Dužina modle:</p>\r\n    <p class=\'attribute_value\'> 5,3cm</p>\r\n  <p class=\'attribute\'>Debljina utiskivača:</p>\r\n    <p class=\'attribute_value\'> 6mm</p>\r\n  <p class=\'attribute\'>Težina modle:</p>\r\n    <p class=\'attribute_value\'>  5g</p>\r\n</div>', 'golub sa rasirenim krilima.PNG', '#slavske#modle#golub#ptica', 6, 7, 8),
(227, 1, 'Časne verige Svetog Petra - Lik', 6, 1, 'Časne verige Svetog Petra..', 'Casne verige sv petra lik.PNG', '#casne#časne#verige#svetog#petra#lik#ikona', 6, 7, 8),
(241, 1, 'Zeka u automobilu', 2, 1, 'Zeka u automobilu sa sargarepicma.', 'auto sa zecom.PNG', '#uskrsnje#modle#modlice#za#kolace', 6, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `narudzbenica`
--

CREATE TABLE `narudzbenica` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `narudzbenica`
--

INSERT INTO `narudzbenica` (`id`, `id_user`, `datum`) VALUES
(20, 35, '2022-05-07'),
(21, 35, '2022-05-07'),
(22, 35, '2022-05-07'),
(23, 35, '2022-05-07'),
(24, 35, '2022-05-07'),
(25, 45, '2022-05-07'),
(26, 45, '2022-05-07'),
(27, 46, '2022-05-07'),
(28, 46, '2022-05-07'),
(29, 46, '2022-05-07'),
(30, 46, '2022-05-07'),
(31, 46, '2022-05-07'),
(32, 46, '2022-05-07'),
(33, 35, '2022-05-07'),
(34, 35, '2022-05-07'),
(35, 47, '2022-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `poručeni_artikli`
--

CREATE TABLE `poručeni_artikli` (
  `ID_proizvoda` int(11) NOT NULL,
  `ID_narudzbenice` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL,
  `utiskivac` bit(11) NOT NULL,
  `velicina` int(11) NOT NULL,
  `cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(14, 'Desanka ', 'Jovic', 'Negotin', 'Milovna Jokica', 17, '0635511478', 'desaa', '$2y$10$NdtUFxORbW/nR5wV.wMk5ey7GtbixOXEF3eVEuXYcRAx7qk/i32lS', 'desa@gmail.com', 'admin');

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
-- Table structure for table `velicine_modli`
--

CREATE TABLE `velicine_modli` (
  `id` int(11) NOT NULL,
  `velicina` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `velicine_modli`
--

INSERT INTO `velicine_modli` (`id`, `velicina`) VALUES
(3, '3 cm'),
(4, '4 cm'),
(5, '5 cm'),
(6, '6 cm'),
(7, '7 cm'),
(8, '8 cm'),
(9, '9 cm'),
(10, '10 cm'),
(11, '11 cm'),
(12, '12 cm'),
(13, '13 cm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poručeni_artikli`
--
ALTER TABLE `poručeni_artikli`
  ADD PRIMARY KEY (`ID_proizvoda`,`ID_narudzbenice`);

--
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
-- Indexes for table `velicine_modli`
--
ALTER TABLE `velicine_modli`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kupci`
--
ALTER TABLE `kupci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `narudzbenica`
--
ALTER TABLE `narudzbenica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `velicine_modli`
--
ALTER TABLE `velicine_modli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
