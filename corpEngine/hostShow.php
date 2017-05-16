<?php
//Iniciar sesion
session_start();
//Requerir conexion a Db
require_once '../DbConnection.php';
require_once '../uiElements/HospedajeCard.php'; //Requerir la clase para generar los container de los hospedajes

ini_set('display_errors', 1); //Mostrar todo tipo de errores
error_reporting(E_ALL);
$funName = $_GET['fun'];

class HostShowEngine extends DbConnection{

  protected $hostPrice;
  protected $connection;
  protected $hostCollection;

  public function __construct(){
    $this->connection = $this->connectToDataBase();
  }

  public function getCuratedHost(){

    $sql = "SELECT DISTINCT hostId, hostName, hostImagePath, hostPrice FROM Hosts  LIMIT 4";
    $records = $this->connection->prepare($sql);
    $records->execute();
    $results = $records->fetchAll();

    if( count($results) > 0 && isset($results) && !empty($results)){
      $this->hostCollection = $results;
      return true;
    }else{
      return false;
    }

  }


  public function getRecentHosts(){

    $sql = "SELECT DISTINCT hostId, hostName, hostImagePath, hostPrice FROM Hosts  LIMIT 8";
    $records = $this->connection->prepare($sql);
    $records->execute();
    $results = $records->fetchAll();

    if( count($results) > 0 && isset($results) && !empty($results)){
      $this->hostCollection = $results;
      return true;
    }else{
      return false;
    }

  }

  public function printCurated(){

    foreach ($this->hostCollection as $row) {

      $host = new HospedajeVip($row['hostId']);
      $host->setNombre($row['hostName']);
      $host->setPrecio($row['hostPrice']);
      $host->setImagePath($row['hostImagePath']);
      $host->printComponent();

    }

  }

  public function printRecent(){

    foreach ($this->hostCollection as $row) {

      $host = new HospedajeDeal($row['hostId']);
      $host->setNombre($row['hostName']);
      $host->setPrecio($row['hostPrice']);
      $host->setImagePath($row['hostImagePath']);
      $host->printComponent();

    }

  }


}

$showEngine = new HostShowEngine();

function getCurated(){
  global $showEngine;
  $showEngine->getCuratedHost();
  $showEngine->printCurated();
}


function getRecent(){
  global $showEngine;
  $showEngine->getRecentHosts();
  $showEngine->printRecent();
}

if($funName === 'getCurated'){
    getCurated();
}else if ($funName === 'getRecent') {
  getRecent();
}



?>
