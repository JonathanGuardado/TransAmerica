/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     07/05/2014 04:54:09 p.m.                     */
/*==============================================================*/


/*==============================================================*/
/* Table: cabezal                                               */
/*==============================================================*/
create table cabezal
(
   idcabezal            int(11) not null auto_increment,
   identificador        int not null,
   marca                varchar(100),
   kilometraje_actual   float,
   primary key (idcabezal)
);
INSERT INTO `cabezal` (`idcabezal`, `identificador`, `marca`, `kilometraje_actual`) VALUES
(1, 1, 'mercedez', 1234);
/*==============================================================*/
/* Table: chasis                                                */
/*==============================================================*/
create table chasis
(
   idchasis             int(11) not null auto_increment,
   placa                varchar(100),
   marca                varchar(100),
   descripcion          varchar(100),
   primary key (idchasis)
);
INSERT INTO `chasis` (`idchasis`, `placa`, `marca`, `descripcion`) VALUES
(1, 'mercerdez', 'mercedez', 'color rojo año 2000');


/*==============================================================*/
/* Table: cliente                                               */
/*==============================================================*/
create table cliente
(
   idcliente            int(11) not null auto_increment,
   nombre_empresa       varchar(300) not null,
   nombre_contacto      varchar(450),
   telefono_contacto    varchar(16) not null,
   tarifa               float not null,
   fecha_ingreso_cliente date,
   primary key (idcliente)
);
INSERT INTO `cliente` (`idcliente`, `nombre_empresa`, `nombre_contacto`, `telefono_contacto`, `tarifa`, `fecha_ingreso_cliente`) VALUES
(1, 'Siman', 'jose', '23', 12.5, '2014-05-04'),
(2, 'tigo', 'torrea', '12345678', 12.98, '2014-05-08');

/*==============================================================*/
/* Table: conductor                                             */
/*==============================================================*/
create table conductor
(
   idconductor          int(11) not null auto_increment,
   nombre_conductor     varchar(150) not null,
   apellido_conductor   varchar(150) not null,
   dui                  varchar(10) not null,
   nit                  varchar(17) not null,
   fecha_nacimiento     date,
   fecha_ingreso_cond   date not null,
   fecha_fin_cond       date,
   estado_conductor     varchar(45) not null,
   primary key (idconductor)
);
INSERT INTO `conductor` (`idconductor`, `nombre_conductor`, `apellido_conductor`, `dui`, `nit`, `fecha_nacimiento`, `fecha_ingreso_cond`, `fecha_fin_cond`, `estado_conductor`) VALUES
(1, 'xfsdfsdf', 'vsdasd', '111', '111', '2014-05-07', '2014-05-07', NULL, 't');

/*==============================================================*/
/* Table: contenedor                                            */
/*==============================================================*/
create table contenedor
(
   idcontenedor         int(11) not null auto_increment,
   descripcion_contenedor varchar(500) not null,
   tipo_contenedor      varchar(200),
   primary key (idcontenedor)
);
INSERT INTO `contenedor` (`idcontenedor`, `descripcion_contenedor`, `tipo_contenedor`) VALUES
(1, 'carga de camisa', 'ropa');
/*==============================================================*/
/* Table: flota                                                 */
/*==============================================================*/
create table flota
(
   idflota              int(11) not null auto_increment,
   idchasis             int(11),
   idcontenedor         int(11),
   idcabezal            int(11),
   idconductor          int(11),
   primary key (idflota)
);
INSERT INTO `flota` (`idflota`, `idchasis`, `idcontenedor`, `idcabezal`) VALUES
(1, 1, 1, 1);
/*==============================================================*/
/* Table: flota_llanta                                          */
/*==============================================================*/
create table flota_llanta
(
   idflotallanta        int not null auto_increment,
   idflota              int(11),
   idllanta             varchar(15),
   primary key (idflotallanta)
);

/*==============================================================*/
/* Table: guia                                                  */
/*==============================================================*/
create table guia
(
   idguia               int(11) not null auto_increment,
   id_ruta              int(11),
   idcliente            int(11),
   idconductor          int(11),
   idflota              int(11),
   fecha_viaje          date not null,
   tipo_viaje           varchar(100) not null,
   gasolina_asignada    float,
   marchamos            varchar(10),
   primary key (idguia)
);
INSERT INTO `guia` (`idguia`, `id_ruta`, `idcliente`, `idconductor`, `idflota`, `fecha_viaje`, `tipo_viaje`, `gasolina_asignada`, `marchamos`) VALUES
(1, 1, 1, 1, 1, '2014-05-04', 'A', 100, 'no se'),
(4, 2, 1, 1, 1, '2014-05-07', 'B', 100, 'no se'),
(5, 2, 1, 1, 1, '2014-05-23', 'A', 100, 'no se');
/*==============================================================*/
/* Table: llanta                                                */
/*==============================================================*/
create table llanta
(
   idllanta             varchar(15) not null,
   descripcion_llanta   varchar(150) not null,
   serie_llanta         varchar(6) not null,
   ubicacion_llanta     varchar(45) not null,
   tamanio_llanta       float not null,
   marca_llanta         varchar(45) not null,
   estado_llanta        varchar(45) not null,
   fecha_asignacion     date,
   fecha_compra         date not null,
   fecha_desecho        date,
   primary key (idllanta)
);

