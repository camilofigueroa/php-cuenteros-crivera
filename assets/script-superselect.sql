USE bd_cuenteros;

select * 
from tb_proyectos tp, tb_capitulos tc, tb_capitulos_objetos tco, tb_objetos tob, tb_tipos_objeto tto
where tp.id_proyecto = tob.id_proyecto 
and tob.tipo_objeto = tto.tipo_objeto 
and tc.id_proyecto = tp.id_proyecto 
and tco.id_capitulo = tc.id_capitulo 
and tco.id_objeto = tob.id_objeto;
