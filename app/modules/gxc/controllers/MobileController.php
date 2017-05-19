<?php

namespace App\Modules\Gxc\Controllers;

use App\Models\XdbInquiry;
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
                $product=XdbProduct::find($where)->toArray();
                foreach ($product as $k => $v){
                    $inqu['conditions']='product_id = '.$v['id'];
                    $product[$k]['all']=0;
                    $product[$k]['all0']=0;
                    $product[$k]['all1']=0;
                    $product[$k]['all2']=0;
                    $product[$k]['pack']=0;
                    $product[$k]['pack0']=0;
                    $product[$k]['pack1']=0;
                    $product[$k]['pack2']=0;
                    $product[$k]['prices']=0;
                    $product[$k]['prices0']=0;
                    $product[$k]['prices1']=0;
                    $product[$k]['prices2']=0;
                    $product[$k]['use']=0;
                    $product[$k]['use0']=0;
                    $product[$k]['use1']=0;
                    $product[$k]['use2']=0;
                    $product[$k]['next']=0;
                    $product[$k]['next0']=0;
                    $product[$k]['next1']=0;
                    $product[$k]['next2']=0;
                    $inquiry=XdbInquiry::find($inqu);
                    if($inquiry){
                        $product[$k]['all']= $product[$k]['pack']= $product[$k]['prices']= $product[$k]['use']= $product[$k]['next']=count($inquiry->toArray());
                        foreach ($inquiry->toArray() as $value){
                           switch ($value['overall']){
                               case '0':
                                   $product[$k]['all0']++;
                                   break;
                               case '1':
                                   $product[$k]['all1']++;
                                   break;
                               case '2':
                                   $product[$k]['all2']++;
                                   break;
                           }
                            switch ($value['pack']){
                                case '0':
                                    $product[$k]['pack0']++;
                                    break;
                                case '1':
                                    $product[$k]['pack1']++;
                                    break;
                                case '2':
                                    $product[$k]['pack2']++;
                                    break;
                            }
                            switch ($value['price']){
                                case '0':
                                    $product[$k]['prices0']++;
                                    break;
                                case '1':
                                    $product[$k]['prices1']++;
                                    break;
                                case '2':
                                    $product[$k]['prices2']++;
                                    break;
                            }
                            switch ($value['service']){
                                case '0':
                                    $product[$k]['use0']++;
                                    break;
                                case '1':
                                    $product[$k]['use1']++;
                                    break;
                                case '2':
                                    $product[$k]['use2']++;
                                    break;
                            }
                            switch ($value['detail']){
                                case '0':
                                    $product[$k]['next0']++;
                                    break;
                                case '1':
                                    $product[$k]['next1']++;
                                    break;
                                case '2':
                                    $product[$k]['next2']++;
                                    break;
                            }


                        }
                    }
                }





                $this->result['total']=ceil($total/$this->config->pageNum);
                $this->result['data']=$product;
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
        if($hited){
            $newhit=new XdbOrderHit();
            $newhit->setOrderId($id);
            $newhit->setOrderOpenId($real->getOpenid());
            $newhit->setNickname($this->nickname);
            $newhit->setOpenid($this->openid);
            $newhit->setActive(1);
            $newhit->setAddAt(time());
            $newhit->create();
        }

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

        $prodctid=explode(',',$order['product_id']);
        $product=[];
        foreach ($prodctid as $key => $value) {
            $prod=XdbProduct::findFirst('id='.$value);
            if($prod){
                array_push($product,$prod->toArray());
            }
        }


        // $product=XdbProduct::find('id in ('.$order['product_id'].')')->toArray();
        

        $paid=explode(',',$order['paid']);
        $send=explode(',',$order['send']);

        $inqu=XdbInquiry::find('order_id='.$orderid);

        foreach ($product as $k=>$v){
            $product[$k]['status']=0;
            if(in_array($v['id'],$paid)){
                $product[$k]['status']=1;
            }
            if(in_array($v['id'],$send)){
                $product[$k]['status']=2;
            }
                $product[$k]['inqu']=0;
            if($inqu){
                foreach ($inqu->toArray() as $value){
                    if($value['product_id']==$v['id']){
                        $product[$k]['inqu']=1;
                        break;
                    }
                }

            }


        }


        $order['product']=$product;
        $where['conditions']='hit_number <='.$order['hit_number'].' or buy_number <='.$order['buy_number'];
        $where['order']='star desc';
