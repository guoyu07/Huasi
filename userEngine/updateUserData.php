<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

//Iniciar sesion
session_start();
//Requerir conexion a Db
require_once '../DbConnection.php';
require_once '../imgEngine/ImgEngineAsync.php';

$funName = $_GET['fun'];

class UpdateUserInfo extends DbConnection{

  protected $userId;
  protected $newImage;
  protected $newDescription;
  protected $connection;

  public function __construct(){

    $this->connection = $this->connectToDataBase();
    $this->userId = $_SESSION['userId'];
  }

  public function updateImage($imgPath){

    $this->newImage = $imgPath;
    $sql = "UPDATE Users SET userImagePath = :userImagePath WHERE userId = $this->userId";

    //Preparar el statement
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam('userImagePath', $this->newImage);


    if( $stmt->execute() ){
      return true;
    }else{
      return false;
    }
  }

  public function updateDescription($description){

    $this->newDescription = $description;
    $sql = "UPDATE Users SET userDescription = :userDescription WHERE userId = $this->userId";

    //Preparar el statement
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam('userDescription', $this->newDescription);


    if( $stmt->execute() ){
      return true;
    }else{
      return false;
    }
  }

}

$UpdateInfo = new UpdateUserInfo();

function updateImage(){

  global $UpdateInfo;

  if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){

    $newImage = $_FILES['userImagePath'];
    $saveUserImg = new ImgEngineAsync($newImage);
    $saveUserImg->saveImage('user');
    //Retornar la ubicacion de la imagen para guardar en DB
    $imgPath = $saveUserImg->getImagePath();
    if($UpdateInfo->updateImage($imgPath)){
      echo $imgPath;
    }


  }

}

function updateDescription(){
  global $UpdateInfo;
  $newDes = $_POST['userDescription'];
  if($UpdateInfo->updateDescription($newDes)){
    echo 'update';
  }else{
    echo 'eror';
  }
}

if($funName === 'updateImage'){

  updateImage();

}else if($funName === 'updateDescription'){
  updateDescription();
}










?>
