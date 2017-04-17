<?php

abstract class UserEngine extends DbConnection{

  //Variables
  protected $connection;
  protected $userId;
  protected $userName;
  protected $userLastname;
  protected $userMail;
  protected $userPassword;
  protected $userDay;
  protected $userMonth;
  protected $userYear;
  protected $userImagePath;
  protected $userPhoneNumber;
  protected $userCountry;
  protected $userCity;
  protected $userSex;
  protected $userDescription;
  protected $userFirstLogin;
  protected $errorMessage;

  //constructor
  public function __construct() {
    //Asignar la conexion
    $this->connection = $this->connectToDataBase();
    //Asginar los parametros
    $this->userName = $_POST['userName'];
    $this->userLastName = $_POST['userLastName'];
    $this->userMail = $_POST['userMail'];
    $this->userPassword = $_POST['userPassword'];
    $this->userDay = $_POST['userDay'];
    $this->userMonth = $_POST['userMonth'];
    $this->userYear = $_POST['userYear'];
    $this->userPhoneNumber = $_POST['userPhoneNumber'];
    $this->userCountry = $_POST['userCountry'];
    $this->userCity = $_POST['userCity'];
    $this->userSex = $_POST['userSex'];
    $this->userDescription = $_POST['userDescription'];
    $this->errorMessage = '';
  }

  //Mostrar el error
  public function getErrorMessage(){
    return $this->errorMessage;
  }

  public function transferStatus($bool){
    return $bool;
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

  public function isImagePathReady(){
    return !empty($this->userImagePath);
  }

  public function isUserPhoneNumberReady(){
    return !empty($this->userPhoneNumber);
  }

  public function isUserSexReady(){
    return !empty($this->userSex);
  }

  public function isUserDescriptionReady(){
    return !empty($this->userDescription);
  }

  public function isUserFirstLogin(){
    return $this->userFirstLogin === 0;
  }


}


class UserRegister extends UserEngine{

  public function __construct(){
    parent::__construct();
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
      $stmt->bindParam('userName', strtolower($this->userName));
      $stmt->bindParam('userLastName', strtolower($this->userLastName));
      $stmt->bindParam('userMonth', $this->userMonth);
      $stmt->bindParam('userDay', $this->userDay);
      $stmt->bindParam('userYear', $this->userYear);
      //Enviar la constrseña de forma protegida.
      $stmt->bindParam('userPassword', password_hash($this->userPassword, PASSWORD_BCRYPT ));

      if( $stmt->execute() ){
        header("Location: index.php");
        //$message = "Cuenta creada satisfactoriamente";
      }else{
        $this->errorMessage = 'El correo electronico y la contraseña no coinciden. Intentalo otra vez';
      }
    }
  }

}


class UserLogin extends UserEngine{

  public function __construct(){
    parent::__construct();
  }

  public function isLoginFormReady(){
    return $this->isMailReady() && $this->isPasswordReady();
  }

  public function logUser(){

    if($this->isLoginFormReady()){
      $records = $this->connection->prepare('SELECT userId, userMail, userPassword, userFirstLogin FROM Users WHERE userMail = :userMail');
      $records->bindParam(':userMail', $this->userMail);
      $records->execute();
      $results = $records->fetch(PDO::FETCH_ASSOC);
      if(count($results) > 0 && password_verify($this->userPassword, $results['userPassword']) && $results['userFirstLogin'] === 0 ){
        $_SESSION['userId'] = $results['userId'];
        header("Location: /completarInfoUser.php");

      }else if(count($results) > 0 && password_verify($this->userPassword, $results['userPassword']) && $results['userFirstLogin']> 0){
        $_SESSION['userId'] = $results['userId'];
        header("Location: /");
      }else{
        $this->errorMessage = 'El correo electronico y la contraseña no coinciden. Intentalo otra vez';
      }
    }
  }

}


class userCompleteInfo extends UserEngine{

  protected $secondLogin;

  public function __construct($imgPath, $idUser){
    parent:: __construct();
    $this->userId = $idUser;
    $this->userImagePath = $imgPath;
    $this->secondLogin = 1;
  }

  public function isCompleteFormReady(){
    return $this->isUserPhoneNumberReady() &&
    $this->isUserSexReady() && $this->isUserDescriptionReady();
  }

  public function setCompleteInfo(){

    if($this->isCompleteFormReady()){

      //Ingresar usuario a la base de datos.
      $sql = "UPDATE Users SET userSex = :userSex, userCountry = :userCountry, userCity = :userCity, userDescription = :userDescription, userPhoneNumber = :userPhoneNumber, userImagePath = :userImagePath, userFirstLogin = :userFirstLogin WHERE userId = $this->userId";

      //Preparar el statement
      $stmt = $this->connection->prepare($sql);

      //Guardar los parametros en la base de datos

      $stmt->bindParam('userSex', $this->userSex);
      $stmt->bindParam('userDescription', $this->userDescription);
      $stmt->bindParam('userPhoneNumber', $this->userPhoneNumber);
      $stmt->bindParam('userCountry', $this->userCountry);
      $stmt->bindParam('userCity', $this->userCity);
      $stmt->bindParam('userImagePath', $this->userImagePath);
      $stmt->bindParam('userFirstLogin', $this->secondLogin);

      if( $stmt->execute() ){
        header("Location: usuario.php?userId=$this->userId");
        //$message = "Cuenta creada satisfactoriamente";
      }else{
        $errorMessage = "Ocurrio algun error al crear tu cuenta";
      }
    }

  }




}


