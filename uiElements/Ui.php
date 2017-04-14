<?php
session_start();

//Requerir los elementos de la interfaz
require_once 'Header.php'; //Requerir la clase header
require_once 'Footer.php'; //Requerir la clase footer;
require_once 'HospedajeCard.php'; //Requerir la clase para generar los container de los hospedajes
require_once 'BirthSelector.php'; //Requerir la clase para generar el selector de fechas de nacimiento
require_once 'userEngine/userStatus.php'; //Requerir el script para ver si existe o no una session.


//Funcion para generar el Header
function MainHeader($shadow){

  global $user;
  //Defirnir e imprimir una nueva instancia de header
  if(!empty($user)){
    $mainHeader = new HeaderUsuario($shadow, $user['userName']);
  }else{
    $mainHeader = new HeaderNormal($shadow);

  }

  //$mainHeader = new HeaderUsuario("Jose Guerrero");
  $mainHeader->printComponent();

}

function MainFooter(){
  
  //datos
  $footer = new Footer();

}

?>
