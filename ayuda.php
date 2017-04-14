<?php
require_once 'uiElements/Ui.php';
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
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,300italic' rel='stylesheet' type='text/css'>
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
  <div class="wrapper-ayuda">
    <div class="flex f-row container">
      <div class="col-4 card-container">
        <h2 class="subtitle">Comparte tus dudas con nosotros</h2>
        <form class="form">
          <textarea placeholder="Queremos ayudarte:" rows="10" class="card-container"></textarea>
          <button type="subtmi" name="button" class="btn btn-submit">Enviar</button>
        </form>
      </div>
      <div class="col-8 card-container">
        <h2 class="title">Preguntas Frecuentes:</h2>
        <div class=" b-border margin-bottom"></div>
        <div class="preguntas">
          <h2 class="subtitle">¿Pregunta?</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis libero interdum, molestie augue sed, consequat nulla. Maecenas eu blandit arcu.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis libero interdum, molestie augue sed, consequat nulla. Maecenas eu blandit arcu.</p>
          <h2 class="subtitle">¿Pregunta?</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis libero interdum, molestie augue sed, consequat nulla. Maecenas eu blandit arcu.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis libero interdum, molestie augue sed, consequat nulla. Maecenas eu blandit arcu.</p>
          <h2 class="subtitle">¿Pregunta?</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis libero interdum, molestie augue sed, consequat nulla. Maecenas eu blandit arcu.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis libero interdum, molestie augue sed, consequat nulla. Maecenas eu blandit arcu.</p>
          <h2 class="subtitle">¿Pregunta?</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis libero interdum, molestie augue sed, consequat nulla. Maecenas eu blandit arcu.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis libero interdum, molestie augue sed, consequat nulla. Maecenas eu blandit arcu.</p>
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
  <!--<script src="js/jquery.js"></script>-->
</body>
</html>
