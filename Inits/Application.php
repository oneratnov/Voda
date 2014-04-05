<?php
namespace Voda\Inits;
class Application extends \Voda\Initialization
{
  public function conn($param)
  {
  	return \Voda\Helper::getClass(APP.'.Controllers.'.$param.'.'.$param);
  }

  public function name()
  {
  	return 'application';
  }
}