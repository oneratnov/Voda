<?php
namespace Voda\Templates;
class BlitzСrack extends \Blitz
{
  private $vars = array();

  public function init() 
  {
    return $this;
  }
  public function __construct($template = '') 
  {
    $view=\Voda\Helper::getClass('Voda.Patterns.HMVC.View');
    if(empty($template))
      $template = $view->getDir().$view->getIndexFile();
    parent::__construct($template);
  }
  public function getVar($varName) 
  {
    return isset($this->vars[$varName]) ? $this->vars[$varName] : '';
  }
  public function setVar($varName,$var) 
  {
    return $this->vars[$varName]=$var;
  }
  public function including($template) 
  {
    return new \Voda\Templates\BlitzСrack($template);
  }
}