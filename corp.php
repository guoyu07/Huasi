<?php
require_once "uiElements/Ui.php";

$rq_corpId = $_REQUEST['corpId'];



//Si no se esta apuntando a ningun usuario
//Redirecionar al home
/*if(empty($rq_userId) ){
  header("Location: /");
}*/


//Crear nueva clase para selecionar datos del usuario segun userId

//Crear Nuevo Head de la pagina.
newPageHead('Corporación');

?>

<body>
  <!--Menu de navegación-->
  <?php

  MainHeader(true);

  ?>

  <!-- Wrapper-->
  <div class="wrapper-corp">
    <div class="flex f-row container">
      <div class="card-container col-3 corp-info">
        <div class="corp-logo"></div>
        <div class="m-border"></div>
        <h2 class="sec-title">Corp</h2>
      </div>
      <div class="card-container col-9">
        <div class="host-show">
          <h2 class="sec-title">Hospedajes</h2>
        <div class="slide-show">
        <?php
        for($i=1; $i<=14; $i++){
          $host = new HostCorp(1000+$i);
          $host->setNombre("Hospedaje ".$i);
          $host->setPrecio(200*$i-$i);
          $host->setImagePath("img/rooms/room1.jpeg");
          $host->printComponent();
        }
         ?>
         </div>
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
  <script src="js/usuario.js"></script>
</body>
</html>
