<?php

namespace App\Models;

class XdbStarRule extends \Phalcon\Mvc\Model
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
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $hit_number;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $buy_number;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    protected $star;

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
     * Method to set the value of field hit_number
     *
     * @param integer $hit_number
     * @return $this
     */
    public function setHitNumber($hit_number)
    {
        $this->hit_number = $hit_number;

        return $this;
    }

    /**
     * Method to set the value of field buy_number
     *
     * @param integer $buy_number
     * @return $this
     */
    public function setBuyNumber($buy_number)
    {
        $this->buy_number = $buy_number;

        return $this;
    }

    /**
     * Method to set the value of field star
     *
     * @param integer $star
     * @return $this
     */
    public function setStar($star)
    {
        $this->star = $star;

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
     * Returns the value of field hit_number
     *
     * @return integer
     */
    public function getHitNumber()
    {
        return $this->hit_number;
    }

    /**
     * Returns the value of field buy_number
     *
     * @return integer
     */
    public function getBuyNumber()
    {
        return $this->buy_number;
    }

    /**
     * Returns the value of field star
     *
     * @return integer
     */
    public function getStar()
    {
        return $this->star;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("gxc");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'xdb_star_rule';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return XdbStarRule[]|XdbStarRule
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return XdbStarRule
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
            'hit_number' => 'hit_number',
            'buy_number' => 'buy_number',
            'star' => 'star'
        ];
    }

}
