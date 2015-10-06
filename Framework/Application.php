<?php

namespace Framework;

use Framework\Exception\FrameworkException;
use Framework\Request\Request;
use Framework\Response\Response;
use Framework\Response\ResponseInterface;
use Framework\Router\Router;
use Framework\DI\Service;
use Framework\Renderer\Renderer;
use Framework\Exception\BadResponseExeption;

/**
 * This is a Main class Application.
 *
 * @package Application
 * @author Jura Zubach
 * @since 1.0
 */
class Application {

    private $config = array();
    private $request;

    public function __construct($cfg)
    {
        if(file_exists($cfg) && is_readable($cfg))
        {
            $this->config = include($cfg);
        }
        $this->request = new Request();
    }

    public function run()
    {
        $map = $this->config['routes']; /* Выбрался массив с роутами  */
        $match_route = new Router($map);
        $route = $match_route->findRoute();
        $controller = new $route['controller'];

        echo '<pre>';
        print_r($route);
        echo '</pre>';

        echo '<hr>';

        echo '<pre>';
        print_r($controller);
        echo '</pre>';

        echo '<hr>';

        if (class_exists($route['controller'])) {
            $controller_reflection = new \ReflectionClass($route['controller']);
            if ($controller_reflection->hasMethod($route['action'])) {
                //Запускаем конкретное действие
                //устанавливая результат
                $controller = $controller_reflection->newInstance();


            } else {
                new FrameworkException();
            }
        }

        //определили контролер
        //определили екшен
/*
        $controller = new stdClass();
        $response = $controller->$action(параметры);
        if($response instanceof ResponseInterface)
        {
            if($response->type == 'html')
            {
                //TODO: доделать рендер, 
                $renderer = new Renderer($view, $data);
                $wrapped = $renderer->render($main_layout, array('content' => $response->getContent()));
                $response = new Response($wrapped);
            }
            $response->send();
        }else{
            throw new BadResponseExeption();
        }
        $response->send();*/
    }
}
