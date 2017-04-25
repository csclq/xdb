<?php

namespace App\Models;

class YztWechatMessage extends \Phalcon\Mvc\Model
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
     * @Column(type="string", length=20, nullable=true)
     */
    protected $type;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    protected $event;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $keyword;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    protected $eventkey;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    protected $reply_type;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $reply_content;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $reply_img;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $reply_title;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $reply_url;

    /**
     *
     * @var string
     * @Column(type="string", length=60, nullable=true)
     */
    protected $media_id;

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
     * Method to set the value of field event
     *
     * @param string $event
     * @return $this
     */
    public function setEvent($event)
    {
        $this->event = $event;

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
     * Method to set the value of field eventkey
     *
     * @param string $eventkey
     * @return $this
     */
    public function setEventkey($eventkey)
    {
        $this->eventkey = $eventkey;

        return $this;
    }

    /**
     * Method to set the value of field reply_type
     *
     * @param string $reply_type
     * @return $this
     */
    public function setReplyType($reply_type)
    {
        $this->reply_type = $reply_type;

        return $this;
    }

    /**
     * Method to set the value of field reply_content
     *
     * @param string $reply_content
     * @return $this
     */
    public function setReplyContent($reply_content)
    {
        $this->reply_content = $reply_content;

        return $this;
    }

    /**
     * Method to set the value of field reply_img
     *
     * @param string $reply_img
     * @return $this
     */
    public function setReplyImg($reply_img)
    {
        $this->reply_img = $reply_img;

        return $this;
    }

    /**
     * Method to set the value of field reply_title
     *
     * @param string $reply_title
     * @return $this
     */
    public function setReplyTitle($reply_title)
    {
        $this->reply_title = $reply_title;

        return $this;
    }

    /**
     * Method to set the value of field reply_url
     *
     * @param string $reply_url
     * @return $this
     */
    public function setReplyUrl($reply_url)
    {
        $this->reply_url = $reply_url;

        return $this;
    }

    /**
     * Method to set the value of field media_id
     *
     * @param string $media_id
     * @return $this
     */
    public function setMediaId($media_id)
    {
        $this->media_id = $media_id;

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
     * Returns the value of field type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the value of field event
     *
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
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
     * Returns the value of field eventkey
     *
     * @return string
     */
    public function getEventkey()
    {
        return $this->eventkey;
    }

    /**
     * Returns the value of field reply_type
     *
     * @return string
     */
    public function getReplyType()
    {
        return $this->reply_type;
    }

    /**
     * Returns the value of field reply_content
     *
     * @return string
     */
    public function getReplyContent()
    {
        return $this->reply_content;
    }

    /**
     * Returns the value of field reply_img
     *
     * @return string
     */
    public function getReplyImg()
    {
        return $this->reply_img;
    }

    /**
     * Returns the value of field reply_title
     *
     * @return string
     */
    public function getReplyTitle()
    {
        return $this->reply_title;
    }

    /**
     * Returns the value of field reply_url
     *
     * @return string
     */
    public function getReplyUrl()
    {
        return $this->reply_url;
    }

    /**
     * Returns the value of field media_id
     *
     * @return string
     */
    public function getMediaId()
    {
        return $this->media_id;
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
        return 'yzt_wechat_message';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztWechatMessage[]|YztWechatMessage
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return YztWechatMessage
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
            'type' => 'type',
            'event' => 'event',
            'keyword' => 'keyword',
            'eventkey' => 'eventkey',
            'reply_type' => 'reply_type',
            'reply_content' => 'reply_content',
            'reply_img' => 'reply_img',
            'reply_title' => 'reply_title',
            'reply_url' => 'reply_url',
            'media_id' => 'media_id'
        ];
    }

}
