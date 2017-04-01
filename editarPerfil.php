
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
  <!--<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,300italic' rel='stylesheet' type='text/css'>-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
  <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">-->
  <!-- Estilos base-->
  <link rel="stylesheet" href="style/huasi.css">
</head>
<body>
  <!--Menu de navegación-->
  <div class="main-header drop-shadow">
    <div class="header-logo">
      <a href="../">
        <?php echo file_get_contents("img/logo.svg");?>
        <h2>Huasi</h2>
      </a>
    </div>
    <div class="nav main-nav">
      <a href="#"><div>Promociona tu hospedaje</div></a>
      <a href="#"><div>Ayuda</div></a>
      <a href="login.php" id="menu-triger"><div>Pablo Piedra</div></a>
      <div class="user-caption drop-shadow" id="user-menu">
        <a href="#"><div>Editar Perfil</div></a>
        <a href="#"><div>Seguridad</div></a>
        <a href="#"><div>Salir</div></a>
      </div>
    </div>
  </div>

  <!-- Wrapper-->
  <div class="wrapper-usuario">
    <div class="all-middle air-both">
      <div class="card-container col-8">
        <form class="form profile-form" action="index.html" method="post">
          <label>Nombre</label>
          <input type="text" name="" value="Jose Ignacio">
          <label>Apellido</label>
          <input type="text" name="" value="Guerrero Vinueza">
          <label>Dirección de correo electrónico</label>
          <input type="text" name="" value="josevinguerrero@gmail.com">
          <label>Soy</label>
          <div class="user-sex">
            <div class="select">
              <select name="sex">
                <option value="">Sexo</option>
                <option selected="selected"value="">Hombre</option>
                <option value="">Mujer</option>
                <option value="">Otro</option>
              </select>
            </div>
          </div>
          <label>Fecha de nacimiento</label>
          <div class="user-age">
            <div class="select">
              <select name="Age">
                <option value="1">23</option>
                <option value="">23</option>
                <option value="">23</option>
                <option value="">23</option>
              </select>
            </div>
            <div class="select">
              <select name="Age">
                <option value="1">23</option>
                <option value="">23</option>
                <option value="">23</option>
                <option value="">23</option>
              </select>
            </div>
            <div class="select">
              <select name="Age">
                <option value="1">23</option>
                <option value="">23</option>
                <option value="">23</option>
                <option value="">23</option>
              </select>
            </div>
          </div>

          <button type="submit" name="button" class="btn btn-submit-important">Guardar</button>
        </form>
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
  <script src="js/usuario.js"></script>
</body>
</html>
