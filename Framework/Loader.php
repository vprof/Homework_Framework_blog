<?php

use Framework\Exception\ClassNotFoundException;

/**
 * This is a class loader.
 *
 * @package Application
 * @author Jura Zubach
 * @since 1.0
 */
class Loader {


    private static $_instance;

    private $namespaces = array();

    private function __construct()
    {
        //...
    }

    private function __clone()
    {
        //...
    }

    public static function getInstance()
    {
        if(empty(self::$_instance))
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * @return array
     */
    public function register()
    {
        spl_autoload_register(array($this,'loadClass'));
    }

    /**
     * @return array
     */
    public function unregister()
    {
        spl_autoload_unregister(array($this, 'loadClass'));
    }

    /**
     * @param $namespace
     * @param $rootDir
     * @return bool
     */
    public function addNamespacePath($namespace, $rootDir)
    {
        if (is_dir($rootDir))
        {
            $namespace = trim($namespace, '\\');
            $this->namespaces[$namespace] = $rootDir;
            return true;
        }

        return false;
    }

    /**
     * @param $class
     * @return bool
     * @throws ClassNotFoundException
     */
    protected function loadClass($class)
    {
        $pathParts = explode('\\', $class);
        if(is_array($pathParts))
        {
            $namespace = array_shift($pathParts);
            if (!empty($this->namespaces[$namespace]))
            {
                $filePath = $this->namespaces[$namespace] . '/' . implode('/', $pathParts) . '.php';
                if(file_exists($filePath))
                {
                    require_once $filePath;
                }else
                {
                    throw new ClassNotFoundException($class.' not found in : '.$filePath);
                }return true;
            } else
            {
                //...}
            }
        }
        return false;
    }
}

$loader = Loader::getInstance();
$loader->register();
