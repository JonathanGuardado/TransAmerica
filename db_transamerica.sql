-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2014 a las 21:42:29
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_transamerica`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cabezal`
--

INSERT INTO `cabezal` (`idcabezal`, `identificador`, `marca`, `kilometraje_actual`, `estado_cabezal`) VALUES
(1, 1, 'mercedez', 1234, 'T');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `chasis`
--

INSERT INTO `chasis` (`idchasis`, `placa`, `marca`, `descripcion`, `estado_chasis`) VALUES
(1, 'mercerdez', 'mercedez', 'color rojo año 2000', 'T');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nombre_empresa`, `nombre_contacto`, `telefono_contacto`, `tarifa`, `fecha_ingreso_cliente`, `estado_cliente`) VALUES
(1, 'Siman', 'jose', '23', 12.5, '2014-05-04', 'T'),
(2, 'tigo', 'torrea', '12345678', 12.98, '2014-05-08', 'T'),
(3, 'tigo', 'q', 'q', 12, '2014-05-08', 'T'),
(4, '2', 'q', 'q', 11, '2014-05-08', 'T'),
(5, 'claro', 'navarrete', '123', 23, '2014-05-08', 'T'),
(6, 'digicel', 'marcos', '475', 3, '2014-05-08', 'T'),
(7, 'sony', 'alex', '12677', 129, '2014-05-08', 'T');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`idconductor`, `nombre_conductor`, `apellido_conductor`, `dui`, `nit`, `fecha_nacimiento`, `fecha_ingreso_cond`, `fecha_fin_cond`, `estado_conductor`) VALUES
(1, 'xfsdfsdf', 'vsdasd', '111', '111', '2014-05-07', '2014-05-07', NULL, 'T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenedor`
--

