<?php
namespace Local\Form\Elements;

/**
 * Internface padrão da Extensão do Inep do Zend Form
 * 
 * @author Thiago Henrique Ramos da Mata <thiago.mata@inep.gov.br>
 * @date 02/12/2010
 * 
 */
interface InepFormElementInterface
{
    /**
     * Informa se o elemento deve ser renderizado
     *
     * @param bool $booRender
     * @return InepFormElementButton
     */
    public function setRender( $booRender );

    /**
     * Obtem se o elemento deve ser renderizado
     *
     * @return boolean
     */
    public function getRender();
    
    /**
     * Informa se o elemento deve ser visivel
     *
     * @param bool $booVisible
     * @return InepFormElementButton
     */
    public function setVisible( $booVisible );

    /**
     * Obtem se o elemento deve ser visivel
     *
     * @return boolean
     */
    public function getVisible();

    /**
     * Obtem se o elemento deve ser renderizado
     *
     * @return boolean
     */
    public function isRender();

     /**
     * Obtem se o elemento deve ser visivel
     *
     * @return boolean
     */
    public function isVisible();

    /**
     * Informa um evento para este elemento
     *
     * @param \Local\Form\InepFormEvent $objFormEvent
     * @return InepFormElementButton
     */
    public function setFormEvent( \Local\Form\InepFormEvent $objFormEvent );

    /**
     * Obtem o evento do elemento
     *
     * @return \Local\Form\InepFormEvent
     */
    public function getFormEvent();

    /**
     * Render form element
     *
     * @param  Zend_View_Interface $view
     * @return string
     */
    public function render( \Zend_View_Interface $view = null );
}