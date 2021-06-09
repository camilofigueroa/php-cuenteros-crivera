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

#Permite traer lac combinatorias de capítulo vs objetos.
select id_objeto, titulo_capitulo,
( 	select count( * ) from tb_capitulos t11, tb_objetos t21, tb_capitulos_objetos tco 
	where t1.id_capitulo = t11.id_capitulo 
	and t2.id_objeto = t21.id_objeto 
	and t1.id_capitulo = tco.id_capitulo
	and t2.id_objeto = tco.id_objeto
) as cruce
from tb_capitulos t1, tb_objetos t2
order by id_objeto, titulo_capitulo;


	




