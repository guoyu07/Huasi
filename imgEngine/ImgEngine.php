<?php

//Clase para subir y manejar imagenes dentro de la base de datos

class ImgEngine{

  protected $file;
  protected $fileName;
  protected $fileTmpName;
  protected $fileSize;
  protected $fileError;
  protected $fileType;
  protected $fileExtension;
  protected $fileActualExtenscion;
  protected $filePath;
  protected $allowedExt = array();



  //Constructor de la clase
  public function __construct($input, $trigger){

    if (isset($_POST[$trigger])) {

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


  public function saveImage($path){

    if (isset($_POST['submit'])) {
      if (in_array($this->fileActualExtension, $this->allowedExt)) {
        if ($this->fileError === 0) {
          if ($this->fileSize < 1000000) {

            $fileNameNew = $path.'_'.uniqid('', true).".".$this->fileActualExtension;
            $this->filePath = 'img/'.$path.'/'.$fileNameNew;
            move_uploaded_file($this->fileTmpName, $this->filePath);
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

  public function getImagePath(){
    return $this->filePath;
  }

}





?>
