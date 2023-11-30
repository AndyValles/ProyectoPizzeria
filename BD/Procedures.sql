


delimiter //
CREATE  PROCEDURE PROCEDURE_CRUD_Lugar(tipo VARCHAR(1),codigo int,nombre VARCHAR(50),estado CHAR(1))
BEGIN
DECLARE exist INT;
DECLARE reg INT;
SET exist = (SELECT COUNT(*) FROM tb_lugar WHERE LUG_Nombre=nombre);


		if(tipo="C") then
			if (exist=0) then
				INSERT INTO tb_lugar(LUG_CodigoInterno,LUG_Nombre,LUG_Estado) VALUES(codigo,nombre,"1");
			else
			SET reg = (SELECT LUG_CodigoInterno FROM tb_lugar WHERE LUG_Nombre=nombre ORDER BY LUG_CodigoInterno DESC LIMIT 1);
				UPDATE tb_lugar set
					LUG_Estado="1"
					where	LUG_CodigoInterno=reg;
			END if;
			
		end if;
		if(tipo="U") then
			UPDATE tb_lugar set
				LUG_Nombre=nombre,
				LUG_Estado=estado
				where	LUG_CodigoInterno=codigo;
		end if;
		if(tipo="D") then
			UPDATE tb_lugar set
			LUG_Estado="0"
			where	LUG_CodigoInterno=codigo;
		end if;
		if(tipo="E") then
			DELETE FROM tb_lugar where	LUG_CodigoInterno=codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Lugar(tipo VARCHAR(1), codigo VARCHAR(13),nombre VARCHAR(55),estado varchar(5),NOffset INT,Nrows INT)
BEGIN
	if(tipo="T")then
		SELECT LUG_CodigoInterno,LUG_Nombre,LUG_Estado  FROM tb_lugar WHERE LUG_CodigoInterno LIKE codigo AND LUG_Nombre LIKE nombre AND LUG_Estado LIKE estado
		ORDER BY LUG_CodigoInterno  LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo="P")then
		SELECT COUNT(*) AS 'COUNT'   FROM tb_lugar WHERE LUG_CodigoInterno LIKE codigo AND LUG_Nombre LIKE nombre AND LUG_Estado LIKE estado;
	end if;
END //
delimiter;


delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Provincia(tipo VARCHAR(1),codigo int,nombre VARCHAR(50),estado CHAR(1))
BEGIN
		if(tipo="C") then
			INSERT INTO tb_provincia(PROV_CodigoInterno,PROV_Nombre,PROV_Estado) VALUES(codigo,nombre,"1");
		end if;
		if(tipo="U") then
			UPDATE tb_provincia set
				PROV_Nombre=nombre,
				PROV_Estado=estado
				where	PROV_CodigoInterno=codigo;
		end if;
		if(tipo="D") then
			UPDATE tb_provincia set
			PROV_Estado="0"
			where	PROV_CodigoInterno=codigo;
		end if;
		if(tipo="E") then
			DELETE FROM tb_provincia where	PROV_CodigoInterno=codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Provincia(tipo VARCHAR(1), codigo VARCHAR(13),nombre VARCHAR(55),estado varchar(5),NOffset INT,Nrows INT)
BEGIN
	if(tipo="T")then
		SELECT PROV_CodigoInterno,PROV_Nombre,PROV_Estado  FROM tb_provincia WHERE PROV_CodigoInterno LIKE codigo AND PROV_Nombre LIKE nombre AND PROV_Estado LIKE estado
		ORDER BY PROV_CodigoInterno  LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo="P")then
		SELECT COUNT(*) AS 'COUNT'  FROM tb_provincia WHERE PROV_CodigoInterno LIKE codigo AND PROV_Nombre LIKE nombre AND PROV_Estado LIKE estado;
	end if;
END //
delimiter;

delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Distrito(tipo VARCHAR(1),codigo int,nombre VARCHAR(50),estado CHAR(1))
BEGIN
		if(tipo="C") then
			INSERT INTO tb_distrito(DIS_CodigoInterno,DIS_Nombre,DIS_Estado) VALUES(codigo,nombre,"1");
		end if;
		if(tipo="U") then
			UPDATE tb_distrito set
				DIS_Nombre=nombre,
				DIS_Estado=estado
				where	DIS_CodigoInterno=codigo;
		end if;
		if(tipo="D") then
			UPDATE tb_distrito set
			DIS_Estado="0"
			where	DIS_CodigoInterno=codigo;
		end if;
		if(tipo="E") then
			DELETE FROM tb_distrito where	DIS_CodigoInterno=codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Distrito(tipo VARCHAR(1), codigo VARCHAR(13),nombre VARCHAR(55),estado varchar(5),NOffset INT,Nrows INT)
BEGIN
	if(tipo="T")then
		SELECT DIS_CodigoInterno,DIS_Nombre,DIS_Estado  FROM tb_distrito WHERE DIS_CodigoInterno LIKE codigo AND DIS_Nombre LIKE nombre AND DIS_Estado LIKE estado
		ORDER BY DIS_CodigoInterno  LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo="P")then
		SELECT COUNT(*) AS 'COUNT'  FROM tb_distrito WHERE DIS_CodigoInterno LIKE codigo AND DIS_Nombre LIKE nombre AND DIS_Estado LIKE estado;
	end if;
END //
delimiter;

delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Sexo(tipo VARCHAR(1),codigo int,nombre varchar(50),identificador varchar(5),estado CHAR(1))
BEGIN
		if(tipo="C") then
			INSERT INTO tb_sexo(SEX_CodigoInterno,SEX_Nombre,SEX_Identificador,SEX_Estado) VALUES(codigo,nombre,identificador,"1");
		end if;
		if(tipo="U") then
			UPDATE tb_sexo set
				SEX_Nombre=nombre,
                SEX_Identificador=identificador,
				SEX_Estado=estado
				where	SEX_CodigoInterno=codigo;
		end if;
		if(tipo="D") then
			UPDATE tb_sexo set
			SEX_Estado="0"
			where	SEX_CodigoInterno=codigo;
		end if;
		if(tipo="E") then
			DELETE FROM tb_sexo where	SEX_CodigoInterno=codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Sexo(tipo VARCHAR(1), codigo VARCHAR(13),nombre varchar(50),identificador varchar(8),estado varchar(5),NOffset INT,Nrows INT)
BEGIN
	if(tipo="T")then
		SELECT SEX_CodigoInterno,SEX_Nombre,SEX_Identificador,SEX_Estado  FROM tb_sexo WHERE SEX_CodigoInterno LIKE codigo AND SEX_Nombre LIKE nombre and SEX_Identificador like identificador AND SEX_Estado LIKE estado
		ORDER BY SEX_CodigoInterno  LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo="P")then
		SELECT COUNT(*) AS 'COUNT'  FROM tb_sexo WHERE SEX_CodigoInterno LIKE codigo AND SEX_Nombre LIKE nombre AND SEX_Estado LIKE estado;
	end if;
END //
delimiter;

delimiter //
CREATE  PROCEDURE PROCEDURE_CRUD_Tipoarticulo(tipo VARCHAR(1),codigo int,nombre VARCHAR(50),estado CHAR(1))
BEGIN
		if(tipo="C") then
			INSERT INTO tb_tipoarticulo(TIPART_CodigoInterno,TIPART_Nombre,TIPART_Estado) VALUES(codigo,nombre,"1");
		end if;
		if(tipo="U") then
			UPDATE tb_tipoarticulo set
				TIPART_Nombre=nombre,
				TIPART_Estado=estado
				where	TIPART_CodigoInterno=codigo;
		end if;
		if(tipo="D") then
			UPDATE tb_tipoarticulo set
			TIPART_Estado="0"
			where	TIPART_CodigoInterno=codigo;
		end if;
		if(tipo="E") then
			DELETE FROM tb_tipoarticulo where	TIPART_CodigoInterno=codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Tipoarticulo(tipo VARCHAR(1), codigo VARCHAR(13),nombre VARCHAR(55),estado varchar(5),NOffset INT,Nrows INT)
BEGIN
	if(tipo="T")then
		SELECT TIPART_CodigoInterno,TIPART_Nombre,TIPART_Estado  FROM tb_tipoarticulo tp 
		 WHERE tp.TIPART_CodigoInterno LIKE codigo 
		 AND tp.TIPART_Nombre LIKE nombre 
		 AND tp.TIPART_Estado LIKE estado
		ORDER BY tp.TIPART_CodigoInterno  LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo="P")then
		SELECT COUNT(*) AS 'COUNT'  FROM tb_tipoarticulo tp   
		WHERE tp.TIPART_CodigoInterno  LIKE codigo 
		AND tp.TIPART_Nombre LIKE nombre 
		AND tp.TIPART_Estado LIKE estado;
	end if;
