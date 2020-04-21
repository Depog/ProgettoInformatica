-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 21, 2020 alle 13:36
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
  `codiceFile` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `idPrenotazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT per la tabella `stampa`
--
ALTER TABLE `stampa`
  MODIFY `idStampa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
