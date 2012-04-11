<?php
namespace Local\Form;

class InepFormHeader
{
    protected $strId;

    protected $strLabel;

    protected $intWidth;

    /**
     *
     * @var InepFormEvent
     */
    protected $objEvent;

    /**
     *
     * @var array
     */
    protected $arrButtons = array();

    /**
     *
     * @var string
     */
    protected $strColumn;

    public function __construct( $strId )
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

    public function setLabel( $strLabel )
    {
        $this->strLabel = $strLabel;
        return $this;
    }

    public function getLabel()
    {
        return $this->strLabel;
    }

    public function setColumn( $strColumn )
    {
        $this->strColumn = $strColumn;
        return $this;
    }

    public function getColumn()
    {
        return $this->strColumn;
    }

    public function setWidth( $intWidth )
    {
        $this->intWidth = $intWidth;
        return $this;
    }

    public function getWidth()
    {
        return $this->intWidth;
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

    public function addButton( InepFormButton $objButton )
    {
        $this->arrButtons[] = $objButton;
    }

    public function getButtons()
    {
        return $this->arrButtons;
    }
}