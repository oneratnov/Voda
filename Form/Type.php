<?php
class Type
{
  public $name;
  public $value;
  public $params = array();
  public $multiValue = false;
  public $default = '';

  public function __construct($name,$value)
  {
    $this->value = $value == NULL ? $this->default : $value;
    $this->name = $name;
  }

  public static function beforeSave($value)
  {
    return $value;
  }

  public static function init($type,$model,$field,$params = array())
  {
    $objType = new $type($field,$model->$field);
    $objType->params = $params;
    if($objType->multiValue){
      $modelForMulti = isset($params['modelForMulti']) ? new $params['modelForMulti'] : new $field;
      $value = isset($model->$field) ? $model->$field : $objType->default;
      $objType->value = array('all'=>iterator_to_array($modelForMulti->find()),'value'=>$value);
    }
    return $objType;
  }

}