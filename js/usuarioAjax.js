$(document).ready(function() {

  var wishListHolder = $('#wish-holder');

  function getUserId(){
    var profile = $('.user-profile-info');
    var hostId = profile.attr('id');
    return hostId;
  }

  function getHostId(ref){
    var hostId = $(ref).attr('id');
    return hostId;
    console.log(hostId);

  }

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

  $( window ).load(function() {
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
  });

});
