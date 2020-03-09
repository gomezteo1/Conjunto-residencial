$('.prueba-jquery').click(function() {

});


/*Agregar rol con jquery y ajax*/
$('.button-Rrol').click(function() {
    var myId = $(this).val();
    $('#registrar-rol form#' + myId).submit(function(e) {
        e.preventDefault();
        var informacion = $('#registrar-rol form#' + myId).serialize();
        var metodo = $('#registrar-rol form#' + myId).attr('method');
        var peticion = $('#registrar-rol form#' + myId).attr('action');
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