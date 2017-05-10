<?php
//Requerir el scrip de la base de datos.
session_start();
require_once 'uiElements/HospedajeCard.php'; //Requerir la clase para generar los container de los hospedajes
require_once "DbConnection.php";


//Clase para manejar todas las interacciones de las empresar con el server.
abstract class CorpEngine extends DbConnection{

  protected $corpId;
  protected $coprName;
  protected $corpMail;
  protected $corpPassword;
  protected $corpPhone;
  protected $corpAddress;
  protected $corpLogo;
  protected $corpRepre;
  protected $corpDescription;
  protected $corpFirstLogin;
  protected $connection;

  //Constructo global
  public function __construct(){

    $this->connection = $this->connectToDataBase();
    $this->corpName = $_POST['corpName'];
    $this->corpMail = $_POST['corpMail'];
    $this->corpPassword = $_POST['corpPassword'];
    $this->corpPhone = $_POST['corpPhone'];
    $this->corpAddress = $_POST['corpAddress'];
    $this->corpRepre = $_POST['corpRepre'];
    $this->corpDescription =$_POST['corpDescription'];

  }

  public function isCorpNameReady(){
    return !empty($this->corpName);
  }

  public function isCorpMailReady(){
    return !empty($this->corpMail);
  }

  public function isCorpPasswordReady(){
    return !empty($this->corpPassword);
  }

  public function isCorpPhoneReady(){
    return !empty($this->corpPhone);
  }

  public function isCorpAddressReady(){
    return !empty($this->corpAddress);
  }

  public function isCorpRepreReady(){
    return !empty($this->corpRepre);
  }

}


//clase para registrar una nueva empresa
class CorpRegister extends CorpEngine{

  public function __construct(){
    parent::__construct();
  }

  private function isRegisterFormReady(){
    return $this->isCorpNameReady() && $this->isCorpMailReady()
    && $this->isCorpPasswordReady() && $this->isCorpRepreReady();
  }

  public function setNewCorp(){

    if($this->isRegisterFormReady()){

      //Regla para incertar dentro de la base de datos
      $sql = "INSERT INTO Corps (corpName, corpMail, corpPassword, corpRepre) VALUES (:corpName, :corpMail, :corpPassword, :corpRepre)";

      //Preparar el statemen
      $stmt = $this->connection->prepare($sql);

      //Asignar los parametros
      $stmt->bindParam('corpName', $this->corpName);
      $stmt->bindParam('corpMail', $this->corpMail);
      //Enviar la contraseña con un hash
      $stmt->bindParam('corpPassword', password_hash($this->corpPassword, PASSWORD_BCRYPT ));
      $stmt->bindParam('corpRepre', $this->corpRepre);

      if( $stmt->execute() ){
        //Enviar a la pagina de la empresa
        header("Location: index.php");
        //$message = "Cuenta creada satisfactoriamente";
      }else{
        $this->errorMessage = 'Ocurrio un error al crear tu cuenta intentalo otra vez';
      }

    }

  }

}

//clase para que las empresas incien session
class CorpLogin extends CorpEngine{

  public function __construct(){
    parent::__construct();
  }

  private function isLogInFormReady(){
    return $this->isCorpMailReady() && $this->isCorpPasswordReady();
  }

  public function logCorp(){

    if($this->isLoginFormReady()){

      $records = $this->connection->prepare('SELECT corpId, corpMail, corpPassword, corpFirstLogin FROM Corps WHERE corpMail = :corpMail');
      $records->bindParam(':corpMail', $this->corpMail);
      $records->execute();
      $results = $records->fetch(PDO::FETCH_ASSOC);

      if(count($results) > 0 && password_verify($this->corpPassword, $results['corpPassword']) && $results['corpFirstLogin'] === 0 ){

        $corpId = $results['corpId'];
        $_SESSION['corpId'] = $corpId;

        header("Location: completarCorpInfo.php?=coprId=$corpId");

      }else if(count($results) > 0 && password_verify($this->corpPassword, $results['corpPassword']) && $results['corpFirstLogin']> 0){
        $corpId = $results['corpId'];
        $_SESSION['corpId'] = $corpId;
        header("Location: corp.php?corpId=$corpId");

      }else{
        $this->errorMessage = 'El correo electronico y la contraseña no coinciden. Intentalo otra vez';
        echo 'error';
      }

    }

  }

}

