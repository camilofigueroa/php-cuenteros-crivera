USE bd_cuenteros;

select titulo_proyecto, titulo_capitulo, texto, t2.fecha_registro
from tb_proyectos t1, tb_capitulos t2
where t1.id_proyecto = t2.id_proyecto
and t1.id_proyecto = 1
and t2.id_capitulo = 1;


select * 
from tb_proyectos tp, tb_capitulos tc, tb_capitulos_objetos tco, tb_objetos tob, tb_tipos_objeto tto
where tp.id_proyecto = tob.id_proyecto 
and tob.tipo_objeto = tto.tipo_objeto 
and tc.id_proyecto = tp.id_proyecto 
and tco.id_capitulo = tc.id_capitulo 
and tco.id_objeto = tob.id_objeto;

#-------------

select t1.id_capitulo, t2.id_objeto, t2.tipo_objeto, t2.fecha_registro
from tb_capitulos_objetos t1, tb_objetos t2, tb_tipos_objeto t3 
where t1.id_objeto = t2.id_objeto
and t2.tipo_objeto = t3.tipo_objeto
order by t1.id_capitulo, t2.fecha_registro;



select t1.id_objeto_vectoriza, t2.desc_vectorizacion, t1.id_objeto_vectorizado, t1.fecha_registro, t1.id_vectorizacion_padre, t1.id_estado 
from tb_vectorizados t1, tb_tipo_vectorizacion t2, tb_capitulos_objetos t3
where t1.id_tipo_vectorizacion = t2.id_tipo_vectorizacion 
and t1.id_capitulo = t3.id_capitulo
and t1.id_objeto_vectoriza = t3.id_objeto 
and t1.id_capitulo = 1
order by id_vectorizacion, t1.fecha_registro;

select * from tb_vectorizados;
select * from tb_vectorizados;

