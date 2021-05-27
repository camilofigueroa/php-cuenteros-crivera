<?php

    class Vimprimir
    {
        static function imprimir( $resultado, $des = null )
        {
            return self::organizar( $resultado, $des );
        }

        /**
         * Se encarga de organizar contenido de una consulta en una tabla html, o solo para impresión.
         * @param       recordset           Resultado de una consulta.
         * @param       texto o número      Una variable bandera o de decisión.
         * @param       texto               Un texto que representa un html o un resultado.
         */
        static function organizar( $resultado, $des = null )
        {
            $salida = "";

            if( $des == null ) $salida .= "<table border='1px'>";

            while( $fila = mysqli_fetch_array( $resultado ) )
            {
                if( $des == null ) $salida .= "<tr>";

                for( $i = 0; $i < mysqli_num_fields( $resultado ); $i ++ )
                {
                    if( $des == null ) $salida .= "<td>";
                    $salida .= $fila[ $i ];
                    if( $des == null ) $salida .= "</td>";

                    /*if( $i + 1 == mysqli_num_fields( $resultado ) )
                    {
                        if( $des == null ) $salida .= "<td><a href='#'>Editar</a></td>";
                        if( $des == null ) $salida .= "<td><a href='#'>Borrar</a></td>";
                    }*/
                }

                if( $des == null ) $salida .= "</tr>";
            }            

            if( $des == null ) $salida .= "</table>";

            return $salida;
        }
    }
    