END //
delimiter;
delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Tipopedido(tipo VARCHAR(1),codigo int,nombre VARCHAR(50),estado CHAR(1))
BEGIN
		if(tipo="C") then
			INSERT INTO tb_tipopedido(TIPPED_CodigoInterno,TIPPED_Nombre,TIPPED_Estado) VALUES(codigo,nombre,"1");
		end if;
		if(tipo="U") then
			UPDATE tb_tipopedido set
				TIPPED_Nombre=nombre,
				TIPPED_Estado=estado
				where	TIPPED_CodigoInterno=codigo;
		end if;
		if(tipo="D") then
			UPDATE tb_tipopedido set
			TIPPED_Estado="0"
			where	TIPPED_CodigoInterno=codigo;
		end if;
		if(tipo="E") then
			DELETE FROM tb_tipopedido where	TIPPED_CodigoInterno=codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Tipopedido(tipo VARCHAR(1), codigo VARCHAR(13),nombre VARCHAR(55),estado varchar(5),NOffset INT,Nrows INT)
BEGIN
	if(tipo="T")then
		SELECT TIPPED_CodigoInterno,TIPPED_Nombre,TIPPED_Estado  FROM tb_tipopedido WHERE TIPPED_CodigoInterno LIKE codigo AND TIPPED_Nombre LIKE nombre AND TIPPED_Estado LIKE estado
		ORDER BY TIPPED_CodigoInterno  LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo="P")then
		SELECT COUNT(*) AS 'COUNT'  FROM tb_tipopedido WHERE TIPPED_CodigoInterno LIKE codigo AND TIPPED_Nombre LIKE nombre AND TIPPED_Estado LIKE estado;
	end if;
END //
delimiter;
delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Tipoitem(tipo VARCHAR(1),codigo int,nombre VARCHAR(50),Importancia CHAR(1),
seleccion CHAR(1) ,estado CHAR(1))
BEGIN
		if(tipo="C") then
			INSERT INTO tb_tipoitem(TIPIT_CodigoInterno,TIPIT_Nombre,TIPIT_Importancia,TIPIT_seleccion,TIPIT_Estado) VALUES(codigo,nombre,Importancia,seleccion,"1");
		end if;
		if(tipo="U") then
			UPDATE tb_tipoitem set
				TIPIT_Nombre=nombre,
				TIPIT_Importancia=Importancia,
				TIPIT_seleccion=seleccion,
				TIPIT_Estado=estado
				where	TIPIT_CodigoInterno=codigo;
		end if;
		if(tipo="D") then
			UPDATE tb_tipoitem set
			TIPIT_Estado="0"
			where	TIPIT_CodigoInterno=codigo;
		end if;
		if(tipo="E") then
			DELETE FROM tb_tipoitem where	TIPIT_CodigoInterno=codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE  PROCEDURE PROCEDURE_SELECT_Tipoitem(tipo VARCHAR(1), codigo VARCHAR(13),nombre VARCHAR(55),estado varchar(5),NOffset INT,Nrows INT)
BEGIN
	if(tipo="T") then
		SELECT *  FROM tb_tipoitem WHERE TIPIT_CodigoInterno LIKE codigo AND TIPIT_Nombre LIKE nombre AND TIPIT_Estado LIKE estado
		ORDER BY TIPIT_CodigoInterno  LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo="P")then
		SELECT COUNT(*) AS 'COUNT'  FROM tb_tipoitem WHERE TIPIT_CodigoInterno LIKE codigo AND TIPIT_Nombre LIKE nombre AND TIPIT_Estado LIKE estado;
	end if;
END //
delimiter;

delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Marca(tipo VARCHAR(1),codigo int,nombre VARCHAR(50),estado CHAR(1))
BEGIN
		if(tipo="C") then
			INSERT INTO tb_marca(MAR_CodigoInterno,MAR_Nombre,MAR_Estado) VALUES(codigo,nombre,"1");
		end if;
		if(tipo="U") then
			UPDATE tb_marca set
				MAR_Nombre=nombre,
				MAR_Estado=estado
				where	MAR_CodigoInterno=codigo;
		end if;
		if(tipo="D") then
			UPDATE tb_marca set
			MAR_Estado="0"
			where	MAR_CodigoInterno=codigo;
		end if;
		if(tipo="E") then
			DELETE FROM tb_marca where	MAR_CodigoInterno=codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Marca(tipo VARCHAR(1), codigo VARCHAR(13),nombre VARCHAR(55),estado varchar(5),NOffset INT,Nrows INT)
BEGIN
	if(tipo="T")then
		SELECT MAR_CodigoInterno,MAR_Nombre,MAR_Estado  FROM tb_marca WHERE MAR_CodigoInterno LIKE codigo AND MAR_Nombre LIKE nombre AND MAR_Estado LIKE estado
		ORDER BY MAR_CodigoInterno  LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo="P")then
		SELECT COUNT(*) AS 'COUNT'  FROM tb_marca WHERE MAR_CodigoInterno LIKE codigo AND MAR_Nombre LIKE nombre AND MAR_Estado LIKE estado;
	end if;
END //
delimiter;

delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Cuotakm(tipo VARCHAR(1),codigo int,precio DOUBLE(8,2),metros DOUBLE(8,2),estado CHAR(1))
BEGIN
		if(tipo="C") then
			INSERT INTO tb_cuotakm(CKM_CodigoInterno,CKM_Precio,CKM_Metros,CKM_Estado) VALUES(codigo,precio,metros,"1");
		end if;
		if(tipo="U") then
			UPDATE tb_cuotakm set
				CKM_Precio=precio,
                CKM_Metros=metros,
				CKM_Estado=estado
				where	CKM_CodigoInterno=codigo;
		end if;
		if(tipo="D") then
			UPDATE tb_cuotakm set
			CKM_Estado="0"
			where	CKM_CodigoInterno=codigo;
		end if;
		if(tipo="E") then
			DELETE FROM tb_cuotakm where	CKM_CodigoInterno=codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE  PROCEDURE PROCEDURE_SELECT_Cuotakm(tipo VARCHAR(1), codigo VARCHAR(13),metros VARCHAR(13),precio VARCHAR(13),estado varchar(5),NOffset INT,Nrows INT)
BEGIN
	if(tipo="T")then
		SELECT *  FROM tb_cuotakm WHERE CKM_CodigoInterno LIKE codigo AND CKM_Precio LIKE precio AND CKM_Metros LIKE metros AND CKM_Estado LIKE estado
		ORDER BY CKM_CodigoInterno  LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo="P")then
		SELECT COUNT(*) AS 'COUNT'  FROM tb_cuotakm WHERE CKM_CodigoInterno LIKE codigo AND CKM_Precio LIKE precio AND CKM_Metros LIKE metros AND CKM_Estado LIKE estado;
	end if;
END //
delimiter;

delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Item(tipo VARCHAR(1),codigo int,descripcion varchar(50),precio DOUBLE(8,2),tipo_item int,estado CHAR(1))
BEGIN
		if(tipo="C") then
			INSERT INTO tb_item(ITEM_CodigoInterno,ITEM_Descripcion,ITEM_Precio,ITEM_Estado,TIPIT_CodigoInterno) VALUES(codigo,descripcion,precio,"1",tipo_item);
		end if;
		if(tipo="U") then
			UPDATE tb_item set
				ITEM_Descripcion=descripcion,
                ITEM_Precio=precio,
				ITEM_Estado=estado,
                TIPIT_CodigoInterno=tipo_item
				where	ITEM_CodigoInterno=codigo;
		end if;
		if(tipo="D") then
			UPDATE tb_item set
			ITEM_Estado="0"
			where	ITEM_CodigoInterno=codigo;
		end if;
		if(tipo="E") then
			DELETE FROM tb_item where ITEM_CodigoInterno=codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Item(tipo VARCHAR(1), codigo VARCHAR(13),tipo_item VARCHAR(13),precio VARCHAR(13),estado varchar(5),NOffset INT,Nrows INT)
BEGIN
	if(tipo="T")then
		SELECT i.*,ti.*  FROM tb_item i INNER JOIN tb_tipoitem ti on i.TIPIT_CodigoInterno=ti.TIPIT_CodigoInterno
        WHERE i.ITEM_CodigoInterno LIKE codigo AND ITEM_Estado LIKE estado
        AND ITEM_precio LIKE precio
        and i.TIPIT_CodigoInterno LIKE tipo_item
        AND ITEM_Estado LIKE estado
		ORDER BY ITEM_CodigoInterno  LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo="P")then
		SELECT COUNT(*) AS 'COUNT'  FROM tb_item WHERE ITEM_CodigoInterno LIKE codigo AND ITEM_precio LIKE precio AND ITEM_Estado LIKE estado;
	end if;
END //
delimiter;


delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Proveedor(tipo VARCHAR(1),codigo int,nombre varchar(50),identificador varchar(5),fecha date,estado CHAR(1))
BEGIN
		if(tipo="C") then
			INSERT INTO tb_proveedor(PROV_CodigoInterno,PROV_Nombre,PROV_Identificador,PROV_FechaRegistro,PROV_Estado) VALUES(codigo,nombre,identificador,fecha,"1");
		end if;
		if(tipo="U") then
			UPDATE tb_proveedor set
				PROV_Nombre=nombre,
                PROV_Identificador=identificador,
				PROV_Estado=estado
				where	PROV_CodigoInterno=codigo;
		end if;
		if(tipo="D") then
			UPDATE tb_proveedor set
			PROV_Estado="0"
			where	PROV_CodigoInterno=codigo;
		end if;
		if(tipo="E") then
			DELETE FROM tb_proveedor where	PROV_CodigoInterno=codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Proveedor(tipo VARCHAR(1), codigo VARCHAR(13),nombre varchar(50),identificador varchar(8),fecha VARCHAR(50),estado varchar(5),NOffset INT,Nrows INT)
