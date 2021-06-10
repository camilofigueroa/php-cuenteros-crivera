<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );
    include( "clases/Sesiones.php" );

    Sesiones::verificaciones_generales();

    //Adicionamos la sección.
    $seccion = "v-proyectos-insertar.php";
    include( "v-plantilla.php" );