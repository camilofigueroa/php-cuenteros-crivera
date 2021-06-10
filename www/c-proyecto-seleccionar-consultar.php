<?php

    include( "clases/Herramientas.php" );
    //include( "clases/Inserciones.php" );
    //include( "clases/Actualizaciones.php" );
    include( "clases/Sesiones.php" );

    Sesiones::verificaciones_generales();

    $lista_proyectos = Herramientas::arreglar_dato( 1, $_POST[ 'lista_proyectos' ] );
    //echo $lista_proyectos;
    $_SESSION[ 'id_proyecto' ] = $lista_proyectos;

    header( "location: c-inicio.php" );
        

        