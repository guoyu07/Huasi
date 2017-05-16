<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Iniciar sesion
session_start();
//Requerir conexion a Db
require_once '../DbConnection.php';
$funName = $_GET['fun'];


class ReserveEngine extends DbConnection{

  protected $userId;
  protected $corpId;
  protected $hostId;
  protected $coming;
  protected $leaving;
  protected $reserveCollection;
  protected $hostCollection;
  protected $userInfo;
  protected $connection;

  public function __construct(){
    $this->connection = $this->connectToDataBase();

  }

  public function setData(){
    $this->hostId = $_POST['hostId'];
    $this->coming = $_POST['coming'];
    $this->leaving = $_POST['leaving'];
    $this->hostNum = $_POST['hostNum'];
  }

  public function setUserId(){
    $this->userId = $_SESSION['userId'];
  }

  public function setCorpId(){
    $this->corpId = $_SESSION['corpId'];
  }

  public function selectUserInfo($idUser){

    $sql = "SELECT userName, userLastName, userId FROM Users WHERE userId = :userId";
    $records = $this->connection->prepare($sql);
    $records->bindParam(':userId', $idUser);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $this->userInfo = NULL;

    if( count($results) > 0 && isset($results) && !empty($results)){
      $this->userInfo = $results;
      $this->userInfo['userName'] = ucwords($this->userInfo['userName']);
      $this->userInfo['userLastName'] = ucwords($this->userInfo['userLastName']);
      return true;
    }else{
      return false;
    }

  }

  public function makeReserve(){
    $this->setData();
    $this->setUserId();

    $sql = "INSERT INTO Reserve (userId, hostId, reserveComing, reserveLeaving, reserveMake) VALUES (:userId, :hostId, :reserveComing, :reserveLeaving, NOW())";
    $stmt = $this->connection->prepare($sql);

    $stmt->bindParam('userId', $this->userId);
    $stmt->bindParam('hostId', $this->hostId);
    $stmt->bindParam('reserveComing', $this->coming);
    $stmt->bindParam('reserveLeaving', $this->leaving);


    if( $stmt->execute() ){
      echo 'reserve';
      return true;
    }else{
      return false;
    }
  }

  public function getUserReserves(){

    $this->setUserId();
    $sql = "SELECT * FROM Hosts INNER JOIN Reserve USING(hostId) Where userId = :userId";
    $records = $this->connection->prepare($sql);
    $records->bindParam(':userId', $this->userId);
    $records->execute();
    $results = $records->fetchAll();

    if( count($results) > 0 && isset($results) && !empty($results)){
      $this->reserveCollection = $results;
      return true;
    }else{
      return false;
    }

  }

  public function getHostReserve(){

    $this->setCorpId();
    $sql = "SELECT DISTINCT hostId, hostName, hostImagePath  FROM Hosts INNER JOIN Reserve USING(hostId) Where corpId = :corpId";
    $records = $this->connection->prepare($sql);
    $records->bindParam(':corpId', $this->corpId);
    $records->execute();
    $results = $records->fetchAll();

    if( count($results) > 0 && isset($results) && !empty($results)){
      $this->hostCollection = $results;
      return true;
    }else{
      return false;
    }

  }

  public function getCorpReserves($idHost){

    $this->setCorpId();
    $sql = "SELECT *  FROM Reserve  Where hostId = :hostId";
    $records = $this->connection->prepare($sql);
    $records->bindParam(':hostId', $idHost);
    $records->execute();
    $results = $records->fetchAll();

    if( count($results) > 0 && isset($results) && !empty($results)){
      $this->reserveCollection = $results;
      return true;
    }else{
      return false;
    }


  }


  //Metodo para imprimir todas las reservas dentro de cada host
  public function printCorpReserves(){

    foreach($this->hostCollection as $row){

      $this->getCorpReserves($row['hostId']);

      ?>
      <div class="corp-reserver">
        <div class="reserve-info">
          <img src='<?=$row['hostImagePath']?>' alt='' class='img-responsive col-3'>
          <div class="text">
            <h2 class="sect-title"><?=$row['hostName']?></h2>
            <h2 class="subtitle"><?=count($this->reserveCollection)?> Reservas</h2>
            <button type="button" name="button" class="btn btn-secondary">Mostrar todo</button>
          </div>
        </div>
        <?php
        echo "<div class = 'res-holder'>";
        echo '<div class="host-reserve-info">';
        echo "<p>Usuario</p>";
        echo "<p>Check-In</p>";
        echo "<p>Check-out</p>";
        echo "<p>Reservado</p>";
        echo "</div>";
        foreach ($this->reserveCollection as $rowRes) {
          $this->selectUserInfo($rowRes['userId']);
          ?>
          <div class="host-reserve-info">

            <p class="magic-hover"><a href="../usuario.php?userId=<?=$this->userInfo['userId']?>"><?=$this->userInfo['userName']. ' ' .$this->userInfo['userLastName'] ?></a></p>
            <p><?=$rowRes['reserveComing']?></p>
            <p><?=$rowRes['reserveLeaving']?></p>
            <p><?=$rowRes['reserveMake']?></p>
          </div>
          <?php

        }
        echo '</div>';
        echo '</div>';
      }

    }

    public function printUserReserves(){

      if(isset($this->reserveCollection) && !empty($this->reserveCollection)){

        foreach($this->reserveCollection as $row){
          ?>
          <div style="background-image:url(<?=$row['hostImagePath']?>)">
            <a href="hospedaje.php?hostId=<?=$row['hostId']?>">
              <h2 class="sec-title"><?=$row['hostName']?></h2>
              <h2 class="subtitle">$<?=$row['hostPrice']?></h2>
              <p > De <?=$row['reserveComing'].' a '.$row['reserveLeaving']?></p>
            </a>
          </div>
          <?php
        }

      }

    }



  }

  $reserveEngine = new ReserveEngine();

  function makeReserve(){
    global $reserveEngine;
    if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
      $reserveEngine->makeReserve();
    }else{
      ?>
      <div class="card-container all-middle f-colum" id="host-auth">
        <h2 class="subtitle black">Hola</h2>
        <h2 class="subtitle black">Tienes que inciar sesión para poder hacer una reserva</h2>
        <div>
          <a href="login.php">
            <button type="button" name="button" class="btn btn-submit-important">Iniciar Sesion</button>
          </a>
          <a href="register.php">
            <button type="button" name="button" class="btn btn-submit">Registrate</button>
          </a>
        </div>
      </div>

      <?php
    }

  }

  function getUserReserv(){

    global $reserveEngine;
    if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){

      if($reserveEngine->getUserReserves()){
        $reserveEngine->printUserReserves();
      }else{
        echo 'empty';
      }


    }

  }

  function getCorpReserve(){

    global $reserveEngine;
    if(isset($_SESSION['corpId']) && !empty($_SESSION['corpId'])){

      if($reserveEngine->getHostReserve()){
        $reserveEngine->printCorpReserves();
      }

    }


  }



  if($funName === 'getUserReserv'){
    getUserReserv();
  }else if($funName === 'makeReserve'){
    makeReserve();
  }else if($funName === 'getCorpReserve'){
    getCorpReserve();
  }



  ?>
