<?php

/*ini_set('display_errors', 1);
error_reporting(E_ALL);*/

//Iniciar sesion
session_start();
//Requerir conexion a Db
require_once '../DbConnection.php';
require_once '../uiElements/HospedajeCard.php';

$funName = $_GET['fun'];


class searchEngine extends DbConnection{

  protected $coming;
  protected $leaving;
  protected $hostNum;
  protected $hostType;
  protected $connection;
  protected $hostCollection;

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

  public function searchSemi(){

    $sql = "SELECT * FROM Hosts WHERE hostNum = :hostNum";

    $records = $this->connection->prepare($sql);
    $records->bindParam(':hostNum', $this->hostNum);
    $records->execute();
    $results = $records->fetchAll();

    if( count($results) > 0 && isset($results) && !empty($results)){
      $this->hostCollection = $results;
      //print_r($this->hostCollection);

      return true;
    }else{
      return false;
    }

  }

  public function searchFull(){

    $sql = "SELECT * FROM Hosts WHERE hostNum = :hostNum  AND hostType = :hostType";

    $records = $this->connection->prepare($sql);
    $records->bindParam(':hostNum', $this->hostNum);
    $records->bindParam(':hostType', $this->hostType);
    $records->execute();
    $results = $records->fetchAll();

    if( count($results) > 0 && isset($results) && !empty($results)){
      $this->hostCollection = $results;
      //print_r($this->hostCollection);

      return true;
    }else{
      return false;
    }

  }

  public function printResults(){

    if(isset($this->hostCollection) && !empty($this->hostCollection)){

      foreach($this->hostCollection as $row){
        $host = new HospedajeSearch($row['hostId']);
        $host->setNombre($row['hostName']);
        $host->setPrecio($row['hostPrice']);
        $host->setImagePath($row['hostImagePath']);
        $host->printComponent();
      }

    }else{

      ?>

      <div class="card-container all-middle f-colum col-12" id="search-empty">
        <img src="img/svg/icons/hostEmpty.svg" alt="">
        <h2 class="subtitle">No existen coincidencias con esas opciones</h2>
        <h2 class="subtitle">Intentalo otra vez</h2>
      </div>

      <?php

    }




  }


}

function search(){

  $search = new SearchEngine();
  if($search->checkHostType()){
    $search->searchFull();
    $search->printResults();
  }else{
    $search->searchSemi();
    $search->printResults();
  }

}




if($funName === 'updateSearch'){
  search();
}




?>
