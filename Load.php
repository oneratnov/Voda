<?php
namespace Voda;
class Load extends Patterns\Singleton
{
  public function run($config = array())
  {
    \Voda\Inits\Configuration::i()->init($config);

    foreach(Helper::getInit('Configuration') as $key => $value)
      Helper::getClass('Voda.Inits.'.$key)->init($value);
    
    Request::i()->start();
    //Patterns\Singleton::tracert();
  }
}