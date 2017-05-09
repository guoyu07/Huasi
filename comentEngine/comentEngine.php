<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
//Requerir clase para conetar a base de datos
require_once '../DbConnection.php';
require_once 'comentBase.php';

//Requerir datos
$funName = $_GET['fun'];
$hostId = $_POST['hostId'];

//Clase para manejar comentarios
class comentEngine extends DbConnection{

  protected $hostId;
  protected $userId;
  protected $comentText;
  protected $userInfo;
  protected $comentInfo;
  protected $comentCounter;
  protected $comentsCollection;
  protected $connection;


  public function __construct($idHost, $coment = NULL){

    $this->connection = $this->connectToDataBase();
    $this->hostId = $idHost;
    $this->comentText = $coment;

  }

  public function getCurrentUserId(){
    $this->userId = $_SESSION['userId'];
  }

  public function saveComent(){

    $this->getCurrentUserId();
    $sql = "INSERT INTO Coments (hostId, userId, comentText, comentDate) VALUES (:hostId, :userId, :comentText, NOW())";
    $stmt = $this->connection->prepare($sql);

    $stmt->bindParam('hostId', $this->hostId);
    $stmt->bindParam('userId', $this->userId);
    $stmt->bindParam('comentText', $this->comentText);
    //$stmt->bindParam('comentDate', );

    if( $stmt->execute() ){
      return true;
    }else{
      echo "error";
      return false;
    }

  }

  public function selectUserInfo($idUser){

    $sql = "SELECT userName, userLastName, userImagePath FROM Users WHERE userId = :userId";
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

  public function showComent(){

    $this->getCurrentUserId();
    $this->selectUserInfo($this->userId);
    $name = $this->userInfo['userName'].' '.$this->userInfo['userLastName'];
    $newComent = new ComentsBase();
    $newComent->setName($name);
    $newComent->setImage($this->userInfo['userImagePath']);
    $newComent->setText($this->comentText);
    $newComent->printComent();

  }

  public function selectComents(){

    $sql = "SELECT userId, comentText FROM Coments WHERE hostId = :hostId ORDER BY comentDate ASC ";
    $records = $this->connection->prepare($sql);
    $records->bindParam(':hostId', $this->hostId);
    $records->execute();
    $results = $records->fetchAll();
    $this->comentsCollection = NULL;

    if( count($results) > 0 && isset($results) && !empty($results)){

      $this->comentsCollection = $results;
      $this->comentCounter = count($this->comentsCollection);
      return true;
    }else{
      return false;
    }

  }

  public function printComents(){

    foreach($this->comentsCollection as $row){
      $this->selectUserInfo($row['userId']);
      $name = $this->userInfo['userName'].' '.$this->userInfo['userLastName'];
      $newComent = new ComentsBase();
      $newComent->setName($name);
      $newComent->setImage($this->userInfo['userImagePath']);
      $newComent->setAnchor($row['userId']);
      $newComent->setText($row['comentText']);
      $newComent->printComent();
    }

  }

  public function getComentNumber(){

    if($this->selectComents()){
      $this->comentCounter = 0;
      foreach($this->comentsCollection as $row){
        $this->comentCounter ++;
      }
      echo $this->comentCounter;
    }

  }


}

function makeComent(){
  $comentText = $_POST['comentText'];
  global  $hostId;
  //verifcar que los datos esten listos.
  if(isset($comentText) && !empty($comentText) && isset($hostId) && !empty($hostId)){
    $comentEngine = new ComentEngine($hostId, $comentText);
    if($comentEngine->saveComent()){
      $comentEngine->showComent();
    }
  }else{
    echo 'empty';
  }

}

function getComentNum(){
  global $hostId;
  $comentEngine = new ComentEngine($hostId);
  $comentEngine->getComentNumber();
}



if($funName === 'makeComent'){
  makeComent();
}else if($funName === 'displayComents'){
  $comentEngine = new ComentEngine($hostId);
  if($comentEngine->selectComents()){
    //Mostrar los comentarios
    $comentEngine->printComents();
  }else{
    //Mostrar mensaje de info
    $html = '<div class = "all-middle f-colum" id="coments-empty">';
    $html .= "<img src = 'img/svg/icons/coments.svg'/>";
    $html .= '<h2 class = "subtitle">Este Hotel aun no tiene comentarios ni evaluaciones</h2>';
    $html.= '<p>Buscas una buena experiencia, mira lo que dicen otros usuarios</p>';
    $html .= '</div>';
    echo $html;
  }
}else if($funName === 'getComentNum'){
  getComentNum();
}




?>
