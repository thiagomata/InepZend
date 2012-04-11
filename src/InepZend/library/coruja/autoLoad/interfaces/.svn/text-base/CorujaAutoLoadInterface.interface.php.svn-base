<?php
namespace Coruja\AutoLoad;

/**
 * CorujaAutoLoadInterface - Define the Interface of some Component of Autoload
 * to be used into the framework
 *
 * @package coruja.components.autoload.interfaces
 */

/**
 * Component Administrator Interface of the AutoLoad
 *
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 *
 */
Interface CorujaAutoLoadInterface
{
    /**
     * Get the singleton auto load component
     *
     */
    public static function getInstance();

    /**
     * Add one auto load group to the component
     *
     * @param AutoLoadGroupInterface $objAutoLoadGroup
     * @return void
     */
    public function addAutoLoadGroup( CorujaAutoLoadGroupInterface $objAutoLoadGroup );

    /**
     * Try to autoload the class into the groups
     *
     * @param string $strClassName
     * @throws CorujaAutoLoadException
     */
    public function loadClass( $strClassName );
}
?>