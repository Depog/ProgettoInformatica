-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 30, 2020 alle 14:11
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

--
-- Dump dei dati per la tabella `acquisto`
--

INSERT INTO `acquisto` (`idAcquisto`, `codiceFiscale`, `dataAcquisto`, `orarioAcquisto`) VALUES
(1, 'BGBHCJ37T46E461P', '2020-04-29', '20:55:23'),
(2, 'TFTGFR31H56G467W', '2020-04-30', '13:47:20');

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
('1wvnEw4TtpXbgdh', 'Prof-1wvnEw4TtpXbgdh.docx', 1395306),
('6vx2xdJCPaO19HP', 'Stud-6vx2xdJCPaO19HP.png', 30727),
('coxI08Dpylw8URe', 'Stud-coxI08Dpylw8URe.docx', 2705153),
('eq7unAUNfcfaY2W', 'Stud-eq7unAUNfcfaY2W.docx', 2705153),
('ffZc5v3SdHJqHYU', 'Stud-ffZc5v3SdHJqHYU.docx', 2705153),
('FJJwbetXSlg6bSA', 'Stud-FJJwbetXSlg6bSA.docx', 2705153),
('foGgQOMDsOwl6xq', 'Stud-foGgQOMDsOwl6xq.PNG', 758599),
('inA7Xo19F0pGgX7', 'Stud-inA7Xo19F0pGgX7.docx', 2705153),
('KngnsSyVn2YfNPk', 'Prof-KngnsSyVn2YfNPk.docx', 2705153),
('r3tZfF2OOt89Jqn', 'Prof-r3tZfF2OOt89Jqn.PNG', 615674),
('u48hz7TTCYCRPqY', 'Stud-u48hz7TTCYCRPqY.docx', 2705153),
('UAzQOiaD4F8o1L2', 'Stud-UAzQOiaD4F8o1L2.docx', 2705153),
('z910o0tCH3Nd1AD', 'Stud-z910o0tCH3Nd1AD.docx', 2705153),
('ZsvV0P29nliSrfU', 'Stud-ZsvV0P29nliSrfU.docx', 2705153);

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
('A3', '0.10'),
('A4', '0.05');

-- --------------------------------------------------------

--
-- Struttura della tabella `include`
--

