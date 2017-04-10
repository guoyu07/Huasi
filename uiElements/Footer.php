<?php

//Clase para generar el footer


class Footer{

  protected $titulo = "";
  protected $seccionesPrincipales = array();
  protected $seccionesSecundarias = array();
  protected $linksSecundarios = array();

  //Constructor de la clase
  function __construct($titulo){
    $this->titulo = $titulo;
  }

  //funcion para definir los titulos de cada menu
  public function setSecPrincipales($arrayName){

    for($i=0; $i<count($arrayName); $i++){
      $this->seccionesPrincipales[$i] = $arrayName[$i];
    }

  }

  //Funciones para defirnir los nombres
  //y links de cada elemento secundario
  public function setSecundarios($arrayName){

    $this->seccionesSecundarias[] = $nombre;
    $this->linksSecundarios[] = $link;

  }



  public function printComponent(){
    $mTitulo = $this->titulo;
    ?>

    <div class="main-footer">
      <div class="foot-section">

        <?php
        for($i=0; $i<count($this->seccionesPrincipales); $i++){
          $opPrincipal = $this->seccionesPrincipales[$i];
          ?>
          <div class="col-2">
            <h2 class="subtitle"><?=$opPrincipal?></h2>
          <?php
          for($j=0; $j<count($this->seccionesSecundarias); $j++){
            $opSecundaria = $this->seccionesSecundarias[$j];
            ?>
              <a href=""><p><?=$opSecundaria?></p></a>
            <?php
          }
          ?>
          </div>
          <?php
        }
        ?>
      </div>
      <div class="foot-section">
        <div>
          <img src="img/logo.svg" alt="logo">
          <h2 class="subtitle">Huasi</h2>
        </div>
        <div>
          <a href="#"><p>Términos y Privacidad</p></a>
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
