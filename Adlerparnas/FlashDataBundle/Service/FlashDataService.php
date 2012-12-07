<?php
namespace Adlerparnas\FlashDataBundle\Service;

use Adlerparnas\FlashDataBundle\Entity\Message;

/**
 * Created by JetBrains PhpStorm.
 * User: adler_parnas
 * Date: 11/7/12
 * Time: 11:34 PM
 * To change this template use File | Settings | File Templates.
 */
class FlashDataService
{
    /** @var \Symfony\Component\HttpFoundation\SessionStorage\NativeSessionStorage */
    protected $session;

    protected $_messages;

    function __construct(\Symfony\Component\HttpFoundation\SessionStorage\NativeSessionStorage $_session)
    {
        $this->session  = $_session;


        if($_session)
        {
            $this->_messages = $_session->read('adlerparnas_flashdata.messages');

            if(!$this->_messages)
            {
                $this->_messages = array();
            }
            else
            {
                $this->_messages = unserialize($this->_messages);

            }
        }

    }

    public function addMessage($message, $message_type = "info")
    {
        if( ! $message instanceof Message)
        {
            $message = new Message($message, $message_type);
        }

        $this->_messages[ $message->getMessageType() ][] = $message;
        $this->save();
    }

    protected function isSessionAvailable()
    {
        if( is_null($this->session) ) return false;
        if( ! $this->session->getId()) return false;

        return true;
    }

    public function save()
    {
        if( ! $this->isSessionAvailable())
        {
            throw new \Exception("Existem mensagem na sessão que não podem ser gravadas");
        }

        $save = serialize($this->_messages);

        $this->session->write('adlerparnas_flashdata.messages', $save);
    }

    public function getMessages($clean = true)
    {
        $messages = $this->_messages;

        if($clean)
        {
            $this->_messages = array();
            $this->save();
        }

        return $messages;
    }

    function __destruct()
    {
        $this->save();
    }


}
