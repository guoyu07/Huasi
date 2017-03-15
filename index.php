
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Huasi | Style Guidelines</title>
    <!--Resetear css de los navegadores-->
    <link rel="stylesheet" href="/style/normalize.css">
    <!--Fuente para el proyecto-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,300italic' rel='stylesheet' type='text/css'>
    <!-- Estilos base-->
    <link rel="stylesheet" href="/style/huasi.css">
  </head>
  <body>
    <!--Menu de navegación-->
    <div class="main-header fixed">
      <div class="header-logo">
        <a href="../">
          <?php echo file_get_contents("img/logo.svg"); ?>
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

    <!-- Wrappewr-->
    <div class="wrapper">
      <div class="jumbotron full-height all-midle f-colum" id="top-hero">
        <h2 class="hero-title">Quito es mucho más que una luz</h2>
        <h4 class="hero-subtitle">Visitalo y sabras porque</h4>
        <form>
          <div class="form-busqueda">
            <input type="text" placeholder="Lugar">
            <input type="text" placeholder="Tiempo">
            <input type="text" placeholder="Personas">
            <button type="submit" name="button" class="btn btn-submit">Buscar</button>
          </div>
        </form>
      </div>

      <div class="full-height">

        

      </div>
    </div>

  </body>
</html>
