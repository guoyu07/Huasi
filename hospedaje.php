
<?php
require_once "uiElements/Ui.php";
require_once 'corpEngine/hostEngine.php';
$rq_hostId = $_REQUEST['hostId'];

$hostData = new HostaDataOutput($rq_hostId);

if($hostData->getData() && !empty($rq_hostId)){
  newPageHead($hostData->getHostname());
  ?>

  <body>

    <?php

    MainHeader(true);
  ?>
  <div class="host-reserve container">
    <div class="nav col-8">
      <a href="#descripcion"><div>Descripción</div></a>
      <a href="#evaluaciones"><div>Evaluación</div></a>
      <a href="#ubicacion"><div>Ubicacion</div></a>
    </div>
    <div class="col-3 all-middle">
      <?php $hostData->outPutHostPrice() ?>
      <div class="caption-reserve">
        <form class="form form-reserva" id="make-reserve">
          <div class="all-middle f-colum">
            <div class="flex f-row">
              <div class="flex f-colum">
                <label for="llegada">Llegada</label>
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
          <button type="submit" class="btn btn-submit">Reservar</button>
          <button type="button" class="btn btn-secondary" id="wish-list">Añadir a WishList</button>
          <button type="button" class="btn btn-submit-love" id="delete-wish">Esta en tú WishList &hearts;</button>
        </form>
      </div>
    </div>
  </div>
  <!-- Wrapper-->
  <div class="wrapper-host">
    <div class="flex f-colum container">
      <div class="flex f-colum">
        <div class="host-info col-8">
          <div id="host-name"class="card-container">
            <div class="host-title col-8">
              <?php $hostData->outPutHostName() ?>
            </div>
            <?php $hostData->outPutHostImages() ?>
          </div>
          <div id="descripcion" class="card-container">
            <h2 class="sec-title">Información</h2>
            <?php $hostData->outPutHostDescription() ?>
            <div class="perks">
              <h2 class="subtitle">Incluye</h2>
              <ul>
                <li>Ejemplo</li>
                <li>Ejemplo</li>
                <li>Ejemplo</li>
                <li>Ejemplo</li>
                <li>Ejemplo</li>
                <li>Ejemplo</li>
                <li>Ejemplo</li>
                <li>Ejemplo</li>
                <li>Ejemplo</li>
                <li>Ejemplo</li>
              </ul>
            </div>
          </div>
          <div class=" b-border margin-bottom"></div>
          <div id="evaluaciones" class="card-container">
            <div class="flex">
              <h2 class="sec-title"><span id="comentNumber"></span> Comentarios</h2>
            </div>
            <div id="coments-holder">

            </div>
            <?php
              $id = $hostData->outPutHostId();
             ?>
            <div class="host-coment">
              <form class="form" id="coment-send">
                <textarea name="comentText" rows="8" cols="80" placeholder="Escribe tu Comentario"></textarea>
                <button type="submit" name="button" class="btn btn-submit" id="<?=$id?>">Comentar</button>
              </form>
            </div>

          </div>
          <div id="ubicacion" class="card-container">
            <h2 class="sec-title">Ubicación</h2>
            <?php $hostData->outPutHostAddress() ?>
          </div>
        </div>

        <div class="related-hosts all-middle f-colum">
          <div class="all-middle f-colum card-container col-12">
            <h2 class="sec-title">Hospedajes Similares</h2>
            <div class="slide-show">
              <?php
              for($i=1; $i<=4; $i++){
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
      </div>
    </div>
  </div>
  <div id="caption-holder">
      <span id='close'>X</span>
      <div id="caption-data"></div>
    </div>

  <?php
}else{
  newPageHead('404');
  ?>

  <body>

    <?php

    MainHeader(true);
  ?>
  <div class="wrapper all-middle f-colum lost-dir">
    <h1>404!</h1>
    <h2 class="sec-title">Ups!</h2>
    <h2 class="sec-title">El hospedaje que estas buscando no existe</h2>
</div>

<?php
}

?>
<!--Main Footer-->
<div class="main-footer">
  <div class="foot-section">
    <div class="col-2">
      <h2 class="subtitle">Huasi</h2>
      <a href=""><p>Acerca de</p></a>
      <a href=""><p>Ayuda</p></a>
      <a href=""><p>Privacidad</p></a>
    </div>
    <div class="col-2">
      <h2 class="subtitle">Hoteles</h2>
      <a href=""><p>Programas</p></a>
      <a href=""><p>Promoción</p></a>
      <a href=""><p>Manejo de Hospedajes</p></a>
      <a href=""><p>Quejas</p></a>
    </div>
    <div class="col-2">
      <h2 class="subtitle">Usuarios</h2>
      <a href=""><p>Registrate</p></a>
      <a href=""><p>Iniciar Sesión</p></a>
      <a href=""><p>Convierte en Host</p></a>
    </div>
  </div>
  <div class="foot-section">
    <div>
      <img src="img/logo.svg" alt="logo">
      <h2 class="subtitle">Huasi</h2>
    </div>
    <div>
      <a href="#"><p>Terminos y Privacidad</p></a>
      <a href="#">
        <?php echo file_get_contents("img/svg/facebook.svg");?>
      </a>
      <a href="#">
        <?php echo file_get_contents("img/svg/twitter.svg");?>
      </a>
      <a href="#">
        <?php echo file_get_contents("img/svg/instagram.svg");?>
      </a>
    </div>
  </div>
</div>
<?php
if($hostData->getData() && !empty($rq_hostId)){
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script src="js/reserva.js"></script>
  <?php
  }
PageScripts();
?>
<script src="js/hostAjax.js"></script>
</body>
</html>
