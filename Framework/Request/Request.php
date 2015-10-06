<?php

namespace Framework\Request;

/**
 * Request
 *
 * @package Request
 * @author Jura Zubach
 * @since 1.0
 */
class Request {

    private $post;
    private $get;
    private $cookies;
    private $host;
    private $uri;
    private $script;
    private $params;
    private $method;



    public function __construct(){
        $this->post = $_POST;
        $this->get = $_GET;
        $this->cookies = $_COOKIE;
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->host = $_SERVER['SERVER_NAME'];
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->script = $_SERVER['SCRIPT_NAME'];
        $this->params = $_SERVER['QUERY_STRING'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }


    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    public function getScript()
    {
        return $this->script;
    }

    public function isGet()
    {
        if ($this->method == 'GET') {
            return true;
        }else{
            return false;}
    }

    public function isPost()
    {
        if ($this->method == 'POST') {
            return true;
        }else{
            return false;}
    }

    public function isAjax() {
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            die();
        }
    }

    public function post($var){
        return $this->filter($this->post[$var]);
    }
    public function get($var){
        return $this->filter($this->get[$var]);
    }

    private function filter($value){
        $pattern = '/<\s*\/*\s*\w*>|[\$`~#<>\[\]\{\}\\\*\^%]/';
        if (!empty($value)) {
            if (is_array($value)){
                foreach ($value as $key=>$val){
                    $value[$key] = preg_replace($pattern, '', $val);
                }
            }else{
                $value = preg_replace($pattern, '', $value);
            }
            return $value;
        }else{
            return null;
        }
    }
}
