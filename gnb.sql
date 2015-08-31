-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2015 a las 05:04:58
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gnb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
`id` int(1) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `p_secreta` varchar(45) DEFAULT NULL,
  `r_secreta` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `armas`
--

CREATE TABLE IF NOT EXISTS `armas` (
`id` int(3) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `calibre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `armas_exp`
--

CREATE TABLE IF NOT EXISTS `armas_exp` (
  `arma` int(3) DEFAULT NULL,
  `cantidad` int(3) DEFAULT NULL,
  `expediente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drogas`
--

CREATE TABLE IF NOT EXISTS `drogas` (
`id` int(3) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drogas_exp`
--

CREATE TABLE IF NOT EXISTS `drogas_exp` (
  `droga` int(3) DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `expediente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE IF NOT EXISTS `expediente` (
`id` int(11) NOT NULL,
  `fecha_informe` datetime DEFAULT NULL,
  `funcionario` int(2) DEFAULT NULL,
  `lugar_suceso` varchar(100) DEFAULT NULL,
  `fecha_suceso` date DEFAULT NULL,
  `materiales` varchar(45) DEFAULT NULL,
  `consumibles` varchar(45) DEFAULT NULL,
  `combustibles` varchar(45) DEFAULT NULL,
  `descripcion_exp` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionarios`
--

CREATE TABLE IF NOT EXISTS `funcionarios` (
`id` int(2) NOT NULL,
  `nombres` tinytext,
  `apellidos` tinytext,
  `rango` varchar(25) DEFAULT NULL,
  `estatus` tinytext,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `p_secreta` varchar(45) DEFAULT NULL,
  `r_secreta` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `cedula` int(8) NOT NULL,
  `nombre` tinytext,
  `apellidos` tinytext,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` tinytext,
  `foto` varchar(8) DEFAULT NULL,
  `alias` varchar(20) DEFAULT NULL,
  `ocupacion` varchar(45) DEFAULT NULL,
  `nacionalidad` tinytext,
  `lugar_nacimiento` varchar(45) DEFAULT NULL,
  `estado_civil` tinytext,
  `descripcion` varchar(200) DEFAULT NULL,
  `direcciones` varchar(200) DEFAULT NULL,
  `antecedentes` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas_exp`
--

CREATE TABLE IF NOT EXISTS `personas_exp` (
  `persona` int(8) DEFAULT NULL,
  `expediente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE IF NOT EXISTS `vehiculo` (
`id` int(3) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `modelo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos_exp`
--

CREATE TABLE IF NOT EXISTS `vehiculos_exp` (
  `vehiculo` int(3) DEFAULT NULL,
  `cantidad` int(3) DEFAULT NULL,
  `serial_vehiculo` varchar(20) DEFAULT NULL,
  `anio` varchar(4) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `placa` varchar(8) DEFAULT NULL,
  `expediente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `armas`
--
ALTER TABLE `armas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `armas_exp`
--
ALTER TABLE `armas_exp`
 ADD KEY `arma` (`arma`), ADD KEY `expediente` (`expediente`);

--
-- Indices de la tabla `drogas`
--
ALTER TABLE `drogas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `drogas_exp`
--
ALTER TABLE `drogas_exp`
 ADD KEY `droga` (`droga`), ADD KEY `expediente` (`expediente`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
 ADD PRIMARY KEY (`id`), ADD KEY `funcionario` (`funcionario`);

--
-- Indices de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
 ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `personas_exp`
--
ALTER TABLE `personas_exp`
 ADD KEY `persona` (`persona`), ADD KEY `expediente` (`expediente`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos_exp`
--
ALTER TABLE `vehiculos_exp`
 ADD KEY `vehiculo` (`vehiculo`), ADD KEY `expediente` (`expediente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `armas`
--
ALTER TABLE `armas`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `drogas`
--
ALTER TABLE `drogas`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `armas_exp`
--
ALTER TABLE `armas_exp`
ADD CONSTRAINT `armas_exp_ibfk_1` FOREIGN KEY (`arma`) REFERENCES `armas` (`id`),
ADD CONSTRAINT `armas_exp_ibfk_2` FOREIGN KEY (`expediente`) REFERENCES `expediente` (`id`);

--
-- Filtros para la tabla `drogas_exp`
--
ALTER TABLE `drogas_exp`
ADD CONSTRAINT `drogas_exp_ibfk_1` FOREIGN KEY (`droga`) REFERENCES `drogas` (`id`),
ADD CONSTRAINT `drogas_exp_ibfk_2` FOREIGN KEY (`expediente`) REFERENCES `expediente` (`id`);

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
ADD CONSTRAINT `expediente_ibfk_1` FOREIGN KEY (`funcionario`) REFERENCES `funcionarios` (`id`);

--
-- Filtros para la tabla `personas_exp`
--
ALTER TABLE `personas_exp`
ADD CONSTRAINT `personas_exp_ibfk_1` FOREIGN KEY (`persona`) REFERENCES `personas` (`cedula`),
ADD CONSTRAINT `personas_exp_ibfk_2` FOREIGN KEY (`expediente`) REFERENCES `expediente` (`id`);

--
-- Filtros para la tabla `vehiculos_exp`
--
ALTER TABLE `vehiculos_exp`
ADD CONSTRAINT `vehiculos_exp_ibfk_1` FOREIGN KEY (`vehiculo`) REFERENCES `vehiculo` (`id`),
ADD CONSTRAINT `vehiculos_exp_ibfk_2` FOREIGN KEY (`expediente`) REFERENCES `expediente` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
