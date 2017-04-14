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

  <?php MainHeader(true); ?>


  <div class="jumbotron full-height all-middle f-colum" id="top-hero">
    <h2 class="hero-title">Quito es mucho más que una luz</h2>
    <h4 class="hero-subtitle">Visítalo y conocerás por qué</h4>

    <!--Forma para buscar-->
    <form action="busqueda.php" method="POST">
      <div class="form-busqueda">
        <input type="text" class="datePicker"placeholder="Llegada" readonly="readonly">
        <input type="text" class="datePicker"placeholder="Salida" readonly="readonly">
        <input type="text" placeholder="Huéspedes" readonly="readonly">
        <button type="submit" name="button" class="btn btn-submit">Buscar</button>
      </div>
    </form>
  </div>

  <!-- Wrappewr-->
  <div class="wrapper-index">
    <div class="all-middle f-colum">

      <div class="vp-show container">
        <h2 class="sec-title">Recomendaciones</h2>
        <div class="slide-show">

          <?php
          for($i=1; $i<=4; $i++){
            $host = new HospedajeVip(1000+$i);
            $host->setNombre("Hospedaje ".$i);
            $host->setPrecio(200*$i-$i);
            $host->setImagePath("img/rooms/room".$i.".jpeg");
            $host->printComponent();
          }
          ?>
        </div>
      </div>
      <div class="deal-show container">
        <h2 class="sec-title second">Habitaciones de Oferta</h2>
        <div class="slide-show f-row">
          <?php
          for($i=1; $i<=9; $i++){
            $hostDeal = new HospedajeDeal($i);
            $hostDeal->setNombre("Hospedaje ".$i);
            $hostDeal->setPrecio(200*$i);
            $hostDeal->setImagePath("img/svg/icons/doubleBed.svg");
            $hostDeal->printComponent();
          }
           ?>
        </div>
      </div>
    </div>
  </div>


<!--Main Footer-->
<?php
  MainFooter();
 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/usuario.js"></script>
</body>
</html>