/*==============================================================*/
/* Table: lugar                                                 */
/*==============================================================*/
create table lugar
(
   idlugar              int(11) not null auto_increment,
   nombre               varchar(100) not null,
   primary key (idlugar)
);
INSERT INTO `lugar` (`idlugar`, `nombre`) VALUES
(1, 'Guatemala'),
(2, 'El Salvador'),
(3, 'Costa Rica');
/*==============================================================*/
/* Table: mantenimiento                                         */
/*==============================================================*/
create table mantenimiento
(
   idmantenimiento      int(11) not null auto_increment,
   idllanta             varchar(15),
   fecha_mantenimiento  date not null,
   descripcion_mtto     varchar(200) not null,
   primary key (idmantenimiento)
);

/*==============================================================*/
/* Table: ruta                                                  */
/*==============================================================*/
create table ruta
(
   id_ruta              int(11) not null auto_increment,
   descripcion          varchar(200) not null,
   tiempo_estimado      time not null,
   distancia_km         float not null,
   gasolina_estimada    float not null,
   primary key (id_ruta)
);
INSERT INTO `ruta` (`id_ruta`, `descripcion`, `tiempo_estimado`, `distancia_km`, `gasolina_estimada`) VALUES
(1, 'guate to el salvador', '72:00:00', 300, 50),
(2, 'el salvador to costa', '48:00:00', 200, 40);
/*==============================================================*/
/* Table: ruta_lugar                                            */
/*==============================================================*/
create table ruta_lugar
(
   idrutalugar          int not null auto_increment,
   idlugar              int(11),
   id_ruta              int(11),
   opcionruta           varchar(1),
   primary key (idrutalugar)
);
INSERT INTO `ruta_lugar` (`idrutalugar`, `idlugar`, `id_ruta`, `opcionruta`) VALUES
(1, 1, 1, 'O'),
(2, 2, 1, 'D'),
(3, 2, 2, 'O'),
(4, 3, 2, 'D');
/*==============================================================*/
/* Table: tipo_usuario                                          */
/*==============================================================*/
create table tipo_usuario
(
   idtipousuario        int(11) not null auto_increment,
   tipo_usuario         varchar(45) not null,
   nivel_acceso         varchar(45) not null,
   primary key (idtipousuario)
);
INSERT INTO `tipo_usuario` (`idtipousuario`, `tipo_usuario`, `nivel_acceso`) VALUES
(1, 'administrador', ''),
(2, 'gerente', '');
/*==============================================================*/
/* Table: usuario                                               */
/*==============================================================*/
create table usuario
(
   idusuario            int(11) not null auto_increment,
   idtipousuario        int(11),
   nombre_usuario       varchar(150) not null,
   usuario              varchar(45) not null,
   clave                varchar(250) not null,
   fecha_ingreso_user   date not null,
   estado_usuario       varchar(45) not null,
   primary key (idusuario)
);
INSERT INTO `usuario` (`idusuario`, `idtipousuario`, `nombre_usuario`, `usuario`, `clave`, `fecha_ingreso_user`, `estado_usuario`) VALUES
(1, 1, 'administrador', 'admin', 'fbc71ce36cc20790f2eeed2197898e71', '2014-05-05', 'V'),
(2, 2, 'gerente', 'gerente', 'fbc71ce36cc20790f2eeed2197898e71', '2014-05-06', 'V');

alter table flota add constraint FK_REFERENCE_14 foreign key (idconductor)
      references conductor (idconductor) on delete restrict on update restrict;

alter table flota add constraint FK_RELATIONSHIP_5 foreign key (idchasis)
      references chasis (idchasis) on delete restrict on update restrict;

alter table flota add constraint FK_RELATIONSHIP_6 foreign key (idcabezal)
      references cabezal (idcabezal) on delete restrict on update restrict;

alter table flota add constraint FK_RELATIONSHIP_7 foreign key (idcontenedor)
      references contenedor (idcontenedor) on delete restrict on update restrict;

alter table flota_llanta add constraint FK_RELATIONSHIP_16 foreign key (idflota)
      references flota (idflota) on delete restrict on update restrict;

alter table flota_llanta add constraint FK_RELATIONSHIP_17 foreign key (idllanta)
      references llanta (idllanta) on delete restrict on update restrict;

alter table guia add constraint FK_RELATIONSHIP_10 foreign key (idcliente)
      references cliente (idcliente) on delete restrict on update restrict;

alter table guia add constraint FK_RELATIONSHIP_11 foreign key (id_ruta)
      references ruta (id_ruta) on delete restrict on update restrict;

alter table guia add constraint FK_RELATIONSHIP_12 foreign key (idconductor)
      references conductor (idconductor) on delete restrict on update restrict;

alter table guia add constraint FK_RELATIONSHIP_9 foreign key (idflota)
      references flota (idflota) on delete restrict on update restrict;

alter table mantenimiento add constraint FK_RELATIONSHIP_8 foreign key (idllanta)
      references llanta (idllanta) on delete restrict on update restrict;

alter table ruta_lugar add constraint FK_RELATIONSHIP_14 foreign key (id_ruta)
      references ruta (id_ruta) on delete restrict on update restrict;

alter table ruta_lugar add constraint FK_RELATIONSHIP_15 foreign key (idlugar)
      references lugar (idlugar) on delete restrict on update restrict;

alter table usuario add constraint FK_RELATIONSHIP_13 foreign key (idtipousuario)
      references tipo_usuario (idtipousuario) on delete restrict on update restrict;

