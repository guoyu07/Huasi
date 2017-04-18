<?php
session_start();
require_once 'DbConnection.php';
$conn = new DbConnection();
//Chequear si existe un usuario en la session.
if(isset($_SESSION['userId'])){

  $records = $conn->connectToDataBase()->prepare('SELECT userId, userMail,
    userName, userLastName, userSex, userMonth, userDay, userYear, userImagePath,
    userCountry, userCity,userPhoneNumber, userDescription, userFirstLogin FROM Users WHERE userId = :userId');

  $records->bindParam(':userId', $_SESSION['userId']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $user = NULL;

  if( count($results) > 0){;
    $user = $results;
    $user['userName'] = ucwords($user['userName']);
    $user['userLastName'] = ucwords(($user['userLastName']));
  }

}

 ?>
