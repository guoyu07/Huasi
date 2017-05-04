<?php
session_start();
$data = $_POST['corpData'];
$data = explode(',', $data);
$table = current($data);
$corpId = end($data);

//Chequear si los valores estan seteados antes de ejecutar el codigo.
if(isset($table) && isset($corpId) && !empty($table) && !empty($corpId) ){

  //Requerir scripts necesarios
  require_once "../DbConnection.php";
  require_once '../uiElements/HospedajeCard.php'; //Requerir la clase para generar los container de los hospedajes
  //Mostrar errores
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  //crear conexcion.
  $conn = new DbConnection();

  function getHosts(){

    global $conn, $corpId;

    $sql = "SELECT * FROM Hosts WHERE corpId = :corpId";
    $records = $conn->connectToDataBase()->prepare($sql);
    $records->bindParam(':corpId', $corpId);
    $records->execute();
    $results = $records->fetchAll();

    if( count($results) > 0){
      ?>
      <div class="host-show">
        <div class="slide-show">
          <?php
          foreach($results as $row){
            $host = new HostCorp($row['hostId']);
            $host->setNombre($row['hostName']);
            $host->setPrecio($row['hostPrice']);
            $host->setImagePath($row['hostImagePath']);
            if(isset($_SESSION['corpId']) && $_SESSION['corpId'] === $corpId){
              $host->printComponent();
            }else{
              $host->printComponentView();
            }
          }
          if(isset($_SESSION['corpId']) && $_SESSION['corpId'] === $corpId){

            ?>
            <a href="addHost.php?corpId=<?=$corpId?>" class="col-3 card-container" id="add-host">
              <div class="corp-host all-middle f-colum">
                <div class="all-middle" id="add-icon">
                  <h1>+</h1>
                </div>
                <h2>Añade un hospedaje</h2>
              </div>
            </a>
            <?php
          }
          ?>
        </div>
      </div>
      <?php
    }else{

      $html = '<div class = "all-middle f-colum" id="hosts-empty">';
      $html .= "<img src = 'img/svg/icons/hostEmpty.svg'/>";
      if(isset($_SESSION['corpId']) && $_SESSION['corpId'] === $corpId){
        $html .= '<h2 class = "subtitle">No tienes hospedajes para mostar</h2>';
        $html.= '<p>Crea un nuevo hospedaje y empieza a usar toda la funcionalidad de Huasi</p>';
        $html .= "<a href='addHost.php?corpId=$corpId'>";
        $html .= '<button type="button" name="button" class="btn btn-submit">Añade un hospedaje</button>';
        $html .= '</a>';
      }else{
        $html .= '<h2 class = "subtitle">Este Hotel aun no tiene Hospedajes</h2>';
        $html.= '<p>Busca las mejores opciones en Quito</p>';
        $html .= "<a href='busqueda.php'>";
        $html .= '<button type="button" name="button" class="btn btn-submit">Buscar</button>';
        $html .= '</a>';
      }
      $html .= '</div>';
      echo $html;
    }
  }

  if($table === 'Hosts'){

    getHosts();

  }else if($table === 'Coments'){

    $html = '<div class = "all-middle f-colum" id="hosts-empty">';
    $html .= "<img src = 'img/svg/icons/coments.svg'/>";
    if(isset($_SESSION['corpId']) && $_SESSION['corpId'] === $corpId){
      $html .= '<h2 class = "subtitle">No tienes comentarios ni evaluaciones</h2>';
      $html.= '<p>La retroaliemtación de tus usuarios es la mejor forma de mejorar</p>';
      /*$html .= "<a href='addHost.php?corpId=$corpId'>";
      $html .= '<button type="button" name="button" class="btn btn-submit">Añade un hospedaje</button>';
      $html .= '</a>';*/
    }else{
      $html .= '<h2 class = "subtitle">Este Hotel aun no tiene comentarios ni evaluaciones</h2>';
      $html.= '<p>Buscas una buena experiencia, mira lo que dicen otros usuarios</p>';
    }
    $html .= '</div>';
    echo $html;

  }else if ($table === 'Corps') {

    $sql = "SELECT corpId, corpMail, corpPhone, corpAddress, corpRepre, corpDescription FROM Corps WHERE corpId = :corpId";
    $records = $conn->connectToDataBase()->prepare($sql);
    $records->bindParam(':corpId', $corpId);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    function corpInfo($val = NULL){
      global $results;
      ?>
      <div id="update-show">
        <p></p>
        <p id="close">X</p>
      </div>
      <form class="form profile-form" method="POST" action="corp.php">
        <label>Descripción</label>
        <textarea name="corpDescription"  maxlength="240" <?=$val?>><?=$results['corpDescription']?></textarea>
        <label>Correo electronico</label>
        <input type="text" name="corpMail" value="<?=$results['corpMail']?>"<?=$val?>>
        <label>Telefono</label>
        <input type="num" name="corpPhone" value="<?=$results['corpPhone']?>"<?=$val?>>
        <label>Dirección</label>
        <input type="text" name="corpAddress" value="<?=$results['corpAddress']?>"<?=$val?>>
        <label>Representante en Huasi</label>
        <input type="text" name="corpRepre" value="<?=$results['corpRepre']?>"<?=$val?>>
        <?php
        if($val === NULL){
          ?>
          <button type="submit" name="corpId" class="btn btn-submit" id="<?=$results['corpId']?>">Guardar</button>
          <?php
        }
        ?>
      </form>
      <?php
    }

    if(count($results) > 0 ){
      if(isset($_SESSION['corpId']) && $_SESSION['corpId'] === $corpId){
        corpInfo();
      }else{
        corpInfo('disabled');
      }

    }else{

    }
  }

}








?>
