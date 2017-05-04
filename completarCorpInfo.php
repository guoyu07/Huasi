<?php
require_once "uiElements/Ui.php";
require_once 'imgEngine/ImgEngine.php';
require_once 'corpEngine/corpEngine.php';

global $corp;

//ejectToOrigin();
if($corp['corpFirstLogin'] > 0){
  header("Location: /");
}

//Clase para manejar la subida de imagenes
$saveCorpImg = new ImgEngine('corpLogo', 'submit');
$saveCorpImg->saveImage('corp');
//Retornar la ubicacion de la imagen para guardar en DB
$imgPath = $saveCorpImg->getImagePath();
//Clase para manejar la subida informacion
$completeForm = new CorpCompleteInfo($imgPath, $corp['corpId']);
$completeForm->setCompleteInfo();


newPageHead($corp['corpName']);
?>

<body>
  <!--Menu de navegación-->
  <?php
  MainHeader(true);
  ?>

  <div class="wrapper-completeInfo">
    <div class="all-middle f-colum air-both container">
      <div class="verify col-12" id="">
        <h2 class="subtitle">Hola, solo necesitamos saber un poco más de <?=$corp['corpName']?> .</h2>
      </div>
      <div class=" card-container col-12">
        <p>Completa la siguiente información para continuar.</p>
        <div class="flex f-row air-both container">
          <div class="corp-img" id="prev-image"></div>
          <div class="col-9">
            <form action="completarCorpInfo.php" method="POST" enctype="multipart/form-data" class="form">
              <label>Selecciona una foto para usarala como logo</label>
              <input type="file" name="corpLogo" id="imgInp">
              <label>Número de telefono</label>
              <input type="number" name="corpPhone" placeholder="0987654321">
              <label>Dirección</label>
              <input type="text" name="corpAddress">
              <label>Cuentanos un poco tu empresa</label>
              <textarea name="corpDescription" maxlength="240" placeholder="Dilo en 240 caracteres." rows="3"></textarea>
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
