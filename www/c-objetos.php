<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );

    //$texto = "";

    //Imprime listas en html, se basa en el cambio de parámetros de la función organizar de Vimprimir.
    $lista_capitulos = Vimprimir::organizar( Consultas::traer_capitulo_objetos( null, 1 ), "1", null, 1, "lista_capitulos" );
    
    //if( isset( $_GET[ 'texto' ] ) ) $texto = $_GET[ 'texto' ];

    //Adicionamos la sección.
    $seccion = "v-vectorizados.php";
    include( "v-plantilla.php" );