<?php

namespace App\Modules\Backend\Controllers;

use App\Models\XdbCategory;
use App\Models\XdbMember;
use App\Models\XdbOrder;
use App\Models\XdbOrderPayment;
use App\Models\XdbProduct;
use App\Models\XdbStarRule;
use App\Models\YztWechatMessage;
use function Clue\StreamFilter\fun;

class XuduobaoController extends ControllerBase
{
    public function basicAction()
    {

    }

    public function basicimgAction()
    {

    }

    public function basicimgaddAction()
    {

    }

    public function basicmusicAction()
    {

    }

    public function basicmusicaddAction()
    {

    }

    public function basicnewsAction()
    {

    }

    public function basicnewsaddAction()
    {

    }

    public function basicsysAction()
    {

    }

    public function basicvideoAction()
    {

    }

    public function basicvideoaddAction()
    {

    }

    public function basicwordAction()
    {

    }

    public function basicwordaddAction()
    {

    }

    public function basicvoiceAction()
    {

    }

    public function categoryaddAction()
    {

    }

    public function categorysetAction()
    {

    }

    public function conlightAction()
    {

        if ($this->request->isPost()) {
            unset($this->post['token']);
            $rule = XdbStarRule::findFirst('id=' . $this->post['id']);
            $rule->save($this->post);
            $this->response->redirect('/backend/xuduobao/conlight');
        }

        $stars = XdbStarRule::find();
        $this->view->stars = $stars;

    }

    public function dataAction()
    {
        if ($this->request->isPost()) {
            $this->view->disable();
            $where = [];
            $where['conditions'] = '1=1 ';
            $where['order'] = "sale_count desc,sort desc";

            empty($this->post['name']) || $where['conditions'] .= " and name like '%" . $this->post['name'] . "%'";
            $total = XdbProduct::count($where);
            $where['limit'] = array('number' => $this->config->pageNum,//$GLOBALS['config']['pageNum'],
                'offset' => (intval($this->request->getPost()['p']) - 1) * $this->config->pageNum);


            $data = XdbProduct::find($where);
            $data = $data->toArray();
            $this->result['total'] = ceil($total / $this->config->pageNum);
            $this->result['data'] = $data;
            $this->result['count'] = $total;
            echo json_encode($this->result);
        }

        $this->view->category = XdbCategory::find('deleted=0');


    }

    public function dataincreaseAction()
    {

        if ($this->request->isPost()) {
            $this->view->disable();
            $arr = [];
//            if ($this->post['days'] && empty($this->post['month']) && empty($this->post['year'])) {
//                for ($i = 0; $i < $this->post['days']; $i++) {
//                    $key = date("Y-m-d", strtotime("-$i day"));
//                    $arr[$key]['hit'] = XdbMember::count('add_at <="' . $key . '"');
//                    $arr[$key]['buy'] = XdbOrderPayment::count('paid_at <="' . $key . '"');
//                }
//            } else {
//                $year = empty($this->post['year']) ? 2017 : $this->post['year'];
//                $month = empty($this->post['month']) ? date('n') : $this->post['month'];
//
//                $days = $this->post['days']??date('t', strtotime($year . '-' . $month));
//                for ($i = 0; $i < $days; $i++) {
//                    $key = $year . '-' . $month . '-' . ($i + 1);
//                    $arr[$key]['hit'] = XdbMember::count('add_at <="' . $key . '"');
//                    $arr[$key]['buy'] = XdbOrderPayment::count('paid_at <="' . $key . '"');
//                }
//            }

            if($this->post['times']=='days'){
                for ($i = 0; $i < 7; $i++) {
                    $now = date("Y-m-d", strtotime("-$i day"));
                    $next = date("Y-m-d", strtotime("-$i day")+86400);
                    $arr[$now]['hit'] = XdbMember::count('add_at between "' . $now . '" and "'.$next.'" ');
                    $arr[$now]['buy'] = XdbOrderPayment::count('paid >0 and   paid_at between "' . $now . '" and "'.$next.'" ');
                }
            }elseif($this->post['times']=='hours'){
                $hour=date('G');
                for($i=0;$i<=$hour;$i++){
                    $now=date("Y-m-d ".$i.":0:0");
                    $next=date("Y-m-d ".($i+1).":0:0");
                    $arr[$now]['hit'] = XdbMember::count('add_at between "' . $now .'" and "'.$next.'" ');
                    $arr[$now]['buy'] = XdbOrderPayment::count('paid >0 and  paid_at between "' . $now . '" and "'.$next.'" ');
                }
            }


            $this->result['data'] = $arr;
            echo json_encode($this->result);
        }

    }

