<?php

    include_once( "clases/Conexion.php" );

    class Consultas extends Conexion
    {
        /**
         * Hasta el momento solo consulta un dato de una tabla.
         *
         */
        static function consultar_dato( $tabla = null, $campos = null, $ordenamiento = null, $condicion = null )
        {
            $conexion = self::conectar();
     
            if( $campos == null ) $campos = " * ";
     
            //Esta clase es del modelo.
            $sql  = " SELECT $campos ";
            if( $tabla != null ) $sql .= " FROM $tabla ";
            if( $condicion != null ) $sql .= " WHERE $condicion ";
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
        static function traer_capitulo_objetos( $id_proyecto, $id_capitulo = null, $des = null )
        {              
            $conexion = self::conectar();
                    
            $sql  = " select ";
            
            switch( $des )
            {
                case null:
                        $sql .= " t1.id_capitulo, t2.id_objeto, t2.tipo_objeto, t2.fecha_registro, t4.titulo_capitulo, t1.muestra_texto, ";     
                        $sql .= " case ";
                        $sql .= " 	when instr( t4.texto, t1.muestra_texto ) > 0 ";
                        $sql .= " 	then 'si está' ";
                        $sql .= "  	else 'no está'";
                        $sql .= " end as mirando ";
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
            $sql .= " and t2.id_proyecto = $id_proyecto ";
            if( $id_capitulo != null ) $sql .= " and t1.id_capitulo = $id_capitulo ";
            $sql .= " order by t1.id_capitulo, t2.fecha_registro ";
            //echo $sql."<br>";
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
            $sql .= " order by id_vectorizacion_padre, id_vectorizacion, t1.fecha_registro ";

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
        static function traer_vectorizados( $id_proyecto, $des = null )
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
            //$sql .= " and t3.id_tipo_vectorizacion = t2.id_tipo_vectorizacion ";
            $sql .= " and exists ( 	select 1 from tb_capitulos t3 ";
			$sql .= " 	where t3.id_capitulo = t1.id_capitulo ";
			$sql .= " 	and t3.id_proyecto = $id_proyecto ";
			$sql .= " ) ";
            $sql .= " order by id_vectorizacion, id_vectorizacion_padre, t1.fecha_registro ";

            //echo $sql."<br>";
            $resultado = $conexion->query( $sql );

            $conexion->close();

            return $resultado;
        }

        /**
         * Se encarga de generar el sql para la gráfica árbol de palabras.
         * El árbol de palabras no solo se filtra por proyecto, también por capítulo.
         * @param       texto           Identificador del proyecto.
         * @return      recordset       Arreglo con los resultados de la consulta.
         */
        static function arboles_palabras( $id_proyecto )
        {
            $conexion = self::conectar();
     
            //Esta clase es del modelo.
            $sql  = " select  ";
            //$sql .= " CONCAT( 'cap ', t1.id_capitulo, '-', length( t4.texto ) ) as cap, ";
            $sql .= " CONCAT( 'cap ', t1.id_capitulo ) as cap, ";
            //$sql .= " CONCAT( 'cap ', t4.titulo_capitulo ) as cap,";
            //$sql .= " CONCAT( '-', length( t4.texto ) ) as cap, ";
            $sql .= " t1.id_objeto, CONCAT( '(', t2.id_vectorizacion, ')' ) as id_v, ";
            $sql .= " t3.desc_vectorizacion, t2.id_objeto_vectorizado, ";
            $sql .= " case ";
            $sql .= " 	when t2.id_vectorizacion = t2.id_vectorizacion_padre ";
            $sql .= " 	then '' ";
            $sql .= " 	else CONCAT( '(', t2.id_vectorizacion_padre, ')' ) ";
            $sql .= " end as id_v_p, orden ";
            //$sql .= " case ";
            $sql .= " from tb_capitulos_objetos t1, tb_vectorizados t2, tb_tipo_vectorizacion t3, ";
            $sql .= " tb_capitulos t4 ";
            $sql .= " where t1.id_objeto = t2.id_objeto_vectoriza ";
            $sql .= " and t1.id_capitulo = t2.id_capitulo ";
            $sql .= " and t2.id_tipo_vectorizacion = t3.id_tipo_vectorizacion ";
            $sql .= " and t1.id_capitulo = t4.id_capitulo ";
            //$sql .= " and t1.id_capitulo = 33 ";
            $sql .= " and t4.id_proyecto = $id_proyecto ";
            $sql .= " union ";
            //Los capítulos que no tienen asociados objetos.
            $sql .= " select CONCAT( 'cap ', tc.id_capitulo, '-', length( tc.texto ) ) as cap, ";
            $sql .= " 0, '', '', '', '', orden  ";
            $sql .= " from tb_capitulos tc ";
            $sql .= " where not exists (    select 1 from tb_capitulos_objetos tco ";
            $sql .= " 					    where tc.id_capitulo = tco.id_capitulo ";
            $sql .= " 				    ) ";
            $sql .= " and tc.id_proyecto = $id_proyecto ";
            $sql .= " order by orden, cap ";
            //echo $sql."<br>";
            $resultado = $conexion->query( $sql );

            $conexion->close();

            return $resultado;
        }

        /**
         * Se encarga de remplazar en el texto de un capítulo por sus respectivos textos de objetos.
         * @param           texto           Un identificador de capítulo.
         * @param           texto           Un texto extenso de un capítulo.
         * @return          texto           Un texto extenso con un capítulo reprocesado con solores.
         */
        static function remplazar_en_capitulo( $id_capitulo, $texto )
        {   
            $salida = $texto;

            $conexion = self::conectar();
                 
            //Esta clase es del modelo.
            $sql  = " SELECT * FROM tb_capitulos_objetos WHERE id_capitulo = '$id_capitulo' ";
            //echo $sql."<br>";
            $resultado = $conexion->query( $sql );

            while( $fila = mysqli_fetch_assoc( $resultado ) )
            {
                $remplazado = utf8_encode( $fila[ 'muestra_texto' ] );

                if( $remplazado != null )
                {
                    //echo $fila[ 'id_personaje' ];
                    $remplazo = "<mark>$remplazado</mark><sup>".utf8_encode( $fila[ 'id_objeto' ] )."</sup>";
                    $salida = str_replace( $remplazado, $remplazo, $salida );
                }                
            }

            $conexion->close();

            return $salida;
        }

        /**
         * Abreviación de la función consultar dato. Solo consulta el título del proyecto.
         * Para usar esta función ya se debió acceder a la sesión.
         * @return      recordset       Texto que representa el título del proyecto.
         */
        static function consultar_titulo_proyecto()
        {
            return  self::consultar_dato( "tb_proyectos", "titulo_proyecto", null, "id_proyecto = ".$_SESSION[ 'id_proyecto' ] ) ;
        }

        /**
         * 
         * 
         * 
         */
        static function consultas_adicionales( $tabla )
        {
            $salida = "";

            switch( $tabla )
            {
                case 'tb_capitulos':

                    $salida = "";

                    break;

                case 'tb_objetos':
                    break;
            }

            return $salida;
        }

        /**
         * Trae el id que va a ser insertado en una tabla d euna base de datos.
         * 
         */
        static function traer_ultimo_id( $nombre_tabla )
        {
            include( "config.php" );

            $conexion = self::conectar();

            $sql  = " SELECT AUTO_INCREMENT ";
            $sql .= " FROM information_schema.TABLES ";
            $sql .= " WHERE TABLE_SCHEMA = '$bd'  ";
            $sql .= " AND TABLE_NAME = '$nombre_tabla'  ";

            $resultado = $conexion->query( $sql );

            $conexion->close();

            return $resultado;
        }
    }
    