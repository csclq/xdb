<?php

namespace App\Modules\Shop\Controllers;

use App\Models\YztMerchant;

class MerchantController extends ControllerBase{

    public function indexAction(){
        $this->view->disable();
    }

   public function editAction(){

        if($this->request->isPost()){
            $mer=$this->request->getPost('id','int')?YztMerchant::findFirst('id='.$this->request->getPost('id','int')):new YztMerchant();
            $mer->setUserId($this->session->get("user_id"));
            $mer->setName($this->request->getPost('name','string'));
            $mer->setProvinceId($this->request->getPost('province_id','int'));
            $mer->setCityId($this->request->getPost('city_id','int'));
            $mer->setAreaId($this->request->getPost('area_id','int'));
            $mer->setScope($this->request->getPost('scope','string'));
            $mer->setAddress($this->request->getPost('address','string'));
            $mer->setPhone($this->request->getPost('phone','int'));
            $mer->setKeyword($this->request->getPost('keyword','string'));
            $mer->setContent($this->request->getPost('content'));
            $mer->setPrincipal($this->request->getPost('principal','string'));
            $mer->setLicense($this->request->getPost('license','string'));
            $mer->setPrincipalPhone($this->request->getPost('principal_phone','int'));
            $mer->setPrincipalCardno($this->request->getPost('principal_cardno','string'));
            $mer->setIdentityFront($this->request->getPost('identity_front'));
            $mer->setIdentityBack($this->request->getPost('identity_back'));
            $mer->setImages($this->request->getPost('images'));
            $mer->setRegisteredFund($this->request->getPost('registered_fund','int'));
            if($this->request->getPost('have_partner','int')){
                $mer->setPartnerNumber($this->request->getPost('partner_number','int'));
                $mer->setHavePartner($this->request->getPost('have_partner','int'));
                $mer->setPartnerMoney($this->request->getPost('partner_money','int'));
            }
            $mer->setAddAt(time());
            $mer->setUpdateAt(time());
            $mer->save();

        }
   }

}