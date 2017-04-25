<?php

namespace App\Models;

class YztShopList extends \Phalcon\Mvc\Model
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
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $merchant_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $user_id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $shop_name;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $number;

    /**
     *
     * @var double
     * @Column(type="double", length=10, nullable=true)
     */
    protected $member_price;

    /**
     *
     * @var double
     * @Column(type="double", length=10, nullable=true)
     */
    protected $preferential_price;

    /**
     *
     * @var double
     * @Column(type="double", length=10, nullable=true)
     */
    protected $price;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    protected $color;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    protected $size;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    protected $weight;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    protected $material;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    protected $style;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    protected $thickness;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    protected $fashion;

    /**
     *
     * @var integer
     * @Column(type="integer", length=6, nullable=true)
     */
    protected $integral;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $img;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    protected $is_hot;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    protected $is_new;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    protected $is_recommend;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $sale_number;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $month_number;

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
     * @Column(type="integer", length=4, nullable=true)
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
     * Method to set the value of field shop_name
     *
     * @param string $shop_name
     * @return $this
     */
    public function setShopName($shop_name)
    {
        $this->shop_name = $shop_name;

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
     * Method to set the value of field member_price
     *
     * @param double $member_price
     * @return $this
     */
    public function setMemberPrice($member_price)
    {
        $this->member_price = $member_price;

        return $this;
    }

    /**
     * Method to set the value of field preferential_price
     *
     * @param double $preferential_price
     * @return $this
     */
    public function setPreferentialPrice($preferential_price)
    {
        $this->preferential_price = $preferential_price;

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
     * Method to set the value of field color
     *
     * @param string $color
     * @return $this
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Method to set the value of field size
     *
     * @param string $size
     * @return $this
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Method to set the value of field weight
     *
     * @param string $weight
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Method to set the value of field material
     *
     * @param string $material
     * @return $this
     */
    public function setMaterial($material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Method to set the value of field style
     *
     * @param string $style
     * @return $this
     */
    public function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Method to set the value of field thickness
     *
     * @param string $thickness
     * @return $this
     */
    public function setThickness($thickness)
    {
        $this->thickness = $thickness;

        return $this;
    }

    /**
     * Method to set the value of field fashion
     *
     * @param string $fashion
     * @return $this
     */
    public function setFashion($fashion)
    {
        $this->fashion = $fashion;

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
     * Method to set the value of field img
     *
     * @param string $img
     * @return $this
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Method to set the value of field is_hot
     *
     * @param integer $is_hot
     * @return $this
     */
    public function setIsHot($is_hot)
    {
        $this->is_hot = $is_hot;

        return $this;
    }

    /**
     * Method to set the value of field is_new
     *
     * @param integer $is_new
     * @return $this
     */
    public function setIsNew($is_new)
    {
        $this->is_new = $is_new;

        return $this;
    }

    /**
     * Method to set the value of field is_recommend
     *
     * @param integer $is_recommend
     * @return $this
     */
    public function setIsRecommend($is_recommend)
    {
        $this->is_recommend = $is_recommend;

        return $this;
    }

    /**
     * Method to set the value of field sale_number
     *
     * @param integer $sale_number
     * @return $this
     */
    public function setSaleNumber($sale_number)
    {
        $this->sale_number = $sale_number;

        return $this;
    }

    /**
     * Method to set the value of field month_number
     *
     * @param integer $month_number
     * @return $this
     */
    public function setMonthNumber($month_number)
    {
        $this->month_number = $month_number;

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
     * Returns the value of field shop_id
     *
     * @return integer
     */
    public function getShopId()
    {
        return $this->shop_id;
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
     * Returns the value of field shop_name
     *
     * @return string
     */
    public function getShopName()
    {
        return $this->shop_name;
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
     * Returns the value of field member_price
     *
     * @return double
     */
    public function getMemberPrice()
    {
        return $this->member_price;
    }

    /**
     * Returns the value of field preferential_price
     *
     * @return double
     */
    public function getPreferentialPrice()
    {
        return $this->preferential_price;
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
     * Returns the value of field color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Returns the value of field size
     *
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Returns the value of field weight
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Returns the value of field material
     *
     * @return string
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Returns the value of field style
     *
     * @return string
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Returns the value of field thickness
     *
     * @return string
     */
    public function getThickness()
    {
        return $this->thickness;
    }

    /**
     * Returns the value of field fashion
     *
     * @return string
     */
    public function getFashion()
    {
        return $this->fashion;
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
     * Returns the value of field img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Returns the value of field is_hot
     *
     * @return integer
     */
    public function getIsHot()
    {
        return $this->is_hot;
    }

    /**
     * Returns the value of field is_new
     *
     * @return integer
     */
    public function getIsNew()
    {
        return $this->is_new;
    }

    /**
     * Returns the value of field is_recommend
     *
     * @return integer
     */
    public function getIsRecommend()
    {
        return $this->is_recommend;
    }

    /**
     * Returns the value of field sale_number
     *
     * @return integer
     */
    public function getSaleNumber()
    {
        return $this->sale_number;
    }

    /**
     * Returns the value of field month_number
     *
     * @return integer
     */
    public function getMonthNumber()
    {
        return $this->month_number;
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
        $this->hasMany('id', 'App\Models\YztShopOrder', 'shop_id', ['alias' => 'YztShopOrder']);
        $this->belongsTo('shop_id', 'App\Models\\YztShop', 'id', ['alias' => 'YztShop']);
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
        return 'yzt_shop_list';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztShopList[]|YztShopList
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztShopList
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
            'merchant_id' => 'merchant_id',
            'user_id' => 'user_id',
            'shop_name' => 'shop_name',
            'number' => 'number',
            'member_price' => 'member_price',
            'preferential_price' => 'preferential_price',
            'price' => 'price',
            'color' => 'color',
            'size' => 'size',
            'weight' => 'weight',
            'material' => 'material',
            'style' => 'style',
            'thickness' => 'thickness',
            'fashion' => 'fashion',
            'integral' => 'integral',
            'img' => 'img',
            'is_hot' => 'is_hot',
            'is_new' => 'is_new',
            'is_recommend' => 'is_recommend',
            'sale_number' => 'sale_number',
            'month_number' => 'month_number',
            'add_at' => 'add_at',
            'update_at' => 'update_at',
            'active' => 'active'
        ];
    }

}
