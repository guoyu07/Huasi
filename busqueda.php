<?php
require_once "uiElements/Ui.php";
newPageHead("Buscar");
?>

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
    <div class="search-show container">
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
