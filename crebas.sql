/*==============================================================*/
/* DBMS name:      MySQL 4.0                                    */
/* Created on:     07/05/2014 12:03:56 p.m.                     */
/*==============================================================*/


drop table if exists cabezal;

drop table if exists chasis;

drop table if exists cliente;

drop table if exists conductor;

drop table if exists contenedor;

drop index RELATIONSHIP_7_FK on flota;

drop index RELATIONSHIP_6_FK on flota;

drop index RELATIONSHIP_5_FK on flota;

drop table if exists flota;

drop index RELATIONSHIP_17_FK on flota_llanta;

drop index RELATIONSHIP_16_FK on flota_llanta;

drop table if exists flota_llanta;

drop index RELATIONSHIP_12_FK on guia;

drop index RELATIONSHIP_11_FK on guia;

drop index RELATIONSHIP_10_FK on guia;

drop index RELATIONSHIP_9_FK on guia;

drop table if exists guia;

drop table if exists llanta;

drop table if exists lugar;

drop index RELATIONSHIP_8_FK on mantenimiento;

drop table if exists mantenimiento;

drop index RELATIONSHIP_14_FK on ruta;

drop table if exists ruta;

drop index RELATIONSHIP_15_FK on ruta_lugar;

drop table if exists ruta_lugar;

drop table if exists tipo_usuario;

drop index RELATIONSHIP_13_FK on usuario;

drop table if exists usuario;

/*==============================================================*/
/* Table: cabezal                                               */
/*==============================================================*/
create table cabezal
(
   idcabezal                      int(11)                        not null AUTO_INCREMENT,
   identificador                  int                            not null,
   marca                          varchar(100),
   kilometraje_actual             float,
   primary key (idcabezal)
)
type = InnoDB;

/*==============================================================*/
/* Table: chasis                                                */
/*==============================================================*/
create table chasis
(
   idchasis                       int(11)                        not null AUTO_INCREMENT,
   placa                          varchar(100),
   marca                          varchar(100),
   descripcion                    varchar(100),
   primary key (idchasis)
)
type = InnoDB;

/*==============================================================*/
/* Table: cliente                                               */
/*==============================================================*/
create table cliente
(
   idcliente                      int(11)                        not null AUTO_INCREMENT,
   nombre_empresa                 varchar(300)                   not null,
   nombre_contacto                varchar(450),
   telefono_contacto              varchar(16)                    not null,
   tarifa                         float                          not null,
   fecha_ingreso_cliente          date,
   primary key (idcliente)
)
type = InnoDB;

/*==============================================================*/
/* Table: conductor                                             */
/*==============================================================*/
create table conductor
(
   idconductor                    int(11)                        not null AUTO_INCREMENT,
   nombre_conductor               varchar(150)                   not null,
   apellido_conductor             varchar(150)                   not null,
   dui                            varchar(10)                    not null,
   nit                            varchar(17)                    not null,
   fecha_nacimiento               date,
   fecha_ingreso_cond             date                           not null,
   fecha_fin_cond                 date,
   estado_conductor               varchar(45)                    not null,
   primary key (idconductor)
)
type = InnoDB;

/*==============================================================*/
/* Table: contenedor                                            */
/*==============================================================*/
create table contenedor
(
   idcontenedor                   int(11)                        not null AUTO_INCREMENT,
   descripcion_contenedor         varchar(500)                   not null,
   tipo_contenedor                varchar(200),
   primary key (idcontenedor)
)
type = InnoDB;

/*==============================================================*/
/* Table: flota                                                 */
/*==============================================================*/
create table flota
(
   idflota                        int(11)                        not null AUTO_INCREMENT,
   idchasis                       int(11),
   idcabezal                      int(11),
   idcontenedor                   int(11),
   primary key (idflota)
)
type = InnoDB;

/*==============================================================*/
/* Index: RELATIONSHIP_5_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_5_FK on flota
(
   idchasis
);

/*==============================================================*/
/* Index: RELATIONSHIP_6_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_6_FK on flota
(
   idcabezal
);

/*==============================================================*/
/* Index: RELATIONSHIP_7_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_7_FK on flota
(
   idcontenedor
);

/*==============================================================*/
/* Table: flota_llanta                                          */
/*==============================================================*/
create table flota_llanta
(
   idflotallanta                  int                            not null AUTO_INCREMENT,
   idllanta                       varchar(15),
   idflota                        int(11),
   primary key (idflotallanta)
)
type = InnoDB;

/*==============================================================*/
/* Index: RELATIONSHIP_16_FK                                    */
/*==============================================================*/
create index RELATIONSHIP_16_FK on flota_llanta
(
   idflota
);

/*==============================================================*/
/* Index: RELATIONSHIP_17_FK                                    */
/*==============================================================*/
create index RELATIONSHIP_17_FK on flota_llanta
(
   idllanta
);

