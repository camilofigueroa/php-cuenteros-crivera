let articulo = document.getElementById( "contenedor-contenido" );

// We could also add the  'touchend' event for touch devices, but since 
// most iOS/Android browsers already show a dialog when you select 
// text (often with a Share option) we'll skip that
if( articulo != null ) articulo.addEventListener('mouseup', handlerFunction, false);

// Mouse up event handler function
function handlerFunction(event) {
    
    // If there is already a share dialog, remove it
    if (document.contains(document.getElementById("share-snippet"))) {
        document.getElementById("share-snippet").remove();
    }
    
    // Check if any text was selected
    if(window.getSelection().toString().length > 0) {

        let texto = window.getSelection().toString();

        // Get selected text and encode it
        const selection = encodeURIComponent(texto).replace(/[!'()*]/g, escape);
        
        console.log( selection );

        if( texto != "" )
        {
            // Find out how much (if any) user has scrolled
            var scrollTop = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
            
            // Get cursor position
            const posX = event.clientX - 110;
            const posY = event.clientY + 20 + scrollTop;
        
            // Create Twitter share URL
            //const shareUrl = 'http://twitter.com/share?text='+selection+'&url=https://awik.io';
            
            //Pueden haber dos enlaces en este globito. O incluso más contenido.
            
            //Ejemplo para mysql de similitud de cadenas
            //https://gist.github.com/phpenterprise/be9560412824e5b05e1c1b3f38266b57

            // Append HTML to the body, create the "Tweet Selection" dialog
            //document.body.insertAdjacentHTML('beforeend', '<div id="share-snippet" style="position: absolute; top: '+posY+'px; left: '+posX+'px;"><div class="speech-bubble"><div class="share-inside"><a href="javascript:void(0);" onClick=\'window.open(\"'+shareUrl+'\", \"\", \"menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\");\'>TWEET SELECTION</a></div></div></div>');
            document.body.insertAdjacentHTML('beforeend', '<div id="share-snippet" style="position: absolute; top: '+posY+'px; left: '+posX+'px;"><div class="speech-bubble"><div class="share-inside"><a href="c-objetos-capitulos.php?texto=' + texto + '">Hacer algo</a></div></div></div>');
        }
    }
}
