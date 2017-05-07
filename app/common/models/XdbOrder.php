<?php

namespace App\Models;

class XdbOrder extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $id;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $openid;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $product_id;

    /**
     *
     * @var double
     * @Column(type="double", length=10, nullable=false)
     */
    protected $unit_price;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=false)
     */
    protected $quantity;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    protected $fullname;

    /**
     *
     * @var string
     * @Column(type="string", length=40, nullable=false)
     */
    protected $province;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    protected $city;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    protected $district;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=false)
     */
    protected $address;

    /**
     *
     * @var string
     * @Column(type="string", length=6, nullable=false)
     */
    protected $postcode;

    /**
     *
     * @var string
     * @Column(type="string", length=11, nullable=false)
     */
    protected $mobile;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=false)
     */
    protected $split_number;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    protected $status;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $submitted_at;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=true)
     */
    protected $express_courier;

    /**
     *
     * @var string
     * @Column(type="string", length=30, nullable=true)
     */
    protected $express_no;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    protected $nickname;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $avatar;

    /**
     *
     * @var string
     * @Column(type="string", length=300, nullable=true)
     */
    protected $message;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $uniacid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $last_id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $paid;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $send;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $request;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    protected $active;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $product_detail;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    protected $output;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $hit_number;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $buy_number;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field openid
     *
     * @param string $openid
     * @return $this
     */
    public function setOpenid($openid)
    {
        $this->openid = $openid;

        return $this;
    }

    /**
     * Method to set the value of field product_id
     *
     * @param string $product_id
     * @return $this
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }

    /**
     * Method to set the value of field unit_price
     *
     * @param double $unit_price
     * @return $this
     */
    public function setUnitPrice($unit_price)
    {
        $this->unit_price = $unit_price;

        return $this;
    }

    /**
     * Method to set the value of field quantity
     *
     * @param integer $quantity
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Method to set the value of field fullname
     *
     * @param string $fullname
     * @return $this
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Method to set the value of field province
     *
     * @param string $province
     * @return $this
     */
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Method to set the value of field city
     *
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Method to set the value of field district
     *
     * @param string $district
     * @return $this
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Method to set the value of field address
     *
     * @param string $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Method to set the value of field postcode
     *
     * @param string $postcode
     * @return $this
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Method to set the value of field mobile
     *
     * @param string $mobile
     * @return $this
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Method to set the value of field split_number
     *
     * @param integer $split_number
     * @return $this
     */
    public function setSplitNumber($split_number)
    {
        $this->split_number = $split_number;

        return $this;
    }

    /**
     * Method to set the value of field status
     *
     * @param integer $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Method to set the value of field submitted_at
     *
     * @param string $submitted_at
     * @return $this
     */
    public function setSubmittedAt($submitted_at)
    {
        $this->submitted_at = $submitted_at;

        return $this;
    }

    /**
     * Method to set the value of field express_courier
     *
     * @param string $express_courier
     * @return $this
     */
    public function setExpressCourier($express_courier)
    {
        $this->express_courier = $express_courier;

        return $this;
    }

    /**
     * Method to set the value of field express_no
     *
     * @param string $express_no
     * @return $this
     */
    public function setExpressNo($express_no)
    {
        $this->express_no = $express_no;

        return $this;
    }

    /**
     * Method to set the value of field nickname
     *
     * @param string $nickname
     * @return $this
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Method to set the value of field avatar
     *
     * @param string $avatar
     * @return $this
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Method to set the value of field message
     *
     * @param string $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Method to set the value of field uniacid
     *
     * @param string $uniacid
     * @return $this
     */
    public function setUniacid($uniacid)
    {
        $this->uniacid = $uniacid;

        return $this;
    }

    /**
     * Method to set the value of field last_id
     *
     * @param integer $last_id
     * @return $this
     */
    public function setLastId($last_id)
    {
        $this->last_id = $last_id;

        return $this;
    }

    /**
     * Method to set the value of field paid
     *
     * @param string $paid
     * @return $this
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * Method to set the value of field send
     *
     * @param string $send
     * @return $this
     */
    public function setSend($send)
    {
        $this->send = $send;

        return $this;
    }

    /**
     * Method to set the value of field request
     *
     * @param string $request
     * @return $this
     */
    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * Method to set the value of field active
     *
     * @param integer $active
     * @return $this
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Method to set the value of field product_detail
     *
     * @param string $product_detail
     * @return $this
     */
    public function setProductDetail($product_detail)
    {
        $this->product_detail = $product_detail;

        return $this;
    }

    /**
     * Method to set the value of field output
     *
     * @param integer $output
     * @return $this
     */
    public function setOutput($output)
    {
        $this->output = $output;

        return $this;
    }

    /**
     * Method to set the value of field hit_number
     *
     * @param integer $hit_number
     * @return $this
     */
    public function setHitNumber($hit_number)
    {
        $this->hit_number = $hit_number;

        return $this;
    }

    /**
     * Method to set the value of field buy_number
     *
     * @param integer $buy_number
     * @return $this
     */
    public function setBuyNumber($buy_number)
    {
        $this->buy_number = $buy_number;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field openid
     *
     * @return string
     */
    public function getOpenid()
    {
        return $this->openid;
    }

    /**
     * Returns the value of field product_id
     *
     * @return string
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Returns the value of field unit_price
     *
     * @return double
     */
    public function getUnitPrice()
    {
        return $this->unit_price;
    }

    /**
     * Returns the value of field quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Returns the value of field fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Returns the value of field province
     *
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Returns the value of field city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Returns the value of field district
     *
     * @return string
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Returns the value of field address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Returns the value of field postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Returns the value of field mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Returns the value of field split_number
     *
     * @return integer
     */
    public function getSplitNumber()
    {
        return $this->split_number;
    }

    /**
     * Returns the value of field status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the value of field submitted_at
     *
     * @return string
     */
    public function getSubmittedAt()
    {
        return $this->submitted_at;
    }

    /**
     * Returns the value of field express_courier
     *
     * @return string
     */
    public function getExpressCourier()
    {
        return $this->express_courier;
    }

    /**
     * Returns the value of field express_no
     *
     * @return string
     */
    public function getExpressNo()
    {
        return $this->express_no;
    }

    /**
     * Returns the value of field nickname
     *
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Returns the value of field avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Returns the value of field message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Returns the value of field uniacid
     *
     * @return string
     */
    public function getUniacid()
    {
        return $this->uniacid;
    }

    /**
     * Returns the value of field last_id
     *
     * @return integer
     */
    public function getLastId()
    {
        return $this->last_id;
    }

    /**
     * Returns the value of field paid
     *
     * @return string
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Returns the value of field send
     *
     * @return string
     */
    public function getSend()
    {
        return $this->send;
    }

    /**
     * Returns the value of field request
     *
     * @return string
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Returns the value of field active
     *
     * @return integer
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Returns the value of field product_detail
     *
     * @return string
     */
    public function getProductDetail()
    {
        return $this->product_detail;
    }

    /**
     * Returns the value of field output
     *
     * @return integer
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * Returns the value of field hit_number
     *
     * @return integer
     */
    public function getHitNumber()
    {
        return $this->hit_number;
    }

    /**
     * Returns the value of field buy_number
     *
     * @return integer
     */
    public function getBuyNumber()
    {
        return $this->buy_number;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("gxc");
        $this->useDynamicUpdate(true);
        $this->hasMany('id', 'App\Models\XdbOrderHit', 'order_id', ['alias' => 'XdbOrderHit']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'xdb_order';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return XdbOrder[]|XdbOrder
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return XdbOrder
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return [
            'id' => 'id',
            'openid' => 'openid',
            'product_id' => 'product_id',
            'unit_price' => 'unit_price',
            'quantity' => 'quantity',
            'fullname' => 'fullname',
            'province' => 'province',
            'city' => 'city',
            'district' => 'district',
            'address' => 'address',
            'postcode' => 'postcode',
            'mobile' => 'mobile',
            'split_number' => 'split_number',
            'status' => 'status',
            'submitted_at' => 'submitted_at',
            'express_courier' => 'express_courier',
            'express_no' => 'express_no',
            'nickname' => 'nickname',
            'avatar' => 'avatar',
            'message' => 'message',
            'uniacid' => 'uniacid',
            'last_id' => 'last_id',
            'paid' => 'paid',
            'send' => 'send',
            'request' => 'request',
            'active' => 'active',
            'product_detail' => 'product_detail',
            'output' => 'output',
            'hit_number' => 'hit_number',
            'buy_number' => 'buy_number'
        ];
    }

}
