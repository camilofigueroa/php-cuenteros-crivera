
DELIMITER //

CREATE FUNCTION max_proximo_orden_capitulo( id_proy int, id_cap int, des int ) RETURNS double
BEGIN
	
	#Primero busca el mayor orden hacia abajo, luego el menor dependiendo de des hacia arriba.
	IF des = 1 THEN 
		
		select min( orden ) INTO @salida
		from tb_capitulos t1 
		where id_proyecto = 1
		and orden > (   select min( orden ) 
						from tb_capitulos t2 
						where t1.id_proyecto = t2.id_proyecto
						and id_capitulo = id_cap
					);
		
	ELSE
		
			select max( orden ) INTO @salida
			from tb_capitulos t1 
			where id_proyecto = 1
			and orden < (   select max( orden ) 
							from tb_capitulos t2 
							where t1.id_proyecto = t2.id_proyecto
							and id_capitulo = id_cap
						);			
	END	IF;

	#Me devuelve el mismo orden del capítulo que entra si NO encuetra, es decir, si está en los límites.
	IF @salida IS NULL THEN
	
		SELECT orden INTO @salida FROM tb_capitulos 
		WHERE id_proyecto = id_proy AND id_capitulo = id_cap;
	
	END IF;
		
	return @salida;
		
END

//

DELIMITER ;