BEGIN
	if(tipo="T")then
		SELECT PROV_CodigoInterno,PROV_Nombre,PROV_Identificador,PROV_FechaRegistro,PROV_Estado  FROM tb_proveedor 
		WHERE PROV_CodigoInterno LIKE codigo 
		AND PROV_Nombre LIKE nombre 
		and PROV_Identificador like identificador
		and PROV_FechaRegistro like fecha 
		AND PROV_Estado LIKE estado
		ORDER BY PROV_CodigoInterno  LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo="P")then
		SELECT COUNT(*) AS 'COUNT'  FROM tb_proveedor 
		WHERE PROV_CodigoInterno LIKE codigo 
		and PROV_Identificador like identificador
		and PROV_FechaRegistro like fecha 
		AND PROV_Nombre LIKE nombre 
		AND PROV_Estado LIKE estado;
	end if;
END //
delimiter;

delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Formapago(tipo VARCHAR(1),codigo int,nombre varchar(50),identificador varchar(5),estado CHAR(1))
BEGIN
		if(tipo="C") then
			INSERT INTO tb_formapago(FORM_CodigoInterno,FORM_Nombre,FORM_Identificador,FORM_Estado) VALUES(codigo,nombre,identificador,"1");
		end if;
		if(tipo="U") then
			UPDATE tb_formapago set
				FORM_Nombre=nombre,
                FORM_Identificador=identificador,
				FORM_Estado=estado
				where	FORM_CodigoInterno=codigo;
		end if;
		if(tipo="D") then
			UPDATE tb_formapago set
			FORM_Estado="0"
			where	FORM_CodigoInterno=codigo;
		end if;
		if(tipo="E") then
			DELETE FROM tb_formapago where	FORM_CodigoInterno=codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Formapago(tipo VARCHAR(1), codigo VARCHAR(13),nombre varchar(50),identificador varchar(8),estado varchar(5),NOffset INT,Nrows INT)
BEGIN
	if(tipo="T")then
		SELECT FORM_CodigoInterno,FORM_Nombre,FORM_Identificador,FORM_Estado  FROM tb_formapago WHERE FORM_CodigoInterno LIKE codigo AND FORM_Nombre LIKE nombre and FORM_Identificador like identificador AND FORM_Estado LIKE estado
		ORDER BY FORM_CodigoInterno  LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo="P")then
		SELECT COUNT(*) AS 'COUNT'  FROM tb_formapago WHERE FORM_CodigoInterno LIKE codigo AND FORM_Nombre LIKE nombre AND FORM_Estado LIKE estado;
	end if;
END //
delimiter;




delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Ubicacion(
    tipo VARCHAR(1),
    codigo int,
    LUGAR int,
    PROVINCIA int,
    DISTRITO int,
    direccion varchar(200),
    calle varchar(200),
    numero varchar(200),
    referencia varchar(500),
    usuario INT,
    estado CHAR(1)
    )
BEGIN
		if(tipo="C") then
			INSERT INTO tb_ubicacion(
            UBI_CodigoInterno,
            LUG_CodigoInterno,
            PROV_CodigoInterno,
            DIS_CodigoInterno,
            UBI_Direccion,
            UBI_Calle,
            UBI_Numero,
            UBI_Referencia,
            UBI_Estado,
				USU_CodigoInterno) VALUES(
                codigo ,
                LUGAR ,
                PROVINCIA ,
                DISTRITO ,
                direccion ,
                calle ,
                numero ,
                referencia ,
                "1",
					 usuario );
		end if;
		if(tipo="U") then
			UPDATE tb_ubicacion set
            LUG_CodigoInterno=LUGAR,
            PROV_CodigoInterno=PROVINCIA,
            DIS_CodigoInterno=DISTRITO,
            UBI_Direccion=direccion,
            UBI_Calle=calle,
            UBI_Numero=numero,
            UBI_Estado=referencia
				where	UBI_CodigoInterno=codigo;
		end if;
		if(tipo="D") then
			UPDATE tb_ubicacion set
			UBI_Estado="0"
			where	UBI_CodigoInterno=codigo;
		end if;
		if(tipo="E") then
			DELETE FROM tb_ubicacion where	UBI_CodigoInterno=codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Ubicacion(tipo VARCHAR(1), codigo VARCHAR(13),lugar varchar(13),distrito varchar(13),provincia varchar(13),direccion varchar(50),calle varchar(8),usuario varchar(13),estado varchar(5),NOffset INT,Nrows INT)
BEGIN
	if(tipo="T")then
		SELECT u.*  FROM tb_ubicacion u Inner join tb_lugar l on u.UBI_CodigoInterno=l.LUG_CodigoInterno INNER JOIN
        tb_usuario usu on usu.USU_CodigoInterno=u.USU_CodigoInterno INNER JOIN
		  tb_provincia p on p.PROV_CodigoInterno=u.PROV_CodigoInterno INNER JOIN
        tb_distrito d on d.DIS_CodigoInterno=u.DIS_CodigoInterno
        WHERE u.UBI_CodigoInterno LIKE codigo 
		  AND u.LUG_CodigoInterno LIKE lugar
        AND u.DIS_CodigoInterno LIKE distrito 
		  and u.PROV_CodigoInterno like provincia 
		  AND u.UBI_Estado LIKE estado
        AND u.UBI_Direccion LIKE direccion 
		  AND u.UBI_Calle like calle 
		  AND u.USU_CodigoInterno like usuario 
		ORDER BY UBI_CodigoInterno  LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo="P")then
		SELECT COUNT(*) as 'COUNT'  FROM tb_ubicacion u Inner join tb_lugar l on u.UBI_CodigoInterno=l.LUG_CodigoInterno INNER JOIN
        tb_provincia p on p.PROV_CodigoInterno=u.PROV_CodigoInterno INNER JOIN
        tb_distrito d on d.DIS_CodigoInterno=u.DIS_CodigoInterno
        WHERE UBI_CodigoInterno LIKE codigo AND l.LUG_CodigoInterno LIKE lugar
        AND d.DIS_CodigoInterno LIKE distrito and p.PROV_CodigoInterno like provincia 
        AND u.USU_CodigoInterno like usuario AND UBI_Direccion LIKE direccion and UBI_Calle like calle AND UBI_Estado LIKE estado;
	end if;
END //
delimiter;

delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Usuario(
    tipo VARCHAR(1),
    codigo int,
    DNI varchar(7),
    PriNombre varchar(500),
    SegNombre varchar(500),
    ApePaterno varchar(500),
    ApeMaterno varchar(500),
    Usuario varchar(500),
    Clave varchar(500),
    Token varchar(20),
    Telefono varchar(9),
    Correo varchar(200),
    FechaNacimiento date,
    FechaRegistro date,
    Estado char(1),
    SEXO int
    )
BEGIN
		DECLARE usuariocopia VARCHAR(500);
		SET usuariocopia=(SELECT USU_CodigoInterno FROM tb_usuario WHERE USU_Usuario=usuario);
		if(NOT EXISTS usuariocopia)then
			if(tipo="C") then
				INSERT INTO tb_usuario(
	                USU_CodigoInterno,
	                USU_DNI ,
	                USU_PriNombre ,
	                USU_SegNombre ,
	                USU_ApePaterno ,
	                USU_ApeMaterno ,
	                USU_Usuario ,
	                USU_Clave ,
	                USU_Token ,
	                USU_Telefono ,
	                USU_Correo ,
	                USU_FechaNacimiento ,
	                USU_FechaRegistro ,
	                USU_Estado ,
	                SEX_CodigoInterno)  VALUES(
	                codigo ,
	                DNI,
	                PriNombre ,
	                SegNombre ,
	                ApePaterno ,
	                ApeMaterno ,
	                Usuario ,
	                Clave ,
	                Token ,
	                Telefono ,
	                Correo ,
	                FechaNacimiento,
	                FechaRegistro ,
	                "1" ,
	                SEXO );
				end if;
			end if;
			if(NOT EXISTS usuariocopia ) then
				if(tipo="U") then
					UPDATE tb_usuario set
		            USU_Usuario= Usuario,
	            	USU_Clave =Clave,
		            where	USU_CodigoInterno=codigo;
				end if;
			end if;
				if(tipo="U") then
					UPDATE tb_usuario set
		            USU_DNI= DNI,
		            USU_PriNombre= PriNombre,
		            USU_SegNombre =SegNombre,
		            USU_ApePaterno= ApePaterno,
		            USU_ApeMaterno =ApeMaterno,
		            USU_Token= Token,
		            USU_Telefono= Telefono,
		            USU_Correo= Correo,
		            USU_FechaNacimiento =FechaNacimiento,
		            USU_Estado= Estado,
		            SEX_CodigoInterno=SEXO
		            where	USU_CodigoInterno=codigo;
				end if;
		if(tipo="D") then
			UPDATE tb_usuario set
			USU_Estado="0"
			where	USU_CodigoInterno=codigo;
		end if;
		if(tipo="E") then
			DELETE FROM tb_usuario where	USU_CodigoInterno=codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Usuario(tipo VARCHAR(1),
        Codigo VARCHAR(50),
        DNI varchar(10),
        PriNombre varchar(510),
        SegNombre varchar(510),
        ApePaterno varchar(510),
        ApeMaterno varchar(510),
        FechaNacimiento varchar(50),
        FechaRegistro  varchar(50),
        Estado char(5) ,
        SEXO varchar(10),
        NOffset INT,Nrows INT)
