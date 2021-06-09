<?php

    include( "clases/Inserciones.php" );
    include( "clases/Herramientas.php" );
    //include( "clases/Vimprimir.php" );

    //Adicionamos la sección.
    //$seccion = "v-capitulo-insertar.php";
    //include( "v-plantilla.php" );

    //echo $_GET[ 'lista_capitulos' ];
    //echo $_GET[ 'lista_objetos' ];

    $lista_capitulos = Herramientas::arreglar_dato( 1, $_GET[ 'lista_capitulos' ] );
    $lista_objetos = Herramientas::arreglar_dato( 1, $_GET[ 'lista_objetos' ] );

    $r = Inserciones::insertar_objetos_capitulos( $lista_capitulos, $lista_objetos );
    
    if( $r == 1 )
    {
        header( "location: c-inicio.php" );

    }else{

        header( "location: c-objetos-capitulos.php" );

    }

    