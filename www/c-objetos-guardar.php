<?php

    include_once( "clases/Herramientas.php" );
    include_once( "clases/Inserciones.php" ); //Hay que tener cuidado porque hay redeclaración de Herramientas
    include_once( "clases/Vimprimir.php" ); //Hay que tener cuidado porque hay redeclaración de Herramientas
    include_once( "clases/Consultas.php" );

    //Adicionamos la sección.
    //$seccion = "v-capitulo-insertar.php";
    //include( "v-plantilla.php" );

    $lista_capitulos = Herramientas::arreglar_dato( 1, $_GET[ 'lista_capitulos' ] );
    $lista_objetos1 = Herramientas::arreglar_dato( 1, $_GET[ 'lista_objetos1' ] );
    $lista_objetos2 = Herramientas::arreglar_dato( 1, $_GET[ 'lista_objetos2' ] );
    $lista_vectorizados = Herramientas::arreglar_dato( 1, $_GET[ 'lista_vectorizados' ] );
    $lista_tipo_vectores = Herramientas::arreglar_dato( 1, $_GET[ 'lista_tipo_vectores' ] );
    $lista_estado = Herramientas::arreglar_dato( 1, $_GET[ 'lista_estado' ] );
    $observaciones = Herramientas::arreglar_dato( 1, $_GET[ 'observaciones' ] );    

    //echo $_GET[ 'lista_objetos' ];

    $lista_vectorizados = $lista_vectorizados == "null" ? Vimprimir::organizar( Consultas::traer_ultimo_id( "tb_vectorizados" ) ): $lista_vectorizados;

    $r = Inserciones::insertar_vectorizaciones( $lista_capitulos, $lista_objetos1, $lista_objetos2, $lista_tipo_vectores, $lista_estado, $lista_vectorizados, $observaciones );
    
    if( $r == 1 )
    {
        //echo "Insertó";
        header( "location: c-inicio.php" );

    }else{

        //echo "No insertó";
        header( "location: c-vectorizados.php" );

    }

    