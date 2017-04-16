<?php
session_start();
require_once "uiElements/Ui.php";
require_once "uiElements/BirthSelector.php";
require_once "userEngine/userEngine.php";

if(isset($_SESSION['userId'])){
  header("Location: /");
}


$test = new UserRegister();
$test->setNewUser();

$selectors = new BirthSelectorRegister();
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
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,300italic' rel='stylesheet' type='text/css'>
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
  <div class="wrapper-logsig">
    <div class="all-middle f-colum">
      <div class="jumbotron register-section">
        <form name="register" method="POST" action="register.php">
          <div class="form">
            <h2 class="subtitle">Unete a Huasi</h2>
            <label for="user-mail">Dirección de correo electrónico</label>
            <input type="mail" name="userMail" placeholder="huasi@huasi.com">
            <label for="user-name">Nombres</label>
            <input type="text" name="userName" placeholder="Mark">
            <label for="user-lastName">Apellidos</label>
            <input type="text" name="userLastName" placeholder="Huasi">
            <label>Edad</label>
            <div class="user-age">
              <?php
              $selectors->printMonths();
              $selectors->printDays();
              $selectors->printYears();
               ?>
            </div>
            <label for="user-password">Constraseña</label>
            <input type="password" name="userPassword" placeholder="mínimo 6 caracteres">
            <label for="user-password">Verificar Contraseña</label>
            <input type="password">
            <div>
              <input type="checkbox">
              <span>Acepto los <a href="#">Terminos</a> y las <a href="#">Condiciones</a></span>
            </div>
            <button type="submit" class="btn btn-submit"id="register-button">Resgistrate</button>
            <a href="login.php">
              <button type="button" class="btn btn-secondary"id="register-button">Ya tienes una cuenta</button>
            </a>
          </div>
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
</body>
</html>
