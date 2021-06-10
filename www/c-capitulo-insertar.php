<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );
    include( "clases/Sesiones.php" );

    Sesiones::verificaciones_generales( [ 1, "id_proyecto", "c-proyecto-seleccionar.php" ] );

    $titulo_proyecto = Vimprimir::organizar( Consultas::consultar_titulo_proyecto() );

    $lista_capitulos = Vimprimir::organizar( Consultas::consultar_dato( "tb_capitulos", "id_capitulo, titulo_capitulo", null, "id_proyecto = ".$_SESSION[ 'id_proyecto' ] ), "1", null, 1, "lista_capitulos" );

    //Adicionamos la sección.
    $seccion = "v-capitulo-insertar.php";
    include( "v-plantilla.php" );