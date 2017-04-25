<?php

namespace App\Models;

class YztShopOrder extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $shop_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $user_id;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=false)
     */
    protected $serial;

    /**
     *
     * @var integer
     * @Column(type="integer", length=5, nullable=false)
     */
    protected $number;

    /**
     *
     * @var double
     * @Column(type="double", length=10, nullable=false)
     */
    protected $price;

    /**
     *
     * @var double
     * @Column(type="double", length=10, nullable=true)
     */
    protected $total_price;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $message;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    protected $discount;

    /**
     *
     * @var double
     * @Column(type="double", length=10, nullable=true)
     */
    protected $privilege_price;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $privilege_id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $remark;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $deal_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $add_at;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $pay_at;

    /**
     *
     * @var double
     * @Column(type="double", length=10, nullable=true)
     */
    protected $pay_price;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    protected $status;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    protected $active;

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
     * Method to set the value of field shop_id
     *
     * @param integer $shop_id
     * @return $this
     */
    public function setShopId($shop_id)
    {
        $this->shop_id = $shop_id;

        return $this;
    }

    /**
     * Method to set the value of field user_id
     *
     * @param integer $user_id
     * @return $this
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Method to set the value of field serial
     *
     * @param string $serial
     * @return $this
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;

        return $this;
    }

    /**
     * Method to set the value of field number
     *
     * @param integer $number
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Method to set the value of field price
     *
     * @param double $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Method to set the value of field total_price
     *
     * @param double $total_price
     * @return $this
     */
    public function setTotalPrice($total_price)
    {
        $this->total_price = $total_price;

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
     * Method to set the value of field discount
     *
     * @param string $discount
     * @return $this
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Method to set the value of field privilege_price
     *
     * @param double $privilege_price
     * @return $this
     */
    public function setPrivilegePrice($privilege_price)
    {
        $this->privilege_price = $privilege_price;

        return $this;
    }

    /**
     * Method to set the value of field privilege_id
     *
     * @param integer $privilege_id
     * @return $this
     */
    public function setPrivilegeId($privilege_id)
    {
        $this->privilege_id = $privilege_id;

        return $this;
    }

    /**
     * Method to set the value of field remark
     *
     * @param string $remark
     * @return $this
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;

        return $this;
    }

    /**
     * Method to set the value of field deal_id
     *
     * @param integer $deal_id
     * @return $this
     */
    public function setDealId($deal_id)
    {
        $this->deal_id = $deal_id;

        return $this;
    }

    /**
     * Method to set the value of field add_at
     *
     * @param integer $add_at
     * @return $this
     */
    public function setAddAt($add_at)
    {
        $this->add_at = $add_at;

        return $this;
    }

    /**
     * Method to set the value of field pay_at
     *
     * @param integer $pay_at
     * @return $this
     */
    public function setPayAt($pay_at)
    {
        $this->pay_at = $pay_at;

        return $this;
    }

    /**
     * Method to set the value of field pay_price
     *
     * @param double $pay_price
     * @return $this
     */
    public function setPayPrice($pay_price)
    {
        $this->pay_price = $pay_price;

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
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field shop_id
     *
     * @return integer
     */
    public function getShopId()
    {
        return $this->shop_id;
    }

    /**
     * Returns the value of field user_id
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Returns the value of field serial
     *
     * @return string
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * Returns the value of field number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Returns the value of field price
     *
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Returns the value of field total_price
     *
     * @return double
     */
    public function getTotalPrice()
    {
        return $this->total_price;
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
     * Returns the value of field discount
     *
     * @return string
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Returns the value of field privilege_price
     *
     * @return double
     */
    public function getPrivilegePrice()
    {
        return $this->privilege_price;
    }

    /**
     * Returns the value of field privilege_id
     *
     * @return integer
     */
    public function getPrivilegeId()
    {
        return $this->privilege_id;
    }

    /**
     * Returns the value of field remark
     *
     * @return string
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Returns the value of field deal_id
     *
     * @return integer
     */
    public function getDealId()
    {
        return $this->deal_id;
    }

    /**
     * Returns the value of field add_at
     *
     * @return integer
     */
    public function getAddAt()
    {
        return $this->add_at;
    }

    /**
     * Returns the value of field pay_at
     *
     * @return integer
     */
    public function getPayAt()
    {
        return $this->pay_at;
    }

    /**
     * Returns the value of field pay_price
     *
     * @return double
     */
    public function getPayPrice()
    {
        return $this->pay_price;
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
     * Returns the value of field active
     *
     * @return integer
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("gxc");
        $this->hasMany('id', 'App\Models\YztShopComment', 'order_id', ['alias' => 'YztShopComment']);
        $this->hasMany('id', 'App\Models\YztShopLogistics', 'order_id', ['alias' => 'YztShopLogistics']);
        $this->belongsTo('shop_id', 'App\Models\\YztShop', 'id', ['alias' => 'YztShop']);
        $this->belongsTo('user_id', 'App\Models\\YztGxcUser', 'id', ['alias' => 'YztGxcUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'yzt_shop_order';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztShopOrder[]|YztShopOrder
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztShopOrder
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
            'shop_id' => 'shop_id',
            'user_id' => 'user_id',
            'serial' => 'serial',
            'number' => 'number',
            'price' => 'price',
            'total_price' => 'total_price',
            'message' => 'message',
            'discount' => 'discount',
            'privilege_price' => 'privilege_price',
            'privilege_id' => 'privilege_id',
            'remark' => 'remark',
            'deal_id' => 'deal_id',
            'add_at' => 'add_at',
            'pay_at' => 'pay_at',
            'pay_price' => 'pay_price',
            'status' => 'status',
            'active' => 'active'
        ];
    }

}
