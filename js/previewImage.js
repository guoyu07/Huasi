$(document).ready(function() {
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        if($('.user-img').length !== 0){
          //Acciones para previsualizar foto de perfil usuario.
          $('#prev-image').css('background-size', 'cover');
          $('#prev-image').css('background-image', 'url("' + e.target.result + '")');
        }else if($('.corp-img').length !== 0){
          //Acciones para previsualizar logo de empresa.
          $('#prev-image').css('background-size', 'contain');
          $('#prev-image').css('background-image', 'url("' + e.target.result + '")');
        }
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInp").change(function(){
    readURL(this);
  });
});
