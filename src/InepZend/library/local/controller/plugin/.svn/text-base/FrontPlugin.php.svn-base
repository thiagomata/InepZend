<?php
namespace Local\Controller\Plugin;

class FrontPlugin extends \Zend_Controller_Plugin_ErrorHandler
{
    protected static $strLastPath;
    
    protected function _handleError(\Zend_Controller_Request_Abstract $request)
    {
        if( $this->_response->getException() instanceof \Exception )
        {
            \Coruja\Debug\CorujaDebug::debug( $this->_response->getException()->getMessage() );
        }

        if( self::$strLastPath == null )
        {
            self::$strLastPath = \CONTROLLERS_PATH;
        }

        if(
                $this->_response->getException()
                &&
                strpos(
                    \CorujaArrayManipulation::getArrayField(
                        $this->_response->getException() ,
                        0
                    )->getMessage()
                    ,
                    'Invalid controller specified'
                ) === 0
            )
        {
            if( \CorujaArrayManipulation::getArrayField( \Zend_Controller_Front::getInstance()->getControllerDirectory() , 'default' ) ==  self::$strLastPath )
            {

                if( self::$strLastPath != \CONTROLLERS_PATH )
                {
                    \Zend_Controller_Front::getInstance()->setControllerDirectory( \CONTROLLERS_PATH , 'default');
                }
                else
                {
                    \Zend_Controller_Front::getInstance()->setControllerDirectory( \INEP_CONTROLLERS_PATH , 'default');
                }
                $this->getRequest()->setDispatched( false );
                $this->setResponse( new \Zend_Controller_Response_Http() );
                return true;
            }
            else
            {
                $frontController = \Zend_Controller_Front::getInstance();
                $frontController->setParam('noErrorHandler',false);
                return parent::_handleError( $request);
            }
        }
        else
        {
          if( $this->_response->getException() instanceof \Exception )
            {
                throw $this->_response->getException();
            }
            $frontController = \Zend_Controller_Front::getInstance();
            $frontController->setParam('noErrorHandler',false);
            return parent::_handleError( $request);
        }
    }
}
?>