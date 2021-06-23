<?php

    include( "clases/Consultas.php" );
    include( "clases/Vimprimir.php" );
    include( "clases/Sesiones.php" );

    Sesiones::verificaciones_generales( [ 1, "id_proyecto", "c-proyecto-seleccionar.php" ] );

    $r = Vimprimir::diagrama_conceptual( Consultas::consultar_dato( "tb_capitulos", "id_capitulo, titulo_capitulo", "orden limit 5", "id_proyecto = ".$_SESSION[ 'id_proyecto' ] ) );

    //La variable cabecera se usará para incluir porciones javascript como en los gráficos de Google.
    $cabecera = "c-diagrama-conceptual-cabecera.php";
    //Adicionamos la sección.
    $seccion = "v-diagrama-conceptual.php";
    include( "v-plantilla.php" );