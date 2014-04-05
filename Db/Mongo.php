<?php
namespace Voda\Db;
class Mongo extends \Voda\Patterns\HMVC\Model
{
  static protected $db;

  public function connect($param)
  {
    \Voda\Helper::includExt('mongorecord');
    \BaseMongoRecord::$connection = new \Mongo($param['conn']);
    \BaseMongoRecord::$database = $param['base'];
    return new \MongoClient($param['conn']);
  }
}