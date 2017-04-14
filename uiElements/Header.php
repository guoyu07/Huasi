<?php

//Clase para crear el mainheader y manejar todos sus estados

class HeaderBase{

  //Definir el titulo y logo del header
  protected $titulo = 'Huasi';
  protected $logoPath = 'img/logo.svg';
  protected $headerStyle = "";

  //Crear array para opciones y link de cada opcion
  protected $menuOpciones = array();
  protected $menuOpcionesLinks = array();

  //Constructor de la clase
  function __construct($shadow=false){
    if($shadow == true){
      $this->headerStyle = 'drop-shadow';
    }else{
      $this->headerStyle = '';
    }
  }

  //Función para Definir las opciones del menu
  public function setOpciones($opcion, $link){
    $this->menuOpciones[] = $opcion;
    $this->menuOpcionesLinks[] = $link;
  }

}

  //Clase para generar el estado normal del header
  class HeaderNormal extends HeaderBase{

    function __construct($shadow){
      parent::__construct($shadow);
    }

    protected function setData(){

      $opciones = array('Promociona tu hospedaje','Ayuda','Regístrate','Iniciar Sesión');
      $links = array('promHospedaje.php', 'ayuda.php', 'register.php', 'login.php');

      for($i=0; $i < count($opciones); $i++){
        $this->setOpciones($opciones[$i], $links[$i]);
      }

    }

    //funcion para imprimir el header
    public function printComponent(){

      $this->setData();
      ?>
      <div class="main-header <?=$this->headerStyle?>">
        <div class="header-logo">
          <a href="index.php">
            <?php echo file_get_contents($this->logoPath);?>
            <h2><?=$this->titulo?></h2>
          </a>
        </div>
        <div class="nav main-nav">
          <?php

          for($i=0; $i < count($this->menuOpciones); $i++){
            $opcion = $this->menuOpciones[$i];
            $link = $this->menuOpcionesLinks[$i];
            echo "<a href=$link><div>$opcion</div></a>\n";
          }

          ?>
        </div>
      </div>
      <?php

    }

  }


  //Clase para generar el estado de login del header
  class HeaderUsuario extends Headerbase{

    //Id del usuario : id del usuario dentro de la DB
    protected $idUsuario;

    //Requerir el id del usuario al crear la clase
    function __construct($shadow, $id){
      parent::__construct($shadow);
      $this->idUsuario = $id;
    }

    protected function setData(){
      $opciones = array('Promociona tu hospedaje','Ayuda',"$this->idUsuario");
      $links = array('promHospedaje.php', 'ayuda.php', 'usuario.php');

      for($i=0; $i < count($opciones); $i++){
        $this->setOpciones($opciones[$i], $links[$i]);
      }
    }

    //funcion para imprimir el header
    public function printComponent(){

      $this->setData();
      ?>
      <div class="main-header <?=$this->headerStyle?>">
        <div class="header-logo">
          <a href="index.php">
            <?php echo file_get_contents($this->logoPath);?>
            <h2><?=$this->titulo?></h2>
          </a>
        </div>
        <div class="nav main-nav">
          <?php

          for($i=0; $i < count($this->menuOpciones); $i++){

            $opcion = $this->menuOpciones[$i];
            $link = $this->menuOpcionesLinks[$i];
            if($i < count($this->menuOpciones)-1){
              echo "<a href=$link><div>$opcion</div></a>\n";
            }else{
              $html = "<a href=$link id='menu-triger'><div>$opcion</div></a>\n";
              $html.= '<div class="user-caption drop-shadow" id="user-menu">';
              $html.= '<a href="editarPerfil.php"><div>Editar Perfil</div></a>';
              $html.= '<a href="editarSeguridad.php"><div>Seguridad</div></a>';
              $html.= '<a href="userEngine/logout.php"><div>Salir</div></a>';
              $html.= '</div>';

              echo $html;
            }

          }

          ?>

        </div>
      </div>
      <?php

    }

  }


  ?>
