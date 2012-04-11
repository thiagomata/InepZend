<?php
namespace Local\Model;


class EntityValidateException extends \Exception
{
    protected $arrMessages = array();

    public function addMessage( $strMessage )
    {
        $this->arrMessages[] = $strMessage;
    }

    public function getMessages()
    {
        return $this->arrMessages;
    }

    public function hasMessages()
    {
        return ( sizeof( $this->arrMessages ) > 0 );
    }

    public function validate()
    {
        if( $this->hasMessages() )
        {
            throw $this;
        }
    }
}

?>