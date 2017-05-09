<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Iniciar sesion
session_start();
//Requerir conexion a Db
require_once '../DbConnection.php';

$funName = $_GET['fun'];

if($funName === 'getUserReserv'){
  echo "reservas";
}



 ?>
