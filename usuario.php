<?php
require_once "uiElements/Ui.php";
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
  <!--Fuente para el proyecto-->
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
  <div class="wrapper-usuario">
    <div class="flex f-row container">
      <div class="col-8">
        <div class="user-profile-info card-container">
          <img src="img/user/user-2.jpg" alt="" class="img-responsive">
          <div class="flex f-colum">
            <h2 class="sec-title">Pablo Piedra</h2>
            <p>Quito, Ecuador</p>
            <p>Miembro desde Agosto 2016</p>
          </div>
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

  <!--Main Footer-->
  <?php
    MainFooter();
   ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script src="js/usuario.js"></script>
</body>
</html>