/*==============================================================*/
/* Table: guia                                                  */
/*==============================================================*/
create table guia
(
   idguia                         int(11)                        not null AUTO_INCREMENT,
   id_ruta                        int(11),
   idconductor                    int(11),
   idflota                        int(11),
   idcliente                      int(11),
   fecha_viaje                    date                           not null,
   tipo_viaje                     varchar(100)                   not null,
   gasolina_asignada              float,
   marchamos                      varchar(10),
   primary key (idguia)
)
type = InnoDB;

/*==============================================================*/
/* Index: RELATIONSHIP_9_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_9_FK on guia
(
   idflota
);

/*==============================================================*/
/* Index: RELATIONSHIP_10_FK                                    */
/*==============================================================*/
create index RELATIONSHIP_10_FK on guia
(
   idcliente
);

/*==============================================================*/
/* Index: RELATIONSHIP_11_FK                                    */
/*==============================================================*/
create index RELATIONSHIP_11_FK on guia
(
   id_ruta
);

/*==============================================================*/
/* Index: RELATIONSHIP_12_FK                                    */
/*==============================================================*/
create index RELATIONSHIP_12_FK on guia
(
   idconductor
);

/*==============================================================*/
/* Table: llanta                                                */
/*==============================================================*/
create table llanta
(
   idllanta                       varchar(15)                    not null,
   descripcion_llanta             varchar(150)                   not null,
   serie_llanta                   varchar(6)                     not null,
   ubicacion_llanta               varchar(45)                    not null,
   tamanio_llanta                 float                          not null,
   marca_llanta                   varchar(45)                    not null,
   estado_llanta                  varchar(45)                    not null,
   fecha_asignacion               date,
   fecha_compra                   date                           not null,
   fecha_desecho                  date,
   primary key (idllanta)
)
type = InnoDB;

/*==============================================================*/
/* Table: lugar                                                 */
/*==============================================================*/
create table lugar
(
   idlugar                        int(11)                        not null AUTO_INCREMENT,
   nombre                         varchar(100)                   not null,
   primary key (idlugar)
)
type = InnoDB;

/*==============================================================*/
/* Table: mantenimiento                                         */
/*==============================================================*/
create table mantenimiento
(
   idmantenimiento                int(11)                        not null AUTO_INCREMENT,
   idllanta                       varchar(15),
   fecha_mantenimiento            date                           not null,
   descripcion_mtto               varchar(200)                   not null,
   primary key (idmantenimiento)
)
type = InnoDB;

/*==============================================================*/
/* Index: RELATIONSHIP_8_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_8_FK on mantenimiento
(
   idllanta
);

/*==============================================================*/
/* Table: ruta                                                  */
/*==============================================================*/
create table ruta
(
   id_ruta                        int(11)                        not null AUTO_INCREMENT,
   idrutalugar                    int,
   descripcion                    varchar(200)                   not null,
   tiempo_estimado                time                           not null,
   distancia_km                   float                          not null,
   gasolina_estimada              float                          not null,
   primary key (id_ruta)
)
type = InnoDB;

/*==============================================================*/
/* Index: RELATIONSHIP_14_FK                                    */
/*==============================================================*/
create index RELATIONSHIP_14_FK on ruta
(
   idrutalugar
);

/*==============================================================*/
/* Table: ruta_lugar                                            */
/*==============================================================*/
create table ruta_lugar
(
   idrutalugar                    int                            not null AUTO_INCREMENT,
   idlugar                        int(11),
   opcionruta                     int,
   primary key (idrutalugar)
)
type = InnoDB;

/*==============================================================*/
/* Index: RELATIONSHIP_15_FK                                    */
/*==============================================================*/
create index RELATIONSHIP_15_FK on ruta_lugar
(
   idlugar
);

/*==============================================================*/
/* Table: tipo_usuario                                          */
/*==============================================================*/
create table tipo_usuario
(
   idtipousuario                  int(11)                        not null AUTO_INCREMENT,
   tipo_usuario                   varchar(45)                    not null,
   nivel_acceso                   varchar(45)                    not null,
   primary key (idtipousuario)
)
type = InnoDB;

/*==============================================================*/
/* Table: usuario                                               */
/*==============================================================*/
create table usuario
(
   idusuario                      int(11)                        not null AUTO_INCREMENT,
   idtipousuario                  int(11),
   nombre_usuario                 varchar(150)                   not null,
   usuario                        varchar(45)                    not null,
   clave                          varchar(45)                    not null,
   fecha_ingreso_user             date                           not null,
   estado_usuario                 varchar(45)                    not null,
   primary key (idusuario)
)
type = InnoDB;

/*==============================================================*/
/* Index: RELATIONSHIP_13_FK                                    */
/*==============================================================*/
create index RELATIONSHIP_13_FK on usuario
(
   idtipousuario
);

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

alter table ruta add constraint FK_RELATIONSHIP_14 foreign key (idrutalugar)
      references ruta_lugar (idrutalugar) on delete restrict on update restrict;

alter table ruta_lugar add constraint FK_RELATIONSHIP_15 foreign key (idlugar)
      references lugar (idlugar) on delete restrict on update restrict;

alter table usuario add constraint FK_RELATIONSHIP_13 foreign key (idtipousuario)
      references tipo_usuario (idtipousuario) on delete restrict on update restrict;

