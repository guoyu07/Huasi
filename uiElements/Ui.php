<?php

//Requerir los elementos de la interfaz
require_once "Header.php";
require_once "Footer.php";
require_once "HospedajeCard.php";
$gTitulo = "Huasi";


//Funcion para generar el Header
function MainHeader(){

  //Defirnir e imprimir una nueva instancia de header
  $mainHeader = new HeaderUsuario("Jose Guerrero");
  $mainHeader->printComponent();
}

function MainFooter(){

  //datos
  $principales = array("Huasi", "Hoteles", "Usuarios");
  $secundarios = array(
    array("Acerda de", "about.php") => "Huasi",
    array("Ayuda", "ayuda.php") => "Huasi",
    array("Privacidad", "privacidad.php") => "Huasi",
    array("Programas", "programas.php") => "Hoteles",
    array("Programas", "programas.php") => "Hoteles",
    array("Programas", "programas.php") => "Hoteles",
    array("Programas", "programas.php") => "Hoteles"
  );

  echo $secundarios[0][0];
  $secLinks = array();
  $mainFooter = new Footer("Huasi");
  $mainFooter->setSecPrincipales($principales);
  $mainFooter->setSecundarios($secundarios);

  $mainFooter->printComponent();

}

 ?>
