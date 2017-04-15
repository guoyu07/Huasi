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
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,300italic' rel='stylesheet' type='text/css'>
    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">-->
    <!-- Estilos base-->
    <link rel="stylesheet" href="style/huasi.css">
  </head>
  <body>
    <!--Menu de navegación-->

    <?php
      MainHeader();
    ?>

    <div class="form-filtro">
      <form>
        <input type="text" class="datePicker" placeholder="Llegada" readonly="readonly">
        <input type="text" class="datePicker" placeholder="Salida" readonly="readonly">
        <input type="text" placeholder="Huéspedes : 1">
        <input type="text" placeholder="Precios">
        <input type="text" placeholder="Categoria">
      </form>
    </div>

    <!-- Wrapper-->
    <div class="wrapper-busqueda">
      <h2 class="caption-text">200 resultados</h2>
      <div class="host-show container">
        <div class="slide-show">
          <?php
          for($i=1; $i<=100; $i++){
            $host = new HospedajeSearch($i);
            $host->setNombre('Hospedaje '.$i);
            $host->setPrecio(200*$i-$i);
            $host->setImagePath('img/rooms/room2.jpeg');
            $host->printComponent();
          }
           ?>
        </div>
      </div>
    </div>

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
