<?php

    include( "clases/Inserciones.php" );
    //include( "clases/Vimprimir.php" );

    //Adicionamos la sección.
    //$seccion = "v-capitulo-insertar.php";
    //include( "v-plantilla.php" );

    $lista_capitulos = $_GET[ 'lista_capitulos' ];
    $lista_objetos1 = $_GET[ 'lista_objetos1' ];
    $lista_objetos2 = $_GET[ 'lista_objetos2' ];
    $lista_vectorizados = $_GET[ 'lista_vectorizados' ];
    $lista_tipo_vectores = $_GET[ 'lista_tipo_vectores' ];
    $lista_estado = $_GET[ 'lista_estado' ];
    $observaciones = $_GET[ 'observaciones' ];

    //echo $_GET[ 'lista_objetos' ];

    $r = Inserciones::insertar_vectorizaciones( $lista_capitulos, $lista_objetos1, $lista_objetos2, $lista_tipo_vectores, $lista_estado, $lista_vectorizados, $observaciones );
    
    if( $r == 1 )
    {
        header( "location: c-inicio.php" );

    }else{

        header( "location: c-vectorizados.php" );

    }

    