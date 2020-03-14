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
const detalleCuentasCobro = [];

$(function() { //funtion jquiery
    $('#btnagregar').click(function(e) {
        e.preventDefault(); //evitar submint
        numeroCuenta = $('#numero_cuenta').val()
        nit = $('#nit').val()
        slcusuario_inmueble = $('#slcusuario_inmueble').val();
        slcmonth = $('#slcmonth').val();
        fecha = $('#fecha').val()
        monto_por_cancelar = $('#monto_por_cancelar').val();

        detalleCuentasCobro.push({
            numero_cuenta: numero_cuenta.value,
            nit,
            slcusuario_inmueble,
            slcmonth,
            monto_por_cancelar
            // nombre: slcusuario.options[slcusuario.selectedIndex].label,
        });

        actualizar();


        //console.log(detalleCuentasCobro);
    });
});
// alert(eliminar_detalle);

const actualizar = () => {
    let todo = '<div class="row justify-content-center">';

    for (const [index, cuenta] of detalleCuentasCobro.entries()) {
        todo += `
          <div class="col-2 align-self-end">
                
          </div>
        <div class="col-5" >
          <p>Cuenta: ${cuenta.numero_cuenta}</p>
          <p>Nit: ${cuenta.nit}</p>
          <p>Usuario e Inmueble: ${cuenta.slcusuario_inmueble}</p>
        </div>
        <div class="col-4" >
        <p>mes: ${cuenta.slcmonth}</p>
          <p>pagar: ${cuenta.monto_por_cancelar}</p>
        </div>
        <div class="col-1">
            <button class="btn btn-outline-danger" onClick="eliminarCuenta(${index})"><i class="zmdi zmdi-close-circle"></i></button>
        </div>
        `
    }
    todo += '</div>'

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
                console.log(data);
                /*document.getElementById('prueba').innerHTML=data*/
            }
        });
    })
})