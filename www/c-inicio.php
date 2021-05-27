<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );

    $r[ 0 ] = Vimprimir::organizar( Consultas::consultar_dato( "tb_proyectos" ) );
    $r[ 1 ] = Vimprimir::organizar( Consultas::consultar_dato( "tb_capitulos" ) );
    $r[ 2 ] = Vimprimir::organizar( Consultas::traer_capitulo_objetos() );
    $r[ 3 ] = Vimprimir::organizar( Consultas::traer_capitulo_vectorizados( 1 ) );

    //Adicionamos la sección.
    $seccion = "v-inicio.php";
    include( "v-plantilla.php" );