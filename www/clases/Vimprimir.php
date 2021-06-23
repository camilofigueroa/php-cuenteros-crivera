<?php

    include_once( "clases/Herramientas.php" );
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
            
            $arreglo_html[ 0 ] = array( "<table class='table table-striped'>", "<tr>", "<td>", "</td>", "</tr>", "</table>" );
            $arreglo_html[ 1 ] = array( "<select name='$nombre_lista' id='$nombre_lista' $evento>", "<option value='", "", "", "</option>", "</select>" );
                        
            //Si el parámetro des contiene el número 1, puede ser 1, 12, 111, 001, haga...
            if( strpos( $des, "1" ) !== false )
            {
                $salida .= $arreglo_html[ $j ][ 0 ]; //Se agrega el html respectivo, sea tabla lista o lo que sea...
                if( $j == 1 ) $salida .= "<option value='null' selected>Seleccionar</option>"; //Las listas requieren esto 
            } 

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
                        if( $i == mysqli_num_fields( $resultado ) - 1 ) $salida .= Herramientas::arreglar_dato( 2, $fila[ $i ] );
                        
                    }else{
                            $salida .= Herramientas::arreglar_dato( 2, $fila[ $i ] );
                        }
                    
                    if( $j == 0 && $i == 6 && $id_css != null ) $salida .= "</a>"; //Fin id vectorización padre.
                    if( $j == 0 && $i == 0 && $id_css != null ) $salida .= "</a>"; //Fin primer id ------------------------
                    
                    if( strpos( $des, "1" ) !== false ) $salida .= $arreglo_html[ $j ][ 3 ]; //End filas tabla ++++++++++++

                    if( strpos( $des, "1" ) !== false && $i + 1 == mysqli_num_fields( $resultado ) && $j == 0 )
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
            $tmp = "";
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
                    $tmp = utf8_encode( $fila[ $i ] )."<br>";
                    
                    if( strpos( $fila[ $i ], chr( 13 ) ) !== false )
                    {
                        //echo "Hay espacios en ".$fila[ $i ]
                        //Se areglan el salto de línea y retorno de carro.
                        //$tmp = str_replace( chr( 13 ).chr( 10 ), "<br>", $tmp );
                        $tmp = Herramientas::arreglar_dato( 2, $tmp );
                    } 

                    $salida .= $tmp;

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


        /**
         * Organiza en árbol la información proveniente de las vectorizaciones o cualquier otra parecida, 
         * que tenga internamente estructura de árbol. Se complementa con un css y código en la vista js y html.
         * https://www.jstree.com/
         */
        static function organizar_arbol( $resultado )
        {
            $salida = "";
            $tmp = "";
            $indice = 0;
            $indice_padre = 0;
            
            while( $fila = mysqli_fetch_array( $resultado ) )
            {                
                $tmp = "<ul>"; //Limpiamos salida.

                for( $i = 0; $i < mysqli_num_fields( $resultado ); $i ++ )
                {   
                    if( $i == 0 ) $indice = $fila[ $i ];
                    if( $i == 6 ) $indice_padre = $fila[ $i ];

                    $tmp .= "<li>".Herramientas::arreglar_dato( 2, $fila[ $i ] )."</li>";

                    if( $i == mysqli_num_fields( $resultado ) - 1 )
                    {
                        $tmp .= "<li>[[".$fila[ 0 ]."]]</li>";
                    }
                }

                $tmp .= "</ul>";

                //echo $indice." ".$indice_padre." <br>";

                if( $indice != $indice_padre )
                {
                    $salida = str_replace( "[[$indice_padre]]", $tmp."<li>[[$indice_padre]]</li>", $salida );

                }else{

                    $salida .= $tmp;
                }
                
            }            

            return "<div id='jstree'>".$salida."</div>"; //<button>demo button</button>";
        }

        /**
         * Organiza una consulta para un árbol de palabras.
         * @param       recordset       Arreglo que contiene resultados de una consulta.
         * @return      texto           Texto arreglado para arreglo de árbol de palabras google.
         */
        static function arbol_palabras( $resultado )
        {
            $salida = "";

            while( $fila = mysqli_fetch_array( $resultado ) )
            {       
                //El caracter salto de línea no se ve enlos resultados, es para imprimir
                //en la vista del navegador del código fuente d ela página.
                $salida .= ( $salida == "" ? "": "," )."\n['";
                
                for( $i = 0; $i < mysqli_num_fields( $resultado ); $i ++ )
                {                       
                    $salida .= Herramientas::arreglar_dato( 2, $fila[ $i ] )." ";
                }

                $salida .= "']";
            }

            return $salida;
        }

        /**
         * Organiza una consulta para un diagrama conceptual (gojs).
         * @param       recordset       Arreglo que contiene resultados de una consulta.
         * @return      texto           Texto arreglado para arreglo de árbol de palabras google.
         */
        static function diagrama_conceptual( $resultado )
        {
            $salida = "";
            $salida2 = "";
            $arreglo2 = [];
            $contador_objetos = 1;
            $indice2 = 0;
            $tmp_cad = "";
            $fila_cero = "";

            while( $fila = mysqli_fetch_array( $resultado ) )
            {   
                for( $i = 1; $i <= 2; $i ++ )
                {
                    
                    switch( $i )
                    {
                        case 1:
                            $fila_cero = $fila[ 0 ];
                            //Aquí se agregan los capítulos.
                            $tmp_cad = "key: ".$fila_cero.", text: \"".Herramientas::arreglar_dato( 2, $fila[ 1 ] )."\"";
                            break;

                        case 2:
                            $fila_cero = $fila[ 0 ].".".$contador_objetos; //Los id objetos tienen decimales.
                            //Aquí se agregan los objetos.
                            $tmp_cad = "key: ".$fila_cero.", text: \"".Herramientas::arreglar_dato( 2, $fila[ 2 ] )."\"";
                            $contador_objetos ++;
                            break;
                    }
                    
                    //Sea cual sea el tema, no se repetirá una asociación capítulo objeto.
                    if( strpos( $salida, $tmp_cad  ) === false )
                    {
                        //El caracter salto de línea no se ve enlos resultados, es para imprimir
                        //en la vista del navegador del código fuente de la página.
                        $salida .= ( $salida == "" ? "": "," )."\n{";
                        $salida .= $tmp_cad;
                        $salida .= "}";

                        $arreglo2[ $indice2 ] = $fila_cero;
                        
                        if( count( $arreglo2 ) >= 2 )
                        {
                            $salida2 .= ( $salida2 == "" ? "": "," )."\n{";
                            $salida2 .= "from: ".$arreglo2[ $indice2 ].", to: ".$arreglo2[ $indice2 - 1 ].", text: \"va a\"";
                            $salida2 .= "}";
                        }
        
                        $indice2 ++;
                    }
                }
            }

            return "var nodeDataArray = [$salida]; var linkDataArray = [$salida2];";
        }
    }
    