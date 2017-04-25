<?php

namespace App\Modules\Gxc\Controllers;

class IndexController extends ControllerBase{

    public function indexAction(){
        $this->view->disable();
    }

    public function testAction(){
        $this->view->disable();
        echo microtime(true)*10000;
    }

}