BEGIN
	if(tipo="T")then
		SELECT usu.*,s.*  FROM tb_usuario usu Inner join tb_sexo s on usu.SEX_CodigoInterno=s.SEX_CodigoInterno
        WHERE usu.USU_CodigoInterno LIKE Codigo
        AND usu.USU_DNI LIKE DNI
        AND usu.USU_PriNombre LIKE PriNombre
        AND usu.USU_SegNombre LIKE SegNombre
        AND usu.USU_ApePaterno LIKE ApePaterno
        AND usu.USU_ApeMaterno LIKE ApeMaterno
        AND usu.USU_FechaNacimiento LIKE FechaNacimiento
        AND usu.USU_FechaRegistro LIKE FechaRegistro
        AND usu.USU_Estado LIKE Estado
        AND usu.SEX_CodigoInterno LIKE SEXO
		ORDER BY usu.USU_CodigoInterno LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo="P")then
		SELECT COUNT(*) as 'COUNT'  FROM tb_usuario usu Inner join
        tb_sexo s on usu.SEX_CodigoInterno=s.SEX_CodigoInterno
        WHERE usu.USU_CodigoInterno LIKE Codigo
        AND usu.USU_DNI LIKE DNI
        AND usu.USU_PriNombre LIKE PriNombre
        AND usu.USU_SegNombre LIKE SegNombre
        AND usu.USU_ApePaterno LIKE ApePaterno
        AND usu.USU_ApeMaterno LIKE ApeMaterno
        AND usu.USU_FechaNacimiento LIKE FechaNacimiento
        AND usu.USU_FechaRegistro LIKE FechaRegistro
        AND usu.USU_Estado LIKE Estado
        AND usu.SEX_CodigoInterno LIKE SEXO;
	end if;
END //
delimiter;

 
delimiter //
CREATE  PROCEDURE PROCEDURE_CRUD_Administrador(
    tipo VARCHAR(1),
    Codigo varchar(5),
    USUARIO int,
    A_Write char(1),
    A_READ char(1),
    A_VIEW char(1),
    CodigoConfirmacion varchar(10),
    Ip varchar(10),
    Estado char(1)
    )
BEGIN
	DECLARE adm VARCHAR(10);
	DECLARE id VARCHAR(20);
	DECLARE cant_admin int;
	DECLARE cantidadadmin INT;

	SET adm=REPLACE(Codigo,"0","");
	SET cant_admin =	(SELECT COUNT(*) FROM tb_administrador  WHERE USU_CodigoInterno=usuario AND ADM_Estado="1");
	SET cantidadadmin =	(SELECT COUNT(*) FROM tb_administrador);
	
	SET id=CrearCodigoNumerico(5,cantidadadmin,"");
	
	
		if(tipo='C') then
			if(SELECT adm!=1 && cant_admin=0) then
			INSERT INTO tb_administrador(
                ADM_CodigoInterno,
                USU_CodigoInterno,
                ADM_Write,
                ADM_READ,
                ADM_VIEW,
                ADM_CodigoConfirmacion,
                ADM_Ip,
                ADM_Estado
                )  VALUES(
                id,
                USUARIO,
                A_Write,
                A_READ,
                A_VIEW,
                CodigoConfirmacion,
                Ip,
                "1");
         end if;
		end if;
		if(tipo='U') then
			if(SELECT adm!=1) then
				UPDATE tb_administrador set
             ADM_Write=A_Write,
             ADM_READ=A_READ,
             ADM_VIEW=A_VIEW,
             ADM_CodigoConfirmacion=CodigoConfirmacion,
             ADM_Ip=Ip,
             ADM_Estado=Estado
	         where ADM_CodigoInterno= Codigo;
            end if;
		end if;
		if(tipo='D') then
			if(SELECT adm!=1) then
				UPDATE tb_administrador set
				ADM_Estado='0'
				where	ADM_CodigoInterno=Codigo;
			end if;
		end if;
		if(tipo='E') then
			if(SELECT adm !=1)then
				DELETE FROM tb_administrador where	ADM_CodigoInterno=Codigo;
			end if;
		end if;
END //
delimiter ;


delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Administrador(tipo VARCHAR(1),
        Codigo VARCHAR(8),
        USUARIO varchar(13),
        A_Write varchar(3),
        A_READ varchar(3),
        A_VIEW varchar(3),
        Estado varchar(5),
        NOffset INT,Nrows INT)
BEGIN
	if(tipo="T")then
		SELECT adm.*,usu.*  FROM tb_administrador adm Inner join tb_usuario usu on adm.USU_CodigoInterno=usu.USU_CodigoInterno
        WHERE adm.ADM_CodigoInterno LIKE Codigo
        AND adm.USU_CodigoInterno LIKE USUARIO
        AND adm.ADM_Write LIKE A_Write
        AND adm.ADM_READ LIKE A_READ
        AND adm.ADM_VIEW LIKE A_VIEW
        AND adm.ADM_Estado LIKE Estado
		ORDER BY adm.ADM_CodigoInterno LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo="P")then
		SELECT COUNT(*) as 'COUNT'  FROM tb_administrador adm Inner join tb_usuario usu on adm.USU_CodigoInterno=usu.USU_CodigoInterno
        WHERE adm.ADM_CodigoInterno LIKE Codigo
        AND adm.USU_CodigoInterno LIKE USUARIO
        AND adm.ADM_Write LIKE A_Write
        AND adm.ADM_READ LIKE A_READ
        AND adm.ADM_VIEW LIKE A_VIEW
        AND adm.ADM_Estado LIKE Estado;
	end if;
END //
delimiter;



delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Articulo(
    tipo VARCHAR(1),
    Codigo int,
    Nombre varchar(500),
    Descripcion varchar(500),
    Precio decimal(8,2),
    Stock int,
    FechaIngreso date,
    Imagen varchar(100),
    Estado char(1),
    TIPOARTICULO int,
    MARCA int,
    PROVEEDOR int
    )
BEGIN
		if(tipo="C") then
			INSERT INTO tb_articulo(
                ART_CodigoInterno,
                ART_Nombre ,
                ART_Descripcion ,
                ART_Precio ,
                ART_Stock ,
                ART_FechaIngreso ,
                ART_Imagen ,
                ART_Estado   ,
                TIPART_CodigoInterno ,
                MAR_CodigoInterno ,
                PROV_CodigoInterno
                )  VALUES(
                Codigo,
                Nombre,
                Descripcion,
                Precio,
                Stock,
                FechaIngreso ,
                Imagen ,
                "1" ,
                TIPOARTICULO ,
                MARCA ,
                PROVEEDOR );
		end if;
		if(tipo="U") then
			UPDATE tb_articulo set
            ART_Nombre =Nombre,
            ART_Descripcion =Descripcion,
            ART_Precio=Precio,
            ART_Stock=Stock,
            ART_FechaIngreso=FechaIngreso ,
            ART_Imagen =Imagen ,
            ART_Estado =Estado ,
            TIPART_CodigoInterno =TIPOARTICULO ,
            MAR_CodigoInterno=MARCA ,
            PROV_CodigoInterno=PROVEEDOR
            where ART_CodigoInterno= Codigo;
		end if;
		if(tipo="D") then
			UPDATE tb_articulo set
			ART_Estado="0"
			where	ART_CodigoInterno=Codigo;
		end if;
		if(tipo="E") then
			DELETE FROM tb_articulo where	ART_CodigoInterno=Codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Articulo(tipo VARCHAR(1),
        Codigo varchar(13),
        Nombre varchar(510),
        Descripcion varchar(510),
        Precio VARCHAR(15),
        Stock varchar(13),
        FechaIngreso varchar(10),
        Estado varchar(5),
        TIPOARTICULO varchar(13),
        MARCA varchar(13),
        PROVEEDOR varchar(13),
        NOffset INT,Nrows INT)
