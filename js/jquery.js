$(document).ready(function() {



var $main_header = $(".main-header");
var $main_nav = $(".main-nav");

//Añadir la clase que transparenta
//el main-header y main-nav.
$main_header.addClass('change');
//$main_nav.addClass('change');

//Funcion para añadir el efecto del header
$(document).scroll(function(){

  scrollStarts = $(this).scrollTop();
  //remover la clase change cuando se haya scroleado mas de 20 la pagina.
  if(scrollStarts > 140){
    $main_header.removeClass('change');
  }else{
    //añadir la clase change cuando el scrool sea mejor a 20.
    $main_header.addClass('change');
  }

});

//Asignar al funcion datepicker a todos los inputs que tengan la clase .datePicker.
/*$( function() {
    $( ".datePicker" ).datepicker();
  } );
*/
});
