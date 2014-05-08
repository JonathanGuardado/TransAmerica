/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     08/05/2014 12:21:37 p.m.                     */
/*==============================================================*/


drop table if exists cabezal;

drop table if exists chasis;

drop table if exists cliente;

drop table if exists conductor;

drop table if exists contenedor;

drop table if exists flota;

drop table if exists flota_llanta;

drop table if exists llanta;

drop table if exists lugar;

drop table if exists mantenimiento;

drop table if exists opcion_tipo;

drop table if exists opciones;

drop table if exists proveedor_llanta;

drop table if exists reencauche;

drop table if exists ruta;

drop table if exists ruta_lugar;

drop table if exists tipo_usuario;

drop table if exists usuario;

drop table if exists viaje;

/*==============================================================*/
/* Table: cabezal                                               */
/*==============================================================*/
create table cabezal
(
   idcabezal            int(11) not null auto_increment,
   identificador        int not null,
   marca                varchar(100),
   kilometraje_actual   float,
   estado_cabezal       varchar(1),
   primary key (idcabezal)
);

/*==============================================================*/
/* Table: chasis                                                */
/*==============================================================*/
create table chasis
(
   idchasis             int(11) not null auto_increment,
   placa                varchar(100),
   marca                varchar(100),
   descripcion          varchar(100),
   estado_chasis        varchar(1),
   primary key (idchasis)
);

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
   estado_cliente       varchar(1),
   primary key (idcliente)
);

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

/*==============================================================*/
/* Table: flota                                                 */
/*==============================================================*/
create table flota
(
   idflota              int(11) not null auto_increment,
   idchasis             int(11),
   idcontenedor         int(11),
   idconductor          int(11),
   idcabezal            int(11),
   primary key (idflota)
);

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
/* Table: llanta                                                */
/*==============================================================*/
create table llanta
(
   idllanta             varchar(15) not null,
   id_proveedor         int,
   id_reencauche        int,
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
   ciudad               varchar(100),
   pais                 varchar(100),
   primary key (idlugar)
);

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
/* Table: opcion_tipo                                           */
/*==============================================================*/
create table opcion_tipo
(
   id_opcion_tipo       int not null auto_increment,
   idtipousuario        int(11),
   id_opcion            int,
   primary key (id_opcion_tipo)
);

/*==============================================================*/
/* Table: opciones                                              */
/*==============================================================*/
create table opciones
(
   id_opcion            int not null auto_increment,
   descripcion_opcion   varchar(200),
   primary key (id_opcion)
);

/*==============================================================*/
/* Table: proveedor_llanta                                      */
/*==============================================================*/
create table proveedor_llanta
(
   id_proveedor         int not null auto_increment,
   nombre_proveedor     varchar(250),
   direccion_proveedor  varchar(250),
   telefono_proveedor   varchar(15),
   estado_proveedor     varchar(1),
   primary key (id_proveedor)
);

/*==============================================================*/
/* Table: reencauche                                            */
/*==============================================================*/
create table reencauche
(
   id_reencauche        int not null auto_increment,
   fecha_reencauche     date,
   lugar_reencauche     varchar(200),
   total_reencauche     float,
   observacion_re       varchar(500),
   primary key (id_reencauche)
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

/*==============================================================*/
/* Table: viaje                                                 */
/*==============================================================*/
create table viaje
(
   idviaje              int(11) not null auto_increment,
   idconductor          int(11),
   idflota              int(11),
   idcliente            int(11),
   id_ruta              int(11),
   fecha_viaje          date not null,
   tipo_viaje           varchar(100) not null,
   gasolina_asignada    float,
   marchamos            varchar(10),
   primary key (idviaje)
);

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

alter table llanta add constraint FK_REFERENCE_15 foreign key (id_reencauche)
      references reencauche (id_reencauche) on delete restrict on update restrict;

alter table llanta add constraint FK_REFERENCE_16 foreign key (id_proveedor)
      references proveedor_llanta (id_proveedor) on delete restrict on update restrict;

alter table mantenimiento add constraint FK_RELATIONSHIP_8 foreign key (idllanta)
      references llanta (idllanta) on delete restrict on update restrict;

alter table opcion_tipo add constraint FK_REFERENCE_17 foreign key (id_opcion)
      references opciones (id_opcion) on delete restrict on update restrict;

alter table opcion_tipo add constraint FK_REFERENCE_18 foreign key (idtipousuario)
      references tipo_usuario (idtipousuario) on delete restrict on update restrict;

alter table ruta_lugar add constraint FK_RELATIONSHIP_14 foreign key (id_ruta)
      references ruta (id_ruta) on delete restrict on update restrict;

alter table ruta_lugar add constraint FK_RELATIONSHIP_15 foreign key (idlugar)
      references lugar (idlugar) on delete restrict on update restrict;

alter table usuario add constraint FK_RELATIONSHIP_13 foreign key (idtipousuario)
      references tipo_usuario (idtipousuario) on delete restrict on update restrict;

alter table viaje add constraint FK_RELATIONSHIP_10 foreign key (idcliente)
      references cliente (idcliente) on delete restrict on update restrict;

alter table viaje add constraint FK_RELATIONSHIP_11 foreign key (id_ruta)
      references ruta (id_ruta) on delete restrict on update restrict;

alter table viaje add constraint FK_RELATIONSHIP_12 foreign key (idconductor)
      references conductor (idconductor) on delete restrict on update restrict;

alter table viaje add constraint FK_RELATIONSHIP_9 foreign key (idflota)
      references flota (idflota) on delete restrict on update restrict;

