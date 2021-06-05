SHOW DATABASES;
drop schema bd_cuenteros; 
create schema bd_cuenteros;
USE bd_cuenteros;
show tables;



select 'Arbol de palabras';

select CONCAT( 'cap ', t1.id_capitulo, '-', length( t4.texto ) ) as cap, 
t1.id_objeto, CONCAT( '(', t2.id_vectorizacion, ')' ) as id_v,
t3.desc_vectorizacion, t2.id_objeto_vectorizado,  
case 
	when t2.id_vectorizacion = t2.id_vectorizacion_padre
	then ''
	else CONCAT( '(', t2.id_vectorizacion_padre, ')' ) 
end as id_v_p
from tb_capitulos_objetos t1, tb_vectorizados t2, tb_tipo_vectorizacion t3,
tb_capitulos t4
where t1.id_objeto = t2.id_objeto_vectoriza
and t1.id_capitulo = t2.id_capitulo
and t2.id_tipo_vectorizacion = t3.id_tipo_vectorizacion
and t1.id_capitulo = t4.id_capitulo 
union 
select CONCAT( 'cap ', tc.id_capitulo, '-', length( tc.texto ) ) as cap, 
0, '', '', '', ''
from tb_capitulos tc 
where not exists (  select 1 from tb_capitulos_objetos tco
					where tc.id_capitulo = tco.id_capitulo
				)
order by cap;

--20210605 10:46 se creó este campo para el orden del capítulo.
ALTER TABLE `tb_capitulos` ADD `orden` DOUBLE NULL AFTER `id_proyecto`;
update tb_capitulos set orden = id_capitulo;

select * from tb_capitulos;

drop function max_orden_capitulo;
select max_orden_capitulo( 1 );


	select max( orden ) 
	from tb_capitulos 
	where id_proyecto = 1;




