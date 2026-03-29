-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2026 at 11:54 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sklep`
--
CREATE DATABASE IF NOT EXISTS `sklep` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sklep`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane_firmy`
--

CREATE TABLE `dane_firmy` (
  `telefon` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `nazwa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dane_firmy`
--

INSERT INTO `dane_firmy` (`telefon`, `mail`, `nazwa`) VALUES
('XXX-XXX-XXX', 'mailFirmy@gmail.com', 'Sklep spożywczy Mateusza i Bartka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dostawcy`
--

CREATE TABLE `dostawcy` (
  `id_dostawcy` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL,
  `adres` varchar(30) NOT NULL,
  `kod_pocztowy` varchar(30) NOT NULL,
  `miasto` varchar(30) NOT NULL,
  `telefon` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dostawcy`
--

INSERT INTO `dostawcy` (`id_dostawcy`, `nazwa`, `adres`, `kod_pocztowy`, `miasto`, `telefon`, `mail`) VALUES
(1, 'Tomczak', 'ul. Liliowa 02', '01-714', 'Łęczna', '123456789', 'Tomczak@gmail.com'),
(2, 'Kaczmarczyk', 'ul. Radomska 04', '47-679', 'Gorzów Wielkopolski', '987654321', 'Kaczmarczyk@gmail.com'),
(3, 'Nowicki', 'ul. Łomżyńska 20', '08-051', 'Olsztyn', '122134436', 'Nowicki@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE `kategoria` (
  `id_kategori` int(11) NOT NULL,
  `nazwa_kategori` varchar(50) NOT NULL,
  `opis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoria`
--

INSERT INTO `kategoria` (`id_kategori`, `nazwa_kategori`, `opis`) VALUES
(1, 'Owoce', 'owoce '),
(2, 'Pieczywo', 'Chleb i bułki'),
(3, 'Warzywa', 'warzywa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id_klienta` int(11) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `adres` varchar(30) NOT NULL,
  `miasto` varchar(50) NOT NULL,
  `kod_pocztowy` varchar(30) NOT NULL,
  `telefon` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `login_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`id_klienta`, `imie`, `nazwisko`, `adres`, `miasto`, `kod_pocztowy`, `telefon`, `mail`, `login_id`) VALUES
(2, 'Dominika', 'Włodarczyk', 'ul. Grunwaldzka 38', 'Kuźnica Masłońska', '96-349', '987654321', 'Włodarczyk@gmail.com', NULL),
(3, 'Igor', 'Janik', 'ul. Baczyńskiego 89', 'Łęczna', '31-775', '373512985', 'Janik@gmail.com', NULL),
(4, 'Karolina', 'Stankiewicz', 'ul. Bracka 07', 'Koszalin', '01-971', '324345613', 'Stankiewicz@gmail.com', 60),
(6, 'bartek', 'gajda', 'ulica 12', 'Pszów', '44-370', '123-456-789', 'moj_mail@gmail.com', 64);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `loginy`
--

CREATE TABLE `loginy` (
  `id_loginu` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `haslo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loginy`
--

INSERT INTO `loginy` (`id_loginu`, `login`, `haslo`) VALUES
(60, 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8'),
(64, 'bartek', '1510bcc82b444bd3d94fed33ba1fa2e72fc0e429');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_produktu` int(11) NOT NULL,
  `nazwa_produktu` varchar(50) NOT NULL,
  `cena_produktu` decimal(10,0) NOT NULL,
  `ilosc_produktu` int(11) NOT NULL,
  `sztuki` int(11) NOT NULL,
  `id_kategorii` int(11) NOT NULL,
  `id_dostawcy` int(11) NOT NULL,
  `zdjecie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id_produktu`, `nazwa_produktu`, `cena_produktu`, `ilosc_produktu`, `sztuki`, `id_kategorii`, `id_dostawcy`, `zdjecie`) VALUES
(1, 'jabłko', 4, 6, 985, 1, 2, 'apple.png'),
(2, 'Bagietka', 7, 1, 17, 2, 3, 'baguette.png'),
(3, 'Marchewka', 1, 1, 48, 3, 1, 'carrot.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_zamowienia` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `cena_koncowa` decimal(10,0) NOT NULL,
  `data_zamowienia` date NOT NULL,
  `data_dostarczenia` date NOT NULL,
  `sztuki` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zamowienia`
--

INSERT INTO `zamowienia` (`id_zamowienia`, `id_produktu`, `id_klienta`, `cena_koncowa`, `data_zamowienia`, `data_dostarczenia`, `sztuki`) VALUES
(12, 1, 4, 8, '2026-03-29', '0000-00-00', 2),
(13, 3, 4, 1, '2026-03-29', '0000-00-00', 1),
(14, 2, 4, 7, '2026-03-29', '0000-00-00', 1),
(15, 1, 6, 4, '2026-03-29', '0000-00-00', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dostawcy`
--
ALTER TABLE `dostawcy`
  ADD PRIMARY KEY (`id_dostawcy`);

--
-- Indeksy dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klienta`),
  ADD KEY `login_id` (`login_id`);

--
-- Indeksy dla tabeli `loginy`
--
ALTER TABLE `loginy`
  ADD PRIMARY KEY (`id_loginu`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produktu`),
  ADD KEY `id_dostawcy` (`id_dostawcy`),
  ADD KEY `id_kategorii` (`id_kategorii`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id_zamowienia`),
  ADD KEY `id_klienta` (`id_klienta`),
  ADD KEY `id_produktu` (`id_produktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dostawcy`
--
ALTER TABLE `dostawcy`
  MODIFY `id_dostawcy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loginy`
--
ALTER TABLE `loginy`
  MODIFY `id_loginu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `klienci`
--
ALTER TABLE `klienci`
  ADD CONSTRAINT `klienci_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `loginy` (`id_loginu`);

--
-- Constraints for table `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `produkty_ibfk_1` FOREIGN KEY (`id_dostawcy`) REFERENCES `dostawcy` (`id_dostawcy`),
  ADD CONSTRAINT `produkty_ibfk_2` FOREIGN KEY (`id_kategorii`) REFERENCES `kategoria` (`id_kategori`);

--
-- Constraints for table `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id_klienta`),
  ADD CONSTRAINT `zamowienia_ibfk_2` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id_produktu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
