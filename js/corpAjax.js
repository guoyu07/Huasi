$(document).ready(function() {

  //Variables globales
  var dataSelector = $('#Hosts');
  dataSelector.toggleClass('active');
  var corpData = dataSelector.data('value');
  var res = corpData.split(",");

  //Mostrar los hospedajes por default al cargar la pagina
  $( window ).load(function() {

    $.ajax({
      type: "POST",
      url: "../corpEngine/contentEngine.php",
      data: {corpData: corpData},
      success: function(data){
        $('#corpWebView').html(data)
        if(res[0]== 'Hosts'){
          $('.host-img').mouseenter(function() {
            $(this).children('.btn').show();
          });
          $('.host-img').mouseleave(function() {
            $('.host-img > .btn').hide();
          });


        }
      },
      error: function(){
        alert("Algo fue mal");
        console.log('Algo fue mal');
      }
    });
  });

  $('.nav > a').on('click', function(){
    var corpData = $(this).data('value');
    //eliminar la clase active de cada link cuando se hace click
    $('.nav > a').removeClass('active');
    //Añadir la clase active al link que fue clickeado
    window.scrollTo(0, 0);
    $(this).toggleClass('active');

    $.ajax({

      type: "POST",
      url: "../corpEngine/contentEngine.php",
      data: {corpData: corpData},

      success: function(data){

        //Cargar el contenigo a la pagina web.
        $('#corpWebView').html(data)

        //Dividir el value para comprobar en que seccion estamos

        if(res[0]== 'Hosts'){
          $('.host-img').mouseenter(function() {
            $(this).children('.btn').show();
          });
          $('.host-img').mouseleave(function() {
            $('.host-img > .btn').hide();
          });


        }else if(res[0] == 'Corps'){

          var updateForm = (document.forms[0]);
          var corpId = $('form > button').attr('id');;
          console.log(corpId);
          if(updateForm){
            console.log(updateForm);

            $('form').submit(function(event) {
              event.preventDefault();

              //Editar la informacion de las empresas.
              $.ajax({
                url: '../corpEngine/updateCorpInfo.php',
                type: 'POST',
                data: $(this).serialize() + "&corpId=" + corpId,
                success: function(data){
                  $('#update-show').css('display', 'flex');
                  $('#update-show p:first-of-type').text(data)
                  $('#close').click(function(event) {
                    $(this).parent().fadeOut(800);
                  });
                  console.log(data);
                },
                error: function(){
                  alert("Algo fue mal");
                  console.log('Algo fue mal');
                }
              })

            });
          }
        }
      },
      error: function(){
        alert("failure");
      }
    });



  });

});
