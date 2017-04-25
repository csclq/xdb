<?php

namespace App\Modules\Backend\Controllers;

use App\Models\XdbCategory;
use App\Models\XdbOrder;
use App\Models\XdbProduct;

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

    }
    public function goodscycleAction(){

    }
    public function goodseditAction(){
        if(is_numeric($this->dispatcher->getParam(0))){
            $this->view->info= XdbProduct::findFirst('id=' . $this->dispatcher->getParam(0));
            $this->view->action='edit';
        }elseif($this->dispatcher->getParam(0)=='add'){
            $this->view->action='add';
        }
        if($this->request->isPost()) {
            $this->view->disable();
            if ($this->request->getPost('action') == 'edit' && $this->request->getPost('id')) {
               $data=[];
               foreach ($_POST as $k => $v){
                   if($k!=='action'|| $k!='result'){
                       $data[$k]=htmlspecialchars($v);
                   }
               }
              XdbProduct::findFirst('id=' . $this->request->getPost('id'))->update($data);
            } elseif ($this->request->getPost('action') == 'delete') {
                XdbProduct::findFirst('id=' . $this->request->getPost('id'))->delete();
            } elseif ($this->request->getPost('action') == 'add') {
                $goods=new XdbProduct();
                $data=[];
                foreach ($_POST as $k => $v){
                    if($k!=='action'|| $k!='result'){
                        $data[$k]=htmlspecialchars($v);
                    }
                }
                $goods->create($data);
            }
        }

    }
    public function goodssoldAction(){

    }
    public function goodssortAction(){

    }
    public function goodsstockAction(){

    }
    public function indexAction(){

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

    }
    public function orderlistAction(){
        if($this->request->isPost()){
            $this->view->disable();
            $where=[];
            $where['order']="id desc";
            $where['conditions']='active=1 ';
            $this->request->getPost('id')&& $where['conditions']=" id={$this->request->getPost('id')} ";
            if($this->request->getPost('filter')){
                if(preg_match('/^1[1|3|5|7|8|9][0-9]{9}$/',$this->request->getPort('filter'))){
                    $where['conditions']=" mobile={$this->request->get('filter')} ";
                }else{
                    $where['conditions'].=" and (fullname like '%".$this->request->get('filter'). "%' or nickname like '%".$this->request->get('filter'). "%' or address like '%".$this->request->get('filter'). "%' ) ";
                }
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
            $this->result['total']=ceil($total/$this->config->pageNum);
            $this->result['data']=$data;
            echo json_encode($this->result);
        }





    }
    public function orderoutAction(){

    }
    public function ordersendAction(){

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

}