<?php
require_once 'uiElements/Ui.php';
require_once "userEngine/userEngine.php";
ejectToOrigin();

global $user;
newPageHead($user['userName'].' '. $user['userLastName']);

$updatePassword = new UserSecurityUpdate($user['userId']);
//$updatePassword->checkPassword();
$updatePassword->setNewPassword();

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Huasi | Style Guidelines</title>
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
<body>
  <!--Menu de navegación-->
<?php
MainHeader(true);
 ?>

  <!-- Wrapper-->
  <div class="wrapper-usuario">
    <div class="container all-middle">
      <div class="card-container col-6">
        <form class="form security-form" method="POST" action="editarSeguridad.php">
          <h2 class="sec-title">Cambia tu contraseña</h2>
          <?php
            $updatePassword->printReport();
           ?>
          <label>Contraseña actual</label>
          <input type="password" name="userPassword" value="">
          <label>Nueva contraseña</label>
          <input type="password" name="userNewPassword" value="">
          <label>Confirmar contraseña</label>
          <input type="password" name="" value="">
          <button type="submit" name="button" class="btn btn-submit">Guardar</button>
        </form>
      </div>
    </div>
  </div>

  <!--Main Footer-->

  <?php
  MainFooter();
   ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <?php
  PageScripts();
   ?>
</body>
</html>
