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
         * @param       texto               La existencia de este parámetro determina la asignación de un id.
         * @param       número              Índice para saber si se imprime una tabla o una lista.
         * @param       texto               Un nombre de lista o desplegable.
         * @param       texto               Un evento de javascript
         * @return      texto               Un texto que representa un html o un resultado.
         */
        static function organizar( $resultado, $des = null, $id_css = null, $j = null, $nombre_lista = null, $evento = null )
        {
            $salida = "";
            
            if( $j == null ) $j = 0;
            if( $evento == null ) $evento = "";
            
            $arreglo_html[ 0 ] = array( "<table border='1px'>", "<tr>", "<td>", "</td>", "</tr>", "</table>" );
            $arreglo_html[ 1 ] = array( "<select name='$nombre_lista' id='$nombre_lista' $evento>", "<option value='", "", "", "</option>", "</select>" );
                        
            //Si el parámetro des contiene el número 1, puede ser 1, 12, 111, 001, haga...
            if( strpos( $des, "1" ) !== false ) $salida .= $arreglo_html[ $j ][ 0 ];

            while( $fila = mysqli_fetch_array( $resultado ) )
            {
                if( strpos( $des, "1" ) !== false ) //La variable des implica que va a imprimir un html
                {
                    $salida .= $j == 1 ? $arreglo_html[ $j ][ 1 ].$fila[ 0 ]."'>": $arreglo_html[ $j ][ 1 ];
                }
                
                for( $i = 0; $i < mysqli_num_fields( $resultado ); $i ++ )
                {
                    //Se construten las filas de una tabla +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                    if( strpos( $des, "1" ) !== false ) $salida .= $arreglo_html[ $j ][ 2 ]; 
                    
                    //Agregando id solo al primer campo o cero y estilo, debería ser el id_vectorizados -------------------
                    if( $j == 0 && $i == 0 && $id_css != null ) $salida .= "<a name='$id_css".$fila[ 0 ]."'>";
                    
                    //Agregando id solo a la vectorización padre
                    if( $j == 0 && $i == 6 && $id_css != null ) $salida .= "<a href='#$id_css".$fila[ $i ]."'>"; 
                    
                    if( $j == 1 ) //Si es una lista.
                    {
                        //Solo agruegue la última fila de la consulta.
                        if( $i == mysqli_num_fields( $resultado ) - 1 ) $salida .= utf8_encode( $fila[ $i ] );
                        
                    }else{
                            $salida .= utf8_encode( $fila[ $i ] );
                        }
                    
                    if( $j == 0 && $i == 6 && $id_css != null ) $salida .= "</a>"; //Fin id vectorización padre.
                    if( $j == 0 && $i == 0 && $id_css != null ) $salida .= "</a>"; //Fin primer id ------------------------
                    
                    if( strpos( $des, "1" ) !== false ) $salida .= $arreglo_html[ $j ][ 3 ]; //End filas tabla ++++++++++++

                    if( strpos( $des, "1" ) !== false && $i + 1 == mysqli_num_fields( $resultado ) )
                    {
                        //$salida .= "<td><a href='#'>Editar</a></td>";
                        $salida .= "<td><a href='#'>Borrar</a></td>";
                    }
                }

                if( strpos( $des, "1" ) !== false ) $salida .= $arreglo_html[ $j ][ 4 ];
            }            

            if( strpos( $des, "1" ) !== false ) $salida .= $arreglo_html[ $j ][ 5 ];

            return $salida;
        }
        
        /**
         * Se encarga de organizar contenido de una consulta en un arreglo, la idea es que solo ajuste
         * el tema de la impresión, sin embargo el arreglo puede contener una columna adicional con un id
         * que más adelante podrá ser relacionado o actualizado.
         * @param       recordset           Resultado de una consulta.
         * @param       texto o número      Una variable bandera o de decisión.
         * @param       número              Campo especial para ser colocado en una posición del arreglo, desde 1 hasta N.
         * @param       texto               Un texto que representa un html o un resultado.
         */
        static function organizar_en_arreglo( $resultado, $des = null, $campo_especial = null )
        {
            $salida = "";
            $arreglo = [];
            
            //echo $campo_especial;
            //Si el parámetro des contiene el número 1, puede ser 1, 12, 111, 001, haga...
            //if( strpos( $des, "1" ) !== false ) array_push( [ [  ], [  ] ], $arreglo );

            while( $fila = mysqli_fetch_array( $resultado ) )
            {
                //if( strpos( $des, "1" ) !== false ) $salida .= "<tr>";
                $salida = ""; //Limpiamos salida.

                for( $i = 0; $i < mysqli_num_fields( $resultado ); $i ++ )
                {
                    //if( strpos( $des, "1" ) !== false ) $salida .= "<td>";
                    $salida .= utf8_encode( $fila[ $i ] )."<br>";
                    
                    //if( strpos( $des, "1" ) !== false ) $salida .= "</td>";

                    /*if( $i + 1 == mysqli_num_fields( $resultado ) )
                    {
                        if( $des == null ) $salida .= "<td><a href='#'>Editar</a></td>";
                        if( $des == null ) $salida .= "<td><a href='#'>Borrar</a></td>";
                    }*/
                }
                
                if( $campo_especial == null )
                {
                    array_push( $arreglo, $salida );
                    
                }else{
                    
                    array_push( $arreglo, [[ $salida ], [ $fila[ $campo_especial - 1 ] ]] );
                }
                
                

                //if( strpos( $des, "1" ) !== false ) $salida .= "</tr>";
            }            

            //if( strpos( $des, "1" ) !== false ) $salida .= "</table>";

            return $arreglo;
        }
    }
    