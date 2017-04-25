<?php

namespace App\Modules\Gxc\Controllers;



use App\Models\YztGxcUser;
use App\Models\YztWechatMessage;
use EasyWeChat\Message\Image;
use EasyWeChat\Message\News;
use EasyWeChat\Message\Text;

class WechatController extends ControllerBase
{

    const EXPIRE=259200;

    public function initialize()
    {
        $this->view->disable();
    }


    public function indexAction()
    {
        $this->view->disable();
        $server = $this->weixin->server;
        $userService=$this->weixin->user;
        $server->setMessageHandler(function ($message) use($userService) {
            $usr=YztGxcUser::findFirst('openid="'.$message->FromUserName.'"');                        //查询用户注册情况
            if(!$usr){                                                                          //未注册用户进行注册
                $user=$userService->get($message->FromUserName);                                //根据微信openid获取用户的微信信息
                $member['nickname']=$user->nickname;
                $member['sex']=$user->sex;
                $member['province']=$user->province;
                $member['city']=$user->city;
                $member['avatar']=$user->headimgurl;
                $member['openid']=$message->FromUserName;
                $member['salt'] = hash('md4',(microtime(true)*10000).rand(1000,9999),false);
                (strpos($message->EventKey,'qrscene_')==0)&&$member['recommend']=substr($message->EventKey,8);
                is_numeric($member['recommend'])||$member['recommend']=0;
                if(!$usr=$this->common->register($member)){
                    return "注册失败，请联系管理员";
                }                                               //注册用户
            }
            $this->persistent->openid=$message->FromUserName;
            $this->persistent->uid=$usr->getId();
         return  $this->message($message);
        });
        $respond = $server->serve();
        $respond->send();
    }

    public function testAction()
    {
        $this->view->disable();

//        $qrcode=$this->weixin->qrcode;
//        $result = $qrcode->temporary("o85-QwxURhlca1MKqyDq3BYP1L9A", 6 * 24 * 3600);
//        $qr=$qrcode->url($result->ticket);
//        $qrimg=imagecreatefromjpeg($qr);
        $imgname=BASE_PATH.'/public/'.$this->config->shareQrcode['background'];
        if(!file_exists($imgname)){
            return false;
        }
        $resource=imagecreatefromjpeg($imgname);
        $savename=BASE_PATH.'/public/img/recommend/'.uniqid().'.jpg';
        $ttffile=BASE_PATH.'/public/files/ttf/stkaiti.ttf';
        $ttf=imageloadfont($ttffile);
       var_dump(imagestring($resource,$ttf,280,85,"众志成城",imagecolorallocate($resource,255,0,0)));
       var_dump(imagestring($resource,$ttf,210,120,"VS20017",imagecolorallocate($resource,255,0,0)));
//       var_dump(imagestring($resource,18,0,210,120,imagecolorallocate($resource,0,255,255),$ttffile,"VS20017"));

//        imagecopymerge($resource,$qrimg,64,704,0,0,160,160,80);
        var_dump(imagejpeg($resource,$savename));

    }

    protected  function message($message)               //消息处理
    {
        switch ($message->MsgType) {
            case 'event':
//                if($message->EventKey){
//                    $msg=YztWechatMessage::findFirst('type="event" and event="'.$message->Event.'" and eventkey="'.$message->EventKey.'"');
//                }else{
//                    $msg=YztWechatMessage::findFirst('type="event" and event="'.$message->Event.'"');
//                }
                $msg['media_id']=$this->qrcode($message->FromUserName);
                $msg['reply_type']='image';
//                $msg=$msg->toArray();
                break;
            case 'text':
                $info=YztWechatMessage::find('type="text"');
                if($info){
                    foreach ($info->toArray() as $value){
                        if(strtolower($message->Content)==strtolower($value['keyword'])){
                            $msg=$value;
                            goto send;
                        }
                    }
                    foreach ($info->toArray() as $value){
                        if(stripos(strtolower($value['keyword']),strtolower($message->Content)) !== false){
                            $msg=$value;
                            goto send;
                        }
                    }
                    foreach ($info->toArray() as $value){
                        if($value['keyword']=='default'){
                            $msg=$value;
                            goto send;
                        }
                    }
                }
                return 'openid:'.$this->persistent->openid." uid:".$this->persistent->uid;
                break;
            case 'image':
                return '收到图片消息';
                break;
            case 'voice':
                return '收到语音消息';
                break;
            case 'video':
                return '收到视频消息';
                break;
            case 'location':
                return '收到坐标消息';
                break;
            case 'link':
                return '收到链接消息';
                break;
            // ... 其它消息
            default:
                return '收到其它消息';
                break;
        }
        send:
       $method='send'.ucfirst($msg['reply_type']);
        return $this->$method($msg);

    }



