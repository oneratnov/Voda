<?php
namespace Voda\Inits;
class Configuration extends \Voda\Initialization
{
  private $defaultConfig = array(
    'Db'=>array(
      /*'main'=>array(
        'type' => 'Mongo',
        'base' => 'main'
      ),
      'periphery'=>array(
        'type' => 'Mysql',
        'host' => '127.0.0.1',
        'port' => '3036',
        'user' => 'root',
        'pass' => '',
        'base' => 'mydb'
      ),
      'statistics'=>array(
        'type' => 'Sqlite',
        'file' => WWW_DIR.'statistics.sqlite',
        'base' => 'mydb'
      )*/
    ),
    'View'=>array(
      'extention' => '.html',
      'indexName' => 'index',
      'viewsDir'  => 'Views'
    ),
    'Template'=>'Blitz',
    'Application'=>'Sylend'
  );

  public function conn($param)
  {
    return array_merge($this->defaultConfig,$param);
  }

  public function name()
  {
    return 'configuration';
  }
}