<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );
    include( "clases/Sesiones.php" );

    Sesiones::verificaciones_generales( [ 1, "id_proyecto", "c-proyecto-seleccionar.php" ] );

    $texto = "";

    //Imprime una lista en html, se basa en el cambio de parámetros de la función organizar de Vimprimir.
    $lista_capitulos = Vimprimir::organizar( Consultas::consultar_dato( "tb_capitulos", "id_capitulo, titulo_capitulo", null, "id_proyecto = ".$_SESSION[ 'id_proyecto' ] ), "1", null, 1, "lista_capitulos" );
    $lista_objetos = Vimprimir::organizar( Consultas::consultar_dato( "tb_objetos", "id_objeto, id_objeto", null, "id_proyecto = ".$_SESSION[ 'id_proyecto' ] ), "1", null, 1, "lista_objetos" );

    if( isset( $_GET[ 'texto' ] ) ) $texto = $_GET[ 'texto' ];

    //Adicionamos la sección.
    $seccion = "v-objetos-capitulos.php";
    include( "v-plantilla.php" );