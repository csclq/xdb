<?php
namespace App\Modules\Backend\Controllers;

use App\Library\Common;
use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected $result=[
        'code'=>0,
        'data'=>[],
        'total'=>1,
        'msg'=>''
    ];
    public $uid;
    public $admin;

    public function initialize()
    {
        if (empty($this->session->get('user_id'))) {
            return $this->response->redirect("/backend/login/index");
        }
        $this->uid = $this->session->get('user_id');
        $this->admin = $this->session->get('user_name');
        $this->view->user=$this->session->get('user_name');
        $this->view->menus = $this->common->getAccess();
        $this->view->currentcontroller=$this->dispatcher->getControllerName();
        $this->view->currentaction=$this->dispatcher->getActionName();






        if (!$this->common->check($this->dispatcher)) {
            return $this->dispatcher->forward([
                'controller' =>  'index',
                'action'    =>  'index'
            ]);
            echo "<script>alert('您的权限不足');history.back()</script>";
        }
    }
}
