<?php

    include( "clases/Conexion.php" );

    class Consultas extends Conexion
    {
        /**
         * Hasta el momento solo consulta un dato de una tabla.
         *
         */
        static function consultar_dato( $tabla, $campos = null )
        {
            $conexion = self::conectar();
     
            if( $campos == null ) $campos = " * ";
     
            //Esta clase es del modelo.
            $sql = "SELECT $campos FROM $tabla ";
            //echo $sql."<br>";
            $resultado = $conexion->query( $sql );

            $conexion->close();

            return $resultado;
        }

        /**
         * COnsulta los datos entre proyecto y capítulo.
         * 
         * 
         */
        static function traer_proyecto_capitulo( $id_proyecto, $id_capitulo )
        {
            $conexion = self::conectar();

            $sql  = " select titulo_proyecto, titulo_capitulo, texto, t2.fecha_registro ";
            $sql .= " from tb_proyectos t1, tb_capitulos t2 ";
            $sql .= " where t1.id_proyecto = t2.id_proyecto ";
            $sql .= " and t1.id_proyecto = $id_proyecto ";
            $sql .= " and t2.id_capitulo = $id_capitulo  ";

            //echo $sql;
            $resultado = $conexion->query( $sql );

            $conexion->close();

            return $resultado;
        }

        /**
         *
         *
         *
         */
        static function consultar_persona_nombre( $nombre )
        {
            $conexion = self::conectar();
     
            //Esta clase es del modelo.
            $sql = "SELECT * FROM tb_personas WHERE nombre LIKE '%$nombre%'";
            //echo $sql;
            $resultado = $conexion->query( $sql );

            $conexion->close();

            return $resultado;
        }

        /**
         *
         *
         */
        static function autenticacion( $documento, $clave )
        {              
            $conexion = self::conectar();
        
            //Esta clase es del modelo.
            $sql  = " SELECT 1 ";
            $sql .= " FROM tb_personas ";
            $sql .= " WHERE documento = '$documento' ";
            $sql .= " AND clave = '$clave' ";
            //echo $sql;
            $resultado = $conexion->query( $sql );

            $conexion->close();

            return $resultado;
        }
        
        /**
         * Trae los objetos de un capítulo.
         *
         *
         *
         */
        static function traer_capitulo_objetos( $id_capitulo = null )
        {              
            $conexion = self::conectar();
                    
            $sql  = " select t1.id_capitulo, t2.id_objeto, t2.tipo_objeto, t2.fecha_registro ";
            $sql .= " from tb_capitulos_objetos t1, tb_objetos t2, tb_tipos_objeto t3 ";
            $sql .= " where t1.id_objeto = t2.id_objeto ";
            $sql .= " and t2.tipo_objeto = t3.tipo_objeto ";
            if( $id_capitulo != null ) $sql .= " and t1.id_capitulo = $id_capitulo ";
            $sql .= " order by t1.id_capitulo, t2.fecha_registro ";
            //echo $sql;
            $resultado = $conexion->query( $sql );

            $conexion->close();

            return $resultado;
        }

        /**
         * Trae los objetos vectorizados por capítulo
         * @param       número          Un id capítulo.
         * @return      recordset       UN recordset de la base de datos.
         */
        static function traer_capitulo_vectorizados( $id_capitulo )
        {              
            $conexion = self::conectar();
                    
            $sql  = "";
            $sql .= " select ";
            $sql .= " t1.id_vectorizacion, ";
            $sql .= " t1.id_objeto_vectoriza, t2.desc_vectorizacion, t1.id_objeto_vectorizado, t1.nota, ";
            $sql .= " t1.fecha_registro, t1.id_vectorizacion_padre, t1.id_estado  ";
            $sql .= " from tb_vectorizados t1, tb_tipo_vectorizacion t2, tb_capitulos_objetos t3 ";
            $sql .= " where t1.id_tipo_vectorizacion = t2.id_tipo_vectorizacion  ";
            $sql .= " and t1.id_capitulo = t3.id_capitulo ";
            $sql .= " and t1.id_objeto_vectoriza = t3.id_objeto  ";
            //$sql .= " and ( t1.id_objeto_vectoriza = t3.id_objeto or t1.id_objeto_vectorizado = t3.id_objeto ) ";
            $sql .= " and t1.id_capitulo = $id_capitulo ";
            $sql .= " order by id_vectorizacion, t1.fecha_registro ";

            //echo $sql."<br>";
            $resultado = $conexion->query( $sql );

            $conexion->close();

            return $resultado;
        }

    }
    