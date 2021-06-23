<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );
    include( "clases/Sesiones.php" );

    Sesiones::verificaciones_generales( [ 1, "id_proyecto", "c-proyecto-seleccionar.php" ] );

    $r = Vimprimir::arbol_palabras( Consultas::arboles_palabras( $_SESSION[ 'id_proyecto' ] ) );

    //La variable cabecera se usará para incluir porciones javascript como en los gráficos de Google.
    $cabecera = "c-arboles-palabras-cabecera.php";
    //Adicionamos la sección.
    $seccion = "v-arboles-palabras.php";
    include( "v-plantilla.php" );