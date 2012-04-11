<?php
namespace Coruja\Annotation\Interfaces;

/**
 * CorujaAnnotationClassInterface - Define Interface with the methods expected
 * into the Annotation of Some Class
 *
 * @package coruja.components.annotation.interfaces
 */

/**
 * Coruja Annotation Class Interface define the methods expected into the
 * annotation class of some class
 *
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 */
Interface CorujaAnnotationClassInterface
{
    /**
     * Initi the Class Container Annotation
     *
     * @param string $strClassContainerName
     */
    public function __construct( $strClassContainerName = "" );

    /**
     * Set the Class Container Name
     * 
     * @param string  $strClassContainerName
     */
    public function setClassContainerName( $strClassContainerName );

    /**
     * Get the Class Container Name
     *
     * @return string
     */
    public function getClassContainerName();

    /**
     * Validate the data inside the Annotation Class
     * after all the information be received
     *
     * @throws CorujaAnnotationException
     */
    public function validate();

}
?>