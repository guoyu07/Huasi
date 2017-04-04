
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
      <a href="../">
        <?php echo file_get_contents("img/logo.svg");?>
        <h2>Huasi</h2>
      </a>
    </div>
    <div class="nav main-nav">
      <a href="#"><div>Promociona tu hospedaje</div></a>
      <a href="#"><div>Ayuda</div></a>
      <a href="#"><div>Regístrate</div></a>
      <a href="login.php"><div>Iniciar Sesión</div></a>
    </div>
  </div>

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
  <!--<script src="js/jquery.js"></script>-->
</body>
</html>
