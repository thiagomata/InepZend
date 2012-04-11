<?php
class IndexController extends \Local\Controller\Action {

    /**
     */
    public function indexAction() {
         $objInepForm = new \Local\Form\InepForm();
         $this->view->objInepForm = $objInepForm;
    }
}

