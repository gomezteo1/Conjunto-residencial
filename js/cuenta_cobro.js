//$(function(){ //Función Jquery
//  $('#slcmonth').change(function(e) {//slcmonht
// e.preventDefault(); //Evitar submit
// metodo="consultar_tarifa";// consultar el m`precio del mes
// dato_buscar=$('#slcmonth').val(); // slcmonht
// alert(dato_buscar);
// $.ajax({
//  type:'POST',
// url:'Controladores/Month_Controlador.php', //controlador --monht
//datatype: "jeison",
//  data:{action:metodo,dato_buscar:dato_buscar},
//  success:function(data){
//  $('#txttarifa').val(data);//tarifa del monht
//}
//});
// });
// });
/*
 function calcular_total()
 {
   var valor_unitario=0,catidad=0;
   valor_unitario=document.getElementById('txtprecio').value;
   catidad=document.getElementById('txtcantidad').value;
   document.getElementById('txtvalor_total').value = valor_unitario*catidad;
 }
*/

// function Levanto() {

//     monto_por_cancelar = docment.getElementById('monto_por_cancelar').value;

//     if (monto_por_cancelar >= 0 || monto_por_cancelar <= -999999999) {

//         alert('Cochino jajajajajaa');
//         $(objetoDOM).attr("disabled"); //desabilita boton
//         $('#detalle_cuenta_cobro').attr("disabled", true);
//         return false;

//     } else {

//         $(objetoDOM).removeAttr("disabled"); //habilita boton
//         $('#    detalle_cuenta_cobrooton').attr("disabled", true);
//     }
// }






const detalleCuentasCobro = [];

$(function() { //funtion jquery
    $('#btnagregar').click(function(e) {
        e.preventDefault(); //evitar submint
        numeroCuenta = $('#numero_cuenta').val()
        nit = $('#nit').val()
        slcusuario_inmueble = $('#slcusuario_inmueble').val();
        var nombreSelect = $("select#slcusuario_inmueble option:selected").attr("nombre");

        //--> esta es la que contiene el texto slcusuario = $('#slcusuario_inmueble').text();
        slcmonth = $('#slcmonth').val();
        var mesSlect = $("select#slcmonth option:selected").attr("fecha");
        fecha = $('#fecha').val()
        monto_por_cancelar = $('#monto_por_cancelar').val();

        detalleCuentasCobro.push({
            nombre: nombreSelect,
            mes: mesSlect,
            numero_cuenta: numero_cuenta.value,
            nit,
            slcusuario_inmueble,
            slcmonth,
            monto_por_cancelar
        });
        actualizar();
    });
});


const actualizar = () => {
    let todo = '<div class="row justify-content-center">';

    for (const [index, cuenta] of detalleCuentasCobro.entries()) {

        todo +=
            `
            
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="col-4" align="left">
                        <button class="btn btn-outline-danger" onClick="eliminarCuenta(${index})"><i class="zmdi zmdi-close-circle"></i></button>
                    </div>

                    <div class="col-12">
                        <div>
                            <p>Datos: ${cuenta.nombre} </p>
                            <p hidden>${cuenta.slcusuario_inmueble} </p>
                        </div>
                    </div> 

                    <div class="col-12">
                        <div class="col-6">
                            <p>Cuenta:  ${cuenta.numero_cuenta}</p>
                            <p>Nit:  ${cuenta.nit}</p>
                        </div>
                        <div class="col-6">
                            <p>Mes:  ${cuenta.mes}</p>
                            <p hidden >${cuenta.slcmonth} </p>
                        </div>
                        <div>
                        
                            <p>Pagar:  ${cuenta.monto_por_cancelar}</p>
                            
                        </div>
                    </div>    
                </div>
            </div>
        </div>   
                
            
                

                
            </div>
            `
    }
    todo += '</div><br>'

    $("#detalle_cuenta_cobro").html(todo)
}

function eliminar_detalle(cantidad_detalles) {
    $("#detalle_cuenta_cobro" + cantidad_detalles).remove();
}

const eliminarCuenta = (id) => {
    //console.log(detalleCuentasCobro);
    detalleCuentasCobro.splice(id, 1)
    actualizar();
};




/* para guardar */
$(function() { //funtion para guardar en Db
    $('#btnguardar').click(function(e) {
        e.preventDefault();
        datos = {
            cuenta_cobro: 'cuenta_cobro',
            detalleCuentasCobro: JSON.stringify(detalleCuentasCobro)
        }
        $.ajax({
            type: 'POST',
            url: 'Controladores/Cuenta_cobro_Controlador.php',
            datatype: "json",
            data: datos,
            success: function(data) {
                // alert("Registro Éxitoso");
                /*document.getElementById('prueba').innerHTML=data*/
                alert("Registro Éxitoso");
            }
        });
    })
})