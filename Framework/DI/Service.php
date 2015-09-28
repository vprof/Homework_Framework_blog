<?php

namespace Framework\DI;

/**
 * This is a Service class Application.
 *
 * @package DI
 * @author Jura Zubach
 * @since 1.0
 */
class Service 
{
    private static $instance = null;
    private static $services = array();

    private function __construct()
    {
        //...
    }

    public static function instanse()
    {
        if(is_null(self::$instance)){
            self::$instance = new self();
        }
    }

    /**
     * @param $service_name
     * @param $object
     */
    public static function set($service_name,$object)
    {
        self::$services[$service_name] = $object;
    }

    /**
     * @param $service_name
     * @return bool
     */
    public static function get($service_name)
    {
        return empty(self::$services[$service_name] ? null : self::$instance);
    }
}
