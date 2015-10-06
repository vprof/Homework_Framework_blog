<?php

namespace Framework\Exception;

/**
 * Database not found exception.
 *
 * @package Exception
 * @author Jura Zubach
 * @since 1.0
 */
class DatabaseException extends FrameworkException
{
    public function __construct()
    {
        echo "Ошибка Database";
    }
}
