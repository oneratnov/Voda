<?php
namespace Voda\Templates;
class XTemplate implements \Voda\Interfaces\Template
{
  public function init()
  {
    require_once $this->file();
    $view = \Voda\Patterns\HMVC\View::i();
    $className = $this->className();
    return new $className($view->getIndexFile(),$view->getDir());
  }
  public function file()
  {
    return APP_DIR.'Extensions'.DS.'xtpl'.DS.'xtemplate.class.php';
  }
  public function className()
  {
    return 'XTemplate';
  }
}