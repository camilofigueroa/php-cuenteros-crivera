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

#Permite traer las combinatorias de capítulo vs objetos.
select id_objeto, titulo_capitulo,
( 	select count( * ) from tb_capitulos t11, tb_objetos t21, tb_capitulos_objetos tco 
	where t1.id_capitulo = t11.id_capitulo 
	and t2.id_objeto = t21.id_objeto 
	and t1.id_capitulo = tco.id_capitulo
	and t2.id_objeto = tco.id_objeto
) as cruce
from tb_capitulos t1, tb_objetos t2
order by id_objeto, titulo_capitulo;

#Ojo, se agregó el campo
 #muestra_texto 	varchar(3000) 	utf8mb4_general_ci 		Sí 	NULL
 #a la tabla de capítulos objetos.

ALTER TABLE `tb_capitulos_objetos` ADD `muestra_texto` VARCHAR(3000) NULL AFTER `id_objeto`;


#Select del árbol de palabras.
select CONCAT( 'cap ', t1.id_capitulo, '-', length( t4.texto ) ) as cap, 
t1.id_objeto, CONCAT( '(', t2.id_vectorizacion, ')' ) as id_v, 
t3.desc_vectorizacion, t2.id_objeto_vectorizado, 
case when t2.id_vectorizacion = t2.id_vectorizacion_padre then '' else CONCAT( '(', t2.id_vectorizacion_padre, ')' ) end as id_v_p, orden 
from tb_capitulos_objetos t1, tb_vectorizados t2, tb_tipo_vectorizacion t3, tb_capitulos t4 
where t1.id_objeto = t2.id_objeto_vectoriza 
and t1.id_capitulo = t2.id_capitulo 
and t2.id_tipo_vectorizacion = t3.id_tipo_vectorizacion 
and t1.id_capitulo = t4.id_capitulo 
and t4.id_proyecto = 1
union 
select CONCAT( 'cap ', tc.id_capitulo, '-', length( tc.texto ) ) as cap, 0, '', '', '', '', orden 
from tb_capitulos tc 
where not exists ( select 1 from tb_capitulos_objetos tco where tc.id_capitulo = tco.id_capitulo ) 
and tc.id_proyecto = 1 order by orden, cap ;




