<?php
// namespace InepZend\Controller;

class ErrorController extends \Local\Controller\Action {

    public function invalidAction( $strAction )
    {
        print 'fim';
    }
    
    public function errorAction() {
        $errors = $this->_getParam('error_handler');
        echo '<pre>';
        foreach( $errors as $objError )
        {
            if( $objError instanceof \Exception )
            {
                $this->addMessage( $objError->getMessage() );
                $this->view->exception = $objError;
            }
            elseif ( $objError instanceof string )
            {
                $this->addMessage( $objError );
            }
        }
        switch ($errors->type) {
            case \Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ROUTE:
            case \Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
            case \Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:

                // 404 error -- controller or action not found
                $this->getResponse()->setHttpResponseCode(404);
                 $this->addMessage( 'Page not found' );
                break;
            default:
                // application error
                $this->getResponse()->setHttpResponseCode(500);
                $this->addMessage( 'Application error' );
                break;
        }

        // Log exception, if logger available
//        if ($log = $this->getLog()) {
//            $log->crit($this->view->message, $errors->exception);
//        }

        // conditionally display exceptions
        if ($this->getInvokeArg('displayExceptions') == true) {
            $this->view->exception = $errors->exception;
        }

        $this->view->request   = $errors->request;
    }

    public function getLog() {
        $bootstrap = $this->getInvokeArg('bootstrap');
        if (!$bootstrap->hasPluginResource('Log')) {
            return false;
        }
        $log = $bootstrap->getResource('Log');
        return $log;
    }

    public function __call( $strMethod , $arrParams )
    {
        $this->errorAction();   
    }

}

