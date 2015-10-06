<?php

namespace Framework\Router;

/**
 * Router.
 *
 * @package Router
 * @author Jura Zubach
 * @since 1.0
 */
class Router 
{

    protected $routing_map = array();
    protected $request;

    function __construct($map = array()){
        $this->routing_map = $map;
        $this->request = new Request();
        
    public function findRoute()
    {
        $uri = $this->request->getUri();
        foreach($this->routing_map as $route)
        {
            if($route['pattern'] == $uri)
            {
                $match_routes = $route;
            }
        }
        if(empty($match_routes))
        {
            new RouteException();
        }
        return $match_routes;
    }
}
