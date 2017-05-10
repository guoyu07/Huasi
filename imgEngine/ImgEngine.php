<?php

//Clase para subir imagenes al servidor
class ImgEngine{

  protected $file; //archivo a recivir.
  protected $fileName; //nombre del archivo.
  protected $fileTmpName; //nombre de la ubicacion temporal del archivo.
  protected $fileSize; //Tamaño del archivo.
  protected $fileError; //errores del archivo
  protected $fileType;  //Tipo de archivo
  protected $fileExtension; //Extensdion del archivo
  protected $fileActualExtenscion; //extension uniforme del archivo
  protected $filePath; //Ubiacion del archivo
  protected $allowedExt = array(); //extensiones permitidas



  //Constructor de la clase -- requiere el name de input como primer argumento
  //y el name del boton que envia el formulario

  public function __construct($input, $trigger){

    if (isset($_POST['submit'])) {
      //echo 'construyendo';
      $this->file = $_FILES[$input]; //asignar el archivo.
      $this->fileName = $this->file['name']; //asignar el nombre del archivo.
      $this->fileTmpName = $this->file['tmp_name']; //asignar la ubicacion temporal del archivo.
      $this->fileSize = $this->file['size']; //asignar el tamaño del archivo.
      $this->fileError = $this->file['error']; //asignar si existe algun error.
      $this->fileType = $this->file['type']; //asignar el typo del archivo.
      //Ver cuál es la extensión del archivo.
      $this->fileExtension = explode('.', $this->fileName);
      //Guaradar la extension en minusuculas.
      $this->fileActualExtension = strtolower(end($this->fileExtension));
      //Extensiones admitidas
      $this->allowedExt = array('jpg', 'jpeg', 'png');

    }

  }

  //Funcion para guardar la imagen -- requiere el nombre del directorio = $path
  public function saveImage($path){

    //El codigo ejectua solo cuando se presione el boton del formulario.
    if (isset($_POST['submit'])) {
      //Verificar si la extensión del archivo esta permitida
      if (in_array($this->fileActualExtension, $this->allowedExt)) {
        //Verificar si no existen errores.
        if ($this->fileError === 0) {
          //Verificar el tamaño del archv
          if ($this->fileSize < 1000000) {
            //Generar un nombre para la imagen con un id unico en relacion al tiempo.
            $fileNameNew = $path.'_'.uniqid('', true).".".$this->fileActualExtension;
            //asignar la extension donde se va a guardar la imagen
            $this->filePath = 'img/'.$path.'/'.$fileNameNew;
            //Guardar la imagen.
            move_uploaded_file($this->fileTmpName, $this->filePath);
            //echo 'guardada';
          } else {
            echo "Your file is too big!";
          }
        } else {
          echo "There was an error uploading your file!";
        }
      } else {
        echo "You cannot upload files of this type!";
      }
    }

  }

  //funcion para retornar la ubicacion de la imagen y poder pasarla a la base
  //de datos.
  public function getImagePath(){
    return $this->filePath;
  }

}

?>
