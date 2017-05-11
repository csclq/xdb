<?php

namespace App\Modules\Frontend\Controllers;


use App\Models\XdbCategory;
use App\Models\XdbOrder;
use App\Models\XdbOrderPayment;
use App\Models\YztGxcRepastCate;

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function phpinfoAction()
    {
        $this->view->disable();
        phpinfo();
    }



    public function uploadAction()                          //图片上传
    {
        $this->view->disable();
        if ($this->request->hasFiles()) {
            $types = ['jpg', 'jpeg', 'gif', 'png'];             //上传类型
            $sizes = 6291456;                                   //上传大小
            foreach ($this->request->getUploadedFiles() as $file) {
                $type=str_replace('image/','',$file->getType());
                if($file->getError()){
                    $this->result['code'] = $file->getError();
                    $this->result['msg'] = "服务器错误";
                    break;
                }
                if(!in_array($type,$types)){
                    $this->result['code'] = 1001;
                    $this->result['msg'] = "上传类型错误:".$file->getType();
                    unlink($file->getTempName());
                    break;
                }
                if($file->getSize()>$sizes){
                    $this->result['code'] = 1002;
                    $this->result['msg'] = "上传文件过大";
                    unlink($file->getTempName());
                    break;
                }
                $saveName='files/'.uniqid().'.'.$type;
                $file->moveTo($saveName);
                array_push($this->result['data'],'/'.$saveName);
            }
            echo json_encode($this->result);
        }
    }

    public function notifyAction(){                         //微信通知处理

        $response = $this->weixin->payment->handleNotify(function($notify, $successful){
           $payid=substr($notify->out_trade_no,11);
           $payment=XdbOrderPayment::findFirst('id='.$payid);
           if(!$payment)
               return false;
           $payment->setPaidAt(date("Y-m-d H:i:s"));
           $payment->setPaid($notify->total_fee);
           $payment->setTransactionId($notify->transaction_id);
           $payment->save();
           $payorder=XdbOrder::findFirst('id='.$payment->getLastId());
           $paid=explode(',',$payorder->getPaid());
           if(empty($payorder->getPaid())){
               $payorder->setPaid($payment->getGoodsId());
           }else{
               if(!in_array($payment->getGoodsId(),$paid)){
                    array_push($paid,$payment->getGoodsId());
                   $payorder->setPaid(implode(',',$paid));
               }
           }
           $payorder->setBuyNumber($payorder->getBuyNumber()+1);

           $payorder->getStatus()!=3 && $payorder->setStatus(1);
           $payorder->save();

           $this->db->execute("update xdb_product set sale_count = sale_count + 1,stock = stock - 1 where id=".$payment->getGoodsId());

           $myorder=XdbOrder::findFirst('id='.$payment->getMyid());

            $this->db->execute("update xdb_product set select_count = select_count + 1 where id in (".$myorder->getProductId().")");

            return true;
        });
        $response->send();
    }


    public function testAction(){
        $js=$this->weixin->js;

        $this->view->js=$js;

    }


}

