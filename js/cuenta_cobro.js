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



        if (numeroCuenta == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debes Ingresar El Numero De La Cuenta!',
            })
            return false;
        } else if (numeroCuenta.length <= 5 || numeroCuenta.length >= 13) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Numero De Cuenta Debe Tener 6 A 13 Caracteres',
            })
            return false;
        } else if (nit == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debes Ingresar El Nit!',
            })
            return false;
        } else if (nit.length <= 7 || nit.length >= 25) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Nit Debe Tener 8 A 24 Caracteres',
            })
            return false;
        } else if (slcusuario_inmueble == undefined || slcusuario_inmueble == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debes Ingresar Los Datos De La Cuenta!',
            })
            return false;
        } else if (slcmonth == undefined || slcmonth == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debes Ingresar El Mes Y Tarifa De La Cuenta!',
            })
            return false;
        } else if (monto_por_cancelar == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debes Ingresar El Monto!',
            })
            return false;
        } else if (monto_por_cancelar.length <= 0 || monto_por_cancelar.length >= 9) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Monto Debe Tener 1 A 8 Caracteres',
            })
            return false;
        } else {
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

        }

    });
});
//Que si el array no esta completo me saque un false 

const actualizar = () => {
    let todo = '<div class="row justify-content-left">';
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
                swal.fire({
                    title: "Hecho!",
                    text: "Se Ha Registrado Correctamente",
                    icon: "success",
                    button: "Continuar",
                });
            }

        });
    })
})