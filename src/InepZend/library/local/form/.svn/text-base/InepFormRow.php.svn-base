<?php
namespace Local\Form;

class InepFormRow
{
    protected $strId;

    protected $strColumnValue;

    protected $intWidth;

    protected $arrHeaders = array();

    protected $arrButtons = array();

    protected $objEvent = null;
    
    public function __construct( $strId = null )
    {
        $this->setId( $strId );
    }

    protected function setId( $strId )
    {
        $this->strId = $strId;
        return $this;
    }

    public function getId()
    {
        return $this->strId;
    }

    public function setColumnValue( \Local\Form\InepFormHeader $objFormHeader ,  $strColumnValue )
    {
        $this->arrHeaders[ $objFormHeader->getId() ] = $strColumnValue;
        return $this;
    }

    public function getColumnValue( InepFormHeader $objFormHeader )
    {
        if( array_key_exists( $objFormHeader->getId() ,  $this->arrHeaders ) )
        {
            return $this->arrHeaders[ $objFormHeader->getId() ];
        }
        return null;
    }

    public function addButton( InepFormHeader $objFormHeader , InepFormButton $objButton )
    {
        if( !array_key_exists( $objFormHeader->getId() ,  $this->arrButtons ) )
        {
            $this->arrButtons[ $objFormHeader->getId() ] = array();
        }
        $this->arrButtons[ $objFormHeader->getId() ][] = $objButton;
        return $this;
    }

    public function getButtons( InepFormHeader $objFormHeader )
    {
        if( !array_key_exists( $objFormHeader->getId() ,  $this->arrButtons ) )
        {
            return array();
        }
        return $this->arrButtons[ $objFormHeader->getId() ];
    }

    public function setEvent( InepFormEvent $objEvent )
    {
        $this->objEvent = $objEvent;
        return $this;
    }

    public function getEvent()
    {
        return $this->objEvent;
    }

}