<?php


    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );
    include( "clases/Sesiones.php" );

    Sesiones::verificaciones_generales( [ 1, "id_proyecto", "c-proyecto-seleccionar.php" ] );

    $tmp_capitulo = 0;

    //$r[ 0 ] = ""; //Alistamos el segundo valor.

    //Consulta el capítulo.
    $tmp_r = Vimprimir::organizar_en_arreglo( Consultas::consultar_dato( "tb_capitulos", "id_capitulo, titulo_capitulo, LEFT( texto, 300 ) as texto, fecha_registro", "orden", "id_proyecto = ".$_SESSION[ 'id_proyecto' ] ), null, 1 );

    //echo count( $tmp_r );

    for( $i = 0; $i < count( $tmp_r ); $i ++ )
    {
        $tmp_capitulo = $tmp_r[ $i ][ 1 ][ 0 ];
        //echo $tmp_capitulo;
        $r_cap[ $i ] = $tmp_capitulo;
        $r[ $i ] = "<br>".$tmp_r[ $i ][ 0 ][ 0 ];
        $o[ $i ] = Vimprimir::organizar( Consultas::traer_capitulo_objetos( $_SESSION[ 'id_proyecto' ], $tmp_capitulo, 3 ) );
        $v[ $i ] = Vimprimir::organizar( Consultas::traer_capitulo_vectorizados( $tmp_capitulo, 1 ), null, "id_vector_" );
    }

    //Adicionamos la sección.
    $seccion = "v-linea-tiempo.php";
    $estilo_adicional = "estilo-linea-tiempo"; //Agrega un estilo único a esa página, no requiere la ruta o extensión.
    $no_container = 1;
    include( "v-plantilla.php" );