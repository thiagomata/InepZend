<?php
namespace Coruja\Annotation\Interfaces;

/**
 * CorujaAnnotationInterface define the annotation service what will be manager
 * by the components manager.
 *
 * @package coruja.components.annotation.interfaces
 */

/**
 * CorujaAnnotationInterface define the methods what will be used to access to
 * the annotation information of some object
 *
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 */
Interface CorujaAnnotationInterface
{
    /**
     * Construct the Annotation Interface
     *
     * @param $objElement
     */
    public function __construct( /*stdClass*/ $objElement = null );

    /**
     * Create a instance of the annotation interface to some class
     *
     * @return CorujaAnnotationInterface
     */
    public function getInstance( $objElement );

    /**
     * Get the annotation class
     *
     * @return CorujaAnnotationClassInterface
     */
    public function getAnnotationClass();

    /**
     * Get the annotation of some attribute
     *
     * @param string $strAttribute
     * @return CorujaAnnotationAttributeInterface
     */
    public function getAnnotationAttribute( $strAttribute );

    /**
     * Get all the annotations attributes
     * @return CorujaAnnotationAttributes[]
     */
    public function getAnnotationAttributes();

    /**
     * Get the annotation of some method
     *
     * @param string $strMethod
     * @return CorujaAnnotationMethodInterface
     */
    public function getAnnotationMethod( $strMethod );

    /**
     * Get all the annotations methods
     *
     * @return CorujaAnnotationMethodInterface[]
     */
    public function getAnnotationMethods();
}
?>