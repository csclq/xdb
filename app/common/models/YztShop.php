<?php

namespace App\Models;

class YztShop extends \Phalcon\Mvc\Model
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
    protected $name;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $cate_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $child_cate;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $label;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    protected $brand;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=true)
     */
    protected $unit;

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
    protected $price;

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
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    protected $color;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
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
    protected $type;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    protected $material;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    protected $origin;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $create_at;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $describe;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
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
     * @Column(type="string", length=50, nullable=true)
     */
    protected $fashion;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    protected $is_love;

    /**
     *
     * @var integer
     * @Column(type="integer", length=6, nullable=true)
     */
    protected $integral;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=true)
     */
    protected $freight;

    /**
     *
     * @var string
     * @Column(type="string", length=40, nullable=true)
     */
    protected $free_area;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $merchant_id;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $img;

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
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    protected $is_hot;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    protected $is_new;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    protected $is_recommend;

    /**
     *
     * @var integer
     * @Column(type="integer", length=6, nullable=true)
     */
    protected $sort;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $send_num;

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
     * Method to set the value of field cate_id
     *
     * @param integer $cate_id
     * @return $this
     */
    public function setCateId($cate_id)
    {
        $this->cate_id = $cate_id;

        return $this;
    }

    /**
     * Method to set the value of field child_cate
     *
     * @param integer $child_cate
     * @return $this
     */
    public function setChildCate($child_cate)
    {
        $this->child_cate = $child_cate;

        return $this;
    }

    /**
     * Method to set the value of field label
     *
     * @param string $label
     * @return $this
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Method to set the value of field brand
     *
     * @param string $brand
     * @return $this
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Method to set the value of field unit
     *
     * @param string $unit
     * @return $this
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

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
     * Method to set the value of field type
     *
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

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
     * Method to set the value of field origin
     *
     * @param string $origin
     * @return $this
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * Method to set the value of field create_at
     *
     * @param integer $create_at
     * @return $this
     */
    public function setCreateAt($create_at)
    {
        $this->create_at = $create_at;

        return $this;
    }

    /**
     * Method to set the value of field describe
     *
     * @param string $describe
     * @return $this
     */
    public function setDescribe($describe)
    {
        $this->describe = $describe;

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
     * Method to set the value of field freight
     *
     * @param integer $freight
     * @return $this
     */
    public function setFreight($freight)
    {
        $this->freight = $freight;

        return $this;
    }

    /**
     * Method to set the value of field free_area
     *
     * @param string $free_area
     * @return $this
     */
    public function setFreeArea($free_area)
    {
        $this->free_area = $free_area;

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
     * Method to set the value of field sort
     *
     * @param integer $sort
     * @return $this
     */
    public function setSort($sort)
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * Method to set the value of field send_num
     *
     * @param integer $send_num
     * @return $this
     */
    public function setSendNum($send_num)
    {
        $this->send_num = $send_num;

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
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field cate_id
     *
     * @return integer
     */
    public function getCateId()
    {
        return $this->cate_id;
    }

    /**
     * Returns the value of field child_cate
     *
     * @return integer
     */
    public function getChildCate()
    {
        return $this->child_cate;
    }

    /**
     * Returns the value of field label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Returns the value of field brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Returns the value of field unit
     *
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
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
     * Returns the value of field type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
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
     * Returns the value of field origin
     *
     * @return string
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * Returns the value of field create_at
     *
     * @return integer
     */
    public function getCreateAt()
    {
        return $this->create_at;
    }

    /**
     * Returns the value of field describe
     *
     * @return string
     */
    public function getDescribe()
    {
        return $this->describe;
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
     * Returns the value of field is_love
     *
     * @return integer
     */
    public function getIsLove()
    {
        return $this->is_love;
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
     * Returns the value of field freight
     *
     * @return integer
     */
    public function getFreight()
    {
        return $this->freight;
    }

    /**
     * Returns the value of field free_area
     *
     * @return string
     */
    public function getFreeArea()
    {
        return $this->free_area;
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
     * Returns the value of field img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
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
     * Returns the value of field sort
     *
     * @return integer
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Returns the value of field send_num
     *
     * @return integer
     */
    public function getSendNum()
    {
        return $this->send_num;
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
        $this->hasMany('id', 'App\Models\YztShopList', 'shop_id', ['alias' => 'YztShopList']);
        $this->hasMany('id', 'App\Models\YztShopRelat', 'shop_id', ['alias' => 'YztShopRelat']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'yzt_shop';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztShop[]|YztShop
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztShop
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
            'name' => 'name',
            'cate_id' => 'cate_id',
            'child_cate' => 'child_cate',
            'label' => 'label',
            'brand' => 'brand',
            'unit' => 'unit',
            'number' => 'number',
            'price' => 'price',
            'member_price' => 'member_price',
            'preferential_price' => 'preferential_price',
            'color' => 'color',
            'size' => 'size',
            'weight' => 'weight',
            'type' => 'type',
            'material' => 'material',
            'origin' => 'origin',
            'create_at' => 'create_at',
            'describe' => 'describe',
            'style' => 'style',
            'thickness' => 'thickness',
            'fashion' => 'fashion',
            'is_love' => 'is_love',
            'integral' => 'integral',
            'freight' => 'freight',
            'free_area' => 'free_area',
            'merchant_id' => 'merchant_id',
            'img' => 'img',
            'keyword' => 'keyword',
            'content' => 'content',
            'is_hot' => 'is_hot',
            'is_new' => 'is_new',
            'is_recommend' => 'is_recommend',
            'sort' => 'sort',
            'send_num' => 'send_num',
            'add_at' => 'add_at',
            'update_at' => 'update_at',
            'active' => 'active'
        ];
    }

}
