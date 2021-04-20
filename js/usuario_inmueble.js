 $('.prueba-jquery').click(function() {});

 $('.button-Rusuario_inmueble').click(function() {
     var myId = $(this).val();
     $('#registrar-usuario_inmueble form#' + myId).submit(function(e) {
         e.preventDefault();
         var informacion = $('#registrar-usuario_inmueble form#' + myId).serialize();
         var metodo = $('#registrar-usuario_inmueble form#' + myId).attr('method');
         var peticion = $('#registrar-usuario_inmueble form#' + myId).attr('action');
         $.ajax({
             type: metodo,
             url: peticion,
             data: informacion,
             beforeSend: function() {
                 $("div#" + myId).html('<br><img src="img/Update.gif" class="center-all-contens"><br>Registrando...');
             },
             error: function() {
                 $("div#" + myId).html('Ha ocurrido un error en el sistema');
             },
             success: function(data) {
                 $("div#" + myId).html(data);
             }
         });
         return false;
     });
 });