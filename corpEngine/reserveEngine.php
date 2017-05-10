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

$funName = $_GET['fun'];

if($funName === 'getUserReserv'){
  echo "reservas";
}else if($funName === 'makeReserve'){
  makeReserve();
}



 ?>
