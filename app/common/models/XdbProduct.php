<?php

namespace App\Models;

class XdbProduct extends \Phalcon\Mvc\Model
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
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $category_id;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    protected $product_id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $pic_url;

    /**
     *
     * @var double
     * @Column(type="double", length=6, nullable=false)
     */
    protected $price;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $stock;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    protected $on_sale;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    protected $num_sold;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $description;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    protected $deleted;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $uniacid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $select_count;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $sale_count;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $send_count;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $sort;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    protected $hot;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    protected $new;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    protected $fashion;

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
     * Method to set the value of field category_id
     *
     * @param integer $category_id
     * @return $this
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Method to set the value of field product_id
     *
     * @param string $product_id
     * @return $this
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }

    /**
     * Method to set the value of field pic_url
     *
     * @param string $pic_url
     * @return $this
     */
    public function setPicUrl($pic_url)
    {
        $this->pic_url = $pic_url;

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
     * Method to set the value of field stock
     *
     * @param integer $stock
     * @return $this
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Method to set the value of field on_sale
     *
     * @param integer $on_sale
     * @return $this
     */
    public function setOnSale($on_sale)
    {
        $this->on_sale = $on_sale;

        return $this;
    }

    /**
     * Method to set the value of field num_sold
     *
     * @param integer $num_sold
     * @return $this
     */
    public function setNumSold($num_sold)
    {
        $this->num_sold = $num_sold;

        return $this;
    }

    /**
     * Method to set the value of field description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Method to set the value of field deleted
     *
     * @param integer $deleted
     * @return $this
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Method to set the value of field uniacid
     *
     * @param string $uniacid
     * @return $this
     */
    public function setUniacid($uniacid)
    {
        $this->uniacid = $uniacid;

        return $this;
    }

    /**
     * Method to set the value of field select_count
     *
     * @param integer $select_count
     * @return $this
     */
    public function setSelectCount($select_count)
    {
        $this->select_count = $select_count;

        return $this;
    }

    /**
     * Method to set the value of field sale_count
     *
     * @param integer $sale_count
     * @return $this
     */
    public function setSaleCount($sale_count)
    {
        $this->sale_count = $sale_count;

        return $this;
    }

    /**
     * Method to set the value of field send_count
     *
     * @param integer $send_count
     * @return $this
     */
    public function setSendCount($send_count)
    {
        $this->send_count = $send_count;

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
     * Method to set the value of field hot
     *
     * @param integer $hot
     * @return $this
     */
    public function setHot($hot)
    {
        $this->hot = $hot;

        return $this;
    }

    /**
     * Method to set the value of field new
     *
     * @param integer $new
     * @return $this
     */
    public function setNew($new)
    {
        $this->new = $new;

        return $this;
    }

    /**
     * Method to set the value of field fashion
     *
     * @param integer $fashion
     * @return $this
     */
    public function setFashion($fashion)
    {
        $this->fashion = $fashion;

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
     * Returns the value of field category_id
     *
     * @return integer
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Returns the value of field product_id
     *
     * @return string
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Returns the value of field pic_url
     *
     * @return string
     */
    public function getPicUrl()
    {
        return $this->pic_url;
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
     * Returns the value of field stock
     *
     * @return integer
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Returns the value of field on_sale
     *
     * @return integer
     */
    public function getOnSale()
    {
        return $this->on_sale;
    }

    /**
     * Returns the value of field num_sold
     *
     * @return integer
     */
    public function getNumSold()
    {
        return $this->num_sold;
    }

    /**
     * Returns the value of field description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the value of field deleted
     *
     * @return integer
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Returns the value of field uniacid
     *
     * @return string
     */
    public function getUniacid()
    {
        return $this->uniacid;
    }

    /**
     * Returns the value of field select_count
     *
     * @return integer
     */
    public function getSelectCount()
    {
        return $this->select_count;
    }

    /**
     * Returns the value of field sale_count
     *
     * @return integer
     */
    public function getSaleCount()
    {
        return $this->sale_count;
    }

    /**
     * Returns the value of field send_count
     *
     * @return integer
     */
    public function getSendCount()
    {
        return $this->send_count;
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
     * Returns the value of field hot
     *
     * @return integer
     */
    public function getHot()
    {
        return $this->hot;
    }

    /**
     * Returns the value of field new
     *
     * @return integer
     */
    public function getNew()
    {
        return $this->new;
    }

    /**
     * Returns the value of field fashion
     *
     * @return integer
     */
    public function getFashion()
    {
        return $this->fashion;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("gxc");
        $this->useDynamicUpdate(true);
        $this->hasMany('id', 'App\Models\XdbSpecification', 'product_id', ['alias' => 'XdbSpecification']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'xdb_product';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return XdbProduct[]|XdbProduct
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return XdbProduct
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
            'category_id' => 'category_id',
            'product_id' => 'product_id',
            'pic_url' => 'pic_url',
            'price' => 'price',
            'stock' => 'stock',
            'on_sale' => 'on_sale',
            'num_sold' => 'num_sold',
            'description' => 'description',
            'deleted' => 'deleted',
            'uniacid' => 'uniacid',
            'select_count' => 'select_count',
            'sale_count' => 'sale_count',
            'send_count' => 'send_count',
            'sort' => 'sort',
            'hot' => 'hot',
            'new' => 'new',
            'fashion' => 'fashion'
        ];
    }

}
