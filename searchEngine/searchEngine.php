<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Iniciar sesion
session_start();
//Requerir conexion a Db
require_once '../DbConnection.php';

$funName = $_GET['fun'];


class searchEngine extends DbConnection{

protected $coming;
protected $leaving;
protected $hostNum;
protected $hostType;
protected $connection;

public function __construct(){

  $this->connection = $this->connectToDataBase();
  $this->coming = $_POST['coming'];
  $this->leaving = $_POST['leaving'];
  $this->hostNum = $_POST['hostNum'];

}

public function checkHostType(){

  if(isset($_POST['hostType']) && !empty($_POST['hostType'])){
    $this->hostType = $_POST['hostType'];
    return true;
  }else{
    return false;
  }

}

public function search(){

  $sql = "SELECT * FROM Hosts WHERE userId = :userId  AND hostId = :hostId";

  $records = $this->connection->prepare($sql);
  $records->bindParam(':userId', $this->userId);
  $records->bindParam(':hostId', $this->hostId);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  if( count($results) > 0 && isset($results) && !empty($results)){
    return true;
  }else{
    return false;
  }

  echo "\n".$this->coming;
  echo "\n".$this->leaving;
  echo "\n".$this->hostNum;



}


}

function search(){

}

function updateSearch(){

}


if($funName === 'updateSearch'){
  $test = new SearchEngine();
  $test->checkHostType();
  $test->search();
  echo 'server status: ok';
}




 ?>
