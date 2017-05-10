<?php
require_once "uiElements/Ui.php";
newPageHead("Buscar");
$rq_coming = $_POST['coming'];
$rq_leaving = $_POST['leaving'];




function hostNumCheck(){

for($i = 1; $i < 7 ; $i++){
  $rq_hostNum = $_POST['hostNum'];
  if($i == $rq_hostNum ){
    echo "<option value= '$rq_hostNum' selected>$rq_hostNum</option>";
  }else{
    echo "<option value= '$i' >$i</option>";
  }
}

}


?>

<body>
  <!--Menu de navegación-->

  <?php
  MainHeader();
  ?>

  <div class="form-filtro col-12">
    <form class=" form search-form col-12" id="search-data">
      <input type="date" value="<?=$rq_coming?>" name="coming">
      <input type="date" value="<?=$rq_leaving?>" name="leaving">
      <div class="select col-3">
        <select name="hostNum">
          <!--<option selected disabled>Número de huespedes</option>-->
          <?php
          hostNumCheck();
           ?>

        </select>
      </div>
      <div class="select col-3">
        <select name="hostType">
          <option selected disabled>Tipo de hospedaje</option>
          <option value="hotel">Hotel</option>
          <option value="hostal">Hostal</option>
          <option value="habitacion">Habitación</option>
        </select>
      </div>
      <button type="submit" name="button" class="btn btn-submit">Filtrar</button>
    </form>
  </div>

  <!-- Wrapper-->
  <div class="wrapper-busqueda">
    <!--<h2 class="caption-text">200 resultados</h2>-->
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
  <script src="js/searchAjax.js"></script>
  <?php
  PageScripts();
  ?>
</body>
</html>
