
DELIMITER //

CREATE FUNCTION cambiar_orden_capitulo( id_proy int, id_cap_original int, orden_buscado double ) 
RETURNS double
BEGIN
	
	#Primero busca el capitulo del orden siguiente, sea menor o mayor.
	#El max es a futuro y por si nos llega algún día a devolver más de un capítulo.
	SELECT max( id_capitulo ) INTO @id_cap
	FROM tb_capitulos 
	WHERE id_proyecto = id_proy
	AND orden = orden_buscado;
	
	#Busca el orden del capítulo original
	SELECT max( orden ) INTO @nuevo_orden
	FROM tb_capitulos t2
	WHERE id_proyecto = id_proy 
	AND id_capitulo = id_cap_original;

	#Actualizamos el capítulo del orden buscado con el orden del capitulo seleccionado.
	UPDATE tb_capitulos t1
	SET orden = @nuevo_orden
	WHERE id_proyecto = id_proy
	AND id_capitulo = @id_cap;

	UPDATE tb_capitulos
	SET orden = orden_buscado
	WHERE id_proyecto = id_proy
	AND id_capitulo = id_cap_original;

	return 0.0;
		
END

//

DELIMITER ;

