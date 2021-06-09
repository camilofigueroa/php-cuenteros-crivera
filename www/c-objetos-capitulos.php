<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );

    //Imprime una lista en html, se basa en el cambio de parámetros de la función organizar de Vimprimir.
    $lista_capitulos = Vimprimir::organizar( Consultas::consultar_dato( "tb_capitulos", "id_capitulo, titulo_capitulo" ), "1", null, 1, "lista_capitulos" );
    $lista_objetos = Vimprimir::organizar( Consultas::consultar_dato( "tb_objetos", "id_objeto, id_objeto" ), "1", null, 1, "lista_objetos" );

    //Adicionamos la sección.
    $seccion = "v-objetos-capitulos.php";
    include( "v-plantilla.php" );