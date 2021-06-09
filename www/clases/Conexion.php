<?php
    //Modelo

    class Conexion
    {
        static function conectar()
        {
            include( "config.php" );

            return mysqli_connect( $servidor, $usuario, $clave, $bd );
        }
    }
    