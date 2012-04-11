<?php
namespace Local\Controller;

class FrontController extends \Zend_Controller_Front
{
    /**
     * Singleton instance
     *
     * @return FrontController
     */
    public static function getInstance()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    protected function __construct()
    {
        parent::__construct();
        $this->setDispatcher( new InepControllerDispatcher() );
    }

    protected function initErrorHandlerPlugin()
    {
        if (!$this->getParam('noErrorHandler') && !$this->_plugins->hasPlugin('\Zend_Controller_Plugin_ErrorHandler')) {
            // Register with stack index of 100
            require_once 'Zend/Controller/Plugin/ErrorHandler.php';
            $this->_plugins->registerPlugin(new \Zend_Controller_Plugin_ErrorHandler(), 100);
        }
    }

    protected function initViewHandlerPlugin()
    {
        if (!$this->getParam('noViewRenderer') && !\Zend_Controller_Action_HelperBroker::hasHelper('viewRenderer')) {
            require_once 'Zend/Controller/Action/Helper/ViewRenderer.php';
            \Zend_Controller_Action_HelperBroker::getStack()->offsetSet(-80, new \Zend_Controller_Action_Helper_ViewRenderer());
        }
    }

    protected function initHttpRequest( \Zend_Controller_Request_Abstract $request = null )
    {
        /**
         * Instantiate default request object (HTTP version) if none provided
         */
        if (null !== $request) {
            $this->setRequest($request);
        } elseif ((null === $request) && (null === ($request = $this->getRequest()))) {
            require_once 'Zend/Controller/Request/Http.php';
            $request = new \Zend_Controller_Request_Http();
            $this->setRequest($request);
        }

        /**
         * Set base URL of request object, if available
         */
        if (is_callable(array($this->_request, 'setBaseUrl'))) {
            if (null !== $this->_baseUrl) {
                $this->_request->setBaseUrl($this->_baseUrl);
            }
        }
    }

    protected function initDefaultResponse( \Zend_Controller_Response_Abstract $response = null )
    {
        /**
         * Instantiate default response object (HTTP version) if none provided
         */
        if (null !== $response) {
            $this->setResponse($response);
        } elseif ((null === $this->_response) && (null === ($this->_response = $this->getResponse()))) {
            require_once 'Zend/Controller/Response/Http.php';
            $response = new \Zend_Controller_Response_Http();
            $this->setResponse($response);
        }

    }

    protected function initRequestPlugin()
    {
        /**
         * Register request object with plugin broker
         */
        $this->_plugins
             ->setRequest($this->_request);

    }

    protected function initResponsePlugin()
    {
        /**
         * Register response object with plugin broker
         */
        $this->_plugins
             ->setResponse($this->_response);

    }

    /**
     *
     * @return \Zend_Controller_Router_Rewrite
     */
    protected function initRouter()
    {
        /**
         * Initialize router
         */
        $router = $this->getRouter();
        $router->setParams($this->getParams());

        return $router;
    }

    /**
     *
     * @return \Zend_Controller_Dispatcher_Standard
     */
    protected function initDispatcher()
    {
        /**
         * Initialize dispatcher
         */
        $dispatcher = $this->getDispatcher();
        $dispatcher->setParams($this->getParams())
                   ->setResponse($this->_response);

        return $dispatcher;
    }

    protected function doDispatch( \Zend_Controller_Router_Rewrite $router , \Zend_Controller_Dispatcher_Standard $dispatcher )
    {
        // Begin dispatch
        try {
            /**
             * Route request to controller/action, if a router is provided
             */

            /**
            * Notify plugins of router startup
            */
            $this->_plugins->routeStartup($this->_request);

            try {
                $router->route($this->_request);
            }  catch (\Exception $e) {
                if ($this->throwExceptions()) {
                    throw $e;
                }

                $this->_response->setException($e);
            }

            /**
            * Notify plugins of router completion
            */
            $this->_plugins->routeShutdown($this->_request);

            /**
             * Notify plugins of dispatch loop startup
             */
            $this->_plugins->dispatchLoopStartup($this->_request);

            /**
             *  Attempt to dispatch the controller/action. If the $this->_request
             *  indicates that it needs to be dispatched, move to the next
             *  action in the request.
             */
            do {
                $this->_request->setDispatched(true);

                /**
                 * Notify plugins of dispatch startup
                 */
                $this->_plugins->preDispatch($this->_request);

                /**
                 * Skip requested action if preDispatch() has reset it
                 */
                if (!$this->_request->isDispatched()) {
                    continue;
                }

                /**
                 * Dispatch request
                 */
                try {
                    $dispatcher->dispatch($this->_request, $this->_response);
                } catch (\Exception $e) {
                    if ($this->throwExceptions()) {
                        throw $e;
                    }
                    $this->_response->setException($e);
                }

                /**
                 * Notify plugins of dispatch completion
                 */
                $this->_plugins->postDispatch($this->_request);

            } while (!$this->_request->isDispatched());
        } catch (\Exception $e) {
            if ($this->throwExceptions()) {
                throw $e;
            }

            $this->_response->setException($e);
        }
    }

    protected function notifyLoopCompletion()
    {
        /**
         * Notify plugins of dispatch loop completion
         */
        try {
            $this->_plugins->dispatchLoopShutdown();
        } catch (\Exception $e) {
            if ($this->throwExceptions()) {
                throw $e;
            }

            $this->_response->setException($e);
        }

        if ($this->returnResponse()) {
            return $this->_response;
        }

        $this->_response->sendResponse();
    }

    /**
     * Dispatch an HTTP request to a controller/action.
     *
     * @param \Zend_Controller_Request_Abstract|null $request
     * @param \Zend_Controller_Response_Abstract|null $response
     * @return void|\Zend_Controller_Response_Abstract Returns response object if returnResponse() is true
     */
    public function dispatch
    (
        \Zend_Controller_Request_Abstract $request   = null,
        \Zend_Controller_Response_Abstract $response = null
    )
    {
        $this->initErrorHandlerPlugin();
        $this->initViewHandlerPlugin();
        $this->initHttpRequest( $request );
        $this->initDefaultResponse( $response );
        $this->initRequestPlugin();
        $this->initResponsePlugin();
        $router = $this->initRouter();
        $dispatcher = $this->initDispatcher();
        $this->doDispatch( $router , $dispatcher );
        return $this->notifyLoopCompletion();
    }
}

?>