BEGIN
	if(tipo="T")then
		SELECT a.*,ta.*  FROM tb_articulo a Inner join tb_tipoarticulo ta on a.TIPART_CodigoInterno=ta.TIPART_CodigoInterno
        Inner join tb_proveedor p on a.PROV_CodigoInterno=p.PROV_CodigoInterno
        WHERE a.ART_CodigoInterno LIKE Codigo
        AND a.ART_Nombre LIKE Nombre
        AND a.ART_Descripcion LIKE Descripcion
        AND a.ART_Precio LIKE Precio
        AND a.ART_Stock LIKE Stock
        AND a.ART_FechaIngreso LIKE FechaIngreso
        AND a.ART_Estado LIKE Estado
        AND a.TIPART_CodigoInterno LIKE TIPOARTICULO
        AND a.MAR_CodigoInterno LIKE MARCA
        AND a.PROV_CodigoInterno LIKE PROVEEDOR
		ORDER BY a.ART_CodigoInterno DESC LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo="P")then
		SELECT COUNT(*) as 'COUNT'  FROM tb_articulo a Inner join tb_tipoarticulo ta on a.TIPART_CodigoInterno=ta.TIPART_CodigoInterno
        Inner join tb_proveedor p on a.PROV_CodigoInterno=p.PROV_CodigoInterno
        WHERE a.ART_CodigoInterno LIKE Codigo
        AND a.ART_Nombre LIKE Nombre
        AND a.ART_Descripcion LIKE Descripcion
        AND a.ART_Precio LIKE Precio
        AND a.ART_Stock LIKE Stock
        AND a.ART_FechaIngreso LIKE FechaIngreso
        AND a.ART_Estado LIKE Estado
        AND a.TIPART_CodigoInterno LIKE TIPOARTICULO
        AND a.MAR_CodigoInterno LIKE MARCA
        AND a.PROV_CodigoInterno LIKE PROVEEDOR;
	end if;
END //
delimiter;

delimiter //
CREATE  PROCEDURE PROCEDURE_CRUD_ArticuloItem(tipo VARCHAR(1),codigo int,ITEM INT,ARTICULO INT,estado CHAR(1))
BEGIN

		if(tipo="C") then
				INSERT INTO tb_articuloitem(ITEM_CodigoInterno,ART_CodigoInterno,ARTIT_Estado) VALUES(ITEM,ARTICULO,"1");
		end if;
		if(tipo="U") then
			UPDATE tb_articuloitem set
				ITEM_CodigoInterno=ITEM,
				ART_CodigoInterno=ARTICULO,
				ARTIT_Estado=estado
				where	ARTIT_CodigoInterno=codigo;
		end if;
		if(tipo="D") then
			UPDATE tb_articuloitem set
			ARTIT_Estado="0"
			where	ARTIT_CodigoInterno=codigo;
		end if;
		if(tipo="E") then
			DELETE FROM tb_articuloitem where	ARTIT_CodigoInterno=codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_ArticuloItem(tipo VARCHAR(1), codigo VARCHAR(13),ITEM VARCHAR(13),ARTICULO VARCHAR(13),estado varchar(5),NOffset INT,Nrows INT)
BEGIN
	if(tipo="T")then
		SELECT ai.*,a.`*`,o.* FROM tb_articuloitem ai INNER JOIN tb_item i ON ai.ITEM_CodigoInterno=i.ITEM_CodigoInterno
		INNER JOIN tb_articulo a  ON ai.ART_CodigoInterno=a.ART_CodigoInterno
		WHERE ai.ARTIT_CodigoInterno LIKE codigo 
		AND ai.ITEM_CodigoInterno LIKE ITEM 
		AND ai.ART_CodigoInterno LIKE ARTICULO 
		AND ai.ARTIT_Estado LIKE estado
		ORDER BY ai.ARTIT_CodigoInterno  
		LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo="P")then
		SELECT COUNT(*) AS 'COUNT' FROM tb_articuloitem  ai INNER JOIN tb_item i ON ai.ITEM_CodigoInterno=i.ITEM_CodigoInterno
		INNER JOIN tb_articulo a  ON ai.ART_CodigoInterno=a.ART_CodigoInterno
		WHERE ai.ARTIT_CodigoInterno LIKE codigo 
		AND ai.ITEM_CodigoInterno LIKE ITEM 
		AND ai.ART_CodigoInterno LIKE ARTICULO 
		AND ai.ARTIT_Estado LIKE estado;
	end if;
END //
delimiter;


delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Sucursal(
    tipo VARCHAR(1),
    Codigo int ,
    DISTRITO INT,
	 Referencia varchar(500),
	 Direccion varchar(500),
    HorasAtencion varchar(500),
    Telefono varchar(500),
    URL VARCHAR(500),
    Estado char(1)
    )
BEGIN
		if(tipo="C") then
			INSERT INTO tb_sucursal(
                DIS_CodigoInterno,
                SUC_Referencia,
                SUC_Direccion,
                SUC_HorasAtencion ,
                SUC_Telefono ,
                SUC_URL,
                SUC_Estado
                )  VALUES(
                DISTRITO,
                Referencia ,
                Direccion,
                HorasAtencion ,
                Telefono ,
                URL,
                Estado
     );
		end if;
		if(tipo="U") then
			UPDATE tb_sucursal set
            DIS_CodigoInterno =DISTRITO,
            SUC_Referencia =Referencia ,
            SUC_Direccion =Direccion ,
            SUC_HorasAtencion =HorasAtencion ,
            SUC_Telefono =Telefono ,
            SUC_URL =URL ,
            SUC_Estado=Estado
            where SUC_CodigoInterno= Codigo;
		end if;
		if(tipo="D") then
			UPDATE tb_sucursal set
			SUC_Estado="0"
			where	SUC_CodigoInterno=Codigo;
		end if;
		if(tipo="E") then
			DELETE FROM tb_sucursal where	SUC_CodigoInterno=Codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Sucursal(tipo VARCHAR(1),
        Codigo varchar(13),
        DISTRITO varchar(510),
        Referencia varchar(510),
        HorasAtencion varchar(510),
        Estado varchar(5),
        NOffset INT,Nrows INT)
BEGIN
	if(tipo="T")then
		SELECT s.*,d.*  FROM tb_sucursal s 
		  INNER join tb_distrito d ON s.DIS_CodigoInterno=d.DIS_CodigoInterno  
        WHERE s.SUC_CodigoInterno LIKE Codigo
        AND s.DIS_CodigoInterno LIKE DISTRITO
        AND s.SUC_Referencia LIKE Referencia
        AND s.SUC_HorasAtencion LIKE HorasAtencion
        AND s.SUC_Estado LIKE Estado
		ORDER BY s.SUC_CodigoInterno LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo="P")then
		SELECT COUNT(*) as 'COUNT'  FROM tb_sucursal s 
		INNER join tb_distrito d ON s.DIS_CodigoInterno=d.DIS_CodigoInterno  
        WHERE s.SUC_CodigoInterno LIKE Codigo
        AND s.DIS_CodigoInterno LIKE DISTRITO
        AND s.SUC_Referencia LIKE Referencia
        AND s.SUC_HorasAtencion LIKE HorasAtencion
        AND s.SUC_Estado LIKE Estado;
	end if;
END //
delimiter;

delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Pedido(
    tipo VARCHAR(1),
    Codigo int,
    Total decimal(8,2),
    Descuento decimal(8,2),
    FORMAPAGO int,
    USUARIO int,
    TIPOPEDIDO INT,
    Comentario VARCHAR(500),
    Estado char(1)
    )
BEGIN
		if(tipo= "C") then
			INSERT INTO tb_pedido(
                PED_Numero,
                PED_Total,
                PED_Descuento,
                PED_FechaRegistro,
                FORM_CodigoInterno,
                USU_CodigoInterno,
                TIPPED_CodigoInterno,
                PED_Comentario,
                PED_Estado
                )  VALUES(
                Numero,
                Total,
                Descuento,
                FechaRegistro,
                FORMAPAGO,
                USUARIO,
                TIPOPEDIDO,
                Comentario,
                Estado
     );
		end if;
		if(tipo= "U") then
			UPDATE tb_pedido set
                PED_Total=Total,
                PED_Descuento=Descuento,
                FORM_CodigoInterno=FORMAPAGO,
                USU_CodigoInterno=USUARIO,
                TIPPED_CodigoInterno=TIPOPEDIDO,
                PED_Comentario=Comentario,
                PED_Estado=Estado
            where PED_CodigoInterno=Codigo;
		end if;
		if(tipo= "D") then
			UPDATE tb_pedido set
			PED_Estado= "0"
			where	PED_CodigoInterno= Codigo;
		end if;
		if(tipo= "E") then
			DELETE FROM tb_pedido where	PED_CodigoInterno= Codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Pedido(tipo VARCHAR(1),
        Codigo varchar(13),
        Numero varchar(13),
        Total varchar(13),
        FechaRegistro varchar(15),
        USUARIO VARCHAR(13),
        Estado char(15),
        NOffset INT,Nrows INT)
