<?php
namespace Adlerparnas\FlashDataBundle\Entity;
/**
 * Created by JetBrains PhpStorm.
 * User: adler_parnas
 * Date: 11/7/12
 * Time: 11:40 PM
 * To change this template use File | Settings | File Templates.
 */
class Message
{
    const ALERT   = 'alert';
    const ERROR   = 'error';
    const INFO    = 'info';
    const SUCCESS = 'success';


    /** @var string */
    protected $message;

    /** @var string */
    protected $message_type;

    /** @var string */
    protected $uid;

    /** @var \DateTime */
    protected $created_at;


    function __construct($_message, $_message_type = 'info')
    {
        $this->message = $_message;
        $this->message_type = $_message_type;
        $this->uid = uniqid("adlerparnas_flashdata_message");
        $this->created_at = new \DateTime();
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    public function setMessageType($message_type)
    {
        $this->message_type = $message_type;
    }

    /**
     * @return string
     */
    public function getMessageType()
    {
        return $this->message_type;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }
}
