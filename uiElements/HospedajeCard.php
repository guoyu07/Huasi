<?php


abstract class HospedajeBase {

  protected $idHospedaje;
  protected $nombreHospedaje = '';
  protected $precioHospedaje = 0;
  protected $imagenPath = '';


  public function __construct($mHospedajeId){
    $this->idHospedaje = $mHospedajeId;
  }

  public function setNombre($mNombre){
    $this->nombreHospedaje = $mNombre;
  }

  public function setPrecio($mPrecio){
    $this->precioHospedaje = $mPrecio;
  }

  public function setImagePath($mPath){
    $this->imagenPath = $mPath;
  }

  public function printComponent(){}

  }


  class HospedajeDeal extends HospedajeBase{

    function __construct($mHospedajeId){
      parent::__construct($mHospedajeId); // Llamar al constructor de la clase heredada
    }

    public function printComponent(){
      ?>
      <a href="hospedaje.php?hostID=<?=$this->idHospedaje?>" class="col-3">
        <div class="deal-host">
          <div>
            <?php echo file_get_contents( $this->imagenPath);?>
          </div>
          <div class="margin-left">
            <p><?=$this->nombreHospedaje?></p>
            <div class="v-middle">
              <p class="middle-line">$<?=$this->precioHospedaje?></p>
              <p>$<?=$this->precioHospedaje?></p>
            </div>
          </div>
        </div>
      </a>
      <?php
    }

  }

  abstract class HospedajeConImagen extends HospedajeBase{

    function __construct($mHospedajeId){
      parent::__construct($mHospedajeId); //Llamar al constructor de la clase heredada.
    }

    public function printComponent($rClassName){

      $this->className = $rClassName;
      $mClassName = $this->className;
      //<a href='cancion.php?albmID=$albmID&artID=$artID'>";
      ?>
      <a href="hospedaje.php?hostId=<?=$this->idHospedaje?>" class="col-3 card-container">
        <div class=<?=$mClassName?>>
          <div style='background-image:url(<?= $this->imagenPath?>)'></div>
          <p>$<?=$this->precioHospedaje?></p>
          <p><?=$this->nombreHospedaje?></p>
        </div>
      </a>
      <?php
    }

  }

  class HospedajeVip extends HospedajeConImagen{

    protected $className = 'vp-host';

    function __construct($mHospedajeId){
      parent::__construct($mHospedajeId); // Llamar al constructor de la clase heredada
    }

    public function printComponent(){
      parent::printComponent($this->className); //llamar a la funcion de la clase heredada.
    }

  }

  class HospedajeSearch extends HospedajeConImagen{

    protected $className = 'host';

    function __construct($mHospedajeId){
      parent::__construct($mHospedajeId); // Llamar al constructor de la clase heredada
    }

    public function printComponent(){
      parent::printComponent($this->className); //llamar a la funcion de la clase heredada.
    }

  }

  class HostCorp extends HospedajeConImagen{

    protected $className = 'corp-host';

    function __construct($mHospedajeId){
      parent::__construct($mHospedajeId); // Llamar al constructor de la clase heredada
    }

    public function printComponent(){

      $className = $this->className;
      $mClassName = $this->className;
      ?>
      <!--<a href="hospedaje.php?hostId=<?=$this->idHospedaje?>" class="col-3 card-container host-a">-->
        <div class="col-3 card-container host-a" id="host<?=$this->idHospedaje?>" >
        <div class=<?=$mClassName?>>
          <div style='background-image:url(<?= $this->imagenPath?>)' class="host-img">
            <a href="hospedaje.php?hostId=<?=$this->idHospedaje?>" class="host-option" >
              <div id="view"></div>
            </a>
            <div class="host-option" id="edit"></div>
            <div class="host-option" id="trash"></div>
          </div>
          <p>$<?=$this->precioHospedaje?></p>
          <p><?=$this->nombreHospedaje?></p>
        </div>
      </div>
    <!--</a>-->
      <?php
    }

    public function printComponentView(){

      $className = $this->className;
      $mClassName = $this->className;
      ?>
      <a href="hospedaje.php?hostId=<?=$this->idHospedaje?>" class="col-3 card-container host-a">
        <div class=<?=$mClassName?>>
          <div style='background-image:url(<?= $this->imagenPath?>)'>
          </div>
          <p>$<?=$this->precioHospedaje?></p>
          <p><?=$this->nombreHospedaje?></p>
        </div>
      </a>
      <?php
    }



  }




  ?>
