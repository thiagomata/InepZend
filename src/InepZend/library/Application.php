<?php
namespace Local;

require_once( INEP_LIBRARY_PATH . "/_start.php" );

$objZendAutoload = new ZendAutoloadGroup();
\Coruja\AutoLoad\CorujaAutoLoad::getInstance()->addAutoLoadGroup( $objZendAutoload );

$objInepAutoload = new InepAutoloadGroup();
\Coruja\AutoLoad\CorujaAutoLoad::getInstance()->addAutoLoadGroup( $objInepAutoload );

$objInepAppAutoload = new InepApplicationAutoloadGroup();
\Coruja\AutoLoad\CorujaAutoLoad::getInstance()->addAutoLoadGroup( $objInepAppAutoload );

$objProjetoAutoload = new ProjetoAutoloadGroup();
\Coruja\AutoLoad\CorujaAutoLoad::getInstance()->addAutoLoadGroup( $objProjetoAutoload );

class Application extends \Zend_Application
{
    public function __construct($environment, $options = null)
    {
        $this->_environment = (string) $environment;

//        require_once 'Zend/Loader/Autoloader.php';
//        $this->_autoloader = Zend_Loader_Autoloader::getInstance();

//        require_once( INEP_CONTROLLERS_PATH . "/ErrorController.php" );
        
        $this->_autoloader = \Local\AutoLoad\InepAutoLoad::getInstance();
        if (null !== $options) {
            if (is_string($options)) {
                $options = $this->_loadConfig($options);
            } elseif ($options instanceof \Zend_Config) {
                $options = $options->toArray();
            } elseif (!is_array($options)) {
                throw new \Zend_Application_Exception('Invalid options provided; must be location of config file, a config object, or an array');
            }

            $this->setOptions($options);
        }
    }
}