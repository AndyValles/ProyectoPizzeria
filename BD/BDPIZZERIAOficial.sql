create database BDPIZZALADELICIA;
use BDPIZZALADELICIA;

create table tb_lugar(
LUG_CodigoInterno int auto_increment primary key,
LUG_Nombre varchar(50),
LUG_Estado char(1) default '1'
);

create table tb_provincia(
PROV_CodigoInterno int auto_increment primary key,
PROV_Nombre varchar(50),
PROV_Estado char(1) default '1'
);

create table tb_distrito(
DIS_CodigoInterno int auto_increment primary key,
DIS_Nombre varchar(50),
DIS_Estado char(1) default '1'
);

create table tb_sexo(
SEX_CodigoInterno int auto_increment primary key,
SEX_Nombre varchar(50),
SEX_Identificador VARCHAR(5),
SEX_Estado char(1) default '1'
);

-- modificar
create table tb_tipoitem(
TIPIT_CodigoInterno int auto_increment primary key,
TIPIT_Nombre varchar(50) DEFAULT 'masa',
TIPIT_Importancia char(1) default '1',
TIPIT_seleccion char(1) default '1' ,
TIPIT_Estado char(1) default '1'
);

create table tb_marca(
MAR_CodigoInterno int auto_increment primary key,
MAR_Nombre varchar(50),
MAR_Estado char(1) default '1'
);

CREATE TABLE tb_cuotakm(
CKM_CodigoInterno INT AUTO_INCREMENT PRIMARY KEY,
CKM_Precio decimal(8,2),
CKM_Metros decimal(8,2) DEFAULT 1,
CKM_estado CHAR(1) DEFAULT '1'
);

create table tb_item(
ITEM_CodigoInterno int auto_increment primary key,
ITEM_Descripcion varchar(50),
ITEM_precio decimal(8,2),
ITEM_Estado char(1) default '1',
TIPIT_CodigoInterno INT,
FOREIGN KEY(TIPIT_CodigoInterno) REFERENCES tb_tipoitem(TIPIT_CodigoInterno)
);


create table tb_tipoarticulo(
TIPART_CodigoInterno int auto_increment primary key,
TIPART_Nombre varchar(50),
TIPART_Estado char(1) default '1'
);

create table tb_tipopedido(
TIPPED_CodigoInterno int auto_increment primary key,
TIPPED_Nombre varchar(50),
TIPPED_Estado char(1) default '1'
);

create table tb_proveedor(
	PROV_CodigoInterno int auto_increment primary key,
	PROV_Nombre varchar(100),
	PROV_IDentificador varchar(5),
	PROV_FechaRegistro DATE,
	PROV_Estado char(1) default '1'
);

create table tb_formapago(
	FORM_CodigoInterno int auto_increment primary key,
	FORM_Nombre varchar(100),
	FORM_Identificador CHAR(5),
	FORM_Estado char(1) default '1'
);


create table tb_ubicacion(
UBI_CodigoInterno int auto_increment primary key,
LUG_CodigoInterno int,
PROV_CodigoInterno int,
DIS_CodigoInterno int,
UBI_Direccion varchar(200),
UBI_Calle varchar(200),
UBI_Numero varchar(200),
UBI_Referencia varchar(500),
USU_CodigoInterno int,
UBI_Estado char(1) default '1',
foreign key (LUG_CodigoInterno) references tb_lugar(LUG_CodigoInterno),
foreign key (PROV_CodigoInterno) references tb_provincia(PROV_CodigoInterno),
foreign key (DIS_CodigoInterno) references tb_distrito(DIS_CodigoInterno)
);


create table tb_usuario(
USU_CodigoInterno int auto_increment primary key,
USU_DNI VARCHAR(10),
USU_PriNombre varchar(500),
USU_SegNombre varchar(500),
USU_ApePaterno varchar(500),
USU_ApeMaterno varchar(500),
USU_Usuario varchar(500),
USU_Clave varchar(500),
USU_Token varchar(20),
USU_Telefono varchar(9),
USU_Correo varchar(200),
USU_FechaNacimiento date,
USU_FechaRegistro date,
USU_Estado char(1) default '1',
SEX_CodigoInterno int,
foreign key (SEX_CodigoInterno) references tb_sexo (SEX_CodigoInterno)
);

create table tb_administrador(
ADM_CodigoInterno VARCHAR(50) primary key,
USU_CodigoInterno int,
ADM_Write char(1) default '0',
ADM_READ char(1) default '0',
ADM_VIEW char(1) default '0',
ADM_CodigoConfirmacion varchar(10),
ADM_Ip VARCHAR(500),
ADM_Estado char(1) default '0',
foreign key (USU_CodigoInterno) references tb_usuario (USU_CodigoInterno)
);

create table tb_articulo(
ART_CodigoInterno int auto_increment primary key,
ART_Nombre varchar(500),
ART_Descripcion varchar(500),
ART_Precio decimal(8,2),
ART_Stock int,
ART_FechaIngreso date,
ART_Imagen varchar(100),
ART_Estado char(1) default '1',
TIPART_CodigoInterno int,
MAR_CodigoInterno int,
PROV_CodigoInterno INT,
foreign key (MAR_CodigoInterno) references tb_marca (MAR_CodigoInterno),
foreign key (TIPART_CodigoInterno) references tb_tipoarticulo (TIPART_CodigoInterno),
foreign key (PROV_CodigoInterno) references tb_proveedor (PROV_CodigoInterno)
);


