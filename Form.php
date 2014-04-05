<?php
class  Form
{
  private $fields = array();
  private $model;
  private $submit = 'Сохранить';

  public function __construct($model)
  {
    $this->model = $model;
  }

  public function parseForm()
  {
    foreach(array_keys(get_class_vars(get_class($this->model))) as $var){
      if(VodaInit::isField($var))
        $this->add($var);
    }
    return $this;
  }

  public function parseFilter()
  {
    foreach($this->model->_filter() as $field){
      $this->add(VodaInit::getDetailByField($field));
    }
    $this->submit = 'Найти';
    return $this;
  }

  public function add($detail)
  {
    require_once('Type.php');
    $details = $this->model->$detail;
    $details['params'] = isset($details['params']) ? $details['params'] : NULL;
    $this->fields[] = array(
      'label' => $details['label'],
      'field' => Type::init($details['type'],$this->model,VodaInit::getFieldByDetail($detail),$details['params'])->render()
    );
  }

  private function renderSubmit()
  {
    return '<input type="submit" value="'.$this->submit.'">';
  }

  public function render()
  {
    $form = '<form id="form" method="POST" enctype="multipart/form-data">';
    $form .= '<table>';
    foreach($this->fields as $row){
      $form .= '<tr><td>'.$row['label'].'</td><td>'.$row['field'].'</td></tr>';
    }
    $form .= '</table>'.
        $this->renderSubmit().
        '</form>';
    return $form;
  }
}