    public function datatransAction()
    {
        if ($this->request->isPost()) {
            $this->view->disable();
            $where = [];
            $where['order'] = "deleted,sort";
            $where['conditions'] = '1=1 ';
            isset($this->post['name']) && $this->post['name'] &&  $where['conditions'] .= ' and name like "%'.$this->post['name'].'%"';
            $total = XdbProduct::count($where);
            $where['limit'] = array('number' => $this->config->pageNum,//$GLOBALS['config']['pageNum'],
                'offset' => (intval($this->post['p']) - 1) * $this->config->pageNum);


            $data = XdbProduct::find($where);
            $data = $data->toArray();

            $this->result['total'] = ceil($total / $this->config->pageNum);
            $this->result['data'] = $data;
            $this->result['count'] = $total;
            echo json_encode($this->result);
        }



    }

    public function goodsAction()
    {
        if ($this->request->isPost()) {
            $this->view->disable();
            $where = [];
            $where['order'] = "deleted,sort";
            $where['conditions'] = '1=1 ';
            isset($this->post['cate'] )  &&  $this->post['cate'] && $where['conditions'] .= " and category_id={$this->post['cate']} ";
            if (isset($this->post['filter'] )&&$this->post['filter']) {
                if (is_numeric($this->post['filter'])) {
                    $where['conditions'] = " id={$this->post['filter']} ";
                } else {
                    $where['conditions'] .= " and name like '%" . $this->post['filter'] . "%' ";
                }
            }
            $total = XdbProduct::count($where);
            $where['limit'] = array('number' => $this->config->pageNum,//$GLOBALS['config']['pageNum'],
                'offset' => (intval($this->post['p']) - 1) * $this->config->pageNum);


            $data = XdbProduct::find($where);
            $data = $data->toArray();

            foreach ($data as $k=>$v){
                $where=[];
                $where['conditions']=' goods_id = '.$v['id'].' and paid > 0 and posit > 0';
                $where['group']='posit';
                $where['columns']='posit,count(id) as number';
                $posit=XdbOrderPayment::find($where);
                $arr=[];
                if($posit){
                    foreach ($posit as $key => $value){
                        array_push($arr,$value['posit'].':'.$value['number']);
                    }
                }
                $data[$k]['posit']=json_encode($arr);
            }

            $this->result['total'] = ceil($total / $this->config->pageNum);
            $this->result['data'] = $data;
            echo json_encode($this->result);
        }

        $this->view->category = XdbCategory::find('deleted=0');

    }

    public function goodsaddAction()
    {

    }

    public function goodscategoryAction()
    {
        $where['order'] = 'deleted';
        $cates = XdbCategory::find($where);
        if ($this->request->isPost()) {
            $this->view->disable();

            var_dump($this->post);


        }

        $this->view->cates = $cates->toArray();

    }

    public function goodscycleAction()
    {

    }

