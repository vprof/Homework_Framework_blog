<?php
/**
 * Description:
 * User: JuraZubach
 * Date: 11.09.15
 */

namespace Framework\DI;

class Service 
{
    private static $instance = null;
    private $values = array();

    private function __construct()
    {

    }

    static function instanse()
    {
        if(is_null(self::$instance)){
            self::$instance = new self();
        }
    }

    function get($key)
    {
        if(isset($this->values[$key])){
            return $this->values[$key];
        }
        return null;
    }

    function set ($key, $value)
    {
        $this->values[$key] = $value;
    }
}
