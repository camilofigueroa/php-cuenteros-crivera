SHOW DATABASES;
drop schema bd_cuenteros; 
create schema bd_cuenteros;
USE bd_cuenteros;
show tables;

#20210605 10:46 se creó este campo para el orden del capítulo.
ALTER TABLE `tb_capitulos` ADD `orden` DOUBLE NULL AFTER `id_proyecto`;
update tb_capitulos set orden = id_capitulo;

select * from tb_capitulos;

drop function max_orden_capitulo;
select max_orden_capitulo( 1 );

drop function max_proximo_orden_capitulo;
#Proyecto 1, capitulo 1, el. menor
select max_proximo_orden_capitulo( 1, 3, 1 );

drop function cambiar_orden_capitulo;
select cambiar_orden_capitulo( 1, 7, 6 );



	UPDATE tb_capitulos t1m tb_capitulos t2
	SET t1.orden = 
	WHERE t1.id_proyecto = 1
	AND t1.id_capitulo = 5
	and t2.id_proyecto = t1.id_proyecto
	AND t2.id_capitulo = 6
	AND 1 = 2;



			
	


	




