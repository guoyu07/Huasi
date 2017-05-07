$(document).ready(function() {

  var $comentForm = $('#coment-send'); //Formulario para enviar comentario.
  var $wishlist = $('#wish-list'); //Boton para añadir a la wishlist.
  var $deleteWish = $('#delete-wish'); //Boton para eliminar de la wishlist.
  var $captionHolder = $('#caption-holder');
  var $captionData = $('#captionData');

  //Ocultar el caption-box
  $captionHolder.hide();

  //Manejar los eventos del holder
  function manageHolder(){

    $captionHolder.css('display', 'flex');
    var button = $('#close');
    button.click(function(event) {
      console.log('hola');
      $captionHolder.hide();
    });

  }

  //retornar el id del host acutal
  function getHostId(){
    var button = $comentForm.children('button');
    var hostId = button.attr('id');
    return hostId;
  }

  //Ejecutar cuando la pagina este cargada
  $( window ).load(function() {
    var hostId = getHostId();
    //Enviar y recivir datos del server.
    $.ajax({
      type: "POST", //Tipo de envio
      url: '../comentEngine/comentEngine.php?fun=displayComents', //path del documento php
      data: {hostId: hostId}, //Enviar informacion de la forma
      //funcion para mostrar los datos recividos por el server
      success: function(data){
        $('#coments-holder').append(data);
      },
      //Mostrar errores
      error: function(){
        alert("Algo fue mal");
        console.log('Algo fue mal');
      }
    });
    $.ajax({
      type: "POST", //Tipo de envio
      url: '../corpEngine/wishlistEngine.php?fun=checkWishStatus', //path del documento php
      data: {hostId: hostId}, //Enviar informacion de la forma
      //funcion para mostrar los datos recividos por el server
      success: function(data){
        //Verificar si el usuario tiene este host en su wishlist
        if(data == 'existe'){
          $wishlist.hide();
          $deleteWish.show();
        }else if(data == 'empty'){

          $wishlist.show();
          $deleteWish.hide();
        }

      },
      //Mostrar errores
      error: function(){
        alert("Algo fue mal");
        console.log('Algo fue mal');
      }
    });


  });

  //Enviar comentario al submitir la forma
  $comentForm.submit(function(event) {
    event.preventDefault();
    var hostId = getHostId();
    //Enviar y recivir datos del server.
    $.ajax({
      type: "POST", //Tipo de envio
      url: '../comentEngine/comentEngine.php?fun=makeComent', //path del documento php
      data: $(this).serialize() + "&hostId="+ hostId +"", //Enviar informacion de la forma
      //funcion para mostrar los datos recividos por el server
      success: function(data){
        if(data == 'error'){
          console.log('error');
        }else if(data == 'empty'){
          console.log('esta vacio');
        }else{
          $('#coments-empty').hide();
          $('textarea').val('');
          $('#coments-holder').append(data);
        }

      },
      //Mostrar errores
      error: function(){
        alert("Algo fue mal");
        console.log('Algo fue mal');
      }
    });
  });

  //añadir Wish
  $wishlist.click(function(event) {
    event.preventDefault();
    hostId = getHostId();
    $.ajax({
      type: "POST", //Tipo de envio
      url: '../corpEngine/wishlistEngine.php?fun=setWish', //path del documento php
      data: {hostId: hostId}, //Enviar informacion de la forma
      //funcion para mostrar los datos recividos por el server
      success: function(data){

        if(data == 'guardado'){
          $wishlist.hide();
          $('#delete-wish').show();
        }else if(data == 'error'){
          alert('error');
          console.log('error');
        }else{
          manageHolder();
          $('#caption-data').html(data);
        }

      },
      //Mostrar errores
      error: function(){
        alert("Algo fue mal");
        console.log('Algo fue mal');
      }
    });
  });

  //eliminar Wish
  $deleteWish.click(function(event) {
    event.preventDefault();
    var hostId = getHostId();
    $.ajax({
      type: "POST", //Tipo de envio
      url: '../corpEngine/wishlistEngine.php?fun=deleteWish', //path del documento php
      data: {hostId: hostId}, //Enviar informacion de la forma
      //funcion para mostrar los datos recividos por el server
      success: function(data){
        if(data == 'eliminado'){
          $deleteWish.hide();
          $wishlist.show();
        }else if(data == 'error'){
          alert('error');
          console.log('error');
        }

      },
      //Mostrar errores
      error: function(){
        alert("Algo fue mal");
        console.log('Algo fue mal');
      }
    });
  });



});
