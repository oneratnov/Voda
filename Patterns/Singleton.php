<?php
namespace Voda\Patterns;
class Singleton
{
  private static $i = array();

  final public static function i() 
  {
    $className = get_called_class();
    if (!isset(self::$i[$className]))
       self::$i[$className] = new $className;
    return self::$i[$className];
  }

  final public static function tracert()
  {
    $c=1;
    foreach(self::$i as $k => $v)
      echo '</br>'.$c++.'. '.$k; 
  }

  final private function __clone(){}
  final private function __construct(){}
}