-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Lug 02, 2020 alle 13:04
-- Versione del server: 5.6.33-log
-- PHP Version: 5.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_pw0252051`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `vivaio_contatti`
--

CREATE TABLE IF NOT EXISTS `vivaio_contatti` (
  `id_contatti` int(11) NOT NULL AUTO_INCREMENT,
  `citta` varchar(255) NOT NULL,
  `indirizzo` text NOT NULL,
  `linkMappe` text NOT NULL,
  `cap` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id_contatti`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dump dei dati per la tabella `vivaio_contatti`
--

INSERT INTO `vivaio_contatti` (`id_contatti`, `citta`, `indirizzo`, `linkMappe`, `cap`, `telefono`, `email`) VALUES
(1, 'Roma', 'Via della Bufalotta, n 3', 'https://goo.gl/maps/YUrrVPcZYukxZsvA6', '00100', '0648525532', 'evivaioroma@gmail.com'),
(2, 'Torino', 'Via Genova, n 234', 'https://goo.gl/maps/uhdPQPcXPhNNRj1MA', '20019', '3342678652', 'evivaiotorino@gmail.com'),
(3, 'Firenze', 'Via Verdi, n 34', 'https://goo.gl/maps/iHZ581UYydVryn7y9', '50100', '3319283642', 'evivaiofirenze@gmail.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `vivaio_contiene`
--

CREATE TABLE IF NOT EXISTS `vivaio_contiene` (
  `Ordine` int(11) NOT NULL,
  `Pianta` int(11) NOT NULL,
  `Quantita` int(11) NOT NULL,
  PRIMARY KEY (`Ordine`,`Pianta`),
  KEY `Ordine` (`Ordine`),
  KEY `Ordine_2` (`Ordine`),
  KEY `Pianta` (`Pianta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `vivaio_contiene`
--

INSERT INTO `vivaio_contiene` (`Ordine`, `Pianta`, `Quantita`) VALUES
(161, 4, 1),
(160, 1, 1),
(161, 2, 2),
(160, 5, 3),
(153, 11, 1),
(153, 14, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `vivaio_indirizzo`
--

CREATE TABLE IF NOT EXISTS `vivaio_indirizzo` (
  `_id_indirizzo` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Cellulare` varchar(255) NOT NULL,
  `Via` text NOT NULL,
  `Citta` varchar(255) NOT NULL,
  `Provincia` varchar(255) NOT NULL,
  `Zip` int(11) NOT NULL,
  PRIMARY KEY (`_id_indirizzo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=132 ;

--
-- Dump dei dati per la tabella `vivaio_indirizzo`
--

INSERT INTO `vivaio_indirizzo` (`_id_indirizzo`, `Nome`, `Email`, `Cellulare`, `Via`, `Citta`, `Provincia`, `Zip`) VALUES
(131, 'Andrea Bernini', 'andreabe99@gmail.com', '33333333', 'Strada pian della quercia', 'Viterbo', 'Viterbo', 1100),
(128, 'Andrea Bernini', 'andreabe99@gmail.com', '33333333', 'Strada pian della quercia', 'Vterbo', 'Viterbo', 1100),
(130, 'Andrea Bernini', 'andreabe99@gmail.com', '33333333', 'Strada pian della quercia', 'Viterbo', 'Viterbo', 1100),
(129, 'Andrea Bernini', 'andreabe99@gmail.com', '33333333', 'Strada pian della quercia', 'Viterbo', 'Viterbo', 1100),
(127, 'Andrea Bernini', 'andreabe99@gmail.com', '33333333', 'Strada pian della quercia', 'Viterbo', 'Viterbo', 1100),
(126, 'Andrea Bernini', 'andreabe99@gmail.com', '33333333', 'Strada pian della quercia', 'Viterbo', 'Viterbo', 1100),
(125, 'Andrea Bernini', 'andreabe99@gmail.com', '33333333', 'Strada pian della quercia', 'Viterbo', 'Viterbo', 1100),
(124, 'Andrea Bernini', 'andreabe99@gmail.com', '33333333', 'Strada pian della quercia', 'Viterbo', 'Viterbo', 1100);

-- --------------------------------------------------------

--
-- Struttura della tabella `vivaio_ordine`
--

CREATE TABLE IF NOT EXISTS `vivaio_ordine` (
  `_id_ordine` int(11) NOT NULL AUTO_INCREMENT,
  `Utente` int(11) NOT NULL,
  `Indirizzo` int(11) NOT NULL,
  `Pagamento` int(11) NOT NULL,
  `Data` varchar(255) NOT NULL,
  `Stato` varchar(255) NOT NULL,
  `Totale` float NOT NULL,
  PRIMARY KEY (`_id_ordine`),
  KEY `Utente` (`Utente`),
  KEY `Indirizzo` (`Indirizzo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=162 ;

--
-- Dump dei dati per la tabella `vivaio_ordine`
--

INSERT INTO `vivaio_ordine` (`_id_ordine`, `Utente`, `Indirizzo`, `Pagamento`, `Data`, `Stato`, `Totale`) VALUES
(160, 8, 0, 99, '2020-07-02 12:04:25', 'In Elaborazione', 77),
(161, 1, 131, 100, '2020-07-02 12:05:07', 'In Elaborazione', 256),
(153, 1, 124, 92, '2020-07-01 17:21:34', 'In Elaborazione', 69.98);

-- --------------------------------------------------------

--
-- Struttura della tabella `vivaio_pagamento`
--

CREATE TABLE IF NOT EXISTS `vivaio_pagamento` (
  `_id_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `NomeCarta` varchar(255) NOT NULL,
  `NumeroCarta` varchar(255) NOT NULL,
  `Mese` int(11) NOT NULL,
  `Anno` int(11) NOT NULL,
  `Cvv` int(11) NOT NULL,
  PRIMARY KEY (`_id_pagamento`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dump dei dati per la tabella `vivaio_pagamento`
--

INSERT INTO `vivaio_pagamento` (`_id_pagamento`, `NomeCarta`, `NumeroCarta`, `Mese`, `Anno`, `Cvv`) VALUES
(100, 'Andrea', '1111', 10, 2037, 222),
(99, 'xxxx', '111111', 1, 2020, 222),
(98, 'Andrea', '1111', 12, 2038, 222),
(97, 'Andrea ', '1111', 5, 2024, 333),
(96, 'Andrea', '1111', 3, 2038, 222),
(95, 'Andrea Bernini', '1111', 10, 2039, 333),
(94, 'Andrea', '1111', 10, 2034, 222),
(93, 'Andrea Bernini', '1111', 10, 2022, 222),
(92, 'Andrea Bernini', '1111', 10, 10, 222);

-- --------------------------------------------------------

--
-- Struttura della tabella `vivaio_pianta`
--

CREATE TABLE IF NOT EXISTS `vivaio_pianta` (
  `_id_pianta` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) NOT NULL,
  `Prezzo` float NOT NULL,
  `Descrizione` text NOT NULL,
  `InStock` tinyint(1) NOT NULL,
  `AltezzaMax` float NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Sconto` int(11) NOT NULL DEFAULT '0',
  `Categoria` varchar(255) NOT NULL,
  PRIMARY KEY (`_id_pianta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dump dei dati per la tabella `vivaio_pianta`
--

INSERT INTO `vivaio_pianta` (`_id_pianta`, `Nome`, `Prezzo`, `Descrizione`, `InStock`, `AltezzaMax`, `Image`, `Sconto`, `Categoria`) VALUES
(1, 'Pomodoro San Marzano', 5, 'Pianta in vaso di plastica', 1, 0.2, './img/articoli/san_marzano.jpg', 0, 'Piante Giardino'),
(2, 'Albicocco', 110, 'Pianta interrata in un vaso', 1, 10, '	\r\n./img/articoli/albicocco.jpg', 20, 'Alberi'),
(4, 'Mandorlo', 80, 'Pianta interrata in un vaso', 1, 10, './img/articoli/mandorlo.jpg', 0, 'Alberi'),
(5, 'Rose', 30, 'Pianta in vaso', 1, 1, './img/articoli/rose.jpg', 20, 'Piante Giardino'),
(6, 'Bromelia', 29.99, 'Pianta da interno venduta in vaso di 20cm di diametro.', 1, 0.2, './img/articoli/bromelia.jpg', 0, 'Piante da Interno'),
(8, 'Calathea', 24.99, 'Pianta da Interno', 1, 0.2, './img/articoli/calathea.jpg', 0, 'Piante da Interno'),
(9, 'Edera', 15.99, 'Pianta da Interno', 1, 0.5, './img/articoli/edera.jpg', 0, 'Piante da Interno'),
(10, 'Orchidea', 34.99, 'Piante da Interno', 1, 0.3, './img/articoli/orchidea.jpg', 35, 'Piante da Interno'),
(11, 'Zantedeschia', 39.99, 'Pianta da Interno', 1, 0.2, './img/articoli/zantedeschia.jpg', 0, 'Piante da Interno'),
(12, 'Azalea', 39.99, 'Pianta da Esterno', 1, 0.4, './img/articoli/azalea.jpg', 0, 'Piante Giardino'),
(13, 'Basilico', 12.99, 'Spezia', 1, 0.15, './img/articoli/basilico.jpg', 0, 'Piante Giardino'),
(14, 'Bouganville', 29.99, 'Fiori Giardino', 1, 0.25, './img/articoli/bouganville.jpg', 0, 'Piante Giardino'),
(15, 'Arancio', 79.99, 'Agrume', 1, 5, './img/articoli/arancio.jpg', 0, 'Alberi'),
(16, 'Ciliegio', 109.99, 'Frutto', 1, 8, './img/articoli/ciliegio.jpg', 0, 'Alberi'),
(17, 'Limone', 69.99, 'Agrume', 1, 2, './img/articoli/limone.jpg', 0, 'Alberi'),
(18, 'Agave', 6.99, 'Pianta Grassa', 1, 0.1, './img/articoli/agave.jpg', 0, 'Piante Grasse'),
(19, 'Aloe', 5.99, 'Pianta Grassa', 1, 0.2, './img/articoli/aloe.jpg', 0, 'Piante Grasse'),
(20, 'Opuntia', 8.99, 'Pianta Grassa', 1, 0.3, './img/articoli/opuntia.jpg', 0, 'Piante Grasse'),
(21, 'Sedum', 9.99, 'Pianta Grassa', 1, 0.1, './img/articoli/sedum.jpg', 40, 'Piante Grasse'),
(22, 'Thelocactus', 12.99, 'Pianta Grassa', 1, 0.1, './img/articoli/thelocactus.jpg', 0, 'Piante Grasse');

-- --------------------------------------------------------

--
-- Struttura della tabella `vivaio_utente`
--

CREATE TABLE IF NOT EXISTS `vivaio_utente` (
  `_id_utente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`_id_utente`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dump dei dati per la tabella `vivaio_utente`
--

INSERT INTO `vivaio_utente` (`_id_utente`, `nome`, `cognome`, `email`, `username`, `password`) VALUES
(1, 'Andrea', 'Bernini', 'andreabe99@gmail.com', 'andreabe99', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'marco', 'rossi', 'marcoro99@gmail.com', 'marcoro99', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'Luca', 'Verdi', 'lucaverdi@gmail.com', 'lucave90', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 'ssss', 'sssss', 'ssss@ssss.it', 's', '0cc175b9c0f1b6a831c399e269772661');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
