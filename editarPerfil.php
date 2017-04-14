<?php
require_once 'uiElements/Ui.php';
require_once "uiElements/BirthSelector.php";
require_once "userEngine/userEngine.php";
require_once 'DbConnection.php';

//Ir al home si no existe una session
ejectToOrigin();

global $user;
$selectors = new BirthSelectorChange($user['userMonth'], $user['userDay'], $user['userYear']);
$updateEngine = new UserInfoUpdate($conn, $user['userId']);
$updateEngine->updateUserInfo();

function modifyUserData(){
  global $user;
  ?>
  <label>Nombre</label>
  <input type="text" name="userName" value="<?=$user['userName']?>">
  <label>Apellido</label>
  <input type="text" name="userLastName" value="<?=$user['userLastName']?>">
  <label>Dirección de correo electrónico</label>
  <input type="text" name="userMail" value="<?=$user['userMail']?>">
  <!--<label>Soy</label>
  <div class="user-sex">
  <div class="select">
  <select name="sex">
  <option selected disabled>Sexo</option>
  <option selected="selected"value="">Hombre</option>
  <option value="">Mujer</option>
  <option value="">Otro</option>
</select>
</div>
</div>-->
<?php

}

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
  MainHeader();
  ?>

  <!-- Wrapper-->
  <div class="wrapper-usuario">
    <div class="all-middle air-both">
      <div class="card-container col-8">
        <form class="form profile-form" method="POST" action="editarPerfil.php">
          <h2 class="sec-title">Modifica tu información personal</h2>
          <?php
          modifyUserData();
          ?>
          <label>Fecha de nacimiento</label>
          <div class="user-age">
            <?php
            $selectors->printMonths();
            $selectors->printDays();
            $selectors->printYears();
            ?>
          </div>
          <button type="submit" name="button" class="btn btn-submit-important">Guardar</button>
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
  <script src="js/usuario.js"></script>
</body>
</html>
