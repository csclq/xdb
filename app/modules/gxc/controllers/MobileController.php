<?php

namespace App\Modules\Gxc\Controllers;

use App\Models\XdbOrder;
use App\Models\XdbOrderHit;
use App\Models\XdbOrderPayment;
use App\Models\XdbProduct;
use App\Models\XdbStarRule;
use EasyWeChat\Payment\Order;

class MobileController extends ControllerBase{



    public function indexAction(){

        if($this->request->isPost()){
            $this->view->disable();
            if($this->request->getPost('goodsID','int')){
                $this->db->execute('update xdb_product set uniacid=uniacid + 1 where id='.$this->request->getPost('goodsID','int'));
            }
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
                $this->result['data']=$product->toArray();
                $add['conditions']='openid="'.$this->openid.'"';
                $add['order']='id desc';
                $add['columns']='province,city,district,address,fullname,mobile';
                $address=XdbOrder::findFirst($add);
                if($address){
                    $this->result['historyAddress']=implode(',',$address->toArray());
                }




                echo json_encode($this->result);
            }

        }
        $id=$this->dispatcher->getParam(0,'int')??1;
        $real=XdbOrder::findFirst('id='.$id);
        $real || exit("缺少必要的参数");

        $hited=false;
        if($this->openid!=$real->getOpenid()){
            $parent=XdbOrderHit::findFirst('openid="'.$this->openid.'"');
            if(!$parent){
                $hited=true;
            }else{
                if($parent->getOrderOpenId()==$real->getOpenid()){
                    $hit=XdbOrderHit::findFirst('order_id='.$id.' and openid="'.$this->openid.'"');
                    if(!$hit){
                        $hited=true;
                    }
                }
            }
        }
//        if($hited){
            $newhit=new XdbOrderHit();
            $newhit->setOrderId($id);
            $newhit->setOrderOpenId($real->getOpenid());
            $newhit->setNickname($this->nickname);
            $newhit->setOpenid($this->openid);
            $newhit->setActive(1);
            $newhit->setAddAt(time());
            $newhit->create();
//        }

