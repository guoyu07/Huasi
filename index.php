<?php
require_once "uiElements/Ui.php";

if(isset($_SESSION['corpId'])){
  $corpId = $_SESSION['corpId'];
  header("location: corp.php?corpId=$corpId");
}

newPageHead("La mejor comunidad hotelera de Quito");



 ?>
<body>

  <!--Menu de navegación-->

  <?php MainHeader(); ?>


  <div class="jumbotron full-height all-middle f-colum" id="top-hero">
    <h2 class="hero-title">Quito es mucho más que una luz</h2>
    <h4 class="hero-subtitle">Visítalo y conocerás por qué</h4>

    <!--Forma para buscar-->
    <form  class="form  landing-form col-8"action="busqueda.php" method="POST">
      <div class="all-middle f-row col-12">
        <input type="date" name="coming"value="<?=date("Y-m-d")?>">
        <input type="date" name="leaving"value=<?php tomorrowDate(); ?>>
        <div class="select col-3">
          <select name="hostNum">
            <option selected disabled>Huespedes</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>

          </select>
        </div>
        <button type="submit" name="button" class="btn btn-submit">Buscar</button>
      </div>
    </form>
  </div>

  <!-- Wrappewr-->
  <div class="wrapper-index">
    <div class="all-middle f-colum">

      <div class="vp-show container">
        <h2 class="sec-title">Recomendaciones</h2>
        <div class="slide-show" id="curated-holder">

        </div>
      </div>
      <div class="deal-show container">
        <h2 class="sec-title second">Recientes</h2>
        <div class="slide-show f-row" id="recent-holder">
          <?php
          for($i=1; $i<=9; $i++){
            $hostDeal = new HospedajeDeal($i);
            $hostDeal->setNombre("Hospedaje ".$i);
            $hostDeal->setPrecio(200*$i);
            $hostDeal->setImagePath("img/rooms/room1.jpeg");
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
<script src="js/homeAjax.js"></script>
<?php
LandingScripts();
PageScripts();
 ?>
</body>
</html>