BEGIN
	if(tipo= "T")then
		SELECT pe.*,u.*  FROM tb_pedido pe Inner join tb_formapago f on pe.FORM_CodigoInterno=f.FORM_CodigoInterno
        Inner join tb_usuario u on pe.USU_CodigoInterno = u.USU_CodigoInterno
        Inner join tb_tipopedido tp on pe.TIPPED_CodigoInterno = tp.TIPPED_CodigoInterno
        WHERE pe.PED_CodigoInterno LIKE Codigo
        AND pe.PED_Numero LIKE Numero
        AND pe.PED_Total LIKE Total
        AND pe.PED_FechaRegistro LIKE FechaRegistro
        AND pe.USU_CodigoInterno LIKE USUARIO
      
       	-- AND pe.FORM_CodigoInterno LIKE FORMAPAGO
       -- AND pe.TIPPED_CodigoInterno LIKE TIPOPEDIDO
       
        AND PED_Estado LIKE Estado
		ORDER BY PED_CodigoInterno LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo= "P")then
		SELECT COUNT(*) as 'COUNT'  FROM tb_pedido pe Inner join tb_formapago f on pe.FORM_CodigoInterno=f.FORM_CodigoInterno
        Inner join tb_usuario u on pe.USU_CodigoInterno = u.USU_CodigoInterno
        Inner join tb_tipopedido tp on pe.TIPPED_CodigoInterno = tp.TIPPED_CodigoInterno
        WHERE pe.PED_CodigoInterno LIKE Codigo
        AND pe.PED_Numero LIKE Numero
        AND pe.PED_Total LIKE Total
        AND pe.PED_FechaRegistro LIKE FechaRegistro
        AND pe.USU_CodigoInterno LIKE USUARIO
       	
       	-- AND pe.FORM_CodigoInterno LIKE FORMAPAGO
       -- AND pe.TIPPED_CodigoInterno LIKE TIPOPEDIDO
        
        AND pe.PED_Estado LIKE Estado;
	end if;
END //
delimiter;
delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Pedidodetalle(
    tipo VARCHAR(1),
    Codigo int ,
    PEDIDO int,
    ARTICULO int,
    ARTICULOITEM INT,
	 FechaRegistro DATE,
    Cantidad INT
    )
BEGIN
		if(tipo= "C") then
			INSERT INTO tb_pedidodetalle(
                PED_CodigoInterno,
                ART_CodigoInterno,
                ARTIT_CodigoInterno,
                PEDDET_FechaRegistro,
                PEDDET_Cantidad
                )  VALUES(
                PEDIDO,
                ARTICULO,
                ARTICULOITEM,
                FechaRegistro,
                Cantidad
     );
		end if;
		if(tipo= "U") then
			UPDATE tb_pedidodetalle set
                PED_CodigoInterno=PEDIDO,
                ART_CodigoInterno=ARTICULO,
                ARTIT_CodigoInterno=ARTICULOITEM,
                PEDDET_FechaRegistro=FechaRegistro,
                PEDDET_Cantidad=Cantidad
            where PEDDET_CodigoInterno=  Codigo;
		end if;
		if(tipo= "D") then
			UPDATE tb_pedidodetalle set
			ADM_Estado= "0"
			where	PEDDET_CodigoInterno= Codigo;
		end if;
		if(tipo= "E") then
			DELETE FROM tb_pedidodetalle where	PEDDET_CodigoInterno= Codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Pedidodetalle(tipo VARCHAR(1),
        Codigo varchar(13) ,
        PEDIDO varchar(13),
        ARTICULO varchar(13),
        Cantidad varchar(13),
        NOffset INT,Nrows INT)
BEGIN
	if(tipo= "T")then
		SELECT pd.*,a.*	  FROM tb_pedidodetalle pd Inner join tb_pedido p on pd.PED_CodigoInterno=p.PED_CodigoInterno
        Inner join tb_articulo a on pd.ART_CodigoInterno = a.ART_CodigoInterno
        WHERE pd.PEDDET_CodigoInterno LIKE Codigo
        AND pd.PED_CodigoInterno LIKE PEDIDO
        AND pd.ART_CodigoInterno LIKE ARTICULO
        AND pd.PEDDET_Cantidad LIKE Cantidad
		ORDER BY pd.PEDDET_CodigoInterno LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo= "P")then
		SELECT COUNT(*) as 'COUNT'  FROM tb_pedidodetalle pd Inner join tb_pedido p on pd.PED_CodigoInterno=p.PED_CodigoInterno
        Inner join tb_articulo a on pd.ART_CodigoInterno = a.ART_CodigoInterno
        WHERE pd.PEDDET_CodigoInterno LIKE Codigo
        AND pd.PED_CodigoInterno LIKE PEDIDO
        AND pd.ART_CodigoInterno LIKE ARTICULO
        AND pd.PEDDET_Cantidad LIKE Cantidad;
	end if;
END //
delimiter;

delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Banner(
    tipo VARCHAR(1),
    Codigo VARCHAR(7) ,
    Imagen VARCHAR(100),
	 Ruta VARCHAR(500),
	 TIPOBANNER INT,
	 ARTICULO int,
    Estado char(1)
    )
BEGIN
		if(tipo= "C") then
			INSERT INTO tb_banner(
                BAN_CodigoInterno,
                BAN_Imagen,
                BAN_Ruta,
                TIPBAN_CodigoInterno,
                ART_CodigoInterno,
                BAN_Estado
                )  VALUES(
                Codigo,
                Imagen,
                Ruta,
                TIPOBANNER,
                ARTICULO,
                Estado
     );
		end if;
		if(tipo= "U") then
			UPDATE tb_banner set
                BAN_Imagen=Imagen,
                BAN_Ruta=Ruta,
                TIPBAN_CodigoInterno=TIPOBANNER,
                ART_CodigoInterno=ARTICULO,
                BAN_Estado=Estado
            where BAN_CodigoInterno=  Codigo;
		end if;
		if(tipo= "D") then
			UPDATE tb_banner set
			BAN_Estado= "0"
			where	BAN_CodigoInterno= Codigo;
		end if;
		if(tipo= "E") then
			DELETE FROM tb_banner where BAN_CodigoInterno= Codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Banner(tipo VARCHAR(1),
        Codigo VARCHAR(7) ,
        TIPOBANNER varchar(13),
        ARTICULO varchar(13),
        Estado varchar(5),
        NOffset INT,Nrows INT)
BEGIN
	if(tipo= "T")then
		SELECT *  FROM tb_banner  b Inner join tb_tipobanner tb on b.TIPBAN_CodigoInterno=tb.TIPBAN_CodigoInterno
        Inner join tb_articulo ar on  b.ART_CodigoInterno =  ar.ART_CodigoInterno
        WHERE b.BAN_CodigoInterno LIKE Codigo
        AND b.TIPBAN_CodigoInterno LIKE TIPOBANNER
        AND b.ART_CodigoInterno LIKE ARTICULO
        AND b.BAN_Estado LIKE Estado
		ORDER BY b.BAN_CodigoInterno LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo= "P")then
		SELECT COUNT(*) as 'COUNT'  FROM tb_banner  b Inner join tb_tipobanner tb on b.TIPBAN_CodigoInterno=tb.TIPBAN_CodigoInterno
        Inner join tb_articulo ar on  b.ART_CodigoInterno =  ar.ART_CodigoInterno
        WHERE b.BAN_CodigoInterno LIKE Codigo
        AND b.TIPBAN_CodigoInterno LIKE TIPOBANNER
        AND b.BAN_Estado LIKE Estado
        AND b.ART_CodigoInterno LIKE ARTICULO;
	end if;
END //
delimiter;

delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Inventario(
    tipo VARCHAR(1),
    Codigo VARCHAR(7),
		FechaRegistro date,
		StockModificado INT,
		ARTICULO INT,
		ITEM INT,
    Estado char(1)
    )
BEGIN
		if(tipo= "C") then
			INSERT INTO tb_inventario(
                INV_CodigoInterno,
                INV_FechaRegistro,
                INV_StockModificado,
                ART_CodigoInterno,
                ITEM_CodigoInterno,
                INV_Estado
                )  VALUES(
                Codigo,
                FechaRegistro,
                StockModificado,
                ARTICULO,
                ITEM,
                Estado
        );
		end if;
		if(tipo= "U") then
			UPDATE tb_inventario set
            INV_FechaRegistro=FechaRegistro,
            INV_StockModificado=StockModificado,
            INV_Estado=Estado
            where INV_CodigoInterno=  Codigo;
		end if;
		if(tipo= "D") then
			UPDATE tb_inventario set
			INV_Estado= "0"
			where	INV_CodigoInterno= Codigo;
		end if;
		if(tipo= "E") then
			DELETE FROM tb_inventario where	INV_CodigoInterno= Codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Inventario(tipo VARCHAR(1),
        Codigo VARCHAR(7) ,
      --  TIPOINVENTARIO varchar(13),
      	FechaRegistro varchar(13),
      	StockModificado varchar(13),
        ARTICULO varchar(13),
        ITEM varchar(13),
        Estado varchar(5),
        NOffset INT,Nrows INT)
BEGIN
	if(tipo= "T")then
		SELECT i.*,it.*  FROM tb_inventario  i INNER join tb_articulo a on  i.ART_CodigoInterno=a.ART_CodigoInterno
		Inner join tb_item it on  i.ITEM_CodigoInterno=it.ITEM_CodigoInterno
        WHERE  i.INV_CodigoInterno LIKE Codigo
        AND  i.INV_FechaRegistro LIKE FechaRegistro
        AND  i.INV_StockModificado LIKE StockModificado
        AND  i.ART_CodigoInterno LIKE ARTICULO
        AND  i.ITEM_CodigoInterno LIKE ITEM
        AND  i.INV_Estado LIKE Estado
		ORDER BY i.INV_CodigoInterno LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo= "P")then
		SELECT COUNT(*) as 'COUNT'  FROM tb_inventario  i Inner join tb_articulo a on  i.ART_CodigoInterno=a.ART_CodigoInterno
		Inner join tb_item it on  i.ITEM_CodigoInterno=it.ITEM_CodigoInterno
        WHERE  i.INV_CodigoInterno LIKE Codigo
        AND  i.INV_FechaRegistro LIKE FechaRegistro
        AND  i.INV_StockModificado LIKE StockModificado
        AND  i.ART_CodigoInterno LIKE ARTICULO
        AND  i.ITEM_CodigoInterno LIKE ITEM
        AND  i.INV_Estado LIKE Estado;
	end if;
