<?php
session_start();

require_once 'DbConnection.php';

//Chequear si existe un usuario en la session.
if(isset($_SESSION['userId'])){
  $records = $conn->prepare('SELECT userId, userMail, userName, userLastName, userMonth, userDay, userYear FROM Users WHERE userId = :userId');
  $records->bindParam(':userId', $_SESSION['userId']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $user = NULL;

  if( count($results) > 0){;
    $user = $results;
  }

}

 ?>
