<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );

    $r[ 0 ] = ""; //Se inicializa el arreglo.

    if( isset( $_GET[ 'proyecto' ] ) && isset( $_GET[ 'capitulo' ] ) )
    {
        $r[ 0 ] = Vimprimir::organizar( Consultas::traer_proyecto_capitulo( $_GET[ 'proyecto' ], $_GET[ 'capitulo' ] ) );
        $r[ 1 ] = Vimprimir::organizar( Consultas::traer_capitulo_objetos( $_GET[ 'capitulo' ] ) );
        $r[ 2 ] = Vimprimir::organizar( Consultas::traer_capitulo_vectorizados( $_GET[ 'capitulo' ] ) );
    }

    //Adicionamos la sección.
    $seccion = "v-inicio.php";
    include( "v-plantilla.php" );