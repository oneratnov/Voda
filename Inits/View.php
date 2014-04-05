<?php
namespace Voda\Inits;
class View extends \Voda\Initialization
{
  public function conn($param)
  {
    return \Voda\Helper::getClass('Voda.Patterns.HMVC.View')->init($param);
  }

  public function name()
  {
    return 'view';
  }
}