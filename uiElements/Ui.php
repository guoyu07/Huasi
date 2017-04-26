<?php
session_start();

//Requerir los elementos de la interfaz
require_once 'Header.php'; //Requerir la clase header
require_once 'Footer.php'; //Requerir la clase footer;
require_once 'HospedajeCard.php'; //Requerir la clase para generar los container de los hospedajes
require_once 'BirthSelector.php'; //Requerir la clase para generar el selector de fechas de nacimiento
require_once 'userEngine/userStatus.php'; //Requerir el script para ver si existe o no una session.

//Funcion para generar el <head> de las paginas.
function newPageHead($pageTitle){

  ?>

  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Huasi | <?=$pageTitle?></title>
    <!--favicon-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!--Resetear css de los navegadores-->
    <link rel="stylesheet" href="style/normalize.css">
    <!--Fuente para el proyecto-->
    <!--<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,300italic' rel='stylesheet' type='text/css'>-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">-->
    <!-- Estilos base-->
    <link rel="stylesheet" href="style/huasi.css">
  </head>

  <?php

}

//Funcion para generar el Header
function MainHeader(){

  global $user;
  //Defirnir e imprimir una nueva instancia de header
  if(!empty($user)){
    $firstName = explode(' ', $user['userName']);
    $lastName = explode(' ', $user['userLastName']);
    $name = ucfirst(current($firstName)).' '.ucfirst(current($lastName));
    $mainHeader = new HeaderUsuario($name, $user['userId']);
  }else{
    $mainHeader = new HeaderNormal();

  }

  //$mainHeader = new HeaderUsuario("Jose Guerrero");
  $mainHeader->printComponent();

}

//Funcion para generar el footer de las paginas
function MainFooter(){

  //datos
  $footer = new Footer();

}

function PageScripts(){

  global $user;
  if(!empty($user)){
    echo '<script src="js/usuario.js"></script>';
  }
}

function LandingScripts(){
  global $user;
  if(empty($user)){
    echo '<script src="js/jquery.js"></script>';
  }
}

function ejectToOrigin(){
  global $user;
  if(empty($user)){
    header("Location: /");
  }
}





?>
