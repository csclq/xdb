<?php

namespace App\Modules\Backend\Controllers;

use App\Models\XdbOrder;
use App\Models\XdbOrderHit;
use App\Models\XdbProduct;
use App\Models\YztAdmin;

class IndexController extends ControllerBase{

    public function indexAction(){
        $this->view->over=XdbProduct::count('stock <= 0');
        $this->view->send=XdbOrder::count('status=1 and active=1');
        $this->view->finish=XdbOrder::count('status=3 and active=1');
        $this->view->count=XdbOrderHit::count('add_at >= '.strtotime(date("Y-m-d")));
    }

    public function cacheAction(){
        $this->view->disable();
        if($dir=opendir($this->config->application['cacheDir'])){
            while($file=readdir($dir)){
                if(is_file($this->config->application['cacheDir'].$file))
               unlink($this->config->application['cacheDir'].$file);
            }
        }
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