<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );

    $r  = Vimprimir::organizar( Consultas::consultar_dato( "tb_proyectos" ) );
    $r .= Vimprimir::organizar( Consultas::consultar_dato( "tb_capitulos" ) );

    //Adicionamos la sección.
    $seccion = "v-inicio.php";
    include( "v-plantilla.php" );