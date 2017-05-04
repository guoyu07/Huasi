<?php

//Clase para manejar los servicios de los Hospedajes

abstract class HostEngine extends DbConnection{

  protected $connection;

  protected $hostId;
  protected $hostName;
  protected $hostImagePath;
  protected $hostDescription;
  protected $hostType;
  protected $hostNum;
  protected $hostAddress;
  protected $hostZone;
  protected $hostPrice;
  public   $corpId;

  //Constructor general.
  public function __construct(){

    $this->connection = $this->connectToDataBase();
    $this->hostName = $_POST['hostName'];
    $this->hostType = $_POST['hostType'];
    $this->hostNum = $_POST['hostNum'];
    $this->hostAddress = $_POST['hostAddress'];
    $this->hostZone = $_POST['hostZone'];
    $this->hostPrice = $_POST['hostPrice'];
    $this->hostDescription = $_POST['hostDescription'];
  }


}

class UploadHost extends HostEngine{

  public function __construct($idCorp, $imgPath){
    parent::__construct();
    $this->corpId = $idCorp;
    $this->hostImagePath = $imgPath;
  }

  public function isCreateFormReady(){
    return !empty($this->hostName);
  }

  public function getId(){
    echo $this->corpId = $this->corpId * 1 ;
  }

  //Funcion para guardar al nuevo host en la db
  public function loadNewHost($idCorp){

    //if($this->isCreateFormReady()){

      $sql = "INSERT INTO Hosts (corpId, hostName, hostType, hostNum, hostAddress, hostZone, hostPrice, hostImagePath, hostDescription) VALUES(:corpId, :hostName, :hostType, :hostNum, :hostAddress, :hostZone, :hostPrice, :hostImagePath, :hostDescription)";
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam('corpId', $idCorp);
      $stmt->bindParam('hostName', $this->hostName);
      $stmt->bindParam('hostType', $this->hostType);
      $stmt->bindParam('hostNum', $this->hostNum);
      $stmt->bindParam('hostAddress', $this->hostAddress);
      $stmt->bindParam('hostZone', $this->hostZone);
      $stmt->bindParam('hostPrice', $this->hostPrice);
      $stmt->bindParam('hostImagePath', $this->hostImagePath);
      $stmt->bindParam('hostDescription', $this->hostDescription);

      if( $stmt->execute() ){
        header("Location: corp.php?corpId=$this->corpId");
        //$message = "Cuenta creada satisfactoriamente";
      }else{
        echo "no";
        $this->errorMessage = 'Ocurrio un error al crear tu cuenta intentalo otra vez';
      }
    //}

  }

}

class HostaDataOutput extends HostEngine{

  protected $hostProfile;

  public function __construct($idHost){
    parent::__construct();
    $this->hostId = $idHost;
  }

  public function getData(){

    $sql = "SELECT hostName, hostImagePath, hostDescription, hostAddress, hostPrice FROM Hosts WHERE hostId = :hostId";
    $records = $this->connection->prepare($sql);
    $records->bindParam(':hostId', $this->hostId);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $this->hostProfile = NULL;

    if( count($results) > 0){
      $this->hostProfile = $results;
    }else{
      echo "no";
    }

  }

  public function outPutHostName(){

    ?>
      <h2 class="sec-title"><?=$this->hostProfile['hostName']?></h2>
    <?php

  }

  public function outPutHostPrice(){

    ?>
      <h2><span class="big">$<?=$this->hostProfile['hostPrice']?></span> por Noche</h2>
    <?php

  }

  public function outPutHostDescription(){
    echo $this->hostProfile['hostDescription'];
    ?>
    <p class="margin-bottom"><?=$this->hostProfile['hostDescription']?></p>
    <?php

  }

  public function outPutHostAddress(){

    ?>
      <p><?=$this->hostProfile['hostAddress']?></p>
    <?php

  }

  public function outPutHostImages(){

    ?>
      <img src= "<?=$this->hostProfile['hostImagePath']?>"alt="host" class="img-responsive">
    <?php

  }

}



 ?>
