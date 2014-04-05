<?php
class checkbox extends Type
{
  public $default = 0;

  public function render()
  {
    $checked = $this->value == 1 ? 'checked="checked"':'';
    return '<input type="checkbox" name="'.$this->name.'" value="1" '.$checked.'>';
  }
}