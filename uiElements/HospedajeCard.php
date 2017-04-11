<?php

abstract class HospedajeBase{

  protected $idHospedaje;
  protected $nombreHospedaje = "";
  protected $precioHospedaje = 0;
  protected $imagenPath = "";


  function __construct($mHospedajeId){
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

  public function printComponent(){
    $mIdHospedaje = $this->idHospedaje;
    $mNombreHospedaje = $this->nombreHospedaje;
    $mPrecioHospedaje = $this->precioHospedaje;
    $mImagen = $this->imagenPath;
  }

}


class HospedajeDeal extends HospedajeBase{

  function __construct($mHospedajeId){
    parent::__construct(); // Llamar al constructor de la clase heredada
  }

  public function printComponent(){
    parent::__construct(); //Llamar a la fucnion de la clase heredad.
    ?>
    <a href="hospedaje.php?hostID=<?=$mIdHospedaje?>" class="col-3">
      <div class="deal-host">
        <div>
          <?php echo file_get_contents($mImagen);?>
        </div>
        <div class="margin-left">
          <p><?=$mNombreHospedaje?></p>
          <div class="v-middle">
            <p class="middle-line"><?=$mPrecioHospedaje?></p>
            <p><?=$mPrecioHospedaje?></p>
          </div>
        </div>
      </div>
    </a>
    <?php
  }

}

abstract class HospedajeConImagen extends HospedajeBase{

  function __construct($mHospedajeId){
    parent::__construct(); //Llamar al constructor de la clase heredada.
  }

  public function printComponent($rClassName){

    parent::__construct(); //Llamar a la fucnion de la clase heredad.
    $this->className = $rClassName;
    $mClassName = $this->className;
    //<a href='cancion.php?albmID=$albmID&artID=$artID'>";
    ?>
    <a href="hospedaje.php?hostID=<?=$mIdHospedaje?>" class="col-3 card-container">
      <div class=<?=$mClassName?>>
        <div style='background-image:url(<?=$mImagen?>)'></div>
        <p><?=$mPrecioHospedaje?></p>
        <p>$<?=$mNombreHospedaje?></p>
      </div>
    </a>
    <?php
  }

}

class HospedajeVip extends HospedajeConImagen{

  protected $className = "vp-host";

  function __construct($mHospedajeId){
    parent::__construct(); // Llamar al constructor de la clase heredada
  }

  public function printComponent(){
    parent::printComponent($this->className); //llamar a la funcion de la clase heredada.
  }

}

class HospedajeSearch extends HospedajeConImagen{

  protected $className = "host";

  function __construct($mHospedajeId){
    parent::__construct($this->className); // Llamar al constructor de la clase heredada
  }

  public function printComponent(){
    parent::printComponent($this->className); //llamar a la funcion de la clase heredada.
  }

}




?>
