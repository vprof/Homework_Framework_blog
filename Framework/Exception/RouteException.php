<?php

namespace Framework\Exception;


class RouteException extends FrameworkException
{
    public function __construct()
    {
        echo "Ошибка Route";
    }
}
