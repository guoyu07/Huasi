<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
//Elimnar un hospedaje verificando por contraseña
session_start();
require_once '../DbConnection.php';


$funName = $_GET['func'];
$hostId = $_POST['hostId'];

class CheckPassword extends DbConnection{

  protected $connection;
  protected $corpId;
  protected $corpPassword;

  public function __construct($id, $password){
    $this->connection = $this->connectToDataBase();
    $this->corpId = $id;
    $this->corpPassword = $password;
  }

  public function auth(){
    $sql = "SELECT corpPassword FROM Corps WHERE corpId = $this->corpId ";
    $records = $this->connection->prepare($sql);
    $records->bindParam('corpPassword', $this->userPassword);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if(count($results) > 0 && password_verify($this->corpPassword, $results['corpPassword']) ){
      //echo "la contraseña es correcta";
      return true;

    }else{
      //echo "la contraseña es falsa";
      return false;

    }
  }

}


function loadData(){
  global $hostId;

  ?>
  <div class="card-container col-4">
    <form class="form security-form">
      <div id="authError"></div>
      <label>Introduce tu Contraseña</label>
      <input type="password" name="corpPassword" value="">
      <button type="submit" name="button" class="btn btn-submit-important" id="<?=$hostId?>">Eliminar</button>
    </form>
  </div>
  <?php
}

function hostDelete(){

  global $hostId;
  $corpPassword = $_POST['corpPassword'];
  $corpId = $_SESSION['corpId'];

  if(isset($corpPassword) && !empty($corpPassword) && isset($corpId)){

    $auth = new CheckPassword($corpId, $corpPassword);
    if($auth->auth()){
      $conn = new DbConnection();
      //Seleccionar hospedaje y verificar si existe.
       $sql = "SELECT hostName FROM Hosts WHERE hostId = $hostId";
       $records = $conn->connectToDataBase()->prepare($sql);
       //$records->bindParam('corpPassword', $this->userPassword);
       $records->execute();
       $results = $records->fetch(PDO::FETCH_ASSOC);

       //Si el hospedaje existe, mostrar nombre y eliminar fila.
       if($results > 0){
         ?>
         <h1 class="subtitle">Hospedaje <?=$results['hostName']?> Eliminado </h1>
         <?php

          $sql = "DELETE FROM Hosts WHERE hostId = $hostId";
          $conn->connectToDataBase()->exec($sql);

       }

    }else{
      echo 'false';
    }

  }else{
    echo 'empty';
  }

}

if($funName === 'load'){
  loadData();
}else if($funName === 'delete'){
  hostDelete();
}





//function


 ?>
