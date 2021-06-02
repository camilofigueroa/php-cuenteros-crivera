<?php

    include( "clases/Inserciones.php" );
    //include( "clases/Vimprimir.php" );

    //Adicionamos la sección.
    //$seccion = "v-capitulo-insertar.php";
    //include( "v-plantilla.php" );

    //echo $_GET[ 'lista_capitulos' ];
    //echo $_GET[ 'lista_objetos' ];

    $r = Inserciones::insertar_objetos_capitulos( $_GET[ 'lista_capitulos' ], $_GET[ 'lista_objetos' ] );
    
    if( $r == 1 )
    {
        header( "location: c-inicio.php" );

    }else{

        header( "location: c-objetos-capitulos.php" );

    }

    