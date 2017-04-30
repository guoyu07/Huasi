<?php

require_once 'uiElements/Ui.php';

newPageHead("Ayuda");
?>
<body>
  <!--Menu de navegación-->
  <?php
  MainHeader(true);
  ?>

  <div class="wrapper jumbotron all-middle" id="register-confirmation">
      <div class="card-container col-6 all-middle">
        <h2 class="sec-title">Tu cuenta se ha registrado con exito</h2>
        <p></p>
      </div>
  </div>

  <!--Main Footer-->
  <?php
  MainFooter();
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <?php
  PageScripts();
  ?>
</body>
</html>
