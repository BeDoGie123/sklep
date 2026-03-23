-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2026 at 09:22 AM
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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane_firmy`
--

CREATE TABLE `dane_firmy` (
  `Id_firmy` int(11) NOT NULL,
  `telefon` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `nazwa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4, 'Karolina', 'Stankiewicz', 'ul. Bracka 07', 'Koszalin', '01-971', '324345613', 'Stankiewicz@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kurierzy`
--

CREATE TABLE `kurierzy` (
  `id_kuriera` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `cena` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kurierzy`
--

INSERT INTO `kurierzy` (`id_kuriera`, `nazwa`, `mail`, `cena`) VALUES
(1, 'Sobczak', 'Sobczak@gmail.com', 1000),
(2, 'Kozak', 'Kozak@gmail.com', 1500),
(3, 'Malinowski', 'Malinowski@gmail.com', 900);

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
(21, 'u1', 'a9993e364706816aba3e25717850c26c9cd0d89d'),
(22, 'u2', '056eafe7cf52220de2df36845b8ed170c67e23e3'),
(23, 'u3', 'da89a65e5debe06011418cdf220b2dd71f7b065f'),
(35, 'u4', 'f10e2821bbbea527ea02200352313bc059445190'),
(37, 'u4', 'f10e2821bbbea527ea02200352313bc059445190'),
(38, 'u4', 'f10e2821bbbea527ea02200352313bc059445190'),
(39, 'u4', 'f10e2821bbbea527ea02200352313bc059445190'),
(40, 'u4', 'f10e2821bbbea527ea02200352313bc059445190'),
(41, 'u4', 'f10e2821bbbea527ea02200352313bc059445190'),
(42, 'u4', 'f10e2821bbbea527ea02200352313bc059445190'),
(43, 'u4', 'f10e2821bbbea527ea02200352313bc059445190');

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
(1, 'Banan', 4, 6, 1000, 1, 2, NULL),
(2, 'Bagietka', 7, 1, 30, 2, 3, NULL),
(3, 'Kapusta', 1, 1, 60, 3, 1, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_zamowienia` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `id_kuriera` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `cena_koncowa` decimal(10,0) NOT NULL,
  `data_zamowienia` date NOT NULL,
  `data_dostarczenia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zamowienia`
--

INSERT INTO `zamowienia` (`id_zamowienia`, `id_produktu`, `id_kuriera`, `id_klienta`, `cena_koncowa`, `data_zamowienia`, `data_dostarczenia`) VALUES
(1, 1, 1, 2, 4, '2026-01-16', '2026-01-20'),
(2, 2, 2, 3, 7, '2026-02-10', '2026-02-13'),
(3, 3, 3, 4, 1, '2026-02-02', '2026-02-06');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dane_firmy`
--
ALTER TABLE `dane_firmy`
  ADD PRIMARY KEY (`Id_firmy`);

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
-- Indeksy dla tabeli `kurierzy`
--
ALTER TABLE `kurierzy`
  ADD PRIMARY KEY (`id_kuriera`);

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
  ADD KEY `id_produktu` (`id_produktu`),
  ADD KEY `id_kuriera` (`id_kuriera`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dane_firmy`
--
ALTER TABLE `dane_firmy`
  MODIFY `Id_firmy` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kurierzy`
--
ALTER TABLE `kurierzy`
  MODIFY `id_kuriera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loginy`
--
ALTER TABLE `loginy`
  MODIFY `id_loginu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `zamowienia_ibfk_2` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id_produktu`),
  ADD CONSTRAINT `zamowienia_ibfk_3` FOREIGN KEY (`id_kuriera`) REFERENCES `kurierzy` (`id_kuriera`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
