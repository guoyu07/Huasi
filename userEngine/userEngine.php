<?php

//Clases para manejar el sistema de usuarios:
// - Registrar -
// -Iniciar session
// -Completar y editar informacion -
// -editar contraseña -
// -eliminar cuenta -

//Clase abstracta base con la funcionalidad compartida
require_once 'uiElements/countrySelector.php';

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
  protected $verifyMessage;
  protected $errorMessage;
  protected $userLogMonth;
  protected $userLogYear;

  //constructor
  public function __construct() {
    //Asignar la conexion herededad de DbConnection
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
    $this->verifyMessage = '';
  }

  //Funcion para mostrar el mensaje de error.
  public function getErrorMessage(){
    return $this->errorMessage;
  }

  //Funcion para mostrar el mensaje de verificacion.
  public function getVerifyMessage(){
    return $this->verifyMessage;
  }

  //Funcion para imprimir mensajes.
  public function printReport(){
    if(!empty($this->getErrorMessage())){
      echo "<div class='error'>$this->errorMessage</div>";
    }else if(!empty($this->getVerifyMessage())){
      echo "<div class='verify-message'>$this->verifyMessage</div>";
    }
  }

  //Funcion para verificar la constraseña
  public function checkPassword(){

    if($this->isSecurityUpdateFormReady()){

      $sql = "SELECT userPassword FROM Users WHERE userId = $this->userId ";
      $records = $this->connection->prepare($sql);
      $records->bindParam('userPassword', $this->userPassword);
      $records->execute();
      $results = $records->fetch(PDO::FETCH_ASSOC);

      if(count($results) > 0 && password_verify($this->userPassword, $results['userPassword']) ){
        return true;
      }else{
        $this->errorMessage = "No se pudo cambiar la contraseña, verifica que todos los datos sean correctos.";
        return false;

      }

    }
  }

  //Funciones para verificar si los valores estan llenos.
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

  public function isUserCountryReady(){
    return !empty($this->userCountry);
  }

  public function isUserCityReady(){
    return !empty($this->userCity);
  }

  public function isUserPhoneReady(){
    return !empty($this->userPhoneNumber);
  }

  public function isUserFirstLogin(){
    return $this->userFirstLogin === 0;
  }


}


//Clase para registrar nuevos usuarios.
class UserRegister extends UserEngine{

  //Constructor
  public function __construct(){
    parent::__construct(); //heredar del padre
    $today = getdate();
    $this->userLogMonth = $today['mon']; //setear el mes actual
    $this->userLogYear = $today['year']; //setear el año actual
  }

  //Funcion para verificar si la forma esta llena
  private function isRegisterFormReady(){

    return
    $this->isNameReady() && $this->isLastNameReady() &&
    $this->isMailReady() && $this->isPasswordReady() &&
    $this->isDateReay();

  }

