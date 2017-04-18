<?php
session_start();
require_once "uiElements/Ui.php";
require_once "userEngine/userEngine.php";

if(isset($_SESSION['userId'])){
  header("Location: /");
}

$logEngine = new UserLogin();
$logEngine->logUser();

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
        <div class="jumbotron login-section">
          <form name="login" method="POST" action="login.php">
            <div class="form">
              <h2 class="subtitle">Bienvenido otra vez</h2>
              <?php
                if(!empty($logEngine->getErrorMessage())){
                  $message = $logEngine->getErrorMessage();

                  ?>

                    <div class="error"><?=$message?></div>
                  <?php
                }
               ?>
              <label for="userMail">Dirección de correo electrónico:</label>
              <input type="mail" name="userMail">
              <label for="userPassword">Constraseña:</label>
              <input type="password" name="userPassword">
              <div>
                <input type="checkbox">
                <span>Recordarme</span>
              </div>
              <a href="#" class="imp-link">¿Has olvidado tu contraseña?</a>
              <button type="submit" class="btn btn-submit"id="register-button">Iniciar Sesion</button>
              <a href="register.php">
                <button type="button" class="btn btn-secondary"id="register-button">Crea una cuenta</button>
              </a>
              <a href="#">
                <p>Inicia sesion como empresa</p>
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
    <!--<script src="js/jquery.js"></script>-->
  </body>
</html>
