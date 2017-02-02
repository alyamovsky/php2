<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 02.02.2017
 * Time: 15:27
 */

namespace App;


class Logger
{
    protected $file;

    public function __construct()
    {
        $this->file = fopen(__DIR__ . '/logs/log.txt', 'a+');
    }

    public function add($line)
    {
        fwrite($this->file, $line . "\n");
        fclose($this->file);
    }
}