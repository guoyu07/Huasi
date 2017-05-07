<?php

//Clase base para generar comentarios

class ComentsBase{

  protected $userName;
  protected $userId;
  protected $userImagePath;
  protected $comentText;


  public function setName($name){
    $this->userName = $name;
  }

  public function setImage($path){
    $this->userImagePath = $path;
  }

  public function setText($text){
    $this->comentText = $text;
  }

  public function setAnchor($id){
    $this->userId = $id;
  }

  public function printComent(){
    ?>
    <div class="host-coment">
      <div class="flex f-row">
        <img src="<?=$this->userImagePath?>" alt="">
        <div class="coment-user">
          <h2 class="subtitle"><a href="usuario.php?userId=<?=$this->userId?>"><?=$this->userName?></a></h2>
          <p>Marzo de 2017</p>
        </div>
      </div>
      <p class="margin-left"><?=$this->comentText?></p>
    </div>
    <?php
  }

}

?>
