<?php
require_once "uiElements/Ui.php";
require_once "userEngine/userEngine.php";
require_once 'imgEngine/ImgEngine.php';

global $user;

if($user['userFirstLogin'] > 0){
  header("Location: /");
}

$saveUserImg = new ImgEngine('userImagePath', 'submit');
$saveUserImg->saveImage('user');
$imgPath = $saveUserImg->getImagePath();

$completeForm = new userCompleteInfo($imgPath, $user['userId']);
$completeForm->setCompleteInfo();



newPageHead($user['userName']);
?>

<body>
  <!--Menu de navegación-->
  <?php
  MainHeader(true);
  ?>

  <div class="wrapper-completeInfo">
    <div class="all-middle f-colum air-both container">
      <div class="verify col-12" id="">
        <h2 class="subtitle">Bienvenido, José Guerrero</h2>
      </div>
      <div class=" card-container col-12">
        <p>Completa la siguiente información para continuar.</p>
        <div class="flex f-row air-both container">
          <div class="user-img" id="prev-image"></div>
          <div class="col-9">
            <form action="completarInfoUser.php" method="POST" enctype="multipart/form-data" class="form" >
              <label>Selecciona una foto para tu perfil</label>
              <input type="file" name="userImagePath" id="imgInp">
              <label>Soy</label>
              <div class="user-sex">
                <div class="select">
                  <select name="userSex">
                    <option selected disabled selected="selected">Sexo</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                    <option value="Otro">Otro</option>
                  </select>
                </div>
              </div>
              <label>Número de telefono</label>
              <input type="number" name="userPhoneNumber" value="">
              <label>Cuentanos un poco de ti</label>
              <textarea name="userDescription" maxlength="240" placeholder="Dilo en 240 caracteres." rows="3"></textarea>
              <button type="submit" class="btn btn-submit" name="submit">Continuar</button>
            </form>
          </div>

        </div>

      </div>
    </div>
  </div>

  <?php
  MainFooter();
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script src="js/previewImage.js"></script>
  <?php
  PageScripts();
  ?>
</body>
</html>
