<?php
namespace Coruja\Template;

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
class XmlTemplateAnnotationAttribute implements \Coruja\Annotation\Interfaces\CorujaAnnotationAttributeInterface
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
     * Xml Property
     *
     * Name of the tag when drawed
     *
     * @var string
     */
    protected $strXmlProperty;

    /**
     * Xml Multi Values
     * 
     * Restriction of what values the attribute may receive
     *
     * @var array
     */
    protected $arrXmlMultiValues;

    /**
     * When the Xml has XmlMulitValues the list of values needs
     * of some string Separated.
     * 
     * The commom cases are " " or ","  or ";".
     * 
     * But, can be any string.
     * 
     * @var string
     */
    protected $strXmlValueSeparated = " ";
    
    /**
     * Xml Values
     * 
     * Restriction of what value the attribute may receive
     *
     * @var array
     */
    protected $arrXmlValues;

    /**
     * Xml Unique
     *
     * this property should not be replicated into the page
     *
     * @var boolean
     */
    protected $booXmlUnique;
    
    /**
     * Required
     *
     * this property should be set
     *
     * @var boolean
     */
    protected $booRequired;

    /**
     * Array of ocurrence allowed of child tags
     *
     * @var array
     */
    protected $arrTags = array();
    
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

    public function setXmlProperty( $strXmlProperty )
    {
        $this->strXmlProperty = $strXmlProperty;
    }

    public function getXmlProperty()
    {
        return $this->strXmlProperty;
    }

    public function setXmlMultivalues( $arrXmlMultiValues )
    {
        $this->arrXmlMultiValues = $arrXmlMultiValues;
    }

    public function getXmlMultivalues()
    {
        return $this->arrXmlMultiValues;
    }

    public function setXmlValueSeparated( $strXmlValueSeparated )
    {
        $strPattern = '/^"(?P<value>.+)"/';
        $arrResult = array();
        preg_match( $strPattern , $strXmlValueSeparated , $arrResult );
        if( \array_key_exists( "value", $arrResult ) )
        {
            $this->strXmlValueSeparated = $arrResult[ "value" ];
        }
    }

    public function getXmlValueSeparated()
    {
        return $this->strXmlValueSeparated;
    }

    public function setXmlValues( $arrXmlValues )
    {
        $this->arrXmlValues = $arrXmlValues;
    }

    public function getXmlValues()
    {
        return $this->arrXmlValues;
    }

    public function setXmlUnique( $booUnique = '1' )
    {
        $this->booXmlUnique = ( $booUnique == '1' );
    }

    public function getXmlUnique()
    {
        return $this->booXmlUnique;
    }

    public function setRequired( $booRequired = '1' )
    {
        $this->booRequired = ( $booRequired == '1' );
    }

    public function getRequired()
    {
        return $this->booRequired;
    }

    public function setTags( $arrTags )
    {
        $this->arrTags = $arrTags;
    }

    public function getTags()
    {
        return $this->arrTags;
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