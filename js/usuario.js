 $('.prueba-jquery').click(function() {});

 $('.button-Rusuario').click(function() {
     var myId = $(this).val();
     $('#registrar-usuario form#' + myId).submit(function(e) {
         e.preventDefault();
         var informacion = $('#registrar-usuario form#' + myId).serialize();
         var metodo = $('#registrar-usuario form#' + myId).attr('method');
         var peticion = $('#registrar-usuario form#' + myId).attr('action');
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

 function alertEliminar() {
     Swal.fire({
         title: 'Estas seguro de eliminar?',
         text: "You won't be able to revert this!",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Si, eliminar elemento!'
     }).then((result) => {
         if (result.value) {
             Swal.fire({
                 title: 'Deleted!',
                 text: 'Your file has been deleted.',
                 type: 'success',
                 timer: 5000
             }).then((result) => {
                 location.href = "?controller=usuario&action=eliminar_usuario&id_usuario=" + $('#id_usuario').val();
             });
         }
     })
 }