END //
delimiter;

delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Inventariodetalle(
    tipo VARCHAR(1),
    Codigo INT,
	FechaRegistro date,
	FechaModificacion date,
	StockIngreso INT,
	StockModificado INT,
	INVENTARIO VARCHAR(7)
    )
BEGIN
		if(tipo= "C") then
			INSERT INTO tb_inventariodetalle(
                INVDET_FechaRegistro,
                INVDET_FechaModificacion,
                INVDET_StockIngreso,
                INVDET_StockModificado,
                INV_CodigoInterno
                )  VALUES(
                FechaRegistro,
                FechaModificacion,
                StockIngreso,
                StockModificado,
                INVENTARIO
        );
		end if;
		if(tipo= "U") then
			UPDATE tb_inventariodetalle set
            INVDET_FechaRegistro=FechaRegistro,
            INVDET_FechaModificacion=FechaModificacion,
            INVDET_StockIngreso=StockIngreso,
            INVDET_StockModificado=StockModificado,
            INV_CodigoInterno=INVENTARIO
            where INVDET_CodigoInterno=  Codigo;
		end if;
		if(tipo= "D") then
			UPDATE tb_inventariodetalle set
			INV_Estado= "0"
			where	INVDET_CodigoInterno= Codigo;
		end if;
		if(tipo= "E") then
			DELETE FROM tb_inventariodetalle where	INVDET_CodigoInterno= Codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Inventariodetalle(tipo VARCHAR(1),
        Codigo varchar(13),
        FechaRegistro varchar(15),
        FechaModificacion varchar(15),
        StockIngreso varchar(13),
        StockModificado varchar(13),
        INVENTARIO VARCHAR(7),
        NOffset INT,Nrows INT)
BEGIN
	if(tipo= "T")then
		SELECT *  FROM tb_inventariodetalle  id Inner join tb_inventario i on  id.INV_CodigoInterno=i.INV_CodigoInterno
        WHERE  id.INVDET_CodigoInterno LIKE Codigo
        AND id.INVDET_FechaRegistro LIKE FechaRegistro
        AND id.INVDET_FechaModificacion LIKE FechaModificacion
        AND id.INVDET_StockIngreso LIKE StockIngreso
        AND id.INVDET_StockModificado LIKE StockModificado
        AND id.INV_CodigoInterno LIKE INVENTARIO
		ORDER BY id.INVDET_CodigoInterno LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo= "P")then
		SELECT COUNT(*) as 'COUNT'  FROM tb_inventariodetalle  id Inner join tb_inventario i on  id.INV_CodigoInterno=i.INV_CodigoInterno
        WHERE  id.INVDET_CodigoInterno LIKE Codigo
        AND id.INVDET_FechaRegistro LIKE FechaRegistro
        AND id.INVDET_FechaModificacion LIKE FechaModificacion
        AND id.INVDET_StockIngreso LIKE StockIngreso
        AND id.INVDET_StockModificado LIKE StockModificado
        AND id.INV_CodigoInterno LIKE INVENTARIO;
	end if;
END //
delimiter;


delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Boleta(
    tipo VARCHAR(1),
    Codigo VARCHAR(7),
    Numero VARCHAR(10),
    Serie VARCHAR(3),
    FechaRegistro int,
    Total DOUBLE(8,2),
	SUCURSAL INT
    )
BEGIN
		if(tipo= "C") then
			INSERT INTO tb_boleta(
                BOL_CodigoInterno,
                BOL_Numero,
                BOL_Serie,
                BOL_FechaRegistro,
                BOL_Total,
                SUC_CodigoInterno
                )  VALUES(
                Codigo,
                Numero,
                Serie,
                FechaRegistro,
                Total,
                SUCURSAL
        );
		end if;
		if(tipo= "U") then
			UPDATE tb_boleta set
            BOL_Numero=Numero,
            BOL_Serie=Serie,
            BOL_FechaRegistro=FechaRegistro,
            BOL_Total=Total,
            SUC_CodigoInterno=SUCURSAL
            where BOL_CodigoInterno=  Codigo;
		end if;
		if(tipo= "D") then
			UPDATE tb_boleta set
			INV_Estado= "0"
			where	BOL_CodigoInterno= Codigo;
		end if;
		if(tipo= "E") then
			DELETE FROM tb_boleta where	BOL_CodigoInterno= Codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Boleta(tipo VARCHAR(1),
            Codigo VARCHAR(10),
            Numero VARCHAR(15),
            Serie VARCHAR(5),
            FechaRegistro varchar(13),
            Total varchar(10),
            SUCURSAL varchar(13),
        NOffset INT,Nrows INT)
BEGIN
	if(tipo= "T")then
		SELECT b.*  FROM tb_boleta  b Inner join tb_sucursal s on  b.SUC_CodigoInterno=s.SUC_CodigoInterno
        WHERE  b.BOL_CodigoInterno LIKE Codigo
        AND b.BOL_Numero LIKE Numero
        AND b.BOL_Serie LIKE Serie
        AND b.BOL_FechaRegistro LIKE FechaRegistro
        AND b.BOL_Total LIKE Total
        AND b.SUC_CodigoInterno LIKE SUCURSAL
		ORDER BY b.BOL_CodigoInterno LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo= "P")then
		SELECT COUNT(*) as 'COUNT'  FROM tb_boleta  b Inner join tb_sucursal s on  b.SUC_CodigoInterno=s.SUC_CodigoInterno
        WHERE  b.BOL_CodigoInterno LIKE Codigo
        AND b.BOL_Numero LIKE Numero
        AND b.BOL_Serie LIKE Serie
        AND b.BOL_FechaRegistro LIKE FechaRegistro
        AND b.BOL_Total LIKE Total
        AND b.SUC_CodigoInterno LIKE SUCURSAL;
	end if;
END //
delimiter;

delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Menu(
    tipo VARCHAR(1),
    Codigo VARCHAR(7),
    Padre VARCHAR(7),
	Nombre VARCHAR(50),
	Tipo_M VARCHAR(10),
	Icono VARCHAR(100),
	Ruta VARCHAR(500),
    Estado VARCHAR(1)
    )
BEGIN
		if(tipo= "C") then
			INSERT INTO tb_menu(
                MEN_CodigoInterno,
                MEN_CodigoPadre,
                MEN_Nombre,
                MEN_Tipo,
                MEN_Icono,
                MEN_Ruta,
                MEN_Estado
                )  VALUES(
                Codigo,
                Padre,
                Nombre,
                Tipo_M,
                Icono,
                Ruta,
                Estado
        );
		end if;
		if(tipo= "U") then
			UPDATE tb_menu set
                MEN_Nombre=Nombre,
                MEN_Tipo=Tipo_M,
                MEN_Icono=Icono,
                MEN_Ruta=Ruta,
                MEN_Estado=Estado
            where MEN_CodigoInterno=  Codigo;
		end if;
		if(tipo= "D") then
			UPDATE tb_menu set
			MEN_Estado= "0"
			where	MEN_CodigoInterno= Codigo;
		end if;
		if(tipo= "E") then
			DELETE FROM tb_menu where	MEN_CodigoInterno= Codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Menu(tipo VARCHAR(1),
            Codigo VARCHAR(10),
            Padre VARCHAR(10),
            Nombre VARCHAR(55),
            Tipo_M Varchar(15),
            Estado VARCHAR(5),
        NOffset INT,Nrows INT)
BEGIN
	if(tipo= "T")then
		SELECT *  FROM tb_menu
        WHERE  MEN_CodigoInterno LIKE Codigo
        AND MEN_CodigoPadre LIKE Padre
        AND MEN_Nombre LIKE Nombre
         AND MEN_Tipo LIKE Tipo_M
        AND MEN_Estado LIKE Estado
		ORDER BY MEN_CodigoInterno LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo= "P")then
		SELECT COUNT(*) as 'COUNT'  FROM tb_menu
        WHERE  MEN_CodigoInterno LIKE Codigo
        AND MEN_CodigoPadre LIKE Padre
        AND MEN_Nombre LIKE Nombre
        AND MEN_Tipo LIKE Tipo_M
        AND MEN_Estado LIKE Estado;
	end if;
END //
delimiter;

delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Tipobanner(
    tipo VARCHAR(1),
    Codigo int ,
    Nombre varchar(200),
   Html VARCHAR(500),
	cantidad int,
    Estado char(1)
    )
