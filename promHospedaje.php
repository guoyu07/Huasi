<?php
require_once 'uiElements/Ui.php';

newPageHead("Promociona tu hospedaje");
 ?>

<body>
  <!--Menu de navegación-->
  <?php
  MainHeader(true);
   ?>
  <!-- Wrapper-->
  <div class="wrapper-prom">
    <div class="jumbotron full-height all-middle f-colum">
      <div class="card-container all-middle">
        <div class="all-middle col-4">
          <h2 class="caption-title">Forma parte de la mejor comunidad hotelera de Quito</h2>
        </div>
        <div class="col-6">
          <div class="form">
            <a href="loginCorp.php">
              <button type="button" name="button" class="btn btn-submit">Iniciar sesión</button>
            </a>
            <a href="registerCorp.php">
            <button type="button" name="button" class="btn btn-secondary">Registrate</button>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="container hotel-show">
      <h2 class="sec-title text-center">Clientes</h2>
      <div class="all-middle container">
        <img src="img/hotel_logo.png" alt="logo_hotel">
        <img src="img/hotel_logo.png" alt="logo_hotel">
        <img src="img/hotel_logo.png" alt="logo_hotel">
        <img src="img/hotel_logo.png" alt="logo_hotel">
      </div>
    </div>
    <div class="container mute-coments">
      <h3 class="mute-text text-center">"La mejor forma de conseguir un espacio en la web"</h3>
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
