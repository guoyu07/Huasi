$(document).ready(function() {

var $searchForm = $('#search-data');
var $outPut = $('#search-out');
console.log($searchForm);

function search(){
  $.ajax({
    type: "POST", //Tipo de envio
    url: '../searchEngine/searchEngine.php?fun=updateSearch', //path del documento php
    data: $searchForm.serialize(), //Enviar informacion de la forma
    //funcion para mostrar los datos recividos por el server
    success: function(data){
      $outPut.html(data);
    },
    //Mostrar errores
    error: function(){
      alert("Algo fue mal");
      console.log('Algo fue mal');
    }
  });
}


$( window ).load(function() {
  search()
});

$searchForm.submit(function(event) {
  event.preventDefault();
  search()
});


});
