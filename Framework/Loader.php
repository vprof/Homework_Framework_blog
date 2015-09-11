<?php
/**
 * Description:
 * User: JuraZubach
 * Date: 11.09.15
 */

use \Framework\Exception\ClassNotFoundException;

class Loader {

    protected static $_instance;

    protected $namespacesMap = array();

    private function __construct(){}

    /**
     * Close access to a function outside the class.
     *
     */
    private function __clone(){}


    public static function getInstance()
    {
        if(null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    public function register()
    {
        spl_autoload_register(array($this,'loadClass'));
    }


    public function unregister()
    {
        spl_autoload_unregister(array($this, 'loadClass'));
    }


    public function addNamespacePath($namespace, $rootDir)
    {
        if (is_dir($rootDir)) {
            $namespace = trim($namespace, '\\');
            $this->namespacesMap[$namespace] = $rootDir;
            return true;
        }

        return false;
    }


    protected function loadClass($class)
    {
        $pathParts = explode('\\', $class);
        if(is_array($pathParts)) {
            $namespace = array_shift($pathParts);
            if (!empty($this->namespacesMap[$namespace])) {
                $filePath = $this->namespacesMap[$namespace] . '/' . implode('/', $pathParts) . '.php';
                if(file_exists($filePath)) {
                    require_once $filePath;
                } else {
                    throw new ClassNotFoundException($class.' not found in : '.$filePath);
                }
                return true;
            } else {

            }
        }
        return false;
    }
}