<?php
namespace Local\Form\Elements;

/**
 * Classe de Extensão do Elemento Hidden do Zend Form
 *
 * @author Thiago Henrique Ramos da Mata <thiago.mata@inep.gov.br>
 * @date 02/12/2010
 *
 */
class InepFormElementHidden extends \Zend_Form_Element_Hidden implements InepFormElementInterface
{
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

    /**
     * Informa se o elemento deve ser renderizado
     *
     * @param bool $booRender
     * @return InepFormElementHidden
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
     * @return InepFormElementHidden
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
     * Sobrescrita do render do input hidden pois o padrao do zend gera
     * elementos de lista ao redor de um objeto que deveria ser oculto.
     *
     * @return string
     */
    public function render( \Zend_View_Interface $view = null )
    {
        return "<input type=\"hidden\" name=\"{$this->getName()}\" id=\"{$this->getName()}\" value=\"{$this->getValue()}\" />";
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
}