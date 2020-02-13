$('#inicio').on('click', function(){
    $('html, body').animate( {scrollTop: 0}, 1000);
    //Inicio
    $('#inicio2').css("background","#F45C5C");
    $('#inicio2').css("color","white");
    //Acerca de
    $('#acercade2').css("background","none");
    $('#acercade2').css("color","#878787");
    //Servicios
    $('#servicios2').css("background","none");
    $('#servicios2').css("color","#878787");
    //Trabajos
    $('#trabajos2').css("background","none");
    $('#trabajos2').css("color","#878787");
})

$('#acercade').on('click', function(){
    $('html, body').animate( {scrollTop: 500}, 1000);
    //Inicio
    $('#inicio2').css("background","none");
    $('#inicio2').css("color","#878787");
    //Acerca de
    $('#acercade2').css("background","#F45C5C");
    $('#acercade2').css("color","white");
    //Servicios
    $('#servicios2').css("background","none");
    $('#servicios2').css("color","#878787");
    //Trabajos
    $('#trabajos2').css("background","none");
    $('#trabajos2').css("color","#878787");
})

$('#servicios').on('click', function(){
    $('html, body').animate( {scrollTop: 1000}, 1000);
    //Inicio
    $('#inicio2').css("background","none");
    $('#inicio2').css("color","#878787");
    //Acerca de
    $('#acercade2').css("background","none");
    $('#acercade2').css("color","#878787");
    //Servicios
    $('#servicios2').css("background","#F45C5C");
    $('#servicios2').css("color","white");
    //Trabajos
    $('#trabajos2').css("background","none");
    $('#trabajos2').css("color","#878787");
    
})

$('#trabajos').on('click', function(){
    $('html, body').animate( {scrollTop: 1500}, 1000);
    //Inicio
    $('#inicio2').css("background","none");
    $('#inicio2').css("color","#878787");
    //Acerca de
    $('#acercade2').css("background","none");
    $('#acercade2').css("color","#878787");
    //Servicios
    $('#servicios2').css("background","none");
    $('#servicios2').css("color","#878787");
    //Trabajos
    $('#trabajos2').css("background","#F45C5C");
    $('#trabajos2').css("color","white");
})