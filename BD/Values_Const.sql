-- Inicio
INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
VALUES("1-0000","0","Inicio","url","icon-categorias","/Admin/Inicio","1");

-- Administracion
INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
VALUES("2-0000","0","Administración","btn","icon-user-tie","/Admin/Administracion/","1");

-- subAdministracion
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("2-1000","2","Distrito","url","icon-user-tie","/Admin/Administracion/Distrito/","1");
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("2-2000","2","Cuota","url","icon-user-tie","/Admin/Administracion/Cuota/","1");
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("2-3000","2","Proveedor","url","icon-user-tie","/Admin/Administracion/Proveedor/","1");
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("2-4000","2","Ubicación","url","icon-user-tie","/Admin/Administracion/Ubicacion/","0");
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("2-5000","2","Usuario","url","icon-user-tie","/Admin/Administracion/Usuario/","1");
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("2-6000","2","Sucursales","url","icon-user-tie","/Admin/Administracion/Sucursales/","1");
		
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("2-7000","2","Administrador","url","icon-user-tie","/Admin/Administracion/Administrador/","1");
-- maestro
INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
VALUES("3-0000","0","Maestro","btn","icon-profile","/Admin/Maestro/","1");

-- submaestro

	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("3-1000","3","Lugar","url","icon-user-tie","/Admin/Maestro/Lugar/","1");
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("3-2000","3","Provincia","url","icon-user-tie","/Admin/Maestro/Provincia/","1");
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("3-3000","3","Sexo","url","icon-user-tie","/Admin/Maestro/Sexo/","1");
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("3-4000","3","Tipo Item","url","icon-user-tie","/Admin/Maestro/TipoItem/","1");
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("3-5000","3","Marca","url","icon-user-tie","/Admin/Maestro/Marca/","1");
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("3-6000","3","Tipo Articulo","url","icon-user-tie","/Admin/Maestro/TipoArticulo/","1");
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("3-7000","3","Tipo Pedido","url","icon-user-tie","/Admin/Maestro/TipoPedido/","1");
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("3-8000","3","Forma Pago","url","icon-user-tie","/Admin/Maestro/FormaPago/","1");

-- almacen
INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
VALUES("4-0000","0","Almacén","btn","icon-home3","/Admin/Almacen/","1");

-- subalmacen
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("4-1000","4","Item","url","icon-user-tie","/Admin/Almacen/Item/","1");
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("42000","4","Articulo","url","icon-home3","/Admin/Almacen/Articulo/","1");
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("4-4000","4","Pedido","url","icon-home3","/Admin/Almacen/Pedido/","1");
		
		INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
		VALUES("4-4100","4-4","Pedidodetalle","url","icon-home3","/Admin/Almacen/Pedido/Pedidodetalle/","0");
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("4-5000","4","Inventario","url","icon-home3","/Admin/Almacen/Inventario/","1");
		
			INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
			VALUES("4-5100","4-5","InventarioDetalle","url","icon-home3","/Admin/Almacen/Inventario/InventarioDetalle/","0");
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("4-6000","4","Boleta","url","icon-user-tie","/Admin/Almacen/Boleta/","0");
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("4-7000","4","Factura","url","icon-user-tie","/Admin/Almacen/Factura/","0");
-- configuracion
INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
VALUES("5-0000","0","Configuración","btn","icon-cogs","/Admin/Configuracion/","1");

-- subconfiguracion
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("5-1000","5","Tipo Banner","url","icon-home3","/Admin/Configuracion/TipoBanner/","1");
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("5-2000","5","Banner","url","icon-home3","/Admin/Configuracion/Banner/","1");
	
	INSERT INTO tb_menu(	MEN_CodigoInterno,MEN_CodigoPadre,MEN_Nombre,MEN_Tipo,MEN_Icono,MEN_Ruta,MEN_Estado) 
	VALUES("5-3000","5","Menu","url","icon-home3","/Admin/Configuracion/Menu/","1");


-- sexo para el usuario
INSERT INTO tb_sexo(SEX_Nombre,SEX_Identificador,SEX_Estado)
VALUES("SIN SEXO","SS","3");

INSERT INTO tb_sexo(SEX_Nombre,SEX_Identificador,SEX_Estado)
VALUES("Masculino","M","1");

INSERT INTO tb_sexo(SEX_Nombre,SEX_Identificador,SEX_Estado)
VALUES("Femenino","F","1");

INSERT INTO tb_sexo(SEX_Nombre,SEX_Identificador,SEX_Estado)
VALUES("Otro","O","1");

INSERT INTO tb_sexo(SEX_Nombre,SEX_Identificador,SEX_Estado)
VALUES("Prefiero no decirlo","PD","1");

-- Distrito

INSERT INTO tb_distrito(DIS_Nombre,DIS_Estado)
VALUES("SIN DISTRITO","3");

INSERT INTO tb_distrito(DIS_Nombre,DIS_Estado)
VALUES("ATE","1");

INSERT INTO tb_distrito(DIS_Nombre,DIS_Estado)
VALUES("Cajamarquilla","1");

INSERT INTO tb_distrito(DIS_Nombre,DIS_Estado)
VALUES("Carapongo","1");

