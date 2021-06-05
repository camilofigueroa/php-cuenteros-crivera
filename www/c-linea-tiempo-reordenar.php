<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );

    $id_proyecto = 1;
    $id_capitulo = $_GET[ 'id_cap' ];
    $des = $_GET[ 'des' ];
    
    //echo $id_capitulo." ".$des."<br>";

    //El orden para cambiar es hallado, ya se usará otra función para el intercambio.
    $nuevo_orden = Vimprimir::organizar( Consultas::consultar_dato( null, "max_proximo_orden_capitulo( $id_proyecto, $id_capitulo, $des )" ) );

    Vimprimir::organizar( Consultas::consultar_dato( null, "cambiar_orden_capitulo( $id_proyecto, $id_capitulo, $nuevo_orden )" ) );

    header( "location: c-linea-tiempo.php" );

    //echo $orden;