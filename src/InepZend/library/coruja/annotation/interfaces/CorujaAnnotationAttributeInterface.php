<?php
namespace Coruja\Annotation\Interfaces;

/**
 * CorujaAnnotationAttributeInterface - Define Interface with the methods expected
 * into the Annotation of Some Attribute
 *
 * @package coruja.components.annotation.interfaces
 */

/**
 * Coruja Annotation Attribute Interface define the methods expected into the
 * annotation class of some attribute
 *
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 */
Interface CorujaAnnotationAttributeInterface
{
    /**
     *
     * @param string $strClassContainerName
     * @param string $strAttributeName
     */
    public function __construct( $strClassContainerName , $strAttributeName );

    /**
     * Set the class container name
     *
     * @param string $strClassContainerName
     */
    public function setClassContainerName( $strClassContainerName );

    /**
     * Get the class container name
     *
     * @return string
     */
    public function getClassCointainerName();

    /**
     * Set the Attribute Name
     *
     * @param string $strAttributeName
     */
    public function setAttributeName( $strAttributeName );

    /**
     * Get the Attribute Name
     *
     * @return string
     */
    public function getAttributeName();

    /**
     * Validate the data inside the annotation attribute
     * after all the information be received
     *
     * @throws CorujaAnnotationException
     */
    public function validate();
}
?>