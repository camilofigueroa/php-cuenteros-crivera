<!--
      <div class="hero-unit">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>

            <form class="well form-search">
            <input type="text" class="input-small search-query">
            <button type="submit" class="btn">Search</button>
            </form>

            <form class="well form-inline">
            <input type="text" class="input-small" placeholder="Email">
            <input type="password" class="input-small" placeholder="Password">
            <label class="checkbox">
            <input type="checkbox"> Remember me
            </label>
            <button type="submit" class="btn">Sign in</button>
            </form>

            <i class="icon-search"></i>

      </div>

      <div class="row">
        <div class="span3">
          <h2>Heading</h2>
           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span3">
          <h2>Heading</h2>
           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
       </div>
        <div class="span3">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span3">
    
            <form class="well">
                <label>Label name</label>
                <input type="text" class="span2" placeholder="Type something…">
                <span class="help-inline">Associated help text!</span>
                <label class="checkbox">
                <input type="checkbox"> Check me out
                </label>
                <button type="submit" class="btn">Submit</button>
            </form>

        </div>
      </div>

-->

<?php 
  
  for( $i = 0; $i < count( $r ); $i ++ )
  {
    echo "<h3>".$rtitulo[ $i ]."</h3>";
    echo $r[ $i ]."<br>";
    //for( $j = 0; $j <= 50; $j ++ ) echo "Hola <br>";
    //var_dump( $r[ $i ] );
    echo "<hr>";
  }
  
  
  //echo Vimprimir::organizar( Consultas::consultar_dato( "tb_capitulos", "id_capitulo, titulo_capitulo" ), "1", null, 1, "lista_caps" );
  

?>

<!-- 4 include the jQuery library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
<!-- 5 include the minified jstree source -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<script>
$(function () {
  // 6 create an instance when the DOM is ready
  $('#jstree').jstree();
  // 7 bind to events triggered on the tree
  $('#jstree').on("changed.jstree", function (e, data) {
    console.log(data.selected);
  });
  // 8 interact with the tree - either way is OK
  $('button').on('click', function () {
    $('#jstree').jstree(true).select_node('child_node_1');
    $('#jstree').jstree('select_node', 'child_node_1');
    $.jstree.reference('#jstree').select_node('child_node_1');
  });
});
</script>