<?php
namespace Voda\Templates;
class Blitz implements \Voda\Interfaces\Template
{
  public function init()
  {
    $view = \Voda\Patterns\HMVC\View::i();
    $className = $this->className();
    return new $className($view->getDir().$view->getIndexFile());
  }
  public function file(){}
  public function className()
  {
    return 'Blitz';
  }
}