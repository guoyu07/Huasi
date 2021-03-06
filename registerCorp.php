<?php
session_start();
require_once 'uiElements/Ui.php';
require_once 'corpEngine/corpEngine.php';

if(isset($_SESSION['corpId'])){
  $corpId = $_SESSION['corpId'];
  header("location: corp.php?corpId=$corpId");
}


if(isset($_SESSION['userId'])){
  $warn = true;
}else{
  $warn = false;
}

$registerEngine = new CorpRegister();
$registerEngine->setNewCorp();



newPageHead("Regístrate");
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
        <div class="jumbotron register-section" id="corp-auth">
          <form name="register" method="POST" action="registerCorp.php">
            <div class="form" id="form-corp">
              <h2 class="subtitle">Unete a Huasi</h2>
              <p>Promociona tu hospedaje en el mejor lugar</p>
              <div class="register-holder">
                <div class="credentials">
                  <label>Nombre de la empresa u hotel</label>
                  <input type="text" name="corpName" placeholder="Hostal Dulce Neo">
                  <label>Representante dentro de <span class="active"></span></label>
                  <input type="text" name="corpRepre" placeholder="Pedro Huasi">
                </div>
                <div class="credentials">
                  <label>Dirección de correo electrónico</label>
                  <input type="mail" name="corpMail" placeholder="name@example.com">
                  <label>Constraseña</label>
                  <input type="password" name="corpPassword" placeholder="mínimo 6 caracteres">
                  <label>Verificar Contraseña</label>
                  <input type="password">
                </div>
              </div>
              <div class="register-actions">
                <div>
                  <input type="checkbox">
                  <span>Acepto los <a href="#">Terminos</a> y las <a href="#">Condiciones</a></span>
                </div>
                <button type="submit" class="btn btn-submit"id="register-button">Resgistrate</button>
                <a href="loginCorp.php">
                  <button type="button" class="btn btn-secondary"id="register-button">Ya tienes una cuenta</button>
                </a>
              </div>
            </div>
          </form>

        </div>
        <?php
      }

      ?>

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
