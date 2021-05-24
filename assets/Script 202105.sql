SHOW DATABASES;
drop schema bd_cuenteros; 
create schema bd_cuenteros;
USE bd_cuenteros;
show tables;


#Una llave primaria puede ser llave foránea.
CREATE TABLE tb_proyectos
(
	id_proyecto		int 				not null auto_increment,
	titulo_proyecto varchar( 300 )		not null,
    fecha_registro 	datetime			not null,
    primary key( id_proyecto )
);

create table tb_objetos
(
	id_objeto		varchar(100) 	not null,
	id_proyecto		int 	not null,
	fecha_registro 	datetime			not null,
	tipo_objeto 		varchar( 20 )		not null,
	primary key ( id_objeto, id_proyecto )
);

create table tb_tipos_objeto
(
	tipo_objeto 		varchar( 20 )		not null,
	fecha_registro 		datetime			not null,
	primary key(tipo_objeto)
);

CREATE TABLE tb_capitulos
(
	id_capitulo			int		NOT NULL  auto_increment,
	titulo_capitulo 	varchar(300)	NOT NULL,
	texto 				text 			NULL,
	fecha_registro 		datetime			not null,
	id_proyecto		int 	not null,
	PRIMARY key( id_capitulo, id_proyecto )
);

create table tb_capitulos_objetos
(
	id_capitulo		int		NOT NULL,
	id_objeto		varchar(100) 	not null,
	fecha_registro 		datetime			not null,
	primary key( id_capitulo, id_objeto )
);


create table tb_tipo_vectorizacion
(
	id_tipo_vectorizacion 		int			not null 	auto_increment,
	desc_vectorizacion		varchar(20)		not null,
	fecha_registro 			datetime		not null,
	primary key( id_tipo_vectorizacion )
);


create table tb_vectorizados
(
	id_vectorizacion		int		not null 	auto_increment,		
	id_capitulo			int		NOT null,
	id_objeto_vectoriza		varchar(100) 	not null,
	id_objeto_vectorizado		varchar(100) 	not null,
	id_tipo_vectorizacion 		int			not null,
	fecha_registro		datetime			not null,
	primary key ( id_vectorizacion )
);


alter table tb_vectorizados
ADD CONSTRAINT fk_vectorizados_caps_objetos_1 
FOREIGN KEY (id_objeto_vectoriza) 
REFERENCES tb_capitulos_objetos (id_objeto) 
ON DELETE CASCADE ON UPDATE CASCADE;

alter table tb_vectorizados
ADD CONSTRAINT fk_vectorizados_caps_objetos_2 
FOREIGN KEY (id_objeto_vectorizado) 
REFERENCES tb_capitulos_objetos (id_objeto) 
ON DELETE CASCADE ON UPDATE CASCADE;

