 $('.prueba-jquery').click(function() {
		
 });
		

/*Agregar mora con jquery y ajax*/
    $('.button-Rmora').click(function() {
	var myId = $(this).val(); 
        $('#registrar-mora form#'+myId).submit(function(e) {
             e.preventDefault();
             var informacion=$('#registrar-mora form#'+myId).serialize();
             var metodo=$('#registrar-mora form#'+myId).attr('method');
             var peticion=$('#registrar-mora form#'+myId).attr('action');
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