<?php
/**
 * ExampleParentClass - Annotation Example used into a Parent Class
 *
 * @package coruja.components.annotation.example
 */
 
/**
 * @AnnotationClass ExampleAnnotationClass
 * @AnnotationAttribute ExampleAnnotationAttribute
 * @AnnotationMethod ExampleAnnotationMethod
 */
class ExampleParentClass
{
    /**
     *
     * @var CorujaAnnotation
     */
    protected $objAnnotation;
    
    public final function __construct()
    {
        $this->objAnnotation = new CorujaAnnotation( $this );
    }

    /**
     * Get the Annotation Component
     * 
     * @return CorujaAnnotation
     */
    public function getAnnotation()
    {
        return $this->objAnnotation;
    }
}
?>