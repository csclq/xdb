<?php
namespace App\Modules\Gxc\Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected $result=[
        'code'=>0,
        'data'=>[],
        'msg'=>''
    ];

    protected $openid='';
    protected $nickname='';
    protected $avatar='';



    public function initialize(){
        if(empty($this->session->get("openid"))){
            $response=$this->weixin->oauth->scopes(['snsapi_userinfo']) ->redirect('http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]);
            $response->send();
            $user=$this->weixin->oauth->user();
            $this->session->set('openid',$user->id);
            $this->session->set('nickname',$user->nickname);
            $this->session->set('avatar',$user->avatar);
        }
        $this->openid=$this->session->get('openid');
        $this->nickname=$this->session->get('nickname');
        $this->avatar=$this->session->get('avatar');
    }

}
