
$(function(){ //Función Jquery
  	$('#slcpago').change(function(e) {
    e.preventDefault(); //Evitar submit
	metodo="consultar_monto_a_pagar";
	dato_buscar=$('#slcpago').val();
	$.ajax({
			type:'POST',
			url:'Controladores/Pago_Controlador.php',
            //dataType: "json",
            data:{action:metodo,dato_buscar:dato_buscar},
            success:function(data){	
			$('#monto_a_pagar').val(data);				
			}
		});
	});		
});

$(function(){ //Función Jquery
  	$('#slccuenta_cobro').change(function(e) {
    e.preventDefault(); //Evitar submit
	metodo="consultar_cuenta_cobro";
	dato_buscar=$('#slccuenta_cobro').val();
	$.ajax({
			type:'POST',
			url:'Controladores/Cuenta_cobro.php',
            //dataType: "json",
            data:{action:metodo,dato_buscar:dato_buscar},
            success:function(data){	
			$('#consultar_cuenta_cobro').val(data);				
			}
		});
	});		
});

$(function(){ //Función Jquery
  	$('#slcrol').change(function(e) {
    e.preventDefault(); //Evitar submit
	metodo="consultar_tipo_rol";
	dato_buscar=$('#slcrol').val();
	$.ajax({
			type:'POST',
			url:'Controladores/Rol_Controlador.php',
            //dataType: "json",
            data:{action:metodo,dato_buscar:dato_buscar},
            success:function(data){	
			$('#consultar_rol').val(data);				
			}
		});
	});		
});

$(function(){ //Función Jquery
  	$('#slcusuario').change(function(e) {
    e.preventDefault(); //Evitar submit
	metodo="consultar_tipo_usuario";
	dato_buscar=$('#slcusuario').val();
	$.ajax({
			type:'POST',
			url:'Controladores/Usuario_Controlador.php',
            //dataType: "json",
            data:{action:metodo,dato_buscar:dato_buscar},
            success:function(data){	
			$('#consultar_usuario').val(data);				
			}
		});
	});		
});

$(function(){ //Función Jquery
  	$('#slctipo_documento').change(function(e) {
    e.preventDefault(); //Evitar submit
	metodo="consultar_tipo_documento";
	dato_buscar=$('#slctipo_documento').val();
	$.ajax({
			type:'POST',
			url:'Controladores/Tipo_Documento_Controlador.php',
            //dataType: "json",
            data:{action:metodo,dato_buscar:dato_buscar},
            success:function(data){	
			$('#tipo_documento').val(data);				
			}
		});
	});		
});

$(function(){ //Función Jquery
  	$('#slctipo_pago').change(function(e) {
    e.preventDefault(); //Evitar submit
	metodo="consultar_tipo_pago";
	dato_buscar=$('#slctipo_pago').val();
	$.ajax({
			type:'POST',
			url:'Controladores/Tipo_Pago_Controlador.php',
            //dataType: "json",
            data:{action:metodo,dato_buscar:dato_buscar},
            success:function(data){	
			$('#tipo_pago').val(data);				
			}
		});
	});		
});


function eliminar_detalle(cantidad_detalles)
{
	$("#detalle_factura"+cantidad_detalles).remove();
}