$(function() {
    $('#slcpago').change(function(e) {
        e.preventDefault();
        metodo = "consultar_valor";
        dato_buscar = $('#slcpago').val();
        $.ajax({
            type: 'POST',
            url: 'Controladores/Pago_Controlador.php',
            data: { action: metodo, dato_buscar: dato_buscar },
            success: function(data) {
                $('#deuda').val(data);
            }

        });
    });

});

$('.prueba-jquery').click(function() {});

function calcular_total() {
    var valor_deuda, abono;
    valor_deuda = document.getElementById('deuda').value;
    abono = document.getElementById('abono').value;
    document.getElementById('saldo').value = (parseInt(valor_deuda)) - (parseInt(abono));

}
$('.button-Rabono').click(function() {
    var myId = $(this).val();
    $('#registrar-abono form#' + myId).submit(function(e) {
        e.preventDefault();
        var informacion = $('#registrar-abono form#' + myId).serialize();
        var metodo = $('#registrar-abono form#' + myId).attr('method');
        var peticion = $('#registrar-abono form#' + myId).attr('action');
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