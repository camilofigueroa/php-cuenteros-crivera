<?php

    include( "clases/Herramientas.php" );
    include( "clases/Inserciones.php" );
    include( "clases/Actualizaciones.php" );
    include( "clases/Sesiones.php" );

    Sesiones::verificaciones_generales( [ 1, "id_proyecto", "c-proyecto-seleccionar.php" ] );

    if( !isset( $_GET[ 'des' ] ) ) //Si la variable no existe, se está insertando el capítulo.
    {
        $titulo_capitulo = Herramientas::arreglar_dato( 1, $_POST[ 'titulo_capitulo' ] );
        $texto_extenso = Herramientas::arreglar_dato( 1, $_POST[ 'texto_extenso' ] );

        $r = Inserciones::insertar_capitulos( $_SESSION[ 'id_proyecto' ], $titulo_capitulo, $texto_extenso );

    }else{

        switch( $_GET[ 'des' ] )
        {
            case "2":

                $lista_capitulos = Herramientas::arreglar_dato( 1, $_POST[ 'lista_capitulos' ] );
                $lista_campos = Herramientas::arreglar_dato( 1, $_POST[ 'lista_campos' ] );
                $texto_extenso = Herramientas::arreglar_dato( 1, $_POST[ 'texto_capitulo' ] );

                if( $lista_campos == "1" ) $campo = "titulo_capitulo";
                if( $lista_campos == "2" ) $campo = "texto";

                $r = Actualizaciones::actualizar_campo( "tb_capitulos", $campo, $texto_extenso, "id_capitulo", $lista_capitulos );
                //echo $texto_extenso." ".$lista_capitulos;

                break;
        }
    }

    if( $r >= 1 )
    {
        //echo "Se actualizaron registros";
        header( "location: c-inicio.php" );

    }else{

        //echo "No se actualizaron registros";
        header( "location: c-capitulo-insertar.php" );
    }

    

    