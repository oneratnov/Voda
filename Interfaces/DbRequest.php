<?php
namespace Voda\Interfaces;
interface DbRequest
{
  public function where($param);
  public function orderBy($param);
  public function limit($param);
}