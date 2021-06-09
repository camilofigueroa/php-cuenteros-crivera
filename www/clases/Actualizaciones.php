<?php

    include_once( "clases/Conexion.php" );

    class Actualizaciones extends Conexion
    {
        /**
         * Inserta datos en la tabla tb_capitulo.
         * @param       texto       Id del proyecto
         * @param       texto       Título del capítulo.
         * @param       texto       Cuerpo del capítulo.
         * @return      número      1 si escribió, -1 en caso contrario. 
         */
        static function actualizar_campo( $tabla, $campo, $valor_nuevo, $llave, $valor  )
        {
            $salida = "";

            $conexion = self::conectar();
    
            $sql  = " UPDATE $tabla ";
            $sql .= " SET $campo = '$valor_nuevo' ";
            $sql .= " WHERE $llave = '$valor' ";

            echo $sql;
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
    