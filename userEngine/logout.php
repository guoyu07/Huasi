<?php
$rq_location = $_REQUEST['alocate'];
session_start();

//Destruir la sesion;
session_unset();
session_destroy();
if(!empty($rq_location)){
  header("Location: ../$rq_location");
}else{
  header("Location: /");
}

 ?>
