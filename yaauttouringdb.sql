-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 11, 2020 at 07:34 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yaauttouringdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
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
-- Dumping data for table `clientes`
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
(126, 'baimovil', 'tanque', '2', '0000-00-00', '2020-11-02', '2020-11-04', '3'),
(127, 'test', 'Test', 'test', '2020-10-26', '534535', 'test@test.com', 'Aguascalientes'),
(128, 'Hola', 'Mundo', 'BD', '2020-11-01', '4424785586', 'emilio@test.com', 'Baja California Sur'),
(129, 'Juan', 'Pitas', 'Pitas', '1996-07-08', '12', 'emilio@test.com', 'Aguascalientes');

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `idEvento` mediumint(9) NOT NULL,
  `nombreEvento` varchar(40) NOT NULL,
  `fechaInicio` date NOT NULL,
  `horaInicio` time NOT NULL,
  `fechaFinal` date NOT NULL,
  `horaFinal` time NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `banner` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL,
  `fechaUltimoPago` date NOT NULL,
  `idTransporte` mediumint(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`idEvento`, `nombreEvento`, `fechaInicio`, `horaInicio`, `fechaFinal`, `horaFinal`, `lugar`, `tipo`, `banner`, `status`, `fechaUltimoPago`, `idTransporte`) VALUES
(1, 'EDC', '2020-11-10', '11:01:00', '2020-11-11', '02:02:00', 'tes', 'Pueblo Magico', '/this.jpg', 'Proximo', '2020-11-18', NULL),
(2, '2', '0022-02-22', '02:22:00', '0002-02-22', '02:02:00', '2', 'Pueblo Magico', '21', 'Proximo', '2020-11-10', NULL),
(3, 'Concierto Filarmonica', '2020-11-12', '23:01:00', '2020-11-12', '00:01:00', 'Centro Queretaro', 'Pueblo Magico', 'imagen.jpg', 'Proximo', '2020-11-12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `experiencias`
--

CREATE TABLE `experiencias` (
  `idExperiencia` mediumint(9) NOT NULL,
  `descuento` float NOT NULL,
  `pagado` float NOT NULL,
  `idEvento` mediumint(9) NOT NULL,
  `idFase` mediumint(9) NOT NULL,
  `idCliente` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `experiencias`
--

INSERT INTO `experiencias` (`idExperiencia`, `descuento`, `pagado`, `idEvento`, `idFase`, `idCliente`) VALUES
(1, 1, 0, 1, 10, 117),
(2, 1, 0, 1, 10, 126),
(3, 15, 0, 1, 10, 128);

-- --------------------------------------------------------

--
-- Table structure for table `fases`
--

CREATE TABLE `fases` (
  `idFase` mediumint(9) NOT NULL,
  `numeroFase` char(1) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `precio` float NOT NULL,
  `fechaFinal` date NOT NULL,
  `idEvento` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fases`
--

INSERT INTO `fases` (`idFase`, `numeroFase`, `nombre`, `precio`, `fechaFinal`, `idEvento`) VALUES
(10, '1', 'Primera', 100, '2020-11-11', 1),
(11, '2', 'Segunda', 200, '2020-11-11', 1),
(12, '3', 'Tercera', 300, '2020-11-11', 1),
(13, '1', 'Primera', 1000, '2020-11-11', 2),
(14, '2', 'Segunda', 2000, '2020-11-12', 2),
(15, '1', 'Primera A', 4000, '2020-11-10', 3),
(16, '3', 'Fase 1.1', 200, '2020-11-11', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE `pagos` (
  `idPago` mediumint(9) NOT NULL,
  `monto` float NOT NULL,
  `método` varchar(10) NOT NULL,
  `fechaPago` date NOT NULL,
  `idExperiencia` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pagos`
--

INSERT INTO `pagos` (`idPago`, `monto`, `método`, `fechaPago`, `idExperiencia`) VALUES
(1, 100, 'credito', '2020-11-11', 1),
(2, 100, 'credito', '2020-11-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prueba`
--

CREATE TABLE `prueba` (
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prueba`
--

INSERT INTO `prueba` (`nombre`, `apellido`) VALUES
('Juanito', ''),
('Benito', 'Cam'),
('Benito', 'Cam');

-- --------------------------------------------------------

--
-- Table structure for table `transportes`
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
-- Dumping data for table `transportes`
--

INSERT INTO `transportes` (`idTransporte`, `nombreTransporte`, `tipo`, `capacidad`, `nombreEmpresa`, `inicioPrestamo`, `finPrestamo`, `costo`) VALUES
(1, 'baimovil', 'tanque', 2, 'wayne enterprises', '2020-11-02', '2020-11-04', 3),
(2, 'baimovil', 'tanque', 2, 'wayne enterprises', '2020-11-02', '2020-11-04', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`idEvento`),
  ADD KEY `idTransporte` (`idTransporte`);

--
-- Indexes for table `experiencias`
--
ALTER TABLE `experiencias`
  ADD PRIMARY KEY (`idExperiencia`),
  ADD KEY `idEvento` (`idEvento`),
  ADD KEY `idFase` (`idFase`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indexes for table `fases`
--
ALTER TABLE `fases`
  ADD PRIMARY KEY (`idFase`),
  ADD KEY `idEvento` (`idEvento`);

--
-- Indexes for table `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idPago`),
  ADD KEY `idExperiencia` (`idExperiencia`);

--
-- Indexes for table `transportes`
--
ALTER TABLE `transportes`
  ADD PRIMARY KEY (`idTransporte`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `idEvento` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `experiencias`
--
ALTER TABLE `experiencias`
  MODIFY `idExperiencia` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fases`
--
ALTER TABLE `fases`
  MODIFY `idFase` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pagos`
--
ALTER TABLE `pagos`
  MODIFY `idPago` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transportes`
--
ALTER TABLE `transportes`
  MODIFY `idTransporte` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`idTransporte`) REFERENCES `transportes` (`idTransporte`);

--
-- Constraints for table `experiencias`
--
ALTER TABLE `experiencias`
  ADD CONSTRAINT `experiencias_ibfk_1` FOREIGN KEY (`idEvento`) REFERENCES `eventos` (`idEvento`),
  ADD CONSTRAINT `experiencias_ibfk_2` FOREIGN KEY (`idFase`) REFERENCES `fases` (`idFase`),
  ADD CONSTRAINT `experiencias_ibfk_3` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`);

--
-- Constraints for table `fases`
--
ALTER TABLE `fases`
  ADD CONSTRAINT `fases_ibfk_1` FOREIGN KEY (`idEvento`) REFERENCES `eventos` (`idEvento`);

--
-- Constraints for table `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`idExperiencia`) REFERENCES `experiencias` (`idExperiencia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