    public function goodseditAction()
    {
        $product = null;
        if (is_numeric($this->dispatcher->getParam(0))) {
            $product = XdbProduct::findFirst('id=' . $this->dispatcher->getParam(0))->toArray();
            $this->view->actionname = '编辑';
            $this->view->action = 'edit';
        } else {
            $this->view->actionname = '添加';
            $this->view->action = 'add';
        }
        $this->view->cates = XdbCategory::find()->toArray();
        if ($this->request->isPost()) {
            $this->view->disable();

            if ($this->request->getPost('action') == 'edit') {
                $data = $this->post;
                unset($data['action']);
                if (!$this->post['id']) {
                    isset($data['new']) || $data['new'] = 0;
                    isset($data['fashion']) || $data['fashion'] = 0;
                    isset($data['hot']) || $data['hot'] = 0;
                }

                $data['id'] = $this->post['id']??$this->dispatcher->getParam(0, 'int');
                XdbProduct::findFirst('id=' . $data['id'])->update($data);
                is_numeric($this->dispatcher->getParam(0)) ||
                exit(json_encode($this->result));
            } elseif ($this->request->getPost('action') == 'delete') {
                XdbProduct::findFirst('id=' . $this->request->getPost('id'))->delete();

                exit(json_encode($this->result));
            } elseif ($this->request->getPost('action') == 'add') {
                $goods = new XdbProduct();
                $data = $this->post;
                unset($data['action']);
                isset($data['new']) || $data['new'] = 0;
                isset($data['fashion']) || $data['fashion'] = 0;
                isset($data['hot']) || $data['hot'] = 0;
                $goods->create($data);
            }
            $this->response->redirect('/backend/xuduobao/goods');
        }
        $this->view->goods = $product;
    }

    public function goodssoldAction()
    {

    }

    public function goodssortAction()
    {

    }

    public function goodsstockAction()
    {

    }

    public function indexAction()
    {
        $this->view->disable();
        echo $this->session->get('_token');
        exit("xuduobao index action");
    }

    public function menuAction()
    {

    }

    public function menuaddAction()
    {

    }

    public function menueditAction()
    {

    }

    public function orderAction()
    {
        $this->view->todaymoney=XdbOrderPayment::sum([
            'conditions'=>'paid >0  and refunded=0   and paid_at >= "'.date("Y-m-d 0:0:0").'"',
            'column'=>'paid'
        ]);
        $this->view->todaycount=XdbOrderPayment::count([
            'conditions'=>'paid >0     and paid_at >= "'.date("Y-m-d 0:0:0").'"'
        ]);

        $this->view->money1=XdbOrderPayment::sum([
            'conditions'=>'paid >0   and refunded=0   and paid_at <= "'.date("Y-m-d 0:0:0").'" and paid_at >="'.date("Y-m-d 0:0:0",time()-86400).'"',
            'column'=>'paid'
        ]);
        $this->view->count1=XdbOrderPayment::count([
            'conditions'=>'paid >0      and paid_at <= "'.date("Y-m-d 0:0:0").'" and paid_at >="'.date("Y-m-d 0:0:0",time()-86400).'"',
        ]);

        $this->view->money7=XdbOrderPayment::sum([
            'conditions'=>'paid >0   and refunded=0    and paid_at >="'.date("Y-m-d 0:0:0",time()-86400*7).'"',
            'column'=>'paid'
        ]);
        $this->view->count7=XdbOrderPayment::count([
            'conditions'=>'paid >0        and paid_at >="'.date("Y-m-d 0:0:0",time()-86400*7).'"',
        ]);
        $this->view->money30=XdbOrderPayment::sum([
            'conditions'=>'paid >0   and refunded=0     and paid_at >="'.date("Y-m-d 0:0:0",time()-86400*30).'"',
            'column'=>'paid'
        ]);
        $this->view->count30=XdbOrderPayment::count([
            'conditions'=>'paid >0       and paid_at >="'.date("Y-m-d 0:0:0",time()-86400*30).'"',
        ]);








    }

    public function orderdetailAction()
    {
        $id = $this->dispatcher->getParam(0, 'int');
        $id || exit("<script>alert('缺少必要的参数');history.back();</script>");
        $order = XdbOrder::findFirst('id=' . $id);
        $product = XdbProduct::find('id in (' . $order->getProductId() . ')')->toArray();

        $payment = XdbOrderPayment::find('last_id = ' . $id . ' and paid > 0 ');

        foreach ($product as $k => $v){
               $product[$k]['send'] =in_array($v['id'],explode(',',$order->getSend()));
        }

        $this->view->payments = $payment;
        $this->view->products = $product;
        $this->view->order = $order;


    }

