
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
          <input type="text" placeholder="Lugar">
          <input type="text" placeholder="Tiempo">
          <input type="text" placeholder="Personas">
          <button type="submit" name="button" class="btn btn-submit">Buscar</button>
        </div>
      </form>
    </div>

    <!-- Wrappewr-->
    <div class="wrapper">
      <div class="full-height container air-both">
        <h2>Elementos</h2>
        <h2 class="title">Titulo</h2>
        <h2 class="subtitle">Sub titulo</h2>
      </div>
    </div>

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
