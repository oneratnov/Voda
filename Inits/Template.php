<?php
namespace Voda\Inits;
class Template extends \Voda\Initialization
{
  public function conn($param)
  {
    return \Voda\Helper::getClass('Voda.Templates.'.$param)->init();
  }
  public function name()
  {
  	return 'template';
  }
}