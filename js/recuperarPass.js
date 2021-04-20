$('#buttonR').unbind('click').click(function() {
    var myId = $(this).val();
    $('#registrar form#' + myId).submit(
        function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var informacion = $('#registrar form#' + myId).serialize();
            var metodo = $('#registrar form#' + myId).attr('method');
            var peticion = $('#registrar form#' + myId).attr('action');
            $.ajax({
                type: metodo,
                url: peticion,
                data: informacion,
                beforeSend: function() {
                    $("div#" + myId).html('</br><div style="width:15%; height:15%;"><img src="assets/img/cargando.gif" style="width:100%; height:100%;" class="centerAllContens"></div>' +
                        '</br>Buscando ...');
                },
                error: function() {},
                success: function(data) {
                    console.log('data:' + data);
                    if (data != '') {
                        $("div#" + myId).html("Se a enviado un mensaje a tu correo con una nueva contraseña, se recomienda cambiar esta contraseña una vez ingreses al sistema ")
                    } else {
                        $("div#" + myId).html('El correo ingresado no se encuentra registrado en el sistema')

                    }
                }
            });
            return false;
        });
});