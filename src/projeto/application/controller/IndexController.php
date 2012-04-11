<?php
class IndexController extends \Local\Controller\Action {

    /**
     */
    public function indexAction() {
         $objInepForm = new \Local\Form\InepForm();

         $objButtonEstado = new Local\Form\Elements\InepFormElementButton( 'estados' );
         $objButtonEstado->setLabel( 'Administrar Estados' );
         $objEvent = new Local\Form\InepFormEvent();
         $objEvent->setController( 'estado' )->setAction( 'index' );
         $objButtonEstado->setFormEvent( $objEvent );
         $objInepForm->addElement( $objButtonEstado );
         
         $this->view->objForm = $objInepForm;
    }
}