    protected function sendText(Array $msg){                //回复文本消息
        $text = new Text();
        $text->content=$msg['reply_content'];
        return $text;
    }

    protected function sendNews(Array $msg){                //回复图文消息
       $news = new News();
       $news->title=$msg['reply_title'];
       $news->description=$msg['reply_content'];
       $news->url=$msg['reply_url'];
       $news->image=$msg['reply_img'];
       return $news;
    }

    protected function sendImage(Array $msg){               //回复图片消息
        $img = new Image();
        if(empty($msg['media_id'])){
            if(empty($msg['reply_img'])){
                $msg['reply_content']="图片发送错误，请检查";
                return $this->sendText($msg);
                exit;
            }
           if($media_id=$this->materialImg($msg['reply_img'])){
                $msg['media_id']=$media_id;
           }else{
               $msg['reply_content']="图片发送错误，请检查";
               return $this->sendText($msg);
               exit;
           }
        }
        $img->media_id = $msg['media_id'];
        return $img;
    }

    public function notifyAction()
    {
        $this->view->disable();
        echo "<pre>";

      $resp= $this->weixin->oauth->scopes(['snsapi_userinfo'])->setRedirectUrl("http://mzx.5xieys.cn/gxc/wechat/call?li=haha")->redirect();
      $resp->send();
    }


