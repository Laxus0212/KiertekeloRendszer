-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Sze 11. 15:27
-- Kiszolgáló verziója: 10.4.14-MariaDB
-- PHP verzió: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `regisztraciosadatok`
--
CREATE DATABASE IF NOT EXISTS `regisztraciosadatok` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `regisztraciosadatok`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cpu`
--

DROP TABLE IF EXISTS `cpu`;
CREATE TABLE `cpu` (
  `id` int(11) NOT NULL,
  `nev` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `benchmark` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `ar` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `cpu`
--

INSERT INTO `cpu` (`id`, `nev`, `benchmark`, `link`, `ar`) VALUES
(3, 'Intel Core i5-10400F 6-Core 2.9GHz LGA1200', 4, '', 0),
(20, 'Intel® Core™ i3-1120G4 Processor (8M Cache, up to 3.50 GHz, with IPU)', 4, '', 0),
(21, 'Intel® Core™ i3-4330TE Processor', 3, '', 0),
(22, 'Intel Pentium Dual-Core G4620 3.7GHz LGA1151 Processzor', 2, '', 0),
(23, 'Intel® Core™ m3-7Y32 Processor', 1, '', 0),
(27, 'sdddddddddd', 2, 'as', 12357);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `gpu`
--

DROP TABLE IF EXISTS `gpu`;
CREATE TABLE `gpu` (
  `id` int(11) NOT NULL,
  `nev` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `benchmark` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `ar` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `gpu`
--

INSERT INTO `gpu` (`id`, `nev`, `benchmark`, `link`, `ar`) VALUES
(2, 'ASUS GeForce GTX 1080 Ti OC 11GB GDDR5X 352bit', 4, '0', 0),
(14, 'GeForce RTX™ 3090', 4, '0', 0),
(15, 'GeForce GTX 960', 4, '0', 0),
(16, 'GeForce GTX 690', 3, '0', 0),
(17, 'GeForce G100', 2, '0', 0),
(18, 'GeForce 8400 GS', 1, '0', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ram`
--

DROP TABLE IF EXISTS `ram`;
CREATE TABLE `ram` (
  `id` int(11) NOT NULL,
  `nev` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `memoria` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `ar` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `ram`
--

INSERT INTO `ram` (`id`, `nev`, `memoria`, `link`, `ar`) VALUES
(21, 'Samsung 8GB DDR4 2666MHZ M471A1K43DB1-CTD', 8, '0', 0),
(26, 'Corsair Vengeance LED', 16, '0', 0),
(27, 'Crucial Ballistix Sport', 8, '0', 0),
(28, 'HyperX Fury RGB 3733MHz', 4, '0', 0),
(29, 'Kingston HyperX Fury', 2, '0', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szadatok`
--

DROP TABLE IF EXISTS `szadatok`;
CREATE TABLE `szadatok` (
  `ID` int(11) NOT NULL,
  `nev` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `szul_datum` date NOT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szadatok`
--

INSERT INTO `szadatok` (`ID`, `nev`, `szul_datum`, `email`, `jelszo`, `admin`) VALUES
(139, 'Rebeka', '2001-05-15', 'sss@sss', '8a2fa9d6568c7fb180034d3ceb6ce42d8320c878', 0),
(141, 'Laxus', '2000-02-12', 'varadizsolt0212@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 2),
(142, 'admin', '2000-02-12', 'admin@admin.com', '4cc19aaff82f60ac4097f935ab4a06ad4f0891cc', 1),
(143, 'Béla', '2021-04-02', 'gombgyarosbela@gombgyar.hu', 'aee2558ecacacbb2b5bc75b5333fd4b805c1803e', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tarolt_konfiguraciok`
--

DROP TABLE IF EXISTS `tarolt_konfiguraciok`;
CREATE TABLE `tarolt_konfiguraciok` (
  `CPU` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `GPU` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `RAM` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `db` int(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `tarolt_konfiguraciok`
--

INSERT INTO `tarolt_konfiguraciok` (`CPU`, `GPU`, `RAM`, `db`) VALUES
('Intel Core i5-10400F 6-Core 2.9GHz LGA1200', 'ASUS GeForce GTX 1080 Ti OC 11GB GDDR5X 352bit', 'Corsair Vengeance LED', 2),
('Intel Core i5-10400F 6-Core 2.9GHz LGA1200', 'ASUS GeForce GTX 1080 Ti OC 11GB GDDR5X 352bit', 'Samsung 8GB DDR4 2666MHZ M471A1K43DB1-CTD', 3),
('Intel Pentium Dual-Core G4620 3.7GHz LGA1151 Processzor', 'GeForce G100', 'Corsair Vengeance LED', 3),
('Intel Pentium Dual-Core G4620 3.7GHz LGA1151 Processzor', 'GeForce G100', 'Samsung 8GB DDR4 2666MHZ M471A1K43DB1-CTD', 2),
('Intel® Core™ i3-1120G4 Processor (8M Cache, up to 3.50 GHz, with IPU)', 'GeForce GTX 960', 'Samsung 8GB DDR4 2666MHZ M471A1K43DB1-CTD', 4),
('Intel® Core™ i3-4330TE Processor', 'GeForce GTX 690', 'Samsung 8GB DDR4 2666MHZ M471A1K43DB1-CTD', 1),
('Intel® Core™ m3-7Y32 Processor', 'GeForce 8400 GS', 'Corsair Vengeance LED', 7),
('Intel® Core™ m3-7Y32 Processor', 'GeForce 8400 GS', 'Samsung 8GB DDR4 2666MHZ M471A1K43DB1-CTD', 109);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`id`,`nev`),
  ADD UNIQUE KEY `nev` (`nev`);

--
-- A tábla indexei `gpu`
--
ALTER TABLE `gpu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nev` (`nev`);

--
-- A tábla indexei `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`id`,`nev`),
  ADD UNIQUE KEY `nev` (`nev`);

--
-- A tábla indexei `szadatok`
--
ALTER TABLE `szadatok`
  ADD PRIMARY KEY (`ID`,`nev`,`jelszo`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- A tábla indexei `tarolt_konfiguraciok`
--
ALTER TABLE `tarolt_konfiguraciok`
  ADD PRIMARY KEY (`CPU`,`GPU`,`RAM`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `cpu`
--
ALTER TABLE `cpu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT a táblához `gpu`
--
ALTER TABLE `gpu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT a táblához `ram`
--
ALTER TABLE `ram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT a táblához `szadatok`
--
ALTER TABLE `szadatok`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
