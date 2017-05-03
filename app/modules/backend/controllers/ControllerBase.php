<?php

namespace App\Modules\Backend\Controllers;

use App\Library\Common;
use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected $result = [
        'code' => 0,
        'data' => [],
        'total' => 1,
        'msg' => ''
    ];
    protected $uid;
    protected $admin;
    protected $post;

    public function initialize()
    {
        if (empty($this->session->get('user_id'))) {                                                //未登录用户跳转到登录页面
            return $this->response->redirect("/backend/login/index");
        }
        $this->uid = $this->session->get('user_id');
        $this->admin = $this->session->get('user_name');
        $this->view->user = $this->session->get('user_name');
        $this->view->menus = $this->common->getAccess();
        $this->view->currentcontroller = $this->dispatcher->getControllerName();
        $this->view->currentaction = $this->dispatcher->getActionName();


        if ($this->request->isPost()) {
            $this->view->disable();
            if ($this->session->get('_token') != $this->request->getPost('token')) {
                $this->result['code'] = 1009;
                $this->result['msg'] = '非法操作: ' . $this->session->get('_token') . " : " . $this->request->getPost('token');
                exit(json_encode($this->result));
            }

            foreach ($this->request->getPost() as $k => $v) {
                if ($k == 'token') {
                    continue;
                }
                if ($k == 'content' || is_array($v) || is_object($v)) {
                    $this->post[$k] = $v;
                } else {
                    $this->post[$k] = $this->request->getPost($k, 'string');
                }
            }
        }

        if ($this->request->isGet()) {
            $token = bin2hex(random_bytes(10));
            $this->view->token = $token;
            $this->session->set('_token', $token);
        }

        if (!$this->common->check($this->dispatcher)) {
            return $this->dispatcher->forward([
                'controller' => 'index',
                'action' => 'index'
            ]);
            exit ("<script>alert('您的权限不足');history.back()</script>");
        }
    }
}