    protected function getUrl($path){                               //设置微信url回调地址
        $this->view->disable();
        $path="/".trim($path,'/');
        if($_SERVER['SERVER_PORT']==80){
            $url=$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.$this->dispatcher->getModuleName().'/'.$this->dispatcher->getControllerName().'/call?parms=' .$path;
        }else{
            $url=$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].':'.$_SERVER['SERVER_PORT'].'/'.$this->dispatcher->getModuleName().'/'.$this->dispatcher->getControllerName().'/call?parms=' .$path;
        }
        $resp= $this->weixin->oauth->scopes(['snsapi_userinfo'])->setRedirectUrl($url)->redirect();
        return $resp->getTargetUrl();
    }


    public function callAction()
    {
       $this->view->disable();
       $user=$this->weixin->oauth->user();
       $original=$user->getOriginal();
        $usr=YztMxcUser::findFirst('openid="'.$user->getId().'"');
        if(!$usr){                                                                          //未注册用户进行注册
            $member['nickname']=$original['nickname'];
            $member['sex']=$original['sex'];
            $member['province']=$original['province'];
            $member['city']=$original['city'];
            $member['avatar']=$original['headimgurl'];
            $member['openid']=$original['openid'];
           $usr= $this->common->register($member);                                               //注册用户
            $uid=$usr->getId();
        }else{
            $uid=$usr->getId();
        }
        header("location:".$_REQUEST['parms']."?uid=".$uid.'&openid='.$usr->getOpenid());
    }

    public function menuAction()                                //自定义菜单
    {
        $this->view->disable();
      if($this->request->isPost()){
          $buttons=$this->request->getPost();
        foreach ($buttons as $k => $v) {
            foreach ($v as $i => $j){
                if ($i == 'url') {
                    $buttons[$k][$i] = $this->getUrl($j);
                }
                if ($i == 'sub_button') {
                    foreach ($j as $key => $value) {
                        foreach ($value as $m => $n){
                            if ($m == 'url') {
                                $buttons[$k][$i][$key][$m] = $this->getUrl($n);
                            }
                        }
                    }
                }
            }
        }
        $this->weixin->menu->add($buttons);
      }
    }

    protected function materialImg($img){
        $this->view->disable();
        if(!file_exists($img)){
            $img=BASE_PATH.'/public/'.$img;
        }
        if(!file_exists($img)){
            return false;
        }
        if(filesize($img)>1000000){                 //圖片不能大于1M
            return false;
        }
        $material = $this->weixin->material_temporary;      //臨時素材
        $result = $material->uploadImage($img);
         return $result->media_id;
    }



    protected function qrcode($openid){                                     //獲取推薦同心卡的mediaid
        $this->view->disable();
        $user=YztGxcUser::findFirst('openid="'.$openid.'"');    //根據OPENID獲取用戶信息
        if($user){
            $username=empty($user->getRealname())?$user->getNickname():$user->getRealname();            //設置用戶名字，無真姓名取微信昵稱
            $wdsn=empty($user->getCardsn())?'WD??????':$user->getCardsn();                              //設置同心卡號
            $userinfo=$user->YztGxcUserinfo[0];
            $media_time= $userinfo->getMediaidTime()??0;
            $img=null;
            if($userinfo->getMediaidTime() + self::EXPIRE > time() && filemtime($userinfo->getRecommendPic()) > $user->getUpdateAt()){                                  //判斷MEDIAID是否過期
                return $userinfo->getRecommendMediaid();
            }else{
                if(!file_exists($userinfo->getRecommendPic()) || filemtime($userinfo->getRecommendPic()) < $user->getUpdateAt()){
                    unlink($userinfo->getRecommendPic());                                                                                                                   //刪除過期圖片
                    $qrcode=$this->weixin->qrcode;
                    $result = $qrcode->temporary($user->getId(), self::EXPIRE);
                    $qrimg=imagecreatefromjpeg($qrcode->url($result->ticket));
                    $headimg=imagecreatefromjpeg($user->getAvatar());
                    $imgname=BASE_PATH.'/public/'.$this->config->shareQrcode['background'];
                    if(!file_exists($imgname)){
                        return false;
                    }
                    $resource=imagecreatefromjpeg($imgname);
                    $savename=BASE_PATH.'/public/img/recommend/'.uniqid().'.jpg';
                    $ttffile=BASE_PATH.'/public/files/ttf/stkaiti.ttf';
                    $ttf=imageloadfont($ttffile);
                    imagestring($resource,$ttf,280,85,$username,imagecolorallocate($resource,255,0,0));
                    imagestring($resource,$ttf,210,120,$wdsn,imagecolorallocate($resource,255,0,0));
                    $dst_qr=imagecreatetruecolor(200,200);
                    $dst_head=imagecreatetruecolor(160,160);

                    imagecopyresized($dst_head,$headimg,0,0,0,0,160,160,imagesx($headimg),imagesy($headimg));
                    imagecopymerge($resource, $dst_head, 20, 40, 0,0,160, 160, 100);
                    imagecopyresized($dst_qr,$qrimg,0,0,0,0,200,200,imagesx($qrimg),imagesy($qrimg));
                    imagecopymerge($resource, $dst_qr, 40, 710, 0,0,200, 200, 100);
                    if(imagejpeg($resource,$savename)){
                        $img=$savename;
                    }
                }else{
                    $img=$userinfo->getRecommendPic();
                }
                $media_id=$this->materialImg($img);
                $userinfo->setRecommendPic($img);
                $userinfo->setRecommendMediaid($media_id);
                $userinfo->setMediaidTime(time());
                $userinfo->save();
                return $media_id;
            }
        }


    }


}

