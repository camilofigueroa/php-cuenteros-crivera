<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );
    
    $tmp_capitulo = 0;
    
    //Consulta el proyecto encabezado
    $r[ 0 ] = Vimprimir::organizar( Consultas::consultar_dato( "tb_proyectos" ), "1" );
    
    $r[ 1 ] = ""; //Alistamos el segundo valor.
    
    //Consulta el capítulo.
    $tmp_r = Vimprimir::organizar_en_arreglo( Consultas::consultar_dato( "tb_capitulos" ), null, 1 );
    
    
    for( $i = 0; $i < count( $tmp_r ); $i ++ )
    {
        $tmp_capitulo = $tmp_r[ $i ][ 1 ][ 0 ];
        //echo $tmp_capitulo;
        $r[ 1 ] .= "<br>".$tmp_r[ $i ][ 0 ][ 0 ];
        $r[ 1 ] .= "<b>Objetos</b>: ".Vimprimir::organizar( Consultas::traer_capitulo_objetos( $tmp_capitulo ), 1 );
        $r[ 1 ] .= "<b>Vectorizaciones</b>: ".Vimprimir::organizar( Consultas::traer_capitulo_vectorizados( $tmp_capitulo ), "1", "id_vector_" );
    }
    
    //$r[ 1 ] .= Vimprimir::organizar( Consultas::traer_capitulo_objetos() );
    //$r[ 2 ] = Vimprimir::organizar( Consultas::traer_capitulo_vectorizados( "1" ) );

    //Adicionamos la sección.
    $seccion = "v-inicio.php";
    include( "v-plantilla.php" );