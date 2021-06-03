<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );

    $des = $_POST[ 'des' ]; //Selección de la lista de capítulos para generar sus objetos relacionados.
    $valor = $_POST[ 'valor' ]; //Valor de esa lista de capítulos.

    if( $des == 1 )
    {
        $lista_capitulos  = " Objeto que vectoriza: ";
        $lista_capitulos .= Vimprimir::organizar( Consultas::traer_capitulo_objetos( $valor, 2 ), "1", null, 1, "lista_objetos1" );
        $lista_capitulos .= " Objeto vectorizado: ";
        $lista_capitulos .= Vimprimir::organizar( Consultas::traer_capitulo_objetos( $valor, 2 ), "1", null, 1, "lista_objetos2" );
    }
    

    echo $lista_capitulos;
    