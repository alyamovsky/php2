<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 21.01.2017
 * Time: 17:36
 */

namespace App;


class View
    implements \Countable
{
    use TMagic;

    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * Принимает данные для хранения
     * @param $key
     * @param $value
     */
    public function assign($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function display($template)
    {
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }
        include $template;
    }

    public function render($template)
    {
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }



}