INSERT INTO tb_distrito(DIS_Nombre,DIS_Estado)
VALUES("Santa Anita ","1");

INSERT INTO tb_distrito(DIS_Nombre,DIS_Estado)
VALUES("San Juan de Lurig.","1");

INSERT INTO tb_distrito(DIS_Nombre,DIS_Estado)
VALUES("Rímac","1");

INSERT INTO tb_distrito(DIS_Nombre,DIS_Estado)
VALUES("El Agustino","1");

INSERT INTO tb_distrito(DIS_Nombre,DIS_Estado)
VALUES("La Victoria","1");

INSERT INTO tb_distrito(DIS_Nombre,DIS_Estado)
VALUES("Manchay","1");

INSERT INTO tb_distrito(DIS_Nombre,DIS_Estado)
VALUES("Lurín","1");

INSERT INTO tb_distrito(DIS_Nombre,DIS_Estado)
VALUES("Callao","1");

INSERT INTO tb_distrito(DIS_Nombre,DIS_Estado)
VALUES("San Martín de Porres","1");

INSERT INTO tb_distrito(DIS_Nombre,DIS_Estado)
VALUES("Puente Piedra","1");

INSERT INTO tb_distrito(DIS_Nombre,DIS_Estado)
VALUES("Huancayo","1");

-- Tipo Articulo

INSERT INTO  tb_tipoarticulo(TIPART_Nombre,TIPART_Estado)
VALUES("SIN TIPO ARTICULO","3");

INSERT INTO  tb_tipoarticulo(TIPART_Nombre,TIPART_Estado)
VALUES("Pizza","1");

INSERT INTO  tb_tipoarticulo(TIPART_Nombre,TIPART_Estado)
VALUES("Pasta","1");

INSERT INTO  tb_tipoarticulo(TIPART_Nombre,TIPART_Estado)
VALUES("Bebida","1");

-- Tipo Item

INSERT INTO tb_tipoitem(TIPIT_Nombre,TIPIT_Importancia,TIPIT_Seleccion,TIPIT_Estado)
VALUES("SIN TIPO ITEM","0","0","3");

INSERT INTO tb_tipoitem(TIPIT_Nombre,TIPIT_Importancia,TIPIT_Seleccion,TIPIT_Estado)
VALUES("Tamaño","1","0","1");

INSERT INTO tb_tipoitem(TIPIT_Nombre,TIPIT_Importancia,TIPIT_Seleccion,TIPIT_Estado)
VALUES("Masa","1","0","1");

INSERT INTO tb_tipoitem(TIPIT_Nombre,TIPIT_Importancia,TIPIT_Seleccion,TIPIT_Estado)
VALUES("Extras","0","1","1");

-- Otros
INSERT INTO tb_lugar(LUG_Nombre,LUG_Estado)
VALUES("SIN LUGAR","3");

INSERT INTO tb_provincia(PROV_Nombre,PROV_Estado)
VALUES("SIN PROVINCIA","3");

INSERT INTO tb_tipopedido(TIPPED_Nombre,TIPPED_Estado)
VALUES("SIN TIPO PEDIDO","3");

INSERT INTO tb_marca(MAR_Nombre,MAR_Estado)
VALUES("SIN MARCA","3");

INSERT INTO tb_item(ITEM_descripcion ,ITEM_precio,ITEM_Estado,TIPIT_CodigoInterno)
VALUES("SIN ITEM",0.00,"3",1);



INSERT INTO  tb_proveedor(PROV_Nombre,PROV_IDentificador,PROV_FechaRegistro,PROV_Estado)
VALUES("SIN PROVEEDOR","SP","2000/01/01","3");

INSERT INTO tb_formapago(FORM_Nombre,FORM_Identificador,FORM_Estado)
VALUES("SIN FORMA PAGO","SF","3");

INSERT INTO tb_articulo(ART_Nombre,ART_Descripcion,ART_Precio,ART_Stock,ART_FechaIngreso,
ART_Imagen,ART_Estado,TIPART_CodigoInterno,MAR_CodigoInterno,PROV_CodigoInterno)
VALUES("SIN ARTICULO","","0","0",CURRENT_DATE,"","3",1,1,1);

INSERT INTO tb_articuloitem(ITEM_CodigoInterno,ART_CodigoInterno,ARTIT_Estado)
VALUES(1,1,"3");


-- Administracion del menu
INSERT INTO tb_usuario(USU_DNI,USU_PriNombre,USU_SegNombre,USU_ApePaterno,USU_ApeMaterno,USU_Usuario,USU_Clave,USU_Token,USU_Telefono,USU_Correo,USU_FechaNacimiento,USU_FechaRegistro,USU_Estado,SEX_CodigoInterno) 
VALUES ("1234567","Admin","Admin","Admin","Admin","Admin","123","","000000","admin@gmail.com","2023/08/23","2023/08/23","1",1);
-- codigo:ADM-0001
INSERT INTO tb_administrador(ADM_CodigoInterno,USU_CodigoInterno,ADM_Write,ADM_READ,ADM_VIEW,ADM_CodigoConfirmacion,ADM_Ip,ADM_Estado) 
VALUES("0001",1,"1","1","1","123","192","1");

-- nulos

d