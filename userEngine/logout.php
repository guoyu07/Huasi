<?php
session_start();

//Destruir la sesion;
session_unset();
session_destroy();
header("Location: /");

 ?>
