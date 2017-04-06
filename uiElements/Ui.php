<?php

//Requerir los elementos de la interfaz
require_once "Header.php";
$gTitulo = "Huasi";


//Funcion para generar el Header
function MainHeader(){

  //Defirnir e imprimir una nueva instancia de header
  $mainHeader = new HeaderUsuario("Jose Guerrero");
  $mainHeader->printComponent();

}

 ?>
