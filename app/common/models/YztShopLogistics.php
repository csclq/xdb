<?php

namespace App\Models;

class YztShopLogistics extends \Phalcon\Mvc\Model
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
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $order_id;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    protected $express;

    /**
     *
     * @var string
     * @Column(type="string", length=40, nullable=true)
     */
    protected $express_no;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $dispatch_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    protected $status;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $add_at;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
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
     * Method to set the value of field express
     *
     * @param string $express
     * @return $this
     */
    public function setExpress($express)
    {
        $this->express = $express;

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
     * Method to set the value of field dispatch_id
     *
     * @param integer $dispatch_id
     * @return $this
     */
    public function setDispatchId($dispatch_id)
    {
        $this->dispatch_id = $dispatch_id;

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
     * Returns the value of field order_id
     *
     * @return integer
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * Returns the value of field express
     *
     * @return string
     */
    public function getExpress()
    {
        return $this->express;
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
     * Returns the value of field dispatch_id
     *
     * @return integer
     */
    public function getDispatchId()
    {
        return $this->dispatch_id;
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
     * Returns the value of field add_at
     *
     * @return integer
     */
    public function getAddAt()
    {
        return $this->add_at;
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
        $this->belongsTo('order_id', 'App\Models\\YztShopOrder', 'id', ['alias' => 'YztShopOrder']);
        $this->belongsTo('dispatch_id', 'App\Models\\YztUserDispatch', 'id', ['alias' => 'YztUserDispatch']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'yzt_shop_logistics';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztShopLogistics[]|YztShopLogistics
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztShopLogistics
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
            'order_id' => 'order_id',
            'express' => 'express',
            'express_no' => 'express_no',
            'dispatch_id' => 'dispatch_id',
            'status' => 'status',
            'add_at' => 'add_at',
            'active' => 'active'
        ];
    }

}
