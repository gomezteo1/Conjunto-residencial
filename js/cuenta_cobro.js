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

var cantidad_detalles=0;
$(function(){ //funtion jquiery
  $('#btnagregar').click(function(e){
    e.preventDefault();//evitar submint
    slcinmueble=$('#slcinmueble').val();
    nombre_inmueble=$('#slcinmueble option:selected').text();
    slcmonth=$('#slcmonth').val();
    slctipo_pago=$('#slctipo_pago').val();
    monto_por_cancelar=$('#monto_por_cancelar').val();
    //detalle
    //alert(precio);
   //detalle
   $("#detalle_cuenta_cobro").append('<div class="col-lg-12" id="detalle_cuenta_cobro'+cantidad_detalles+'"><div class="col-lg-12"><input type="text" name="inmueble"'+cantidad_detalles+' id="inmueble'+cantidad_detalles+'" value="'+slcinmueble+'"></input><input type="text"name="nombre_inmueble"'+cantidad_detalles+' id="nombre_inmueble'+cantidad_detalles+'"value="'+nombre_inmueble+'"></input><input type="text"name=" slcmonth"'+cantidad_detalles+' id="slcmonth'+cantidad_detalles+'" value="'+slctipo_pago+'"</input><input type="text" id="slctipo_pago'+cantidad_detalles+'" name="slctipo_pago+'+ cantidad_detalles+'"value="'+monto_por_cancelar+'"</input><input type="text" id="monto_por_cancelar'+cantidad_detalles+'" name="monto_por_cancelar+'+ cantidad_detalles+  numero_cuenta+'"></input><button id="btnquitar" name="btnquitar"onclick="eliminar_detalle('+cantidad_detalles+')">eliminar</button></div><div class="col-lg-6"></div>');
   $('#txtcantidad_detalles').val(parseInt($('#txtcantidad_detalles').val())+parseInt(1));cantidad_detalles=$('txtcantidad_detalles').val();
 cantidad_detalles++;
   });
 });
    // alert(eliminar_detalle);

 function eliminar_detalle(cantidad_detalles)
 {
   $("#detalle_cuenta_cobro"+cantidad_detalles).remove();
 }
 
/* para guardar */
$(function(){ //funtion para guardar en Db
  $('#btnguardar').click(function(e){
    e.preventDefault();
    datos=$('#frmcuenta_cobro').serialize();
    $.ajax({
      type:'POST',
      url:'Controladores/Cuenta_cobro_Controlador.php',
      //datatype :"json",
      data:datos,
      success:function(data){
alert(data);
/*document.getElementById('prueba').innerHTML=data*/
      }
    });
  });
});


//////////////////////////////////////////////////////////////////