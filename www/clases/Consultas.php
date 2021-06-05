<?php

    include( "clases/Conexion.php" );

    class Consultas extends Conexion
    {
        /**
         * Hasta el momento solo consulta un dato de una tabla.
         *
         */
        static function consultar_dato( $tabla, $campos = null, $ordenamiento = null )
        {
            $conexion = self::conectar();
     
            if( $campos == null ) $campos = " * ";
     
            //Esta clase es del modelo.
            $sql = "SELECT $campos FROM $tabla ";
            if( $ordenamiento != null ) $sql .= " ORDER BY $ordenamiento ";
            //echo $sql."<br>";
            $resultado = $conexion->query( $sql );

            $conexion->close();

            return $resultado;
        }

        /**
         * Consulta los datos entre proyecto y capítulo.
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
         * Trae los objetos de un capítulo.
         * @param       número      Un id capítulo a retornar, es opcional. 
         * @param       número      Una bandera para alterar los resultados.
         * @return      recordset   Un arreglo con los resultados de la base de datos.
         */
        static function traer_capitulo_objetos( $id_capitulo = null, $des = null )
        {              
            $conexion = self::conectar();
                    
            $sql  = " select ";
            
            switch( $des )
            {
                case null:
                        $sql .= " t1.id_capitulo, t2.id_objeto, t2.tipo_objeto, t2.fecha_registro, t4.titulo_capitulo ";           
                    break;
                
                case 1: //Trae para la lista de capítulos y objetos. 
                        $sql .= " t1.id_capitulo, CONCAT( t4.titulo_capitulo, '-', t2.id_objeto ) as mezcla  ";           
                    break;
                case 2: //Una vez se selecciona el capítulo, se requiere la lista solo de objetos de ese capítulo.
                        $sql .= " t1.id_objeto, t1.id_objeto ";           
                    break;
                case 3: //Una vez se selecciona el capítulo, se requiere la lista solo de objetos de ese capítulo.
                    $sql .= " t1.id_objeto, '<br>' ";           
                    break;
            }
            
            $sql .= " from tb_capitulos_objetos t1, tb_objetos t2, tb_tipos_objeto t3, tb_capitulos t4 ";
            $sql .= " where t1.id_objeto = t2.id_objeto ";
            $sql .= " and t2.tipo_objeto = t3.tipo_objeto ";
            $sql .= " and t1.id_capitulo = t4.id_capitulo ";
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
        static function traer_capitulo_vectorizados( $id_capitulo, $des = null )
        {              
            $conexion = self::conectar();
                    
            $sql  = " select ";

            switch( $des )
            {
                case null:
                    $sql .= " t1.id_vectorizacion, ";
                    $sql .= " t1.id_objeto_vectoriza, t2.desc_vectorizacion, t1.id_objeto_vectorizado, t1.nota, ";
                    $sql .= " t1.fecha_registro, t1.id_vectorizacion_padre, t1.id_estado  ";        
                    break;
                
                case 1: 
                        $sql .= " t1.id_vectorizacion, CONCAT( t1.id_objeto_vectoriza, ' ', t2.desc_vectorizacion, ' ', t1.id_objeto_vectorizado ) AS dato, '<br>'  ";           
                    break;
            }

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

        /**
         * Trae los objetos vectorizados, no puede depender del capítulo porque una vectorización de un capítulo
         * puede depender de la de otro.
         * @return      recordset       UN recordset de la base de datos.
         */
        static function traer_vectorizados( $des = null )
        {              
            $conexion = self::conectar();
                    
            $sql  = "";
            $sql .= " select ";

            switch($des )
            {
                case null:

                    $sql .= " t1.id_vectorizacion, ";
                    $sql .= " CONCAT( t1.id_objeto_vectoriza, ' ', t2.desc_vectorizacion, ' ', t1.id_objeto_vectorizado, ' E:', t1.id_estado, ' cap:', ( SELECT MAX( t3.titulo_capitulo ) FROM tb_capitulos t3 WHERE t1.id_capitulo = t3.id_capitulo ) ) as resumen ";
                    //$sql .= " t1.id_objeto_vectoriza, t2.desc_vectorizacion, t1.id_objeto_vectorizado, t1.nota, ";
                    //$sql .= " t1.fecha_registro, t1.id_vectorizacion_padre, t1.id_estado  ";

                    break;

                case 1:

                    $sql .= " t1.*, ";
                    $sql .= " CONCAT( t1.id_objeto_vectoriza, ' <strong>', t2.desc_vectorizacion, '</strong> ', t1.id_objeto_vectorizado ) as resumen ";

                    break;
            }

            
            $sql .= " from tb_vectorizados t1, tb_tipo_vectorizacion t2 ";
            $sql .= " where t1.id_tipo_vectorizacion = t2.id_tipo_vectorizacion ";
            $sql .= " order by id_vectorizacion, id_vectorizacion_padre, t1.fecha_registro ";

            //echo $sql."<br>";
            $resultado = $conexion->query( $sql );

            $conexion->close();

            return $resultado;
        }

        /**
         * 
         *
         */
        static function arboles_palabras()
        {
            $conexion = self::conectar();
     
            //Esta clase es del modelo.
            $sql  = "  ";
            $sql .= " select CONCAT( 'cap ', t1.id_capitulo, '-', length( t4.texto ) ) as cap, ";
            $sql .= " t1.id_objeto, CONCAT( '(', t2.id_vectorizacion, ')' ) as id_v, ";
            $sql .= " t3.desc_vectorizacion, t2.id_objeto_vectorizado, ";
            $sql .= " case ";
            $sql .= " 	when t2.id_vectorizacion = t2.id_vectorizacion_padre ";
            $sql .= " 	then '' ";
            $sql .= " 	else CONCAT( '(', t2.id_vectorizacion_padre, ')' ) ";
            $sql .= " end as id_v_p ";
            //$sql .= " case ";
            $sql .= " from tb_capitulos_objetos t1, tb_vectorizados t2, tb_tipo_vectorizacion t3, ";
            $sql .= " tb_capitulos t4 ";
            $sql .= " where t1.id_objeto = t2.id_objeto_vectoriza ";
            $sql .= " and t1.id_capitulo = t2.id_capitulo ";
            $sql .= " and t2.id_tipo_vectorizacion = t3.id_tipo_vectorizacion ";
            $sql .= " and t1.id_capitulo = t4.id_capitulo ";
            $sql .= " union ";
            $sql .= " select CONCAT( 'cap ', tc.id_capitulo, '-', length( tc.texto ) ) as cap, ";
            $sql .= " 0, '', '', '', '' ";
            $sql .= " from tb_capitulos tc ";
            $sql .= " where not exists (    select 1 from tb_capitulos_objetos tco ";
            $sql .= " 					    where tc.id_capitulo = tco.id_capitulo ";
            $sql .= " 				    ) ";
            $sql .= " order by cap ";
            //echo $sql."<br>";
            $resultado = $conexion->query( $sql );

            $conexion->close();

            return $resultado;
        }
    }
    