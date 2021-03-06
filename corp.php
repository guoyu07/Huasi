<?php
require_once "uiElements/Ui.php";
require_once 'corpEngine/corpEngine.php';
$rq_corpId = $_REQUEST['corpId'];


//Crear nueva clase para selecionar datos de la empresa segun corpId
$corpData = new CorpDataOutput($rq_corpId);
if($corpData->getData() && !empty($rq_corpId)){

  //Crear Nuevo Head de la pagina.
  newPageHead($corpData->getName());
  ?>
  <body>
  <!--Menu de navegación-->
  <?php
  MainHeader(true);
  ?>
  <!-- Wrapper-->
  <div class="wrapper-corp">
      <div class="flex f-colum">
        <div class="card-container col-12 corp-menu">
          <div class="nav">
            <?php $corpData->outPutNav() ?>
          </div>
        </div>
        <div class="flex f-row container">
          <div class="card-container col-3 corp-info menu-item">
            <?php
            $corpData->outPutBasicData();
            ?>
          </div>
          <div class="card-container col-9" id="corpWebView">
            <div class="host-show">
              <div class="slide-show">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  <div id="caption-holder">
      <span id='close'>X</span>"
      <div id="caption-data"></div>
    </div>
  <?php

}else{
  //Crear Nuevo Head de la pagina.
  newPageHead('404');
  ?>
  <body>
  <!--Menu de navegación-->
  <?php
  MainHeader(true);
  ?>
  <div class="wrapper all-middle f-colum lost-dir">
    <h1>404!</h1>
    <h2 class="sec-title">Ups!</h2>
    <h2 class="sec-title">la empresa que estas buscando no existe</h2>
  </div>
  <?php
}

?>



  <!--Main Footer-->
  <?php
  MainFooter();
  if($corpData->getData() && !empty($rq_corpId)){
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script src="js/corpAjax.js"></script>
  <script src="js/corp.js"></script>
  <?php
  }
   ?>
  <script src="js/usuario.js"></script>
</body>
</html>