CREATE TABLE IF NOT EXISTS `contenedor` (
  `idcontenedor` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_contenedor` varchar(500) NOT NULL,
  `tipo_contenedor` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idcontenedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `contenedor`
--

INSERT INTO `contenedor` (`idcontenedor`, `descripcion_contenedor`, `tipo_contenedor`) VALUES
(1, 'carga de camisa', 'ropa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flota`
--

CREATE TABLE IF NOT EXISTS `flota` (
  `idflota` int(11) NOT NULL AUTO_INCREMENT,
  `idchasis` int(11) DEFAULT NULL,
  `idcontenedor` int(11) DEFAULT NULL,
  `idconductor` int(11) DEFAULT NULL,
  `idcabezal` int(11) DEFAULT NULL,
  PRIMARY KEY (`idflota`),
  KEY `FK_REFERENCE_14` (`idconductor`),
  KEY `FK_RELATIONSHIP_5` (`idchasis`),
  KEY `FK_RELATIONSHIP_6` (`idcabezal`),
  KEY `FK_RELATIONSHIP_7` (`idcontenedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `flota`
--

INSERT INTO `flota` (`idflota`, `idchasis`, `idcontenedor`, `idconductor`, `idcabezal`) VALUES
(1, 1, 1, 1, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llanta`
--

CREATE TABLE IF NOT EXISTS `llanta` (
  `idllanta` varchar(15) NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `id_reencauche` int(11) DEFAULT NULL,
  `descripcion_llanta` varchar(150) NOT NULL,
  `serie_llanta` varchar(6) NOT NULL,
  `ubicacion_llanta` varchar(45) NOT NULL,
  `tamanio_llanta` float NOT NULL,
  `marca_llanta` varchar(45) NOT NULL,
  `estado_llanta` varchar(45) NOT NULL,
  `fecha_asignacion` date DEFAULT NULL,
  `fecha_compra` date NOT NULL,
  `fecha_desecho` date DEFAULT NULL,
  PRIMARY KEY (`idllanta`),
  KEY `FK_REFERENCE_15` (`id_reencauche`),
  KEY `FK_REFERENCE_16` (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE IF NOT EXISTS `lugar` (
  `idlugar` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idlugar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`idlugar`, `nombre`, `ciudad`, `pais`) VALUES
(1, 'Guatemala', NULL, NULL),
(2, 'El Salvador', NULL, NULL),
(3, 'Costa Rica', NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_llanta`
--

CREATE TABLE IF NOT EXISTS `proveedor_llanta` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_proveedor` varchar(250) DEFAULT NULL,
  `direccion_proveedor` varchar(250) DEFAULT NULL,
  `telefono_proveedor` varchar(15) DEFAULT NULL,
  `estado_proveedor` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id_reencauche`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`id_ruta`, `descripcion`, `tiempo_estimado`, `distancia_km`, `gasolina_estimada`) VALUES
(1, 'guate to el salvador', '72:00:00', 300, 50),
(2, 'el salvador to costa', '48:00:00', 200, 40),
(5, 'de guate a guate', '00:00:13', 12, 15);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `ruta_lugar`
--

INSERT INTO `ruta_lugar` (`idrutalugar`, `idlugar`, `id_ruta`, `opcionruta`) VALUES
(1, 1, 1, 'O'),
(2, 2, 1, 'D'),
(3, 2, 2, 'O'),
(4, 3, 2, 'D'),
(8, 1, 5, 'O'),
(9, 1, 5, 'D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `idtipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(45) NOT NULL,
  `nivel_acceso` varchar(45) NOT NULL,
  PRIMARY KEY (`idtipousuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
  `idconductor` int(11) DEFAULT NULL,
  `idflota` int(11) DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `id_ruta` int(11) DEFAULT NULL,
  `fecha_viaje` date NOT NULL,
  `tipo_viaje` varchar(100) NOT NULL,
  `gasolina_asignada` float DEFAULT NULL,
  `marchamos` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idviaje`),
  KEY `FK_RELATIONSHIP_10` (`idcliente`),
  KEY `FK_RELATIONSHIP_11` (`id_ruta`),
  KEY `FK_RELATIONSHIP_12` (`idconductor`),
  KEY `FK_RELATIONSHIP_9` (`idflota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`idviaje`, `idconductor`, `idflota`, `idcliente`, `id_ruta`, `fecha_viaje`, `tipo_viaje`, `gasolina_asignada`, `marchamos`) VALUES
(1, 1, 1, 1, 1, '2014-05-04', 'A', 100, 'no se'),
(4, 1, 1, 1, 2, '2014-05-07', 'B', 100, 'no se'),
(5, 1, 1, 1, 2, '2014-05-23', 'A', 100, 'no se'),
(10, 1, 1, 2, 1, '0000-00-00', 'A', 100, 'no se'),
(11, 1, 1, 2, 1, '2014-05-31', 'B', 100, 'no se'),
(13, 1, 1, 2, 2, '2014-05-07', 'A', 100, 'no se');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `flota`
--
ALTER TABLE `flota`
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`idcontenedor`) REFERENCES `contenedor` (`idcontenedor`),
  ADD CONSTRAINT `FK_REFERENCE_14` FOREIGN KEY (`idconductor`) REFERENCES `conductor` (`idconductor`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`idchasis`) REFERENCES `chasis` (`idchasis`),
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`idcabezal`) REFERENCES `cabezal` (`idcabezal`);

--
-- Filtros para la tabla `flota_llanta`
--
ALTER TABLE `flota_llanta`
  ADD CONSTRAINT `FK_RELATIONSHIP_17` FOREIGN KEY (`idllanta`) REFERENCES `llanta` (`idllanta`),
  ADD CONSTRAINT `FK_RELATIONSHIP_16` FOREIGN KEY (`idflota`) REFERENCES `flota` (`idflota`);

--
-- Filtros para la tabla `llanta`
--
ALTER TABLE `llanta`
  ADD CONSTRAINT `FK_REFERENCE_16` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor_llanta` (`id_proveedor`),
  ADD CONSTRAINT `FK_REFERENCE_15` FOREIGN KEY (`id_reencauche`) REFERENCES `reencauche` (`id_reencauche`);

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`idllanta`) REFERENCES `llanta` (`idllanta`);

--
-- Filtros para la tabla `opcion_tipo`
--
ALTER TABLE `opcion_tipo`
  ADD CONSTRAINT `FK_REFERENCE_18` FOREIGN KEY (`idtipousuario`) REFERENCES `tipo_usuario` (`idtipousuario`),
  ADD CONSTRAINT `FK_REFERENCE_17` FOREIGN KEY (`id_opcion`) REFERENCES `opciones` (`id_opcion`);

--
-- Filtros para la tabla `ruta_lugar`
--
ALTER TABLE `ruta_lugar`
  ADD CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`idlugar`) REFERENCES `lugar` (`idlugar`),
  ADD CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`idtipousuario`) REFERENCES `tipo_usuario` (`idtipousuario`);

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`idflota`) REFERENCES `flota` (`idflota`),
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`),
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`),
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`idconductor`) REFERENCES `conductor` (`idconductor`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
