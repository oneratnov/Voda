<?php
class date extends Type
{
  public $default = 0;

  public static function beforeSave($value)
  {
    $value=explode('-',$value);
    return mktime(0,0,0,$value[1],$value[2],$value[0]);
  }

  public function render()
  {
    return '<input type="date" name="'.$this->name.'" value="'.date("Y-m-d",$this->value).'">';
  }
}