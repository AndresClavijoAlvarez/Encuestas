-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-08-2011 a las 22:34:26
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `encuesta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificadores`
--

CREATE TABLE IF NOT EXISTS `calificadores` (
  `codigo` char(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `calificadores`
--

INSERT INTO `calificadores` (`codigo`, `nombre`, `ciudad`, `area`) VALUES
('1088260626', 'CAROLINA ALVAREZ', 'BOGOTA', 'ASESOR DE IMAGEN '),
('16205266', 'MARCOS PEREZ', 'BUCARAMANGA', 'ADMINISTRADOR'),
('4514479', 'JOSE ANTONIO AGUALIMPIA', 'PEREIRA', 'SOPORTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sugerencias`
--

CREATE TABLE IF NOT EXISTS `sugerencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `codigo` char(11) NOT NULL,
  `sugerencia` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `sugerencias`
--

INSERT INTO `sugerencias` (`id`, `fecha`, `codigo`, `sugerencia`) VALUES
(1, '2011-08-16', '4514479', 'Prueba 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votacion`
--

CREATE TABLE IF NOT EXISTS `votacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pregunta` int(11) NOT NULL,
  `respuesta` varchar(11) NOT NULL,
  `fecha` date NOT NULL,
  `codigo` char(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `votacion`
--

INSERT INTO `votacion` (`id`, `id_pregunta`, `respuesta`, `fecha`, `codigo`) VALUES
(1, 1, 'Regular', '2011-08-16', '4514479'),
(2, 2, 'Malo', '2011-08-16', '4514479'),
(3, 3, 'Regular', '2011-08-16', '4514479'),
(4, 4, 'Malo', '2011-08-16', '4514479');
