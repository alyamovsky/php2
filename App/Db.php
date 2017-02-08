<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 14.01.2017
 * Time: 15:22
 */

namespace App;


use App\Exceptions\DbException;

class Db
{
    protected $handler;

    public function __construct()
    {
        $config = Config::singleton();
        $dsn =
            'mysql:host=' . $config->data['db']['host'] . ';' .
            'dbname=' . $config->data['db']['dbname'] . ';' .
            'charset=' . $config->data['db']['charset'];
        $dbLogin = $config->data['db']['user'];
        $dbPass = $config->data['db']['password'];
        try {
            $this->handler = new \PDO($dsn, $dbLogin, $dbPass);
        } catch (\PDOException $e) {
            throw new DbException($e->getMessage());
        }
    }

    public function query($sql, $data = [], $class = null)
    {
        $sth = $this->handler->prepare($sql);
        $res = $sth->execute($data);

        if (false === $res) {
            throw new DbException('DB error in ' . $sql);
        }
        if (null === $class) {
            return $sth->fetchAll();
        } else {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
    }

    public function queryEach($sql, $data = [], $class = null)
    {
        $sth = $this->handler->prepare($sql);
        $res = $sth->execute($data);

        if (false === $res) {
            throw new DbException('DB error in ' . $sql);
        }
        if (null !== $class) {
            $sth->setFetchMode(\PDO::FETCH_CLASS, $class);
        }
        $sth->fetch();

        while ($item = $sth->fetch()) {
            yield $item;
        }

    }

    public function execute($query, $params = []): bool
    {
        $sth = $this->handler->prepare($query);
        $bool = $sth->execute($params);
        return $bool;
    }

    public function lastInsertId()
    {
        return $this->handler->lastInsertId();
    }
}