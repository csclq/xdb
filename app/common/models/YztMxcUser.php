<?php

namespace App\Models;

class YztMxcUser extends \Phalcon\Mvc\Model
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
    protected $nickname;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    protected $realname;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    protected $username;

    /**
     *
     * @var string
     * @Column(type="string", length=28, nullable=true)
     */
    protected $openid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $phone;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=false)
     */
    protected $passwd;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $avatar;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=false)
     */
    protected $sex;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
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
     * @Column(type="string", length=30, nullable=false)
     */
    protected $area;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    protected $address;

    /**
     *
     * @var string
     * @Column(type="string", length=12, nullable=true)
     */
    protected $cardsn;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $recommend;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=true)
     */
    protected $level;

    /**
     *
     * @var integer
     * @Column(type="integer", length=5, nullable=true)
     */
    protected $groupid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    protected $vip;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $add_at;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=true)
     */
    protected $active;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $integral;

    /**
     *
     * @var double
     * @Column(type="double", length=10, nullable=true)
     */
    protected $money;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $update_at;

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
     * Method to set the value of field realname
     *
     * @param string $realname
     * @return $this
     */
    public function setRealname($realname)
    {
        $this->realname = $realname;

        return $this;
    }

    /**
     * Method to set the value of field username
     *
     * @param string $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

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
     * Method to set the value of field passwd
     *
     * @param string $passwd
     * @return $this
     */
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;

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
     * Method to set the value of field sex
     *
     * @param integer $sex
     * @return $this
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

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
     * Method to set the value of field area
     *
     * @param string $area
     * @return $this
     */
    public function setArea($area)
    {
        $this->area = $area;

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
     * Method to set the value of field cardsn
     *
     * @param string $cardsn
     * @return $this
     */
    public function setCardsn($cardsn)
    {
        $this->cardsn = $cardsn;

        return $this;
    }

    /**
     * Method to set the value of field recommend
     *
     * @param integer $recommend
     * @return $this
     */
    public function setRecommend($recommend)
    {
        $this->recommend = $recommend;

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
     * Method to set the value of field groupid
     *
     * @param integer $groupid
     * @return $this
     */
    public function setGroupid($groupid)
    {
        $this->groupid = $groupid;

        return $this;
    }

    /**
     * Method to set the value of field vip
     *
     * @param integer $vip
     * @return $this
     */
    public function setVip($vip)
    {
        $this->vip = $vip;

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
     * Method to set the value of field integral
     *
     * @param integer $integral
     * @return $this
     */
    public function setIntegral($integral)
    {
        $this->integral = $integral;

        return $this;
    }

    /**
     * Method to set the value of field money
     *
     * @param double $money
     * @return $this
     */
    public function setMoney($money)
    {
        $this->money = $money;

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
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
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
     * Returns the value of field realname
     *
     * @return string
     */
    public function getRealname()
    {
        return $this->realname;
    }

    /**
     * Returns the value of field username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
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
     * Returns the value of field phone
     *
     * @return integer
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Returns the value of field passwd
     *
     * @return string
     */
    public function getPasswd()
    {
        return $this->passwd;
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
     * Returns the value of field sex
     *
     * @return integer
     */
    public function getSex()
    {
        return $this->sex;
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
     * Returns the value of field area
     *
     * @return string
     */
    public function getArea()
    {
        return $this->area;
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
     * Returns the value of field cardsn
     *
     * @return string
     */
    public function getCardsn()
    {
        return $this->cardsn;
    }

    /**
     * Returns the value of field recommend
     *
     * @return integer
     */
    public function getRecommend()
    {
        return $this->recommend;
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
     * Returns the value of field groupid
     *
     * @return integer
     */
    public function getGroupid()
    {
        return $this->groupid;
    }

    /**
     * Returns the value of field vip
     *
     * @return integer
     */
    public function getVip()
    {
        return $this->vip;
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
     * Returns the value of field integral
     *
     * @return integer
     */
    public function getIntegral()
    {
        return $this->integral;
    }

    /**
     * Returns the value of field money
     *
     * @return double
     */
    public function getMoney()
    {
        return $this->money;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("gxc");
        $this->hasMany('id', 'App\Models\YztIntegral', 'user_id', ['alias' => 'YztIntegral']);
        $this->hasMany('id', 'App\Models\YztShopCart', 'user_id', ['alias' => 'YztShopCart']);
        $this->hasMany('id', 'App\Models\YztShopComment', 'user_id', ['alias' => 'YztShopComment']);
        $this->hasMany('id', 'App\Models\YztShopCommentPraise', 'user_id', ['alias' => 'YztShopCommentPraise']);
        $this->hasMany('id', 'App\Models\YztShopLog', 'user_id', ['alias' => 'YztShopLog']);
        $this->hasMany('id', 'App\Models\YztShopOrder', 'user_id', ['alias' => 'YztShopOrder']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'yzt_mxc_user';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztMxcUser[]|YztMxcUser
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztMxcUser
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * create new record set add_at equal now time,update_at equal now time
     */

    public function beforeCreate()
    {
        $this->add_at=time();
        $this->update_at=time();
    }

    /**
     * update record set update_at equal now time
     */

    public function beforeUpdate()
    {
        $this->update_at=time();
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
            'nickname' => 'nickname',
            'realname' => 'realname',
            'username' => 'username',
            'openid' => 'openid',
            'phone' => 'phone',
            'passwd' => 'passwd',
            'avatar' => 'avatar',
            'sex' => 'sex',
            'province' => 'province',
            'city' => 'city',
            'area' => 'area',
            'address' => 'address',
            'cardsn' => 'cardsn',
            'recommend' => 'recommend',
            'level' => 'level',
            'groupid' => 'groupid',
            'vip' => 'vip',
            'add_at' => 'add_at',
            'active' => 'active',
            'integral' => 'integral',
            'money' => 'money',
            'update_at' => 'update_at'
        ];
    }

}
