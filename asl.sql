-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 01, 2023 alle 13:25
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asl`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `asl`
--

CREATE TABLE `asl` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Cognome` varchar(50) DEFAULT NULL,
  `Localita` varchar(50) DEFAULT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `asl`
--

INSERT INTO `asl` (`ID`, `Nome`, `Cognome`, `Localita`, `Password`) VALUES
(1, 'Mario', 'Rossi', 'Roma', 'asl1'),
(2, 'Anna', 'Bianchi', 'Milano', 'asl2'),
(3, 'Luca', 'Verdi', 'Napoli', 'asl3');

-- --------------------------------------------------------

--
-- Struttura della tabella `centralinista`
--

CREATE TABLE `centralinista` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Cognome` varchar(50) DEFAULT NULL,
  `NumeroPostazione` int(11) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `centralinista`
--

INSERT INTO `centralinista` (`ID`, `Nome`, `Cognome`, `NumeroPostazione`, `Password`) VALUES
(10, 'Simona', 'Martini', 101, 'ewdpuigawerpiutgeawsigutweaisu'),
(20, 'Luigi', 'Ricci', 102, 'passC1'),
(30, 'Elena', 'Moro', 103, 'passC2');

-- --------------------------------------------------------

--
-- Struttura della tabella `funzionariocomunale`
--

CREATE TABLE `funzionariocomunale` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Cognome` varchar(50) DEFAULT NULL,
  `Comune` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `funzionariocomunale`
--

INSERT INTO `funzionariocomunale` (`ID`, `Nome`, `Cognome`, `Comune`, `Password`) VALUES
(100, 'Roberto', 'Conti', 'Roma', 'passFC1'),
(200, 'Alessia', 'Fabbri', 'Milano', 'passFC2'),
(300, 'Giovanni', 'Morelli', 'Napoli', 'passFC3');

-- --------------------------------------------------------

--
-- Struttura della tabella `funzionariopolizia`
--

CREATE TABLE `funzionariopolizia` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Cognome` varchar(50) DEFAULT NULL,
  `Caserma` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `funzionariopolizia`
--

INSERT INTO `funzionariopolizia` (`ID`, `Nome`, `Cognome`, `Caserma`, `Password`) VALUES
(1, 'Giuseppe', 'Ferrari', 'Caserma Centrale', 'pass1'),
(2, 'Laura', 'Russo', 'Caserma Nord', 'pass2'),
(3, 'Marco', 'Gallo', 'Caserma Sud', 'pass3');

-- --------------------------------------------------------

--
-- Struttura della tabella `pazienti`
--

CREATE TABLE `pazienti` (
  `CodiceFiscale` varchar(16) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `DataNascita` date DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `Indirizzo` varchar(255) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `positivo` tinyint(1) NOT NULL,
  `controllo` tinyint(1) NOT NULL,
  `Esito_controllo` varchar(200) DEFAULT NULL,
  `data_controllo` date DEFAULT NULL,
  `Modalita_controllo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `pazienti`
--

