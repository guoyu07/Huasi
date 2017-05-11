$(document).ready(function() {

  var wishListHolder = $('#wish-holder');
  var reservHolder = $('#reservas-holder');

  //Guardar el id del usuario actual
  function getUserId(){
    var profile = $('.user-profile-info');
    var hostId = profile.attr('id');
    return hostId;
  }

  //Guardar el id del host para poder eliminarlo
  function getHostId(ref){
    var hostId = $(ref).attr('id');
    return hostId;
    console.log(hostId);

  }

  //Eliminar el Wish
  function deleteWish(ref){
    var $button = $(ref).children('#user-delete-wish');
    var hostId = getHostId(ref);
    $button.click(function(event) {
      console.log('entro');
      console.log(hostId);
      $.ajax({
        type: "POST", //Tipo de envio
        url: '../corpEngine/wishlistEngine.php?fun=deleteWish', //path del documento php
        data: {hostId: hostId}, //Enviar informacion de la forma
        //funcion para mostrar los datos recividos por el server
        success: function(data){
          if(data == 'eliminado'){
            $(ref).remove();
            getUserWish();
            console.log('eliminado');
          }else if(data == 'error'){
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
  }

  //Imprimir los wish del usuario
  function getUserWish(){
    var userId = getUserId();
    $.ajax({
      type: "POST", //Tipo de envio
      url: '../corpEngine/wishlistEngine.php?fun=getUserWishList',
      data: {userId: userId}, //Enviar informacion de la forma
      //funcion para mostrar los datos recividos por el server
      success: function(data){

        wishListHolder.html(data);
        var $wishEvent = $('#wish-holder > .wish-a');
        $wishEvent.mouseenter(function(event) {
          $(this).children('#user-delete-wish').show();
          deleteWish($(this));
        });
        $wishEvent.mouseleave(function(event) {
          $(this).children('#user-delete-wish').hide();
        });

      },
      //Mostrar errores
      error: function(){
        alert("Algo fue mal");
        console.log('Algo fue mal');
      }
    });
  }

  //Funcion para mostrar las reservas del usuario
  function getUserReserv(){

    var userId = getUserId();
    $.ajax({
      type: "POST", //Tipo de envio
      url: '../corpEngine/reserveEngine.php?fun=getUserReserv',
      data: {userId: userId}, //Enviar informacion de la forma
      //funcion para mostrar los datos recividos por el server
      success: function(data){
        if(data != 'error' && data != 'empty'){
          reservHolder.html(data);
        }
        console.log(data);
      },
      //Mostrar errores
      error: function(){
        alert("Algo fue mal");
        console.log('Algo fue mal');
      }
    });

  }


  //Funciones a ejecutar cuando la pagina cargue.
  $( window ).load(function() {
    getUserWish();
    getUserReserv();
  });

});
