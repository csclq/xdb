<?php

namespace App\Models;

class YztGxcPublishPraise extends \Phalcon\Mvc\Model
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
    protected $item_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    protected $user_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $add_at;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    protected $praise;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=true)
     */
    protected $add_ip;

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
     * Method to set the value of field item_id
     *
     * @param integer $item_id
     * @return $this
     */
    public function setItemId($item_id)
    {
        $this->item_id = $item_id;

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
     * Method to set the value of field praise
     *
     * @param integer $praise
     * @return $this
     */
    public function setPraise($praise)
    {
        $this->praise = $praise;

        return $this;
    }

    /**
     * Method to set the value of field add_ip
     *
     * @param string $add_ip
     * @return $this
     */
    public function setAddIp($add_ip)
    {
        $this->add_ip = $add_ip;

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
     * Returns the value of field item_id
     *
     * @return integer
     */
    public function getItemId()
    {
        return $this->item_id;
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
     * Returns the value of field add_at
     *
     * @return integer
     */
    public function getAddAt()
    {
        return $this->add_at;
    }

    /**
     * Returns the value of field praise
     *
     * @return integer
     */
    public function getPraise()
    {
        return $this->praise;
    }

    /**
     * Returns the value of field add_ip
     *
     * @return string
     */
    public function getAddIp()
    {
        return $this->add_ip;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("gxc");
        $this->belongsTo('item_id', 'App\Models\\YztGxcPublish', 'id', ['alias' => 'YztGxcPublish']);
        $this->belongsTo('user_id', 'App\Models\\YztGxcLoveStory', 'id', ['alias' => 'YztGxcLoveStory']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'yzt_gxc_publish_praise';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztGxcPublishPraise[]|YztGxcPublishPraise
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztGxcPublishPraise
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
            'item_id' => 'item_id',
            'user_id' => 'user_id',
            'add_at' => 'add_at',
            'praise' => 'praise',
            'add_ip' => 'add_ip'
        ];
    }

}
