<?php

namespace App\Modules\Gxc\Controllers;

use App\Models\XdbOrder;
use App\Models\XdbProduct;

class MobileController extends ControllerBase{



    public function indexAction(){
        if($this->request->isPost()){
            $this->view->disable();
            if(is_numeric( $p=$this->request->getPost('p'))){
                $filt=['hot','new','fashion'];

                $where=array();
                $where['conditions']=' deleted=0 ';
                if(in_array($this->dispatcher->getParam(0),$filt)){
                    $where['conditions'].=" and ". $this->dispatcher->getParam(0)."=1";
                }
                $where['order']='sort desc';
                $total=XdbProduct::count($where);
                $where['limit']=array('number' => $this->config->pageNum,//$GLOBALS['config']['pageNum'],
                    'offset' => ($p - 1) * $this->config->pageNum);
                $product=XdbProduct::find($where);

                $this->result['total']=ceil($total/$this->config->pageNum);
                $this->result['data']=$product->toArray();;
                echo json_encode($this->result);
            }
            if($this->request->getPost('product_id')){                                                      //生成订单
                if($this->request->getPost('product_id')&&$this->request->getPost('fullname','string')&&$this->request->getPost('province','string')&&$this->request->getPost('city','string')&&$this->request->getPost('district','string')
                &&$this->request->getPost('address','string')&&$this->request->getPost('mobile','int')&&$this->request->getPost('last_id','int')){
                    $order=new XdbOrder();
                    $order->setOpenid($this->openid);
                    $order->setProductId($this->request->getPost('product_id','string'));
                    $order->setUnitPrice(19.9);
                    $order->setQuantity(1);
                    $order->setFullname($this->request->getPost('fullname','string'));
                    $order->setProvince($this->request->getPost('province','string'));
                    $order->setCity($this->request->getPost('city','string'));
                    $order->setDistrict($this->request->getPost('district','string'));
                    $order->setAddress($this->request->getPost('address','string'));
                    $order->setMobile($this->request->getPost('mobile','int'));
                    $order->setSplitNumber(1);
                    $order->setStatus(0);
                    $order->setSubmittedAt(date("Y-m-d H:i:s"));
                    $order->setNickname($this->nickname);
                    $order->setAvatar($this->avatar);
                    $order->setLastId($this->request->getPost('last_id','int'));
                    if(!$order->create()){
                        $this->result['code']=1;
                        $this->result['msg']='生成订单错误';
                    }
                }else{
                    $this->result['code']=2;
                    $this->result['msg']='缺少必要参数';
                }

                echo json_encode($this->result);
            }
        }
    }

    public function testAction(){

        $this->view->disable();
        echo "<pre>";
        echo 'openid:',$this->session->get("openid"),'<br />';
        echo 'nickname:',$this->session->get("nickname"),'<br />';
        echo 'avatar:',$this->session->get("avatar"),'<br />';

    }

    public function commontAction(){

    }
    public function detailAction(){

    }
    public function detailsAction(){

    }
    public function linkAction(){

    }
    public function olistAction(){

    }
    public function orderAction(){

    }
    public function orderinfoAction(){

    }
    public function orderlistAction(){

    }
    public function ordersAction(){

    }
    public function payAction(){

    }
    public function paymentAction(){

    }
    public function payment1Action(){

    }
    public function payment2Action(){

    }
    public function paymentsAction(){

    }
    public function uploadAction(){

    }
    public function view_detailAction(){

    }

    public function imgAction(){
        $this->view->disable();
        $filt=['hot','new','fashion'];
        $where=array();
        $where['conditions']='deleted=0';
//        $where['deleted']=1;
//        if(is_numeric($this->request->getPort('cate'))){
//            $where['category_id']=$this->request->getPort('cate');
//        }
        if(in_array($this->dispatcher->getParam(0),$filt)){
            $where['conditions'].=" and ". $this->dispatcher->getParam(0)."=1";
        }
        $where['limit']=5;
        $where['order']='sort desc';

        $product=XdbProduct::find($where);
        echo "<pre>";
        var_dump($where);
        var_dump($product->toArray());
    }

}