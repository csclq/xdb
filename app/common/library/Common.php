<?php

namespace App\Library;


use App\Models\XdbOrder;
use App\Models\XdbOrderPayment;
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

        if($GLOBALS['config']['super_role']==$_SESSION['role_id']){
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
        if($GLOBALS['config']['super_role']==$_SESSION['role_id']){
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

    public function autobuy(){

        $now=date("Y-m-d H:i:s",time()-4*60*60);                //设置时间4小时
        $where=[];
        $where['conditions']='active=1 and status=0 and submitted_at <"'.$now.'"';
        $pre=XdbOrder::find($where);
        if($pre){
            foreach ($pre as $v){
                $openid = 'ofLKNwjl4M52phuU39t7BLRluzQg';
                $nickname = '张明';
                $avatar = 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLBREBZhyp7uW2g4Mr2vgsCiaLPG1Ezd8pgwepoSwZPgPrlVZkVoMEVrfHarEGxSe1K59YIE9T21DpA/132';
                $orderid = $v->getId();
                $tran = '50042820012017032343' . substr((time() + $v->getId()) . '', 2);
                $paid = 19.9;
                $paid_at = date('Y-m-d H:i:s');
                $refund = 0;
                $refund_applied = 0;
                $last_id = $v->getId();
                $goods_id = substr($v->getProductId(), 0, strpos($v->getProductId(), ','));

                $v->setPaid($goods_id);
                $v->setStatus(1);
                $v->update();
                $payment=new XdbOrderPayment();
                $payment->setOpenid($openid);
                $payment->setNickname($nickname);
                $payment->setAvatar($avatar);
                $payment->setOrderId($orderid);
                $payment->setTransactionId($tran);
                $payment->setPaid($paid);
                $payment->setPaidAt($paid_at);
                $payment->setGoodsId($goods_id);
                $payment->setRefunded($refund);
                $payment->setRefundApplied($refund_applied);
                $payment->setLastId($last_id);
                $payment->save();
            }
        }

    }

}