<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );

    $r = Vimprimir::arbol_palabras( Consultas::arboles_palabras() );

    //La variable cabecera se usará para incluir porciones javascript como en los gráficos de Google.
    $cabecera = "c-arboles-palabras-cabecera.php";
    //Adicionamos la sección.
    $seccion = "v-arboles-palabras.php";
    include( "v-plantilla.php" );