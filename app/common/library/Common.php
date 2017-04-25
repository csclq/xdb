<?php

namespace App\Library;


use App\Models\YztApp;
use App\Models\YztAuth;
use App\Models\YztGxcUser;

class Common
{
    public   $accessList=[];
    public function register(Array $parm)
    {
        if (count($parm) < 1) {
            return false;
        } else {
            $user = new YztGxcUser();
            $user->save($parm);
            return $user;
        }
    }

    public  function infinate($arr,$level=0,$access=null){         //无限极分类
        $res=array();
        for($i=0;$i<count($arr);$i++){
            if(is_array($access)){
                $arr[$i]['checked']=in_array($arr[$i]['id'],$access);
            }else{
                $arr[$i]['checked']=false;
            }
            if($arr[$i]['pid']==$level){
                $arr[$i]['child']=self::infinate($arr,$arr[$i]['id'],$access);
                array_push($res,$arr[$i]);
            }

        }
        return $res;
    }

    public  function getAccess(){

        if($GLOBALS['config']['superadmin']==$_SESSION['user_name']){
            $this->accessList= $this->infinate(YztApp::find()->toArray());
        }else{
            $arr=array();
            $acc=YztAuth::find('role_id='.$_SESSION['role_id']);

            if($acc){
                foreach ($acc as $v){
                    array_push($arr,$v->YztApp->toArray());
                }
            }
          $this->accessList= $this->infinate($arr);
        }
        return $this->accessList;
    }

    public  function check($route){
        $result=false;
        if($GLOBALS['config']['superadmin']==$_SESSION['user_name']){
            $result=true;
        }elseif(strtolower($route->getControllerName())==strtolower($GLOBALS['config']['skip_controller'])){
            $result=true;
        }else{
            foreach ($this->accessList as $v){
                if(strtolower($route->getControllerName())==strtolower(trim($v['name']))){
                    foreach ($v['child'] as $action){
                        if( strtolower($route->getActionName())==strtolower(trim($action['name']))){
                            $result=true;
                        }
                    }
                }
            }}
        return $result;
    }
}