<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 17.01.2017
 * Time: 22:27
 */

namespace App;


class Config
{
    public $data;

    public function __construct()
    {
        $this->data = include __DIR__ . '/../config.php';
    }
}