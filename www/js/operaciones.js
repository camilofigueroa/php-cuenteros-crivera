
window.onload = function()
{
    //console.log( "Funcionando" );
    //comunicar();
}

/**
 * Al cambiar una lista, se puede aplicar o no esta función.
 * Esta construcción depende de un parámetro en la construcción de la lista de la clase Vimprimir.php
 * @param       número          bandera de decisión para alterar resultados.
 * 
 */
function al_cambiar_listar( objeto, des = null )
{
    //console.log( "Ha cambiado la lista " + Math.random() );

    console.log( objeto.value ); //El valor de la lista está dado por este valor.

    switch( des )
    {
        case null:
            console.log( "Nulo" );
        break;

        case 1:
            console.log( "Accionando capítulos." );
            comunicar( des, objeto.value );
        break;
    }

}

/**
 * 
 * 
 * 
 */
function al_seleccionar_textarea( objeto )
{
    //console.log( window.getSelection().getRangeAt(0) );    

    /*if(window.getSelection().toString().length > 0) 
    {
        console.log( window.getSelection().toString() );   
    } */   
}

/**
 * 
 * 
 */
function comunicar( des, valor )
{
	//jQuery("#calc").click( function() //Apertura jquery
    //{        
        //cogemos el valor del input
        //var num = jQuery("#numero").val();
        //var num = 3;
    
        //creamos array de parámetros que mandaremos por POST
        var params = {
            "des" : des,
            "valor": valor
        };
    
        //llamada al fichero PHP con AJAX
        $.ajax
        ({
            data:       params,
            url:        'c_jquery_response.php',
            dataType:   'html',
            type:       'post',
            beforeSend: function()
            {
                console.log( "Enviando........" );
                //mostramos gif "cargando"
                //jQuery('#loading_spinner').show();
                //antes de enviar la petición al fichero PHP, mostramos mensaje
                //jQuery("#resultado").html("Déjame pensar un poco...");
            },
            success: function( response )
            {
                //escondemos gif
                //jQuery('#loading_spinner').hide();
                //mostramos salida del PHP
                //jQuery("#resultado").html(response);
                
                //console.log( response );
                document.getElementById( "salida" ).innerHTML = response;
            }
        });
    //}); //Cierre jquery
}



