-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-12-2015 a las 18:19:26
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cienanuncios`
--
CREATE DATABASE IF NOT EXISTS `cienanuncios` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cienanuncios`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE IF NOT EXISTS `anuncios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) NOT NULL,
  `texto` text NOT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `usuario` varchar(10) NOT NULL,
  `fechaPublicacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id`, `titulo`, `texto`, `imagen`, `usuario`, `fechaPublicacion`) VALUES
(13, 'APPLE - IPAD AIR - 4G/LTE 64 GB', 'APPLE - IPAD AIR 64 GB IPad Air 64 GB Wifi + 4G/LTE Gris Espacial. Modelo MF009LL/A. En perfecto estado, si un rasguño, siempre con funda. Se regala Funda Targus. 64 GB de memoria. 64 GB de memoria ', '12345678ipad.jpg', 'alice', '2015-11-20 12:55:22'),
(14, 'VACANTES AGENTE DE SEGUROS EN CARMONA', 'Importante empresa del sector asegurador amplía u plantilla en la zona de carmona. se trata de un trabajo estable ya que ofrecemos sueldo fijo más comisiones. envianos tu curriculum a posiblescandidatos2015 @hotmail. com y tendrás la oportunidad de ser entrevistado por el responsable de la zona para poder aclarar todas tus dudas sobre este tipo de trabajo. solo necesitas coche propio y carné y graduado escolar o similar. de la formación nos encargamos nosotros, tu solo tienes que ponerle ganas.', NULL, 'bob', '2015-12-07 12:56:11'),
(15, 'VOLVO - S60 1. 6 DRIVE MOMENTUM', 'VOLVO S60 1. 6 DRIVe Momentum Diesel, en Alicante, con 83000 km. Volvo s60 momentum 1. 6 diesel, Año 2011, 83. 000km, muy buen estado. ', '13579246volvo.jpg', 'bob', '2015-12-09 12:57:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('alice', '6384e2b2184bcbf58eccf10ca7a6563c'),
('bob', '9f9d51bc70ef21ca5c14f307980a29d8');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
