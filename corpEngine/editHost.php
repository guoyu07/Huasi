<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require_once '../DbConnection.php';


$funName = $_GET['func'];
$hostId = $_POST['hostId'];

//clase para mostrar la info del host
class HostInfo extends DbConnection{

  protected $hostId;
  protected $connection;
  public $data;

  public function __construct($id){
    $this->hostId = $id;
    $this->connection = $this->connectToDataBase();
  }

  public function hostExists(){

    $sql = "SELECT hostId FROM Hosts WHERE hostId = :hostId";

    $records = $this->connection->prepare($sql);
    $records->bindParam(':hostId', $this->hostId);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $this->data = NULL;

    if( count($results) > 0){
      return true;
    }else{

      return false;
    }

  }

  public function getInfo(){

    $sql = "SELECT hostId, hostName, hostType,hostNum, hostAddress, hostZone, hostPrice,
    hostDescription FROM Hosts WHERE hostId = :hostId";

    $records = $this->connection->prepare($sql);
    $records->bindParam(':hostId', $this->hostId);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $this->data = NULL;

    if( count($results) > 0){
      $this->data = $results;
      return true;
    }else{

      return false;
    }

  }

  public function editInfo(){


    $hostName = $_POST['hostName'];
    $hostType = $_POST['hostType'];
    $hostNum  = $_POST['hostNum'];
    $hostAddress = $_POST['hostAddress'];
    $hostZone = $_POST['hostZone'];
    $hostPrice = $_POST['hostPrice'];
    $hostDescription = $_POST['hostDescription'];


    $sql = "UPDATE Hosts SET hostName = :hostName, hostType = :hostType, hostNum = :hostNum,
    hostAddress = :hostAddress, hostZone = :hostZone, hostPrice = :hostPrice, hostDescription = :hostDescription  WHERE hostId = $this->hostId";

    //Preparar el statement
    $stmt = $this->connection->prepare($sql);

    //Guardar los parametros en la base de datos
    $stmt->bindParam('hostName', $hostName);
    $stmt->bindParam('hostType', $hostType);
    $stmt->bindParam('hostNum', $hostNum);
    $stmt->bindParam('hostAddress', $hostAddress);
    $stmt->bindParam('hostZone', $hostZone);
    $stmt->bindParam('hostPrice', $hostPrice);
    $stmt->bindParam('hostDescription', $hostDescription);

    if( $stmt->execute() ){
      echo $hostPrice.','.$hostName;
    }else{
      echo "false";
    }

  }
}

$hostInfo = new HostInfo($hostId);

function load(){

  global $hostInfo;

  if($hostInfo->hostExists()){
    $hostInfo->getInfo();
  ?>
  <div class="card-container col-6">

    <form class="form security-form">
      <label>Nombre del hospedaje</label>
      <input type="text" name="hostName" value="<?=$hostInfo->data['hostName']?>">
      <label>Tipo de hospedaje</label>
      <input type="text" name="hostType" value="<?=$hostInfo->data['hostType']?>">
      <label>Capacidad</label>
      <input type="text" name="hostNum" value="<?=$hostInfo->data['hostNum']?>">
      <label>Dirección</label>
      <input type="text" name="hostAddress" value="<?=$hostInfo->data['hostAddress']?>">
      <label>Zona</label>
      <input type="text" name="hostZone" value="<?=$hostInfo->data['hostZone']?>">
      <label>Precio por noche</label>
      <input type="text" name="hostPrice" value="<?=$hostInfo->data['hostPrice']?>">
      <label>Descripción</label>
      <textarea name="hostDescription" maxlength="240" placeholder="Dilo en 240 caracteres." rows="3"><?=$hostInfo->data['hostDescription']?></textarea>
      <button type="submit" name="button" class="btn btn-submit" id="<?=$hostInfo->data['hostId']?>">Guardar</button>
    </form>

  </div>
  <?php
  }
}

function edit(){

  global $hostInfo, $hostId;

  if($hostInfo->hostExists()){
    $hostInfo->editInfo();
  }


}

if($funName === 'load'){
  load();
}else if($funName === 'edit'){
  edit();
}


?>
