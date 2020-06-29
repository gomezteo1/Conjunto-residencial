$(function() { //Función Jquery
    $('#slcpago').change(function(e) {
        e.preventDefault(); //Evitar submit
        metodo = "consultar_valor";
        dato_buscar = $('#slcpago').val();
        $.ajax({
            type: 'POST',
            url: 'Controladores/Pago_Controlador.php',
            //dataType: "json",
            data: { action: metodo, dato_buscar: dato_buscar },
            success: function(data) {
                $('#deuda').val(data);
            }

        });
    });

});

$('.prueba-jquery').click(function() {
    // alert("llega");
});


function calcular_total() {
    //Captura los datos y rraliza la operacion
    var valor_deuda, abono;
    valor_deuda = document.getElementById('deuda').value;
    abono = document.getElementById('abono').value;
    document.getElementById('saldo').value = (parseInt(valor_deuda)) - (parseInt(abono));

}


/*Agregar producto con jquery y ajax*/
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

/*
$("#button-RAbono").click(function(){
    swal({
        title: "Hecho!",
        text: "Seha guardado correctamente",
        //text: "Su saldo es de"+nuevo_saldo+"",
        icon: "success",
        button: "Continuar",
      });
});
*/

/*
alertAgregar(){
    alert hola;
    swal({
        title: "Good job!",
        text: "You clicked the button!",
        icon: "success",
        button: "Aww yiss!",
      });
}*/