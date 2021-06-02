
<form action="c-capitulo-insertar-guardar.php">
  
  Proyecto: <?= $lista_proyectos ?>
  <br>

  Título del capítulo: <input type="text" name="titulo_capitulo">
  <br>

  <label for="w3review">Texto del capítulo:</label>
  
  <textarea id="w3review" name="w3review" rows="4" cols="50">
    At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.
  </textarea>
  <br>

  <input type="submit" value="Guardar.">
  
</form>