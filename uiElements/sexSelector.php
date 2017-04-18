<?php

abstract class SexEngine{

  protected $sexCollection;

  public function __construct(){
    $this->sexCollection = array("hombre", "mujer", "otro");
  }


}

class SexSelector extends SexEngine{
  public function __construct(){
    parent::__construct();
  }

  public function printSex(){
    $html = '<div class="select">';
    $html .= '<select name="userSex">';
    $html .= '<option selected disabled selected="selected">Sexo</option>';
    for($i = 0; $i < count($this->sexCollection); $i++){
      $sex = $this->sexCollection[$i];
      $sexFormated = ucfirst($this->sexCollection[$i]);
      $html.= "<option value=$sex>$sexFormated</option>";
    }
    $html.= '</select>';
    $html.= '</div>';
    echo $html;
  }
}

class UserSexSelector extends SexEngine{

  protected $userSex;

  public function __construct($sex){
    parent::__construct();
    $this->userSex = $sex;
  }

  public function printSex(){

    $html = '<div class="select">';
    $html .= '<select name= "userSex">';
    $html .= '<option selected disabled>Sexo</option>';
    for($i = 0; $i < count($this->sexCollection); $i++){
      $sex = $this->sexCollection[$i];
      $sexFormated = ucfirst($this->sexCollection[$i]);
      if($sex === $this->userSex){
        $html.= "<option selected='selected' value=$sex >$sexFormated</option>";
      }else{
        $html.= "<option value=$sex>$sexFormated</option>";
      }

    }
    $html.= '</select>';
    $html.= '</div>';
    echo $html;
  }

}

 ?>
