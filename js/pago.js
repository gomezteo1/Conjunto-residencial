/*agregar producto con jquery y ajas*/
 $('.button-Rpago').click(function() {
     var myId = $(this).val();
     $('#registrar-pago form#' + myId).submit(
         function(e) {
             e.preventDefault();
             var informacion = $('#registrar-pago form#' + myId).serialize();
             var metodo = $('#registrar-pago form#' + myId).attr('method');
             var peticion = $('#registrar-pago form#' + myId).attr('action');
             $.ajax({
                 type: metodo,
                 url: peticion,
                 data: informacion,
                 beforeSend: function() {
                     $("div#" + myId).html('<br><img src="assets img/Update.gif"class = "center-all-contens" ></br>Insertando...');
                 },
                 error: function() {
                     $("div#" + myId).html('ha ocurido un error en el sistema');
                 },
                 success: function(data) {
                     $("div#" + myId).html(data);
                 }
             });
             return false;
         });
 });