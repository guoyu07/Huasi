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
  <!--Fuente para el proyecto-->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,300italic' rel='stylesheet' type='text/css'>
  <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">-->
  <!-- Estilos base-->
  <link rel="stylesheet" href="style/huasi.css">
</head>
<body>
  <!--Menu de navegación-->
<?php
MainHeader(true);
 ?>

  <!-- Wrapper-->
  <div class="wrapper-res">
    <div class="container">
      <div class="card-container flex f-row">
        <div class="col-6">
          <img src="img/rooms/room1.jpeg" alt="host" class="img-responsive">
        </div>

        <div class="reserva-info col-6">
          <h2 class="subtitle">Hospedaje Ejemplo</h2>

          <form class="form form-reserva" action="reservar.php" method="post">
            <div class="flex f-colum">
              <div class="flex f-row">
                <div class="flex f-colum">
                  <label for="llegada">LLegada</label>
                  <input type="text" name="llegada" placeholder="dd/mm/aa">
                </div>
                <div class="flex f-colum">
                  <label for="salida">Salida</label>
                  <input type="text" name="salida" placeholder="dd/mm/aa">
                </div>
              </div>
              <div class="text-left">
                <label for="huespedes">Huespedes</label>
                <input type="text" name="huespedes" placeholder="1 huesped">
              </div>
            </div>
            <div class="flex f-row">
              <button type="submit" class="btn btn-submit">Reservar</button>
              <button type="submit" class="btn btn-submit-important">Pagar</button>
            </div>
          </form>
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
  <?php
  PageScripts();
   ?>
</body>
</html>
