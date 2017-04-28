<?php
//Requerir el scrip de la base de datos.
require_once "../DbConnection.php";

//Clase para manejar todas las interacciones de las empresar con el server.
abstract class CorpEngine extends DbConnection{

  

}


//clase para registrar una nueva empresa
class CorpRegister extends CorpEngine{

}

//clase para que las empresas incien session
class CorpLogin extends CorpEngine{

}



 ?>