    public function orderlistAction()
    {

        if ($this->request->isPost()) {
            $this->view->disable();
            $where = [];
            $where['order'] = "id desc";
            $where['conditions'] = 'active=1 ';
            $this->request->getPost('id') && $where['conditions'] = " id={$this->request->getPost('id')} ";
            if (isset($this->post['searchvalue']) && $this->post['searchname']) {
                $where['conditions'] .= " and  " . $this->post['searchname'] . " like '%" . $this->post['searchvalue'] . "%' ";
            }

            isset($this->post['status']) && is_numeric($this->post['status']) && $where['conditions'] .= " and status=" . $this->post['status'];


            if ($this->request->getPost('time1') && empty($this->request->getPost('time2'))) {
                $where['conditions'] .= " and submitted_at >= '" . $this->request->getPost('time1') . "' ";
            }
            if ($this->request->getPost('time2') && empty($this->request->getPost('time1'))) {
                $where['conditions'] .= " and submitted_at <= '" . $this->request->getPost('time2') . "' ";
            }
            if ($this->request->getPost('time1') && $this->request->getPost('time2')) {
                $where['conditions'] .= " and submitted_at >= '" . $this->request->getPost('time1') . "' and  submitted_at <= '" . $this->request->getPost('time2') . "'";
            }

            $total = XdbOrder::count($where);
            $price=XdbOrder::query()->where($where['conditions'])->columns("sum(unit_price*buy_number) as price")->execute();


            $where['limit'] = array('number' => $this->config->pageNum,//$GLOBALS['config']['pageNum'],
                'offset' => (intval($this->request->getPost()['p']) - 1) * $this->config->pageNum);
            $data = XdbOrder::find($where);
            $dataArr = $data->toArray();
//            foreach ($dataArr as $k => $v) {
//                $rule['conditions'] = ' hit_number <= :hit: or buy_number <= :buy:';
//                $rule['bind'] = ['hit' => $v['hit_number'], 'buy' => $v['buy_number']];
//                $rule['order'] = 'star desc';
//                $star = XdbStarRule::findFirst($rule);
//                $dataArr[$k]['star'] = $star ? $star->getStar() : 0;
//            }

            $this->result['total'] = ceil($total / $this->config->pageNum);
            $this->result['data'] = $dataArr;
            $this->result['totalprice'] = $price->toArray()[0]['price'];
            $this->result['count'] = $total;
            echo json_encode($this->result);
        }

    }

