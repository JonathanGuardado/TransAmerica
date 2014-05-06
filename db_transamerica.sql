-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-05-2014 a las 22:55:16
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_transamerica`
--
CREATE DATABASE IF NOT EXISTS `db_transamerica` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_transamerica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(300) NOT NULL,
  `nombre_contacto` varchar(450) NOT NULL,
  `telefono_contacto` varchar(16) NOT NULL,
  `tarifa` float NOT NULL,
  `fecha_ingreso` date NOT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE IF NOT EXISTS `conductor` (
  `idconductor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_conductor` varchar(150) NOT NULL,
  `apellido_conductor` varchar(150) NOT NULL,
  `dui` varchar(10) NOT NULL,
  `nit` varchar(17) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_ingreso_cond` date NOT NULL,
  `fecha_fin_cond` date NOT NULL,
  `estado_conductor` varchar(45) NOT NULL,
  PRIMARY KEY (`idconductor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenedor`
--

CREATE TABLE IF NOT EXISTS `contenedor` (
  `idcontenedor` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(500) NOT NULL,
  `tipo_contenedor` varchar(200) NOT NULL,
  PRIMARY KEY (`idcontenedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flota`
--

CREATE TABLE IF NOT EXISTS `flota` (
  `idflota` int(11) NOT NULL AUTO_INCREMENT,
  `chasis` varchar(7) NOT NULL,
  `idconductor` int(11) NOT NULL,
  `idcontenedor` int(11) NOT NULL,
  PRIMARY KEY (`idflota`,`idconductor`,`idcontenedor`),
  KEY `fk_flota_conductor1_idx` (`idconductor`),
  KEY `fk_flota_contenedor1_idx` (`idcontenedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llanta`
--

CREATE TABLE IF NOT EXISTS `llanta` (
  `idllanta` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_llanta` varchar(150) NOT NULL,
  `serie_llanta` varchar(6) NOT NULL,
  `ubicacion_llanta` varchar(45) NOT NULL,
  `tamanio_llanta` float NOT NULL,
  `marca_llanta` varchar(45) NOT NULL,
  `estado_llanta` varchar(45) NOT NULL,
  `fecha_compra` date NOT NULL,
  `fecha_desecho` date NOT NULL,
  `idflota` int(11) NOT NULL,
  PRIMARY KEY (`idllanta`,`idflota`),
  KEY `fk_llanta_flota1_idx` (`idflota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE IF NOT EXISTS `mantenimiento` (
  `idmantenimiento` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_mantenimiento` date NOT NULL,
  `descripcion_mtto` varchar(200) NOT NULL,
  `idllanta` int(11) NOT NULL,
  PRIMARY KEY (`idmantenimiento`,`idllanta`),
  KEY `fk_mantenimiento_llanta1_idx` (`idllanta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE IF NOT EXISTS `ruta` (
  `id_ruta` int(11) NOT NULL AUTO_INCREMENT,
  `origen_ruta` varchar(200) NOT NULL,
  `destino_ruta` varchar(200) NOT NULL,
  `tiempo_estimado` time NOT NULL,
  `distancia_km` float NOT NULL,
  `gasolina_estimada` float NOT NULL,
  PRIMARY KEY (`id_ruta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(150) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `fecha_ingreso_user` date NOT NULL,
  `estado_user` varchar(45) NOT NULL,
  `nivel_privilegio` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre_usuario`, `usuario`, `clave`, `fecha_ingreso_user`, `estado_user`, `nivel_privilegio`) VALUES
(1, 'Administrador', 'admin', 'fbc71ce36cc20790f2eeed2197898e71', '2014-05-06', 'T', '1'),
(2, 'Gerente', 'gerente', 'fbc71ce36cc20790f2eeed2197898e71', '2014-05-06', 'T', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE IF NOT EXISTS `viaje` (
  `idviaje` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_viaje` date NOT NULL,
  `tipo_viaje` varchar(100) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idflota` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  PRIMARY KEY (`idviaje`,`idcliente`,`idflota`,`id_ruta`),
  KEY `fk_viaje_cliente_idx` (`idcliente`),
  KEY `fk_viaje_flota1_idx` (`idflota`),
  KEY `fk_viaje_ruta1_idx` (`id_ruta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `flota`
--
ALTER TABLE `flota`
  ADD CONSTRAINT `fk_flota_conductor1` FOREIGN KEY (`idconductor`) REFERENCES `conductor` (`idconductor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_flota_contenedor1` FOREIGN KEY (`idcontenedor`) REFERENCES `contenedor` (`idcontenedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `llanta`
--
ALTER TABLE `llanta`
  ADD CONSTRAINT `fk_llanta_flota1` FOREIGN KEY (`idflota`) REFERENCES `flota` (`idflota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `fk_mantenimiento_llanta1` FOREIGN KEY (`idllanta`) REFERENCES `llanta` (`idllanta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `fk_viaje_cliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_viaje_flota1` FOREIGN KEY (`idflota`) REFERENCES `flota` (`idflota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_viaje_ruta1` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
