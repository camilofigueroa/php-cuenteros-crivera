<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );
    include( "clases/Sesiones.php" );

    Sesiones::verificaciones_generales( [ 1, "id_proyecto", "c-proyecto-seleccionar.php" ] ); 

    $tmp_capitulo = 0;
    $tmp_texto_capitulo = "";
    $id_proyecto = null;
    $condicion = null;

    $id_proyecto =  $_SESSION[ 'id_proyecto' ];
    $condicion =  "id_proyecto = ".$id_proyecto;

    //Consulta el proyecto encabezado
    $rtitulo[ 0 ] = "";
    $r[ 0 ] = "";
    
    $rtitulo[ 1 ] = "Capítulos";
    $r[ 1 ] = ""; //Alistamos el segundo valor.
    
    //Consulta el capítulo.
    $tmp_r = Vimprimir::organizar_en_arreglo( Consultas::consultar_dato( "tb_capitulos", null, "orden", $condicion ), null, 1 );
    
    for( $i = 0; $i < count( $tmp_r ); $i ++ )
    {
        $tmp_capitulo = $tmp_r[ $i ][ 1 ][ 0 ];
        $tmp_texto_capitulo = $tmp_r[ $i ][ 0 ][ 0 ];
        //echo $tmp_capitulo;
        $r[ 1 ] .= "<br>".Consultas::remplazar_en_capitulo( $tmp_capitulo, $tmp_texto_capitulo )."</4>";
        $r[ 1 ] .= "<b>Objetos</b>: ".Vimprimir::organizar( Consultas::traer_capitulo_objetos( $_SESSION[ 'id_proyecto' ], $tmp_capitulo ), 1 );
        $r[ 1 ] .= "<b>Vectorizaciones</b>: ".Vimprimir::organizar( Consultas::traer_capitulo_vectorizados( $tmp_capitulo ), "1", "id_vector_" );
    }
    
    //$rtitulo[ 2 ] = "Vectorizaciones en tabla";
    //$r[ 2 ] = Vimprimir::organizar( Consultas::consultar_dato( "tb_vectorizados", null, "id_vectorizacion, id_vectorizacion_padre, fecha_registro" ), 1 );
    
    $rtitulo[ 2 ] = "Vectorizaciones en árbol";
    $r[ 2 ] = Vimprimir::organizar_arbol( Consultas::traer_vectorizados( $_SESSION[ 'id_proyecto' ], 1 ) );
    //$r[ 2 ] = Vimprimir::organizar( Consultas::traer_capitulo_vectorizados( "1" ) );

    //Adicionamos la sección.
    $seccion = "v-inicio.php";
    include( "v-plantilla.php" );