    public function orderoutAction()
    {

        $this->view->disable();
        $this->xlsxWriter->openToBrowser('excel.xlsx');


//        $day = date("Y-m-d 0:0:0", strtotime("-2 day"));
//        $where['conditions']=' submitted_at <:day: and active=1 and send=""';
//        $where['bind']=['day'=>$day];
        $where['conditions'] = ' active=1 and status=1 ';
        $orders = XdbOrder::find($where)->toArray();

        $caption = [
            '订单号', '品名', '数量', '重量', '备注', '分单数量', '代收货款', '到付款',
            '发件网点', '收件人姓名', '收件人省', '收件人市', '收件人区', '收件人地址', '收件人电话', '收件人邮编',
            '发件人姓名', '发件人省', '发件人市', '发件人区', '发件人地址', '发件人电话', '发件人邮编', '始发地',
            '目的地', '长', '宽', '高', '费用总计'
        ];
        $this->xlsxWriter->addRow($caption);



        foreach ($orders as $k => $v) {
            if ($orders[$k]['paid']) {
                $productarr = explode(',', $orders[$k]['product_id']);
                $paidarr = explode(',', $orders[$k]['paid']);
                if(empty($orders[$k]['send'])){
                   unset($sendarr);
                }else{
                    $sendarr = explode(',', $orders[$k]['send']);
                }
                $sendnum = isset($sendarr) ? count($sendarr):0;
                $productnum = count($productarr);
                $paidnum = count($paidarr);
                if ($sendnum >= $productnum || $sendnum >= $paidnum) {
                    unset($orders[$k]);
                } else {
                    $arr=[];
                    $presends=array_unique($paidarr);
                    foreach ($presends as $presend){
                        if( !isset($sendarr)|| !in_array($presend,$sendarr)){
                            array_push($arr,$presend);
                        }
                    }
                    $goods_arr=array_slice($arr,0,$v['stars']);
                    $orders[$k]['goods'] = implode('/', $goods_arr);

                    $orders[$k]['number'] = count($goods_arr);
                }
            }
        }


        foreach ($orders as $v) {
            $arr = array(
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

    public function ordersendAction()
    {
        if ($this->request->hasFiles()) {
            $this->xlsxReader->open($this->request->getUploadedFiles()[0]->getTempName());
            foreach ($this->xlsxReader->getSheetIterator() as $sheet) {
                foreach ($sheet->getRowIterator() as $row) {
                    $order = explode('_', $row[0]);
                    $goods=explode('/',$row[22]);
                    if (count($order)>1 && $order[1]) {

                        foreach ($goods as $v) {
                            $payment = XdbOrderPayment::findFirst('last_id=' . $order[1].' and goods_id ='.$v);
                            $payment->setExpressCourier('中通');
                            $payment->setExpressNo($row[1]);
                            $payment->setStatus(2);
                            $payment->setSendTime(time());
                            $payment->update();

                            $this->db->execute("update xdb_product set send_count = send_count + 1 where id=".$v);

                        }

                        $orders = XdbOrder::findFirst('id=' . $order[1]);
                        $status=2;
                        $send = $orders->getSend();




                        if ($send) {
                            $send = explode(',', $send);
                            foreach ($goods as $v){
                                if (!in_array($v, $send)) {
                                    array_push($send, $v);
                                }
                            }

                            count($send)==count(explode(',',$orders->getProductId())) && $status=3;
                            $send = implode(',', $send);
                        } else {
                            $send = implode(',',$goods);
                        }
                        $orders->setSend($send);
                        $orders->setStatus($status);
                        $orders->update();
                    }
                }
            }

            exit("<script>location.href=location.href;</script>");
        }
    }

    public function orderstatus1Action()
    {

    }

    public function orderstatus2Action()
    {

    }

    public function orderstatus3Action()
    {

    }

    public function orderstatus4Action()
    {

    }

    public function orderstatus5Action()
    {

    }

    public function paysetAction()
    {

    }

    public function shop_editAction()
    {

    }

    public function messageeditAction()
    {
        if ($this->request->isPost()) {
            $this->view->disable();
            if ($this->post['action'] == 'edit') {
                $msg = new YztWechatMessage();
                unset($this->post['action']);
                if (!$msg->save($this->post)) {
                    $this->result['code'] = 1;
                    $this->result['msg'] = "消息回复设置失败";
                }
            } elseif ($this->post['action'] == 'delete') {
                YztWechatMessage::findFirst('id=' . $this->post['id'])->delete();
            }

            exit(json_encode($this->result));
        }

        $msg = YztWechatMessage::find();
        $this->view->msgs = $msg;
    }

    public function datalocationAction()
    {
        $where['columns'] = 'posit,count(id) as num';
        $where['group'] = 'posit';
        $where['conditions'] = 'posit > 0 and paid > 0 ';
        if ($this->request->get("title")) {
            $product = XdbProduct::findFirst('name="' . trim($this->request->get('title', 'string')) . '"');
            if ($product) {
                $where['conditions'] .= ' and goods_id=' . $product->getId();
            }


        }

        $order['columns']='product_detail';
        $orders=XdbOrder::find($order);


        $arr=[];
        foreach ($orders as $v){
            $detail=json_decode($v->product_detail,true);
            foreach ($detail as $key => $value){
                isset($arr[$value])?$arr[$value]++:$arr[$value]=1;
            }
        }







        $info = XdbOrderPayment::find($where)->toArray();

        $result=[];


        foreach ($arr as $k => $v){
            $buy=0;
            foreach ($info as $value){
                if($value['posit']==$k){
                    $buy=$value['num'];
                }
            }
            array_push($result,['posit'=>$k,'buy'=>$buy,'select'=>$v]);
        }


        usort($result,function ($a,$b){
           return $a['posit']-$b['posit'];
        });

        $this->view->info = $result;


    }


}