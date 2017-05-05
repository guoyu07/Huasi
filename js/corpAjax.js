$(document).ready(function() {

  //Variables globales
  var dataSelector = $('#Hosts'); //Mostrar hospedajes por default
  dataSelector.toggleClass('active'); //Cambiar de color cada vez que se da click
  var corpData = dataSelector.data('value'); //Seleccionar el value de los links para mostrar informacion.
  var res;

  //Ocultar el caption-box
  var captionHolder = $('#caption-holder');
  var captionData = $('#captionData');
  captionHolder.hide();



  function manageHolder(){

    captionHolder.show();
    var button = $('#close');
    button.click(function(event) {
      console.log('hola');
      captionHolder.hide();
    });

  }


  //Funcion para sacar el id del host
  function getHostId(ref){
    var thisRef = $(ref).children('a').attr('href');
    var thisHostId = thisRef.match(/\d+/);
    return thisHostId[0];
  }

  function getLastHostId(){
    var thisHostId = $('form > button').attr('id');
    return thisHostId;
  }

  //Funcion para eliminar el hospedaje
  function deleteHost(ref){

    var hostId = getHostId(ref);//host del id para
    var button = $(ref).children('#trash');
    button.click(function(event) {
      captionHolder.css('top', window.scrollY);
      $.ajax({
        type: "POST", //Tipo de envio
        url: '../corpEngine/deleteHost.php?func=load', //path del documento php
        data: {hostId: hostId}, //datos a enviar

        //funcion para mostrar los datos recividos por el server
        success: function(data){
          //Mostar forma para eliminar hospedaje
          $('#caption-data').html(data);
          hostId = getLastHostId();
          manageHolder();
          var authError = $('#authError');
          authError.hide();
          var updateForm = (document.forms[0]);

          if(updateForm){

            $('form').submit(function(event) {
              event.preventDefault(); //Prevenir comportamiento default del submit de forma

              $.ajax({
                type: "POST", //Tipo de envio
                url: '../corpEngine/deleteHost.php?func=delete', //path del documento php
                data: $(this).serialize()  + "&hostId="+hostId+"", //Enviar informacion de la forma
                //funcion para mostrar los datos recividos por el server
                success: function(data){

                  if(data !== 'false' && data !== 'empty'){
                    $('#host' + hostId + '').remove();
                    $('#caption-data > .card-container').css('background-color', '#39AA94');
                    $('#caption-data > .card-container').html(data);
                  //Mostar mensaje de error si esta vacio el campo.
                  }else if(data == 'empty'){
                    authError.show();
                    authError.css('display', 'flex');
                    authError.html('<p>Tienes que ingresar tu contraseña</p>');
                    console.log('empty');
                  //Mostrar mensaje de error si la contraseña no es correcta
                  }else if(data == 'false'){
                    authError.show();
                    authError.css('display', 'flex');
                    authError.html('<p>La constraseña es incorrecta</p>');
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


        },
        //Mostrar errores
        error: function(){
          alert("Algo fue mal");
          console.log('Algo fue mal');
        }
      });
    });

  }

  //funcion para editar el hospedaje
  function editHost(ref){

    var hostId = getHostId(ref);//host del id para
    var button = $(ref).children('#edit');
    button.click(function(event) {
      captionHolder.css('top', window.scrollY);
      $.ajax({
        type: "POST", //Tipo de envio
        url: '../corpEngine/editHost.php?func=load', //path del documento php
        data: {hostId: hostId}, //datos a enviar

        //funcion para mostrar los datos recividos por el server
        success: function(data){
          //Mostar forma para eliminar hospedaje
          $('#caption-data').html(data);
          hostId = getLastHostId();
          manageHolder();
          var updateForm = (document.forms[0]);

          if(updateForm){

            $('form').submit(function(event) {
              event.preventDefault(); //Prevenir comportamiento default del submit de forma

              $.ajax({
                type: "POST", //Tipo de envio
                url: '../corpEngine/editHost.php?func=edit', //path del documento php
                data: $(this).serialize()  + "&hostId="+hostId+"", //Enviar informacion de la forma

                //funcion para mostrar los datos recividos por el server
                success: function(data){
                  //Guardar y actualizar datos
                  if(data == 'false'){

                  }else{
                    //Nuevos datos
                    var dataSplit = data.split(',');
                    var newPrice = dataSplit[0];
                    var newName = dataSplit[1];

                    //Selecionar elemtnos para output temporal
                    var priceHolder = $('#host' + hostId + ' p').first();
                    var nameHolder = $('#host' + hostId + ' p').last();

                    //Asignar nuevos valores temporales
                    priceHolder.html('$' + newPrice);
                    nameHolder.html(newName);
                    $('#caption-data > .card-container').css('background-color', '#39AA94');
                    $('#caption-data > .card-container').html('<h1 class="subtitle">La informacion ha sido actualizada</h1>');

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


        },
        //Mostrar errores
        error: function(){
          alert("Algo fue mal");
          console.log('Algo fue mal');
        }
      });
      manageHolder();
    });
  }

  $(document).scroll(function() {
    console.log($('html').offset().top);
  });



  //Mostrar los hospedajes por default al cargar la pagina
  //Funciones que ocurren al cargar la pagina
  $( window ).load(function() {
    res = corpData.split(",");

    //Establecer descarga asincronica
    $.ajax({
      type: "POST", //Tipo de envio
      url: "../corpEngine/contentEngine.php", //path del documento php
      data: {corpData: corpData}, //datos a enviar

      //funcion para mostrar los datos recividos por el server
      success: function(data){
        //Mostrar datos en el holder de html
        $('#corpWebView').html(data)
        //si el link es de Host, animar botones
        if(res[0]== 'Hosts'){
          $('.host-img').mouseenter(function() {
            $(this).children('.host-option').show();
            deleteHost($(this));
            editHost($(this));
          });
          $('.host-img').mouseleave(function() {
            $('.host-img > .host-option').hide();
          });


        }
      },
      //Mostrar errores
      error: function(){
        alert("Algo fue mal");
        console.log('Algo fue mal');
      }
    });
  });

  //Funcion para mostrar datos de cada seccion
  $('.nav > a').on('click', function(){
    var corpData = $(this).data('value'); //Selecionar el value
    var res = corpData.split(","); //Separar el value cuando encuenta una coma
    //Quitar la clase active del link actual cuando e haga click en otro link
    $('.nav > a').removeClass('active');
    //Scroolear al top cuando se haga un click en un nuevo link
    window.scrollTo(0, 0);
    //Añadir la clase active al link que fue clickeado
    $(this).toggleClass('active');

    //Establecer descarga asincronica
    $.ajax({

      type: "POST",//Tipo de envio
      url: "../corpEngine/contentEngine.php",//Path del documento de php
      data: {corpData: corpData}, //datos a enviar

      //Si el envio se completo?=
      success: function(data){

        //Cargar el contenigo a la pagina web.
        $('#corpWebView').html(data)

        //Si estamos en la seccion de hosts activar animacion de botones.
        if(res[0]== 'Hosts'){
          $('.host-img').mouseenter(function() {
            $(this).children('.host-option').show();
            deleteHost($(this));
            editHost($(this));
          });
          $('.host-img').mouseleave(function() {
            $('.host-img > .host-option').hide();
          });

        }

        //Si estamos en la seccion corps = formulario de informacion
        if(res[0] == 'Corps'){

          var updateForm = (document.forms[0]);
          var corpId = $('form > button').attr('id');;

          if(updateForm){

            $('form').submit(function(event) {
              event.preventDefault(); //Prevenir comportamiento default del submit de forma

              //Establecer descarga asincronica
              $.ajax({

                type: 'POST', //Tipo de envio
                url: '../corpEngine/updateCorpInfo.php', //path del documento de php
                //data: $(this).serialize() , //Enviar informacion de la forma
                data: $(this).serialize()  + "&corpId="+corpId+"", //Enviar informacion de la forma

                //Si la operacion fue exitosa=
                success: function(data){

                  $('#update-show').css('display', 'flex'); //Mostrar barra de mensaje
                  $('#update-show p:first-of-type').text(data) //Mostrar mensaje
                  //Eliminar barra de mensaje al hacer click en (X).
                  $('#close').click(function(event) {
                    $(this).parent().fadeOut(800);
                  });

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

  //Funcion para eliminar hospedajes
  $('#deleteHost').click(function(event) {
    event.preventDefault();
    alert('hola eliminador');
  });


});
