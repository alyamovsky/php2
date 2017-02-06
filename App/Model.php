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
    public $id;

    public static function findAll(): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC';
        return $db->query($sql, [], static::class);
    }

    public static function countAll(): int
    {
        $db = new Db();
        $sql = 'SELECT COUNT(*) AS num FROM ' . static::TABLE;
        return $db->query($sql, [], static::class)[0]->num;
    }

    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $params = [':id' => $id];
        return $db->query($sql, $params, static::class)[0];
    }

    public function isNew()
    {
        return (null === $this->id);
    }

    public function update()
    {
        if ($this->isNew()) {
            return false;
        }
        $sets = [];
        $data = [];
        foreach ($this as $key => $value) {
            $data[':' . $key] = $value;
            if ('id' == $key) {
                continue;
            }
            $sets[] = $key . '=:' . $key;
        }
        $sets = implode(', ', $sets);
        $db = new Db();
        $sql = 'UPDATE ' . static::TABLE . ' 
        SET ' . $sets . ' 
        WHERE id=:id';
        return $db->execute($sql, $data);
    }

    public function insert()
    {
        if (!$this->isNew()) {
            return false;
        }
        $params = [];
        $sets = [];
        $data = [];
        foreach ($this as $key => $value) {
            if ('id' == $key) {
                continue;
            }
            $params[] = $key;
            $sets[] = ':' . $key;
            $data[':' . $key] = $value;
        }
        $params = implode(', ', $params);
        $sets = implode(', ', $sets);
        $db = new Db();
        $sql = 'INSERT INTO ' . static::TABLE . ' ' .
            '(' . $params . ') ' .
            'VALUES (' . $sets . ')';
        $res = $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
        return $res;
    }

    public static function delete($id)
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' ' .
            ' WHERE id=:id';
        $data[':id'] = $id;
        $db = new Db();
        return $db->execute($sql, $data);
    }

    public function save()
    {
        if (!$this->isNew()) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    public function fill(array $data)
    {
        $errors = new MultiException();

        foreach ($data as $key => $value) {
            $validator = 'validate' . ucfirst($key);

            if (method_exists($this, $validator)) {
                try {
                    $this->$validator($value);
                } catch (MultiException $e) {
                    foreach ($e as $item) {

                        $errors->add(new \Exception($item->getMessage()));
                    }
                    continue;
                }
            }

            if (!isset($value)) {
                $errors->add(new \Exception('Empty ' . $key));
                continue;
            }
            $this->$key = $value;
        }

        if (!$errors->isEmpty()) {
            throw $errors;
        }
    }
}