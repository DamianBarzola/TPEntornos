-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2020 a las 03:52:47
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pps`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `finalreport`
--

CREATE TABLE `finalreport` (
  `idFR` int(11) NOT NULL,
  `idPPS_FP` int(11) NOT NULL,
  `conclusiones` varchar(300) NOT NULL,
  `aprobadaFR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimientos`
--

CREATE TABLE `seguimientos` (
  `idSeguimientos` int(4) NOT NULL,
  `actividadesRealizadas` varchar(200) DEFAULT NULL,
  `actividadesProximas` varchar(200) DEFAULT NULL,
  `cuestionesPendientes` varchar(200) DEFAULT NULL,
  `experiencias` varchar(200) DEFAULT NULL,
  `hsTrabajadas` varchar(200) DEFAULT NULL,
  `TotalhsTrabajadas` varchar(200) DEFAULT NULL,
  `desvioCronograma` varchar(200) DEFAULT NULL,
  `id_PPS` int(4) NOT NULL,
  `aprobadoSeg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `idPPS` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_Profe` int(10) DEFAULT NULL,
  `caractPPS` varchar(40) NOT NULL,
  `nombreEntidad` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `localidad` varchar(20) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `emailE` varchar(30) NOT NULL,
  `contactoEntidad` varchar(20) NOT NULL,
  `PPSTerminada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `password` varchar(75) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tipo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `finalreport`
--
ALTER TABLE `finalreport`
  ADD PRIMARY KEY (`idFR`,`idPPS_FP`);

--
-- Indices de la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  ADD PRIMARY KEY (`idSeguimientos`,`id_PPS`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`idPPS`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `finalreport`
--
ALTER TABLE `finalreport`
  MODIFY `idFR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  MODIFY `idSeguimientos` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `idPPS` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
