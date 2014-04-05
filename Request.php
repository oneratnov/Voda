<?php
namespace Voda;
use \Voda\Patterns\Registry;
class Request extends Patterns\Singleton
{
  private $_post,
          $_get,
          $_cookie,
          $_server,
          $_params;

  public function start()
  {
    $this->_post = $_POST;
    $this->_get = $_GET;
    $this->_cookie = $_COOKIE;
    $this->_server = $_SERVER;
    $this->_params = array_merge($this->_post, $this->_get);
    $app = Helper::getInit('Application');
    $template = Helper::getInit('Template');
    $app->beforeWork($template);
    $app->run($this->_server['REQUEST_URI']);
    $app->afterWork($template);
  }

  public function getVar($name){
    return isset($this->_params[$name]) ? $this->_params[$name] : NULL;
  }
}