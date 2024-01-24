-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Temps de generació: 28-01-2021 a les 15:48:18
-- Versió del servidor: 8.0.22-0ubuntu0.20.04.3
-- Versió de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `mascotasclinic`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `lineas_de_historial`
--

CREATE TABLE `lineas_de_historial` (
  `id` int NOT NULL,
  `idmascota` int NOT NULL,
  `fecha` date NOT NULL,
  `motivo_visita` varchar(300) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Bolcament de dades per a la taula `lineas_de_historial`
--

INSERT INTO `lineas_de_historial` (`id`, `idmascota`, `fecha`, `motivo_visita`, `descripcion`) VALUES
(1, 2, '2020-12-20', 'Para acariciar al gatito.', NULL),
(2, 1, '2020-04-20', 'Para jugar con el perrito.', NULL),
(3, 3, '2020-05-20', 'Para acariciar al segundo gatito.', NULL),
(4, 2, '2020-08-20', 'Para acariciar al primer gatito otra vez.', NULL),
(5, 1, '2021-01-28', 'cojea', 'clavo clavado en la patita'),
(6, 3, '2021-01-28', 'motivo1', 'descripción 1'),
(7, 1, '2021-01-01', 'motivo2', 'descripción 3'),
(8, 1, '2021-01-01', 'motivo3', 'descripción 4'),
(9, 3, '2021-01-01', 'motivo4', 'descripción 5');

-- --------------------------------------------------------

--
-- Estructura de la taula `mascotas`
--

CREATE TABLE `mascotas` (
  `id` int NOT NULL,
  `nifpropietario` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Bolcament de dades per a la taula `mascotas`
--

INSERT INTO `mascotas` (`id`, `nifpropietario`, `nom`) VALUES
(1, '02258461E', 'Doggyy'),
(2, '01685047K', 'Caty'),
(3, '01685047K', 'Catty');

-- --------------------------------------------------------

--
-- Estructura de la taula `propietarios`
--

CREATE TABLE `propietarios` (
  `nif` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `movil` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Bolcament de dades per a la taula `propietarios`
--

INSERT INTO `propietarios` (`nif`, `nom`, `email`, `movil`) VALUES
('01685047K', 'Maria', 'maria1@mail.com', '222222222'),
('02258461E', 'Mario', 'mario1@mail.com', '111111112');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `lineas_de_historial`
--
ALTER TABLE `lineas_de_historial`
  ADD PRIMARY KEY (`id`,`idmascota`),
  ADD KEY `idmascota` (`idmascota`);

--
-- Índexs per a la taula `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id`,`nifpropietario`),
  ADD KEY `nifpropietario` (`nifpropietario`);

--
-- Índexs per a la taula `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`nif`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `lineas_de_historial`
--
ALTER TABLE `lineas_de_historial`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la taula `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `lineas_de_historial`
--
ALTER TABLE `lineas_de_historial`
  ADD CONSTRAINT `lineas_de_historial_ibfk_1` FOREIGN KEY (`idmascota`) REFERENCES `mascotas` (`id`);

--
-- Restriccions per a la taula `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascotas_ibfk_1` FOREIGN KEY (`nifpropietario`) REFERENCES `propietarios` (`nif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
