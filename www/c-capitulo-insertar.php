<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );

    //Imprime una lista en html, se basa en el cambio de parámetros de la función organizar de Vimprimir.
    $lista_proyectos = Vimprimir::organizar( Consultas::consultar_dato( "tb_proyectos", "id_proyecto, titulo_proyecto" ), "1", null, 1, "lista_proyectos" );

    $lista_capitulos = Vimprimir::organizar( Consultas::consultar_dato( "tb_capitulos", "id_capitulo, titulo_capitulo" ), "1", null, 1, "lista_capitulos" );

    //Adicionamos la sección.
    $seccion = "v-capitulo-insertar.php";
    include( "v-plantilla.php" );