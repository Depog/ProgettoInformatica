-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 21, 2020 alle 20:46
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `innovativebuzzi`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `acquisto`
--

CREATE TABLE `acquisto` (
  `idAcquisto` int(11) NOT NULL,
  `codiceFiscale` char(16) DEFAULT NULL,
  `dataAcquisto` date DEFAULT NULL,
  `orarioAcquisto` time DEFAULT NULL,
  `Quantità` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `file`
--

CREATE TABLE `file` (
  `codiceFile` varchar(64) NOT NULL,
  `nomeFile` varchar(128) DEFAULT NULL,
  `dimensione` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `file`
--

INSERT INTO `file` (`codiceFile`, `nomeFile`, `dimensione`) VALUES
('aLlDjsHmxRfbNll', 'A20382-aLlDjsHmxRfbNll.docx', 21924),
('anEbISdeH5G6oBE', 'A20382-anEbISdeH5G6oBE.docx', 14985),
('aOC5ytU0EOgvZZM', 'A20382-aOC5ytU0EOgvZZM.docx', 21924),
('bSdlsi6jwqvIO5z', 'O-bSdlsi6jwqvIO5z.docx', 21924),
('dym8lTm7ZmwYWs3', 'A20382-dym8lTm7ZmwYWs3.html', 21924),
('G0yfJKqCdlmjXR5', 'O-G0yfJKqCdlmjXR5.docx', 14985),
('n1vEnosjHQx9s4F', 'Verbale n1.docx', 21924),
('rT7IFqLV9UJiX7l', 'A20382-rT7IFqLV9UJiX7l.html', 14985),
('XT7Ze4YHN0oAWn9', 'A20382-XT7Ze4YHN0oAWn9.html', 6622);

-- --------------------------------------------------------

--
-- Struttura della tabella `formato`
--

CREATE TABLE `formato` (
  `Tipo` varchar(16) NOT NULL,
  `costoStampa` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `formato`
--

INSERT INTO `formato` (`Tipo`, `costoStampa`) VALUES
('A3', '0.05'),
('A4', '0.10');

-- --------------------------------------------------------

--
-- Struttura della tabella `include`
--

CREATE TABLE `include` (
  `idAcquisto` int(11) NOT NULL,
  `idStampa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `persona`
--

CREATE TABLE `persona` (
  `codiceFiscale` char(16) NOT NULL,
  `nome` varchar(32) DEFAULT NULL,
  `cognome` varchar(32) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `tipo` varchar(64) DEFAULT NULL,
  `dataNascita` date DEFAULT NULL,
  `civico` int(11) DEFAULT NULL,
  `cap` int(11) DEFAULT NULL,
  `via` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `persona`
--

INSERT INTO `persona` (`codiceFiscale`, `nome`, `cognome`, `password`, `username`, `email`, `tipo`, `dataNascita`, `civico`, `cap`, `via`) VALUES
('abeurjwkdlerotls', 'Federico', 'Giacumbo', '9d04b6572e137eb28b2c444c1c7d3faf', 'A20382', 'Federicogiacumbo10@hotmail.it', 'Studente', '2001-10-02', 150, 59100, 'Viale della repubblica'),
('dfdff', 'O', 'O', 'f186217753c37b9b9f958d906208506e', 'A20382', 'O', 'Studente', NULL, NULL, NULL, NULL),
('FHRKHN84D14L105C', 'Claudio', 'Ferencz ', '202cb962ac59075b964b07152d234b70', 'A20388', 'claudioferencz@gmail.com ', 'Studente', '2001-04-21', 80, 59100, 'via roma'),
('HVBBDP29C07I352S', 'Davide', 'Hu', '0cc175b9c0f1b6a831c399e269772661', 'A2819', 'davidehu@gmail.com', 'Studente', '2001-08-08', 58, 59100, 'via Firenze');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `idPrenotazione` int(11) NOT NULL,
  `dataPrenotazione` date DEFAULT NULL,
  `oraPrenotazione` time DEFAULT NULL,
  `quantità` int(11) DEFAULT NULL,
  `stampata` enum('si','no') DEFAULT 'no',
  `note` varchar(64) DEFAULT NULL,
  `codiceFiscale` char(16) DEFAULT NULL,
  `idStampa` int(11) DEFAULT NULL,
  `codiceFile` varchar(64) DEFAULT NULL,
  `dataRitiroEffettuato` date DEFAULT NULL,
  `orarioRitiroEffettuato` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prenotazione`
--

INSERT INTO `prenotazione` (`idPrenotazione`, `dataPrenotazione`, `oraPrenotazione`, `quantità`, `stampata`, `note`, `codiceFiscale`, `idStampa`, `codiceFile`, `dataRitiroEffettuato`, `orarioRitiroEffettuato`) VALUES
(89, '2020-04-21', '02:30:57', 1, 'no', '', 'dfdff', 80, 'G0yfJKqCdlmjXR5', NULL, NULL),
(90, '2020-04-21', '02:31:42', 1, 'no', NULL, 'dfdff', 81, 'bSdlsi6jwqvIO5z', NULL, NULL),
(92, '2020-04-21', '07:17:53', 1, 'no', '', 'dfdff', 82, 'aLlDjsHmxRfbNll', NULL, NULL),
(93, '2020-04-21', '07:50:24', 1, 'no', '', 'dfdff', 83, 'aOC5ytU0EOgvZZM', NULL, NULL),
(94, '2020-04-21', '07:50:28', 1, 'no', '', 'dfdff', 84, 'dym8lTm7ZmwYWs3', NULL, NULL),
(95, '2020-04-21', '07:54:00', 0, 'no', '', 'dfdff', NULL, 'dym8lTm7ZmwYWs3', NULL, NULL),
(96, '2020-04-21', '07:55:02', 1, 'no', 'NOTA DI DAVIDE', 'dfdff', 86, 'dym8lTm7ZmwYWs3', NULL, NULL),
(97, '2020-04-21', '07:55:19', 1, 'no', 'davide tsst', 'dfdff', 87, 'dym8lTm7ZmwYWs3', NULL, NULL),
(98, '2020-04-21', '07:55:36', 1, 'no', 'davide tsst', 'dfdff', 88, 'anEbISdeH5G6oBE', NULL, NULL),
(99, '2020-04-21', '07:55:40', 1, 'no', 'davide tsst', 'dfdff', 89, 'rT7IFqLV9UJiX7l', NULL, NULL),
(100, '2020-04-21', '07:55:51', 1, 'no', 'davide tsst', 'dfdff', 90, 'rT7IFqLV9UJiX7l', NULL, NULL),
(101, '2020-04-21', '08:13:04', 1, 'no', 'davide tsst', 'dfdff', 91, 'rT7IFqLV9UJiX7l', NULL, NULL),
(102, '2020-04-21', '08:17:03', 1, 'no', 'Davide', 'dfdff', 92, 'rT7IFqLV9UJiX7l', NULL, NULL),
(103, '2020-04-21', '08:21:47', 1, 'no', 'asdasd', 'dfdff', 93, 'rT7IFqLV9UJiX7l', NULL, NULL),
(104, '2020-04-21', '08:21:58', 1, 'no', 'sadasd', 'dfdff', 94, 'rT7IFqLV9UJiX7l', NULL, NULL),
(105, '2020-04-21', '08:22:56', 1, 'no', 'asdsa', 'dfdff', 95, 'rT7IFqLV9UJiX7l', NULL, NULL),
(106, '2020-04-21', '08:24:19', 1, 'no', '', 'dfdff', 96, 'rT7IFqLV9UJiX7l', NULL, NULL),
(107, '2020-04-21', '08:24:24', 1, 'no', 'sadasd', 'dfdff', 97, 'rT7IFqLV9UJiX7l', NULL, NULL),
(108, '2020-04-21', '08:24:25', 1, 'no', '', 'dfdff', 98, 'rT7IFqLV9UJiX7l', NULL, NULL),
(109, '2020-04-21', '08:32:07', 1, 'no', 'gf', 'dfdff', 99, 'rT7IFqLV9UJiX7l', NULL, NULL),
(110, '2020-04-21', '08:32:22', 1, 'no', 'sdasd', 'dfdff', 100, 'rT7IFqLV9UJiX7l', NULL, NULL),
(111, '2020-04-21', '08:34:05', 1, 'no', '', 'dfdff', 101, 'rT7IFqLV9UJiX7l', NULL, NULL),
(112, '2020-04-21', '08:34:06', 1, 'no', '', 'dfdff', 102, 'rT7IFqLV9UJiX7l', NULL, NULL),
(113, '2020-04-21', '08:35:55', 1, 'no', 'dfgdg', 'dfdff', 103, 'rT7IFqLV9UJiX7l', NULL, NULL),
(114, '2020-04-21', '08:37:37', 1, 'no', 'fhgh', 'dfdff', 104, 'rT7IFqLV9UJiX7l', NULL, NULL),
(115, '2020-04-21', '08:37:38', 1, 'no', '', 'dfdff', 105, 'rT7IFqLV9UJiX7l', NULL, NULL),
(116, '2020-04-21', '08:39:08', 1, 'no', 'jhk', 'dfdff', 106, 'rT7IFqLV9UJiX7l', NULL, NULL),
(117, '2020-04-21', '08:40:11', 1, 'no', 'nmmnmmm', 'dfdff', 107, 'rT7IFqLV9UJiX7l', NULL, NULL),
(118, '2020-04-21', '08:40:43', 1, 'no', 'cxvcxvcxv', 'dfdff', 108, 'rT7IFqLV9UJiX7l', NULL, NULL),
(119, '2020-04-21', '08:40:47', 1, 'no', 'xcvxcvxcv', 'dfdff', 109, 'rT7IFqLV9UJiX7l', NULL, NULL),
(120, '2020-04-21', '08:42:28', 1, 'no', 'cxvxc', 'dfdff', 110, 'rT7IFqLV9UJiX7l', NULL, NULL),
(121, '2020-04-21', '08:42:35', 1, 'no', 'xcvcxvc', 'dfdff', 111, 'rT7IFqLV9UJiX7l', NULL, NULL),
(122, '2020-04-21', '08:43:23', 1, 'no', '', 'dfdff', 112, 'rT7IFqLV9UJiX7l', NULL, NULL),
(123, '2020-04-21', '08:43:54', 1, 'no', 'NOTA PROVA', 'dfdff', 113, 'rT7IFqLV9UJiX7l', NULL, NULL),
(124, '2020-04-21', '08:44:52', 1, 'no', 'NOTA TEST', 'dfdff', 114, 'XT7Ze4YHN0oAWn9', NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `stampa`
--

CREATE TABLE `stampa` (
  `idStampa` int(11) NOT NULL,
  `dataStampa` date DEFAULT NULL,
  `oraStampa` time DEFAULT NULL,
  `codiceFiscaleOperatore` char(16) DEFAULT NULL,
  `dataRitiro` date DEFAULT NULL,
  `oraRitiro` time DEFAULT NULL,
  `tipoFormato` varchar(16) DEFAULT NULL,
  `descrizione` varchar(64) DEFAULT NULL,
  `fronteRetro` enum('si','no') DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `stampa`
--

INSERT INTO `stampa` (`idStampa`, `dataStampa`, `oraStampa`, `codiceFiscaleOperatore`, `dataRitiro`, `oraRitiro`, `tipoFormato`, `descrizione`, `fronteRetro`) VALUES
(68, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'Prova', 'no'),
(69, NULL, NULL, NULL, '2020-04-22', '00:00:00', 'A3', '', 'no'),
(70, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'sad', 'no'),
(72, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'gg', 'no'),
(73, NULL, NULL, NULL, '2020-04-22', '00:00:00', 'A3', '', 'no'),
(74, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'gggh', 'no'),
(75, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'gggh', 'no'),
(76, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'gggh', 'no'),
(77, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'gggh', 'no'),
(78, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'gggh', 'no'),
(79, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'gggh', 'no'),
(80, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'gggh', 'no'),
(81, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'Davide è cinese', 'no'),
(82, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'asda', 'no'),
(83, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'asda', 'no'),
(84, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'asda', 'no'),
(86, NULL, NULL, NULL, '2020-04-22', '00:00:00', 'A3', 'prova', 'no'),
(87, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'sdf', 'no'),
(88, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'sdf', 'no'),
(89, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'sdf', 'no'),
(90, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'sdf', 'no'),
(91, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'sdf', 'no'),
(92, NULL, NULL, NULL, '2020-04-22', '00:00:00', 'A3', 'dsfds', 'no'),
(93, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'asd', 'no'),
(94, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'sadas', 'no'),
(95, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'sad', 'no'),
(96, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', '', 'no'),
(97, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'xzd', 'no'),
(98, NULL, NULL, NULL, '2020-04-22', '00:00:00', 'A3', '', 'no'),
(99, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'jh', 'no'),
(100, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'asdasd', 'no'),
(101, NULL, NULL, NULL, '2020-04-22', '10:00:00', 'A3', 'ilhj', 'no'),
(102, NULL, NULL, NULL, '2020-04-22', '00:00:00', 'A3', '', 'no'),
(103, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'dg', 'no'),
(104, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'fhfgh', 'no'),
(105, NULL, NULL, NULL, '2020-04-22', '00:00:00', 'A3', '', 'no'),
(106, NULL, NULL, NULL, '2020-04-22', '00:00:00', 'A3', 'nmh', 'no'),
(107, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'mjhmmnmbnmn', 'no'),
(108, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'vxcvxcv', 'no'),
(109, NULL, NULL, NULL, '2020-04-22', '10:00:00', 'A3', 'xcvcxv', 'no'),
(110, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'cxvcxv', 'no'),
(111, NULL, NULL, NULL, '2020-04-22', '10:00:00', 'A3', 'xvxcv', 'no'),
(112, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'dfgdg', 'no'),
(113, NULL, NULL, NULL, '2020-04-22', '00:00:01', 'A4', 'DESCRIZIONE PROVA', 'no'),
(114, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'DESCRIZIONE TEST', 'no');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `acquisto`
--
ALTER TABLE `acquisto`
  ADD PRIMARY KEY (`idAcquisto`),
  ADD KEY `codiceFiscale` (`codiceFiscale`);

--
-- Indici per le tabelle `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`codiceFile`);

--
-- Indici per le tabelle `formato`
--
ALTER TABLE `formato`
  ADD PRIMARY KEY (`Tipo`);

--
-- Indici per le tabelle `include`
--
ALTER TABLE `include`
  ADD PRIMARY KEY (`idAcquisto`,`idStampa`),
  ADD KEY `idStampa` (`idStampa`);

--
-- Indici per le tabelle `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`codiceFiscale`);

--
-- Indici per le tabelle `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD PRIMARY KEY (`idPrenotazione`),
  ADD KEY `idStampa` (`idStampa`),
  ADD KEY `codiceFile` (`codiceFile`),
  ADD KEY `codiceFiscale` (`codiceFiscale`);

--
-- Indici per le tabelle `stampa`
--
ALTER TABLE `stampa`
  ADD PRIMARY KEY (`idStampa`),
  ADD KEY `codiceFiscaleOperatore` (`codiceFiscaleOperatore`),
  ADD KEY `tipoFormato` (`tipoFormato`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `acquisto`
--
ALTER TABLE `acquisto`
  MODIFY `idAcquisto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  MODIFY `idPrenotazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT per la tabella `stampa`
--
ALTER TABLE `stampa`
  MODIFY `idStampa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `acquisto`
--
ALTER TABLE `acquisto`
  ADD CONSTRAINT `acquisto_ibfk_1` FOREIGN KEY (`codiceFiscale`) REFERENCES `persona` (`codiceFiscale`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `include`
--
ALTER TABLE `include`
  ADD CONSTRAINT `include_ibfk_1` FOREIGN KEY (`idAcquisto`) REFERENCES `acquisto` (`idAcquisto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `include_ibfk_2` FOREIGN KEY (`idStampa`) REFERENCES `stampa` (`idStampa`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD CONSTRAINT `prenotazione_ibfk_1` FOREIGN KEY (`idStampa`) REFERENCES `stampa` (`idStampa`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prenotazione_ibfk_2` FOREIGN KEY (`codiceFile`) REFERENCES `file` (`codiceFile`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prenotazione_ibfk_3` FOREIGN KEY (`codiceFiscale`) REFERENCES `persona` (`codiceFiscale`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `stampa`
--
ALTER TABLE `stampa`
  ADD CONSTRAINT `stampa_ibfk_1` FOREIGN KEY (`codiceFiscaleOperatore`) REFERENCES `persona` (`codiceFiscale`) ON UPDATE CASCADE,
  ADD CONSTRAINT `stampa_ibfk_2` FOREIGN KEY (`tipoFormato`) REFERENCES `formato` (`Tipo`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
