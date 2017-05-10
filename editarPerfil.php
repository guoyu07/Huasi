<?php
require_once 'uiElements/Ui.php';
require_once "uiElements/BirthSelector.php";
require_once 'uiElements/countrySelector.php';
require_once 'uiElements/sexSelector.php';
require_once "userEngine/userEngine.php";
require_once 'imgEngine/ImgEngine.php';

//Ir al home si no existe una session
ejectToOrigin();

global $user;
//Selector de fecha de nacimiento
$selectors = new BirthSelectorChange($user['userMonth'], $user['userDay'], $user['userYear']);
//Selector de paises.
$countrySelector = new UserCountry($user['userCountry']);
//Selector der sexo.
$sexSelector = new UserSexSelector($user['userSex']);

//Actualizar info de usuarios.
$updateEngine = new UserInfoUpdate($user['userId']);
$updateEngine->updateUserInfo();

//Subir Foto
$updateUserImage = new ImgEngine('userImagePath', 'submitImg');
$updateUserImage->saveImage('user');
$imgPath = $updateUserImage->getImagePath();



function modifyUserData(){
  global $user, $selectors, $sexSelector;
  ?>
  <label>Nombre</label>
  <input type="text" name="userName" value="<?=$user['userName']?>">
  <label>Apellido</label>
  <input type="text" name="userLastName" value="<?=$user['userLastName']?>">
  <label>Dirección de correo electrónico</label>
  <input type="mail" name="userMail" value="<?=$user['userMail']?>">
  <label>Soy</label>
  <div class="user-sex">
  <?php
    $sexSelector->printSex();
   ?>
  </div>
  <label>Fecha de nacimiento</label>
  <div class="user-age">
    <?php
    $selectors->printMonths();
    $selectors->printDays();
    $selectors->printYears();
    ?>
  </div>
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
  <div class="wrapper-usuarioedit">
    <div class="flex  f-row container">
      <div class="col-4 card-container ">
        <div class="user-img" style="background-image: url(<?=$user['userImagePath']?>);" id="img-show"></div>
        <form class="form" id="update-user-image">
          <input type="file" name="userImagePath" id="img-uploader">
          <button type="submit" name="submitImg" class="btn btn-submit">Guardar foto</button>
        </form>
        <form class="form" id="update-user-description">
          <label for="userDescription">Bio:</label>
          <textarea name="userDescription" rows="8" maxlength="240"><?=$user['userDescription']?></textarea>
          <button type="submit" name="submit" class="btn btn-submit">Guardar bio</button>
        </form>
      </div>
      <div class="card-container col-8">
        <form class="form profile-form" method="POST" action="editarPerfil.php">
          <h2 class="sec-title">Modifica tu información personal</h2>
          <?php
          modifyUserData();
          ?>
          <label>En que país vives</label>
          <div class="user-country">
            <div class="select">
              <?php
              $countrySelector->printCountries();
              ?>
            </div>
          </div>
          <label>En que ciudad vives</label>
          <input type="text" name="userCity" value="<?=$user['userCity']?>">
          <label>Número de telefono</label>
          <input type="number" name="userPhoneNumber" value="<?=$user['userPhoneNumber']?>">
          <button type="submit" name="button" class="btn btn-submit">Guardar</button>
        </form>
      </div>
    </div>
    <div class="container flex f-row" id="deleteUser">
      <div class="card-container col-8"><a href="userEngine/deleteUser.php?userId=<?=$user['userId']?>">Eliminar cuenta</a></div>
    </div>
  </div>

  <!--Main Footer-->
  <?php
  MainFooter();
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script src="js/updatesUser.js"></script>
  <?php
  PageScripts();
  ?>
</body>
</html>
