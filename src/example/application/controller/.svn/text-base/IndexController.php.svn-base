<?php
class IndexController extends \Local\Controller\Action {

    /**
     */
    public function indexAction() {
         $objInepForm = new \Local\Form\InepForm();

         $objButtonState = new Local\Form\Elements\InepFormElementButton( 'States' );
         $objButtonState->setLabel( 'Manager States' );
         $objEvent = new Local\Form\InepFormEvent();
         $objEvent->setController( 'state' )->setAction( 'index' );
         $objButtonState->setFormEvent( $objEvent );
         $objInepForm->addElement( $objButtonState );
         
         $this->view->objForm = $objInepForm;
    }
}

