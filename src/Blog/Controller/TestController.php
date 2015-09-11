<?php
/**
 * Description:
 * User: JuraZubach
 * Date: 11.09.15
 */

namespace Blog\Controller;

use Framework\Controller\Controller;
use Framework\Response\JsonResponse;

class TestController extends Controller
{
    public function redirectAction()
    {
        return $this->redirect('/');
    }

    public function getJsonAction()
    {
        return new JsonResponse(array('body' => 'Hello World'));
    }
} 