<?php

namespace App\Models;

class YztGxcPartner extends \Phalcon\Mvc\Model
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
    protected $merchant_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $user_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $money;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=true)
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
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $verify_at;

    /**
     *
     * @var string
     * @Column(type="string", length=40, nullable=true)
     */
    protected $verify_user;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $verify_content;

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
     * Method to set the value of field merchant_id
     *
     * @param integer $merchant_id
     * @return $this
     */
    public function setMerchantId($merchant_id)
    {
        $this->merchant_id = $merchant_id;

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
     * Method to set the value of field money
     *
     * @param integer $money
     * @return $this
     */
    public function setMoney($money)
    {
        $this->money = $money;

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
     * Method to set the value of field verify_at
     *
     * @param integer $verify_at
     * @return $this
     */
    public function setVerifyAt($verify_at)
    {
        $this->verify_at = $verify_at;

        return $this;
    }

    /**
     * Method to set the value of field verify_user
     *
     * @param string $verify_user
     * @return $this
     */
    public function setVerifyUser($verify_user)
    {
        $this->verify_user = $verify_user;

        return $this;
    }

    /**
     * Method to set the value of field verify_content
     *
     * @param string $verify_content
     * @return $this
     */
    public function setVerifyContent($verify_content)
    {
        $this->verify_content = $verify_content;

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
     * Returns the value of field merchant_id
     *
     * @return integer
     */
    public function getMerchantId()
    {
        return $this->merchant_id;
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
     * Returns the value of field money
     *
     * @return integer
     */
    public function getMoney()
    {
        return $this->money;
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
     * Returns the value of field verify_at
     *
     * @return integer
     */
    public function getVerifyAt()
    {
        return $this->verify_at;
    }

    /**
     * Returns the value of field verify_user
     *
     * @return string
     */
    public function getVerifyUser()
    {
        return $this->verify_user;
    }

    /**
     * Returns the value of field verify_content
     *
     * @return string
     */
    public function getVerifyContent()
    {
        return $this->verify_content;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("gxc");
        $this->belongsTo('merchant_id', 'App\Models\\YztMerchant', 'id', ['alias' => 'YztMerchant']);
        $this->belongsTo('user_id', 'App\Models\\YztGxcUser', 'id', ['alias' => 'YztGxcUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'yzt_gxc_partner';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztGxcPartner[]|YztGxcPartner
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztGxcPartner
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
            'merchant_id' => 'merchant_id',
            'user_id' => 'user_id',
            'money' => 'money',
            'status' => 'status',
            'add_at' => 'add_at',
            'verify_at' => 'verify_at',
            'verify_user' => 'verify_user',
            'verify_content' => 'verify_content'
        ];
    }

}
