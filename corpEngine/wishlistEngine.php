<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Iniciar sesion
session_start();
//Requerir conexion a Db
require_once '../DbConnection.php';

$funName = $_GET['fun'];
//$hostId = $_POST['hostId'];


class WishEngine extends DbConnection{

  protected $hostId;
  protected $userId;
  protected $wishList;
  protected $connection;

  //Constructor
  public function __construct(){
    $this->connection = $this->connectToDataBase();
  }

  //Setear el id del usuario
  public function setUserId($idUser){
    $this->userId = $idUser;
  }

  //Setear el id del Host
  public function setHostId($idHost){
    $this->hostId = $idHost;
  }

  //Guardar el Wish.
  public function setWish(){

    $this->setHostId($_POST['hostId']);
    $this->setUserId($_SESSION['userId']);
    $sql = "INSERT INTO WishList (hostId, userId, wishDate) VALUES (:hostId, :userId, NOW())";
    $stmt = $this->connection->prepare($sql);

    $stmt->bindParam('hostId', $this->hostId);
    $stmt->bindParam('userId', $this->userId);

    if( $stmt->execute() ){
      return true;
    }else{
      return false;
    }

  }

  //Eliminar el Wish.
  public function deleteWish(){
    $this->setHostId($_POST['hostId']);
    $this->setUserId($_SESSION['userId']);
    $sql = "DELETE FROM WishList WHERE userId = $this->userId  AND hostId = $this->hostId";
    if($this->connection->exec($sql)){
      return true;
    }

  }

  //Chequear el status del wish segun usuario.
  public function checkWishStatus($id){

    $this->setHostId($_POST['hostId']);
    $this->setUserId($id);
    $sql = "SELECT wishId FROM WishList WHERE userId = :userId  AND hostId = :hostId";

    $records = $this->connection->prepare($sql);
    $records->bindParam(':userId', $this->userId);
    $records->bindParam(':hostId', $this->hostId);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if( count($results) > 0 && isset($results) && !empty($results)){
      return true;
    }else{
      return false;
    }

  }

  //Recopilar los Wish del usuario.
  public function getUserWishList(){

    $this->setUserId($_POST['userId']);
    $sql = "SELECT wishId, hostId, userId FROM WishList WHERE userId = :userId";

    $records = $this->connection->prepare($sql);
    $records->bindParam(':userId', $this->userId);
    $records->execute();
    $results = $records->fetchAll();

    if( count($results) > 0 && isset($results) && !empty($results)){
      $this->wishList = $results;

      foreach($this->wishList as $row){
        $this->printUserWishList($row['hostId'], $row['wishId']);
      }
      return true;
    }else{
      return false;
    }

  }

  public function printUserWishList($hostId, $wishId){

    $sql = "SELECT hostName, hostPrice, hostImagePath FROM Hosts WHERE hostId = :hostId";

    $records = $this->connection->prepare($sql);
    $records->bindParam(':hostId', $hostId );
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if( count($results) > 0 && isset($results) && !empty($results)){

      ?>
      <div class="col-6 wish-a" id="<?=$hostId?>">
        <?php
        //Borrar wish si el perdil del usuario es igual al usuario logeado.
        if(isset($_SESSION['userId']) && $this->userId === $_SESSION['userId']){
          echo '<span id ="user-delete-wish">x</span>';
        }else{

        }
        ?>
        <div style="background-image:url(<?=$results['hostImagePath']?>)">
          <a href="hospedaje.php?hostId=<?=$hostId?>">
            <h2 class="sec-title"><?=$results['hostName']?></h2>
            <h2 class="subtitle">$<?=$results['hostPrice']?></h2>
          </a>

        </div>
      </div>
      <?php
      return true;
    }else{
      return false;
    }

  }


}

//Inicializa el engine.
$wishEngine = new WishEngine();

function setWish(){

  global $hostId, $wishEngine;

  if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){


    if($wishEngine->setWish()){
      echo 'guardado';
    }else{
      echo 'error';
    }

  }else{
    ?>
    <div class="card-container all-middle f-colum" id="host-auth">
      <h2 class="subtitle black">Hola</h2>
      <h2 class="subtitle black">Tienes que inciar sesión para poder añadir un hospedaje a tu WishList</h2>
      <div>
      <a href="login.php">
        <button type="button" name="button" class="btn btn-submit-important">Iniciar Sesion</button>
      </a>
      <a href="register.php">
        <button type="button" name="button" class="btn btn-submit">Registrate</button>
      </a>
      </div>
    </div>

    <?php
  }

}

function deleteWish(){

  global $hostId, $wishEngine;
  if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){

    if($wishEngine->deleteWish()){
      echo 'eliminado';
    }else{
      echo 'error';
    }

  }

}

function checkWishStatus(){

  global $hostId, $wishEngine;

  if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
    $id = $_SESSION['userId'];
    if($wishEngine->checkWishStatus($id)){
      echo 'existe';
    }else{
      echo 'empty';
    }

  }
}

function getUserWishList(){

  global $hostId, $wishEngine;
  if($wishEngine->getUserWishList()){

  }else{
    ?>
    <div class="all-middle f-colum col-12" id="wish-empty">
      <img src="img/svg/icons/heart.svg" alt="">
      <h3 class="subtitle black">Aun no tienes ningun Hospedaje en tu Wishlist</h3>
    </div>
    <?
  }

}



if($funName === 'setWish'){
  setWish();
}else if($funName === 'deleteWish'){
  deleteWish();
}else if($funName === 'checkWishStatus'){
  checkWishStatus();
}else if($funName === 'getUserWishList'){
  getUserWishList();
}



?>
