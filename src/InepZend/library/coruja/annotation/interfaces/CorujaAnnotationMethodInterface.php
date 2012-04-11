<?php
namespace Coruja\Annotation\Interfaces;

/**
 * CorujaAnnotationMethodInterface - Define Interface with the methods expected
 * into the Annotation of Some Method
 *
 * @package coruja.components.annotation.interfaces
 */

/**
 * Coruja Annotation Method Interface define the methods expected into the
 * annotation class of some method
 *
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 */
Interface CorujaAnnotationMethodInterface
{
    /**
     * Init the CorujaAnnotationMethodInterface receiving the class container name
     * and the method name
     *
     * @param string $strClassContainerName
     * @param string $strMethodName
     */
    public function __construct( $strClassContainerName = "" , $strMethodName = "" );

    /**
     * Set the Class Container Name of the Annotation Method
     *
     * @param string $strClassContainerName
     */
    public function setClassContainerName( $strClassContainerName );

    /**
     * Get the Class Container Name of the Annotation Method
     */
    public function getClassCointainerName();

    /**
     * Set the Method Name
     *
     * @param string $strMethodName
     */
    public function setMethodName( $strMethodName );

    /**
     * Get the Method Name
     */
    public function getMethodName();

    /**
     * Validate the data inside the annotation attribute
     * after all the information be received
     *
     * @throws CorujaAnnotationException
     */
    public function validate();
}
?>