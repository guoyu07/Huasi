<?php
require_once "uiElements/Ui.php";
require_once 'imgEngine/ImgEngine.php';
require_once 'corpEngine/hostEngine.php';
require_once 'corpEngine/corpStatus.php';

$rq_corpId = $_REQUEST['corpId'];
if(!isset($_SESSION['corpId'])){
  header('Location: /');
}
//ejectToOrigin();

//Clase para manejar la subida de imagenes
$saveCorpImg = new ImgEngine('hostLogo', 'submit');
$saveCorpImg->saveImage('rooms');
//Retornar la ubicacion de la imagen para guardar en DB
$imgPath = $saveCorpImg->getImagePath();
//Clase para manejar la subida informacion


$loadHost = new UploadHost($_SESSION['corpId'], $imgPath);
$loadHost->loadNewHost();


newPageHead($corp['corpName'].' Añadir hospedaje');
?>

<body>
  <!--Menu de navegación-->
  <?php
  MainHeader(true);
  ?>

  <div class="wrapper-completeInfo">
    <div class="all-middle f-colum air-both container">
      <div class="verify col-12" id="">
        <h2 class="subtitle">Añade un nuevo hospedaje.</h2>
      </div>
      <div class=" card-container col-12">
        <div class="flex f-row air-both container">
          <div class="corp-img" id="prev-image"></div>
          <div class="col-9">
            <form action="addHost.php" method="POST" enctype="multipart/form-data" class="form">
              <label>Selecciona una foto para usarala como logo</label>
              <input type="file" name="hostLogo" id="imgInp">
              <label>Nombre del hospedaje</label>
              <input type="text" name="hostName" value="">
              <label>Tipo de Hospedaje</label>
              <!--<input type="text" name="hostType" value="">-->
              <div class="select col-2">
                <select name="hostType">
                  <option selected disabled>Tipo</option>
                  <option value="hotel">Hotel</option>
                  <option value="hostal">Hostal</option>
                  <option value="habitacion">Habitación</option>
                </select>
              </div>
              <label>Capacidad</label>
              <div class="select col-2">
                <select name="hostNum">
                  <option selected disabled>Número</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              </div>
              <label>Dirección</label>
              <input type="text" name="hostAddress" value="">
              <label>Zona</label>
              <input type="text" name="hostZone" value="">
              <label>Precio por noche</label>
              <input type="num" name="hostPrice" placeholder="$99.99">
              <label>Descripción</label>
              <textarea name="hostDescription" maxlength="240" placeholder="Dilo en 240 caracteres." rows="3"></textarea>
              <button type="submit" class="btn btn-submit" name="submit" value="<?=$rq_corpId?>">Continuar</button>
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
