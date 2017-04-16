<?php
require_once 'uiElements/Ui.php';
require_once "uiElements/BirthSelector.php";
require_once "userEngine/userEngine.php";

//Ir al home si no existe una session
ejectToOrigin();

global $user;
$selectors = new BirthSelectorChange($user['userMonth'], $user['userDay'], $user['userYear']);
$updateEngine = new UserInfoUpdate($user['userId']);
$updateEngine->updateUserInfo();

function modifyUserData(){
  global $user;
  ?>
  <label>Nombre</label>
  <input type="text" name="userName" value="<?=$user['userName']?>">
  <label>Apellido</label>
  <input type="text" name="userLastName" value="<?=$user['userLastName']?>">
  <label>Dirección de correo electrónico</label>
  <input type="mail" name="userMail" value="<?=$user['userMail']?>">
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
newPageHead($user['userName'].' '. $user['userLastName']);
?>

<body>
  <!--Menu de navegación-->

  <?php
  MainHeader(true);
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
  <?php
  PageScripts();
   ?>
</body>
</html>
