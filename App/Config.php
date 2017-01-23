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
    private static $instance;

    protected function __construct()
    {
        $this->data = include __DIR__ . '/../config.php';
    }

    public static function singleton()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Config;
        }
        return self::$instance;
    }
}