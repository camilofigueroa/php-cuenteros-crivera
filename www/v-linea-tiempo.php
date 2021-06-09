
<div class="timeline">

<?php

  //echo count( $r );

  for( $i = 0; $i < count( $r ); $i ++ )
  {
    echo "<div class='container ".( $i % 2 == 0 ? "left": "right" )."'>";
    echo "  <div class='content'>";
    echo "    <h2>$i</h2>";
    echo "    <p>".$r[ $i ]."<hr><i>".$o[ $i ]."</i><br><u>".$v[ $i ]."</u></p>";
    echo "    <p>";
    echo "      <a href='c-linea-tiempo-reordenar.php?id_cap=".$r_cap[ $i ]."&des=0'>Subir</a>";
    echo "      <br>";
    echo "      <a href='c-linea-tiempo-reordenar.php?id_cap=".$r_cap[ $i ]."&des=1'>Bajar</a>";
    echo "    </p>";
    echo "  </div>";
    echo "</div>";
  }

  //echo $r[ 0 ];
  //var_dump( $r[ 1 ][ 0 ] );

?>

</div>

