SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP DATABASE IF EXISTS `db_transamerica` ;
CREATE DATABASE IF NOT EXISTS `db_transamerica` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `db_transamerica` ;

-- -----------------------------------------------------
-- Table `db_transamerica`.`cliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `db_transamerica`.`cliente` (
  `idcliente` INT NOT NULL auto_increment,
  `nombre_empresa` VARCHAR(300) NOT NULL ,
  `nombre_contacto` VARCHAR(450) NOT NULL ,
  `telefono_contacto` VARCHAR(16) NOT NULL ,
  `tarifa` FLOAT NOT NULL ,
  `fecha_ingreso` DATE NOT NULL ,
  PRIMARY KEY (`idcliente`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_transamerica`.`conductor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `db_transamerica`.`conductor` (
  `idconductor` INT NOT NULL auto_increment,
  `nombre_conductor` VARCHAR(150) NOT NULL ,
  `apellido_conductor` VARCHAR(150) NOT NULL ,
  `dui` VARCHAR(10) NOT NULL ,
  `nit` VARCHAR(17) NOT NULL ,
  `fecha_nacimiento` DATE NOT NULL ,
  `fecha_ingreso_cond` DATE NOT NULL ,
  `fecha_fin_cond` DATE NOT NULL ,
  `estado_conductor` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idconductor`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_transamerica`.`contenedor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `db_transamerica`.`contenedor` (
  `idcontenedor` INT NOT NULL auto_increment,
  `descripcion` VARCHAR(500) NOT NULL ,
  `tipo_contenedor` VARCHAR(200) NOT NULL ,
  PRIMARY KEY (`idcontenedor`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_transamerica`.`flota`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `db_transamerica`.`flota` (
  `idflota` INT NOT NULL auto_increment,
  `chasis` VARCHAR(7) NOT NULL ,
  `idconductor` INT NOT NULL ,
  `idcontenedor` INT NOT NULL ,
  PRIMARY KEY (`idflota`, `idconductor`, `idcontenedor`) ,
  CONSTRAINT `fk_flota_conductor1`
    FOREIGN KEY (`idconductor` )
    REFERENCES `db_transamerica`.`conductor` (`idconductor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_flota_contenedor1`
    FOREIGN KEY (`idcontenedor` )
    REFERENCES `db_transamerica`.`contenedor` (`idcontenedor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_flota_conductor1_idx` ON `db_transamerica`.`flota` (`idconductor` ASC) ;

CREATE INDEX `fk_flota_contenedor1_idx` ON `db_transamerica`.`flota` (`idcontenedor` ASC) ;


-- -----------------------------------------------------
-- Table `db_transamerica`.`ruta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `db_transamerica`.`ruta` (
  `id_ruta` INT NOT NULL auto_increment,
  `origen_ruta` VARCHAR(200) NOT NULL ,
  `destino_ruta` VARCHAR(200) NOT NULL ,
  `tiempo_estimado` TIME NOT NULL ,
  `distancia_km` FLOAT NOT NULL ,
  `gasolina_estimada` FLOAT NOT NULL ,
  PRIMARY KEY (`id_ruta`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_transamerica`.`viaje`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `db_transamerica`.`viaje` (
  `idviaje` INT NOT NULL auto_increment,
  `fecha_viaje` DATE NOT NULL ,
  `tipo_viaje` VARCHAR(100) NOT NULL ,
  `idcliente` INT NOT NULL ,
  `idflota` INT NOT NULL ,
  `id_ruta` INT NOT NULL ,
  PRIMARY KEY (`idviaje`, `idcliente`, `idflota`, `id_ruta`) ,
  CONSTRAINT `fk_viaje_cliente`
    FOREIGN KEY (`idcliente` )
    REFERENCES `db_transamerica`.`cliente` (`idcliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_viaje_flota1`
    FOREIGN KEY (`idflota` )
    REFERENCES `db_transamerica`.`flota` (`idflota` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_viaje_ruta1`
    FOREIGN KEY (`id_ruta` )
    REFERENCES `db_transamerica`.`ruta` (`id_ruta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_viaje_cliente_idx` ON `db_transamerica`.`viaje` (`idcliente` ASC) ;

CREATE INDEX `fk_viaje_flota1_idx` ON `db_transamerica`.`viaje` (`idflota` ASC) ;

CREATE INDEX `fk_viaje_ruta1_idx` ON `db_transamerica`.`viaje` (`id_ruta` ASC) ;


-- -----------------------------------------------------
-- Table `db_transamerica`.`llanta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `db_transamerica`.`llanta` (
  `idllanta` INT NOT NULL auto_increment,
  `descripcion_llanta` VARCHAR(150) NOT NULL ,
  `serie_llanta` VARCHAR(6) NOT NULL ,
  `ubicacion_llanta` VARCHAR(45) NOT NULL ,
  `tamanio_llanta` FLOAT NOT NULL ,
  `marca_llanta` VARCHAR(45) NOT NULL ,
  `estado_llanta` VARCHAR(45) NOT NULL ,
  `fecha_compra` DATE NOT NULL ,
  `fecha_desecho` DATE NOT NULL ,
  `idflota` INT NOT NULL ,
  PRIMARY KEY (`idllanta`, `idflota`) ,
  CONSTRAINT `fk_llanta_flota1`
    FOREIGN KEY (`idflota` )
    REFERENCES `db_transamerica`.`flota` (`idflota` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_llanta_flota1_idx` ON `db_transamerica`.`llanta` (`idflota` ASC) ;


-- -----------------------------------------------------
-- Table `db_transamerica`.`mantenimiento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `db_transamerica`.`mantenimiento` (
  `idmantenimiento` INT NOT NULL auto_increment,
  `fecha_mantenimiento` DATE NOT NULL ,
  `descripcion_mtto` VARCHAR(200) NOT NULL ,
  `idllanta` INT NOT NULL ,
  PRIMARY KEY (`idmantenimiento`, `idllanta`) ,
  CONSTRAINT `fk_mantenimiento_llanta1`
    FOREIGN KEY (`idllanta` )
    REFERENCES `db_transamerica`.`llanta` (`idllanta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_mantenimiento_llanta1_idx` ON `db_transamerica`.`mantenimiento` (`idllanta` ASC) ;


-- -----------------------------------------------------
-- Table `db_transamerica`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `db_transamerica`.`usuario` (
  `idusuario` INT NOT NULL auto_increment,
  `nombre_usuario` VARCHAR(150) NOT NULL ,
  `usuario` VARCHAR(45) NOT NULL ,
  `clave` VARCHAR(45) NOT NULL ,
  `fecha_ingreso_user` DATE NOT NULL ,
  `estado_user` VARCHAR(45) NOT NULL ,
  `nivel_privilegio` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idusuario`) )
ENGINE = InnoDB;

USE `db_transamerica` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
