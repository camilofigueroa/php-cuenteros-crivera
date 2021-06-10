
<form action="c-objetos-capitulos-guardar.php">
  
  Capítulo: <?= $lista_capitulos ?>
  <br>

  Objeto: <?= $lista_objetos ?>
  <br>

  Fragmento o muestra del capítulo: <input type="text" name="muestra" value="<?= $texto ?>">
  <br>

  <input type="submit" value="Guardar.">
  
</form>