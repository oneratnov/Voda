<?php
class multiple extends Type
{
  public $multiValue = true;
  public $default = array();

  public function render()
  {
    $multiple = '<select name="'.$this->name.'[]" multiple="multiple" autofocus="autofocus">';
    foreach ($this->value['all'] as $val) {
      $multiple .= '<option '.(in_array((string) $val->_id,$this->value['value']) ? 'selected' : '').' value="'.$val->_id.'">'.$val->name
          .'</option>';
    }
    $multiple .= '</select>';
    return $multiple;
  }
}