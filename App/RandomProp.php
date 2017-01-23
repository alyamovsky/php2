<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 22.01.2017
 * Time: 20:46
 */

namespace App;

/**
 * Трейт для обработки незаданных свойств класса магическими методами
 * @package App
 */
trait RandomProp
{
    /**
     * Массив для данных, передаваемых в шаблон
     * @var array
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
}