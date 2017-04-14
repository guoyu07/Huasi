<?php

//Clase para generar el footer


class Footer{

  //Constructor de la clase
  function __construct(){
    $this->printFooter();
  }

  public function printFooter(){

    ?>
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
    <?php

  }

}

?>
