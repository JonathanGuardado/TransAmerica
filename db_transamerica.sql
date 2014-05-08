-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-05-2014 a las 17:35:30
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
CREATE DATABASE IF NOT EXISTS `db_transamerica` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_transamerica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabezal`
--

CREATE TABLE IF NOT EXISTS `cabezal` (
  `idcabezal` int(11) NOT NULL AUTO_INCREMENT,
  `identificador` int(11) NOT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `kilometraje_actual` float DEFAULT NULL,
  `estado_cabezal` varchar(1) NOT NULL,
  PRIMARY KEY (`idcabezal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cabezal`
--

INSERT INTO `cabezal` (`idcabezal`, `identificador`, `marca`, `kilometraje_actual`, `estado_cabezal`) VALUES
(1, 1, 'mercedez', 1234, ''),
(2, 0, '0', 0, 'T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chasis`
--

CREATE TABLE IF NOT EXISTS `chasis` (
  `idchasis` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado_chasis` varchar(1) NOT NULL,
  PRIMARY KEY (`idchasis`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `chasis`
--

INSERT INTO `chasis` (`idchasis`, `placa`, `marca`, `descripcion`, `estado_chasis`) VALUES
(1, 'mercerdez', 'mercedez', 'color rojo a?o 2000', 'T'),
(2, 'A', NULL, 'chasis1', 'T'),
(3, 'A', NULL, 'chasis2', 'T'),
(4, 'A', NULL, 'chasis3', 'T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(300) NOT NULL,
  `nombre_contacto` varchar(450) DEFAULT NULL,
  `telefono_contacto` varchar(16) NOT NULL,
  `tarifa` float NOT NULL,
  `fecha_ingreso_cliente` date DEFAULT NULL,
  `estado_cliente` varchar(1) NOT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nombre_empresa`, `nombre_contacto`, `telefono_contacto`, `tarifa`, `fecha_ingreso_cliente`, `estado_cliente`) VALUES
(1, 'Siman', 'jose', '23', 12.5, '2014-05-04', ''),
(2, 'tigo', 'torrea', '12345678', 12.98, '2014-05-08', '');

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
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_ingreso_cond` date NOT NULL,
  `fecha_fin_cond` date DEFAULT NULL,
  `estado_conductor` varchar(45) NOT NULL,
  PRIMARY KEY (`idconductor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`idconductor`, `nombre_conductor`, `apellido_conductor`, `dui`, `nit`, `fecha_nacimiento`, `fecha_ingreso_cond`, `fecha_fin_cond`, `estado_conductor`) VALUES
