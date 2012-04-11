<?php
namespace Local\Controller;

class InepControllerDispatcher extends \Zend_Controller_Dispatcher_Standard
{
    protected $strNamespace;
    /**
     * Dispatch to a controller/action
     *
     * By default, if a controller is not dispatchable, dispatch() will throw
     * an exception. If you wish to use the default controller instead, set the
     * param 'useDefaultControllerAlways' via {@link setParam()}.
     *
     * @param \Zend_Controller_Request_Abstract $request
     * @param \Zend_Controller_Response_Abstract $response
     * @return void
     * @throws \Zend_Controller_Dispatcher_Exception
     */
    public function dispatch(\Zend_Controller_Request_Abstract $request, \Zend_Controller_Response_Abstract $response)
    {

        $className = $this->getControllerClass( $request );
        
        $this->setResponse($response);


        /**
         * Load the controller class file
         */
        $className = $this->loadClass($className);

        if( !$this->classExists( $className ) )
        {
            throw new \Zend_Controller_Dispatcher_Exception(
                "Controller {$className} not found"
            );
        }
        else
        {
            /**
             * Instantiate controller with request, response, and invocation
             * arguments; throw exception if it's not an action controller
             */
            $controller = new $className($request, $this->getResponse(), $this->getParams());
            if (!($controller instanceof \Zend_Controller_Action_Interface) &&
                !($controller instanceof \Zend_Controller_Action)) {
                require_once 'Zend/Controller/Dispatcher/Exception.php';
                throw new \Zend_Controller_Dispatcher_Exception(
                    'Controller "' . $className . '" is not an instance of Zend_Controller_Action_Interface'
                );
            }
        }

        /**
         * Retrieve the action name
         */
        $action = $this->getActionMethod($request);

        if( !method_exists( $controller , $action ) )
        {
            throw new \Zend_Controller_Dispatcher_Exception(
                "Method $action not exists into Controller {$className}"
            );
        }
        
        /**
         * Dispatch the method call
         */
        $request->setDispatched(true);

        // by default, buffer output
        $disableOb = $this->getParam('disableOutputBuffering');
        $obLevel   = ob_get_level();
        if (empty($disableOb)) {
            ob_start();
        }

        try {
            $controller->dispatch($action);
        } catch (Exception $e) {

            // Clean output buffer on error
            $curObLevel = ob_get_level();
            if ($curObLevel > $obLevel) {
                do {
                    ob_get_clean();
                    $curObLevel = ob_get_level();
                } while ($curObLevel > $obLevel);
            }
            throw $e;
        }

        if (empty($disableOb)) {
            $content = ob_get_clean();
            $response->appendBody($content);
        }

        // Destroy the page controller instance and reflection objects
        $controller = null;
    }

    protected function getNamespacedClass( $strClassName , $strNamespace = '' )
    {
        if( $strNamespace != '' )
        {
//            $strClassName = $strNamespace . '\\' . 'Controller' . '\\' . $strClassName;
        }
        $strClassName = $strClassName;
        return $strClassName;
    }

    public function isNamespaceDispatchable(\Zend_Controller_Request_Abstract $request , $strNamespace = '' )
    {
        $className = $this->getControllerClass($request);
        if (!$className) {
            return false;
        }

        $finalClass  = $className;
        if (($this->_defaultModule != $this->_curModule)
            || $this->getParam('prefixDefaultModule'))
        {
            $finalClass = $this->formatClassName($this->_curModule, $className);
        }

        $finalClass = $this->getNamespacedClass( $finalClass, $strNamespace );

        if ( $this->classExists( $finalClass ) )
        {
            return true;
        }

        $fileSpec    = $this->classToFilename($className);
        $dispatchDir = $this->getDispatchDirectory();
        $test        = $dispatchDir . DIRECTORY_SEPARATOR . $fileSpec;

        return \Zend_Loader::isReadable($test);
    }

    /**
     * Returns TRUE if the Zend_Controller_Request_Abstract object can be
     * dispatched to a controller.
     *
     * Use this method wisely. By default, the dispatcher will fall back to the
     * default controller (either in the module specified or the global default)
     * if a given controller does not exist. This method returning false does
     * not necessarily indicate the dispatcher will not still dispatch the call.
     *
     * @param \Zend_Controller_Request_Abstract $action
     * @return boolean
     */
    public function isDispatchable(\Zend_Controller_Request_Abstract $request)
    {
        $strProjectNamespace = \CorujaArrayManipulation::getArrayField(
            \InepZend\Bootstrap::getInstance()->getOption( 'project' ) ,
            'namespace'
        );

        $strInepNamespace = \InepZend\InepAutoloadGroup::MY_NAMESPACE;

        if( $this->isNamespaceDispatchable( $request , $strProjectNamespace ) )
        {
            return true;
        }

        if( $this->isNamespaceDispatchable( $request , $strInepNamespace ) )
        {
            return true;
        }

        return false;
    }

    public function loadClass( $strClassName )
    {
        $strProjectFile = CONTROLLERS_PATH . '/' . $strClassName . '.php';
        $strInepFile = INEP_CONTROLLERS_PATH . '/' . $strClassName . '.php';

        if( file_exists( $strProjectFile ) )
        {
            require_once( $strProjectFile );
        }
        elseif( file_exists( $strInepFile ) )
        {
            require_once( $strInepFile );
        }
        
        return $strClassName;

        /*
        $strInepNamespace = \InepZend\InepAutoloadGroup::MY_NAMESPACE;
         */
        $strInepNamespace = '';

        $strProjectClass = $this->getNamespacedClass( $strClassName, $strProjectNamespace );
        if( $this->classExists( $strProjectClass ) )
        {
            $strClassName = $strProjectClass;
            return ( $strClassName );
        }

        $strInepClass = $this->getNamespacedClass( $strClassName, $strInepNamespace );
        if( $this->classExists( $strInepClass ) )
        {
            $strClassName = $strInepClass;
            return ( $strClassName );
        }
    }

    private function classExists( $strClassName )
    {

        try
        {
            return \class_exists( $strClassName , false );

        }
        catch( \Exception $objException )
        {
            \Coruja\Debug\CorujaDebug::debug( $objException->getMessage() );
            exit();
            return false;
        }
    }
}
?>