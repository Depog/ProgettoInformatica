-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 24, 2020 alle 20:39
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

--
-- Dump dei dati per la tabella `acquisto`
--

INSERT INTO `acquisto` (`idAcquisto`, `codiceFiscale`, `dataAcquisto`, `orarioAcquisto`, `Quantità`) VALUES
(1, 'abeurjwkdlerotls', NULL, NULL, 0),
(2, '', '2020-04-24', '07:21:10', 10),
(4, 'dfdff', '2020-04-24', '07:23:38', 10);

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
('0SnGBbNvLkHBSAA', 'A20382-0SnGBbNvLkHBSAA.jpg', 56854),
('2jbs0GPsAIZSm8u', 'A20382-2jbs0GPsAIZSm8u.pdf', 91723),
('2YJEBNQhUzsX79L', 'A20382-2YJEBNQhUzsX79L.jpg', 56854),
('9AdRhUHuczBnTfU', 'A20382-9AdRhUHuczBnTfU.pdf', 91723),
('9IJ0WuKE7XNvgSO', 'A20382-9IJ0WuKE7XNvgSO.jpg', 56854),
('9K1JxU5R96iQmLp', 'A20382-9K1JxU5R96iQmLp.pdf', 91723),
('9Kmow4kLWZVpWXR', 'ER RISTRUTTURATO (18).html', 6665),
('9PVPJ2Q0Ta7h5dP', 'A20382-9PVPJ2Q0Ta7h5dP.pdf', 91723),
('aIbezt8Fv3yqIdv', 'A20382-aIbezt8Fv3yqIdv.pdf', 91723),
('aLlDjsHmxRfbNll', 'A20382-aLlDjsHmxRfbNll.docx', 21924),
('anEbISdeH5G6oBE', 'A20382-anEbISdeH5G6oBE.docx', 14985),
('aOC5ytU0EOgvZZM', 'A20382-aOC5ytU0EOgvZZM.docx', 21924),
('aWyihpn9zCgYTVZ', 'A20382-aWyihpn9zCgYTVZ.jpg', 56854),
('bSdlsi6jwqvIO5z', 'O-bSdlsi6jwqvIO5z.docx', 21924),
('bZ7XSrvCQ23AOtd', 'A20382-bZ7XSrvCQ23AOtd.docx', 12034),
('c8ZFvA5hkXj3Og6', 'A20382-c8ZFvA5hkXj3Og6.pdf', 91723),
('cOeFPFDsCT4epEV', 'A20382-cOeFPFDsCT4epEV.pdf', 42394),
('dym8lTm7ZmwYWs3', 'A20382-dym8lTm7ZmwYWs3.html', 21924),
('E41xrmW5kSiT2ea', 'A20382-E41xrmW5kSiT2ea.pdf', 91723),
('eBatJtTOzlqUzb9', 'A20382-eBatJtTOzlqUzb9.pdf', 91723),
('G0yfJKqCdlmjXR5', 'O-G0yfJKqCdlmjXR5.docx', 14985),
('gUPvkQFUd7s4kOA', 'A20382-gUPvkQFUd7s4kOA.', 42394),
('HtpqifTtGMaEBu8', 'A20382-HtpqifTtGMaEBu8.jpg', 56854),
('Kn215ohbRMbyLgR', 'A20382-Kn215ohbRMbyLgR.pdf', 91723),
('kY9pd9A01jTafRP', 'A20382-kY9pd9A01jTafRP.pdf', 91723),
('LsyixH1qpgbb7pW', 'A20382-LsyixH1qpgbb7pW.docx', 12034),
('n1vEnosjHQx9s4F', 'Verbale n1.docx', 21924),
('nKpp4zQwQsy9ROb', 'A20382-nKpp4zQwQsy9ROb.jpg', 56854),
('pqT31FillArSBcj', 'A20382-pqT31FillArSBcj.docx', 12034),
('Q2brXl2zwwVNzKG', 'A20382-Q2brXl2zwwVNzKG.', 12034),
('QelUYHUtDNczR15', 'A20382-QelUYHUtDNczR15.pdf', 91723),
('qQV9JxmR4bmpFaH', 'A20382-qQV9JxmR4bmpFaH.html', 6622),
('rT7IFqLV9UJiX7l', 'A20382-rT7IFqLV9UJiX7l.html', 14985),
('sWLWp17bcaZLcMb', 'A20382-sWLWp17bcaZLcMb.', 56854),
('TfTmgF4Vdt1E7r0', 'A20382-TfTmgF4Vdt1E7r0.pdf', 91723),
('uLegzloLqaatZ2X', 'A20382-uLegzloLqaatZ2X.docx', 12034),
('vL29WZeCwlRMoU8', 'A20382-vL29WZeCwlRMoU8.docx', 12034),
('VLob62DwCW18IfS', 'A20382-VLob62DwCW18IfS.pdf', 91723),
('vPEewAXgzRGlE9y', 'A20382-vPEewAXgzRGlE9y.', 56854),
('XT7Ze4YHN0oAWn9', 'A20382-XT7Ze4YHN0oAWn9.', 6622),
('Y57EnxfyLQrwbqI', 'ER RISTRUTTURATO (18).html', 6665),
('YJnoF3eCjh7UKwD', 'A20382-YJnoF3eCjh7UKwD.', 56854),
('YPe3LZ7RooWu4Mq', 'A20382-YPe3LZ7RooWu4Mq.png', 6612),
('yXyB3JJ25TytDpy', 'A20382-yXyB3JJ25TytDpy.jpg', 56854);

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

