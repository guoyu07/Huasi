<?php
require_once "uiElements/Ui.php";
require_once "userEngine/userEngine.php";

$rq_userId = $_REQUEST['userId'];
$rq_updateInfo = $_REQUEST['updateInfo'];

//Crear nueva clase para selecionar datos del usuario segun userId
$userInfo = new UserDataOutput($rq_userId);
if($userInfo->getData() && !empty($rq_userId)){
  newPageHead($userInfo->getUserName());
  ?>
  <body>
  <!--Menu de navegación-->
  <?php
  MainHeader(true);
  ?>
  <!-- Wrapper-->
  <div class="wrapper-usuario">
    <div class="container">
    </div>
    <div class="flex f-row container">
      <div class="col-8">
        <div class="user-profile-info card-container">
          <?php
          $userInfo->outPutData();
           ?>
        </div>
        <div class="user-whishlist card-container">
          <h2 class="sec-title">WishList</h2>
          <div class=" b-border margin-bottom"></div>
          <div class="wishlist">
            <a href="hospedaje.php" class="col-6">
              <div id="vp-1">
                <h2 class="sec-title">Habitación Ejemplo</h2>
                <h2 class="subtitle">$70</h2>
              </div>
            </a>
            <a href="hospedaje.php" class="col-6">
              <div id="vp-2">
                <h2 class="sec-title">Habitación Ejemplo</h2>
                <h2 class="subtitle">$70</h2>
              </div>
            </a>
            <a href="hospedaje.php" class="col-6">
              <div id="vp-3">
                <h2 class="sec-title">Habitación Ejemplo</h2>
                <h2 class="subtitle">$70</h2>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="col-4 card-container flex f-colum">
        <div class="verify">Información Verificada</div>
        <p>Tarjeta de credito</p>
        <p>Documento de identificación</p>
        <p>Dirección de correo electronico</p>
        <p>Número de telefono</p>
      </div>
    </div>
  </div>
  <?php
}else{
  newPageHead('404');
  ?>
  <body>
  <!--Menu de navegación-->
  <?php
  MainHeader(true);
  ?>
  <div class="wrapper all-middle f-colum lost-dir">
    <h1>404!</h1>
    <h2 class="sec-title">Ups!</h2>
    <h2 class="sec-title">El usuario que estas buscando no existe</h2>
    <!--<a href="/">
      <button type="button" name="button" class="btn btn-submit-white">Buscar Hospedajes</button>
    </a>-->
  </div>

  <?php
}

?>

  <!--Main Footer-->
  <?php
  MainFooter();
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script src="js/usuario.js"></script>
</body>
</html>
