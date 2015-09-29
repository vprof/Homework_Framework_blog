<?php

namespace Framework\Router;

/**
 * Router.
 *
 * @package Router
 * @author Jura Zubach
 * @since 1.0
 */
class Router {

    protected $map = array();

    public function __construct($routing_map = array())
    {
        $this->map = $routing_map;
    }

}
