<?php
class input extends Type
{
  public $default = '';

  public function render()
  {
    return '<input type="text" name="'.$this->name.'" value="'.$this->value.'">';//$input->render();
  }
}