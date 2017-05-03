<?php

namespace App\Modules\Frontend\Controllers;


use App\Models\XdbProduct;

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

    public function testAction()
    {


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


    public function xlsxAction(){
//        $this->view->disable();
//        $cation=['姓名','年龄',"身高"];
//        $content=[
//            ['张三',25,157],
//            ['李四',26,158],
//            ['王五',27,159],
//            ['赵六',28,160],
//        ];
//        $this->xlsx->openToBrowser();
//        $this->xlsx->addRow($cation);
//        $this->xlsx->addRows($content);
//        $this->xlsx->close();
    }


}

