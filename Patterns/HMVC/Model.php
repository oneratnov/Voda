<?php
namespace Voda\Patterns\HMVC;
abstract class Model extends \Voda\Patterns\Singleton 
{
  /*<Adapter_must_have>*/
  abstract protected function connect($param);
  /*</Adapter_must_have>*/

  /*<Work_with_model>*/
  static public function getModelName()
  { 
    $modelName = explode('\\',get_called_class()); 
    return end($modelName); 
  }
  /*</Work_with_model>*/
 
  /*<Form_from_model>*/
  static public function newForm(){
    $form = new Form(self::getModel());
    return  $form->parseForm()->render();
  }
  static public function viewForm ($id)
  {
    $form = new Form(self::getModel($id));
    return  $form->parseForm()->render();
  }
  static public function saveForm ($post,$id = false,$files = false)
  {
    $model = self::getModel($id);
    $model::before();
    $details = array_keys(get_class_vars(get_class($model)));
    foreach($details as $detail){
      if(!self::isField($detail))
        continue;
      $field = self::getFieldByDetail($detail);
      $value = isset($post[$field]) ? $post[$field] : false;
      $param = $model->$detail;
      if($param['type'] == 'file')
        continue;
      $typeModel = $param['type'];
      $model->$field = $typeModel::beforeSave($value);
    }
    $model::after();
    $s = $model->save();
    if($files != false){
      foreach($details as $detail){
        $field = self::getFieldByDetail($detail);
        foreach ($files as $file) {
          if($file->getKey() == $field)
            $file->moveTo('/www/data/i/'.get_called_class().'/'.$field.'/'.$model->getId().'/'.$file->getName());
        }
      }
    }
    return $s;
  }
  static public function viewFilterForm ($post)
  {
    $model = self::getModel();
    foreach($post as $field => $value){
      $model->$field = self::transformForFilter($model,$field,$value);
    }
    $form = new Form($model);
    return  $form->parseFilter()->render();
  }
  static public function findFilterForm ($post)
  {
    $model = self::getModel();
    foreach($post as $field => $value){
      if(!empty($value))
        $filter[$field] = self::transformForFilter($model,$field,$value);
    }
    return  isset($filter) ? $model->find($filter) : $model->find();
  }
  static private function transformForFilter($model,$field,$value)
  {
    $detail = self::getDetailByField($field);
    $param = $model->$detail;
    $typeModel = $param['type'];
    return $typeModel::beforeSave($value);
  }
  static public function getDetailByField($field)//Вынести всю преферию в отдельный класс
  {
    return self::$prefix.$field;
  }
  static public function getFieldByDetail($detail)//Вынести всю преферию в отдельный класс
  {
    return str_replace(self::$prefix,'',$detail);
  }
  static public function isField($var)//Вынести всю преферию в отдельный класс
  {
    return strpos($var,self::$prefix) === 0;
  }
  public function _filter()
  {
    return array();
  }
  /*</Form_from_model>*/

  public static function before(){}
  public static function after(){}
}