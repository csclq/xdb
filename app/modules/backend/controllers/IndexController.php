<?php

namespace App\Modules\Backend\Controllers;

use App\Models\YztAdmin;

class IndexController extends ControllerBase{

    public function indexAction(){
        if($this->request->isPost()){
            $this->view->disable();
            echo "<pre>";
            print_r($this->request->getPost());
            echo "<hr />";
            print_r($_POST);
        }

    }

    public function testAction(){
        $this->view->disable();
        echo __METHOD__;
    }

    public function chpassAction()
    {              //密码修改
        if ($this->request->isPost()) {
            $this->view->disable();
            $oldpass=trim($this->request->getPost('oldpass'));
            $newpass=trim($this->request->getPost('newpass'));
            if(empty($oldpass)||empty($newpass)){
                echo "<script>alert('密码不能为空'),history.back();</script>";
                exit;
            }
            $user=YztAdmin::findFirst($this->uid);
            if(md5($oldpass)!=$user->getPassword()){
                echo "<script>alert('原密码错误'),history.back();</script>";
                exit;
            }
            $user->setPassword(md5($newpass));
            $user->update();
            echo "<script>alert('密码修改成功'),history.back();</script>";
            exit;
        }else{
            $this->response->setStatusCode(404, "Not Found");
        }
    }

}