<?php
namespace Local\Form\Elements;

/**
 * Classe de Extensão do Elemento Submit do Zend Form
 *
 * @author Thiago Henrique Ramos da Mata <thiago.mata@inep.gov.br>
 * @date 02/12/2010
 *
 */
class InepFormElementSubmit extends \Zend_Form_Element_Submit implements InepFormElementInterface
{
    /**
     * Contador Incremental para evitar colisões por nome devido
     * a incapacidade dos components do Zend de lidar com dois
     * elementos com mesmo nome
     * 
     * @var integer 
     */
    protected static $intButtonCounter = 0;

    /**
     * Flag que controla se o elemento deve ser
     * renderizado no html
     *
     * @var boolean
     */
    protected $booRender = true;

    /**
     * Flag que controla se o elemento deve ser
     * visivel no html
     *
     * @var boolean
     */
    protected $booVisible = true;

    /**
     * InepFormEvent do Elemento para possibilitar
     * se linkar eventos javascript ao elemento
     *
     * @var InepFormEvent
     */
    protected $objInepFormEvent;

    public function init()
    {
        $this->setLabel( 'Enviar' );
    }

    public function setValue( $strValue )
    {
        return parent::setValue( $strValue );
    }
    /**
     * Retorna o valor atual do counter
     */
    protected function getCounter()
    {
        return ++self::$intButtonCounter;
    }

    public function wasClicked()
    {
        return ( $this->getValue() == $this->getLabel() );
    }

    /**
     * Informa se o elemento deve ser renderizado
     *
     * @param bool $booRender
     * @return InepFormElementSubmit
     */
    public function setRender( $booRender )
    {
        $this->booRender = ( $booRender == true );
        return $this;
    }

    /**
     * Obtem se o elemento deve ser renderizado
     *
     * @return boolean
     */
    public function getRender()
    {
        return $this->booRender;
    }

    /**
     * Informa se o elemento deve ser visivel
     *
     * @param bool $booVisible
     * @return InepFormElementSubmit
     */
    public function setVisible( $booVisible )
    {
        $this->booVisible = ( $booVisible == true );
        return $this;
    }

    /**
     * Obtem se o elemento deve ser visivel
     *
     * @return boolean
     */
    public function getVisible()
    {
        return $this->booVisible;
    }

    /**
     * Obtem se o elemento deve ser renderizado
     *
     * @return boolean
     */
    public function isRender()
    {
        return $this->getRender();
    }

     /**
     * Obtem se o elemento deve ser visivel
     *
     * @return boolean
     */
    public function isVisible()
    {
        return $this->getVisible();
    }

    /**
     * Informa um evento para este elemento
     *
     * @param \Local\Form\InepFormEvent $objFormEvent
     * @return InepFormElementButton
     */
    public function setFormEvent( \Local\Form\InepFormEvent $objFormEvent )
    {
        $this->objInepFormEvent = $objFormEvent;
        return $this;
    }

    /**
     * Obtem o evento do elemento
     *
     * @return \Local\Form\InepFormEvent
     */
    public function getFormEvent()
    {
        return $this->objInepFormEvent;
    }

    /**
     * Render form element
     *
     * @param  Zend_View_Interface $view
     * @return string
     */
    public function render( \Zend_View_Interface $view = null )
    {
        if( $this->getFormEvent() !== null )
        {
             $this->getFormEvent()->loadInepFormElement( $this );
       }
        return parent::render( $view );
    }
}