-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-03-2024 a las 04:37:55
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bella`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `ID` int(11) NOT NULL,
  `Usuario` varchar(50) NOT NULL DEFAULT '',
  `Contraseña` varchar(500) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`ID`, `Usuario`, `Contraseña`) VALUES
(1, 'Juan123', '$2y$10$iPK0OX6V5UJrPNFGKyv8FuPUY/cG8Tf5LyiZrMLhT1MInblrYK76G');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `SKU` int(11) NOT NULL,
  `Nombre` varchar(500) NOT NULL DEFAULT '',
  `Descripcion` varchar(500) NOT NULL DEFAULT '',
  `Existencias` int(11) NOT NULL DEFAULT 0,
  `Precio` int(11) NOT NULL DEFAULT 0,
  `Descuento` int(11) NOT NULL DEFAULT 0,
  `Imagen` varchar(500) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`SKU`, `Nombre`, `Descripcion`, `Existencias`, `Precio`, `Descuento`, `Imagen`) VALUES
(1, 'Playera 1', '..................', 40, 152, 0, 'imagenes/Playera 1.jpg'),
(2, 'Playera 2', '..................', 40, 152, 0, 'imagenes/Playera 2.jpg'),
(3, 'Playera 3', '..................', 40, 152, 0, 'imagenes/Playera 3.jpg'),
(4, 'Playera 4', '..................', 40, 152, 0, 'imagenes/Playera 4.jpg'),
(5, 'Playera 5', '..................', 40, 152, 0, 'imagenes/Playera 5.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`SKU`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `SKU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
