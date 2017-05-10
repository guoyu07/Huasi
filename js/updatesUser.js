$(document).ready(function() {

  //Seleccionar la forma para actualizar la imagen
  var $imageUpdate = $('#update-user-image');

  //Seleccionar la forma para actualizar la descripcion.
  var $descriptionUpdate = $('#update-user-description');

  $imageUpdate.submit(function(event) {
    event.preventDefault();
    $.ajax({
      type: "POST", //Tipo de envio
      url: '../userEngine/updateUserData.php?fun=updateImage', //path del documento php
      data: new FormData(this), //Enviar data al server
      processData:false,
      contentType: false,
      //funcion para mostrar los datos recividos por el server
      success: function(data){
        console.log('server: ok');
        $('#img-show').css('background-image', 'url("'+data+'")' );
        $('#img-uploader').val('');
        //$('.user-img').css('background-image', data);
        console.log(data);
      },
      //Mostrar errores
      error: function(){
        alert("Algo fue mal");
        console.log('Algo fue mal');
      }
    });
  });

  $descriptionUpdate.submit(function(event) {
    event.preventDefault();
    $.ajax({
      type: "POST", //Tipo de envio
      url: '../userEngine/updateUserData.php?fun=updateDescription', //path del documento php
      data:  $(this).serialize(), //Enviar data al server
      //funcion para mostrar los datos recividos por el server
      success: function(data){
        console.log('server: ok');
        console.log(data);
      },
      //Mostrar errores
      error: function(){
        alert("Algo fue mal");
        console.log('Algo fue mal');
      }
    });
  });



});
