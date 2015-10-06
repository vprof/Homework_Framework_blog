<?php

namespace Framework\Response;


use Framework\Response\Response;

class JsonResponse extends Response{

    public $type = 'json';

    function send()
    {
        $this->setHeader('HTTP/1.1 '.$this->code . ' ' . $this->msg);
        $this->setHeader('Content-Type: application/json');

        header(implode("\n", $this->headers));

        echo json_encode($this->getContent());
    }

}
