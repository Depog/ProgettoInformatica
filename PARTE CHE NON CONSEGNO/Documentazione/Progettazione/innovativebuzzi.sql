-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 13, 2020 alle 20:25
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
-- Struttura della tabella `contiene`
--

CREATE TABLE `contiene` (
  `idFile` int(11) NOT NULL,
  `idPrenotazione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `file`
--

CREATE TABLE `file` (
  `idFile` int(11) NOT NULL,
  `nomeFile` varchar(128) DEFAULT NULL,
  `dimensione` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `formato`
--

CREATE TABLE `formato` (
  `Tipo` varchar(16) NOT NULL,
  `costoStampa` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `codiceFiscaleCliente` char(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `idProdotto` int(11) NOT NULL,
  `nomeProdotto` varchar(64) DEFAULT NULL,
  `costoProdotto` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `stampa`
--

CREATE TABLE `stampa` (
  `idStampa` int(11) NOT NULL,
  `dataStampa` date DEFAULT NULL,
  `oraStampa` time DEFAULT NULL,
  `codiceFiscaleUtente` char(16) DEFAULT NULL,
  `dataRitiro` date DEFAULT NULL,
  `oraRitiro` time DEFAULT NULL,
  `tipoFormato` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `studente`
--

CREATE TABLE `studente` (
  `codiceFiscale` char(16) NOT NULL,
  `classe` char(3) DEFAULT NULL,
  `sezione` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `codiceFiscale` char(16) NOT NULL,
  `nome` varchar(32) DEFAULT NULL,
  `cognome` varchar(32) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `tipo` varchar(64) DEFAULT NULL,
  `dataNascita` date DEFAULT NULL,
  `civico` int(11) DEFAULT NULL,
  `cap` int(11) DEFAULT NULL,
  `idProdotto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY (`idFile`,`idPrenotazione`),
  ADD KEY `idPrenotazione` (`idPrenotazione`);

--
-- Indici per le tabelle `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`idFile`);

--
-- Indici per le tabelle `formato`
--
ALTER TABLE `formato`
  ADD PRIMARY KEY (`Tipo`);

--
-- Indici per le tabelle `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD PRIMARY KEY (`idPrenotazione`),
  ADD KEY `codiceFiscaleCliente` (`codiceFiscaleCliente`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`idProdotto`);

--
-- Indici per le tabelle `stampa`
--
ALTER TABLE `stampa`
  ADD PRIMARY KEY (`idStampa`),
  ADD KEY `codiceFiscaleUtente` (`codiceFiscaleUtente`),
  ADD KEY `tipoFormato` (`tipoFormato`);

--
-- Indici per le tabelle `studente`
--
ALTER TABLE `studente`
  ADD PRIMARY KEY (`codiceFiscale`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`codiceFiscale`),
  ADD KEY `idProdotto` (`idProdotto`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `file`
--
ALTER TABLE `file`
  MODIFY `idFile` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  MODIFY `idPrenotazione` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `idProdotto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `stampa`
--
ALTER TABLE `stampa`
  MODIFY `idStampa` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `contiene_ibfk_1` FOREIGN KEY (`idFile`) REFERENCES `file` (`idFile`),
  ADD CONSTRAINT `contiene_ibfk_2` FOREIGN KEY (`idPrenotazione`) REFERENCES `prenotazione` (`idPrenotazione`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD CONSTRAINT `prenotazione_ibfk_1` FOREIGN KEY (`codiceFiscaleCliente`) REFERENCES `utente` (`codiceFiscale`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `stampa`
--
ALTER TABLE `stampa`
  ADD CONSTRAINT `stampa_ibfk_1` FOREIGN KEY (`codiceFiscaleUtente`) REFERENCES `utente` (`codiceFiscale`),
  ADD CONSTRAINT `stampa_ibfk_2` FOREIGN KEY (`tipoFormato`) REFERENCES `formato` (`Tipo`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `studente`
--
ALTER TABLE `studente`
  ADD CONSTRAINT `studente_ibfk_1` FOREIGN KEY (`codiceFiscale`) REFERENCES `utente` (`codiceFiscale`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `utente`
--
ALTER TABLE `utente`
  ADD CONSTRAINT `utente_ibfk_1` FOREIGN KEY (`idProdotto`) REFERENCES `prodotto` (`idProdotto`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
