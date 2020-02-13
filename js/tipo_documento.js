 $('.prueba-jquery').click(function() {
		
 });
		

/*Agregar  ctipo de documento con jquery y ajax*/
    $('.button-Rtipo_documento').click(function() {
	var myId = $(this).val(); 
        $('#registrar-tipo_documento form#'+myId).submit(function(e) {
             e.preventDefault();
             var informacion=$('#registrar-tipo_documento form#'+myId).serialize();
             var metodo=$('#registrar-tipo_documento form#'+myId).attr('method');
             var peticion=$('#registrar-tipo_documento form#'+myId).attr('action');
             $.ajax({
                type: metodo,
                url: peticion,
                data:informacion,
                beforeSend: function(){
					$("div#"+myId).html('<br><img src="img/Update.gif" class="center-all-contens"><br>Registrando...');
                },
                error: function() {
				 $("div#"+myId).html('Ha ocurrido un error en el sistema');
				
				},
				
                success: function (data) {
	            $("div#"+myId).html(data);
                }
            });
            return false;
        });
    });