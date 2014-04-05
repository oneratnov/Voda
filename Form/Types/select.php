<?php
class select extends Type
{
  public $multiValue = true;
  public $default = array();

  public function render()
  {
    $select = '<select name="'.$this->name.'">';
    foreach($this->value['all'] as $val){
      $select .= '<option '.((string) $val->_id == $this->value['value'] ? 'selected' : '').' value="'.$val->_id.'">'.$val->name.'</option>';
    }
    $select .= '</select>';
    return $select;
  }
}