INSERT INTO `pazienti` (`CodiceFiscale`, `Nome`, `Cognome`, `DataNascita`, `password`, `Indirizzo`, `Email`, `Telefono`, `positivo`, `controllo`, `Esito_controllo`, `data_controllo`, `Modalita_controllo`) VALUES
('BNCLUA75M03H456X', 'Luca', 'Bianchi', '1975-03-30', '', 'Via Napoli 789', 'luca.bianchi@email.com', '1112233445', 0, 0, 'Il paziente è risultato positivo al test', '2023-11-29', 'Tampone'),
('BNCRLA75M12H888O', 'Laura', 'Bianco', '1975-12-04', '', 'Via Salerno 159', 'laura.bianco@email.com', '3344556677', 0, 1, 'Il paziente non è risultato positivo al tampone molecolare ', '2023-11-29', 'Tampone Molecolare '),
('CLSELN75M16H333C', 'Elena', 'Celeste', '1975-04-22', '', 'Via Enna 159', 'elena.celeste@email.com', '3344556677', 0, 0, NULL, NULL, NULL),
('CLSMRC89M07H333T', 'Marco', 'Celesti', '1989-07-20', '', 'Via Palermo 159', 'marco.celesti@email.com', '9988776655', 0, 0, NULL, NULL, NULL),
('CLSMRT80M23H111J', 'Martina', 'Celesti', '1980-11-02', '', 'Via Agrigento 753', 'martina.celesti@email.com', '9988776655', 0, 0, NULL, NULL, NULL),
('CLSSMN80M19H666F', 'Simone', 'Celesti', '1980-07-30', '', 'Via Caltanissetta 753', 'simone.celesti@email.com', '9988776655', 0, 1, 'Il Paziente è negativo ', '2023-11-29', 'Analisi'),
('GLLGVA95M04H789W', 'Giovanna', 'Gialli', '1995-04-12', '', 'Via Venezia 987', 'giovanna.gialli@email.com', '5544332211', 0, 0, NULL, NULL, NULL),
('GLLNTN80M11H777P', 'Antonio', 'Giallo', '1980-11-22', '', 'Via Catania 753', 'antonio.giallo@email.com', '9988776655', 0, 1, 'Il paziente non è risultato positivo al tampone molecolare ', '2023-11-29', 'Tampone Molecolare '),
('JTU543YJTDJYJRHR', 'W5EUJJTR', 'JTEDRJT', '2000-11-22', '', '435YWYR', 'SJFNAPDIG@DSGUOIHWRSDAFGUI', '654654', 1, 1, NULL, NULL, NULL),
('MRRGLI88M18H555E', 'Giulia', 'Marrone', '1988-06-18', '', 'Via Trapani 852', 'giulia.marrone@email.com', '1122334455', 0, 0, NULL, NULL, NULL),
('MRRRBT82M06H222U', 'Roberta', 'Marroni', '1982-06-08', '', 'Via Bologna 321', 'roberta.marroni@email.com', '1122334455', 0, 0, NULL, NULL, NULL),
('NRPLOA70M05H111V', 'Paolo', 'Neri', '1970-05-25', '', 'Via Firenze 654', 'paolo.neri@email.com', '6677889900', 0, 0, NULL, NULL, NULL),
('RNCLSS75M24H222K', 'Alessia', 'Arancione', '1975-12-15', '', 'Via Trapani 159', 'alessia.arancione@email.com', '3344556677', 0, 1, 'Negativo Covid-19', '2023-11-29', 'Tampone'),
('RNCRZO75M20H777G', 'Lorenzo', 'Arancione', '1975-08-10', '', 'Via Messina 159', 'lorenzo.arancione@email.com', '3344556677', 0, 0, NULL, NULL, NULL),
('RNCVLT88M14H111A', 'Valentina', 'Arancio', '1988-02-28', '', 'Via Sassari 852', 'valentina.arancio@email.com', '1122334455', 0, 0, NULL, NULL, NULL),
('RSAGLU93M13H999N', 'Gianluca', 'Rosa', '1993-01-15', '', 'Via Reggio 246', 'gianluca.rosa@email.com', '5566778899', 0, 0, NULL, NULL, NULL),
('RSLLEN75M08H444S', 'Elena', 'Rosa', '1975-08-18', '', 'Via Torino 753', 'elena.rosa@email.com', '3344556677', 0, 0, NULL, NULL, NULL),
('RSOFAB88M22H999I', 'Fabio', 'Rosa', '1988-10-25', '', 'Via Siracusa 852', 'fabio.rosa@email.com', '1122334455', 0, 0, NULL, NULL, NULL),
('RSOFRN93M17H444D', 'Francesco', 'Rosa', '1993-05-05', '', 'Via Agrigento 246', 'francesco.rosa@email.com', '5566778899', 0, 0, NULL, NULL, NULL),
('RSSMRA85M01H501Z', 'Mario', 'Rossi', '1985-01-01', '', 'Via Roma 123', 'mario.rossi@email.com', '1234567890', 0, 0, NULL, NULL, NULL),
('VLDADV80M15H222B', 'Davide', 'Viola', '1980-03-10', '', 'Via Siracusa 753', 'davide.viola@email.com', '9988776655', 0, 1, 'Il paziente non è positivo', '2023-11-29', 'Tampone'),
('VLDENR93M21H888H', 'Eleonora', 'Viola', '1993-09-12', '', 'Via Ragusa 246', 'eleonora.viola@email.com', '5566778899', 0, 0, NULL, NULL, NULL),
('VRDANN80M02H123Y', 'Anna', 'Verdi', '1980-02-15', '', 'Via Milano 456', 'anna.verdi@email.com', '9876543210', 0, 1, 'Il Paziente è positivo ', '2023-11-29', 'Tampone'),
('VRDGLI93M25H333L', 'Giorgio', 'Verde', '1993-01-20', '', 'Via Caltanissetta 246', 'giorgio.verde@email.com', '5566778899', 0, 0, NULL, NULL, NULL),
('VRDSRA88M10H666Q', 'Sara', 'Verde', '1988-10-10', '', 'Via Padova 852', 'sara.verde@email.com', '1122334455', 0, 0, NULL, NULL, NULL),
('ZZZALX93M09H555R', 'Alessandro', 'Azzurri', '1993-09-02', '', 'Via Genova 246', 'alessandro.azzurri@email.com.it', '5566778899', 0, 1, 'Il paziente è positivo ', '2023-11-29', 'Tampone Molecolare ');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `asl`
--
ALTER TABLE `asl`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `centralinista`
--
ALTER TABLE `centralinista`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `funzionariocomunale`
--
ALTER TABLE `funzionariocomunale`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `funzionariopolizia`
--
ALTER TABLE `funzionariopolizia`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `pazienti`
--
ALTER TABLE `pazienti`
  ADD PRIMARY KEY (`CodiceFiscale`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
