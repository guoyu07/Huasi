<?php

require_once "../DbConnection.php";

//Mostrar todos los errores de php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "hostEngine.php";
//Requerir la conecion


$corpId = $_POST['corpId'];


function updateInfo($id){

  $corpPhone = $_POST['corpPhone'];
  $corpMail = $_POST['corpMail'];
  $corpAddress = $_POST['corpAddress'];
  $corpRepre = $_POST['corpRepre'];
  $corpDescription = $_POST['corpDescription'];

  if(!empty($corpPhone) && !empty($corpMail) && !empty($corpAddress)
  && !empty($corpRepre) && !empty($corpDescription)){

    $conn = new DbConnection();

    $sql = "UPDATE Corps SET corpPhone = :corpPhone, corpMail = :corpMail, corpAddress = :corpAddress, corpDescription = :corpDescription WHERE corpId = $id";

    $stmt = $conn->connectToDataBase()->prepare($sql);

    $stmt->bindParam('corpPhone', $corpPhone);
    $stmt->bindParam('corpMail', $corpMail);
    $stmt->bindParam('corpAddress', $corpAddress);
    $stmt->bindParam('corpDescription', $corpDescription);

    if( $stmt->execute() ){
      echo "Tu informacion se actualizo con exito";
    }else{
      echo "Error al actualizar la informacion";
    }

  }else{
    echo "Todos los campos son obligatorios";
  }

}

updateInfo($corpId);



?>
