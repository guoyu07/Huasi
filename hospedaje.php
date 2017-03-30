
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
  <div class="main-header">
    <div class="header-logo">
      <a href="index.php">
        <?php echo file_get_contents("img/logo.svg");?>
        <h2>Huasi</h2>
      </a>
    </div>
    <div class="nav main-nav">
      <a href="#"><div>Promociona tu hospedaje</div></a>
      <a href="#"><div>Ayuda</div></a>
      <a href="register.php"><div>Regístrate</div></a>
      <a href="#"><div>Iniciar Sesión</div></a>
    </div>
  </div>

  <div class="host-reserve container">
    <div class="nav col-8">
      <a href="#descripcion"><div>Descripción</div></a>
      <a href="#evaluaciones"><div>Evaluación</div></a>
      <a href="#ubicacion"><div>Ubicacion</div></a>
    </div>
    <div class="col-3 all-middle">
      <h2><span class="big">$109.99</span> por Noche</h2>
      <div class="caption-reserve">
        <form class="form form-reserva" action="index.html" method="post">
          <div class="all-middle f-colum">
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
          <button type="submit" class="btn btn-submit">Reservar</button>
          <button type="button" class="btn btn-secondary">Añadir a WishList</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Wrapper-->
  <div class="wrapper-host">
    <div class="flex f-colum container">
      <div class="host-title col-12">
        <h2 class="subtitle">Hospedaje de Ejemplo</h2>
      </div>
      <div class="flex f-colum">
        <div class="host-info col-8">
          <img src="img/vp/vp-8.jpg" alt="host" class="img-responsive">
          <div id="descripcion">
            <div class=" b-border margin-bottom"></div>
            <h2 class="subtitle">Información</h2>
            <p class="margin-bottom">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac velit fermentum, euismod purus at, gravida metus. Aenean et sollicitudin neque. Fusce leo mi, dignissim eget lectus at, luctus vulputate dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla id cursus enim, id gravida leo. Nulla urna elit, porttitor ac pulvinar ut, scelerisque ac libero. Nullam eu rhoncus diam.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac velit fermentum, euismod purus at, gravida metus. Aenean et sollicitudin neque. Fusce leo mi, dignissim eget lectus at, luctus vulputate dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla id cursus enim, id gravida leo. Nulla urna elit, porttitor ac pulvinar ut, scelerisque ac libero. Nullam eu rhoncus diam.
            </p>
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
          <div id="evaluaciones">
            <div class=" b-border margin-bottom"></div>
            <div class="flex">
              <h2 class="subtitle">10 Evaluaciones</h2>
              <span><img src="img/svg/icons/star.svg" alt=""></span>
              <span><img src="img/svg/icons/star.svg" alt=""></span>
              <span><img src="img/svg/icons/star.svg" alt=""></span>
              <span><img src="img/svg/icons/star.svg" alt=""></span>
              <span><img src="img/svg/icons/star.svg" alt=""></span>
            </div>
            <div class="host-coment">
              <div class="flex f-row">
                <img src="img/user/user-1.jpg" alt="">
                <div class="coment-user">
                  <h2 class="subtitle">Pedro Picapiedra</h2>
                  <p>Marzo de 2017</p>
                </div>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac velit fermentum, euismod purus at, gravida metus. Aenean et sollicitudin neque. Fusce leo mi, dignissim eget.</p>
            </div>
            <div class="host-coment">
              <div class="flex f-row">
                <img src="img/user/user-4.jpg" alt="">
                <div class="coment-user">
                  <h2 class="subtitle">Bati Chica</h2>
                  <p>Marzo de 2017</p>
                </div>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac velit fermentum, euismod purus at, gravida metus. Aenean et sollicitudin neque. Fusce leo mi, dignissim eget.</p>
            </div>
            <div class="host-coment">
              <div class="flex f-row">
                <img src="img/user/user-5.jpg" alt="">
                <div class="coment-user">
                  <h2 class="subtitle">Super Woman</h2>
                  <p>Marzo de 2017</p>
                </div>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac velit fermentum, euismod purus at, gravida metus. Aenean et sollicitudin neque. Fusce leo mi, dignissim eget.</p>
            </div>
            <div class="host-coment">
              <div class="flex f-row">
                <img src="img/user/user-2.jpg" alt="">
                <div class="coment-user">
                  <h2 class="subtitle">Pablo Marmol</h2>
                  <p>Marzo de 2017</p>
                </div>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac velit fermentum, euismod purus at, gravida metus. Aenean et sollicitudin neque. Fusce leo mi, dignissim eget.</p>
            </div>
          </div>
          <div id="ubicacion">
            <div class=" b-border margin-bottom"></div>
            <h2 class="subtitle">Ubicación</h2>
            <p>Av.Regresando al futuro 0e-212 y Rocafeller St</p>
          </div>
        </div>

        <div class="related-hosts all-middle f-colum">
          <h2 class="subtitle">Hospedajes Similares</h2>
          <div class="slide-show">
            <a href="hospedaje.php" class="col-3">
              <div class="host">
                <div id="vp-1"></div>
                <p>Ejemplo Habitación</p>
                <p>$70</p>
              </div>
            </a>
            <a href="hospedaje.php" class="col-3">
              <div class="host">
                <div id="vp-2"></div>
                <p>Ejemplo Habitación</p>
                <p>$70</p>
              </div>
            </a>
            <a href="hospedaje.php" class="col-3">
              <div class="host">
                <div id="vp-3"></div>
                <p>Ejemplo Habitación</p>
                <p>$70</p>
              </div>
            </a>
            <a href="hospedaje.php" class="col-3">
              <div class="host">
                <div id="vp-4"></div>
                <p>Ejemplo Habitación</p>
                <p>$70</p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script src="js/reserva.js"></script>
</body>
</html>
