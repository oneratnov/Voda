<?php
namespace Voda\Patterns\HMVC;
class View extends \Voda\Patterns\Singleton
{   private $extention,
          $indexName, 
          $viewsDir,
          $script = array(),
          $css = array(),
          $meta = array(),
          $title = 'Welcome to VODA';

  public function setScript($script)
  {
    if(array_search($script, $this->script) === false)
      $this->script[] =  $script;
  }
  public function getScript()
  {
    $html = '';
    foreach ($this->script as $name)
      $html .= '<script type="text/javascript" src="/js/'.$name.'"></script>';
    return $html;
  }
  public function setCss($css)
  {
    if(array_search($css, $this->css) === false)
      $this->css[] =  $css;
  }
  public function getCss()
  {
    $html = '';
    foreach ($this->css as $name)
      $html .= '<link rel="stylesheet" href="/css/'.$name.'" type="text/css" />';
    return $html;
  }
  public function setMeta($meta)
  {
    if(array_search($meta, $this->meta) === false)
      $this->meta[] =  $meta;
  }
  public function getMeta()
  {
    $html = '';
    foreach ($this->meta as $meta)
      $html .= '<meta '.$meta.' />';
    return $html;
  }
  public function getDir()
  {
    return APP_DIR.$this->viewsDir.DS.\Voda\Helper::getConfigByName('Application').DS;
  }
  public function getIndexFile()
  {
    return $this->getIndexName().$this->getExtention();
  }
  public function getExtention()
  {
    return $this->extention;
  }
  public function getIndexName()
  {
    return $this->indexName;
  }
  public function init($param)
  {
    return ($this->extention = $param['extention']) &&
           ($this->indexName = $param['indexName']) &&
           ($this->viewsDir = $param['viewsDir']);
  }
}