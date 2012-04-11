<?php
/**
 * ExampleAnnotationAttribute - Example of implementation of the
 * CorujaAnnotationAttributeInterface
 * 
 * @package coruja.components.annotation.example
 */

/**
 * Example of implementation of the CorujaAnnotationAttributeInterface with
 * the "var" notation
 *
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 */
class ExampleAnnotationAttribute implements \Coruja\Annotation\Interfaces\CorujaAnnotationAttributeInterface
{
    /**
     * Class Container Name
     *
     * @var string
     */
    protected $strClassContainerName;

    /**
     * Attribute Name
     *
     * @var string
     */
    protected $strAttributeName;

    /**
     * Var
     * 
     * @var string
     */
    protected $strVar;

    /**
     *
     * @param string $strClassContainerName
     * @param string $strAttributeName
     */
    public function __construct( $strClassContainerName , $strAttributeName )
    {
        $this->setClassContainerName( $strClassContainerName );
        $this->setAttributeName( $strAttributeName );
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
     * Set the Attribute Name
     *
     * @param string $strAttributeName
     */
    public function setAttributeName( $strAttributeName )
    {
        $this->strAttributeName = $strAttributeName;
    }

    /**
     * Get the Attribute Name
     *
     * @return string
     */
    public function getAttributeName()
    {
        return $this->strAttributeName;
    }

    /**
     * Set the var annotation
     *
     * @param string $strVar
     */
    public function setVar( $strVar )
    {
        $this->strVar = $strVar;
    }

    /**
     * Get the var annotation
     *
     * @return string
     */
    public function getVar()
    {
        return $this->strVar;
    }
    
    /**
     * Validate the data inside the annotation attribute
     * after all the information be received
     *
     * @throws CorujaAnnotationException
     */
    public function validate()
    {
        
    }
}

?>