<?php

namespace Framework\Response;

use Framework\Response\ResponseInterface;

class Response implements ResponseInterface{

    protected $headers = array();
    public $type = 'html';

    protected $content;
    protected $msg;
    public $code;

    public function __construct($content, $msg = '', $code = 200){

        $this->content = $content;
        $this->msg = $msg;
        $this->code = $code;
    }

    function setHeader( $header )
    {
        $this->headers[] = $header;
    }

    function getContent()
    {
        return $this->content;
    }

    function getCode()
    {
        return $this->code;
    }

    function send()
    {
        $this->setHeader('HTTP/1.1 '.$this->code . ' ' . $this->msg);

        header(implode("\n", $this->headers));

        echo $this->getContent();
    }
}
