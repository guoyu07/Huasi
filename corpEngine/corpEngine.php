<?php
//Requerir el scrip de la base de datos.
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

        header("Location: corp.php?corpId=$corpId");

      }else if(count($results) > 0 && password_verify($this->corpPassword, $results['corpPassword']) && $results['corpFirstLogin']> 0){
        $_SESSION['corpId'] = $results['corpId'];
        header('Location: corp.php?corpId=$results["corpId"]');

      }else{
        $this->errorMessage = 'El correo electronico y la contraseña no coinciden. Intentalo otra vez';
        echo 'error';
      }

    }

  }

}

//Clase para completar el proceso de registro.
/*class CorpCompleteInfo extends CorpEngine{

public function __construct(){
parent::__construc();
}

}

//Clase para editar la informacion.
class CorpEditInfo extends CorpEngine{

public function __construct(){
parent::__construc();
}

}*/



?>
