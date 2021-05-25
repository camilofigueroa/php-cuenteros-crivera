<?php
    //Modelo

    class Conexion
    {
        static function conectar()
        {
            return mysqli_connect( "localhost", "root", "", "bd_cuenteros" );
        }
    }
    