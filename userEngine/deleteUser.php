<?php

//Eliminar cuenta
session_start();
$rq_userId = $_REQUEST['userId'];
require_once "../DbConnection.php";
require_once "userEngine.php";

$deleteAccount = new DeleteUser($rq_userId);
$deleteAccount->deleteUser();
session_unset();
session_destroy();
header("Location: /");


 ?>
