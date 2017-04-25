<?php

namespace App\Modules\Backend\Controllers;


class UserController extends ControllerBase{

    public function indexAction(){

    }

    public function testAction(){
    }

    public function userlistAction()
    {
        if($this->request->isPost()){
            $this->view->disable();
            $info=[];
            $info['data']=[
                ['name'=>'zhangsan','age'=>25,'weight'=>170],
                ['name'=>'lishi','age'=>24,'weight'=>171],
                ['name'=>'wangwu','age'=>23,'weight'=>172],
                ['name'=>'zhaoliu','age'=>22,'weight'=>173],
                ['name'=>'wangchao','age'=>21,'weight'=>174],
                ['name'=>'mahan','age'=>20,'weight'=>175],
            ];
            $info['total']=5;
            echo json_encode($info);


        }



    }

}