<?php

namespace Framework\Exception;

/**
 * Service not found exception.
 *
 * @package Exception
 * @author Jura Zubach
 * @since 1.0
 */
class ServiceNotFoundExeption extends FrameworkException
{
    public function __construct()
    {
        echo "Ошибка ServiceNotFound";
    }
}