(1, 'xfsdfsdf', 't', '111', '119', '2014-05-07', '2014-05-07', NULL, 't'),
(2, 'Ever', 'Orellana', '1111111', '1111111', '2014-05-07', '2014-05-08', NULL, 'T'),
(3, 'Carlossss', 'Torresss', '1234567-8', '123456789-123', '2014-05-07', '2014-05-08', NULL, 'T'),
(4, 'Alex', 'Marroquin', '111111111', '123456-5421', '1992-04-16', '2014-05-08', NULL, 'T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenedor`
--

CREATE TABLE IF NOT EXISTS `contenedor` (
  `idcontenedor` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_contenedor` varchar(500) NOT NULL,
  `tipo_contenedor` varchar(200) DEFAULT NULL,
  `estado_contenedor` varchar(1) NOT NULL,
  PRIMARY KEY (`idcontenedor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `contenedor`
--

INSERT INTO `contenedor` (`idcontenedor`, `descripcion_contenedor`, `tipo_contenedor`, `estado_contenedor`) VALUES
(1, 'carga de camisa', 'ropa', 'T'),
(2, 'carga de camisasss', 'A', ''),
(3, 'carga de camisasss', 'A', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flota`
--

CREATE TABLE IF NOT EXISTS `flota` (
  `idflota` int(11) NOT NULL AUTO_INCREMENT,
  `idchasis` int(11) DEFAULT NULL,
  `idcontenedor` int(11) DEFAULT NULL,
  `idcabezal` int(11) DEFAULT NULL,
  `idconductor` int(11) DEFAULT NULL,
  PRIMARY KEY (`idflota`),
  KEY `FK_REFERENCE_14` (`idconductor`),
  KEY `FK_RELATIONSHIP_5` (`idchasis`),
  KEY `FK_RELATIONSHIP_6` (`idcabezal`),
  KEY `FK_RELATIONSHIP_7` (`idcontenedor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `flota`
--

INSERT INTO `flota` (`idflota`, `idchasis`, `idcontenedor`, `idcabezal`, `idconductor`) VALUES
(1, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flota_llanta`
--

CREATE TABLE IF NOT EXISTS `flota_llanta` (
  `idflotallanta` int(11) NOT NULL AUTO_INCREMENT,
  `idflota` int(11) DEFAULT NULL,
  `idllanta` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idflotallanta`),
  KEY `FK_RELATIONSHIP_16` (`idflota`),
  KEY `FK_RELATIONSHIP_17` (`idllanta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llanta`
--

CREATE TABLE IF NOT EXISTS `llanta` (
  `idllanta` varchar(15) NOT NULL,
  `descripcion_llanta` varchar(150) NOT NULL,
  `serie_llanta` varchar(6) NOT NULL,
  `ubicacion_llanta` varchar(45) NOT NULL,
  `tamanio_llanta` float NOT NULL,
  `marca_llanta` varchar(45) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_unitario` float DEFAULT NULL,
  `iva` float NOT NULL,
  `total_compra` float NOT NULL,
  `estado_llanta` varchar(45) NOT NULL,
  `fecha_asignacion` date DEFAULT NULL,
  `fecha_compra` date NOT NULL,
  `fecha_desecho` date DEFAULT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_reencauche` int(11) NOT NULL,
  PRIMARY KEY (`idllanta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `llanta`
--

INSERT INTO `llanta` (`idllanta`, `descripcion_llanta`, `serie_llanta`, `ubicacion_llanta`, `tamanio_llanta`, `marca_llanta`, `cantidad`, `precio_unitario`, `iva`, `total_compra`, `estado_llanta`, `fecha_asignacion`, `fecha_compra`, `fecha_desecho`, `id_proveedor`, `id_reencauche`) VALUES
('', '', 'abc', '', 13, '123sdf', NULL, NULL, 0, 0, 'sdfs', NULL, '2014-05-07', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE IF NOT EXISTS `lugar` (
  `idlugar` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idlugar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`idlugar`, `nombre`) VALUES
(1, 'Guatemala'),
(2, 'El Salvador'),
(3, 'Costa Rica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE IF NOT EXISTS `mantenimiento` (
  `idmantenimiento` int(11) NOT NULL AUTO_INCREMENT,
  `idllanta` varchar(15) DEFAULT NULL,
  `fecha_mantenimiento` date NOT NULL,
  `descripcion_mtto` varchar(200) NOT NULL,
  PRIMARY KEY (`idmantenimiento`),
  KEY `FK_RELATIONSHIP_8` (`idllanta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE IF NOT EXISTS `opciones` (
  `idopcion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_opcion` varchar(45) NOT NULL,
  `idtipousuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idopcion`),
  KEY `FK_RELATIONSHIP_18` (`idtipousuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_llanta`
--

CREATE TABLE IF NOT EXISTS `proveedor_llanta` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_proveedor` varchar(400) DEFAULT NULL,
  `direccion_proveedor` varchar(200) DEFAULT NULL,
  `telefono_proveedor` varchar(15) DEFAULT NULL,
  `estado_proveedor` varchar(1) NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reencauche`
--

CREATE TABLE IF NOT EXISTS `reencauche` (
  `id_reencauche` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_reencauche` date NOT NULL,
  `lugar_reencauche` varchar(200) NOT NULL,
  `total_reencauche` float NOT NULL,
  `observaciones_re` varchar(300) NOT NULL,
  PRIMARY KEY (`id_reencauche`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE IF NOT EXISTS `ruta` (
  `id_ruta` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) NOT NULL,
  `tiempo_estimado` time NOT NULL,
  `distancia_km` float NOT NULL,
  `gasolina_estimada` float NOT NULL,
  PRIMARY KEY (`id_ruta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`id_ruta`, `descripcion`, `tiempo_estimado`, `distancia_km`, `gasolina_estimada`) VALUES
(1, 'guate to el salvador', '72:00:00', 300, 50),
(2, 'el salvador to costa', '48:00:00', 200, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta_lugar`
--

CREATE TABLE IF NOT EXISTS `ruta_lugar` (
  `idrutalugar` int(11) NOT NULL AUTO_INCREMENT,
  `idlugar` int(11) DEFAULT NULL,
  `id_ruta` int(11) DEFAULT NULL,
  `opcionruta` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idrutalugar`),
  KEY `FK_RELATIONSHIP_14` (`id_ruta`),
  KEY `FK_RELATIONSHIP_15` (`idlugar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `ruta_lugar`
--

INSERT INTO `ruta_lugar` (`idrutalugar`, `idlugar`, `id_ruta`, `opcionruta`) VALUES
(1, 1, 1, 'O'),
(2, 2, 1, 'D'),
(3, 2, 2, 'O'),
(4, 3, 2, 'D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `idtipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(45) NOT NULL,
  `nivel_acceso` varchar(45) NOT NULL,
  PRIMARY KEY (`idtipousuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idtipousuario`, `tipo_usuario`, `nivel_acceso`) VALUES
(1, 'administrador', ''),
(2, 'gerente', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `idtipousuario` int(11) DEFAULT NULL,
  `nombre_usuario` varchar(150) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `clave` varchar(250) NOT NULL,
  `fecha_ingreso_user` date NOT NULL,
  `estado_usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `FK_RELATIONSHIP_13` (`idtipousuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `idtipousuario`, `nombre_usuario`, `usuario`, `clave`, `fecha_ingreso_user`, `estado_usuario`) VALUES
(1, 1, 'administrador', 'admin', 'fbc71ce36cc20790f2eeed2197898e71', '2014-05-05', 'V'),
(2, 2, 'gerente', 'gerente', 'fbc71ce36cc20790f2eeed2197898e71', '2014-05-06', 'V');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE IF NOT EXISTS `viaje` (
  `idviaje` int(11) NOT NULL AUTO_INCREMENT,
  `id_ruta` int(11) DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idconductor` int(11) DEFAULT NULL,
  `idflota` int(11) DEFAULT NULL,
  `fecha_viaje` date NOT NULL,
  `tipo_viaje` varchar(100) NOT NULL,
  `gasolina_asignada` float DEFAULT NULL,
  `marchamos` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idviaje`),
  KEY `FK_RELATIONSHIP_10` (`idcliente`),
  KEY `FK_RELATIONSHIP_11` (`id_ruta`),
  KEY `FK_RELATIONSHIP_12` (`idconductor`),
  KEY `FK_RELATIONSHIP_9` (`idflota`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`idviaje`, `id_ruta`, `idcliente`, `idconductor`, `idflota`, `fecha_viaje`, `tipo_viaje`, `gasolina_asignada`, `marchamos`) VALUES
(1, 1, 1, 1, 1, '2014-05-04', 'A', 100, 'no se'),
(4, 2, 1, 1, 1, '2014-05-07', 'B', 100, 'no se'),
(5, 2, 1, 1, 1, '2014-05-23', 'A', 100, 'no se');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