//        $star=XdbStarRule::findFirst($where);
//        if($star){
//            $order['star']=$star->getStar();
//        }else{
//            $order['star']=0;
//        }



        if($this->request->getPost('inquiry')){
            $inquiry=XdbInquiry::findFirst('order_id='.$orderid.' and openid="'.$this->openid.'"  and product_id='.$this->request->getPost('id','int'));
            if(!$inquiry){
                $inquiry=new XdbInquiry();
                $inquiry->setAddAt(time());
                $inquiry->setDetail($this->request->getPost('next','int'));
                $inquiry->setOpenid($this->openid);
                $inquiry->setOrderId($orderid);
                $inquiry->setOverAll($this->request->getPost('all','int'));
                $inquiry->setPack($this->request->getPost('pack','int'));
                $inquiry->setPrice($this->request->getPost('price','int'));
                $inquiry->setService($this->request->getPost('use','int'));
                $inquiry->setProductId($this->request->getPost('id','int'));
                if($inquiry->save()){
                    echo "<script>alert('调查成功');</script>";
                }else{
                    var_dump($inquiry->getMessages());exit;
                }
            }



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
            if($this->request->getPost('product_id')&&$this->request->getPost('fullname','string')&&$this->request->getPost('province','string')&&$this->request->getPost('city','string')
                &&$this->request->getPost('address','string')&&$this->request->getPost('mobile','int')){
                $xorder=new XdbOrder();
                $disrtrict=empty($this->request->getPost('district'))?' ':$this->request->getPost('district','string');
                $xorder->setOpenid($this->openid);
                $xorder->setProductId($this->request->getPost('product_id','string'));
                $xorder->setUnitPrice(19.9);
                $xorder->setQuantity(1);
                $xorder->setFullname($this->request->getPost('fullname','string'));
                $xorder->setProvince($this->request->getPost('province','string'));
                $xorder->setCity($this->request->getPost('city','string'));
                $xorder->setDistrict($disrtrict);
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
//                $lastid=$this->request->getPost('lastid','int');
//                $lastid || exit("缺少必要的参数:".$lastid);
//                $paycount=XdbOrderPayment::count('paid >0 and last_id='.$lastid);
                $paycount=XdbOrderPayment::count('paid >0 and last_id='.$this->request->getPost('orderid','int'));
//                $orderinfo=XdbOrder::findFirst('id='.$lastid);
                $orderinfo=XdbOrder::findFirst('id='.$this->request->getPost('orderid','int'));
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
//                $orderpayment->setLastId($lastid);
                $orderpayment->setLastId($this->request->getPost('orderid','int'));
                $orderpayment->setGoodsId($goodsid);
                $orderpayment->setPosit($posit);
                $orderpayment->setMyid($xorder->getId());
                $orderpayment->save();

            $payment=$this->weixin->payment;


            $trade_no=dechex(microtime(true)*10000).$orderpayment->getId();
            $attributes = [
                'trade_type'       => 'JSAPI', // JSAPI，NATIVE，APP...
                'body'             => '许多宝新品试用平台',//$goodsinfo->getName(),
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


        $hited=false;
        if($this->openid!=$order->getOpenid()){
            $parent=XdbOrderHit::findFirst('openid="'.$this->openid.'"');
            if(!$parent){
                $hited=true;
            }else{
                if($parent->getOrderOpenId()==$order->getOpenid()){
                    $hit=XdbOrderHit::findFirst('order_id='.$orderid.' and openid="'.$this->openid.'"');
                    if(!$hit){
                        $hited=true;
                    }
                }
            }
        }
        if($hited){
            $newhit=new XdbOrderHit();
            $newhit->setOrderId($orderid);
            $newhit->setOrderOpenId($order->getOpenid());
            $newhit->setNickname($this->nickname);
            $newhit->setOrderNickname($order->getNickname());
            $newhit->setOpenid($this->openid);
            $newhit->setActive(1);
            $newhit->setAddAt(time());
            $newhit->create();

            $rule['conditions'] = ' hit_number <= :hit: or buy_number <= :buy:';
            $rule['bind'] = ['hit' => $order->getHitNumber()+1, 'buy' => $order->getBuyNumber()];
            $rule['order'] = 'star desc';
            $star = XdbStarRule::findFirst($rule);
            $expire=strtotime('-1 month');

            if( $star  &&  $star->getStar() > $order->getStars()){
                $order->setStars($star->getStar());
                $order->save();
            }




            if($star && $order->getStatus()<3 && strtotime($order->getSubmittedAt())>$expire ){
                $diff=$star->getStar()-$order->getBuyNumber()-$order->getVirtual();
                $diff_product_arr=explode(',',$order->getProductId());
                $diff_paid_arr=explode(',',$order->getPaid());
                if($diff>0){

                      $diff_product=$diff_product_arr[($order->getBuyNumber()+$order->getVirtual())%count($diff_product_arr)];
                      if(!in_array($diff_product,$diff_paid_arr)){
                          array_push($diff_paid_arr,$diff_product);
                          $order->setPaid(trim(implode(',',$diff_paid_arr),','));
                      }
                      $order->setVirtual($order->getVirtual()+1);
                      $order->setStatus(1);
                      $order->save();

                    $openid = 'ofLKNwjl4M52phuU39t7BLRluzQg';
                    $nickname = '张明';
                    $avatar = 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLBREBZhyp7uW2g4Mr2vgsCiaLPG1Ezd8pgwepoSwZPgPrlVZkVoMEVrfHarEGxSe1K59YIE9T21DpA/132';
                    $orderid = $order->getId();
                    $tran = '50042820012017032343' . substr((time() + $order->getId()) . '', 2);
                    $paid = $fee= $GLOBALS['config']['unify_fee']?($this->config['pay_fee']/100):$order->getUnitPrice();
                    $paid_at = date('Y-m-d H:i:s');
                    $refund = 1;
                    $refund_applied = 0;
                    $last_id = $order->getId();


                    $payment=new XdbOrderPayment();
                    $payment->setOpenid($openid);
                    $payment->setNickname($nickname);
                    $payment->setAvatar($avatar);
                    $payment->setOrderId($orderid);
                    $payment->setTransactionId($tran);
                    $payment->setPaid($paid);
                    $payment->setPaidAt($paid_at);
                    $payment->setGoodsId($diff_product);
                    $payment->setRefunded($refund);
                    $payment->setRefundApplied($refund_applied);
                    $payment->setLastId($last_id);
                    $payment->save();


                }else{
                    $sendnum=explode(',',$order->getSend());
                   if(count($diff_paid_arr)>count($sendnum)){
                       $order->setStatus(1);
                       $order->save();
                   }

                }
            }


        }









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

//                $where['conditions']=' id in ('.$order->getProductId().')';
                $product_id=explode(',',$order->getProductId());
                $product=[];
                foreach ($product_id as $v){
                    $where['columns']='pic_url';
                    $where['conditions']='id='.$v;
                    array_push($product,XdbProduct::findFirst($where));
                }

                $this->result['data']['order_details']= array_reverse(array_column($product,'pic_url'));
                unset($where);
                $where['conditions']=' hit_number <= :hit: or buy_number <= :buy:';
                $where['bind']=['hit'=>$this->result['data']['order_hit'],'buy'=>$this->result['data']['order_payment']];
                $where['order']='id desc';
                $star=XdbStarRule::findFirst($where);

                $this->result['data']['islandsCount']=$order->getStars();


//                if($star){
//                    $this->result['data']['islandsCount']=$star->getStar();
//                }else{
//                    $this->result['data']['islandsCount']=0;
//                }


                $stars=XdbStarRule::find()->toArray();

                $this->result['data']['hit_number']=array_column($stars,'hit_number');
                $this->result['data']['buy_number']=array_column($stars,'buy_number');
                $this->result['data']['openid_details']=[$order->getAvatar(),$order->getNickname()];
                $this->result['data']['identity']=false;
                $Identity= XdbOrderHit::findFirst('openid="'.$this->openid.'"');
                if($Identity) {
                    $this->result['data']['identity']=true;
                    $this->result['data']['parent']= $Identity->getOrderNickname();
                }



                $this->result['data']['islandsTime']=[];

                $hit=XdbOrderHit::find('order_id='.$orderid.' and active=1');
                if($hit){
                    foreach ($hit as $v){
                        array_push($this->result['data']['islandsTime'],array('hit'=> [ $v->getNickname(),  date('Y-m-d H:i:s',$v->getAddAt())]));
                    }
                }

                $payment=XdbOrderPayment::find('last_id='.$orderid.' and paid>0 and expire=0 and refunded=0 ');
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