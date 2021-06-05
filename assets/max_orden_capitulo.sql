
DELIMITER //

CREATE FUNCTION max_orden_capitulo( id_proy int ) RETURNS double
BEGIN
	
	select max( orden ) into @max_orden
	from tb_capitulos 
	where id_proyecto = id_proy;
	
	return @max_orden;
		
END

//

DELIMITER ;