CREATE TABLE `include` (
  `idAcquisto` int(11) NOT NULL,
  `idStampa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `include`
--

INSERT INTO `include` (`idAcquisto`, `idStampa`) VALUES
(1, 5),
(2, 15);

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
  `classe` int(11) DEFAULT NULL,
  `sezione` char(3) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `tipo` varchar(64) DEFAULT NULL,
  `dataNascita` date DEFAULT NULL,
  `via` varchar(32) DEFAULT NULL,
  `civico` int(11) DEFAULT NULL,
  `cap` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `persona`
--

INSERT INTO `persona` (`codiceFiscale`, `nome`, `cognome`, `password`, `username`, `classe`, `sezione`, `email`, `tipo`, `dataNascita`, `via`, `civico`, `cap`) VALUES
('BGBHCJ37T46E461P', 'Davide ', 'Hu', '5f4dcc3b5aa765d61d8327deb882cf99', 'Prof', NULL, NULL, 'prof1@gmail.com', 'Professore', '1990-12-20', 'via Firenze', 452, 59100),
('JLTDFL83M07A347C', 'Claudio', 'Ferencz', '5f4dcc3b5aa765d61d8327deb882cf99', 'Ope', NULL, NULL, 'operatore1@gmail.com', 'Operatore', '1970-10-08', 'Viale della repubblica', 89, 59100),
('TFTGFR31H56G467W', 'Federico', 'Giacumo', '5f4dcc3b5aa765d61d8327deb882cf99', 'Stud', 5, 'Q', 'provaStudente123@gmail.com', 'Studente', '2001-02-10', 'via roma', 358, 59100);

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
  `codiceFile` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prenotazione`
--

INSERT INTO `prenotazione` (`idPrenotazione`, `dataPrenotazione`, `oraPrenotazione`, `stampata`, `note`, `codiceFiscale`, `idStampa`, `codiceFile`) VALUES
(1, '2020-04-29', '20:35:51', 'si', '', 'TFTGFR31H56G467W', 1, 'foGgQOMDsOwl6xq'),
(2, '2020-04-29', '20:39:38', 'si', '', 'TFTGFR31H56G467W', 2, '6vx2xdJCPaO19HP'),
(3, '2020-04-29', '20:48:30', 'no', '', 'BGBHCJ37T46E461P', 3, '1wvnEw4TtpXbgdh'),
(4, '2020-04-29', '20:53:08', 'no', 'questa è una nota', 'BGBHCJ37T46E461P', 4, 'r3tZfF2OOt89Jqn'),
(14, '2020-04-30', '13:48:45', 'si', '', 'BGBHCJ37T46E461P', 16, 'KngnsSyVn2YfNPk');

-- --------------------------------------------------------

--
-- Struttura della tabella `stampa`
--

CREATE TABLE `stampa` (
  `idStampa` int(11) NOT NULL,
  `dataStampa` date DEFAULT NULL,
  `oraStampa` time DEFAULT NULL,
  `codiceFiscaleOperatore` char(16) DEFAULT NULL,
  `quantità` int(11) DEFAULT NULL,
  `dataRitiro` date DEFAULT NULL,
  `oraRitiro` time DEFAULT NULL,
  `tipoFormato` varchar(16) DEFAULT NULL,
  `descrizione` varchar(64) DEFAULT NULL,
  `dataRitiroEffettuato` date DEFAULT NULL,
  `orarioRitiroEffettuato` time DEFAULT NULL,
  `fronteRetro` enum('si','no') DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `stampa`
--

INSERT INTO `stampa` (`idStampa`, `dataStampa`, `oraStampa`, `codiceFiscaleOperatore`, `quantità`, `dataRitiro`, `oraRitiro`, `tipoFormato`, `descrizione`, `dataRitiroEffettuato`, `orarioRitiroEffettuato`, `fronteRetro`) VALUES
(1, '2020-04-29', '21:07:11', 'JLTDFL83M07A347C', 5, '2020-05-01', '08:00:00', 'A4', 'Materiale per il progetto', NULL, NULL, 'si'),
(2, '2020-04-29', '21:07:17', 'JLTDFL83M07A347C', 10, '2020-04-30', '08:00:00', 'A3', 'Materiale per progetto di informatica', '2020-04-29', '21:14:11', 'si'),
(3, NULL, NULL, NULL, 100, '2020-05-01', '07:45:00', 'A3', 'Materiale compito', NULL, NULL, 'si'),
(4, NULL, NULL, NULL, 60, '2020-04-30', '07:45:00', 'A4', 'Materiale per il compito', NULL, NULL, 'si'),
(5, '2020-04-29', '20:55:23', 'JLTDFL83M07A347C', 60, '2020-04-29', '20:55:23', 'A4', 'Materiale esercizi 5Q', NULL, NULL, 'si'),
(15, '2020-04-30', '13:47:20', 'JLTDFL83M07A347C', 1, '2020-04-30', '13:47:20', 'A3', 'Stampa materiale progetto', NULL, NULL, 'no'),
(16, '2020-04-30', '13:49:33', 'JLTDFL83M07A347C', 1, '2020-05-01', '13:30:00', 'A3', 'Materiale progetto ', '2020-04-30', '14:03:51', 'si');

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
  ADD PRIMARY KEY (`codiceFiscale`),
  ADD UNIQUE KEY `username` (`username`);

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
  MODIFY `idAcquisto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  MODIFY `idPrenotazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `stampa`
--
ALTER TABLE `stampa`
  MODIFY `idStampa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
