<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );
    include( "clases/Sesiones.php" );

    Sesiones::verificaciones_generales();

    //Imprime una lista en html, se basa en el cambio de parámetros de la función organizar de Vimprimir.
    $lista_proyectos = Vimprimir::organizar( Consultas::consultar_dato( "tb_proyectos", "id_proyecto, titulo_proyecto" ), "1", null, 1, "lista_proyectos" );

    $no_menu = 1; //El valor no tiene nada que ver, la sola existencia de la variable es suficiente.

    //Adicionamos la sección.
    $seccion = "v-proyecto-seleccionar.php";
    include( "v-plantilla.php" );