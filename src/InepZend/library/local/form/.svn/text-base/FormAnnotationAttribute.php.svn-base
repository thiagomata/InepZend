<?php
namespace Local\Form;

/**
 *
 * @author Thiago Henrique Ramos da Mata <thiago.henrique.mata@gmail.com>
 */
class FormAnnotationAttribute implements \Coruja\Annotation\Interfaces\CorujaAnnotationAttributeInterface
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
     * Fill Method of the Element
     *
     * @var string
     */
    protected $strFill;

    /**
     * Type
     *
     * @var string
     */
    protected $strType;

    /**
     * Tag
     *
     * @var string
     */
    protected $strTag;

    /**
     * Label
     *
     * @var string
     */
    protected $strLabel;

    /**
     * Mask
     *
     * @var string
     */
    protected $strMask;

    /**
     *
     * Max Length
     * 
     * @var integer
     */
    protected $intMaxLength;

    /**
     *
     * Size
     *
     * @var integer
     */
    protected $intSize;

    /**
     *
     * Order
     *
     * @var integer
     */
    protected $intOrder;

    /**
     * Required
     *
     * @var boolean
     */
    protected $booRequired;

    /**
     * Render
     *
     * @var boolean
     */
    protected $booRender;

    /**
     * Visible
     *
     * @var boolean
     */
    protected $booVisible;

    /**
     * Array of Options of the Select
     * 
     * @var array
     */
    protected $arrOptions;

    /**
     * Setter method of the attribute
     *
     * @var string
     */
    protected $strSetter;

    /**
     * Getter method of the attribute
     *
     * @var string
     */
    protected $strGetter;
    
    /**
     * Construtor da anotação
     *
     * Inicia as anotacoes com os valores padroes
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
     * Set the Mask
     *
     * @param string $strMask
     */
    public function setMask( $strMask = '' )
    {
        $this->strMask = $strMask;
    }

    /**
     * Get the Mask
     *
     * @return string
     */
    public function getMask()
    {
        return $this->strMask;
    }

    /**
     * Set the Text Maxlength
     *
     * @param string $intMaxLength
     */
    public function setMaxlength( $intMaxLength )
    {
        $this->intMaxLength = (integer)$intMaxLength;
    }

    /**
     * Get the Text Maxlength
     *
     * @return string
     */
    public function getMaxlength()
    {
        return $this->intMaxLength;
    }
    
    /**
     * Set the Text Size
     *
     * @param integer $intSize
     */
    public function setSize( $intSize )
    {
        $this->intSize = (integer)$intSize;
    }

    /**
     * Get the Text Size
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->intSize;
    }

    /**
     * Set the Element Order
     *
     * @param integer $intOrder
     */
    public function setOrder( $intOrder )
    {
        $this->intOrder = (integer)$intOrder;
    }

    /**
     * Get the Element Order
     *
     * @return integer
     */
    public function getOrder()
    {
        return $this->intOrder;
    }

    /**
     * Set the Label
     *
     * @param string $strLabel
     */
    public function setLabel( $strLabel = '' )
    {
        $this->strLabel = $strLabel;
    }

    /**
     * Get the Label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->strLabel;
    }
    
    /**
     * Set the Tag
     *
     * @param string $strTag
     */
    public function setTag( $strTag = '' )
    {
        $this->strTag = $strTag;
    }

    /**
     * Get the Tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->strTag;
    }

    /**
     * Set the Var
     *
     * @param string $strVar
     */
    public function setVar( $strVar = '' )
    {
        $this->strVar = $strVar;
    }

    /**
     * Get the Var
     *
     * @return string
     */
    public function getVar()
    {
        return $this->strVar;
    }

    /**
     * Set the Fill
     *
     * @param string $strFill
     */
    public function setFill( $strFill = '' )
    {
        $this->strFill = $strFill;
    }

    /**
     * Get the Fill
     *
     * @return string
     */
    public function getFill()
    {
        return $this->strFill;
    }

    /**
     * Set the Options
     *
     * @param array $arrOptions
     */
    public function setOptions( array $arrOptions = array() )
    {
        $this->arrOptions = $arrOptions;
    }

    /**
     * Get the Options
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->arrOptions;
    }

    /**
     * Set the Required Flag
     *
     * @param string $strRequired
     */
    public function setRequired( $strRequired = 'false' )
    {
        $this->booRequired = \CorujaStringManipulation::strToBool( (string)$strRequired );
    }

    /**
     * Get the Required Flag
     *
     * @return string
     */
    public function getRequired()
    {
        return $this->booRequired;
    }

    /**
     * Set the Visible Flag
     *
     * @param string $strVisible
     */
    public function setVisible( $strVisible = 'false' )
    {
        $this->booVisible = \CorujaStringManipulation::strToBool( (string)$strVisible );
    }

    /**
     * Get the Visible Flag
     *
     * @return string
     */
    public function getVisible()
    {
        return $this->booVisible;
    }

    /**
     * Set the Render Flag
     *
     * @param string $strRender
     */
    public function setRender( $strRender = 'false' )
    {
        $this->booRender = \CorujaStringManipulation::strToBool( (string)$strRender );
    }

    /**
     * Get the Render Flag
     *
     * @return string
     */
    public function getRender()
    {
        return $this->booRender;
    }

    /**
     * Set the Setter Method annotation
     *
     * @param string $strSetter
     */
    public function setSetter( $strSetter )
    {
        $this->strSetter = $strSetter;
    }

    /**
     * Get the Setter Method annotation
     *
     * @return string
     */
    public function getSetter()
    {
        if( $this->strSetter == null )
        {
            $strMethod = 'set' . ucfirst( strtolower( $this->getAttributeName() ) );
            $this->strSetter = $strMethod;
        }
        return $this->strSetter;
    }


    /**
     * Set the Getter Method annotation
     *
     * @param string $strGetter
     */
    public function setGetter( $strGetter )
    {
        $this->strGetter = $strGetter;
    }

    /**
     * Get the Getter Method annotation
     *
     * @return string
     */
    public function getGetter()
    {
        if( $this->strGetter == null )
        {
            $strMethod = 'get' . ucfirst( strtolower( $this->getAttributeName() ) );
            $this->strGetter = $strMethod;
        }
        return $this->strGetter;
    }

    /**
     * Validate the data inside the annotation attribute
     * after all the information be received
     *
     * @throws \Coruja\Annotation\CorujaAnnotationException
     */
    public function validate()
    {
    }
}

?>