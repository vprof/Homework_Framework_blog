<?php

namespace Framework\Exception;

/**
 * Class not found exception.
 *
 * @package Exception
 * @author Jura Zubach
 * @since 1.0
 */
class ClassNotFoundException extends FrameworkException
{
    public function __construct()
    {
        echo "Ошибка ClassNotFound";
    }
}