class UserInfoUpdate extends UserEngine{


  public function __construct($id){
    parent::__construct();
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
      $stmt->bindParam('userName', strtolower($this->userName));
      $stmt->bindParam('userLastName', strtolower($this->userLastName));
      $stmt->bindParam('userMonth', $this->userMonth);
      $stmt->bindParam('userDay', $this->userDay);
      $stmt->bindParam('userYear', $this->userYear);

      if( $stmt->execute() ){
        header("Location: usuario.php?userId=$this->userId&updateInfo=true");
        //$message = "Cuenta creada satisfactoriamente";
      }else{
        $errorMessage = "No se pudo actualizar la información.";
      }
    }

  }

}

class UserSecurityUpdate extends UserEngine{

  protected $userNewPassword;

  public function __construct($id){
    parent::__construct();
    $this->userId = $id;
    $this->userNewPassword = $_POST['userNewPassword'];
  }

  public function isNewPasswordReady(){
    return !empty($this->userNewPassword);
  }

  public function isSecurityUpdateFormReady(){
    return $this->isPasswordReady() && $this->isNewPasswordReady();
  }

  public function checkPassword(){

    if($this->isSecurityUpdateFormReady()){

      $sql = "SELECT userPassword FROM Users WHERE userId = $this->userId ";
      $records = $this->connection->prepare($sql);
      $records->bindParam('userPassword', $this->userPassword);
      $records->execute();
      $results = $records->fetch(PDO::FETCH_ASSOC);

      if(count($results) > 0 && password_verify($this->userPassword, $results['userPassword']) ){
        $this->transferStatus(true);
      }else{
        $this->transferStatus(false);
      }

    }
  }

  public function setNewPassword(){

    if($this->checkPassword()){
      echo "si";
      $sql = "UPDATE Users SET userPassword = :userNewPassword WHERE userId = $this->userId";

      //Preparar el statement
      $stmt = $this->connection->prepare($sql);

      //Guardar los parametros en la base de datos
      $stmt->bindParam('userNewPassword', password_hash($this->userNewPassword, PASSWORD_BCRYPT ));

      if( $stmt->execute() ){
        $this->errorMessage = "La contraseña se cambio satisfactoriamente.";
      }else{
        $this->errorMessage = "No se pudo cambiar la contraseña, verifica que todos los datos sean correctos.";
      }
    }

  }

}

class UserDataOutput extends UserEngine{

  protected $userProfile;

  public function __construct($id){
    parent::__construct();
    $this->userId = $id;
  }

  public function getData(){
    $records = $this->connection->prepare('SELECT userId, userMail, userName, userLastName,
      userMonth, userDay, userYear, userImagePath, userDescription, userCity, userCountry FROM Users WHERE userId = :userId');
      $records->bindParam(':userId', $this->userId);
      $records->execute();
      $results = $records->fetch(PDO::FETCH_ASSOC);
      $this->userProfile = NULL;

      if( count($results) > 0){
        $this->userProfile = $results;
      }else{
        echo "no";
      }
    }

    public function getUserName(){
      return ucwords($this->userProfile['userName']).' '.ucwords($this->userProfile['userLastName']);
    }

    public function outputData(){

      $image = $this->userProfile['userImagePath'];
      $nameHolder = explode(' ', $this->userProfile['userName']);
      $lastNameHolder = explode(' ',$this->userProfile['userLastName']);
      $name = '';
      $lastName = '';
      for($i=0; $i < count($nameHolder); $i++){
        $name .= ucfirst($nameHolder[$i]).' ';
      }

      for($i=0; $i< count($lastNameHolder); $i++){
        $lastName .= ucfirst($lastNameHolder[$i]).' ';
      }


      ?>

      <div class="user-img" style="background-image: url(<?=$image?>);"></div>
      <div class="flex f-colum">
        <h2 class="sec-title"><?=$name. ' ' .$lastName?></h2>
        <p><?=$this->userProfile['userCity']?>, <?=$this->userProfile['userCountry']?></p>
        <p>Miembro desde Agosto 2016</p>
      </div>
      <!--Mostrar solo si existe una session-->
      <?php
      if($_SESSION['userId'] === $this->userId){
        echo '<a id="user-edit" href="editarPerfil.php">Editar</a>';
      }
    }

  }



  class DeleteUser extends UserEngine{

    public function __construct($id){
      parent:: __construct();
      $this->userId = $id;
    }

    public function test(){}

    }





    ?>
