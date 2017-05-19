<?php

namespace App\Models;

class YztMerchant extends \Phalcon\Mvc\Model
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
    protected $user_id;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $name;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $province_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $city_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $area_id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $scope;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $address;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    protected $is_love;

    /**
     *
     * @var double
     * @Column(type="double", length=12, nullable=true)
     */
    protected $lng;

    /**
     *
     * @var double
     * @Column(type="double", length=12, nullable=true)
     */
    protected $lat;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    protected $level;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $carousel;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $parent;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    protected $phone;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $keyword;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $content;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=true)
     */
    protected $principal;

    /**
     *
     * @var string
     * @Column(type="string", length=60, nullable=true)
     */
    protected $license;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $license_pic;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    protected $principal_phone;

    /**
     *
     * @var string
     * @Column(type="string", length=18, nullable=true)
     */
    protected $principal_cardno;

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
     * @Column(type="string", nullable=true)
     */
    protected $images;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $registered_fund;

    /**
     *
     * @var integer
     * @Column(type="integer", length=6, nullable=true)
     */
    protected $partner_number;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $partner_money;

    /**
     *
     * @var integer
     * @Column(type="integer", length=6, nullable=true)
     */
    protected $has_partner;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    protected $have_partner;

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
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field province_id
     *
     * @param integer $province_id
     * @return $this
     */
    public function setProvinceId($province_id)
    {
        $this->province_id = $province_id;

        return $this;
    }

    /**
     * Method to set the value of field city_id
     *
     * @param integer $city_id
     * @return $this
     */
    public function setCityId($city_id)
    {
        $this->city_id = $city_id;

        return $this;
    }

    /**
     * Method to set the value of field area_id
     *
     * @param integer $area_id
     * @return $this
     */
    public function setAreaId($area_id)
    {
        $this->area_id = $area_id;

        return $this;
    }

    /**
     * Method to set the value of field scope
     *
     * @param string $scope
     * @return $this
     */
    public function setScope($scope)
    {
        $this->scope = $scope;

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
     * Method to set the value of field is_love
     *
     * @param integer $is_love
     * @return $this
     */
    public function setIsLove($is_love)
    {
        $this->is_love = $is_love;

        return $this;
    }

    /**
     * Method to set the value of field lng
     *
     * @param double $lng
     * @return $this
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * Method to set the value of field lat
     *
     * @param double $lat
     * @return $this
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

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
     * Method to set the value of field carousel
     *
     * @param string $carousel
     * @return $this
     */
    public function setCarousel($carousel)
    {
        $this->carousel = $carousel;

        return $this;
    }

    /**
     * Method to set the value of field parent
     *
     * @param integer $parent
     * @return $this
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Method to set the value of field phone
     *
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Method to set the value of field keyword
     *
     * @param string $keyword
     * @return $this
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * Method to set the value of field content
     *
     * @param string $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Method to set the value of field principal
     *
     * @param string $principal
     * @return $this
     */
    public function setPrincipal($principal)
    {
        $this->principal = $principal;

        return $this;
    }

    /**
     * Method to set the value of field license
     *
     * @param string $license
     * @return $this
     */
    public function setLicense($license)
    {
        $this->license = $license;

        return $this;
    }

    /**
     * Method to set the value of field license_pic
     *
     * @param string $license_pic
     * @return $this
     */
    public function setLicensePic($license_pic)
    {
        $this->license_pic = $license_pic;

        return $this;
    }

    /**
     * Method to set the value of field principal_phone
     *
     * @param string $principal_phone
     * @return $this
     */
    public function setPrincipalPhone($principal_phone)
    {
        $this->principal_phone = $principal_phone;

        return $this;
    }

    /**
     * Method to set the value of field principal_cardno
     *
     * @param string $principal_cardno
     * @return $this
     */
    public function setPrincipalCardno($principal_cardno)
    {
        $this->principal_cardno = $principal_cardno;

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
     * Method to set the value of field images
     *
     * @param string $images
     * @return $this
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * Method to set the value of field registered_fund
     *
     * @param integer $registered_fund
     * @return $this
     */
    public function setRegisteredFund($registered_fund)
    {
        $this->registered_fund = $registered_fund;

        return $this;
    }

    /**
     * Method to set the value of field partner_number
     *
     * @param integer $partner_number
     * @return $this
     */
    public function setPartnerNumber($partner_number)
    {
        $this->partner_number = $partner_number;

        return $this;
    }

    /**
     * Method to set the value of field partner_money
     *
     * @param integer $partner_money
     * @return $this
     */
    public function setPartnerMoney($partner_money)
    {
        $this->partner_money = $partner_money;

        return $this;
    }

    /**
     * Method to set the value of field has_partner
     *
     * @param integer $has_partner
     * @return $this
     */
    public function setHasPartner($has_partner)
    {
        $this->has_partner = $has_partner;

        return $this;
    }

    /**
     * Method to set the value of field have_partner
     *
     * @param integer $have_partner
     * @return $this
     */
    public function setHavePartner($have_partner)
    {
        $this->have_partner = $have_partner;

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
     * Returns the value of field user_id
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field province_id
     *
     * @return integer
     */
    public function getProvinceId()
    {
        return $this->province_id;
    }

    /**
     * Returns the value of field city_id
     *
     * @return integer
     */
    public function getCityId()
    {
        return $this->city_id;
    }

    /**
     * Returns the value of field area_id
     *
     * @return integer
     */
    public function getAreaId()
    {
        return $this->area_id;
    }

    /**
     * Returns the value of field scope
     *
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
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
     * Returns the value of field is_love
     *
     * @return integer
     */
    public function getIsLove()
    {
        return $this->is_love;
    }

    /**
     * Returns the value of field lng
     *
     * @return double
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Returns the value of field lat
     *
     * @return double
     */
    public function getLat()
    {
        return $this->lat;
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
     * Returns the value of field carousel
     *
     * @return string
     */
    public function getCarousel()
    {
        return $this->carousel;
    }

    /**
     * Returns the value of field parent
     *
     * @return integer
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Returns the value of field phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Returns the value of field keyword
     *
     * @return string
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * Returns the value of field content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Returns the value of field principal
     *
     * @return string
     */
    public function getPrincipal()
    {
        return $this->principal;
    }

    /**
     * Returns the value of field license
     *
     * @return string
     */
    public function getLicense()
    {
        return $this->license;
    }

    /**
     * Returns the value of field license_pic
     *
     * @return string
     */
    public function getLicensePic()
    {
        return $this->license_pic;
    }

    /**
     * Returns the value of field principal_phone
     *
     * @return string
     */
    public function getPrincipalPhone()
    {
        return $this->principal_phone;
    }

    /**
     * Returns the value of field principal_cardno
     *
     * @return string
     */
    public function getPrincipalCardno()
    {
        return $this->principal_cardno;
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
     * Returns the value of field images
     *
     * @return string
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Returns the value of field registered_fund
     *
     * @return integer
     */
    public function getRegisteredFund()
    {
        return $this->registered_fund;
    }

    /**
     * Returns the value of field partner_number
     *
     * @return integer
     */
    public function getPartnerNumber()
    {
        return $this->partner_number;
    }

    /**
     * Returns the value of field partner_money
     *
     * @return integer
     */
    public function getPartnerMoney()
    {
        return $this->partner_money;
    }

    /**
     * Returns the value of field has_partner
     *
     * @return integer
     */
    public function getHasPartner()
    {
        return $this->has_partner;
    }

    /**
     * Returns the value of field have_partner
     *
     * @return integer
     */
    public function getHavePartner()
    {
        return $this->have_partner;
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
        $this->hasMany('id', 'App\Models\YztShopList', 'merchant_id', ['alias' => 'YztShopList']);
        $this->hasMany('id', 'App\Models\YztShopRelat', 'merchant_id', ['alias' => 'YztShopRelat']);
        $this->belongsTo('user_id', 'App\Models\\YztGxcUser', 'id', ['alias' => 'YztGxcUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'yzt_merchant';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztMerchant[]|YztMerchant
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztMerchant
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
            'name' => 'name',
            'province_id' => 'province_id',
            'city_id' => 'city_id',
            'area_id' => 'area_id',
            'scope' => 'scope',
            'address' => 'address',
            'is_love' => 'is_love',
            'lng' => 'lng',
            'lat' => 'lat',
            'level' => 'level',
            'carousel' => 'carousel',
            'parent' => 'parent',
            'phone' => 'phone',
            'keyword' => 'keyword',
            'content' => 'content',
            'principal' => 'principal',
            'license' => 'license',
            'license_pic' => 'license_pic',
            'principal_phone' => 'principal_phone',
            'principal_cardno' => 'principal_cardno',
            'identity_front' => 'identity_front',
            'identity_back' => 'identity_back',
            'images' => 'images',
            'registered_fund' => 'registered_fund',
            'partner_number' => 'partner_number',
            'partner_money' => 'partner_money',
            'has_partner' => 'has_partner',
            'have_partner' => 'have_partner',
            'add_at' => 'add_at',
            'update_at' => 'update_at',
            'active' => 'active'
        ];
    }

}
