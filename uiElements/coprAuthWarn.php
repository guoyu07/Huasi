<?php

function corpAuthHtmlWarn($nameUser){
  ?>
  <div class="jumbotron full-height col-12 all-middle" id="corp-warn">
    <div class="card-container all-middle f-colum col-6">
      <h1 class="important-icon">!</h1>
      <h2>Hola, <?=$nameUser?></h2>
      <p>Para acceder a las funcionalidades de host tienes que cerrar tu sesion e ingresar con una cuenta de host.</p>
      <a href="../userEngine/logout.php?alocate=promHospedaje.php">
        <button type="button" name="button" class="btn btn-submit-error">Cerrar Sesion</button>
      </a>
    </div>
  </div>
  <?php
}

 ?>