        $real && $this->view->lastId=$real->getLastId();
        $this->view->orderid=$id;
    }



    public function commontAction(){

    }
    public function detailAction(){

    }
    public function detailsAction(){

    }
    public function linkAction(){
        $info=null;
        $where['conditions']='active = 1 and openid="'.$this->openid.'"';
        $where['order'] = 'id desc';
        $where['colunms']='id,submitted_at';
        $info=XdbOrder::find($where);
        $this->view->info=$info->toArray();


    }
    public function olistAction(){

    }
    public function orderAction(){

    }
    public function orderinfoAction(){

        $orderid=$this->dispatcher->getParam(0,'int');
        $orderid || exit("缺少必要的参数");
        $order=XdbOrder::findFirst('id='.$orderid)->toArray();
        $product=XdbProduct::find('id in ('.$order['product_id'].')')->toArray();
        $paid=explode(',',$order['paid']);
        $send=explode(',',$order['send']);

        foreach ($product as $k=>$v){
            $product[$k]['status']=0;
            if(in_array($v['id'],$paid)){
                $product[$k]['status']=1;
            }
            if(in_array($v['id'],$send)){
                $product[$k]['status']=2;
            }
        }


        $order['product']=$product;
        $where['conditions']='hit_number <='.$order['hit_number'].' or buy_number <='.$order['buy_number'];
        $where['order']='star desc';
        $star=XdbStarRule::findFirst($where);
        if($star){
            $order['star']=$star->getStar();
        }else{
            $order['star']=0;
        }



        $this->view->order=$order;
        $this->view->count=XdbOrderPayment::count("paid > 0 and last_id=".$orderid)+XdbOrderHit::count('order_id='.$orderid);



    }
    public function orderlistAction(){
        $info=null;
        $where['conditions']='active = 1 and openid="'.$this->openid.'"';
        $where['order'] = 'id desc';
        $where['colunms']='id,unit_price,city,district,address,mobile';
        $info=XdbOrder::find($where);
        $this->view->info=$info;
    }
    public function ordersAction(){

    }
    public function payAction(){

    }
    public function paymentAction(){

        if($this->request->getPost('product_id')){                                                      //生成订单
            if($this->request->getPost('product_id')&&$this->request->getPost('fullname','string')&&$this->request->getPost('province','string')&&$this->request->getPost('city','string')&&$this->request->getPost('district','string')
                &&$this->request->getPost('address','string')&&$this->request->getPost('mobile','int')){
                $xorder=new XdbOrder();
                $xorder->setOpenid($this->openid);
                $xorder->setProductId($this->request->getPost('product_id','string'));
                $xorder->setUnitPrice(19.9);
                $xorder->setQuantity(1);
                $xorder->setFullname($this->request->getPost('fullname','string'));
                $xorder->setProvince($this->request->getPost('province','string'));
                $xorder->setCity($this->request->getPost('city','string'));
                $xorder->setDistrict($this->request->getPost('district','string'));
                $xorder->setAddress($this->request->getPost('address','string'));
                $xorder->setMobile($this->request->getPost('mobile','int'));
                $xorder->setSplitNumber(1);
                $xorder->setStatus(0);
                $xorder->setSubmittedAt(date("Y-m-d H:i:s"));
                $xorder->setNickname($this->nickname);
                $xorder->setAvatar($this->avatar);
                $xorder->setLastId($this->request->getPost('orderid','int'));
                $xorder->setProductDetail($this->request->getPost('product_detail'));
                if(!$xorder->create()){
                    exit("<script>alert('生成订单错误');history.back();</script>");
                }
            }else{
                exit("<script>alert('缺少必要的参数');history.back();</script>");
            }
                $lastid=$this->request->getPost('lastid','int');
                $lastid || exit("缺少必要的参数:".$lastid);
                $paycount=XdbOrderPayment::count('paid >0 and last_id='.$lastid);
                $orderinfo=XdbOrder::findFirst('id='.$lastid);
                $product=explode(',',$orderinfo->getProductId());
                $goodsid=$product[$paycount%9];
                $goodsinfo=XdbProduct::findFirst('id='.$goodsid);
                $goodsinfo || exit("goodsId:".$goodsid." product".$orderinfo->getProductId());

                $fee= $this->config['unify_fee']?$this->config['pay_fee']:$goodsinfo->getPrice()*100;

                $posit=json_decode($orderinfo->getProductDetail(),true);
                $posit=$posit[$goodsid];
                $orderpayment=new XdbOrderPayment();
                $orderpayment->setOpenid($this->openid);
                $orderpayment->setNickname($this->nickname);
                $orderpayment->setAvatar($this->avatar);
                $orderpayment->setOrderId($this->request->getPost('orderid','int'));
                $orderpayment->setLastId($lastid);
                $orderpayment->setGoodsId($goodsid);
                $orderpayment->setPosit($posit);
                $orderpayment->setMyid($xorder->getId());
                $orderpayment->save();

            $payment=$this->weixin->payment;


            $trade_no=dechex(microtime(true)*10000).$orderpayment->getId();
            $attributes = [
                'trade_type'       => 'JSAPI', // JSAPI，NATIVE，APP...
                'body'             => $goodsinfo->getName(),
                'detail'           => $goodsinfo->getName(),
                'out_trade_no'     => $trade_no,
                'total_fee'        => $fee, // 单位：分
                'notify_url'       =>'http://web.5xieys.cn/index/notify', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
                'openid'           => $this->openid, // trade_type=JSAPI，此参数必传，用户在商户appid下的唯一标识，
            ];

            $order = new Order($attributes);
            $result = $payment->prepare($order);
            $this->view->fee=$fee;
            $this->view->goods=$goodsinfo->getName();
            if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS'){
                $prepayId = $result->prepay_id;
                $this->view->json=$payment->configForPayment($prepayId);
                $this->view->trade_no=$trade_no;
                $this->view->myid=$orderpayment->getMyid();
            }else{
                $this->view->disable();
                var_dump($result);
            }

        }else{
            $this->view->disable();
            exit("<script>alert('缺少必要的参数');history.back();</script>");
        }

    }
    public function payment1Action(){

        $orderid=$this->dispatcher->getParam(0,'int');

        if(!$orderid){
            $this->result['code']=1;
            $this->result['msg']="缺少订单号";
            exit(json_encode( $this->result));
        }

        $order=XdbOrder::findFirst('id='.$orderid);

        if(!$order){
            $this->result['code']=1;
            $this->result['msg']="该订单号不存在";
            exit(json_encode( $this->result));
        }

        $this->result['owner']= $this->openid==$order->getOpenid();

        if($this->request->isPost()){
            $this->view->disable();

            if($this->request->getPost('type')=='init'){
                $this->result['data']['order_hit']=$order->getHitNumber();
                $this->result['data']['order_payment']=$order->getBuyNumber();

                $where['conditions']=' id in ('.$order->getProductId().')';
                $where['columns']='pic_url';
                $product=XdbProduct::find($where);
                $this->result['data']['order_details']= array_reverse(array_column($product->toArray(),'pic_url'));
                unset($where);
                $where['conditions']=' hit_number <= :hit: or buy_number <= :buy:';
                $where['bind']=['hit'=>$this->result['data']['order_hit'],'buy'=>$this->result['data']['order_payment']];
                $where['order']='id desc';
                $star=XdbStarRule::findFirst($where);

                if($star){
                    $this->result['data']['islandsCount']=$star->getStar();
                }else{
                    $this->result['data']['islandsCount']=0;
                }


                $stars=XdbStarRule::find()->toArray();

                $this->result['data']['hit_number']=array_column($stars,'hit_number');
                $this->result['data']['buy_number']=array_column($stars,'buy_number');
                $this->result['data']['openid_details']=[$order->getAvatar(),$order->getNickname()];
                $this->result['data']['identity']=false;
                $Identity= XdbOrderHit::findFirst('openid="'.$this->openid.'"');
                if($Identity)  $this->result['data']['identity']=true;



                $this->result['data']['islandsTime']=[];

                $hit=XdbOrderHit::find('order_id='.$orderid.' and active=1');
                if($hit){
                    foreach ($hit as $v){
                        array_push($this->result['data']['islandsTime'],array('hit'=> [ $v->getNickname(),  date('Y-m-d H:i:s',$v->getAddAt())]));
                    }
                }

                $payment=XdbOrderPayment::find('last_id='.$orderid.' and paid>0 and expire=0');
                if($payment){
                    foreach ($payment as $v){
                        array_push($this->result['data']['islandsTime'],array('buy'=>[$v->getNickname(),$v->getPaidAt()]));
                    }
                }
            }

            if($this->request->getPost('type')=='update'){

                $this->result['data']['order_hit']=$order->getHitNumber();
                $this->result['data']['order_payment']=$order->getBuyNumber();
                $hit=XdbOrderHit::find('active=1');
                $payment=XdbOrderPayment::find(' paid>0 and expire=0');
                $arr=[];
                foreach ($hit as $v){
                    array_push($arr,[$v->getNickname(),date('Y-m-d H:i:s', $v->getAddAt())]);
                }
                foreach ($payment as $v){
                    array_push($arr,[$v->getNickname(),$v->getPaidAt()]);
                }

                usort($arr,function ($a,$b){
                   return strcmp($b[1],$a[1]);
                });

                $this->result['data']['NumOfParticipants']=count($arr);
                $this->result['data']['MesOfParticipants']=array_slice($arr,0,5);

            }

            echo json_encode($this->result);

        }

        $js=$this->weixin->js;

        $this->view->orderid=$orderid;
        $this->view->js=$js;
        $this->view->ticket=$js->ticket();

    }
    public function payment2Action(){

    }
    public function paymentsAction(){


        $this->view->disable();
       file_put_contents(getcwd()."/public/a.txt",json_encode($_REQUEST));

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