  //Funcion para guardar los datos del usuario en la DB
  public function setNewUser(){

    if($this->isRegisterFormReady()){
      //Ingresar usuario a la base de datos.
      $sql = "INSERT INTO Users (userMail, userName, userLastName ,userMonth,
        userDay, userYear, userPassword, userLogMonth, userLogYear) VALUES (:userMail, :userName, :userLastName, :userMonth, :userDay, :userYear, :userPassword, :userLogMonth, :userLogYear)";

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
        $stmt->bindParam('userLogMonth', $this->userLogMonth);
        $stmt->bindParam('userLogYear', $this->userLogYear);

        if( $stmt->execute() ){
          header("Location: index.php");
          //$message = "Cuenta creada satisfactoriamente";
        }else{
          $this->errorMessage = 'Ocurrio un error al crear tu cuenta intentalo otra vez';
        }
      }
    }

  }


  class UserLogin extends UserEngine{

    public function __construct(){
      parent::__construct();
    }

    private function isLoginFormReady(){
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

        $stmt->bindParam('userSex', strtolower($this->userSex));
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
      $this->isMailReady() && $this->isDateReay() &&
      $this->isUserSexReady() && $this->isUserCountryReady() &&
      $this->isUserCityReady() && $this->isUserPhoneReady();
    }

    public function updateUserInfo(){

      if($this->isUpdateFormReady()){
        //Ingresar usuario a la base de datos.
        $sql = "UPDATE Users SET userName = :userName, userLastName = :userLastName,
        userMail = :userMail, userSex = :userSex, userMonth = :userMonth, userDay = :userDay,
        userYear = :userYear, userCountry = :userCountry, userCity = :userCity,
        userPhoneNumber = :userPhoneNumber WHERE userId = $this->userId";

        //Preparar el statement
        $stmt = $this->connection->prepare($sql);

        //Guardar los parametros en la base de datos
        $stmt->bindParam('userSex', strtolower($this->userSex));
        $stmt->bindParam('userName', strtolower($this->userName));
        $stmt->bindParam('userLastName', strtolower($this->userLastName));
        $stmt->bindParam('userMail', $this->userMail);
        $stmt->bindParam('userMonth', $this->userMonth);
        $stmt->bindParam('userDay', $this->userDay);
        $stmt->bindParam('userYear', $this->userYear);
        $stmt->bindParam('userCountry', $this->userCountry);
        $stmt->bindParam('userCity', $this->userCity);
        $stmt->bindParam('userPhoneNumber', $this->userPhoneNumber);

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



    public function setNewPassword(){



      $this->checkPassword();

      if($this->checkPassword()){
        $sql = "UPDATE Users SET userPassword = :userNewPassword WHERE userId = $this->userId";

        //Preparar el statement
        $stmt = $this->connection->prepare($sql);

        //Guardar los parametros en la base de datos
        $stmt->bindParam('userNewPassword', password_hash($this->userNewPassword, PASSWORD_BCRYPT ));

        if( $stmt->execute() ){
          $this->verifyMessage = "La contraseña se cambio satisfactoriamente.";
        }else{
          $this->errorMessage = $errorMessage;
        }
      }

    }

  }

  class UserDataOutput extends UserEngine{

    protected $country;
    protected $userProfile;

    public function __construct($id){
      parent::__construct();
      $this->userId = $id;
      $this->country = new DiscoverCountry();
    }

    public function getData(){
      $records = $this->connection->prepare('SELECT userId, userMail, userName, userLastName,
        userMonth, userDay, userYear, userImagePath, userDescription, userCity, userCountry, userLogMonth, userLogYear FROM Users WHERE userId = :userId');
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

      public function checkMonth(){
        $months = array(
          '1'=>'Enero',
          '2'=>'Febrero',
          '3'=>'Marzo',
          '4'=>'Abril',
          '5'=>'Mayo',
          '6'=>'Junio',
          '7'=> 'Julio',
          '8'=>'Agosto',
          '9'=>'Septiembre',
          '10'=>'Octubre',
          '11'=>'Noviembre',
          '12'=>'Diciembre');

          foreach ($months as $key => $value) {
            if($this->userProfile['userLogMonth'] === $key){
              $this->userLogMonth = $value;
            }else{
            }
          }

        }

        public function outputData(){

          $this->checkMonth();
          $image = $this->userProfile['userImagePath'];
          $nameHolder = explode(' ', $this->userProfile['userName']);
          $lastNameHolder = explode(' ',$this->userProfile['userLastName']);
          $country = $this->country->discoverCountry($this->userProfile['userCountry']);
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
            <p><?=$this->userProfile['userCity']?>, <?=$country?></p>
            <p>Miembro desde <?=$this->userLogMonth.', '.$this->userProfile['userLogYear']?></p>
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

        public function deleteUser(){
          $sql = "DELETE FROM Users WHERE userId= $this->userId";
          $this->connection->exec($sql);
        }

      }





      ?>
