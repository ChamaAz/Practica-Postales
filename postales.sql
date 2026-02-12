-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-02-2026 a las 01:04:29
-- Versión del servidor: 8.0.44-0ubuntu0.22.04.2
-- Versión de PHP: 8.1.2-1ubuntu2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `postales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `nombreCliente` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `apellidosCliente` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `codigoPostal` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `fechaNacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`nombreCliente`, `apellidosCliente`, `direccion`, `codigoPostal`, `email`, `fechaNacimiento`) VALUES
('chaimae', 'azougagh el aoudati', 'C/Mariana Pineda, 2D, bajo B, madrid', '45300', 'chaimae@scarlatti.com', '1997-09-16'),
('mourad ', 'el mourabit Azougagh', 'C/Mariana Pineda, 2D, bajo B, madrid', '45300', 'mourad@scarlatti.com', '2010-07-27'),
('luis', 'gomez ramirez', 'C/Gran Via, 15, 3A, Madrid', '28013', 'luis.gomez@scarlatti.com', '1985-04-22'),
('marta', 'fernandez lopez', 'Av. de America, 42, 1B, Madrid', '28028', 'marta.fernandez@scarlatti.com', '1992-11-10'),
('carlos', 'sanchez torres', 'C/Paseo de la Castellana, 10, 5C, Madrid', '28046', 'carlos.sanchez@scarlatti.com', '1978-02-14'),
('ana', 'martin ruiz', 'C/Fuencarral, 88, 2D, Madrid', '28004', 'ana.martin@scarlatti.com', '2000-06-05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
