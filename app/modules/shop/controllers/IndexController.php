<?php

namespace App\Modules\Shop\Controllers;

class IndexController extends ControllerBase{

    public function indexAction(){
        $this->view->disable();
    }

    public function testAction(){
        $this->view->disable();
        echo __METHOD__;
    }

}