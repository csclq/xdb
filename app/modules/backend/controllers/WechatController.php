<?php

namespace App\Modules\Backend\Controllers;

class WechatController extends ControllerBase{

    public function noticeAction(){
        $this->view->disable();
        $notice=$this->weixin->notice;
        echo "<pre>";
        var_dump($notice->getIndustry());
    }





}