<?php
/**
 * ExampleAnnotationMethod - Example of implementation of the
 * CorujaAnnotationMethodInterface
 * 
 * @package coruja.components.annotation.example
 */

/**
 * Example of implementation of the CorujaAnnotationMethodInterface with
 * the "see" notation and "link" notation
 *
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 */
class ExampleAnnotationMethod implements CorujaAnnotationMethodInterface
{
    /**
     * Class Container Name
     *
     * @var string
     */
    protected $strClassContainerName;

    /**
     * Method Name
     *
     * @var string
     */
    protected $strMethodName;

    /**
     * See annotation
     *
     * @var string
     */
    protected $strSee;

    /**
     * Link annotation
     *
     * @var string
     */
    protected $strLink;

    /**
     *
     * @param string $strClassContainerName
     * @param string $strMethodName
     */
    public function __construct( $strClassContainerName = "" , $strMethodName = "" )
    {
        $this->setClassContainerName( $strClassContainerName );
        $this->setMethodName( $strMethodName );
    }

    /**
     * Set the class container name
     *
     * @param string $strClassContainerName
     */
    public function setClassContainerName( $strClassContainerName )
    {
        $this->strClassContainerName = (string)$strClassContainerName;
    }

    /**
     * Get the class container name
     *
     * @return string
     */
    public function getClassCointainerName()
    {
        return $this->strClassContainerName;
    }

    /**
     * Set the Method Name
     *
     * @param string $strMethodName
     */
    public function setMethodName( $strMethodName )
    {
        $this->strMethodName = $strMethodName;
    }

    /**
     * Get the Method Name
     *
     * @return string
     */
    public function getMethodName()
    {
        return $this->strMethodName;
    }

    /**
     * Set the see annotation
     *
     * @param string $strSee
     */
    public function setSee( $strSee )
    {
        $this->strSee = $strSee;
    }

    /**
     * Get the see annotation
     *
     * @return string
     */
    public function getSee()
    {
        return $this->strSee;
    }

    /**
     * Set the link annotation
     *
     * @param string $strLink
     */
    public function setLink( $strLink )
    {
        $this->strLink = $strLink;
    }

    /**
     * Get the link annotation
     *
     * @return string
     */
    public function getLink()
    {
        return $this->strLink;
    }

    /**
     * Validate the data inside the annotation Method
     * after all the information be received
     *
     * @throws CorujaAnnotationException
     */
    public function validate()
    {
        
    }
}

?>