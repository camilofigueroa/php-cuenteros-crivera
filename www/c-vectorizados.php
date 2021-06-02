<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );

    //Imprime listas en html, se basa en el cambio de parámetros de la función organizar de Vimprimir.
    $lista_capitulos = Vimprimir::organizar( Consultas::consultar_dato( "tb_capitulos_objetos", "distinct id_capitulo, CONCAT( id_capitulo, ' ', id_objeto ) AS id_cap" ), "1", null, 1, "lista_capitulos" );
    $lista_objetos = Vimprimir::organizar( Consultas::consultar_dato( "tb_capitulos_objetos", "id_objeto, id_objeto" ), "1", null, 1, "lista_capitulos" );
    //$lista_vectorizados = Vimprimir::organizar( Consultas::consultar_dato( "tb_vectorizados", "id_capitulo, titulo_capitulo" ), "1", null, 1, "lista_tipo_vector" );
    //$lista_vectorizados = Vimprimir::organizar( Consultas::consultar_dato( "tb_tipo_vectorizacion", "id_tipo_vectorizacion, desc_vectorizacion" ), "1", null, 1, "lista_capitulos" );
    //$lista_tipo_vector = Vimprimir::organizar( Consultas::consultar_dato( "tb_tipo_vectorizacion", "id_tipo_vectorizacion, desc_vectorizacion" ), "1", null, 1, "lista_capitulos" );
    $lista_tipo_vector = $lista_vectorizados = $lista_objetos;

    //Adicionamos la sección.
    $seccion = "v-vectorizados.php";
    include( "v-plantilla.php" );