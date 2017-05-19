<?php

namespace App\Modules\Gxc\Controllers;

class IndexController extends ControllerBase{

    public function indexAction(){
        $this->view->disable();
    }

    public function testAction(){
       $this->view->disable();
       echo "<pre>";
       var_dump($_SESSION);
        echo $this->nickname;
        echo "<br />";
        $str = preg_replace_callback('/./u',  function (array $match) {
                return strlen($match[0]) >= 4 ? '' : $match[0];
            },
            $this->nickname);
        echo $str;
        echo "<br />";

    }
}