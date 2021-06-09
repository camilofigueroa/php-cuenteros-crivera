<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );

    //Imprime listas en html, se basa en el cambio de parámetros de la función organizar de Vimprimir.
    $lista_capitulos = Vimprimir::organizar( Consultas::traer_capitulo_objetos( null, 1 ), "1", null, 1, "lista_capitulos", "onchange='al_cambiar_listar( this, 1 )'" );
    $lista_vectorizados = Vimprimir::organizar( Consultas::traer_vectorizados(), "1", null, 1, "lista_vectorizados" );
    $lista_tipo_vector = Vimprimir::organizar( Consultas::consultar_dato( "tb_tipo_vectorizacion", "id_tipo_vectorizacion, desc_vectorizacion" ), "1", null, 1, "lista_tipo_vectores" );

    //Adicionamos la sección.
    $seccion = "v-vectorizados.php";
    include( "v-plantilla.php" );