//Clase para completar el proceso de registro.
class CorpCompleteInfo extends CorpEngine{

  protected $secondLogin;

  public function __construct($imgPath, $idCorp){
    parent:: __construct();
    $this->corpId = $idCorp;
    $this->corpLogo = $imgPath;
    $this->secondLogin = 1;
  }

  public function isCompleteFormReady(){
    return $this->isCorpPhoneReady();
  }

  public function setCompleteInfo(){

    if($this->isCompleteFormReady()){

      //Ingresar usuario a la base de datos.
      $sql = "UPDATE Corps SET corpLogo = :corpLogo, corpPhone = :corpPhone, corpAddress = :corpAddress, corpDescription = :corpDescription, corpFirstLogin = :corpFirstLogin WHERE corpId = $this->corpId";

      //Preparar el statement
      $stmt = $this->connection->prepare($sql);

      //Guardar los parametros en la base de datos
      $stmt->bindParam('corpLogo', $this->corpLogo);
      $stmt->bindParam('corpPhone', $this->corpPhone);
      $stmt->bindParam('corpAddress', $this->corpAddress);
      $stmt->bindParam('corpDescription', $this->corpDescription);
      $stmt->bindParam('corpFirstLogin', $this->secondLogin);


      if( $stmt->execute() ){
        header("Location: corp.php?corpId=$this->corpId");
        //$message = "Cuenta creada satisfactoriamente";
      }else{
        $errorMessage = "Ocurrio algun error al crear tu cuenta";
      }
    }

  }


}


//Clase para mostrar perfiles de las empresas
class CorpDataOutput extends CorpEngine{

  public function __construct($idCorp){
    parent:: __construct();
    $this->corpId = $idCorp;

  }

  public function getData(){
    $sql = "SELECT corpId, corpName, corpLogo FROM Corps WHERE corpId = :corpId";
    $records = $this->connection->prepare($sql);
    $records->bindParam(':corpId', $this->corpId);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $this->corpProfile = NULL;

    if( count($results) > 0 && isset($results) && !empty($results)){
      $this->corpProfile = $results;
      $this->corpProfile['corpName'] = ucwords($this->corpProfile['corpName']);
      return true;
    }else{
      return false;
    }
  }

  public function getName(){
    return $this->corpProfile['corpName'];
  }

  public function outPutBasicData(){
    ?>
    <div class="corp-logo" style="background-image: url(<?=$this->corpProfile['corpLogo']?>);" id="<?=$this->corpProfile['corpId']?>"></div>
    <div class="m-border"></div>
    <h2 class="sec-title"><?=$this->corpProfile['corpName']?></h2>
    <?php
  }

  public function outPutNav(){
    ?>
    <a id="Hosts" data-value="Hosts,<?=$this->corpId?>"><div>Hospedajes</div></a>
    <a id="Coments" data-value="Coments,<?=$this->corpId?>"><div>Comentarios y evaluaciones</div></a>
    <?php
    if($this->corpId === $_SESSION['corpId']){
      echo "<a id='Reservs' data-value='Reservs,<?=$this->corpId?>'><div>Reservas</div></a>";
    }
     ?>

    <a id="Corps" data-value="Corps,<?=$this->corpId?>"><div>Informacion</div></a>


    <?php
  }

}

//Clase para editar la informacion.
class CorpEditInfo extends CorpEngine{

public function __construct(){
  parent::__construc();
}

}

class CorpEditSecurity extends CorpEngine{

  public function __construct(){
    parent::__construct();
  }

}


?>
