<?php
class textarea extends Type
{
  public $default = '';

  public function render()
  {
    return '<textarea cols="40" rows="5" name="'.$this->name.'">'.$this->value.'</textarea>';
  }
}