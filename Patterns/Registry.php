<?php
namespace Voda\Patterns;
class Registry extends Singleton
{
  private $register = array();
  
  public function get($name)
  {
  	return isset($this->register[$name]) ? $this->register[$name] : NULL ;
  }

  public function set($name,$value)
  {
  	$this->register[$name] = $value;
  }
}