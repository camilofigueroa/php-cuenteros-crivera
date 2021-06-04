<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        
        <title>Título del sitio.</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
        
        <!-- 20210603 arreglando el árbol de vectorizaciones. El resto está en la vista. -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
        
        <link rel="stylesheet" type="text/css" href="css/estilo.css">        

        <script src="js/jquery.js"></script>
        <script src="js/operaciones.js"></script>
        
    </head>

    <body>

        <?php include( "v-menu.php" ); ?>

        <div class="container"><!-- Ojo con este contenedor -->

            <?php include( $seccion ); ?>
            
        </div> <!-- /container -->

        <script src="js/bootstrap-collapse.js"></script>

    </body>
</html>