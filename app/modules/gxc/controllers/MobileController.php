<?php

namespace App\Modules\Gxc\Controllers;

use App\Models\XdbProduct;

class MobileController extends ControllerBase{


    public function initialize(){
    }


    public function indexAction(){
        $filt=['hot','new','fashion'];
        $where=array();
        $where['conditions']='deleted=0';
        if(in_array($this->dispatcher->getParam(0),$filt)){
            $where['conditions'].=" and ". $this->dispatcher->getParam(0)."=1";
        }
        $where['limit']=5;
        $where['order']='sort desc';

        $product=XdbProduct::find($where);
        $this->view->products=$product->toArray();

    }

    public function testAction(){

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