<?php

namespace Framework\Exception;


class BadResponseExeption extends FrameworkException
{
    public function __construct()
    {
        echo "Ошибка Response";
    }
}
