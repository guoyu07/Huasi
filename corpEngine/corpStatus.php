<?php
session_start();
require_once 'DbConnection.php';
$conn = new DbConnection();

if(isset($_SESSION['corpId'])){
  $sql = "SELECT corpId, corpName, corpMail, corpPhone, corpAddress, corpLogo, corpRepre, corpFirstLogin FROM Corps WHERE corpId = :corpId";

  $records = $conn->connectToDataBase()->prepare($sql);
  $records->bindParam(':corpId', $_SESSION['corpId']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  $corp = NULL;

  if( count($results) > 0){
    $corp = $results;
    $corp['corpName'] = ucwords($corp['corpName']);
  }

}



 ?>
