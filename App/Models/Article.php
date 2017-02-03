<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 16.01.2017
 * Time: 0:26
 */

namespace App\Models;

use App\Db;
use App\Model;

class Article
    extends Model
{
    public $id;
    public $title;
    public $text;
    public $author_id;
    const TABLE = 'news';

    /**
     * @return \App\Models\Author
     */
    public function __get($name)
    {
        if (('author' == $name) && (isset($this->author_id))) {
            return \App\Models\Author::findById($this->author_id);
        }
    }

    public function __isset($name)
    {
        if ('author' == $name) {
            return true;
        }

        return false;
    }


    public static function findLast(int $value = null): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . self::TABLE . ' ORDER BY id DESC';
        if ((isset($value))) {
            $sql .= ' LIMIT ' . (int)$value;
        }
        return $db->query($sql, [], self::class);
    }

    protected function validateTitle($value)
    {
        $errors = new \App\MultiException();

        if (strlen($value) <= 3) {
            $errors->add(new \Exception('The title field is too short'));
        }

        if ($value == 42) {
            $errors->add(new \Exception('The title field must not be equal to 42'));
        }

        if (!$errors->isEmpty()) {
            throw $errors;
        }

        return true;
    }

    protected function validateText($value)
    {
        $errors = new \App\MultiException();

        if (strlen($value) <= 3) {
            $errors->add(new \Exception('The text field is too short'));
        }

        if (!$errors->isEmpty()) {
            throw $errors;
        }

        return true;
    }

}