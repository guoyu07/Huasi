$(document).ready(function() {
//Variables Globales
var $main_header = $(".main-header");
var $main_nav = $(".main-nav");
//Funciones
function headerScroll(){
  scrollStarts = $(this).scrollTop();
  //remover la clase change cuando se haya scroleado mas de 20 la pagina.
  if(scrollStarts > 1){
    $main_header.removeClass('change');
  }else{
    //añadir la clase change cuando el scrool sea mejor a 20.
    $main_header.addClass('change');
  }
}

//Añadir la clase que transparenta
//el main-header y main-nav.
$main_header.addClass('change');
headerScroll();
//Funcion para añadir el efecto del header
$(document).scroll(function(){
  headerScroll();
});

//Asignar al funcion datepicker a todos los inputs que tengan la clase .datePicker.
$( function() {
    $( ".datePicker" ).datepicker();
  } );
});
