<?php
namespace Local\AutoLoad;

class InepAutoLoad
{
    protected static $_instance;

    /**
     * Retrieve singleton instance
     *
     * @return Zend_Loader_Autoloader
     */
    public static function getInstance()
    {
        if( self::$_instance == null )
        {
            self::$_instance = new InepAutoLoad();
        }
        return self::$_instance;
    }

    /**
     * Reset the singleton instance
     *
     * @return void
     */
    public static function resetInstance()
    {
        self::$_instance = null;
    }

    /**
     * Autoload a class
     *
     * @param  string $class
     * @return bool
     */
    public static function autoload( $strClassName )
    {
        return \Coruja\AutoLoad\CorujaAutoLoad::getInstance()->loadClass( $strClassName );
    }

    /**
     * Set the default autoloader implementation
     *
     * @param  string|array $callback PHP callback
     * @return void
     */
    public function setDefaultAutoloader($callback)
    {
        return $this;
    }

    /**
     * Retrieve the default autoloader callback
     *
     * @return string|array PHP Callback
     */
    public function getDefaultAutoloader()
    {
        return null;
    }

    /**
     * Set several autoloader callbacks at once
     *
     * @param  array $autoloaders Array of PHP callbacks (or Zend_Loader_Autoloader_Interface implementations) to act as autoloaders
     * @return Zend_Loader_Autoloader
     */
    public function setAutoloaders(array $autoloaders)
    {
        return $this;
    }

    /**
     * Get attached autoloader implementations
     *
     * @return array
     */
    public function getAutoloaders()
    {
        return array();
    }

    /**
     * Return all autoloaders for a given namespace
     *
     * @param  string $namespace
     * @return array
     */
    public function getNamespaceAutoloaders($namespace)
    {
        return array();
    }

    /**
     * Register a namespace to autoload
     *
     * @param  string|array $namespace
     * @return Zend_Loader_Autoloader
     */
    public function registerNamespace($namespace)
    {
        return $this;
    }

    /**
     * Unload a registered autoload namespace
     *
     * @param  string|array $namespace
     * @return Zend_Loader_Autoloader
     */
    public function unregisterNamespace($namespace)
    {
        return $this;
    }

    /**
     * Get a list of registered autoload namespaces
     *
     * @return array
     */
    public function getRegisteredNamespaces()
    {
        return array();
    }

    public function setZfPath($spec, $version = 'latest')
    {
        return $this;
    }

    public function getZfPath()
    {
        return $this->_zfPath;
    }

    /**
     * Get or set the value of the "suppress not found warnings" flag
     *
     * @param  null|bool $flag
     * @return bool|Zend_Loader_Autoloader Returns boolean if no argument is passed, object instance otherwise
     */
    public function suppressNotFoundWarnings($flag = null)
    {
        return $this;
    }

    /**
     * Indicate whether or not this autoloader should be a fallback autoloader
     *
     * @param  bool $flag
     * @return Zend_Loader_Autoloader
     */
    public function setFallbackAutoloader($flag)
    {
        return $this;
    }

    /**
     * Is this instance acting as a fallback autoloader?
     *
     * @return bool
     */
    public function isFallbackAutoloader()
    {
        return false;
    }

    /**
     * Get autoloaders to use when matching class
     *
     * Determines if the class matches a registered namespace, and, if so,
     * returns only the autoloaders for that namespace. Otherwise, it returns
     * all non-namespaced autoloaders.
     *
     * @param  string $class
     * @return array Array of autoloaders to use
     */
    public function getClassAutoloaders($class)
    {
        return array();
    }

    /**
     * Add an autoloader to the beginning of the stack
     *
     * @param  object|array|string $callback PHP callback or Zend_Loader_Autoloader_Interface implementation
     * @param  string|array $namespace Specific namespace(s) under which to register callback
     * @return Zend_Loader_Autoloader
     */
    public function unshiftAutoloader($callback, $namespace = '')
    {
        return $this;
    }

    /**
     * Append an autoloader to the autoloader stack
     *
     * @param  object|array|string $callback PHP callback or Zend_Loader_Autoloader_Interface implementation
     * @param  string|array $namespace Specific namespace(s) under which to register callback
     * @return Zend_Loader_Autoloader
     */
    public function pushAutoloader($callback, $namespace = '')
    {
        return $this;
    }

    /**
     * Remove an autoloader from the autoloader stack
     *
     * @param  object|array|string $callback PHP callback or Zend_Loader_Autoloader_Interface implementation
     * @param  null|string|array $namespace Specific namespace(s) from which to remove autoloader
     * @return Zend_Loader_Autoloader
     */
    public function removeAutoloader($callback, $namespace = null)
    {
        return $this;
    }
}