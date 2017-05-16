$(document).ready(function() {


  //Mostrar los host con más comentarios
  function showCuratedHosts(){
    var $curated = $('#curated-holder');

    $.get( "../corpEngine/hostShow.php?fun=getCurated", function( data ) {
      $curated.html(data);
      console.log(data);
    });


  }

  //Mostrar los host mas recientes
  function showRecentHost(){
    var $recent = $('#recent-holder');
    $.get( "../corpEngine/hostShow.php?fun=getRecent", function( data ) {
      $recent.html(data);
      console.log(data);
    });

  }


  //Ejecutar funciones cuando la pagina carge
  $( window ).load(function() {

    showCuratedHosts();
    showRecentHost();

  });




  });
