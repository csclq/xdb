<?php

namespace App\Modules\Backend\Controllers;

use App\Models\XdbCategory;
use App\Models\XdbOrder;
use App\Models\XdbOrderPayment;
use App\Models\XdbProduct;
use App\Models\XdbStarRule;
use App\Models\YztWechatMessage;

class XuduobaoController extends ControllerBase{
    public function basicAction(){

    }
    public function basicimgAction(){

    }
    public function basicimgaddAction(){

    }
    public function basicmusicAction(){

    }
    public function basicmusicaddAction(){

    }
    public function basicnewsAction(){

    }
    public function basicnewsaddAction(){

    }
    public function basicsysAction(){

    }
    public function basicvideoAction(){

    }
    public function basicvideoaddAction(){

    }
    public function basicwordAction(){

    }
    public function basicwordaddAction(){

    }
    public function basicvoiceAction(){

    }
    public function categoryaddAction(){

    }
    public function categorysetAction(){

    }
    public function conlightAction(){

    }
    public function dataAction(){

    }
    public function dataincreaseAction(){

    }
    public function datatransAction(){

    }
    public function goodsAction(){
        if($this->request->isPost()){
            $this->view->disable();
            $where=[];
            $where['order']="deleted,sort";
            $where['conditions']='1=1 ';
            $this->request->getPost('cate')&& $where['conditions'].=" and category_id={$this->request->getPost('cate')} ";
            if($this->request->getPost('filter')){
                if(is_numeric($this->request->get('filter'))){
                    $where['conditions']=" id={$this->request->get('filter')} ";
                }else{
                    $where['conditions'].=" and name like '%".$this->request->get('filter'). "%' ";
                }
            }
            $total=XdbProduct::count($where);
            $where['limit']=array('number' => $this->config->pageNum,//$GLOBALS['config']['pageNum'],
                'offset' => (intval($this->request->getPost()['p']) - 1) * $this->config->pageNum);


            $data=XdbProduct::find($where);
            $data=$data->toArray();
            $this->result['total']=ceil($total/$this->config->pageNum);
            $this->result['data']=$data;
            echo json_encode($this->result);
        }

        $this->view->category=XdbCategory::find('deleted=0');

    }
    public function goodsaddAction(){

    }
    public function goodscategoryAction(){
        $where['order']='deleted';
        $cates=XdbCategory::find($where);
            if($this->request->isPost()){
                $this->view->disable();

                var_dump($this->post);


            }

        $this->view->cates=$cates->toArray();

    }
    public function goodscycleAction(){

    }
    public function goodseditAction(){
        $product=null;
        if(is_numeric($this->dispatcher->getParam(0))){
            $product= XdbProduct::findFirst('id=' . $this->dispatcher->getParam(0))->toArray();
            $this->view->actionname='编辑';
            $this->view->action='edit';
        }else{
            $this->view->actionname='添加';
            $this->view->action='add';
        }
        $this->view->cates=XdbCategory::find()->toArray();
        if($this->request->isPost()) {
            $this->view->disable();

            if ($this->request->getPost('action') == 'edit' ) {
               $data=$this->post;
               unset($data['action']);
               if(!$this->post['id']){
                   isset($data['new']) || $data['new']=0;
                   isset($data['fashion']) || $data['fashion']=0;
                   isset($data['hot']) || $data['hot']=0;
               }

                $data['id']=$this->post['id']??$this->dispatcher->getParam(0,'int');
             XdbProduct::findFirst('id=' . $data['id'])->update($data);
              is_numeric($this->dispatcher->getParam(0))||
              exit(json_encode($this->result));
            } elseif ($this->request->getPost('action') == 'delete') {
                XdbProduct::findFirst('id=' . $this->request->getPost('id'))->delete();

                exit(json_encode($this->result));
            } elseif ($this->request->getPost('action') == 'add') {
                $goods=new XdbProduct();
                $data=$this->post;
                unset($data['action']);
               isset($data['new']) || $data['new']=0;
               isset($data['fashion']) || $data['fashion']=0;
                isset($data['hot']) || $data['hot']=0;
               $goods->create($data);
            }
            $this->response->redirect('/backend/xuduobao/goods');
        }
        $this->view->goods=$product;
    }
    public function goodssoldAction(){

    }
    public function goodssortAction(){

    }
    public function goodsstockAction(){

    }
    public function indexAction(){
        $this->view->disable();
        echo $this->session->get('_token');
        exit("xuduobao index action");
    }
    public function menuAction(){

    }
    public function menuaddAction(){

    }
    public function menueditAction(){

    }
    public function orderAction(){

    }
    public function orderdetailAction(){
        $id=$this->dispatcher->getParam(0,'int');
        $id || exit("<script>alert('缺少必要的参数');history.back();</script>");
        $order=XdbOrder::findFirst('id='.$id);
        $product=XdbProduct::find('id in ('.$order->getProductId().')');

        $payment=XdbOrderPayment::find('last_id = '.$id.' and paid > 0 ');



        $this->view->payments=$payment;
        $this->view->products=$product->toArray();
        $this->view->order=$order;
    }
    public function orderlistAction(){
        if($this->request->isPost()){
            $this->view->disable();
            $where=[];
            $where['order']="id desc";
            $where['conditions']='active=1 ';
            $this->request->getPost('id')&& $where['conditions']=" id={$this->request->getPost('id')} ";
            if(isset($this->post['searchvalue']) && $this->post['searchvalue'] ){
                    $where['conditions'].=" and  ".$this->post['searchname'] ." like '%".$this->post['searchvalue']."%' ";
            }
            if($this->request->getPost('time1')&& empty($this->request->getPost('time2'))){
                    $where['conditions'].=" and submitted_at >= '".$this->request->getPost('time1')."' ";
            }
            if($this->request->getPost('time2')&& empty($this->request->getPost('time1'))){
                $where['conditions'].=" and submitted_at <= '".$this->request->getPost('time2')."' ";
            }
            if($this->request->getPost('time1')&& $this->request->getPost('time2')){
                $where['conditions'].=" and submitted_at >= '".$this->request->getPost('time1')."' and  submitted_at <= '".$this->request->getPost('time2')."'";
            }

            $total=XdbOrder::count($where);
            $where['limit']=array('number' => $this->config->pageNum,//$GLOBALS['config']['pageNum'],
                'offset' => (intval($this->request->getPost()['p']) - 1) * $this->config->pageNum);
            $data=XdbOrder::find($where);
            $data=$data->toArray();
            $price=0;
            foreach ($data as $k => $v){
                $price+=$v['unit_price']*$v['buy_number'];
                $rule['conditions']=' hit_number <= :hit: or buy_number <= :buy:';
                $rule['bind']=['hit'=>$v['hit_number'],'buy'=>$v['buy_number']];
                $star=XdbStarRule::findFirst($rule);
                $data[$k]['star']=$star?$star->getStar():0;
            }

            $this->result['total']=ceil($total/$this->config->pageNum);
            $this->result['data']=$data;
            $this->result['totalprice']=$price;
            $this->result['count']=$total;
            echo json_encode($this->result);
        }

    }
    public function orderoutAction(){

        $this->view->disable();
        $this->xlsxWriter->openToBrowser('excel.xlsx');



        $day = date("Y-m-d 0:0:0", strtotime("-2 day"));
        $where['conditions']=' submitted_at <:day: and active=1 and send=""';
        $where['bind']=['day'=>$day];
        $orders=XdbOrder::find($where)->toArray();

        $caption = [
            '订单号','品名', '数量', '重量', '备注', '分单数量', '代收货款','到付款',
           '发件网点', '收件人姓名','收件人省','收件人市', '收件人区', '收件人地址',  '收件人电话', '收件人邮编',
            '发件人姓名', '发件人省','发件人市','发件人区',  '发件人地址', '发件人电话', '发件人邮编', '始发地',
            '目的地', '长',  '宽', '高', '费用总计'
        ];
        $this->xlsxWriter->addRow($caption);

        $i = 0;
        foreach ($orders as $k => $v) {
            if ($orders[$k]['paid']) {
                $productnum = count(explode(',', $orders[$k]['product_id']));
                $paidnum = count(explode(',', $orders[$k]['paid']));
                if ($paidnum >= $productnum) {
                    $orders[$k]['goods'] = str_replace(',', '/', $orders[$k]['product_id']);
                    $orders[$k]['number'] = $productnum;
                } else {
                    $orders[$k]['goods'] = str_replace(',', '/', $orders[$k]['paid']);
                    $orders[$k]['number'] = $paidnum;
                }
            } else {
                $i++;
                $openid = 'ofLKNwjl4M52phuU39t7BLRluzQg';
                $nickname = '张明';
                $avatar = 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLBREBZhyp7uW2g4Mr2vgsCiaLPG1Ezd8pgwepoSwZPgPrlVZkVoMEVrfHarEGxSe1K59YIE9T21DpA/132';
                $orderid = $v['id'];
                $tran = '50042820012017032343' . substr((time() + $i) . '', 2);
                $paid = 19.9;
                $paid_at = date('Y-m-d H:i:s');
                $refund = 0;
                $refund_applied = 0;
                $last_id = $v['id'];
                $goods_id = substr($orders[$k]['product_id'], 0, strpos($orders[$k]['product_id'], ','));

//                $order=XdbOrder::findFirst('id='.$v['id']);
//                $order->setPaid($goods_id);
//                $order->setStatus(2);
//                $order->update();
//                $payment=new XdbOrderPayment();
//                $payment->setOpenid($openid);
//                $payment->setNickname($nickname);
//                $payment->setAvatar($avatar);
//                $payment->setOrderId($orderid);
//                $payment->setTransactionId($tran);
//                $payment->setPaid($paid);
//                $payment->setPaidAt($paid_at);
//                $payment->setGoodsId($goods_id);
//                $payment->setRefunded($refund);
//                $payment->setRefundApplied($refund_applied);
//                $payment->setLastId($last_id);
//
//                $payment->save();


                $orders[$k]['goods'] = $goods_id;
                $orders[$k]['number'] = 1;
            }


        }

        foreach ($orders as $v) {
            $arr= array(
                time() . '_' . $v['id'],
                $v['goods'],
                $v['number'],
                '',
                '',
                '',
                '',
                '',
                '',
                $v['fullname'],
                 $v['province'],
                $v['city'],
                 $v['district'],
                $v['address'],
                $v['mobile'],
                '',
               '苏州施得保生物科技有限公司',
               '江苏省',
                '苏州市',
               '工业园区',
               '通园路199号联发工业园6幢3层',
                '18852996322',
                '', '', '', '', '', '', ''
            );
            $this->xlsxWriter->addRow($arr);
        }

        $this->xlsxWriter->close();




    }
    public function ordersendAction(){
        if($this->request->hasFiles()){
            $this->xlsxReader->open($this->request->getUploadedFiles()[0]->getTempName());
            foreach ($this->xlsxReader->getSheetIterator() as $sheet) {
                foreach ($sheet->getRowIterator() as $row) {
                    $order=explode('_',$row[0]);
                    if($order[1]){
                        $payment=XdbOrderPayment::find('last_id='.$order[1]);
                        foreach ($payment as $v){
                            $v->setExpressCourier('中通');
                            $v->setExpressNo($row[1]);
                            $v->setStatus(2);
                            $v->setSendTime(time());
                            $v->update();
                        }
                        $orders=XdbOrder::findFirst('id='.$order[1]);
                        $orders->setSend($row[22]);
                        $orders->update();
                    }
                }
            }
        }
    }
    public function orderstatus1Action(){

    }
    public function orderstatus2Action(){

    }
    public function orderstatus3Action(){

    }
    public function orderstatus4Action(){

    }
    public function orderstatus5Action(){

    }
    public function paysetAction(){

    }
    public function shop_editAction(){

    }

    public function messageeditAction(){
            if($this->request->isPost()){
                $this->view->disable();
                if($this->post['action']=='edit'){
                    $msg=new YztWechatMessage();
                    unset($this->post['action']);
                    if(!$msg->save($this->post)){
                        $this->result['code']=1;
                        $this->result['msg']="消息回复设置失败";
                    }
                }elseif($this->post['action']=='delete'){
                    YztWechatMessage::findFirst('id='.$this->post['id'])->delete();
                }

              exit(json_encode($this->result));
            }

        $msg=YztWechatMessage::find();
        $this->view->msgs=$msg;
    }

}