<?php
namespace App\Modules\Backend\Controllers;

use App\Library\Captcha;
use App\Models\YztAdmin;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;

class LoginController extends Controller {

    public function indexAction(){
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);

    }

    public function loginAction(){                  //登录验证
        $this->view->disable();
        $code=trim(htmlspecialchars($this->request->getPost('code')));
        if(strtolower($code)!=$this->session->get('verify_code')){
            echo "<script>alert('验证码错误');history.back();</script>";
        }
        $username=trim(htmlspecialchars($this->request->getPost('username')));
        $password=md5(trim(htmlspecialchars($this->request->getPost('password'))));
        if(empty($code)||empty($username)||empty($password)){
            echo "<script>alert('用户名或密码不能为空');history.back();</script>";
        }
        $where=array(
                "username =  :name: and password = :passwd:",
                 'bind'  =>  array(
                'name'  =>  $username,
                'passwd'    =>  $password
            )
        );
        $user=YztAdmin::findFirst($where);
        if($user){
            if($user->getActive()==0){
                echo "<script>alert('该用户已经被冻结');history.back();</script>";
                exit;
            }
            $this->session->set('role_id',$user->getRoleId());
            $this->session->set('user_name',$username);
            $this->session->set('user_id',$user->getId());
//            header("location:/backend/system/user");
           $this->response->redirect('/backend/system/user');
        }else{
           echo "<script>alert('用户名或密码错误');history.back();</script>";
            exit;
        }
    }

    public function verifyAction(){               //验证码
        $this->view->setRenderLevel(VIEW::LEVEL_NO_RENDER);
        ob_clean();
        header('Content-type: image/png');
        $captcha=new Captcha();
        $captcha->build();
    }

    public function logoutAction(){             //销毁SESSION退出登录
        $this->session->destroy();
        return $this->dispatcher->forward(array(
            'action'    =>  'index'
        ));

    }
}