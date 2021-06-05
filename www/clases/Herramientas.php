<?php

    class Herramientas
    {
        /**
         * Constructor de la función.
         *
         */
        function Herramientas()
        {
            
        }       

        /**
         * Arregla un dato a escribir en un insert.
         * @param       número          Decisor sobre un dato a arreglar. 1 es para escritura en BD, 2 es para lectura de BD.
         * @param       texto           Dato a arreglar.
         * @return      texto           Dato arreglado para escribir en una base d edatos.
         */
        public static function arreglar_dato( $des, $dato )
        {
            $salida = "";

            switch( $des )
            {
                case 1: //Decode para tomar del HTML form escribir en la BD.
                    $salida = utf8_decode( str_replace( chr( 13 ).chr( 10 ), "<br>", $dato ) );
                    break;

                case 2: //Encode para leer de la BD y poner en HTML.
                    $salida = str_replace( chr( 13 ).chr( 10 ), "<br>", TRIM( utf8_encode( $dato ) ) );
                    break;

                default:
                    $salida = $dato();
            }            

            return $salida;
        }
        
        /**
         * Esta función se encarga de arreglar las etiquetas que entran al sistema.
         * @param       texto       Un texto que representa las etiquetas.
         * @param       texto       Un texto con las etiquetas arregladas.
         */
        public static function arreglar_etiquetas( $etiquetas )
        {
            $arreglo = array( ":", ".", ";", ",", "#", "¡", "!", "¿", "?", "-", "_", "  " );
            
            for( $i = 0; $i < count( $arreglo ); $i ++ )
            {
                //echo $arreglo[ $i ];
                while( strpos( $etiquetas, $arreglo[ $i ] ) !== false )
                {
                    $etiquetas = str_replace( $arreglo[ $i ], " ", $etiquetas );
                }
            }
                       
            return $etiquetas;
        }
        
        /**
         * Lee un archivo de texto: https://www.aprenderaprogramar.com/index.php?option=com_content&view=article&id=585:leer-y-escribir-archivos-de-texto-con-php-funcion-fopen-modo-fgets-fputs-fclose-y-feof-ejemplo-cu00836b&catid=70&Itemid=193
         * @param       texto       Ruta del archivo a leer.
         * @return      texto       Contenido en el archivo.
         */
        public static function leer_archivo( $ruta )
        {
            $salida = "";
            $linea = "";
            
            if( file_exists( $ruta ) )
            {             
                $fp = fopen( $ruta, "r" );
                
                while(!feof($fp))
                {            
                    $linea = fgets( $fp );                
                    //echo $linea . "<br />";
                    $salida .= utf8_encode( TRIM( $linea ) != "" ? $linea : "" );
                }
                
                fclose($fp);            
            }
            
            return $salida;
        }
        
        /**
         * Retorna un fragmento de una cadena que está fragmentada por una cadena separadora.
         * @param           texto           Cadena que se pretende separar.
         * @param           texto           Separador que está relacionando los fragmentos d elas cadenas.
         * @param           número          Índice de esa cadena compuesta que se desea retornar.
         * @return          texto           Una cadena fragmento de otra fragmentada por un separador.
         */
        public static function extraer_protocolo( $cadena, $separador, $indice )
        {
            $salida = "";            
            $posicion = strpos( $cadena, $separador );
            //echo $posicion." ";
            
            //self::escribir_archivo_texto( "1.htm", $posicion." ".$cadena." ".$separador." ".$indice );
            
            if( $posicion !== false )
            {
                $arreglo = explode( $separador, $cadena ); //Se divide la cadena usando el separador.
                                
                //self::escribir_archivo_texto( "2.txt", count( $arreglo ) );
                                
                if( count( $arreglo ) > $indice ) 
                {
                    //self::escribir_archivo_texto( "3.txt", "3" );
                    $salida = $arreglo[ $indice ]; //Si el índice está o el fragmento solicitado existe, será retornada esa parte de la cadena.
                    
                }else{
                        $salida = $cadena; //De lo contrario se retornará la cadena actual.
                        //self::escribir_archivo_texto( "4.txt", "3" );
                    }
                
            }else{
                    $salida = $cadena; //Si el separador no está en la cadena, se retornará el total de la cadena.
                    //self::escribir_archivo_texto( "5.txt", "5 -> ".$cadena );
                }
            
            //echo $salida;
            
            return $salida;
        }
        
        /**
         * Escribe un texto en un archivo.
         * @param       texto           Nombre del archivo
         * @param       texto           Mensaje a escribir  en el archivo.
         */
        function escribir_archivo_texto( $nom_archivo, $mensaje )
        {
            $archivo = fopen( $nom_archivo, "w" );
            fputs( $archivo, $mensaje );
            fclose( $archivo );
        }
        
        
        /**
         * Retira los acentos molestos.
         * @param       texto       Una cadena de nombre o algo para retirar esos acentos.
         * @return      texto       Un texto corregido de acentos.
         */
        static function acentos_molestos( $cadena )
        {
            $salida = $cadena;
            
            if( strpos( $cadena, "Ã¡" ) !== false )
            {
                $salida = str_replace( "Ã¡", "á", $cadena );
            }
    
            /*        
            Ã¡ = á
            Ã© = é
            Ã­- = í
            Ã³ = ó
            Ã± = ñ
            Ã¡ = Á
            */
            
            return $salida;        
        }
        
        /**
         * Esta función es de prueba para probar la parte estática.
         */
        public static function mensaje()
        {
            echo "Mi mensaje desde herramientas";
        }
    }
	

