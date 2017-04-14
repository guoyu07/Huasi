<?php

//Datos para conectar a la base de datos.
$server = 'localhost';
$userName = 'root';
$password = 'root';
$database = 'Huasi';

//Verificar coneccion con la base de datos
try{
  //Crear nueva conexion de tipo PDO.
  $conn = new PDO("mysql:host=$server; dbname=$database", $userName, $password, array(
    //Mostrar errores al momento de enviar o recivir datos.
    //PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
}catch(PDOException $e){
  die("Coneccion fallida, Error: " . $e->getMessage());
}


/*class DbConnection{

  //Datos para conectar a la base de datos.
  protected $server = 'localhost';
  protected $userName = 'root';
  protected $password = 'Jay087712578';
  protected $database = 'Huasi';
  public $connection;

  public function __construct(){
    //Verificar coneccion con la base de datos
    try{
      //Crear nueva conexion de tipo PDO.
      $this->connection = new PDO("mysql:host=localhost; dbname=Huasi", $this->userName, $this->password);
      }catch(PDOException $e){
        die("Coneccion fallida, Error: " . $e->getMessage());
      }
    }

  public function getDbConnection(){
    //Retornar el obeto de conexion a la base de dato
    return       $this->connection = new PDO("mysql:host=localhost; dbname=Huasi", $this->userName, $this->password);
  }

}
*/

?>
