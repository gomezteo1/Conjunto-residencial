$(document).ready(function(){
	$('#show').mousedown(function(){
		$('#clave').removeAttr('type');
		$('#show').addClass('fa-eye-slash').remove('fa-eye');		
	});
	$('#show').mouseup(function(){
		$('#clave').attr('type','password');
		$('#show').addClass('fa-eye').remove('fa-eye-slash');	
	});

});
