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
          <?php
          $userInfo->outPutData();
           ?>
        <div class="user-whishlist card-container">
          <h2 class="sec-title">WishList</h2>
          <div class=" b-border margin-bottom"></div>
          <div class="wishlist" id="wish-holder">
            <!--Holder para los Wish del user-->
          </div>
        </div>

        <?php
        if($rq_userId === $_SESSION['userId']){
          ?>
          <div class="reservas-user card-container">
            <h2 class="sec-title">Reservas</h2>
            <div class=" b-border margin-bottom"></div>
            <div id="reservas-holder">
              <!--Holder para las reservas del usuario-->
            </div>
          </div>
          <?php
        }
         ?>

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
  if($userInfo->getData() && !empty($rq_userId)){
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <?php
  }
   ?>
  <script src="js/usuario.js"></script>
  <script src="js/usuarioAjax.js"></script>
</body>
</html>
