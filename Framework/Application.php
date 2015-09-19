<?php
/**
 * Description:
 * User: JuraZubach
 * Date: 11.09.15
 */
namespace Framework\Application;

class Application {

    protected $config;

    public function __construct($param)
    {
        if(file_exists($param) && is_readable($param)) {
            $this->config = include($param);
        }
    }


    public function run()
    {
        /**
         * Created Request and Response
         */
        $request = new Request;
        $response = new Response;
        
        /**
         * Found router 
         */
        $routes = $this->config['routes'];
		$router = new Router($request, $routes);
		$router->run();

    }

}
