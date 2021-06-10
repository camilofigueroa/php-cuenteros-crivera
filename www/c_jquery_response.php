<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );
    include( "clases/Sesiones.php" );

    Sesiones::verificaciones_generales( [ 1, "id_proyecto", "c-proyecto-seleccionar.php" ] );

    $des = $_POST[ 'des' ]; //Selección de la lista de capítulos para generar sus objetos relacionados.
    $valor = $_POST[ 'valor' ]; //Valor de esa lista de capítulos.

    if( $des == 1 )
    {
        $lista_capitulos  = " Objeto que vectoriza: ";
        $lista_capitulos .= Vimprimir::organizar( Consultas::traer_capitulo_objetos( $_SESSION[ 'id_proyecto' ], $valor, 2 ), "1", null, 1, "lista_objetos1" );
        $lista_capitulos .= " Objeto vectorizado: ";
        $lista_capitulos .= Vimprimir::organizar( Consultas::traer_capitulo_objetos( $_SESSION[ 'id_proyecto' ], $valor, 2 ), "1", null, 1, "lista_objetos2" );
    }
    

    echo $lista_capitulos;
    