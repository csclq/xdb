<?php

namespace App\Models;

class YztGxcApplyPartner extends \Phalcon\Mvc\Model
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
    protected $user_id;

    /**
     *
     * @var string
     * @Column(type="string", length=18, nullable=false)
     */
    protected $identity_card;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $phone;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=false)
     */
    protected $level;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    protected $recommend_cardsn;

    /**
     *
     * @var integer
     * @Column(type="integer", length=6, nullable=true)
     */
    protected $province;

    /**
     *
     * @var integer
     * @Column(type="integer", length=6, nullable=true)
     */
    protected $city;

    /**
     *
     * @var integer
     * @Column(type="integer", length=6, nullable=true)
     */
    protected $area;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $money;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    protected $bank;

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
    protected $update_at;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    protected $status;

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
     * Method to set the value of field identity_card
     *
     * @param string $identity_card
     * @return $this
     */
    public function setIdentityCard($identity_card)
    {
        $this->identity_card = $identity_card;

        return $this;
    }

    /**
     * Method to set the value of field phone
     *
     * @param integer $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Method to set the value of field level
     *
     * @param integer $level
     * @return $this
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Method to set the value of field recommend_cardsn
     *
     * @param string $recommend_cardsn
     * @return $this
     */
    public function setRecommendCardsn($recommend_cardsn)
    {
        $this->recommend_cardsn = $recommend_cardsn;

        return $this;
    }

    /**
     * Method to set the value of field province
     *
     * @param integer $province
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
     * @param integer $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Method to set the value of field area
     *
     * @param integer $area
     * @return $this
     */
    public function setArea($area)
    {
        $this->area = $area;

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
     * Method to set the value of field bank
     *
     * @param string $bank
     * @return $this
     */
    public function setBank($bank)
    {
        $this->bank = $bank;

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
     * Method to set the value of field update_at
     *
     * @param integer $update_at
     * @return $this
     */
    public function setUpdateAt($update_at)
    {
        $this->update_at = $update_at;

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
     * Returns the value of field user_id
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Returns the value of field identity_card
     *
     * @return string
     */
    public function getIdentityCard()
    {
        return $this->identity_card;
    }

    /**
     * Returns the value of field phone
     *
     * @return integer
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Returns the value of field level
     *
     * @return integer
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Returns the value of field recommend_cardsn
     *
     * @return string
     */
    public function getRecommendCardsn()
    {
        return $this->recommend_cardsn;
    }

    /**
     * Returns the value of field province
     *
     * @return integer
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Returns the value of field city
     *
     * @return integer
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Returns the value of field area
     *
     * @return integer
     */
    public function getArea()
    {
        return $this->area;
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
     * Returns the value of field bank
     *
     * @return string
     */
    public function getBank()
    {
        return $this->bank;
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
     * Returns the value of field update_at
     *
     * @return integer
     */
    public function getUpdateAt()
    {
        return $this->update_at;
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
        $this->belongsTo('user_id', 'App\Models\\YztGxcUser', 'id', ['alias' => 'YztGxcUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'yzt_gxc_apply_partner';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztGxcApplyPartner[]|YztGxcApplyPartner
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztGxcApplyPartner
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
            'user_id' => 'user_id',
            'identity_card' => 'identity_card',
            'phone' => 'phone',
            'level' => 'level',
            'recommend_cardsn' => 'recommend_cardsn',
            'province' => 'province',
            'city' => 'city',
            'area' => 'area',
            'money' => 'money',
            'bank' => 'bank',
            'add_at' => 'add_at',
            'update_at' => 'update_at',
            'status' => 'status',
            'verify_at' => 'verify_at',
            'verify_user' => 'verify_user',
            'verify_content' => 'verify_content'
        ];
    }

}
