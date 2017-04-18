<?php

//Clase para seleccionar la fecha de nacimiento.
abstract class BirthSelectorBase{

  protected $years = array();
  protected $months = array();
  protected $days = array();
  protected $actualYear;

  function __construct(){
    $date = getdate();
    $this->actualYear = $date['year'];

    //Llenar el array de años hasta el año actual.
    for( $i = $this->actualYear-18, $j = 0; $i >= 1910; $i--, $j++ ){
      $this->years[$j]=$i;
    }

    //Llenar el array de meses.
    $mMonths = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

    for($i = 0; $i < count($mMonths); $i++){
      $this->months[$i] = $mMonths[$i];
    }

    //Llenar el array de dias.
    for($i = 1; $i <= 31; $i++ ){
      $this->days[$i] = $i;
    }

  }


}

class BirthSelectorRegister extends BirthSelectorBase{

  function __construct(){
    parent::__construct(); // Llamar al constructor de la clase heredada
  }

  public function printYears(){

    $html = "<div class='select'>";
    $html .= "<select name='userYear'>";
    $html .= "<option selected disabled>Año</option>";
    for($i=0; $i < count($this->years); $i++){
      $year = $this->years[$i];
      $html .= "<option value = $year> $year </option>";
    }
    $html .= "</select>";
    $html .= "</div>";

    echo $html;

  }

  public function printMonths(){

    $html = "<div class='select'>";
    $html .= "<select name='userMonth'>";
    $html .= "<option selected disabled>Mes</option>";
    for($i=0; $i < count($this->months); $i++){
      $month = $this->months[$i];
      $html .= "<option value = $month > $month </option>";
    }
    $html .= "</select>";
    $html .= "</div>";

    echo $html;

  }

  public function printDays(){

    $html = "<div class='select'>";
    $html .= "<select name='userDay'>";
    $html .= "<option selected disabled>Día</option>";
    for($i=1; $i <= count($this->days); $i++){
      $day = $this->days[$i];
      $html .= "<option value = $day > $day </option>";
    }
    $html .= "</select>";
    $html .= "</div>";

    echo $html;

  }

}


class BirthSelectorChange extends BirthSelectorBase{

  protected $userMonth;
  protected $userDay;
  protected $userYear;


  function __construct($month, $day, $year){
    parent::__construct(); // Llamar al constructor de la clase heredada
    $this->userMonth = $month;
    $this->userDay = $day;
    $this->userYear = $year;
  }

  public function printYears(){

    $html = "<div class='select'>";
    $html .= "<select name='userYear'>";
    $html .= "<option selected disabled>Año</option>";
    for($i=0; $i < count($this->years); $i++){
      $year = $this->years[$i];
      if($year == $this->userYear){
        $html .= "<option selected='selected' value = $year> $year </option>";
      }else{
        $html .= "<option value = $year> $year </option>";
      }
    }
    $html .= "</select>";
    $html .= "</div>";

    echo $html;

  }

  public function printMonths(){

    $html = "<div class='select'>";
    $html .= "<select name='userMonth'>";
    $html .= "<option selected disabled>Mes</option>";
    for($i=0; $i < count($this->months); $i++){
      $month = $this->months[$i];
      if($month == $this->userMonth){
        $html .= "<option selected='selected' value = $month > $month </option>";
      }else{
        $html .= "<option value = $month > $month </option>";
      }
    }
    $html .= "</select>";
    $html .= "</div>";

    echo $html;

  }

  public function printDays(){

    $html = "<div class='select'>";
    $html .= "<select name='userDay'>";
    $html .= "<option selected disabled>Día</option>";
    for($i=1; $i <= count($this->days); $i++){
      $day = $this->days[$i];
      if($day == $this->userDay){
        $html .= "<option selected='selected' value = $day > $day </option>";
      }else{
        $html .= "<option value = $day > $day </option>";
      }
    }
    $html .= "</select>";
    $html .= "</div>";

    echo $html;

  }

}



?>
