<?php

namespace Framework\Exception;

/**
 * Main class Exception
 *
 * @package Exception
 * @author Jura Zubach
 * @since 1.0
 */
class FrameworkException extends \Exception
{
    private $statusCode;
    private $headers;
    
    public function __construct($statusCode, $message = null, \Exception $previous = null, array $headers = array(), $code = 0)
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }
}
