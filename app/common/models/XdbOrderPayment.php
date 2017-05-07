<?php

namespace App\Models;

class XdbOrderPayment extends \Phalcon\Mvc\Model
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
     * @Column(type="string", length=50, nullable=false)
     */
    protected $openid;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $nickname;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $avatar;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $order_id;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $transaction_id;

    /**
     *
     * @var double
     * @Column(type="double", length=10, nullable=false)
     */
    protected $paid;

    /**
     *
     * @var double
     * @Column(type="double", length=10, nullable=false)
     */
    protected $refunded;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $paid_at;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $refunded_at;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    protected $refund_applied;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $refund_applied_at;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $last_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $goods_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    protected $status;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    protected $express_courier;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=true)
     */
    protected $express_no;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $send_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $send_time;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $myid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    protected $expire;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $posit;

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
     * Method to set the value of field order_id
     *
     * @param integer $order_id
     * @return $this
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;

        return $this;
    }

    /**
     * Method to set the value of field transaction_id
     *
     * @param string $transaction_id
     * @return $this
     */
    public function setTransactionId($transaction_id)
    {
        $this->transaction_id = $transaction_id;

        return $this;
    }

    /**
     * Method to set the value of field paid
     *
     * @param double $paid
     * @return $this
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * Method to set the value of field refunded
     *
     * @param double $refunded
     * @return $this
     */
    public function setRefunded($refunded)
    {
        $this->refunded = $refunded;

        return $this;
    }

    /**
     * Method to set the value of field paid_at
     *
     * @param string $paid_at
     * @return $this
     */
    public function setPaidAt($paid_at)
    {
        $this->paid_at = $paid_at;

        return $this;
    }

    /**
     * Method to set the value of field refunded_at
     *
     * @param string $refunded_at
     * @return $this
     */
    public function setRefundedAt($refunded_at)
    {
        $this->refunded_at = $refunded_at;

        return $this;
    }

    /**
     * Method to set the value of field refund_applied
     *
     * @param integer $refund_applied
     * @return $this
     */
    public function setRefundApplied($refund_applied)
    {
        $this->refund_applied = $refund_applied;

        return $this;
    }

    /**
     * Method to set the value of field refund_applied_at
     *
     * @param string $refund_applied_at
     * @return $this
     */
    public function setRefundAppliedAt($refund_applied_at)
    {
        $this->refund_applied_at = $refund_applied_at;

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
     * Method to set the value of field goods_id
     *
     * @param integer $goods_id
     * @return $this
     */
    public function setGoodsId($goods_id)
    {
        $this->goods_id = $goods_id;

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
     * Method to set the value of field send_id
     *
     * @param integer $send_id
     * @return $this
     */
    public function setSendId($send_id)
    {
        $this->send_id = $send_id;

        return $this;
    }

    /**
     * Method to set the value of field send_time
     *
     * @param integer $send_time
     * @return $this
     */
    public function setSendTime($send_time)
    {
        $this->send_time = $send_time;

        return $this;
    }

    /**
     * Method to set the value of field myid
     *
     * @param integer $myid
     * @return $this
     */
    public function setMyid($myid)
    {
        $this->myid = $myid;

        return $this;
    }

    /**
     * Method to set the value of field expire
     *
     * @param integer $expire
     * @return $this
     */
    public function setExpire($expire)
    {
        $this->expire = $expire;

        return $this;
    }

    /**
     * Method to set the value of field posit
     *
     * @param integer $posit
     * @return $this
     */
    public function setPosit($posit)
    {
        $this->posit = $posit;

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
     * Returns the value of field order_id
     *
     * @return integer
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * Returns the value of field transaction_id
     *
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transaction_id;
    }

    /**
     * Returns the value of field paid
     *
     * @return double
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Returns the value of field refunded
     *
     * @return double
     */
    public function getRefunded()
    {
        return $this->refunded;
    }

    /**
     * Returns the value of field paid_at
     *
     * @return string
     */
    public function getPaidAt()
    {
        return $this->paid_at;
    }

    /**
     * Returns the value of field refunded_at
     *
     * @return string
     */
    public function getRefundedAt()
    {
        return $this->refunded_at;
    }

    /**
     * Returns the value of field refund_applied
     *
     * @return integer
     */
    public function getRefundApplied()
    {
        return $this->refund_applied;
    }

    /**
     * Returns the value of field refund_applied_at
     *
     * @return string
     */
    public function getRefundAppliedAt()
    {
        return $this->refund_applied_at;
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
     * Returns the value of field goods_id
     *
     * @return integer
     */
    public function getGoodsId()
    {
        return $this->goods_id;
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
     * Returns the value of field send_id
     *
     * @return integer
     */
    public function getSendId()
    {
        return $this->send_id;
    }

    /**
     * Returns the value of field send_time
     *
     * @return integer
     */
    public function getSendTime()
    {
        return $this->send_time;
    }

    /**
     * Returns the value of field myid
     *
     * @return integer
     */
    public function getMyid()
    {
        return $this->myid;
    }

    /**
     * Returns the value of field expire
     *
     * @return integer
     */
    public function getExpire()
    {
        return $this->expire;
    }

    /**
     * Returns the value of field posit
     *
     * @return integer
     */
    public function getPosit()
    {
        return $this->posit;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("gxc");
        $this->belongsTo('goods_id', 'App\Models\\XdbProduct', 'id', ['alias' => 'XdbProduct']);
        $this->belongsTo('last_id', 'App\Models\\XdbOrder', 'id', ['alias' => 'XdbOrder']);

    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'xdb_order_payment';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return XdbOrderPayment[]|XdbOrderPayment
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return XdbOrderPayment
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
            'nickname' => 'nickname',
            'avatar' => 'avatar',
            'order_id' => 'order_id',
            'transaction_id' => 'transaction_id',
            'paid' => 'paid',
            'refunded' => 'refunded',
            'paid_at' => 'paid_at',
            'refunded_at' => 'refunded_at',
            'refund_applied' => 'refund_applied',
            'refund_applied_at' => 'refund_applied_at',
            'last_id' => 'last_id',
            'goods_id' => 'goods_id',
            'status' => 'status',
            'express_courier' => 'express_courier',
            'express_no' => 'express_no',
            'send_id' => 'send_id',
            'send_time' => 'send_time',
            'myid' => 'myid',
            'expire' => 'expire',
            'posit' => 'posit'
        ];
    }

}
