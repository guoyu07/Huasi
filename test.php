<?php

//Datos para conectar a la base de datos.
$server = 'localhost';
$userName = 'root';
$password = 'root';
$database = 'Huasi';

//Verificar coneccion con la base de datos
try{
  //Crear nueva conexion de tipo PDO.
  $conn = new PDO("mysql:host=$server; dbname=$database", $userName, $password);
}catch(PDOException $e){
  die("Coneccion fallida, Error: " . $e->getMessage());
}



if(true){

  //Establecer la Querie.
  $sql = "INSERT INTO Users (userMail, userName, userLastName, userMonth, userDay, userYear, userPassword)
  VALUES (:userMail, :userName, :userLastName, :userMonth, :userDay, :userYear, :userPassword)";

  //Preparar la Querie.
  $stmt = $conn->prepare($sql);

  //Guardar los parametros en la base de datos.
  $stmt->bindParam('userMail', $_POST['userMail']);
  /*$stmt->bindParam('userName', $this->userName);
  $stmt->bindParam('userLastName', $this->userLastName);
  $stmt->bindParam('userMonth', $this->userMonth);
  $stmt->bindParam('userDay', $this->userDay);
  $stmt->bindParam('userYear', $this->userYear);
  //Enviar la constrseña de forma protegida.
  $stmt->bindParam('userPassword', password_hash($this->userPassword, PASSWORD_BCRYPT ));*/

  //Ejecutar el statement si todo esta correcto
  if($stmt->execute()){
    header("Location: index.php");
    echo "estas logeado";
  }else{
    echo "no estas logeado";
  }

}




 ?>
