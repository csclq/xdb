<?php

namespace App\Modules\Backend\Controllers;

use App\Models\XdbCategory;
use App\Models\XdbMember;
use App\Models\XdbOrder;
use App\Models\XdbOrderPayment;
use App\Models\XdbProduct;
use App\Models\XdbStarRule;
use App\Models\YztWechatMessage;

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
            $where['order'] = "send_count desc,sort desc";

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
            if ($this->post['days'] && empty($this->post['month']) && empty($this->post['year'])) {
                for ($i = 0; $i < $this->post['days']; $i++) {
                    $key = date("Y-m-d", strtotime("-$i day"));
                    $arr[$key]['hit'] = XdbMember::count('add_at <="' . $key . '"');
                    $arr[$key]['buy'] = XdbOrderPayment::count('paid_at <="' . $key . '"');
                }
            } else {
                $year = empty($this->post['year']) ? 2017 : $this->post['year'];
                $month = empty($this->post['month']) ? date('n') : $this->post['month'];

                $days = $this->post['days']??date('t', strtotime($year . '-' . $month));
                for ($i = 0; $i < $days; $i++) {
                    $key = $year . '-' . $month . '-' . ($i + 1);
                    $arr[$key]['hit'] = XdbMember::count('add_at <="' . $key . '"');
                    $arr[$key]['buy'] = XdbOrderPayment::count('paid_at <="' . $key . '"');
                }
            }
            $this->result['data'] = $arr;
            echo json_encode($this->result);
        }

    }

    public function datatransAction()
    {



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
            $data = $data->toArray();
            foreach ($data as $k => $v) {
                $rule['conditions'] = ' hit_number <= :hit: or buy_number <= :buy:';
                $rule['bind'] = ['hit' => $v['hit_number'], 'buy' => $v['buy_number']];
                $star = XdbStarRule::findFirst($rule);
                $data[$k]['star'] = $star ? $star->getStar() : 0;
            }

            $this->result['total'] = ceil($total / $this->config->pageNum);
            $this->result['data'] = $data;
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
                    $orders[$k]['goods'] = implode('/',$arr);
                    $orders[$k]['number'] = count($arr);
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
                    if ($order[1]) {
                        $payment = XdbOrderPayment::find('last_id=' . $order[1]);
                        foreach ($payment as $v) {
                            $v->setExpressCourier('中通');
                            $v->setExpressNo($row[1]);
                            $v->setStatus(2);
                            $v->setSendTime(time());
                            $v->update();

                            $this->db->execute("update xdb_product set send_count = send_count + 1 where id=".$v->getGoodsId());

                        }


                        $orders = XdbOrder::findFirst('id=' . $order[1]);
                        $send = $orders->getSend();
                        if ($send) {
                            $send = explode(',', $send);
                            if (!in_array($row[22], $send)) {
                                array_push($send, $row[22]);
                            }
                            $send = implode(',', $send);
                        } else {
                            $send = $row[22];
                        }
                        $orders->setSend($send);
                        $orders->setStatus(2);
                        $orders->update();
                    }
                }
            }
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

        $info = XdbOrderPayment::find($where);
        $this->view->info = $info;


    }


}