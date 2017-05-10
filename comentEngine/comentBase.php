<?php

//Clase base para generar comentarios

class ComentsBase{

  protected $userName;
  protected $hostName;
  protected $userId;
  protected $hostId;
  protected $userImagePath;
  protected $comentText;
  protected $comentDate;


  public function setHostName($name){
    $this->hostName = $name;
  }

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

  public function setDate($date){
    $this->comentDate = $date;
  }

  public function setHostAnchor($id){
    $this->hostId = $id;
  }

  public function printComent(){
    ?>
    <div class="host-coment">
      <div class="flex f-row">
        <img src="<?=$this->userImagePath?>" alt="">
        <div class="coment-user">
          <h2 class="subtitle"><a href="usuario.php?userId=<?=$this->userId?>"><?=$this->userName?></a></h2>
          <p><?=$this->comentDate?></p>
        </div>
      </div>
      <p class="margin-left"><?=$this->comentText?></p>
    </div>
    <?php
  }

  public function printCorpComent(){
    ?>
    <div class="corp-coment">
      <div class="flex f-row">
        <div class="coment-user">
          <h2 class="subtitle"><a href="usuario.php?userId=<?=$this->userId?>"><?=$this->userName?></a></h2>
          <h2 class="subtitle"><a href="hospedaje.php?hostId=<?=$this->hostId?>"><?=$this->hostName?></a></h2>
          <p><?=$this->comentDate?></p>
        </div>
      </div>
      <p class="margin-left"><?=$this->comentText?></p>
    </div>
    <?php
  }

}

?>
