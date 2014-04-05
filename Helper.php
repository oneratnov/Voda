<?php
namespace Voda;
use \Voda\Patterns\Registry;
class Helper
{
  public static function getConfigByName($name)
  {
    $config = self::getInit('Configuration');
    return isset($config[$name]) ? $config[$name] : NULL;
  }
  public static function getInit($name)
  {
    return Registry::i()->get(self::getClass('Voda.Inits.'.$name)->name());
  }
  public static function getDb($name)
  {
    return Registry::i()->get(self::getClass('Voda.Inits.Db')->name())[$name];
  }
  public static function getClass($name)
  {
    $name = str_replace('.', '\\', '.'.$name);
    return is_callable(array($name,'i')) ? $name::i() : new $name;
  }
  public static function includExt($name)
  {
    foreach (glob(APP_DIR.'Extensions'.DS.$name.DS.'*',GLOB_NOSORT) as $f) {
      include_once $f; 
    }  
  }
  public static function getClassName($class)
  {
    $array = explode('\\',get_class($class));
    return end($array);
  }
  public static function getModule($name)
  {
    return APP.'.Modules.'.$name.'.Controllers.'.$name;
  }
  public static function getController($controller)
  {
    return APP.'.Controllers.'.Helper::getConfigByName('Application').'.'.$controller;
  }
  public static function cleanString($string)
  {
    $string = str_replace('"', '', $string);
    $string = str_replace("'", '', $string);
    return strip_tags($string);
  }
}