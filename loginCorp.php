<?php
session_start();
require_once "uiElements/Ui.php";
require_once 'corpEngine/corpEngine.php';

if(isset($_SESSION['userId'])){
  $warn = true;
}else{
  $warn = false;
}

$logEngine = new CorpLogin();
$logEngine->logCorp();

newPageHead("Iniciar sesión");

?>

<body>
  <!--Menu de navegación-->
  <?php
  MainHeader(true);
  ?>

  <!-- Wrapper-->
  <div class="wrapper-logsig">
    <div class="all-middle f-colum">
      <?php

      if($warn){
        corpAuthWarn();
      }else{
        ?>
      <div class="jumbotron login-section" id="corp-auth">
        <form name="login" method="POST" action="loginCorp.php">
          <div class="form">
            <h2 class="subtitle">Bienvenido otra vez</h2>
            <div>
              <input type="mail" name="corpMail" placeholder="Correo electronico">
              <input type="password" name="corpPassword" placeholder="Contraseña">
            </div>
            <!--<div>
            <input type="checkbox">
            <span>Recordarme</span>
          </div>-->
          <!--<a href="#" class="imp-link">¿Has olvidado tu contraseña?</a>-->
          <div>
            <button type="submit" class="btn btn-submit"id="login-button">Iniciar Sesion</button>
            <a href="register.php">
              <button type="button" class="btn btn-secondary"id="register-button">Crea una cuenta</button>
            </a>
            <a href="#" class="contra-res">Oldivaste tu contraseña</a>
          </div>
          <!--<a href="#">
          <p>Inicia sesion como empresa</p>
        </a>-->
      </div>
      <?php
      }
       ?>
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
<!--<script src="js/jquery.js"></script>-->
</body>
</html>
