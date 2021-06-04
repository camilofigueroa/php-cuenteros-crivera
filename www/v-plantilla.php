<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        
        <title>Título del sitio.</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Al cambiar de posición este estilo, molesta el diseño general. 20210604 -->
        <!-- ¿Por qué se había cambiado de posición este estilo? Para afectar sobre lo que el Bootstrap hiciera. -->
        <link rel="stylesheet" type="text/css" href="css/estilo.css">

        <?php if( !isset( $no_container ) ){ ?>
        <link href="css/bootstrap.css" rel="stylesheet"><!-- El Bootstrap me mata la línea de tiempo. -->
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
        <?php } ?>

        <!-- 20210603 arreglando el árbol de vectorizaciones. El resto está en la vista. -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />

        <?php
            if( isset( $estilo_adicional ) ) echo "<link rel='stylesheet' type='text/css' href='css/$estilo_adicional.css'>";
        ?>

        <script src="js/jquery.js"></script>        
        <script src="js/operaciones.js"></script>
        
    </head>

    <body>

        <?php include( "v-menu.php" ); ?>

        <!-- Se ajusta la xistencia de una variable para permitir coexistir a la línea de tiempo y el Bootstrap.
        Sin eso, es probable que muchos diagramas, presentes y futuros, se desajusten. -->
        <?php if( !isset( $no_container ) ){ ?>
        <div class="container"><!-- Ojo con este contenedor -->
        <?php } ?>

            <?php include( $seccion ); ?>
            
        <?php if( !isset( $no_container ) ){ ?>
        </div> <!-- /container -->

        <script src="js/bootstrap-collapse.js"></script>
        <?php } ?>     

    </body>
</html>