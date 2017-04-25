<?php

namespace App\Modules\Crowdfund\Controllers;


class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->disable();
        echo __METHOD__;
    }


}

