<?php
/**
 * ExampleAnnotationClass - Example of implementation of the
 * CorujaAnnotationClassInterface
 * 
 * @package coruja.components.annotation.example
 */

/**
 * Example of implementation of the CorujaAnnotationClassInterface with
 * the "author" necessary notation
 *
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 */
class ExampleAnnotationClass implements CorujaAnnotationClassInterface
{
    /**
     * Class Container Name
     *
     * @var string
     */
    protected $strClassContainerName = "";

    /**
     * Author Name
     * @var string
     */
     protected $strAuthor = "";

    /**
     * Initi the Class Container Annotation
     *
     * @param string $strClassContainerName
     * @implements CorujaAnnotationClassInterface
     */
    public function __construct( $strClassContainerName = "" )
    {
        $this->setClassContainerName( $strClassContainerName );
    }

    /**
     * Set the Class Container Name
     *
     * @param string  $strClassContainerName
     * @implements CorujaAnnotationClassInterface
     */
    public function setClassContainerName( $strClassContainerName )
    {
        $this->strClassContainerName = (string)$strClassContainerName;
    }

    /**
     * Get the Class Container Name
     *
     * @return string
     * @implements CorujaAnnotationClassInterface
     */
    public function getClassContainerName()
    {
        return $this->strClassContainerName;
    }

    /**
     * Set the Author of the container Class
     *
     * @param string $strAuthor
     */
    public function setAuthor( $strAuthor )
    {
        $this->strAuthor = $strAuthor;
    }

    /**
     * Get the Author of the Container Class
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->strAuthor;
    }
    
    /**
     * Validate the data inside the Annotation Class
     * after all the information be received
     *
     * @throws CorujaAnnotationException
     * @implements CorujaAnnotationClassInterface
     */
    public function validate()
    {
        if( $this->getAuthor() == "" )
        {
            throw new CorujaAnnotationException( "Author Name Is Binding");
        }
    }
}

?>