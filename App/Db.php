<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 14.01.2017
 * Time: 15:22
 */

namespace App;


class Db
{
    protected $handler;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=php2;charset=utf8';
        $dbLogin = 'db_admin';
        $dbPass = 'yn34vHXPtWShemuu';
        $this->handler = new \PDO($dsn, $dbLogin, $dbPass);
    }

    public function query($sql, $data = [], $class = null)
    {
        $sth = $this->handler->prepare($sql);
        $res = $sth->execute($data);
        if (false === $res) {
            die('DB error in ' . $sql);
        }
        if (null === $class) {
            return $sth->fetchAll();
        } else {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
    }

    public function execute($query, $params = [])
    {
        $sth = $this->handler->prepare($query);
        $bool = $sth->execute($params);
        return $bool;
    }
}