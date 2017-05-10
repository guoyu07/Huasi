$(document).ready(function() {

var $searchForm = $('#search-data');
console.log($searchForm);

$searchForm.submit(function(event) {
  event.preventDefault();
  $.ajax({
    type: "POST", //Tipo de envio
    url: '../searchEngine/searchEngine.php?fun=updateSearch', //path del documento php
    data: $(this).serialize(), //Enviar informacion de la forma
    //funcion para mostrar los datos recividos por el server
    success: function(data){
      console.log('conectando');
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
