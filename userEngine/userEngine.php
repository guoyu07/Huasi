<?php

abstract class UserEngine{

  //Variables
  protected $connection;
  protected $userName;
  protected $userLastname;
  protected $userMail;
  protected $userPassword;
  protected $userDay;
  protected $userMonth;
  protected $userYear;
  public $errorMessage = "";

  //constructor
  public function __construct($dbConn) {
    //Asignar la conexion
    $this->connection = $dbConn;
    //Asginar los parametros
    $this->userName = $_POST['userName'];
    $this->userLastName = $_POST['userLastName'];
    $this->userMail = $_POST['userMail'];
    $this->userPassword = $_POST['userPassword'];
    $this->userDay = $_POST['userDay'];
    $this->userMonth = $_POST['userMonth'];
    $this->userYear = $_POST['userYear'];
  }

  public function isNameReady(){
    return !empty($this->userName);
  }

  public function isLastNameReady(){
    return !empty($this->userLastName);
  }

  public function isMailReady(){
    return !empty($this->userMail);
  }

  public function isPasswordReady(){
    return !empty($this->userPassword);
  }

  public function isDateReay(){
    return !empty($this->userDay) && !empty($this->userMonth) && !empty($this->userYear);
  }

}


class UserRegister extends UserEngine{

  public function __construct($dbConn){
    parent::__construct($dbConn);
  }

  public function isRegisterFormReady(){

    return
    $this->isNameReady() && $this->isLastNameReady() &&
    $this->isMailReady() && $this->isPasswordReady() &&
    $this->isDateReay();

  }

  public function setNewUser(){

    if($this->isRegisterFormReady()){
      //Ingresar usuario a la base de datos.
      $sql = "INSERT INTO Users (userMail, userName, userLastName ,userMonth, userDay, userYear, userPassword) VALUES (:userMail, :userName, :userLastName, :userMonth, :userDay, :userYear, :userPassword)";

      //Preparar el statement
      $stmt = $this->connection->prepare($sql);

      //Guardar los parametros en la base de datos
      $stmt->bindParam('userMail', $this->userMail);
      $stmt->bindParam('userName', $this->userName);
      $stmt->bindParam('userLastName', $this->userLastName);
      $stmt->bindParam('userMonth', $this->userMonth);
      $stmt->bindParam('userDay', $this->userDay);
      $stmt->bindParam('userYear', $this->userYear);
      //Enviar la constrseña de forma protegida.
      $stmt->bindParam('userPassword', password_hash($this->userPassword, PASSWORD_BCRYPT ));

      if( $stmt->execute() ){
        header("Location: index.php");
        //$message = "Cuenta creada satisfactoriamente";
      }else{
        $errorMessage = "Ocurrio algun error al crear tu cuenta";
      }
    }
  }

}


class UserLogin extends UserEngine{

  protected $userId;

  public function __construct($dbConn){
    parent::__construct($dbConn);
  }

  public function isLoginFormReady(){
    return $this->isMailReady() && $this->isPasswordReady();
  }

  public function logUser(){

    if($this->isLoginFormReady()){
      $records = $this->connection->prepare('SELECT userId, userMail, userPassword FROM Users WHERE userMail = :userMail');
      $records->bindParam(':userMail', $this->userMail);
      $records->execute();
      $results = $records->fetch(PDO::FETCH_ASSOC);
      $message = '';
      if(count($results) > 0 && password_verify($this->userPassword, $results['userPassword']) ){
        $_SESSION['userId'] = $results['userId'];
        header("Location: /");
      }else{
        $message = 'Lo sentimos, esas credenciales no coinciden';
      }
    }
  }

}


class UserInfoUpdate extends UserEngine{

  protected $userId;

  public function __construct($dbConn, $id){
    parent::__construct($dbConn);
    $this->userId = $id;
  }

  public function isUpdateFormReady(){
    return
    $this->isNameReady() && $this->isLastNameReady() &&
    $this->isMailReady() && $this->isDateReay();
  }

  public function updateUserInfo(){

    if($this->isUpdateFormReady()){
      //Ingresar usuario a la base de datos.
      $sql = "UPDATE Users SET userName = :userName, userLastName = :userLastName, userMail = :userMail, userMonth = :userMonth, userDay = :userDay, userYear = :userYear WHERE userId = $this->userId";

      //Preparar el statement
      $stmt = $this->connection->prepare($sql);

      //Guardar los parametros en la base de datos
      $stmt->bindParam('userMail', $this->userMail);
      $stmt->bindParam('userName', $this->userName);
      $stmt->bindParam('userLastName', $this->userLastName);
      $stmt->bindParam('userMonth', $this->userMonth);
      $stmt->bindParam('userDay', $this->userDay);
      $stmt->bindParam('userYear', $this->userYear);

      if( $stmt->execute() ){
        header("Location: usuario.php");
        //$message = "Cuenta creada satisfactoriamente";
      }else{
        $errorMessage = "No se pudo actualizar la información.";
      }
    }

  }

}

class UserSecurityUpdate extends UserEngine{

  public function __construct($dbConn){
    parent::__construct($dbConn);
  }

}





?>
