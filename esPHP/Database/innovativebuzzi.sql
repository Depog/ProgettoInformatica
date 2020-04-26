-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 26, 2020 alle 14:25
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
  `orarioAcquisto` time DEFAULT NULL
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
('4ZqiQeMwqiq8v1y', 'S-4ZqiQeMwqiq8v1y.docx', 12034),
('5aKKW0vxtqpjuNM', 'S-5aKKW0vxtqpjuNM.docx', 12034),
('7DpDnDzG0iCAVFL', 'S-7DpDnDzG0iCAVFL.pdf', 42394),
('A071roaErqKA4nG', 'S-A071roaErqKA4nG.txt', 5552),
('AOru3jEiqITHJAC', 'S-AOru3jEiqITHJAC.jpg', 322881),
('n8YQPRLlnCKUyKs', 'S-n8YQPRLlnCKUyKs.jpg', 322881),
('ordyxCbfUTO9wnq', 'S-ordyxCbfUTO9wnq.jpg', 322881),
('qgHwOUrEyvjOM5c', 'S-qgHwOUrEyvjOM5c.jpg', 322881),
('qVyMdY1rNrP9nW1', 'S-qVyMdY1rNrP9nW1.jpg', 5000000),
('RaeafiRR2g9hJA5', 'S-RaeafiRR2g9hJA5.txt', 5344),
('zRKBBLEeW3ZVl1A', 'S-zRKBBLEeW3ZVl1A.docx', 12034);

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
('', NULL, NULL, NULL, NULL, NULL, 'Operatore\r\n', NULL, NULL, NULL, NULL),
('abeurjwkdlerotls', 'Federico', 'Giacumbo', '5dbc98dcc983a70728bd082d1a47546e', 'S', 'Federicogiacumbo10@hotmail.it', 'Studente', '2001-10-02', 150, 59100, 'Viale della repubblica'),
('dfdff', 'Paolo', 'O', 'f186217753c37b9b9f958d906208506e', 'O', 'O', 'Operatore', NULL, NULL, NULL, NULL),
('FHRKHN84D14L105C', 'Claudio', 'Ferencz ', '202cb962ac59075b964b07152d234b70', 'A20388', 'claudioferencz@gmail.com ', 'Studente', '2001-04-21', 80, 59100, 'via roma'),
('HVBBDP29C07I352S', 'Davide', 'Hu', '0cc175b9c0f1b6a831c399e269772661', 'A2819', 'davidehu@gmail.com', 'Studente', '2001-08-08', 58, 59100, 'via Firenze'),
('sadasds', 'A', NULL, '7fc56270e7a70fa81a5935b72eacbe29', 'A', NULL, 'Operatore', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `idPrenotazione` int(11) NOT NULL,
  `dataPrenotazione` date DEFAULT NULL,
  `oraPrenotazione` time DEFAULT NULL,
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

INSERT INTO `prenotazione` (`idPrenotazione`, `dataPrenotazione`, `oraPrenotazione`, `stampata`, `note`, `codiceFiscale`, `idStampa`, `codiceFile`, `dataRitiroEffettuato`, `orarioRitiroEffettuato`) VALUES
(206, '2020-04-26', '14:04:33', 'no', 'sdf', 'abeurjwkdlerotls', 177, 'qVyMdY1rNrP9nW1', NULL, NULL),
(207, '2020-04-26', '14:09:27', 'si', 'asdsad', 'abeurjwkdlerotls', 178, 'AOru3jEiqITHJAC', NULL, NULL);

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
  `fronteRetro` enum('si','no') DEFAULT 'no',
  `quantità` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `stampa`
--

INSERT INTO `stampa` (`idStampa`, `dataStampa`, `oraStampa`, `codiceFiscaleOperatore`, `dataRitiro`, `oraRitiro`, `tipoFormato`, `descrizione`, `fronteRetro`, `quantità`) VALUES
(170, '2020-04-25', '14:51:00', 'dfdff', '2020-04-26', '09:00:00', 'A3', 'test', 'si', 5),
(171, NULL, NULL, 'sadasds', '2020-04-26', '09:00:00', 'A3', 'sdasd', 'si', 1),
(172, '2020-04-26', '13:13:36', 'dfdff', '2020-04-26', '09:00:00', 'A3', 'davide gay', 'si', 1),
(173, '2020-04-26', '14:13:38', 'dfdff', '2020-04-26', '11:00:00', 'A3', 'davide scemo', 'si', 6),
(174, '2020-04-26', '12:17:40', 'dfdff', '2020-04-27', '12:00:00', 'A3', 'ad', 'si', 1),
(175, '2020-04-26', '01:32:10', 'dfdff', '2020-04-27', '07:45:00', 'A3', 'asd', 'si', 10),
(176, '2020-04-26', '13:57:09', 'dfdff', '2020-04-27', '09:00:00', 'A3', 'asdsad', 'si', 1),
(177, NULL, NULL, NULL, '2020-04-27', '10:00:00', 'A3', 'sdf', 'si', 1),
(178, '2020-04-26', '14:09:44', 'dfdff', '2020-04-27', '07:45:00', 'A3', 'sads', 'si', 1);

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
  MODIFY `idAcquisto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  MODIFY `idPrenotazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT per la tabella `stampa`
--
ALTER TABLE `stampa`
  MODIFY `idStampa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

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
