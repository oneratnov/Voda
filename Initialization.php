<?php
namespace Voda;
use \Voda\Patterns\Registry;
abstract class Initialization extends Patterns\Singleton
{
  public function init($param)
  {
    Registry::i()->set($this->name(),$this->conn($param));
  }

  abstract public function conn($param);
  abstract public function name();
}