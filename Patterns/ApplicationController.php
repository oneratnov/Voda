<?php
namespace Voda\Patterns;
use \Voda\Helper;
abstract class ApplicationController extends Singleton
{
  abstract public function index($template);
  abstract public function beforeWork($template);
  abstract public function afterWork($template);

  public function router(){return array();}

  public function code404($template)
  {
    header("HTTP/1.0 404 Not Found");
    $template->display();
    die;
  }

  public function run($request,$params = array())
  {
    return is_array($request) ? $this->getByArray($request,$params) : $this->getByString($request,$params);
  }

  private function getByString($request,$params)
  {
    $app = Helper::getInit('Application');
    
    if($request === '/')
      return $this->call($app,'index',$params);

    foreach($app->router() as $pattern => $controller)
      if(preg_match($pattern,$request))
        return $this->call(
          Helper::getClass(reset($controller)),
          next($controller),
          $params
        );

    return $this->call($app,'code404',$params);
  }

  private function getByArray($request,$params)
  {
    $c = reset($request);
    $controller = Helper::getClass(
      APP.'.Controllers.'.Helper::getConfigByName('Application').'.'.$c)
    ;
    $action = next($request);
    return $this->call($controller,$action,$params);
  }

  private function call($controller,$action,$params)
  {
    $temlate = Helper::getInit('Template');
    $appName = Helper::getConfigByName('Application');
    $conName = Helper::getClassName($controller);
    if($appName !== $conName || $action !== 'index')
      $temlate = $temlate->including(APP_DIR.'Views'.DS.$appName.DS.$conName.DS.$action.'.html');
    $controller->$action($temlate,$params);
  }

}