<?php

    class Sesiones
    {
        /**
         * Usa un arreglo para decidir el tipo de verificación que se debe hacer.
         * @param       areglo      Arreglo con los parámetros necesarios.
         */
        static function verificaciones_generales( $arreglo = null )
        {
            //var_dump( $arreglo );

            if( !isset( $_SESSION ) ) session_start(); 

            if( $arreglo != null )
            {
                switch( $arreglo[ 0 ] )
                {
                    case 1:

                            //Si no existe una cierta variable por GET, váyase a otro lado.
                            if( !isset( $_SESSION[ $arreglo[ 1 ] ] ) ) header( "location: ".$arreglo[ 2 ] );

                        break;
                }
            }
        }
    }