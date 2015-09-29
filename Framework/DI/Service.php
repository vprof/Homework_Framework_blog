<?php

namespace Framework\DI;

use Framework\Exception\ServiceNotFoundExeption;
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

    public static function getInstanse()
    {
        if(is_null(self::$instance)){
            self::$instance = new self();
        }
    }

    /**
     * @param $service_name
     * @param $obj
     */
    public function set($service_name, $obj){
        if (!array_key_exists($service_name, self::$services)){
            self::$services[$service_name] = $obj;
        }
    }

    /**
     * @param $service_name
     * @return mixed
     * @throws ServiceNotFoundExeption
     */
    public static function get($service_name){
        if (array_key_exists($service_name, self::$services)){
            return self::$services[$service_name];
        }else{
            throw new ServiceNotFoundExeption();
        }
    }
}
