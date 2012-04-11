<?php

    // Define path to application directory
    defined('APPLICATION_PATH')
        || define('APPLICATION_PATH', realpath(dirname(__FILE__) ) );

    // Define application environment
    defined('APPLICATION_ENV')
        || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

    // Define application environment
    defined('CONTROLLERS_PATH')
        || define('CONTROLLERS_PATH', realpath( APPLICATION_PATH . '/controller' ) );

    // Define application environment
    defined('INEP_PATH')
        || define('INEP_PATH', (getenv('INEP_PATH') ? getenv('INEP_PATH') : realpath(dirname(__FILE__) . '/../../InepZend') ) );

    // Define application environment
    defined('INEP_APPLICATION_PATH')
        || define('INEP_APPLICATION_PATH', realpath( INEP_PATH . '/application' ) );

    // Define application environment
    defined('INEP_CONTROLLERS_PATH')
        || define('INEP_CONTROLLERS_PATH', realpath( INEP_APPLICATION_PATH . '/controller' ) );

    // Define LIBRARY  environment
    defined('INEP_LIBRARY_PATH')
        || define('INEP_LIBRARY_PATH', realpath( INEP_PATH . '/library' ) );

    // Define application environment
    defined('ZEND_PATH')
        || define('ZEND_PATH', (getenv('ZEND_PATH') ? getenv('ZEND_PATH') : realpath(dirname(__FILE__) . '/../../Zend') ) );

    // Define application environment
    defined('ZEND_APPLICATION_PATH')
        || define('ZEND_APPLICATION_PATH', realpath( ZEND_PATH . '/application' ) );

    // Define LIBRARY  environment
    defined('ZEND_LIBRARY_PATH')
        || define('ZEND_LIBRARY_PATH', realpath( ZEND_PATH . '/library' ) );

set_include_path(
    implode(
        PATH_SEPARATOR,
        array(
            ZEND_PATH ,
            ZEND_APPLICATION_PATH ,
            ZEND_LIBRARY_PATH ,
            get_include_path(),
        )
    )
);


require_once( ZEND_LIBRARY_PATH . "/Zend/Application.php" );
require_once( INEP_LIBRARY_PATH . "/Application.php" );