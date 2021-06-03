<?php

    include( "clases/Conexion.php" );

    class Inserciones extends Conexion
    {
        /**
         * Inserta datos en la tabla tb_capitulo.
         * @param       texto       Id del proyecto
         * @param       texto       Título del capítulo.
         * @param       texto       Cuerpo del capítulo.
         * @return      número      1 si escribió, -1 en caso contrario. 
         */
        static function insertar_capitulos( $id_proyecto, $titulo_capitulo, $texto )
        {
            $salida = "";

            $conexion = self::conectar();
    
            $sql  = " INSERT INTO tb_capitulos ( id_capitulo, titulo_capitulo, texto, fecha_registro, id_proyecto )";
            $sql .= " VALUES( null, '$titulo_capitulo', '$texto', NOW(), '$id_proyecto' )";
            //echo $sql;
            $resultado = $conexion->query( $sql );

            if( $conexion->affected_rows > 0 )
            {
                $salida = 1;

            }else{

                $salida = -1;
            }

            $conexion->close();

            return $salida;
        }

        /**
         * Inserta datos en la tabla de objetos capítulos, es decir, asocia objetos a los capítulos.
         */
        static function insertar_objetos_capitulos( $id_capitulo, $id_objeto )
        {
            $salida = "";

            $conexion = self::conectar();
    
            $sql  = " INSERT INTO tb_capitulos_objetos ( id_capitulo, id_objeto, fecha_registro )";
            $sql .= " VALUES( '$id_capitulo', '$id_objeto', NOW() )";
            //echo $sql;
            $resultado = $conexion->query( $sql );

            if( $conexion->affected_rows > 0 )
            {
                $salida = 1;

            }else{

                $salida = -1;
            }

            $conexion->close();

            return $salida;
        }

        /**
         * Inserta las diferentes vectorizaciones entre personajes.
         */
        static function insertar_vectorizaciones( $id_capitulo, $id_objeto_vectoriza, $id_objeto_vectorizado, $id_tipo_vectorizacion, $id_estado, $id_vectorizacion_padre, $nota )
        {
            $salida = "";

            $conexion = self::conectar();
    
            $sql  = " INSERT INTO tb_vectorizados ( id_vectorizacion, id_capitulo, id_objeto_vectoriza, id_objeto_vectorizado, id_tipo_vectorizacion, id_estado, id_vectorizacion_padre, nota, fecha_registro )";
            $sql .= " VALUES( null, '$id_capitulo', '$id_objeto_vectoriza', '$id_objeto_vectorizado', '$id_tipo_vectorizacion', '$id_estado', '$id_vectorizacion_padre', '$nota', NOW() )";
            //echo $sql;
            $resultado = $conexion->query( $sql );

            if( $conexion->affected_rows > 0 )
            {
                $salida = 1;

            }else{

                $salida = -1;
            }

            $conexion->close();

            return $salida;
        }

    }
    