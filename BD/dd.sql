delimiter //
CREATE PROCEDURE PROCEDURE_CRUD_Tipobanner(
    tipo VARCHAR(1),
    Codigo int ,
    Nombre varchar(200),
    Estado char(1)
    )
BEGIN
		if(tipo= "C") then
			INSERT INTO tb_tipobanner(
                TIPBAN_CodigoInterno,
                TIPBAN_Nombre,
                TIPBAN_Estado
                )  VALUES(
                Codigo,
                Nombre,
                Estado
        );
		end if;
		if(tipo= "U") then
			UPDATE tb_tipobanner set
                TIPBAN_Nombre=Nombre,
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
            Estado VARCHAR(5)
        NOffset INT,Nrows INT)
BEGIN
	if(tipo= "T")then
		SELECT *  FROM tb_tipobanner
        WHERE  TIPBAN_CodigoInterno LIKE Codigo
        AND TIPBAN_Nombre LIKE Nombre
        AND TIPBAN_Estado LIKE Estado
		ORDER BY UBI_CodigoInterno LIMIT NOffset OFFSET Nrows;
	end if;
	if(tipo= "P")then
		SELECT count(*)  FROM tb_tipobanner
        WHERE  TIPBAN_CodigoInterno LIKE Codigo
        AND TIPBAN_Nombre LIKE Nombre
        AND TIPBAN_Estado LIKE Estado;
	end if;
END //
delimiter;
