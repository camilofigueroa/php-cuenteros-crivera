
<form action="c-vectorizados-guardar.php">
  
    Selecciona el capítulo en donde está tu objeto: <?= $lista_capitulos ?>
    <br>

    <select name="lista_estado">
        <option value="0">Vectorización abierta</option>
        <option value="1">Ciere de vectorización</option>
    </select>
    
    <br>

    Nombre esto va incompleto: <input type="text" name="observaciones" required>
    <br>

    <input type="submit" value="Guardar.">
  
</form>


