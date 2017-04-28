<?php
//Requerir el scrip de la base de datos.
require_once "../DbConnection.php";

//Clase para manejar todas las interacciones de las empresar con el server.
abstract class CorpEngine extends DbConnection{

  protected $corpId;
  protected $coprName;
  protected $corpMail;
  protected $corpPassword;
  protected $corpPhone;
  protected $corpAddress;
  protected $corpLogo;
  protected $corpZone;
  protected $corpRepre;
  protected $corpFirstLogin;

  //Constructo global
  public function __construct(){
    $this->corpName = $_POST['corpName'];
    $this->corpMail = $_POST['corpMail'];
    $this->corpPassword = $_POST['corpPassword'];
    $this->corpPhone = $_POST['corpPhone'];
    $this->corpAddress = $_POST['corpAddress'];
    $this->corpZone = $_POST['corpZone'];
    $this->corpRepre = $_POST['corpRepre'];
  }


}


//clase para registrar una nueva empresa
class CorpRegister extends CorpEngine{

  public function __construct(){
    parent::__construc();
  }

}

//clase para que las empresas incien session
class CorpLogin extends CorpEngine{

  public function __construct(){
    parent::__construc();
  }

}

//Clase para completar el proceso de registro.
class CorpCompleteInfo extends CorpEngine{

  public function __construct(){
    parent::__construc();
  }

}

//Clase para editar la informacion.
class CorpEditInfo extends CorpEngine{

  public function __construct(){
    parent::__construc();
  }

}



?>
