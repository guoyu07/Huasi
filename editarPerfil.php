<?php
require_once 'uiElements/Ui.php';
ejectToOrigin();

 ?>
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

<?php
MainHeader();
 ?>

  <!-- Wrapper-->
  <div class="wrapper-usuario">
    <div class="all-middle air-both">
      <div class="card-container col-8">
        <form class="form profile-form" action="index.html" method="post">
          <h2 class="sec-title">Modifica tu información personal</h2>
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
                <option selected disabled>Sexo</option>
                <option selected="selected"value="">Hombre</option>
                <option value="">Mujer</option>
                <option value="">Otro</option>
              </select>
            </div>
          </div>
          <label>Fecha de nacimiento</label>
          <div class="user-age">
            <div class="select">
              <select name="dia">
                <option selected disabled>Día</option>
                <option value="1">23</option>
                <option value="">24</option>
                <option selected="selected" value="">25</option>
                <option value="">26</option>
              </select>
            </div>
            <div class="select">
              <select name="Mes">
                <option selected disabled>Mes</option>
                <option value="1">Enero</option>
                <option value="">Febrero</option>
                <option selected="selected" value="">Marzo</option>
                <option value="">Abril</option>
              </select>
            </div>
            <div class="select">
              <select name="Año">
                <option selected disabled>Año</option>
                <option value="1">1990</option>
                <option selected="selected" value="">1997</option>
                <option value="">1998</option>
                <option value="">1999</option>
              </select>
            </div>
          </div>
          <button type="submit" name="button" class="btn btn-submit-important">Guardar</button>
        </form>
      </div>
    </div>
  </div>

  <!--Main Footer-->
<?php
MainFooter();
 ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script src="js/usuario.js"></script>
</body>
</html>
