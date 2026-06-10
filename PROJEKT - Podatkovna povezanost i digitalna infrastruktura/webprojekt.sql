-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 09, 2026 at 08:51 PM
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
-- Database: `webprojekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) DEFAULT NULL,
  `prezime` varchar(50) DEFAULT NULL,
  `korisnicko_ime` varchar(50) DEFAULT NULL,
  `lozinka` varchar(255) DEFAULT NULL,
  `razina` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Jakša', 'Mencl', 'admin', '$2y$10$qngpMDRmHSU0d.I5N2.DrORBUvGkX..f0BCzkOdJXLdP8atUKknfC', 1),
(4, 'Obican', 'Korisnik', 'obican_korisnik123', '$2y$10$jybUlzs6i/a8eYWRAltmOex8UEcDbGfUakZvTBCMFXJ12jbQJcoeC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(255) NOT NULL,
  `kategorija` varchar(50) NOT NULL,
  `arhiva` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(1, '2026-06-09', 'Pour la Cour de Luxembourg, les patrons doivent mesurer « le temps de travail journalier »', 'Pour la Cour de Luxembourg, les\r\npatrons doivent mesurer « le temps de\r\ntravail journalier »', 'Vous pouvez partager un article en cliquant sur les icônes de partage en haut à droite de celui-ci. \r\nLa reproduction totale ou partielle d’un article, sans l’autorisation écrite et préalable du Monde, est strictement interdite. \r\nPour plus d’informations, consultez nos conditions générales de vente. \r\nPour toute demande d’autorisation, contactez syndication@lemonde.fr. \r\nEn tant qu’abonné, vous pouvez offrir jusqu’à cinq articles par mois à l’un de vos proches grâce à la fonctionnalité « Offrir un article ». \r\n\r\nhttps://www.lemonde.fr/politique/article/2019/05/16/pour-la-cour-de-luxembourg-les-patrons-doivent-mesurer-le-temps-de-travail-journalier_5462895_823448.html\r\nLes pointeuses vont-elles se multiplier dans les entreprises ? Voilà l’une des questions qui vient à l’esprit, à la lecture d’un arrêt rendu mardi 14 mai par la Cour de justice de l’Union européenne (CJUE). Cette juridiction, implantée à Luxembourg, conclut que les Etats membres sont tenus d’obliger les employeurs à instaurer un système « permettant de mesurer la durée du temps de travail journalier effectué par chaque travailleur ». La décision ne remet – a priori – pas en cause la législation existante en France, mais elle réaffirme avec plus de vigueur la nécessité de veiller au respect effectif des temps de repos auxquels ont droit les personnes en activité. Ce qui inspire un peu de perplexité chez des directeurs des ressources humaines (DRH).\r\n\r\nLire aussi  Article réservé à nos abonnés Le droit social qui vient du Luxembourg\r\n\r\nL’affaire examinée par la CJUE résulte d’une démarche de l’Audiencia Nacional – la Cour centrale en Espagne. Celle-ci voulait obtenir un éclairage sur les règles européennes relatives à « l’aménagement du temps de travail » et à « l’amélioration de la sécurité et de la santé des travailleurs ». Sa demande avait été présentée à la suite d’un différend entre une organisation syndicale – la Federación de servicios de comisiones obreras (CCOO) – et la Deutsche Bank : la première reprochait à la seconde de ne pas avoir institué un dispositif « d’enregistrement du temps de travail journalier » des salariés, alors même que, à ses yeux, la loi nationale tout comme les textes européens le prévoient.', 'politika.avif', 'politique', 0),
(2, '2026-06-09', 'Pour la Cour de Luxembourg, les patrons doivent mesurer « le temps de travail journalier »', 'Pour la Cour de Luxembourg, les\r\npatrons doivent mesurer « le temps de\r\ntravail journalier »', 'Vous pouvez partager un article en cliquant sur les icônes de partage en haut à droite de celui-ci. \r\nLa reproduction totale ou partielle d’un article, sans l’autorisation écrite et préalable du Monde, est strictement interdite. \r\nPour plus d’informations, consultez nos conditions générales de vente. \r\nPour toute demande d’autorisation, contactez syndication@lemonde.fr. \r\nEn tant qu’abonné, vous pouvez offrir jusqu’à cinq articles par mois à l’un de vos proches grâce à la fonctionnalité « Offrir un article ». \r\n\r\nhttps://www.lemonde.fr/politique/article/2019/05/16/pour-la-cour-de-luxembourg-les-patrons-doivent-mesurer-le-temps-de-travail-journalier_5462895_823448.html\r\nLes pointeuses vont-elles se multiplier dans les entreprises ? Voilà l’une des questions qui vient à l’esprit, à la lecture d’un arrêt rendu mardi 14 mai par la Cour de justice de l’Union européenne (CJUE). Cette juridiction, implantée à Luxembourg, conclut que les Etats membres sont tenus d’obliger les employeurs à instaurer un système « permettant de mesurer la durée du temps de travail journalier effectué par chaque travailleur ». La décision ne remet – a priori – pas en cause la législation existante en France, mais elle réaffirme avec plus de vigueur la nécessité de veiller au respect effectif des temps de repos auxquels ont droit les personnes en activité. Ce qui inspire un peu de perplexité chez des directeurs des ressources humaines (DRH).\r\n\r\nLire aussi  Article réservé à nos abonnés Le droit social qui vient du Luxembourg\r\n\r\nL’affaire examinée par la CJUE résulte d’une démarche de l’Audiencia Nacional – la Cour centrale en Espagne. Celle-ci voulait obtenir un éclairage sur les règles européennes relatives à « l’aménagement du temps de travail » et à « l’amélioration de la sécurité et de la santé des travailleurs ». Sa demande avait été présentée à la suite d’un différend entre une organisation syndicale – la Federación de servicios de comisiones obreras (CCOO) – et la Deutsche Bank : la première reprochait à la seconde de ne pas avoir institué un dispositif « d’enregistrement du temps de travail journalier » des salariés, alors même que, à ses yeux, la loi nationale tout comme les textes européens le prévoient.', 'politika.avif', 'politique', 0),
(18, '2026-06-09', 'Pour la Cour de Luxembourg, les patrons doivent mesurer « le temps de travail journalier »', 'Pour la Cour de Luxembourg, les\r\npatrons doivent mesurer « le temps de\r\ntravail journalier »', 'Vous pouvez partager un article en cliquant sur les icônes de partage en haut à droite de celui-ci. \r\nLa reproduction totale ou partielle d’un article, sans l’autorisation écrite et préalable du Monde, est strictement interdite. \r\nPour plus d’informations, consultez nos conditions générales de vente. \r\nPour toute demande d’autorisation, contactez syndication@lemonde.fr. \r\nEn tant qu’abonné, vous pouvez offrir jusqu’à cinq articles par mois à l’un de vos proches grâce à la fonctionnalité « Offrir un article ». \r\n\r\nhttps://www.lemonde.fr/politique/article/2019/05/16/pour-la-cour-de-luxembourg-les-patrons-doivent-mesurer-le-temps-de-travail-journalier_5462895_823448.html\r\nLes pointeuses vont-elles se multiplier dans les entreprises ? Voilà l’une des questions qui vient à l’esprit, à la lecture d’un arrêt rendu mardi 14 mai par la Cour de justice de l’Union européenne (CJUE). Cette juridiction, implantée à Luxembourg, conclut que les Etats membres sont tenus d’obliger les employeurs à instaurer un système « permettant de mesurer la durée du temps de travail journalier effectué par chaque travailleur ». La décision ne remet – a priori – pas en cause la législation existante en France, mais elle réaffirme avec plus de vigueur la nécessité de veiller au respect effectif des temps de repos auxquels ont droit les personnes en activité. Ce qui inspire un peu de perplexité chez des directeurs des ressources humaines (DRH).\r\n\r\nLire aussi  Article réservé à nos abonnés Le droit social qui vient du Luxembourg\r\n\r\nL’affaire examinée par la CJUE résulte d’une démarche de l’Audiencia Nacional – la Cour centrale en Espagne. Celle-ci voulait obtenir un éclairage sur les règles européennes relatives à « l’aménagement du temps de travail » et à « l’amélioration de la sécurité et de la santé des travailleurs ». Sa demande avait été présentée à la suite d’un différend entre une organisation syndicale – la Federación de servicios de comisiones obreras (CCOO) – et la Deutsche Bank : la première reprochait à la seconde de ne pas avoir institué un dispositif « d’enregistrement du temps de travail journalier » des salariés, alors même que, à ses yeux, la loi nationale tout comme les textes européens le prévoient.', 'politika.avif', 'politique', 0),
(19, '2026-06-09', 'Dopage : la Slovénie dans l\'œil du cyclone « Aderlass »', 'Dopage : la Slovénie dans l\'œil du cyclone « Aderlass »', 'Vous pouvez partager un article en cliquant sur les icônes de partage en haut à droite de celui-ci. \r\nLa reproduction totale ou partielle d’un article, sans l’autorisation écrite et préalable du Monde, est strictement interdite. \r\nPour plus d’informations, consultez nos conditions générales de vente. \r\nPour toute demande d’autorisation, contactez syndication@lemonde.fr. \r\nEn tant qu’abonné, vous pouvez offrir jusqu’à cinq articles par mois à l’un de vos proches grâce à la fonctionnalité « Offrir un article ». \r\n\r\nhttps://www.lemonde.fr/sport/article/2019/05/16/dopage-la-slovenie-dans-l-il-du-cyclone-aderlass_5462878_3242.html\r\nY a-t-il quelque chose de « pourri » dans le cyclisme de Slovénie ? Tous les regards sont en tout cas tournés vers la petite république adriatique depuis la révélation de l’implication d’un cycliste et d’un ancien cycliste slovènes dans l’opération « Aderlass », cette enquête de la police allemande sur un réseau de dopage sanguin organisé.\r\n\r\nMardi 15 mai, l’Union cycliste internationale (UCI) a suspendu à titre provisoire le coureur Kristjan Koren et l’ancien coureur, désormais directeur sportif, Borut Bozic, de l’équipe Bahreïn-Merida. Ils sont accusés par le médecin au centre de l’enquête, l’Allemand Mark Schmidt, d’avoir bénéficié d’auto-transfusions en 2012 et 2013.\r\n\r\nLe Croate Kristijan Durasek est également visé, sur une période plus récente. Né à Varazdin, à 30 kilomètres de la frontière slovène, il est proche de nombreux cyclistes slovènes, lui qui est passé par deux équipes amateures du pays : Perutnina Ptuj (2006-2008) et Adria Mobil (2012).\r\n\r\nLire aussi  Article réservé à nos abonnés Le cyclisme touché par une nouvelle affaire de dopage sanguin\r\n\r\nCes dernières années, le cyclisme slovène a enregistré un grand nombre de cas positifs. Selon notre recensement, 8 des 19 coureurs slovènes ayant évolué dans le World Tour (la première division du cyclisme) depuis dix ans ont été suspendus pour dopage, parfois avant ou après leur passage dans l’élite du cyclisme. Soit 42 % d’entre eux, une proportion énorme au regard de la faible efficacité de la lutte antidopage.', 'sport.avif', 'sport', 0),
(20, '2026-06-09', 'Dopage : la Slovénie dans l\'œil du cyclone « Aderlass »', 'Dopage : la Slovénie dans l\'œil du\r\ncyclone « Aderlass »', 'Vous pouvez partager un article en cliquant sur les icônes de partage en haut à droite de celui-ci. \r\nLa reproduction totale ou partielle d’un article, sans l’autorisation écrite et préalable du Monde, est strictement interdite. \r\nPour plus d’informations, consultez nos conditions générales de vente. \r\nPour toute demande d’autorisation, contactez syndication@lemonde.fr. \r\nEn tant qu’abonné, vous pouvez offrir jusqu’à cinq articles par mois à l’un de vos proches grâce à la fonctionnalité « Offrir un article ». \r\n\r\nhttps://www.lemonde.fr/sport/article/2019/05/16/dopage-la-slovenie-dans-l-il-du-cyclone-aderlass_5462878_3242.html\r\nY a-t-il quelque chose de « pourri » dans le cyclisme de Slovénie ? Tous les regards sont en tout cas tournés vers la petite république adriatique depuis la révélation de l’implication d’un cycliste et d’un ancien cycliste slovènes dans l’opération « Aderlass », cette enquête de la police allemande sur un réseau de dopage sanguin organisé.\r\n\r\nMardi 15 mai, l’Union cycliste internationale (UCI) a suspendu à titre provisoire le coureur Kristjan Koren et l’ancien coureur, désormais directeur sportif, Borut Bozic, de l’équipe Bahreïn-Merida. Ils sont accusés par le médecin au centre de l’enquête, l’Allemand Mark Schmidt, d’avoir bénéficié d’auto-transfusions en 2012 et 2013.\r\n\r\nLe Croate Kristijan Durasek est également visé, sur une période plus récente. Né à Varazdin, à 30 kilomètres de la frontière slovène, il est proche de nombreux cyclistes slovènes, lui qui est passé par deux équipes amateures du pays : Perutnina Ptuj (2006-2008) et Adria Mobil (2012).\r\n\r\nLire aussi  Article réservé à nos abonnés Le cyclisme touché par une nouvelle affaire de dopage sanguin\r\n\r\nCes dernières années, le cyclisme slovène a enregistré un grand nombre de cas positifs. Selon notre recensement, 8 des 19 coureurs slovènes ayant évolué dans le World Tour (la première division du cyclisme) depuis dix ans ont été suspendus pour dopage, parfois avant ou après leur passage dans l’élite du cyclisme. Soit 42 % d’entre eux, une proportion énorme au regard de la faible efficacité de la lutte antidopage.', 'sport.avif', 'sport', 0),
(21, '2026-06-09', 'Dopage : la Slovénie dans l\'œil du cyclone « Aderlass »', 'Dopage : la Slovénie dans l\'œil du cyclone « Aderlass »', 'Vous pouvez partager un article en cliquant sur les icônes de partage en haut à droite de celui-ci.\r\nLa reproduction totale ou partielle d’un article, sans l’autorisation écrite et préalable du Monde, est strictement interdite.\r\nPour plus d’informations, consultez nos conditions générales de vente.\r\nPour toute demande d’autorisation, contactez syndication@lemonde.fr.\r\nEn tant qu’abonné, vous pouvez offrir jusqu’à cinq articles par mois à l’un de vos proches grâce à la fonctionnalité « Offrir un article ».\r\n\r\nhttps://www.lemonde.fr/sport/article/2019/05/16/dopage-la-slovenie-dans-l-il-du-cyclone-aderlass_5462878_3242.html\r\nY a-t-il quelque chose de « pourri » dans le cyclisme de Slovénie ? Tous les regards sont en tout cas tournés vers la petite république adriatique depuis la révélation de l’implication d’un cycliste et d’un ancien cycliste slovènes dans l’opération « Aderlass », cette enquête de la police allemande sur un réseau de dopage sanguin organisé.\r\n\r\nMardi 15 mai, l’Union cycliste internationale (UCI) a suspendu à titre provisoire le coureur Kristjan Koren et l’ancien coureur, désormais directeur sportif, Borut Bozic, de l’équipe Bahreïn-Merida. Ils sont accusés par le médecin au centre de l’enquête, l’Allemand Mark Schmidt, d’avoir bénéficié d’auto-transfusions en 2012 et 2013.\r\n\r\nLe Croate Kristijan Durasek est également visé, sur une période plus récente. Né à Varazdin, à 30 kilomètres de la frontière slovène, il est proche de nombreux cyclistes slovènes, lui qui est passé par deux équipes amateures du pays : Perutnina Ptuj (2006-2008) et Adria Mobil (2012).\r\n\r\nLire aussi Article réservé à nos abonnés Le cyclisme touché par une nouvelle affaire de dopage sanguin\r\n\r\nCes dernières années, le cyclisme slovène a enregistré un grand nombre de cas positifs. Selon notre recensement, 8 des 19 coureurs slovènes ayant évolué dans le World Tour (la première division du cyclisme) depuis dix ans ont été suspendus pour dopage, parfois avant ou après leur passage dans l’élite du cyclisme. Soit 42 % d’entre eux, une proportion énorme au regard de la faible efficacité de la lutte antidopage.', 'sport.avif', 'sport', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
