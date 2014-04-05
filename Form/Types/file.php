<?php
class file extends Type
{
  public $default = '';

  public function render()
  {
    return '<input type="file" name="'.$this->name.'" value="'.$this->value.'">';
  }
}