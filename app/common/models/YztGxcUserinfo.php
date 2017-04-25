<?php

namespace App\Models;

class YztGxcUserinfo extends \Phalcon\Mvc\Model
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
     * @Column(type="string", length=18, nullable=true)
     */
    protected $identity_no;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    protected $identity_front;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    protected $identity_back;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    protected $recommend_pic;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    protected $recommend_mediaid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $mediaid_time;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    protected $bank_name;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    protected $bank_province;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    protected $bank_city;

    /**
     *
     * @var string
     * @Column(type="string", length=40, nullable=true)
     */
    protected $bank_deposit;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    protected $bank_code;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    protected $alipay_code;

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
     * Method to set the value of field identity_no
     *
     * @param string $identity_no
     * @return $this
     */
    public function setIdentityNo($identity_no)
    {
        $this->identity_no = $identity_no;

        return $this;
    }

    /**
     * Method to set the value of field identity_front
     *
     * @param string $identity_front
     * @return $this
     */
    public function setIdentityFront($identity_front)
    {
        $this->identity_front = $identity_front;

        return $this;
    }

    /**
     * Method to set the value of field identity_back
     *
     * @param string $identity_back
     * @return $this
     */
    public function setIdentityBack($identity_back)
    {
        $this->identity_back = $identity_back;

        return $this;
    }

    /**
     * Method to set the value of field recommend_pic
     *
     * @param string $recommend_pic
     * @return $this
     */
    public function setRecommendPic($recommend_pic)
    {
        $this->recommend_pic = $recommend_pic;

        return $this;
    }

    /**
     * Method to set the value of field recommend_mediaid
     *
     * @param string $recommend_mediaid
     * @return $this
     */
    public function setRecommendMediaid($recommend_mediaid)
    {
        $this->recommend_mediaid = $recommend_mediaid;

        return $this;
    }

    /**
     * Method to set the value of field mediaid_time
     *
     * @param integer $mediaid_time
     * @return $this
     */
    public function setMediaidTime($mediaid_time)
    {
        $this->mediaid_time = $mediaid_time;

        return $this;
    }

    /**
     * Method to set the value of field bank_name
     *
     * @param string $bank_name
     * @return $this
     */
    public function setBankName($bank_name)
    {
        $this->bank_name = $bank_name;

        return $this;
    }

    /**
     * Method to set the value of field bank_province
     *
     * @param string $bank_province
     * @return $this
     */
    public function setBankProvince($bank_province)
    {
        $this->bank_province = $bank_province;

        return $this;
    }

    /**
     * Method to set the value of field bank_city
     *
     * @param string $bank_city
     * @return $this
     */
    public function setBankCity($bank_city)
    {
        $this->bank_city = $bank_city;

        return $this;
    }

    /**
     * Method to set the value of field bank_deposit
     *
     * @param string $bank_deposit
     * @return $this
     */
    public function setBankDeposit($bank_deposit)
    {
        $this->bank_deposit = $bank_deposit;

        return $this;
    }

    /**
     * Method to set the value of field bank_code
     *
     * @param string $bank_code
     * @return $this
     */
    public function setBankCode($bank_code)
    {
        $this->bank_code = $bank_code;

        return $this;
    }

    /**
     * Method to set the value of field alipay_code
     *
     * @param string $alipay_code
     * @return $this
     */
    public function setAlipayCode($alipay_code)
    {
        $this->alipay_code = $alipay_code;

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
     * Returns the value of field identity_no
     *
     * @return string
     */
    public function getIdentityNo()
    {
        return $this->identity_no;
    }

    /**
     * Returns the value of field identity_front
     *
     * @return string
     */
    public function getIdentityFront()
    {
        return $this->identity_front;
    }

    /**
     * Returns the value of field identity_back
     *
     * @return string
     */
    public function getIdentityBack()
    {
        return $this->identity_back;
    }

    /**
     * Returns the value of field recommend_pic
     *
     * @return string
     */
    public function getRecommendPic()
    {
        return $this->recommend_pic;
    }

    /**
     * Returns the value of field recommend_mediaid
     *
     * @return string
     */
    public function getRecommendMediaid()
    {
        return $this->recommend_mediaid;
    }

    /**
     * Returns the value of field mediaid_time
     *
     * @return integer
     */
    public function getMediaidTime()
    {
        return $this->mediaid_time;
    }

    /**
     * Returns the value of field bank_name
     *
     * @return string
     */
    public function getBankName()
    {
        return $this->bank_name;
    }

    /**
     * Returns the value of field bank_province
     *
     * @return string
     */
    public function getBankProvince()
    {
        return $this->bank_province;
    }

    /**
     * Returns the value of field bank_city
     *
     * @return string
     */
    public function getBankCity()
    {
        return $this->bank_city;
    }

    /**
     * Returns the value of field bank_deposit
     *
     * @return string
     */
    public function getBankDeposit()
    {
        return $this->bank_deposit;
    }

    /**
     * Returns the value of field bank_code
     *
     * @return string
     */
    public function getBankCode()
    {
        return $this->bank_code;
    }

    /**
     * Returns the value of field alipay_code
     *
     * @return string
     */
    public function getAlipayCode()
    {
        return $this->alipay_code;
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
        return 'yzt_gxc_userinfo';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztGxcUserinfo[]|YztGxcUserinfo
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztGxcUserinfo
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
            'identity_no' => 'identity_no',
            'identity_front' => 'identity_front',
            'identity_back' => 'identity_back',
            'recommend_pic' => 'recommend_pic',
            'recommend_mediaid' => 'recommend_mediaid',
            'mediaid_time' => 'mediaid_time',
            'bank_name' => 'bank_name',
            'bank_province' => 'bank_province',
            'bank_city' => 'bank_city',
            'bank_deposit' => 'bank_deposit',
            'bank_code' => 'bank_code',
            'alipay_code' => 'alipay_code'
        ];
    }

}
