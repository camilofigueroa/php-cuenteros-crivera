<?php

    include( "clases/Inserciones.php" );
    //include( "clases/Vimprimir.php" );

    //Adicionamos la sección.
    //$seccion = "v-capitulo-insertar.php";
    //include( "v-plantilla.php" );

    $r = Inserciones::insertar_capitulos( $_GET[ 'lista_proyectos' ], $_GET[ 'titulo_capitulo' ], $_GET[ 'w3review' ] );
    
    if( $r == 1 )
    {
        header( "location: c-inicio.php" );

    }else{

        header( "location: c-capitulo-insertar.php" );

    }

    