BEGIN
		if(tipo= "C") then
			INSERT INTO tb_tipobanner(
                TIPBAN_CodigoInterno,
                TIPBAN_Nombre,
                TIPBAN_Html,
                TIPBAN_cantidad,
                TIPBAN_Estado
                )  VALUES(
                Codigo,
                Nombre,
                Html,
                cantidad,
                Estado
        );
		end if;
		if(tipo= "U") then
			UPDATE tb_tipobanner set
                TIPBAN_Nombre=Nombre,
                TIPBAN_Html=Html,
                TIPBAN_cantidad=cantidad,
                TIPBAN_Estado=Estado
            where TIPBAN_CodigoInterno=  Codigo;
		end if;
		if(tipo= "D") then
			UPDATE tb_tipobanner set
			TIPBAN_Estado= "0"
			where	TIPBAN_CodigoInterno= Codigo;
		end if;
		if(tipo= "E") then
			DELETE FROM tb_tipobanner where	TIPBAN_CodigoInterno= Codigo;
		end if;
END //
delimiter ;

delimiter //
CREATE PROCEDURE PROCEDURE_SELECT_Tipobanner(tipo VARCHAR(1),
            Codigo VARCHAR(10),
            Nombre VARCHAR(55),
            Estado VARCHAR(5),
        NOffset INT,Nrows INT)
BEGIN
	if(tipo= "T")then
		SELECT *  FROM tb_tipobanner
        WHERE  TIPBAN_CodigoInterno LIKE Codigo
        AND TIPBAN_Nombre LIKE Nombre
        AND TIPBAN_Estado LIKE Estado
		ORDER BY TIPBAN_CodigoInterno LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo= "P")then
		SELECT COUNT(*) as 'COUNT'  FROM tb_tipobanner
        WHERE  TIPBAN_CodigoInterno LIKE Codigo
        AND TIPBAN_Nombre LIKE Nombre
        AND TIPBAN_Estado LIKE Estado;
	end if;
END //
delimiter;

/*procedimientos especiales*/

delimiter //
CREATE PROCEDURE PROCEDURE_LOGIN_Usuario(usuario VARCHAR(500),clave  VARCHAR(500))
BEGIN
	SELECT USU_CodigoInterno FROM tb_usuario  WHERE USU_Usuario=usuario and USU_Clave=clave;
END //
delimiter;

delimiter //
CREATE PROCEDURE PROCEDURE_CREAR_PEDIDO(usuario int)
BEGIN
	DECLARE id VARCHAR(20);
	
	DECLARE idAnterior VARCHAR(12);
	DECLARE codigo int;
	DECLARE cant_pedido int;
	DECLARE cantidad INT default 0;
	DECLARE cantidadpedido INT;

	SET idAnterior=(SELECT PED_CodigoInterno FROM tb_pedido ORDER BY PED_CodigoInterno DESC LIMIT 1);
	set cant_pedido =	(SELECT COUNT(*) FROM tb_pedido  WHERE USU_CodigoInterno=usuario AND PED_Estado="1");
	set cantidadpedido =	(SELECT COUNT(*) FROM tb_pedido);
	
	SET id=CrearCodigoNumerico(12,cantidadpedido,"PED_");
	
	/*if(idAnterior IS NULL)then
		set idAnterior="1";
	END if;
	
	WHILE cantidad<(12-LENGTH(idAnterior)) DO
			SET numero=CONCAT(numero,"0");
			set cantidad=cantidad+1;
	END while;
		
	SET id=CONCAT("PED_",numero,cantidadpedido+1);*/
	
	if(cant_pedido=0)then
		INSERT INTO tb_pedido(PED_Numero,PED_Total,PED_Descuento,PED_FechaRegistro,FORM_CodigoInterno,USU_CodigoInterno,TIPPED_CodigoInterno,PED_Comentario,PED_Estado)
		VALUES (id,0,0,current_date,1,usuario,1,"","1");
	end if;
		SET codigo=(SELECT PED_CodigoInterno FROM tb_pedido  WHERE USU_CodigoInterno=usuario AND PED_Estado="1"ORDER BY PED_CodigoInterno DESC LIMIT 1);

	SELECT id,codigo,LENGTH(idAnterior),idAnterior,cant_pedido;
END //
delimiter;

-- drop PROCEDURE PROCEDURE_CREAR_PEDIDO;
-- CALL PROCEDURE_CREAR_PEDIDO("1");

delimiter //
CREATE PROCEDURE PROCEDURE_Inventariado(tipo VARCHAR(5),stock int,codigo INT)
BEGIN
	DECLARE id VARCHAR(15);
  	DECLARE numero VARCHAR(10) DEFAULT "0";
	DECLARE exist_inventario INT DEFAULT 0;
	DECLARE cantidad INT DEFAULT 0;
	DECLARE total INT;
	DECLARE cod VARCHAR(15);
	
	SET total=(SELECT COUNT(*) FROM tb_inventario ORDER BY INV_CodigoInterno DESC LIMIT 1);
	

	SET id= CrearCodigoNumerico(10,total,"INV_");
	/*WHILE cantidad<(10-LENGTH(total)) DO
			SET numero=CONCAT(numero,"0");
			set cantidad=cantidad+1;
	END while;
		
	SET id=CONCAT("INV_",numero,total+1);*/
	
	if(tipo="ART")then
		set exist_inventario =(SELECT COUNT(*) FROM tb_inventario  WHERE ART_CodigoInterno=codigo AND INV_Estado="1");
		if(exist_inventario=0)then
			INSERT INTO tb_inventario(INV_CodigoInterno,INV_FechaRegistro,INV_StockModificado,ART_CodigoInterno,
			ITEM_CodigoInterno,INV_Estado) VALUES (id,CURRENT_DATE,stock,codigo,1,"1") ;
		END if;
	END if;
	if(tipo="ITEM")then
		set exist_inventario =(SELECT COUNT(*) FROM tb_inventario  WHERE INV_CodigoInterno=codigo AND INV_Estado="1");
		if(exist_inventario=0)then
			INSERT INTO tb_inventario(INV_CodigoInterno,INV_FechaRegistro,INV_StockModificado,ART_CodigoInterno,
			ITEM_CodigoInterno,INV_Estado) VALUES (id,CURRENT_DATE,stock,1,codigo,"1") ;
		END if;
	END if;
		
	SET cod=(SELECT INV_CodigoInterno FROM tb_inventario ORDER BY INV_CodigoInterno DESC LIMIT 1);	
	SELECT cod;
END //
delimiter;
-- DROP PROCEDURE PROCEDURE_Inventariado;
-- CALL PROCEDURE_Inventariado("ART",10,2)

delimiter //
CREATE PROCEDURE PROCEDURE_PEDIDO_STOCK(pedido INT,articulo INT,cantidad INT)
BEGIN
	DECLARE id_inventario INT;
	DECLARE id_pedido INT;
	DECLARE total_pedido INT;
	DECLARE total_articulo INT;
	DECLARE cantArt INT;
	
		SET id_inventario=(SELECT ART_Stock FROM tb_articulo WHERE ART_CodigoInterno=articulo);
		SET total_articulo=(id_inventario-cantidad);
		SET id_pedido=(SELECT PEDDET_Cantidad FROM tb_pedidodetalle WHERE PED_CodigoInterno=pedido and ART_CodigoInterno=articulo);
		SET total_pedido=(id_pedido+cantidad);
		SET cantArt=(SELECT COUNT(*) FROM tb_pedidodetalle WHERE PED_CodigoInterno=pedido and ART_CodigoInterno=articulo);
		
	-- SET id_inventario=(SELECT INV_StockModificado FROM tb_inventario WHERE ART_CodigoInterno=articulo ORDER BY INV_CodigoInterno DESC LIMIT 1);
	
		UPDATE tb_articulo set ART_Stock=total_articulo WHERE ART_CodigoInterno=articulo;
	

	if(cantArt=0) then
	 INSERT INTO tb_pedidodetalle(PED_CodigoInterno,ART_CodigoInterno,ARTIT_CodigoInterno,PEDDET_FechaRegistro,PEDDET_Cantidad) VALUES (pedido,articulo,1,CURRENT_DATE,cantidad) ;
	end if;
	if(cantArt!=0) then
	 UPDATE tb_pedidodetalle set PEDDET_Cantidad=total_pedido where PED_CodigoInterno=pedido;
	end if;
	
	SELECT total_articulo;
END //
delimiter;

-- DROP procedure PROCEDURE_PEDIDO_STOCK
-- CALL PROCEDURE_PEDIDO_STOCK(1,23,1)


-- functions



delimiter $$
CREATE FUNCTION CrearCodigoNumerico(totalLen INT,info int,nameCod VARCHAR(10))
RETURNS VARCHAR(100) DETERMINISTIC
BEGIN
	DECLARE id VARCHAR(100);
  	DECLARE numero VARCHAR(100) DEFAULT "0";
	DECLARE cantidad INT DEFAULT 0;
	

	WHILE cantidad<(totalLen-LENGTH(info)) DO
			SET numero=CONCAT(numero,"0");
			set cantidad=cantidad+1;
	END while;
		
	SET id=CONCAT(nameCod,numero,info+1);
	RETURN id;
END $$
delimiter;





