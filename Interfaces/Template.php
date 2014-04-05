<?php
namespace Voda\Interfaces;
interface Template
{
  /**
   * [init 
   * Инициализация шаблонизатора, должна вернуть готовый
   * объект который будет сохранён в Registry, для 
   * дальнейшего использования.
   * ]
   * @return [object]
   */
  public function init();
  /**
   * [file 
   * Абсолютный адрес главного файла для инклуда.
   * Для сторонних разработок у меня предусматривается
   * папка Extensions, так что всё лучше хранить именно там.
   * ]
   * @return [string]
   */
  public function file();
  /**
   * [className 
   * Имя класса для инициализации.
   * ]
   * @return [string]
   */
  public function className();
}