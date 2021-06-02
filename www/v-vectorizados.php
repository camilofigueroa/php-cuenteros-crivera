
<form action="c-objetos-capitulos-guardar.php">
  
  Capítulo con objeto asociado: <?= $lista_capitulos ?>
  <br>

  Objeto que vectoriza: <?= $lista_objetos ?>
  <br>

  Objeto vectorizado: <?= $lista_objetos ?> 
  <br>

  Objeto: <?= $lista_vectorizados ?>
  <br>

  Objeto: <?= $lista_tipo_vector ?>
  <br>

  <input type="submit" value="Guardar.">
  
</form>

<script language="javascript">
$(document).ready(function(){
    $("#lista_capitulos").on('change', function () {

        console.log( "fdsf" );

        /*$("#marca option:selected").each(function () {
            elegido=$(this).val();
            $.post("modelos.php", { elegido: elegido }, function(data){
                $("#modelo").html(data);
            });			
        });*/
   });
});
</script>