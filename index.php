<?php

require "uiElements/Ui.php";


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

  <?php MainHeader(); ?>


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
          <a href="hospedaje.php" class="col-3 card-container">
            <div class="vp-host">
              <div id="vp-1"></div>
              <p>Ejemplo Habitación 1</p>
              <p>$70</p>
            </div>
          </a>
          <a href="hospedaje.php" class="col-3 card-container">
            <div class="vp-host">
              <div id="vp-2"></div>
              <p>Ejemplo Habitación</p>
              <p>$70</p>
            </div>
          </a>
          <a href="hospedaje.php" class="col-3 card-container">
            <div class="vp-host">
              <div id="vp-3"></div>
              <p>Ejemplo Habitación</p>
              <p>$70</p>
            </div>
          </a>
          <a href="hospedaje.php" class="col-3 card-container">
            <div class="vp-host">
              <div id="vp-4"></div>
              <p>Ejemplo Habitación</p>
              <p>$70</p>
            </div>
          </a>
        </div>
      </div>
      <div class="deal-show container">
        <h2 class="sec-title second">Habitaciones de Oferta</h2>
        <div class="slide-show f-row">
          <a href="#" class="col-3">
            <div class="deal-host">
              <div>
                <?php echo file_get_contents("img/svg/icons/simpleBed.svg");?>
              </div>
              <div class="margin-left">
                <p>Ejemplo Habitación</p>
                <div class="v-middle">
                  <p class="middle-line">$70.30</p>
                  <p>$55.30</p>
                </div>
              </div>
            </div>
          </a>
          <a href="#" class="col-3">
            <div class="deal-host">
              <div>
                <?php echo file_get_contents("img/svg/icons/doubleBed.svg");?>
              </div>
              <div class="margin-left">
                <p>Ejemplo Habitación</p>
                <div class="v-middle">
                  <p class="middle-line">$70.30</p>
                  <p>$55.30</p>
                </div>
              </div>
            </div>
          </a>
          <a href="#" class="col-3">
            <div class="deal-host">
              <div>
                <?php echo file_get_contents("img/svg/icons/simpleBed.svg");?>
              </div>
              <div class="margin-left">
                <p>Ejemplo Habitación</p>
                <div class="v-middle">
                  <p class="middle-line">$70.30</p>
                  <p>$55.30</p>
                </div>
              </div>
            </div>
          </a>
          <a href="#" class="col-3">
            <div class="deal-host">
              <div>
                <?php echo file_get_contents("img/svg/icons/simpleBed.svg");?>
              </div>
              <div class="margin-left">
                <p>Ejemplo Habitación</p>
                <div class="v-middle">
                  <p class="middle-line">$70.30</p>
                  <p>$55.30</p>
                </div>
              </div>
            </div>
          </a>
          <a href="#" class="col-3">
            <div class="deal-host">
              <div>
                <?php echo file_get_contents("img/svg/icons/simpleBed.svg");?>
              </div>
              <div class="margin-left">
                <p>Ejemplo Habitación</p>
                <div class="v-middle">
                  <p class="middle-line">$70.30</p>
                  <p>$55.30</p>
                </div>
              </div>
            </div>
          </a>
          <a href="#" class="col-3">
            <div class="deal-host">
              <div>
                <?php echo file_get_contents("img/svg/icons/doubleRoom.svg");?>
              </div>
              <div class="margin-left">
                <p>Ejemplo Habitación</p>
                <div class="v-middle">
                  <p class="middle-line">$70.30</p>
                  <p>$55.30</p>
                </div>
              </div>
            </div>
          </a>
          <a href="#" class="col-3">
            <div class="deal-host">
              <div>
                <?php echo file_get_contents("img/svg/icons/simpleBed.svg");?>
              </div>
              <div class="margin-left">
                <p>Ejemplo Habitación</p>
                <div class="v-middle">
                  <p class="middle-line">$70.30</p>
                  <p>$55.30</p>
                </div>
              </div>
            </div>
          </a>
          <a href="#" class="col-3">
            <div class="deal-host">
              <div>
                <?php echo file_get_contents("img/svg/icons/doubleBed.svg");?>
              </div>
              <div class="margin-left">
                <p>Ejemplo Habitación</p>
                <div class="v-middle">
                  <p class="middle-line">$70.30</p>
                  <p>$55.30</p>
                </div>
              </div>
            </div>
          </a>
          <a href="#" class="col-3">
            <div class="deal-host">
              <div>
                <?php echo file_get_contents("img/svg/icons/doubleBed.svg");?>
              </div>
              <div class="margin-left">
                <p>Ejemplo Habitación</p>
                <div class="v-middle">
                  <p class="middle-line">$70.30</p>
                  <p>$55.30</p>
                </div>
              </div>
            </div>
          </a>
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
</body>
</html>
