
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
      <div class="main-nav">
        <a href="#"><div>Promociona tu hospedaje</div></a>
        <a href="#"><div>Ayuda</div></a>
        <a href="#"><div>Regístrate</div></a>
        <a href="#"><div>Iniciar Sesión</div></a>
      </div>
    </div>

    <div class="jumbotron full-height all-midle f-colum" id="top-hero">
      <h2 class="hero-title">Quito es mucho más que una luz</h2>
      <h4 class="hero-subtitle">Visítalo y sabrás por qué</h4>

      <!--Forma para buscar-->
      <form>
        <div class="form-busqueda">
          <input type="text" class="datePicker"placeholder="Llegada">
          <input type="text" class="datePicker"placeholder="Salida">
          <input type="text" placeholder="Personas">
          <button type="submit" name="button" class="btn btn-submit">Buscar</button>
        </div>
      </form>
    </div>

    <!-- Wrappewr-->
    <div class="wrapper">
      <div class="all-midle container">

        <div class="vp-show">
          <h2 class="subtitle">Recomendaciones</h2>
          <div class="slide-show">
            <a href="#" class="col-3">
            <div class="vp-host">
              <div id="vp-1"></div>
              <p>Hola</p>
            </div>
            </a>
            <a href="#" class="col-3">
            <div class="vp-host">
              <div id="vp-2"></div>
              <p>Hola</p>
            </div>
            </a>
            <a href="#" class="col-3">
            <div class="vp-host">
              <div id="vp-3"></div>
              <p>Hola</p>
            </div>
            </a>
            <a href="#" class="col-3">
            <div class="vp-host">
              <div id="vp-4"></div>
              <p>Hola</p>
            </div>
            </a>

          </div>
        </div>
        <!--<h2>Texto</h2>
        <h2 class="title">Titulo</h2>
        <h2 class="subtitle">Sub titulo</h2>-->
      </div>
    </div>

    <!--Main Footer-->
    <div class="main-footer">
      <div class="foot-section">
        <div class="col-3">
          <h2 class="subtitle">Titulo</h2>
          <p>Elemento Elemento</p>
          <p>Elemento Elemento</p>
          <p>Elemento Elemento</p>
          <p>Elemento Elemento</p>
        </div>
        <div class="col-3">
          <h2 class="subtitle">Titulo</h2>
          <p>Elemento Elemento</p>
          <p>Elemento Elemento</p>
          <p>Elemento Elemento</p>
          <p>Elemento Elemento</p>
        </div>
        <div class="col-3">
          <h2 class="subtitle">Titulo</h2>
          <p>Elemento Elemento</p>
          <p>Elemento Elemento</p>
          <p>Elemento Elemento</p>
          <p>Elemento Elemento</p>
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
    <script src="js/jquery.js"></script>
  </body>
</html>
