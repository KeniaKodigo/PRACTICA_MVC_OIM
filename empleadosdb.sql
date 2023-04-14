-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2023 a las 04:25:19
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empleadosdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `IdPais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`Id`, `Nombre`, `IdPais`) VALUES
(1, 'San Salvador', 1),
(2, 'Chalatenango', 1),
(3, 'San Miguel', 1),
(4, 'Tegucigalpa', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `Id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `telefono` int(8) NOT NULL,
  `edad` int(3) NOT NULL,
  `idDepartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`Id`, `nombre`, `correo`, `telefono`, `edad`, `idDepartamento`) VALUES
(1, 'Kenia Paiz', 'kenia@gmail.com', 75201452, 24, 1),
(2, 'Rodrigo Grande', 'rodrigo@gmail.com', 60251784, 30, 1),
(3, 'Maria Jose Chacon', 'mariajose@gmail.com', 60127845, 25, 4),
(4, 'Diana Chavez', 'diana@gmail.com', 78451025, 27, 3),
(5, 'Diego Ricardo Sandoval', 'diego@gmail.com', 78412369, 35, 2),
(6, 'Luis panameño', 'panameño@gmail.com', 6215478, 40, 4),
(7, 'Karla Alejandra Reyes', 'karla@gmail.com', 76543278, 23, 3),
(8, 'Maria Carmen', 'mari@gmail.com', 75032953, 20, 4),
(9, 'Bryand Hernandez', 'brayan@gmail.com', 4125789, 35, 2),
(10, 'Carolina Menjivar', 'caro@gmail.com', 657841, 32, 3),
(20, 'Licuadora -KENIA PAIZ', 'ignacio@gmail.com', 75502063, 154, 2),
(21, 'prueba 2258', 'kenia@gmail.com', 75032953, 14, 3),
(22, 'prueba4785 - :)', 'mari@gmail.com', 75896347, 125, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`Id`, `Nombre`) VALUES
(1, 'El Salvador'),
(2, 'Honduras'),
(3, 'Guatemala'),
(4, 'Nicaragua');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_idpais` (`IdPais`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_idDepartamento` (`idDepartamento`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