create table tb_articuloitem(
ARTIT_CodigoInterno int auto_increment primary key,
ITEM_CodigoInterno int,
ART_CodigoInterno INT,
ARTIT_Estado char(1) default '1',
foreign key (ITEM_CodigoInterno) references tb_item (ITEM_CodigoInterno),
foreign key (ART_CodigoInterno) references tb_articulo (ART_CodigoInterno)
);

create table tb_sucursal(
SUC_CodigoInterno int auto_increment primary key,
DIS_CodigoInterno INT,
SUC_Referencia varchar(500),
SUC_Direccion varchar(500),
SUC_HorasAtencion varchar(500),
SUC_Telefono varchar(500),
SUC_URL VARCHAR(500),
SUC_Estado char(1) default '1',
foreign key (DIS_CodigoInterno) references tb_distrito(DIS_CodigoInterno)
);



create table tb_pedido(
PED_CodigoInterno int auto_increment primary key,
PED_Numero varchar(100),
PED_Total decimal(8,2),
PED_Descuento decimal(8,2),
PED_FechaRegistro date,
FORM_CodigoInterno int,
USU_CodigoInterno int,
TIPPED_CodigoInterno INT,
PED_Comentario VARCHAR(500),
PED_Estado char(1) default '1',

foreign key (USU_CodigoInterno) references tb_usuario (USU_CodigoInterno),
foreign key (TIPPED_CodigoInterno) references tb_tipopedido (TIPPED_CodigoInterno),
foreign key (FORM_CodigoInterno) references tb_formapago (FORM_CodigoInterno)
);

create table tb_pedidodetalle(
PEDDET_CodigoInterno int auto_increment primary key,
PED_CodigoInterno int,
ART_CodigoInterno INT,
ARTIT_CodigoInterno INT,
PEDDET_FechaRegistro DATE,
PEDDET_Cantidad INT,
foreign key (PED_CodigoInterno) references tb_pedido (PED_CodigoInterno),
foreign key (ARTIT_CodigoInterno) references tb_articuloitem (ARTIT_CodigoInterno),
foreign key (ART_CodigoInterno) references tb_articulo (ART_CodigoInterno)
);


CREATE TABLE tb_tipobanner(
	TIPBAN_CodigoInterno INT auto_increment  PRIMARY KEY,
	TIPBAN_Nombre VARCHAR(100),
	TIPBAN_Html VARCHAR(500),
	TIPBAN_cantidad INT,
	TIPBAN_Estado CHAR(1) DEFAULT '1'
);


CREATE TABLE tb_banner(
	BAN_CodigoInterno VARCHAR(7) PRIMARY KEY,
	BAN_Imagen VARCHAR(100),
	BAN_Ruta VARCHAR(500),
	TIPBAN_CodigoInterno INT,
	ART_CodigoInterno int,
   BAN_Estado CHAR(1) DEFAULT '1',
	foreign key (TIPBAN_CodigoInterno) references tb_tipobanner (TIPBAN_CodigoInterno),
	foreign key (ART_CodigoInterno) references tb_articulo (ART_CodigoInterno)
);


CREATE TABLE tb_menu(
	MEN_CodigoInterno VARCHAR(7) PRIMARY KEY,
	MEN_CodigoPadre VARCHAR(7),
	MEN_Nombre VARCHAR(50),
	MEN_Tipo VARCHAR(10),
	MEN_Icono VARCHAR(100),
	MEN_Ruta VARCHAR(500),
   MEN_Estado CHAR(1) DEFAULT '1'
);


CREATE TABLE tb_inventario(
	INV_CodigoInterno VARCHAR(15) PRIMARY KEY,
	INV_FechaRegistro date,
	INV_StockModificado INT,
	ART_CodigoInterno INT,
	ITEM_CodigoInterno INT,
   INV_Estado CHAR(1) DEFAULT '1',
	foreign key (ART_CodigoInterno) references tb_articulo (ART_CodigoInterno),
	foreign key (ITEM_CodigoInterno) references tb_item (ITEM_CodigoInterno)
);


CREATE TABLE tb_inventariodetalle(
	INVDET_CodigoInterno INT auto_increment PRIMARY KEY,
	INVDET_FechaRegistro date,
	INVDET_FechaModificacion date,
	INVDET_StockIngreso INT,
	INVDET_StockModificado INT,
	INV_CodigoInterno VARCHAR(7) ,
	foreign key (INV_CodigoInterno) references tb_inventario (INV_CodigoInterno)
);

CREATE TABLE tb_boleta(
	BOL_CodigoInterno VARCHAR(7) PRIMARY KEY,
	BOL_Numero VARCHAR(10),
	BOL_Serie VARCHAR(3),
	BOL_FechaRegistro int,
	BOL_Total decimal(8,2),
   PED_CodigoInterno INT,
   SUC_CodigoInterno int,
	foreign key (PED_CodigoInterno) references tb_pedido (PED_CodigoInterno),
	foreign key (SUC_CodigoInterno) references tb_sucursal (SUC_CodigoInterno)
);

CREATE TABLE tb_factura(
	FAC_CodigoInterno VARCHAR(7) PRIMARY KEY,
	FAC_FechaRegistro int,
	FAC_Descuento decimal(8,2),
	FAC_IGV decimal(8,2),
	FAC_Total decimal(8,2),
	PED_CodigoInterno INT,
   SUC_CodigoInterno int,
	foreign key (PED_CodigoInterno) references tb_pedido (PED_CodigoInterno),
	foreign key (SUC_CodigoInterno) references tb_sucursal (SUC_CodigoInterno)
);















"127.0.0"