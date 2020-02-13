console.log('fuck');

$('#buttonR').unbind('click').click(function() {
    var myId = $(this).val();
    //console.log(myId);
    $('#registrar form#' + myId).submit(
        function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var informacion = $('#registrar form#' + myId).serialize();
            var metodo = $('#registrar form#' + myId).attr('method');
            var peticion = $('#registrar form#' + myId).attr('action');
            console.log(informacion);
            console.log(metodo);
            console.log(peticion);

            $.ajax({    
                type: metodo,
                url: peticion,
                data: informacion,
                beforeSend: function() {
                    //error
                     $("div#" + myId).html('</br><img src="assets/img/update.gif" class="centerAllContens">' +
                      '</br>Buscando ...');
                },
                error: function() {
                    //$("div#" + myId).html('Ha ocurrido un error en el sistema');
                },
                success: function(data) {
                    console.log('data:' + data);
                    

                     if(data != ''){ 
                     $("div#"+myId).html("Se a enviado un mensaje a tu correo con una nueva contraseña, se recomienda cambiar esta contraseña una vez ingreses al sistema ")
                        }

                    else{
                    $("div#"+myId).html('El correo ingresado no se encuentra registrado en el sistema')

                        }
                    /*$("div#" + myId).html(' ');
                    if (data != '') {
                        Swal.fire({
                            position: 'center',
                            type: 'success',
                            title: "Se a enviado un mensaje a tu correo con una nueva contraseña, se recomienda cambiar esta contraseña una vez ingreses al sistema ",
                            showConfirmButton: true
                        });
                    } else {
                        Swal.fire({
                            position: 'center',
                            type: 'error',
                            title: 'El correo ingresado no se encuentra registrado en el sistema',
                            showConfirmButton: true
                        });
                    }*/
                }
            });
            return false;
        });
});