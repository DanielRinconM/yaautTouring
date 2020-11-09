-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2020 a las 03:07:58
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yaauttouringdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` mediumint(9) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidoPaterno` varchar(40) NOT NULL,
  `apellidoMaterno` varchar(40) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `telefono` char(10) NOT NULL,
  `correoElectronico` varchar(35) NOT NULL,
  `estado` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `fechaNacimiento`, `telefono`, `correoElectronico`, `estado`) VALUES
(117, 'Daniel', 'sanchez', 'apellido', '2020-11-18', '0987654321', 'correo@emilio.com', 'Chiapas'),
(118, 'emilo', 'Pruebaap1', 'apellido', '2020-11-24', '1234567890', 'correo@correo.com', 'Oaxaca'),
(119, 'dario', 'hfgj', 'apellido2', '2020-11-05', '1234567890', 'mail@mail.com', 'Veracruz'),
(120, 'dapo', 'sanchez', 'jdfg', '2020-12-03', '2378495643', 'elefante@correo', 'Sinaloa'),
(121, 'dapo', 'sanchez', 'jdfg', '2020-12-03', '2378495643', 'elefante@correo', 'Sinaloa'),
(122, 'dario', 'hfgj', 'apellido2', '2015-06-09', '0987654321', 'correo@emilio.com', 'Guanajuato'),
(123, 'dario', 'hfgj', 'apellido2', '2015-06-09', '0987654321', 'correo@emilio.com', 'Guanajuato'),
(124, 'baimovil', 'tanque', '2', '0000-00-00', '', '2020-11-04', '3'),
(125, 'baimovil', 'tanque', '2', '0000-00-00', '2020-11-02', '2020-11-04', '3'),
(126, 'baimovil', 'tanque', '2', '0000-00-00', '2020-11-02', '2020-11-04', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `idEvento` mediumint(9) NOT NULL,
  `nombreEvento` varchar(40) NOT NULL,
  `fechaInicio` time NOT NULL,
  `horaInicio` time NOT NULL,
  `fechaFinal` date NOT NULL,
  `horaFinal` date NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `banner` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL,
  `fechaUltimoPago` date NOT NULL,
  `idTransporte` mediumint(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencias`
--

CREATE TABLE `experiencias` (
  `idExperiencia` mediumint(9) NOT NULL,
  `descuento` float NOT NULL,
  `pagado` float NOT NULL,
  `idEvento` mediumint(9) NOT NULL,
  `idFase` mediumint(9) NOT NULL,
  `idCliente` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fases`
--

CREATE TABLE `fases` (
  `idFase` mediumint(9) NOT NULL,
  `numeroFase` char(1) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `precio` float NOT NULL,
  `fechaFinal` date NOT NULL,
  `idEvento` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `idPago` mediumint(9) NOT NULL,
  `monto` float NOT NULL,
  `método` varchar(10) NOT NULL,
  `fechaPago` date NOT NULL,
  `idExperiencia` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transportes`
--

CREATE TABLE `transportes` (
  `idTransporte` mediumint(9) NOT NULL,
  `nombreTransporte` varchar(40) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `capacidad` tinyint(4) NOT NULL,
  `nombreEmpresa` varchar(40) NOT NULL,
  `inicioPrestamo` date NOT NULL,
  `finPrestamo` date NOT NULL,
  `costo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `transportes`
--

INSERT INTO `transportes` (`idTransporte`, `nombreTransporte`, `tipo`, `capacidad`, `nombreEmpresa`, `inicioPrestamo`, `finPrestamo`, `costo`) VALUES
(1, 'baimovil', 'tanque', 2, 'wayne enterprises', '2020-11-02', '2020-11-04', 3),
(2, 'baimovil', 'tanque', 2, 'wayne enterprises', '2020-11-02', '2020-11-04', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`idEvento`),
  ADD KEY `idTransporte` (`idTransporte`);

--
-- Indices de la tabla `experiencias`
--
ALTER TABLE `experiencias`
  ADD PRIMARY KEY (`idExperiencia`),
  ADD KEY `idEvento` (`idEvento`),
  ADD KEY `idFase` (`idFase`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `fases`
--
ALTER TABLE `fases`
  ADD PRIMARY KEY (`idFase`),
  ADD KEY `idEvento` (`idEvento`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idPago`),
  ADD KEY `idExperiencia` (`idExperiencia`);

--
-- Indices de la tabla `transportes`
--
ALTER TABLE `transportes`
  ADD PRIMARY KEY (`idTransporte`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `idEvento` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `experiencias`
--
ALTER TABLE `experiencias`
  MODIFY `idExperiencia` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fases`
--
ALTER TABLE `fases`
  MODIFY `idFase` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `idPago` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `transportes`
--
ALTER TABLE `transportes`
  MODIFY `idTransporte` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`idTransporte`) REFERENCES `transportes` (`idTransporte`);

--
-- Filtros para la tabla `experiencias`
--
ALTER TABLE `experiencias`
  ADD CONSTRAINT `experiencias_ibfk_1` FOREIGN KEY (`idEvento`) REFERENCES `eventos` (`idEvento`),
  ADD CONSTRAINT `experiencias_ibfk_2` FOREIGN KEY (`idFase`) REFERENCES `fases` (`idFase`),
  ADD CONSTRAINT `experiencias_ibfk_3` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`);

--
-- Filtros para la tabla `fases`
--
ALTER TABLE `fases`
  ADD CONSTRAINT `fases_ibfk_1` FOREIGN KEY (`idEvento`) REFERENCES `eventos` (`idEvento`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`idExperiencia`) REFERENCES `experiencias` (`idExperiencia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
