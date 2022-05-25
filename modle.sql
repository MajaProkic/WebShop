-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 04:21 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
(6, 1, 150),
(6, 2, 100),
(7, 1, 200),
(7, 2, 130),
(8, 1, 250),
(8, 2, 160);

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
  `naziv` varchar(255) NOT NULL,
  `kategorija_id` int(11) NOT NULL,
  `opis` varchar(999) NOT NULL,
  `slika` varchar(255) NOT NULL,
  `hashtag` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modla`
--

INSERT INTO `modla` (`id`, `naziv`, `kategorija_id`, `opis`, `slika`, `hashtag`) VALUES
(0, 'Anđeo raširenih krila', 6, 'Anđeo raširenih krila je modla koja nema utiskivač. Može se koristiti za razne praznike jer predstavlja jedan od osnovnih simbola vere.', 'andjeo rasirenih krila.PNG', '#andjeo#anđeo#krila#slavske#modle#božićne#bozicne'),
(51, 'Krst', 0, 'Pravoslavni krst je nezaobilazna slavska modla', 'krst.PNG', '#krst#modle#slavske#pravoslavni'),
(53, 'Hrastov list', 0, 'Hrastov list se može koristiti pri dekorisanju slavskog kolača. ', 'list hrasta.PNG', '#list#hrast#slavski#kolač#kolac#modle'),
(82, 'Grožđe i vino', 0, 'Grožđe, vino i čaša predstavljaju neke od simbola pravoslavlja. Samim tim se često nalaze na trpezi kada je slava.', 'grozdje vino casa.PNG', '#grožđe#vino#čaša#slava#slavska#modla#casa#grozdje'),
(83, 'Knjiga i krst', 5, 'Modla standardne veličine, sa utiskivačem uredno ocrtava svaki detalj. ', 'knjiga sa krstom.PNG', '#krst#knjiga#slava#modla#slavske'),
(103, 'Zeka drži šargarepu', 2, 'ya', 'cupavi zeka sa sargarepom.PNG', '#zeka#jaje#zekadrzisargarepu#cupavi#uskrsnje#uskršnje#modle#modlice#sargarepa#sangarepa'),
(104, 'Zeka na jajetu', 2, 'Još jedna modla od mini seta sličnih modlica gde je glavni motiv zeka', 'cupavi zeka na jajetu.PNG', '#zeka#jaje#zekanajajetu#cupavi#uskrsnje#uskršnje#modle#modlice'),
(105, 'Zeka drži jaje', 2, 'Simboli uskršnjeg praznika na jednoj modlici.', 'cupavi zeka drzi jaje.PNG', '#zeka#jaje#zekadrzijaje#cupavi#uskrsnje#uskršnje#modle#modlice'),
(116, 'Anđeo koji se moli', 0, 'Modla anđela koji se moli može se naći i u kategoriji slavskih modli, ali i u kategoriji novogodišnjih modli', 'andjeo se moli.PNG', '#andjeo#molitva#novogodišnje#slavske#modle'),
(133, 'Golub', 6, 'Golub ', 'golub lik.PNG', '#golub#slavske#modle'),
(134, 'Grožđe', 5, 'Modla standardnih veličina, čest simbol slavske trpeze', 'grozdje.PNG', '#grozdje#slava#modla#slavska'),
(141, 'Bure', 6, 'Bure jednostavno iz prvog lica.', 'bure.PNG', '#bure#bacva#slavske#modle'),
(142, 'Bure sa linijama', 6, 'U ponudi imamo i ovakav tip bureta', 'bure sa linijamaa.PNG', '#bure#slavske#modle#bacva#bačva'),
(146, 'Irvas raširenih ruku', 1, 'Novogodišnja modlica irvasa raširenih ruku. Jednostavnog dizajna obećava dobro utiskivanje u testo.', 'irvas rasirenih ruku.png', '#irvas#nova#godina#modle#novogodisnje'),
(157, 'Irvas sa lampicama', 1, 'Irvas sa lampicama na rogovima pripada tematici novogodisnjih modli, zbog svojih detaljnijih šara u predelu rogova preporučiljivo je poručivati modlu u većim dimenzijama zbog efektnijeg otiska na testu', 'irvas sa lampicama.PNG', '#irvas#lampice#nova#godina#novogodisnje#modle'),
(161, 'Golub sa raširenim krilima', 6, '<div class=\"description\">\r\n    <p class=\'attribute\'>Debljina sekača: </p>\r\n    <p class=\'attribute_value\'> 10 cm</p>\r\n    <p class=\'attribute\'>Širina modle: </p>\r\n    <p class=\'attribute_value\'> 6,4cm</p>\r\n  <p class=\'attribute\'>Dužina modle:</p>\r\n    <p class=\'attribute_value\'> 5,3cm</p>\r\n  <p class=\'attribute\'>Debljina utiskivača:</p>\r\n    <p class=\'attribute_value\'> 6mm</p>\r\n  <p class=\'attribute\'>Težina modle:</p>\r\n    <p class=\'attribute_value\'>  5g</p>\r\n</div>', 'golub sa rasirenim krilima.PNG', '#slavske#modle#golub#ptica'),
(190, 'Candy Cat - Pepa Pig', 9, 'Candy cat pepa prase', 'candy cat.PNG', '#candy#cat#pepa#prase#modlice#za#decu#modle'),
(193, 'Emily elephant - Pepa Pig', 9, 'emilija slonica', 'emily elephant.PNG', '#pepa#prase#pig#modle#modlice#za#decu'),
(227, 'Časne verige Svetog Petra - Lik', 6, 'Časne verige Svetog Petra..', 'Casne verige sv petra lik.PNG', '#casne#časne#verige#svetog#petra#lik#ikona'),
(241, 'Zeka u automobilu', 2, 'Zeka u automobilu sa sargarepicma.', 'auto sa zecom.PNG', '#uskrsnje#modle#modlice#za#kolace');

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
(1, 'Sa utiskivacem'),
(2, 'Bez utiskivaca');

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
(2, 116),
(1, 141),
(2, 141),
(2, 193),
(1, 190),
(2, 190),
(1, 227),
(2, 227),
(1, 161),
(2, 161),
(1, 157),
(2, 157),
(1, 146),
(2, 146),
(1, 146),
(2, 146),
(2, 0),
(2, 51);

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
(5, 190, 3),
(6, 146, 1),
(6, 190, 2),
(7, 146, 2),
(7, 190, 1),
(8, 146, 3);

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
-- Indexes for table `utiskivaci`
--
ALTER TABLE `utiskivaci`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `utiskivaci_po_modlama`
--
ALTER TABLE `utiskivaci_po_modlama`
  ADD KEY `ID_utiskivaca` (`ID_utiskivaca`),
  ADD KEY `ID_modle` (`ID_modle`);

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
-- AUTO_INCREMENT for table `utiskivaci`
--
ALTER TABLE `utiskivaci`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `velicine`
--
ALTER TABLE `velicine`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

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
