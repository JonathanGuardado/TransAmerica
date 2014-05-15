-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-05-2014 a las 05:39:44
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
  `estado_cabezal` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idcabezal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `cabezal`
--

INSERT INTO `cabezal` (`idcabezal`, `identificador`, `marca`, `kilometraje_actual`, `estado_cabezal`) VALUES
(1, 0, NULL, NULL, 'F'),
(2, 0, NULL, NULL, 'F'),
(3, 3, 'kenworthsa', 10000, 'T'),
(4, 4, 'Freightliner', 6000, 'T'),
(5, 0, NULL, NULL, 'F'),
(6, 0, NULL, NULL, 'F'),
(7, 555, 'asdfa', 4578, 'F'),
(8, 2, 'asdfasd', 56323, 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chasis`
--

CREATE TABLE IF NOT EXISTS `chasis` (
  `idchasis` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado_chasis` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idchasis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `chasis`
--

INSERT INTO `chasis` (`idchasis`, `placa`, `marca`, `descripcion`, `estado_chasis`) VALUES
(1, 'C78912', 'vautranss', 'Flexible torsionalmentes', 'F'),
(2, 'C75655', 'volvo', 'Contiene barra estabilizadora', 'T'),
(3, 'C75648', 'chevrolet', 'Distancia entre ejes reducida', 'T'),
(4, 'C76088', 'volvo', 'Plataforma corta ', 'T'),
(5, 'C101864', 'vautran', 'Torsionalmente rigida', 'T'),
(6, 'C101885', 'chevrolet', 'Flexible torsionalmente', 'T'),
(7, 'C789127', 'volvito', 'del bueno', 'F'),
(8, 'cm9031', 'asdf', 'asdfaaaaaaaaaaaaaaaaa', 'F');

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
  `estado_cliente` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nombre_empresa`, `nombre_contacto`, `telefono_contacto`, `tarifa`, `fecha_ingreso_cliente`, `estado_cliente`) VALUES
(1, 'Auto Parts', 'Juan Jose Perez', '21232425', 20, '2012-05-08', 'T'),
(2, 'Comidita Rapida', 'Emiliano Caceres', '24252627', 45, '2010-10-17', 'T'),
(3, 'Line Air', 'Carlos Reyes Cruz', '26290098', 18, '2008-11-27', 'T'),
(4, 'Nestle', 'Ever Orenalla ', '26272829', 23, '2014-02-04', 'T'),
(5, 'Big Cola', 'Ana Clara Martinez', '24255656', 15, '2005-07-12', 'T');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`idconductor`, `nombre_conductor`, `apellido_conductor`, `dui`, `nit`, `fecha_nacimiento`, `fecha_ingreso_cond`, `fecha_fin_cond`, `estado_conductor`) VALUES
(1, 'Manuel ', 'Reyes Reyes', '12345678-0', '1401-13289-101-4', '1992-02-03', '2014-05-12', '2020-05-06', 'T'),
(2, 'Rigoberto', 'Mejia Canales', '12343456-6', '1401-24572-101-2', '1972-05-24', '2013-02-24', '2016-05-03', 'T'),
(3, 'Carlos Mario', 'Cruz Orellana', '23456789-1', '1401-12391-101-5', '1991-03-12', '2010-12-17', '2015-05-21', 'T'),
(4, 'Babaro Luis', 'Zelada Pineda', '56789345-6', '1401-3268-101-7', '1968-02-03', '2014-05-15', '2016-05-27', 'T'),
(5, 'Juan', 'Perez', '121231', '123123000', '2014-05-09', '2014-05-09', NULL, 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenedor`
--

CREATE TABLE IF NOT EXISTS `contenedor` (
  `idcontenedor` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_contenedor` varchar(500) NOT NULL,
  `tipo_contenedor` varchar(200) DEFAULT NULL,
  `estado_contenedor` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idcontenedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `contenedor`
--

INSERT INTO `contenedor` (`idcontenedor`, `descripcion_contenedor`, `tipo_contenedor`, `estado_contenedor`) VALUES
(1, 'Equipo propio de generador de frioss', '0', 'T'),
(2, 'Para cualquier carga seca normal', 'Comunes', 'T'),
(3, 'Sin equipo generador de frios', '0', 'T'),
(4, 'Con terminales fijos, sin laterales', 'Flatrack', 'T'),
(5, 'Descarga por precipitacion, transporte de granos', 'Granelero', 'T'),
(6, 'Techo removible, para transportar cargas pesadas', 'Open Top', 'T'),
(7, 'para viajes', '0', NULL),
(8, 'del mas completo', '0', 'T'),
(9, 'grande', '0', 'T'),
(10, 'grande', 'para flota', 'T'),
(11, '123456ddddddddddddd', '123456', 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flota`
--

CREATE TABLE IF NOT EXISTS `flota` (
  `idflota` varchar(20) NOT NULL,
  `idchasis` int(11) DEFAULT NULL,
  `idcontenedor` int(11) DEFAULT NULL,
  `idconductor` int(11) DEFAULT NULL,
  `idcabezal` int(11) DEFAULT NULL,
  `estado_flota` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idflota`),
  KEY `FK_REFERENCE_14` (`idconductor`),
  KEY `FK_RELATIONSHIP_5` (`idchasis`),
  KEY `FK_RELATIONSHIP_6` (`idcabezal`),
  KEY `FK_RELATIONSHIP_7` (`idcontenedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `flota`
--

INSERT INTO `flota` (`idflota`, `idchasis`, `idcontenedor`, `idconductor`, `idcabezal`, `estado_flota`) VALUES
('TAS-00001', 1, 4, 4, 3, 'T'),
('TAS-00002', NULL, NULL, NULL, NULL, 'T'),
('TAS-00003', 3, 1, 3, 3, 'T'),
('TAS-00004', 4, 4, 1, 4, 'T'),
('TAS-0005', 2, 4, 3, 3, 'T'),
('TS-0010', 4, 4, 3, 3, 'T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flota_llanta`
--

CREATE TABLE IF NOT EXISTS `flota_llanta` (
  `idflotallanta` int(11) NOT NULL AUTO_INCREMENT,
  `idflota` varchar(20) DEFAULT NULL,
  `idllanta` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idflotallanta`),
  KEY `FK_RELATIONSHIP_16` (`idflota`),
  KEY `FK_RELATIONSHIP_17` (`idllanta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `flota_llanta`
--

INSERT INTO `flota_llanta` (`idflotallanta`, `idflota`, `idllanta`) VALUES
(1, 'TAS-00001', '06'),
(2, ' TAS-00001', '2'),
(3, 'TAS-00002', '3'),
(4, ' TAS-00001', '2'),
(5, 'TAS-00002', '3'),
(6, 'TAS-00003', '10'),
(7, 'TAS-00004', '07'),
(8, 'TAS-00002', '4'),
(9, 'TAS-00001', '3'),
(10, 'TAS-00001', '15'),
(11, 'TAS-00001', '20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llanta`
--

CREATE TABLE IF NOT EXISTS `llanta` (
  `idllanta` varchar(15) NOT NULL,
  `descripcion_llanta` varchar(150) NOT NULL,
  `serie_llanta` varchar(6) NOT NULL,
  `tamanio_llanta` float NOT NULL,
  `marca_llanta` varchar(45) NOT NULL,
  `estado_llanta` varchar(45) NOT NULL,
  `fecha_asignacion` date DEFAULT NULL,
  `fecha_compra` date NOT NULL,
  `fecha_desecho` date DEFAULT NULL,
  `estado_asignacion` varchar(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `estado_reencauche` varchar(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `estado_desecho` varchar(1) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`idllanta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `llanta`
--

INSERT INTO `llanta` (`idllanta`, `descripcion_llanta`, `serie_llanta`, `tamanio_llanta`, `marca_llanta`, `estado_llanta`, `fecha_asignacion`, `fecha_compra`, `fecha_desecho`, `estado_asignacion`, `estado_reencauche`, `estado_desecho`) VALUES
('06', 'Desc', '6', 22, 'FIRESTONE', 'T', '2014-05-08', '2014-05-09', '0000-00-00', 'T', 'T', 'T'),
('07', 'Desc', '7', 22, 'FIRESTONE', 'T', '2014-05-06', '2014-05-09', '0000-00-00', 'T', '', 'T'),
('10', 'Llantas 24 in', '10', 22, 'Fire Stone', 'T', NULL, '2014-05-09', '2014-05-09', 'T', 'T', 'T'),
('11', 'Llantas 24 in', '11', 22, 'Fire Stone', 'T', NULL, '2014-05-09', '2014-05-09', 'T', 'T', 'T'),
('12', 'Llantas 24 in', '12', 22, 'Fire Stone', 'T', NULL, '2014-05-09', '2014-05-09', 'T', 'T', 'T'),
('15', 'Llantas 24 in', '15', 22, 'Fire Stone', 'T', NULL, '2014-05-09', '2014-05-09', 'T', 'T', 'T'),
('2', 'Desc', '2', 22, 'FIRESTONE', 'T', NULL, '2014-05-09', '2014-05-09', 'T', 'T', 'T'),
('20', 'Llanta', '20', 22, 'Fire Stone', 'T', NULL, '2014-05-09', '2014-05-09', 'T', 'T', 'T'),
('21', 'Llanta', '21', 22, 'Fire Stone', 'T', NULL, '2014-05-09', '2014-05-09', '', '', 'T'),
('22', 'Llantas 24 in', '22', 22, 'Fire Stone', 'T', '2014-05-09', '2014-05-09', NULL, '', '', ''),
('23', 'Llantas 24 in', '23', 22, 'Firestone', 'T', '2014-05-09', '2014-05-09', NULL, '', '', ''),
('24', 'Llantas 24 in', '24', 22, 'Firestone', 'T', '2014-05-09', '2014-05-09', NULL, '', '', ''),
('25', 'Llantas 24 in', '25', 22, 'Firestone', 'T', '2014-05-09', '2014-05-09', NULL, '', '', ''),
('26', 'Llantas 24 in', '26', 22, 'Firestone', 'T', '2014-05-09', '2014-05-09', NULL, '', '', ''),
('27', 'Llantas 24 in', '27', 22, 'Firestone', 'T', '2014-05-09', '2014-05-09', NULL, '', '', ''),
('28', 'Llantas 24 in', '28', 22, 'Firestone', 'T', '2014-05-09', '2014-05-09', NULL, '', '', ''),
('29', 'Llantas 24 in', '29', 22, 'Firestone', 'T', '2014-05-09', '2014-05-09', NULL, '', '', ''),
('3', 'Desc', '3', 22, 'FIRESTONE', 'T', '2014-05-09', '2014-05-09', NULL, '', '', ''),
('30', 'Llantas 24 in', '30', 22, 'Firestone', 'T', '2014-05-09', '2014-05-09', NULL, '', '', ''),
('31', 'Llantas 24 in', '31', 22, 'Firestone', 'T', '2014-05-09', '2014-05-09', NULL, '', '', ''),
('32', 'Llantas 24 in', '32', 22, 'Firestone', 'T', '2014-05-09', '2014-05-09', NULL, '', '', ''),
('33', 'Llantas 24 in', '33', 22, 'Firestone', 'T', '2014-05-09', '2014-05-09', NULL, '', '', ''),
('34', 'Llantas 24 in', '34', 22, 'Firestone', 'T', '2014-05-09', '2014-05-09', NULL, '', '', ''),
('35', 'Llantas 24 in', '35', 22, 'Firestone', 'T', '2014-05-09', '2014-05-09', NULL, '', '', ''),
('36', 'Llantas 24 in', '36', 22, 'Firestone', 'T', '2014-05-09', '2014-05-09', NULL, '', '', ''),
('37', 'Llantas 24 in', '37', 22, 'Firestone', 'T', '2014-05-09', '2014-05-09', NULL, '', '', ''),
('38', 'Llantas 24 in', '38', 22, 'Firestone', 'T', NULL, '2014-05-09', NULL, '', '', ''),
('39', 'Llantas 24 in', '39', 22, 'Firestone', 'T', NULL, '2014-05-09', NULL, '', '', ''),
('4', 'Desc', '4', 22, 'FIRESTONE', 'T', NULL, '2014-05-09', NULL, '', '', ''),
('40', 'Llantas 24 in', '40', 22, 'Firestone', 'T', NULL, '2014-05-09', NULL, '', '', ''),
('41', 'Llantas 24 in', '41', 22, 'Firestone', 'T', NULL, '2014-05-09', NULL, '', '', ''),
('42', 'Llantas 24 in', '42', 22, 'Firestone', 'T', NULL, '2014-05-09', NULL, '', '', ''),
('43', 'llantas de 30 in', '43', 22, 'Firestone', 'T', NULL, '2014-05-09', NULL, '', '', ''),
('44', 'llantas de 30 in', '44', 22, 'Firestone', 'T', NULL, '2014-05-09', NULL, '', '', ''),
('45', 'llantas de 30 in', '45', 22, 'Firestone', 'T', NULL, '2014-05-09', NULL, '', '', ''),
('46', 'llantas de 30 in', '46', 22, 'Firestone', 'T', NULL, '2014-05-09', NULL, '', '', ''),
('47', 'llantas de 30 in', '47', 22, 'Firestone', 'T', NULL, '2014-05-09', NULL, '', '', ''),
('48', 'llantas de 30 in', '48', 22, 'Firestone', 'T', NULL, '2014-05-09', NULL, '', '', ''),
('49', 'llantas de 30 in', '49', 22, 'Firestone', 'T', NULL, '2014-05-09', NULL, '', '', ''),
('5', 'Desc', '5', 22, 'FIRESTONE', 'T', NULL, '2014-05-09', NULL, '', '', ''),
('50', 'llantas de 30 in', '50', 22, 'Firestone', 'T', NULL, '2014-05-09', NULL, '', '', ''),
('51', 'llantas de 30 in', '51', 22, 'Firestone', 'T', NULL, '2014-05-09', NULL, '', '', ''),
('52', 'llantas de 30 in', '52', 22, 'Firestone', 'T', NULL, '2014-05-09', NULL, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE IF NOT EXISTS `lugar` (
  `idlugar` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `estado_lugar` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idlugar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`idlugar`, `nombre`, `ciudad`, `pais`, `estado_lugar`) VALUES
(1, 'La Parada', 'San Jose', 'Costa Rica', 'T'),
(2, 'Siman', 'San Miguel', 'El Salvador', ''),
(3, 'Los Pintos', 'Managua', 'Nicaragua', 'T'),
(4, 'La palmera', 'Tegucigalpa', 'Honduras', 'T');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE IF NOT EXISTS `opciones` (
  `id_opcion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_opcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_opcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`id_opcion`, `descripcion_opcion`) VALUES
(1, 'Flota'),
(2, 'Facturacion'),
(3, 'Mantenimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcion_tipo`
--

CREATE TABLE IF NOT EXISTS `opcion_tipo` (
  `id_opcion_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `idtipousuario` int(11) DEFAULT NULL,
  `id_opcion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_opcion_tipo`),
  KEY `FK_REFERENCE_17` (`id_opcion`),
  KEY `FK_REFERENCE_18` (`idtipousuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `opcion_tipo`
--

INSERT INTO `opcion_tipo` (`id_opcion_tipo`, `idtipousuario`, `id_opcion`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reencauche`
--

CREATE TABLE IF NOT EXISTS `reencauche` (
  `id_reencauche` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_reencauche` date DEFAULT NULL,
  `lugar_reencauche` varchar(200) DEFAULT NULL,
  `total_reencauche` float DEFAULT NULL,
  `observacion_re` varchar(500) DEFAULT NULL,
  `idllanta` varchar(15) NOT NULL,
  PRIMARY KEY (`id_reencauche`),
  KEY `FK_REFERENCE_15` (`idllanta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `reencauche`
--

INSERT INTO `reencauche` (`id_reencauche`, `fecha_reencauche`, `lugar_reencauche`, `total_reencauche`, `observacion_re`, `idllanta`) VALUES
(1, '2014-05-12', 'Llanta car, San Salvador', 38, 'Llanta perforada', '2'),
(2, '2007-04-09', 'Mi Carro, Honduras', 45, NULL, '2'),
(3, '2012-05-10', 'El kiosko, Guatemala', 20, 'Desgaste en laterales', '3'),
(4, '2014-02-10', 'Repuestos, Costa Rica', 35, NULL, '4'),
(5, '2010-05-03', 'Las Margaritas, Soyapango', 50, NULL, '4'),
(6, '2014-05-18', 'Las claritas, Ilopango', 24, NULL, '5');

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
  `estado_ruta` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_ruta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`id_ruta`, `descripcion`, `tiempo_estimado`, `distancia_km`, `gasolina_estimada`, `estado_ruta`) VALUES
(1, 'Cortez/antiguo Cuscatlan/ Lourdes', '00:00:48', 10000, 500, 'T'),
(2, 'San Jose/ San Salvador/Cortez', '00:00:24', 1000, 250, 'T'),
(3, 'San Miguel/Cuscatlan/ Honduras', '24:00:00', 500, 125, 'T'),
(4, 'soyapango/San Miguel/Honduras', '28:00:00', 300, 123, 'T');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `ruta_lugar`
--

INSERT INTO `ruta_lugar` (`idrutalugar`, `idlugar`, `id_ruta`, `opcionruta`) VALUES
(1, 1, 1, 'O'),
(2, 2, 2, 'D'),
(3, 3, 3, 'D'),
(4, 4, 4, 'O'),
(5, 2, 1, 'D'),
(6, 3, 2, 'O'),
(7, 4, 3, 'O'),
(8, 2, 4, 'D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `idtipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(45) NOT NULL,
  `nivel_acceso` varchar(45) NOT NULL,
  PRIMARY KEY (`idtipousuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idtipousuario`, `tipo_usuario`, `nivel_acceso`) VALUES
(1, 'Administrador', '1'),
(2, 'Usuario', '2'),
(3, 'Invitado', '3');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `idtipousuario`, `nombre_usuario`, `usuario`, `clave`, `fecha_ingreso_user`, `estado_usuario`) VALUES
(1, 1, 'Manuel Reyes', 'Manuel', '96917805fd060e3766a9a1b834639d35', '2012-05-01', 'T'),
(2, 3, 'Juan Marquez', 'juan', 'a94652aa97c7211ba8954dd15a3cf838', '2014-02-03', 'T'),
(3, 2, 'Maria Garcia Prez', 'maria', '263bce650e68ab4e23f28263760b9fa5', '2014-05-06', 'T'),
(4, 1, 'admin', 'admin', 'fbc71ce36cc20790f2eeed2197898e71', '2014-05-05', 'T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE IF NOT EXISTS `viaje` (
  `idviaje` int(11) NOT NULL AUTO_INCREMENT,
  `idconductor` int(11) DEFAULT NULL,
  `idflota` varchar(20) DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `id_ruta` int(11) DEFAULT NULL,
  `fecha_viaje` date NOT NULL,
  `tipo_viaje` varchar(100) NOT NULL,
  `gasolina_asignada` float DEFAULT NULL,
  `marchamos` varchar(10) DEFAULT NULL,
  `estado_viaje` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idviaje`),
  KEY `FK_RELATIONSHIP_10` (`idcliente`),
  KEY `FK_RELATIONSHIP_11` (`id_ruta`),
  KEY `FK_RELATIONSHIP_12` (`idconductor`),
  KEY `FK_RELATIONSHIP_9` (`idflota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`idviaje`, `idconductor`, `idflota`, `idcliente`, `id_ruta`, `fecha_viaje`, `tipo_viaje`, `gasolina_asignada`, `marchamos`, `estado_viaje`) VALUES
(1, 1, 'TAS-00002', 1, 1, '2014-02-04', 'Carga pesada', 34, '12323', 'T'),
(2, 2, 'TAS-00002', 2, 2, '2012-05-01', 'Entrega Leche', 45, '3754', 'T'),
(3, 3, 'TAS-00004', 3, 3, '2014-05-13', 'Carga Granos', 24, '3434', 'T'),
(4, 4, 'TAS-00003', 4, 4, '2013-07-22', 'Entrega Comida', 36, '4646', 'T');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `flota`
--
ALTER TABLE `flota`
  ADD CONSTRAINT `FK_REFERENCE_14` FOREIGN KEY (`idconductor`) REFERENCES `conductor` (`idconductor`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`idchasis`) REFERENCES `chasis` (`idchasis`),
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`idcabezal`) REFERENCES `cabezal` (`idcabezal`),
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`idcontenedor`) REFERENCES `contenedor` (`idcontenedor`);

--
-- Filtros para la tabla `flota_llanta`
--
ALTER TABLE `flota_llanta`
  ADD CONSTRAINT `FK_RELATIONSHIP_17` FOREIGN KEY (`idllanta`) REFERENCES `llanta` (`idllanta`);

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`idllanta`) REFERENCES `llanta` (`idllanta`);

--
-- Filtros para la tabla `opcion_tipo`
--
ALTER TABLE `opcion_tipo`
  ADD CONSTRAINT `FK_REFERENCE_17` FOREIGN KEY (`id_opcion`) REFERENCES `opciones` (`id_opcion`),
  ADD CONSTRAINT `FK_REFERENCE_18` FOREIGN KEY (`idtipousuario`) REFERENCES `tipo_usuario` (`idtipousuario`);

--
-- Filtros para la tabla `reencauche`
--
ALTER TABLE `reencauche`
  ADD CONSTRAINT `FK_REFERENCE_15` FOREIGN KEY (`idllanta`) REFERENCES `llanta` (`idllanta`);

--
-- Filtros para la tabla `ruta_lugar`
--
ALTER TABLE `ruta_lugar`
  ADD CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`),
  ADD CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`idlugar`) REFERENCES `lugar` (`idlugar`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`idtipousuario`) REFERENCES `tipo_usuario` (`idtipousuario`);

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`),
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`),
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`idconductor`) REFERENCES `conductor` (`idconductor`),
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`idflota`) REFERENCES `flota` (`idflota`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
