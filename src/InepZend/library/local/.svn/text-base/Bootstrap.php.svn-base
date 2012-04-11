<?php
namespace Local;

date_default_timezone_set( 'America/Sao_Paulo' );

class Bootstrap extends \Zend_Application_Bootstrap_Bootstrap {

    protected static $objInstance;

    /**
     * Get the singleton instance of the bootstrap
     * 
     * @return Bootstrap
     */
    public static function getInstance()
    {
        if( self::$objInstance === null )
        {
            throw new \Exception( "no instance of bootstrap was found." );
        }
        return self::$objInstance;
    }

    /**
     * Returns if the Bootstrap has some singleton instance active
     *
     * @return boolean
     */
    public static function hasInstance()
    {
        return ( self::$objInstance != null );
    }

    public function __construct($application)
    {
        self::$objInstance = $this;
        return parent::__construct($application);
    }

    protected function _initDoctype() {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }

    protected function _initControllers(){ 
    }
    
    protected function _initViews(){
        $this->view->addScriptPath( \INEP_APPLICATION_PATH . '/views/scripts');
        $this->view->addScriptPath( \INEP_APPLICATION_PATH . '/layouts/scripts');
        $this->view->addScriptPath( \APPLICATION_PATH . '/views/scripts');
        $this->view->addScriptPath( \APPLICATION_PATH . '/layouts/scripts');
    }

	protected function _initFrontController()
	{
            // Recebo uma instancia do Zend_Controller_Front::getInstance();

            $this->_frontController = \Local\Controller\FrontController::getInstance();
            $this->_frontController->setParam('noErrorHandler' , true );
            $this->_frontController->registerPlugin( new \Local\Controller\Plugin\FrontPlugin() , 100 );
        
            /*
            Voce deve utilizar o setControllerDirectory, serve para dizer aonde estao
            os seus controladores, com essa configuracao
            podemos renderizar modulos diferentes, basta dizer o path.
            */
            $this->_frontController->setControllerDirectory(array(
                    'default' 			=> APPLICATION_PATH . '/controllers'
            ));

            /*
            Somente no controlador default, nao eh preciso digitar o name space.
            No caso do admin, que precisamos digitar, voce deve escrever suas classes
            desta forma:
            class Admin_IndexController extends Zend_Controller_Action
            */
	}

    public function run( $controllerDirectory = '' ){

        if( $controllerDirectory != '' )
        {
            $this->_frontController->setControllerDirectory($controllerDirectory);
        }
        $this->_frontController-> dispatch();
    }
 
}
?>