--
-- Dump dei dati per la tabella `include`
--

INSERT INTO `include` (`idAcquisto`, `idStampa`) VALUES
(1, 68),
(2, 164),
(4, 166);

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
('abeurjwkdlerotls', 'Federico', 'Giacumbo', '9d04b6572e137eb28b2c444c1c7d3faf', 'A8959', 'Federicogiacumbo10@hotmail.it', 'Studente', '2001-10-02', 150, 59100, 'Viale della repubblica'),
('dfdff', 'Paolo', 'O', 'f186217753c37b9b9f958d906208506e', 'A20382', 'O', 'Studente', NULL, NULL, NULL, NULL),
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
(129, '2020-04-22', '03:31:41', 'si', '', 'dfdff', 117, 'YPe3LZ7RooWu4Mq', '2020-04-22', '16:37:28'),
(130, '2020-04-22', '03:31:57', 'si', 'sadasdsad', 'dfdff', 118, 'YPe3LZ7RooWu4Mq', '2020-04-22', '16:37:49'),
(131, '2020-04-22', '03:32:12', 'si', 'sdasd', 'dfdff', 119, 'bZ7XSrvCQ23AOtd', '2020-04-22', '16:37:43'),
(132, '2020-04-22', '03:32:14', 'si', 'sdasd', 'abeurjwkdlerotls', 120, 'uLegzloLqaatZ2X', '2020-04-22', '16:37:46'),
(134, '2020-04-22', '04:43:11', 'si', 'AASDADASD', 'dfdff', 121, 'E41xrmW5kSiT2ea', '2020-04-24', '16:06:26'),
(135, '2020-04-22', '04:43:13', 'si', 'AASDADASD', 'dfdff', 122, 'Kn215ohbRMbyLgR', NULL, NULL),
(136, '2020-04-22', '04:43:15', 'si', 'AASDADASD', 'dfdff', 123, '9K1JxU5R96iQmLp', NULL, NULL),
(137, '2020-04-22', '04:43:16', 'si', 'AASDADASD', 'abeurjwkdlerotls', 124, 'kY9pd9A01jTafRP', NULL, NULL),
(138, '2020-04-22', '04:43:18', 'si', 'AASDADASD', 'dfdff', 125, 'VLob62DwCW18IfS', NULL, NULL),
(139, '2020-04-22', '04:43:19', 'si', 'AASDADASD', 'abeurjwkdlerotls', 126, '9PVPJ2Q0Ta7h5dP', NULL, NULL),
(140, '2020-04-22', '04:43:20', 'si', 'AASDADASD', 'dfdff', 127, 'QelUYHUtDNczR15', NULL, NULL),
(141, '2020-04-22', '04:43:21', 'si', 'AASDADASD', 'abeurjwkdlerotls', 128, 'eBatJtTOzlqUzb9', NULL, NULL),
(142, '2020-04-22', '04:43:22', 'si', 'AASDADASD', 'dfdff', 129, '9AdRhUHuczBnTfU', NULL, NULL),
(143, '2020-04-22', '04:43:23', 'si', 'AASDADASD', 'dfdff', 130, 'c8ZFvA5hkXj3Og6', NULL, NULL),
(144, '2020-04-22', '04:43:24', 'si', 'AASDADASD', 'dfdff', 131, 'aIbezt8Fv3yqIdv', NULL, NULL),
(145, '2020-04-22', '04:43:25', 'si', 'AASDADASD', 'abeurjwkdlerotls', 132, '2jbs0GPsAIZSm8u', NULL, NULL),
(146, '2020-04-22', '04:43:26', 'si', 'test', 'abeurjwkdlerotls', 133, 'TfTmgF4Vdt1E7r0', NULL, NULL),
(157, '2020-04-23', '04:27:31', 'si', 'sdasd', 'dfdff', 134, 'pqT31FillArSBcj', NULL, NULL),
(168, '2020-04-24', '01:03:26', 'no', 'sadas', 'dfdff', 135, 'Q2brXl2zwwVNzKG', NULL, NULL),
(169, '2020-04-24', '01:03:33', 'si', 'sadas', 'dfdff', 136, 'Q2brXl2zwwVNzKG', NULL, NULL),
(170, '2020-04-24', '01:03:45', 'no', 'sdada', 'dfdff', 137, 'vL29WZeCwlRMoU8', NULL, NULL),
(171, '2020-04-24', '01:04:00', 'no', 'sad', 'dfdff', 138, 'gUPvkQFUd7s4kOA', NULL, NULL),
(172, '2020-04-24', '01:06:47', 'no', '', 'dfdff', 139, 'gUPvkQFUd7s4kOA', NULL, NULL),
(173, '2020-04-24', '01:07:51', 'no', '', 'dfdff', 140, 'cOeFPFDsCT4epEV', NULL, NULL),
(174, '2020-04-24', '01:08:09', 'no', '', 'dfdff', 141, 'YJnoF3eCjh7UKwD', NULL, NULL),
(175, '2020-04-24', '01:18:59', 'no', '', 'dfdff', 142, 'YJnoF3eCjh7UKwD', NULL, NULL),
(176, '2020-04-24', '01:19:51', 'no', '', 'dfdff', 143, 'YJnoF3eCjh7UKwD', NULL, NULL),
(177, '2020-04-24', '01:25:39', 'no', '', 'dfdff', 144, 'YJnoF3eCjh7UKwD', NULL, NULL),
(178, '2020-04-24', '01:25:47', 'no', '', 'dfdff', 145, 'nKpp4zQwQsy9ROb', NULL, NULL),
(179, '2020-04-24', '01:25:55', 'no', '', 'dfdff', 146, 'yXyB3JJ25TytDpy', NULL, NULL),
(180, '2020-04-24', '01:27:49', 'no', 'dasdasd', 'dfdff', 147, 'HtpqifTtGMaEBu8', NULL, NULL),
(181, '2020-04-24', '01:35:27', 'no', 'asdasd', 'dfdff', 148, 'aWyihpn9zCgYTVZ', NULL, NULL),
(182, '2020-04-24', '01:39:12', 'no', 'asdsad', 'dfdff', 149, '2YJEBNQhUzsX79L', NULL, NULL),
(183, '2020-04-24', '01:40:09', 'no', 'asdsad', 'dfdff', 150, 'vPEewAXgzRGlE9y', NULL, NULL),
(184, '2020-04-24', '01:42:43', 'no', 'asdasd', 'dfdff', 151, 'vPEewAXgzRGlE9y', NULL, NULL),
(185, '2020-04-24', '01:44:02', 'no', '<zxz<x<', 'dfdff', 152, 'sWLWp17bcaZLcMb', NULL, NULL),
(186, '2020-04-24', '01:45:51', 'no', 'sadas', 'dfdff', 153, 'sWLWp17bcaZLcMb', NULL, NULL),
(187, '2020-04-24', '01:46:00', 'no', 'asdsa', 'dfdff', 154, 'sWLWp17bcaZLcMb', NULL, NULL),
(188, '2020-04-24', '01:47:24', 'no', 'asdas', 'dfdff', 155, 'sWLWp17bcaZLcMb', NULL, NULL),
(189, '2020-04-24', '01:47:37', 'no', 'asdasd', 'dfdff', 156, 'sWLWp17bcaZLcMb', NULL, NULL),
(190, '2020-04-24', '01:47:44', 'no', 'sdasdasd', 'dfdff', 157, 'sWLWp17bcaZLcMb', NULL, NULL),
(191, '2020-04-24', '01:47:55', 'no', 'fsdfsd', 'dfdff', 158, '0SnGBbNvLkHBSAA', NULL, NULL),
(192, '2020-04-24', '01:48:03', 'no', 'dsfsd', 'dfdff', 159, '9IJ0WuKE7XNvgSO', NULL, NULL),
(193, '2020-04-24', '07:12:37', 'no', 'sdfds', 'dfdff', NULL, 'Y57EnxfyLQrwbqI', NULL, NULL),
(194, '2020-04-24', '07:13:00', 'no', 'sdfds', 'dfdff', NULL, '9Kmow4kLWZVpWXR', NULL, NULL),
(195, '2020-04-24', '07:13:24', 'no', '', 'dfdff', NULL, '9Kmow4kLWZVpWXR', NULL, NULL),
(196, '2020-04-24', '07:13:42', 'no', 'dsfsdf', 'dfdff', 163, 'LsyixH1qpgbb7pW', NULL, NULL);

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
(68, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'Prova', 'no', 1),
(69, NULL, NULL, NULL, '2020-04-22', '00:00:00', 'A3', '', 'no', 1),
(70, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'sad', 'no', 1),
(72, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'gg', 'no', 1),
(73, NULL, NULL, NULL, '2020-04-22', '00:00:00', 'A3', '', 'no', 1),
(74, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'gggh', 'no', 1),
(75, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'gggh', 'no', 1),
(76, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'gggh', 'no', 1),
(77, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'gggh', 'no', 1),
(78, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'gggh', 'no', 1),
(79, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'gggh', 'no', 1),
(80, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'gggh', 'no', 1),
(81, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'Davide è cinese', 'no', 1),
(82, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'asda', 'no', 1),
(83, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'asda', 'no', 1),
(84, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'asda', 'no', 1),
(86, NULL, NULL, NULL, '2020-04-22', '00:00:00', 'A3', 'prova', 'no', 1),
(87, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'sdf', 'no', 1),
(88, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'sdf', 'no', 1),
(89, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'sdf', 'no', 1),
(90, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'sdf', 'no', 1),
(91, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'sdf', 'no', 1),
(92, NULL, NULL, NULL, '2020-04-22', '00:00:00', 'A3', 'dsfds', 'no', 1),
(93, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'asd', 'no', 1),
(94, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'sadas', 'no', 1),
(95, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'sad', 'no', 1),
(96, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', '', 'no', 1),
(97, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'xzd', 'no', 1),
(98, NULL, NULL, NULL, '2020-04-22', '00:00:00', 'A3', '', 'no', 1),
(99, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'jh', 'no', 1),
(100, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'asdasd', 'no', 1),
(101, NULL, NULL, NULL, '2020-04-22', '10:00:00', 'A3', 'hfdgkjhdfkghdfkghfdkgjkfjgkfdjgfjdgkfdkgdfklgdfgkfgkfgjkfjgkfjgk', 'no', 1),
(102, NULL, NULL, NULL, '2020-04-22', '00:00:00', 'A3', '', 'no', 1),
(103, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'dg', 'no', 1),
(104, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'fhfgh', 'no', 1),
(105, NULL, NULL, NULL, '2020-04-22', '00:00:00', 'A3', '', 'no', 1),
(106, NULL, NULL, NULL, '2020-04-22', '00:00:00', 'A3', 'nmh', 'no', 1),
(107, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'mjhmmnmbnmn', 'no', 1),
(108, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'vxcvxcv', 'no', 1),
(109, NULL, NULL, NULL, '2020-04-22', '10:00:00', 'A3', 'xcvcxv', 'no', 1),
(110, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'cxvcxv', 'no', 1),
(111, NULL, NULL, NULL, '2020-04-22', '10:00:00', 'A3', 'xvxcv', 'no', 1),
(112, NULL, NULL, NULL, '2020-04-22', '09:00:00', 'A3', 'dfgdg', 'no', 1),
(113, NULL, NULL, NULL, '2020-04-22', '00:00:01', 'A4', 'DESCRIZIONE PROVA', 'no', 1),
(114, NULL, NULL, NULL, '2020-04-22', '07:45:00', 'A3', 'DESCRIZIONE TEST', 'no', 1),
(115, NULL, NULL, NULL, '2020-04-22', '00:00:00', 'A3', 'ddfkjgkfjhgkjghkfjkdhkdkgjhdjghjjdgjjdkgjkdgjkdgkdgkdgdkgjkdgjkd', 'no', 1),
(116, NULL, NULL, NULL, '2020-04-23', '09:00:00', 'A3', 'dsakdjsjkadjs skdjskdjsijds sdkjsj skjdkjsd mjdksjds dsjdksjd  d', 'no', 1),
(117, NULL, NULL, 'abeurjwkdlerotls', '2020-04-23', '00:00:00', 'A3', 'sadasdsadsad', 'no', 1),
(118, NULL, NULL, 'abeurjwkdlerotls', '2020-04-23', '12:00:00', 'A3', 'sadsad', 'no', 1),
(119, NULL, NULL, 'abeurjwkdlerotls', '2020-04-23', '07:45:00', 'A3', 'sdsad', 'no', 1),
(120, NULL, NULL, 'abeurjwkdlerotls', '2020-04-23', '07:45:00', 'A3', 'sdsad', 'no', 1),
(121, NULL, NULL, 'abeurjwkdlerotls', '2020-04-23', '11:00:00', 'A3', 'ASDAASDASDSA', 'si', 1),
(122, NULL, NULL, 'abeurjwkdlerotls', '2020-04-23', '11:00:00', 'A3', 'ASDAASDASDSA', 'si', 1),
(123, NULL, NULL, 'abeurjwkdlerotls', '2020-04-23', '11:00:00', 'A3', 'ASDAASDASDSA', 'si', 1),
(124, NULL, NULL, 'abeurjwkdlerotls', '2020-04-23', '11:00:00', 'A3', 'questo è un test', 'si', 1),
(125, NULL, NULL, 'abeurjwkdlerotls', '2020-04-23', '11:00:00', 'A3', 'ASDAASDASDSA', 'si', 1),
(126, NULL, NULL, 'abeurjwkdlerotls', '2020-04-23', '11:00:00', 'A3', 'ASDAASDASDSA', 'si', 1),
(127, NULL, NULL, 'abeurjwkdlerotls', '2020-04-23', '11:00:00', 'A3', 'ASDAASDASDSA', 'si', 1),
(128, NULL, NULL, 'abeurjwkdlerotls', '2020-04-23', '11:00:00', 'A3', 'ASDAASDASDSA', 'si', 1),
(129, NULL, NULL, 'abeurjwkdlerotls', '2020-04-23', '11:00:00', 'A3', 'ASDAASDASDSA', 'si', 1),
(130, NULL, NULL, 'abeurjwkdlerotls', '2020-04-23', '11:00:00', 'A3', 'ASDAASDASDSA', 'si', 1),
(131, NULL, NULL, 'abeurjwkdlerotls', '2020-04-23', '11:00:00', 'A3', 'ASDAASDASDSA', 'si', 1),
(132, NULL, NULL, 'abeurjwkdlerotls', '2020-04-23', '11:00:00', 'A3', 'ASDAASDASDSA', 'si', 1),
(133, NULL, NULL, 'abeurjwkdlerotls', '2020-04-23', '11:00:00', 'A3', 'ASDAASDASDSA', 'si', 1),
(134, NULL, NULL, 'sadasds', '2020-04-29', '09:00:00', 'A3', 'sdsdsd', 'si', 1),
(135, NULL, NULL, NULL, '2020-04-25', '10:00:00', 'A3', 'asdsad', 'si', 1),
(136, NULL, NULL, 'sadasds', '2020-04-25', '10:00:00', 'A3', 'asdsad', 'si', 1),
(137, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', 'asdasdsad', 'si', 1),
(138, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', 'asdsa', 'si', 1),
(139, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', '', 'si', 1),
(140, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', '', 'si', 1),
(141, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', '', 'si', 1),
(142, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', '', 'si', 1),
(143, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', '', 'si', 1),
(144, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', '', 'si', 1),
(145, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', '', 'si', 1),
(146, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', '', 'si', 1),
(147, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', 'asdasda', 'si', 1),
(148, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', 'asdasd', 'si', 1),
(149, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', 'sadas', 'si', 1),
(150, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', 'sadsa', 'si', 1),
(151, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', 'asd', 'si', 1),
(152, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', '<zx<x', 'si', 1),
(153, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', 'asd', 'si', 1),
(154, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', 'sads', 'si', 1),
(155, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', 'adsad', 'si', 1),
(156, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', 'asdasd', 'si', 1),
(157, NULL, NULL, NULL, '2020-04-25', '10:00:00', 'A3', 'sadasd', 'si', 1),
(158, NULL, NULL, NULL, '2020-04-25', '00:00:00', 'A3', 'dsfsd', 'si', 1),
(159, NULL, NULL, NULL, '2020-04-25', '10:00:00', 'A3', 'sdfd', 'si', 1),
(160, NULL, NULL, NULL, '2020-04-25', '07:45:00', 'A3', 'dsfd', 'si', 1),
(161, NULL, NULL, NULL, '2020-04-25', '07:45:00', 'A3', 'dsfd', 'si', 1),
(163, NULL, NULL, NULL, '2020-04-25', '09:00:00', 'A3', 'dfdsf', 'si', 1),
(164, '2020-04-24', '07:21:10', 'sadasds', '2020-04-24', '07:21:10', 'A4', 'prova', 'si', 1),
(166, '2020-04-24', '07:23:38', 'sadasds', '2020-04-24', '07:23:38', 'A3', 'Accala', 'si', 1);

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
  MODIFY `idPrenotazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT per la tabella `stampa`
--
ALTER TABLE `stampa`
  MODIFY `idStampa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

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
