<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Iniciar sesion
session_start();
//Requerir conexion a Db
require_once '../DbConnection.php';


class ReserveEngine extends DbConnection{

  protected $userId;
  protected $hostId;
  protected $coming;
  protected $leaving;
  protected $reserveCollection;
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

  public function printReserves(){

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
      $reserveEngine->printReserves();
    }else{
      echo 'empty';
    }


  }

}

$funName = $_GET['fun'];

if($funName === 'getUserReserv'){
  getUserReserv();
}else if($funName === 'makeReserve'){
  makeReserve();
}



?>
