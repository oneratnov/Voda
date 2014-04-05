<?php
namespace Voda\Inits;
class Db extends \Voda\Initialization
{
  public function conn($param)
  {
  	$connects = array();
    foreach($param as $name => $p)
      $connects[$name] = \Voda\Helper::getClass('Voda.Db.'.$p['type'])->connect($p);
    return $connects;
  }

  public function name()
  {
  	return 'database';
  }
}