<?php
namespace Coruja\AutoLoad;

/**
 * CorujaAutoLoadGroupInterface - Define the interface of the autoload group
 *
 * @package coruja.components.autoload.interfaces
 */

/**
 * Coruja Auto Load Group it is a class what define the rules and behaivor of
 * the autoload to some special group of classes what can be added to the
 * autoload component and will append this new group into it's auto load process
 *
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 */
Interface CorujaAutoLoadGroupInterface
{
    /**
     * returns if the class may belong to
     * the group by its name
     *
     * @param string $strClassName
     * @return boolean
     */
    public function classBelongsToTheGroup( $strClassName );

    /**
     * Returns the file name of the class what
     * belong to this group
     *
     * @param string $strClassName
     * @return string File Name of the Class
     */
    public function getTheFileNameOfTheClass( $strClassName );

    /**
     * Method called on load class event
     *
     * When the class be found and after be loaded this method can be used
     * to instance require classes what cannot be found by any autoload group
     * element.
     *
     * @param string $strClassName
     */
    public function onLoadClass( $strClassName );

}
?>