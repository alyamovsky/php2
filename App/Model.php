<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 16.01.2017
 * Time: 13:13
 */

namespace App;

abstract class Model
{

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, [], static::class);
    }

    public static function countAll()
    {
        $db = new Db();
        $sql = 'SELECT COUNT(*) AS num FROM ' . static::TABLE;
        return (int)$db->query($sql, [], static::class)[0]->num;
    }

    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $params = [':id' => $id];
        return $db->query($sql, $params, static::class)[0];
    }
}