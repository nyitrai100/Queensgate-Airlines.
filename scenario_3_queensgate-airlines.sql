-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 09:57 AM
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
-- Database: `queensgate-airlines`
--

-- --------------------------------------------------------

--
-- Table structure for table `aircraft`
--

CREATE TABLE `aircraft` (
  `id` int(10) UNSIGNED NOT NULL,
  `make` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aircraft`
--

INSERT INTO `aircraft` (`id`, `make`, `model`) VALUES
(1, 'Boeing', '757-200'),
(2, 'Airbus', 'A220'),
(3, 'Embraer', 'E170'),
(4, 'Boeing', '737-800');

-- --------------------------------------------------------

--
-- Table structure for table `crew`
--

CREATE TABLE `crew` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crew`
--

INSERT INTO `crew` (`id`, `first_name`, `last_name`) VALUES
(0, 'Ethyl', 'Glashby'),
(1, 'Rena', 'Lund'),
(2, 'Daisy', 'Iqbal'),
(3, 'Tariq', 'Osan'),
(4, 'Melita', 'Wisam'),
(5, 'Candie', 'Hurrell'),
(6, 'Mary', 'Hussain'),
(7, 'Ginger', 'Kilty'),
(8, 'Sofia', 'Beche'),
(9, 'Lamond', 'Osbiston'),
(10, 'Ricardo', 'Kowalski'),
(11, 'Turner', 'Neillans'),
(12, 'Ranice', 'Gerrey'),
(13, 'Todd', 'Habbon'),
(14, 'Giff', 'Ellerbeck'),
(15, 'Ainslee', 'Campione'),
(16, 'Imran', 'Leethem'),
(17, 'Lianne', 'Moyne'),
(25, 'Jed', 'Rabada'),
(26, 'Dorie', 'Tillerton'),
(27, 'Angelita', 'Bartosik'),
(28, 'Rickey', 'Quogan'),
(29, 'Rosalinde', 'Lohrensen');

-- --------------------------------------------------------

--
-- Table structure for table `crew_flight`
--

CREATE TABLE `crew_flight` (
  `crew_id` int(10) UNSIGNED NOT NULL,
  `flight_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crew_flight`
--

INSERT INTO `crew_flight` (`crew_id`, `flight_id`) VALUES
(1, 3),
(1, 6),
(2, 2),
(2, 4),
(2, 6),
(3, 1),
(4, 1),
(4, 3),
(5, 1),
(5, 2),
(5, 5),
(6, 1),
(7, 2),
(7, 5),
(8, 2),
(9, 3),
(9, 6),
(10, 6),
(11, 3),
(11, 4),
(12, 5),
(14, 4),
(15, 5),
(16, 4);

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` int(10) UNSIGNED NOT NULL,
  `flight_num` varchar(6) DEFAULT NULL,
  `aircraft_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `flight_num`, `aircraft_id`, `date`) VALUES
(1, 'QA10', 4, '2024-01-02'),
(2, 'QA11', 2, '2024-02-23'),
(3, 'QA1111', 2, '2024-03-13'),
(4, 'QA459', 3, '2024-06-03'),
(5, 'QA23', 4, '2024-03-06'),
(6, 'QA23', 3, '2024-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `flight_numbers`
--

CREATE TABLE `flight_numbers` (
  `flight_num` varchar(6) NOT NULL,
  `origin` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_numbers`
--

INSERT INTO `flight_numbers` (`flight_num`, `origin`, `destination`) VALUES
('QA10', 'London Heathrow', 'Paris Charles De Gaulle'),
('QA11', 'London Heathrow', 'Amsterdam Schipol'),
('QA1111', 'Liverpool John Lennon', 'Frankfurt am Main'),
('QA13', 'Manchester', 'Prague Václav Havel'),
('QA21', 'Liverpool John Lennon', 'Barcelona–El Prat Josep Tarradellas'),
('QA23', 'Manchester', 'Paris Charles De Gaulle'),
('QA43', 'London Gatwick', 'Paris Charles de Gaulle'),
('QA438', 'London Gatwick', 'Stockholm Arlanda'),
('QA459', 'Manchester', 'Athens International'),
('QA51', 'London Heathrow', 'Istanbul'),
('QA622', 'Liverpool John Lennon', 'Paris Charles De Gaulle'),
('QA673', 'Manchester', 'Rome Leonardo da Vinci–Fiumicino'),
('QA712', 'Liverpool John Lennon', 'Istanbul'),
('QA77', 'London Gatwick', 'Frankfurt am Main'),
('QA813', 'London Heathrow', 'Dublin'),
('QA89', 'London Gatwick', 'Barcelona–El Prat Josep Tarradellas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'k.l.hutton@assign3.ac.uk', '$2y$10$C8RsCwFPKUbhuWU9ze4p9e1TdjJxhUVKp/IJF9kpxzul9jgmDya36', 1, NULL, NULL, NULL),
(2, 'y.miandad@assign3.ac.uk', '$2y$10$x7f9igWGzIUVJ4XcGxVbmO6LHe.HwLLGqR0aA6gllxMT50.POHMM.', 2, NULL, NULL, NULL),
(3, 's.laxman@assign3.ac.uk', '$2y$10$JBaf7d66ishGUwGDcgSs.uNKyqTqEcdMzZgiPBvp5034wCB.hikKS', 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aircraft`
--
ALTER TABLE `aircraft`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crew`
--
ALTER TABLE `crew`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crew_flight`
--
ALTER TABLE `crew_flight`
  ADD PRIMARY KEY (`crew_id`,`flight_id`),
  ADD KEY `fk_crew_flight__flight` (`flight_id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_flights_flight_nums_flight_num` (`flight_num`),
  ADD KEY `fk_flights_aircraft_aircraft_id` (`aircraft_id`);

--
-- Indexes for table `flight_numbers`
--
ALTER TABLE `flight_numbers`
  ADD PRIMARY KEY (`flight_num`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aircraft`
--
ALTER TABLE `aircraft`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `crew`
--
ALTER TABLE `crew`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crew_flight`
--
ALTER TABLE `crew_flight`
  ADD CONSTRAINT `fk_crew_flight__crew` FOREIGN KEY (`crew_id`) REFERENCES `crew` (`id`),
  ADD CONSTRAINT `fk_crew_flight__flight` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`id`);

--
-- Constraints for table `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `fk_flights_aircraft_aircraft_id` FOREIGN KEY (`aircraft_id`) REFERENCES `aircraft` (`id`),
  ADD CONSTRAINT `fk_flights_flight_nums_flight_num` FOREIGN KEY (`flight_num`) REFERENCES `flight_numbers` (`flight_num`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
