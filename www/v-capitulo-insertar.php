
<div class="row">
  <div class="col-6">

    <h1>Insertar capítulo</h1>
    <br>

    <form action="c-capitulo-insertar-guardar.php">
            
      Proyecto: <?= $lista_proyectos ?>
      <br>

      Título del capítulo: <input type="text" name="titulo_capitulo">
      <br>

      <label for="w3review">Texto del capítulo:</label>
      
      <textarea id="w3review" class="form-control" name="texto_extenso" rows="4" cols="100">
        At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.
      </textarea>
      <br>

      <input type="submit" value="Guardar.">
      
    </form>

  </div>
  <div class="col-6">

    <h1>Actualizar texto capítulo</h1>
    <br>

    <form action="c-capitulo-insertar-guardar.php?des=2" method="POST">

      Capítulo: <?= $lista_capitulos ?>
      <br>

      Actualizar:
      <select name="lista_campos">
        <option value="-1" selected>Seleccionar</option>
        <option value="1">Título</option>
        <option value="2">Cuerpo del capítulo</option>
      </select>

      <br>

      <textarea id="texto_capitulo" class="form-control" name="texto_capitulo" rows="4" cols="100">
        Actualiza aquí el texto de tu capítulo.
      </textarea>

      <input type="submit" value="Actualizar.">

    </form>

  </div>
</div>