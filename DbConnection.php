<?php

class DbConnection{

  //Datos para conectar a la base de datos.
  private $server ;
  private $userName ;
  private $password ;
  private $database ;

  public function connectToDataBase(){

    $this->server = 'localhost';
    $this->userName = 'root';
    $this->password = 'root';
    $this->database = 'Huasi';
    //Verificar coneccion con la base de datos
    try{
      //Crear nueva conexion de tipo PDO.
      $conn = new PDO("mysql:host=$this->server; dbname=$this->database", $this->userName, $this->password, array(
        //Mostrar errores al momento de enviar o recivir datos.
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ));
      }catch(PDOException $e){
        die("Coneccion fallida, Error: " . $e->getMessage());
      }
      return $conn;
    }

}


?>
