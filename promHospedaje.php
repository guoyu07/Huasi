<?php
require_once 'uiElements/Ui.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Huasi | Style Guidelines</title>
  <!--favicon-->
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <!--Resetear css de los navegadores-->
  <link rel="stylesheet" href="style/normalize.css">
  <!--<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,300italic' rel='stylesheet' type='text/css'>-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
  <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">-->
  <!-- Estilos base-->
  <link rel="stylesheet" href="style/huasi.css">
</head>
<body>
  <!--Menu de navegación-->
  <?php
  MainHeader();
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
            <button type="button" name="button" class="btn btn-submit">Iniciar sesión</button>
            <button type="button" name="button" class="btn btn-secondary">Registrate</button>
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
      <h3 class="mute-text">"La mejor forma de conseguir un espacio en la web"</h3>
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
