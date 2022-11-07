-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2022 at 09:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itcamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `idAdmin` bigint(20) UNSIGNED NOT NULL,
  `namaAdmin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailAdmin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwordAdmin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`idAdmin`, `namaAdmin`, `emailAdmin`, `passwordAdmin`) VALUES
(1, 'tes', 'tes@gmail.com', '123'),
(2, 'lagi', 'lagi@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `bayars`
--

CREATE TABLE `bayars` (
  `idBayar` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `tglDaftar` date NOT NULL,
  `tglAcc` date DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT 0,
  `gambarBayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bayars`
--

INSERT INTO `bayars` (`idBayar`, `idUser`, `tglDaftar`, `tglAcc`, `flag`, `gambarBayar`) VALUES
(1, 1, '2022-11-07', NULL, 0, NULL),
(2, 2, '2022-11-07', NULL, 0, NULL),
(3, 3, '2022-11-07', NULL, 0, NULL),
(4, 4, '2022-11-07', NULL, 0, NULL),
(5, 5, '2022-11-07', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medparts`
--

CREATE TABLE `medparts` (
  `idMed` bigint(20) UNSIGNED NOT NULL,
  `namaMed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambarMed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medparts`
--

INSERT INTO `medparts` (`idMed`, `namaMed`, `gambarMed`) VALUES
(8, 'Media 1', 'Media 1-1667719013.png'),
(9, 'Media 2', 'Media 2-1667719029.jpg'),
(10, 'Media 3', 'Media 3-1667719045.png');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_08_032254_create_admins_table', 1),
(6, '2022_10_08_032311_create_bayars_table', 2),
(7, '2022_10_08_032320_create_sponsors_table', 2),
(8, '2022_10_08_032339_create_medparts_table', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pembayaran`
-- (See below for the actual view)
--
CREATE TABLE `pembayaran` (
`idUser` bigint(20) unsigned
,`idBayar` bigint(20) unsigned
,`tglDaftar` date
,`tglAcc` date
,`flag` int(11)
,`gambarBayar` varchar(255)
,`namaUser` varchar(255)
,`emailUser` varchar(255)
,`passwordUser` varchar(255)
,`telp` varchar(255)
,`instansi` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `idSponsor` bigint(20) UNSIGNED NOT NULL,
  `namaSponsor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuranSponsor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambarSponsor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`idSponsor`, `namaSponsor`, `ukuranSponsor`, `gambarSponsor`) VALUES
(3, 'Sponsor 1', 'l', 'Sponsor 1-1667721959.png'),
(4, 'Sponsor 2', 'm', 'Sponsor 2-1667721975.jpg'),
(5, 'Sponsor 3', 'xl', 'Sponsor 3-1667808516.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `namaUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwordUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `namaUser`, `emailUser`, `passwordUser`, `telp`, `instansi`) VALUES
(1, 'User 1', 'user@gmail.com', 'user1', '0821910293123', 'UPN'),
(2, 'User 2', 'user2@gmail.com', 'user2', '0891212323213', 'Lain-lain'),
(3, 'User 3', 'user3@gmail.com', 'user3', '08123213', 'UPN'),
(4, 'User 4', 'user4@gmail.com', 'user4', '087123123123', 'UPN'),
(5, 'User 5', 'user5@gmail.com', 'user5', '082131231', 'lain-lain');

-- --------------------------------------------------------

--
-- Structure for view `pembayaran`
--
DROP TABLE IF EXISTS `pembayaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pembayaran`  AS SELECT `bayars`.`idUser` AS `idUser`, `bayars`.`idBayar` AS `idBayar`, `bayars`.`tglDaftar` AS `tglDaftar`, `bayars`.`tglAcc` AS `tglAcc`, `bayars`.`flag` AS `flag`, `bayars`.`gambarBayar` AS `gambarBayar`, `users`.`namaUser` AS `namaUser`, `users`.`emailUser` AS `emailUser`, `users`.`passwordUser` AS `passwordUser`, `users`.`telp` AS `telp`, `users`.`instansi` AS `instansi` FROM (`bayars` join `users` on(`bayars`.`idUser` = `users`.`idUser`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`idAdmin`),
  ADD UNIQUE KEY `admins_emailadmin_unique` (`emailAdmin`);

--
-- Indexes for table `bayars`
--
ALTER TABLE `bayars`
  ADD PRIMARY KEY (`idBayar`),
  ADD KEY `bayars_iduser_foreign` (`idUser`);

--
-- Indexes for table `medparts`
--
ALTER TABLE `medparts`
  ADD PRIMARY KEY (`idMed`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`idSponsor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `users_emailuser_unique` (`emailUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `idAdmin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bayars`
--
ALTER TABLE `bayars`
  MODIFY `idBayar` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medparts`
--
ALTER TABLE `medparts`
  MODIFY `idMed` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `idSponsor` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bayars`
--
ALTER TABLE `bayars`
  ADD CONSTRAINT `bayars_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
