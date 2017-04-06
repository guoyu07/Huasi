<?php

//Requerir los elementos de la interfaz
require_once "Header.php";

$gTitulo = "Huasi";


function MainHeader(){

  $mainHeader = new HeaderUsuario("Jose Guerrero");
  $mainHeader->printComponent();

}

 ?>
